-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 02:32 PM
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
-- Database: `undangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qdTo9bH6qKXuxi9AMisX97kCAWdMnAcwq20oOLHn', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiek9rbWU2eDloaWJBSzFvMUJUQm9nZXo3MnM4cDRoV0NrVzViR3ZoTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnZpdGF0aW9ucy9mbG9yYWwtdGVtcGxhdGUvZWRpdC9hMzAxODkyNy1mMGU1LTQ2Y2YtYmJlYy1kNjRjOTQ1YTRkMTkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1732878287);

-- --------------------------------------------------------

--
-- Table structure for table `tb_affiliate_withdrawals`
--

CREATE TABLE `tb_affiliate_withdrawals` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `transaction_id_list` text DEFAULT NULL,
  `withdrawal_code` varchar(255) DEFAULT NULL,
  `commission_amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `user_affiliate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_audios`
--

CREATE TABLE `tb_audios` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `audio_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_business_profiles`
--

CREATE TABLE `tb_business_profiles` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `google_maps` text DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_founding_date` date DEFAULT NULL,
  `brand_email` varchar(255) DEFAULT NULL,
  `brand_website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_business_profiles`
--

INSERT INTO `tb_business_profiles` (`id`, `created_at`, `updated_at`, `uuid`, `logo`, `business_name`, `address`, `owner_name`, `about`, `google_maps`, `brand_name`, `brand_founding_date`, `brand_email`, `brand_website`) VALUES
(1, '2024-10-18 16:19:50', '2024-11-03 16:14:24', 'uuid1234', 'image/qxv41L5jDOP9YrBfFcPqwg6fDGA1bEIelJiLtz1r.png', 'Jaman IT', 'Simp. Rimbo Kota Jambi', 'Riki Davidtra', '<p><strong>UndangBae</strong> adalah platform undangan digital yang didirikan oleh Jaman IT pada 23 Oktober 2024. Kami hadir untuk membawa inovasi dalam cara orang merayakan momen spesial mereka. Dengan latar belakang di bidang teknologi dan desain, kami memahami pentingnya memberikan pengalaman yang mulus dan menyenangkan bagi pengguna. Visi kami adalah untuk menciptakan solusi undangan yang praktis, estetis, dan ramah lingkungan. Kami percaya bahwa setiap momen berharga, baik itu pernikahan, ulang tahun, atau acara khusus lainnya, pantas dirayakan dengan cara yang unik dan berarti. Dengan berbagai fitur canggih yang kami tawarkan, termasuk desain kustom, interaktivitas, dan kemudahan pengiriman, kami berkomitmen untuk memberikan pengalaman yang tidak hanya modern tetapi juga sesuai dengan kebutuhan zaman. Kami di Jamundangan percaya bahwa teknologi dapat membantu menyatukan orang-orang, dan kami bersemangat untuk menjadi bagian dari perjalanan spesial Anda.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7976.439948837537!2d103.5518596658181!3d-1.621851021281201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1730092779448!5m2!1sid!2sid\" width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'UndangBae', '2024-10-23', 'undangan.jamanit@gmail.com', 'http://undangbae.site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_closings`
--

CREATE TABLE `tb_closings` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `closing_text` text DEFAULT NULL,
  `closing_greeting` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `username_number` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_contacts`
--

INSERT INTO `tb_contacts` (`id`, `created_at`, `updated_at`, `uuid`, `platform`, `username_number`, `icon`, `url`) VALUES
(1, '2024-10-19 09:26:03', '2024-11-03 16:33:42', '21af80bb-2e09-473c-ad00-7c57e4bae89d', 'Telephone', '+62 853-6763-0090', 'fas fa-phone', 'tel:+6285367630090'),
(2, '2024-10-19 07:14:30', '2024-11-03 16:33:20', '40be40d2-8cfb-4bc4-8f12-43f86cfef3e8', 'Whatsapp', '+62 853-6763-0090', 'fab fa-whatsapp', 'https://wa.me/6285367630090'),
(3, '2024-10-25 06:39:09', '2024-11-03 16:35:56', 'ba83117d-7d58-47f9-8152-5b4e10447612', 'Instagram', 'undangbae_site', 'fab fa-instagram', 'https://www.instagram.com/undangbae_site/'),
(4, '2024-10-19 09:27:39', '2024-10-25 06:50:16', 'df2d9b90-87dd-4ddc-96b6-51a85b81622d', 'Email', 'undangan.jamanit@gmail.com', 'fa fa-envelope', 'mailto:undangan.jamanit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_forms`
--

CREATE TABLE `tb_contact_forms` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_covers`
--

CREATE TABLE `tb_covers` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_events`
--

