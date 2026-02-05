-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2026 pada 09.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_website4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about_us`
--

INSERT INTO `about_us` (`id`, `sejarah`, `visi`, `misi`, `deskripsi`) VALUES
(1, 'CV. Tigatra adalah perusahaan IT Support dan General Supplier dengan berbagai macam pengalaman khususnya di bidang Teknologi Informatika (IT). Kami terus mengembangkan kompetensi dan pengalaman dalam bisnis ini, mulai dari maintenance, reparation, networking system hingga pengadaan software dan hardware serta menyediakan sumber daya manusia yang handal dan terbaik sesuai bidangnya, yang senantiasa mengutamakan health and safety regulation dalam setiap kegiatan.\r\n\r\nPengalaman kami telah melahirkan beberapa inovasi dan solusi bagi berbagai tantangan industri digital yang berhubungan dengan operasional perusahaan. Kami merupakan partner yang tepat dalam penyedia jasa instalasi CCTV, Fiber Optic, Server dan perangkat jaringan serta hardware dan software lainnya. Selain itu kami juga menjual dan menyediakan berbagai hardware dan instrument penunjang operasional pabrik serta operasional perusahaan.', 'Menjadi mitra strategis bagi perusahaan dan organisasi multi nasional dengan menghadirkan solusi inovatif di bidang teknologi informasi.', 'Menjadi perusahaan mitra teknologi yang terpercaya bagi klien kami, dengan memberikan solusi yang handal dan layanan yang superior.', 'Kami adalah perusahaan IT Support dan General Supplier yang berpengalaman dalam solusi teknologi, pengadaan perangkat, serta layanan instalasi dan maintenance. CV. Tigatra siap mendukung operasional bisnis Anda dengan layanan profesional dan sumber daya berkualitas.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_info`
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
-- Dumping data untuk tabel `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `tagline`, `street`, `city`, `province`, `postal_code`, `country`, `phone_number`, `whatsapp_number`, `contact_email`, `facebook_link`, `tiktok_link`, `youtube_link`, `instagram_link`, `linkedin_link`, `google_maps_embed_link`) VALUES
(1, 'Tigatra Adikara', 'CV. Tigatra Adikara – IT Support & General Supplier untuk Solusi Bisnis Anda.', 'JL. KS Tubun Gg. Vulkanik Perum Villa R4 No.04 Kecamatan Bontang Utara', 'Kota Bontang', 'Kalimantan Timur', NULL, 'Indonesia', '(0548) 355 18 39', '6282255952422', 'admin@tigatra.com', 'https://web.facebook.com/?locale=id_ID&_rdc=1&_rdr#', 'https://www.tiktok.com/id-ID/', 'https://www.youtube.com/', 'https://www.instagram.com/tigatra_adikara/', 'https://id.linkedin.com/', 'https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3166.7116165625853!2d117.49679393409842!3d0.13856814783382604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sJL.%20KS%20Tubun%20Gg.%20Vulkanik%20Perum%20Villa%20R4%20No.04%20RT.008%20Kelurahan%20Bontang%20Kuala%2C%20Kecamatan%20Bontang%20Utara%20Kota%20Bontang%20-%20Kalimantan%20TImur!5e0!3m2!1sid!2sid!4v1754759033635!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
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
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `first_name`, `last_name`, `email`, `company_name`, `address`, `city`, `phone_number`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(12, 'Shani', 'Indira', 'shn@gmail.com', 'PT. JOT', NULL, NULL, '08111111111', 'Halo, saya ingin mengetahui lebih lanjut mengenai layanan instalasi jaringan dan pengadaan hardware untuk kantor kami.', 1, '2025-08-09 11:30:36', '2025-08-09 11:31:36'),
(13, 'User', '1', 'user1@gmail.com', 'PT. GAADA NAMANYA', 'Jalan Jalan', 'Madiun', '+62 3455 6643', 'Halo', 1, '2026-02-02 23:21:35', '2026-02-02 23:21:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `rubrik_id` int(10) UNSIGNED DEFAULT NULL,
  `konten` longtext NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi_gambar` text DEFAULT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_publish` datetime DEFAULT current_timestamp(),
  `jadwal_publikasi` datetime DEFAULT NULL,
  `is_scheduled` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('draft','published','scheduled') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `judul`, `rubrik_id`, `konten`, `gambar`, `deskripsi_gambar`, `tanggal_dibuat`, `tanggal_publish`, `jadwal_publikasi`, `is_scheduled`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Kecerdasan Buatan dan Dampaknya di Dunia Kerja', 1, '<p>Perkembangan teknologi semakin hari semakin pesat, dan salah satu inovasi yang paling banyak dibicarakan belakangan ini adalah <strong>kecerdasan buatan</strong> atau <strong>Artificial Intelligence (AI)</strong>. Dulu, AI hanya terdengar dalam film fiksi ilmiah, tapi sekarang sudah hadir di kehidupan nyata&mdash;dan tanpa kita sadari, telah menjadi bagian dari rutinitas kerja sehari-hari.</p>\r\n\r\n<h3><strong>Apa Itu Kecerdasan Buatan?</strong></h3>\r\n\r\n<p>Secara sederhana, kecerdasan buatan adalah kemampuan mesin atau komputer untuk meniru cara berpikir manusia. AI bisa belajar dari data, membuat keputusan, hingga menyelesaikan tugas-tugas tertentu yang sebelumnya hanya bisa dilakukan manusia. Contohnya? Asisten virtual seperti Siri atau Google Assistant, chatbot layanan pelanggan, hingga sistem rekomendasi di media sosial dan toko online.</p>\r\n\r\n<h3><em>Dampak Positif AI di Dunia Kerja</em></h3>\r\n\r\n<p>AI membawa banyak manfaat bagi dunia kerja. Beberapa di antaranya:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Meningkatkan Efisiensi dan Produktivitas</strong><br />\r\n	AI bisa mengambil alih tugas-tugas berulang dan administratif, seperti menginput data atau menjadwalkan pertemuan. Hal ini membuat karyawan bisa lebih fokus pada pekerjaan yang membutuhkan kreativitas dan analisis.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Membantu Pengambilan Keputusan</strong><br />\r\n	Dengan kemampuan analisis data yang sangat cepat, AI membantu perusahaan mengambil keputusan berdasarkan data (data-driven). Contohnya dalam dunia pemasaran, AI bisa menganalisis tren pasar dan perilaku konsumen untuk menentukan strategi terbaik.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Munculnya Lapangan Kerja Baru</strong><br />\r\n	Meskipun AI menggantikan beberapa pekerjaan, teknologi ini juga menciptakan profesi baru seperti data analyst, AI engineer, dan machine learning specialist.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>Tantangan dan Dampak Negatif</h3>\r\n\r\n<p>Namun, perkembangan AI juga memunculkan beberapa kekhawatiran:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Penggantian Tenaga Manusia</strong><br />\r\n	Tidak bisa dipungkiri, beberapa jenis pekerjaan mulai tergantikan oleh mesin. Contohnya kasir otomatis di supermarket atau customer service berbasis chatbot. Ini memunculkan kekhawatiran hilangnya lapangan kerja, terutama di sektor yang rutin dan berulang.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Kesenjangan Keterampilan (Skill Gap)</strong><br />\r\n	Dunia kerja membutuhkan keterampilan baru yang sesuai dengan perkembangan teknologi. Sayangnya, tidak semua tenaga kerja siap beradaptasi, terutama mereka yang belum terbiasa dengan teknologi digital.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Etika dan Keamanan Data</strong><br />\r\n	Penggunaan AI dalam memproses data menimbulkan pertanyaan tentang privasi dan keamanan informasi. Bagaimana jika data disalahgunakan atau AI mengambil keputusan yang bias?</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>Apa yang Bisa Kita Lakukan?</h3>\r\n\r\n<p>Menghadapi era AI bukan berarti harus takut, tapi perlu <strong>beradaptasi</strong> dan <strong>meningkatkan keterampilan</strong>. Beberapa langkah yang bisa dilakukan antara lain:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Belajar keterampilan baru</strong>, terutama yang berkaitan dengan teknologi digital dan data.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Fokus pada soft skill</strong> seperti kreativitas, empati, dan komunikasi yang sulit digantikan oleh mesin.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Berpikir kritis</strong> dalam menggunakan teknologi dan tidak tergantung sepenuhnya pada otomatisasi.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Penutup</h3>\r\n\r\n<p>AI bukan musuh, melainkan alat yang bisa membantu manusia bekerja lebih cerdas. Namun, agar tidak tertinggal, kita harus mau belajar dan berkembang bersama teknologi. Dunia kerja akan terus berubah, dan adaptasi adalah kunci untuk tetap relevan di masa depan.</p>', 'uploads/news/uY30fo1lYTRWKABImfEBRIYm2kVElsAp2V3mbS2L.jpg', 'okonomiyaki', '2025-08-02 07:48:01', '2025-08-02 09:56:24', '2025-08-02 15:44:00', 0, 'published', '2025-08-02 00:48:01', '2025-08-09 11:04:57'),
(14, 'Mengapa Kita Perlu Peduli dengan Keamanan Data Pribadi?', 1, '<p><strong>Di zaman serba digital seperti sekarang, data pribadi kita tersebar hampir di mana-mana dari media sosial, aplikasi belanja, sampai layanan perbankan online. Tapi sayangnya, masih banyak orang yang menganggap remeh soal keamanan data pribadi.</strong></p>\r\n\r\n<h3><strong>Data = Aset Berharga</strong></h3>\r\n\r\n<p><em>Data pribadi seperti nama, alamat, nomor telepon, hingga informasi kartu kredit sebenarnya adalah <strong>aset digital</strong>. Jika jatuh ke tangan yang salah, data ini bisa digunakan untuk penipuan, pencurian identitas, bahkan pembobolan rekening.</em></p>\r\n\r\n<h3><em>Ancaman Selalu Mengintai</em></h3>\r\n\r\n<p>Serangan siber makin hari makin canggih. Ada yang menyamar jadi layanan resmi untuk memancing kita membocorkan informasi (phishing), ada juga yang memasang malware lewat tautan mencurigakan. Kalau kita lengah, bisa saja semua akun kita diretas dalam hitungan menit.</p>\r\n\r\n<h3>Cara Sederhana Melindungi Diri</h3>\r\n\r\n<p>Kabar baiknya, ada beberapa langkah sederhana yang bisa dilakukan:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gunakan <strong>password yang kuat dan berbeda-beda</strong> untuk tiap akun.</p>\r\n	</li>\r\n	<li>\r\n	<p>Aktifkan <strong>verifikasi dua langkah (2FA)</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Hindari klik link sembarangan atau asal download file dari sumber tidak jelas.</p>\r\n	</li>\r\n	<li>\r\n	<p>Perbarui aplikasi dan sistem secara rutin agar tetap aman.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>Kesimpulan</strong></h3>\r\n\r\n<p>Keamanan data bukan cuma urusan IT atau perusahaan besar&mdash;tapi juga <strong>tanggung jawab pribadi</strong> kita sebagai pengguna teknologi. Dengan sedikit kehati-hatian, kita bisa tetap menikmati kemudahan digital tanpa harus jadi korban.</p>', 'uploads/news/PLd1oRdtvruGbKWpnqD5OnLGV4rzWHCKdOwM3yX1.jpg', 'contoh', '2025-08-02 18:11:15', '2025-08-02 18:11:15', NULL, 0, 'published', '2025-08-02 04:11:15', '2026-02-03 06:14:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `organization_members`
--

CREATE TABLE `organization_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `organization_members`
--

