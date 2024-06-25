<?php
ob_start();
include "config.php";
/**Input Data**/
if (isset($_POST["simpan"])) {
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $departemen = $_POST["departemen"];
  $cabang = $_POST["cabang"];
  $kebutuhan = $_POST["kebutuhan"];
  $tanggal = $_POST["tanggal"];
  $penjelasan = $_POST["penjelasan"];
  $lokasi = $_POST["lokasi"];
  $wkt_mulai = "00.00";
  $wkt_akhir = "00.00";
  $status = "Belum dikerjakan"; // Set default status

  // Validate that the name contains only letters and spaces
  if (!preg_match("/^[a-zA-Z\s]*$/", $nama)) {
    echo "<script>
              alert('Hanya boleh mengandung huruf dan spasi!');
              document.location='infrastruktur.php';
          </script>";
  } elseif (!preg_match("/^[a-zA-Z\s]*$/", $lokasi)) {
    echo "<script>
              alert('Lokasi hanya boleh mengandung huruf dan spasi!');
              document.location='infrastruktur.php';
          </script>";
  } else {
    $simpan = mysqli_query($conn, "INSERT INTO laporan (nama, email, departemen, cabang, kebutuhan, tanggal, penjelasan, lokasi, wkt_mulai, wkt_akhir, status) VALUES('$nama','$email','$departemen','$cabang','$kebutuhan','$tanggal','$penjelasan','$lokasi','$wkt_mulai','$wkt_akhir','$status')");
    if ($simpan) {
      echo "<script>
                alert('Data Anda berhasil disimpan!');
                document.location='infrastruktur.php';
            </script>";
    } else {
      echo "<script>
                alert('Simpan data gagal!');
                document.location='infrastruktur.php';
            </script>";
    }
  }
}
mysqli_close($conn);
ob_end_flush();
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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700&display=swap" rel="stylesheet" />
  <!-- Logo Title Bar -->
  <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
  <!-- My style -->
  <link rel="stylesheet" href="" />
  <title>Form Pengaduan</title>
  <style>
    .tulisan {
      font-size: 15px;
    }

    .form-select {
      font-size: 14px;
      padding: 8px;
    }

    .form-select option {
      white-space: nowrap;
      padding: 10px;
    }
  </style>
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
          <a href="loginteknisi.php" class="btn btn-primary">Teknisi</a>
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
          <a href="#" class="d-flex justify-content-center mb-4"><img src="image/Traktor Nusantara Logo - Horizontal RGB.png" alt="" width="200" /></a>
          <!-- End Logo -->
          <div class="text-center">
            <h3 class="fw-bold">Form Pengaduan</h3>
            <p class="text-secondary">Maintenance & Repair</p>
          </div>
          <!-- Start Form -->
          <form method="post" class="tulisan">
            <label for="name">Nama</label>
            <div class="input-group mb-3">
              <input type="text" id="name" class="form-control form-control-lg fs-6" placeholder="Masukan nama anda" name="nama" pattern="[A-Za-z\s]+" oninput="this.setCustomValidity(''); if (!this.validity.valid) this.setCustomValidity('Please enter letters and spaces only.')" required>
            </div>
            <label for="">Email</label>
            <div class="input-group mb-3">
              <input type="email" class="form-control form-control-lg fs-6" placeholder="Masukan email kantor anda" name="email" required />
            </div>
            <label for="">Departemen</label>
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="departemen" id="departemen" required>
                <option value=""></option>
                <option value="General Affair">General Affair</option>
                <option value="Material Handling Parts">Material Handling Parts</option>
                <option value="Product Management 1">Product Management 1</option>
                <option value="Material Handling Service">Material Handling Service</option>
                <option value="Material Handling Technical Support">Material Handling Technical Support</option>
                <!-- Other options... -->
              </select>
            </div>
            <label for="">Cabang</label>
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="cabang" id="kebutuhan" required>
                <option value=""></option>
                <option value="TN-HO">TN-HO</option>
                <option value="SHN">SHN</option>
              </select>
            </div>
            <label for="">Kebutuhan</label>
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name="kebutuhan" id="kebutuhan" required>
                <option value=""></option>
                <option value="Repair">Repair</option>
                <option value="Maintenance">Maintenance</option>
              </select>
            </div>
            <label for="">Tanggal Pengaduan</label>
            <div>
              <input type="date" class="form-control form-control-lg fs-6 mb-3" name="tanggal" required />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Penjelasan</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Jelaskan yang akan diperbaiki/maintenance" name="penjelasan" required></textarea>
            </div>
            <label for="">Lokasi</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg fs-6" placeholder="Masukan lokasi kerusakan/maintenance" name="lokasi" pattern="[A-Za-z\s]+" oninput="this.setCustomValidity(''); if (!this.validity.valid) this.setCustomValidity('Please enter letters and spaces only.')" required>
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
  </div>
  <!-- End Form -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>