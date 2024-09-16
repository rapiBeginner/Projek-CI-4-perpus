-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 02:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus_pl1`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `status` enum('tersedia','dipinjam','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `status`) VALUES
(8, 'kegelapan ', 'alfin', 'rangga', 2029, 'dipinjam'),
(15, 'Your Lie in april', 'kaori', 'hooh tenan', 2041, 'dipinjam'),
(16, 'SpiderMan 3', 'Peter', 'Marvel', 2007, 'tersedia'),
(19, 'night change', 'cdm', 'telkom', 2026, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `KategoriID` int(11) NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int(11) UNSIGNED NOT NULL,
  `BukuID` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `KoleksiID` int(11) UNSIGNED NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(17, '2024-07-24-025031', 'App\\Database\\Migrations\\UlasanBuku', 'default', 'App', 1721793309, 1),
(18, '2024-07-24-025114', 'App\\Database\\Migrations\\User', 'default', 'App', 1721793309, 1),
(19, '2024-07-24-025132', 'App\\Database\\Migrations\\KategoriBuku', 'default', 'App', 1721793309, 1),
(20, '2024-07-24-025142', 'App\\Database\\Migrations\\Peminjaman', 'default', 'App', 1721793309, 1),
(21, '2024-07-24-025157', 'App\\Database\\Migrations\\KoleksiPribadi', 'default', 'App', 1721793309, 1),
(22, '2024-07-24-025239', 'App\\Database\\Migrations\\KoleksiBukuRelasi', 'default', 'App', 1721793309, 1),
(23, '2024-07-25-002717', 'App\\Database\\Migrations\\KategoribukuRelasi', 'default', 'App', 1721867449, 2),
(24, '2024-07-24-025239', 'App\\Database\\Migrations\\Dummy', 'default', 'App', 1721868070, 3),
(25, '2024-07-25-005752', 'App\\Database\\Migrations\\User', 'default', 'App', 1721869119, 4),
(26, '2024-07-25-025157', 'App\\Database\\Migrations\\KoleksiPribadi', 'default', 'App', 1721869392, 5),
(27, '2024-07-25-025132', 'App\\Database\\Migrations\\KategoriBuku', 'default', 'App', 1721869424, 6),
(28, '2024-07-25-025142', 'App\\Database\\Migrations\\Peminjaman', 'default', 'App', 1721869424, 6);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PeminjamanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `TanggalPeminjaman` date NOT NULL,
  `TanggalPengembalian` date NOT NULL,
  `StatusPeminjaman` enum('kembali','belum kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`PeminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`) VALUES
(21, 1, 15, '2024-09-15', '2024-09-18', 'kembali'),
(25, 1, 8, '2024-09-16', '2024-09-19', 'belum kembali'),
(26, 47, 15, '2024-09-16', '2024-09-19', 'belum kembali'),
(27, 1, 19, '2024-09-16', '2024-09-19', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int(11) UNSIGNED NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `Ulasan` text NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `hak_akses` enum('admin','petugas','peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `hak_akses`) VALUES
(1, 'firstNiBos', '65d6dd9ce82b49e68edd39653cc0eadc', 'ahmad.xpplg1@gmail.com', 'Ahmad Raffi', 'Desa Boro,RT1 RW2, Kec. Selorejo, Kab. Blitar', 'admin'),
(38, 'yoi', 'MTI=', 'ahmad.xpplg1@gmail.com', '02_Ahmad Raffi', 'Desa Boro,RT1 RW2, Kec. Selorejo, Kab. Blitar', 'peminjam'),
(46, 'njajal_lage', 'MTIzNDU2', 'ahmad.xpplg1@gmail.com', '02_Ahmad Raffi', 'Desa Boro,RT1 RW2, Kec. Selorejo, Kab. Blitar', 'peminjam'),
(47, 'test', 'MTExMTEx', 'ahmad.xpplg1@gmail.com', '02_Ahmad Raffi', 'Desa Boro,RT1 RW2, Kec. Selorejo, Kab. Blitar', 'peminjam'),
(48, 'test2', 'd3d3d3d3', 'nopal@gmail.com', 'alpin', 'Desa Boro,RT1 RW2, Kec. Selorejo, Kab. Blitar', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`KoleksiID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`PeminjamanID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `KoleksiID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `PeminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