CREATE TABLE `tb_events` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `event_type_1` varchar(255) DEFAULT NULL,
  `event_date_1` datetime DEFAULT NULL,
  `location_1` varchar(255) DEFAULT NULL,
  `address_1` varchar(500) DEFAULT NULL,
  `map_url_1` text DEFAULT NULL,
  `event_type_2` varchar(255) DEFAULT NULL,
  `event_date_2` datetime DEFAULT NULL,
  `location_2` varchar(255) DEFAULT NULL,
  `address_2` varchar(500) DEFAULT NULL,
  `map_url_2` text DEFAULT NULL,
  `event_type_3` varchar(255) DEFAULT NULL,
  `event_date_3` datetime DEFAULT NULL,
  `location_3` varchar(255) DEFAULT NULL,
  `address_3` varchar(500) DEFAULT NULL,
  `map_url_3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_galleries`
--

CREATE TABLE `tb_galleries` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gifts`
--

CREATE TABLE `tb_gifts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `gift_type_name` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gift_types`
--

CREATE TABLE `tb_gift_types` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `gift_type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gift_types`
--

INSERT INTO `tb_gift_types` (`id`, `created_at`, `updated_at`, `uuid`, `gift_type_name`) VALUES
(1, '2024-10-27 05:39:13', '2024-10-27 05:39:15', 'uuid123', 'Rekening Bank'),
(2, '2024-10-27 05:39:31', '2024-10-27 05:39:34', 'uuid124', 'Pengiriman Paket');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guests`
--

CREATE TABLE `tb_guests` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_invitations`
--

CREATE TABLE `tb_invitations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_love_stories`
--

CREATE TABLE `tb_love_stories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `story` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_accesses`
--

CREATE TABLE `tb_menu_accesses` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `first_menu_id` int(11) DEFAULT NULL,
  `second_menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menu_accesses`
--

INSERT INTO `tb_menu_accesses` (`id`, `created_at`, `updated_at`, `uuid`, `role_id`, `first_menu_id`, `second_menu_id`) VALUES
(507, '2024-11-04 07:26:29', '2024-11-04 07:26:29', 'ef86b681-da49-4350-8693-fa74eccac945', 4, 7, NULL),
(508, '2024-11-04 07:26:29', '2024-11-04 07:26:29', 'be4a6edf-14ae-490b-ad4f-6438224f6865', 4, 1, NULL),
(509, '2024-11-04 07:26:29', '2024-11-04 07:26:29', 'b9658265-b5f0-443b-805d-ea415149a8c7', 4, 25, NULL),
(510, '2024-11-04 07:26:29', '2024-11-04 07:26:29', '5e45edbe-8506-478f-8b9b-78405ecb8e12', 4, 4, NULL),
(579, '2024-11-22 07:32:22', '2024-11-22 07:32:22', 'f5dbabe4-9c2f-4cd8-9c47-996e1e31b0b5', 5, 29, NULL),
(580, '2024-11-22 07:32:22', '2024-11-22 07:32:22', 'cb354969-6d1a-41f6-8862-4d14ea13b94f', 5, 7, NULL),
(581, '2024-11-22 07:32:22', '2024-11-22 07:32:22', '051548d4-63e5-49df-9a77-41651d9da8f7', 5, 1, NULL),
(582, '2024-11-22 07:32:22', '2024-11-22 07:32:22', 'beba291a-8fd4-487c-bb4d-df1a23ceaa14', 5, 25, NULL),
(583, '2024-11-22 07:32:22', '2024-11-22 07:32:22', 'd9fdb156-53c5-4a58-9260-78738725098f', 5, 4, NULL),
(584, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '12ec5c21-4a9b-4015-b6af-7ce40d3c3fe6', 3, 29, NULL),
(585, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'c989e4d4-ac8e-460d-817b-4f93bbc0715a', 3, 24, NULL),
(586, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '7ea62552-9e53-4fd6-b397-26ac6d3fb9d4', 3, 7, NULL),
(587, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'fd375235-5600-415c-8d9b-9b7dc31a7690', 3, 1, NULL),
(588, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'deb3faf9-b9a3-423b-b98a-4adf0dbaab13', 3, 25, NULL),
(589, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'e513cf08-345d-422a-bacd-031bb884fe0e', 3, 3, 4),
(590, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '0dbcd5d6-d637-4e01-ae9e-c7a398b37c32', 3, 3, 20),
(591, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '3768a469-a943-4b4c-b82d-7ab39d40729c', 3, 3, 24),
(592, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'b8a13314-cfc6-4210-ac30-6617268dcfbc', 3, 3, 21),
(593, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '2c503a94-0f72-4ef0-b45e-f204adec009a', 3, 3, 22),
(594, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '97acce68-9c07-4e1e-8013-53e518e581c3', 3, 3, 23),
(595, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'ec42279f-1956-4f0f-b45f-e5b825c09f71', 3, 3, 7),
(596, '2024-11-22 07:32:36', '2024-11-22 07:32:36', '4d2a6ab2-ee87-4f76-b596-8a0476eabf41', 3, 3, 25),
(597, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'e64397a7-3b7b-49e4-8645-9bca6e7e4f7f', 3, 3, 3),
(598, '2024-11-22 07:32:36', '2024-11-22 07:32:36', 'd47bb486-6235-4da1-b62a-fc5b748313fa', 3, 4, NULL),
(599, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '5b71eb60-d3ee-4f4c-ab2c-921a240d4ca0', 1, 29, NULL),
(600, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '995ba076-f002-4689-a160-c91e7191bf0b', 1, 2, 1),
(601, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'cf61ac25-5fe1-431e-8770-d0da86252a9e', 1, 2, 2),
(602, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'fd846054-8114-45df-b1e8-d575a1bfea29', 1, 24, NULL),
(603, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'b3d25688-240f-4c94-b2b6-4908d7ac3b1a', 1, 7, NULL),
(604, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '8e73c3ed-d448-423a-9cf6-809f6d976013', 1, 1, NULL),
(605, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'f7de489e-54cc-41f6-b325-80c24b34c843', 1, 25, NULL),
(606, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '3973d97f-e1ee-401a-9ad2-187ed72f51ba', 1, 3, 4),
(607, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'e3316b5f-feab-4486-9865-44f25f8ffba2', 1, 3, 20),
(608, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '70965197-a3a7-4a86-a632-836e471a0648', 1, 3, 24),
(609, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '7210678e-03f3-4550-a8c7-707ff7d46e5e', 1, 3, 21),
(610, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '006d502b-724e-4215-accd-7071d2a48078', 1, 3, 22),
(611, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'ccc80d8e-720b-4cb8-90d1-c5340f714221', 1, 3, 23),
(612, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'a0237159-3c21-49f8-ac33-58b26a28acb8', 1, 3, 7),
(613, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'ccba931a-6156-4093-a435-10a77c5414d7', 1, 3, 25),
(614, '2024-11-22 07:32:45', '2024-11-22 07:32:45', '47524060-0353-4045-8fb0-f90f9d1cdad5', 1, 3, 3),
(615, '2024-11-22 07:32:45', '2024-11-22 07:32:45', 'af2eba46-d937-48ab-b288-54429663ae97', 1, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_firsts`
--

