-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 05:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_folmool`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `city`, `postal_code`, `zone`, `created_at`, `updated_at`) VALUES
(1, 5, 'dhaka,khilkhet', 'dhaka', 1229, 'nikunja', '2020-07-16 21:47:17', '2020-07-16 21:47:17'),
(2, 5, 'dhaka,khilkhet', 'rangpur', 1230, 'nikunja', '2020-07-16 21:47:17', '2020-07-16 21:47:17'),
(3, 5, 'dhaka,khilkhet', 'dhaka', 1229, 'nikunja', '2020-07-16 21:47:17', '2020-07-16 21:47:17'),
(4, 5, 'dhaka,khilkhet', 'lalmonirhat', 1229, 'nikunja', '2020-07-16 21:47:17', '2020-07-16 21:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_avalible` tinyint(1) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `is_avalible`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'fruit', 'its good product', 1, '2020/07/images/1594913511-5f1072e7f1ac5.jpg', '2020-07-16 21:31:52', '2020-07-16 21:31:52'),
(2, 'apple', 'its good product', 1, '2020/07/images/1594913695-5f10739f26075.jpg', '2020-07-16 21:34:55', '2020-07-16 21:34:55'),
(3, 'mango', 'its good product', 1, '2020/07/images/1594913703-5f1073a7ba6c2.jpg', '2020-07-16 21:35:03', '2020-07-16 21:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemcategories`
--

CREATE TABLE `itemcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemcategories`
--

INSERT INTO `itemcategories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'amrupali', '2020-07-16 21:44:07', '2020-07-16 21:44:07'),
(2, 'mango', '2020-07-16 21:44:34', '2020-07-16 21:44:34'),
(3, 'banana', '2020-07-16 21:44:54', '2020-07-16 21:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` int(11) NOT NULL,
  `new_price` int(11) NOT NULL,
  `is_avaliable` tinyint(1) NOT NULL,
  `is_in_stock` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_id`, `item_category_id`, `details`, `old_price`, `new_price`, `is_avaliable`, `is_in_stock`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', 150, 250, 1, 1, '2020-07-16 21:46:06', '2020-07-16 21:46:06'),
(2, 2, 2, '1', 150, 250, 1, 1, '2020-07-16 21:46:14', '2020-07-16 21:46:14'),
(3, 2, 2, '1', 150, 250, 1, 1, '2020-07-16 21:46:14', '2020-07-16 21:46:14');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_07_02_034227_create_categories_table', 1),
(9, '2020_07_02_072219_create_product_classes_table', 1),
(10, '2020_07_02_084600_create_products_table', 1),
(11, '2020_07_02_101607_create_itemcategories_table', 1),
(12, '2020_07_02_104812_create_items_table', 1),
(13, '2020_07_02_111534_create_product_images_table', 1),
(14, '2020_07_07_070349_create_payments_table', 1),
(15, '2020_07_07_092345_create_orders_table', 1),
(16, '2020_07_07_092648_create_shipments_table', 1),
(17, '2020_07_07_110015_create_order_items_table', 1),
(18, '2020_07_14_172603_create_referral_codes_table', 1),
(19, '2020_07_14_174257_create_addresses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1671fc61e4704f64d85dabfca92a262fbbfb91eeec94ad7bafedd3cce1bb237cb882b54e7889cb8f', 4, 1, 'authToken', '[]', 0, '2020-07-16 21:28:32', '2020-07-16 21:28:32', '2021-07-16 15:28:32'),
('2e484685165b72e238d2af1979f71af070350003aaf2d8622ebde936b6818646591820695064af11', 4, 1, 'authToken', '[]', 0, '2020-07-16 21:33:29', '2020-07-16 21:33:29', '2021-07-16 15:33:29'),
('47135ab69eea8ed473864ee5fd99c62b1eaf3c273eb3c229faec06713acd87bd1c7bc041d8e2fef5', 4, 1, 'authToken', '[]', 1, '2020-07-16 21:32:59', '2020-07-16 21:32:59', '2021-07-16 15:32:59'),
('7b8cc18f228fef1d099b033c8e236d0b3af92fd1ba3c95ffacd891d789a908d04281af963ccee019', 5, 1, 'authToken', '[]', 0, '2020-07-19 17:21:50', '2020-07-19 17:21:50', '2021-07-19 11:21:50'),
('90b962b79bd69e71ba456d66e44d4f6f505d08fd36b661ecdfb912da2173227566d57c0b2931c61d', 5, 1, 'authToken', '[]', 0, '2020-07-19 17:20:13', '2020-07-19 17:20:13', '2021-07-19 11:20:13'),
('92a1601aa626bcfdc28479af081919ef4f327241fd37ad68ea68bb5e62c483c67898d608f567aef1', 5, 1, 'authToken', '[]', 0, '2020-07-16 21:30:06', '2020-07-16 21:30:06', '2021-07-16 15:30:06'),
('9a363153cc66d44e01288f252d5839b6d700a40a8d78b3715a6caa1b4956c5cdbdaadbcdecb3af60', 5, 1, 'authToken', '[]', 0, '2020-07-16 21:29:31', '2020-07-16 21:29:31', '2021-07-16 15:29:31'),
('a370de92b1755d8733d4d834dd18c25c606f21c7b6d1e4d34fe8faef625fbc5703ef15aeca7b2df1', 5, 1, 'authToken', '[]', 0, '2020-07-16 21:30:43', '2020-07-16 21:30:43', '2021-07-16 15:30:43'),
('c3724961e939f9ca6a592d8b3a0a031ce60e5fff23a80f969d4fa330732d6a2411b664ac6779a60c', 5, 1, 'authToken', '[]', 1, '2020-07-19 17:19:45', '2020-07-19 17:19:45', '2021-07-19 11:19:45'),
('e38e5849a5edae698ab38469ac8e24704cd9643ff2bd345a6a72cd3c4fe490b49a82b051413bd855', 5, 1, 'authToken', '[]', 0, '2020-07-19 17:21:27', '2020-07-19 17:21:27', '2021-07-19 11:21:27'),
('f7dfafb650d806a26890abcbeac6c6169299182bba17a540c2724a05e910364089999616f91b94c8', 5, 1, 'authToken', '[]', 0, '2020-07-16 21:29:09', '2020-07-16 21:29:09', '2021-07-16 15:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'C7GifoYTelm4BpSkPooemjtb6tKsuOXzAlNItysZ', NULL, 'http://localhost', 1, 0, 0, '2020-07-16 21:27:58', '2020-07-16 21:27:58'),
(2, NULL, 'Laravel Password Grant Client', 'g80s6kWN52feqvrtvPyxRw8a8euyi7nC4igAAIuk', 'users', 'http://localhost', 0, 1, 0, '2020-07-16 21:27:58', '2020-07-16 21:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-16 21:27:58', '2020-07-16 21:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `referral_code` int(11) NOT NULL,
  `promo_code` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `shipping_charge` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `shipping_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `payment_id`, `sub_total`, `vat`, `referral_code`, `promo_code`, `discount`, `shipping_charge`, `total`, `delivery_man_id`, `notes`, `shipping_id`, `shipping_date`, `delivery_date`, `status`, `date_time`, `created_at`, `updated_at`) VALUES
