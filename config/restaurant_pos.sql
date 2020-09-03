-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 08:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(4, 'Beer'),
(5, 'Snack'),
(6, 'BBQ'),
(7, 'Vegetable'),
(8, 'Meal'),
(9, 'Liquor');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tb_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax` varchar(266) COLLATE utf8_unicode_ci NOT NULL,
  `net_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `tb_id`, `total`, `tax`, `net_total`, `status`, `created_at`, `updated`) VALUES
(5, 'V2020091', '1', '1500', '75', '1575', 'paid', '2020-09-03', '2020-09-03 10:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tb_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_qty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `tb_id`, `p_id`, `p_name`, `p_price`, `p_qty`, `sub_total`, `status`, `created`, `updated`) VALUES
(10, 'V2020091', '1', '1', 'ကန်စွန်းပလိန်း', '1500', '1', '1500', 'paid', '2020-09-03 03:33:11', '2020-09-03 03:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `price`, `status`) VALUES
(1, 7, 'ကန်စွန်းပလိန်း', '1500', ''),
(2, 7, 'မှိုကန်စွန်း', '1999', ''),
(3, 5, 'ကြက်ခြေထောက်သုပ်', '1500', ''),
(4, 5, 'ကြက်ခြေထောက်ထောင်း', '1500', ''),
(9, 4, 'DraftBeer', '850', ''),
(10, 8, 'Pork', '3000', ''),
(11, 8, '၀◌က်ချိုချ◌်ဥ', '3000', ''),
(12, 8, '၀◌က်သားလုံးကြော်', '3000', ''),
(13, 4, 'Tiger', '2000', '');

-- --------------------------------------------------------

--
-- Table structure for table `software_expire`
--

CREATE TABLE `software_expire` (
  `id` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `updated` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `software_expire`
--

INSERT INTO `software_expire` (`id`, `expire_date`, `updated`) VALUES
(1, '2020-09-30', '2020-09-01 05:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_name`, `status`, `created_at`, `modified_at`) VALUES
(1, '1', '0', '2020-08-17 10:02:33', '2020-08-17 10:02:33'),
(2, '2', '0', '2020-08-17 10:02:33', '2020-08-17 10:02:33'),
(3, '3', '0', '2020-08-17 10:17:03', '2020-08-17 10:17:03'),
(4, '4', '0', '2020-08-17 10:17:03', '2020-08-17 10:17:03'),
(5, '5', '0', '2020-08-21 03:38:34', '2020-08-21 03:38:34'),
(6, '6', '0', '2020-08-21 03:39:08', '2020-08-21 03:39:08'),
(7, '7', '0', '2020-08-21 03:40:20', '2020-08-21 03:40:20'),
(8, '8', '', '2020-09-02 06:25:25', '2020-09-02 06:25:25'),
(9, '9', '', '2020-09-03 05:53:35', '2020-09-03 05:53:35'),
(10, '10', '', '2020-09-03 05:54:04', '2020-09-03 05:54:04'),
(11, '11', '', '2020-09-03 05:54:11', '2020-09-03 05:54:11'),
(12, '12', '', '2020-09-03 05:54:14', '2020-09-03 05:54:14'),
(13, '13', '', '2020-09-03 05:54:17', '2020-09-03 05:54:17'),
(14, '14', '', '2020-09-03 05:54:19', '2020-09-03 05:54:19'),
(15, '15', '', '2020-09-03 05:54:22', '2020-09-03 05:54:22'),
(16, '16', '', '2020-09-03 05:54:24', '2020-09-03 05:54:24'),
(17, '17', '', '2020-09-03 05:54:27', '2020-09-03 05:54:27'),
(18, '18', '', '2020-09-03 05:54:31', '2020-09-03 05:54:31'),
(19, '19', '', '2020-09-03 05:54:33', '2020-09-03 05:54:33'),
(20, '20', '', '2020-09-03 05:54:37', '2020-09-03 05:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `created`) VALUES
(1, 'kokhant', '123456', '', '2020-09-01 05:53:56'),
(2, 'aungkyawsoe', '123456', '1', '2020-09-01 06:49:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `software_expire`
--
ALTER TABLE `software_expire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `software_expire`
--
ALTER TABLE `software_expire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
