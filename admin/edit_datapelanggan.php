<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data Pelanggan</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <?php
                            include '../koneksi.php';
                            $id = $_GET['id'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pelanggan where id='$id'");
                            $data  = mysqli_fetch_array($query);
                            ?>

                            <!-- </div> -->
                            <section class="about-info-area section-gap">
                                <div class="container" style="padding-top:120px;">
                                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
                                        <div class="panel panel-info panel-dashboard">
                                            <div class="panel-heading centered">
                                                <h4 class="panel-title"><strong>Edit Detail Pelanggan</strong></h4>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi.php" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">ID Pelanggan</label>
                                                        <div class="col-sm-8">
                                                            <input name="id" type="text" id="id" class="form-control" value="<?php echo $id; ?>" readonly />
                                                            <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Nama Pelanggan</label>
                                                        <div class="col-sm-8">
                                                            <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Alamat</label>
                                                        <div class="col-sm-8">
                                                            <input name="alamat" class="form-control" id="alamat" type="text" value="<?php echo $data['alamat']; ?>" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Latitude</label>
                                                        <div class="col-sm-8">
                                                            <input name="latitude" class="form-control" id="latitude" type="text" value="<?php echo $data['latitude']; ?>" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Longitude</label>
                                                        <div class="col-sm-8">
                                                            <input name="longitude" class="form-control" id="longitude" type="text" value="<?php echo $data['longitude']; ?>" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 20px;">
                                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                                        <div class="col-sm-8">
                                                            <input type="submit" name="biodata" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 20px;"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>