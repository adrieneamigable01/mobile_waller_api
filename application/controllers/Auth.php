<?php

   /**
     * @author  Adriene Care Llanos Amigable <adrienecarreamigable01@gmail.com>
     * @version 0.1.0
    */ 

    class Auth extends CI_Controller{
        /**
            * Class constructor.
            *
        */
        public function __construct() {
			parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->helper('jwt');
            $this->load->library('Otp',NULL,'otp');
            $this->load->model('AuthModel');
            $this->load->model('CustomerModel');
            $this->load->library('Response',NULL,'response');
            $this->load->library('Uuid',NULL,'uuid');
            
           
        }
        /**
            * Generate a key
            * 
            *
            * @return string return a string use to be the accessKey 
        */
        private function keygen($length=10)
        {
            $key = '';
            list($usec, $sec) = explode(' ', microtime());
            mt_srand((int) $sec + ((int) $usec * 100000));
            
            $inputs = array_merge(range('z','a'),range(0,9),range('A','Z'));

            for($i=0; $i<$length; $i++)
            {
                $key .= $inputs[mt_rand(0,61)];
            }
            return $key;
        }
        /**
            * Authenticate a user
            * 
            *
            * @return array return the data info of a user
        */
        public function authenticate(){

            /**
             * @var string post data $userName
             * @var string post data $password
             * @var array  data $return
            */
            $mobile = $this->input->post('mobile');
            $device_id = $this->input->post('device_id');
            $return   = array();

            // conditions
            //this will filter so that no php error will found
            if(empty($mobile)){ //check if the username and password is not empty
                $return = array(
                    'isError' =>true,
                    // 'code'     =>http_response_code(),
                    'message'   =>'Mobile number in required',
                );
            }else if(empty($device_id)){ //check if the username and password is not empty
                $return = array(
                    'isError' =>true,
                    // 'code'     =>http_response_code(),
                    'message'   =>'device id is required',
                );
            }else{
               //set payload
                $payload = array('mobile' => $mobile);
                /** 
                    * Call the auth  model
                    * then call the authenticate method
                    * @param array $payload.
                */
                $authenticate = $this->AuthModel->authenticate($payload);
                
               
                try{
                    if(count($authenticate) > 0){
                        $data = array(
                            'account_id'        => $authenticate[0]->account_id,
                            'mobile'            => $authenticate[0]->mobile,
                            'status'            => $authenticate[0]->status,
                            'customer_id'       => $authenticate[0]->customer_id,
                            'fullName'          => $authenticate[0]->lastname.', '.$authenticate[0]->firstname.', '.$authenticate[0]->middlename,
                            'firstname'         => $authenticate[0]->firstname,
                            'middlename'        => $authenticate[0]->middlename,
                            'lastname'          => $authenticate[0]->lastname,
                            'birthdate'         => $authenticate[0]->birthdate,
                            'email'             => $authenticate[0]->email,
                            'nationality'       => $authenticate[0]->nationality,
                            'province'          => $authenticate[0]->province,
                            'city'              => $authenticate[0]->city,
                            'barangay'          => $authenticate[0]->barangay,
                            'source_of_funds'   => $authenticate[0]->source_of_funds,
                            'source_of_funds_id'   => $authenticate[0]->source_of_funds_id,
                            'deviceLinked'      => $this->CustomerModel->checkIfDevicesExist(array(
                                'linked_devices.device_id' => $device_id,
                                'accounts.mobile' => $authenticate[0]->mobile,
                            ))
                        );

                        $jwtpayload = array(
                            "iss" => "https://mobile-wallet-app.doitcebu.com",
                            "aud" => "mobile-wallet-app",
                            "iat" => time(),
                            "exp" => time() + (60 * 60),  // Token expires in 1 hour
                            "data" => $data
                        );

                        $jwt = generate_jwt($jwtpayload, $this->config->item('jwt_key'));
                        $data['token'] = $jwt;
                        $return = array(
                            'isError'      => false,
                            'message'        =>'Login successfuly',
                            'data'  => $data,
                            'token' => $jwt,
                        );
                        
                        
                    }else{
                        $return = array(
                            'isError' => true,
                            'message'   =>'User not found',
                        );
                    }
                }catch (Exception $e) {
                    //set the server error
                    $return = array(
                        'isError' => true,
                        'message'   => $e->getMessage(),
                    );
                }
            }
            $this->response->output($return,1); //return the json encoded data
        }
        public function sendRegiserAccountOTP(){
            $device_id = $this->input->post("device_id");

            if(empty($device_id)){
                $return = array(
                    '_isError' => true,
                    // 'code'     =>http_response_code(),
                    'message'   => "Empty device id",
                );
            }else{
                
                $payload= array(
                    'email' => 'adrienecarreamigable01@gmail.com',
                    'action' => 'add_account',
                    'foreign_id' => $device_id
                );
                $res = $this->otp->generate_otp($payload);
                if($res){
                    $return = array(
                        'isError' => false,
                        // 'code'     =>http_response_code(),
                        'message'   => "Please enter OTP",
                    );
                }else{
                    $return = array(
                        'isError' => true,
                        // 'code'     =>http_response_code(),
                        'message'   => "Error sending OTP",
                    );
                }
                
            }

            $this->response->output($return); //echo the json encoded data
        }
        public function verifyRegisterAccountOTP(){
           
            $transQuery         = array();
            $device_id = $this->input->post("device_id");
            $otp = $this->input->post("otp");
           
            if(empty($device_id)){
                $return = array(
                    'isError' => true,
                    // 'code'     =>http_response_code(),
                    'message'   => 'Empty device id',
                );
            }else if(empty($otp)){
                $return = array(
                    'isError' => true,
                    // 'code'     =>http_response_code(),
                    'message'   => 'Empty OTP code',
                );
            }else{
                
                
                $payload= array(
                    'email' => 'adrienecarreamigable01@gmail.com',
                    'otp' => $otp,
                    'action' => 'add_account',
                    'foreign_id' => $device_id
                );
                
                $validOTP = $this->otp->validate_otp($payload,1);
              
                if($validOTP){
                    $return = array(
                        'isError' => false,
                        // 'code'     =>http_response_code(),
                        'message'   => "Success",
                    );
                }else{
                    $return = array(
                        'isError' => true,
                        // 'code'     =>http_response_code(),
                        'message'   => "Invalid or expired OTP.",
                    );
                }
                $this->response->output($return); //echo the json encoded data
            }
        }
        public function sendLinkAccountOTP(){
            $device_id = $this->input->post("device_id");

            if(empty($device_id)){
                $return = array(
                    '_isError' => true,
                    // 'code'     =>http_response_code(),
                    'reason'   => "Empty device id",
                );
            }else{
                
                $token = $this->input->post('token');
                $decoded = decode_jwt($token, $this->config->item('jwt_key'));

                $payload= array(
                    'customer_id' => $decoded->data->customer_id,
                    'email' => $decoded->data->email,
                    'name' => $decoded->data->fullName,
                    'action' => 'link_account',
                    'foreign_id' => $device_id
                );
                $res = $this->otp->generate_otp($payload);
                if($res){
                    $return = array(
                        'isError' => false,
                        // 'code'     =>http_response_code(),
                        'reason'   => "Please enter OTP",
                    );
                }else{
                    $return = array(
                        'isError' => true,
                        // 'code'     =>http_response_code(),
                        'reason'   => "Error sending OTP",
                    );
                }
                
            }

            $this->response->output($return); //echo the json encoded data
        }
        public function registerMobile(){
            $mobile = $this->input->post("mobile");
            $device_id = $this->input->post("device_id");

            if(empty($device_id)){
                
                $return = array(
                    '_isError' => true,
                    // 'code'     =>http_response_code(),
                    'message'   => "Empty device id",
                );
            }else if(empty($mobile)){
                $return = array(
                    '_isError' => true,
                    // 'code'     =>http_response_code(),
                    'message'   => "Empty mobile",
                );
            }else{
                $transQuery      = array();
                $unique_id = $this->uuid->generate_unique_id('account_id','accounts');
                $payload= array(
                    'account_id' => $unique_id,
                    'mobile' => $mobile,
                );
                $registerAccountQuery = $this->AuthModel->addAccount($payload);
                array_push($transQuery, $registerAccountQuery);
                $link_device_id = $this->uuid->generate_unique_id('id','linked_devices');
                $linkDevicePayload= array(
                    'linked_devices_id' => $link_device_id,
                    'device_id' => $device_id,
                    'account_id' => $unique_id,
                );
                $linkAccountQuery = $this->AuthModel->linkAccount($linkDevicePayload);
                array_push($transQuery, $linkAccountQuery);
                $result = array_filter($transQuery);
                $res = $this->response->mysqlTQ($result);

                if($res){
                    $where = array(
                        'accounts.account_id' => $unique_id
                    );
                    $customer = $this->AuthModel->getAccount($where);
                    $cutomer_data = array();
                    if(sizeof($customer) > 0){
                        $cutomer_data = array(
                            'account_id'        => $customer[0]->account_id,
                            'mobile'            => $customer[0]->mobile,
                            'status'            => $customer[0]->status,
                            'customer_id'       => $customer[0]->customer_id,
                            'fullName'          => $customer[0]->lastname.', '.$customer[0]->firstname.', '.$customer[0]->middlename,
                            'firstname'         => $customer[0]->firstname,
                            'middlename'        => $customer[0]->middlename,
                            'lastname'          => $customer[0]->lastname,
                            'birthdate'         => $customer[0]->birthdate,
                            'email'             => $customer[0]->email,
                            'nationality'       => $customer[0]->nationality,
                            'province'          => $customer[0]->province,
                            'city'              => $customer[0]->city,
                            'barangay'          => $customer[0]->barangay,
                            'source_of_funds'   => $customer[0]->source_of_funds,
                            'source_of_funds_id'   => $customer[0]->source_of_funds_id,
                            'deviceLinked'      => $this->CustomerModel->checkIfDevicesExist(array(
                                'linked_devices.device_id' => $device_id,
                                'accounts.mobile' => $customer[0]->mobile,
                            ))
                        );
                    }

                    $jwtpayload = array(
                        "iss" => "https://mobile-wallet-app.doitcebu.com",
                        "aud" => "mobile-wallet-app",
                        "iat" => time(),
                        "exp" => time() + (60 * 60),  // Token expires in 1 hour
                        "data" => $cutomer_data
                    );

                    $jwt = generate_jwt($jwtpayload, $this->config->item('jwt_key'));
                    $cutomer_data['token'] = $jwt;

                    $return = array(
                        'isError' => false,
                        'data'      => $cutomer_data,
                        'token' => $jwt,
                        // 'code'     =>http_response_code(),
                        'message'   => "Successfuly register",
                    );
                }else{
                    $return = array(
                        'isError' => true,
                        // 'code'     =>http_response_code(),
                        'message'   => "Error registration",
                    );
                }
                
            }

            $this->response->output($return); //echo the json encoded data
        }
        /* Logout user */
        public function logout(){
            $transQuery      = array();
            // $headers = $this->input->request_headers();
            // $token = $headers['Authorization'];
            // if (strpos($token, 'Bearer ') === 0) {
            //     $token = substr($token, 7);
            // }
            $return   = array();
            $token = $this->input->post("token");
            $payload = array(
                'token' => $token,
            );
            $response = $this->AuthModel->addBlackListToken($payload);
            array_push($transQuery, $response);
            $result = array_filter($transQuery);
            $res = $this->mysqlTQ($result);
           
            if($res){
                $return = array(
                    '_isError' => false,
                    'reason'   =>'Success',
                );
            }else{
                $return = array(
                    '_isError' => true,
                    'reason'   =>'Error',
                );
            }
            $this->response->output($return);
        }
        public function mysqlTQ($arrQuery){
            $arrayIds = array();
            if (!empty($arrQuery)) {
                $this->db->trans_start();
                foreach ($arrQuery as $value) {
                    $this->db->query($value);
                    $last_id = $this->db->insert_id();
                    array_push($arrayIds,$last_id);
                }
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                   
                    return $arrayIds;
                }
            }
        }
    }
    
?>