<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
			'title' => 'Dashboard',
			'isi' => 'user_admin/index'
		);
		$jumlah =	$this->db->count_all('user');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->get('user');
		$this->load->view('partials/wrapper', $data, $jumlah);
	}
	public function role()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Role',
			'isi' => 'user_admin/role'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		$this->load->view('partials/wrapper', $data);
	}

	public function roleAccess($role_id)
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Role Access',
			'isi' => 'user_admin/role-access'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		// $this->db->where('id !=', 7);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('partials/wrapper', $data);
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Akses Berhasil dirubah!  
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>');
	}

	function kendaraan()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Kendaraan',
			'isi' => 'kendaraan/index'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['kendaraan'] = $this->Kendaraan_model->getKendaraan();
		$data['kendaraan'] = $this->db->get('kendaraan')->result_array();
		$this->load->view('partials/wrapper', $data);
	}
	function tambahKendaraan()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Tambah Kendaraan',
			'isi' => 'kendaraan/tambah'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['kendaraan'] = $this->Kendaraan_model->getKendaraan();
		$data['kendaraan'] = $this->db->get('kendaraan')->result_array();
		// $this->load->view('partials/wrapper', $data);

		$this->form_validation->set_rules('merek', 'merek', 'required', [
			'required' => 'Merek harus di isi !'
		]);
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('partials/wrapper', $data);
		} else {

			$this->db->insert('kendaraan', [
				'merek' => $this->input->post('merek'),
				'jenis' => $this->input->post('jenis'),
				'no_registrasi' => $this->input->post('no_registrasi'),
			]);

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img/upload/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['kendaraan']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/upload/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					// echo $this->upload->dispay_errors();
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Format upload Gambar salah ( Format JPG/PNG/GIF ukuran maks 2MB ) !</div>');
					redirect('admin/kendaraan');
				}
				$this->session->set_flashdata('pesan', '<span class="text-primary">Kendaraan Berhasil ditambahkan</span>');
				redirect('admin/kendaraan', $data);
			}
		}
	}

	function hapusKendaraan($id_kendaraan)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->Kendaraan_model->hapusKendaraan($id_kendaraan);
		$this->session->set_flashdata('pesan', '<span class="text-primary">Kendaraan Berhasil ditambahkan</span>');
		redirect('admin/kendaraan');
	}
}
        
    /* End of file  Admin.php */
