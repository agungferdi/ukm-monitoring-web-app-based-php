<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{
	public function hapusMahasiswa($id) {
		$this->db->where('id',$id);
		$this->db->delete('mahasiswa');
	}

	public function getMahasiswaById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('mahasiswa')->row_array();
	}

	public function editMahasiswa() 
	{
		$data = [
				"nama" => $this->input->post('nama',true),
				"nim" => $this->input->post('nim',true),
				"email" => $this->input->post('email',true),
				"jurusan" => $this->input->post('jurusan',true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('mahasiswa', $data);
	}
}

