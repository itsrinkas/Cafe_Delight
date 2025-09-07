-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 07:14 PM
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
-- Database: `db_et4132_group14`
--

-- --------------------------------------------------------

--
-- Table structure for table `drinks_menu`
--

CREATE TABLE `drinks_menu` (
  `item_ID` int(11) NOT NULL,
  `drink_name` varchar(20) NOT NULL,
  `drink_price` decimal(4,2) NOT NULL,
  `drink_available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks_menu`
--

INSERT INTO `drinks_menu` (`item_ID`, `drink_name`, `drink_price`, `drink_available`) VALUES
(1, 'Americano', 4.25, 1),
(2, 'Espresso', 3.25, 1),
(3, 'Cappuccino', 5.00, 1),
(4, 'Mocha', 5.50, 0),
(5, 'Pistachio Mocha', 7.50, 1),
(6, 'Latte', 6.25, 1),
(7, 'Iced Latte', 6.50, 1),
(8, 'Flat White', 5.00, 1),
(9, 'Oreo Frappuccino', 7.50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `item_ID` int(11) NOT NULL,
  `food_name` varchar(50) DEFAULT NULL,
  `food_price` decimal(4,2) NOT NULL,
  `food_available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`item_ID`, `food_name`, `food_price`, `food_available`) VALUES
(1, 'Chocolate Cake', 6.00, 1),
(2, 'Strawberry Cheesecake', 7.50, 1),
(3, 'Tiramisu', 6.50, 1),
(4, 'Apple Crumble', 6.50, 1),
(5, 'Cherry Cheesecake', 7.50, 1),
(6, 'Honey Cake', 6.50, 1),
(7, 'Sticky Toffee Puddin', 7.50, 0),
(8, 'Chocolate Sundae', 7.50, 1),
(9, 'Banana Sundae', 7.50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_info`
--

CREATE TABLE `member_info` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `is_student` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_info`
--

INSERT INTO `member_info` (`member_id`, `first_name`, `last_name`, `email_address`, `is_student`) VALUES
(1, 'john', 'doe', 'jdoe@gmail.com', 1),
(2, 'Taylor', 'Swift', 'tswifty@hotmail.com', 1),
(3, 'Khadeejah', 'Saeed', '19220863@studentmail.ul.ie', 1),
(4, 'Elizabeth', 'Richards', 'lizrichards@gmail.com', 1),
(5, 'Ciaran', 'Obrien', 'cbrian@gmail.com', 0),
(6, 'Liam', 'Murphy', 'lmurphy@gmail.com', 1),
(7, 'Karen', 'Brar', 'kbrar@yahoo.com', 0),
(8, 'Nicolas', 'Pepe', 'Npepe@hotmail.com', 0),
(9, 'Bilbo', 'Baggins', 'bbaggins@gmail.com', 0),
(10, 'Harry', 'Potter', 'hpotter@hogwarts.ie', 1),
(11, 'Kyle', 'Rodgers', 'krodgers@microsoft.com', 1),
(13, 'Nial', 'Johnson', 'njohnson@yahoo.com', 0),
(14, 'George', 'Clooney', 'gclooney@gmail.com', 0),
(15, 'Selena', 'Tuohy', 'selena_tuohy@gmail.com', 0),
(16, 'Peter', 'Griffin', 'pgriffin@yahoo.com', 0),
(17, 'Leyton', 'Smith', 'lsmith@jmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `food_item_id` int(11) DEFAULT NULL,
  `drink_item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `member_id`, `food_item_id`, `drink_item_id`) VALUES
(11, 2, 4, NULL),
(12, 8, 4, 2),
(13, 5, 5, 2),
(14, 11, 8, 1),
(15, 10, 3, NULL),
(16, 13, 3, 2),
(17, 15, 3, 5),
(18, 16, NULL, 3),
(19, 14, 3, 9),
(20, 17, 2, 3),
(21, 3, 5, 5),
(22, 10, 3, 3),
(23, 14, 4, 3),
(24, 6, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `review_text` varchar(400) NOT NULL,
  `date_made` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `name`, `review_text`, `date_made`) VALUES
(1, 'Liam Murphy', 'Very good coffee', '2024-11-11 15:22:58'),
(3, 'James Bourke', 'Tastes nice', '2024-11-11 15:23:36'),
(12, 'Tia Lyle ', '5 stars', '2024-11-11 15:33:49'),
(13, 'Khadeejah Saeed', 'Loved the pistachio mocha! Would recommend everyone to try.', '2024-11-11 22:07:34'),
(14, 'Henry VIII', 'Fantastic', '2024-11-11 22:11:01'),
(15, 'Harry Potter', 'Love the strawberry cheesecake', '2024-11-11 21:15:32'),
(16, 'Raymond Smith', 'Loved the banana split', '2024-11-13 12:24:54'),
(17, 'Leyton Smith', 'Do you do Pistachio Croissants?', '2024-11-14 19:56:52'),
(19, 'James Rodriguez', 'Game Changing stuff', '2024-11-18 16:38:58'),
(22, 'Jenny Ortega', 'So delicious', '2024-11-18 16:47:40'),
(24, 'Lilly Mae Murphy', 'This business is awesome', '2024-11-18 19:41:13'),
(25, 'James Murphy', 'Best Website Ever! 100% for you! 10/10!!!', '2024-11-19 12:54:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinks_menu`
--
ALTER TABLE `drinks_menu`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `member_info`
--
ALTER TABLE `member_info`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `fk_food_item_id` (`food_item_id`),
  ADD KEY `fk_drink_item_id` (`drink_item_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_info`
--
ALTER TABLE `member_info`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_drink_item_id` FOREIGN KEY (`drink_item_id`) REFERENCES `drinks_menu` (`item_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_food_item_id` FOREIGN KEY (`food_item_id`) REFERENCES `food_menu` (`item_ID`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_info` (`member_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`food_item_id`) REFERENCES `food_menu` (`item_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`drink_item_id`) REFERENCES `drinks_menu` (`item_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
