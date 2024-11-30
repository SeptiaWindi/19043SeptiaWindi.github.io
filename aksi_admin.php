<?php
session_start();
include "config/koneksi.php";

// Mengambil data dari form
$admin_nis = $_POST['admin_nis'];
$admin_password = md5($_POST['admin_password']); // Pastikan password di-hash dengan benar

// Membuat query menggunakan prepared statement untuk mencegah SQL Injection
$query = "SELECT * FROM t_admin WHERE admin_nis = ? AND admin_password = ?";
if ($stmt = mysqli_prepare($conn, $query)) {
    // Mengikat parameter
    mysqli_stmt_bind_param($stmt, "ss", $admin_nis, $admin_password);
    
    // Menjalankan query
    mysqli_stmt_execute($stmt);
    
    // Mendapatkan hasil query
    $result = mysqli_stmt_get_result($stmt);
    
    // Memeriksa apakah ada data yang cocok
    if (mysqli_num_rows($result) > 0) {
        $r = mysqli_fetch_array($result);
        
        // Menyimpan data ke session
        $_SESSION['admin_nis'] = $r['admin_nis'];
        $_SESSION['admin_password'] = $r['admin_password'];
        
        // Mengarahkan ke halaman utama admin
        header('Location: admin_halaman.php?page=admin_home');
        exit();
    } else {
        // Jika login gagal
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('NIS atau Password SALAH!'); window.location.href='media.php?page=login_admin'
                </SCRIPT>");
    }
    
    // Menutup prepared statement
    mysqli_stmt_close($stmt);
} else {
    // Jika terjadi error saat menyiapkan query
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Terjadi kesalahan dalam query!'); window.location.href='media.php?page=login_admin'
            </SCRIPT>");
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
