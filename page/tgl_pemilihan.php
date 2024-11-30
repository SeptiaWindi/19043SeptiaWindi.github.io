<h3>Tanggal Pemilihan</h3>

<?php
if(isset($_POST['edit_tgl'])) {
    // Koneksi ke database
    include "config/koneksi.php";

    $waktu_id = '1';
    date_default_timezone_set('Asia/Jakarta'); 

    // Menangani input tanggal mulai
    $tanggalSekarang = mysqli_real_escape_string($conn, $_POST['waktu_tglmulai']);
    $newTanggalSekarang = strtotime($tanggalSekarang);
    
    // Menambahkan waktu 6 jam ke tanggal mulai
    $maxJam = 6;
    $NewmaxJam = 3600 * $maxJam;
    $hasilJumlah = $newTanggalSekarang + $NewmaxJam;
    
    // Menghitung tanggal selesai
    $tampilHasil = date("Y-m-d H:i:s", $hasilJumlah);

    // Query untuk update data waktu pemilihan
    $sql = "UPDATE t_waktu_pemilihan 
            SET waktu_tglmulai = '$tanggalSekarang', 
                waktu_tglselesai = '$tampilHasil' 
            WHERE waktu_id = '$waktu_id'";

    // Mengeksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "<div class='btn btn-success btn-block'>Tanggal Pemilihan berhasil dibuat</div>";
    } else {
        echo "<div class='btn btn-danger btn-block'>Tanggal Pemilihan gagal dibuat</div>";
    }
}
?>

<?php
// Menampilkan data waktu pemilihan
include "config/koneksi.php";
$waktu_id = '1';
$query = mysqli_query($conn, "SELECT * FROM t_waktu_pemilihan WHERE waktu_id='$waktu_id'");
$data = mysqli_fetch_array($query);
?>

<form action="" method="POST">
    <input type="hidden" name="waktu_id" value="<?php echo $waktu_id; ?>" />
    <table class="table">
        <tr>
            <td>Tanggal Mulai Pemilihan</td>
            <td>:</td>
            <td><input type="text" name="waktu_tglmulai" value="<?php echo $data['waktu_tglmulai']; ?>" required class="form-control"></td>
        </tr>
        <tr>
            <td>Tanggal Selesai Pemilihan</td>
            <td>:</td>
            <td><input type="text" value="<?php echo $data['waktu_tglselesai']; ?>" readonly="readonly" class="form-control"/>
                *Waktu Pemilihan hanya 6 jam, dari Tanggal Mulai yang telah ditentukan.
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="edit_tgl" value="Simpan Data" class="btn btn-primary"> 
                <input type="button" value="Batal" onclick="location.href='admin_halaman.php?page=admin_home'" class="btn btn-danger">
            </td>
        </tr>
    </table>
</form>
