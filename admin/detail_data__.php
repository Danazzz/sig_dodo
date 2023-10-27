<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../tampil_data.php?pesan=belum_login");
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
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Pelanggan</h6>
                            <a href="edit_datapelanggan.php?id=<?php echo $id; ?> " class="btn-sm btn-primary">Ubah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">ID</th>
                                            <th width="25%">Nama Pelanggan</th>
                                            <th width="30%">Alamat</th>
                                            <th width="7%">Latitude</th>
                                            <th width="7%">Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id = $_GET['id'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id = '$id'");
                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $d['id']; ?></td>
                                                <td><b><?php echo $d['nama']; ?></b></td>
                                                <td><?php echo $d['alamat']; ?></td>
                                                <td><?php echo $d['latitude']; ?></td>
                                                <td><?php echo $d['longitude']; ?></td>
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

        <?php include "footerdetail.php"; ?>

    </div>
    <!-- End of Page Wrapper -->