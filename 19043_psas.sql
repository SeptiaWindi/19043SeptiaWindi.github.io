-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2024 pada 08.25
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `19043_psas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_nis` int(10) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`admin_id`, `admin_nis`, `admin_password`, `admin_nama`) VALUES
(1, 123, '21232f297a57a5a743894a0e4a801fc3', 'Septia Windi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_calon`
--

CREATE TABLE `t_calon` (
  `calon_no` int(10) NOT NULL,
  `calon_nama` varchar(50) NOT NULL,
  `calon_kelas` varchar(100) NOT NULL,
  `calon_foto` varchar(250) NOT NULL,
  `calon_visimisi` text NOT NULL,
  `calon_priode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_calon`
--

INSERT INTO `t_calon` (`calon_no`, `calon_nama`, `calon_kelas`, `calon_foto`, `calon_visimisi`, `calon_priode`) VALUES
(1, 'Septia Windi & Yola Yulia Efendi', 'XI RPL', 'Cuplikan layar 2024-11-30 132049.png', 'Visi :\r\nMenjadikan OSISsebagai wadah kretivitas yang berprestasi serta mampu mengoptimalkan kinerja kapabilitas anggotanya.\r\n\r\nMisi :\r\n1. Membangun hubungan yang harmonis dengan seluruh SMKN 1 Bawang dengan tetap berprinsip pada Indepedensi siswa.\r\n2. Memperluas relasi dengan mengoptimalkan kegiatan  yang berhubungan dengan masyarakat.\r\n', '2023/2024'),
(2, 'Alviana Maysaroh & Wiwin Purwanti', 'XI RPL', 'Cuplikan layar 2024-11-30 132049.png', 'Visi :\r\nTerwujudnya SKANSA yang bergerak aktif dan dinamis secara internal maupun eksternal, serta menguatkan rasa kekeluargaan di SKANSA \r\n\r\nMisi :\r\n\r\n1. Mengadakan kegiatan yang menunjang sisi akademis maupun non akademis siswa/siswi di SMKN 1 Bawang\r\n2. Membangun relasi yang luas dengan mengoptimalkan kegiatan yang berhubungan dengan masyarakat.\r\n', '2023/2024'),
(3, 'Inez Raisya & Nafista Oktaviani ', 'XI RPL', 'Cuplikan layar 2024-11-30 132049.png', 'Visi :\r\n\r\nTerhimpunnya seluruh anggota OSIS untuk terciptanya relasi yang lebih baik dan budaya positif agar himpunan terus berkembang& kreatif.\r\n\r\nMisi :\r\n\r\n1. Menciptakan OSIS sebagai wadah yang lebih representatif dalam mengakomodasi aspirasi seluruh anggotanya.\r\n2. Menciptakan anggota OSIS yang kreatif & inofatif\r\n ', '2023/2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE `t_siswa` (
  `siswa_nis` int(10) NOT NULL,
  `siswa_password` varchar(100) NOT NULL,
  `siswa_nama` varchar(50) NOT NULL,
  `siswa_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`siswa_nis`, `siswa_password`, `siswa_nama`, `siswa_kelas`) VALUES
(1902, '755ca93099f8983eecbaadbe7d7f9a43', 'Tsabit Abdul Aziz', 'X AK 1'),
(1906, '0b58de40fdd13414953da05c63758b75', 'Muhammad Nuryansyah', 'X AK 1'),
(1909, '147a17277a72a59477ec5310668f19f6', 'Rahmayani Harahap', 'X AK 1'),
(12345, '827ccb0eea8a706c4c34a16891f84e7b', 'Yola Yulia', 'XI RPL'),
(19011, '3381c1cd3a2ceca3302c5c202e25fce8', 'Suryadi Tohri', 'X AK 1'),
(19012, '86be3779e430281c421b13ee33363a10', 'Muhammad Afief Farista', 'X AK 1'),
(19017, '9175222b4923de0069f5b18dcdb1300c', 'Adhesta Prasetiya', 'X AK 1'),
(19019, '401f2559ba35b0ab429b9a863fdeb0fc', 'Rakit Budianto', 'X AK 1'),
(19020, '3fa911763967b5bc71238bccb126f9fc', 'Rapeja Agustinus', 'X AK 1'),
(19027, 'dd34f708699b2c4b11cd56f1a34f38f0', 'Rizky Cakra Wardana', 'X AK 1'),
(19030, '985844f83613d5a654806c75a7d3c433', 'Asri Arum Sari Husain', 'X AK 1'),
(19039, 'bd245ce9f6a4321e4e8fa92956f9e158', 'Reza Satria', 'X AK 1'),
(19043, 'bcd724d15cde8c47650fda962968f102', 'windi', 'XI RPL'),
(19044, 'ce2eb4dc1cb71249a7ea2bfa66fb7aa3', 'Dwiyyogo Prasetyo', 'X AK 1'),
(19047, 'e41b39aae3287c4c180d0294ccb656e7', 'Riski Puji Lestari', 'X AK 1'),
(19061, '8aaea4a4a5ea5a9d5274dd3a7575fce6', 'Anysah Murtirinjani', 'X AK 1'),
(19068, '72cba2ff64d2d20b419afec1cba3ae6f', 'andrey', 'X AK 1'),
(19071, 'a554fb628aa2c0e18e656b654c6d03ae', 'Widia Diana', 'X AK 1'),
(19073, '039782de46011b5b8444086a6f8f6946', 'Novera Susanti', 'X AK 1'),
(19076, '9fb9bbfb33b2ede0a105032532bfe5c9', 'Hasan Nurodi', 'X AK 1'),
(19081, '292236bb27f6f84cb0dcf9e734da8836', 'Faidha farha', 'X AK 1'),
(19082, '65785db2e90de67107f0c1cc12d77fb9', 'Andry nugraha firdaus', 'X AK 1'),
(19095, '93f835aa0f4a17c1119225232fb36791', 'LIdya Handayani Sitorus', 'X AK 1'),
(19096, 'd6037e86393d5b36f557c109251cd5cf', 'Geraldine Valencia', 'X AK 1'),
(19097, '7d8a8079ae91dc5dc42837a37c0f5b4a', 'Misran ', 'X AK 1'),
(19099, '7751baa3d8eab895ea7b7a9cb1fcc156', 'Berto Lailatul', 'X AK 1'),
(19100, 'e927fc0788499b9e184ba33ce4f2331e', 'Juniardi Nugraha', 'X AK 1'),
(19101, '2131c6bb26378a3caf129696e32d9d67', 'Fitriani M', 'XI RPL'),
(19110, 'f19b174252aefbf7e4afeb87ef309792', 'Faisal Akbar Ramadhan', 'XI RPL'),
(19113, 'a5692e96be70dc7c7371f688acff2791', 'Ady Wiranatha Samsam', 'XI RPL'),
(19114, 'ee6008b6e1057c60a009320e37de4dd8', 'Ayu Anggara', 'XI RPL'),
(19124, '5f9f0c9c76ef417094ca435eda155c47', 'Alfi Zulfian Abdi', 'XI RPL'),
(19126, '3121b60c303c6e9ca3b7683868fa5ecf', 'Hary Syska Perdana', 'XI RPL'),
(19137, '18c3914c38a7b5e3c7b081d4035ef003', 'Dinan Sagara', 'XI RPL'),
(19138, '48317f42ab4f2495dcadd3cd98144561', 'Kania Kustiani', 'XI RPL'),
(19142, '51de80b2f41f584e533e5de57ef00842', 'Riza Fahlefi', 'XI RPL'),
(19145, '432f0d5a10907d997bfd50318ddb7d64', 'Muhammad Ramdhan T', 'XI RPL'),
(19156, 'aec9adcfa0a5d19461ae2b6d2bbc97c7', 'Muhammad Kusnadi', 'XI RPL'),
(19170, '71003c943b436dcab01b31204595f997', 'Muhammad Syihabuddin', 'XI RPL'),
(19185, '27ffdcbb3af5d6442d3ff1f5e6e9c3a3', 'Daniel Septri Panjaitan', 'XI RPL'),
(19186, 'a7c36a187ae033779c77aafa56aafd6c', 'Syakir Nimalmaula', 'XI RPL'),
(19195, '204e34fcc77de07aeb234224b5c3fe78', 'Iqbal Syarif Awaluddin', 'XI RPL'),
(1144101, '9b71b9251e45092fe7d7c9bcebd6a98e', 'Bayu Rizki', 'XI RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_suara`
--

CREATE TABLE `t_suara` (
  `suara_id` int(11) NOT NULL,
  `siswa_nis` int(10) NOT NULL,
  `calon_no` int(10) NOT NULL,
  `suara_jml` int(11) NOT NULL,
  `suara_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_suara`
--

INSERT INTO `t_suara` (`suara_id`, `siswa_nis`, `calon_no`, `suara_jml`, `suara_post`) VALUES
(5, 19101, 2, 1, '2022-12-31 07:28:32'),
(9, 19103, 1, 1, '2022-12-31 00:00:00'),
(10, 19104, 1, 1, '2022-12-31 00:00:00'),
(11, 19105, 2, 1, '2022-12-31 00:00:00'),
(12, 19196, 1, 1, '2022-12-31 08:59:13'),
(13, 19106, 1, 1, '2022-12-31 07:28:32'),
(14, 19107, 1, 1, '2022-12-31 07:28:32'),
(15, 19108, 1, 1, '2022-12-31 07:28:32'),
(16, 1111, 1, 1, '2023-01-25 13:14:32'),
(17, 19043, 1, 1, '2024-11-30 06:54:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_waktu_pemilihan`
--

CREATE TABLE `t_waktu_pemilihan` (
  `waktu_id` int(5) NOT NULL,
  `waktu_tglmulai` datetime NOT NULL,
  `waktu_tglselesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_waktu_pemilihan`
--

INSERT INTO `t_waktu_pemilihan` (`waktu_id`, `waktu_tglmulai`, `waktu_tglselesai`) VALUES
(1, '2024-12-30 07:00:00', '2024-12-30 01:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `t_calon`
--
ALTER TABLE `t_calon`
  ADD PRIMARY KEY (`calon_no`);

--
-- Indeks untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`siswa_nis`);

--
-- Indeks untuk tabel `t_suara`
--
ALTER TABLE `t_suara`
  ADD PRIMARY KEY (`suara_id`);

--
-- Indeks untuk tabel `t_waktu_pemilihan`
--
ALTER TABLE `t_waktu_pemilihan`
  ADD PRIMARY KEY (`waktu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_suara`
--
ALTER TABLE `t_suara`
  MODIFY `suara_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_waktu_pemilihan`
--
ALTER TABLE `t_waktu_pemilihan`
  MODIFY `waktu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
