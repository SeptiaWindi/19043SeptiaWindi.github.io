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
            "sPaginationType": "full_numbers",
            "aaSorting": [[0, "asc"]], // Menyortir berdasarkan No. Urut
            "bJQueryUI": true
        });
    });
</script>

<h3>Data Calon Katua Dan Wakil Osis</h3><br>
<a href="admin_halaman.php?page=data_kahim_tambah" class="btn btn-primary">Tambah Data Calon Katua Dan Wakil Osis</a><br><br>

<table id="datatables" class="display table table-bordered">
  <thead>
    <tr>
        <th>No. Urut</th>
        <th>Nama Calon</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "config/koneksi.php";  // Pastikan koneksi ke database sudah benar
    $no = 1;
    
    // Periksa apakah koneksi berhasil
    if ($conn) {
        // Query untuk mengambil data calon
        $sql = "SELECT * FROM t_calon ORDER BY calon_no";
        $result = mysqli_query($conn, $sql);
        
        // Periksa apakah query berhasil dijalankan
        if ($result) {
            while ($kahim = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>$kahim[calon_no]</td>
                        <td>$kahim[calon_nama]</td>
                        <td>$kahim[calon_kelas]</td>
                        <td>
                            <a href='admin_halaman.php?page=data_kahim_edit&no=$kahim[calon_no]' class='btn btn-info'>
                                <span class='fa fa-pencil'></span> Edit
                            </a> 
                            <a href='admin_halaman.php?page=data_kahim_hapus&no=$kahim[calon_no]' class='btn btn-danger'>
                                <span class='fa fa-trash-o'></span> Hapus
                            </a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Koneksi ke database gagal.";
    }
    ?>
  </tbody>
</table>
