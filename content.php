<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'welcome'; // Default to 'welcome' page

switch ($page) {
    case 'welcome':
        include "page/welcome.php";
        break;
    
    case 'login_mhs':
        include "login_mhs.php";
        break;

    case 'aksi_mhs':
        include "aksi_mhs.php";
        break;

    case 'login_admin':
        include "login_admin.php";
        break;

    case 'aksi_admin':
        include "aksi_admin.php";
        break;

    case 'admin_halaman':
        include "admin_halaman.php";
        break;

    case 'mhs_halaman':
        include "mhs_halaman.php";
        break;

    case 'logout':
        include "logout.php";
        break;

    case 'admin_home':
        include "page/admin_home.php";
        break;

    case 'mhs_home':
        include "page/mhs_home.php";
        break;

    case 'data_mhs':
        include "page/data_mhs.php";
        break;

    case 'data_mhs_tambah':
        include "page/data_mhs_tambah.php";
        break;

    case 'data_mhs_hapus':
        include "page/data_mhs_hapus.php";
        break;

    case 'data_mhs_edit':
        include "page/data_mhs_edit.php";
        break;

    case 'data_admin':
        include "page/data_admin.php";
        break;

    case 'data_admin_tambah':
        include "page/data_admin_tambah.php";
        break;

    case 'data_admin_hapus':
        include "page/data_admin_hapus.php";
        break;

    case 'data_admin_edit':
        include "page/data_admin_edit.php";
        break;

    case 'data_kahim':
        include "page/data_kahim.php";
        break;

    case 'data_kahim_tambah':
        include "page/data_kahim_tambah.php";
        break;

    case 'data_kahim_hapus':
        include "page/data_kahim_hapus.php";
        break;

    case 'data_kahim_edit':
        include "page/data_kahim_edit.php";
        break;

    case 'data_suara':
        include "page/data_suara.php";
        break;

    case 'data_suara_print':
        include "page/data_suara_print.php";
        break;

    case 'data_suara_hapus':
        include "page/data_suara_hapus.php";
        break;

    case 'tgl_pemilihan':
        include "page/tgl_pemilihan.php";
        break;

    default:
        echo "<div class='alert alert-danger'>Halaman tidak ditemukan!</div>";
        break;
}
?>
