<?php
// register.php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO user (username, password, role) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
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
  <title>Register</title>
</head>
<body>

<section class="custom-section gradient-custom">
  <div class="container custom-container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-light" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-4 mt-4">
              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="mb-5">Sudah punya akun? <a href="index.php" class="fw-bold">Login</a></p>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" id="username" name="username" class="form-control form-control-lg" />
                </div>
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                </div>
                <div class="form-outline form-white mb-4">
                  <label class="form-label" for="role">Role</label>
                  <select id="role" name="role" class="form-control form-control-lg">
                      <option value="user">User</option>
                    <option value="admin" disabled>Admin</option>
                  </select>
                </div>
                <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="submit">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
</body>
</html>

