-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 03:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest-server`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `body`, `summary`) VALUES
(1, 'berita 1', 'Baik, Anda menggunakan PHP versi 8. Dengan menggunakan versi PHP yang lebih baru seperti PHP 8, Anda mendapatkan manfaat dari peningkatan kinerja, fitur baru, dan perbaikan keamanan.\r\n\r\nNamun, perlu diingat bahwa tidak semua aplikasi atau framework PHP mungkin sepenuhnya kompatibel dengan PHP 8. Beberapa kode lama atau pustaka pihak ketiga mungkin perlu diperbarui atau disesuaikan agar berjalan dengan baik di lingkungan PHP 8.\r\n\r\nPastikan untuk memeriksa dokumentasi resmi dari aplikasi atau framework yang Anda gunakan untuk memastikan bahwa mereka mendukung PHP 8, atau jika perlu, untuk menemukan panduan tentang cara menyesuaikan kode Anda agar kompatibel dengan PHP 8.\r\n\r\nSelain itu, dengan menggunakan PHP 8, Anda dapat memanfaatkan fitur-fitur baru yang diperkenalkan oleh versi ini, seperti JIT (Just-In-Time) compiler, peningkatan dalam manajemen error, fitur yang ditingkatkan untuk pengelolaan tipe data, dan banyak lagi. Pastikan untuk menjelajahi dokumentasi PHP resmi untuk memahami sepenuhnya semua perubahan dan peningkatan yang ada.', 'Namun, perlu diingat bahwa tidak semua aplikasi atau framework PHP mungkin sepenuhnya kompatibel dengan PHP 8. Beberapa kode lama atau pustaka pihak ketiga mungkin perlu diperbarui atau disesuaikan agar berjalan dengan baik di lingkungan PHP 8.'),
(2, 'berita kedua', 'CodeIgniter 4 is the latest version of the framework, intended for use with PHP 7.4+ (including 8.2).\r\n\r\nThe initial release was February 24, 2020. The current version is v4.4.6.\r\n\r\nYou *could* download this version of the framework using the button below, but we encourage you to check the Installation section of the User Guide, to use Composer :)', 'CodeIgniter 4 is the latest version of the framework, intended for use with PHP 7.4+ (including 8.2).\r\n\r\nThe initial release was February 24, 2020. The current version is v4.4.6.');

-- --------------------------------------------------------

--
-- Table structure for table `jagoan_hoax`
--

CREATE TABLE `jagoan_hoax` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temukan_hoax`
--

CREATE TABLE `temukan_hoax` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jagoan_hoax`
--
ALTER TABLE `jagoan_hoax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temukan_hoax`
--
ALTER TABLE `temukan_hoax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jagoan_hoax`
--
ALTER TABLE `jagoan_hoax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temukan_hoax`
--
ALTER TABLE `temukan_hoax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
