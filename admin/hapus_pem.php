<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pembayaran where id = '$id'");
$data  = mysqli_fetch_array($query);
$idpelanggan = $data['idpelanggan'];
// menghapus data dari database
$pembayaran = mysqli_query($koneksi, "delete from pembayaran where id='$id'");
if ($pembayaran) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location = 'detail_data.php?id=$idpelanggan'</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!'); window.location = 'detail_data.php?id=$idpelanggan'</script>";
}
