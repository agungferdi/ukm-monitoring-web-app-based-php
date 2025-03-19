<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('pemasukan_model');
		$this->load->model('pengeluaran_model');
		$this->load->model('laporan_model');
		$this->load->library('form_validation');
		
	}	
	

	public function pemasukan()
	{	
		$data['title'] = 'Transaksi Pemasukan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pemasukan'] = $this->db->get('pemasukan')->result_array();

		

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('transaksi/pemasukan', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				
				"tgltrans" => $this->input->post('tgltrans',true),
				"kdumkm" => $this->input->post('kdumkm',true),
				"nominal" => $this->input->post('nominal',true),
				"kdmasuk" => $this->input->post('kdmasuk',true),
                "mt_bayar" => $this->input->post('mt_bayar',true),
				"image" => $this->input->post('image',true),
				"ket" => $this->input->post('ket',true)

			];

			$this->db->insert('pemasukan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New pemasukan added!</div>');
			redirect('transaksi/pemasukan');
		}
	}

	public function tambahpemasukan()
{
    // Validate the form input
    $this->form_validation->set_rules('tgltrans', 'Tanggal', 'required');
    $this->form_validation->set_rules('kdumkm', 'Kode UMKM', 'required');
    $this->form_validation->set_rules('nominal', 'Nominal', 'required');
    $this->form_validation->set_rules('kdmasuk', 'Kode Masuk', 'required');
    $this->form_validation->set_rules('mt_bayar', 'Pembayaran', 'required');
    $this->form_validation->set_rules('ket', 'Keterangan', 'required');

    if ($this->form_validation->run() == false) {
        // If validation fails, reload the page with the validation errors
        $this->pemasukan();
    } else {
		$usr = $_SESSION['email'];

        // Retrieve kdumkm from umkm table based on the email
        $query = $this->db->get_where('umkm', ['email' => $usr]);
        $row = $query->row();
        $kdumkm = $row->kdumkm;
		$nmusaha = $row->nmusaha;

        // If validation passes, insert the data into the database
        $tgltrans = $this->input->post('tgltrans');
        $kdumkm = $this->input->post('kdumkm');
        $nominal = $this->input->post('nominal');
        $kdmasuk = $this->input->post('kdmasuk');
        $mt_bayar = $this->input->post('mt_bayar');
        $ket = $this->input->post('ket');

        // Upload the image file
        $image = '';
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './assets/img/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                // Handle the error (display error message, redirect, etc.)
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error . '</div>');
                redirect('transaksi/pemasukan');
            }

            // Get the uploaded image data
            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];
        }

        // Insert the data into the database
        $data = array(
            'tgltrans' => $tgltrans,
            'kdumkm' => $kdumkm,
            'nominal' => $nominal,
            'kdmasuk' => $kdmasuk,
            'mt_bayar' => $mt_bayar,
            'image' => $image,
            'ket' => $ket
        );

        $this->db->insert('pemasukan', $data);

        // Set a success message and redirect to the desired page
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data pemasukan berhasil ditambahkan.</div>');
        redirect('transaksi/pemasukan');
    }
}

public function tambahpengeluaran()
{
    // Validate the form input
    $this->form_validation->set_rules('tgltrans', 'Tanggal', 'required');
    $this->form_validation->set_rules('kdumkm', 'Kode UMKM', 'required');
    $this->form_validation->set_rules('nominal', 'Nominal', 'required');
    $this->form_validation->set_rules('kdkeluar', 'Sumber', 'required');
    $this->form_validation->set_rules('mt_bayar', 'Pembayaran', 'required');
    $this->form_validation->set_rules('ket', 'Keterangan', 'required');

    if ($this->form_validation->run() == false) {
        // If validation fails, reload the page with the validation errors
        $this->pengeluaran();
    } else {
        $usr = $this->session->userdata('email');

        // Retrieve kdumkm from umkm table based on the email
        $query = $this->db->get_where('umkm', ['email' => $usr]);
        $row = $query->row();
        $kdumkm = $row->kdumkm;

        // If validation passes, insert the data into the database
        $tgltrans = $this->input->post('tgltrans');
        $nominal = $this->input->post('nominal');
        $kdkeluar = $this->input->post('kdkeluar');
        $mt_bayar = $this->input->post('mt_bayar');
        $ket = $this->input->post('ket');

        // Upload the image file
        $image = '';
        if ($_FILES['image']['name']) {
            $config['upload_path'] = './assets/img/bukti/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                // Handle the error (display error message, redirect, etc.)
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $error . '</div>');
                redirect('transaksi/pengeluaran');
            }

            // Get the uploaded image data
            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];
        }

        // Insert the data into the database
        $data = array(
            'tgltrans' => $tgltrans,
            'kdumkm' => $kdumkm,
            'nominal' => $nominal,
            'kdkeluar' => $kdkeluar,
            'mt_bayar' => $mt_bayar,
            'image' => $image,
            'ket' => $ket
        );

        $this->db->insert('pengeluaran', $data);

        // Set a success message and redirect to the desired page
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data pengeluaran berhasil ditambahkan.</div>');
        redirect('transaksi/pengeluaran');
    }
}


	public function hapuspemasukan($id)
	{
		$this->pemasukan_model->hapuspemasukan($id);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Record deleted!</div>');
		redirect('transaksi/pemasukan');
	}

	public function editmasuk($id)
	{
		$data['title'] = "Edit Pemasukan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pemasukan'] = $this->pemasukan_model->getpemasukanById($id);




		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('transaksi/editmasuk', $data);
			$this->load->view('templates/footer');
	    } else {
	    	$this->pemasukan_model->editmasuk();
	    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data umkm berhasil diedit!</div>');
			redirect('transaksi/editmasuk');
	    }
	}

	public function pengeluaran()
	{	
		$data['title'] = 'Transaksi pengeluaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengeluaran'] = $this->db->get('pengeluaran')->result_array();

		$this->form_validation->set_rules('kdumkm', 'kdumkm', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('transaksi/pengeluaran', $data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				
				"tgltrans" => $this->input->post('tgltrans',true),
				"kdumkm" => $this->input->post('kdumkm',true),
				"nominal" => $this->input->post('nominal',true),
				"kdkeluar" => $this->input->post('kdkeluar',true),
                "mt_bayar" => $this->input->post('mt_bayar',true),
				"image" => $this->input->post('image',true),
				"ket" => $this->input->post('ket',true)

			];

			$this->db->insert('pengeluaran', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New pengeluaran added!</div>');
			redirect('transaksi/pengeluaran');
		}
	}



	public function hapuspengeluaran($id)
	{
		$this->pengeluaran_model->hapuspengeluaran($id);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">1 Record deleted!</div>');
		redirect('transaksi/pengeluaran');
	}


	public function laporan()
	{	
		
		
		$data['title'] = 'Laporan Posisi Kas';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->form_validation->set_rules('kdumkm', 'kdumkm', 'required');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('transaksi/laporan', $data);
		$this->load->view('templates/footer');



		
		}
	}


	