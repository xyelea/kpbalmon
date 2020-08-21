<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Manajemen Menu',
			'isi' => 'menu/index'
		);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('menu', 'Menu', 'required', [
			'required' => 'Nama Menu harus di isi !'
		]);
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('partials/wrapper', $data);
		} else {

			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('pesan', '<span class="text-primary">Menu Berhasil ditambahkan</span>');
			redirect('menu', $data);
		}
	}
	public function submenu()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Manajemen Submenu',
			'isi' => 'menu/submenu'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');


		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required', [
			'required' => 'Nama Submenu tidak boleh kosong !'
		]);
		$this->form_validation->set_rules('menu_id', 'Menu', 'required', [
			'required' => 'Nama Menu tidak boleh kosong !'
		]);
		$this->form_validation->set_rules('url', 'URL', 'required', [
			'required' => 'Url tidak boleh kosong !'
		]);
		$this->form_validation->set_rules('icon', 'icon', 'required', [
			'required' => 'ikon tidak boleh kosong !'
		]);
		if ($this->form_validation->run() ==  false) {
			$this->load->view('partials/wrapper', $data);
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Submenu Berhasil di tambah</div>');
			redirect('menu/submenu', $data);
		}
	}
	public function edit()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Edit Menu',
			'isi' => 'Menu/edit'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong !'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('partials/wrapper', $data);
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					// echo $this->upload->dispay_errors();
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Format upload Gambar salah ( Format JPG/PNG/GIF ukuran maks 2MB ) !</div>');
					redirect('user');
				}
			}
		}
	}
}
        
    /* End of file  Menu.php */
