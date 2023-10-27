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
                            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran where id = '$id'");
                            $data  = mysqli_fetch_array($query);
                            $arr = array($data['tahun'],$data['bulan'],$data['tgl']);
                            $bln = implode("-",$arr);
                            ?>

                            <!-- </div> -->
                            <section class="about-info-area section-gap">
                                <div class="container" style="padding-top:120px;">
                                    <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
                                        <div class="panel panel-info panel-dashboard">
                                            <div class="panel-heading centered">
                                                <h4 class="panel-title"><strong>Tambah Pembayaran</strong></h4>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="edit_aksi.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="idpelanggan" value="<?= $data['idpelanggan'] ?>">
                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Tanggal</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" id="tgl" name="tgl" value="<?= $bln ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Jumlah</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" id="jml" name="jml" value="<?= $data['jml'] ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-sm-4 control-label">Keterangan</label>
                                                        <div class="col-sm-8">
                                                            <select name="ket" id="ket" class="form-control">
                                                                <?php
                                                                if($data['ket'] == "0"){ ?>
                                                                    <option value="0" selected>BELUM LUNAS</option>
                                                                    <option value="1">LUNAS</option>
                                                                <?php
                                                                } else if($data['ket'] == "1"){ ?>
                                                                    <option value="1" selected>LUNAS</option>
                                                                    <option value="0">BELUM LUNAS</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 20px;">
                                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                                        <div class="col-sm-8">
                                                            <input type="submit" name="editpembayaran" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
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