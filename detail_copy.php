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
$id = "";
$lat = "";
$long = "";
$nama = "";
$alamat = "";
foreach ($obj->results as $item) {
  $id .= $item->idpem;
  $bulan .= $item->bulan;
  $tahun .= $item->tahun;
  $tgl .= $item->tgl;
  $jml .= $item->jml;
  $ket .= $item->ket;
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9dahisogvUETH5i0ddwmLj75xL9lEqSo&callback=initMap" async></script>
<script src="https://routes.googleapis.com/directions/v2:computeRoutes?key=AIzaSyA9dahisogvUETH5i0ddwmLj75xL9lEqSo"></script>

<script>
  var directionsDisplay;
  var directionsService = new google.maps.DirectionsService();

  function initMap() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var badung = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
    var mapOptions = {
      zoom: 15,
      center: badung
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    directionsDisplay.setMap(map);
    calcRoute(map);
  }

  function calcRoute(map) {
    var start = new google.maps.LatLng(-8.621166, 115.167719);
    var end = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
    var startMark = new google.maps.Marker({
      position: start,
      map: map,
      title: "SANTI GUNA"
    });
    var endMark = new google.maps.Marker({
      position: end,
      map: map,
      title: "<?php echo $nama ?>"
    });
    var request = {
      origin: start,
      destination: end,
      travelMode: 'DRIVING'
    };

    directionsService.route(request, function(response, status) {
      if (status == 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        alert("directions request failed, status="+status)
      }
    });
  }
  google.maps.event.addDomListener(window, "load", initMap);

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
          <div class="panel-heading centered">
            <h2 class="panel-title"><strong>Detail Pembayaran</strong></h4>
          </div>
          <div class="panel-body">
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
              $sql=mysqli_query($koneksi,"SELECT * FROM pembayaran where id = '$id'") or die(mysqli_error($koneksi));
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

                      if($item['ket'] == '0'){?>
                          <td>Belum Lunas</td>
                      <?php
                      } elseif ($item['ket'] == '1'){?>
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