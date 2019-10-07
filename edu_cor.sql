-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 02:37 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_cor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `center_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` double(8,2) NOT NULL,
  `course_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `customer_id`, `course_id`, `center_name`, `course_name`, `course_price`, `course_level`, `course_image`, `created_at`, `updated_at`) VALUES
(2, 103, 15, 'itworx', 'Python', 400.00, 'intermediate', 'hfewdhuyMKgedXzISXjB.jpg', '2018-12-27 10:46:33', '2018-12-27 10:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `off_doc` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `user_id`, `off_doc`, `created_at`, `updated_at`) VALUES
(39, 77, '0r4ejvTnQZy8XbuqQ9bI.jpg', '2018-08-28 10:21:54', '2018-08-28 10:21:54'),
(40, 77, 'cBQ25CzqRzeFL3ccQtev.jpg', '2018-08-28 10:21:54', '2018-08-28 10:21:54'),
(52, 88, 'XFlimZTlXnuq9PjOQ50i.jpg', '2018-08-29 09:59:33', '2018-08-29 09:59:33'),
(53, 88, 'hfu27vGu84IVDeQ6CZKr.jpg', '2018-08-29 09:59:33', '2018-08-29 09:59:33'),
(57, 90, 'AzXUfgPb5rT6jMHdFg4b.jpg', '2018-08-30 09:29:03', '2018-08-30 09:30:55'),
(58, 90, 'AzXUfgPb5rT6jMHdFg4b.jpg', '2018-08-30 09:29:03', '2018-08-30 09:30:55'),
(59, 92, 'uBiVLmpJxulaI9shdFLi.jpg', '2018-09-09 07:42:18', '2018-09-09 07:42:18'),
(60, 93, 'w9Yq7RIBaEdIly0n2iba.jpg', '2018-09-09 07:43:40', '2018-09-09 07:43:40'),
(61, 93, 'Ia1LKDOuc5Ra16hyVEcJ.jpg', '2018-09-09 07:43:41', '2018-09-09 07:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `major_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_content` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` double(8,2) NOT NULL,
  `course_hours` int(11) NOT NULL,
  `course_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `major_id`, `user_id`, `course_name`, `course_content`, `course_level`, `course_price`, `course_hours`, `course_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(12, 2, 77, 'PHP', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'beginner', 350.00, 30, 'QGyp5R8J43QFC7gwQYV2.jpg', 1, '2018-09-04 06:54:21', '2018-09-04 06:54:21'),
