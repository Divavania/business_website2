-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 06:41 AM
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
-- Table structure for table `news`
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
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `rubrik_id`, `konten`, `gambar`, `deskripsi_gambar`, `tanggal_dibuat`, `tanggal_publish`, `jadwal_publikasi`, `is_scheduled`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Kecerdasan Buatan dan Dampaknya di Dunia Kerja', 1, '<p>Perkembangan teknologi semakin hari semakin pesat, dan salah satu inovasi yang paling banyak dibicarakan belakangan ini adalah <strong>kecerdasan buatan</strong> atau <strong>Artificial Intelligence (AI)</strong>. Dulu, AI hanya terdengar dalam film fiksi ilmiah, tapi sekarang sudah hadir di kehidupan nyata&mdash;dan tanpa kita sadari, telah menjadi bagian dari rutinitas kerja sehari-hari.</p>\r\n\r\n<h3><strong>Apa Itu Kecerdasan Buatan?</strong></h3>\r\n\r\n<p>Secara sederhana, kecerdasan buatan adalah kemampuan mesin atau komputer untuk meniru cara berpikir manusia. AI bisa belajar dari data, membuat keputusan, hingga menyelesaikan tugas-tugas tertentu yang sebelumnya hanya bisa dilakukan manusia. Contohnya? Asisten virtual seperti Siri atau Google Assistant, chatbot layanan pelanggan, hingga sistem rekomendasi di media sosial dan toko online.</p>\r\n\r\n<h3><em>Dampak Positif AI di Dunia Kerja</em></h3>\r\n\r\n<p>AI membawa banyak manfaat bagi dunia kerja. Beberapa di antaranya:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Meningkatkan Efisiensi dan Produktivitas</strong><br />\r\n	AI bisa mengambil alih tugas-tugas berulang dan administratif, seperti menginput data atau menjadwalkan pertemuan. Hal ini membuat karyawan bisa lebih fokus pada pekerjaan yang membutuhkan kreativitas dan analisis.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Membantu Pengambilan Keputusan</strong><br />\r\n	Dengan kemampuan analisis data yang sangat cepat, AI membantu perusahaan mengambil keputusan berdasarkan data (data-driven). Contohnya dalam dunia pemasaran, AI bisa menganalisis tren pasar dan perilaku konsumen untuk menentukan strategi terbaik.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Munculnya Lapangan Kerja Baru</strong><br />\r\n	Meskipun AI menggantikan beberapa pekerjaan, teknologi ini juga menciptakan profesi baru seperti data analyst, AI engineer, dan machine learning specialist.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>Tantangan dan Dampak Negatif</h3>\r\n\r\n<p>Namun, perkembangan AI juga memunculkan beberapa kekhawatiran:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Penggantian Tenaga Manusia</strong><br />\r\n	Tidak bisa dipungkiri, beberapa jenis pekerjaan mulai tergantikan oleh mesin. Contohnya kasir otomatis di supermarket atau customer service berbasis chatbot. Ini memunculkan kekhawatiran hilangnya lapangan kerja, terutama di sektor yang rutin dan berulang.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Kesenjangan Keterampilan (Skill Gap)</strong><br />\r\n	Dunia kerja membutuhkan keterampilan baru yang sesuai dengan perkembangan teknologi. Sayangnya, tidak semua tenaga kerja siap beradaptasi, terutama mereka yang belum terbiasa dengan teknologi digital.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Etika dan Keamanan Data</strong><br />\r\n	Penggunaan AI dalam memproses data menimbulkan pertanyaan tentang privasi dan keamanan informasi. Bagaimana jika data disalahgunakan atau AI mengambil keputusan yang bias?</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3>Apa yang Bisa Kita Lakukan?</h3>\r\n\r\n<p>Menghadapi era AI bukan berarti harus takut, tapi perlu <strong>beradaptasi</strong> dan <strong>meningkatkan keterampilan</strong>. Beberapa langkah yang bisa dilakukan antara lain:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Belajar keterampilan baru</strong>, terutama yang berkaitan dengan teknologi digital dan data.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Fokus pada soft skill</strong> seperti kreativitas, empati, dan komunikasi yang sulit digantikan oleh mesin.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Berpikir kritis</strong> dalam menggunakan teknologi dan tidak tergantung sepenuhnya pada otomatisasi.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Penutup</h3>\r\n\r\n<p>AI bukan musuh, melainkan alat yang bisa membantu manusia bekerja lebih cerdas. Namun, agar tidak tertinggal, kita harus mau belajar dan berkembang bersama teknologi. Dunia kerja akan terus berubah, dan adaptasi adalah kunci untuk tetap relevan di masa depan.</p>', 'uploads/news/eQfOCEbqQ4A1QnpDxKHjW71EBKHgAceEe6SvOiEG.jpg', 'okonomiyaki', '2025-08-02 07:48:01', '2025-08-02 09:56:24', '2025-08-02 15:44:00', 0, 'published', '2025-08-02 00:48:01', '2025-08-02 02:56:24'),
(5, 'Teknologi 5G dan Dampaknya terhadap Kehidupan Sehari-hari', 1, '<p>Teknologi jaringan seluler terus berkembang, dan kini kita memasuki era <strong>5G</strong>&mdash;generasi kelima dari konektivitas mobile. Dibandingkan 4G, 5G menawarkan kecepatan internet yang <strong>jauh lebih tinggi</strong>, <strong>latensi lebih rendah</strong>, dan <strong>koneksi lebih stabil</strong>. Tapi, apa sebenarnya dampaknya dalam kehidupan sehari-hari?</p>\r\n\r\n<p><em><strong>Internet Lebih Cepat, Aktivitas Lebih Lancar</strong></em></p>\r\n\r\n<p>Dengan kecepatan 5G, streaming video 4K, download file besar, atau main game online jadi jauh lebih lancar tanpa buffering. Aktivitas digital seperti belajar online, rapat virtual, atau upload konten juga makin efisien.</p>\r\n\r\n<h3><s><em><strong>Dunia IoT Semakin Nyata</strong></em></s></h3>\r\n\r\n<p>5G mendukung koneksi <strong>jutaan perangkat secara bersamaan</strong>, sehingga teknologi Internet of Things (IoT) makin berkembang. Bayangkan rumah yang semua perangkatnya saling terhubung&mdash;dari lampu, kulkas, sampai CCTV&mdash;semua bisa dikontrol dari smartphone secara real-time.</p>\r\n\r\n<h3>Revolusi di Berbagai Sektor</h3>\r\n\r\n<p>Dampak 5G nggak cuma di level personal, tapi juga menyentuh dunia industri. Di bidang <strong>kesehatan</strong>, misalnya, dokter bisa melakukan operasi jarak jauh dengan bantuan robot. Di <strong>transportasi</strong>, mobil tanpa sopir (autonomous car) makin mungkin digunakan secara massal.</p>\r\n\r\n<h3>Tapi, Belum Merata</h3>\r\n\r\n<p>Sayangnya, infrastruktur 5G belum tersebar luas di semua daerah. Selain itu, belum semua perangkat mendukung 5G, jadi manfaatnya belum bisa dirasakan oleh semua orang.</p>\r\n\r\n<h3>Kesimpulan</h3>\r\n\r\n<p>5G bukan cuma soal internet lebih cepat, tapi juga membuka pintu untuk <strong>inovasi yang lebih besar</strong> di masa depan. Meski butuh waktu agar sepenuhnya merata, teknologi ini sudah mulai mengubah cara kita hidup, bekerja, dan terhubung.</p>', 'uploads/news/jpTdBN1f3r62FQy0Ap9tDVQZPEuZkgThqpyRwdQ9.jpg', 'serombotan', '2025-08-02 07:53:40', '2025-08-02 07:53:40', NULL, 0, 'draft', '2025-08-02 00:53:40', '2025-08-02 00:54:19'),
(13, 'Coba Coba', 1, '<p>coba</p>', 'uploads/news/4aOPVdUsGENGjY72m7wGKXdiw9wMCY9RN76Irwgp.jpg', 'y', '2025-08-02 18:08:28', '2025-08-02 18:08:28', NULL, 0, 'published', '2025-08-02 04:08:28', '2025-08-02 04:08:28'),
(14, 'Mengapa Kita Perlu Peduli dengan Keamanan Data Pribadi?', 1, '<p><strong>Di zaman serba digital seperti sekarang, data pribadi kita tersebar hampir di mana-mana&mdash;dari media sosial, aplikasi belanja, sampai layanan perbankan online. Tapi sayangnya, masih banyak orang yang menganggap remeh soal keamanan data pribadi.</strong></p>\r\n\r\n<h3><strong>Data = Aset Berharga</strong></h3>\r\n\r\n<p><em>Data pribadi seperti nama, alamat, nomor telepon, hingga informasi kartu kredit sebenarnya adalah <strong>aset digital</strong>. Jika jatuh ke tangan yang salah, data ini bisa digunakan untuk penipuan, pencurian identitas, bahkan pembobolan rekening.</em></p>\r\n\r\n<h3><em>Ancaman Selalu Mengintai</em></h3>\r\n\r\n<p>Serangan siber makin hari makin canggih. Ada yang menyamar jadi layanan resmi untuk memancing kita membocorkan informasi (phishing), ada juga yang memasang malware lewat tautan mencurigakan. Kalau kita lengah, bisa saja semua akun kita diretas dalam hitungan menit.</p>\r\n\r\n<h3>Cara Sederhana Melindungi Diri</h3>\r\n\r\n<p>Kabar baiknya, ada beberapa langkah sederhana yang bisa dilakukan:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Gunakan <strong>password yang kuat dan berbeda-beda</strong> untuk tiap akun.</p>\r\n	</li>\r\n	<li>\r\n	<p>Aktifkan <strong>verifikasi dua langkah (2FA)</strong>.</p>\r\n	</li>\r\n	<li>\r\n	<p>Hindari klik link sembarangan atau asal download file dari sumber tidak jelas.</p>\r\n	</li>\r\n	<li>\r\n	<p>Perbarui aplikasi dan sistem secara rutin agar tetap aman.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>Kesimpulan</strong></h3>\r\n\r\n<p>Keamanan data bukan cuma urusan IT atau perusahaan besar&mdash;tapi juga <strong>tanggung jawab pribadi</strong> kita sebagai pengguna teknologi. Dengan sedikit kehati-hatian, kita bisa tetap menikmati kemudahan digital tanpa harus jadi korban.</p>', 'uploads/news/eUs14zlhZlhW9YzbXmTyj37Tk7RSOtczDe7eJq1f.png', 'contoh', '2025-08-02 18:11:15', '2025-08-02 18:11:15', NULL, 0, 'published', '2025-08-02 04:11:15', '2025-08-02 04:11:44'),
(15, 'Coba', 1, '<p>Coba lagi</p>', 'uploads/news/A9crpBdzxwOViJdT31HdtbQbtVkyiSJwofFFuEo2.jpg', 'y', '2025-08-02 19:48:14', '2025-08-02 19:48:14', NULL, 0, 'published', '2025-08-02 05:48:14', '2025-08-02 05:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `organization_members`
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
-- Dumping data for table `organization_members`
--

INSERT INTO `organization_members` (`id`, `photo`, `name`, `position`, `description`, `order`, `created_at`, `updated_at`) VALUES
(2, 'organization_photos/mMZFxEP4atZJcF06cL9UUg7sXxZX0OdtaGqn8DQu.jpg', 'Mingyu', 'hehehhe', NULL, 7, '2025-08-02 19:29:31', '2025-08-02 21:37:25'),
(3, 'organization_photos/pF2ovNeaRu99qjV64KyplgNXMw2yvbY5LIbsOMOH.jpg', 'Jay', 'Enhyp', NULL, 5, '2025-08-02 19:50:27', '2025-08-02 21:26:56'),
(4, 'organization_photos/isJCRohV3PNgyzgDcqTL1mm1NXs0mlLpv64ZPkSj.jpg', 'V', 'BTS', NULL, 3, '2025-08-02 21:22:06', '2025-08-02 21:22:26'),
(6, 'organization_photos/23w6dIB9sAVdSbKDqGiOYtGUubGQWjL6gqsuIFqh.jpg', 'Kim Seon ho', 'Actors', NULL, 2, '2025-08-02 21:23:43', '2025-08-02 21:26:25'),
(7, 'organization_photos/VHofhRgegk8kN2gk3wDpot7VYcJuhtyUe8Aam1nN.jpg', 'Park Seo Jun', 'Actors', NULL, 6, '2025-08-02 21:24:32', '2025-08-02 21:24:32'),
(8, 'organization_photos/WNuNpf1W3Lha21e3rWoeKdjHJNxlEql8K17jp0pm.jpg', 'Lee Minho', 'om om', NULL, 1, '2025-08-02 21:25:42', '2025-08-02 21:26:14');

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
-- Table structure for table `rubrik`
--

CREATE TABLE `rubrik` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rubrik`
--

INSERT INTO `rubrik` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'News', '2025-08-02 00:44:05', '2025-08-02 00:44:05'),
(5, 'Event', '2025-08-02 00:58:28', '2025-08-02 00:58:28');

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
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'AI Vision Analytics', 'Solusi analisis citra berbasis AI untuk sektor manufaktur dan retail yang mampu mendeteksi anomali visual, mengoptimalkan kualitas produksi, dan menyediakan laporan otomatis.', '2025-08-01 00:18:00', '2025-08-02 09:18:10'),
(6, 'RetailBoost POS Cloud', 'Sistem kasir berbasis cloud yang mendukung multi-cabang, laporan penjualan otomatis, serta integrasi dengan e-commerce dan sistem inventori. Cocok untuk bisnis ritel modern.', '2025-08-01 02:06:39', '2025-08-02 09:18:31');

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_members`
--
ALTER TABLE `organization_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrik`
--
ALTER TABLE `rubrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_centers`
--
ALTER TABLE `service_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
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
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `organization_members`
--
ALTER TABLE `organization_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rubrik`
--
ALTER TABLE `rubrik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_centers`
--
ALTER TABLE `service_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
