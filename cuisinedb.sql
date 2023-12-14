-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2023 at 12:38 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuisinedb`
--
CREATE DATABASE IF NOT EXISTS `cuisinedb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `cuisinedb`;

-- --------------------------------------------------------

--
-- Table structure for table `cuisinetbl`
--

DROP TABLE IF EXISTS `cuisinetbl`;
CREATE TABLE IF NOT EXISTS `cuisinetbl` (
  `cuisine_id` int NOT NULL AUTO_INCREMENT COMMENT 'Cuisine ID',
  `cuisine_name` varchar(30) NOT NULL COMMENT 'Cuisine Name',
  `price` double(6,2) NOT NULL COMMENT 'Price',
  `img_path` varchar(50) NOT NULL COMMENT 'Image Path',
  PRIMARY KEY (`cuisine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cuisinetbl`
--

INSERT INTO `cuisinetbl` (`cuisine_id`, `cuisine_name`, `price`, `img_path`) VALUES
(1, 'Curry', 2.00, './images/main_food/curry.jpg'),
(2, 'pasta', 1.00, './images/main_food/pasta.jpg'),
(3, 'salmon', 1.50, './images/main_food/salmon.jpg'),
(4, 'tacos-al-pastor', 1.50, './images/main_food/tacos-al-pastor.jpg '),
(5, 'biryani', 1.50, './images/main_food/biryani.jpg'),
(6, 'asparagus', 1.75, './images/main_food/asparagus.jpg'),
(7, 'pizza', 2.00, './images/main_food/pizza.jpg'),
(8, 'beef', 1.75, './images/main_food/beef.jpg'),
(9, 'strawberry-dessert', 0.80, './images/desserts/blueberry-muffins'),
(10, 'cookies', 0.60, './images/desserts/cookies.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `logintbl`
--

DROP TABLE IF EXISTS `logintbl`;
CREATE TABLE IF NOT EXISTS `logintbl` (
  `customer_id` int NOT NULL AUTO_INCREMENT COMMENT 'Customer ID',
  `customer_name` varchar(30) NOT NULL COMMENT 'Customer Name',
  `customer_password` varchar(30) NOT NULL COMMENT 'Customer Password',
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logintbl`
--

INSERT INTO `logintbl` (`customer_id`, `customer_name`, `customer_password`) VALUES
(7, 'Mahmood', '123'),
(1, 'admin', 'admin'),
(8, 'Mohammed', '123'),
(9, 'Fahad', '123');

-- --------------------------------------------------------

--
-- Table structure for table `reservationtbl`
--

DROP TABLE IF EXISTS `reservationtbl`;
CREATE TABLE IF NOT EXISTS `reservationtbl` (
  `reservation_id` int NOT NULL AUTO_INCREMENT COMMENT 'Reservation ID',
  `customer_id` int NOT NULL COMMENT 'Customer ID',
  `cuisine_id` int NOT NULL COMMENT 'Cuisine ID',
  `reservation_date` date NOT NULL COMMENT 'Reservation Date',
  `quantity` int NOT NULL COMMENT 'Quantity',
  PRIMARY KEY (`reservation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservationtbl`
--

INSERT INTO `reservationtbl` (`reservation_id`, `customer_id`, `cuisine_id`, `reservation_date`, `quantity`) VALUES
(63, 8, 10, '2023-12-14', 4),
(62, 8, 8, '2023-12-14', 1),
(61, 9, 4, '2023-12-14', 1),
(59, 7, 7, '2023-12-14', 1),
(60, 9, 3, '2023-12-14', 2),
(58, 7, 2, '2023-12-14', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
