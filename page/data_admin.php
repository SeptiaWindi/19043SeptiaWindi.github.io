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
            "aaSorting": [[2, "desc"]],
            "bJQueryUI": true
        });
    });
</script>

<h3>Data admin</h3><br>
<a href="admin_halaman.php?page=data_admin_tambah" class="btn btn-primary">Tambah Data admin</a><br><br>
<table id="datatables" class="display table table-bordered">
  <thead>
    <tr>
        <th>No.</th>
        <th>nis</th>
        <th>Nama admin</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "config/koneksi.php";
    
    // Periksa koneksi ke database
    if ($conn) {
        // Query untuk mengambil data admin
        $sql = "SELECT * FROM t_admin ORDER BY admin_nis";
        $result = mysqli_query($conn, $sql);
        
        // Periksa apakah query berhasil dijalankan
        if ($result) {
            $no = 1;
            while ($admin = mysqli_fetch_array($result)) {
                echo "<tr>
                        <td>$no</td>
                        <td>$admin[admin_nis]</td>
                        <td>$admin[admin_nama]</td>
                        <td>
                            <a href='admin_halaman.php?page=data_admin_edit&nis=$admin[admin_nis]' class='btn btn-info'>
                                <span class='fa fa-pencil'></span> Edit
                            </a> 
                            <a href='admin_halaman.php?page=data_admin_hapus&nis=$admin[admin_nis]' class='btn btn-danger'>
                                <span class='fa fa-trash-o'></span> Hapus
                            </a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>";  // Menampilkan pesan error jika query gagal
        }
    } else {
        echo "<tr><td colspan='4'>Koneksi ke database gagal.</td></tr>";  // Menampilkan pesan jika koneksi gagal
    }
    ?>
  </tbody>
</table>
