-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 05:45 PM
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
-- Database: `jamundangan`
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
('gJDKYoKgYwCaIk3uwNi1P71goIl3rhwmOuaP2EnH', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieGpaZ3NFRE9sU3pMM3QyenRWUk9STnpsaGVsTnRPaG5UcHVKdXlCZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1730479168);

-- --------------------------------------------------------

--
-- Table structure for table `tb_audios`
--

CREATE TABLE `tb_audios` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) NOT NULL,
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
  `logo` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `business_founding_date` date NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `google_maps` text NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_founding_date` date NOT NULL,
  `brand_email` varchar(255) NOT NULL,
  `brand_website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_business_profiles`
--

INSERT INTO `tb_business_profiles` (`id`, `created_at`, `updated_at`, `uuid`, `logo`, `business_name`, `address`, `business_founding_date`, `owner_name`, `about`, `google_maps`, `brand_name`, `brand_founding_date`, `brand_email`, `brand_website`) VALUES
(1, '2024-10-18 16:19:50', '2024-10-31 11:25:27', 'uuid1234', 'image/38donqhZ4Uex7XPNz2lnWG1XIOdrAaTVYV7ZWlXL.png', 'Jaman IT', 'Simp. Rimbo Kota Jambi', '2024-10-23', 'Riki Davidtra', '<p><strong>JamUndangan</strong> adalah platform undangan digital yang didirikan oleh Jaman IT pada 23 Oktober 2024. Kami hadir untuk membawa inovasi dalam cara orang merayakan momen spesial mereka. Dengan latar belakang di bidang teknologi dan desain, kami memahami pentingnya memberikan pengalaman yang mulus dan menyenangkan bagi pengguna. Visi kami adalah untuk menciptakan solusi undangan yang praktis, estetis, dan ramah lingkungan. Kami percaya bahwa setiap momen berharga, baik itu pernikahan, ulang tahun, atau acara khusus lainnya, pantas dirayakan dengan cara yang unik dan berarti. Dengan berbagai fitur canggih yang kami tawarkan, termasuk desain kustom, interaktivitas, dan kemudahan pengiriman, kami berkomitmen untuk memberikan pengalaman yang tidak hanya modern tetapi juga sesuai dengan kebutuhan zaman. Kami di Jamundangan percaya bahwa teknologi dapat membantu menyatukan orang-orang, dan kami bersemangat untuk menjadi bagian dari perjalanan spesial Anda.</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7976.439948837537!2d103.5518596658181!3d-1.621851021281201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1730092779448!5m2!1sid!2sid\" width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'JamUndangan', '2024-10-23', 'undangan.jamanit@gmail.com', 'http://localhost:8000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_closings`
--

CREATE TABLE `tb_closings` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) NOT NULL,
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
  `platform` varchar(255) NOT NULL,
  `username_number` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_contacts`
--

INSERT INTO `tb_contacts` (`id`, `created_at`, `updated_at`, `uuid`, `platform`, `username_number`, `icon`, `url`) VALUES
(1, '2024-10-19 09:26:03', '2024-10-25 06:50:08', '21af80bb-2e09-473c-ad00-7c57e4bae89d', 'Telephone', '+62 895-0847-5453', 'fas fa-phone', 'tel:+6289508475453'),
(2, '2024-10-19 07:14:30', '2024-10-25 06:48:56', '40be40d2-8cfb-4bc4-8f12-43f86cfef3e8', 'Whatsapp', '+62 895-0847-5453', 'fab fa-whatsapp', 'https://wa.me/6289508475453'),
(3, '2024-10-25 06:39:09', '2024-10-25 06:48:38', 'ba83117d-7d58-47f9-8152-5b4e10447612', 'Instagram', 'riki_davidtra', 'fab fa-instagram', 'https://www.instagram.com/riki_davidtra/'),
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
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
  `invitation_id` int(11) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_discounts`
--

