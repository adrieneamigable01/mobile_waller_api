<?php
   /**
     * @author  Adriene Care Llanos Amigable <adrienecarreamigable01@gmail.com>
     * @version 0.1.0
    */ 

    class Utils extends MY_Controller{
        /**
            * Class constructor.
            *
        */
        public function __construct() {
			parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->library('Response',NULL,'response');
            $this->load->library('Uuid',NULL,'uuid');
            $this->load->model('UtilsModel');
        }

        public function getSourceOfFunds(){
            /**
             * @var string post data $key
             * @var string session data $accessKey
            */
            $return = array();

            try{
                $source_of_funds_id  = $this->input->get("source_of_funds_id");
                //set the payload dat
                $payload = array(
                    'source_of_funds.is_active' => 1,
                );

           
                $source_of_funds_id = !empty($source_of_funds_id) ? $source_of_funds_id : "All";
               
                if($source_of_funds_id != "All"){
                    $payload['source_of_funds.source_of_funds_id'] = $source_of_funds_id;
                }
                
               

                /** 
                    * Call the product model
                    * then call the getProducts method
                    * @param array $payload.
                */
                $request = $this->UtilsModel->getSourceOfFunds($payload);
                $return = array(
                    '_isError'      => false,
                    // 'code'       =>http_response_code(),
                    'reason'        =>'Success',
                    'data'          => $request,
                );
            }catch (Exception $e) {
                //set the server error
                $return = array(
                    '_isError' => true,
                    // 'code'     =>http_response_code(),
                    'reason'   => $e->getMessage(),
                );
            }
            $this->response->output($return); //return the json encoded data
        }
        public function checkToken(){
            $return = array(
                '_isError'      => false,
                'reason'        =>'Valid Token',
            );
            $this->response->output($return); //return the json encoded data
        }
    }
?>