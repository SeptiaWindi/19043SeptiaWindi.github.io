<?php
include "config/koneksi.php";
if ($conn) {
    $sql = "TRUNCATE TABLE t_suara";
    if (mysqli_query($conn, $sql)) {
        header('Location: admin_halaman.php?page=data_suara');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>
