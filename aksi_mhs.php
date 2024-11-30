<?php
session_start();
include "config/koneksi.php"; // Pastikan koneksi sudah benar

// Memeriksa apakah data POST sudah dikirim
if (isset($_POST['siswa_nis']) && isset($_POST['siswa_password'])) {
    // Mengambil nilai dari form login
    $siswa_nis = $_POST['siswa_nis'];
    $siswa_password = md5($_POST['siswa_password']); // Pastikan password di-hash dengan benar

    // Menyiapkan query dengan prepared statements untuk mencegah SQL Injection
    $query = "SELECT * FROM t_siswa WHERE siswa_nis = ? AND siswa_password = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Binding parameter
        mysqli_stmt_bind_param($stmt, "ss", $siswa_nis, $siswa_password);
        
        // Eksekusi query
        mysqli_stmt_execute($stmt);
        
        // Menyimpan hasil eksekusi
        $result = mysqli_stmt_get_result($stmt);
        
        // Memeriksa apakah ada baris yang cocok
        if (mysqli_num_rows($result) > 0) {
            $r = mysqli_fetch_array($result);
            
            // Menyimpan data ke session
            $_SESSION['siswa_nis'] = $r['siswa_nis'];
            $_SESSION['siswa_nama'] = $r['siswa_nama'];
            $_SESSION['siswa_password'] = $r['siswa_password'];
            
            // Mengarahkan ke halaman setelah login berhasil
            header('Location: mhs_halaman.php?page=mhs_home');
            exit();
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('NIS atau Password SALAH!'); window.location.href='media.php?page=login_mhs'
                </SCRIPT>");
        }
        mysqli_stmt_close($stmt);
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Terjadi kesalahan dalam query!'); window.location.href='media.php?page=login_mhs'
                </SCRIPT>");
    }
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Data belum lengkap!'); window.location.href='media.php?page=login_mhs'
            </SCRIPT>");
}
mysqli_close($conn);
?>
