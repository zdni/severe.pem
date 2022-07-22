-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 22 Jul 2022 pada 14.40
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
(2, 'C1', 'Lingkar Lengan Atas', 10, 'cost'),
(3, 'C2', 'Kehilangan Masa Otot', 10, 'cost'),
(4, 'C3', 'Kehilangan Otot Lemak di Dada', 30, 'benefit'),
(5, 'C4', 'Tinggi Badan', 30, 'benefit'),
(6, 'C5', 'Berat Badan', 20, 'benefit');

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
(1, 'Ny. Hayan'),
(3, 'Ny.Ratnia'),
(4, 'Tn. Kaerudin'),
(5, 'Tn. Bangun'),
(6, 'Ny. Saharia');

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
(6, 1, 2, 4, 1),
(7, 1, 3, 2, 1),
(8, 1, 4, 7, 1),
(9, 1, 5, 11, 1),
(10, 1, 6, 13, 1),
(11, 3, 2, 4, 1),
(12, 3, 3, 2, 1),
(13, 3, 4, 8, 1),
(14, 3, 5, 10, 1),
(15, 3, 6, 14, 1),
(16, 4, 2, 4, 1),
(17, 4, 3, 6, 1),
(18, 4, 4, 7, 1),
(19, 4, 5, 11, 1),
(20, 4, 6, 14, 1),
(21, 5, 2, 4, 1),
(22, 5, 3, 2, 1),
(23, 5, 4, 7, 1),
(24, 5, 5, 10, 1),
(25, 5, 6, 12, 1),
(26, 6, 2, 4, 1),
(27, 6, 3, 6, 1),
(28, 6, 4, 8, 1),
(29, 6, 5, 11, 1),
(30, 6, 6, 13, 1);

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
(2, 3, 'Wasting Tidak Bergelambir', 'Buruk', 1),
(3, 2, '23-22', 'Buruk', 1),
(4, 2, '19-21,9', 'Kurang', 2),
(5, 2, '<19', 'Cukup', 3),
(6, 3, 'Wasting Bergelambir', 'Cukup', 2),
(7, 4, 'Tidak Kehilangan Otot Lemak Dada', 'Buruk', 1),
(8, 4, 'Kehilangan Otot Lemak Dada', 'Cukup', 2),
(9, 5, '165 - 160 cm', 'Buruk', 1),
(10, 5, '150 - 155 cm', 'Kurang', 2),
(11, 5, '140 - 145 cm', 'Cukup', 3),
(12, 6, '17,9 - 18 kg', 'Buruk', 1),
(13, 6, '16 - 17 kg', 'Kurang', 2),
(14, 6, '<14,9 kg', 'Cukup', 3);

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
  `role_id` int(11) NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `image`, `role_id`, `laboratory_id`) VALUES
(1, 'admin', 'Administrator', '$2y$10$uGSBRKsWu2Xv0.xCmtNxPe52W2f10pLAqdlyK4o4WVbshywCmvaOe', 'admin.png', 1, 1);

--
-- Indexes for dumped tables
--

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
  ADD KEY `role_id` (`role_id`),
  ADD KEY `laboratory_id` (`laboratory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;