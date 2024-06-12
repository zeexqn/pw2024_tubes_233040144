<?php
include 'koneksi.php';
include 'source.php';

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .col-no {
            width: 3%;
        }

        .col-judul {
            width: 15%;
        }

        .col-penulis {
            width: 10%;
        }

        .col-artikel {
            width: 20%;
        }

        .col-kat {
            width: 10%;
        }

        .col-tanggal {
            width: 12%;
        }

        .col-foto {
            width: 15%;
        }

        .col-aksi {
            width: 15%;
        }
    </style>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita</title>
</head>

<body>
    <!-- judul -->
    <div class="container">
        <h1 class="mt-4">Admin</h1>
        <figure class="mb-5">
            <blockquote class="blockquote">
                <p>Halaman admin digunakan untuk mengubah data-data.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption>
        </figure>

        <div class="row align-items-center mb-3">
            <div class="col">
                <a href="tambah.php" type="button" class="btn btn-info">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Data
                </a>
                <a href="user.php" type="button" class="btn btn-warning">
                    <i class="fa-solid fa-reply"></i>
                    Kembali
                </a>
                <a href="buat_pdf.php" class="btn btn-primary">
                    <i class="fa-solid fa-file-pdf"></i>Print</a>
            </div>
            <!-- Form Pencarian -->
            <div class="col-4 d-flex ml-auto">
                <form method="post" class="form-inline border-bottom">
                    <input id="search" class="form-control no-border" type="text" name="search" placeholder="Cari Berita ..." value="<?php echo htmlspecialchars($search); ?>">
                    <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
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
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <td><?php echo ++$no; ?>.</td>
                            <td><?php echo $result['judul']; ?></td>
                            <td><?php echo $result['penulis']; ?></td>
                            <td>
                                <p class="card-text mb-auto"><?php echo htmlspecialchars(substr($result['artikel'], 0, 100)); ?>...</p>
                            </td>
                            <td><?php echo $result['tanggal']; ?></td>
                            <td><?php echo $result['kategori']; ?></td>
                            <td><img src="img/<?php echo $result['foto']; ?>" style="width: 150px" /></td>
                            <td>
                                <a href="detail.php?detail=<?php echo $result['id_berita']; ?>" type="button" class="btn btn-primary btn-sm">
                                    View
                                </a>
                                <a href="tambah.php?edit=<?php echo $result['id_berita']; ?>" type="button" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <a href="hapus.php?hapus=<?php echo $result['id_berita']; ?>" onclick="return confirm('yakin?');" type="button" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr class="align-bottom"></tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var search = $(this).val();
                $.ajax({
                    url: 'search_admin.php',
                    method: 'POST',
                    data: { search: search },
                    success: function(response) {
                        $('tbody').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>
