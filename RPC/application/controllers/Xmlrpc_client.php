<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xmlrpc_client extends CI_Controller {

        public function index()
        {
                $this->load->helper('url');
                $server_url = site_url('xmlrpc_server');

                $this->load->library('xmlrpc');
               // $this->xmlrpc->set_debug(TRUE);
               /*
                $this->load->library('curl');
                $this->curl->create("http://www.inkwalkar.com/");
                $this->curl->option('buffersize', 10);
                $this->curl->option('useragent', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.8) Gecko/20100722 Firefox/3.6.8 (.NET CLR 3.5.30729)');
                $this->curl->option('returntransfer', 1);
                $this->curl->option('followlocation', 1);
                $this->curl->option('HEADER', true);
                $this->curl->option('connecttimeout', 600);
                $this->curl->option('SSL_VERIFYPEER', false); // For ssl site
                $this->curl->option('SSL_VERIFYHOST', false);
                $this->curl->option('SSLVERSION', 3);
                
                $data = $this->curl->execute();
                echo $data;
                */

                $this->xmlrpc->server($server_url, 80);
                $this->xmlrpc->method('Greetings');

                $request = array('How is it going?');
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
