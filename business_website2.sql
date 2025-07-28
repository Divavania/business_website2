-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 02:37 PM
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
-- Database: `business_website2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `sejarah`, `visi`, `misi`, `deskripsi`) VALUES
(1, 'Didirikan pada tahun 2017, CV Tigatra Adikara memulai langkahnya sebagai penyedia perangkat jaringan lokal. Seiring berjalannya waktu, kami berkembang menjadi perusahaan teknologi lengkap yang melayani ratusan klien di seluruh Indonesia.', 'Menjadi pemimpin inovasi teknologi IT di Asia Tenggara', '• Memberikan solusi teknologi terpercaya.\r\n• Meningkatkan efisiensi bisnis klien melalui digitalisasi.\r\n• Menyediakan layanan pelanggan yang profesional dan cepat tanggap.', 'CV Tigatra Adikara adalah perusahaan yang bergerak di bidang infrastruktur IT serta pemasaran hardware dan software terkemuka di Indonesia. Kami menyediakan solusi teknologi yang inovatif dan terpercaya untuk kebutuhan bisnis modern.');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `tagline` text NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `whatsapp_number` varchar(50) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `linkedin_link` text DEFAULT NULL,
  `google_maps_embed_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `tagline`, `street`, `city`, `province`, `postal_code`, `country`, `phone_number`, `whatsapp_number`, `contact_email`, `instagram_link`, `linkedin_link`, `google_maps_embed_link`) VALUES
(1, 'Tigatra Adikara', 'PT Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.', 'Jl. Pattimura No. 46 RT. 14', 'Kelurahan Api-api - Kecamatan Bontang Utara', 'Bontang - Kalimantan Timur', '75311', 'Indonesia', NULL, '6281330270908', 'infotigatra@gmail.com', 'https://www.instagram.com/tigatra_adikara/', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8080471139633!2d117.49504308597604!3d0.13002134425753778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320a0d80fa9db50d%3A0x97e12d0f735958ed!2sJl.%20Pattimura%20No.46%2C%20Api-Api%2C%20Kec.%20Bontang%20Utara%2C%20Kota%20Bontang%2C%20Kalimantan%20Timur%2075313!5e0!3m2!1sid!2sid!4v1753522647058!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `kategori` enum('hardware','software') NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `deskripsi`, `spesifikasi`, `kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(11, 'TigaRouter X100', 'Router dual-band untuk kantor dan rumah.', '2.4GHz & 5GHz, 4 port LAN, 1 port WAN', 'hardware', 'produk/yjbhWhmrthRpogLkTaahJ5Mtmsdoniv26n41f2l8.jpg', '2025-07-25 20:57:23', '2025-07-25 21:03:37'),
(12, 'TigaServer Pro', 'Server mini untuk kebutuhan bisnis kecil.', 'Intel Xeon, 16GB RAM, 1TB SSD', 'hardware', 'produk/m67FPaTy906bhFvxmN1MtUZBI4nESBr7NOGG4HAg.jpg', '2025-07-25 20:58:01', '2025-07-25 21:03:55'),
(14, 'Software ERP Tigatra', 'Sistem ERP berbasis web untuk manajemen bisnis.', 'Modul HR, Inventori, Akuntansi, CRM', 'software', 'produk/ZZ978Vj95zQrVXS6fWunAibkDbyAulPW1bd2dxVu.jpg', '2025-07-25 20:58:58', '2025-07-25 21:04:32'),
(15, 'Anti Virus', NULL, NULL, 'software', NULL, '2025-07-27 19:28:36', '2025-07-27 19:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `service_centers`
--

CREATE TABLE `service_centers` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `waktu_pelayanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_centers`
--

INSERT INTO `service_centers` (`id`, `nama`, `alamat`, `waktu_pelayanan`) VALUES
(3, 'Tigatra Service Jakarta', 'Jl. Teknologi No. 10, Jakarta Selatan', 'Senin–Jumat, 09.00–17.00'),
(4, 'Tigatra Service Bandung', 'Jl. Inovasi No. 21, Bandung', 'Senin–Sabtu, 08.00–16.00'),
(5, 'Tigatra Service Surabaya', 'Jl. Digital No. 33, Surabaya', 'Senin–Jumat, 09.00–17.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '$2y$10$smifxYv2Fs0mJ/k24pI.6OBidRnZhkJdhW.OPd151m9GPOqW7UDTC', 'superadmin'),
(3, 'Nindi', 'nindi@gmail.com', '$2y$10$xy2JQGnNd9VMeXDdmyPzZesceONe0iuZxZ.XLfnCqw.xgR.kSfO4G', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_centers`
--
ALTER TABLE `service_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service_centers`
--
ALTER TABLE `service_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
