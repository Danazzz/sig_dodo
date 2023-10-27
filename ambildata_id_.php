<?php
include "koneksi.php";
$Y = mysqli_query($koneksi, "SELECT * FROM pelanggan where id=" . $id);
if ($Y) {
        $posts = array();
        if (mysqli_num_rows($Y)) {
                while ($post = mysqli_fetch_assoc($Y)) {
                        $posts[] = $post;
                }
        }
        $dataa = json_encode(array('results' => $posts));
}