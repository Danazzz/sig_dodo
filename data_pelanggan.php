<?php include "header.php"; ?>
<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
        <h1 class="text-white">
          Data Pelanggan
        </h1>
        <p class="text-white link-nav">Halaman ini memuat informasi Pelanggan Santi Guna</p>
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<div class="content-wrapper">
<!-- Search Bar -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="type" name="cari" class="form-control form-control-lg" placeholder="Cari Nama Pelanggan...">
                        <div class="input-group-append">
                            <button type="submit" name="search" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 info-left">
        <img class="img-fluid" src="img/about/info-img.jpg" alt="">
      </div>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $cari = trim(mysqli_real_escape_string($koneksi, $_POST['cari']));
        if($cari != ''){
          $query= "SELECT * FROM pelanggan WHERE nama LIKE '%$cari%'";
        }
      ?>
      <div class="col-lg-12 info-right" data-aos="fade-up" data-aos-delay="100">
        <div class="col-md-12">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
            </div>
            <?php
            $sql=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
            if(mysqli_num_rows($sql)==0) { ?>
              <div class="d-flex justify-content-center">
                <h4>Data Tidak Ditemukan.</h4>
              </div>
            <?php
            }
            if(mysqli_num_rows($sql)>0){ ?>
              <div class="panel-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="30%">Nama Pelanggan</th>
                    <th width="50%">Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
              <?php
              while($item=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><?= $item['nama']; ?></td>
                  <td><?= $item['alamat']; ?></td>
                  <td class="ctr">
                    <div class="btn-group">
                      <a href="detail.php?id=<?= $item['id']; ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn btn-primary">
                        <i class="fa fa-map-marker"> </i> Detail dan Lokasi</a>&nbsp;
                    </div>
                  </td>
                </tr>
            <?php
              }
            }
        } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- End about-info Area -->
<?php include "footer.php"; ?>