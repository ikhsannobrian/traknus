<?php
include "config.php";

if (isset($_GET["delete"])) {
  $id = $_GET["delete"];
  $hapus = mysqli_query($conn, "DELETE FROM pengaduan WHERE id='$id'");
  if ($hapus) {
    echo "<script>
				alert('data anda telah dihapus!');
				document.location='tabel_admin.php';
			</script>";
  } else {
    echo "<script>
				alert('simpan data gagal!');
				document.location='tabel_admin.php';
			</script>";
  }
}
