<?php
ob_start();
include "config.php";

if (isset($_POST["simpan"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validasi password tidak mengandung petik satu
    if (strpos($password, "'") !== false) {
        echo "<script>
                  alert('Password tidak boleh mengandung petik satu!');
                  document.location='form_admin.php';
              </script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $simpan = mysqli_query($conn, "INSERT INTO admin VALUES('','$username','$hashed_password')");
        if ($simpan) {
            echo "<script>
                      alert('Akun admin berhasil dibuat!');
                      document.location='form_admin.php';
                  </script>";
        } else {
            echo "<script>
                      alert('Akun admin gagal dibuat!');
                      document.location='form_admin.php';
                  </script>";
        }
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
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <!-- Logo Title Bar -->
    <link rel="icon" href="image/Traktor Nusantara Logo - Vertikal RGB.png" type="image/x-icon" />
    <!-- My style -->
    <link rel="stylesheet" href="style_infra.css">
    <title>Admin</title>
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
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="">Form Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="form_teknisi.php">Form Teknisi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="akun_admin.php">Akun Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="akun_teknisi.php">Akun Teknisi</a>
                    </li>
                </ul>
                <div>
                    <a href="halamanadmin.php" class="btn btn-primary">Home</a>
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
                        <h3 class="fw-bold">Create Account for Admin</h3>
                        <p class="text-secondary">Admin can create account for handle their tasks</p>
                    </div>
                    <!-- Start Form -->
                    <form method="post" onsubmit="return validateForm()">
                        <label for="">Username</label>
                        <div class="input-group mb-3">
                            <input type="name" class="form-control form-control-lg fs-6" placeholder="masukan username anda" name="username" required />
                        </div>
                        <label for="">Password</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg fs-6" placeholder="Masukan password anda" name="password" required />
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3" name="simpan">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JavaScript Validation -->
    <script>
        function validateForm() {
            const password = document.getElementsByName('password')[0].value;
            if (password.includes("'")) {
                alert('Password tidak boleh mengandung petik satu!');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
<?php
mysqli_close($conn);
ob_end_flush();
?>