(13, 3, 90, 'Accounting', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'intermediate', 400.00, 40, 'UYRDwcVhTxvkfHPLAmRy.jpg', 1, '2018-09-04 06:55:16', '2018-09-04 06:55:16'),
(14, 3, 77, 'Self Development', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'advanced', 500.00, 50, 'u01VxUl1MDVA1KJttK2D.jpg', 1, '2018-09-04 06:57:35', '2018-09-04 06:57:35'),
(15, 2, 90, 'Python', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'intermediate', 400.00, 60, 'hfewdhuyMKgedXzISXjB.jpg', 1, '2018-09-04 06:58:08', '2018-09-05 09:38:19'),
(16, 4, 77, 'Facebook Marketing Strategies', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'beginner', 250.00, 10, 'FeEejVv6yyKWP4QfuIfd.jpg', 1, '2018-09-05 11:24:46', '2018-09-05 11:24:46'),
(17, 4, 90, 'Ultimate Google AdWords', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'intermediate', 300.00, 15, 'Z2v8JKu7bmHy5FOUuSv4.jpg', 1, '2018-09-05 11:28:22', '2018-09-05 11:28:22'),
(18, 2, 77, 'java', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'intermediate', 200.00, 10, 'b4zB2UCYvDtLNuxvPfy0.png', 1, '2018-09-05 12:45:14', '2018-09-05 12:45:14'),
(19, 3, 90, 'Financial Analyst Course', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'beginner', 150.00, 12, 'R6ImA9o1v0Uatp1qEX3z.jpg', 1, '2018-09-05 12:48:02', '2018-09-05 12:48:02'),
(20, 4, 90, 'SEO Training', 'Chapter 1: Install PHP 5 Apache MySQL on Windows using WampServer\r\nChapter 2: PHP Introduction\r\nChapter 3: Data types\r\nChapter 4: Variables and Constants\r\nChapter 5: Strings, Regular Expressions', 'advanced', 300.00, 22, 'aZiizj2Dm6u1p9SxmkjD.jpg', 1, '2018-09-05 12:51:16', '2018-09-05 12:51:16'),
(21, 2, 90, 'dasdasd', '<p>1-dasdasdas</p>\r\n\r\n<p>2-dasdasdasd</p>\r\n\r\n<p>3-dasdasdasd</p>\r\n\r\n<p>4-dsasdasdas</p>', 'beginner', 333.00, 63, 'NemkoMjhZ6qLkMY9mAac.jpg', 1, '2018-11-14 08:35:05', '2018-11-14 08:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(10) UNSIGNED NOT NULL,
  `major_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `major_name`, `major_desc`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'IT & Programming', 'like: java ,PHP ,C++ , c# , Python', 1, NULL, NULL),
(3, 'Bussiness Managment', 'Accountant Preparing , Bussiness English', 1, NULL, NULL),
(4, 'Markting', 'facebook strategay , Direct markting , sales managment', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_07_101613_create_admins_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2018_08_12_093809_create_majors_table', 3),
(5, '2018_08_13_114611_create_centers_table', 4),
(6, '2018_08_13_121420_create_trainees_table', 5),
(7, '2018_08_30_131741_create_courses_table', 6),
(8, '2018_09_27_121725_create_sliders_table', 7),
(9, '2018_10_01_101456_create_cards_table', 7),
(10, '2018_10_09_095929_create_payments_table', 7),
(11, '2018_10_09_101504_create_orders_table', 7),
(12, '2018_10_09_102659_create_order_details_table', 8),
(13, '2018_10_11_125132_create_wishlists_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `order_stauts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_code`, `customer_name`, `customer_phone`, `payment_id`, `order_total`, `order_stauts`, `created_at`, `updated_at`) VALUES
(16, '#15421134293', 'hazem ali', '01127648498', 17, 200.00, 'accept', '2018-11-13 10:50:29', '2018-11-13 13:14:14'),
(18, '#15421918950', 'hazem ali', '01127648498', 19, 200.00, 'pinding', '2018-11-14 08:38:15', '2018-11-14 08:38:15'),
(22, '#15421984984', 'sayed ahmed', '01127648498', 23, 1050.00, 'pinding', '2018-11-14 10:28:18', '2018-11-14 13:34:51'),
(23, '#15422859037', 'hazem ali', '01127648498', 24, 350.00, 'pinding', '2018-11-15 10:45:03', '2018-11-15 10:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `center_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `course_id`, `course_name`, `center_name`, `course_level`, `course_image`, `course_price`, `created_at`, `updated_at`) VALUES
(15, 16, 18, 'java', 'Yat', 'intermediate', 'b4zB2UCYvDtLNuxvPfy0.png', 200.00, '2018-11-13 10:50:29', '2018-11-13 10:50:29'),
(17, 18, 18, 'java', 'Yat', 'intermediate', 'b4zB2UCYvDtLNuxvPfy0.png', 200.00, '2018-11-14 08:38:15', '2018-11-14 08:38:15'),
(23, 22, 13, 'Accounting', 'itworx', 'intermediate', 'UYRDwcVhTxvkfHPLAmRy.jpg', 400.00, '2018-11-14 10:28:18', '2018-11-14 10:28:18'),
(24, 22, 12, 'PHP', 'Yat', 'beginner', 'QGyp5R8J43QFC7gwQYV2.jpg', 350.00, '2018-11-14 10:28:18', '2018-11-14 10:28:18'),
(25, 22, 20, 'SEO Training', 'itworx', 'advanced', 'aZiizj2Dm6u1p9SxmkjD.jpg', 300.00, '2018-11-14 10:28:18', '2018-11-14 10:28:18'),
(26, 23, 12, 'PHP', 'Yat', 'beginner', 'QGyp5R8J43QFC7gwQYV2.jpg', 350.00, '2018-11-15 10:45:03', '2018-11-15 10:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_stauts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_stauts`, `created_at`, `updated_at`) VALUES
(1, 'cash deliver', 'pinding', '2018-10-14 10:31:12', '2018-10-14 10:31:12'),
(2, 'cash deliver', 'pinding', '2018-10-14 10:37:26', '2018-10-14 10:37:26'),
(9, 'cash deliver', 'pinding', '2018-10-14 10:45:36', '2018-10-14 10:45:36'),
(10, 'cash deliver', 'pinding', '2018-10-31 08:52:42', '2018-10-31 08:52:42'),
(11, 'cash deliver', 'pinding', '2018-11-05 11:58:51', '2018-11-05 11:58:51'),
(12, 'cash deliver', 'pinding', '2018-11-05 11:59:23', '2018-11-05 11:59:23'),
(13, 'cash deliver', 'pinding', '2018-11-12 12:47:09', '2018-11-12 12:47:09'),
(14, 'cash deliver', 'pinding', '2018-11-12 13:42:55', '2018-11-12 13:42:55'),
(15, 'cash deliver', 'pinding', '2018-11-12 13:52:13', '2018-11-12 13:52:13'),
(16, 'cash deliver', 'pinding', '2018-11-13 10:21:10', '2018-11-13 10:21:10'),
(17, 'cash deliver', 'pinding', '2018-11-13 10:50:29', '2018-11-13 10:50:29'),
(18, 'cash deliver', 'pinding', '2018-11-14 08:36:22', '2018-11-14 08:36:22'),
(19, 'cash deliver', 'pinding', '2018-11-14 08:38:15', '2018-11-14 08:38:15'),
(20, 'cash deliver', 'pinding', '2018-11-14 09:50:35', '2018-11-14 09:50:35'),
(21, 'cash deliver', 'pinding', '2018-11-14 10:15:21', '2018-11-14 10:15:21'),
(22, 'cash deliver', 'pinding', '2018-11-14 10:20:28', '2018-11-14 10:20:28'),
(23, 'cash deliver', 'pinding', '2018-11-14 10:28:18', '2018-11-14 10:28:18'),
(24, 'cash deliver', 'pinding', '2018-11-15 10:45:03', '2018-11-15 10:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(4, 'FRye55OEvP1XpYoYQUeK.jpg', '1', NULL, NULL),
(5, 'cIz252QVfIqKdma0o8Eh.jpg', '1', NULL, NULL),
(6, 'fCTyG4JhbL23zMHxkMpW.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(43, 74, 'under_graduate', '2018-08-28 08:59:42', '2018-09-10 12:06:22'),
(44, 94, 'post_graduate', '2018-09-10 07:30:34', '2018-09-10 07:30:34'),
(45, 95, 'post_graduate', '2018-09-10 07:35:47', '2018-09-10 07:35:47'),
(46, 96, 'under_graduate', '2018-09-10 07:40:45', '2018-09-10 07:40:45'),
(47, 97, 'post_graduate', '2018-09-10 07:45:45', '2018-09-10 07:45:45'),
(48, 100, 'post_graduate', '2018-09-10 08:28:29', '2018-09-10 11:33:09'),
(49, 101, 'post_graduate', '2018-10-14 10:29:26', '2018-10-14 10:29:26'),
(50, 102, 'post_graduate', '2018-11-12 12:35:45', '2018-11-12 12:35:45'),
(51, 103, 'post_graduate', '2018-12-27 10:45:50', '2018-12-27 10:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `city`, `address`, `type`, `image`, `publication_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(74, 'khalaf', 'khalaf@gmail.com', '$2y$10$wiXhYUwSzn1g.13v7u7S6etop3M8V0NnBhWFiSaMCbCt91Vi5a5OS', '01094356579', 'sohag', 'tahta', 'trainee', 'WZNCvrtoPPpR5s738clE.jpg', 1, NULL, '2018-08-28 08:59:42', '2018-09-10 12:06:22'),
(77, 'Yat', 'Yat@gmail.com', '$2y$10$2YxrRTtbsm3fChfqZlPRj.ubyb7SGE3kBsccUHpG8JutE8yuvl5MC', '01127648498', 'cairo', 'naser city', 'center', 'mFwjuDxgigxS5G8BTGbk.gif', 1, NULL, '2018-08-28 10:21:54', '2018-08-28 10:21:54'),
(78, 'admin', 'admin@admin.com', '$2y$10$QA7DQfB9Fd8Z6ih9wmVEW.pCZ5.pvecB1MK0HPfLw1GY6aY1.IPTW', '123456', 'naser', 'cairo', 'admin', 'emad.png', 1, 'b2dsOdAjlQcrMD3AmPs8p2v17B5W1HmDQyJzQ8pZxwdwfGdBupqrskft69rH', '2018-08-28 12:02:56', '2018-08-28 12:02:56'),
(90, 'itworx', 'itworx@gmail.com', '$2y$10$1GwYRhLWDRwFVC5KqFZfdOKEOWr0ZjisvnoCmEnxxrSERpJM5XawS', '01127648498', 'cairo', 'maadi', 'center', 'd0HDRMhomSMQwgKsza4D.jpeg', 1, NULL, '2018-08-30 09:29:03', '2018-08-30 09:30:54'),
(93, 'ITShare', 'IT_Share@gmail.com', '$2y$10$SDJxt51EqkSyF/PtNBgj6OvUedkTWdQ2HOgHq8361XXZ.F1TRuYWS', '01127648498', 'cairo', 'naser city', 'center', 'xOBpc7ogJBgy8aFavUVX.jpg', 1, NULL, '2018-09-09 07:43:40', '2018-09-09 07:43:40'),
(100, 'ragab ali', 'ragab_ali@gmail.com', '$2y$10$QUUgN.k4LpgamCCM2YHEAOi3lWG9pG/M3.uGodoCkKN1taR7w/GGW', '01127648498', 'جيزة', 'هرم', 'trainee', 'b3EBwE1kAngnUqw7KrZk.jpg', 1, NULL, '2018-09-10 08:28:29', '2018-09-10 11:33:09'),
(101, 'sayed ahmed', 'sayed@gmail.com', '$2y$10$VTyH70n.gAs3tmGp.Hm4f.IVFZufM85LVok1BhDFy9Fce.KS8TIrG', '01127648498', 'cairo', 'misr_Elgadida', 'trainee', 'Kyj3UKlgTUX5REEeoItt.jpg', 1, NULL, '2018-10-14 10:29:26', '2018-10-14 10:29:26'),
(102, 'hazem ali', 'hazem@gmail.com', '$2y$10$OiLAso7DHpmnIeHep87de.rA/v9Y7H599Ey0DVQ5isAf38kUsTq6.', '01127648498', 'cairo', 'monib', 'trainee', 'rQAYkSZoYUYFhGwzR0NW.jpg', 1, NULL, '2018-11-12 12:35:45', '2018-11-12 12:35:45'),
(103, 'abdo', 'abdo@gmail.com', '$2y$10$erJaEZfVLjYIcRSZHmeOKel5XfjzLH8RgYbuLikjk8LjRXdhsX6Oi', '01127648498', 'cairo', 'misr_Elgadida', 'trainee', 'DeY8TV7vcp4EY5ccy2x6.jpg', 1, NULL, '2018-12-27 10:45:50', '2018-12-27 10:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wish_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wish_id`, `customer_id`, `center_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 102, 77, 12, '2018-11-15 10:43:10', '2018-11-15 10:43:10'),
(2, 102, 77, 18, '2018-11-15 10:43:28', '2018-11-15 10:43:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wish_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
