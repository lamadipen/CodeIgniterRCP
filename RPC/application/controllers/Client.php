<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

        public function index()
        {
                $this->load->helper('url');
                $server_url = site_url('support');

                $this->load->library('xmlrpc');
               // $this->xmlrpc->set_debug(TRUE);
          

                $this->xmlrpc->server($server_url, 80);
                $this->xmlrpc->method('getUserInfo');

                $request = array('amritk');
                $this->xmlrpc->request($request);

                if ( ! $this->xmlrpc->send_request())
                {
                        echo $this->xmlrpc->display_error();
                }
                else
                {
                        echo '<pre>';
                        print_r($this->xmlrpc->display_response());
                        echo '</pre>';
                }
        }
}
