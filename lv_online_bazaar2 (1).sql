-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 06:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_online_bazaar2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `image`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Hilal Ahmad', 'https://laravel.com/img/logomark.min.svg', '894849484', 'hilal@gmail.com', '$2y$10$9DqCXl9e1EwFPqt6lyvCFe2GcMdyai8GsQJxR9Jgv8tUedsoKRGZ6', '2023-08-06 23:58:42', '2023-08-06 23:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tags`)),
  `meta_keyword` text NOT NULL,
  `meta_description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asdfasd', 'asdfasd', 1, '2023-08-07 11:22:32', '2023-08-07 11:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'brand/6K7Gf2ECswhnuuokfr3VUSpSTF21heIPyABB6XNe.jpg', 'levis', 'levis', 1, '2023-08-11 13:14:07', '2023-08-11 13:14:07'),
(4, 'brand/WSt3mguqBgijO2f6TMi0FYXSgskKgjShQfWCPJs4.png', 'adidas', 'adidas', 1, '2023-08-11 13:14:21', '2023-08-11 13:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `total`, `sub_total`, `qty`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '400', '400', 1, '2023-08-13 14:34:21', '2023-08-13 14:34:21'),
(2, 2, 3, '400', '1200', 3, '2023-08-23 19:08:24', '2023-08-23 21:18:33'),
(3, 2, 4, '400', '800', 2, '2023-09-02 14:02:42', '2023-09-02 14:03:36'),
(4, 3, 4, '1,573', '1,573', 1, '2023-09-02 14:06:26', '2023-09-02 14:06:26'),
(12, 3, 7, '1,573', '1573', 1, '2023-09-06 01:07:02', '2023-09-06 01:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` longtext NOT NULL,
  `serial` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `meta_keyword`, `meta_description`, `serial`, `status`, `created_at`, `updated_at`) VALUES
