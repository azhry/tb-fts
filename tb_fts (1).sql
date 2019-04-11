-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Apr 2019 pada 10.08
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
  `tahun` int(11) NOT NULL,
  `triwulan` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penderita_tb`
--

INSERT INTO `penderita_tb` (`id`, `id_kota_kabupaten`, `jumlah`, `tahun`, `triwulan`) VALUES
(11, 1, 1034, 2013, 0),
(12, 1, 1404, 2014, 0),
(13, 1, 1122, 2015, 0),
(14, 1, 1131, 2016, 0),
(15, 1, 1221, 2017, 0),
(16, 3, 156, 2013, 0),
(17, 3, 151, 2014, 0),
(18, 3, 174, 2015, 0),
(19, 3, 152, 2016, 0),
(20, 3, 169, 2017, 0),
(21, 5, 249, 2013, 0),
(22, 5, 329, 2014, 0),
(23, 5, 368, 2015, 0),
(24, 5, 352, 2016, 0),
(25, 5, 341, 2017, 0),
(31, 18, 283, 2013, 0),
(32, 18, 263, 2014, 0),
(33, 18, 283, 2015, 0),
(34, 18, 256, 2016, 0),
(35, 18, 246, 2017, 0),
(36, 8, 392, 2013, 0),
(37, 8, 273, 2014, 0),
(38, 8, 388, 2015, 0),
(39, 8, 407, 2016, 0),
(40, 8, 355, 2017, 0),
(41, 9, 172, 2013, 0),
(42, 9, 200, 2014, 0),
(43, 9, 179, 2015, 0),
(44, 9, 165, 2016, 0),
(45, 9, 271, 2017, 0),
(46, 10, 468, 2013, 0),
(47, 10, 304, 2014, 0),
(48, 10, 253, 2015, 0),
(49, 10, 236, 2016, 0),
(50, 10, 289, 2017, 0),
(51, 11, 144, 2013, 0),
(52, 11, 152, 2014, 0),
(53, 11, 155, 2015, 0),
(54, 11, 168, 2016, 0),
(55, 11, 172, 2017, 0),
(56, 12, 159, 2013, 0),
(57, 12, 169, 2014, 0),
(58, 12, 222, 2015, 0),
(59, 12, 277, 2016, 0),
(60, 12, 366, 2017, 0),
(61, 13, 715, 2013, 0),
(62, 13, 715, 2014, 0),
(63, 13, 750, 2015, 0),
(64, 13, 776, 2016, 0),
(65, 13, 731, 2017, 0),
(66, 14, 389, 2013, 0),
(67, 14, 401, 2014, 0),
(68, 14, 302, 2015, 0),
(69, 14, 339, 2016, 0),
(70, 14, 397, 2017, 0),
(71, 15, 245, 2013, 0),
(72, 15, 413, 2014, 0),
(73, 15, 301, 2015, 0),
(74, 15, 283, 2016, 0),
(75, 15, 374, 2017, 0),
(76, 16, 147, 2013, 0),
(77, 16, 187, 2014, 0),
(78, 16, 172, 2015, 0),
(79, 16, 175, 2016, 0),
(80, 16, 215, 2017, 0),
(81, 17, 238, 2013, 0),
(82, 17, 158, 2014, 0),
(83, 17, 170, 2015, 0),
(84, 17, 195, 2016, 0),
(85, 17, 232, 2017, 0),
(87, 6, 20, 2014, 0),
(88, 6, 12, 2015, 0),
(89, 6, 13, 2016, 0),
(90, 6, 23, 2017, 0),
(94, 6, 15, 2013, 11);

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
(19, 2, 'Hakan Sukur', 'prabumulih@gmail.com', 'da03d6865f7e4ae6ef219b0118e169ed', '54321'),
(20, 1, 'M.Hakim Amransyah', 'm.hakim.amransyah.hakim@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_peramalan`
--

