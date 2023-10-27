<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../koneksi.php";
?>

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

                    <?php
                    $idpelanggan = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id = '$idpelanggan'");
                    $data  = mysqli_fetch_array($query);
                    ?>

                <?php } ?>
                <!-- Begin Page Content -->
                <section class="about-info-area section-gap">
                    <div class="container" style="padding-top:20px;">
                        <div class="">
                            <!-- DataTales Example -->
                            <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel panel-info panel-dashboard">
                                    <div class="panel-heading centered d-flex justify-content-between align-items-center">
                                        <h1 class="h3 mb-0 text-gray-800">Detail Pelanggan</h1>
                                        <a href="edit_datapelanggan.php?id=<?php echo $idpelanggan; ?> " class="btn-sm btn-primary">Ubah</a>
                                    </div>
                                        <!-- </div> -->
                                    <div class="panel-body">
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <td>ID</td>
                                                <td><?php echo $data['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><?php echo $data['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td><?php echo $data['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Latitude</td>
                                                <td><?php echo $data['latitude']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Longitude</td>
                                                <td><?php echo $data['longitude']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" data-aos="zoom-in" style="padding-top:20px;">
                                <div class="panel panel-info panel-dashboard">
                                    <div class="panel-heading d-flex justify-content-between align-items-center">
                                        <h1 class="h3 mb-0 text-gray-800">Detail Pembayaran</h1>
                                        <div class="d-flex justify-content-between">
                                            <a href="edit_datatagihan.php?id=<?php echo $idpelanggan; ?> " class="btn-sm btn-success">Tambah</a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-bordered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun</th>
                                                    <th>Tanggal</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>       
                                            <?php
                                            $no=1;
                                            $query= "SELECT * FROM pembayaran WHERE idpelanggan = '$idpelanggan'";
                                            $sql=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
                                            while($item=mysqli_fetch_array($sql)){ ?>
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

                                                    if($item['tahun'] == 0){?>
                                                        <td></td>
                                                    <?php
                                                    } elseif ($item['tahun'] != 0){?>
                                                        <td><?= $item['tahun']; ?></td>
                                                    <?php
                                                    }

                                                    if($item['tgl'] == 0){?>
                                                        <td></td>
                                                    <?php
                                                    } elseif ($item['tgl'] != 0){?>
                                                        <td><?= $item['tgl']; ?></td>
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
                                                    <td>
                                                        <a href="edit_datapembayaran.php?id=<?php echo $item['id']; ?>" class="btn-sm btn-primary"><span class="fas fa-edit"></a>
                                                        <a href="hapus_pem.php?id=<?php echo $item['id']; ?>" class="btn-sm btn-danger"><span class="fas fa-trash"></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <?php include "footer.php"; ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </body>
    <script>
        $(document).ready(function() {
            $('#tbl_id').dataTable({
                "aLengthMenu": [[12, 24, 36, 48], [12, 50, 75, "All"]],
                "iDisplayLength": 25
            });
        } );
    </script>
    </html>