<h3>Tambah Data Siswa</h3>

<?php
include "config/koneksi.php";

// Mengecek apakah form telah disubmit
if(isset($_POST['tambah_mhs'])) {
    // Menangkap data dari form
    $siswa_nis = $_POST['siswa_nis'];
    $siswa_nama = $_POST['siswa_nama'];
    $siswa_kelas = $_POST['siswa_kelas'];
    $siswa_password = md5($_POST['siswa_password']);  // Enkripsi password dengan md5

    // Menyiapkan query untuk menyisipkan data siswa ke dalam database menggunakan prepared statement
    $sql = "INSERT INTO t_siswa (siswa_nis, siswa_password, siswa_nama, siswa_kelas) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Mengikat parameter ke dalam prepared statement
    mysqli_stmt_bind_param($stmt, "ssss", $siswa_nis, $siswa_password, $siswa_nama, $siswa_kelas);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='btn btn-success btn-block'>Data siswa Berhasil ditambahkan</div>";
    } else {
        echo "<div class='btn btn-danger btn-block'>Data siswa Gagal ditambahkan</div>";
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
            <td><input type="text" name="siswa_nis" required class="form-control" maxlength="8"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="siswa_password" required class="form-control"></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td><input type="text" name="siswa_nama" required class="form-control"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="siswa_kelas" required class="form-control"></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="tambah_mhs" value="Simpan Data" class="btn btn-primary">
                <input type="button" value="Batal" onclick="location.href='admin_halaman.php?page=data_mhs'" class="btn btn-danger">
            </td>
        </tr>
    </table>
</form>
