<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// Muat pustaka validasi form
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		// Atur validasi form login
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'valid_email' => 'Masukan email yang valid !',
			'required' => 'Email tidak boleh kosong !'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Password harus Di isi !',
		]);

		$data['judul'] = 'Sistem informasi pemeliharaan kendaraan | Balmon';
		// Muat halaman Login
		// oper array data ke header
		if ($this->form_validation->run() == false) {
			# code...
			$this->load->view('partials/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('partials/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('pesan', '<span class="color-text--red">Password Salah!</span>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<span class="color-text--red" role="alert">Email Belum di aktivasi!</span>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="color-text--red" role="alert">Email is tidak terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		// Judul
		$data['judul'] = 'Registrasi akun | Balmon';
		$this->form_validation->set_message('required', 'Kolom Tidak boleh kosong !');
		// Aturan Validasi Form
		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'valid_email' => 'Masukan email yang valid',
			'is_unique' => 'Email yang anda masukan telah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			// rubah rule ke bahasa indonesia
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu singkat'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		// Kondisi Validasi Form
		if ($this->form_validation->run() == false) {
			// Oper Array data ke header untuk menampilkan propery judul dengan nilai Belajar login
			$this->load->view('partials/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('partials/auth_footer');
		}
		// Bila kondisi tidak terpenuhi 
		else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			// siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('pesan', '<span class="color-text--green">Selamat! Akun berhasil di daftarkan. Silahkan cek email anda Untuk aktivasi akun</span>');
			redirect('auth', $data);
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'webmastersibalmon@gmail.com',
			'smtp_pass' => 'Adagibu1',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];
		$this->email->initialize($config);

		$this->email->from('webmastersibalmon@gmail.com', 'Admin - BALMON');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik link ini untuk memverifikasi Akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik link ini untuk mereset Password Akun anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('pesan', '<div class="color-text--green" role="alert">' . $email . ' Telah di aktifkan! Silahkan Masuk.</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('pesan', '<div class="color-text--red" role="alert">Aktivasi akun gagal, Token kadaluarsa.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="color-text--red" role="alert">Aktivasi akun gagal, Token salah.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="color-text--red" role="alert">Aktivasi akun gagal, Email salah.</div>');
			redirect('auth');
		}
	}
	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Email tidak boleh kosong !',
			'valid_email' => 'Email tidak valid !'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Lupa Password - Sistem informasi Pemeliharaan Kendaraan - Balmon';
			$this->load->view('partials/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('partials/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('pesan', '<div class="color-text--green" role="alert">Cek email anda untuk mereset password!</div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('pesan', '<div class="color-text--green" role="alert">Email tidak terdaftar atau aktif !</div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('pesan', '<div class="color-text--red" role="alert">Reset password salah ! Token salah.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="color-text--red" role="alert">Reset password salah ! Email salah.</div>');
			redirect('auth');
		}
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('pesan', '<span class="color-text--green">Anda telah keluar dari Sistem</span>');
		redirect('auth');
	}

	public function changePassword()
	{
		// Jika user masuk tanpa sesi Reset email kembalikan ke halaman login
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
			'required' => 'Password tidak boleh Kosong !',
			'min_length' => ' Password terlalu pendek !',
			'matches' => 'Password tidak sama'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]|matches[password1]', [
			'required' => 'Password tidak boleh Kosong !',
			'min_length' => ' Password terlalu pendek !',
			'matches' => 'Password tidak sama'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Rubah Password';
			$this->load->view('partials/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('partials/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->set_flashdata('pesan', '<div class="color-text--green" role="alert">Password berhasil di rubah ! Silahkan Masuk.</div>');
			redirect('auth');
		}
	}
}
