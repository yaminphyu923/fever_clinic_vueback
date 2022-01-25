-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 04:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fever_clinic_vue`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consultation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `patient_id`, `consultation`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '12', 'ICU', 'note', '2', '2022-01-19 09:05:08', '2022-01-19 09:05:08'),
(3, '12', 'HDU', 'test', '2', '2022-01-19 22:09:29', '2022-01-20 08:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `deads`
--

CREATE TABLE `deads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dead_time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cause` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deads`
--

INSERT INTO `deads` (`id`, `patient_id`, `dead_time`, `cause`, `doctor_id`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '3', 're', 're', '9', 're', '2', '2022-01-09 23:55:06', '2022-01-09 23:55:06'),
(2, '3', 'test', 'test', '8', 'test', '2', '2022-01-10 09:53:23', '2022-01-10 09:53:23'),
(3, '12', '02', 'cause', '8', 'note', '2', '2022-01-19 09:01:58', '2022-01-19 09:01:58'),
(4, '12', 'testing', 'test', '8', 'test note', '2', '2022-01-19 22:07:24', '2022-01-20 03:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `fullname`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'B.A.M.S.', 'Bachelor of Ayurvedic Medicine and Surgery', NULL, '2021-12-19 23:46:33', '2021-12-19 23:46:33'),
(8, 'aa edit', 'aafull', NULL, '2021-12-20 09:36:21', '2021-12-22 09:08:52'),
(9, 'bb', 'AA', NULL, '2021-12-26 22:21:50', '2021-12-26 22:21:50'),
(10, 'cc', 'cc', '1', '2021-12-27 00:40:19', '2021-12-27 00:49:42'),
(11, 'dd', 'dd', '1', '2021-12-27 00:41:20', '2021-12-27 00:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treatment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `patient_id`, `diagnosis`, `dia`, `information`, `treatment`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '12', 'diagnosis', NULL, 'information', 'treatment', '2', '2022-01-19 08:58:41', '2022-01-19 08:58:41'),
(3, '12', 'testing', NULL, 'test', 'test', '2', '2022-01-19 22:05:18', '2022-01-20 02:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `discharges`
--

CREATE TABLE `discharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_to` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discharges`
--

INSERT INTO `discharges` (`id`, `patient_id`, `time`, `place`, `opd`, `admission`, `refer_to`, `pr`, `spo2`, `bp`, `gcs`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '12', '2022-01-19T22:02', 'Admission', 'opd opd', 'admission', 'refer', 'pr', '23', '20', 'gcs', '2', '2022-01-19 09:02:25', '2022-01-20 03:25:30'),
(3, '12', '2022-01-20T11:07', 'DC', 'testing', 'test', 'test', 'test', 'test', 'test', 'test', '2', '2022-01-19 22:07:39', '2022-01-20 03:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `code`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Respiratory tuberculosis, not confirmed bacteriologically or histologically', 'A16', 'I Certain infectious and parasitic diseases / (A15-A19) Tuberculosis', '1', '2022-01-06 09:41:53', '2022-01-06 09:41:53'),
(2, 'Respiratory tuberculosis unspecified, confirmed bacteriologically and histologically', 'A15.9', 'I Certain infectious and parasitic diseases / (A15-A19) Tuberculosis', '1', '2022-01-06 09:47:15', '2022-01-06 09:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speciality_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone`, `degree_id`, `speciality_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Daw Lwin', '00000', '1', '3', NULL, '2021-12-20 03:02:11', '2021-12-22 08:48:32'),
(6, 'Soe', '09799123456', '8', '3', NULL, '2021-12-21 09:48:16', '2021-12-21 09:48:16'),
(8, 'Daw Mu', '09799123456', '1', '3', NULL, '2021-12-22 08:37:03', '2021-12-22 08:37:03'),
(9, 'Win Maw', '00011', '8', '5', NULL, '2021-12-23 22:47:30', '2021-12-23 22:47:30'),
(10, 'mm', '09799123456', '8', '3', NULL, '2021-12-23 22:49:56', '2021-12-23 22:49:56'),
(11, 'Red', '123', '8', '5', NULL, '2021-12-26 06:50:11', '2021-12-26 06:50:11'),
(12, 'Nu Nu', '09799', '8', '5', NULL, '2021-12-26 07:08:14', '2021-12-26 07:08:14'),
(18, 'dd', '24234', '8', '5', '1', '2021-12-26 10:14:01', '2021-12-27 00:52:52'),
(19, 'ee', '1324', '8', '5', '1', '2021-12-26 10:15:24', '2021-12-26 10:15:24'),
(20, 'ff', '127', '8', '5', '1', '2021-12-26 22:08:01', '2021-12-26 22:08:01'),
(21, 'gg', '123456', '8', '5', '1', '2021-12-26 22:08:38', '2021-12-26 22:08:38'),
(22, 'hh', '324', '8', '5', '1', '2021-12-26 22:12:55', '2021-12-26 22:12:55'),
(23, 'ii', '000', '8', '3', '1', '2021-12-26 22:15:24', '2021-12-26 22:15:24');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Group Two', '1', '2021-12-31 03:08:19', '2021-12-31 03:08:19'),
(5, 'Group One', '1', '2021-12-31 03:23:08', '2021-12-31 03:23:08'),
(6, 'Group Three', '1', '2021-12-31 03:23:17', '2021-12-31 03:23:17'),
(7, 'Group Four', '1', '2021-12-31 03:23:25', '2021-12-31 03:23:25'),
(10, 'Urea & Electrolyte', '1', '2022-01-06 00:46:08', '2022-01-06 00:46:08'),
(11, 'Others', '1', '2022-01-06 00:49:47', '2022-01-06 00:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_multiple_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_incharge_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_case` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fever` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sore_throat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shaking_chills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headache` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taste_smell` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malaise` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odema` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_onset` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_covid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `patient_id`, `date`, `admission`, `bed_id`, `doctor_multiple_id`, `doctor_incharge_id`, `police_case`, `fever`, `sore_throat`, `chills`, `shaking_chills`, `headache`, `taste_smell`, `malaise`, `odema`, `date_onset`, `date_covid`, `refer_to`, `others`, `user_id`, `created_at`, `updated_at`) VALUES
(12, '12', '2022-01-19T21:55', '25', NULL, '6', '6', 'Yes', 'Yes', 'No', 'Yes', 'Yes', NULL, 'No', 'Yes', 'Yes', '2022-01-19', 'No', 'refer', 'others', '2', '2022-01-19 08:55:31', '2022-01-19 09:06:41'),
(13, '12', '2022-01-20T11:03', 'test', 'test', '6', '6', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '2022-01-20', 'No', 'test', 'test', '2', '2022-01-19 22:04:13', '2022-01-19 22:22:40'),
(17, '14', '2022-01-21T14:59', NULL, NULL, '6', '6', 'Yes', NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2022-01-21', 'date', 'test', 'other', '2', '2022-01-21 02:00:01', '2022-01-21 02:00:01'),
(18, '14', '2022-01-23T12:16', '23', 'bed one', '6', '9', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', '2022-01-23', 'No', NULL, 'other', '2', '2022-01-22 23:16:47', '2022-01-22 23:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `h_r_management`
--

CREATE TABLE `h_r_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `h_r_management`
--

INSERT INTO `h_r_management` (`id`, `name`, `phone`, `position_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'B.A.M.S.', '123', '4', NULL, '2021-12-22 22:41:12', '2021-12-22 22:41:12'),
(7, 'Main', '111100', '1', '1', '2021-12-23 00:40:10', '2022-01-05 09:44:32'),
(8, 'HR', '09799123123', '1', '1', '2022-01-05 09:04:45', '2022-01-05 09:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `imagings`
--

CREATE TABLE `imagings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_requested` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_analysis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analysis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conclusion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imagings`
--

INSERT INTO `imagings` (`id`, `patient_id`, `doctor_id`, `date_requested`, `date_analysis`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `analysis`, `conclusion`, `user_id`, `created_at`, `updated_at`) VALUES
(10, '12', '6', '2022-01-19T22:03', '2022-01-19T22:03', '1642606493_pill15.jpg', '1642606493_pill16.jpg', '1642606494_pill14.jpg', '1642606494_pill13.jpg', '1642606495_pill12.jpg', '1642606496_pill9.jpg', 'analysis', 'conclusion', '2', '2022-01-19 09:04:56', '2022-01-19 09:04:56'),
(11, '12', '6', '2022-01-20T11:08', '2022-01-20T11:08', '1642653559_pill.png', '1642653559_pill2.jpg', '1642653559_pill12.jpg', '1642653559_pill11.jpg', '1642653559_pill10.jpg', '1642653560_pill4.jpg', 'test', 'test', '2', '2022-01-19 22:09:20', '2022-01-19 22:09:20'),
(12, '14', '6', NULL, NULL, '1642916925_Club.jpg', '1642916925_dedakj.jpg', '1642916925_Medi7.jpg', '1642916926_mediD.jpg', '1642916926_oxygen concentrator myanmar.png', '1642916926_oxygen-concentrator.jpg', NULL, NULL, NULL, '2022-01-22 23:18:46', '2022-01-23 21:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `investigations`
--

CREATE TABLE `investigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_requested` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_analysis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_test` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_request` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_range` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labcategory_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigations`
--

INSERT INTO `investigations` (`id`, `patient_id`, `doctor_id`, `date_requested`, `date_analysis`, `doctor_test`, `queue`, `image`, `exam_request`, `note`, `value`, `remark`, `lab_name`, `lab_unit`, `lab_range`, `group_id`, `labcategory_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, '12', '8', '2022-01-19T21:58', NULL, 'test', 'queue', '1642606246_pill5.jpg', 'examination request', 'clinical', '300', 're', 'D-Dimer testing', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-19 09:00:47', '2022-01-19 09:00:47'),
(12, '12', '8', '2022-01-19T21:58', NULL, 'test', 'queue', '1642606246_pill5.jpg', 'examination request', 'clinical', '222', 'remark', 'CRP', 'mg/ml', '<6.0', '11', '6', '2', '2022-01-19 09:00:47', '2022-01-19 09:00:47'),
(13, '12', '6', '2022-01-20T11:05', '2022-01-20T11:05', 'test', 'test', '1642653379_para6.jpg', 'test', 'test', '', '', 'D-Dimer testing', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-19 22:06:19', '2022-01-19 22:06:19'),
(14, '12', '6', '2022-01-20T11:05', '2022-01-20T11:05', 'test', 'test', '1642653379_para6.jpg', 'test', 'test', '', '', 'D-Dimer', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-19 22:06:19', '2022-01-19 22:06:19'),
(15, '12', '6', '2022-01-20T11:05', '2022-01-20T11:05', 'test', 'test', '1642653379_para6.jpg', 'test', 'test', 'te', 're', 'CRP', 'mg/ml', '<6.0', '11', '6', '2', '2022-01-19 22:06:19', '2022-01-19 22:06:19'),
(16, '12', '6', '2022-01-20T11:05', '2022-01-20T11:05', 'test', 'test', '1642653379_para6.jpg', 'test', 'test', 'test', 'remark', 'Sodium', 'mmol/L', '136-145', '10', '6', '2', '2022-01-19 22:06:19', '2022-01-19 22:06:19'),
(17, '14', '6', '2022-01-21T15:43', NULL, NULL, NULL, '1642756533_QR code_Isometric.png', NULL, NULL, 'test', 'test', 'D-Dimer testing', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-21 02:45:33', '2022-01-21 02:45:33'),
(18, '14', '6', '2022-01-21T15:43', NULL, NULL, NULL, '1642756533_QR code_Isometric.png', NULL, NULL, 're', 're', 'D-Dimer', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-21 02:45:33', '2022-01-21 02:45:33'),
(19, '14', '8', '2022-01-23T12:14', '2022-01-23T12:14', 'testing', 'queue', '1642950397_cardiology_logo.jpg', 'examination', 'brief', 'value one update', 'remark one update', 'D-Dimer testing', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-22 23:16:06', '2022-01-23 08:36:37'),
(20, '14', '8', '2022-01-23T12:14', '2022-01-23T12:14', 'testing', 'queue', '1642950397_cardiology_logo.jpg', 'examination', 'brief', 'value two updating', 'remark two updating', 'D-Dimer', 'ug/ml', '<0.5', '11', '6', '2', '2022-01-22 23:16:06', '2022-01-23 08:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `range` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labcategory_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `name`, `unit`, `range`, `group_id`, `labcategory_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Chloride', 'mmol/L', '96-106', '10', '6', '1', '2022-01-06 00:47:40', '2022-01-06 00:47:40'),
(4, 'Potassium', 'mmol/L', '3.5-5.2', '10', '6', '1', '2022-01-06 00:48:53', '2022-01-06 00:48:53'),
(5, 'Sodium', 'mmol/L', '136-145', '10', '6', '1', '2022-01-06 00:49:21', '2022-01-06 00:49:21'),
(6, 'CRP', 'mg/ml', '<6.0', '11', '6', '1', '2022-01-06 00:50:17', '2022-01-06 00:50:17'),
(7, 'D-Dimer', 'ug/ml', '<0.5', '11', '6', '1', '2022-01-06 00:50:52', '2022-01-06 00:50:52'),
(11, 'D-Dimer testing', 'ug/ml', '<0.5', '11', '6', NULL, '2022-01-06 22:36:40', '2022-01-06 22:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `lab_categories`
--

CREATE TABLE `lab_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_categories`
--

INSERT INTO `lab_categories` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lab Three', '1', '2021-12-31 03:28:24', '2021-12-31 03:42:40'),
(2, 'Lab Two', '1', '2021-12-31 03:28:39', '2021-12-31 03:28:39'),
(4, 'Lab One', '1', '2021-12-31 03:42:54', '2021-12-31 03:42:54'),
(6, 'Blood test', '1', '2022-01-06 00:46:32', '2022-01-06 00:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `medical_categories`
--

CREATE TABLE `medical_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_categories`
--

INSERT INTO `medical_categories` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Oral - စားဆေး', '1', '2021-12-27 22:35:04', '2021-12-27 22:35:04'),
(2, 'ထိုးဆေး-IM-အသားထိုးဆေး', '1', '2021-12-27 22:53:53', '2021-12-27 22:53:53'),
(4, 'ထိုးဆေး-IV-အကြောထိုးဆေး', '1', '2021-12-27 23:23:58', '2021-12-27 23:23:58'),
(6, 'Others', '1', '2021-12-27 23:25:05', '2021-12-27 23:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `medical_lists`
--

CREATE TABLE `medical_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_stock_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill_quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_category_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_lists`
--

INSERT INTO `medical_lists` (`id`, `name`, `quantity`, `in_date`, `out_date`, `out_quantity`, `last_stock_date`, `refill_date`, `refill_quantity`, `medical_category_id`, `remain`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 'AA', '20', '2021-12-20', NULL, '1', NULL, NULL, '5', '6', '34', 'Note', '1', '2021-12-29 21:42:40', '2021-12-30 03:44:46'),
(12, 'BB', '200', '2022-01-21', NULL, '0', NULL, NULL, NULL, '2', '200', 'test', '2', '2022-01-21 03:08:19', '2022-01-21 03:08:19');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2021_12_20_054810_create_degrees_table', 2),
(10, '2021_12_20_081841_create_specialities_table', 3),
(11, '2021_12_20_081933_create_doctors_table', 3),
(12, '2021_12_22_084405_create_patients_table', 4),
(13, '2021_12_22_162300_create_positions_table', 5),
(15, '2021_12_23_045341_create_h_r_management_table', 6),
(16, '2021_12_23_151435_create_imagings_table', 7),
(17, '2021_12_24_071613_create_hospitals_table', 8),
(18, '2021_12_26_140834_create_medical_lists_table', 9),
(19, '2021_12_28_042246_create_medical_categories_table', 9),
(20, '2021_12_28_154634_create_out_medicals_table', 10),
(21, '2021_12_29_084936_create_treatments_table', 11),
(22, '2021_12_29_161009_create_refill_medicals_table', 11),
(23, '2021_12_31_071217_create_labs_table', 12),
(24, '2021_12_31_082250_create_groups_table', 12),
(25, '2021_12_31_082339_create_lab_categories_table', 12),
(26, '2022_01_03_044904_create_prescriptive_medicines_table', 13),
(27, '2022_01_06_080159_create_investigations_table', 14),
(28, '2022_01_06_155334_create_diseases_table', 14),
(29, '2022_01_07_071514_create_past_medicals_table', 15),
(30, '2022_01_07_092846_create_phy_examinations_table', 16),
(31, '2022_01_10_051227_create_diagnoses_table', 17),
(32, '2022_01_10_055125_create_deads_table', 18),
(33, '2022_01_10_063314_create_discharges_table', 19),
(34, '2022_01_10_070012_create_progress_notes_table', 20),
(35, '2022_01_10_091043_create_pt_overalls_table', 21),
(36, '2022_01_10_095636_create_monitorings_table', 22),
(37, '2022_01_10_104824_create_consultations_table', 23),
(38, '2022_01_15_062545_create_permission_tables', 24);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 23),
(5, 'App\\Models\\User', 25);

-- --------------------------------------------------------

--
-- Table structure for table `monitorings`
--

CREATE TABLE `monitorings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rbs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pupil` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urine` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tx` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pain_score` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitorings`
--

INSERT INTO `monitorings` (`id`, `patient_id`, `pr`, `crt`, `emergency`, `t`, `spo2`, `rbs`, `gcs`, `pupil`, `bp`, `urine`, `date`, `tx`, `pain_score`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '12', 'pr', 'crt', 'emergency', 't', 'spo2', 'rbs', 'gcs', 'pupil', 'bp', NULL, NULL, NULL, NULL, '2', '2022-01-19 09:03:28', '2022-01-19 09:03:28'),
(4, '12', 'pr', 'crt', 'emergency', 't', 'spo2', 'rbs', 'gcs', 'pupil', 'bp', 'urine', '2022-01-19T22:03', 'tx', 'pain', '2', '2022-01-19 09:03:44', '2022-01-19 09:03:44'),
(5, '12', 'testing', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2022-01-20T11:08', 'test', 'test', '2', '2022-01-19 22:08:27', '2022-01-20 03:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `out_medicals`
--

CREATE TABLE `out_medicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `out_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_doctor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `out_medicals`
--

INSERT INTO `out_medicals` (`id`, `out_date`, `out_quantity`, `note`, `approve_doctor`, `medical_list_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, '2021-12-21', '1', 'Lorem', '8', '11', '1', '2021-12-29 21:43:11', '2021-12-29 21:43:11');

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
-- Table structure for table `past_medicals`
--

CREATE TABLE `past_medicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dm` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ht` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ihd` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stroke` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liver` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bleeding` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `como` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comobidity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `past` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drug` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drug_allergy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_meal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoking` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alcohol` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pregnancy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recent_drugs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_drugs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_enquery` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_hospital` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `past_medicals`
--

INSERT INTO `past_medicals` (`id`, `patient_id`, `dm`, `ht`, `ihd`, `stroke`, `renal`, `liver`, `bleeding`, `como`, `comobidity`, `past`, `drug`, `drug_allergy`, `last_meal`, `smoking`, `alcohol`, `pregnancy`, `recent_drugs`, `regular_drugs`, `medication`, `system_enquery`, `pre_hospital`, `user_id`, `created_at`, `updated_at`) VALUES
(8, '12', 'DM', 'HT', 'IHD', 'Stroke', 'renal', 'liver', 'bleeding', '1', NULL, 'past', 'drug', 'allergy', 'last', 'smoking', 'alcohol', 'pregnancy', 'recent', 'regular', 'medication', 'system', 'pre', '2', '2022-01-19 08:56:48', '2022-01-19 08:56:48'),
(9, '12', 'testing', 'test', 'test', 'test', 'test', 'test', 'test', NULL, NULL, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2', '2022-01-19 22:04:40', '2022-01-20 01:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nrc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nextKin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptoms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travelHistory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `como` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comobidity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `out_patient` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dead` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dead_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_history` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `gender`, `age`, `dob`, `nrc`, `phone`, `address`, `nextKin`, `attendent`, `occupation`, `symptoms`, `travelHistory`, `remark`, `date`, `como`, `comobidity`, `user_id`, `created_at`, `updated_at`, `out_patient`, `out_date`, `dead`, `dead_date`, `refer`, `edit_history`) VALUES
(12, 'Poe Poe', 'Female', '43', '2022-01-19', '12/POE(N)123456', '09799123456', 'Yangon', 'kin', 're', '123', 're', 're', 'test', '2022-01-19T21:54', NULL, NULL, '2', '2022-01-19 08:54:52', '2022-01-20 03:14:01', NULL, NULL, '1', NULL, NULL, 0),
(14, 'Lin Lin', 'Male', '65', NULL, '12/LIN(N)123456', NULL, 'Yangon', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-21T14:59', NULL, NULL, '2', '2022-01-21 01:59:34', '2022-01-21 02:00:01', NULL, NULL, NULL, NULL, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-01-16 09:54:48', '2022-01-16 09:54:48'),
(2, 'role-create', 'web', '2022-01-16 09:55:37', '2022-01-16 09:55:37'),
(3, 'role-edit', 'web', '2022-01-16 09:55:48', '2022-01-16 09:55:48'),
(5, 'role-delete', 'web', '2022-01-16 10:31:33', '2022-01-16 10:31:33'),
(7, 'patient-edit', 'web', '2022-01-18 00:44:37', '2022-01-18 01:20:31'),
(8, 'patient-create', 'web', '2022-01-18 01:21:27', '2022-01-18 01:21:27'),
(9, 'patient-list', 'web', '2022-01-18 01:21:34', '2022-01-18 01:21:34'),
(10, 'patient-delete', 'web', '2022-01-18 01:21:42', '2022-01-18 01:21:42'),
(11, 'lab-list', 'web', '2022-01-18 01:22:17', '2022-01-18 01:22:17'),
(12, 'lab-create', 'web', '2022-01-18 01:22:25', '2022-01-18 01:22:25'),
(13, 'lab-edit', 'web', '2022-01-18 01:22:32', '2022-01-18 01:22:32'),
(14, 'lab-delete', 'web', '2022-01-18 01:22:41', '2022-01-18 01:22:41');

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
-- Table structure for table `phy_examinations`
--

CREATE TABLE `phy_examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temperature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecg` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rbs` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `well_orientated` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_neck` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chest` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abdomen_pelvic` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spine` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upper_right` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upper_left` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lower_right` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lower_left` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_case` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phy_examinations`
--

INSERT INTO `phy_examinations` (`id`, `patient_id`, `temperature`, `ecg`, `rbs`, `spo2`, `bp`, `pr`, `rr`, `well_orientated`, `pain`, `voice`, `no_response`, `general`, `head_neck`, `chest`, `abdomen_pelvic`, `spine`, `upper_right`, `upper_left`, `lower_right`, `lower_left`, `refer_case`, `other`, `user_id`, `created_at`, `updated_at`) VALUES
(6, '12', '30', 'ecg', 'rbs', 'spo2', 'bp', 'pr', 'rr', '1', '1', '1', '1', 'general', 'head', 'chest', 'abdomen', 'spine', 'right', 'left', 'right', 'left', 'referred case', 'other', '2', '2022-01-19 08:58:23', '2022-01-19 08:58:23'),
(7, '12', 'test', 'testing', 'test', 'test', 'test', 'test', 'test', '1', '1', '1', '1', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2', '2022-01-19 22:05:07', '2022-01-20 01:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'B.A.M.S.', '1', '2021-12-22 10:02:36', '2022-01-05 10:04:25'),
(4, 'test', '1', '2021-12-22 10:15:00', '2022-01-05 10:04:12'),
(5, 'Position One', '1', '2022-01-05 10:02:55', '2022-01-05 10:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptive_medicines`
--

CREATE TABLE `prescriptive_medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptive_medicines`
--

INSERT INTO `prescriptive_medicines` (`id`, `date`, `patient_id`, `doctor_id`, `medical_list_id`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(11, '2022-01-20T11:06', '12', '6', '11', '0', '2', '2022-01-19 22:07:07', '2022-01-19 22:07:07'),
(12, '2022-01-20T11:06', '12', '6', '11', '0', '2', '2022-01-19 22:07:07', '2022-01-19 22:07:07'),
(13, '2022-01-21T16:04', '14', '8', '12', '0', '2', '2022-01-21 03:05:02', '2022-01-22 23:12:13'),
(14, '2022-01-21T16:04', '14', '8', '11', '0', '2', '2022-01-21 03:05:02', '2022-01-22 11:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `progress_notes`
--

CREATE TABLE `progress_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `progress_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_notes`
--

INSERT INTO `progress_notes` (`id`, `patient_id`, `progress_note`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '12', '1642606360_001.pdf', '2', '2022-01-19 09:02:40', '2022-01-19 09:02:40'),
(3, '12', '1642653471_001.pdf', '2', '2022-01-19 22:07:51', '2022-01-19 22:07:51'),
(6, '14', '1642755781_total_patient.xlsx', '2', '2022-01-21 02:33:01', '2022-01-21 02:33:01'),
(7, '14', '1642916842_0012k.pdf', '2', '2022-01-22 23:17:22', '2022-01-23 21:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `pt_overalls`
--

CREATE TABLE `pt_overalls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pt_overalls`
--

INSERT INTO `pt_overalls` (`id`, `patient_id`, `date`, `text`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '12', '2022-01-19', 'test', '2', '2022-01-19 09:02:58', '2022-01-19 09:02:58'),
(4, '12', '2022-01-19', 'testing', '2', '2022-01-19 09:02:58', '2022-01-19 09:02:58'),
(5, '12', '2022-01-20', 'test one', '2', '2022-01-19 22:08:10', '2022-01-19 22:08:10'),
(6, '12', '2022-01-20', 'test two', '2', '2022-01-19 22:08:10', '2022-01-19 22:08:10'),
(7, '14', '2022-01-23', 'test one', '2', '2022-01-22 23:17:46', '2022-01-22 23:39:05'),
(8, '14', '2022-01-23', 'test two', '2', '2022-01-22 23:17:46', '2022-01-22 23:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `refill_medicals`
--

CREATE TABLE `refill_medicals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refill_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refill_quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refill_medicals`
--

INSERT INTO `refill_medicals` (`id`, `refill_date`, `refill_quantity`, `note`, `doctor_id`, `medical_list_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '2021-12-26', '10', 'Test', '4', '11', '1', '2021-12-30 03:35:39', '2021-12-30 03:35:39'),
(4, '2021-12-27', '5', 'Lorem', '6', '11', '1', '2021-12-30 03:44:46', '2021-12-30 03:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Staff', 'web', '2022-01-17 23:11:37', '2022-01-17 23:11:37'),
(5, 'Doctor', 'web', '2022-01-17 23:12:32', '2022-01-17 23:12:32'),
(6, 'superadmin', 'web', '2022-01-23 10:16:31', '2022-01-23 10:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(2, 6),
(3, 5),
(3, 6),
(5, 5),
(7, 5),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `code`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Histology', 'His', NULL, '2021-12-20 02:40:01', '2021-12-20 02:40:01'),
(5, 'bb edit', 'bb', NULL, '2021-12-21 09:23:53', '2021-12-22 09:05:40'),
(6, 'cc', '111', NULL, '2021-12-26 22:21:21', '2021-12-26 22:21:21'),
(7, 'aa', 'aa', '1', '2021-12-27 01:08:52', '2021-12-27 01:10:50'),
(8, 'dd', 'dd', '1', '2021-12-27 01:09:46', '2021-12-27 01:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pharmacy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_list_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequency` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `patient_id`, `note`, `doctor_id`, `pharmacy`, `pre_date`, `queue`, `medical_list_id`, `dose`, `frequency`, `start_date`, `end_date`, `remark`, `user_id`, `created_at`, `updated_at`) VALUES
(19, '12', 'test', '6', 'test', '2022-01-20T11:06', 'queue', '11', 'dose', 'test', '2022-01-20T11:06', '2022-01-20T11:06', 'test', '2', '2022-01-19 22:07:07', '2022-01-19 22:07:07'),
(20, '12', 'test', '6', 'test', '2022-01-20T11:06', 'queue', '11', 'dose fre', 'test fre', '2022-01-20T11:06', '2022-01-20T11:07', 'rem', '2', '2022-01-19 22:07:07', '2022-01-19 22:07:07'),
(21, '14', 'Quick Testing', '9', 'test', '2022-01-21T16:04', 'queue', '12', 'dose test', 'test', '2022-01-21T16:04', '2022-01-21T16:04', 'remark Note', '2', '2022-01-21 03:05:02', '2022-01-22 23:12:13'),
(22, '14', 'Quick Testing', '9', 'test', '2022-01-21T16:04', 'queue', '11', 'do', 'test', '2022-01-21T16:04', '2022-01-21T16:04', 'test', '2', '2022-01-21 03:05:02', '2022-01-22 23:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `sama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `sama`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'superadmin@gmail.com', NULL, NULL, '6', '1', '$2y$10$rNPINKIeAX8BisVYAQnA4uQVVEPq3xQka1R9o6bixO8Ti0YdODjIG', NULL, '2021-12-17 02:53:50', '2021-12-17 02:53:50'),
(2, 'SuperAdmin', 'mmcities@gmail.com', NULL, NULL, '6', '1', '$2y$10$Bh/saU32leVji1KkB0JnEuAfegFd6vVyC2f0U/ec32431dwxTuhhq', NULL, '2022-01-09 21:21:59', '2022-01-09 21:21:59'),
(20, 'User', 'user@gmail.com', NULL, 'sama user', '4', '1', '$2y$10$fQdIx6U0bf1ObAyYUdkLyOB2Ykqw71b/Od/ASIRQgKqhDtu1cbrFS', NULL, '2022-01-13 23:33:03', '2022-01-13 23:33:03'),
(23, 'User Three', 'userthree@gmail.com', NULL, 'user three sama', '4', '1', '$2y$10$si5qfZzFeCN/3uJMmEy.qeQkDvM4ooNYzoU/4KFMiWropsrFkn6CC', NULL, '2022-01-18 01:46:53', '2022-01-18 01:46:53'),
(24, 'User One', 'userone@gmail.com', NULL, 'sama user one', '4', '1', '$2y$10$gyyDD8hMGIeNPDdoaRbVz.FkKayK7FFMe3VpPZGIN6fVly.qHZ2Km', NULL, '2022-01-23 03:21:45', '2022-01-23 03:21:59'),
(25, 'Test', 'test@gmail.com', NULL, 'test', '5', '1', '$2y$10$jk1giXUzFyMEi7GDp1Eml.iMM0OOKyOZdXGfqJ18A6jjrAzX43ry2', NULL, '2022-01-23 10:17:40', '2022-01-23 10:17:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deads`
--
ALTER TABLE `deads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharges`
--
ALTER TABLE `discharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_r_management`
--
ALTER TABLE `h_r_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagings`
--
ALTER TABLE `imagings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigations`
--
ALTER TABLE `investigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_categories`
--
ALTER TABLE `lab_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_categories`
--
ALTER TABLE `medical_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_lists`
--
ALTER TABLE `medical_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `monitorings`
--
ALTER TABLE `monitorings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_medicals`
--
ALTER TABLE `out_medicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `past_medicals`
--
ALTER TABLE `past_medicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phy_examinations`
--
ALTER TABLE `phy_examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptive_medicines`
--
ALTER TABLE `prescriptive_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_notes`
--
ALTER TABLE `progress_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pt_overalls`
--
ALTER TABLE `pt_overalls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refill_medicals`
--
ALTER TABLE `refill_medicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
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
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deads`
--
ALTER TABLE `deads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discharges`
--
ALTER TABLE `discharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `h_r_management`
--
ALTER TABLE `h_r_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `imagings`
--
ALTER TABLE `imagings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `investigations`
--
ALTER TABLE `investigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lab_categories`
--
ALTER TABLE `lab_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_categories`
--
ALTER TABLE `medical_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_lists`
--
ALTER TABLE `medical_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `monitorings`
--
ALTER TABLE `monitorings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `out_medicals`
--
ALTER TABLE `out_medicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `past_medicals`
--
ALTER TABLE `past_medicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phy_examinations`
--
ALTER TABLE `phy_examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescriptive_medicines`
--
ALTER TABLE `prescriptive_medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `progress_notes`
--
ALTER TABLE `progress_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pt_overalls`
--
ALTER TABLE `pt_overalls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `refill_medicals`
--
ALTER TABLE `refill_medicals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
