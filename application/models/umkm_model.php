<?php
defined('BASEPATH') or exit('No direct script access allowed');

class umkm_model extends CI_Model
{
	public function hapusumkm($id) {
		$this->db->where('id',$id);
		$this->db->delete('umkm');
	}

	public function getumkmById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('umkm')->row_array();
	}

	public function editumkm() 
	{
		$data = [
            "kdumkm" => $this->input->post('kdumkm',true),
            "nmusaha" => $this->input->post('nmusaha',true),
            "jnusaha" => $this->input->post('jnusaha',true),
            "pemilik" => $this->input->post('pemilik',true),
            "no_hp" => $this->input->post('no_hp',true),
            "email" => $this->input->post('email',true),
            "alamat" => $this->input->post('alamat',true),
            "username" => $this->input->post('username',true),
            "password" => $this->input->post('password',true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('umkm', $data);
	}
}

