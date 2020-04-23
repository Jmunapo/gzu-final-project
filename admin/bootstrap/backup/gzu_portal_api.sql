-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 09:31 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gzu_portal_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_infos`
--

CREATE TABLE `academic_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` double(8,2) NOT NULL,
  `fees_balance` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_infos`
--

INSERT INTO `academic_infos` (`id`, `reg_number`, `level`, `fees`, `fees_balance`, `created_at`, `updated_at`) VALUES
(3, 'M190001', '1.1', 701.00, 5.00, '2019-04-27 12:50:24', '2019-05-22 08:28:49'),
(4, 'M190002', '1.1', 701.00, -701.00, '2019-05-22 08:50:12', '2019-05-22 08:50:12'),
(5, 'M190003', '1.1', 701.00, -195.00, '2019-06-02 08:00:18', '2019-06-02 08:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id_number` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_disability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `war_veteran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_choice_programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_choice_programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_choice_programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intake_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsorship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_level_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_level_exam_board` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_level_subjects` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_level_grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_level_academic_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_level_exam_board` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_level_subjects` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_level_grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programme_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duties` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `refree_one_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refree_one_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refree_one_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_documents` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_certificates` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refree_two_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refree_two_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refree_two_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `firstname`, `lastname`, `date_of_birth`, `place_of_birth`, `sex`, `title`, `marital_status`, `previous_surname`, `national_id_number`, `race`, `nationality`, `citizenship`, `province`, `religion`, `physical_disability`, `war_veteran`, `address`, `phone`, `email`, `next_of_kin_name`, `relationship`, `next_of_kin_address`, `next_of_kin_phone`, `first_choice_programme`, `second_choice_programme`, `third_choice_programme`, `entry_type`, `intake_type`, `sponsorship`, `o_level_academic_year`, `o_level_exam_board`, `o_level_subjects`, `o_level_grade`, `a_level_academic_year`, `a_level_exam_board`, `a_level_subjects`, `a_level_grade`, `award_year`, `programme_name`, `college_name`, `degree_class`, `college_adress`, `college_phone`, `organisation`, `occupation`, `duties`, `from_date`, `to_date`, `refree_one_name`, `refree_one_address`, `refree_one_phone`, `personal_documents`, `academic_certificates`, `refree_two_name`, `refree_two_address`, `refree_two_phone`, `accepted`, `paid`, `created_at`, `updated_at`) VALUES
(1, 'Josiah', 'Munapo', '1994-12-07', 'Mutare', 'male', 'mr', 'single', NULL, '75-2058521 N 04', 'black', 'Zimbabwean', 'Zimbabwean', 'Masvingo', 'Christianity', 'no', 'no', '33 Hobhouse 3 Mutare', '0775696233', 'jmunapo@gmail.com', 'A Munapo', 'Father', '33 Hobhouse Mutare', '0772839509', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [COMPUTER SCIENCE]', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [MATHEMATICS]', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [GEOGRAPHY AND ENVIRONMENTAL SCIENCE]', 'normal', 'full time', 'self', '2012-11|2012-11|2012-11', 'ZIMSEC|ZIMSEC|ZIMSEC', 'MATHEMATICS|ENGLISH|SHONA', 'A|A|A', '2014-11|2014-11', 'ZIMSEC|ZIMSEC', 'GEAOGRAPHY|MATHEMATICS', 'B|A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A Chads', '33 Hob 1 Mutare', '0774178219', '75-2058521 N 04_personal_documents_Assignment 1.docx', '75-2058521 N 04_academic_certificates_Assignment 1.docx', 'B Gurwe', '11 Hob 1 Mutare', '0779325079', 1, 0, '2019-04-27 12:16:02', '2019-04-27 12:50:24'),
(2, '45h4', '45h', '2011-01-01', '45h45h', 'male', 'mr', 'single', NULL, 'erherh', 'black', 'erhrh', 'erhrh', 'erherh', 'erhherh', 'no', 'no', 'rh', 'erhee', 'erh', 'rh', 'erh', 'erh', 'erh', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [COMPUTER SCIENCE]', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [MATHEMATICS]', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [STATISTICS AND OPERATIONS RESEARCH]', 'special', 'full time', 'self', '2010-12-03|2010-12-03', 'ergre|ddd', 'MATHEMATICS|ENGLISH', 'd|ddd', '2010-12-03', 'zimsec', 'Shona', 'a', '2010-12-03', 'wefwef', 'wefwef', 'wefwef', 'wefwef', 'wefewfwef', NULL, NULL, NULL, NULL, NULL, 'Joe', '11 Street b Mutare', '0775696', 'erherh_personal_documents_Assignment 1.docx', 'erherh_academic_certificates_Assignment 1.docx', 'Jim Jackson', '10 Lola str Masvingo', '0775696233', 1, 0, '2019-05-22 08:43:09', '2019-05-22 08:50:12'),
(3, 'Sibongile', 'Simango', '1998-01-24', 'Mutare', 'female', 'miss', 'married', NULL, '75-2029886M13', 'black', 'Zimbabwean', 'Zimbabwean', 'Manicaland', 'Christianity', 'no', 'no', '2879 Hobhouse 3', '0775261526', 'sibongilesimango8@gmail.com', 'J Munapo', 'Husband', '3463 Hobhouse 3', '0775696233', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [MATHEMATICS]', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [COMPUTER SCIENCE]', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [GEOGRAPHY AND ENVIRONMENTAL SCIENCE]', 'normal', 'full time', 'self', '2010-12-03|2010-12-03|2010-12-03|2010-12-03', 'ZIMSEC|ZIMSEC|ZIMSEC|ZIMSEC', 'MATHEMATICS|ENGLISH|SHONA|INTERGRATED SCIENCE', 'A|B|A|C', '2010-12-03|2010-12-03', 'ZIMSEC|ZIMSEC', 'SHONA|HISTORY', 'B|B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'B Motsongadza', '11 box 22 Paulington Mutare', '+263775696233', '75-2029886M13_personal_documents_ID n Birth certificate.docx', '75-2029886M13_academic_certificates_Assignment 1.docx', 'F Simango', '2854 Hobhouse 3', '0775787878', 1, 0, '2019-06-02 07:58:30', '2019-06-02 08:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `name`, `display_name`, `status`, `author`, `description`, `created_at`, `updated_at`) VALUES
(1, 'exam_timetable', NULL, 1, NULL, NULL, '2019-06-06 11:24:27', '2019-06-07 08:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_wide` tinyint(1) DEFAULT '0',
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `course_code`, `university_wide`, `course_name`, `course_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'HCS101', 1, 'Communication Skills', 'Com Skills', '2019-04-27 11:57:21', '2019-04-27 11:57:21'),
(2, 2, 'BHS110', 1, 'Introduction to Zimbabwean Cultures and Heritage', 'Heritage', '2019-04-27 11:57:58', '2019-04-27 11:57:58'),
(3, 2, 'HGGES111', 0, 'Introduction to Computers and Computer Applications', 'Computers', '2019-04-27 11:58:30', '2019-04-27 11:58:30'),
(4, 2, 'HGGES103', 0, 'Introduction to Environmental Science', 'E-Science', '2019-04-27 11:59:12', '2019-04-27 11:59:12'),
(5, 2, 'HGGES102', 0, 'Techniques in Geography and Environmental Science', 'Techniques', '2019-04-27 11:59:53', '2019-04-27 11:59:53'),
(6, 2, 'HGGES108', 0, 'Principles of Hydrology', 'Principles of Hydrology', '2019-04-27 12:00:19', '2019-04-27 12:00:19'),
(7, 1, 'HSOR409', 0, 'Simulation and Modelling', 'Simulation and Modelling', '2019-05-04 13:56:24', '2019-05-04 13:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `curricula`
--

CREATE TABLE `curricula` (
  `id` int(10) UNSIGNED NOT NULL,
  `programme_id` int(10) UNSIGNED NOT NULL,
  `curricular_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effect_from` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curricula`
--

INSERT INTO `curricula` (`id`, `programme_id`, `curricular_name`, `effect_from`, `created_at`, `updated_at`) VALUES
(1, 3, 'August Twenty Nineteen', '2019-07-31 22:00:00', '2019-05-04 13:52:58', '2019-05-04 13:52:58'),
(2, 4, 'Geo Twentynineteen', '2019-07-31 22:00:00', '2019-05-04 14:06:39', '2019-05-04 14:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_courses`
--

CREATE TABLE `curriculum_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `curricular_id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curriculum_courses`
--

INSERT INTO `curriculum_courses` (`id`, `curricular_id`, `level`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, '1.1', 2, '2019-05-04 13:53:22', '2019-05-04 13:53:22'),
(2, 1, '1.1', 1, '2019-05-04 13:53:27', '2019-05-04 13:53:27'),
(3, 1, '1.1', 7, '2019-05-04 13:57:10', '2019-05-04 13:57:10'),
(4, 2, '1.1', 2, '2019-05-04 14:08:00', '2019-05-04 14:08:00'),
(6, 2, '1.1', 5, '2019-05-04 14:08:08', '2019-05-04 14:08:08'),
(7, 2, '1.1', 4, '2019-05-04 14:08:10', '2019-05-04 14:08:10'),
(8, 2, '1.1', 6, '2019-05-04 14:08:11', '2019-05-04 14:08:11'),
(9, 2, '1.1', 3, '2019-05-04 14:08:15', '2019-05-04 14:08:15'),
(11, 2, '1.1', 1, '2019-06-02 08:20:04', '2019-06-02 08:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_id` int(11) NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_department` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `school_id`, `department_name`, `about_department`, `start_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Department of Mathematics and Computer Science', 'The Department offers undergraduate and postgraduate degrees in Mathematics, Statistics and Operations Research and Computer Science. It also provides service modules to other Departments within the University.', '2019-04-27', '2019-04-27 11:46:54', '2019-04-27 11:46:54'),
(2, 1, 'Department of Physics, Geography and Environmental Science', 'The Department of Physics Geography and Environmental Science is a fusion of two disciplines in Earth Sciences. The Physics area offers programmes to enlighten students on the physical aspects of the universe leading to an understanding of those principle which have lead to the current technological developments driving industry and the economy. The Geography and Environmental programme is an integrated field of study designed to provide professional training and develop students capable to address research problems regarding environmental issues and resource management.', '2019-04-27', '2019-04-27 11:53:19', '2019-04-27 11:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `reporter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporting_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgency` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financials`
--

CREATE TABLE `financials` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_refrence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refrence_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financials`
--

INSERT INTO `financials` (`id`, `reg_number`, `fees_type`, `payment_type`, `bank_refrence`, `paid_by`, `amount`, `status`, `refrence_number`, `created_at`, `updated_at`) VALUES
(1, 'M190001', 'Tuition', 'Ecocash', 'FD047539.1696.P20901.', 'M190001', 250.00, 'paid', 'M1900010000000000001', '2019-05-04 11:51:59', '2019-05-04 11:51:59'),
(2, 'M190001', 'Tuition', 'Ecocash', 'IT264380.7752.S57254.', 'M190001', 250.00, 'paid', 'M1900010000000000002', '2019-05-04 11:54:48', '2019-05-04 11:54:48'),
(11, 'M190001', 'Student Wallet', 'Ecocash', 'NH157958.5006.M94986.', 'M190001', 10.00, 'paid', 'M1900010000000000003', '2019-05-04 18:06:38', '2019-05-04 18:06:38'),
(12, 'M190001', 'Student Wallet', 'Ecocash', 'KL839928.6179.T80437.', 'M190001', -5.00, 'paid', 'M1900010000000000004', '2019-05-04 18:08:02', '2019-05-04 18:08:02'),
(13, 'M190001', 'Student Wallet', 'Ecocash', 'BG545386.7811.B09308.', 'M190001', 18.00, 'paid', 'M1900010000000000005', '2019-05-04 18:09:31', '2019-05-04 18:09:31'),
(14, 'M190001', 'Graduation', 'Ecocash', 'OZ303137.0749.P69332.', 'M190001', 100.00, 'paid', 'M1900010000000000006', '2019-05-04 18:19:38', '2019-05-04 18:19:38'),
(15, 'M190001', 'Tuition', 'Ecocash', 'XK460711.6192.Y21168.', 'M190001', 1.00, 'paid', 'M1900010000000000007', '2019-05-04 18:20:02', '2019-05-04 18:20:02'),
(16, 'M190001', 'Accommodation', 'Ecocash', 'DW051112.0254.I90614.', 'M190001', 450.00, 'paid', 'M1900010000000000008', '2019-05-05 05:12:25', '2019-05-05 05:12:25'),
(17, 'M190001', 'Tuition', 'Ecocash', 'ZO048096.7713.G23811.', 'M190001', 5.00, 'paid', 'M1900010000000000009', '2019-05-05 05:23:57', '2019-05-05 05:23:57'),
(18, 'M190001', 'Tuition', 'Ecocash', 'IN268996.6198.B60679.', 'M190001', 200.00, 'paid', 'M1900010000000000010', '2019-05-22 08:28:49', '2019-05-22 08:28:49'),
(19, 'M190001', 'Student Wallet', 'Ecocash', 'MK246803.7024.Y26642.', 'M190001', 2.00, 'paid', 'M1900010000000000011', '2019-06-01 11:11:16', '2019-06-01 11:11:16'),
(20, 'M190003', 'Tuition', 'Ecocash', 'RW014232.0598.N85717.', 'M190003', 506.00, 'paid', 'M1900030000000000001', '2019-06-02 08:02:20', '2019-06-02 08:02:20'),
(21, 'M190003', 'Student Wallet', 'Ecocash', 'NC855163.0088.Z25649.', 'M190003', 200.00, 'paid', 'M1900030000000000002', '2019-06-02 08:03:04', '2019-06-02 08:03:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_26_153945_create_students_table', 1),
(4, '2019_02_27_090419_create_applicants_table', 1),
(5, '2019_02_28_090009_create_push_subscriptions_table', 1),
(6, '2019_03_05_184612_create_programmes_table', 1),
(7, '2019_04_04_160200_create_courses_table', 1),
(8, '2019_04_05_221630_create_curricula_table', 1),
(9, '2019_04_16_003628_create_emergencies_table', 1),
(10, '2019_04_25_170749_create_departments_table', 1),
(11, '2019_04_25_171204_create_schools_table', 1),
(12, '2019_04_26_142103_create_curriculum_courses_table', 1),
(13, '2019_04_27_082613_create_academic_infos_table', 1),
(18, '2019_04_27_091039_create_financials_table', 2),
(19, '2019_05_02_121804_create_venues_table', 2),
(20, '2019_05_04_165749_create_registered_students_table', 3),
(29, '2019_06_05_090708_add_columns_to_registered_students', 4),
(30, '2019_06_05_094853_create_venue_timetables_table', 4),
(31, '2019_06_05_112525_create_app_settings_table', 4),
(32, '2019_06_07_094312_create_news_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(3, 'Awesome Title', '<h4>I love coding</h4><p>This <u>is </u><b style=\"text-decoration-line: underline;\">just a </b>test message 🤭🤭 Isn\'t this cool?</p><p><font face=\"Impact\">Awesomeness</font></p>', 'Hailie Rau', '2019-06-07 08:23:10', '2019-06-07 08:23:10');
INSERT INTO `news` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(4, 'Awesome Title', '<h4><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEBLAEsAAD/4RDmRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAE7AAIAAAAFAAAIVodpAAQAAAABAAAIXJydAAEAAAAKAAAQ1OocAAcAAAgMAAAASgAAAAAc6gAAAAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFVTRVIAAAAFkAMAAgAAABQAABCqkAQAAgAAABQAABC+kpEAAgAAAAM3NAAAkpIAAgAAAAM3NAAA6hwABwAACAwAAAieAAAAABzqAAAACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAxMzoxMToyMyAwODoxOTo0NAAyMDEzOjExOjIzIDA4OjE5OjQ0AAAAVQBTAEUAUgAAAP/hCxdodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0n77u/JyBpZD0nVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkJz8+DQo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIj48cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPjxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSJ1dWlkOmZhZjViZGQ1LWJhM2QtMTFkYS1hZDMxLWQzM2Q3NTE4MmYxYiIgeG1sbnM6ZGM9Imh0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvIi8+PHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9InV1aWQ6ZmFmNWJkZDUtYmEzZC0xMWRhLWFkMzEtZDMzZDc1MTgyZjFiIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iPjx4bXA6Q3JlYXRlRGF0ZT4yMDEzLTExLTIzVDA4OjE5OjQ0LjczNzwveG1wOkNyZWF0ZURhdGU+PC9yZGY6RGVzY3JpcHRpb24+PHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9InV1aWQ6ZmFmNWJkZDUtYmEzZC0xMWRhLWFkMzEtZDMzZDc1MTgyZjFiIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iPjxkYzpjcmVhdG9yPjxyZGY6U2VxIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+PHJkZjpsaT5VU0VSPC9yZGY6bGk+PC9yZGY6U2VxPg0KCQkJPC9kYzpjcmVhdG9yPjwvcmRmOkRlc2NyaXB0aW9uPjwvcmRmOlJERj48L3g6eG1wbWV0YT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgPD94cGFja2V0IGVuZD0ndyc/Pv/bAEMAAgEBAgEB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w3l21x4m1WOzLOThf9EtRM0mfQTqa5O0+OX/AAVI/wCCi26LwT4B8SfDXw/eAfvrDQ4/Clv5bdJEvdTf7U4APW3lJPOAelfvV8Ev2Tfhb+zTatD8O/hx4F8CxyLsk/sHQrbT2lHA+dokUseOSxJPevQa/RMp8L+GcutKjhIykus7zfr7zaT9EjjqZhXnvL7tD8EPgz/waK/FT42+Kx4n/aH+OlsupXRVrpNINz4g1W5U8lXv7wxhHGT/AMs5lznBPU/ol+yZ/wAG8H7KP7I7W15Z/De38d69bYI1fxtKNamLDlXEDqLSNweQ8cCMD36Y+3aK+8jTjCKjFWS2XQ43JvUjtbWKxto4YY44YYVCRxooVUUDAAA4AA4wKkooqiQooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAzRVXSNHt9Csvs9rGY4Q7uF3FsFmLHGScDLHA6AcDAAFWqACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAP/Z\" data-filename=\"New-logo-1.jpg\" style=\"width: 25%; float: right;\" class=\"note-float-right\">I\'m Good</h4><h4>I love coding</h4><p>This <u>is </u><b style=\"text-decoration-line: underline;\">just a </b>test message 🤭🤭 Isn\'t this cool?</p><p><font face=\"Impact\">Awesomeness</font></p><p><font face=\"Impact\"><br></font></p><p><font face=\"Impact\"><br></font></p>', 'Hailie Rau', '2019-06-07 08:24:10', '2019-06-07 08:24:10');
INSERT INTO `news` (`id`, `title`, `content`, `author`, `created_at`, `updated_at`) VALUES
(5, 'AI Exam ma1', '<p>Cool stuff, <b>Nice one</b></p><p><b><br></b></p><table class=\"table table-bordered\"><tbody><tr><td>coding</td><td>cool</td></tr></tbody></table><p><b><br></b></p>', 'Hailie Rau', '2019-06-07 08:47:30', '2019-06-07 08:47:30'),
(6, 'Chapter Two', '<h1 align=\"center\" style=\"text-align:center;text-indent:0in;mso-list:none\"><a name=\"_Toc3842457\"><span style=\"font-family: Georgia, serif;\">CHAPTER 2: FEASIBILITY STUDY</span></a><span style=\"font-family:&quot;Georgia&quot;,serif;\nmso-bidi-font-family:&quot;Times New Roman&quot;\"><o:p></o:p></span></h1><h2><a name=\"_Toc3842458\"><!--[if !supportLists]-->1.0<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span><!--[endif]-->INTRODUCTION</a><o:p></o:p></h2><p class=\"MsoNormal\">Feasibility study refers to the study, done by the\nresearchers or development team to evaluate whether the resources available are\nright to implement a particular project, in other words it is a study to find\nout whether the system is worth implementing within the given resources (time,\nmoney, labour, etc.). According to <i>Ian Sommerville\n(2008), </i>the results of the feasibility study should be a report that\nrecommends whether or not it is worth carrying on with the system development\nprocess.<o:p></o:p></p><p class=\"MsoNormal\">To come up with a clear feasibility study report that the analyst\nor the decision makers may depend upon to make a continue or halt decision, the\nresearcher has to conduct Organizational, Technical, Economic, Schedule and\nOperation feasibility study.<o:p></o:p></p><h2><a name=\"_Toc3842459\"><!--[if !supportLists]--><span style=\"font-size: 12pt; line-height: 107%;\">1.1<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span><!--[endif]--><span style=\"font-size: 12pt; line-height: 107%;\">ORGANIZATIONAL FEASIBILITY</span></a><span style=\"font-size: 12pt; line-height: 107%;\"><o:p></o:p></span></h2><p class=\"MsoNormal\">The aim of organizational feasibility study is to answer\nquestions like, does the proposed system contribute to the overall objectives\nof the organization. It focuses mainly on how people within the organization\nwill adapt to this planned organizational change. How will people and the way\nthey do their jobs be impacted? Will they accept this change willingly? Will\nbusiness be disrupted while the proposed solution is implemented? <o:p></o:p></p><p>\n\n\n\n\n\n\n\n\n\n\n\n</p><p class=\"MsoNormal\">Statistics of students who are using mobile phones states\nthat students spend many hours per day on their mobile phones and the number of\norganizations which adopt and develop the mobile version or their system for\ntheir users, it clearly shows that people will easily and quickly adapt to the GZU\nStudent Portal mobile application and also the fact that the web version of the\nGZU Student Portal will remain un touched and functioning the project is\norganizationally feasible.&nbsp;&nbsp;<o:p></o:p></p>', 'Hailie Rau', '2019-06-07 08:49:53', '2019-06-07 08:49:53');

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
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `programme_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduate_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees_new` double(8,2) NOT NULL,
  `fees_returning` double(8,2) NOT NULL,
  `conventional_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `normal_entry_requirements` longtext COLLATE utf8mb4_unicode_ci,
  `mature_entry_requirements` longtext COLLATE utf8mb4_unicode_ci,
  `special_entry_requirements` longtext COLLATE utf8mb4_unicode_ci,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `department_id`, `programme_code`, `graduate_level`, `programme_name`, `fees_new`, `fees_returning`, `conventional_duration`, `block_duration`, `normal_entry_requirements`, `mature_entry_requirements`, `special_entry_requirements`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'GZU0001', 'UNDERGRADUATE', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [COMPUTER SCIENCE]', 701.00, 691.00, '4 Years', '3 Years', 'At least 5 ‘O’ level passes including English Language , Mathematics and any Science Subject\nAt least two ‘A’ level passes in Mathematics and any other ‘A’ level subject or either ‘A’ level Computer Science.', NULL, 'Higher National Diploma in Computer Studies or its equivalent.', NULL, '2019-04-27 11:48:59', '2019-04-27 11:48:59'),
(2, 1, 'GZU0002', 'UNDERGRADUATE', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [MATHEMATICS]', 701.00, 691.00, '4 Years', '3 Years', 'At least 5 ‘O’ level passes including English Language , Mathematics and any Science Subject\nAt least two ‘A’ level passes in Mathematics and any other ‘A’ level subject.', NULL, 'Other relevant qualifications.', NULL, '2019-04-27 11:50:37', '2019-04-27 11:50:37'),
(3, 1, 'GZU0003', 'UNDERGRADUATE', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [STATISTICS AND OPERATIONS RESEARCH]', 701.00, 691.00, '4 Years', '3 Years', 'At least 5 ‘O’ level passes including English Language , Mathematics and any Science Subject\nAt least two ‘A’ level passes in Mathematics and any other ‘A’ level subject.', NULL, 'Other relevant qualifications.', NULL, '2019-04-27 11:52:06', '2019-04-27 11:52:06'),
(4, 2, 'GZU0004', 'UNDERGRADUATE', 'BACHELOR OF SCIENCE SPECIAL HONOURS DEGREE [GEOGRAPHY AND ENVIRONMENTAL SCIENCE]', 701.00, 691.00, '4 Years', '3 Years', 'Passes with credit in at least five Ordinary Level subjects including English,     Mathematics and any Science subject.\nShould have obtained a Pass in ‘A’ Level Geography and any other ‘A’  level subject or their recognized equivalents', NULL, 'Under special conditions, a candidate holding other relevant qualifications would also be considered eligible for entry into the programme.', NULL, '2019-04-27 11:55:16', '2019-04-27 11:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `endpoint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public_key` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_token` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `push_subscriptions`
--

INSERT INTO `push_subscriptions` (`id`, `user_id`, `endpoint`, `public_key`, `auth_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://fcm.googleapis.com/fcm/send/fs5OJ12e79g:APA91bGN649Oz4p1zn0hs_3YGcdU5AqbLWyDm5LGEOjgGJ8sRJbvDeNOY-11xXllWzEsZ7RSaoNKhqF_wAxdVVihCJbiFg-dybTe4fPSSAcDSbqfaaaTWoNBEoSCmDq_lJy0uEb9qnGK', 'BHGGdYA0nrR6x1swkwRuvi9ITL5ruC6X1Vt9kP6hybe_qCIM_Ur4Sc_fiL1G8k42KZYM3BbRpCOb0NQzTi7UiH4', 'jroRVfAp4BFFVceQ-3466w', '2019-06-02 23:26:12', '2019-06-02 23:26:12'),
(2, 2, 'https://fcm.googleapis.com/fcm/send/ctvWtSzzW84:APA91bEiTu_Dy4DS7TJsw3RQCFkWfO3c_HvNyKo2B1XPVdBS-7az2IlKMDPvmz3e_V0Q1zHR1tqMkG01uh10zyQ8jVTCDTXDL8al_1BRh8DQqXgCuu64t7kJox-N827Dj7b_MegZb0zL', 'BGsVjrX98YsMFsqYZG08sq9Hf8e2bOyP3DVAUDyAU6yDsygpFiFNi_TKh1uSjCHzW_bjhdZ-ru0yYcaaB_f-l6M', 'ES17yY6c5sekJ3VZodGWEA', '2019-06-05 12:45:46', '2019-06-05 12:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `registered_students`
--

CREATE TABLE `registered_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_date` timestamp NULL DEFAULT NULL,
  `venue_id` int(10) UNSIGNED DEFAULT NULL,
  `sitting_position` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_students`
--

INSERT INTO `registered_students` (`id`, `reg_number`, `course_id`, `course_code`, `exam_date`, `venue_id`, `sitting_position`, `status`, `created_at`, `updated_at`) VALUES
(80, 'M190001', 2, 'BHS110', '2019-06-25 12:00:00', 1, 1, 0, '2019-06-02 22:20:08', '2019-06-07 08:31:20'),
(81, 'M190001', 5, 'HGGES102', '2019-06-26 07:00:00', 1, 1, 0, '2019-06-02 22:20:08', '2019-06-07 08:31:21'),
(82, 'M190001', 4, 'HGGES103', '2019-06-26 12:00:00', 1, 1, 0, '2019-06-02 22:20:09', '2019-06-07 08:31:21'),
(83, 'M190001', 3, 'HGGES111', '2019-06-27 07:00:00', 1, 1, 0, '2019-06-02 22:20:09', '2019-06-07 08:31:21'),
(84, 'M190001', 1, 'HCS101', '2019-06-24 12:00:00', 1, 1, 0, '2019-06-02 22:20:09', '2019-06-07 08:31:22'),
(89, 'M190003', 2, 'BHS110', '2019-06-25 12:00:00', 1, 2, 0, '2019-06-06 11:02:29', '2019-06-07 08:31:21'),
(90, 'M190003', 5, 'HGGES102', '2019-06-26 07:00:00', 1, 2, 0, '2019-06-06 11:02:29', '2019-06-07 08:31:21'),
(91, 'M190003', 6, 'HGGES108', '2019-06-25 07:00:00', 1, 1, 0, '2019-06-06 11:02:29', '2019-06-07 08:31:22'),
(92, 'M190003', 3, 'HGGES111', '2019-06-27 07:00:00', 1, 2, 0, '2019-06-06 11:02:29', '2019-06-07 08:31:22'),
(93, 'M190003', 1, 'HCS101', '2019-06-24 12:00:00', 1, 2, 0, '2019-06-06 11:02:29', '2019-06-07 08:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `about_school` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `start_date`, `about_school`, `created_at`, `updated_at`) VALUES
(1, 'Gary Magadzire School Of Agriculture And Natural Sciences', '2019-04-27', NULL, '2019-04-27 11:46:27', '2019-04-27 11:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicant_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programme_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `intake_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `applicant_id`, `reg_number`, `name`, `gender`, `phone`, `email`, `programme_id`, `enrolled_at`, `intake_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'M190001', 'Josiah Munapo', 'Male', '0775696233', 'jmunapo@gmail.com', '4', '2019-07-31 22:00:00', 'Full time', '$2y$10$b8jWV.VhtBvd5U6YxsNP.eqsJ6M/eRHTsNJ1iAgMj52BbMjzAhxD2', 'CgDEEEb5SZ', '2019-04-27 12:18:24', '2019-04-27 12:18:24'),
(2, '2', 'M190002', '45h4 45h', 'Male', 'erhee', 'erh', '3', '2019-07-31 22:00:00', 'Full time', '$2y$10$5pyupdzikEtMOjpVHcJfM.g0t0TW8KwrdZS7UXu.CCtT/7eCp9ADW', '33fbRZKWgb', '2019-05-22 08:50:12', '2019-05-22 08:50:12'),
(3, '3', 'M190003', 'Sibongile Simango', 'Female', '0775261526', 'sibongilesimango8@gmail.com', '4', '2019-07-31 22:00:00', 'Full time', '$2y$10$4D.m0IEwejsnaUGs5Vpdiu7KvwI7K/aG65KJcidt1cH3Oi.jJVPpi', 'wD77OHnHgz', '2019-06-02 08:00:18', '2019-06-02 08:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `name`, `gender`, `email`, `phone`, `job_title`, `role`, `joining_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'E190001', 'Joe Mags', 'Male', 'joe@joemags.co.zw', '+263775696233', 'IT Manager', 'Manager', '2019-06-07 18:40:44', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'wAW8Pv6qeg', '2019-04-27 11:41:24', '2019-04-27 11:41:24'),
(2, 'E190002', 'Hardlife Ngidza', 'Male', 'ngidza83@gmail.com', '+263775364020', 'Project Manager', 'Webmaster', '2019-06-07 19:02:38', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'NGibMouTbopX6nJKPjQdR0H2bJGNbaoNFWk7vrpBLl5A2eGCmH87lh5apdEL', '2019-04-27 11:41:24', '2019-04-27 11:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(10) UNSIGNED NOT NULL,
  `venue_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `vacants` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue_key`, `venue_name`, `capacity`, `vacants`, `created_at`, `updated_at`) VALUES
(1, 'DT1', 'Down Town 3', 150, 300, '2019-05-05 19:57:38', '2019-05-05 19:57:38'),
(2, 'AUD1', 'Auditorium 1', 500, 1000, '2019-06-02 23:26:55', '2019-06-02 23:26:55'),
(3, 'S1S2', 'S1S2', 55, 110, '2019-06-05 04:43:02', '2019-06-05 05:56:36'),
(4, 'NB1', 'New Block 1', 40, 80, '2019-06-05 10:35:53', '2019-06-05 10:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `venue_timetables`
--

CREATE TABLE `venue_timetables` (
  `id` int(10) UNSIGNED NOT NULL,
  `venue_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `group_size` int(10) UNSIGNED NOT NULL,
  `exam_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venue_timetables`
--

INSERT INTO `venue_timetables` (`id`, `venue_id`, `course_id`, `group_size`, `exam_date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 7, '2019-06-25 12:00:00', '2019-06-06 11:24:25', '2019-06-07 08:31:19'),
(2, 1, 5, 7, '2019-06-26 07:00:00', '2019-06-06 11:24:25', '2019-06-07 08:31:21'),
(3, 1, 4, 6, '2019-06-26 12:00:00', '2019-06-06 11:24:26', '2019-06-07 08:31:21'),
(4, 1, 3, 7, '2019-06-27 07:00:00', '2019-06-06 11:24:26', '2019-06-07 08:31:21'),
(5, 1, 1, 7, '2019-06-24 12:00:00', '2019-06-06 11:24:26', '2019-06-07 08:31:22'),
(6, 1, 6, 6, '2019-06-25 07:00:00', '2019-06-06 11:24:27', '2019-06-07 08:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_infos`
--
ALTER TABLE `academic_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_infos_reg_number_unique` (`reg_number`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- Indexes for table `curricula`
--
ALTER TABLE `curricula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum_courses`
--
ALTER TABLE `curriculum_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financials`
--
ALTER TABLE `financials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `financials_refrence_number_unique` (`refrence_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `push_subscriptions_endpoint_unique` (`endpoint`),
  ADD KEY `push_subscriptions_user_id_index` (`user_id`);

--
-- Indexes for table `registered_students`
--
ALTER TABLE `registered_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_reg_number_unique` (`reg_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_staff_id_unique` (`staff_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue_timetables`
--
ALTER TABLE `venue_timetables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_infos`
--
ALTER TABLE `academic_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `curricula`
--
ALTER TABLE `curricula`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `curriculum_courses`
--
ALTER TABLE `curriculum_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financials`
--
ALTER TABLE `financials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registered_students`
--
ALTER TABLE `registered_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue_timetables`
--
ALTER TABLE `venue_timetables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD CONSTRAINT `push_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
