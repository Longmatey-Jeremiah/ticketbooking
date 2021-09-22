-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 09:48 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afi`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_tickets`
--

CREATE TABLE `booked_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Action', 'Heavy duty', NULL, '2018-04-19 17:34:02', '2018-04-19 17:34:02'),
(10, 'Comedy', 'Just get your laugh on', NULL, '2018-04-19 18:02:05', '2018-04-19 18:02:05'),
(11, 'Drama', 'all the drama', NULL, '2018-04-19 18:10:08', '2018-04-19 18:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `client_infos`
--

CREATE TABLE `client_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2017_12_24_101520_create_posts_table', 1),
(2, '2018_03_21_011659_create_comments_table', 1),
(3, '2018_03_28_014150_create_notifications_table', 1),
(4, '2018_04_12_002319_create_categories_table', 2),
(5, '2018_04_12_002441_create_movies_table', 2),
(6, '2018_04_12_033436_create_tickets_table', 3),
(7, '2018_04_12_034511_create_ticket_types_table', 4),
(8, '2018_04_15_231357_create_client_infos_table', 5),
(9, '2018_04_16_021053_create_booked_tickets_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'aksdjfk', 'dfksjkdsjdfkj', '3373.jpg', '2018-04-12 13:30:22', '2018-04-12 13:30:22', 2),
(2, 'aksdjfk', 'dfksjkdsjdfkj', '3373.jpg', '2018-04-12 13:32:22', '2018-04-12 13:32:22', 2),
(3, 'Men In Black 3', 'With Smith and Martin Cain finding out that the whole embassy of extra Aliens are a made up comic', 'men.jpg', '2018-04-12 13:44:21', '2018-04-12 13:44:21', 5),
(4, 'strangeer', 'how to survive on an island alone.', 'vlcsnap-error435.png', '2018-04-12 13:46:01', '2018-04-12 13:46:01', 3),
(5, 'Marvel Heros', 'Come see Marvel', 'Agents-of-SHIELD-Ghost-Rider-Confirmation.jpg', '2018-04-12 19:16:34', '2018-04-12 19:16:34', 3),
(6, 'name', 'description', 'vlcsnap-error549.png', '2018-04-14 11:06:48', '2018-04-14 11:06:48', 2),
(7, 'Find Hok', 'This movie is just awesome', 'html_coder_wallpaper_by_guilhermecruz-d30op8g.jpg.a94c0b0df748cce3d91d74aaa5349d53.jpg.63d2bfcabbdbde91daac69f06a0770aa.jpg', '2018-04-17 12:36:01', '2018-04-17 12:36:01', 8),
(9, 'Deadpool 2', 'STORYLINES 3 more  After surviving a near fatal bovine attack, a disfigured cafeteria chef (Wade Wilson) struggles to fulfill his dream of becoming Mayberry\'s hottest bartender while also learning to cope with his lost sense of taste. Searching to regain his spice for life, as well as a flux capacitor, Wade must battle ninjas, the yakuza, and a pack of sexually aggressive canines, as he journeys around the world to discover the importance of family, friendship, and flavor - finding a new taste for adventure and earning the coveted coffee mug title of World\'s Best Lover.', '487426_m1517771434.jpg', '2018-04-19 17:59:37', '2018-04-19 17:59:37', 9),
(10, 'Overboard', 'Overboard focuses on \"Leonardo\" (Eugenio Derbez), a selfish, spoiled, rich playboy from Mexico\'s richest family and \"Kate\" (Anna Faris), a working class single mom of three hired to clean Leonardo\'s luxury yacht. After unjustly firing Kate and refusing to pay her, Leonardo falls overboard when partying too hard and wakes up on the Oregon coast with amnesia. Kate shows up at the hospital and, to get payback, convinces Leonardo he is her husband and puts him to work - for the first time in his life. At first miserable and inept, Leonardo slowly settles in. Eventually he earns the respect of his new \"family\" and co-workers. But, with Leonardo\'s billionaire family hot on their trail and the possibility of his memory returning at any moment, will their new family last or will Leonardo finally put the clues together and leave them for good?', '487957_m1521141967.jpg', '2018-04-19 18:04:25', '2018-04-19 18:04:25', 10),
(11, 'Avengers Infinity Wars', 'The Avengers and their Super Hero allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.', '488741_m1522889808.jpg', '2018-04-19 18:07:51', '2018-04-19 18:07:51', 9),
(12, 'Payback is a mother', 'Gabrielle Union stars as a woman who will stop at nothing to rescue her two children being held hostage in a house designed with impenetrable security. No trap, no trick and especially no man inside can match a mother with a mission when she is determined on Breaking In.', '488034_m1520739929.jpg', '2018-04-19 18:11:15', '2018-04-19 18:11:15', 11),
(13, 'Rampage', 'Primatologist Davis Okoye (Johnson), a man who keeps people at a distance, shares an unshakable bond with George, the extraordinarily intelligent, silverback gorilla who has been in his care since birth. But a rogue genetic experiment gone awry transforms this gentle ape into a raging monster. To make matters worse, it’s soon discovered there are other similarly altered alpha predators. As these newly created monsters tear across North America, destroying everything in their path, Okoye teams with a discredited genetic engineer to secure an antidote, fighting his way through an ever-changing battlefield, not only to halt a global catastrophe but to save the fearsome creature that was once his friend.', '486146_m1510955098.jpg', '2018-04-19 18:18:36', '2018-04-19 18:18:36', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `movie_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_count` int(11) NOT NULL,
  `price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `created_at`, `updated_at`, `movie_id`, `start_time`, `end_time`, `date`, `ticket_count`, `price`) VALUES
(13, '2018-04-19 17:37:26', '2018-04-19 17:37:26', 8, '01:01:00', '01:00:00', '2018-11-05 00:00:00', 20, 30.00),
(14, '2018-04-19 18:00:32', '2018-04-19 18:00:32', 9, '21:00:00', '23:30:00', '2018-05-05 23:00:00', 50, 40.00),
(15, '2018-04-19 18:05:14', '2018-04-19 18:05:14', 10, '20:30:00', '22:30:00', '2018-04-24 23:00:00', 50, 25.00),
(16, '2018-04-19 18:08:50', '2018-04-19 18:08:50', 11, '21:00:00', '23:30:00', '2018-04-26 23:00:00', 50, 50.00),
(17, '2018-04-19 18:12:08', '2018-04-19 18:12:08', 12, '19:00:00', '20:30:00', '2018-05-09 23:00:00', 50, 30.00),
(18, '2018-04-19 18:19:32', '2018-04-19 18:19:32', 13, '22:00:00', '23:30:00', '2018-05-24 00:00:00', 50, 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`, `address`, `city`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sowah Noah', 'sowah@gmail.com', '$2y$10$BtfNAOFhjmksHhF4PGHPEexWAA5CSLNtCt397vsqI/NJDIxcKLOom', NULL, NULL, NULL, NULL, NULL, '2018-04-10 12:43:12', '2018-04-10 12:43:12'),
(2, 'Simeon Nortey', 'simeonnortey@gmail.com', '$2y$10$WMg7bKrRx7oYUeUW.iJxGeatYZ2Ssv6jfRTLb75FuJj0Quuell8.6', 1, 'P.O.Box love street 301', 'Accra', '0268738983', 'zRItH9q6DtWwYYoDQF3VcLglJQmZh75bJn2kzUUCY0x2vpkIkbLlE5wtoHEo', '2018-04-12 11:08:32', '2018-04-15 22:59:31'),
(3, 'test2', 'test2@gmail.com', '$2y$10$qVMImGstW6c21Yp/CF6vh.Vwkij3NoAAEqz43cgMV9sJK1CW5cpzO', 1, NULL, NULL, NULL, 'ekxlj6rah3tbfds5XgLUMlAeoxIO921NaaQWo25z88cn56NLK5EegEZpCqvv', '2018-04-12 12:58:03', '2018-04-12 12:58:03'),
(4, 'Afi Maame', 'afimaamedufie@gmail.com', '$2y$10$VWW22TJabfRKE6DQEM1gk.gXsamFQQyBGjWJr2N1RC/z0doEPNoQm', 1, NULL, NULL, NULL, NULL, '2018-04-12 19:18:47', '2018-04-12 19:18:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_types`
--
ALTER TABLE `ticket_types`
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
-- AUTO_INCREMENT for table `booked_tickets`
--
ALTER TABLE `booked_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