CREATE TABLE `tb_menu_firsts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `first_menu_name` varchar(255) DEFAULT NULL,
  `first_menu_link` varchar(255) DEFAULT NULL,
  `first_menu_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menu_firsts`
--

INSERT INTO `tb_menu_firsts` (`id`, `created_at`, `updated_at`, `uuid`, `first_menu_name`, `first_menu_link`, `first_menu_icon`) VALUES
(1, '2024-07-27 16:12:20', '2024-07-27 16:13:18', '1', 'Dashboard', 'dashboard', 'fas fa-th'),
(2, '2024-07-04 11:07:14', '2024-10-18 16:47:08', '2', 'Application', '#', 'fas fa-cog'),
(3, '2024-07-01 09:32:11', '2024-07-26 02:56:29', '3', 'Master', '#', 'fas fa-layer-group'),
(4, '2024-10-22 06:03:49', '2024-11-18 14:48:09', '6d3ce7cf-1d9b-4e4f-bced-a526c68508d0', 'Profil', 'profiles', 'fas fa-user'),
(7, '2024-10-22 06:07:30', '2024-10-27 04:28:21', 'a7670535-e806-4b70-a229-2c5585301c4a', 'Daftar Undangan', 'invitations', 'fas fa-envelope'),
(24, '2024-10-28 03:59:05', '2024-10-28 04:01:05', 'a153413d-597f-4359-b67e-944b5a026b68', 'Contact Form', 'contact-forms', 'fas fa-address-card'),
(25, '2024-10-29 09:21:14', '2024-11-21 08:43:20', 'fbe52d7d-1c66-4e84-9e2e-2b2681ef4981', 'Hubungi Kami', 'contact-us', 'fas fa-phone'),
(29, '2024-11-22 07:31:39', '2024-11-22 07:31:39', '982a2aba-6e7c-4852-819e-8b2d69dff6fe', 'Afiliasi', 'affiliates', 'fas fa-handshake');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_seconds`
--

CREATE TABLE `tb_menu_seconds` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `second_menu_name` varchar(255) DEFAULT NULL,
  `second_menu_link` varchar(255) DEFAULT NULL,
  `second_menu_icon` varchar(255) DEFAULT NULL,
  `first_menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menu_seconds`
--

