<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {
     
    
    public function index()
    {
            $this->load->library('xmlrpc');
            $this->load->library('xmlrpcs');
            $this->load->model('support_model');  
            $config['functions']['getUserInfo'] = array('function' => 'Support.getUser');
            
            $this->xmlrpcs->initialize($config);
            $this->xmlrpcs->serve();
    }
    
    public function getUser($request)
	{
	    $parameters = $request->output_parameters();
        
        $result = $this->support_model->get_user($parameters[0]); 
        
        $data = json_encode($result);
        
        $response = array(
                array
                (
                   $data  
                ),
                'struct'
        );
                return $this->xmlrpc->send_response($response);

	}
    
    
}
