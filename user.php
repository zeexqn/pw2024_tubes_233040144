<?php
include 'koneksi.php';
include 'source.php';



if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

$query = "SELECT * FROM berita ORDER BY tanggal DESC";
$sql = mysqli_query($conn, $query);

$berita = [];
if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $berita[] = $row;
    }
} else {
    echo "Tidak ada berita ditemukan.";
}


// Query untuk mengambil satu data terbaru dari kategori Mobil
$query_mobil = "SELECT * FROM berita WHERE kategori='Mobil' ORDER BY tanggal DESC LIMIT 1";
$sql_mobil = mysqli_query($conn, $query_mobil);
$mobil = $sql_mobil->fetch_assoc();

// Query untuk mengambil satu data terbaru dari kategori Motor
$query_motor = "SELECT * FROM berita WHERE kategori='Motor' ORDER BY tanggal DESC LIMIT 1";
$sql_motor = mysqli_query($conn, $query_motor);
$motor = $sql_motor->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Zto</title>
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
        .full-height {
        height: 100%;
        object-fit: cover;   
        }
        .card {
        transition: background-color 0.3s ease; /* Transisi yang halus saat berubah warna */
    }

    .card:hover {
        background-color: #f8f9fa; /* Warna latar belakang saat di-hover */
    }
    .judul{
    -webkit-text-stroke: 1px #F8F8F8;
	text-shadow: 0px 1px 4px #23430C;
    }

    /*footer*/
    
.copyright{
    width: 100%;
    text-align: center;
    padding: 25px 0;
    background: darkgray;
    font-weight:  300;
    margin-top: 20px;
    color: #130e0e;
    font-weight: bold;
}

.copyright i{
    color: plum;
}

.footer-clean {
    padding:50px 0;
    background-color: darkgray;
    color: black;
  }
  
  .footer-clean h3 {
    margin-top:0;
    margin-bottom:12px;
    font-weight:bold;
    font-size:16px;
  }
  
  .footer-clean ul {
    padding:0;
    list-style:none;
    line-height:1.6;
    font-size:14px;
    margin-bottom:0;
  }
  
  .footer-clean ul a {
    color:inherit;
    text-decoration:none;
    opacity:0.8;
  }
  
  .footer-clean ul a:hover {
    opacity:1;
  }
  
  .footer-clean .item.social {
    text-align:right;
  }
  
  @media (max-width:767px) {
    .footer-clean .item {
      text-align:center;
      padding-bottom:20px;
    }
  }
  
  @media (max-width: 768px) {
    .footer-clean .item.social {
      text-align:center;
    }
  }
  
  .footer-clean .item.social > i {
    font-size:24px;
    width:40px;
    height:40px;
    line-height:40px;
    display:inline-block;
    text-align:center;
    border-radius:50%;
    border:1px solid #ccc;
    margin-left:10px;
    margin-top:22px;
    color:inherit;
    opacity:0.75;
  }
  
  .footer-clean .item.social > a:hover {
    opacity:0.9;
  }
  
  @media (max-width:991px) {
    .footer-clean .item.social > i {
      margin-top:40px;
    }
  }
  
  @media (max-width:767px) {
    .footer-clean .item.social > i {
      margin-top:10px;
    }
  }
  
  .footer-clean .copyright {
    margin-top:14px;
    margin-bottom:0;
    font-size:13px;
    opacity:0.6;
  }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&amp;display=swap" rel="stylesheet" />
    <link href="css/blog.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
    <main class="container">
        <div class="p-1 p-md-2 mb-1 text-white rounded bg-dark">
            <div class="col-md-12 px-0">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach (array_slice($berita, 0, 3) as $index => $image): ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>"></li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach (array_slice($berita, 0, 3) as $index => $image): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <a href="detail.php?detail=<?php echo $image['id_berita']; ?> ">
                                    <img src="img/<?php echo htmlspecialchars($image['foto']); ?>" style="width: 100%; height: 500px;" class="d-block w-100" alt="...">
                                </a>
                                <div class="carousel-caption text-start">
                                    <a href="detail.php?detail=<?php echo $image['id_berita']; ?>">
                                        <h1 class="judul text-light color-white"><?php echo htmlspecialchars($image['judul']); ?></h1>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4 ">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-225 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Mobil</strong>
                        <div class="mb-1 text-muted"><?php echo htmlspecialchars($mobil['tanggal']); ?></div>
                        <h5 class="mb-0"><?php echo htmlspecialchars($mobil['judul']); ?></h5>
                        
                        <a href="detail.php?detail=<?php echo $mobil['id_berita']; ?>" class="stretched-link"></a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="img/<?php echo htmlspecialchars($mobil['foto']); ?>" class="bd-placeholder-img" style="width: 300px; height: 200px;" alt="...">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-225 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Motor</strong>
                        <div class="mb-1 text-muted"><?php echo htmlspecialchars($motor['tanggal']); ?></div>
                        <h5 class="mb-0"><?php echo htmlspecialchars($motor['judul']); ?></h5>
                        
                        <a href="detail.php?detail=<?php echo $motor['id_berita']; ?>" class="stretched-link"></a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="img/<?php echo htmlspecialchars($motor['foto']); ?>" class="bd-placeholder-img" width="300px" height="200px" alt="...">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-md-8">
                <h2 class="pb-4 mb-4 fst-italic border-bottom">Otomotif Terkini</h2>

                <?php foreach ($berita as $index => $item): ?>
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/<?php echo htmlspecialchars($item['foto']); ?>"  class="img-fluid rounded-start full-height" alt="...">
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

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="user.php">Refresh</a>
                </nav>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Website Zto (Zeina Otomotif) dibuat secara sukarela untuk anda pecinta dunia Otomotif. Website ini menyediakan banyak berita - berita terbaru dan ter update seputar dunia Otomotif.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Kategori</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="kategori/mobil.php">Mobil</a></li>
                            <li><a href="kategori/motor.php">Motor</a></li>
                            <li><a href="kategori/balap.php">Balap</a></li>
                            <li><a href="kategori/lainnya.php">Lainnya</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Sosial Media</h4>
                        <ol class="list-unstyled">
                            <li><a href="https://github.com/" target="_blank">GitHub</a></li>
                            <li><a href="https://www.instagram.com/" target="_blank">Instagram</a></li>
                            <li><a href="https://x.com/" target="_blank">X</a></li>
                            <li><a href="https://web.facebook.com" target="_blank">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="footer-clean">
      <footer>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-sm-4 col-md-3 item">
                      <h3>Services</h3>
                      <ul>
                          <li><a href="#">Web design</a></li>
                          <li><a href="#">Development</a></li>
                          <li><a href="#">Hosting</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-4 col-md-3 item">
                      <h3>About</h3>
                      <ul>
                          <li><a href="#">Company</a></li>
                          <li><a href="#">Team</a></li>
                          <li><a href="#">Legacy</a></li>
                      </ul>
                  </div>
                  <div class="col-sm-4 col-md-3 item">
                      <h3>Careers</h3>
                      <ul>
                          <li><a href="#">Job openings</a></li>
                          <li><a href="#">Employee success</a></li>
                          <li><a href="#">Benefits</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 item social"><a href="https://www.instagram.com/arhab.hijab?igsh=anUwbDZmeGUybWF3"></a><i class='bx bxl-instagram'></i></i></a><a href="#"></a><i class='bx bxl-whatsapp' ></i></i><i class='bx bx-envelope' ></i></i></a><i class='bx bxl-twitter' ></i></i>
                      <p class="copyright">Zoto.com © 2023</p>
                  </div>
              </div>
          </div>
      </footer>
  </div>
  
</body>
</html>
