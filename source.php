<?php
session_start();
if ($_SESSION['role'] == 'admin') {
  $dropdown_options = array(
      'Admin' => 'admin.php',
      'Profile' => 'profile.php',
      'Logout' => 'logout.php',
  );
} elseif ($_SESSION['role'] == 'user') {
  $dropdown_options = array(
      'Profile' => 'profile.php',
      'Logout' => 'logout.php',
  );
} else {
  $dropdown_options = array();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.0/examples/blog/"
    />

    <!-- Bootstrap core CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />

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
        .no-border {
            border: none !important;
            box-shadow: none;
            
        }

        .active-link {
        color: black !important;
        font-weight: bold;
      }
      }
    </style>

    <link
      href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap"
      rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/blog.css" rel="stylesheet" />
  </head>
  <body>

  <?php
  // Mendapatkan nama file saat ini
  $current_page = basename($_SERVER['PHP_SELF']);
?>

  <div>
      <header class="blog-header py-3 border-bottom bg-secondary">
        <div class="row flex-nowrap align-items-center justify-content-between">
          <div class="col-4 pt-1">
            <a class="link-secondary text-light" href="https://web.facebook.com">
            <i class="fa-brands fa-facebook"></i>
            Facebook
            </a>
            <a class="link-secondary ml-3 text-light" href="https://www.instagram.com/">
            <i class="fa-brands fa-instagram"></i>
            Instagram
            </a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="user.php">
            <img src="img/logo.png" width="160px" height="60px" alt="">
            </a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center justify-content-between ">
          <form class="form-inline border-bottom" method="GET" action="search.php">
                    <input class="form-control no-border" type="search" name="search" placeholder="Cari Berita ..." aria-label="Search">
                    <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo htmlspecialchars($_SESSION['username']); ?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <?php foreach ($dropdown_options as $option => $link) { ?>
      <li><a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $option; ?></a></li>
    <?php } ?>
  </ul>
</div>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-center">
        <button type="button" class="btn btn-outline-secondary"><a class="p-2 link-secondary <?php echo $current_page == 'user.php' ? 'active-link' : ''; ?> " href="user.php">Home</a></button>
        <button type="button" class="btn btn-outline-secondary"> <a class="p-2 link-secondary <?php echo $current_page == 'mobil.php' ? 'active-link' : ''; ?>" href="mobil.php">Mobil</a></button>
        <button type="button" class="btn btn-outline-secondary"><a class="p-2 link-secondary <?php echo $current_page == 'motor.php' ? 'active-link' : ''; ?>" href="motor.php">Motor</a></button>
        <button type="button" class="btn btn-outline-secondary"><a class="p-2 link-secondary <?php echo $current_page == 'balap.php' ? 'active-link' : ''; ?>" href="balap.php">balapan</a></button>
        <button type="button" class="btn btn-outline-secondary"> <a class="p-2 link-secondary <?php echo $current_page == 'lainnya.php' ? 'active-link' : ''; ?>" href="lainnya.php">lainnya</a></button>
        </nav>
      </div>
    </div>

    
   

    <!-- bootsrap -->

    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    >
  </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    


    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/b566bc1f7a.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
