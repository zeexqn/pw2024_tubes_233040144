<?php
include 'koneksi.php';
include 'source.php';

$detail = $_GET['detail'];

$query = "SELECT * FROM berita WHERE id_berita='$detail'";
$hasil = $conn->query($query);
$row = $hasil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .container-satu {
            background-color: silver;
            padding: 20px;
            margin: 0;
        }       
        .copyright {
            width: 100%;
            text-align: center;
            padding: 25px 0;
            background: darkgray;
            font-weight: 300;
            margin-top: 20px;
            color: #130e0e;
            font-weight: bold;
        }

        .copyright i {
            color: plum;
        }

        .footer-clean {
            padding: 50px 0;
            background-color: darkgray;
            color: black;
        }

        .footer-clean h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer-clean ul {
            padding: 0;
            list-style: none;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer-clean ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .footer-clean ul a:hover {
            opacity: 1;
        }

        .footer-clean .item.social {
            text-align: right;
        }

        @media (max-width: 767px) {
            .footer-clean .item {
                text-align: center;
                padding-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .footer-clean .item.social {
                text-align: center;
            }
        }

        .footer-clean .item.social > i {
            font-size: 24px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin-left: 10px;
            margin-top: 22px;
            color: inherit;
            opacity: 0.75;
        }

        .footer-clean .item.social > a:hover {
            opacity: 0.9;
        }

        @media (max-width: 991px) {
            .footer-clean .item.social > i {
                margin-top: 40px;
            }
        }

        @media (max-width: 767px) {
            .footer-clean .item.social > i {
                margin-top: 10px;
            }
        }

        .footer-clean .copyright {
            margin-top: 14px;
            margin-bottom: 0;
            font-size: 13px;
            opacity: 0.6;
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container-satu">
    <div>    
        <h1><?php echo $row['judul']; ?></h1>
    </div>
    <div>
        <figure class="mt-4 mb-5">
            <figcaption class="blockquote fs-6">
                <?php echo $row['tanggal']; ?><cite title="Source Title"><br><?php echo $row['penulis']; ?></cite>
            </figcaption>
        </figure>
    </div>
    <div>
        <img class="img-fluid" src="img/<?php echo $row['foto']; ?>" style="height: 500px; width: 100%;">
    </div>
    <div class="mt-5">
        <p style="text-indent: 45px; font-size: 18px;"><?php echo $row['artikel']; ?></p>
    </div>
</div>

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
                  <div class="col-lg-3 item social"><a href=""></a><i class='bx bxl-instagram'></i></i></a><a href="#"></a><i class='bx bxl-whatsapp' ></i></i><i class='bx bx-envelope' ></i></i></a><i class='bx bxl-twitter' ></i></i>
                      <p class="copyright">Zoto.com © 2023</p>
                  </div>
              </div>
          </div>
      </footer>

</body>
</html>
