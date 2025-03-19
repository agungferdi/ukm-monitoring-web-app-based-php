<div class="container">

	<div class="row mt-3">
		<div class="col-md-6">

			<div class="card">
 			 <div class="card-header">
    			Form Ubah Transaksi Pengeluaran
  			</div>
  			<div class="card-body">
				
  				
    		<form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $Pengeluaran['id']; ?>">
            <input type="hidden" name="fotolama" id="fotolama" value="<?= $Pengeluaran['gambar'] ?>">
	        <div class="form-group">
            <label for="kdumkm">Nama UMKM</label>
            <input type="text" name="kdumkm" class="form-control" id="kdumkm"  value="<?= $Pengeluaran['kdumkm']; ?>">
            <small class="form-text text-danger"><?= form_error('kdumkm');?></small>
            </div>
            <div class="form-group">
              <label for="tgltrans">Tanggal</label>
                <input type="date" class="form-control" id="tgltrans" name="tgltrans" value="<?= $Pengeluaran['tgltrans']; ?>">
                <small class="form-text text-danger"><?= form_error('tgltrans');?></small>
            </div>
            <div class="form-group">
              <select name="kdmumkm" id="kdumkm" class="form-control" required>
                        <option value="<?= $Pengeluaran['kdumkm']; ?>">-Pilih UMKM-</option>
                        <?php  
                        $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
                        

                        $query = mysqli_query($koneksi, "SELECT * FROM umkm") or die (mysqli_error($koneksi));
                        while($data = mysqli_fetch_array($query)){
                          echo "<option value= $data[kdumkm]> $data[nmusaha] </option>";
                        }
                        ?>
                        </select>
            </div>
            <div class="form-group">
              <label>Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $Pengeluaran['nominal']; ?>">
                <small class="form-text text-danger"><?= form_error('nominal');?></small>
            </div>
            <div class="form-group">
              <label>Sumber</label>
              <select name="kdkeluar" id="kdkeluar" class="form-control" required>
                        <option value="<?= $Pengeluaran['kdkeluar']; ?>">-Pilih-</option>
                      <?php  
                        $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
                    
                         $query = mysqli_query($koneksi, "SELECT * FROM jnkeluar") or die (mysqli_error($koneksi));
                        while($data = mysqli_fetch_array($query)){
                          echo "<option value=$data[kdkeluar]> $data[nmkeluar]</option>";
                        }
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Pembayaran</label>
                <input type="text" class="form-control" id="mt_bayar" name="mt_bayar" value="<?= $Pengeluaran['mt_bayar']; ?>">
                <small class="form-text text-danger"><?= form_error('mt_bayar');?></small>
            </div>
              <label>Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket"  value="<?= $Pengeluaran['ket']; ?>">
                <small class="form-text text-danger"><?= form_error('ket');?></small>
            </div>
            
          </div>
            <a href="<?= base_url(); ?>transaksi/Pengeluaran" class="btn btn-danger float-end ms-2">Kembali</a>
 					 <button type="submit" name="ubah" class="btn btn-primary" float-right>Ubah Data</button>
				</form>

  			</div>
		</div>

			

		</div>
	</div>

</div>