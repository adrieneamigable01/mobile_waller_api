<?php
   /**
     * @author  Adriene Care Llanos Amigable <adrienecarreamigable01@gmail.com>
     * @version 0.1.0
    */ 

    class Customer extends MY_Controller{
        /**
            * Class constructor.
            *
        */
        public function __construct() {
			parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->library('Response',NULL,'response');
            $this->load->library('Uuid',NULL,'uuid');
            $this->load->model('CustomerModel');
        }
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
            $response = $this->CustomerModel->addBlackListToken($payload);
            array_push($transQuery, $response);
            $result = array_filter($transQuery);
            $res = $this->response->mysqlTQ($result);
           
            if($res){
                $return = array(
                    'isError' => false,
                    'message'   =>'Success',
                );
            }else{
                $return = array(
                    'isError' => true,
                    'message'   =>'Error',
                );
            }
            $this->response->output($return);
        }
        public function accountregistration(){

            $transQuery         = array();

            $needToValidate = ["account_id","firstname","lastname","birthdate","email","province","city","barangay","nationality","source_of_funds_id","mpin","device_id"];
            $account_id = $this->input->post("account_id"); 
            $device_id = $this->input->post("device_id"); 
                       
            ///Address Info
            $province   = $this->input->post("province");
            $city       = $this->input->post("city");
            $barangay   = $this->input->post("barangay");

            // Personal Info
            $firstname          = $this->input->post("firstname");
            $middlename         = $this->input->post("middlename");
            $lastname           = $this->input->post("lastname");
            $birthdate          = $this->input->post("birthdate");
            $email              = $this->input->post("email");
            $nationality        = $this->input->post("nationality");
            $source_of_funds_id = $this->input->post("source_of_funds_id");
            $mpin               = $this->input->post("mpin");
            

            foreach ($needToValidate as $value) {
                if(empty($this->input->post($value))){
                    $return = array(
                        'isError' =>true,
                        // 'code'     =>http_response_code(),
                        'message'   => ucwords($value)." is required",
                    );
                    $this->response->output($return); //return the json encoded data
                    return false;
                }
            }

            $address_id = $this->uuid->generate_unique_id('address_id','address');
            $customerAddressData = array(
                'address_id'    => $address_id,
                'province'      => $province,
                'city'          => $city,
                'barangay'      => $barangay,
            );
            $addCustomerAddressSQL = $this->CustomerModel->addCustomerAddress($customerAddressData);
            array_push($transQuery, $addCustomerAddressSQL);

            $customer_id = $this->uuid->generate_unique_id('customer_id','customer');
            $customerInfoData = array(
                'customer_id'       => $customer_id,
                'account_id'        => $account_id,
                'firstname'         => $firstname,
                'middlename'        => $middlename,
                'lastname'          => $lastname,
                'birthdate'         => date("Y-m-d",strtotime($birthdate)),
                'email'             => $email,
                'nationality'       => $nationality,
                'source_of_funds_id'=> $source_of_funds_id,
                'address_id'        => $address_id,
                'date_created'      => date("Y-m-d"),
            );
            $customerInfoDataSQL = $this->CustomerModel->addCustomerInfo($customerInfoData);
            array_push($transQuery, $customerInfoDataSQL);


            $setMPIN = array(
                'mpin'    => $mpin,
            );
            $where = array(
                'account_id' => $account_id
            );
            $setMPINSql = $this->CustomerModel->setMPIN($setMPIN,$where);
            array_push($transQuery, $setMPINSql);

            $result = array_filter($transQuery);
            $res = $this->response->mysqlTQ($result);

            if($res){
                $where = array(
                    'accounts.account_id' => $account_id
                );
                $customer = $this->CustomerModel->getAccount($where);
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
                    "data" => $customer
                );

                $jwt = generate_jwt($jwtpayload, $this->config->item('jwt_key'));
                $cutomer_data['token'] = $jwt;

                $return = array(
                    'isError'      => false,
                    'data'          => $cutomer_data,
                    'token'             => $jwt,
                    'message'        =>'Successfuly update customer info',
                );
            }else{
                $return = array(
                    'isError' => true,
                    'data' => array(),
                    'message'   => 'Error',
                );
            }

            $this->response->output($return); //return the json encoded data
            

        }
    }
?>