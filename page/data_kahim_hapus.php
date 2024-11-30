<?php
include "config/koneksi.php";


$no = $_GET['no'];
$sql = mysqli_query($conn, "DELETE FROM t_calon WHERE calon_no='$no'");
$sql2 = mysqli_query($conn, "DELETE FROM t_suara WHERE calon_no='$no'");

if ($sql && $sql2) {
    header("location:admin_halaman.php?page=data_kahim");
} else {
    header("location:admin_halaman.php?page=data_kahim");
}
?>
