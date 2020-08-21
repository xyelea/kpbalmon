<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		// load base_url
		$this->load->helper('url');
	}

	public function index()
	{
		$this->output->set_status_header('404');
		$this->load->view('err404');
	}
}
        
    /* End of file  Custom404.php */
