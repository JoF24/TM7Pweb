-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 17 Jun 2024 pada 10.22
-- Versi server: 8.0.35-0ubuntu0.22.04.1
-- Versi PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksiojol`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_transaksi`
--

CREATE TABLE `jumlah_transaksi` (
  `tanggal` date NOT NULL,
  `jumlah_gojek` int DEFAULT NULL,
  `jumlah_grab` int DEFAULT NULL,
  `jumlah_maxim` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jumlah_transaksi`
--

INSERT INTO `jumlah_transaksi` (`tanggal`, `jumlah_gojek`, `jumlah_grab`, `jumlah_maxim`) VALUES
('2024-04-09', 8, 15, 5),
('2024-04-10', 10, 3, 1),
('2024-04-11', 30, 15, 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
