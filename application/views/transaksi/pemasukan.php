    <!-- Begin Page Content -->
    <!-- <div class="container-fluid"> -->

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
<!--
        <div class="row">
            <div class="col-lg">
              
            <?= $this->session->flashdata('message'); ?>
            


            <a href="<?= base_url(); ?>transaksi/tambahmasuk/" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Data Pemasukan</a>


              <div class="table-responsive">
                <table class="table table-bordered"  id="dataTables-example"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">No </th>
                      <th scope="col">Tanggal </th>
                      <th scope="col">Kode UMKM</th>
                      <th scope="col">Nominal</th>
                      <th scope="col">Nama Akun</th>
                      <th scope="col">Pembayaran</th>
                      <th scope="col">Bukti Pembayaran</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Action</th>   
                    </tr>          
                  </thead>

                  <tbody>
                <?php
                         $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');

                         $usr = $_SESSION['email'];

                         $sql = mysqli_query($koneksi, "SELECT * FROM umkm WHERE email = '$usr'");
                         $array = mysqli_fetch_array($sql);

                         $kdumkm = $array['kdumkm'];
                         $y = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE kdumkm = '$kdumkm'")

                        ?>
                        <?php 
                            while ($tmsk = mysqli_fetch_array($y)) {
                         ?>

                    <?php $i = 1; ?> 
                      <tr>

                    <th scope="row"><?= $i; ?></th>
          
                      <td><?= $tmsk['tgltrans']; ?></td>  
                      <td><?php 
                      
                        $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
                        $usr = $_SESSION['email'];

                        $sql = mysqli_query($koneksi, "SELECT * FROM umkm WHERE email = '$usr'");
                        $array = mysqli_fetch_array($sql);
     
                        $kdumkm = $array['kdumkm'];
                        $query = mysqli_query($koneksi, "SELECT nmusaha FROM umkm WHERE kdumkm = '$kdumkm'") or die (mysqli_error($koneksi));
                        $data = mysqli_fetch_array($query);
                          echo "$data[nmusaha]";
                        
                        ?></td>            
                      <td>Rp. <?=number_format($tmsk['nominal'],2,',','.');?></td>
                    <td> <?php  

                        $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
                    
                        $kdmasuk = $tmsk['kdmasuk'];
                         $query = mysqli_query($koneksi, "SELECT * FROM jnmasuk WHERE kdmasuk = '$kdmasuk'") or die (mysqli_error($koneksi));
                        while($data = mysqli_fetch_array($query)){
                          echo "$data[nmmasuk]";
                        }
                        ?></td>
                       <td><?= $tmsk['mt_bayar']; ?></td>
                       <td><img src="<?= base_url('assets/'); ?>img/bukti/<?= $tmsk['image']; ?>" width="70"></td>
                       <td><?= $tmsk['ket']; ?></td>
                        <td>
                        <a href="<?= base_url(); ?>transaksi/editmasuk/<?= $tmsk['id'];?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url(); ?>transaksi/hapuspemasukan/<?= $tmsk['id'];?>" class="badge badge-danger" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
                      </td>
                      </tr>
                    <?php $i++; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>

    </div>
   

</div>


 Modal 
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Pemasukan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('transaksi/pemasukan'); ?>" method="post">
          <div class="modal-body">            
          <div class="form-group">
              <label>Tanggal</label>
                <input type="date" class="form-control" id="tgltrans" name="tgltrans" placeholder="tgltrans" value="<?= set_value('tgltrans'); ?>">
                <?= form_error('tgltrans', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <select name="kdmumkm" id="kdumkm" class="form-control" required>
                        <option value="">-Pilih UMKM-</option>
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
</div> -->


<?php  



//  if (isset($_POST['pemasukan'])){

  // $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');


    // $id = $tmsk['id'];
    // $tgltrans = date('Y-m-d H:i:s');
    // $kdumkm = $tmsk['kdumkm'];
    // $nominal = $tmsk['nominal'];
    // $kdmasuk = $tmsk['kdmasuk'];
    // $mt_bayar = $tmsk['mt_bayar'];
    // $image = $tmsk['image'];
    // $ket = $tmsk['ket'];
    

    //  $query = mysqli_query($koneksi, "INSERT INTO pemasukan value ('', '$tgltrans', '$kdumkm', '$nominal', '$kdmasuk', '$mt_bayar', '$image', '$ket')");

    //  mysqli_query($koneksi, "DELETE FROM pemasukan WHERE kdumkm = '$kdumkm'"); 
 

//  }

?>

   


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>

            <a href="<?= base_url('transaksi/tambahpemasukan') ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Data Pemasukan</a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kode UMKM</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Nama Akun</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
$koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
$usr = $_SESSION['email'];
$sql = mysqli_query($koneksi, "SELECT * FROM umkm WHERE email = '$usr'");
$array = mysqli_fetch_array($sql);
$kdumkm = $array['kdumkm'];
$y = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE kdumkm = '$kdumkm'");

$i = 1;
while ($tmsk = mysqli_fetch_array($y)) {
    ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $tmsk['tgltrans']; ?></td>
        <td><?= $array['nmusaha']; ?></td>
        <td>Rp. <?= number_format($tmsk['nominal'], 2, ',', '.'); ?></td>
        <td>
            <?php
            $kdmasuk = $tmsk['kdmasuk'];
            $query = mysqli_query($koneksi, "SELECT * FROM jnmasuk WHERE kdmasuk = '$kdmasuk'") or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_array($query)) {
                echo $data['nmmasuk'];
            }
            ?>
        </td>
        <td><?= $tmsk['mt_bayar']; ?></td>
        <td><img src="<?= base_url('assets/'); ?>img/bukti/<?= $tmsk['image']; ?>" width="70"></td>
        <td><?= $tmsk['ket']; ?></td>
        <td>
            <a href="<?= base_url(); ?>transaksi/editmasuk/<?= $tmsk['id']; ?>" class="badge badge-success">Edit</a>
            <a href="<?= base_url(); ?>transaksi/hapuspemasukan/<?= $tmsk['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure to delete this record?');">Delete</a>
        </td>
    </tr>
    <?php
    $i++;
}
mysqli_close($koneksi);
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

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

            <!-- <form action="<?= base_url('transaksi/pemasukan'); ?>" method="post"> -->
            <form action="<?= base_url('transaksi/tambahpemasukan'); ?>" method="post">
   
            <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tgltrans" name="tgltrans" placeholder="tgltrans" value="<?= set_value('tgltrans'); ?>">
                        <?= form_error('tgltrans', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
    <label>Nama Usaha</label>
    <input type="text" class="form-control" id="kdumkm" name="kdumkm" placeholder="kdumkm" value="<?= isset($kdumkm) ? $kdumkm : ''; ?>" readonly>
    <?= form_error('kdumkm', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            $query = mysqli_query($koneksi, "SELECT * FROM jnmasuk") or die(mysqli_error($koneksi));
                            while ($data = mysqli_fetch_array($query)) {
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
                        <input type="file" class="form-control" id="image" name="image">
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
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['pemasukan'])) {
    $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
    $tgl = date('Y-m-d H:i:s');
    $kdumkm = $_POST['kdumkm'];
    $nominal = $_POST['nominal'];
    $kdmasuk = $_POST['kdmasuk'];
    $mt_bayar = $_POST['mt_bayar'];
    $image = $_FILES['image']['name'];
    $ket = $_POST['ket'];

    // Upload bukti pembayaran
    $target_dir = "assets/img/bukti/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $qry = mysqli_query($koneksi, "INSERT INTO pemasukan (`tgltrans`, `kdumkm`, `nominal`, `kdmasuk`, `mt_bayar`, `image`, `ket`) VALUES ('$tgl', '$kdumkm', '$nominal', '$kdmasuk', '$mt_bayar', '$image', '$ket')");

    if ($qry) {
        mysqli_query($koneksi, "DELETE FROM pemasukan WHERE kdumkm = '$kdumkm'");
    }
}
?>
