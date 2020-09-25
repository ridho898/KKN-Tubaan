-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 02:40 PM
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
-- Database: `tubaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nip`, `nama`, `alamat`, `notelp`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '1615015170', 'Admin', 'Jl. Lobak ung', '0895339732172', 'avatars/B1mKuxl5i2G4gfFYV56tBlMn7FDsRw0I0S2DU2vE.png', 3, '2019-07-25 01:10:13', '2019-07-25 01:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `toptext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lowertext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `toptext`, `lowertext`, `link`, `img`, `created_at`, `updated_at`) VALUES
(6, 'Kebersihan Desa adalah yang utama', 'Kebersihan adalah sebagian dari iman', '#', 'imgs/3bPBImT7j61iEksHnFiLLMiUHjOdjo18UglvOG5i.jpeg', '2019-07-30 08:26:02', '2019-07-30 08:26:02'),
(7, 'Indahnya kampungku, Tubaan tercinta', 'Potret Kehidupan Kampung Tubaan', '#', 'imgs/hzUkGXqG63DEUmueR4hZ3EQXzrTBkP4EIEBsEVur.jpeg', '2019-07-30 08:26:46', '2019-07-30 08:26:46'),
(9, 'Meriahnya KKN UNMUL Kampung Tubaan', 'KKN UNMUL angkatan 45 sedang menjalankan program kerja mereka di kampung tubaan', '#', 'imgs/X5ilcVi9zk8AmPayqIyCQLjeDmbakxBgqkqe0Aff.png', '2019-07-30 08:27:57', '2019-07-30 08:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `img`, `admin_id`, `created_at`, `updated_at`) VALUES
(4, 'Satu Jam Kendaraan Mengular di Tabalar', 'PROKAL.CO, TABALAR- Kelancaran aktivitas lalu lintas di jalur provinsi yang berada di poros jalan Kecamatan Tabalar terganggu dengan adanya pohon tumbang. Peristiwa yang terjadi Senin (15/10) sekitar pukul 14.00 Wita itu, membuat puluhan kendaraan, baik itu roda dua maupun roda empat mengular tidak bisa melintas.\r\n\r\nSopir truk CPO (Crude Palm Oil), Hadi mengatakan, tidak tahu persis kapan pohon tersebut tumbang. Namun, dengan kejadian tersebut membuatnya tidak bisa melanjutkan perjalanan. Dan sekitar satu jam terjebak menunggu dibersihkan.\r\n\r\n\"Cukup lama menunggu. Tadi sampai di Tabalar sudah tumbang memang pohonnya,\" ungkapnya pada Berau Post, Senin (15/10).\r\n\r\nSementara itu, Pjs Kapolsek Tabalar, Ipda Nurhadi mengatakan, pohon tumbang tersebut berada di sekitar wilayah RT 3, Kampung Tubaan, yang disebabkan oleh hujan deras disertai angin kencang dan tumbang ke jalan. Sehingga, membuat kendaraan tidak bisa melintas dan menyebabkan kemacetan.\r\n\r\n\"Lokasinya sebelum tanjakan di Gunung Talingsing. Pohon Tumbang itu juga engakibatkan jalan poros provinsi terhambat, baik yang dari Tanjung Redeb ke Talisayan, maupun sebaliknya,\" jelasnya.\r\n\r\nKendati begitu, tambah dia, pohon besar yang tumbang berhasil dibersihkan dengan kerja sama masyarakat, kepolisian dan tim BPBD Kecamatan Tabalar. Pembersihan sendiri dilakukan dengan menggunakan gergaji mesin, dan parang.\r\n\r\n\"Setelah pohon berhasil kami bersihkan, aktivitas kembali normal. Tak ada korban saat pohon itu tumbang,\" ujarnya.\r\n\r\nDiharapkannya, masyarakat khususnya pengendara untuk tetap berhati-hati selama perjalanan, baik itu dari Tanjung Redeb menuju Tabalar, atau pun sebaliknya. Karena tidak menutup kemungkinan, akibat hujan yang disertai angin kencang membuat pohon yang berada di wilayah lain tumbang, dan membahayakan.\r\n\r\n\"Kami imbau pengendara tetap waspada. Selalu utamakan keselamatan dalam berkendara,\" tandasnya. (*/sht/app)', 'imgs/YTS1ffr4ytHSHZrHIZGL28ak1afSfmFrZsu8fseA.jpeg', 3, '2019-07-25 06:20:33', '2019-07-25 06:20:33'),
(5, 'Bocah 8 Tahun Diterkam Buaya, Polisi dan BPBD Masih Lakukan Pencarian', 'TRIBUNKALTIM.CO, TANJUNG REDEB– Hari Selasa (7/5/2019) ini, beredar kabar seorang bocah yang hilang di Sungai Segah, Tabalar Muara, Kabupaten Berau.\r\n\r\nMenurut informasi, korban bernama Andito, usia 8 tahun itu hilang saat tengah bermain di sungai bersama teman sebayanya.\r\n\r\nAndito dilaporkan hilang sejak Selasa pagi, dan hingga kini, masyarakat setempat dibantu aparat kepolisian tengah mencari keberadaan korban. Menurut saksi mata, saat kejadian korban tengah berada di tepi sungai, disambar seekor buaya.\r\n\r\n\r\n\r\nArtikel ini telah tayang di tribunkaltim.co dengan judul Bocah 8 Tahun Diterkam Buaya, Polisi dan BPBD Masih Lakukan Pencarian, https://kaltim.tribunnews.com/2019/05/07/bocah-8-tahun-diterkam-buaya-polisi-dan-bpbd-masih-lakukan-pencarian.\r\nPenulis: Geafry Necolsen\r\nEditor: Samir Paturusi', 'imgs/Amqub3sC0IMDyDJIePqCFeFBIteL52qf0qi79WxW.jpeg', 3, '2019-07-25 06:21:50', '2019-07-25 06:21:50'),
(6, 'Bendungan Tua Masih Diandalkan', 'PROKAL.CO, TABALAR - Pemerintah Kampung Tubaan, Kecamatan Tabalar, mengusulkan pembangunan Instalasi Pengolahan Air (IPA) di kampung tersebut. Pasalnya, baru sebagian kecil masyarakat yang bisa menikmati air bersih dari fasilitas bendungan yang dibangun Pemkab Berau, belasan tahun silam.\r\n\r\nSebab, bendungan air yang berada di dataran tinggi kampung tersebut, tidak memiliki mesin untuk mengalirkan air ke permukiman warga. Hanya mengandalkan sifat air yang selalu mengalir ke tempat yang rendah.\r\n\r\nDisampaikan Kepala Kampung Tubaan, Saipul, dari 5 RT yang ada di kampungnya, tak sampai 2 RT yang telah menikmati air bersih dari bendungan tersebuit.\r\n\r\n\"Karena mengalirkan airnya hanya mengandalkan gravitasi, jadi tidak maksimal,\" ungkapnya pada Berau Post, Senin (7/1).\r\n\r\nKondisi ini yang menurutnya cukup memprihatinkan. Sebab sebagian besar warganya terpaksa mengandalkan air hujan, maupun membangun sumur bor pribadi. Sementara ketika masuk musim kemarau, masyarakat harus mencari sumber air bersih yang jauh dari permukimannya.\r\n\r\n\"Apalagi Kampung Tubaan ini merupakan ibu kota kecamatan. Saya kira sudah sangat layak mendapatkan fasilitas air bersih yang lebih baik,\" terangnya.', 'imgs/8RjFGCiEdsJrqpeaTf25FVYgQB66ZkBM5slbmW7j.jpeg', 3, '2019-07-25 06:22:21', '2019-07-25 06:22:21'),
(11, 'Berharap Listrik Tubaan Segera Normal', 'PROKAL.CO, TABALAR – Kerusakan mesin pembangkit Perusahaan Listrik Negara (PLN) atau Unit Lampu Desa di Kampung Tubaan, Kecamatan Tabalar, diharapkan bisa selesai sebelum memasuki Ramadan. Hal itu diungkapkan salah seorang warga setempat, Sudirman, kepada Berau Post Rabu (3/4).\r\n\r\nDiutarakan Sudirman, pemadaman bergilir saat ini sangat berdampak pada kegiatan dan aktivitas masyarakat, khususnya ketika malam hari. Karena itu, saat ini dia dan warga lainnya ‘dipaksa’ kembali menggunakan mesin disel atau lampu pelita untuk penerangan.\r\n\r\n\"Sampai sekarang masih belum normal. Makanya sementara pakai diesel walaupun biayanya lebih mahal,\" ujarnya\r\n\r\nHingga saat ini dikatakannya juga, masyarakat setempat belum mendapat kepastian kapan listrik di kampungnya bisa kembali normal. Hanya diketahuinya, kerusakan yang terjadi cukup parah dan mesin harus dibawa ke PLN Area lebih dulu untuk perbaikan.\r\n\r\nSementara warga lainnya, Rofik juga mengungkapkan hal senada. Bahkan ia mendapat kabar bahwa pemadaman bergilir tersebut akan terus terjadi hingga awal Ramadan mendatang. \"Kabarnya seperti itu. Cuma tidak tahu juga benar tidaknya,\" ujarnya\r\n\r\nKendati demikian dirinya tetap berharap kerusakan yang terjadi dapat segera diperbaiki, sehingga memasuki bulan ramadan nanti masyarakat dapat dengan tenang dan nyaman beraktivitas.\r\n\r\n\"Harapan kita sebelum ramadan udah normal lagi,\" bebernya.\r\n\r\nSementara itu, media ini belum berhasil mendapat konfirmasi dari petugas PLN Tabalar, Supri akan kepastian perbaikan tersebut. Saat dihubungi via telepon, Supri tidak menjawab panggilan media ini, begitu juga dengan pesan WhatsApp yang dikirim wartawan.\r\n\r\nDiberitakan sebelumnya, Penanggung Jawab operasi ULD Tabalar, Samigiono, mengatakan pemadaman bergilir di Tubaan disebabkan karena pompa air yang digunakan sebagai pendingin temperatur mesin mengalami kerusakan.\r\n\r\n\"Ada kendala di pompanya. Kita sudah koordinasi kan dengan PLN Area Berau terkait masalah ini,\" katanya beberapa waktu lalu. (*/sht/sam)', 'imgs/uzdBkfQz1loVClb2JcSaqM1xBgeIFzq7KuJEr4vL.jpeg', 3, '2019-07-30 02:15:30', '2019-07-30 02:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img`, `created_at`, `updated_at`) VALUES
(9, 'img/nGQb4iiikBs1vAUOSD1uiRoyWLwSIKZPEtLUyJqq.jpeg', '2019-08-01 09:31:09', '2019-08-01 09:31:09'),
(10, 'img/muNEQJIcKZfxvANeQFoMNZztF0du4ck2xXMSKXe6.jpeg', '2019-08-01 09:31:31', '2019-08-01 09:31:31'),
(11, 'img/l9I2X7GVhNp2CIdCyF1Hp4TXL718OGpVsSEianSk.jpeg', '2019-08-01 09:31:55', '2019-08-01 09:31:55'),
(12, 'img/MiM1FTHC8rMoqaikErLuA5Rp8Sb8dSQfFmLqB2R1.jpeg', '2019-08-01 09:32:08', '2019-08-01 09:32:08'),
(13, 'img/GHMhnvbMtjycR2T4Cu6cXyxK6DwlA0FE1jEF2SF3.jpeg', '2019-08-01 09:32:23', '2019-08-01 09:32:23'),
(14, 'img/ISVxEhJMyVbAmwQm8vT838EPsvqvmfae7EwFqktx.jpeg', '2019-08-01 09:32:49', '2019-08-01 09:32:49'),
(15, 'img/K10eMlO7CeAauIYnvferlKX1ElVkyvsYpBSNCjGd.jpeg', '2019-08-02 03:21:19', '2019-08-02 03:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_kategori`
--

CREATE TABLE `gallery_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_kategori`
--

INSERT INTO `gallery_kategori` (`id`, `gallery_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(11, 9, 7, NULL, NULL),
(13, 9, 10, NULL, NULL),
(14, 10, 5, NULL, NULL),
(15, 10, 6, NULL, NULL),
(16, 11, 3, NULL, NULL),
(17, 11, 6, NULL, NULL),
(18, 11, 7, NULL, NULL),
(20, 12, 10, NULL, NULL),
(21, 13, 4, NULL, NULL),
(22, 13, 5, NULL, NULL),
(23, 14, 3, NULL, NULL),
(24, 14, 5, NULL, NULL),
(25, 14, 6, NULL, NULL),
(26, 14, 7, NULL, NULL),
(28, 15, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imgprofil`
--

CREATE TABLE `imgprofil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imgprofil`
--

INSERT INTO `imgprofil` (`id`, `judul`, `deskripsi`, `img`, `created_at`, `updated_at`) VALUES
(3, 'Air Terjun Pahlawan', '-', 'imgs/CrBybgju25fhlWEnjExLBPBVHGg7oz3p3qMecBw7.jpeg', '2019-07-31 04:23:13', '2019-07-31 04:23:13'),
(4, 'Polisi Berbaur dan Merakyat', '-', 'imgs/DZhXQKBTHKk0Yh4J0zC9HQZXXBAUelsAs7CMMln7.jpeg', '2019-07-31 04:27:04', '2019-07-31 04:27:04'),
(5, 'Ikan langka berjuluk Si Raja Muara', '-', 'imgs/nyRyd1M1vszuoQO62MMANKmaOl0BHK5V8N3isrnc.jpeg', '2019-07-31 04:28:21', '2019-07-31 04:28:21'),
(6, 'Puskesmas Tubaan', '-', 'imgs/EedQz0saZGo16trzwSOyCyy484qVTH8eYsbq8JdT.jpeg', '2019-07-31 04:28:38', '2019-07-31 04:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(3, 'Event', '2019-08-01 07:58:09', '2019-08-01 07:58:09'),
(4, 'Keagamaan', '2019-08-01 09:27:06', '2019-08-01 09:27:12'),
(5, 'Edukasi', '2019-08-01 09:27:23', '2019-08-01 09:27:23'),
(6, 'Ekonomi', '2019-08-01 09:27:30', '2019-08-01 09:27:55'),
(7, 'Warga', '2019-08-01 09:28:04', '2019-08-01 09:28:04'),
(10, 'Pariwisata', '2019-08-01 09:28:35', '2019-08-01 09:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `waktu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `tempat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `deskripsi`, `tanggal`, `waktu`, `tempat`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan Gotong Royong', 'Kegiatan Gotong Royong Bulanan Akan kita lakukan di tempat pak RT. 20, diharapkan kesediaan warganya untuk datang', '30-1-2015', '7 sampai 10 pagi', 'Kelurahan Mesjid RT. 20', 'imgs/ZCEAAFZ1oJLUaDXuzO7doWtW7wNF57VIoTDU9okQ.jpeg', '2019-07-30 07:53:24', '2019-07-30 08:19:06'),
(2, 'Tahlilan Abah Kiyai Mustafa Habidin', 'Tahlian Guru besar kita Kiyai Mustafa Habidin yang diselenggarakan tiap tahunnya', '24-1-15', '8 sampai 10 malam', 'Kampung Ketupat RT. 3', 'imgs/PRKn9xFJhMe60wcDX1znfLBeB799c0a3Ez9jU8jS.jpeg', '2019-07-30 07:55:44', '2019-07-30 08:19:41'),
(3, 'Peresmian Jembatan Tulak Mangkurat', 'Setelah pembangunan 2 tahun, akhirnya Jembatan Tulak Mangkurat akan diresmikan dan dibuka secara umum', '2-3-15', 'jam 1 sampai 2 siang', 'Kampung Ketupat RT. 3', 'imgs/YEZpH9LEd1fK62NbkH2hiDxe3dv8vuelIvZWQ5dH.jpeg', '2019-07-30 08:03:15', '2019-07-30 08:20:14');

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
(3, '2019_07_24_145626_create_admin_table', 1),
(4, '2019_07_24_160122_create_berita_table', 2),
(5, '2019_07_29_132944_create_kegiatan_table', 3),
(6, '2019_07_30_102356_create_banner_table', 4),
(7, '2019_07_30_172429_create_profil_table', 5),
(8, '2019_07_30_172609_create_imgprofil_table', 6),
(9, '2019_07_30_173031_create_profil_table', 7),
(10, '2019_07_30_173600_create_profil_table', 8),
(11, '2019_07_30_173708_create_profil_table', 9),
(12, '2019_07_31_110647_create_imgprofil_table', 10),
(13, '2019_08_01_124851_create_gallery_table', 11),
(14, '2019_08_01_125129_create_kategori_table', 11),
(15, '2019_08_01_125151_create_kategori_gallery_table', 12);

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
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `judul`, `deskripsi`, `link`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Selamat datang di Website Kami Kampung Tubaan', 'Tubaan adalah salah satu kampung di kecamatan Tabalar, Kabupaten Berau, Kalimantan Timur, Indonesia. Tabalar sendiri ialah sebuah kecamatan di Kabupaten Berau, Provinsi Kalimantan Timur, Indonesia. Terdapat  6 desa/kelurahan pada kecamatan Tabalar ini, termasuk desa Tubaan. Desa ini berbatasan langsung  dengan laut Sulawesi', 'https://www.google.com/maps/place/Tubaan,+Tabalar,+Berau,+Kabupat%C3%A8n+Berau,+Kalimantan+W%C3%A9tan/data=!4m2!3m1!1s0x320da9525d39cd3d:0xf9a3837fa58203ad?sa=X&ved=2ahUKEwjx-__tnN3jAhXLtI8KHeJqCjcQ8gEwAHoECAkQAQ&hl=id', 'imgs/26sFphyYkWQdzyqSu5JE20ZnMmaqmRBIqx4uuaOw.png', '2019-07-30 10:03:39', '2019-07-30 16:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','guest','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Admin@gmail.com', NULL, '$2y$10$gnGEThY/JYHfklM1EL0/.OcIkuaJ6GDQWJ9IniEWSQp2i1yNA/S9u', 'I37hEflnpfvUxN9cPBKs0PhGEDriAjWtvsRU4s7zxAgsDg8oilzgboTNlZqi', '2019-07-25 01:10:13', '2019-07-25 01:10:13', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_user_id_foreign` (`user_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_kategori`
--
ALTER TABLE `gallery_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_gallery_gallery_id_foreign` (`gallery_id`),
  ADD KEY `kategori_gallery_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `imgprofil`
--
ALTER TABLE `imgprofil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gallery_kategori`
--
ALTER TABLE `gallery_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `imgprofil`
--
ALTER TABLE `imgprofil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `gallery_kategori`
--
ALTER TABLE `gallery_kategori`
  ADD CONSTRAINT `kategori_gallery_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_gallery_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
