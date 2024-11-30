<div class="jumbotron">
    <h2>Selamat datang,</h2>
    <p>Di Aplikasi e-Voting PILKETOS</p>
</div>
<h3>Calon Katua Dan Wakil Osis</h3><br>
<table width="100%" class="table" border="1" style="border:1px solid #ccc;">
    <tr>
        <th>No.Urut</th>
        <th>Nama Calon / Kelas</th>
        <th width="50%">Visi dan Misi</th>
    </tr>
    <?php
    include "config/koneksi.php";
    
    // Query untuk memilih data calon dari database
    $sql = "SELECT * FROM t_calon ORDER BY calon_no";
    $result = $conn->query($sql); // Menggunakan metode query() dari mysqli

    // Mengecek jika ada data yang ditemukan
    if ($result->num_rows > 0) {
        while($calon = $result->fetch_assoc()) { // Menggunakan fetch_assoc() untuk mengambil data baris per baris
            echo "<tr>
                    <td>" . $calon['calon_no'] . "</td>
                    <td><img src='assets/foto_cakahim/" . $calon['calon_foto'] . "' width='90'><br>
                    <b>" . $calon['calon_nama'] . "</b><br>" . $calon['calon_kelas'] . "</td>
                    <td>" . $calon['calon_visimisi'] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data yang ditemukan.</td></tr>";
    }
    ?>
</table>
