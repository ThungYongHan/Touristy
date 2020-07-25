-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 04:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penang`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `war` int(11) NOT NULL,
  `farm` int(11) NOT NULL,
  `image` varchar(50) DEFAULT 'placeholder.png',
  `image_text` text NOT NULL,
  `warreview_text` text DEFAULT NULL,
  `farmreview_text` text DEFAULT NULL,
  `experience` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `war`, `farm`, `image`, `image_text`, `warreview_text`, `farmreview_text`, `experience`) VALUES
(37, '111', '111@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 0, '1.jpg', 'I love Pusheen!', 'I love Penang War Museum! It is a very nice place to visit!', 'I love Penang Butterfly Farm! It is a very nice place to visit!', 50),
(39, '333', '333@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 0, 0, 'WDC101022.jpeg', 'I love Penang!', 'This is Penang War Museum review by user 333!', 'This is Penang Butterfly Farm review by user 333!', 0),
(40, '555', '555@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 0, 0, 'Business.jpg', 'I love cats!', 'This is Penang War Museum review by user 555!', 'This is Penang Butterfly Farm review by user 555!', 0),
(41, 'yonghanthung', 'yonghan@gmail.com', '888b49e1cde95e47a48ebb5664bc29f0', 1, 1, 'pusheen-fan.jpg', 'I love Pusheen very much!', 'This is Penang War Museum review by user yonghanthung!', 'The place is very beautiful!', 100),
(42, 'Pusheen Fan', 'pusheen@gmail.com', '0aa4d31f4cfb75a98c4b98e6f970de71', 1, 0, 'pets.jpg', 'Penang is a great place to visit!', 'This is Penang War Museum review by user Pusheen Fan!', NULL, 50),
(59, 'ccc', 'ccc@gmail.com', '9df62e693988eb4e1e1444ece0578579', 1, 0, 'a5155d5455bb2d602ced2e900c4a8fee.jpg', 'fsnafkaslfnasflafnaksf', 'review demo', NULL, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
