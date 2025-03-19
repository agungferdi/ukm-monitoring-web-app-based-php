<head>
  <!-- meta tags and other code -->

  <title>Rekapitulasi Posisi Kas UMKM</title>
</head>

<body id="page-top">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="m-0 font-weight-bold text-primary">REKAPITULASI POSISI KAS UMKM</h3>
    <a href="<?= base_url('monitoring/download_pdf') ?>" class="btn btn-primary">Download PDF</a>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama UMKM</th>
            <th scope="col">Jenis Usaha</th>
            <th scope="col">No. HP</th>
            <th scope="col">Pemasukan</th>
            <th scope="col">Pengeluaran</th>
            <th scope="col">Posisi Kas</th>
          </tr>
        </thead>
        <tbody>
          <!-- tampilan -->
          <?php
          $koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
          $no = 1;
          $query = mysqli_query($koneksi, 'SELECT * FROM umkm');

          while ($m = mysqli_fetch_array($query)) {
            $kdumkm = $m['kdumkm'];
            $query_pemasukan = mysqli_query($koneksi, "SELECT SUM(nominal) AS total_pemasukan FROM pemasukan WHERE kdumkm = '$kdumkm'");
            $query_pengeluaran = mysqli_query($koneksi, "SELECT SUM(nominal) AS total_pengeluaran FROM pengeluaran WHERE kdumkm = '$kdumkm'");

            $data_pemasukan = mysqli_fetch_array($query_pemasukan);
            $data_pengeluaran = mysqli_fetch_array($query_pengeluaran);

            $total_pemasukan = $data_pemasukan['total_pemasukan'] ?? 0;
            $total_pengeluaran = $data_pengeluaran['total_pengeluaran'] ?? 0;
            $posisi_kas = $total_pemasukan - $total_pengeluaran;
          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $m['nmusaha']; ?></td>
              <td><?= $m['jnusaha']; ?></td>
              <td><?= $m['no_hp']; ?></td>
              <td>Rp. <?= number_format($total_pemasukan); ?></td>
              <td>Rp. <?= number_format($total_pengeluaran); ?></td>
              <td>Rp. <?= number_format($posisi_kas); ?></td>
            </tr>
          <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Include Bootstrap, jQuery, and other scripts -->
</body>
