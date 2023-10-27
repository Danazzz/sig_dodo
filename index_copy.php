<?php include "header.php"; ?>

<!-- start banner Area -->
<section class="banner-area relative">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row fullscreen align-items-center justify-content-between">
      <div class="col-lg-6 col-md-6 banner-left">
        <h6 class="text-white">SISTEM INFORMASI GEOGRAFIS PELANGGAN</h6>
        <h1 class="text-white">SANTI GUNA</h1>
        <p class="text-white">
          Sistem informasi ini merupakan aplikasi pemetaan geografis pelanggan Santi Guna di wilayah Badung.
        </p>
        <a href="#peta" class="primary-btn text-uppercase">Lihat Detail</a>
      </div>

    </div>
  </div>
  </div>
</section>
<!-- End banner Area -->

<main id="main">

  <!-- Start about-info Area -->
  <section class="price-area section-gap">

    <section id="peta" class="about-info-area section-gap">
      <div class="container">

        <div class="title text-center">
          <h1 class="mb-10">Peta Lokasi Pelanggan</h1>
          <br>
        </div>

        <div class="row align-items-center">

          <div id="map" style="width:100%;height:480px;"></div>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9dahisogvUETH5i0ddwmLj75xL9lEqSo&callback=initMap" async></script>
          <script src="https://routes.googleapis.com/directions/v2:computeRoutes?key=AIzaSyA9dahisogvUETH5i0ddwmLj75xL9lEqSo"></script>

          <script type="text/javascript">

            var directionsDisplay;
            var directionsService = new google.maps.DirectionsService();

            function initMap() {
              directionsDisplay = new google.maps.DirectionsRenderer();
              var chicago = new google.maps.LatLng(41.850033, -87.6500523);
              var mapOptions = {
                zoom: 7,
                center: chicago
              }
              var map = new google.maps.Map(document.getElementById('map'), mapOptions);
              directionsDisplay.setMap(map);
              calcRoute(map);
            }

            function calcRoute(map) {
              var start = new google.maps.LatLng(41.850033, -87.6500523);
              var end = new google.maps.LatLng(37.3229978, -122.0321823);
              var startMark = new google.maps.Marker({
                position: start,
                map: map,
                title: "start"
              });
              var endMark = new google.maps.Marker({
                position: end,
                map: map,
                title: "end"
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

        </div>


      </div>
    </section>
    <!-- End about-info Area -->


    <!-- Start price Area -->

    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="menu-content pb-70 col-lg-8">
          <div class="title text-center">
            <h1 class="mb-10">Jangkauan Peta</h1>
            <p>Aplikasi pemetaan geografis Santi Guna ini memuat informasi dan lokasi dari Pelanggan yang berada di wilayah Badung.  Aplikasi ini memuat sejumlah informasi mengenai :
            </p>
          </div>
        </div>
      </div>

      <div>
        <input type="text" id="from" placeholder="Origin">
      </div>
      <div>
        <input type="text" id="to" placeholder="Destination">
      </div>
      <div>
        <select id="mode">
          <option value="DRIVING">driving</option>
          <option value="WALKING">walking</option>
          <option value="BICYCLING">bicycling</option>
          <option value="TRANSIT">transit</option>
        </select>
      </div>
      <div id="map"></div>

      <!-- End other-issue Area -->

    </div>
    </div> <!-- ======= Counts Section ======= -->
    <section id="counts">
      <div class="container">
        <div class="title text-center">
          <h1 class="mb-10">Jumlah Pelanggan</h1>
          <br>
        </div>
        <div class="row d-flex justify-content-center">


          <?php
          include_once "countsma.php";
          $obj = json_decode($data);
          $sman = "";
          foreach ($obj->results as $item) {
            $sman .= $item->sma;
          }
          ?>

          <div class="text-center">
            <h1><span data-toggle="counter-up"><?php echo $sman; ?></span></h1>
            <br>
          </div>
          <?php
          include_once "countsmk.php";
          $obj2 = json_decode($data);
          $smkn = "";
          foreach ($obj2->results as $item2) {
            $smkn .= $item2->smk;
          }
          ?>


        </div>

      </div>
    </section><!-- End Counts Section -->
    </div>
  </section>
  <!-- End testimonial Area -->


  <?php include "footer.php"; ?>