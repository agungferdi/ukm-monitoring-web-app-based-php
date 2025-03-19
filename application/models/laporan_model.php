<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan_model extends CI_Model
{
	

	public function getlaporanById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('laporan')->row_array();
	}

}

