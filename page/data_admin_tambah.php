<h3>Tambah Data admin</h3>
<?php
// Pastikan koneksi database sudah dilakukan dengan benar
include "config/koneksi.php";

if (isset($_POST['tambah_admin'])) {
    // Mengambil data dari form
    $admin_nis = $_POST['admin_nis'];
    $admin_nama = $_POST['admin_nama'];
    $admin_kelas = $_POST['admin_kelas']; // Apakah Anda membutuhkan data ini dalam query?
    $admin_password = md5($_POST['admin_password']); // Encrypt password
    
    // Query untuk memasukkan data ke tabel t_admin
    $sql = "INSERT INTO t_admin (admin_nis, admin_password, admin_nama) VALUES (?, ?, ?)";
    
    // Menyiapkan statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Mengikat parameter
    mysqli_stmt_bind_param($stmt, "sss", $admin_nis, $admin_password, $admin_nama);
    
    // Mengeksekusi query
    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='btn btn-success btn-block'>Data admin Berhasil ditambahkan</div>";
    } else {
        echo "<div class='btn btn-danger btn-block'>Data admin Gagal ditambahkan</div>";
    }
    
    // Menutup prepared statement
    mysqli_stmt_close($stmt);
}
?>

<form action="" method="POST">
<table class="table">
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><input type="text" name="admin_nis" required class="form-control" maxlength="8"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="admin_password" required class="form-control" maxlength="8"></td>
    </tr>
    <tr>
        <td>Nama admin</td>
        <td>:</td>
        <td><input type="text" name="admin_nama" required class="form-control"></td>
    </tr>
    <tr>
        <td colspan="3">
            <input type="submit" name="tambah_admin" value="Simpan Data" class="btn btn-primary"> 
            <input type="button" value="Batal" onclick="location.href='admin_halaman.php?page=data_admin'" class="btn btn-danger">
        </td>
    </tr>
</table>
</form>
