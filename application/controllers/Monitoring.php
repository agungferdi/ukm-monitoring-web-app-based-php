<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

  public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('rekap_model');
		$this->load->library('tcpdf');
		$this->load->library('form_validation');
		
	}	
	
  public function rekap()
	{	
		
		$data['title'] = 'Rekapitulasi Posisi Kas UMKM';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('monitoring/rekap', $data);
		$this->load->view('templates/footer');
	}
    // Mengatur library TCPDF sebagai library yang digunakan
 

	public function cetak()
	{
		$data['title'] = 'Cetak Laporan';
		// Load view cetak.php di folder monitoring
		$this->load->view('monitoring/cetak', $data);
	}

		public function index()
	{
		// Load model
		$this->load->model('Rekap_model');

		// Create PDF using the model function
		$this->Rekap_model->download_pdf();
	}


	public function download_pdf()
{
    // Panggil library TCPDF
    $this->load->library('tcpdf');

    // Generate PDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Laporan Rekapitulasi Posisi Kas UMKM');
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    // Buat halaman baru
    $pdf->AddPage();

    // Isi halaman dengan konten dari view rekap.php
    $content = $this->load->view('monitoring/rekap', [], true);
    $pdf->writeHTML($content, true, false, true, false, '');

    // Output file PDF untuk diunduh
    $pdf->Output('laporan_rekapitulasi_kas_umkm.pdf', 'D');
}

		
		
	

  }