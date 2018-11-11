-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Nov 2018 pada 15.12
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 3, 1);

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
(1, 'Palembang', -2.98031, 104.751);

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
(3, 2, 'Arliansyah Azhary', 'azhary.arliansyah@studentpartner.com', '985fabf8f96dc1c4c306341031569937', 'sadqwrwer');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota_kabupaten`
--
ALTER TABLE `kota_kabupaten`
  MODIFY `id_kota_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penderita_tb`
--
ALTER TABLE `penderita_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
