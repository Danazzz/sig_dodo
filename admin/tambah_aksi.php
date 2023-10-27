<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // menginput data ke database
    mysqli_query($koneksi, "insert into pelanggan values('','$nama','$alamat','$latitude','$longitude')");
    header("location:tampil_data.php");
}
