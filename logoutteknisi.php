<?php
include "config.php";
session_start();
$_SESSION["teknisi_id"];
$_SESSION["teknisi_username"];

unset($_SESSION["teknisi_id"]);
unset($_SESSION["teknisi_username"]);

session_unset();
session_destroy();

header("location:loginteknisi.php");
