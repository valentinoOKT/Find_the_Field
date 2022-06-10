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
('KB00000001', 100000, 100000, 'Selesai');

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
('KB00000002', '123123', 'bri', 'Selesai', '20180804_105442.png');


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
('user', 'User', 'user123'),
('valentino', 'Valentino Oktawan', 'tino45');

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
('admin', 'Admin', 'admin123');

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
('KB00000001', 'user', 'LP003', '2017-01-02 15:26:53', '2017-01-02 21:26:53', '2017-01-03', '18:00:00', '20:00:00', 'transfer', 100000, 'Selesai');

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