CREATE TABLE `tb_discounts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `discount_code` varchar(255) NOT NULL,
  `expired_date` date NOT NULL,
  `percent_discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_discounts`
--

INSERT INTO `tb_discounts` (`id`, `created_at`, `updated_at`, `uuid`, `discount_code`, `expired_date`, `percent_discount`) VALUES
(2, '2024-10-28 05:50:30', '2024-10-28 06:49:40', '6ab45e1a-8902-410b-9e21-ed11f2d62f30', 'JAMUNDANGAN', '2024-12-31', '10'),
(3, '2024-10-28 06:40:50', '2024-10-28 06:49:24', '59097885-a67d-4f91-9a19-6591be62116f', 'NEWYEAR', '2025-01-01', '30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_events`
--

CREATE TABLE `tb_events` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) NOT NULL,
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
  `invitation_id` int(11) NOT NULL,
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
  `invitation_id` int(11) NOT NULL,
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
  `gift_type_name` varchar(255) NOT NULL
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
  `invitation_id` int(11) NOT NULL,
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
  `template_id` int(11) NOT NULL,
  `invitation_code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invitation_status_id` int(11) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_invitation_status`
--

CREATE TABLE `tb_invitation_status` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_status_name` varchar(255) NOT NULL,
  `description_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invitation_status`
--

