-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Nov 2018 pada 08.10
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_fts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_dinkes`
--

CREATE TABLE `admin_dinkes` (
  `id_admin` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_kota_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_dinkes`
--

INSERT INTO `admin_dinkes` (`id_admin`, `id_pengguna`, `id_kota_kabupaten`) VALUES
(1, 3, 1),
(4, 6, 5),
(5, 7, 6),
(6, 8, 18),
(7, 9, 8),
(8, 10, 9),
(9, 11, 10),
(10, 12, 11),
(11, 13, 12),
(12, 14, 13),
(13, 15, 14),
(14, 16, 15),
(15, 17, 16),
(16, 18, 17),
(17, 19, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota_kabupaten`
--

CREATE TABLE `kota_kabupaten` (
  `id_kota_kabupaten` int(11) NOT NULL,
  `kota_kabupaten` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota_kabupaten`
--

INSERT INTO `kota_kabupaten` (`id_kota_kabupaten`, `kota_kabupaten`, `latitude`, `longitude`) VALUES
(1, 'Palembang', -2.98031, 104.751),
(3, 'Prabumulih', -3.42137, 104.244),
(5, 'Musi Banyuasin', -2.87533, 104.096),
(6, 'OKI', -3.45597, 105.219),
(8, 'Muara Enim', -3.71142, 104.007),
(9, 'Lahat', -3.78563, 103.541),
(10, 'Mura', -3.09565, 103.082),
(11, 'Pagar Alam', -4.04196, 103.228),
(12, 'Lubuk Linggau', -3.29959, 102.857),
(13, 'Banyuasin', -2.89674, 104.916),
(14, 'Ogan Ilir', -3.2496, 104.682),
(15, 'OKU Timur', -3.73928, 104.705),
(16, 'OKU Selatan', -4.52618, 104.077),
(17, 'Empat Lawang', -3.7286, 102.898),
(18, 'OKU', -4.02835, 104.007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penderita_tb`
--

CREATE TABLE `penderita_tb` (
  `id` int(11) NOT NULL,
  `id_kota_kabupaten` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penderita_tb`
--

INSERT INTO `penderita_tb` (`id`, `id_kota_kabupaten`, `jumlah`, `tahun`) VALUES
(11, 1, 1034, 2013),
(12, 1, 1404, 2014),
(13, 1, 1122, 2015),
(14, 1, 1131, 2016),
(15, 1, 1221, 2017),
(16, 3, 156, 2013),
(17, 3, 151, 2014),
(18, 3, 174, 2015),
(19, 3, 152, 2016),
(20, 3, 169, 2017),
(21, 5, 249, 2013),
(22, 5, 329, 2014),
(23, 5, 368, 2015),
(24, 5, 352, 2016),
(25, 5, 341, 2017),
(26, 6, 443, 2013),
(27, 6, 638, 2014),
(28, 6, 542, 2015),
(29, 6, 671, 2016),
(30, 6, 544, 2017),
(31, 18, 283, 2013),
(32, 18, 263, 2014),
(33, 18, 283, 2015),
(34, 18, 256, 2016),
(35, 18, 246, 2017),
(36, 8, 392, 2013),
(37, 8, 273, 2014),
(38, 8, 388, 2015),
(39, 8, 407, 2016),
(40, 8, 355, 2017),
(41, 9, 172, 2013),
(42, 9, 200, 2014),
(43, 9, 179, 2015),
(44, 9, 165, 2016),
(45, 9, 271, 2017),
(46, 10, 468, 2013),
(47, 10, 304, 2014),
(48, 10, 253, 2015),
(49, 10, 236, 2016),
(50, 10, 289, 2017),
(51, 11, 144, 2013),
(52, 11, 152, 2014),
(53, 11, 155, 2015),
(54, 11, 168, 2016),
(55, 11, 172, 2017),
(56, 12, 159, 2013),
(57, 12, 169, 2014),
(58, 12, 222, 2015),
(59, 12, 277, 2016),
(60, 12, 366, 2017),
(61, 13, 715, 2013),
(62, 13, 715, 2014),
(63, 13, 750, 2015),
(64, 13, 776, 2016),
(65, 13, 731, 2017),
(66, 14, 389, 2013),
(67, 14, 401, 2014),
(68, 14, 302, 2015),
(69, 14, 339, 2016),
(70, 14, 397, 2017),
(71, 15, 245, 2013),
(72, 15, 413, 2014),
(73, 15, 301, 2015),
(74, 15, 283, 2016),
(75, 15, 374, 2017),
(76, 16, 147, 2013),
(77, 16, 187, 2014),
(78, 16, 172, 2015),
(79, 16, 175, 2016),
(80, 16, 215, 2017),
(81, 17, 238, 2013),
(82, 17, 158, 2014),
(83, 17, 170, 2015),
(84, 17, 195, 2016),
(85, 17, 232, 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `kontak` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_role`, `nama`, `email`, `password`, `kontak`) VALUES
(1, 1, 'Azhary Arliansyah', 'arliansyah_azhary@yahoo.com', '985fabf8f96dc1c4c306341031569937', '1231432'),
(3, 2, 'Arliansyah Azhary', 'azhary.arliansyah@studentpartner.com', '985fabf8f96dc1c4c306341031569937', 'sadqwrwer'),
(6, 2, 'Dodi', 'muba@gmail.com', '69bc93ecb6d994cd17ecaa22457427a4', '321'),
(7, 2, 'dodo', 'oki@gmail.com', 'e210b2d4726eb89e951f1952be84c02f', '321'),
(8, 2, 'Cecep', 'oku@gmail.com', '17db1c0a61f0df07e68361443e2e4f11', '54321'),
(9, 2, 'joni', 'muaraenim@gmail.com', 'bc983b9d287e520137c5daf30005f14e', '54321'),
(10, 2, 'Jojon', 'lahat@gmail.com', '9561703ddb10bfc83ce764f9f89b4874', '54321'),
(11, 2, 'Jakson', 'mura@gmail.com', '9df79be2ca0795b0641e8aa3d3f21ffc', '12345'),
(12, 2, 'Jefferson Montero', 'pagaralam@gmail.com', '6df1204b120f2ca3e73601466d30f738', '54321'),
(13, 2, 'Renato Augusto', 'lubuklinggau@gmail.com', 'fdf0734e0bad689ba90478879f6c1794', '54321'),
(14, 2, 'Thiago Motta', 'banyuasin@gmail.com', 'daef6c3cfd3ca959297b53f08ffc2be7', '54321'),
(15, 2, 'Enner Valencia', 'oganilir@gmail.com', 'da325ec7201c5e49ce52e217c1a4234d', '54321'),
(16, 2, 'Maximilano Motta', 'okutimur@gmail.com', '99e41791cc4e9c73b5395f30afb99f66', '12345678'),
(17, 2, 'Klass Jan Huntelar', 'okuselatan@gmail.com', 'd2155d5c1a3b18c1c82a63acd089d033', '987654'),
(18, 2, 'Ikene Ikenwa ', 'empatlawang@gmail.com', '1459f299c8f4093cd77f0c4154bfa5df', '121212'),
(19, 2, 'Hakan Sukur', 'prabumulih@gmail.com', 'da03d6865f7e4ae6ef219b0118e169ed', '54321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`, `deskripsi`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Dinas Kesehatan', 'Dinas Kesehatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_dinkes`
--
ALTER TABLE `admin_dinkes`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_kota_kabupaten` (`id_kota_kabupaten`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  ADD PRIMARY KEY (`id_kota_kabupaten`);

--
-- Indexes for table `penderita_tb`
--
ALTER TABLE `penderita_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kota_kabupaten` (`id_kota_kabupaten`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_dinkes`
--
ALTER TABLE `admin_dinkes`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  MODIFY `id_kota_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `penderita_tb`
--
ALTER TABLE `penderita_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_dinkes`
--
ALTER TABLE `admin_dinkes`
  ADD CONSTRAINT `admin_dinkes_ibfk_1` FOREIGN KEY (`id_kota_kabupaten`) REFERENCES `kota_kabupaten` (`id_kota_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_dinkes_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penderita_tb`
--
ALTER TABLE `penderita_tb`
  ADD CONSTRAINT `penderita_tb_ibfk_1` FOREIGN KEY (`id_kota_kabupaten`) REFERENCES `kota_kabupaten` (`id_kota_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