(30, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-21', '1', '2020-07-16', '2020-07-18 16:04:51', '2020-07-18 16:04:51'),
(31, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:16:03', '2020-07-18 22:16:03'),
(33, 4, 1, 100, 20, 1, 101, 20, 12570, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:18:21', '2020-07-18 22:18:21'),
(34, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:18:24', '2020-07-18 22:18:24'),
(35, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:18:36', '2020-07-18 22:18:36'),
(36, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:19:40', '2020-07-18 22:19:40'),
(37, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:19:41', '2020-07-18 22:19:41'),
(38, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:19:52', '2020-07-18 22:19:52'),
(39, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:19:53', '2020-07-18 22:19:53'),
(40, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:22:00', '2020-07-18 22:22:00'),
(41, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:22:37', '2020-07-18 22:22:37'),
(42, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:22:38', '2020-07-18 22:22:38'),
(43, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-18', '2020-07-18 22:23:34', '2020-07-18 22:23:34'),
(44, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-18', '2020-07-18 22:23:51', '2020-07-18 22:23:51'),
(45, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-18', '2020-07-18 22:23:52', '2020-07-18 22:23:52'),
(46, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-18', '2020-07-18 22:25:22', '2020-07-18 22:25:22'),
(47, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-18', '2020-07-18 22:26:11', '2020-07-18 22:26:11'),
(48, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-18', '2020-07-18 22:30:22', '2020-07-18 22:30:22'),
(49, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:33:31', '2020-07-18 22:33:31'),
(50, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-16', '2020-07-18 22:34:30', '2020-07-18 22:34:30'),
(51, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:35:46', '2020-07-18 22:35:46'),
(52, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '0', '2020-07-20', '2020-07-18 22:36:06', '2020-07-18 22:36:06'),
(53, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '0', '2020-07-20', '2020-07-18 22:36:09', '2020-07-18 22:36:09'),
(54, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '0', '2020-07-20', '2020-07-18 22:36:10', '2020-07-18 22:36:10'),
(55, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '0', '2020-07-20', '2020-07-18 22:36:33', '2020-07-18 22:36:33'),
(56, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:36:57', '2020-07-18 22:36:57'),
(57, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:37:48', '2020-07-18 22:37:48'),
(58, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:38:11', '2020-07-18 22:38:11'),
(59, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:39:03', '2020-07-18 22:39:03'),
(60, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:39:48', '2020-07-18 22:39:48'),
(61, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 22:39:58', '2020-07-18 22:39:58'),
(62, 4, 1, 100, 20, 1, 101, 20, 120, 1254, 5, 'is good product', 1, '2020-07-16', '2020-07-20', '1', '2020-07-20', '2020-07-18 23:04:07', '2020-07-18 23:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(25, 28, 1, 20, '2020-07-18 14:26:17', '2020-07-18 14:26:17'),
(26, 28, 2, 20, '2020-07-18 14:26:54', '2020-07-18 14:26:54'),
(30, 30, 3, 20, '2020-07-18 16:04:51', '2020-07-18 16:04:51'),
(31, 50, 12, 20, '2020-07-18 22:38:11', '2020-07-18 22:38:11'),
(32, 61, 12, 20, '2020-07-18 22:39:58', '2020-07-18 22:39:58'),
(33, 61, 12, 20, '2020-07-18 23:04:07', '2020-07-18 23:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `payment_status`, `payment_time`, `created_at`, `updated_at`) VALUES
(1, 'bkash', 'paid', '09:49:00', '2020-07-16 21:49:14', '2020-07-16 21:49:14'),
(2, 'rocket', 'unpaid', '09:49:00', '2020-07-16 21:49:28', '2020-07-16 21:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_class_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_avalible` tinyint(1) NOT NULL,
  `is_in_stock` tinyint(1) NOT NULL,
  `avalible_stock` tinyint(1) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_class_id`, `name`, `description`, `is_avalible`, `is_in_stock`, `avalible_stock`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 2, 'himshgor 1', 'its good product', 1, 1, 1, '2020/07/images/1594914168-5f107578d1bf1.jpg', '2020-07-16 21:42:48', '2020-07-16 21:42:48'),
(2, 2, 'lengra two', 'its good product', 1, 1, 1, '2020/07/images/1594914193-5f1075918a5f6.jpg', '2020-07-16 21:43:13', '2020-07-16 21:43:13'),
(3, 1, 'amrupali', 'its good product', 1, 1, 1, '2020/07/images/1594914237-5f1075bdb76af.jpg', '2020-07-16 21:43:57', '2020-07-16 21:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `products_classes`
--

CREATE TABLE `products_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_avalible` tinyint(1) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_in_stock` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_classes`
--

INSERT INTO `products_classes` (`id`, `category_id`, `name`, `description`, `is_avalible`, `thumbnail`, `is_in_stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'himsagor', 'its good product', 1, '2020/07/images/1594913990-5f1074c6a3e08.jpg', 1, '2020-07-16 21:39:50', '2020-07-16 21:39:50'),
(2, 1, 'lengra', 'its good product', 1, '2020/07/images/1594914013-5f1074ddea293.jpg', 1, '2020-07-16 21:40:13', '2020-07-16 21:40:13'),
(3, 2, 'tomato', 'its good product', 1, '2020/07/images/1594914024-5f1074e8575fc.jpg', 1, '2020-07-16 21:40:24', '2020-07-16 21:40:24'),
(4, 2, 'banana', 'its good product', 1, '2020/07/images/1594914040-5f1074f890b78.jpg', 1, '2020-07-16 21:40:40', '2020-07-16 21:40:40'),
(5, 2, 'orange', 'its good product', 1, '2020/07/images/1594914047-5f1074ff955f7.jpg', 1, '2020-07-16 21:40:47', '2020-07-16 21:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_codes`
--

CREATE TABLE `referral_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_id_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_codes`
--

INSERT INTO `referral_codes` (`id`, `title`, `amount`, `code`, `user_id_from`, `user_id_to`, `is_valid`, `created_at`, `updated_at`) VALUES
(1, 'ddasdfdfd', 500, 101, 'dhaka', 'rangpur', 1, '2020-07-16 21:48:25', '2020-07-16 21:48:25'),
(2, 'ddasdfdfd', 500, 101, 'dhaka', 'rangpur', 1, '2020-07-16 21:48:29', '2020-07-16 21:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `order_id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 4, 'arif', 'dhaka', '01635412545', 'arif@gmail.com', '2020-07-18 09:13:03', '2020-07-18 09:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_approval` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin_approval`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Arif', 'arifuzzamanarif42@gmail.com', NULL, '$2y$10$Wqay.cRYFTHq9Ht6fZjq1udtjdSumylLoxZgXMJ1tIsglAi51F4I.', NULL, '2020-07-16 21:28:32', '2020-07-16 21:28:32'),
(5, 'Arif', 'delivery@gmail.com', 1, '$2y$10$Zj1bDkqmNTmdXcfl/k1uTeo2nbae3RqAd7OwKpDC7uIy3uj8UcLly', NULL, '2020-07-16 21:29:09', '2020-07-16 21:29:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemcategories`
--
ALTER TABLE `itemcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_classes`
--
ALTER TABLE `products_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_codes`
--
ALTER TABLE `referral_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemcategories`
--
ALTER TABLE `itemcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_classes`
--
ALTER TABLE `products_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_codes`
--
ALTER TABLE `referral_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