INSERT INTO `tb_invitation_status` (`id`, `created_at`, `updated_at`, `uuid`, `invitation_status_name`, `description_status`) VALUES
(1, '2024-11-01 05:16:55', '2024-11-01 05:43:32', 'uuid111', 'Tertunda', 'Silakan melakukan pembayaran dan mengirimkan bukti pembayaran.'),
(2, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid222', 'Ditinjau', 'Pembayaran diproses. Harap tunggu karena pembayaran Anda sedang ditinjau oleh admin.'),
(3, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid444', 'Aktif', 'Pembayaran berhasil. Silakan lengkapi data undangan Anda.'),
(4, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid333', 'Ditolak', 'Pembayaran gagal. Silakan periksa kembali bukti pembayaran Anda.'),
(5, '2024-11-01 05:16:55', '2024-11-01 05:16:57', 'uuid555', 'Tidak Aktif', 'Undangan telah dinonaktifkan.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_love_stories`
--

CREATE TABLE `tb_love_stories` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) NOT NULL,
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
(410, '2024-10-29 09:21:37', '2024-10-29 09:21:37', '59951417-26fc-45ca-832a-42739b122578', 4, 7, NULL),
(411, '2024-10-29 09:21:37', '2024-10-29 09:21:37', 'aa7f723e-09fc-41de-85be-830b96af38c7', 4, 1, NULL),
(412, '2024-10-29 09:21:37', '2024-10-29 09:21:37', 'cbf4061a-a2fb-448b-a019-02ac0af3f2d9', 4, 25, NULL),
(413, '2024-10-29 09:21:37', '2024-10-29 09:21:37', 'd776874e-c1b5-4de0-97d2-b592874c4262', 4, 4, NULL),
(457, '2024-11-01 05:40:24', '2024-11-01 05:40:24', '3f5138f0-dc86-4c6b-a323-7699d22e8fb7', 2, 2, 1),
(458, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'b52a2236-606b-43eb-b4ed-dbdc823bdd7a', 2, 2, 2),
(459, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'ddac42fb-4f66-4baa-84ba-96754318c850', 2, 24, NULL),
(460, '2024-11-01 05:40:24', '2024-11-01 05:40:24', '5308223d-3a5d-433f-8012-d43b97763209', 2, 7, NULL),
(461, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'cd8513b1-fa50-4191-b0cb-d44c6e9a70b6', 2, 1, NULL),
(462, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'ca84e3bf-528a-4242-a3c1-a66fcbdbcd94', 2, 25, NULL),
(463, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'e9b2c28b-588d-445e-8c5d-44a18a02d2d0', 2, 3, 4),
(464, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'e10b5854-b4ab-4882-a8ca-1308a0eec114', 2, 3, 20),
(465, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'a9bdc10e-0705-4c11-99aa-98d583bf5685', 2, 3, 24),
(466, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'd1a3d1f6-a0b7-43a5-a657-cc5dca56645d', 2, 3, 25),
(467, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'a506bd9f-a384-4afa-ba08-ffcf144f42dc', 2, 3, 21),
(468, '2024-11-01 05:40:24', '2024-11-01 05:40:24', '6e2cde43-c9e2-42eb-b848-b41b8c9aa4fe', 2, 3, 22),
(469, '2024-11-01 05:40:24', '2024-11-01 05:40:24', '248df489-8f7f-460b-9de5-9c62d46089e3', 2, 3, 23),
(470, '2024-11-01 05:40:24', '2024-11-01 05:40:24', 'c7193181-1cc2-4689-8f07-4feea94d0f8b', 2, 3, 7),
(471, '2024-11-01 05:40:24', '2024-11-01 05:40:24', '28fd24dd-924b-4472-b5ae-738bd46ec4fa', 2, 3, 3),
(472, '2024-11-01 05:40:24', '2024-11-01 05:40:24', '1a9bb3d4-b00b-4e11-8df6-a7c45dca58b4', 2, 4, NULL),
(473, '2024-11-01 05:40:46', '2024-11-01 05:40:46', 'eca92476-e6a7-4604-aee9-a531f32770e3', 1, 2, 1),
(474, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '5bb0ee02-f08d-40ad-8290-1c2778634262', 1, 2, 2),
(475, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '8f22f87c-e652-4d09-a12e-41d50177d9a8', 1, 24, NULL),
(476, '2024-11-01 05:40:46', '2024-11-01 05:40:46', 'ffcee8e2-41de-48ab-8560-121816053c17', 1, 7, NULL),
(477, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '51a40226-2923-49ab-8422-b003bde047fb', 1, 1, NULL),
(478, '2024-11-01 05:40:46', '2024-11-01 05:40:46', 'e6550901-2fae-4400-8fe4-5054ba293294', 1, 25, NULL),
(479, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '5d937652-7cd5-4be6-bfb6-bd1a1a987e20', 1, 3, 4),
(480, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '5974da1f-d1a7-48c1-ab06-9e997d1c520f', 1, 3, 20),
(481, '2024-11-01 05:40:46', '2024-11-01 05:40:46', 'dac7d229-3e3e-4785-a5b8-f25f3bcaf79e', 1, 3, 24),
(482, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '39247697-5c49-43fc-bf33-50e7c5ee0229', 1, 3, 25),
(483, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '1f3bad45-7142-4022-936b-3313a0d60cfa', 1, 3, 21),
(484, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '5708ae4e-0036-46f6-859c-03cc789d2234', 1, 3, 22),
(485, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '4a1994cf-25a7-4284-8076-e1d0b85fd2e8', 1, 3, 23),
(486, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '0dbab3a8-313e-4008-8863-ad73c57cc9a7', 1, 3, 7),
(487, '2024-11-01 05:40:46', '2024-11-01 05:40:46', '9bbb01d1-2908-4bff-a0bc-9e0d091f6e18', 1, 3, 3),
(488, '2024-11-01 05:40:46', '2024-11-01 05:40:46', 'd948cde7-81f8-4567-aa3e-839d3732fd4e', 1, 4, NULL),
(489, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '14216f14-516f-49d3-bb27-e1554764f816', 3, 24, NULL),
(490, '2024-11-01 05:40:56', '2024-11-01 05:40:56', 'c895d2b6-229a-48fd-886f-571a22fca254', 3, 7, NULL),
(491, '2024-11-01 05:40:56', '2024-11-01 05:40:56', 'df51049a-57c4-4799-b5d6-ac4c4510d918', 3, 1, NULL),
(492, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '575d7283-cb6f-4a37-8869-565cb00f9987', 3, 25, NULL),
(493, '2024-11-01 05:40:56', '2024-11-01 05:40:56', 'f8bd0f3d-d229-4ce9-9bd8-6138ab534c3a', 3, 3, 4),
(494, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '8444b5d9-e167-42e8-9b97-791bfa25b466', 3, 3, 20),
(495, '2024-11-01 05:40:56', '2024-11-01 05:40:56', 'c768f917-0f97-4324-9ee9-d5228f6d7637', 3, 3, 24),
(496, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '58b87fcd-94d7-41da-9a43-c93aaa00024d', 3, 3, 25),
(497, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '29f727cb-3cf0-4d51-b1ca-044e321eb4d8', 3, 3, 21),
(498, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '84b18a1f-9733-4c7a-af2b-1f077051eb7d', 3, 3, 22),
(499, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '8c0d9426-53f0-4268-8e47-7f1454f0f8a1', 3, 3, 23),
(500, '2024-11-01 05:40:56', '2024-11-01 05:40:56', '6cc00e96-803c-4c7b-bb09-a31b536d9238', 3, 3, 7),
(501, '2024-11-01 05:40:56', '2024-11-01 05:40:56', 'ecb945da-f5ae-44fa-b196-1c7727c40462', 3, 3, 3),
(502, '2024-11-01 05:40:56', '2024-11-01 05:40:56', 'a9b81e57-6809-426e-b3ec-86c9f021f192', 3, 4, NULL);

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
(4, '2024-10-22 06:03:49', '2024-10-27 05:04:46', '6d3ce7cf-1d9b-4e4f-bced-a526c68508d0', 'Profile', 'profiles', 'fas fa-user'),
(7, '2024-10-22 06:07:30', '2024-10-27 04:28:21', 'a7670535-e806-4b70-a229-2c5585301c4a', 'Daftar Undangan', 'invitations', 'fas fa-envelope'),
(24, '2024-10-28 03:59:05', '2024-10-28 04:01:05', 'a153413d-597f-4359-b67e-944b5a026b68', 'Contact Form', 'contact_forms', 'fas fa-address-card'),
(25, '2024-10-29 09:21:14', '2024-10-29 09:24:10', 'fbe52d7d-1c66-4e84-9e2e-2b2681ef4981', 'Hubungi Kami', 'contacts/show_contact_us', 'fas fa-phone');

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
(4, '2024-10-22 06:04:51', '2024-10-22 06:04:51', 'e123a76d-4369-4784-9eb2-1c0072c6dfca', 'Business Profile', 'business_profiles/uuid1234/edit', NULL, 3),
(7, '2024-10-22 05:37:54', '2024-10-22 05:37:54', 'd3770b04-a019-4a60-a3b8-4a12d4f2e8e0', 'Template', 'templates', NULL, 3),
(20, '2024-10-23 05:07:27', '2024-10-23 05:07:27', '9ab37dc7-e358-4d4a-a47c-aa261373828b', 'Contact', 'contacts', NULL, 3),
(21, '2024-10-23 05:09:53', '2024-10-23 05:09:53', 'b26095c0-46c2-461c-b6c6-45a5c1fd4ae4', 'Payment Method', 'payment_methods', NULL, 3),
(22, '2024-10-28 04:50:42', '2024-10-28 04:50:42', '3dbd96be-64bd-41aa-9756-b7525e2bef30', 'Service', 'services', NULL, 3),
(23, '2024-10-28 05:24:38', '2024-10-28 05:24:59', '0895a591-cebf-41f5-bfdb-d6816a9dd9a4', 'Setting', 'settings/uuid1234/edit', NULL, 3),
(24, '2024-10-28 05:38:07', '2024-10-28 05:38:07', 'e92002e6-60bd-46e8-b52c-dae9219c2a25', 'Discount', 'discounts', NULL, 3),
(25, '2024-11-01 05:39:44', '2024-11-01 05:39:44', 'ab0b59c6-79e5-4141-b263-f9f7a3eb5153', 'Invitation Status', 'invitation_status', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_messages`
--

CREATE TABLE `tb_messages` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) NOT NULL,
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
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_holder` varchar(255) NOT NULL
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
  `invitation_id` int(11) NOT NULL,
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
  `role_name` varchar(50) NOT NULL,
  `button_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `created_at`, `updated_at`, `uuid`, `role_name`, `button_access`) VALUES
(1, '2024-09-24 12:38:07', '2024-10-18 17:16:09', '459fb0d8-f5ae-4ace-881a-bea5c6982507', 'Owner', 1),
(2, '2024-09-24 12:38:00', '2024-10-18 17:16:01', '72bd2d28-9152-46d2-9ef0-7a8524e6ca5e', 'IT', 1),
(3, '2024-10-18 17:16:15', '2024-10-18 17:16:15', 'efb502e8-8678-45c4-a7b9-85ddf63e7961', 'Admin', 1),
(4, '2024-10-23 03:28:45', '2024-10-23 03:28:45', '610d7b5e-eb39-4737-a17e-eadd429590b8', 'User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
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
  `auth_background` varchar(255) NOT NULL,
  `home_cover_image` varchar(255) NOT NULL,
  `home_cover_text` text NOT NULL
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
  `invitation_id` int(11) NOT NULL,
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
  `image` varchar(255) NOT NULL,
  `example_url` text NOT NULL,
  `template_code` varchar(255) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `percent_discount` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `template_type_id` int(11) NOT NULL,
  `publication_status` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_templates`
--

INSERT INTO `tb_templates` (`id`, `created_at`, `updated_at`, `uuid`, `image`, `example_url`, `template_code`, `template_name`, `price`, `percent_discount`, `parameter`, `template_type_id`, `publication_status`, `total_amount`) VALUES
(1, '2024-10-22 05:50:57', '2024-10-30 03:05:37', '9e487f36-b2cf-4d0e-9f6b-4affa8c1b8aa', 'template/soOMEP1ALjrRRcfHzyzyg36OUmfDenEKmTc3lrkF.jpg', '/invitation_templates/jm-calm/dist/calm_pink.html', 'calm_pink', 'Calm Pink', '100000', '50', 'calm_template', 1, 'Yes', '50000'),
(2, '2024-10-22 05:52:54', '2024-10-30 03:05:25', '9ab0ea3f-b7ce-4800-91d3-3835b84eb2e6', 'template/ZCczungGOnyPV7fe1JkN329nhjDFJBymUnCcQT5O.jpg', '/invitation_templates/jm-calm/dist/calm_blue.html', 'calm_blue', 'Calm Blue', '100000', '50', 'calm_template', 1, 'Yes', '50000'),
(3, '2024-10-22 05:53:36', '2024-10-30 03:05:11', 'e664fea4-15bf-45a7-b933-c93cffb8e5eb', 'template/DtCJOUO4wjVKED8JPA8lH7bFeFuYyjNjz0FWAQkK.jpg', '/invitation_templates/jm-calm/dist/calm_green.html', 'calm_green', 'Calm Green', '100000', '50', 'calm_template', 1, 'Yes', '50000'),
(4, '2024-10-22 05:55:23', '2024-10-30 03:04:59', 'cc472470-632b-4dea-ada2-79b0b96ea05a', 'template/mReRbSX736zmz2qVVqxoHnDRGHzmhz5lPMdew2Vi.jpg', '/invitation_templates/jm-calm/dist/calm_red.html', 'calm_red', 'Calm Red', '100000', '50', 'calm_template', 1, 'Yes', '50000'),
(5, '2024-10-22 05:56:26', '2024-10-30 03:04:40', 'e76f6fe5-6cb3-4f96-95b0-bfd5edf74f41', 'template/evvTrCdsrCF2Lnv1erizx75EKhwMo3IGP0EndF4o.jpg', '/invitation_templates/jm-sideright/dist/sideright_golden_brown.html', 'sideright_golden_brown', 'Sideright Golden Brown', '100000', '50', 'sideright_template', 1, 'Yes', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_template_types`
--

CREATE TABLE `tb_template_types` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `template_type_name` varchar(255) NOT NULL
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
  `transaction_code` varchar(255) NOT NULL,
  `invitation_id` varchar(255) NOT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `percent_discount` varchar(255) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_wedding_couples`
--

CREATE TABLE `tb_wedding_couples` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `invitation_id` int(11) NOT NULL,
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
(1, NULL, 'rikidavidtra.2310@gmail.com', '2024-11-01 09:15:11', '$2y$12$k83DHsQnWCT3Guu8aDaV9uDCYhQ0Pt2P/jXGB/SvqpW4cQ5dysHUq', NULL, '2024-09-22 04:51:41', '2024-10-30 02:44:20', 'b78bbf63-2424-4aec-9da7-55537062f5e3', 'Riki David', 'Riki', 1),
(2, NULL, 'it@gmail.com', '2024-11-01 09:15:11', '$2y$12$jI2jrqRHuW.Lj5FqgK75U.Fy8dQ/BUhdzagdm93r4Y32DuqyQz6Vu', NULL, '2024-09-22 05:10:02', '2024-10-30 02:44:01', '3a0f5a4a-14ed-426b-9298-3cfa6f475c61', 'Riki David', 'Riki', 2),
(3, NULL, 'admin@gmail.com', '2024-11-01 09:15:11', '$2y$12$Hj.o3dni.mofGL3kc5gCZOEyjqlY5.CsL0GXQLxR9Cp5gOWeG.VN6', NULL, '2024-10-23 03:28:12', '2024-10-30 02:43:51', '96b87508-e1d9-4630-8349-db88909a8de7', 'Riki David', 'Riki', 3),
(4, NULL, 'user@gmail.com', '2024-11-01 09:15:11', '$2y$12$v.ylbvOGE9ydoqJiTk.iAubF97U.UQG3hPxmhS1Gs6VLJtD0J.yeq', NULL, '2024-10-29 09:18:58', '2024-10-30 02:43:25', '9113733a-efb6-4912-a04f-f63db698076c', 'Riki David', 'Riki', 4);

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
-- Indexes for table `tb_audios`
--
ALTER TABLE `tb_audios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_discounts`
--
ALTER TABLE `tb_discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_events`
--
ALTER TABLE `tb_events`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_galleries`
--
ALTER TABLE `tb_galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_gifts`
--
ALTER TABLE `tb_gifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_invitations`
--
ALTER TABLE `tb_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_invitation_status`
--
ALTER TABLE `tb_invitation_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_love_stories`
--
ALTER TABLE `tb_love_stories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_wedding_couples`
--
ALTER TABLE `tb_wedding_couples`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

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
-- AUTO_INCREMENT for table `tb_audios`
--
ALTER TABLE `tb_audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_business_profiles`
--
ALTER TABLE `tb_business_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_closings`
--
ALTER TABLE `tb_closings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_contact_forms`
--
ALTER TABLE `tb_contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_covers`
--
ALTER TABLE `tb_covers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_discounts`
--
ALTER TABLE `tb_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_events`
--
ALTER TABLE `tb_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_galleries`
--
ALTER TABLE `tb_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gifts`
--
ALTER TABLE `tb_gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gift_types`
--
ALTER TABLE `tb_gift_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_guests`
--
ALTER TABLE `tb_guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_invitations`
--
ALTER TABLE `tb_invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tb_invitation_status`
--
ALTER TABLE `tb_invitation_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_love_stories`
--
ALTER TABLE `tb_love_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `tb_menu_firsts`
--
ALTER TABLE `tb_menu_firsts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_messages`
--
ALTER TABLE `tb_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_payment_methods`
--
ALTER TABLE `tb_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_quotes`
--
ALTER TABLE `tb_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_templates`
--
ALTER TABLE `tb_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_template_types`
--
ALTER TABLE `tb_template_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_transactions`
--
ALTER TABLE `tb_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_wedding_couples`
--
ALTER TABLE `tb_wedding_couples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
