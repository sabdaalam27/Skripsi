-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Okt 2020 pada 15.19
-- Versi server: 10.2.31-MariaDB-cll-lve
-- Versi PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemar_upk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `user_name`, `password`, `jabatan`, `akses`) VALUES
(4, 'admin', 'admin', '$2y$10$jtqT1y.rI0mLVPYUKvk1ROyQsO24s3/NnhSwIiNh1anQontall51C', 'admin', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(4) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `file_surat` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `tanggal_keluar`, `penerima`, `perihal`, `file_surat`) VALUES
(4, '2', '2012-01-01', 'Desa Cikawao', 'Undangan', 0x31353934393737353232636f6e746f68322e6a7067),
(8, '1', '2020-07-24', 'Desa Cinangela', 'Pemberitahuan', 0x31353935363135353033),
(9, '3', '2020-08-22', 'Desa Cinangela', 'Undangan', 0x31353938303833323235);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(4) NOT NULL,
  `nomor_surat` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `perihal` varchar(20) NOT NULL,
  `file_surat` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor_surat`, `tanggal_masuk`, `pengirim`, `perihal`, `file_surat`) VALUES
(19, '3', '2012-01-03', 'BKAD', 'Undangan ', 0x31353934393737303636436f6e746f68312e6a7067),
(20, '4', '2012-01-09', 'UPK Artha Raharja', 'Undangan', 0x31353934383335383139),
(21, '5', '2012-01-10', 'Tim Fasilitator PNPM-MP', 'Undangan', 0x31353934383335393532),
(22, '6', '2012-01-17', 'Kecamatan Pacet', 'Pemberitahuan', 0x31353934383335393833),
(23, '7', '2012-01-17', 'Desa Cipeujeuh', '', 0x31353934383336303338),
(24, '8', '2012-01-17', 'Desa Maruyung', '', 0x31353934383336313236),
(25, '9', '2012-01-17', 'Desa Mandalawangi', '', 0x31353934383336313538),
(26, '10', '2012-01-18', 'Desa Cipeuheuh', '', 0x31353934383336323137),
(29, '1', '2020-08-22', 'Desa Maruyung', 'Pemberitahuan', 0x31353938303832373735);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_surat` (`nomor_surat`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_surat` (`nomor_surat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
