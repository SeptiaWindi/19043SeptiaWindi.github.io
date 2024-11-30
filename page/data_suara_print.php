<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Print Suara Masuk</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/offcanvas.css" rel="stylesheet">
    <style>
        #grafik2 {
            width: 700px;
        }
    </style>
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script>
        window.print();
    </script>
</head>
<body>
    <div class="container">
        <table class="table">
            <tr>
                <th>No.Urut</th>
                <th>Nama Calon</th>
                <th>Suara</th>
            </tr>
            <?php 
                include "../config/koneksi.php";
                
                // Check for successful database connection
                if ($conn) {
                    // Query to get candidates
                    $sql = "SELECT * FROM t_calon ORDER BY calon_no";
                    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    while ($ret = mysqli_fetch_array($query)) {
                        $calon_no = $ret['calon_no'];
                        $calon_nama = $ret['calon_nama'];

                        // Query to get the number of votes for each candidate
                        $sql_jumlah = "SELECT count(*) as suara_jml FROM t_calon p 
                                       INNER JOIN t_suara b ON p.calon_no = b.calon_no 
                                       WHERE calon_nama = '$calon_nama'";
                        $query_jumlah = mysqli_query($conn, $sql_jumlah) or die(mysqli_error($conn));

                        // Get the total number of votes
                        $tosu = mysqli_query($conn, "SELECT * FROM t_suara");
                        $total_suara = mysqli_num_rows($tosu);

                        while ($data = mysqli_fetch_array($query_jumlah)) {
                            $suara_jml = $data['suara_jml'];
                        }
            ?>
                    <tr>
                        <td><?php echo $calon_no; ?></td>
                        <td><?php echo $calon_nama; ?></td>
                        <td><?php echo $suara_jml; ?></td>
                    </tr>
            <?php 
                    } 
            ?>
            <tr>
                <td colspan="2"><b>TOTAL SUARA MASUK :</b></td>
                <td colspan="2"><b><?php echo $total_suara; ?></b></td>
            </tr>
        </table>
    </div>
</body>
</html>
