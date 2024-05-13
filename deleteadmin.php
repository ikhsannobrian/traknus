<?php
include "config.php";
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $hapus = mysqli_query($conn, "DELETE FROM admin WHERE id='$id'");
    if ($hapus) {
        echo "<script>
                    alert('akun teknisi telah dihapus!');
                    document.location='akun_admin.php';
                </script>";
    } else {
        echo "<script>
                    alert('hapus akun gagal!');
                    document.location='akun_admin.php';
                </script>";
    }
}
