<?php
ob_start();
include "config.php";
/**Input Data**/
if (isset($_POST["simpan"])) {
  $nama = $_POST["nama"];
  $departemen = $_POST["departemen"];
  $kebutuhan = $_POST["kebutuhan"];
  $tanggal = $_POST["tanggal"];
  $penjelasan = $_POST["penjelasan"];
  $status = $_POST["status"];
  $image = $_POST["image"];

  mysqli_query($conn, "INSERT INTO pengaduan VALUES('','$nama','$departemen','$kebutuhan','$tanggal','$penjelasan','$status','$image')");
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
  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <!-- Logo Title Bar -->
  <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
  <!-- My style -->
  <link rel="stylesheet" href="style_infra.css" />
  <title>Form Pengaduan</title>
</head>

<body>
  <!-- Start Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item mx-2">
          </li>
        </ul>
        <div>
          <a href="login_teknisi.html" class="btn btn-primary">Teknisi</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- Start Form -->
  <div class="row vh-100 g-0">
    <div class="">
      <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
        <div class="col col-sm-6 col-lg-7 col-xl-6">
          <!-- Start Logo  -->
          <a href="#" class="d-flex justify-content-center mb-4"><img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" />
          </a>
          <!-- End Logo -->
          <div class="text-center">
            <h3 class="fw-bold">Form Pengaduan</h3>
            <p class="text-secondary">Maintenance & Repair</p>
          </div>
          <!-- Start Form -->
          <form method="post">
            <label for="">Nama</label>
            <div class="input-group mb-3">
              <input type="name" class="form-control form-control-lg fs-6" placeholder="Masukan nama anda" name="nama" />
            </div>
            <label for="">Departemen</label>
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="departemen" id="departemen">
                <option value=""></option>
                <option value="General Affair">General Affair</option>
                <option value="Material Handling">Material Handling</option>
                <option value="Marketing Communication">Marketing Communication</option>
              </select>
            </div>
            <label for="">Kebutuhan</label>
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="kebutuhan" id="kebutuhan">
                <option value=""></option>
                <option value="Repair">Repair</option>
                <option value="Maintenance">Maintenance</option>
              </select>
            </div>
            <label for="">Tanggal</label>
            <div>
              <input type="date" class="form-control form-control-lg fs-6 mb-3" name="tanggal" />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Penjelasan</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Jelaskan yang akan diperbaiki/maintenance" name="penjelasan"></textarea>
            </div>
            <label for="">Status</label>
            <div class="mb-3">
              <select class="form-select" aria-label="Default select example" name="status">
                <option value=""></option>
                <option value="Belum dikerjakan">Belum dikerjakan</option>
                <option value="Sudah dikerjakan">Sudah dikerjakan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="">Bukti</label>
              <input class="form-control" type="file" id="formFileMultiple" multiple name="image">
              <p style="color: red;">*Kosongkan jika belum dikerjakan</p>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3" name="simpan">Simpan</button>
          </form>
          <!-- End Form -->
          <div class="text-center">
            <small>Apakah ingin kembali?
              <a href="index.php" class="fw-bold">Home</a></small>
          </div>
        </div>
      </div>
    </div>
    <!-- End Form -->
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