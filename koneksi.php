<?php
error_reporting(0);
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$database = "kopertais";

mysql_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysql_select_db("kopertais") or die("Tidak ada database yang dipilih!");
?>