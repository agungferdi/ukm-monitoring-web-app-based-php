<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rekap_model extends CI_Model
{
	

	public function getrekapById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('rekap')->row_array();
	}
	public function getData()
    {
        // Lakukan logika pengambilan data dari database sesuai kebutuhan Anda
        // Contoh pengambilan data menggunakan query dari database:
        $query = $this->db->get('umkm'); // Ganti "umkm" dengan tabel yang sesuai

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan data dalam bentuk array
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }
}

