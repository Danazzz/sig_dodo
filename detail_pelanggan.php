<?php include "header.php"; ?>
<?php
$id = $_GET['id'];
include_once "ambildata_id.php";
include_once "ambildata_id_.php";
$obj = json_decode($data);
$objj = json_decode($dataa);
$bulan = "";
$tahun = "";
$tgl = "";
$jml = "";
$ket = "";
$idpem = "";
$lat = "";
$long = "";
$nama = "";
$alamat = "";
foreach ($obj->results as $item) {
  $idpem .= $item->idpem;
  $bulan .= $item->bulan;
  $tahun .= $item->tahun;
  $tgl .= $item->tgl;
  $jml .= $item->jml;
  $ket .= $item->ket;
  $status .= $item->status;
}
foreach ($objj->results as $item) {
  $lat .= $item->latitude;
  $long .= $item->longitude;
  $nama .= $item->nama;
  $alamat .= $item->alamat;
}

$title = "Detail dan Lokasi : " . $nama;
//include_once "header.php"; 
?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap"></script>

<script>
  function initialize() {
    var myLatlng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
    var mapOptions = {
      zoom: 13,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var contentString = '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h1 id="firstHeading" class="firstHeading"><?php echo $nama ?></h1>' +
      '<div id="bodyContent">' +
      '<p><?php echo $alamat ?></p>' +
      '</div>' +
      '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon: 'img/markermap.png'
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- start banner Area -->
<section class="about-banner relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12">
      </div>
    </div>
  </div>
</section>
<!-- End banner Area -->
<!-- Start about-info Area -->
<section class="about-info-area section-gap">
  <div class="container" style="padding-top: 120px;">
    <div class="row">
      <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
        <div class="panel panel-info panel-dashboard">
          <div class="row panel-heading centered pb-2">
            <h2 class="panel-title pl-3 pr-5"><strong>Detail Pembayaran</strong></h4>
            <div class="pl-5 pt-2">
              <a href="bukti_pembayaran.php" class="btn-sm btn-secondary">Kirim Bukti Pembayaran</a>
            </div>
          </div>
          <div class="panel-body">
            <?php
              $biodata=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id = $id") or die(mysqli_error($koneksi));
            ?>
            <table class="table table-hover table-bordered">

              <tr>
                  <td>Nama</td>
                  <td><?php echo $nama; ?></td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td><?php echo $alamat; ?></td>
              </tr>
              <tr>
                  <td>Latitude</td>
                  <td><?php echo $lat; ?></td>
              </tr>
              <tr>
                  <td>Longitude</td>
                  <td><?php echo $long; ?></td>
              </tr>
          </table>
            <table class="table table-hover table-bordered">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Bulan</th>
                      <th>Tanggal</th>
                      <th>Tahun</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                  </tr>
              </thead>
              <tbody>       
              <?php
              $no=1;
              $sql=mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE id = $id") or die(mysqli_error($koneksi));
              while($item=mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                      <td><?= $no++ ?></td>

                      <?php
                      if($item['bulan'] == 1){?>
                          <td>Januari</td>
                      <?php
                      } elseif ($item['bulan'] == 2){?>
                          <td>Februari</td>
                      <?php
                      } elseif ($item['bulan'] == 3){?>
                          <td>Maret</td>
                      <?php
                      } elseif ($item['bulan'] == 4){?>
                          <td>April</td>
                      <?php
                      } elseif ($item['bulan'] == 5){?>
                          <td>Mei</td>
                      <?php
                      } elseif ($item['bulan'] == 6){?>
                          <td>Juni</td>
                      <?php
                      } elseif ($item['bulan'] == 7){?>
                          <td>Juli</td>
                      <?php
                      } elseif ($item['bulan'] == 8){?>
                          <td>Agustus</td>
                      <?php
                      } elseif ($item['bulan'] == 9){?>
                          <td>September</td>
                      <?php
                      } elseif ($item['bulan'] == 10){?>
                          <td>Oktober</td>
                      <?php
                      } elseif ($item['bulan'] == 11){?>
                          <td>November</td>
                      <?php
                      } elseif ($item['bulan'] == 12){?>
                          <td>Desember</td>
                      <?php
                      }

                      if($item['tgl'] == 0){?>
                          <td></td>
                      <?php
                      } elseif ($item['tgl'] != 0){?>
                          <td><?= $item['tgl']; ?></td>
                      <?php
                      }

                      if($item['tahun'] == 0){?>
                          <td></td>
                      <?php
                      } elseif ($item['tahun'] != 0){?>
                          <td><?= $item['tahun']; ?></td>
                      <?php
                      }

                      if($item['jml'] == 0){?>
                          <td></td>
                      <?php
                      } elseif ($item['jml'] != 0){?>
                          <td><?= $item['jml']; ?></td>
                      <?php
                      }

                      if($ket == '0'){?>
                          <td>Belum Lunas</td>
                      <?php
                      } elseif ($ket == '1'){?>
                          <td>Lunas</td>
                      <?php
                      }
                      ?>
                  </tr>
              <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-5" data-aos="zoom-in">
        <div class="panel panel-info panel-dashboard">
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Lokasi</strong></h4>
          </div>
          <div class="panel-body">
            <a href="https://www.google.com/maps/search/?api=1&query=<?= $lat; ?>,<?= $long; ?>">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </a>
          </div>
        </div>
      </div>
</section>
<!-- End about-info Area -->
<?php include "footer.php"; ?>