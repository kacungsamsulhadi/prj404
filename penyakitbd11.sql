-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 04:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyakitbd11`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode`, `gejala`) VALUES
(1, 'G1', 'Lemahnya tulang'),
(2, 'G2', 'Deformitas'),
(3, 'G3', 'kaki yang bengkok'),
(4, 'G4', 'kelemahan'),
(5, 'G5', 'Diare'),
(6, 'G6', 'kehilangan berat badan'),
(7, 'G7', 'penurunan nafsu makan'),
(8, 'G8', 'Menggaruk-garuk'),
(9, 'G9', 'kulit kemerahan'),
(10, 'G10', 'Pernapasan cepat'),
(11, 'G11', 'lendir hidung'),
(12, 'G12', 'batuk'),
(13, 'G13', 'Bengkak'),
(14, 'G14', 'merah'),
(15, 'G15', 'luka pada mulut atau gusi'),
(16, 'G16', 'Kelebihan berat badan'),
(17, 'G17', 'kurang aktivitas fisik'),
(18, 'G18', 'Perubahan warna'),
(19, 'G19', 'penolakan makan'),
(20, 'G20', 'Perilaku cemas'),
(21, 'G21', 'Kesulitan meletakkan telur'),
(22, 'G22', 'perilaku gelisah');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode`, `penyakit`) VALUES
(1, 'P1', 'Metabolic Bone Disease'),
(2, 'P2', 'Parasit Internal'),
(3, 'P3', 'Parasit Eksternal'),
(4, 'P4', 'Infeksi Respiratori'),
(5, 'P5', 'Stomatitis'),
(6, 'P6', 'Obesitas'),
(7, 'P7', 'Stress'),
(8, 'P8', 'Egg Binding');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_penyakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 3),
(9, 9, 3),
(10, 10, 4),
(11, 11, 4),
(12, 12, 4),
(13, 13, 5),
(14, 14, 5),
(15, 15, 5),
(16, 16, 6),
(17, 17, 6),
(18, 18, 7),
(19, 19, 7),
(20, 20, 7),
(21, 21, 8),
(22, 22, 8);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `solusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `id_penyakit`, `solusi`) VALUES
(1, 1, 'Meningkatkan asupan kalsium dan vitamin D, memberikan sinar UVB, konsultasi dengan dokter hewan'),
(2, 2, 'Pemeriksaan tinja, pengobatan dengan antiparasit yang diresepkan oleh dokter hewan'),
(3, 3, 'Mandi dengan larutan antiparasit, pengobatan dengan antiparasit dari dokter hewan'),
(4, 4, 'Isolasi, perawatan lingkungan bersih, pengobatan antibiotik dari dokter hewan'),
(5, 5, 'Pembersihan dan perawatan mulut, antibiotik atau antiseptik dari dokter hewan.'),
(6, 6, 'Pengendalian pola makan, olahraga yang cukup, mengurangi pemberian makan berlebihan.'),
(7, 7, 'Menghilangkan faktor stres, memberikan lingkungan yang tenang, memberikan perhatian lebih'),
(8, 8, 'Konsultasi segera dengan dokter hewan, mungkin memerlukan bantuan medis untuk mengekstraksi telur ya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `nama`, `email`, `alamat`, `tgl_lahir`, `password`) VALUES
(1, 0, 'adminme', 'bagusadmin@gmail.com', 'Tuban', '2000-12-11', '$2y$10$MMQkiSdGId.cj5uxrO1b0eOJ4jIbNbVGybnK6sGbEgmKrMOy3jKdu'),
(2, 1, 'Bayu Adi', 'bayu@gmail.com', 'Belayu', '2020-04-15', '$2y$10$QxzfxQ6eAAfr48pne8ZX0OvPTRrvD/xPa8qEElpby.6O0LYEW2FFm'),
(3, 2, 'Dokter Budi', 'budi@gmail.com', 'Badung', '2020-04-09', '$2y$10$n2nS/Rg7Zvjdv.q1mrv7TOJYrzf18LVQQzsWuDWqPf5Ieos/OIWiG'),
(4, 2, 'Dokter Jaya', 'jaya@gmail.com', 'Denpasar', '2020-05-12', '$2y$10$Hb0Q.SpDMZ1m34GlQSnB4.GkKM9wBRwWsrHUIFwn4sV6M7JGNPIV.'),
(5, 1, 'adi', 'adi@gmail.com', 'Badung', '2020-05-21', '$2y$10$ge9myh0TIg1tGwsOm6KZ5eriUxWhYswmHFx84dEsrwxpYbXdijKGC'),
(7, 2, 'Dokter Sally', 'sally@gmail.com', 'Kuta', '2020-05-28', '$2y$10$xP98m86lQdD8oE/dpTyvh.7.4oAsbcj0.H5Ekw0UhGFCoyaqc49W2'),
(12, 1, 'bagus', 'bagussennatry@gmail.com', 'Tuban', '2000-11-13', '$2y$10$dAj5QUJlqdfZzy9xDSH1EuEs5rI8J8FJC8q3bumMnxkqd4l3Oix0S'),
(13, 1, 'sena', 'sena@gmail.com', 'Tuban', '2000-12-11', '$2y$10$atsLPevGvHZSBC2owXUSBeuIZRPldcVBWcoeCVODYY5R3H0XRLkHO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `relasi_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `relasi_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
