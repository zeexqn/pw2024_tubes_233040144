<?php
include 'koneksi.php';

// Memanggil file TCPDF
require_once('TCPDF/tcpdf.php');

$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$order = "tanggal DESC";
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}
$query = "SELECT * FROM berita WHERE judul LIKE '%$search%' OR kategori LIKE '%$search%' ORDER BY $order";

$sql = mysqli_query($conn, $query);
$no = 0;

// Membuat objek PDF
$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

// Mengatur informasi dokumen
$pdf->SetCreator('');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Laporan Berita');
$pdf->SetSubject('Laporan Berita');

// Menghapus header dan footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Menambahkan halaman baru
$pdf->AddPage();

// Membuat konten HTML untuk PDF
$html = '
    <h1>Laporan Berita</h1>
    <table border="1" cellpadding="4">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Artikel</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Foto</th>
        </tr>
';

while ($result = mysqli_fetch_assoc($sql)) {
    $html .= '
        <tr>
            <td>' . ++$no . '.</td>
            <td>' . $result['judul'] . '</td>
            <td>' . $result['penulis'] . '</td>
            <td>' . htmlspecialchars(substr($result['artikel'], 0, 100)) . '...</td>
            <td>' . $result['tanggal'] . '</td>
            <td>' . $result['kategori'] . '</td>
            <td><img src="img/' . $result['foto'] . '" width="100" /></td>
        </tr>
    ';
}

$html .= '</table>';

// Menulis konten HTML ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Menampilkan PDF di browser
$pdf->Output('laporan_berita.pdf', 'I');
?>