CREATE TABLE `record_peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `d1` double NOT NULL,
  `d2` double NOT NULL,
  `id_kota_kabupaten` int(11) NOT NULL,
  `tahun` smallint(6) NOT NULL,
  `aktual` double NOT NULL,
  `ramal` double NOT NULL,
  `mse` double NOT NULL,
  `mape` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `record_peramalan`
--

INSERT INTO `record_peramalan` (`id_peramalan`, `d1`, `d2`, `id_kota_kabupaten`, `tahun`, `aktual`, `ramal`, `mse`, `mape`, `created_at`, `updated_at`) VALUES
(61, 0, 0, 1, 2014, 1404, 1450, 2116, 3.2763532763533, '2019-01-29 23:38:09', '2019-04-11 07:18:28'),
(62, 0, 0, 1, 2015, 1122, 1100, 484, 1.9607843137255, '2019-01-29 23:38:09', '2019-04-11 07:18:28'),
(63, 0, 0, 1, 2016, 1131, 1350, 47961, 19.363395225464, '2019-01-29 23:38:09', '2019-04-11 07:18:28'),
(64, 0, 0, 1, 2017, 1221, 1350, 16641, 10.565110565111, '2019-01-29 23:38:09', '2019-04-11 07:18:28'),
(65, 0, 0, 3, 2014, 151, 163, 144, 7.9470198675497, '2019-01-29 23:41:43', '2019-04-11 07:41:34'),
(66, 0, 0, 3, 2015, 174, 163, 121, 6.3218390804598, '2019-01-29 23:41:43', '2019-04-11 07:41:35'),
(67, 0, 0, 3, 2016, 152, 151, 1, 0.65789473684211, '2019-01-29 23:41:43', '2019-04-11 07:41:35'),
(68, 0, 0, 3, 2017, 169, 163, 36, 3.5502958579882, '2019-01-29 23:41:43', '2019-04-11 07:41:35'),
(69, 10, 0, 3, 2013, 156, 104, 2704, 33.333333333333, '2019-02-07 05:18:56', '2019-02-07 05:18:56'),
(70, 0, 0, 18, 2014, 263, 261, 4, 0.76045627376426, '2019-02-07 12:33:45', '2019-04-11 08:08:16'),
(71, 0, 0, 18, 2015, 283, 286, 9, 1.0600706713781, '2019-02-07 12:33:45', '2019-04-11 08:08:16'),
(72, 0, 0, 18, 2016, 256, 261, 25, 1.953125, '2019-02-07 12:33:45', '2019-04-11 08:08:16'),
(73, 0, 0, 18, 2017, 246, 266, 400, 8.130081300813, '2019-02-07 12:33:45', '2019-04-11 08:08:16'),
(74, 0, 0, 17, 2014, 158, 176, 324, 11.392405063291, '2019-02-07 12:34:00', '2019-04-11 07:46:53'),
(75, 0, 0, 17, 2015, 170, 201, 961, 18.235294117647, '2019-02-07 12:34:00', '2019-04-11 07:46:53'),
(76, 0, 0, 17, 2016, 195, 176, 361, 9.7435897435897, '2019-02-07 12:34:00', '2019-04-11 07:46:53'),
(77, 0, 0, 17, 2017, 232, 201, 961, 13.362068965517, '2019-02-07 12:34:00', '2019-04-11 07:46:53'),
(78, 0, 0, 16, 2014, 187, 186, 1, 0.53475935828877, '2019-02-07 12:34:50', '2019-04-11 07:46:24'),
(79, 0, 0, 16, 2015, 172, 161, 121, 6.3953488372093, '2019-02-07 12:34:51', '2019-04-11 07:46:24'),
(80, 0, 0, 16, 2016, 175, 201, 676, 14.857142857143, '2019-02-07 12:34:51', '2019-04-11 07:46:24'),
(81, 0, 0, 16, 2017, 215, 201, 196, 6.5116279069767, '2019-02-07 12:34:51', '2019-04-11 07:46:25'),
(82, 0, 0, 15, 2014, 413, 400, 169, 3.1476997578692, '2019-02-07 12:35:00', '2019-03-27 04:48:35'),
(83, 0, 0, 15, 2015, 301, 300, 1, 0.33222591362126, '2019-02-07 12:35:00', '2019-03-05 05:00:40'),
(84, 0, 0, 15, 2016, 283, 350, 4489, 23.674911660777, '2019-02-07 12:35:00', '2019-03-27 04:48:35'),
(85, 0, 0, 15, 2017, 374, 400, 676, 6.951871657754, '2019-02-07 12:35:00', '2019-03-27 04:48:35'),
(86, 0, 0, 14, 2014, 401, 405, 16, 0.99750623441397, '2019-02-07 12:35:08', '2019-04-11 07:46:01'),
(87, 0, 0, 14, 2015, 302, 345, 1849, 14.238410596026, '2019-02-07 12:35:09', '2019-04-11 07:46:01'),
(88, 0, 0, 14, 2016, 339, 370, 961, 9.1445427728614, '2019-02-07 12:35:09', '2019-04-11 07:46:01'),
(89, 0, 0, 14, 2017, 397, 350, 2209, 11.83879093199, '2019-02-07 12:35:09', '2019-04-11 07:46:01'),
(90, 0, 0, 13, 2014, 715, 745, 900, 4.1958041958042, '2019-02-07 12:35:14', '2019-04-11 07:45:34'),
(91, 0, 0, 13, 2015, 750, 745, 25, 0.66666666666667, '2019-02-07 12:35:14', '2019-04-11 07:45:34'),
(92, 0, 0, 13, 2016, 776, 0, 602176, 100, '2019-02-07 12:35:14', '2019-04-02 13:00:36'),
(93, 0, 0, 13, 2017, 731, 740, 81, 1.2311901504788, '2019-02-07 12:35:14', '2019-04-11 07:45:34'),
(94, 0, 0, 12, 2014, 169, 250, 6561, 47.92899408284, '2019-02-07 12:35:18', '2019-04-02 13:00:15'),
(95, 0, 0, 12, 2015, 222, 250, 784, 12.612612612613, '2019-02-07 12:35:18', '2019-04-02 13:00:15'),
(96, 0, 0, 12, 2016, 277, 250, 729, 9.7472924187726, '2019-02-07 12:35:18', '2019-03-27 04:48:06'),
(97, 0, 0, 12, 2017, 366, 250, 13456, 31.693989071038, '2019-02-07 12:35:18', '2019-03-27 04:48:06'),
(98, 0, 0, 5, 2014, 329, 350, 441, 6.3829787234043, '2019-02-21 05:18:57', '2019-03-27 04:46:57'),
(99, 0, 0, 5, 2015, 368, 250, 13924, 32.065217391304, '2019-02-21 05:18:57', '2019-04-02 12:58:11'),
(100, 0, 0, 5, 2016, 352, 250, 10404, 28.977272727273, '2019-02-21 05:18:57', '2019-04-02 12:58:11'),
(101, 0, 0, 5, 2017, 341, 250, 8281, 26.686217008798, '2019-02-21 05:18:57', '2019-04-02 12:58:11'),
(102, 0, 0, 6, 2014, 20, 25, 25, 25, '2019-02-21 05:19:05', '2019-04-11 08:02:11'),
(103, 0, 0, 6, 2015, 12, 15, 9, 25, '2019-02-21 05:19:05', '2019-04-11 07:39:47'),
(104, 0, 0, 6, 2016, 13, 25, 144, 92.307692307692, '2019-02-21 05:19:05', '2019-04-11 07:39:47'),
(105, 0, 0, 6, 2017, 23, 25, 4, 8.695652173913, '2019-02-21 05:19:05', '2019-04-11 07:39:47'),
(106, 0, 0, 8, 2014, 273, 350, 5929, 28.205128205128, '2019-02-21 05:19:15', '2019-03-27 04:47:18'),
(107, 0, 0, 8, 2015, 388, 350, 1444, 9.7938144329897, '2019-02-21 05:19:15', '2019-03-27 04:47:18'),
(108, 0, 0, 8, 2016, 407, 350, 3249, 14.004914004914, '2019-02-21 05:19:15', '2019-03-27 04:47:18'),
(109, 0, 0, 8, 2017, 355, 350, 25, 1.4084507042254, '2019-02-21 05:19:15', '2019-03-27 04:47:18'),
(110, 0, 0, 9, 2014, 200, 250, 2500, 25, '2019-02-21 05:19:24', '2019-04-02 12:59:22'),
(111, 0, 0, 9, 2015, 179, 150, 841, 16.201117318436, '2019-02-21 05:19:24', '2019-03-27 04:47:29'),
(112, 0, 0, 9, 2016, 165, 250, 7225, 51.515151515152, '2019-02-21 05:19:24', '2019-04-02 12:59:22'),
(113, 0, 0, 9, 2017, 271, 250, 441, 7.7490774907749, '2019-02-21 05:19:24', '2019-04-02 12:59:22'),
(114, 0, 0, 10, 2014, 304, 350, 2116, 15.131578947368, '2019-02-21 05:19:32', '2019-03-27 04:47:42'),
(115, 0, 0, 10, 2015, 253, 350, 9409, 38.339920948617, '2019-02-21 05:19:33', '2019-03-27 04:47:42'),
(116, 0, 0, 10, 2016, 236, 350, 12996, 48.305084745763, '2019-02-21 05:19:33', '2019-04-02 12:59:30'),
(117, 0, 0, 10, 2017, 289, 350, 3721, 21.107266435986, '2019-02-21 05:19:33', '2019-04-02 12:59:30'),
(118, 0, 0, 11, 2014, 152, 156, 16, 2.6315789473684, '2019-02-21 05:19:47', '2019-04-11 07:44:29'),
(119, 0, 0, 11, 2015, 155, 156, 1, 0.64516129032258, '2019-02-21 05:19:47', '2019-04-11 07:44:29'),
(120, 0, 0, 11, 2016, 168, 156, 144, 7.1428571428571, '2019-02-21 05:19:47', '2019-04-11 07:44:30'),
(121, 0, 0, 11, 2017, 172, 166, 36, 3.4883720930233, '2019-02-21 05:19:47', '2019-04-11 07:44:30'),
(122, 0, 0, 6, 2018, 23, 15, 64, 34.782608695652, '2019-04-11 06:52:04', '2019-04-11 07:39:47'),
(123, 0, 0, 6, 2019, 11, 15, 16, 36.363636363636, '2019-04-11 06:52:04', '2019-04-11 07:39:47');

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
-- Indexes for table `record_peramalan`
--
ALTER TABLE `record_peramalan`
  ADD PRIMARY KEY (`id_peramalan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `record_peramalan`
--
ALTER TABLE `record_peramalan`
  MODIFY `id_peramalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
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
