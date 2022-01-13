-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 01:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopanbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@shopanbd.com', NULL, '$2y$10$6CmzcCiPGESYPEJfMAmjd.romgJLr8/in.i4jYRcdj42pQRnSA5Xi', NULL, NULL, 'K09L36rbFhuJy9mCuzMKNBBLcGeXtm9zG3Zjt7Yuz2izRtQJ9udYU8jSgqqv', '2021-12-26 03:23:56', '2021-12-26 03:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `created_at`, `updated_at`) VALUES
(1, 'Kumira 47', '2022-01-08 04:50:56', '2022-01-08 04:50:56'),
(2, 'Banshbaria 16', '2022-01-08 04:51:28', '2022-01-08 04:51:28'),
(3, 'Barabkunda 19', '2022-01-08 04:51:34', '2022-01-08 04:51:34'),
(4, 'Bariadyala 28', '2022-01-08 04:51:39', '2022-01-08 04:51:39'),
(5, 'Bhatiari 38', '2022-01-08 04:51:45', '2022-01-08 04:51:45'),
(6, 'Muradpur 57', '2022-01-08 04:51:51', '2022-01-08 04:51:51'),
(7, 'Salimpur 66', '2022-01-08 04:51:57', '2022-01-08 04:51:57'),
(8, 'Saidpur 95', '2022-01-08 04:52:03', '2022-01-08 04:52:03'),
(9, 'Sonaichhari 85', '2022-01-08 04:52:08', '2022-01-08 04:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `sub_total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `session_id`, `product_id`, `shop_id`, `quantity`, `price`, `sub_total`, `created_at`, `updated_at`) VALUES
(73, 1, 'IEbuld45FIGYHl7pno0PZleuwRS58pD8tBCStRvk', 14, 2, 1, 25.00, 25, '2022-01-13 05:48:03', '2022-01-13 05:48:18'),
(74, NULL, 'IEbuld45FIGYHl7pno0PZleuwRS58pD8tBCStRvk', 13, 5, 1, 655.00, 655, '2022-01-13 05:52:04', '2022-01-13 05:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Grocery', 'category/images/category_image/61d3edd0da526.jpg', 1, NULL, '2022-01-04 00:48:48'),
(18, 'Medicine', 'category/images/category_image/61d3ede08e21c.jpg', 1, NULL, '2022-01-04 00:49:04'),
(19, 'Shopmart', 'category/images/category_image/61d3edf0717fb.jpg', 1, NULL, '2022-01-04 00:49:20'),
(20, 'Shop', 'category/images/category_image/61d3edfeaea5e.jpg', 1, NULL, '2022-01-04 00:49:34'),
(21, 'Food', 'category/images/category_image/61d3ee0e2d665.jpg', 1, NULL, '2022-01-04 00:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `validity` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount`, `validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fab2022', 10, '2022-01-14', 1, '2022-01-06 01:50:46', '2022-01-06 02:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_no` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_men`
--

INSERT INTO `delivery_men` (`id`, `name`, `varified_at`, `password`, `phone`, `image`, `status`, `document_image`, `document_no`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'tom', '2022-01-13 06:44:32', '$2y$10$s8J1jsp0ae78h8cnUeKHzu9apBJj3NLmaky5iutmqGUAJnq6mgEbS', '01234567890', 'delivery/images/deliveryman/61dfca5009024.jpg', '1', '', NULL, 'shitakindo', NULL, '2022-01-13 00:44:32', '2022-01-13 01:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_09_135113_create_admins_table', 1),
(6, '2021_12_13_085036_create_shopkeepers_table', 1),
(7, '2021_12_25_170159_create_delivery_men_table', 1),
(9, '2021_12_26_113229_create_categories_table', 2),
(11, '2021_12_26_120428_rollback', 3),
(12, '2021_12_27_103927_create_subcategories_table', 4),
(13, '2021_12_28_101504_create_shops_table', 5),
(14, '2021_12_28_114811_create_sliders_table', 6),
(15, '2021_12_30_065733_create_products_table', 7),
(16, '2021_12_30_090648_create_shop_images_table', 8),
(17, '2022_01_03_124314_create_carts_table', 9),
(18, '2022_01_06_065953_create_coupons_table', 10),
(19, '2022_01_08_104203_create_areas_table', 11),
(20, '2022_01_08_111335_create_set_locations_table', 12),
(21, '2022_01_09_074115_create_orders_table', 13),
(22, '2022_01_09_094200_create_order_items_table', 14),
(23, '2022_01_10_124042_create_shop_device_tokens_table', 15),
(24, '2014_10_12_000000_create_users_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint(20) NOT NULL,
  `sub_area_id` bigint(20) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `delivery_man_id` bigint(20) DEFAULT NULL,
  `delivery_charge` double(8,2) NOT NULL,
  `status` enum('pending','processing','on_the_way','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `session_id`, `date`, `phone`, `address`, `area_id`, `sub_area_id`, `payment_type`, `total`, `grand_total`, `delivery_man_id`, `delivery_charge`, `status`, `created_at`, `updated_at`) VALUES
(72, 0, '6aWe5g9oU4e3Rvihi0pTznsDTtDyYQUQBWpEO0sm', '2022-01-11', '01234567894', 'adgag', 1, 3, 'on', 25.00, 45.00, NULL, 20.00, 'pending', '2022-01-11 05:23:01', '2022-01-11 05:23:01'),
(73, 0, '6aWe5g9oU4e3Rvihi0pTznsDTtDyYQUQBWpEO0sm', '2022-01-11', '01234567894', 'ewqgwqeg', 1, 3, 'on', 25.00, 45.00, NULL, 20.00, 'pending', '2022-01-11 05:26:45', '2022-01-11 05:26:45'),
(74, 0, '6aWe5g9oU4e3Rvihi0pTznsDTtDyYQUQBWpEO0sm', '2022-01-11', '012345645633', 'gfne', 1, 1, 'on', 25.00, 50.00, NULL, 25.00, 'pending', '2022-01-11 05:30:59', '2022-01-11 05:30:59'),
(75, 0, 'IEbuld45FIGYHl7pno0PZleuwRS58pD8tBCStRvk', '2022-01-13', '01731107731', 'dhanmondi', 1, 1, 'on', 25.00, 50.00, NULL, 25.00, 'pending', '2022-01-13 03:50:15', '2022-01-13 03:50:15'),
(76, 1, 'IEbuld45FIGYHl7pno0PZleuwRS58pD8tBCStRvk', '2022-01-13', '01623036654', 'SHitakundo', 1, 3, 'on', 25.00, 45.00, NULL, 20.00, 'pending', '2022-01-13 05:51:46', '2022-01-13 05:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_cost` double(8,2) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `remark` enum('pending','reject','accept') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `shop_id`, `product_id`, `quantity`, `unit_cost`, `sub_total`, `remark`, `created_at`, `updated_at`) VALUES
(117, 64, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-10 23:41:01', '2022-01-10 23:41:01'),
(118, 65, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-10 23:41:08', '2022-01-10 23:41:08'),
(119, 65, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-10 23:41:08', '2022-01-10 23:41:08'),
(120, 66, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-10 23:41:18', '2022-01-10 23:41:18'),
(121, 66, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-10 23:41:18', '2022-01-10 23:41:18'),
(122, 67, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-10 23:50:04', '2022-01-10 23:50:04'),
(123, 67, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-10 23:50:04', '2022-01-10 23:50:04'),
(124, 68, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-11 00:07:14', '2022-01-11 00:07:14'),
(125, 68, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-11 00:07:14', '2022-01-11 00:07:14'),
(126, 69, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-11 01:59:02', '2022-01-11 01:59:02'),
(127, 69, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-11 01:59:02', '2022-01-11 01:59:02'),
(128, 70, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-11 02:02:16', '2022-01-11 02:02:16'),
(129, 70, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-11 02:02:16', '2022-01-11 02:02:16'),
(130, 71, 2, 14, 2, 25.00, 50.00, 'pending', '2022-01-11 02:18:58', '2022-01-11 02:18:58'),
(131, 71, 2, 10, 1, 250.00, 250.00, 'pending', '2022-01-11 02:18:58', '2022-01-11 02:18:58'),
(132, 72, 2, 14, 1, 25.00, 25.00, 'pending', '2022-01-11 05:23:01', '2022-01-11 05:23:01'),
(133, 73, 2, 14, 1, 25.00, 25.00, 'pending', '2022-01-11 05:26:45', '2022-01-11 05:26:45'),
(134, 74, 2, 14, 1, 25.00, 25.00, 'pending', '2022-01-11 05:30:59', '2022-01-11 05:30:59'),
(135, 75, 2, 14, 1, 25.00, 25.00, 'pending', '2022-01-13 03:50:15', '2022-01-13 03:50:15'),
(136, 76, 2, 14, 1, 25.00, 25.00, 'pending', '2022-01-13 05:51:46', '2022-01-13 05:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `discounted_price` double(8,2) NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `shop_id`, `product_name`, `image`, `price`, `discount`, `discounted_price`, `short_des`, `long_des`, `status`, `created_at`, `updated_at`) VALUES
(10, 20, 12, 2, 'Levistic', 'category/images/product_image/61d41b0ccb59b.jpg', 250.00, 0, 250.00, 'This is levistic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-01-04 04:01:48', '2022-01-04 04:01:48'),
(11, 18, 11, 4, 'Napa Extend', 'category/images/product_image/61da750c7d147.jpg', 255.00, 0, 255.00, 'This is napa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-01-08 23:39:24', '2022-01-08 23:39:24'),
(12, 18, 11, 4, 'ACE Plus', 'category/images/product_image/61da75e368b9a.jpg', 555.00, 0, 555.00, 'This is pills', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-01-08 23:42:59', '2022-01-08 23:42:59'),
(13, 21, 10, 5, 'Him Sagor', 'category/images/product_image/61da774044961.jpg', 655.00, 0, 655.00, 'This is Bonolota', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-01-08 23:48:48', '2022-01-08 23:48:48'),
(14, 17, 9, 2, 'Tomato', 'category/images/product_image/61da77ff6f045.jpg', 25.00, 0, 25.00, 'This is Tomato', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-01-08 23:51:59', '2022-01-08 23:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `set_locations`
--

CREATE TABLE `set_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) NOT NULL,
  `sub_area_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_locations`
--

INSERT INTO `set_locations` (`id`, `area_id`, `sub_area_name`, `delivery_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kumira subarea 1', 25.00, '2022-01-08 05:23:19', '2022-01-08 05:23:19'),
(3, 1, 'Kumira subarea 2', 20.00, '2022-01-08 22:47:45', '2022-01-08 22:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `shopkeepers`
--

CREATE TABLE `shopkeepers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varified_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopkeepers`
--

INSERT INTO `shopkeepers` (`id`, `name`, `email`, `password`, `phone`, `image`, `status`, `percentage`, `varified_at`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Sakin Bonolota', 'motivationshop@gmail.com', '$2y$10$mKUWr/BaY5Qt4B99MkG2xuGVs.FVRfIILYzHI3Gtui96FGLb1Q0G.', '12345678999', 'shopkeeper/images/61d4084009257.jpg', '0', '0', '2022-01-10 12:59:03', NULL, NULL, NULL, '2022-01-10 06:59:03'),
(4, 'Sani Baba', 'sanibaba@gmail.com', '$2y$10$0EVv36cgS7VjotOk/wTUce7ZnEm6TbrHVPSkMLW8cyh7mtOpnWtIe', '12345678998', 'shopkeeper/images/61da72e99cbe6.jpg', '0', '0', '2022-01-10 12:59:06', NULL, NULL, NULL, '2022-01-10 06:59:06'),
(5, 'Valo Manus', 'valo@gmail.com', '$2y$10$FcovihmBHU58D32H9bShNOloStWquz7/97K2Z2UROG7PKmZ6hYsbW', '12345678948', 'shopkeeper/images/61da73f940c00.jpg', '1', '0', '2022-01-09 05:34:59', NULL, NULL, NULL, '2022-01-08 23:34:59'),
(6, 'Pongda Sakin', 'ponda@gmail.com', '$2y$10$zA0z1VNoOvym7YlkZxHzC.MitzVQlQUxLvv2fwZyZJbTxXpDK9Nvy', '12345678963', 'shopkeeper/images/61da7685162fc.jpg', '1', '0', '2022-01-09 05:45:53', NULL, NULL, NULL, '2022-01-08 23:45:53'),
(9, 'BaBa Mortuxa', 'joybabaamortyuxa@gmail.com', '$2y$10$h9mpUGYl4IqffyW1QSDNwuMHm0aek1xvFurLFE3P/k/.bSFOkcawe', '14789632148', 'shopkeeper/images/61dc2ee126c9d.jpg', '0', '0', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopkeeper_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shopkeeper_id`, `category_id`, `shop_name`, `shop_address`, `shop_description`, `banner`, `shop_phone`, `shop_status`, `created_at`, `updated_at`) VALUES
(2, 3, 17, 'Motivation Shop', 'Pahar Ghor', 'This is a motivatin shop', 'shopkeeper/images/shop/61d408400b0bd.jpg', '12321254602', '0', '2022-01-04 02:41:36', '2022-01-10 06:59:03'),
(3, 4, 19, 'Sani Babar Dorbar', 'Gohin Bon', 'This is  sani babar dorbar', 'shopkeeper/images/shop/61da72e9af6e1.jpg', '12321254605', '0', '2022-01-08 23:30:17', '2022-01-10 06:59:06'),
(4, 5, 17, 'Valo Manus', 'Gohin Jungle', 'This is  bogijogi', 'shopkeeper/images/shop/61da73f942916.jpg', '12321254652', '1', '2022-01-08 23:34:49', '2022-01-08 23:34:59'),
(5, 6, 21, 'Sopno Boy', 'Gohin gorto', 'This is multitheraphy', 'shopkeeper/images/shop/61da768517f33.jpg', '12321254655', '1', '2022-01-08 23:45:41', '2022-01-08 23:45:53'),
(8, 9, 18, 'Baba Mortuxar Dorbar', 'Pahartoli', 'This is mortuxa babar dorbar', 'shopkeeper/images/shop/61dc2ee1289c0.jpg', '12345645610', '0', '2022-01-10 07:04:33', '2022-01-10 07:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `shop_device_tokens`
--

CREATE TABLE `shop_device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_device_tokens`
--

INSERT INTO `shop_device_tokens` (`id`, `shop_id`, `phone`, `device_token`, `created_at`, `updated_at`) VALUES
(1, 2, '12345645610', 'cEJFC5mTq7QbHtdWjJXLw8:APA91bFzMxr9DH30ln3Zl8VDQubtydox7wyjgNQti2nNF9WTFUc1mAcGvUk2T69Dm4bnRZuSnm4m8CtXQ0V4i-MVrDfjb4RnHWxajzphCpT8nbz8CbB45sLAqgeRUwWWVWkrEYqWu2J8', '2022-01-10 07:04:33', '2022-01-10 07:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `shop_images`
--

CREATE TABLE `shop_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `shop_slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_images`
--

INSERT INTO `shop_images` (`id`, `shop_id`, `shop_slider`, `created_at`, `updated_at`) VALUES
(13, 1, 'shopkeeper/images/shop/slider/61d3fea352804.jpg', '2022-01-04 02:00:35', '2022-01-04 02:00:35'),
(14, 1, 'shopkeeper/images/shop/slider/61d3fea36092a.jpg', '2022-01-04 02:00:35', '2022-01-04 02:00:35'),
(15, 1, 'shopkeeper/images/shop/slider/61d3fea361695.png', '2022-01-04 02:00:35', '2022-01-04 02:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `category_id`, `slider`, `status`, `created_at`, `updated_at`) VALUES
(16, 17, 'category/images/slider_image/61d3f4f8a5761.jpg', 1, '2022-01-04 01:18:50', '2022-01-04 01:19:20'),
(17, 17, 'category/images/slider_image/61d3f506895a0.jpg', 1, '2022-01-04 01:18:50', '2022-01-04 01:19:34'),
(18, 17, 'category/images/slider_image/61d3f4ebc3808.jpg', 1, '2022-01-04 01:19:07', '2022-01-04 01:19:07'),
(19, 18, 'category/images/slider_image/61d3f51a1c6d5.jpg', 1, '2022-01-04 01:19:54', '2022-01-04 01:19:54'),
(20, 18, 'category/images/slider_image/61d3f51a1ec05.jpg', 1, '2022-01-04 01:19:54', '2022-01-04 01:19:54'),
(21, 18, 'category/images/slider_image/61d3f51a1fbbe.jpg', 1, '2022-01-04 01:19:54', '2022-01-04 01:19:54'),
(22, 21, 'category/images/slider_image/61d3f52627133.jpg', 1, '2022-01-04 01:20:06', '2022-01-04 01:20:06'),
(23, 21, 'category/images/slider_image/61d3f5262921c.jpg', 1, '2022-01-04 01:20:06', '2022-01-04 01:20:06'),
(24, 21, 'category/images/slider_image/61d3f5262a108.jpg', 1, '2022-01-04 01:20:06', '2022-01-04 01:20:06'),
(25, 19, 'category/images/slider_image/61d3f5312c486.jpg', 1, '2022-01-04 01:20:17', '2022-01-04 01:20:17'),
(26, 19, 'category/images/slider_image/61d3f5312eb52.jpg', 1, '2022-01-04 01:20:17', '2022-01-04 01:20:17'),
(27, 19, 'category/images/slider_image/61d3f5312f9df.jpg', 1, '2022-01-04 01:20:17', '2022-01-04 01:20:17'),
(28, 20, 'category/images/slider_image/61d3f53a21ceb.jpg', 1, '2022-01-04 01:20:26', '2022-01-04 01:20:26'),
(29, 20, 'category/images/slider_image/61d3f53a24163.jpg', 1, '2022-01-04 01:20:26', '2022-01-04 01:20:26'),
(30, 20, 'category/images/slider_image/61d3f53a25228.png', 1, '2022-01-04 01:20:26', '2022-01-04 01:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `sub_category_name`, `sub_category_image`, `status`, `created_at`, `updated_at`) VALUES
(9, 17, 'Vegitable', 'category/images/sub_category_image/61d3ef94160bd.jpg', 1, '2022-01-04 00:56:20', '2022-01-04 00:56:20'),
(10, 21, 'Mango', 'category/images/sub_category_image/61d3efabf3bcb.jpg', 1, '2022-01-04 00:56:44', '2022-01-04 00:56:44'),
(11, 18, 'Pills', 'category/images/sub_category_image/61d3f1b46a9f7.jpg', 1, '2022-01-04 01:05:24', '2022-01-04 01:05:24'),
(12, 20, 'Cusmetics', 'category/images/sub_category_image/61d3f201341a1.jpg', 1, '2022-01-04 01:06:41', '2022-01-04 01:06:41'),
(13, 19, 'Plastic', 'category/images/sub_category_image/61d3f27306964.jpg', 1, '2022-01-04 01:08:35', '2022-01-04 01:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verified_at`, `password`, `phone`, `image`, `status`, `code`, `billing_address`, `billing_phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, '01731107731', NULL, NULL, '672522', 'SHitakundo', '01623036654', NULL, '2022-01-13 05:48:18', '2022-01-13 05:51:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_locations`
--
ALTER TABLE `set_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shopkeepers_email_unique` (`email`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_device_tokens`
--
ALTER TABLE `shop_device_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_images`
--
ALTER TABLE `shop_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `set_locations`
--
ALTER TABLE `set_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopkeepers`
--
ALTER TABLE `shopkeepers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shop_device_tokens`
--
ALTER TABLE `shop_device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
