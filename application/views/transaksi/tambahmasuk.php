
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Pemasukan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('transaksi/tambahpemasukan'); ?>" method="post">
          <div class="modal-body">            
          <div class="form-group">
              <label>Tanggal</label>
                <input type="date" class="form-control" id="tgltrans" name="tgltrans" placeholder="tgltrans" value="<?= set_value('tgltrans'); ?>">
                <?= form_error('tgltrans', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                          <!-- Add a hidden input field to store the logged-in kdumkm -->
                          <input type="hidden" name="kdmumkm" value="<?= $this->session->userdata('kdumkm'); ?>">
                          <!-- Display the logged-in nmusaha as the default value in the input field -->
                          <label for="nmusaha">Nama Usaha</label>
                          <?php
                          $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
                          $usr = $_SESSION['email'];
                          $sql = mysqli_query($koneksi, "SELECT * FROM umkm WHERE email = '$usr'");
                          $array = mysqli_fetch_array($sql);
                          $kdumkm = $array['kdumkm'];
                          $query = mysqli_query($koneksi, "SELECT * FROM umkm where kdumkm = '$kdumkm'") or die(mysqli_error($koneksi));
                          while ($data = mysqli_fetch_array($query)) {
                              $selected = ($this->session->userdata('kdumkm') == $data['kdumkm']) ? 'selected' : '';
                              echo "<option value=\"$data[kdumkm]\" $selected>$data[nmusaha]</option>";
                          }
                          ?>
                      </div>
            <div class="form-group">
              <label>Nominal</label>
                <input type="text" class="form-control" id="nominal" name="nominal" placeholder="nominal" value="<?= set_value('nominal'); ?>">
                <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Sumber</label>
              <select name="kdmasuk" id="kdmasuk" class="form-control" required>
                        <option value="">-Pilih-</option>
                      <?php  
                        $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
                    
                         $query = mysqli_query($koneksi, "SELECT * FROM jnmasuk") or die (mysqli_error($koneksi));
                        while($data = mysqli_fetch_array($query)){
                          echo "<option value=$data[kdmasuk]> $data[nmmasuk]</option>";
                        }
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Pembayaran</label>
                <input type="text" class="form-control" id="mt_bayar" name="mt_bayar" placeholder="mt_bayar" value="<?= set_value('mt_bayar'); ?>">
                <?= form_error('mt_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Bukti Transaksi</label>
              <input type="file" class="form-control" id="image" name="image" >
              <small class="form-text text-danger"><?= form_error('image') ?></small>
              </div>
            <div class="form-group">
              <label>Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="ket" value="<?= set_value('ket'); ?>">
                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
      </form>
    </div>
  </div>
</div>
