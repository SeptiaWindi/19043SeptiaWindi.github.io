<?php
include "config/koneksi.php";

// Pastikan parameter 'nis' ada dalam URL
if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    $sql = "DELETE FROM t_siswa WHERE siswa_nis = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nis);
    if (mysqli_stmt_execute($stmt)) {
        header("location:admin_halaman.php?page=data_mhs");
    } else {
        header("location:admin_halaman.php?page=data_mhs");
    }

    mysqli_stmt_close($stmt);
} else {
    echo "NIS tidak ditemukan!";
}

mysqli_close($conn);
?>
