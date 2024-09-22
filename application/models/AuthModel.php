<?php
/**
 * Auth Model
 * Author: Adriene Carre Amigable
 * Date Created : 5/3/2020
 * Version: 0.0.1
 */
 class AuthModel extends CI_Model{
    /**
     * This will authenticate the user
     * @param array payload 
    */
    public function authenticate($payload){
        $this->db->select('accounts.account_id,
        accounts.account_id,
        accounts.mobile,
        accounts.status,
        accounts.mpin,
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
    public function addAccount($payload){
        return $this->db->set($payload)->get_compiled_insert('accounts');
    }
    public function updateAccount($payload,$where){
        $this->db->where($where);
        return $this->db->set($payload)->get_compiled_update('accounts');
    }
    public function linkAccount($payload){
        return $this->db->set($payload)->get_compiled_insert('linked_devices');
    }
    
 }
?>