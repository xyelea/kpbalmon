<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Kendaraan_model');
	}
	public function index()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Kendaraan',
			'isi' => 'kendaraan/index'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kendaraan'] = $this->Kendaraan_model->getKendaraan();
		$this->load->view('partials/wrapper', $data);
	}
}
        
    /* End of file  Kendaraan.php */
