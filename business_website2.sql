-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2025 at 08:07 AM
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
  `facebook_link` text DEFAULT NULL,
  `tiktok_link` text DEFAULT NULL,
  `youtube_link` text DEFAULT NULL,
  `instagram_link` text DEFAULT NULL,
  `linkedin_link` text DEFAULT NULL,
  `google_maps_embed_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `tagline`, `street`, `city`, `province`, `postal_code`, `country`, `phone_number`, `whatsapp_number`, `contact_email`, `facebook_link`, `tiktok_link`, `youtube_link`, `instagram_link`, `linkedin_link`, `google_maps_embed_link`) VALUES
(1, 'Tigatra Adikara', 'PT Tigatra Adikara menyediakan solusi komprehensif untuk Infrastruktur IT, serta pemasaran dan dukungan untuk Hardware dan Software terkemuka.', 'Jl. Pattimura No. 46 RT. 14', 'Kelurahan Api-api - Kecamatan Bontang Utara', 'Bontang - Kalimantan Timur', '75311', 'Indonesia', '(+021)', '6281346212675', 'infotigatra@gmail.com', 'https://web.facebook.com/?locale=id_ID&_rdc=1&_rdr#', 'https://www.tiktok.com/id-ID/', 'https://www.youtube.com/', 'https://www.instagram.com/tigatra_adikara/', 'https://id.linkedin.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8080471139633!2d117.49504308597604!3d0.13002134425753778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320a0d80fa9db50d%3A0x97e12d0f735958ed!2sJl.%20Pattimura%20No.46%2C%20Api-Api%2C%20Kec.%20Bontang%20Utara%2C%20Kota%20Bontang%2C%20Kalimantan%20Timur%2075313!5e0!3m2!1sid!2sid!4v1753522647058!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `first_name`, `last_name`, `email`, `company_name`, `address`, `city`, `phone_number`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(3, 'Shani', 'Indira', 'shn@gmail.com', 'PT. JOT', 'Sleman', 'Jogjakarta', '081348481212', 'Haiii', 1, '2025-07-30 06:47:51', '2025-07-30 06:56:51'),
(4, 'Sisca', 'Saras', 'sisca@gmail.com', 'PT. JOT', 'Baturetno', 'Wonogiri', '081340298475', 'Haloo', 1, '2025-07-30 07:38:20', '2025-07-30 07:38:35'),
(9, 'Nindi', 'Julitasari', 'nindi@gmail.com', 'Tigatra Adikara', 'Indonesia', 'Jogjakarta', '08111111111', 'Halo', 1, '2025-07-30 08:16:31', '2025-07-30 08:16:40');

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
(16, 'MSI MAG B550 Tomahawk', 'Mainboard untuk prosesor AMD Ryzen dengan performa tinggi dan dukungan fitur gaming seperti dual M.2, heatsink besar, dan jaringan cepat.', 'MSI MAG B550 Tomahawk adalah mainboard ATX dengan socket AM4 untuk prosesor AMD Ryzen. Mendukung RAM DDR4 hingga 128GB, dilengkapi 2 slot M.2, 6 port SATA, PCIe 4.0, LAN 2.5G, dan audio 7.1 channel. Cocok untuk gaming dan performa tinggi.', 'hardware', 'produk/Z3bcFI1SQ1OZEcClA4yuRTmOGudGfPmkeB7LqAnI.jpg', '2025-07-29 09:25:45', '2025-07-29 09:25:45'),
(17, 'TigaRouter X100', 'Router dual-band untuk kantor dan rumah.', '2.4GHz & 5GHz, 4 port LAN, 1 port WAN', 'hardware', 'produk/98jXxqN6gC9Vb9PURLLBHvF9OiAZA9r5RTp9inX2.jpg', '2025-07-29 09:26:07', '2025-07-29 09:26:07'),
(18, 'TP-Link EAP245', 'TP-Link EAP245 adalah access point kelas bisnis dengan performa tinggi, mendukung WiFi dual band dan teknologi MU-MIMO. Cocok untuk penggunaan di kantor, sekolah, atau area publik lainnya yang membutuhkan koneksi stabil dan cepat.', 'TP-Link EAP245 adalah access point dual-band dengan kecepatan hingga 1750 Mbps, mendukung MU-MIMO, PoE, dan manajemen lewat Omada Controller. Cocok untuk jaringan kantor atau bisnis skala menengah.', 'hardware', 'produk/69HKpg45ysddMvUNk9pKmys1f8jlvswlZ8V59l3V.jpg', '2025-07-29 09:26:25', '2025-07-29 09:26:25'),
(19, 'Visual Studio Code', 'Editor kode sumber ringan dan fleksibel untuk berbagai bahasa pemrograman.', 'Aplikasi ini tersedia di platform Windows, macOS, dan Linux, dilengkapi dengan fitur seperti penyorotan sintaks, debugging, terminal bawaan, serta beragam ekstensi yang dapat diinstal sesuai kebutuhan pengembangan. Mendukung berbagai bahasa pemrograman seperti JavaScript, Python, dan C++', 'software', 'produk/gyQRoqw5AytjOYMI1b7pk8uErw2OGtHxuMQ4MeCX.jpg', '2025-07-29 09:37:35', '2025-07-29 09:37:35'),
(20, 'Adobe Photoshop', 'Adobe Photoshop CC merupakan perangkat lunak pengeditan gambar profesional yang banyak digunakan untuk desain grafis dan manipulasi foto.', 'Tersedia untuk Windows dan macOS, aplikasi ini mendukung format seperti PSD, JPEG, PNG, dan TIFF. Fitur-fitur utamanya meliputi penggunaan layer, masking, smart objects, dan beragam tools brush serta filter efek visual yang canggih.', 'software', 'produk/WbfbCwWvqELoirQb0O61XDyqcahnCZ1QdlX5sk7O.jpg', '2025-07-29 09:38:04', '2025-07-29 09:38:04'),
(21, 'Smart CCTV X-Guard 360', 'Smart CCTV X-Guard 360 adalah kamera pengawas pintar beresolusi 1080p Full HD dengan sudut pandang 360°.', 'Dilengkapi fitur night vision dan motion detection, kamera ini juga terhubung ke aplikasi mobile melalui koneksi Wi-Fi dan mendukung penyimpanan cloud, cocok untuk pemantauan rumah atau kantor secara real-time.', 'hardware', 'produk/DjR0PE281dQ95Id2E5Dhn0S35a4eImQgy2KBfNRB.jpg', '2025-07-29 09:38:30', '2025-07-29 10:04:52'),
(22, 'MikroTik hAP ac² Indoor Route', 'MikroTik hAP ac² adalah router indoor dual-band dengan CPU quad-core 716 MHz dan RAM 128 MB.', 'Perangkat ini memiliki lima port Gigabit Ethernet, satu port USB, dan mendukung koneksi nirkabel pada frekuensi 2.4 GHz dan 5 GHz. Berbasis sistem operasi RouterOS Level 4, router ini menawarkan fitur seperti manajemen bandwidth, firewall, dan dukungan VPN untuk keperluan jaringan rumahan maupun kantor kecil.', 'hardware', 'produk/5WBmxK9lqxGYs7NXD8iLJNXsCEl79RNysUdoKAq2.jpg', '2025-07-29 09:38:53', '2025-07-29 09:38:53');

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

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `vendor_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `logo_path`, `alt_text`, `vendor_category_id`, `created_at`, `updated_at`) VALUES
(8, 'Acer', 'vendors/logos/tkU2zDMz2SYNyY0PNcCrIXc53JJhEA9ycC5QpDiL.png', 'acer', 5, '2025-07-31 23:06:38', '2025-07-31 23:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_categories`
--

INSERT INTO `vendor_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'PC & Computing', '2025-07-31 23:06:27', '2025-07-31 23:06:27');

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
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
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
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_category` (`vendor_category_id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `fk_vendor_category` FOREIGN KEY (`vendor_category_id`) REFERENCES `vendor_categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
