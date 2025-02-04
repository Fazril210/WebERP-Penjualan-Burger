-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2025 at 02:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weberp_kelompoka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`) VALUES
(7, 'Fazril', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin'),
(8, 'Jennifer', '827ccb0eea8a706c4c34a16891f84e7b', 'kasir'),
(9, 'Haikal', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin'),
(10, 'Inay', '827ccb0eea8a706c4c34a16891f84e7b', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredient` int NOT NULL,
  `id_items` int NOT NULL,
  `id_produk` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `id_items`, `id_produk`, `quantity`, `created_at`, `updated_at`) VALUES
(12, 2, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 12:44:06'),
(13, 2, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 12:44:36'),
(14, 2, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(15, 2, 10, '0.05', '2025-01-21 18:42:32', '2025-01-25 12:23:55'),
(16, 3, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(17, 3, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(18, 3, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(19, 3, 7, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(20, 4, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(21, 4, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(22, 4, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(23, 4, 5, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(24, 5, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(25, 5, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(26, 5, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(27, 5, 6, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(28, 6, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(29, 6, 2, '0.15', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(30, 6, 4, '2.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(31, 7, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(32, 7, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(33, 8, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(34, 8, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(35, 8, 10, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(36, 9, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(37, 9, 3, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(38, 9, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(39, 9, 10, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(40, 10, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(41, 10, 3, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(42, 10, 9, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(43, 10, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(44, 11, 1, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(45, 11, 2, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(46, 11, 4, '1.00', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(47, 12, 11, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(48, 12, 16, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(49, 13, 12, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(50, 13, 16, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(51, 14, 13, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(52, 14, 16, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(53, 15, 14, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(54, 15, 16, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(55, 16, 15, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(56, 16, 16, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(57, 17, 15, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(58, 17, 14, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(59, 17, 16, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(60, 21, 18, '0.15', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(61, 22, 18, '0.15', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(62, 22, 19, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(63, 23, 18, '0.15', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(64, 53, 18, '0.25', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(65, 53, 19, '0.10', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(66, 54, 21, '0.15', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(67, 54, 9, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(68, 55, 21, '0.15', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(69, 56, 22, '0.20', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(70, 56, 24, '0.05', '2025-01-21 18:42:32', '2025-01-21 18:42:32'),
(71, 2, 27, '0.05', '2025-01-25 12:28:04', '2025-01-25 12:28:04'),
(72, 2, 28, '0.05', '2025-01-25 12:28:50', '2025-01-25 12:28:50'),
(73, 56, 23, '0.50', '2025-01-25 21:22:42', '2025-01-25 21:22:42'),
(74, 58, 7, '0.05', '2025-01-25 21:24:19', '2025-01-25 21:24:19'),
(75, 58, 23, '0.50', '2025-01-25 21:24:19', '2025-01-25 21:24:19'),
(76, 58, 22, '0.20', '2025-01-25 21:24:19', '2025-01-25 21:24:51'),
(77, 59, 22, '0.20', '2025-01-25 21:27:14', '2025-01-25 21:27:14'),
(78, 59, 23, '0.50', '2025-01-25 21:27:14', '2025-01-25 21:27:14'),
(79, 57, 22, '0.20', '2025-01-25 21:36:23', '2025-01-25 21:36:23'),
(80, 57, 23, '0.50', '2025-01-25 21:36:23', '2025-01-25 21:36:23'),
(81, 57, 9, '0.05', '2025-01-25 21:37:21', '2025-01-25 21:37:21'),
(82, 19, 17, '0.05', '2025-01-26 00:00:08', '2025-01-26 00:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_usage`
--

CREATE TABLE `ingredient_usage` (
  `id` int NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity_used` decimal(10,2) NOT NULL,
  `usage_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ingredient_usage`
--

INSERT INTO `ingredient_usage` (`id`, `id_order`, `id_product`, `quantity_used`, `usage_date`) VALUES
(1, 48, 1, '1.00', '2025-01-25 11:58:12'),
(2, 48, 2, '0.10', '2025-01-25 11:58:12'),
(3, 48, 4, '1.00', '2025-01-25 11:58:12'),
(4, 48, 10, '0.05', '2025-01-25 11:58:12'),
(5, 48, 1, '1.00', '2025-01-25 11:58:12'),
(6, 48, 2, '0.10', '2025-01-25 11:58:12'),
(7, 48, 4, '1.00', '2025-01-25 11:58:12'),
(8, 48, 7, '0.05', '2025-01-25 11:58:12'),
(9, 48, 12, '0.05', '2025-01-25 11:58:12'),
(10, 48, 16, '0.20', '2025-01-25 11:58:12'),
(11, 48, 11, '0.20', '2025-01-25 11:58:12'),
(12, 48, 16, '0.20', '2025-01-25 11:58:12'),
(13, 48, 13, '0.05', '2025-01-25 11:58:12'),
(14, 48, 16, '0.20', '2025-01-25 11:58:12'),
(15, 49, 1, '10.00', '2025-01-25 12:01:23'),
(16, 49, 2, '1.00', '2025-01-25 12:01:23'),
(17, 49, 4, '10.00', '2025-01-25 12:01:23'),
(18, 49, 10, '0.50', '2025-01-25 12:01:23'),
(19, 49, 1, '10.00', '2025-01-25 12:01:23'),
(20, 49, 2, '1.00', '2025-01-25 12:01:23'),
(21, 49, 4, '10.00', '2025-01-25 12:01:23'),
(22, 49, 7, '0.50', '2025-01-25 12:01:23'),
(23, 49, 1, '10.00', '2025-01-25 12:01:23'),
(24, 49, 2, '1.00', '2025-01-25 12:01:23'),
(25, 49, 4, '10.00', '2025-01-25 12:01:23'),
(26, 49, 5, '1.00', '2025-01-25 12:01:23'),
(27, 49, 1, '10.00', '2025-01-25 12:01:23'),
(28, 49, 2, '1.00', '2025-01-25 12:01:23'),
(29, 49, 1, '10.00', '2025-01-25 12:01:23'),
(30, 49, 2, '1.50', '2025-01-25 12:01:23'),
(31, 49, 4, '20.00', '2025-01-25 12:01:23'),
(32, 49, 1, '10.00', '2025-01-25 12:01:23'),
(33, 49, 2, '1.00', '2025-01-25 12:01:23'),
(34, 49, 4, '10.00', '2025-01-25 12:01:23'),
(35, 49, 6, '0.50', '2025-01-25 12:01:23'),
(36, 49, 1, '10.00', '2025-01-25 12:01:23'),
(37, 49, 2, '1.00', '2025-01-25 12:01:23'),
(38, 49, 10, '0.50', '2025-01-25 12:01:23'),
(39, 49, 1, '10.00', '2025-01-25 12:01:23'),
(40, 49, 3, '1.00', '2025-01-25 12:01:23'),
(41, 49, 4, '10.00', '2025-01-25 12:01:23'),
(42, 49, 10, '0.50', '2025-01-25 12:01:23'),
(43, 49, 1, '10.00', '2025-01-25 12:01:23'),
(44, 49, 3, '1.00', '2025-01-25 12:01:23'),
(45, 49, 9, '0.50', '2025-01-25 12:01:23'),
(46, 49, 4, '10.00', '2025-01-25 12:01:23'),
(47, 49, 1, '10.00', '2025-01-25 12:01:23'),
(48, 49, 2, '1.00', '2025-01-25 12:01:23'),
(49, 49, 4, '10.00', '2025-01-25 12:01:23'),
(50, 49, 14, '0.50', '2025-01-25 12:01:23'),
(51, 49, 16, '2.00', '2025-01-25 12:01:23'),
(52, 49, 15, '0.50', '2025-01-25 12:01:23'),
(53, 49, 16, '2.00', '2025-01-25 12:01:23'),
(54, 49, 15, '0.50', '2025-01-25 12:01:23'),
(55, 49, 14, '0.50', '2025-01-25 12:01:23'),
(56, 49, 16, '2.00', '2025-01-25 12:01:23'),
(57, 49, 13, '0.50', '2025-01-25 12:01:23'),
(58, 49, 16, '2.00', '2025-01-25 12:01:23'),
(59, 49, 12, '0.50', '2025-01-25 12:01:23'),
(60, 49, 16, '2.00', '2025-01-25 12:01:23'),
(61, 49, 11, '2.00', '2025-01-25 12:01:23'),
(62, 49, 16, '2.00', '2025-01-25 12:01:23'),
(63, 49, 18, '1.50', '2025-01-25 12:01:23'),
(64, 49, 18, '1.50', '2025-01-25 12:01:23'),
(65, 49, 19, '0.50', '2025-01-25 12:01:23'),
(66, 49, 18, '1.50', '2025-01-25 12:01:23'),
(67, 49, 18, '2.50', '2025-01-25 12:01:23'),
(68, 49, 19, '1.00', '2025-01-25 12:01:23'),
(69, 49, 21, '1.50', '2025-01-25 12:01:23'),
(70, 49, 9, '0.50', '2025-01-25 12:01:23'),
(71, 49, 21, '1.50', '2025-01-25 12:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_items` int NOT NULL,
  `name_items` text NOT NULL,
  `price_items` int NOT NULL,
  `stock_items` int NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_items`, `name_items`, `price_items`, `stock_items`, `images`, `status`, `type`) VALUES
(2, 'Too Cheesy', 45000, 67, '1737085770_1736874032_too_cheesy.png', 'Tersedia', 'Burger'),
(3, 'Smoked BBQ Cheeseburger', 58500, 83, '1737468055_smoked_bbq_cheeseburger.jpg', 'Tersedia', 'Burger'),
(4, 'Mushroom Buck', 60100, 88, '1737468203_mushroom_buck.jpg', 'Tersedia', 'Burger'),
(5, 'Beef Mentai Burger', 45500, 85, '1737468387_beef_mentai_burger.jpg', 'Tersedia', 'Burger'),
(6, 'Beef Addict', 60100, 81, '1737468450_beef_addict.jpg', 'Tersedia', 'Burger'),
(7, 'Classic Buck', 32500, 84, '1737468501_classicbuck.jpg', 'Tersedia', 'Burger'),
(8, 'Simply Buck', 45500, 84, '1737468549_simply_buck.jpg', 'Tersedia', 'Burger'),
(9, 'The O.G Chicken Buck', 45500, 82, '1737468613_the_og_chicken_buck.jpg', 'Tersedia', 'Burger'),
(10, 'Buldak Chicken Burger', 58500, 83, '1737468684_buldak_chicken_burger.jpg', 'Tersedia', 'Burger'),
(11, 'Cheeseburger', 45500, 82, '1737468732_cheeseburger.jpg', 'Tersedia', 'Burger'),
(12, 'Red Velvet', 25000, 72, '1737097538_red_velvet.png', 'Tersedia', 'Drinks'),
(13, 'Matcha Latte', 30000, 77, '1737469034_matcha_latte.jpg', 'Tersedia', 'Drinks'),
(14, 'Taro Latte', 30000, 83, '1737469062_taro_latte.jpg', 'Tersedia', 'Drinks'),
(15, 'Chocolate Signature', 25000, 87, '1737469104_chocolate_signature.jpg', 'Tersedia', 'Drinks'),
(16, 'Coffee Latte', 25000, 87, '1737469136_coffee_latte.jpg', 'Tersedia', 'Drinks'),
(17, 'Mocachino', 25000, 88, '1737469169_mocachino.jpg', 'Tersedia', 'Drinks'),
(18, 'Galaxy Magical Drop', 28000, 82, '1737469222_galaxy_magical_drop.jpg', 'Tersedia', 'Drinks'),
(19, 'Sunrise Magical Glitter', 28000, 83, '1737469266_sunrise_magical_glitter.jpg', 'Tersedia', 'Drinks'),
(21, 'French Fries', 19500, 85, '1737471851_french_fries1.jpg', 'Tersedia', 'Side Dish'),
(22, 'Cheesy Fries', 29000, 86, '1737471917_1736879830_cheesy_fries1.png', 'Tersedia', 'Side Dish'),
(23, 'Canoe Fries', 26000, 86, '1737471957_canoe_fries1.png', 'Tersedia', 'Side Dish'),
(53, 'Monster Fries', 39000, 85, '1737472002_monster_fries.png', 'Tersedia', 'Side Dish'),
(54, 'Chilli Frank', 50000, 85, '1737472231_chilli_frank.jpg', 'Tersedia', 'Side Dish'),
(55, 'Classic Frank', 37500, 85, '1737472272_classic_frank.jpg', 'Tersedia', 'Side Dish'),
(56, 'Garlic Parmesan Wings', 50000, 95, '1737472304_garlic_parmesan_wings.jpg', 'Tersedia', 'Side Dish'),
(57, 'Spicy Buldak Cheese Wings', 50000, 85, '1737472331_spicy_buldak_cheese_wings.jpg', 'Tersedia', 'Side Dish'),
(58, 'Smoked BBQ Wings', 50000, 88, '1737472349_smoked_bbg_wings.jpg', 'Tersedia', 'Side Dish'),
(59, 'Alfredo Wings', 50000, 83, '1737472365_alfredo_wings.jpg', 'Tersedia', 'Side Dish');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `status_karyawan` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `gaji` decimal(10,2) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `email`, `no_telepon`, `tanggal_masuk`, `status_karyawan`, `gaji`, `jenis_kelamin`, `alamat`) VALUES
(1, 'Shareen', 'Manajer', 'shareenvst@gmail.com', '0831671761361', '2025-01-23', 'Aktif', '50000000.00', 'Perempuan', 'Jl. Pegangsaan Timur'),
(3, 'Budi Santoso', 'Manajer', 'budisantoso@example.com', '081234567890', '2025-01-23', 'Aktif', '15000000.00', 'Laki-laki', 'Jl. Merdeka No. 123, Jakarta'),
(4, 'Siti Rahayu', 'Kasir', 'sitirahayu@example.com', '081234567891', '2020-02-20', 'Aktif', '5000000.00', 'Perempuan', 'Jl. Sudirman No. 45, Jakarta'),
(5, 'Agus Prasetyo', 'Koki', 'agusprasetyo@example.com', '081234567892', '2020-03-25', 'Aktif', '7000000.00', 'Laki-laki', 'Jl. Gatot Subroto No. 67, Jakarta'),
(6, 'Dewi Lestari', 'Pelayan', 'dewilestari@example.com', '081234567893', '2020-04-30', 'Aktif', '4500000.00', 'Perempuan', 'Jl. Thamrin No. 89, Jakarta'),
(7, 'Eko Wijaya', 'Manajer', 'ekowijaya@example.com', '081234567894', '2020-05-05', 'Aktif', '16000000.00', 'Laki-laki', 'Jl. Kebon Sirih No. 101, Jakarta'),
(8, 'Rina Fitriani', 'Kasir', 'rinafitriani@example.com', '081234567895', '2020-06-10', 'Aktif', '5200000.00', 'Perempuan', 'Jl. Hayam Wuruk No. 112, Jakarta'),
(9, 'Hendra Setiawan', 'Koki', 'hendrasetiawan@example.com', '081234567896', '2020-07-15', 'Aktif', '8500000.00', 'Laki-laki', 'Jl. Pangeran Antasari No. 134, Jakarta'),
(10, 'Lina Novita', 'Pelayan', 'linanovita@example.com', '081234567897', '2020-08-20', 'Aktif', '4600000.00', 'Perempuan', 'Jl. Diponegoro No. 156, Jakarta'),
(11, 'Fajar Nugroho', 'Manajer', 'fajarnugroho@example.com', '081234567898', '2020-09-25', 'Aktif', '15500000.00', 'Laki-laki', 'Jl. Suryopranoto No. 178, Jakarta'),
(12, 'Ani Susanti', 'Kasir', 'anisantii@example.com', '081234567899', '2020-10-30', 'Aktif', '5300000.00', 'Perempuan', 'Jl. Gajah Mada No. 190, Jakarta'),
(13, 'Irfan Maulana', 'Koki', 'irfanmaulana@example.com', '081234567800', '2020-11-05', 'Aktif', '7300000.00', 'Laki-laki', 'Jl. Juanda No. 202, Jakarta'),
(14, 'Rini Wulandari', 'Pelayan', 'riniwulandari@example.com', '081234567801', '2020-12-10', 'Aktif', '4700000.00', 'Perempuan', 'Jl. K.H. Mas Mansyur No. 214, Jakarta'),
(15, 'Adi Saputra', 'Manajer', 'adisaputra@example.com', '081234567802', '2021-01-15', 'Aktif', '16500000.00', 'Laki-laki', 'Jl. Teuku Umar No. 226, Jakarta'),
(16, 'Maya Indah', 'Kasir', 'mayaindah@example.com', '081234567803', '2021-02-20', 'Aktif', '5400000.00', 'Perempuan', 'Jl. Panglima Polim No. 238, Jakarta'),
(17, 'Rudi Hermawan', 'Koki', 'rudihermawan@example.com', '081234567804', '2021-03-25', 'Aktif', '7400000.00', 'Laki-laki', 'Jl. Wolter Monginsidi No. 250, Jakarta'),
(18, 'Nina Permata', 'Pelayan', 'ninapermata@example.com', '081234567805', '2021-04-30', 'Aktif', '4800000.00', 'Perempuan', 'Jl. Trunojoyo No. 262, Jakarta'),
(19, 'Ahmad Fauzi', 'Manajer', 'ahmadfauzi@example.com', '081234567806', '2021-05-05', 'Aktif', '17000000.00', 'Laki-laki', 'Jl. Rasuna Said No. 274, Jakarta'),
(20, 'Yuni Astuti', 'Kasir', 'yuniastuti@example.com', '081234567807', '2021-06-10', 'Aktif', '5500000.00', 'Perempuan', 'Jl. Senopati No. 286, Jakarta'),
(21, 'Dedi Kurniawan', 'Koki', 'dedikurniawan@example.com', '081234567808', '2021-07-15', 'Aktif', '7500000.00', 'Laki-laki', 'Jl. Kebayoran Lama No. 298, Jakarta'),
(22, 'Sari Dewi', 'Pelayan', 'saridewi@example.com', '081234567809', '2021-08-20', 'Aktif', '4900000.00', 'Perempuan', 'Jl. Ciputat Raya No. 310, Jakarta'),
(23, 'Rizky Pratama', 'Manajer', 'rizkypratama@example.com', '081234567810', '2021-09-25', 'Aktif', '17500000.00', 'Laki-laki', 'Jl. Pondok Indah No. 322, Jakarta'),
(24, 'Dina Anggraeni', 'Kasir', 'dinaanggraeni@example.com', '081234567811', '2021-10-30', 'Aktif', '5600000.00', 'Perempuan', 'Jl. Cilandak KKO No. 334, Jakarta'),
(25, 'Andi Wijaya', 'Koki', 'andiwijaya@example.com', '081234567812', '2021-11-05', 'Aktif', '7600000.00', 'Laki-laki', 'Jl. Lebak Bulus No. 346, Jakarta'),
(26, 'Rina Puspita', 'Pelayan', 'rinapuspita@example.com', '081234567813', '2021-12-10', 'Aktif', '5000000.00', 'Perempuan', 'Jl. Fatmawati No. 358, Jakarta'),
(27, 'Hari Setiawan', 'Manajer', 'hari.setiawan@example.com', '081234567814', '2022-01-15', 'Aktif', '18000000.00', 'Laki-laki', 'Jl. Cipete Raya No. 370, Jakarta'),
(28, 'Lia Damayanti', 'Kasir', 'liadamayanti@example.com', '081234567815', '2022-02-20', 'Aktif', '5700000.00', 'Perempuan', 'Jl. Pasar Minggu No. 382, Jakarta'),
(29, 'Roni Saputra', 'Koki', 'ronisaputra@example.com', '081234567816', '2022-03-25', 'Aktif', '7700000.00', 'Laki-laki', 'Jl. Lenteng Agung No. 394, Jakarta'),
(30, 'Haikal', 'Pelayan', 'dewisartika@example.com', '081234567817', '2022-04-30', 'Aktif', '5100000.00', 'Laki-laki', 'Jl. Jagakarsa No. 406, Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_members` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_members`, `name`, `email`, `phone`) VALUES
(4, 'Fazril ', 'fazril123@gmail.com', '081238275748'),
(5, 'Shareen', 'shareenvst@gmail.com', '081267236726'),
(8, 'Kayla', 'kayla@gmail.com', '083627817263'),
(12, 'Kidut', 'kidut@gmail.com', '0812372837341'),
(13, 'Daffa', 'daffa@gmail.com', '085162718374');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `order_date` datetime NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','qris') NOT NULL,
  `member_discount` decimal(10,2) DEFAULT '0.00',
  `tax` decimal(10,2) DEFAULT '0.00',
  `final_price` decimal(10,2) NOT NULL,
  `id_members` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `order_date`, `total_price`, `payment_method`, `member_discount`, `tax`, `final_price`, `id_members`) VALUES
(48, '2025-01-25 18:58:12', '205050.00', 'cash', '0.02', '0.11', '205050.00', 13),
(49, '2025-01-25 19:01:23', '11570929.00', 'cash', '0.02', '0.11', '11570929.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_order_detail` int NOT NULL,
  `id_order` int NOT NULL,
  `id_items` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_order_detail`, `id_order`, `id_items`, `quantity`, `price`) VALUES
(171, 48, 2, 1, '45000.00'),
(172, 48, 3, 1, '58500.00'),
(173, 48, 13, 1, '30000.00'),
(174, 48, 12, 1, '25000.00'),
(175, 48, 14, 1, '30000.00'),
(176, 49, 2, 10, '45000.00'),
(177, 49, 3, 10, '58500.00'),
(178, 49, 4, 10, '60100.00'),
(179, 49, 7, 10, '32500.00'),
(180, 49, 6, 10, '60100.00'),
(181, 49, 5, 10, '45500.00'),
(182, 49, 8, 10, '45500.00'),
(183, 49, 9, 10, '45500.00'),
(184, 49, 10, 10, '58500.00'),
(185, 49, 11, 10, '45500.00'),
(186, 49, 18, 10, '28000.00'),
(187, 49, 19, 10, '28000.00'),
(188, 49, 15, 10, '25000.00'),
(189, 49, 16, 10, '25000.00'),
(190, 49, 17, 10, '25000.00'),
(191, 49, 14, 10, '30000.00'),
(192, 49, 13, 10, '30000.00'),
(193, 49, 12, 10, '25000.00'),
(194, 49, 21, 10, '19500.00'),
(195, 49, 22, 10, '29000.00'),
(196, 49, 23, 10, '26000.00'),
(197, 49, 53, 10, '39000.00'),
(198, 49, 54, 10, '50000.00'),
(199, 49, 55, 10, '37500.00'),
(200, 49, 58, 10, '50000.00'),
(201, 49, 57, 10, '50000.00'),
(202, 49, 59, 10, '50000.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `cash_amount` decimal(10,2) DEFAULT NULL,
  `change_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` int NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stock` decimal(10,2) DEFAULT NULL,
  `unit_of_goods` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_piece` int NOT NULL,
  `id_suppliers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `name_product`, `stock`, `unit_of_goods`, `price_per_piece`, `id_suppliers`) VALUES
(1, 'Roti Burger', '850.00', 'pcs', 1200, 6),
(2, 'Beef Patties', '87.65', 'kg', 120000, 5),
(3, 'Chicken Patties', '97.10', 'kg', 100000, 4),
(4, 'Keju Slice', '865.00', 'pcs', 700, 5),
(5, 'Jamur', '98.80', 'kg', 10000, 6),
(6, 'Saus Mentai', '99.25', 'liter', 65000, 7),
(7, 'Saus BBQ', '99.25', 'liter', 50000, 5),
(9, 'Bumbu Pedas', '98.55', 'kg', 70000, 5),
(10, 'Selada', '97.80', 'kg', 10000, 7),
(11, 'Red Velvet Syrup', '96.20', 'liter', 30000, 6),
(12, 'Matcha Powder', '99.05', 'kg', 220000, 4),
(13, 'Taro Powder', '99.20', 'kg', 200000, 5),
(14, 'Cokelat Bubuk', '98.75', 'kg', 190000, 6),
(15, 'Espresso/Coffee Beans', '98.75', 'kg', 300000, 5),
(16, 'Susu Cair Full Cream', '81.60', 'liter', 20000, 6),
(17, 'Sirup Glitter', '100.00', 'liter', 80000, 6),
(18, 'Kentang Beku', '89.95', 'kg', 35000, 4),
(19, 'Keju Mozarella', '97.80', 'kg', 120000, 4),
(20, 'Keju Cheddar', '100.00', 'kg', 80000, 4),
(21, 'Sosis Frankfurter', '95.50', 'kg', 95000, 5),
(22, 'Ayam Sayap', '99.60', 'kg', 55000, 5),
(23, 'Tepung Bumbu', '100.00', 'kg', 25000, 5),
(24, 'Bumbu Garlic Parmesan', '99.90', 'kg', 75000, 6),
(25, 'Minyak Goreng', '210.50', 'liter', 35000, 7),
(26, 'Mayones', '5.00', 'liter', 50000, 6),
(27, 'Saus Sambal', '100.00', 'liter', 25000, 6),
(28, 'Saus Tomat', '200.00', 'liter', 20000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_suppliers` int NOT NULL,
  `name_suppliers` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_suppliers`, `name_suppliers`, `phone`, `alamat`) VALUES
(4, 'Alex', '081287345748', 'Jl. Jendral Sudirman\r\n'),
(5, 'Fazril', '087775647398', 'Jl. Cakrawala No.12 Kota Jakarta'),
(6, 'Jasmine', '082349637189', 'Jl. Garuda No. 45 Kota Surabaya'),
(7, 'Kidut', '081292843948', 'Jl. Letjen Sarbini');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_produk` int NOT NULL,
  `id_suppliers` int NOT NULL,
  `jumlah_beli` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `total_harga` int NOT NULL,
  `metode_pembayaran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id_suppliers`, `jumlah_beli`, `harga_satuan`, `total_harga`, `metode_pembayaran`, `status_pembayaran`, `tgl`) VALUES
(20, 1, 4, 20, 5000, 100000, 'Cash', 'Lunas', '2025-01-10'),
(21, 2, 5, 12, 120000, 1440000, 'Cash', 'Lunas', '2025-01-11'),
(23, 28, 5, 100, 20000, 2000000, 'Cash', 'Lunas', '2025-01-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredient`),
  ADD KEY `fk_ingredient_item` (`id_items`),
  ADD KEY `fk_ingredient_product` (`id_produk`);

--
-- Indexes for table `ingredient_usage`
--
ALTER TABLE `ingredient_usage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_items`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_members`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_items` (`id_items`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `ibfk_suppliers_1` (`id_suppliers`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_suppliers`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `suppliers_ibfk_2` (`id_suppliers`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `ingredient_usage`
--
ALTER TABLE `ingredient_usage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_items` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_members` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_order_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_suppliers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fk_ingredient_item` FOREIGN KEY (`id_items`) REFERENCES `items` (`id_items`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ingredient_product` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredient_usage`
--
ALTER TABLE `ingredient_usage`
  ADD CONSTRAINT `ingredient_usage_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `ingredient_usage_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_produk`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_items`) REFERENCES `items` (`id_items`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `ibfk_suppliers_1` FOREIGN KEY (`id_suppliers`) REFERENCES `suppliers` (`id_suppliers`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `suppliers_ibfk_2` FOREIGN KEY (`id_suppliers`) REFERENCES `suppliers` (`id_suppliers`),
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `products` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
