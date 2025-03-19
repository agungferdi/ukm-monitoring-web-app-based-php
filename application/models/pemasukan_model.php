<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemasukan_model extends CI_Model
{
	public function hapuspemasukan($id) {
		$this->db->where('id',$id);
		$this->db->delete('pemasukan');
	}

	public function getpemasukanById($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('pemasukan')->row_array();
	}

	public function tambahDataMaster()
	{
	
		$gambar= $this->upload();

		$data = [
				
			"tgltrans" => $this->input->post('tgltrans',true),
			"kdumkm" => $this->input->post('kdumkm',true),
			"nominal" => $this->input->post('nominal',true),
			"kdmasuk" => $this->input->post('kdmasuk',true),
			"mt_bayar" => $this->input->post('mt_bayar',true),
			"image" => $this->input->post('image',true),
			"ket" => $this->input->post('ket',true)

		];

		$this->db->insert('pemasukan' , $data);
	}

	public function upload() {
		$target_dir = "assets/img/bukti";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["image"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["image"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		return $_FILES["image"]["name"];
	}
	public function editmasuk() 
	{
		$data = [
            
				"tgltrans" => $this->input->post('tgltrans',true),
				"kdumkm" => $this->input->post('kdumkm',true),
				"nominal" => $this->input->post('nominal',true),
				"kdmasuk" => $this->input->post('kdmasuk',true),
                "mt_bayar" => $this->input->post('mt_bayar',true),
                "image" => $this->input->post('image',true),
                "ket" => $this->input->post('ket',true)
                
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('pemasukan', $data);
	}
}

