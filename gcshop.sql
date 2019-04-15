-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 01:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_number_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` double(10,2) NOT NULL,
  `selling_price` double(10,2) NOT NULL,
  `max_possible_discount` double(8,2) DEFAULT NULL,
  `current_discount` double(8,2) DEFAULT NULL,
  `maker_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `engine_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `consumer` int(10) UNSIGNED NOT NULL,
  `part_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_bookings`
--

CREATE TABLE `car_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_advance` double(10,2) NOT NULL,
  `consumer` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_engines`
--

CREATE TABLE `car_engines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deatil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_type` enum('Petrol','Diesel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_makers`
--

CREATE TABLE `car_makers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deatil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maker_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_sub_categories`
--

CREATE TABLE `category_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `sub_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

CREATE TABLE `consumers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_number_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `uri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_group` int(10) UNSIGNED NOT NULL,
  `sold_at` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `consumer` int(10) UNSIGNED NOT NULL,
  `part_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_infos`
--

CREATE TABLE `loan_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `consumer` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `proffesion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_of_national_id` int(10) UNSIGNED DEFAULT NULL,
  `copy_of_passport` int(10) UNSIGNED DEFAULT NULL,
  `copy_of_bank_statment` int(10) UNSIGNED DEFAULT NULL,
  `copy_of_tax_clearence` int(10) UNSIGNED DEFAULT NULL,
  `additional` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_07_11_000100_create_images_table', 1),
(3, '2018_07_11_020738_create_addresses_table', 1),
(4, '2018_07_11_021147_create_show_rooms_table', 1),
(5, '2018_07_11_023429_create_phone_numbers_table', 1),
(6, '2018_07_11_025545_create_roles_table', 1),
(7, '2018_07_11_070303_create_admins_table', 1),
(8, '2018_07_11_070501_create_show_room_staffs_table', 1),
(9, '2018_07_11_070629_create_consumers_table', 1),
(10, '2018_07_15_182446_create_product_inventories_table', 1),
(11, '2018_07_15_185129_create_car_makers_table', 1),
(12, '2018_07_15_185130_create_car_models_table', 1),
(13, '2018_07_15_185147_create_car_engines_table', 1),
(14, '2018_07_15_185148_create_cars_table', 1),
(15, '2018_07_15_185251_create_part_manufacturers_table', 1),
(16, '2018_07_15_185315_create_part_categories_table', 1),
(17, '2018_07_15_185327_create_part_sub_categories_table', 1),
(18, '2018_07_15_185328_create_parts_table', 1),
(19, '2018_07_15_185356_create_product_details_table', 1),
(20, '2018_07_15_185837_create_carts_table', 1),
(21, '2018_07_15_190009_create_loan_infos_table', 1),
(22, '2018_07_15_190315_create_car_bookings_table', 1),
(23, '2018_07_15_190339_create_invoices_table', 1),
(24, '2018_07_16_095838_create_parts_for_cars_table', 1),
(25, '2018_07_16_103122_create_category_sub_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` double(10,2) NOT NULL,
  `selling_price` double(10,2) NOT NULL,
  `max_possible_discount` double(8,2) DEFAULT NULL,
  `current_discount` double(8,2) DEFAULT NULL,
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts_for_cars`
--

CREATE TABLE `parts_for_cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `part` int(10) UNSIGNED NOT NULL,
  `car_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `part_categories`
--

CREATE TABLE `part_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `part_manufacturers`
--

CREATE TABLE `part_manufacturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `part_sub_categories`
--

CREATE TABLE `part_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type` enum('car','part') COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `detail_criteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type` enum('car','part') COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `showroom_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_as` enum('admin','showroom staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_rooms`
--

CREATE TABLE `show_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` int(10) UNSIGNED DEFAULT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_room_staffs`
--

CREATE TABLE `show_room_staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `showroom_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_number_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_role_id_foreign` (`role_id`),
  ADD KEY `admins_address_id_foreign` (`address_id`),
  ADD KEY `admins_phone_number_id_foreign` (`phone_number_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_maker_id_foreign` (`maker_id`),
  ADD KEY `cars_model_id_foreign` (`model_id`),
  ADD KEY `cars_engine_id_foreign` (`engine_id`),
  ADD KEY `cars_image_id_foreign` (`image_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_consumer_foreign` (`consumer`),
  ADD KEY `carts_part_id_foreign` (`part_id`);

--
-- Indexes for table `car_bookings`
--
ALTER TABLE `car_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_bookings_consumer_foreign` (`consumer`),
  ADD KEY `car_bookings_car_id_foreign` (`car_id`);

--
-- Indexes for table `car_engines`
--
ALTER TABLE `car_engines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_engines_name_unique` (`name`),
  ADD KEY `car_engines_image_foreign` (`image`);

--
-- Indexes for table `car_makers`
--
ALTER TABLE `car_makers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_makers_name_unique` (`name`),
  ADD KEY `car_makers_logo_foreign` (`logo`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_models_maker_id_foreign` (`maker_id`),
  ADD KEY `car_models_image_id_foreign` (`image_id`);

--
-- Indexes for table `category_sub_categories`
--
ALTER TABLE `category_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_sub_categories_category_foreign` (`category`),
  ADD KEY `category_sub_categories_sub_category_foreign` (`sub_category`);

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `consumers_email_unique` (`email`),
  ADD KEY `consumers_address_id_foreign` (`address_id`),
  ADD KEY `consumers_phone_number_id_foreign` (`phone_number_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_consumer_foreign` (`consumer`),
  ADD KEY `invoices_part_id_foreign` (`part_id`);

--
-- Indexes for table `loan_infos`
--
ALTER TABLE `loan_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_infos_consumer_foreign` (`consumer`),
  ADD KEY `loan_infos_car_id_foreign` (`car_id`),
  ADD KEY `loan_infos_copy_of_national_id_foreign` (`copy_of_national_id`),
  ADD KEY `loan_infos_copy_of_passport_foreign` (`copy_of_passport`),
  ADD KEY `loan_infos_copy_of_bank_statment_foreign` (`copy_of_bank_statment`),
  ADD KEY `loan_infos_copy_of_tax_clearence_foreign` (`copy_of_tax_clearence`),
  ADD KEY `loan_infos_additional_foreign` (`additional`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_manufacturer_id_foreign` (`manufacturer_id`),
  ADD KEY `parts_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `parts_image_id_foreign` (`image_id`);

--
-- Indexes for table `parts_for_cars`
--
ALTER TABLE `parts_for_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_for_cars_part_foreign` (`part`);

--
-- Indexes for table `part_categories`
--
ALTER TABLE `part_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part_categories_name_unique` (`name`);

--
-- Indexes for table `part_manufacturers`
--
ALTER TABLE `part_manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part_manufacturers_name_unique` (`name`),
  ADD KEY `part_manufacturers_logo_foreign` (`logo`);

--
-- Indexes for table `part_sub_categories`
--
ALTER TABLE `part_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part_sub_categories_name_unique` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_inventories_showroom_id_foreign` (`showroom_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_title_unique` (`title`);

--
-- Indexes for table `show_rooms`
--
ALTER TABLE `show_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_rooms_logo_foreign` (`logo`),
  ADD KEY `show_rooms_address_id_foreign` (`address_id`);

--
-- Indexes for table `show_room_staffs`
--
ALTER TABLE `show_room_staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `show_room_staffs_email_unique` (`email`),
  ADD KEY `show_room_staffs_role_id_foreign` (`role_id`),
  ADD KEY `show_room_staffs_showroom_id_foreign` (`showroom_id`),
  ADD KEY `show_room_staffs_address_id_foreign` (`address_id`),
  ADD KEY `show_room_staffs_phone_number_id_foreign` (`phone_number_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_bookings`
--
ALTER TABLE `car_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_engines`
--
ALTER TABLE `car_engines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_makers`
--
ALTER TABLE `car_makers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_sub_categories`
--
ALTER TABLE `category_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumers`
--
ALTER TABLE `consumers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_infos`
--
ALTER TABLE `loan_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts_for_cars`
--
ALTER TABLE `parts_for_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_categories`
--
ALTER TABLE `part_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_manufacturers`
--
ALTER TABLE `part_manufacturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_sub_categories`
--
ALTER TABLE `part_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_rooms`
--
ALTER TABLE `show_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_room_staffs`
--
ALTER TABLE `show_room_staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_phone_number_id_foreign` FOREIGN KEY (`phone_number_id`) REFERENCES `phone_numbers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_engine_id_foreign` FOREIGN KEY (`engine_id`) REFERENCES `car_engines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_maker_id_foreign` FOREIGN KEY (`maker_id`) REFERENCES `car_makers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `car_models` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `consumers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_bookings`
--
ALTER TABLE `car_bookings`
  ADD CONSTRAINT `car_bookings_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_bookings_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `consumers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_engines`
--
ALTER TABLE `car_engines`
  ADD CONSTRAINT `car_engines_image_foreign` FOREIGN KEY (`image`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_makers`
--
ALTER TABLE `car_makers`
  ADD CONSTRAINT `car_makers_logo_foreign` FOREIGN KEY (`logo`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_models_maker_id_foreign` FOREIGN KEY (`maker_id`) REFERENCES `car_makers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_sub_categories`
--
ALTER TABLE `category_sub_categories`
  ADD CONSTRAINT `category_sub_categories_category_foreign` FOREIGN KEY (`category`) REFERENCES `part_categories` (`id`),
  ADD CONSTRAINT `category_sub_categories_sub_category_foreign` FOREIGN KEY (`sub_category`) REFERENCES `part_sub_categories` (`id`);

--
-- Constraints for table `consumers`
--
ALTER TABLE `consumers`
  ADD CONSTRAINT `consumers_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consumers_phone_number_id_foreign` FOREIGN KEY (`phone_number_id`) REFERENCES `phone_numbers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `consumers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loan_infos`
--
ALTER TABLE `loan_infos`
  ADD CONSTRAINT `loan_infos_additional_foreign` FOREIGN KEY (`additional`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_infos_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_infos_consumer_foreign` FOREIGN KEY (`consumer`) REFERENCES `consumers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_infos_copy_of_bank_statment_foreign` FOREIGN KEY (`copy_of_bank_statment`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_infos_copy_of_national_id_foreign` FOREIGN KEY (`copy_of_national_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_infos_copy_of_passport_foreign` FOREIGN KEY (`copy_of_passport`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_infos_copy_of_tax_clearence_foreign` FOREIGN KEY (`copy_of_tax_clearence`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parts_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `part_manufacturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parts_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `part_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parts_for_cars`
--
ALTER TABLE `parts_for_cars`
  ADD CONSTRAINT `parts_for_cars_part_foreign` FOREIGN KEY (`part`) REFERENCES `parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `part_manufacturers`
--
ALTER TABLE `part_manufacturers`
  ADD CONSTRAINT `part_manufacturers_logo_foreign` FOREIGN KEY (`logo`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD CONSTRAINT `product_inventories_showroom_id_foreign` FOREIGN KEY (`showroom_id`) REFERENCES `show_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `show_rooms`
--
ALTER TABLE `show_rooms`
  ADD CONSTRAINT `show_rooms_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_rooms_logo_foreign` FOREIGN KEY (`logo`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `show_room_staffs`
--
ALTER TABLE `show_room_staffs`
  ADD CONSTRAINT `show_room_staffs_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_room_staffs_phone_number_id_foreign` FOREIGN KEY (`phone_number_id`) REFERENCES `phone_numbers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_room_staffs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `show_room_staffs_showroom_id_foreign` FOREIGN KEY (`showroom_id`) REFERENCES `show_rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
