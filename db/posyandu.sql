-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 06:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'Admin Posyandu');

-- --------------------------------------------------------

--
-- Table structure for table `berat`
--

CREATE TABLE `berat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `berat` float NOT NULL,
  `tinggi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berat`
--

INSERT INTO `berat` (`id`, `user_id`, `tanggal`, `berat`, `tinggi`) VALUES
(4, 3, '2021-11-16', 50, 171),
(5, 3, '2021-11-05', 56, 171),
(6, 3, '2021-11-10', 70, 171);

-- --------------------------------------------------------

--
-- Table structure for table `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_vaksin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imunisasi`
--

INSERT INTO `imunisasi` (`id`, `user_id`, `tanggal`, `jenis_vaksin`) VALUES
(1, 3, '2021-08-18', 'Astazaneca'),
(5, 3, '2021-11-18', 'Astrazaneca 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `anak_ke` int(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `berat_bdn` float NOT NULL,
  `tinggi_bdn` float NOT NULL,
  `lingkar_kpl` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `anak_ke`, `tgl_lahir`, `alamat`, `berat_bdn`, `tinggi_bdn`, `lingkar_kpl`) VALUES
(2, '1111111', 'Hadi', 2, '2000-01-12', 'asldjaskldj aslkdj laskdj laskjdl askjd laskj', 60, 171, 80),
(3, '2147483647', 'Faisal', 1, '2000-11-02', 'Desa Sumber Waras, Kecamatan Sehat Ya Robbal Alamin', 70, 172, 70),
(5, '2147483647', 'Budi', 3, '2000-01-02', 'asdlaasd asdsa skjdlaskjd laskjd lkasjd lkasjdl ak', 73, 176, 76),
(6, '2147483647', 'Beni', 5, '2000-01-01', 'asdlaasd asdsa skjdlaskjd laskjd lkasjd lkasjdl ak', 73, 176, 76),
(7, '2147483647', 'Bambang', 4, '2000-06-20', 'laskjd laksjdl ksaj fiao iflkaj dlas j;dlj salkd j', 68, 176, 70),
(8, '2147483647', 'Adit', 4, '1998-06-15', 'asdkjhas ldhals dhlask hdkjashd kjashd', 80, 168, 70),
(9, '3333333333333333', 'Lili', 2, '2000-02-02', 'alalalalalalalalalala al alalalalala alallal', 50, 162, 54),
(10, '9999999999999999', 'Lili', 2, '2000-02-02', 'lkasjdl kasjdl asjdl kasjd', 60, 166, 48),
(11, '102910192810', 'Lala', 2, '2000-02-02', 'lkasjdl kasjdl asjdl kasjd', 0, 0, 68);

-- --------------------------------------------------------

--
-- Table structure for table `vitamin`
--

CREATE TABLE `vitamin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_vit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vitamin`
--

INSERT INTO `vitamin` (`id`, `user_id`, `tanggal`, `jenis_vit`) VALUES
(1, 3, '2021-11-16', 'C'),
(3, 3, '2021-11-16', 'C++');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berat`
--
ALTER TABLE `berat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vitamin`
--
ALTER TABLE `vitamin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berat`
--
ALTER TABLE `berat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `imunisasi`
--
ALTER TABLE `imunisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vitamin`
--
ALTER TABLE `vitamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berat`
--
ALTER TABLE `berat`
  ADD CONSTRAINT `berat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD CONSTRAINT `imunisasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vitamin`
--
ALTER TABLE `vitamin`
  ADD CONSTRAINT `vitamin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
