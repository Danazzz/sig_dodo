<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
$pelanggan = mysqli_query($koneksi, "delete from pelanggan where id='$id'");
$pembayaran = mysqli_query($koneksi, "delete from pembayaran where id='$id'");
if ($pelanggan AND $pembayaran) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'tampil_data.php'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'tampil_data.php'</script>";
}
