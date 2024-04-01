<?php
ob_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <!-- My style -->
  <link rel="stylesheet" href="style_index.css" />
  <!-- Logo Title Bar -->
  <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
  <title>General Affair</title>
</head>

<body>
  <!-- start navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" />
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-3">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link" href="infrastruktur.php">Infrastruktur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="#">Ruangan Meeting</a>
          </li>
        </ul>
        <div>
          <a href="login_admin.html" class="btn btn-primary">Admin</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End navbar -->
  <!-- Start Hero Section -->
  <section id="hero">
    <div class="container h-100">
      <div class="row h-100"></div>
      <div class="col-md-6 hero-tagline">
        <h1>General Affair</h1>
        <p>
          Departemen <span class="fw-bold">General Affair</span> melakukan
          beberapa hal yaitu repair & maintenance, administrasi & asset,
          operational expand & housekeeping
        </p>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>