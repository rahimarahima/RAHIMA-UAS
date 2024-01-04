-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 10.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bohotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bohotel`
--

CREATE TABLE `data_bohotel` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `no_kamar` varchar(100) NOT NULL,
  `jenis_kamar` enum('Standard','Single Room','Family Room','VVIP') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_bohotel`
--

INSERT INTO `data_bohotel` (`id`, `nama`, `alamat`, `email`, `tanggal_lahir`, `jenis_kelamin`, `telepon`, `no_kamar`, `jenis_kamar`, `gambar`) VALUES
(6, 'Muhammad Ikhsan', 'Jambi', 'ikhsan@gmail.com', '2004-04-13', 'Laki-laki', '0803803839', 'A-004', 'Standard', '659282b65cf28.jpeg'),
(7, 'Suci Saputri', 'Aceh', 'suci@gmail.com', '2004-02-13', 'Perempuan', '083729303032', 'B-002', 'Family Room', '659282fab10f8.jpg'),
(8, 'Bulan Firly', 'Lampung', 'bulan@gmail.com', '2003-09-29', 'Perempuan', '083280133103', 'C-007', 'Single Room', '65928346e7ab1.jpg'),
(9, 'Budi Saifulloh', 'Bali', 'budi@gmail.com', '2005-07-20', 'Laki-laki', '08332827847', 'D-299', 'VVIP', '659283c30732d.jpeg'),
(10, 'Haikal Bintaro', 'Jakarta', 'haikal@gmail.com', '2003-08-31', 'Laki-laki', '08637336484', 'B-008', 'Single Room', '6592841e161f9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registeration`
--

CREATE TABLE `registeration` (
  `Reg_ID` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Passowrd` varchar(40) DEFAULT NULL,
  `Role_ID_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `registeration`
--

INSERT INTO `registeration` (`Reg_ID`, `Name`, `Email`, `Passowrd`, `Role_ID_FK`) VALUES
(2, 'Admin', 'admin@gmail.com', '123', 1),
(6, 'Pimpinan', 'ketua@gmail.com', '123', 2),
(7, 'Staf', 'staf@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `Roles` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`ID`, `Roles`) VALUES
(1, 'Admin'),
(2, 'Pimpinan'),
(3, 'Staf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_bohotel`
--
ALTER TABLE `data_bohotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `registeration`
--
ALTER TABLE `registeration`
  ADD PRIMARY KEY (`Reg_ID`),
  ADD UNIQUE KEY `email_id` (`Email`),
  ADD KEY `Role_ID_FK` (`Role_ID_FK`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_bohotel`
--
ALTER TABLE `data_bohotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `registeration`
--
ALTER TABLE `registeration`
  MODIFY `Reg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `registeration`
--
ALTER TABLE `registeration`
  ADD CONSTRAINT `registeration_ibfk_1` FOREIGN KEY (`Role_ID_FK`) REFERENCES `roles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
