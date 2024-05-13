<?php
include "config.php";
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $hapus = mysqli_query($conn, "DELETE FROM teknisi WHERE id='$id'");
    if ($hapus) {
        echo "<script>
                    alert('akun teknisi telah dihapus!');
                    document.location='akun_teknisi.php';
                </script>";
    } else {
        echo "<script>
                    alert('hapus akun gagal!');
                    document.location='akun_teknisi.php';
                </script>";
    }
}
