-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 07:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`, `gambar`, `kategori`) VALUES
(1, 'mie indomei goreng', 3500, 'mie1.jpg', 'makanan'),
(3, 'sabun mandi nuvo', 3000, 'sabun1.jpg', 'kebersihan'),
(7, 'mie indomie rebus\r\n(rasa soto)', 3000, 'miesoto.jpg', 'makanan'),
(8, 'mie indomie rebus \r\n(rasa kari)', 3000, 'miekari.jpg', 'makanan'),
(11, 'kopi kapal api', 2000, 'kapalapi.jpg', 'minuman'),
(12, 'kopi indocafe mix', 2000, 'indocafe.jpg', 'minuman'),
(15, 'sabun mandi lux', 3000, 'lux.jpg', 'kebersihan'),
(16, 'sabun mandi shizui', 5000, 'shinzui.jpg', 'kebersihan'),
(19, 'kopi luwak white ', 2500, 'luwak.jpg', 'minuman'),
(20, 'kopi good day mocca', 2000, 'goodday.jpg', 'minuman'),
(23, 'susu frisian flag ', 2000, 'bendera_putih.png', 'Minuman'),
(25, 'susu frisian flag coklat', 3000, 'bendera_coklat.png', 'Minuman'),
(26, 'mie sedap goreng ', 3000, 'miesedap.jpg', 'Makanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
