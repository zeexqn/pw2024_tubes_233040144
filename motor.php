

<!-- public/index.php -->
<?php
include 'koneksi.php';
include 'source.php';

$query = "SELECT * FROM berita WHERE kategori = 'motor'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Motor</title>
    <style>
            
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
    <link href="css/kategori.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <main class="container content mt-5">
            <div class="row mb-2">
                <h1 class="pb-4 mb-4 fst-italic border-bottom">Berita Seputar Motor</h1>
                <?php foreach ($result as $index => $item): ?>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrap.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
