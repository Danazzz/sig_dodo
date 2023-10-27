<?php
require_once "../koneksi.php";

$id = @$_GET['id'];
$sql = "SELECT * FROM form
WHERE id = '$id'
";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$currentDateTime = date('Y-m-d H:i:s');

mysqli_query($koneksi, "UPDATE pembayaran SET status = '1' WHERE id = '$id'") or die(mysqli_error($koneksi));
echo "<script>alert('Pembayaran pelanggan telah diterima!');window.location='../index.php';</script>";