INSERT INTO `tb_menu_seconds` (`id`, `created_at`, `updated_at`, `uuid`, `second_menu_name`, `second_menu_link`, `second_menu_icon`, `first_menu_id`) VALUES
(1, '2024-07-04 11:07:55', '2024-07-04 11:09:41', '1', 'Menu', 'menus', NULL, 2),
(2, '2024-07-04 11:08:23', '2024-10-18 16:48:15', '2', 'Role', 'roles', NULL, 2),
(3, '2024-07-26 02:56:51', '2024-10-18 16:48:24', '3', 'User', 'users', NULL, 3),
(4, '2024-10-22 06:04:51', '2024-10-22 06:04:51', 'e123a76d-4369-4784-9eb2-1c0072c6dfca', 'Business Profile', 'business-profiles/uuid1234/edit', NULL, 3),
(7, '2024-10-22 05:37:54', '2024-10-22 05:37:54', 'd3770b04-a019-4a60-a3b8-4a12d4f2e8e0', 'Template', 'templates', NULL, 3),
(20, '2024-10-23 05:07:27', '2024-10-23 05:07:27', '9ab37dc7-e358-4d4a-a47c-aa261373828b', 'Contact', 'contacts', NULL, 3),
(21, '2024-10-23 05:09:53', '2024-10-23 05:09:53', 'b26095c0-46c2-461c-b6c6-45a5c1fd4ae4', 'Payment Method', 'payment-methods', NULL, 3),
(22, '2024-10-28 04:50:42', '2024-10-28 04:50:42', '3dbd96be-64bd-41aa-9756-b7525e2bef30', 'Service', 'services', NULL, 3),
(23, '2024-10-28 05:24:38', '2024-10-28 05:24:59', '0895a591-cebf-41f5-bfdb-d6816a9dd9a4', 'Setting', 'settings/uuid1234/edit', NULL, 3),
(24, '2024-10-28 05:38:07', '2024-11-22 11:02:50', 'e92002e6-60bd-46e8-b52c-dae9219c2a25', 'Voucher', 'vouchers', NULL, 3),
(25, '2024-11-01 05:39:44', '2024-11-01 05:39:44', 'ab0b59c6-79e5-4141-b263-f9f7a3eb5153', 'Transaction Status', 'transaction-statuses', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_messages`
--

CREATE TABLE `tb_messages` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `presence_confirm` varchar(255) DEFAULT NULL,
  `guest_totals` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment_methods`
--

CREATE TABLE `tb_payment_methods` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_payment_methods`
--

INSERT INTO `tb_payment_methods` (`id`, `created_at`, `updated_at`, `uuid`, `account_name`, `account_number`, `account_holder`) VALUES
(1, '2024-10-22 08:20:25', '2024-10-22 08:20:28', 'uuid123', 'BSI', '09321423', 'Riki David'),
(2, '2024-10-22 08:20:25', '2024-10-22 08:20:28', 'uuid124', 'BRI', '09321423', 'Riki David');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quotes`
--

CREATE TABLE `tb_quotes` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `quote_text` text DEFAULT NULL,
  `background_image_1` varchar(255) DEFAULT NULL,
  `background_image_2` varchar(255) DEFAULT NULL,
  `background_image_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `button_access` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `created_at`, `updated_at`, `uuid`, `role_name`, `button_access`) VALUES
(1, '2024-09-24 12:38:07', '2024-10-18 17:16:09', '459fb0d8-f5ae-4ace-881a-bea5c6982507', 'Owner', 1),
(3, '2024-10-18 17:16:15', '2024-10-18 17:16:15', 'efb502e8-8678-45c4-a7b9-85ddf63e7961', 'Admin', 1),
(4, '2024-10-23 03:28:45', '2024-10-23 03:28:45', '610d7b5e-eb39-4737-a17e-eadd429590b8', 'User', 0),
(5, '2024-11-22 07:30:24', '2024-11-22 07:30:24', '56d7544d-c8d1-4e88-b5e3-9864bafc8bfc', 'Affiliate', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_services`
--

INSERT INTO `tb_services` (`id`, `created_at`, `updated_at`, `uuid`, `icon`, `title`, `description`) VALUES
(1, '2024-10-28 05:04:15', '2024-10-28 05:04:15', 'e0fae3d4-0e9b-4be0-b967-5b608df6b2fd', 'fas fa-heart', 'Desain yang Menarik', 'Kustomisasi undangan Anda dengan desain yang indah.'),
(2, '2024-10-28 05:04:35', '2024-10-28 05:04:35', 'de440008-bb55-4c2c-84fa-9a75542aff71', 'fas fa-paper-plane', 'Pengiriman Digital', 'Kirim undangan Anda secara digital dengan mudah.'),
(3, '2024-10-28 05:04:54', '2024-10-28 05:04:54', '912ecb3a-f7ac-4ad8-afb7-78e3b29597d5', 'fas fa-calendar-check', 'Manajemen Acara', 'Kelola acara Anda dengan mudah.'),
(4, '2024-10-28 05:05:21', '2024-10-28 05:05:21', 'bbb41429-8c56-472a-a31a-a2304277eff4', 'fas fa-cog', 'Kustomisasi Fleksibel', 'Sesuaikan setiap detail undangan Anda sesuai keinginan.'),
(5, '2024-10-28 05:05:52', '2024-10-28 05:05:52', 'ecca0e17-5362-4b98-b38a-3791ee9efc44', 'fas fa-mobile-alt', 'Desain Responsif', 'Tampilan undangan akan menyesuaikan dengan berbagai perangkat, dari desktop hingga ponsel.'),
(6, '2024-10-28 05:06:13', '2024-10-28 05:06:13', 'f1b58c65-a875-4692-a2ce-c7ab6136b595', 'fas fa-video', 'Fitur Streaming', 'Lakukan siaran langsung acara Anda untuk tamu yang tidak dapat hadir.'),
(7, '2024-10-28 05:06:36', '2024-10-28 05:06:36', 'c26f82af-68fd-4066-a5fc-d3380be3b632', 'fas fa-comments', 'Pesan Tamu', 'Tamu dapat meninggalkan pesan dan ucapan langsung melalui platform kami.'),
(8, '2024-10-28 05:06:59', '2024-10-28 05:06:59', 'e5310cea-f272-49e0-a45d-1f8522385332', 'fas fa-images', 'Galeri Foto', 'Tampilkan momen-momen indah melalui galeri foto yang dapat diakses oleh tamu.'),
(9, '2024-10-28 05:07:21', '2024-10-28 05:07:21', '25c07cf6-acdc-4776-a405-abf7ec46414e', 'fas fa-gift', 'Hadiah dari Tamu', 'Tamu dapat memberikan hadiah melalui rekening atau pengiriman paket.'),
(10, '2024-10-28 05:07:41', '2024-10-28 05:07:41', '49552ad6-5abd-4cbb-b684-51d95a173aed', 'fas fa-music', 'Fitur Audio', 'Sediakan lagu-lagu favorit untuk menciptakan suasana yang lebih meriah.'),
(11, '2024-10-28 05:08:02', '2024-10-28 05:08:02', 'b0374090-049e-471f-832e-688348a929bd', 'fas fa-thumbs-up', 'Pengalaman Pengguna yang Luar Biasa', 'Kami fokus pada pengalaman pengguna untuk memastikan kepuasan Anda.'),
(12, '2024-10-28 05:08:22', '2024-10-28 05:08:22', '685a7294-39ba-48bb-a704-eca1b8d41faf', 'fas fa-users', 'Dukungan Pelanggan', 'Kami siap membantu Anda setiap hari mulai pukul 09:00 - 20:00 WIB.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings`
--

CREATE TABLE `tb_settings` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `auth_background` varchar(255) DEFAULT NULL,
  `home_cover_image` varchar(255) DEFAULT NULL,
  `home_cover_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_settings`
--

INSERT INTO `tb_settings` (`id`, `created_at`, `updated_at`, `uuid`, `auth_background`, `home_cover_image`, `home_cover_text`) VALUES
(1, '2024-10-19 11:59:45', '2024-10-29 07:42:45', 'uuid1234', 'image/HQwNnNeSaSLaXayYfqU2trQSRQNOiZrUxGa5mDpg.png', 'image/spm7SpJ3Jd5c78QFyIqfMtV5lr3pzsZER19WVTHc.svg', '<p>&nbsp;\"Selamat datang di dunia undangan digital kami!</p><p>Bergabunglah dengan kami untuk merayakan momen-momen berharga dengan cara yang lebih modern dan mudah.\"</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_streamings`
--

CREATE TABLE `tb_streamings` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `youtube_url_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_templates`
--

CREATE TABLE `tb_templates` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `example_url` text DEFAULT NULL,
  `template_code` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `percent_discount` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `template_type_id` int(11) DEFAULT NULL,
  `publication_status` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_templates`
--

INSERT INTO `tb_templates` (`id`, `created_at`, `updated_at`, `uuid`, `image`, `example_url`, `template_code`, `template_name`, `price`, `percent_discount`, `parameter`, `template_type_id`, `publication_status`, `total_amount`) VALUES
(1, '2024-10-22 05:50:57', '2024-11-22 11:14:59', '9e487f36-b2cf-4d0e-9f6b-4affa8c1b8aa', 'template/35DMbRL8Ep2yfCTynDRWeh002OEdHF9xW69ZQNpT.png', '/invitation-templates/jm-calm/dist/calm-pink.html', 'calm-pink', 'Calm Pink', '80000', '0', 'calm-template', 1, 'Yes', '100000'),
(2, '2024-10-22 05:52:54', '2024-11-22 11:14:53', '9ab0ea3f-b7ce-4800-91d3-3835b84eb2e6', 'template/cE5UfulUiCVCzm39MfNqBhqFoVNEdz2SWUJlVEV9.png', '/invitation-templates/jm-calm/dist/calm-blue.html', 'calm-blue', 'Calm Blue', '80000', '0', 'calm-template', 1, 'Yes', '100000'),
(3, '2024-10-22 05:53:36', '2024-11-22 11:14:46', 'e664fea4-15bf-45a7-b933-c93cffb8e5eb', 'template/Cer0ZL5iXdsXX2zT3MVTewgBc2yn4jhkeO6AJkMj.png', '/invitation-templates/jm-calm/dist/calm-green.html', 'calm-green', 'Calm Green', '80000', '0', 'calm-template', 1, 'Yes', '100000'),
(4, '2024-10-22 05:55:23', '2024-11-22 11:14:39', 'cc472470-632b-4dea-ada2-79b0b96ea05a', 'template/UNn745n14svLVSEiofpBGzqFcuQZlgMqstCbqM7e.png', '/invitation-templates/jm-calm/dist/calm-red.html', 'calm-red', 'Calm Red', '80000', '0', 'calm-template', 1, 'Yes', '100000'),
(5, '2024-10-22 05:56:26', '2024-11-22 11:14:33', 'e76f6fe5-6cb3-4f96-95b0-bfd5edf74f41', 'template/0ZOAnc3zx5dAGtDGu5rW4oaUmGg8Vq2zaD0kAAE6.png', '/invitation-templates/jm-sideright/dist/sideright-golden-brown.html', 'sideright-golden-brown', 'Sideright Golden Brown', '80000', '0', 'sideright-template', 1, 'Yes', '100000'),
(10, '2024-11-18 08:57:41', '2024-11-22 11:14:07', 'e0c478cd-74f0-4ba1-9c81-51aa7be724b6', 'template/1JKmV5qKD4vjk7mYOyKAuuMW7uynv9h3wTD9xavY.png', '/invitation-templates/jm-sideright/dist/sideright-green-tosca.html', 'sideright-green-tosca', 'Sideright Green Tosca', '80000', '0', 'sideright-template', 1, 'Yes', '100000'),
(11, '2024-11-29 07:07:00', '2024-11-29 09:58:38', '61040937-c054-41d9-846b-279ab911f8b5', 'template/Kg3MSs8XTFstxv4YBmsC04EnbDhbWNmvPbMspIwm.png', '/invitation-templates/jm-floral/dist/floral-purple.html', 'floral-purple', 'Floral Purple', '80000', '0', 'floral-template', 1, 'Yes', '100000'),
(12, '2024-11-29 07:08:00', '2024-11-29 09:58:28', 'f8c6d286-8bc0-4adc-8bf8-4cb2d2afe11f', 'template/Ivavcswp6EIJAHXUx2NzELESVC8aYqozAdjHvyp9.png', '/invitation-templates/jm-floral/dist/floral-brown.html', 'floral-brown', 'Floral Brown', '80000', '0', 'floral-template', 1, 'Yes', '100000'),
(13, '2024-11-29 07:08:53', '2024-11-29 09:58:20', 'e0864b09-ee0a-4baf-b760-7d630029118e', 'template/vsZxQjzsKNlpKoRjsXAZUp7z4yO94MLCMQcP72vC.png', '/invitation-templates/jm-floral/dist/floral-golden-brown.html', 'floral-golden-brown', 'Floral Golden Brown', '80000', '0', 'floral-template', 1, 'Yes', '100000'),
(14, '2024-11-29 07:09:41', '2024-11-29 09:58:13', 'cd4346ec-581f-4495-9dd1-e8a74318a9e1', 'template/Nazl432kYCHAepsx3kbR5ty2SASqahu1DmsmCZmb.png', '/invitation-templates/jm-floral/dist/floral-green-cream.html', 'floral-green-cream', 'Floral Green Cream', '80000', '0', 'floral-template', 1, 'Yes', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_template_types`
--

CREATE TABLE `tb_template_types` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `template_type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_template_types`
--

INSERT INTO `tb_template_types` (`id`, `created_at`, `updated_at`, `uuid`, `template_type_name`) VALUES
(1, '2024-10-23 06:42:07', '2024-10-23 06:42:09', 'uuid123', 'UNDANGAN PERNIKAHAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transactions`
--

CREATE TABLE `tb_transactions` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `transaction_code` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `percent_discount` varchar(255) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `voucher_code` varchar(255) DEFAULT NULL,
  `transaction_status_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `invitation_expired_date` date DEFAULT NULL,
  `affiliate_commission` varchar(255) DEFAULT NULL,
  `affiliate_withdrawal_status` varchar(255) DEFAULT NULL,
  `user_affiliate_id` bigint(20) DEFAULT NULL,
  `refund_receipt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction_statuses`
--

CREATE TABLE `tb_transaction_statuses` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `transaction_status_name` varchar(255) DEFAULT NULL,
  `description_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaction_statuses`
--

INSERT INTO `tb_transaction_statuses` (`id`, `created_at`, `updated_at`, `uuid`, `transaction_status_name`, `description_status`) VALUES
(1, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid111', 'Pembayaran Berhasil', 'Pembayaran berhasil. Silakan lengkapi data undangan Anda.'),
(2, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid555', 'Pengembalian Dana', 'Pengembalian dana telah dilakukan.'),
(3, '2024-11-01 05:16:55', '2024-11-01 05:43:32', 'uuid222', 'Menunggu Pembayaran', 'Silakan melakukan pembayaran dan mengirimkan bukti pembayaran.'),
(4, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid333', 'Dalam Proses', 'Pembayaran dalam proses. Harap tunggu karena pembayaran Anda sedang ditinjau oleh admin.'),
(5, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid444', 'Pembayaran Gagal', 'Pembayaran gagal. Silakan periksa kembali bukti pembayaran Anda.'),
(6, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid666', 'Kedaluwarsa', 'Transaksi telah kedaluwarsa.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vouchers`
--

CREATE TABLE `tb_vouchers` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `voucher_code` varchar(255) DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `percent_discount` varchar(255) DEFAULT NULL,
  `affiliate_commission` varchar(255) DEFAULT NULL,
  `user_affiliate_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_vouchers`
--

INSERT INTO `tb_vouchers` (`id`, `created_at`, `updated_at`, `uuid`, `voucher_code`, `expired_date`, `percent_discount`, `affiliate_commission`, `user_affiliate_id`) VALUES
(2, '2024-10-28 05:50:30', '2024-11-23 05:26:46', '6ab45e1a-8902-410b-9e21-ed11f2d62f30', 'UNDANGBAE', '2024-12-31', '20', '15000', 1),
(7, '2024-11-21 11:15:19', '2024-11-23 05:23:58', '2758f1d2-7a13-4fb1-8287-19a726cd1970', 'AFF0001', '2025-04-03', '20', '15000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_wedding_couples`
--

CREATE TABLE `tb_wedding_couples` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) DEFAULT NULL,
  `bride_photo` varchar(255) DEFAULT NULL,
  `bride_full_name` varchar(255) DEFAULT NULL,
  `bride_nickname` varchar(255) DEFAULT NULL,
  `bride_child_number` varchar(255) DEFAULT NULL,
  `bride_mother_name` varchar(255) DEFAULT NULL,
  `bride_father_name` varchar(255) DEFAULT NULL,
  `groom_photo` varchar(255) DEFAULT NULL,
  `groom_full_name` varchar(255) DEFAULT NULL,
  `groom_nickname` varchar(255) DEFAULT NULL,
  `groom_child_number` varchar(255) DEFAULT NULL,
  `groom_mother_name` varchar(255) DEFAULT NULL,
  `groom_father_name` varchar(255) DEFAULT NULL,
  `opening_greeting` text DEFAULT NULL,
  `text_greeting` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nick_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `uuid`, `full_name`, `nick_name`, `role_id`) VALUES
(1, NULL, 'rikidavidtra.2310@gmail.com', '2024-11-01 09:15:11', '$2y$12$k83DHsQnWCT3Guu8aDaV9uDCYhQ0Pt2P/jXGB/SvqpW4cQ5dysHUq', 'mYOJHE0uZn8V6vAfhFIKJBrB5ncPIRcmDl2F8AuUCLqcpABZFA0SQuL0kOYZ', '2024-09-22 04:51:41', '2024-10-30 02:44:20', 'b78bbf63-2424-4aec-9da7-55537062f5e3', 'Riki David', 'Riki', 1),
(3, NULL, 'admin@gmail.com', '2024-11-01 09:15:11', '$2y$12$Hj.o3dni.mofGL3kc5gCZOEyjqlY5.CsL0GXQLxR9Cp5gOWeG.VN6', NULL, '2024-10-23 03:28:12', '2024-10-30 02:43:51', '96b87508-e1d9-4630-8349-db88909a8de7', 'Riki David', 'Riki', 3),
(4, NULL, 'user@gmail.com', '2024-11-01 09:15:11', '$2y$12$v.ylbvOGE9ydoqJiTk.iAubF97U.UQG3hPxmhS1Gs6VLJtD0J.yeq', NULL, '2024-10-29 09:18:58', '2024-10-30 02:43:25', '9113733a-efb6-4912-a04f-f63db698076c', 'Riki David', 'Riki', 4),
(5, NULL, 'affiliate@gmail.com', '2024-11-01 09:15:11', '$2y$12$QtQhVAmkaR35hfJuSnJtxeHuNAHgYCW3V3HP8kwsKl6u2GMCmnCo6', NULL, '2024-11-22 07:34:16', '2024-11-22 07:34:16', 'f39a259d-e6ff-40d0-a77d-6774e6a1775c', 'Riki David', 'Riki', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_affiliate_withdrawals`
--
ALTER TABLE `tb_affiliate_withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_affiliate_transactions_user_affiliate_id` (`user_affiliate_id`);

--
-- Indexes for table `tb_audios`
--
ALTER TABLE `tb_audios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_audios_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_business_profiles`
--
ALTER TABLE `tb_business_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_closings`
--
ALTER TABLE `tb_closings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_closings_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_contact_forms`
--
ALTER TABLE `tb_contact_forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_covers`
--
ALTER TABLE `tb_covers`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_covers_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_events`
--
ALTER TABLE `tb_events`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_events_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_galleries`
--
ALTER TABLE `tb_galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_galleries_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_gifts`
--
ALTER TABLE `tb_gifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_gifts_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_gift_types`
--
ALTER TABLE `tb_gift_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_guests_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_invitations`
--
ALTER TABLE `tb_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_invitations_transaction_id` (`transaction_id`);

--
-- Indexes for table `tb_love_stories`
--
ALTER TABLE `tb_love_stories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_love_stories_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_menu_accesses_role_id` (`role_id`),
  ADD KEY `tb_menu_accesses_second_menu_id` (`second_menu_id`),
  ADD KEY `tb_menu_accesses_first_menu_id` (`first_menu_id`);

--
-- Indexes for table `tb_menu_firsts`
--
ALTER TABLE `tb_menu_firsts`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_menu_seconds_first_menu_id` (`first_menu_id`);

--
-- Indexes for table `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_messages_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_payment_methods`
--
ALTER TABLE `tb_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_quotes`
--
ALTER TABLE `tb_quotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_quotes_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_settings`
--
ALTER TABLE `tb_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_streamings`
--
ALTER TABLE `tb_streamings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_streamings_invitation_id` (`invitation_id`);

--
-- Indexes for table `tb_templates`
--
ALTER TABLE `tb_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_template_types`
--
ALTER TABLE `tb_template_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_transactions_transaction_status_id` (`transaction_status_id`),
  ADD KEY `tb_transactions_template_id` (`template_id`),
  ADD KEY `tb_transactions_user_id` (`user_id`);

--
-- Indexes for table `tb_transaction_statuses`
--
ALTER TABLE `tb_transaction_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_vouchers`
--
ALTER TABLE `tb_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_wedding_couples`
--
ALTER TABLE `tb_wedding_couples`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_wedding_couples_invitation_id` (`invitation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `users_role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_affiliate_withdrawals`
--
ALTER TABLE `tb_affiliate_withdrawals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_audios`
--
ALTER TABLE `tb_audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_business_profiles`
--
ALTER TABLE `tb_business_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_closings`
--
ALTER TABLE `tb_closings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_contact_forms`
--
ALTER TABLE `tb_contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_covers`
--
ALTER TABLE `tb_covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_events`
--
ALTER TABLE `tb_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_galleries`
--
ALTER TABLE `tb_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_gifts`
--
ALTER TABLE `tb_gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gift_types`
--
ALTER TABLE `tb_gift_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_guests`
--
ALTER TABLE `tb_guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_invitations`
--
ALTER TABLE `tb_invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_love_stories`
--
ALTER TABLE `tb_love_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `tb_menu_firsts`
--
ALTER TABLE `tb_menu_firsts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_messages`
--
ALTER TABLE `tb_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_payment_methods`
--
ALTER TABLE `tb_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_quotes`
--
ALTER TABLE `tb_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_settings`
--
ALTER TABLE `tb_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_streamings`
--
ALTER TABLE `tb_streamings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_templates`
--
ALTER TABLE `tb_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_template_types`
--
ALTER TABLE `tb_template_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_transaction_statuses`
--
ALTER TABLE `tb_transaction_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_vouchers`
--
ALTER TABLE `tb_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_wedding_couples`
--
ALTER TABLE `tb_wedding_couples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_affiliate_withdrawals`
--
ALTER TABLE `tb_affiliate_withdrawals`
  ADD CONSTRAINT `tb_affiliate_transactions_user_affiliate_id` FOREIGN KEY (`user_affiliate_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tb_audios`
--
ALTER TABLE `tb_audios`
  ADD CONSTRAINT `tb_audios_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_closings`
--
ALTER TABLE `tb_closings`
  ADD CONSTRAINT `tb_closings_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_covers`
--
ALTER TABLE `tb_covers`
  ADD CONSTRAINT `tb_covers_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_events`
--
ALTER TABLE `tb_events`
  ADD CONSTRAINT `tb_events_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_galleries`
--
ALTER TABLE `tb_galleries`
  ADD CONSTRAINT `tb_galleries_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_gifts`
--
ALTER TABLE `tb_gifts`
  ADD CONSTRAINT `tb_gifts_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD CONSTRAINT `tb_guests_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_invitations`
--
ALTER TABLE `tb_invitations`
  ADD CONSTRAINT `tb_invitations_transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `tb_transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_love_stories`
--
ALTER TABLE `tb_love_stories`
  ADD CONSTRAINT `tb_love_stories_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  ADD CONSTRAINT `tb_menu_accesses_first_menu_id` FOREIGN KEY (`first_menu_id`) REFERENCES `tb_menu_firsts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_menu_accesses_role_id` FOREIGN KEY (`role_id`) REFERENCES `tb_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_menu_accesses_second_menu_id` FOREIGN KEY (`second_menu_id`) REFERENCES `tb_menu_seconds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  ADD CONSTRAINT `tb_menu_seconds_first_menu_id` FOREIGN KEY (`first_menu_id`) REFERENCES `tb_menu_firsts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_messages`
--
ALTER TABLE `tb_messages`
  ADD CONSTRAINT `tb_messages_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_quotes`
--
ALTER TABLE `tb_quotes`
  ADD CONSTRAINT `tb_quotes_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_streamings`
--
ALTER TABLE `tb_streamings`
  ADD CONSTRAINT `tb_streamings_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  ADD CONSTRAINT `tb_transactions_template_id` FOREIGN KEY (`template_id`) REFERENCES `tb_templates` (`id`),
  ADD CONSTRAINT `tb_transactions_transaction_status_id` FOREIGN KEY (`transaction_status_id`) REFERENCES `tb_transaction_statuses` (`id`),
  ADD CONSTRAINT `tb_transactions_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tb_wedding_couples`
--
ALTER TABLE `tb_wedding_couples`
  ADD CONSTRAINT `tb_wedding_couples_invitation_id` FOREIGN KEY (`invitation_id`) REFERENCES `tb_invitations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id` FOREIGN KEY (`role_id`) REFERENCES `tb_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
