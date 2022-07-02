-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 02 Jul 2022 pada 14.54
-- Versi Server: 5.7.38-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-28+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poltekkes_maluku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `thumbnail` text NOT NULL,
  `create_by` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `create_date` date NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `file`, `thumbnail`, `create_by`, `post_date`, `create_date`, `slug`) VALUES
(1, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(2, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(3, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(4, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(5, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(6, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(7, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(8, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(9, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(10, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(11, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022'),
(12, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022 Computer Based Test (CBT) oleh Poltekkes Kemenkes Maluku yang diikuti oleh jurusan keperawatan Ambon 18 Juni 2022, Teknologi Laboratorium Medis 19 Juni 2022, dan Gizi 20 Juni 2022.', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.html', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', 1, '2022-07-01', '2022-07-01', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `file` text NOT NULL,
  `download_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `documents`
--

INSERT INTO `documents` (`id`, `title`, `slug`, `file`, `download_id`) VALUES
(1, 'Daftar Penelitian Laboratorium Terpadu Tahun 2019', 'daftar_penelitian_laboratorium_terpadu_tahun_2019', 'daftar_penelitian_laboratorium_terpadu_tahun_2019.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `downloads`
--

INSERT INTO `downloads` (`id`, `menu`, `header`) VALUES
(1, 'Daftar Penelitian', 'Daftar Penelitian Poltekkes Kemenkes Maluku'),
(2, 'Daftar Pengujian', 'Daftar Pengujian Poltekkes Kemenkes Maluku'),
(3, 'Hasil Penelitian', 'Hasil Penelitian Poltekkes Kemenkes Maluku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `total` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `image`, `total`, `state`) VALUES
(1, 'Lobby', 'Lobby Poltekkes', 'lobby.jpeg', 1, 'Terawat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `image` text NOT NULL,
  `create_data` date NOT NULL,
  `post_date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `image`, `create_data`, `post_date`, `description`) VALUES
(1, 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022', 'kegiatan_try_out_uji_kompetensi_(ukom)_juni_2022.jpg', '2022-07-02', '2022-07-02', 'Kegiatan Try Out Uji Kompetensi (UKom) Juni 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `heros`
--

INSERT INTO `heros` (`id`, `image`) VALUES
(1, 'slide-medical-2-1.jpg'),
(2, 'slide-medical-2-2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laboratories`
--

CREATE TABLE `laboratories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laboratories`
--

INSERT INTO `laboratories` (`id`, `name`, `slug`, `file`) VALUES
(1, 'POLTEKKES KEMENKES MALUKU', 'poltekkes_kemenkes_maluku', '-'),
(2, 'Kebidanan Ambon', 'kebidanan_ambon', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `moduls`
--

CREATE TABLE `moduls` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `is_show` int(1) NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `moduls`
--

INSERT INTO `moduls` (`id`, `title`, `file`, `is_show`, `laboratory_id`) VALUES
(1, 'Sample VUE JS', 'sample_vue_js.pdf', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `file` text NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `title`, `slug`, `file`, `sequence`) VALUES
(1, 'Visi dan Misi', 'visi_dan_misi', 'visi_dan_misi.html', 1),
(2, 'Latar Belakang', 'latar_belakang', 'latar_belakang.html', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `link` text NOT NULL,
  `is_show` int(1) NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin'),
(2, 'uadmin');

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
(1, 'admin', 'Administrator', '$2y$10$uGSBRKsWu2Xv0.xCmtNxPe52W2f10pLAqdlyK4o4WVbshywCmvaOe', 'admin.png', 1, 1),
(2, 'admin_kebidanan', 'Admin Kebidanan', '$2y$10$Ofun0dAJQN5jeHhvWbtq.eiprlXkxeFmZF6B.rH7bkqfZWUJAGan2', 'user.png', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `is_show` int(1) NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratory_id` (`laboratory_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratory_id` (`laboratory_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `laboratory_id` (`laboratory_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laboratory_id` (`laboratory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`);

--
-- Ketidakleluasaan untuk tabel `moduls`
--
ALTER TABLE `moduls`
  ADD CONSTRAINT `moduls_ibfk_1` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`);

--
-- Ketidakleluasaan untuk tabel `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD CONSTRAINT `questionnaires_ibfk_1` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`);

--
-- Ketidakleluasaan untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`laboratory_id`) REFERENCES `laboratories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
