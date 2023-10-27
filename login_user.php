<?php include "header.php"; ?>

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
        <div class="row">
          <div class="col-md-8 offset-md-2">
          <?php
          if(isset($_POST['login'])){
            $email = trim(mysqli_real_escape_string($koneksi, $_POST['email']));
            $pass = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
            $sql = mysqli_query($koneksi, "SELECT id FROM pelanggan WHERE email = '$email' AND password = '$pass'") or die (mysqli_error($koneksi));
            if (mysqli_num_rows($sql) > 0){
              $item=mysqli_fetch_array($sql);
              $id = $item['id'];
              $_SESSION['id'] = $id;
              $_SESSION['username'] = $email;
              $_SESSION['status'] = "login";
              header("location:detail_pelanggan.php?id=$id");
            }else{ ?>
                <div class="row">
                    <div class="col-lg-12 col-lg-offset-3">
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Login gagal!</strong> Username / Password salah
                        </div>
                    </div>
                </div>
            <?php    
            }
          }
          ?>
            <form class="user" method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                </div>
                <input type="submit" name="login" value="LOGIN" class="btn btn-secondary btn-user btn-block">
            </form>
          </div>
        </div>
    </div>
  </section>
</div>

<!-- End about-info Area -->
<?php include "footer.php"; ?>