<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengeluaran_model extends CI_Model
{
	public function hapuspengeluaran($id) {
		$this->db->where('id',$id);
		$this->db->delete('pengeluaran');
	}

	public function getpengeluaranById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('pengeluaran')->row_array();
	}

	public function editpengeluaran() 
	{
		$data = [
            
				"tgltrans" => $this->input->post('tgltrans',true),
				"kdumkm" => $this->input->post('kdumkm',true),
				"nominal" => $this->input->post('nominal',true),
				"kdkeluar" => $this->input->post('kdkeluar',true),
                "mt_bayar" => $this->input->post('mt_bayar',true),
                "image" => $this->input->post('image',true),
                "ket" => $this->input->post('ket',true),
                
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('pengeluaran', $data);
	}
}

