<?php
include 'koneksi.php';
include 'source.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
    
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .gradient-custom {
      background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
      background-attachment: fixed;
    }
    .custom-section {
      min-height: 80vh; /* Reduce height */
      padding: 2rem 0; /* Add padding to the section */
    }
    .custom-container {
      margin-bottom: 1rem; /* Add margin bottom */
    }
  </style>
  <title>Profile</title>
</head>
<body>

<section class="custom-section gradient-custom">
  <div class="container custom-container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-4 mt-4">
              <h2 class="fw-bold mb-2 text-uppercase">Profile</h2>
              <p class="mb-5">Selamat datang, <?php echo htmlspecialchars($username); ?>!</p>
              <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
              <p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>
              <a href="logout.php" class="btn btn-outline-dark btn-lg px-5">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous
