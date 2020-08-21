<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
			'title' => 'Profil',
			'isi' => 'user_member/dashboard/index'
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('partials/wrapper', $data);
	}

	public function edit()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Edit Profil',
			'isi' => 'user_member/edit'
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

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil di rubah !</div>');
			redirect('user');
		}
	}

	public function changepassword()
	{
		$data = array(
			'judul' => 'Sistem Informasi Pemeliharaan Kendaraan - Balmon - ',
			'title' => 'Ganti Password',
			'isi' => 'user_member/changepassword'
		);

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
			'required' => 'Kolom Password lama tidak boleh kosong'
		]);
		$this->form_validation->set_rules(
			'new_password1',
			'New Password',
			'required|trim|min_length[3]|matches[new_password2]',
			[
				'required' => 'Kolom Password Baru tidak boleh kosong',
				'min_length' => 'Password terlalu singkat',
				'matches' => 'Password tidak sama',
			]
		);
		$this->form_validation->set_rules(
			'new_password2',
			'Confirm New Password',
			'required|trim|min_length[3]|matches[new_password1]',
			[
				'required' => 'Kolom Password tidak boleh kosong',
				'matches' => 'Password tidak sama',
				'min_length' => 'Password terlalu singkat'
			]
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('partials/wrapper', $data);
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('user/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('user/changepassword');
				} else {
					// password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password Berhasil dirubah!</div>');
					redirect('user/changepassword');
				}
			}
		}
	}
}
        
    /* End of file  User.php */
