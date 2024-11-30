<h3>Edit Data admin</h3>

<?php
include "config/koneksi.php";

// Mengecek apakah form telah disubmit
if(isset($_POST['edit_admin'])) {

    // Menangkap data dari form
    $nis = $_POST['nis'];
    $admin_nama = $_POST['admin_nama'];
    $admin_password = $_POST['admin_password'];

    // Menyiapkan query untuk mendapatkan data admin berdasarkan NIS
    $sql = "SELECT * FROM t_admin WHERE admin_nis = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nis);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data2 = mysqli_fetch_array($result);

    // Menangani password
    if($admin_password == "") {
        // Jika password tidak diganti, gunakan password yang lama
        $password2 = $data2['admin_password'];
    } else {
        // Enkripsi password jika ada perubahan
        $password2 = md5($admin_password);
    }

    // Menyiapkan query untuk update data admin
    $sql_update = "UPDATE t_admin SET admin_nama = ?, admin_password = ? WHERE admin_nis = ?";
    $stmt_update = mysqli_prepare($conn, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "sss", $admin_nama, $password2, $nis);

    // Eksekusi query untuk update
    if(mysqli_stmt_execute($stmt_update)) {
        echo "<div class='btn btn-success btn-block'>Data admin Berhasil Diedit</div>";
    } else {
        echo "<div class='btn btn-danger btn-block'>Data admin Gagal Diedit</div>";
    }

    // Menutup prepared statement
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_update);
}
?>

<?php
$nis = $_GET['nis'];
$sql = "SELECT * FROM t_admin WHERE admin_nis = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nis);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);
?>

<form action="" method="POST">
    <input type='hidden' name='nis' value="<?php echo $nis; ?>" />
    <table class="table">
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><input type="text" name="admin_nis" required class="form-control" value="<?php echo $nis; ?>" readonly="readonly" maxlength="8"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="admin_password" class="form-control" maxlength="8"> *Kosongkan bila tidak diganti</td>
        </tr>
        <tr>
            <td>Nama admin</td>
            <td>:</td>
            <td><input type="text" name="admin_nama" value="<?php echo $data['admin_nama']; ?>" required class="form-control"></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="edit_admin" value="Simpan Data" class="btn btn-primary">
                <input type="button" value="Batal" onclick="location.href='admin_halaman.php?page=data_admin'" class="btn btn-danger">
            </td>
        </tr>
    </table>
</form>
