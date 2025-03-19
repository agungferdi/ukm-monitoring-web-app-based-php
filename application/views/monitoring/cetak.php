<?php
require_once('application/libraries/tcpdf/tcpdf.php');

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Nama Pembuat');
$pdf->SetAuthor('Nama Penulis');
$pdf->SetTitle('Rekapitulasi Posisi Kas UMKM');
$pdf->SetSubject('Rekapitulasi Posisi Kas UMKM');
$pdf->SetKeywords('Rekapitulasi, Posisi Kas, UMKM');

// Add a page
$pdf->AddPage();

// Set PDF content
$content = '
<h1>Rekapitulasi Posisi Kas UMKM</h1>
<table border="1">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama UMKM</th>
      <th>Jenis Usaha</th>
      <th>No. HP</th>
      <th>Pemasukan</th>
      <th>Pengeluaran</th>
      <th>Posisi Kas</th>
    </tr>
  </thead>
  <tbody>';

$koneksi = mysqli_connect('localhost', 'root', '', 'dbklinik');
$query = mysqli_query($koneksi, 'SELECT * FROM umkm');
$result = array();
while ($data = mysqli_fetch_array($query)) {
    $result[] = $data;
}

$no = 1;
foreach ($result as $m) {
    $content .= '
    <tr>
      <td>'.$no++.'</td>
      <td>'.$m['nmusaha'].'</td>
      <td>'.$m['jnusaha'].'</td>
      <td>'.$m['no_hp'].'</td>
      <td>';

    $kdumkm = $m['kdumkm'];
    $pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE kdumkm = '$kdumkm'");
    $arraymasuk = array();
    while ($masuk = mysqli_fetch_array($pemasukan)) {
        $arraymasuk[] = $masuk['nominal'];
    }
    $nominalmasuk = array_sum($arraymasuk);

    $pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE kdumkm = '$kdumkm'");
    $arraykeluar = array();
    while ($keluar = mysqli_fetch_array($pengeluaran)) {
        $arraykeluar[] = $keluar['nominal'];
    }
    $nominalkeluar = array_sum($arraykeluar);

    $content .= number_format($nominalmasuk, 2, ',', '.').'</td>
        <td>';

    $content .= number_format($nominalkeluar, 2, ',', '.').'</td>
      <td>';

    $uang = $nominalmasuk - $nominalkeluar;
    $content .= number_format($uang, 2, ',', '.').'</td>
    </tr>';
}

$content .= '
  </tbody>
</table>';

// Set language to Indonesian
$pdf->setLanguageArray([
    'a_meta_charset' => 'UTF-8',
    'a_meta_dir' => 'ltr',
    'a_meta_language' => 'id',
    'w_page' => 'Halaman'
]);

// Print the content to PDF
$pdf->writeHTML($content, true, false, true, false, '');

// Output the PDF as a download
$pdf->Output('rekapitulasi_kas_umkm.pdf', 'D');

?>
