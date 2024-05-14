<?php
ob_start();
session_start();
if (isset($_SESSION['admin_username'])) header("location:halamanadmin.php");
include "config.php";
/** Proses Login **/
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql_login = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

  if (mysqli_num_rows($sql_login) > 0) {
    $row_admin = mysqli_fetch_array($sql_login);
    $_SESSION['admin_id'] = $row_admin["id"];
    $_SESSION['admin_username'] = $row_admin["username"];
    header("location:halamanadmin.php");
  } else {
    header("location:loginadmin.php?failed");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <!-- Logo Title Bar -->
  <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
  <!-- box icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Login Admin</title>
  <style>
    .body {
      font-family: "poppins", "sans-serif";
      background-color: #fff;
    }

    .btn {
      font-size: 0.8rem;
      font-weight: 700;
    }

    .btn i {
      vertical-align: text-top;
    }

    .bg-holder {
      position: absolute;
      width: 100%;
      min-height: 100%;
      top: 0;
      left: 0;
      background-size: conver;
      background-position: center;
      background-repeat: none;
    }

    .divider-content-center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding-left: 0.5rem;
      padding-right: 0.5rem;
      background-color: #fff;
      font-size: 0.8rem;
      font-weight: 500;
      color: #999;
    }

    .divider {
      margin: 2rem 0;
    }

    .btn-outline-custom {
      color: #31374a;
      border: #ddd;
    }

    .btn-outline-custom:hover {
      color: #31374a;
      border: #eee;
      background-color: #eee;
    }
  </style>
</head>

<body>
  <div class="row vh-100 g-0">
    <!-- Left Side -->
    <div class="col-lg-6 position-relative d-none d-lg-block">
      <div class="bg-holder" style="background-image: url(image/gedung\ traknus.jpg)"></div>
      <!-- End Left Side -->
    </div>
    <!-- Start Right Side -->
    <div class="col-lg-6">
      <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
          <!-- Start Logo  -->
          <a href="#" class="d-flex justify-content-center mb-4"><img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" />
          </a>
          <!-- End Logo -->
          <div class="text-center mb-5">
            <h3 class="fw-bold">Log In Admin</h3>
            <p class="text-secondary">Get access to your account</p>
          </div>
          <!-- Start Social Login -->
          <button class="btn btn-lg btn-outline-secondary btn-outline-custom w-100">
            <i class="bx bxl-google text-danger me-1 fs-6"></i>Login with
            Google
          </button>
          <?php if (isset($_GET["failed"])) { ?>
            <div class="alert alert-danger alert-dismissable">
              <p>Username atau password yang anda masukan salah</p>
            </div>
          <?php } ?>
          <!-- End Social Login -->
          <!-- Start Divider -->
          <div class="position-relative">
            <hr class="text-secondary divider" />
            <div class="divider-content-center">or</div>
          </div>
          <!-- End Divider -->
          <!-- Start Form -->
          <form action="#" method="post" role="form">
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="bx bxs-user"></i>
              </span>
              <input type="username" class="form-control form-control-lg fs-6" name="username" placeholder="Username" required />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="bx bxs-lock-alt"></i>
              </span>
              <input type="password" class="form-control form-control-lg fs-6" name="password" placeholder="Password" />
            </div>
            <button class="btn btn-primary btn-lg w-100 mb-3" name="submit">Login</button>
          </form>
          <!-- End Form -->
          <div class="text-center">
            <small>Apakah ingin kembali?
              <a href="index.php" class="fw-bold">Home</a></small>
          </div>
        </div>
      </div>
    </div>
    <!-- End Right Side -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>