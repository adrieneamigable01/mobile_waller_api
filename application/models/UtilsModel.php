

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilsModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getSourceOfFunds($where){
        $this->db->select('source_of_funds.*');
        $this->db->from('source_of_funds');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    // Function to generate and store OTP
    
}
?>