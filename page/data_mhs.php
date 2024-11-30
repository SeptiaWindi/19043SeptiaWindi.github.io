<script src="media/js/jquery.js" type="text/javascript"></script>
<script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
<style type="text/css">
    @import "media/css/demo_table_jui.css";
    @import "media/themes/ui-lightness/jquery-ui-1.8.4.custom.css";
</style>

<style>
    * {
        font-family: arial;
    }
    input[type="text"], input[type="password"], select {
        color: #000;
    }       
</style>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#datatables').dataTable({
            "sPaginationType":"full_numbers",
            "aaSorting":[[2, "desc"]],
            "bJQueryUI":true
        });
    });
</script>

<h3>Data Siswa</h3><br>
<a href="admin_halaman.php?page=data_mhs_tambah" class="btn btn-primary">Tambah Data Siswa</a><br><br>
<table id="datatables" class="display table table-bordered">
  <thead>
    <tr>
        <th>No.</th>
        <th>nis</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "config/koneksi.php";
    
    // Periksa koneksi ke database
    if ($conn) {
        // Query untuk mengambil data siswa
        $sql = "SELECT * FROM t_siswa ORDER BY siswa_nis";
        $result = mysqli_query($conn, $sql);
        
        // Periksa apakah query berhasil dijalankan
        if ($result) {
            $no = 1;
            while ($siswa = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>$no</td>
                        <td>$siswa[siswa_nis]</td>
                        <td>$siswa[siswa_nama]</td>
                        <td>$siswa[siswa_kelas]</td>
                        <td>
                            <a href='admin_halaman.php?page=data_mhs_edit&nis=$siswa[siswa_nis]' class='btn btn-info'>
                                <span class='fa fa-pencil'></span> Edit
                            </a> 
                            <a href='admin_halaman.php?page=data_mhs_hapus&nis=$siswa[siswa_nis]' class='btn btn-danger'>
                                <span class='fa fa-trash-o'></span> Hapus
                            </a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "Error: " . mysqli_error($conn);  // Menampilkan pesan error jika query gagal
        }
    } else {
        echo "Koneksi ke database gagal.";  // Menampilkan pesan jika koneksi gagal
    }
    ?>
  </tbody>
</table>