(4, 'category/OXqPUDyHDf3xSuUbxCdnFMPVYE6r3yz0WGIH97YC.jpg', 'Women Clothing', 'women-clothing', '[{\"value\":\"Women\"},{\"value\":\"clothing\"},{\"value\":\"cloth\"},{\"value\":\"brand\"}]', 'women clothing', 1, 1, '2023-08-11 13:11:48', '2023-08-11 13:11:48'),
(5, 'category/W1f3JuOS4gU4d0pgpRWvu9i3rkENHnkCJNrtL102.jpg', 'Sports & Entertainment', 'sports-entertainment', '[{\"value\":\"sport\"},{\"value\":\"entertainment\"},{\"value\":\"shorts\"}]', 'Sports & Entertainment', 1, 1, '2023-09-02 11:52:11', '2023-09-02 11:52:11'),
(6, 'category/7u8Dk9NgUE3MkkqtGghcBmK5yWE0HjFBcBG4sSe4.jpg', 'Vehicles & Accessories', 'vehicles-accessories', '[{\"value\":\"vehicles\"},{\"value\":\"accessories\"},{\"value\":\"cars\"},{\"value\":\"dats\"}]', 'Vehicles & Accessories', 1, 1, '2023-09-02 11:52:48', '2023-09-02 11:52:48'),
(7, 'category/S7lYVEdihuvSi1OdtIZ0qKhtZ6Elv9t26pzc2Cyp.jpg', 'Beauty & Personal Care', 'beauty-personal-care', '[{\"value\":\"beauty\"},{\"value\":\"personal\"},{\"value\":\"care\"},{\"value\":\"datascience\"}]', 'Beauty & Personal Care', 1, 1, '2023-09-02 11:53:24', '2023-09-02 11:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `cat_id`, `sub_cat_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 5, 'pajama sets', 'pajama-sets', 1, '2023-08-11 13:12:44', '2023-08-11 13:12:44'),
(3, 4, 5, 'bras', 'bras', 1, '2023-08-11 13:12:55', '2023-08-11 13:12:55'),
(4, 4, 5, 'shapewer', 'shapewer', 1, '2023-08-11 13:13:08', '2023-08-11 13:13:08'),
(5, 7, 8, 'child makeup', 'child-makeup', 1, '2023-09-02 12:00:08', '2023-09-02 12:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2023-08-13 14:32:40', '2023-08-13 14:32:40'),
(2, 2, 3, '2023-08-23 18:23:11', '2023-08-23 18:23:11'),
(3, 3, 7, '2023-09-06 00:09:40', '2023-09-06 00:09:40'),
(4, 2, 7, '2023-09-06 00:09:45', '2023-09-06 00:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `text` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_sites`
--

CREATE TABLE `manage_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`value`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_sites`
--

INSERT INTO `manage_sites` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'media', '{\"logo\":null,\"favicon\":\"media\\/rdnXd1yVQ2rCImLGhA9tILg1ZanpzvJ8paNeQjSt.png\",\"loader\":\"media\\/EX27lSjR0cnlRXfrdGPgOeJ2SLZ4qp8KZV2TScvz.gif\"}', '2023-08-29 13:33:05', '2023-08-30 19:37:50'),
(2, 'basic_setting', '{\"app_name\":\"Pakistan Online Store ( Online Bazaar )\",\"home_page_title\":\"Pakistan Online Store ( Online Bazaar )\"}', '2023-08-29 13:33:05', '2023-08-30 18:39:15'),
(3, 'home_page', '{\"image1\":\"home_page\\/z6gzMRqEGtmY4Q3GB9Gr2RKiDO1dNRhm56PDlpik.jpg\",\"image2\":\"home_page\\/Gp3ogKfZjoaiQfFbOXfMmIU8WZ9GVIcVNSZNdtDx.jpg\",\"title1\":\"Amet earum sunt Nam\",\"title2\":\"Numquam placeat qua\",\"sub_title1\":\"Dolore magni et accu\",\"sub_title2\":\"Qui modi quidem aliq\",\"url1\":\"Quo totam eiusmod ir\",\"url2\":\"Ut dolore aut ipsam\"}', '2023-08-30 18:47:59', '2023-08-30 19:01:34'),
(4, 'home_page', '{\"meta_keyword\":\"$request->meta_keyword\",\"meta_description\":\"$request->meta_description\"}', '2023-08-30 19:43:38', '2023-08-30 19:43:38'),
(5, 'seo', '{\"meta_keyword\":\"[{\\\"value\\\":\\\"asdfasdf\\\"},{\\\"value\\\":\\\"asdfa\\\"},{\\\"value\\\":\\\"sdf\\\"}]\",\"meta_description\":\"asdfasdf\"}', '2023-08-30 19:43:43', '2023-08-30 19:44:43'),
(6, 'footer', '{\"address\":null,\"phone\":\"03179974132\",\"email\":\"hilal.ahmad.developer@gmail.com\",\"copyright\":\"https:\\/\\/localhost:900\",\"facebook\":\"hilal.ahmad.developer@gmail.com\",\"twitter\":\"hilal.ahmad.developer@gmail.com\",\"youtube\":\"hilal.ahmad.developer@gmail.com\",\"linkedin\":\"hilal.ahmad.developer@gmail.com\"}', '2023-08-30 20:02:00', '2023-08-31 13:34:04'),
(11, 'first_three_column', '{\"image1\":\"home_page\\/gIZEzIf3tBewMdUroXLATAsDSjAorwQT4u3AXVeS.jpg\",\"image2\":\"home_page\\/35pza28WZDosBBGsQcP4tkLuiTcxbsw7XCluGtXu.jpg\",\"image3\":\"home_page\\/XCLHBladM8FBp7AJ7lhBs3ItkuS8BC8FaJCkoJx5.jpg\",\"title1\":\"Reprehenderit impedi\",\"title2\":\"Recusandae Do qui l\",\"sub_title1\":\"Perspiciatis odio e\",\"sub_title2\":\"Sit expedita eu fugi\",\"url1\":\"Est consequatur ipsa\",\"title3\":\"Nihil quod unde volu\",\"sub_title3\":\"Magna tempora ipsum\",\"url3\":\"Qui sit aspernatur\",\"url2\":\"Ipsam dolorem nobis\"}', '2023-08-31 13:36:27', '2023-08-31 20:13:04'),
(12, 'second_three_column', '{\"image1\":\"home_page\\/24ywzeBWT9FNTnU8GJcDocvw5oqQfHWks7igcsY6.jpg\",\"image2\":\"home_page\\/GvuKa7bEONKfFL8JTFYsqPxCPsn1xZppwavuTawG.jpg\",\"image3\":\"home_page\\/bDCIOwJxvvmZ5xhODMInVJwLn4RBTuz8mOg8ecN4.jpg\",\"title1\":\"Dolorum sit tempor q\",\"title2\":\"Blanditiis blanditii\",\"sub_title1\":\"Molestiae voluptatem\",\"sub_title2\":\"Quod qui ea eiusmod\",\"url1\":\"Exercitationem quo N\",\"title3\":\"Laboris anim non lab\",\"sub_title3\":\"In sint ex libero qu\",\"url3\":\"Laboriosam eaque et\",\"url2\":\"Molestiae necessitat\"}', '2023-08-31 13:37:00', '2023-08-31 20:13:38'),
(13, 'third_two_column', '{\"image1\":\"home_page\\/h9xJCTzgtLX3R2EztfucaoUChdL8cpmkoI7sv7aI.jpg\",\"image2\":\"home_page\\/7LPR5rRblWawRvBocONUIUTKquvTV2TSnC4NLiCH.jpg\",\"title1\":\"Ut esse dolor corpor\",\"title2\":\"Recusandae Aliquam\",\"sub_title1\":\"Magna ut totam sed e\",\"sub_title2\":\"Est dolor est place\",\"url1\":\"Sed dolore officia v\",\"url2\":\"Sed dolore officia v\"}', '2023-08-31 13:37:34', '2023-08-31 20:23:12'),
(14, 'four_three_column', '{\"image1\":\"$filename1\",\"image2\":\"$filename2\",\"image3\":\"$filename3\",\"title1\":\"$request->title1\",\"title2\":\"$request->title2\",\"sub_title1\":\"$request->sub_title1\",\"sub_title2\":\"$request->sub_title2\",\"url1\":\"$request->url1\",\"title3\":\"$request->title3\",\"sub_title3\":\"$request->sub_title3\",\"url3\":\"$request->url3\",\"url2\":\"$request->url2\"}', '2023-08-31 13:38:17', '2023-08-31 13:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_06_032636_create_admins_table', 1),
(6, '2023_08_06_034116_create_categories_table', 1),
(7, '2023_08_06_035815_create_sub_categories_table', 1),
(8, '2023_08_06_040751_create_child_categories_table', 1),
(9, '2023_08_06_041648_create_brands_table', 1),
(10, '2023_08_06_042245_create_products_table', 1),
(11, '2023_08_06_045831_create_manage_sites_table', 1),
(12, '2023_08_06_052209_create_sliders_table', 1),
(13, '2023_08_06_053046_create_services_table', 1),
(14, '2023_08_06_071702_create_faq_categories_table', 1),
(15, '2023_08_06_072502_create_faqs_table', 1),
(16, '2023_08_06_073005_create_blog_categories_table', 1),
(17, '2023_08_06_073310_create_blogs_table', 1),
(18, '2023_08_06_092028_create_billing_addresses_table', 1),
(19, '2023_08_06_093017_create_shipping_addresses_table', 1),
(20, '2023_08_06_094451_create_wishlists_table', 1),
(21, '2023_08_06_145523_create_compares_table', 1),
(22, '2023_08_06_145726_create_carts_table', 1),
(23, '2023_08_06_155435_create_subscribes_table', 1),
(24, '2023_08_06_162048_create_contacts_table', 1),
(25, '2023_09_05_182525_add_phone_to_billing_addresses', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `featured_image` text NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tags`)),
  `specifications` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`specifications`)),
  `meta_keyword` text NOT NULL,
  `meta_description` longtext NOT NULL,
  `current_price` varchar(255) NOT NULL,
  `previous_price` varchar(255) NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_id` bigint(20) UNSIGNED NOT NULL,
  `child_cat_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `total_stock` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `featured_image`, `images`, `short_description`, `description`, `tags`, `specifications`, `meta_keyword`, `meta_description`, `current_price`, `previous_price`, `cat_id`, `sub_cat_id`, `child_cat_id`, `brand_id`, `total_stock`, `status`, `created_at`, `updated_at`) VALUES
(2, 'New French Elegant White Bubble Sleeve Party Dress Casual A-Line Dresses, Long Sleeve Dresses', 'New-French-Elegant-White-Bubble-Sleeve-Party-Dress-Casual-A-Line-Dresses--Long-Sleeve-Dresses', 'products/ib4CXFgz6rDzJJ658x5Gq35xkICl1NLcBIHGdz7Q.jpg', '[\"products\\/gallery\\/DL1ZIPRHT2qpusPmXSY22IoFllZ67oF3D4lmmLTc.jpg\",\"products\\/gallery\\/YwvRNaQ7FtVLzMTvRlJ4glVQPBc3B7PhbfrlpzbB.jpg\",\"products\\/gallery\\/3HCTNGk5APFtNMZfbaGI8lFvr9F0mApz0dnc39LU.jpg\"]', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less', '<p><span style=\"color: rgb(80, 80, 80); font-size: 15px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span><br></p>', '\"[{\\\"value\\\":\\\"women\\\"},{\\\"value\\\":\\\"dresses\\\"}]\"', 'null', '[{\"value\":\"women\"},{\"value\":\"dresses\"},{\"value\":\"google\"}]', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!', '400', '500', 4, 5, 2, 4, '4', 1, '2023-08-11 13:16:56', '2023-08-11 13:16:56'),
(3, 'UMIDIGI A9 Pro Android Mobile Phone 4g 48MP Quad Camera 6.3\" FHD+ Full Screen 6GB RAM', 'UMIDIGI-A9-Pro-Android-Mobile-Phone-4g-48MP-Quad-Camera-6-3--FHD--Full-Screen-6GB-RAM', 'products/v8OKzfPSeAYBNJ6jh5toFFRxh9YXv66tJisphhlX.jpg', '[\"products\\/gallery\\/DRLGoi4nHaC1GSZtAn1TOd5oL97nqoAuQyYgIFmS.jpg\",\"products\\/gallery\\/1FUczXriCIYoDheeDVt6kf78yG1v9QT6145USCV5.jpg\",\"products\\/gallery\\/lOG635h2ff2qvTsRLHHqWsMTQ14KU1Mb3GPc9mvq.jpg\",\"products\\/gallery\\/4ELRR9p64NGnNakISIUqJR1HCmYBEhqAsCd1Upkr.jpg\"]', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less', '<p><span style=\"color: rgb(80, 80, 80); font-size: 15px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!</span><br></p>', '\"[{\\\"value\\\":\\\"iphone\\\"},{\\\"value\\\":\\\"mobile\\\"},{\\\"value\\\":\\\"infinx\\\"},{\\\"value\\\":\\\"vivo\\\"},{\\\"value\\\":\\\"iphone12\\\"},{\\\"value\\\":\\\"iphone14\\\"}]\"', 'null', '[{\"value\":\"iphone\"},{\"value\":\"mobile\"},{\"value\":\"infinx\"},{\"value\":\"vivo\"},{\"value\":\"iphone12\"},{\"value\":\"iphone14\"}]', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quae illo soluta sapiente minus voluptatibus molestias voluptates maiores repudiandae, velit quaerat error! Dolor alias voluptates rerum vitae illum officiis laboriosam, eos fugiat necessitatibus iste quasi vero porro at asperiores atque numquam adipisci esse perferendis hic dolore dolores facere quidem? Voluptatum, nemo voluptates. Qui, animi odit voluptatem velit nostrum rem maiores. Qui esse magnam enim natus numquam ab adipisci nihil mollitia odio ducimus architecto unde harum saepe illum, ipsa hic dicta alias cumque et minus veritatis assumenda a quo. Possimus, vitae est! Fuga quidem minima sunt modi. Officia natus quaerat nobis ut ab nulla. Tempora, corrupti? Animi excepturi voluptatem quod consectetur culpa autem aliquid? Inventore adipisci officia error dolore provident omnis sint perferendis, consequuntur, sapiente magni sequi quo quis nesciunt molestiae vero iure cum laboriosam fugit. Numquam sed expedita alias non? Sequi, harum cupiditate! Quasi non laboriosam optio ex fugit delectus minus incidunt excepturi! Nisi iure ex, nulla perspiciatis similique est, libero sapiente hic error amet, quisquam vel obcaecati fugit. Maxime cupiditate voluptatibus, nisi ullam error voluptas culpa at animi sequi eius suscipit ad ipsum qui illum provident dolores facere necessitatibus commodi vel in, laborum quidem aliquam ipsa quibusdam? Eius, alias voluptatem, laboriosam perferendis itaque, sapiente nisi beatae necessitatibus reprehenderit nam corrupti magnam qui omnis eveniet! Optio at expedita temporibus fugiat debitis eum? Dolore excepturi quod doloribus quam rem placeat at odit dicta amet expedita illo laboriosam minus ut minima, tenetur suscipit soluta assumenda. Nisi laboriosam adipisci animi consequuntur, ad illum repellat consequatur odit, laudantium velit non nobis labore illo omnis quod suscipit voluptates quaerat consectetur temporibus et, laborum quam ducimus earum! Repellat, fugit? Repudiandae repellendus maiores doloribus deleniti asperiores distinctio suscipit fugiat omnis culpa itaque? Harum et, velit ratione corrupti error asperiores optio, recusandae mollitia necessitatibus cumque vero voluptatem ullam porro aut eum earum! Consectetur voluptatum ratione dolor in earum molestiae ipsam quisquam, eum vitae suscipit voluptates recusandae. Cum eaque officiis ea et atque eveniet similique sequi illo!', '1,573', '1,973.03', 4, 5, 3, 4, '10', 1, '2023-08-23 21:25:28', '2023-08-23 21:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address1` text NOT NULL,
  `address2` text DEFAULT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `url` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `details`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'title', 'hello world', 'http://localhost', 'slider/jtv1giA9TnyQBVpCzXeGf6oFMKkncnPhRmCwzihw.jpg', '2023-08-29 13:22:07', '2023-08-29 13:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 'Women underware', 'women-underware', 1, '2023-08-11 13:12:22', '2023-08-11 13:12:22'),
(6, 7, 'Hair Waves', 'hair-waves', 1, '2023-09-02 11:59:04', '2023-09-02 11:59:04'),
(7, 7, 'Makeup', 'makeup', 1, '2023-09-02 11:59:26', '2023-09-02 11:59:26'),
(8, 7, 'Personal Care', 'personal-care', 1, '2023-09-02 11:59:46', '2023-09-02 11:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kirby', 'Schmidt', 'Kirby Schmidt', 'beto@mailinator.com', '+1 (375) 911-8938', NULL, '$2y$10$geD6CBeaWekW6nTJaQ7I8es5bPggnB3cM5NxdEu6Hn6FpWgxdz7PC', NULL, '2023-08-13 11:07:46', '2023-08-13 11:07:46'),
(2, 'Jeanette', 'Ware', 'Jeanette Ware', 'tekevutu@mailinator.com', '+1 (985) 907-7778', NULL, '$2y$10$Sq0dbOaKcgVSHxixnzbkgub9ezKh81p71yhe6vdaH2TdlAKAPlY2W', NULL, '2023-08-13 13:30:46', '2023-08-13 13:30:46'),
(3, 'Bryar', 'Duffy', 'Bryar Duffy', 'vasevypova@mailinator.com', '+1 (433) 815-3083', NULL, '$2y$10$bcEgPzNCJVwF/7eylad5D.y3wVrWnNNn0tSMxpsJMSAjEpYc6Y30W', NULL, '2023-08-23 18:21:33', '2023-08-23 18:21:33'),
(4, 'Paul', 'Mathis', 'Paul Mathis', 'miky@mailinator.com', '+1 (121) 312-2617', NULL, '$2y$10$MaG8At3ShZUGL23UpNPGceYnAhxc0g/8QqRXkGsnm/VBJns3PwRI2', NULL, '2023-09-02 14:02:15', '2023-09-02 14:02:15'),
(5, 'Audra', 'Mcdonald', 'Audra Mcdonald', 'huqidux@mailinator.com', '+1 (426) 479-4954', NULL, '$2y$10$ZVANbk.1.lZMVHVg55PdQegveDHViXKBClQjkmVOdAMs6fZyDHGbC', NULL, '2023-09-05 21:25:10', '2023-09-05 21:25:10'),
(6, 'Shaeleigh', 'Herrera', 'Shaeleigh Herrera', 'wydyh@mailinator.com', '+1 (474) 569-3455', NULL, '$2y$10$uafl1rGeSGrPDlcgeoSj5u6n.IjXe6j4sgad4KqNk4urFbcK9UQWS', NULL, '2023-09-05 21:25:25', '2023-09-05 21:25:25'),
(7, 'Xenos', 'Hart', 'Xenos Hart', 'sivovol@mailinator.com', '+1 (532) 754-3683', NULL, '$2y$10$mBdO0xDfK.Vji/VlkkHa3ezfo7nWQWCRmMzTr6bYBuSyRaUQlBoAe', NULL, '2023-09-05 23:44:32', '2023-09-05 23:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `categories_slug_unique` (`slug`) USING HASH;

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_categories_name_unique` (`name`),
  ADD UNIQUE KEY `child_categories_slug_unique` (`slug`),
  ADD KEY `child_categories_cat_id_foreign` (`cat_id`),
  ADD KEY `child_categories_sub_cat_id_foreign` (`sub_cat_id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compares_product_id_foreign` (`product_id`),
  ADD KEY `compares_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_categories_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `faq_categories_slug_unique` (`slug`) USING HASH;

--
-- Indexes for table `manage_sites`
--
ALTER TABLE `manage_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `products_slug_unique` (`slug`) USING HASH,
  ADD KEY `products_cat_id_foreign` (`cat_id`),
  ADD KEY `products_sub_cat_id_foreign` (`sub_cat_id`),
  ADD KEY `products_child_cat_id_foreign` (`child_cat_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_name_unique` (`name`),
  ADD KEY `sub_categories_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_sites`
--
ALTER TABLE `manage_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD CONSTRAINT `billing_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `child_categories_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `compares`
--
ALTER TABLE `compares`
  ADD CONSTRAINT `compares_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `faq_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `child_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_cat_id_foreign` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD CONSTRAINT `shipping_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
