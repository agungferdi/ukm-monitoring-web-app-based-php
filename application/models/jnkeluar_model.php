<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jnkeluar_model extends CI_Model
{
	public function hapusjnkeluar($id) {
		$this->db->where('id',$id);
		$this->db->delete('jnkeluar');
	}

	public function getjnkeluarById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('jnkeluar')->row_array();
	}

	public function editjnkeluar() 
	{
		$data = [
            "kdkeluar" => $this->input->post('kdkeluar',true),
            "nmkeluar" => $this->input->post('nmkeluar',true),
            "jnkeluar" => $this->input->post('jnkeluar',true),
            "ket" => $this->input->post('ket',true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('jnkeluar', $data);
	}
}

