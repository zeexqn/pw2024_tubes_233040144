<?php
include 'fungsi.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM berita
				WHERE
			  judul LIKE '%$keyword%' OR
			  penulis LIKE '%$keyword%' OR
			  artikel LIKE '%$keyword%' OR
			  tanggal LIKE '%$keyword%' OR
			  foto LIKE '%$keyword%'
			";
$berita = query($query);
?>

<head>

</head>
<body>
<table class="table align-middle mt-4 table-hover table-striped">
                <thead>
                    <tr>
                    
    <th class="col-no">NO</th>
    <th class="col-judul">Judul</th>
    <th class="col-penulis">
        Penulis
        <a href="?order=penulis%20ASC"><i class="fas fa-arrow-up"></i></a>
        <a href="?order=penulis%20DESC"><i class="fas fa-arrow-down"></i></a>
    </th>
    <th class="col-artikel">Artikel</th>
    <th class="col-tanggal">
        Tanggal
        <a href="?order=tanggal%20ASC"><i class="fas fa-arrow-up"></i></a>
        <a href="?order=tanggal%20DESC"><i class="fas fa-arrow-down"></i></a>
    </th>
    <th class="col-kat">
        Kat
        <a href="?order=kategori%20ASC"><i class="fas fa-arrow-up"></i></a>
        <a href="?order=kategori%20DESC"><i class="fas fa-arrow-down"></i></a>
    </th>
    <th class="col-foto">Foto</th>
    <th class="col-aksi">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?= $i=1; ?>
                    <?php
                    foreach ($berita as $news) {
                    ?>
                        <tr>
                            <td><?= $i; ?>.</td>
                            <td><?= $news['judul']; ?></td>
                            <td><?= $news['penulis']; ?></td>
                            <td>
                                <p class="card-text mb-auto"><?=$news['artikel'];?>...</p>
                            </td>
                            <td><?=$news['tanggal']; ?></td>
                            <td><?=$news['kategori']; ?></td>
                            <td><img src="img/<?=$news['foto']; ?>" style="width: 150px" /></td>
                            <td>
                                <a href="detail.php?detail=<?=$news['id_berita']; ?>" type="button" class="btn btn-primary btn-sm">
                                    View
                                </a>
                                <a href="tambah.php?edit=<?=$news['id_berita']; ?>" type="button" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil"></i>
                                </a>
                                <a href="hapus.php?hapus=<?=$news['id_berita']; ?>" onclick="return confirm('yakin?');" type="button" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    <tr class="align-bottom"></tr>
                </tbody>
            </table>
</body>