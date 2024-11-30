<h3>Data Calon Katua Dan Wakil Osis</h3><br>

<?php
session_start();  // Ensure session is started for accessing session variables

if(isset($_POST['pilih'])) {
    $siswa_nis = $_SESSION['siswa_nis'];
    $calon_no = $_POST['calon_no'];
    $suara_jml = 1;
    $post = date('Y-m-d H:i:s');

    // Check if the student has already voted
    $sql_check = "SELECT siswa_nis, suara_post FROM t_suara WHERE siswa_nis = ?";
    if ($stmt = mysqli_prepare($conn, $sql_check)) {
        mysqli_stmt_bind_param($stmt, 's', $siswa_nis);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "<div class='btn btn-warning btn-block'>Anda Sudah Memilih</div>";
        } else {
            // Insert the vote
            $sql_insert = "INSERT INTO t_suara (siswa_nis, calon_no, suara_jml, suara_post) VALUES (?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql_insert)) {
                mysqli_stmt_bind_param($stmt, 'ssis', $siswa_nis, $calon_no, $suara_jml, $post);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<div class='btn btn-success btn-block'>Terimakasih anda telah memilih</div>";
                } else {
                    echo "<div class='btn btn-danger btn-block'>Anda Gagal telah memilih</div>";
                }
            }
        }
    }
}
?>

<?php
date_default_timezone_set('Asia/Jakarta'); 
include "config/koneksi.php";

// Query to check if the election time has passed
$sql_waktu = "SELECT * FROM t_waktu_pemilihan";
$result_waktu = mysqli_query($conn, $sql_waktu);
$q = mysqli_fetch_array($result_waktu);

$tgl_sekarang = date("Y-m-d h:i:s");

if ($q['waktu_tglselesai'] < $tgl_sekarang) {
    echo "<div class='btn btn-danger btn-block'>Maaf Waktu Pemilihan sudah ditutup</div>";
} else {
?>
<table width="100%" class="table">
<form action="" method="POST">
    <tr>
        <th>No.Urut</th>
        <th>Nama Calon / Kelas</th>
        <th colspan="2">Pilih</th>
    </tr>
    <?php
    // Query to fetch all candidates
    $sql_calon = "SELECT * FROM t_calon ORDER BY calon_no";
    $result_calon = mysqli_query($conn, $sql_calon);

    while ($calon = mysqli_fetch_array($result_calon)) {
        echo "<tr>
                <td>{$calon['calon_no']}</td>
                <td><img src='assets/foto_cakahim/{$calon['calon_foto']}' width='90'><br>
                    <b>{$calon['calon_nama']}</b><br> {$calon['calon_kelas']}</td>
                <td><input type='radio' name='calon_no' value='{$calon['calon_no']}'> Klik Untuk Memilih</td>
              </tr>";
    }
    ?>
    <tr>
        <th colspan="4"><p align="right"><input type="submit" name="pilih" value="Voting" class="btn btn-info" /></p></th>
    </tr>
</form>
</table>
<?php } ?>
