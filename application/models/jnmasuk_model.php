<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jnmasuk_model extends CI_Model
{
	public function hapusjnmasuk($id) {
		$this->db->where('id',$id);
		$this->db->delete('jnmasuk');
	}

	public function getjnmasukById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('jnmasuk')->row_array();
	}

	public function editjnmasuk() 
	{
		$data = [
            "kdmasuk" => $this->input->post('kdmasuk',true),
            "nmmasuk" => $this->input->post('nmmasuk',true),
            "jnmasuk" => $this->input->post('jnmasuk',true),
            "ket" => $this->input->post('ket',true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('jnmasuk', $data);
	}
}

