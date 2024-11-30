<h3>Edit Data Calon Katua Dan Wakil Osis</h3>
<?php
include "config/koneksi.php";

// Proses form submit
if (isset($_POST['edit_calon'])) {
    
    $no = $_GET['no'];
    $calon_nama = mysqli_real_escape_string($conn, $_POST['calon_nama']);
    $calon_kelas = mysqli_real_escape_string($conn, $_POST['calon_kelas']);
    $calon_visimisi = mysqli_real_escape_string($conn, $_POST['calon_visimisi']);
    $calon_priode = mysqli_real_escape_string($conn, $_POST['calon_priode']);
    
    // Menangani upload file foto
    $filename = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    
    if (!empty($filename)) {
        // Cek ekstensi file
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            // Tentukan path untuk upload
            $upload_path = 'assets/foto_cakahim/' . $filename;
            $move = move_uploaded_file($file_tmp, $upload_path);
        } else {
            echo "<div class='btn btn-danger btn-block'>Ekstensi file tidak valid, hanya JPG, PNG, GIF yang diizinkan.</div>";
            exit;
        }
    }

    // Update query
    if (empty($filename)) {
        // Jika tidak ada file baru
        $sql = "UPDATE t_calon SET calon_nama = '$calon_nama',
                                    calon_kelas = '$calon_kelas',
                                    calon_visimisi = '$calon_visimisi',
                                    calon_priode = '$calon_priode'
                                    WHERE calon_no = '$no'";
    } else {
        // Jika ada file baru
        $sql = "UPDATE t_calon SET calon_nama = '$calon_nama',
                                    calon_kelas = '$calon_kelas',
                                    calon_foto = '$filename',
                                    calon_visimisi = '$calon_visimisi',
                                    calon_priode = '$calon_priode'
                                    WHERE calon_no = '$no'";
    }

    // Mengeksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "<div class='btn btn-success btn-block'>Data Calon Katua Dan Wakil Osis Berhasil Diedit</div>";
    } else {
        echo "<div class='btn btn-danger btn-block'>Data Calon Katua Dan Wakil Osis Gagal Diedit</div>";
    }
}
?>

<?php
// Menampilkan data Calon Katua Dan Wakil Osis
$no = $_GET['no'];
$query = mysqli_query($conn, "SELECT * FROM t_calon WHERE calon_no='$no'");
$data = mysqli_fetch_array($query);
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="no" value="<?php echo $no; ?>" />
    <table class="table">
        <tr>
            <td>No.Urut</td>
            <td>:</td>
            <td><input type="text" name="calon_no" required class="form-control" value="<?php echo $no; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Nama Calon</td>
            <td>:</td>
            <td><input type="text" name="calon_nama" required class="form-control" value="<?php echo $data['calon_nama']; ?>"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="calon_kelas" required class="form-control" value="<?php echo $data['calon_kelas']; ?>"></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><img src="assets/foto_cakahim/<?php echo $data['calon_foto']; ?>" width="90" /></td>
        </tr>
        <tr>
            <td>Ganti Foto</td>
            <td>:</td>
            <td><input type="file" name="file" class="form-control"></td>
        </tr>
        <tr>
            <td>Visi & Misi</td>
            <td>:</td>
            <td><textarea name="calon_visimisi" class="form-control" rows="6"><?php echo $data['calon_visimisi']; ?></textarea></td>
        </tr>
        <tr>
            <td>Priode Jabatan</td>
            <td>:</td>
            <td><input type="text" name="calon_priode" required class="form-control" value="<?php echo $data['calon_priode']; ?>"></td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="edit_calon" value="Simpan Data" class="btn btn-primary">
                <input type="button" value="Batal" onclick="location.href='admin_halaman.php?page=data_kahim'" class="btn btn-danger">
            </td>
        </tr>
    </table>
</form>
