<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Pemasukan_Pengeluaran.xls");
	?>
	<h3>Rekap Monitoring Posisi Kas UMKM</h3>    
	<table border="1" cellpadding="5"> 
	<tr>   
    <th>No. </th> 
	<th>Nama UMKM</th>
    <th>Jenis Usaha</th>
    <th>No. HP</th>    
	<th>Posisi Kas</th> 
	</tr>  
	

    <!-- tampilan -->
    <?php
      $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik'); 
  
      $no = 1;
      $query = mysqli_query($koneksi, 'SELECT * FROM umkm');                                
                  
      $result = array(); 
      while ($data = mysqli_fetch_array($query)) {
      $result[] = $data;
                  }
      ?>
      <?php $i=1; ?>
      <?php  foreach ($result as $m) { ?>
        <td><?= $i++; ?></th>
      <td> <?= $m['nmusaha']; ?></td>
      <td> <?= $m['jnusaha']; ?></td>
      <td> <?= $m['no_hp']; ?></td>
      <td> <?php

          $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
          $kdumkm = $m['kdumkm'];
          
          $pemasukan=mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE kdumkm = '$kdumkm'");
          while ($masuk=mysqli_fetch_array($pemasukan)){
          $arraymasuk[] = $masuk['nominal'];
          }
          $nominalmasuk = array_sum($arraymasuk);


          $pengeluaran=mysqli_query($koneksi,"SELECT * FROM pengeluaran WHERE kdumkm = '$kdumkm'");
          while ($keluar=mysqli_fetch_array($pengeluaran)){
          $arraykeluar[] = $keluar['nominal'];
          }
          $nominalkeluar = array_sum($arraykeluar);

          $uang = $nominalmasuk - $nominalkeluar;

          echo number_format($uang,2,',','.');
          ?></td>
      
    </tr>
<?php $i++; ?>
<?php }  ?> ?></table>