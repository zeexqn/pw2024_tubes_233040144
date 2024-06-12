<?php
include 'koneksi.php';

$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$order = "tanggal DESC";
$query = "SELECT * FROM berita WHERE judul LIKE '%$search%' OR kategori LIKE '%$search%' ORDER BY $order";

$sql = mysqli_query($conn, $query);
$no = 0;

while ($result = mysqli_fetch_assoc($sql)) {
    echo '
        <tr>
            <td>' . ++$no . '.</td>
            <td>' . $result['judul'] . '</td>
            <td>' . $result['penulis'] . '</td>
            <td>
                <p class="card-text mb-auto">' . htmlspecialchars(substr($result['artikel'], 0, 100)) . '...</p>
            </td>
            <td>' . $result['tanggal'] . '</td>
            <td>' . $result['kategori'] . '</td>
            <td><img src="img/' . $result['foto'] . '" style="width: 150px" /></td>
            <td>
                <a href="detail.php?detail=' . $result['id_berita'] . '" type="button" class="btn btn-primary btn-sm">View</a>
                <a href="tambah.php?edit=' . $result['id_berita'] . '" type="button" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
                <a href="hapus.php?hapus=' . $result['id_berita'] . '" onclick="return confirm(\'yakin?\');" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
    ';
}
?>
