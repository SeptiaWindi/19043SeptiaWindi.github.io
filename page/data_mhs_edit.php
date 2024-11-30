<h3>Edit Data Siswa</h3>
<?php
include "config/koneksi.php";

if(isset($_POST['edit_mhs'])) {
	$nis = $_POST['nis'];
	$siswa_nama = $_POST['siswa_nama'];
	$siswa_kelas = $_POST['siswa_kelas'];
	$siswa_password = $_POST['siswa_password'];

	// Query untuk mengambil data siswa berdasarkan NIS
	$query = "SELECT * FROM t_siswa WHERE siswa_nis=?";
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, "s", $nis);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$data2 = mysqli_fetch_array($result);

	// Cek password, jika password baru kosong maka tidak diubah
	if (!empty($siswa_password)) {
		// Enkripsi password baru jika ada perubahan
		$password2 = password_hash($siswa_password, PASSWORD_DEFAULT);
	} else {
		// Jika tidak ada perubahan password, pakai password lama
		$password2 = $data2['siswa_password'];
	}

	// Query untuk update data siswa
	$sql = "UPDATE t_siswa SET siswa_nama = ?, siswa_kelas = ?, siswa_password = ? WHERE siswa_nis = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "ssss", $siswa_nama, $siswa_kelas, $password2, $nis);

	// Eksekusi query
	if(mysqli_stmt_execute($stmt)) {
		echo "<div class='btn btn-success btn-block'>Data Siswa Berhasil Diedit</div>";
	} else {
		echo "<div class='btn btn-danger btn-block'>Data Siswa Gagal Diedit</div>";
	}
}
?>

<?php
// Mengambil data siswa berdasarkan NIS yang dikirim lewat GET
$nis = $_GET['nis'];
$query = "SELECT * FROM t_siswa WHERE siswa_nis=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $nis);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);
?>

<form action="" method="POST">
<input type="hidden" name="nis" value="<?php echo $nis; ?>" />
<table class="table">
	<tr>
    	<td>NIS</td>
        <td>:</td>
        <td><input type="text" name="siswa_nis" required class="form-control" value="<?php echo $nis; ?>" readonly="readonly" maxlength="8"></td>
    </tr>
	<tr>
    	<td>Password</td>
        <td>:</td>
        <td><input type="password" name="siswa_password" class="form-control" maxlength="8">*kosongkan bila tidak diganti</td>
    </tr>
	<tr>
    	<td>Nama Siswa</td>
        <td>:</td>
        <td><input type="text" name="siswa_nama" value="<?php echo $data['siswa_nama']; ?>" required class="form-control"></td>
    </tr>
	<tr>
    	<td>Kelas</td>
        <td>:</td>
        <td><input type="text" name="siswa_kelas" value="<?php echo $data['siswa_kelas']; ?>" required class="form-control"></td>
    </tr>
	<tr>
    	<td colspan="3">
			<input type="submit" name="edit_mhs" value="Simpan Data" class="btn btn-primary">
			<input type="button" value="Batal" onclick="location.href='admin_halaman.php?page=data_mhs'" class="btn btn-danger">
		</td>
    </tr>
</table>
</form>
