<?php
include "config/koneksi.php";
$nis = $_GET['nis'];
$sql = "DELETE FROM t_admin WHERE admin_nis = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nis);
if(mysqli_stmt_execute($stmt)) {
    header("location:admin_halaman.php?page=data_admin");
} else {
    header("location:admin_halaman.php?page=data_admin");
}
mysqli_stmt_close($stmt);
?>
