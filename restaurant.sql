-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 09:32 PM
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
-- Database: `restaurant`
--

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `tableid` int(10) NOT NULL,
  `seats` int(10) NOT NULL,
  `tcondition` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `atime` varchar(255) NOT NULL,
  `ltime` varchar(255) NOT NULL,
  `numofcus` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `tableid`, `seats`, `tcondition`, `name`, `email`, `mobile`, `date`, `atime`, `ltime`, `numofcus`, `fname`, `lname`) VALUES
(26, 10, 6, 'Away from kitchen', '', 'kaveeshbhashitha@gmail.com', '0713116142', '2024-06-21', '00:02', '00:03', 3, 'M.A.', 'Kaveesh'),
(27, 8, 4, 'Closed to window', '', 'kaveeshbhashitha@gmail.com', '0713116142', '2024-06-28', '03:01', '05:01', 3, 'M.A.', 'Kaveesh');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `id` int(10) NOT NULL,
  `menuid` int(10) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `numofdish` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`id`, `menuid`, `menuname`, `price`, `name`, `email`, `address`, `mobile`, `numofdish`, `image`) VALUES
(1, 9, 'Falafel Wrap', '600.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 2, 'http://localhost/restaurant-app/images/$menuimage'),
(2, 3, 'Caesar Salad', '300.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 2, 'http://localhost/restaurant-app/images/food2.jpeg'),
(3, 3, 'Caesar Salad', '300.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 5, 'http://localhost/restaurant-app/images/food2.jpeg'),
(4, 7, 'Tacos', '700.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 4, 'http://localhost/restaurant-app/images/food6.jpeg'),
(5, 9, 'Falafel Wrap', '600.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 2, 'http://localhost/restaurant-app/images/food8.jpeg'),
(6, 8, 'Chocolate Cake', '1500.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 3, 'http://localhost/restaurant-app/images/food7.jpeg'),
(7, 8, 'Chocolate Cake', '1500.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 3, 'http://localhost/restaurant-app/images/food7.jpeg'),
(8, 2, 'Cheeseburger', '800.00', 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', '29/1,', '713116142', 4, 'http://localhost/restaurant-app/images/food1.jpeg');

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menuname`, `imageurl`, `category`, `ingredients`, `mode`, `price`) VALUES
(1, 'Margherita Pizza', 'food0.jpeg', 'Dairy', 'Tomato, Mozzarella, Basil', 'lunch', '500.00'),
(2, 'Cheeseburger', 'food1.jpeg', 'Not-Vegan', 'Beef Patty, Cheese, Lettuce, Tomato', 'breakfast', '800.00'),
(3, 'Caesar Salad', 'food2.jpeg', 'Vegan', 'Romaine Lettuce, Croutons, Caesar Dressing', 'dinner', '300.00'),
(4, 'Sushi', 'food3.jpeg', 'Not-Vegan', 'Rice, Nori, Fish, Avocado', 'lunch', '1500.00'),
(5, 'Pad Thai', 'food4.jpeg', 'Vegan', 'Rice Noodles, Tofu, Peanuts, Bean Sprouts', 'breakfast', '900.00'),
(6, 'Butter Chicken', 'food5.jpeg', 'Not-Vegan', 'Chicken, Butter, Tomato, Spices', 'dinner', '1000.00'),
(7, 'Tacos', 'food6.jpeg', 'Not-Vegan', 'Tortilla, Beef, Lettuce, Cheese', 'lunch', '700.00'),
(8, 'Chocolate Cake', 'food7.jpeg', 'Not-Vegan', 'Flour, Cocoa, Sugar, Eggs', 'breakfast', '1500.00'),
(9, 'Falafel Wrap', 'food8.jpeg', 'Vegan', 'Chickpeas, Tahini, Lettuce, Tomato', 'dinner', '600.00'),
(10, 'Pho', 'food9.jpeg', 'Not-Vegan', 'Rice Noodles, Beef, Herbs, Broth', 'lunch', '1500.00');

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `item_number` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `checkout_session_id` varchar(255) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `item_number`, `item_name`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `checkout_session_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'test', 'test@gmail.com', '1', 'HP Pavilion Laptop', 2.00, 'USD', 2.00, 'usd', 'pi_3JvaOFIuhitIP6cR0FEnom0H', 'cs_test_a1TndHS3IhW2KTTT06PTXLrsz0eU9qC1XvrFn5pCLATtSN30VNRyOlozsd', 'succeeded', '2021-11-14 10:03:12', '2021-11-14 10:03:12'),
(2, 'test', 'test@gmail.com', '1', 'HP Pavilion Laptop', 2.00, 'USD', 2.00, 'usd', 'pi_3JvahlIuhitIP6cR0Ti7w6lW', 'cs_test_a1o7uV7nVT1RCz9TNxoaMyk3wFrhPuSb6cdUusaau1zZzoPSt9aZ4JahhD', 'succeeded', '2021-11-14 10:23:14', '2021-11-14 10:23:14');

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `currency` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `currency`, `status`) VALUES
(1, 'HP Pavilion Laptop', '', 2.00, 'USD', 1);

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) NOT NULL,
  `allow` varchar(255) NOT NULL,
  `seats` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `allow`, `seats`, `status`) VALUES
(1, 'Smoking Allowed', 2, 'notreserved'),
(2, 'Away from kitchen', 3, 'notreserved'),
(3, 'Closed to window', 4, 'notreserved'),
(4, 'Smoking Allowed', 5, 'notreserved'),
(5, 'Away from kitchen', 6, 'notreserved'),
(6, 'Smoking Allowed', 2, 'notreserved'),
(7, 'Away from kitchen', 3, 'notreserved'),
(8, 'Closed to window', 4, 'reserved'),
(9, 'Smoking Allowed', 5, 'notreserved'),
(10, 'Away from kitchen', 6, 'reserved'),
(11, 'Smoking Allowed', 2, 'notreserved'),
(12, 'Away from kitchen', 3, 'notreserved'),
(13, 'Closed to window', 4, 'notreserved'),
(14, 'Smoking Allowed', 5, 'notreserved'),
(15, 'Away from kitchen', 6, 'notreserved'),
(16, 'Smoking Allowed', 2, 'notreserved'),
(17, 'Away from kitchen', 3, 'notreserved'),
(18, 'Closed to window', 4, 'notreserved'),
(19, 'Smoking Allowed', 5, 'notreserved'),
(20, 'Away from kitchen', 6, 'notreserved');

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `address`, `password`) VALUES
(1, '', 'kaveeshbhashitha@gmail.com', 0, '', '$2y$10$xEICgtIJJ0qzLQtoRfV86uP34A8Al2hpGGwADqens0h3RQ7KJqYYS'),
(2, '', 'kaveesh@gmail.com', 0, '', '$2y$10$4hZi1cfGqvuBNF2gFXyTYeCp1Er16MnDn0Ym1O1H0/xWd66ba7Xpy'),
(3, 'M.A. Bhashitha Kaveesh', 'bhashitha@gmail.com', 713116142, '29/1,', '$2y$10$MgoZ6yFIcfYlAOwH7K7UFeluzxCNToVrTr5a1HD9RF4TVRKvAyN8q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
