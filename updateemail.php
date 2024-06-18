<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $email = $_GET["email"];
    $tanggal = $_GET["tanggal"];
    $penjelasan = $_GET["penjelasan"];
    $lokasi = $_GET["lokasi"];

    // Encode parameters to be URL safe
    $subject = rawurlencode("Pengaduan kerusakan");
    $body = rawurlencode("Pengaduan anda sudah dikerjakan\nTanggal: $tanggal\nPenjelasan: $penjelasan\nLokasi: $lokasi");

    // Redirect to mailto: URL
    header("Location: mailto:$email?subject=$subject&body=$body");

    // Optional: Update database to indicate that the email has been sent
    mysqli_query($conn, "UPDATE laporan SET email_sent='1' WHERE id='$id'");
    exit();
}
