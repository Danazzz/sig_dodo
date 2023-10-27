<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php?pesan=belum_login");
}
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


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="25%">Nama Pelanggan</th>
                                            <th width="5%">Tanggal</th>
                                            <th width="5%">Bulan</th>
                                            <th width="5%">Tahun</th>
                                            <th width="7%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "SELECT pelanggan.nama, pembayaran.tgl, pembayaran.bulan, pembayaran.tahun, pembayaran.ket 
                                        FROM pembayaran
                                        INNER JOIN pelanggan
                                        ON pembayaran.idpelanggan=pelanggan.id;");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><b><?php echo $d['nama']; ?></b></td>
                                                <td><?php echo $d['tgl']; ?></td>
                                                <?php
                                                if($d['bulan'] == 1){?>
                                                    <td>Januari</td>
                                                <?php
                                                } elseif ($d['bulan'] == 2){?>
                                                    <td>Februari</td>
                                                <?php
                                                } elseif ($d['bulan'] == 3){?>
                                                    <td>Maret</td>
                                                <?php
                                                } elseif ($d['bulan'] == 4){?>
                                                    <td>April</td>
                                                <?php
                                                } elseif ($d['bulan'] == 5){?>
                                                    <td>Mei</td>
                                                <?php
                                                } elseif ($d['bulan'] == 6){?>
                                                    <td>Juni</td>
                                                <?php
                                                } elseif ($d['bulan'] == 7){?>
                                                    <td>Juli</td>
                                                <?php
                                                } elseif ($d['bulan'] == 8){?>
                                                    <td>Agustus</td>
                                                <?php
                                                } elseif ($d['bulan'] == 9){?>
                                                    <td>September</td>
                                                <?php
                                                } elseif ($d['bulan'] == 10){?>
                                                    <td>Oktober</td>
                                                <?php
                                                } elseif ($d['bulan'] == 11){?>
                                                    <td>November</td>
                                                <?php
                                                } elseif ($d['bulan'] == 12){?>
                                                    <td>Desember</td>
                                                <?php
                                                }
                                                ?>
                                                <td><?php echo $d['tahun']; ?></td>
                                                <td>
                                                <?php
                                                if($d['ket'] == "0"){ 
                                                    echo "BELUM LUNAS";
                                                } else if($d['ket'] == "1"){
                                                    echo "LUNAS";
                                                }
                                                ?>
                                                </td>
                                            </tr>
                            </div>
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

        <?php include "footer.php"; ?>

    </div>
    <!-- End of Page Wrapper -->