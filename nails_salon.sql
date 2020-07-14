-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 11:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nails_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_items`
--

CREATE TABLE `booked_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_items`
--

INSERT INTO `booked_items` (`id`, `user_id`, `item_id`, `date`) VALUES
(1, 1, 10, '2020-07-13'),
(2, 1, 10, '2020-07-15'),
(3, 1, 10, '2020-07-15'),
(4, 2, 2, '2020-07-20'),
(5, 2, 3, '2020-07-22'),
(6, 2, 3, '2020-07-19'),
(7, 2, 10, '2020-07-23'),
(8, 2, 10, '2020-07-23'),
(9, 2, 3, '2020-07-23'),
(10, 2, 2, '2020-07-23'),
(11, 3, 2, '2020-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `updated_by`) VALUES
(1, 'GelPolish', 'Fiona'),
(2, 'NailPolish', 'Fiona'),
(3, 'Pedicure', 'Fiona'),
(4, 'Manicure', 'Fiona');

-- --------------------------------------------------------

--
-- Table structure for table `treatments_item`
--

CREATE TABLE `treatments_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `time` int(11) NOT NULL,
  `treatment` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatments_item`
--

INSERT INTO `treatments_item` (`id`, `name`, `price`, `time`, `treatment`, `img_url`) VALUES
(1, 'Classic Manicure', '20', 30, 4, 'images/manicure1.jpg.jpg'),
(2, 'Nail Extensions', '50', 60, 4, 'images/manicure2.jpg.jpg'),
(3, 'Deluxe Manicure', '30', 40, 4, 'images/manicure3.jpg.jpg'),
(4, 'Mani Pedi', '40', 60, 3, 'images/pedicure5.jpg.jpg'),
(8, 'Gel Polish Pedicure', '30', 50, 1, 'images/gelPolish2.jpg.jpg'),
(9, 'Custom Design', '60', 80, 2, 'images/nailArt1.jpg.jpg'),
(10, 'Custom Design', '60', 100, 2, 'images/nailArt2.jpg.jpg'),
(11, 'Custom Design', '60', 150, 2, 'images/nailArt3.jpg.jpg'),
(15, 'Gel Polish Pedicure', '70', 50, 1, 'images/gelPolish1.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `is_admin`) VALUES
(2, 'Fiona', 'Ahma', 'fiona@email.com', '12345678', b'1'),
(3, 'Vlera', 'Zhubi', 'vlera@email.com', '12345678', b'1'),
(4, 'Filan', 'Fisteku', 'filan@email.com', '12345678', b'0'),
(5, 'Filane', 'Fisteku', 'filane@email.com', '12345678', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_items`
--
ALTER TABLE `booked_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments_item`
--
ALTER TABLE `treatments_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatment` (`treatment`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_items`
--
ALTER TABLE `booked_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `treatments_item`
--
ALTER TABLE `treatments_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_items`
--
ALTER TABLE `booked_items`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `treatments_item` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `treatments_item` (`id`);

--
-- Constraints for table `treatments_item`
--
ALTER TABLE `treatments_item`
  ADD CONSTRAINT `treatment` FOREIGN KEY (`treatment`) REFERENCES `treatments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