INSERT INTO `organization_members` (`id`, `photo`, `name`, `position`, `description`, `order`, `created_at`, `updated_at`) VALUES
(2, 'organization_photos/6Y27WAL9ItWRPRpfwuqnzS2mi7bxSvKn7eKasiLq.jpg', 'Profil 4', 'SUPERVISOR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.', 7, '2025-08-02 19:29:31', '2025-08-09 08:51:13'),
(3, 'organization_photos/5I8ymVC1htROnTvvWgZ2wqzknBeLdYPW3Hh5HJgQ.jpg', 'Profil 2', 'MANAGER OPERASIONAL & TEKNIS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.', 5, '2025-08-02 19:50:27', '2025-08-09 08:50:14'),
(4, 'organization_photos/8lXoyThBYPQNH2RyqF9QuRkmP4YpAtBrEZi05NuJ.jpg', 'Profil 1', 'MANAGER ADMINISTRASI,KEUANGAN & PENGEMBANGAN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.', 3, '2025-08-02 21:22:06', '2025-08-09 08:49:38'),
(6, 'organization_photos/zWPzx3OVELfa1w1K5KP1xlHuzATQ8dmJhP9gfXox.jpg', 'Wakil Direktur', 'WAKIL DIREKTUR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.', 2, '2025-08-02 21:23:43', '2026-02-05 01:52:09'),
(7, 'organization_photos/SePDTNfA1jhIxPPHBPp1m5G0lrr61INFn9OYE6bW.jpg', 'Profil 3', 'MANAGER KOMERSIL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.', 6, '2025-08-02 21:24:32', '2025-08-09 08:50:39'),
(8, 'organization_photos/AXhGKrYqd2o7tZP105upzq8x3TmPtAnCDLAcqS1b.jpg', 'Direktur', 'DIREKTUR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.', 1, '2025-08-02 21:25:42', '2026-02-05 01:51:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
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
-- Dumping data untuk tabel `products`
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
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `year`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Pengadaan dan pemasangan CCTV Pabrik PT Kaltim Pama Industri', 'Pengadaan dan pemasangan CCTV Pabrik PT Kaltim Pama Industri - Bontang 2017', '2017', 'projects/GyyLBZH4yPcb9SR0LJCh4iq1lv6mYNEU2jWMcOdz.jpg', 1, '2025-08-04 22:36:22', '2025-08-09 09:33:57'),
(2, 'Pengadaan dan pemasangan CCTV Pabrik PT Kaltim Daya Mandiri', 'Pengadaan dan pemasangan CCTV Pabrik PT Kaltim Daya Mandiri - Bontang 2016', '2016', 'projects/DhNacQ74uTn8v36lXK9XoxQcZclrtcUjwrEHZNlY.jpg', 1, '2025-08-04 23:47:05', '2025-08-09 09:33:00'),
(3, 'Pengadaan dan installasis Access Door Kantor PT Pupuk Kalimantan Timur', 'Pengadaan dan installasis Access Door Kantor PT Pupuk Kalimantan Timur - Bontang 2018', '2018', 'projects/MKoCVrOH8fFk1j724sqmsOozgJ7HbANM060vh7EB.jpg', 1, '2025-08-09 09:35:17', '2025-08-09 09:35:17'),
(5, 'Pengembangan Elektronic Security System (CSS) Pabrik PT Pupuk Kalimantan Timur', 'Pengembangan Elektronic Security System (CSS) Pabrik PT Pupuk Kalimantan Timur - Bontang 2019', '2019', 'projects/qsPnEYwAMxnWE67JmFBHZzUgbvvdZNZTt7STDwQk.jpg', 1, '2025-08-09 09:37:03', '2025-08-09 09:37:03'),
(6, 'Maintenance Tower dan Radio P2P Area Tambang Raya Usaha Tama (TRUST)', 'Maintenance Tower dan Radio P2P Area Tambang Raya Usaha Tama (TRUST) - Tandung Mayang 2019', '2019', 'projects/5Gv1uz18YGnv5TK0DUy9kVMuSerZeVX4bcS3CdED.jpg', 2, '2025-08-09 09:38:14', '2026-01-26 00:54:24'),
(7, 'Jasa Instalasi Perangkat CCTV Pabrik 6 Area Pabrik dan Kantor Pusat PT Pupuk Kaltim', 'Jasa Instalasi Perangkat CCTV Pabrik 6 Area Pabrik dan Kantor Pusat PT Pupuk Kaltim - Bontang 2022', '2022', 'projects/NmpwW9vNzkU5nmvmyB426aPbdzhnkF719jLlSn45.jpg', 2, '2025-08-09 09:39:30', '2026-02-03 07:14:59'),
(8, 'Pemasangan Access Door RFID Dept. K3 PT Pupuk Kalimantan Timur', 'Pemasangan Access Door RFID Dept. K3 PT Pupuk Kalimantan Timur - Bontang 2023', '2023', 'projects/raZzDNxnogbvInh3JWx5X6LuolQcOueVxmKQKDCl.jpg', 3, '2025-08-09 09:40:12', '2026-02-03 07:28:44'),
(11, 'Pemasangan CCTV dan radio P2P PT Kaltim Pama Industri', 'Pemasangan CCTV dan radio P2P PT Kaltim Pama Industri - Bontang 2018', '2018', 'projects/dhwMpmqWSWQRcE4zXkaaWoNyjV5GcKIEJ5JUMMU5.jpg', 1, '2026-02-03 07:12:54', '2026-02-03 07:15:35'),
(12, 'Pemasangan CCTV dan Radio P2P PT Turbaindo Coal Mining (TCM)', 'Pemasangan CCTV dan Radio P2P PT Turbaindo Coal Mining (TCM) - Melak 2019', '2019', 'projects/bYwBkaGZc8QQ9HcNyqkSH9dbjgjbrxv4exPXJvoa.jpg', 3, '2026-02-03 07:14:33', '2026-02-03 07:16:06'),
(13, 'Jasa Regenerasi Perangkat Sistem Inti Kantor Pusat PT Pupuk Kaltim', 'Jasa Regenerasi Perangkat Sistem Inti Kantor Pusat PT Pupuk Kaltim - Bontang 2022', '2022', 'projects/UVhs5eCSzcxgtwFztZ05Yc0St8jEqbdhXAIDI9Hd.jpg', 1, '2026-02-03 07:18:30', '2026-02-03 07:18:30'),
(15, 'Jasa Penarikan Fiber Optik Area Pabrik dan Kantor Pusat PT Pupuk Kaltim', 'Jasa Penarikan Fiber Optik Area Pabrik dan Kantor Pusat PT Pupuk Kaltim - Bontang 2022', '2022', 'projects/QEwnwdR1oQyEDPeFtsadTP2XWbsuCzOlf0DXl54H.jpg', 0, '2026-02-03 07:20:10', '2026-02-03 07:20:10'),
(17, 'Pekerjaan Pengembangan Elektronik System Sirine, Area Pabrik 5 dan Kantor Pengadaan PT Pupuk Kaltim', 'Pekerjaan Pengembangan Elektronik System Sirine, Area Pabrik 5 dan Kantor Pengadaan PT Pupuk Kaltim - Bontang 2022', '2022', 'projects/cqdOe5G1ksfXVkT1bW8ewXUQVSw5EX7KLW5dg6J7.jpg', 0, '2026-02-03 07:28:27', '2026-02-03 07:28:27'),
(18, 'Instalasi Penguatan Sinyal Operator Pabrik PT Pupuk Kaltim', 'Instalasi Penguatan Sinyal Operator Pabrik PT Pupuk Kaltim - Bontang 2023', '2023', 'projects/D8VLEtzeVDpNT5GXwEAC6QNCbkxtHNITbOzJ25p3.png', 0, '2026-02-03 07:31:35', '2026-02-03 07:31:35'),
(19, 'Jasa Pemasangan Fixed Speed Monitor Pabrik PT Kaltim', 'Jasa Pemasangan Fixed Speed Monitor Pabrik PT Kaltim - Bontang 2023', '2023', 'projects/McOLZvxE8zqRSPQQwGFqwiMhaqZzMw7ul7qXuuAM.jpg', 0, '2026-02-03 07:32:56', '2026-02-03 07:32:56'),
(20, 'Pemasangan dan Instalasi CCTV PT Indominco', 'Pemasangan dan Instalasi CCTV PT Indominco - Bontang 2023', '2023', 'projects/nsVEohUPwVPm7kndDy34H2AYpX2wTsaDFeJzlWgZ.jpg', 0, '2026-02-03 07:33:45', '2026-02-03 07:33:45'),
(25, 'Pemasangan dan Instalasi PT Kaltim Pama Industri', 'Pemasangan dan Instalasi PT Kaltim Pama Industri - Bontang 2024', '2024', 'projects/icB7hogIG9lqOJFLdTJXIcc4oFwmrPH6oxPACBgu.jpg', 1, '2026-02-03 07:45:16', '2026-02-03 07:45:32'),
(26, 'Jasa Pemasangan dan Instalasi CCTV PT Pupuk Kalimantan Timur', 'Jasa Pemasangan dan Instalasi CCTV PT Pupuk Kalimantan Timur - Bontang 2024', '2024', 'projects/X6DQNd2QbuhaVN733kqQulb2Vr1dpJyQwT3rs5EM.jpg', 2, '2026-02-03 07:46:04', '2026-02-03 07:46:04'),
(27, 'Jasa Pemasangan dan Instalasi Video Wall PT Pupuk Kalimantan Timur', 'Jasa Pemasangan dan Instalasi Video Wall PT Pupuk Kalimantan Timur - Bontang 2024', '2024', 'projects/4pE2WcsZSrHiXwjUA5M376R2Nz585Qf9onGqPa1H.jpg', 3, '2026-02-03 07:46:25', '2026-02-03 07:46:25'),
(28, 'Jasa Pemasangan dan Instalasi CCTV FR PT Pupuk Kalimantan Timur', 'Jasa Pemasangan dan Instalasi CCTV FR PT Pupuk Kalimantan Timur - Bontang 2024', '2024', 'projects/3vpklzAQJyT0c0ot6NrnN9HdCmBaSz4rB5gr6gYM.jpg', 4, '2026-02-03 07:46:50', '2026-02-03 07:46:50'),
(29, 'Jasa Pemasangan PABX PT Kaltim Daya Mandiri', 'Jasa Pemasangan PABX PT Kaltim Daya Mandiri - Bontang 2024', '2024', 'projects/6EAern4kexuKCc5UERdLOtabDxipptBar7ZReCQp.jpg', 5, '2026-02-03 07:47:56', '2026-02-03 07:47:56'),
(30, 'Jasa Maintenance dan Penggantian CCTV PT Kaltim Pama Industri', 'Jasa Maintenance dan Penggantian CCTV\r\nPT Kaltim Pama Industri - Bontang 2024', '2024', 'projects/YrIFCReTytlWtS0bP1CVJ2qJk866jCa2IbQIxBeT.jpg', 6, '2026-02-03 07:48:19', '2026-02-03 07:48:19'),
(31, 'Jasa Maintenance CCTV PT Kaltim Daya Mandiri', 'Jasa Maintenance CCTV PT Kaltim Daya Mandiri - Bontang 2025', '2025', 'projects/lH0CzogYYmlickUulLnlAlH213U8I9v83PB6uDzE.jpg', 1, '2026-02-03 07:48:44', '2026-02-03 07:48:44'),
(32, 'Jasa Peremajaan CCTV Plant PT Kaltim Pama Industi', 'Jasa Peremajaan CCTV Plant PT Kaltim Pama Industi - Bontang 2025', '2025', 'projects/PI2PFqjP3kciOZK27RjKM4DmcxKajxJ4N3TFcC9X.jpg', 2, '2026-02-03 07:49:06', '2026-02-03 07:49:06'),
(33, 'Jasa Peningkatan Ruang Meeting PT Kaltim Pama Industri', 'Jasa Peningkatan Ruang Meeting PT Kaltim Pama Industri - Bontang 2025', '2025', 'projects/Qr9hddb64ZZtnpM5pHCmAcjAsEkOmap2OIjxc3QY.jpg', 3, '2026-02-03 07:49:27', '2026-02-03 07:49:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rubrik`
--

CREATE TABLE `rubrik` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rubrik`
--

INSERT INTO `rubrik` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'News', '2025-08-02 00:44:05', '2025-08-02 00:44:05'),
(5, 'Event', '2025-08-02 00:58:28', '2025-08-02 00:58:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_centers`
--

CREATE TABLE `service_centers` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `waktu_pelayanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service_centers`
--

INSERT INTO `service_centers` (`id`, `nama`, `alamat`, `waktu_pelayanan`) VALUES
(3, 'Tigatra Adikara', 'JL. KS Tubun Gg. Vulkanik Perum Villa R4 No.04 RT.008 Kelurahan Bontang Kuala, Kecamatan Bontang Utara, Kota Bontang - Kalimantan Timur', 'Senin–Jumat, 09.00–17.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `solutions`
--

CREATE TABLE `solutions` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `solutions`
--

INSERT INTO `solutions` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'IT MAINTENANCE', 'Didukung oleh tim berpengalaman di bidangnya, perusahaan kami menyediakan jasa perawatan peralatan IT, seperti software update, hardware maintenance, tower maintenance, cabling management, dan lain-lain.', '2025-08-01 00:18:00', '2026-02-03 07:05:57'),
(6, 'ELECTRONIC SECURITY SYSTEM', 'Sebagai System Integrator (SI) salah satu produsen Electronic Security System terbaik di dunia, dan didukung teknisi bersertifikasi Hikvision Certified Security Associate (HCSA), kami menyediakan berbagai macam produk solusi untuk memudahkan pengawasan operasional perusahaan. Perlengkapan meliputi CCTV, Rotary Gate, X-Ray Security Inspection, Access Door, dan Command Center Solution.', '2025-08-01 02:06:39', '2026-02-03 07:06:20'),
(7, 'IT NETWORKING', 'Lingkup pekerjaan IT Networking yang kami kerjakan meliputi pengadaan barang dan jasa instalasi jaringan Fiber Optic (FO), instalasi server, jaringan komputer, smart projector, jaringan wifi, radio rig, radio point to point, serta instalasi perlengkapan telekomunikasi (PABX).', '2025-08-09 09:30:44', '2026-02-03 07:06:39'),
(8, 'PROGRAMMING', 'Lingkup pekerjaan programming yang kami kerjakan meliputi pembuatan software berbasis desktop dan web sebagai penunjang kegiatan operasional perusahaan.', '2025-08-09 09:30:54', '2026-02-03 07:06:51'),
(9, 'IT MATERIAL SUPPLIER', 'Lingkup pekerjaan supplies computer yang kami kerjakan meliputi pengadaan toner, cartridge, printer, personal computer, laptop, dan peralatan komputer lainnya.', '2025-08-09 09:31:08', '2026-02-03 07:07:00'),
(10, 'GENERAL SUPPLIER', 'Kami menyediakan beragam produk untuk memenuhi kebutuhan bisnis dan teknologi modern. Seperti kebutuhan insulation blanket dari bahan Aerogel, serta beragam peralatan penunjang operasional pabrik yang sesuai dengan kebutuhan.', '2025-08-09 09:31:22', '2026-02-03 07:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(3, 'Nindi', 'nindi@gmail.com', '$2y$10$xy2JQGnNd9VMeXDdmyPzZesceONe0iuZxZ.XLfnCqw.xgR.kSfO4G', 'superadmin'),
(8, 'Super Admin', 'superadmin@gmail.com', '$2y$10$WE4hXvwuaygu6otlk/gxp.OboJTRUF/fkZnJSOVa6jVNotHcdfgiO', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `vendor_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `logo_path`, `alt_text`, `website_url`, `vendor_category_id`, `created_at`, `updated_at`) VALUES
(8, 'Ubiquiti', 'vendors/logos/UuHhTL5PwVUgKwdNnuHFAsgCR3a9ohfU91EG5C8X.png', 'Ubiquiti', 'https://ui.com/', 8, '2025-07-31 23:06:38', '2025-08-09 09:47:25'),
(9, 'TOA', 'vendors/logos/rp6HtebzhPjlFngjGZePn781KJYdQ4mm0RFagTE6.png', 'TOA', 'https://www.toa-global.com/en', 5, '2025-08-09 09:45:37', '2025-08-09 09:45:37'),
(10, 'Netviel', 'vendors/logos/LCHU8GsZTHJsFgq5eOSbmRQe0g6tN9rtaSqXFupL.png', 'netviel', 'http://netviel.com/?gad_source=1&gad_campaignid=22864132211&gbraid=0AAAAADfO5eOiWNxJGZrrtWOr0iWLFwbUT&gclid=EAIaIQobChMIwMezlJf-jgMV8KRmAh0Z6ADpEAAYASAAEgJWQ_D_BwE', 7, '2025-08-09 09:48:50', '2025-08-09 09:48:50'),
(11, 'Fortinet', 'vendors/logos/H4VDGdLxM7yj9VekJmK27y2K5nLL1LRp2dIMf6hT.png', NULL, 'https://www.fortinet.com/', 8, '2026-02-03 08:03:34', '2026-02-03 08:03:34'),
(12, 'Mikrotik', 'vendors/logos/CHgFfq1WbNun8w0qPnsG7N8hydVS6OyH2fikPvP0.jpg', NULL, 'https://mikrotik.com/', 8, '2026-02-03 08:05:28', '2026-02-03 08:05:28'),
(13, 'Cisco', 'vendors/logos/FulaEJBks34tY6aZBVh5bPp6oCJRJgzTxBevG9AI.png', NULL, 'https://www.cisco.com/', 8, '2026-02-03 08:06:21', '2026-02-03 08:06:21'),
(14, 'tp-link', 'vendors/logos/wfARysYDRAkqD8ptgB2aWe2G5fH1QOHgKReMWPqg.png', NULL, 'https://www.tp-link.com/id/', 8, '2026-02-03 08:06:49', '2026-02-03 08:06:49'),
(15, 'PT Sucaco', 'vendors/logos/29cbMUANYpBHrYTipfRnArozfpJNYrNCghJtpiNg.jpg', NULL, 'https://www.sucaco.com/', 7, '2026-02-03 08:11:47', '2026-02-03 08:11:47'),
(16, 'paz', 'vendors/logos/BAxS4q6RHROEjbFNo7FLYlNRGeoIGK6XMEcPlpQK.png', NULL, NULL, 7, '2026-02-03 08:12:20', '2026-02-03 08:12:20'),
(17, 'Schneider Electric', 'vendors/logos/R2NkBBGFhLQHMqpo5b5lcL78d07xMufetbYWYCis.png', NULL, 'https://www.se.com/id/id/', 9, '2026-02-03 08:15:54', '2026-02-03 08:16:23'),
(18, 'APC', 'vendors/logos/UX0ZsSAt0tYuIShnMoyQE0eytO7DsBaqv8MZkcFX.png', NULL, 'https://www.se.com/id/id/brands/apc/', 9, '2026-02-03 08:18:13', '2026-02-03 08:18:13'),
(19, 'Liebert', 'vendors/logos/HbiKIroJNMbuLYqOzSiG8ZnOGtujWVB6WOiFL2Xe.png', NULL, NULL, 9, '2026-02-03 08:19:30', '2026-02-03 08:19:30'),
(20, 'Vertiv', 'vendors/logos/mpoJYIruszuCc5lyWQ6GCjuVbMUp8LJrzytTf0Z3.jpg', NULL, 'https://www.vertiv.com/en-us/', 10, '2026-02-03 08:26:54', '2026-02-03 08:26:54'),
(21, 'indorack', 'vendors/logos/Lqwzli5TcdYCvXpp31EOZrEk2BqbFFHbftgfQzJV.png', NULL, 'https://www.indorack.co.id/', 10, '2026-02-03 08:27:17', '2026-02-03 08:27:17'),
(22, 'Sangoma', 'vendors/logos/kb6Hh2g0u71WHqEsBRwKJdnhuOepS1hZycO0ZtWz.png', NULL, 'https://sangoma.com/', 11, '2026-02-03 20:43:55', '2026-02-03 20:43:55'),
(23, 'Yeastar', 'vendors/logos/nhpInh77HjD6P9Ifi5w35uZKEGrJUaFlLu9ytYBZ.png', NULL, 'https://www.yeastar.com/', 11, '2026-02-03 20:47:08', '2026-02-03 20:47:08'),
(24, 'Fanvil', 'vendors/logos/rvlPIZXfmbr8ZnJtG7X1rfksrtolMbxVxLabyP43.jpg', NULL, 'https://fanvil.com/', 11, '2026-02-03 20:49:46', '2026-02-03 20:49:46'),
(25, 'Logitech', 'vendors/logos/khxQQkRZUgvVk5AnhpzCyw7R9l4OQiaBlskJ6axg.png', NULL, 'https://www.logitechg.com/id-id/innovation/g-hub.html', 12, '2026-02-03 20:52:38', '2026-02-03 20:52:38'),
(26, 'DJI Enterprise', 'vendors/logos/cfVKsOZeP8pu736OPN3g6oCKJrkYgyXy4rvcIWEQ.png', NULL, 'https://enterprise.dji.com/', 13, '2026-02-03 20:56:32', '2026-02-03 20:56:32'),
(27, 'DJI Agriculture', 'vendors/logos/XA4j03oSPgtghLDsv2bH7zNKuHMx1IQQNoFgz2xN.png', NULL, 'https://ag.dji.com/', 13, '2026-02-03 20:58:53', '2026-02-03 20:58:53'),
(28, 'DJI Delivery', 'vendors/logos/z7bWfK6ng8qqjvxt0cFeYDwQlZVrytPcgR3PW10x.png', NULL, 'https://www.dji.com/id/delivery', 13, '2026-02-03 21:03:51', '2026-02-03 21:03:51'),
(29, 'Skyfend', 'vendors/logos/DtX6oqAv8wYidkuefKCX5E8Qnf9Oa4nJdXSiUwqQ.webp', NULL, 'https://www.skyfend.com/', 13, '2026-02-03 21:06:18', '2026-02-03 21:06:18'),
(30, 'Elitekorps', 'vendors/logos/7WkhUU3tvURNQF3D2qlqiGLYuouFQKesAFoCSL6N.png', NULL, 'https://halorobotics.com/elitekorps/', 13, '2026-02-03 21:28:05', '2026-02-03 21:30:00'),
(31, 'Flyability', 'vendors/logos/TkZ58LYS8uAEH14v3w5rNICMx9R4HI0myakEZU0D.webp', NULL, 'https://www.flyability.com/', 13, '2026-02-03 21:32:19', '2026-02-03 21:32:19'),
(32, 'Hikvision', 'vendors/logos/gljBh9mAGqQynY389X4cqrgYPAyuf2dUHrFasXMP.jpg', NULL, 'https://www.hikvision.com/id/', 14, '2026-02-03 21:34:28', '2026-02-03 21:34:28'),
(33, 'ZKTeco', 'vendors/logos/Dp0UuYCBItD7pHOQZp4S5X2PwNaIArlX5Xx4mIhj.png', NULL, 'https://www.zkteco.co.id/', 14, '2026-02-03 21:35:54', '2026-02-03 21:35:54'),
(34, 'Hikvision', 'vendors/logos/mDHasNdCrBX6pD8OHrETimdwyuFf8JFZuXTZUFXJ.jpg', NULL, 'https://www.hikvision.com/id/', 15, '2026-02-03 21:37:27', '2026-02-03 21:37:27'),
(35, 'Datatron', 'vendors/logos/nbyCQIUV6m7CgTzZBwQ9rtO76Gf4qOYAN4igiUiS.png', NULL, 'https://datatron.com/', 15, '2026-02-03 21:40:27', '2026-02-03 21:40:27'),
(36, 'Huawei', 'vendors/logos/uaqm8DAhrsMHpt8QImUQfKK3YIyDH061MHTDargY.png', NULL, 'https://consumer.huawei.com/id/', 15, '2026-02-03 21:42:11', '2026-02-03 21:42:11'),
(37, 'Acer', 'vendors/logos/BDMWoLPXmWmmfuJ8pfrzCbIhV4Iz6ZqmHa1JiPV6.png', NULL, 'https://www.acer.com/id-id/', 15, '2026-02-03 21:43:47', '2026-02-03 21:43:47'),
(38, 'Epson', 'vendors/logos/nRLSrdhclFw2wsBm2z65vVUfzgFEAtnCk7FThLln.png', NULL, 'https://www.epson.co.id/', 15, '2026-02-03 21:45:06', '2026-02-03 21:45:06'),
(39, 'Microsoft', 'vendors/logos/26iyyhuT0LTZHhKPkKC3Ce96TPv638ICeniVDZo8.png', NULL, 'https://www.microsoft.com/id-id', 16, '2026-02-03 21:47:46', '2026-02-03 21:48:20'),
(40, 'Google', 'vendors/logos/DTKyf5LCy8vI6vINefQsBh5mF7o9VFGDzXWxkxcR.png', NULL, 'https://www.google.com/?hl=id', 16, '2026-02-03 21:50:02', '2026-02-03 21:50:02'),
(41, 'CZUR', 'vendors/logos/HRsSdVcRcKSBtPjWcxjQTFUJvm95wE8bD3y6KqBT.webp', NULL, 'https://www.czur.com/', 17, '2026-02-03 21:52:01', '2026-02-03 21:52:01'),
(42, 'Dell', 'vendors/logos/REKjlz0MRhuu9scASYUfosX0IgF8QKeE0MAfaUZV.png', NULL, 'https://www.dell.com/en-id', 18, '2026-02-03 21:53:27', '2026-02-03 21:53:27'),
(43, 'HP', 'vendors/logos/MqoEtOWKG3k4QU8jyIsEjt2OO31bvEU6Bk21QLIr.png', NULL, 'https://www.hp.com/id-id/home.html', 18, '2026-02-03 21:54:40', '2026-02-03 21:54:40'),
(44, 'Asus', 'vendors/logos/IQnFWZbUsu7tt6diyirmR21x9q09tOo9l33QHOFn.png', NULL, 'https://www.asus.com/id/', 18, '2026-02-03 21:56:04', '2026-02-03 21:56:04'),
(45, 'Acer', 'vendors/logos/XKl9X6s7feHhwBxNZwslKweLxyVRr6iwz2Km6sOa.png', NULL, 'https://www.acer.com/id-id/', 18, '2026-02-03 21:56:57', '2026-02-03 21:56:57'),
(46, 'Lenovo', 'vendors/logos/HqhvcRVKBcl3NUxxdLXJqUYZJQ7yLb5ZPx3M1w2Q.jpg', NULL, 'https://www.lenovo.com/id/id/', 18, '2026-02-03 21:59:28', '2026-02-03 21:59:28'),
(47, 'MSI', 'vendors/logos/35WFJpIaUrnokgDMtHluY1rBl1zmPPgVBsejuTzw.png', NULL, 'https://id.msi.com/', 18, '2026-02-03 22:01:25', '2026-02-03 22:01:25'),
(48, 'Seagate', 'vendors/logos/vsBVVYDod27u32wlcdkc0AyL617wnC0Q8nXe6whP.png', NULL, 'https://www.seagate.com/id/id/', 19, '2026-02-03 22:04:59', '2026-02-03 22:04:59'),
(49, 'Western Digital', 'vendors/logos/ZTew7xoJmBeVBZlTNmfMWj8E5BsAVTvNQbCG06ER.png', NULL, 'https://www.westerndigital.com/in-id', 19, '2026-02-03 22:07:50', '2026-02-03 22:07:50'),
(50, 'QNAP', 'vendors/logos/zSK2BDs2sd94eQml2ko2ZIbwFumV4yRujfQ8WfAT.jpg', NULL, 'https://www.qnap.com/en-as', 19, '2026-02-03 22:10:00', '2026-02-03 22:10:00'),
(51, 'Synology', 'vendors/logos/SM9Z6Jw30UYEASOayxLRgxnedaiO5hNcmOoDCX6P.png', NULL, 'https://www.synology.com/en-global', 19, '2026-02-03 22:11:47', '2026-02-03 22:11:47'),
(52, 'Aspen Aerogels', 'vendors/logos/eRQ674DsVRbR3S9J8KvJvWklogsDMZCDYtXzQFdZ.png', NULL, 'https://www.aerogel.com/', 20, '2026-02-03 22:13:36', '2026-02-03 22:13:36'),
(53, 'Armacell', 'vendors/logos/JeDNR2KtOyZ1yVuPm8MOWaXnFuJfDuOr4tTn8ooc.png', NULL, 'https://www.armacell.com/en-ID', 20, '2026-02-03 22:15:09', '2026-02-03 22:15:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vendor_categories`
--

INSERT INTO `vendor_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Electronic Sirine System', '2025-07-31 23:06:27', '2026-02-03 08:17:01'),
(7, 'Fiber Optic', '2025-08-04 05:53:30', '2026-02-03 08:17:11'),
(8, 'Netware & Firewall', '2025-08-09 09:44:36', '2026-02-03 08:17:21'),
(9, 'Electrical & Battery', '2026-02-03 08:16:11', '2026-02-03 08:16:11'),
(10, 'Rack & Cabinet', '2026-02-03 08:26:13', '2026-02-03 08:26:13'),
(11, 'Telephony', '2026-02-03 08:30:56', '2026-02-03 08:30:56'),
(12, 'Meeting Room Audio & Video', '2026-02-03 08:31:10', '2026-02-03 08:31:10'),
(13, 'Drone Inspection , Patrol, Mapping & Security', '2026-02-03 08:31:33', '2026-02-03 08:31:33'),
(14, 'Camera CCTV & Security System', '2026-02-03 08:31:47', '2026-02-03 08:31:47'),
(15, 'Advanced & Smart Display', '2026-02-03 08:32:11', '2026-02-03 08:32:11'),
(16, 'Cloud Service Solution', '2026-02-03 08:32:22', '2026-02-03 08:32:22'),
(17, 'Advanced Scanner', '2026-02-03 08:32:37', '2026-02-03 08:32:37'),
(18, 'Computer, Server & Notebook', '2026-02-03 08:32:53', '2026-02-03 08:32:53'),
(19, 'Storage', '2026-02-03 08:33:02', '2026-02-03 08:33:02'),
(20, 'Insulation Pipe', '2026-02-03 08:33:10', '2026-02-03 08:33:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `organization_members`
--
ALTER TABLE `organization_members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rubrik`
--
ALTER TABLE `rubrik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_centers`
--
ALTER TABLE `service_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_category` (`vendor_category_id`);

--
-- Indeks untuk tabel `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `organization_members`
--
ALTER TABLE `organization_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `rubrik`
--
ALTER TABLE `rubrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `service_centers`
--
ALTER TABLE `service_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `fk_vendor_category` FOREIGN KEY (`vendor_category_id`) REFERENCES `vendor_categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
