<?php
include 'koneksi.php';
include 'source.php';

// Mengambil kata kunci pencarian dari query string
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Query untuk mengambil data berdasarkan kata kunci pencarian dan kategori
$query = "SELECT * FROM berita WHERE judul LIKE '%$search%'";
if (!empty($category)) {
    $query .= " AND kategori='$category'";
}
$query .= " ORDER BY tanggal DESC";
$sql = mysqli_query($conn, $query);

$berita = [];
if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $berita[] = $row;
    }
} else {
    $message = "Tidak ada berita ditemukan.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Hasil Pencarian</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Hasil Pencarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .blog-footer {
            padding: 2.5rem 0;
            color: #727272;
            text-align: center;
            background-color: #f9f9f9;
            border-top: .05rem solid #e5e5e5;
        }
        .blog-footer p:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <main class="container content">
            <div class="row mb-2">
                <h1 class="pb-4 mb-4 fst-italic border-bottom">Hasil Pencarian Dari "<?php echo htmlspecialchars($search); ?></h1>
                <?php if (!empty($berita)): ?>
               
                <?php foreach ($berita as $index => $item): ?>
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/<?php echo htmlspecialchars($item['foto']); ?>" style="height: 170px;" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($item['judul']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars(substr($item['artikel'], 0, 100)); ?>...</p>
                                    <a href="detail.php?detail=<?php echo $item['id_berita']; ?>" class="stretched-link">Continue reading</a>
                                    <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($item['tanggal']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
        <footer class="blog-footer">
            <p>Website ini dibuat oleh <a href="https://www.instagram.com/z_qn11?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">@Zeina</a>.</p>
            <p><a href="#">Kembali ke atas</a></p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrap.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

