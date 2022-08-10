-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2022 at 04:20 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunchApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `restaurant_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `restaurant_id`) VALUES
(18, 'Zion Pastery', 'Gunjur Jujuba Junction', '3937895', '5'),
(19, 'Trust Bank', 'Bakoteh Tippa Garrace', '8765434', '7'),
(20, 'Africell', 'Serrekunda Market Customer Care', '65433222', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `mobile`, `company_id`) VALUES
(9, 'Essa D Bah', '3936896', '18'),
(17, 'Muhammed Mbye', '9876543', '18'),
(18, 'Abdoulie Bah', '6543311', '19'),
(19, 'Baba Jallow', '7653422', '20');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `discription` text NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `restaurant_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `discription`, `price`, `image`, `restaurant_id`) VALUES
(14, 'Cheep', 'Cheep bu saf sap ', 150, 'images/chepp.jpeg', '5'),
(15, 'Domoda', 'Best peanut butter soup', 100, 'images/domoda.jpeg', '5'),
(16, 'Mbahal', 'Best mbahal in town with fresh groundnuts', 100, 'images/mbahal.jpeg', '5'),
(17, 'Palasas', 'Fresh leaves soup', 99, 'images/palasas.jpeg', '5'),
(18, 'Super Kanja', 'Best Super Okra Soup ', 200, 'images/superKanja.jpeg', '5'),
(19, 'Domoda', 'just waaw', 99, 'images/domoda.jpeg', '7');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `food_id` varchar(100) NOT NULL,
  `restaurant_id` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food_id`, `restaurant_id`, `company_id`, `employee_id`, `orderDate`) VALUES
(18, '14', '5', '18', '9', '2022-07-27'),
(19, '16', '5', '18', '9', '2022-07-27'),
(20, '17', '5', '18', '9', '2022-07-27'),
(21, '18', '5', '18', '9', '2022-07-27'),
(22, '15', '5', '18', '17', '2022-07-27'),
(23, '16', '5', '18', '17', '2022-07-27'),
(24, '19', '7', '19', '18', '2022-07-27'),
(25, '15', '5', '20', '19', '2022-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `address`, `mobile`) VALUES
(5, 'Ali Baba', 'Brusubi Turn Table', '3936895'),
(7, 'La Parisien', 'Bijilo', '3456456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `company_id` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `company_id`, `userType`) VALUES
(20, 'ali@anch.com', '$2y$10$EpYbUeD7NDjOyHkIbPRT9.1qbZ1DngN6UpiT0Ns5ykh4kG3H2VQn.', '5', 'resAdmin'),
(21, 'zion@anch.com', '$2y$10$mjruSCbAMOdDkMgL9d9/iuNDD4o0aVUskgBb23G.IPaE15FH.Zhhi', '18', 'companyAdmin'),
(22, 'essa@zion.com', '$2y$10$9XKhdNSEBeZg93vLohRO9uN6SltsWx275PMyeTFKJ3L6KL1vava1q', '9', 'employee'),
(31, 'maha@zion.com', '$2y$10$M4Y2CnLJeOJ62wOZtLyqu.DSzA52esM6aFwBD6s9nPaLrXSEFNFOS', '17', 'employee'),
(32, 'paris@anch.com', '$2y$10$K4yNGgAn8WLL6Jgljs99N.lKX8gQqbmN0kPZQLDAOkSJbf90XFk42', '7', 'resAdmin'),
(33, 'trustbank@anch.com', '$2y$10$5fADVVLM0ZyOnH21Wpe4S./qUUdUzwowVs186R/u41.wMq67XNaM2', '19', 'companyAdmin'),
(34, 'ablie@trustbank.com', '$2y$10$6byDFE/CZAoJ59nOmre85OxMzvAyR82qIHWG9ULzy.njI2lNVxX8u', '18', 'employee'),
(35, 'africell@anch.com', '$2y$10$C7sAoSC1Ukxt7DykHaQ1muOGdNojZKKYwDu.jUselOgYwwns2NLfy', '20', 'companyAdmin'),
(36, 'baba@africell.com', '$2y$10$U3mOw3vR3FhsTUxUVbIdiOp2uyGZ4MPRWGoqC6hjeL43EsQ/5JYuW', '19', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `address` (`address`),
  ADD KEY `mobile` (`mobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
