<h3>Data Suara yang telah masuk</h3><br>
<a href="admin_halaman.php?page=data_suara_hapus" class="btn btn-danger" style="float:right" onClick="return confirm('Apakah anda akan Menghapus Semua Suara?');">Hapus Semua Suara</a>
<a href="page/data_suara_print.php" class="btn btn-primary" style="float:right" target="_blank">Print Out Suara</a>
<br /><br /><br />

<table class="table">
    <thead>
        <tr>
            <th>No. Urut</th>
            <th>Nama Calon</th>
            <th>Suara</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        include "config/koneksi.php"; 
        // Query untuk mengambil data calon
        $sql = "SELECT * FROM t_calon ORDER BY calon_no";
        $query = mysqli_query($conn, $sql);
        
        // Menghitung total suara
        $total_suara_query = mysqli_query($conn, "SELECT COUNT(*) AS total_suara FROM t_suara");
        $total_suara_data = mysqli_fetch_assoc($total_suara_query);
        $total_suara = $total_suara_data['total_suara'];

        while ($ret = mysqli_fetch_array($query)) {
            $calon_no = $ret['calon_no'];       
            $calon_nama = $ret['calon_nama'];

            // Menghitung jumlah suara untuk setiap calon
            $sql_jumlah = "SELECT COUNT(*) AS suara_jml FROM t_suara WHERE calon_no = '$calon_no'";
            $query_jumlah = mysqli_query($conn, $sql_jumlah);
            $suara_data = mysqli_fetch_assoc($query_jumlah);
            $suara_jml = $suara_data['suara_jml'];
    ?>
        <tr>
            <td><?php echo $calon_no; ?></td>
            <td><?php echo $calon_nama; ?></td>
            <td><?php echo $suara_jml; ?></td>
        </tr>
    <?php } ?>
        <tr>
            <td colspan="2"><b>TOTAL SUARA MASUK:</b></td>
            <td><b><?php echo $total_suara; ?></b></td>
        </tr>
    </tbody>
</table>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/exporting.js"></script>
<script type="text/javascript">
    $(function () {
        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Suara yang Sudah Masuk'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah Suara',
                colorByPoint: true,
                data: [
                    <?php 
                        // Ambil data suara untuk grafik pie
                        $sql = "SELECT calon_nama, COUNT(*) AS suara_jml FROM t_calon p INNER JOIN t_suara b ON p.calon_no = b.calon_no GROUP BY p.calon_nama";
                        $query = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        {
                            name: '<?php echo $data['calon_nama']; ?>',
                            y: <?php echo $data['suara_jml']; ?>
                        },
                    <?php } ?>
                ]
            }]
        });
    });
</script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<br />

<script type="text/javascript">
    $(document).ready(function () {
        var chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik2',
                type: 'column'
            },
            title: {
                text: 'Suara yang Sudah Masuk'
            },
            xAxis: {
                categories: ['Nama Calon Ketua Himpunan Teknik Informatika']
            },
            yAxis: {
                title: {
                    text: 'Skala Banyak Suara'
                }
            },
            series: [
                <?php 
                    $sql = "SELECT calon_nama, COUNT(*) AS suara_jml FROM t_calon p INNER JOIN t_suara b ON p.calon_no = b.calon_no GROUP BY p.calon_nama";
                    $query = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    {
                        name: '<?php echo $data['calon_nama']; ?>',
                        data: [<?php echo $data['suara_jml']; ?>]
                    },
                <?php } ?>
            ]
        });
    });
</script>

<div id="grafik2"></div>
