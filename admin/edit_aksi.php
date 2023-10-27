<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form

if(isset($_POST['biodata'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    mysqli_query($koneksi, "update pelanggan set nama='$nama', alamat='$alamat', latitude='$latitude', longitude='$longitude' where id='$id'") or die (mysqli_error($koneksi));

    echo "<script>alert('Data berhasil diubah!');window.location='detail_data.php?id=$id';</script>";
}

if(isset($_POST['tagihan'])){
    $idpelanggan = $_POST['idpelanggan'];
    $tgl = $_POST['tgl'];
    $explode= explode("-", $tgl);
    $thn= $explode[0];
    $bln= $explode[1];
    $har= $explode[2];
    $jml = $_POST['jml'];

    $data = mysqli_query($koneksi, "select * from pembayaran where idpelanggan='$idpelanggan' and bulan='$bln' and tahun='$thn' and tgl='$har'");
    $cek = mysqli_num_rows($data);

    if ($cek == 0) {

        mysqli_query($koneksi, "INSERT INTO pembayaran VALUES ('','$idpelanggan','$bln','$thn','$har','$jml','1')") or die (mysqli_error($koneksi));
        echo "<script>alert('Data berhasil ditambah!');window.location='detail_data.php?id=$idpelanggan';</script>";
    } else {
        echo "<script>alert('Data dibulan dan tahun tersebut sudah ada!');window.location='detail_data.php?id=$idpelanggan';</script>";
    }
}

if(isset($_POST['editpembayaran'])){
    $idpelanggan = $_POST['idpelanggan'];
    $id = $_POST['id'];
    $tgl = $_POST['tgl'];
    $explode= explode("-", $tgl);
    $thn= $explode[0];
    $bln= $explode[1];
    $har= $explode[2];
    $jml = $_POST['jml'];
    $ket = $_POST['ket'];

    $data = mysqli_query($koneksi, "select * from pembayaran where idpelanggan='$idpelanggan' and id='$id' and bulan='$bln'");
    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        mysqli_query($koneksi, "update pembayaran set tahun='$thn', tgl='$har', jml='$jml', ket='$ket' where idpelanggan='$idpelanggan' and id='$id'") or die (mysqli_error($koneksi));
        echo "<script>alert('Data berhasil diubah!');window.location='detail_data.php?id=$idpelanggan';</script>";
    } elseif($cek > 0)  {
        echo "<script>alert('Data tidak berhasil diubah!');window.location='detail_data.php?id=$idpelanggan';</script>";
    }
}