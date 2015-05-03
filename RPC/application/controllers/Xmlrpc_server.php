<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xmlrpc_server extends CI_Controller {

        public function index()
        {
                $this->load->library('xmlrpc');
                $this->load->library('xmlrpcs');
                

                $config['functions']['Greetings'] = array('function' => 'Xmlrpc_server.getUser3');
                
                $this->xmlrpcs->initialize($config);
                $this->xmlrpcs->serve();
        }


        public function process($request)
        {
                
                
                $parameters = $request->output_parameters();

                $response = array(
                        array(
                                'you_said'  => $parameters[0],
                                'i_respond' => 'Not bad at all.'
                        ),
                        'struct'
                );

                return $this->xmlrpc->send_response($response);
        }
        
        public function getUser($request)
        {
                $parameters = $request->output_parameters();
                
                $this->load->model('support_model');
                $result = $this->support_model->get_user('shailesh250');
                
                $test['firstname'] = $result[0]['firstname'];
                
                /*
                $response = array(
                        array(
                                'you_said'  => $parameters[0],
                                'i_respond' => 'Not bad at all.'
                        ),
                        'struct'
                );
                */
                /*
                $response = array(
                        array('first_name' =>$result[0]['firstname']),
                        'struct'
                );
                */
                
                $response = array(
                        $test,
                        'struct'
                );

                return $this->xmlrpc->send_response($response);
        }
        
        public function getUser2($request)
        {
                $parameters = $request->output_parameters();
                
                $this->load->model('support_model');
                $result = $this->support_model->get_user('shailesh250');
                
                $testresult = json_encode($result);
                $response = array(
                array
                (
                    'firstname' => $result[0]['firstname'],
                    'username' => $result[0]['firstname'],
                    'lastname' => $result[0]['lastname'],
                    'email' => $result[0]['email'],
                    'department' => $result[0]['department'],
                    'mobilephone' => $result[0]['mobilephone'], 
                ),
                'struct'
        );
                
            
                return $this->xmlrpc->send_response($response);
        }
        
        public function getUser3($request)
        {
                $parameters = $request->output_parameters();
                
                $this->load->model('support_model');
                $result = $this->support_model->get_user('shailesh250');
                
                $testresult = json_encode($result);
                $response = array(
                array
                (
                   $testresult  
                ),
                'struct'
        );
                
            
                return $this->xmlrpc->send_response($response);
        }
}