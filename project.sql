-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 06:48 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ct_id` int(10) NOT NULL,
  `ct_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ct_id`, `ct_name`) VALUES
(1, 'MEN'),
(2, 'WOMEN'),
(3, 'CHILDREN');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `message` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(10) NOT NULL,
  `log_date` varchar(15) NOT NULL,
  `lquantity` int(5) NOT NULL,
  `total_price` double NOT NULL,
  `uid` int(10) NOT NULL,
  `pid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(16) NOT NULL,
  `order_id` int(16) NOT NULL,
  `item_name` varchar(32) NOT NULL,
  `price` float NOT NULL,
  `item_quatity` int(16) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_name`, `price`, `item_quatity`, `email`) VALUES
(1, 0, '', 180, 1, ''),
(2, 0, '', 120, 1, ''),
(3, 0, 'C plus plus', 180, 1, ''),
(4, 0, 'C', 120, 1, ''),
(5, 0, 'C plus plus', 180, 1, ''),
(6, 0, 'C', 120, 1, ''),
(7, 0, 'C plus plus', 180, 1, ''),
(8, 0, 'C', 120, 1, ''),
(9, 20, 'C plus plus', 180, 1, ''),
(10, 20, 'C', 120, 1, ''),
(11, 21, 'C plus plus', 180, 1, ''),
(12, 21, 'C', 120, 1, ''),
(13, 21, 'Java', 200, 1, ''),
(14, 22, 'C plus plus', 180, 1, 'ami@gmail.com'),
(15, 22, 'C', 120, 1, 'ami@gmail.com'),
(16, 22, 'Java', 200, 1, 'ami@gmail.com'),
(17, 23, 'C', 120, 2, 'shams@gmail.com'),
(18, 23, 'Java', 200, 1, 'shams@gmail.com'),
(19, 24, 'C plus plus', 180, 1, 'shams@gmail.com'),
(20, 24, 'Java', 200, 2, 'shams@gmail.com'),
(21, 25, 'C', 120, 1, 'shams@gmail.com'),
(22, 25, 'C Sharpe', 220, 5, 'shams@gmail.com'),
(23, 26, 'C', 120, 1, 'shams@gmail.com'),
(24, 27, 'C', 120, 2, 'shams@gmail.com'),
(25, 30, 'C', 120, 1, 'shams@gmail.com'),
(26, 31, 'C', 120, 1, 'shams@gmail.com'),
(27, 32, 'C plus plus', 180, 1, 'shams@gmail.com'),
(28, 33, 'C', 120, 1, 'shams@gmail.com'),
(29, 34, 'C', 120, 1, 'shams@gmail.com'),
(30, 35, 'Research Methodology', 310, 1, 'ami@gmail.com'),
(31, 35, 'C', 120, 1, 'ami@gmail.com'),
(32, 35, 'Java', 200, 3, 'ami@gmail.com'),
(33, 36, 'C', 120, 1, 'ami@gmail.com'),
(34, 37, 'C plus plus', 180, 1, 'ami@gmail.com'),
(35, 37, 'Java', 200, 3, 'ami@gmail.com'),
(36, 38, 'C', 120, 1, 'ami@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `total_price` float NOT NULL,
  `delivery_address` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `name`, `email`, `phone_number`, `total_price`, `delivery_address`) VALUES
(2, 'ami', '', '01742686982', 500, 'Banani'),
(3, 'ami', '', '01742686982', 220, 'Purba Charandwp Boalkhali'),
(4, 'ami', '', '01742686982', 300, 'Duptara'),
(5, 'ami', '', '01742686982', 300, 'Duptara'),
(6, 'ami', '', '01742686982', 300, 'Duptara'),
(7, 'ami', '', '01742686982', 300, 'Duptara'),
(8, 'ami', '', '01742686982', 300, 'Duptara'),
(9, 'ami', '', '01742686982', 300, 'Duptara'),
(10, 'ami', '', '01742686982', 300, 'Duptara'),
(11, 'ami', '', '01742686982', 300, 'Duptara'),
(12, 'ami', '', '01742686982', 300, 'Duptara'),
(13, 'ami', '', '01742686982', 300, 'Duptara'),
(14, 'ami', '', '01742686982', 300, 'Duptara'),
(15, 'ami', '', '01742686982', 300, 'Duptara'),
(16, 'ami', '', '01742686982', 300, 'Duptara'),
(17, 'ami', '', '01742686982', 300, 'Duptara'),
(18, 'ami', '', '01742686982', 300, 'Duptara'),
(19, 'ami', '', '01742686982', 300, 'Duptara'),
(20, 'ami', '', '01742686982', 300, 'Duptara'),
(21, 'ami', '', '01742686982', 500, 'AIUB'),
(22, 'ami', 'ami@gmail.com', '01742686982', 500, 'IUB'),
(23, 'shams', 'shams@gmail.com', '01811829981', 440, 'Bashundhara'),
(24, 'shams', 'shams@gmail.com', '01811829981', 580, 'Baridhara'),
(25, 'shams', 'shams@gmail.com', '01811829981', 1220, 'Dhaka'),
(26, 'shams', 'shams@gmail.com', '01811829981', 120, 'Banani'),
(27, 'shams', 'shams@gmail.com', '01811829981', 240, 'Gulshan'),
(28, 'shams', 'shams@gmail.com', '01811829981', 0, 'Gulshan'),
(29, 'shams', 'shams@gmail.com', '01811829981', 0, 'Gulshan'),
(30, 'shams', 'shams@gmail.com', '01811829981', 120, 'ASAS'),
(31, 'shams', 'shams@gmail.com', '01811829981', 120, 'AWS'),
(32, 'shams', 'shams@gmail.com', '01811829981', 180, 'OP'),
(33, 'shams', 'shams@gmail.com', '01811829981', 120, 'Otr'),
(34, 'shams', 'shams@gmail.com', '01811829981', 120, 'Saw'),
(35, 'ami', 'ami@gmail.com', '01742686982', 1030, 'Banani 1'),
(36, 'ami', 'ami@gmail.com', '01742686982', 120, 'Banani'),
(37, 'ami', 'ami@gmail.com', '01742686982', 780, 'Banani 1'),
(38, 'ami', 'ami@gmail.com', '01742686982', 120, 'Banani');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `author_name` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(32) NOT NULL,
  `description` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `author_name`, `category`, `price`, `status`, `description`) VALUES
(1, 'C plus plus', 'Yash 1', 'Engineering', 180, 'On Sale', 'This is for C programming.'),
(2, 'C', 'Yash2', 'Engineering', 120, 'On Sale', 'Bla bla'),
(3, 'Java', 'JavaC', 'Engineering', 200, 'On Sale', 'Java Programming'),
(4, 'C Sharpe', 'CSC', 'Engineering', 220, 'On Sale', 'C# Programming'),
(5, 'HTML', 'HTML5', 'Engineering', 100, 'Discounts', 'This id for web programming.'),
(6, 'HTML', 'HTML5', 'Engineering', 100, 'Discounts', 'This id for web programming.'),
(7, 'Compiler Design', 'Resnic', 'Engineering', 150, 'Featured Category', 'Its a compiler design book'),
(8, 'Theory of Computation', 'Resnic', 'Engineering', 120, 'Featured Category', 'Its a toc book'),
(9, 'Project Management', 'PM', 'Engineering', 110, 'Featured Category', 'Its a SDPM book.'),
(10, 'Research Methodology', 'Dr. XYZ', 'Engineering', 310, 'New Product', 'This is for researcher.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(32) NOT NULL,
  `email` varchar(16) NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `phone_number`, `password`) VALUES
('ami', 'ami@gmail.com', '01742686982', '123456'),
('shams', 'shams@gmail.com', '01811829981', '000000'),
('tmi', 'tmi@fhbik.com', '6789006545', '000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
