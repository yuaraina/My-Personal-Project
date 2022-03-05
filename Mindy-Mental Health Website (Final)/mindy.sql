-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2022 at 04:29 PM
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
-- Database: `mindy`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(20) NOT NULL,
  `users_id` int(20) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `users_id`, `produk`, `harga`, `status`) VALUES
(20, 6, 'Medium Plan', 400000, 'no'),
(21, 6, 'Starter Plan', 80000, 'no'),
(24, 6, 'Starter Plan', 80000, 'no'),
(29, 7, 'Medium Plan', 500000, 'yes'),
(30, 7, 'Starter Plan', 90000, 'yes'),
(31, 7, 'Starter Plan', 80000, 'no'),
(32, 7, 'Starter Plan', 80000, 'no'),
(33, 9, 'Medium Plan', 500000, 'yes'),
(34, 9, 'Pro Plan', 1000000, 'no'),
(36, 10, 'Starter Plan UPDATE', 80000, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` int(20) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prod_name`, `prod_price`, `prod_desc`, `prod_pic`) VALUES
(2, 'Counseling', 100000, 'Konseling membantu anda memahami apa yang menjadi permasalahan anda saat ini. Ayo saatnya kamu bercerita dan tidak ada yang perlu kamu takuti.', '1412887358_counseling.jpg'),
(3, 'Meditation', 120000, 'Meditasi membantu melemaskan tubuhmu setelah menjalani kepenatan seharian. Mari bermeditasi sejenak.', '1226343254_meditation2.png'),
(4, 'Listening', 120000, 'Membantu anda lebih rileks', '1175767065_listening.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `phone`) VALUES
(6, 'coba', 'coba@coba.com', '$2y$10$0zDZhef1cD6wRiTpicOPT.f7rDjNfhvalwXrzmfvU6cR920hlkq3C', '123456'),
(7, 'arin', 'reen@gmail.com', '$2y$10$jm6bgSzxC9vRU4PMapCrZ.G6MwXtiSHn8J2Z6DQppOsKGdLTNTnGS', '08129987654'),
(8, 'arin', 'a.rosewood19@gmail.com', '$2y$10$sEzhlf0PXgzVGJdBmrXJEOYsYFIuTI8qMQpbRJ26ceyAT/7GUa8lW', '08129987654'),
(9, 'arin', 'test1@gmail.com', '$2y$10$3QWBudRFaWzS9jVYUkp87uwMHMJ5/uIPgqszqEv6fqUtGSqQv6rRe', '08129987654'),
(10, 'arin', 'rainarin20@gmail.com', '$2y$10$gu0d7KyV.P/lzrTTCsOreOOtl5doy5AeCh.Eo3gazQpPXT3paTJFu', '08129987654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_users_id` (`users_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
