-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28 Jul 2022 pada 13.01
-- Versi Server: 5.7.38-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-28+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `severe_pem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `bobot`, `jenis`) VALUES
(7, 'C1', 'Pelayanan Polsek', 25, 'benefit'),
(8, 'C2', 'Penyelesaian Tindak Pidana (PTP)', 20, 'benefit'),
(9, 'C3', 'Jumlah Personel', 25, 'benefit'),
(10, 'C4', 'Kebersihan Polsek', 20, 'benefit'),
(11, 'C5', 'Jumlah Tindak Pidana (JTP)', 10, 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`) VALUES
(1, 'Polsek Bangun Purba'),
(3, 'Polsek Batang Kuis'),
(4, 'Polsek Beringin'),
(5, 'Polsek Biru-Biru'),
(6, 'Polsek Galang'),
(7, 'Polsek Gunung Meriah'),
(8, 'Polsek Lubuk Pakam'),
(9, 'Polsek Namo Rambe'),
(10, 'Polsek Pagar Merbau'),
(11, 'Polsek Talun Kenas'),
(12, 'Polsek Tanjung Morawa'),
(13, 'Polsek Tiga Juhar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `subkriteria_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `pasien_id`, `kriteria_id`, `subkriteria_id`, `sequence`) VALUES
(1, 1, 7, 16, 1),
(2, 1, 8, 20, 1),
(3, 1, 9, 32, 1),
(4, 1, 10, 45, 1),
(5, 1, 11, 49, 1),
(6, 3, 7, 16, 1),
(7, 3, 8, 21, 1),
(8, 3, 9, 34, 1),
(9, 3, 10, 45, 1),
(10, 3, 11, 50, 1),
(11, 4, 7, 16, 1),
(12, 4, 8, 22, 1),
(13, 4, 9, 35, 1),
(14, 4, 10, 45, 1),
(15, 4, 11, 51, 1),
(16, 5, 7, 16, 1),
(17, 5, 8, 23, 1),
(18, 5, 9, 36, 1),
(19, 5, 10, 45, 1),
(20, 5, 11, 52, 1),
(21, 6, 7, 16, 1),
(22, 6, 8, 24, 1),
(23, 6, 9, 33, 1),
(24, 6, 10, 45, 1),
(25, 6, 11, 53, 1),
(26, 7, 7, 16, 1),
(27, 7, 8, 25, 1),
(28, 7, 9, 37, 1),
(29, 7, 10, 45, 1),
(30, 7, 11, 54, 1),
(31, 8, 7, 16, 1),
(32, 8, 8, 26, 1),
(33, 8, 9, 38, 1),
(34, 8, 10, 45, 1),
(35, 8, 11, 55, 1),
(36, 9, 7, 16, 1),
(37, 9, 8, 27, 1),
(38, 9, 9, 39, 1),
(39, 9, 10, 45, 1),
(40, 9, 11, 56, 1),
(41, 10, 7, 16, 1),
(42, 10, 8, 28, 1),
(43, 10, 9, 40, 1),
(44, 10, 10, 45, 1),
(45, 10, 11, 57, 1),
(46, 11, 7, 16, 1),
(47, 11, 8, 29, 1),
(48, 11, 9, 41, 1),
(49, 11, 10, 45, 1),
(50, 11, 11, 58, 1),
(51, 12, 7, 16, 1),
(52, 12, 8, 30, 1),
(53, 12, 9, 42, 1),
(54, 12, 10, 45, 1),
(55, 12, 11, 59, 1),
(56, 13, 7, 16, 1),
(57, 13, 8, 31, 1),
(58, 13, 9, 43, 1),
(59, 13, 10, 45, 1),
(60, 13, 11, 60, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `kriteria_id`, `nilai`, `keterangan`, `bobot`) VALUES
(15, 7, '81-100', 'SB', 4),
(16, 7, '61-80', 'B', 3),
(17, 7, '41-60', 'CB', 2),
(18, 7, '21-40', 'KB', 1),
(19, 7, '0-20', 'STB', 0),
(20, 8, '15', '-', 15),
(21, 8, '54', '-', 54),
(22, 8, '78', '-', 78),
(23, 8, '31', '-', 31),
(24, 8, '47', '-', 47),
(25, 8, '0', '-', 0),
(26, 8, '48', '-', 48),
(27, 8, '34', '-', 34),
(28, 8, '22', '-', 22),
(29, 8, '28', '-', 28),
(30, 8, '78', '-', 78),
(31, 8, '10', '-', 10),
(32, 9, '40 orang', '-', 40),
(33, 9, '51 orang', '-', 51),
(34, 9, '63 orang', '-', 63),
(35, 9, '69 orang', '-', 69),
(36, 9, '41 orang', '-', 41),
(37, 9, '25 orang', '-', 25),
(38, 9, '44 orang', '-', 44),
(39, 9, '59 orang', '-', 59),
(40, 9, '37 orang', '-', 37),
(41, 9, '36 orang', '-', 36),
(42, 9, '69 orang', '-', 69),
(43, 9, '29 orang', '-', 29),
(44, 10, '80-100', 'SB', 4),
(45, 10, '60-79', 'B', 3),
(46, 10, '40-59', 'CB', 2),
(47, 10, '21-39', 'KB', 1),
(48, 10, '0-20', 'TB', 0),
(49, 11, '18', '-', 18),
(50, 11, '83', '-', 83),
(51, 11, '101', '-', 101),
(52, 11, '46', '-', 46),
(53, 11, '81', '-', 81),
(54, 11, '0', '-', 0),
(55, 11, '95', '-', 95),
(56, 11, '48', '-', 48),
(57, 11, '35', '-', 35),
(58, 11, '47', '-', 47),
(59, 11, '90', '-', 90),
(60, 11, '15', '-', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `image`, `role_id`) VALUES
(1, 'admin', 'Administrator', '$2y$10$uGSBRKsWu2Xv0.xCmtNxPe52W2f10pLAqdlyK4o4WVbshywCmvaOe', 'admin.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id` (`pasien_id`),
  ADD KEY `kriteria_id` (`kriteria_id`),
  ADD KEY `subkriteria_id` (`subkriteria_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriteria` (`id`);

--
-- Ketidakleluasaan untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
