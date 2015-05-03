<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Support_model extends CI_Model
    {
        function __construct()
    	{
    		parent::__construct();
            $this->load->database();
    	}
        
        function get_user($username)
        {
            $this->db->select('*');
            $this->db->from('userinfo');
            $this->db->where('username',$username);
            
            $result = $this->db->get();
            
            $data = array();
            
            foreach($result->result_array() as $row)
            {
                $data[] = $row;
            }
            
            return $data; 
        }
        
    }

?>