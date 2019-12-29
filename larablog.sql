-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2019 at 11:42 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'News', '2019-06-26 19:00:00', '2019-06-26 13:00:00'),
(2, 'Help', '2019-06-26 12:00:00', '2019-06-26 13:00:00'),
(3, 'Web Site', '2019-06-26 19:00:00', '2019-06-26 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(22, 'Admin', 'admin@madeup.domain.co.nz', 'Great work me!!!', 1, 98, '2019-12-29 10:40:44', '2019-12-29 10:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('text','html','file') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `type`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'text', 'title', 'Lara-Blog', 'Title or name of the app', '2019-12-26 11:00:00', '2019-12-29 10:26:54'),
(2, 'text', 'blurb', 'This is a fake blog with fake movie reviews of fake movies. Built for demo purposes.', 'Main blurb shown on the home page', '2019-12-26 11:00:00', '2019-12-29 10:26:45'),
(3, 'file', 'hero_img', 'Hihi_rocks.jpg', 'Image for the homepage hero banner. Relative to /images/files/', '2019-12-26 11:00:00', '2019-12-27 12:21:01'),
(4, 'text', 'copyright', '© Copyright 2020 - All rights reserved', 'Copyright text for the footer', '2019-12-26 11:00:00', '2019-12-27 10:54:45'),
(5, 'html', 'about_content', '<p>\r\nThis blog was built on the Laravel framework, as a demo in 2019.\r\n<br>\r\nI decided to use this for a real blog online, and have been adding functionality as needed.\r\n<br>\r\nThe blog you are currently looking at is a fake blog. \r\nThe code and install instructions for this blog are available \r\n@ the <a href=\"https://github.com/sirjeff/larablog\" target=\"_blank\">SirJeff GitHub</a>\r\n<br>\r\nPlease use the contact form if you have any questions, ideas or just wanna jibber jabber.\r\n</p>', 'HTML content for the About page', '2019-12-27 11:00:00', '2019-12-27 22:12:22'),
(6, 'text', 'email_to', 'your_email_address@blah-de-blah.com.au.uk.ru.nz', 'Email address that the contact form will send to', '2019-12-28 11:00:00', '2019-12-29 10:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_26_021023_create_posts_table', 1),
(4, '2019_06_27_061736_create_categories_table', 2),
(5, '2019_06_27_062224_adddd_category_id_to_posts', 3),
(6, '2019_06_27_105923_create_tags_table', 4),
(7, '2019_06_27_110554_create_post_tag_table', 5),
(8, '2019_06_27_232712_create_comments_table', 6),
(9, '2019_07_02_171148_add_image_col_to_posts', 7),
(10, '2019_12_27_032010_create_config_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `sticky` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `summary`, `slug`, `image`, `video`, `video_sub`, `category_id`, `user_id`, `sticky`, `featured`, `created_at`, `updated_at`) VALUES
(85, 'SkullPen + Ball', '<p>This is just a video upload test. You can add a video over the main image with this blog.</p>\r\n<p>Videos must be the correct format for web, otherwise they may not upload (server dependant) or might not even play.</p>\r\n<p>Oh and you can upload a subtitles file too.</p>', '<p>Test showing the video feature. Excellent!</p>', 'SkullPen-Ball', '1577597264-SkullPen-Ball.jpg', '1577597483-SkullPen-Ball.mp4', '1577597571-SkullPen-Ball.vtt', 1, 1, 0, 0, '2019-12-28 10:52:14', '2019-12-28 16:32:51'),
(96, 'Just a normal post', '<p>A post with words in it. How is this even possible?</p>\r\n<p>Lol yeah just adding some content to make this blog look more legit yo.</p>', '<p>A post with words in it. How is this even possible?</p>', 'Just-a-normal-post', '1577661262-Just-a-normal-post.jpg', NULL, NULL, 1, 1, 0, 0, '2019-12-29 10:14:22', '2019-12-29 10:14:22'),
(97, 'Tea Light or T-Light?', '<p>These are little candles, called tea lights. Or maybe it\'s tealight, or the American spelling ... tea-lite?</p>\r\n<p>Oh they could be called t-lights? Anyway the point is that they\'re candles yeah? Where does the \'<em>tea</em>\' come in?</p>\r\n<p>I have seen the name t-candle before ... that makes more sense, but they\'re not even \'T\' shaped are they?</p>', '<p>These are little candles, called tea lights.</p>', 'Tea-Light-or-T-Light', '1577661569-Tea-Light-or-T-Light.jpg', NULL, NULL, 2, 1, 0, 0, '2019-12-29 10:19:29', '2019-12-29 10:19:29'),
(98, 'Swimming pool...', '<h2>Blog infos....</h2>\r\n<p>Just some quick info on this blog.</p>\r\n<p>The admin user name is <strong>admin@madeup.domain.co.nz </strong>and the password is <em><strong>password</strong></em></p>\r\n<p>There will be more features added in the near future and a bit of prettying up (is that a word?)</p><p>\r\n<img src=\"../../images/content/p00L2.png\" alt=\"This is a golden pool\">\r\nCaption goes here...\r\n\r\n</p>\r\n\r\n<p>Anyways yeah still some ways to go, but at the moment this is a fully working blog with limited features. Getting there but :)</p>\r\n<p>Please come back to my <a href=\"https://github.com/sirjeff/larablog\">GitHub page</a> often and check out what\'s new and what\'s changed!</p>\r\n<p> </p>', '<p>Blog information within....</p>', 'Swimming-pool', '1577661780-Swimming-pool.png', NULL, NULL, 3, 1, 0, 0, '2019-12-29 10:23:01', '2019-12-29 10:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_post_id_foreign` (`post_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(105, 98, 6),
(92, 85, 10),
(91, 85, 6),
(90, 85, 3),
(104, 97, 10),
(103, 96, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Trolls', '2019-06-26 12:00:00', '2019-06-26 13:00:00'),
(6, 'Fish', '2019-06-26 12:00:00', '2019-06-26 13:00:00'),
(10, 'Things', '2019-06-26 12:00:00', '2019-06-26 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@madeup.domain.co.nz', 1, '$2y$10$D4627im2fOBUgbjzdu3NrO78uRIt74iLkPWJb1y2vnPk8o0LTUcUK', 'HQBItwpmU4bBXGEZmy7UhbZFteaMjmETobQ9AYgf30mxbzpm528mK3ksYq8A', '2019-06-26 12:00:00', '2019-06-26 13:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
