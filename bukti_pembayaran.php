<?php include "header.php";

function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFIle = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  $formatGambar = ['jpg','jpeg','png'];
  $format = explode('.', $namaFile);
  $format = strtolower(end($format));
  if($error === 4){
      echo "<script>alert ('Gambar tidak ada!')</script>";
      return false;
  }
  if(!in_array($format,$formatGambar)){
      echo "<script>alert ('yang anda upload bukan gambar!')</script>";
      return false;
  }
  if($ukuranFIle > 10000000){
      echo "<script>alert ('Ukuran terlalu besar!')</script>";
      return false;
  }
  $namafilebaru = uniqid();
  $namafilebaru .= '.';
  $namafilebaru .= $format; 
  move_uploaded_file($tmpName,'bukti/' . $namafilebaru);
  return $namafilebaru;
}

if (isset($_POST['kirim'])){
  $gambar = upload();
  if(!$gambar){
      return false;
  }
}
mysqli_query($koneksi,"INSERT INTO pembayaran (bukti) VALUES ( '$gambar')") or die (mysqli_error($koneksi));

?>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Log-In Pelanggan
        </h1>
        <p class="text-white link-nav">Halaman Log-in untuk pelanggan Santi Guna. Bagi yang belum daftar sebagai pelanggan mohon menghubungi admin</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<div class="content-wrapper">
<!-- Login -->
  <section class="content">
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
          <form action="" method="post" enctype="multipart/form-data">
          <input name="id" type="hidden" id="id" class="form-control" value="<?php echo $data['id']; ?>" readonly />
            <div class="form-group">
              <label class="col-sm-12 col-sm-12 control-label">Pilih foto untuk diupload:</label>
              <div class="col-sm-12">
                <input type="file" name="gambar" required="">
              </div>
            </div>
            <div class="col-sm-12">
              <input type="submit" name="kirim" value="KIRIM" class="btn btn-secondary btn-user btn-block">
            </div>
          </form>
        </div>
    </div>
  </section>
</div>

<!-- End about-info Area -->
<?php include "footer.php"; ?>