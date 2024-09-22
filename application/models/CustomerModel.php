<?php
/**
 * menu Model
 * Author: Adriene Carre Amigable
 * Date Created : 5/10/2020
 * Version: 0.0.1
 */
 class CustomerModel extends CI_Model{

    public function addCustomerAddress($payload){
        return $this->db->set($payload)->get_compiled_insert('address');
    }
    public function addCustomerInfo($payload){
        return $this->db->set($payload)->get_compiled_insert('customer');
    }
    public function setMPIN($payload,$where){
        $this->db->where($where);
        return $this->db->set($payload)->get_compiled_update('accounts');
    }
    public function checkIfDevicesExist($payload){
        $this->db->select('linked_devices.linked_devices_id,linked_devices.device_id,accounts.account_id,accounts.mobile,accounts.status');
        $this->db->from('accounts');
        $this->db->where($payload);
        $this->db->join('linked_devices', 'linked_devices.account_id = accounts.account_id','left');
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }
    
    public function updateUser($payload,$where){
        $this->db->where($where);
        return $this->db->set($payload)->get_compiled_update('users');
    }
    public function getAccount($payload){
        $this->db->select('accounts.account_id,
        accounts.account_id,
        accounts.mobile,
        accounts.status,
        customer.customer_id,
        customer.firstname,
        customer.middlename,
        customer.lastname,
        customer.birthdate,
        customer.email,
        customer.nationality,
        customer.source_of_funds_id,
        customer.date_created,
        address.address_id,
        address.province,
        address.city,
        address.barangay,
        source_of_funds.source_of_funds
        ');
        $this->db->from('accounts');
        $this->db->where($payload);
        $this->db->join('customer', 'customer.account_id = accounts.account_id','left');
        $this->db->join('address', 'address.address_id = customer.address_id','left');
        $this->db->join('source_of_funds', 'source_of_funds.source_of_funds_id  = customer.source_of_funds_id ','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function addBlackListToken($payload){
        return $this->db->set($payload)->get_compiled_insert('blacklist_token');
    }
   
 }
?>