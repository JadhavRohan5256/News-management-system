-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 10:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 0,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `user_role`, `register_date`) VALUES
(1, 'Rohan', 'Jadhav', 'rohanJadhav123', 'rohanjadhav123@gmail.com', 'rohan123', 1, '2021-04-27 18:30:00'),
(2, 'Sagar', 'Jadhav', 'sagarJadhav123', 'sagarjadhav123@gmail.com', 'sagar123', 0, '2021-04-27 18:30:00'),
(3, 'Tushar', 'Jadhav', 'tusharJadhav123', 'tusharjadhav123@gmail.com', 'tushar123', 0, '2021-04-27 18:30:00'),
(4, 'Vikas', 'Chopade', 'vikasChopade123', 'vikaschopade123@gmail.com', 'vikas123', 0, '2021-04-27 18:30:00'),
(5, 'Varsha', 'Chopade', 'varshaChopade123', 'varsha123@gmail.com', 'varsha123', 1, '2021-05-20 18:30:00'),
(6, 'Chetan', 'Chopade', 'chetanChopade123', 'chetan123@gmail.com', 'chetan123', 0, '2021-05-20 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `emial` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
