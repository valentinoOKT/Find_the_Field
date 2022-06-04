-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2022 pada 10.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_cod`
--

CREATE TABLE `bayar_cod` (
  `id_book` varchar(10) NOT NULL,
  `jumlah_bayar` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar_cod`
--

INSERT INTO `bayar_cod` (`id_book`, `jumlah_bayar`, `bayar`, `status`) VALUES
('KB00000002', 100000, 100000, 'Selesai'),
('KB00000003', 200000, 200000, 'Selesai'),
('KB00000005', 130000, 130000, 'Selesai'),
('KB00000006', 65000, 65000, 'Selesai'),
('KB00000009', 65000, 65000, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_transfer`
--

CREATE TABLE `bayar_transfer` (
  `id_book` varchar(10) NOT NULL,
  `rek_kirim` varchar(30) NOT NULL,
  `rek_tujuan` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar_transfer`
--

INSERT INTO `bayar_transfer` (`id_book`, `rek_kirim`, `rek_tujuan`, `status`, `bukti_bayar`) VALUES
('KB00000001', '010020931847834', 'bri', 'Selesai', 'auth-providers.png'),
('KB00000007', '10910190190', 'bca', 'Menunggu Konfirmasi admin', '20180804_105442.png'),
('KB00000008', '123123', 'bri', 'Menunggu Konfirmasi admin', 'ACU_Notre-Dame_Guillotine_1400x900.jpg'),
('KB00000010', '10910190190', 'bca', 'Menunggu Konfirmasi admin', '20180804_105442.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_lap` varchar(5) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lap` varchar(5) NOT NULL,
  `jenis_rumput` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `harga` int(20) NOT NULL,
  `no_lap` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id_lap`, `jenis_rumput`, `foto`, `harga`, `no_lap`, `username`) VALUES
('LP001', 'sintetis', 'IMG_6862.JPG', 65000, '01', 'admin'),
('LP002', 'sintetis', 'IMG_6864.JPG', 100000, '02', 'admin'),
('LP003', 'beton/semen', 'IMG_6874.JPG', 50000, '03', 'admin'),
('LP004', 'beton/semen', 'IMG_6883.jpg', 70000, '04', 'admin'),
('LP005', 'sintetis', 'IMG_6885.jpg', 50000, '05', 'admin'),
('LP007', 'sintetis', 'IMG_6916.jpg', 100000, '02', 'admin'),
('LP008', 'beton/semen', 'IMG_6910.jpg', 60000, '03', 'admin'),
('LP009', 'beton/semen', 'IMG_6907.jpg', 60000, '01', 'admin'),
('LP010', 'beton/semen', 'IMG_6912.jpg', 60000, '04', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `username_member` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`username_member`, `nama`, `password`) VALUES
('asw', 'Educational To', '123'),
('bf', 'Valentino Oktawan', '123'),
('budi', 'budi indah', '44'),
('cd', 'Valentino Oktawan', '123'),
('ds', 'Educational Toys', '11'),
('samuraigt123', 'budi', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `nama_adm` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `nama_adm`, `password`) VALUES
('admin', 'Admin', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_book` varchar(10) NOT NULL,
  `username_member` varchar(30) NOT NULL,
  `id_lap` varchar(5) NOT NULL,
  `tgl_book` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `jenis_bayar` varchar(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_book`, `username_member`, `id_lap`, `tgl_book`, `batas_bayar`, `tgl_main`, `jam_mulai`, `jam_berakhir`, `jenis_bayar`, `total_harga`, `status`) VALUES
('KB00000001', 'risqi17', 'LP003', '2017-01-02 15:26:53', '2017-01-02 21:26:53', '2017-01-03', '18:00:00', '20:00:00', 'transfer', 100000, 'Selesai'),
('KB00000002', 'risqi17', 'LP003', '2017-01-02 15:36:52', '2017-01-02 21:36:52', '2017-01-03', '18:00:00', '20:00:00', 'cod', 100000, 'Selesai'),
('KB00000003', 'rijal-86K9', 'LP002', '2017-01-02 15:46:43', '2017-01-02 21:46:43', '2017-01-03', '12:00:00', '14:00:00', 'off cod', 200000, 'Selesai'),
('KB00000004', 'risqi17', 'LP001', '2017-01-02 20:51:41', '2017-01-03 02:51:41', '2017-01-03', '17:00:00', '19:00:00', 'transfer', 130000, 'Dibatalkan'),
('KB00000005', 'risqi17', 'LP001', '2022-05-30 11:11:25', '2022-05-30 18:11:25', '2022-05-31', '08:00:00', '10:00:00', 'cod', 130000, 'Selesai'),
('KB00000006', 'budi', 'LP001', '2022-05-30 13:06:15', '2022-05-30 20:06:15', '2022-05-31', '14:00:00', '15:00:00', 'cod', 65000, 'Selesai'),
('KB00000007', 'budi', 'LP001', '2022-05-30 13:28:45', '2022-05-30 20:28:45', '2022-05-31', '17:00:00', '18:00:00', 'transfer', 65000, 'Menunggu Konfirmasi admin'),
('KB00000008', 'ds', 'LP002', '2022-05-30 14:30:46', '2022-05-30 21:30:46', '2022-06-30', '15:00:00', '17:00:00', 'transfer', 200000, 'Menunggu Konfirmasi admin'),
('KB00000009', 'ds', 'LP001', '2022-05-30 14:32:03', '2022-05-30 21:32:03', '2022-05-31', '15:00:00', '16:00:00', 'cod', 65000, 'Selesai'),
('KB00000010', 'ds', 'LP001', '2022-05-30 14:42:23', '2022-05-30 21:42:22', '2022-05-31', '14:00:00', '15:00:00', 'transfer', 65000, 'Menunggu Konfirmasi admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username_member`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_book`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
