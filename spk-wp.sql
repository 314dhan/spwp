-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2024 pada 12.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-wp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(20) NOT NULL,
  `alternatif` varchar(20) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `k5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`) VALUES
('12', 'teknik informatika', '5', '3', '4', '4', '3'),
('13', 'kedokteran', '3', '5', '4', '4', '3'),
('14', 'ekonomi', '4', '4', '5', '3', '5'),
('15', 'hukum', '5', '4', '4', '5', '3'),
('470302', 'Psikologi', '3', '3', '4', '2', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(20) NOT NULL,
  `kepentingan` varchar(20) NOT NULL,
  `cost_benefit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `kepentingan`, `cost_benefit`) VALUES
('1', 'c1 peluang kerja', '4', 'benefit'),
('2', 'c2 minat dan bakat', '5', 'benefit'),
('3', 'c3 fasilitas', '3', 'benefit'),
('4', 'c4 akreditasi', '5', 'benefit'),
('5', 'c5 biaya', '4', 'cost');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
