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
                            <h6 class="m-0 font-weight-bold text-primary">History Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="8%">ID</th>
                                            <th width="25%">Nama Pelanggan</th>
                                            <th width="30%">Bukti Pembayaran</th>
                                            <th width="7%">Accept</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $data = mysqli_query($koneksi, "select * from pembayaran order by waktu_bukti ASC");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><b><?php echo $d['id']; ?></b></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['bukti']; ?></td>
                                                <td>
                                                    
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