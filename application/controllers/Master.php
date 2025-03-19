<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mahasiswa_model');
		$this->load->model('umkm_model');
		$this->load->model('jnkeluar_model');
		$this->load->model('jnmasuk_model');
		$this->load->library('form_validation');
	}	

	
		public function umkm()
	{	
		$data['title'] = 'Master UMKM';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['umkm'] = $this->db->get('umkm')->result_array();

		$this->form_validation->set_rules('kdumkm', 'kdumkm', 'required|is_unique[umkm.kdumkm]', ['is_unique'=> 'Kode UMKM sudah digunakan, tidak boleh sama!']);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('master/umkm', $data);
			$this->load->view('templates/footer');
		}else{
			$email = $this->input->post('email', true);
			$data = [
				"kdumkm" => $this->input->post('kdumkm',true),
				"nmusaha" => $this->input->post('nmusaha',true),
				"jnusaha" => $this->input->post('jnusaha',true),
				"pemilik" => $this->input->post('pemilik',true),
				"no_hp" => $this->input->post('no_hp',true),
				"alamat" => $this->input->post('alamat',true),
				"username" => $this->input->post('username',true),
				"email" => $this->input->post('email',true)

			];
			$regis = [
				
				'email' => htmlspecialchars($email),
				
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 1,
					'date_created' => time()
				];

			

			$this->db->insert('umkm', $data);
			$this->db->insert('user', $regis);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data umkm telah ditambah!</div>');
			redirect('master/umkm');
		}


	}

	public function hapusumkm($id)
	{
		$this->umkm_model->hapusumkm($id);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Record deleted!</div>');
		redirect('master/umkm');
	}

	public function editumkm($id)
	{
		$data['title'] = "Edit umkm";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['umkm'] = $this->umkm_model->getumkmById($id);

		$this->form_validation->set_rules('kdumkm', 'kdumkm', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('master/editumkm', $data);
			$this->load->view('templates/footer');
	    } else {
	    	$this->umkm_model->editumkm();
	    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data umkm berhasil diedit!</div>');
			redirect('master/umkm');
	    }
	}

	public function jnmasuk()
	{	
		$data['title'] = 'Master Jenis Pemasukan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jnmasuk'] = $this->db->get('jnmasuk')->result_array();

		$this->form_validation->set_rules('kdmasuk', 'kdmasuk', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('master/jnmasuk', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				"kdmasuk" => $this->input->post('kdmasuk',true),
				"nmmasuk" => $this->input->post('nmmasuk',true),
				"jnmasuk" => $this->input->post('jnmasuk',true),
				"ket" => $this->input->post('ket',true)
				

			];

			$this->db->insert('jnmasuk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New jnmasuk added!</div>');
			redirect('master/jnmasuk');
		}


	}

	public function hapusjnmasuk($id)
	{
		$this->jnmasuk_model->hapusjnmasuk($id);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Record deleted!</div>');
		redirect('master/jnmasuk');
	}

	public function editjnmasuk($id)
	{
		$data['title'] = "Edit jnmasuk";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['jnmasuk'] = $this->jnmasuk_model->getjnmasukById($id);

		$this->form_validation->set_rules('kdmasuk', 'kdmasuk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('master/editjnmasuk', $data);
			$this->load->view('templates/footer');
	    } else {
	    	$this->jnmasuk_model->editjnmasuk();
	    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data jnmasuk berhasil diedit!</div>');
			redirect('master/jnmasuk');
	    }
	}

	
	public function jnkeluar()
	{	
		$data['title'] = 'Master Jenis Pengeluaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['jnkeluar'] = $this->db->get('jnkeluar')->result_array();

		$this->form_validation->set_rules('kdkeluar', 'kdkeluar', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('master/jnkeluar', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				"kdkeluar" => $this->input->post('kdkeluar',true),
				"nmkeluar" => $this->input->post('nmkeluar',true),
				"jnkeluar" => $this->input->post('jnkeluar',true),
				"ket" => $this->input->post('ket',true)
				

			];

			$this->db->insert('jnkeluar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New jnkeluar added!</div>');
			redirect('master/jnkeluar');
		}


	}

	public function hapusjnkeluar($id)
	{
		$this->jnkeluar_model->hapusjnkeluar($id);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Record deleted!</div>');
		redirect('master/jnkeluar');
	}

	public function editjnkeluar($id)
	{
		$data['title'] = "Edit jnkeluar";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['jnkeluar'] = $this->jnkeluar_model->getjnkeluarById($id);

		$this->form_validation->set_rules('kdkeluar', 'kdkeluar', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('master/editjnkeluar', $data);
			$this->load->view('templates/footer');
	    } else {
	    	$this->jnkeluar_model->editjnkeluar();
	    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data jnkeluar berhasil diedit!</div>');
			redirect('master/jnkeluar');
	    }
	}

	

}