-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2020 pada 21.01
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isecret`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama_kereta` varchar(255) NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `tgl_berangkat` datetime NOT NULL,
  `tgl_sampai` datetime NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama_kereta`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_sampai`, `kelas`, `harga`, `status`) VALUES
(1, 'TUGUEXPRESS011', 4, 5, '2020-07-05 15:50:00', '2020-07-05 23:50:00', 'EKONOMI', 70000, 0),
(2, 'TUGUEXPRESS012', 4, 5, '2020-07-05 03:35:00', '2020-07-05 09:35:00', 'EKONOMI', 70000, 0),
(7, '123', 2, 5, '2020-09-30 12:00:00', '2020-09-30 21:00:00', 'EKONOMI', 50000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `kursi` int(11) NOT NULL,
  `bagian` varchar(2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`id`, `id_jadwal`, `kursi`, `bagian`, `status`) VALUES
(1, 1, 1, 'a', 1),
(2, 1, 2, 'a', 0),
(3, 1, 3, 'a', 0),
(4, 1, 4, 'a', 0),
(5, 1, 5, 'a', 0),
(6, 1, 6, 'a', 0),
(7, 1, 7, 'a', 0),
(8, 1, 8, 'a', 0),
(9, 1, 9, 'a', 0),
(10, 1, 10, 'a', 0),
(11, 1, 11, 'a', 1),
(12, 1, 12, 'a', 0),
(13, 1, 13, 'a', 0),
(14, 1, 14, 'a', 0),
(15, 1, 15, 'a', 0),
(16, 1, 16, 'a', 0),
(17, 1, 17, 'a', 0),
(18, 1, 18, 'a', 0),
(19, 1, 19, 'a', 0),
(20, 1, 20, 'a', 0),
(21, 1, 21, 'a', 0),
(22, 1, 22, 'a', 0),
(23, 1, 23, 'a', 0),
(24, 1, 24, 'a', 0),
(25, 1, 25, 'a', 0),
(26, 1, 26, 'a', 0),
(27, 1, 27, 'a', 0),
(28, 1, 28, 'a', 0),
(29, 1, 29, 'a', 0),
(30, 1, 1, 'b', 0),
(31, 1, 2, 'b', 0),
(32, 1, 3, 'b', 0),
(33, 1, 4, 'b', 0),
(34, 1, 5, 'b', 0),
(35, 1, 6, 'b', 0),
(36, 1, 7, 'b', 0),
(37, 1, 8, 'b', 0),
(38, 1, 9, 'b', 0),
(39, 1, 10, 'b', 0),
(40, 1, 11, 'b', 0),
(41, 1, 12, 'b', 0),
(42, 1, 13, 'b', 0),
(43, 1, 14, 'b', 0),
(44, 1, 15, 'b', 0),
(45, 1, 16, 'b', 0),
(46, 1, 17, 'b', 0),
(47, 1, 18, 'b', 0),
(48, 1, 19, 'b', 0),
(49, 1, 20, 'b', 0),
(50, 2, 1, 'a', 1),
(51, 2, 2, 'a', 0),
(52, 2, 3, 'a', 0),
(53, 2, 4, 'a', 0),
(54, 2, 5, 'a', 0),
(55, 2, 6, 'a', 0),
(56, 2, 7, 'a', 0),
(57, 2, 8, 'a', 0),
(58, 2, 9, 'a', 0),
(59, 2, 10, 'a', 0),
(60, 2, 11, 'a', 0),
(61, 2, 12, 'a', 0),
(62, 2, 13, 'a', 0),
(63, 2, 14, 'a', 0),
(64, 2, 15, 'a', 0),
(65, 2, 16, 'a', 0),
(66, 2, 17, 'a', 0),
(67, 2, 18, 'a', 0),
(68, 2, 19, 'a', 0),
(69, 2, 20, 'a', 0),
(70, 2, 21, 'a', 0),
(71, 2, 22, 'a', 0),
(72, 2, 23, 'a', 0),
(73, 2, 24, 'a', 0),
(74, 2, 25, 'a', 0),
(75, 2, 26, 'a', 0),
(76, 2, 27, 'a', 0),
(77, 2, 28, 'a', 0),
(78, 2, 29, 'a', 0),
(79, 2, 1, 'b', 0),
(80, 2, 2, 'b', 0),
(81, 2, 3, 'b', 0),
(82, 2, 4, 'b', 0),
(83, 2, 5, 'b', 0),
(84, 2, 6, 'b', 0),
(85, 2, 7, 'b', 0),
(86, 2, 8, 'b', 0),
(87, 2, 9, 'b', 0),
(88, 2, 10, 'b', 0),
(89, 2, 11, 'b', 0),
(90, 2, 12, 'b', 0),
(91, 2, 13, 'b', 0),
(92, 2, 14, 'b', 0),
(93, 2, 15, 'b', 0),
(94, 2, 16, 'b', 0),
(95, 2, 17, 'b', 0),
(96, 2, 18, 'b', 0),
(97, 2, 19, 'b', 0),
(98, 2, 20, 'b', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `no_pembayaran` varchar(255) NOT NULL,
  `no_tiket` varchar(255) NOT NULL,
  `total_pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_pembayaran`, `no_tiket`, `total_pembayaran`, `bukti`, `status`) VALUES
(46, 'AC2461', 'T001', '140000', '12121.png', 1),
(47, 'AC2462', 'T002', '70000', 'aceu1.jpg', 2),
(48, 'AC2463', 'T003', '50000', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id` int(11) NOT NULL,
  `nomor_tiket` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `gerbong` int(11) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `kursi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`id`, `nomor_tiket`, `nama`, `no_identitas`, `gerbong`, `bagian`, `kursi`) VALUES
(55, 'T001', 'Syuja', '213123123123123', 1, 'a', 1),
(56, 'T001', 'fadil', '12312353', 1, 'a', 11),
(57, 'T002', 'wesley', '12321321321', 1, 'a', 50),
(58, 'T003', 'wesley', '213123123123123', 1, 'a', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_p` int(12) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_p`, `kode`, `nama`, `nim`, `no_hp`, `email`, `jurusan`, `insta`, `gambar`, `status`) VALUES
(1, 'R3WfH', 'M Fadil Mardiansya', '4611418061', '081271056344', 'fadelmardiansyah@gmail.com', 'ILKOM', 'UNNES', '', '0'),
(2, 'q4gCv', 'M Fadil Mardiansya', '4611418061', '081271056344', 'fadelmardiansyah@gmail.com', 'ILKOM', 'UNNES', '', '0'),
(3, 'PKM820', 'M Fadil Mardiansya', '4611418061', '081271056344', 'fadelmardiansyah@gmail.com', 'ILKOM', 'UNNES', '13kopi1.jpg', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stasiun`
--

CREATE TABLE `stasiun` (
  `id` int(11) NOT NULL,
  `nama_stasiun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stasiun`
--

INSERT INTO `stasiun` (`id`, `nama_stasiun`) VALUES
(2, 'SURABAYA'),
(4, 'SEMARANG'),
(5, 'JAKARTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nomor_tiket` varchar(255) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `nomor_tiket`, `id_jadwal`, `nama_pemesan`, `email`, `no_telepon`, `alamat`, `tanggal`) VALUES
(44, 'T001', 1, 'Syuja', 'syujazr@gmail.com', '081325771490', 'asdsadsadsad', '2020-06-29 12:50:19'),
(45, 'T002', 2, 'wesley', 'wesleyley@gmail.com', '0213213139', 'asdasdqeqweqwe', '2020-06-29 12:52:15'),
(46, 'T003', 7, 'wesley', 'gisasa@gmail.com', '058131649', '1312331', '2020-09-29 04:10:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_p`);

--
-- Indeks untuk tabel `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_p` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
