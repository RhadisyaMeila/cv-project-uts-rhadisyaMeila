CREATE TABLE `biodata` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang_saya` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `email`, `telepon`, `linkedin`, `github`, `instagram`, `alamat`, `tentang_saya`, `ringkasan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Rhadisya Meila Parmanti', 'rhadisyamepa912@gmail.com', '+62 858-1789-6121', 'www.linkedin.com/in/rhadisya-meila-parmanti', 'https://github.com/rhadisyaMeila', 'https://instagram.com/rhadisyameila', 'Sukabumi, Indonesia', 'Saya adalah seorang Web Developer berdedikasi dan memiliki passion kuat dalam pengembangan aplikasi web modern yang inovatif dan efisien. Saya memiliki pengalaman solid dalam backend dan frontend, khususnya dengan Kotlin, PHP, dan JavaScript. Saya berfokus pada pembangunan solusi digital yang tidak hanya berfungsi, tetapi juga memiliki performa optimal', 'Halo! Senang Bertemu Anda! Saya Rhadisya Meila Parmanti, seorang Web Developer.', '/images/profiles/rhadisyameila.jpg', '2025-11-14 21:44:01', '2025-11-14 21:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `nama_keahlian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` enum('pemula','menengah','mahir') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `biodata_id`, `nama_keahlian`, `tingkat`, `kategori`, `created_at`, `updated_at`) VALUES
(9, 1, 'Kotlin', 'mahir', 'Programming Language', '2025-11-16 06:12:00', '2025-11-16 06:12:00'),
(10, 1, 'PHP', 'mahir', 'Programming Language', '2025-11-16 06:12:00', '2025-11-16 06:12:00'),
(11, 1, 'JavaScript', 'mahir', 'Programming Language', '2025-11-16 06:12:00', '2025-11-16 06:12:00'),
(12, 1, 'MySQL', 'menengah', 'Database', '2025-11-16 06:12:00', '2025-11-16 06:12:00'),
(13, 1, 'Bootstrap', 'menengah', 'CSS Framework', '2025-11-16 06:12:00', '2025-11-16 06:12:00'),
(14, 1, 'Git', 'menengah', 'Version Control', '2025-11-16 06:12:00', '2025-11-16 06:12:00'),
(15, 1, 'Laravel', 'pemula', 'Framework', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_11_15_035229_create_biodata_table', 1),
(6, '2025_11_15_035302_create_pendidikan_table', 1),
(7, '2025_11_15_035313_create_pengalaman_table', 1),
(9, '2025_11_15_035333_create_keahlian_table', 2),
(10, '2025_11_16_071127_update_biodata_add_ringkasan_social_media_and_create_sertifikasi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `institusi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `institusi`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Universitas Muhammadiyah Sukabumi ', 'Teknik Informatika', 2023, 2027, 'Fokus pada pengembangan web dan mobile applications. Aktif dalam organisasi mahasiswa.', '2025-11-14 21:44:01', '2025-11-14 21:44:01'),
(2, 1, 'SMA Negeri 1 Jampangkulon', 'IPA', 2020, 2023, 'Aktif dalam organisasi OSIS dan kegiatan ekstrakurikuler programming.', '2025-11-14 21:44:01', '2025-11-14 21:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` bigint UNSIGNED NOT NULL,
  `biodata_id` bigint UNSIGNED NOT NULL,
  `jenis` enum('organisasi','magang','pekerjaan','proyek') COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan_organisasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mulai` year NOT NULL,
  `tahun_selesai` year NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `biodata_id`, `jenis`, `posisi`, `perusahaan_organisasi`, `tahun_mulai`, `tahun_selesai`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'pekerjaan', 'Asisten Dosen (Lecturer Assistant)', 'Universitas Muhammadiyah Sukabumi', 2025, 2026, 'Membantu dosen dalam mempersiapkan dan menyampaikan materi kuliah. Membimbing lebih dari 30 mahasiswa tingkat pertama melalui latihan selama sesi kelas dan memberikan masukan pada tugas mahasiswa. Mengelola catatan kehadiran dan membantu tugas-tugas administrasi. Mengajar beberapa kelas di Jurusan Teknik Informatika untuk Kalkulus.', '2025-11-14 21:44:01', '2025-11-14 21:44:01'),
(2, 1, 'organisasi', 'Divisi Kesehatan', 'Panitia Masa Orientasi Prodi Teknik Informatika Universitas Muhammadiyah Sukabumi', 2024, 2024, 'Berperan dalam divisi kesehatan untuk memastikan pelaksanaan kegiatan orientasi berjalan kondusif dengan mengawal kesiapan fasilitas kesehatan, pengawasan kondisi peserta, serta perencanaan Medical Check-Up bekerjasama dengan pihak mitra.', '2025-11-14 21:44:01', '2025-11-14 21:44:01'),
(7, 1, 'organisasi', 'Anggota Aktif', 'OSIS SMA Negeri 1 Jampangkulon', 2020, 2023, 'Aktif dalam organisasi OSIS dan kegiatan ekstrakurikuler programming selama menempuh pendidikan jurusan IPA. Kegiatan programming berfokus pada pengembangan dasar logika dan koding.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int NOT NULL,
  `biodata_id` int DEFAULT NULL,
  `judul_project` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `teknologi_digunakan` varchar(255) DEFAULT NULL,
  `link_demo` varchar(255) DEFAULT NULL,
  `link_github` varchar(255) DEFAULT NULL,
  `gambar_project` varchar(255) DEFAULT NULL,
  `tahun_dibuat` year DEFAULT NULL,
  `kategori` enum('web_app','mobile','desktop','other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `biodata_id`, `judul_project`, `deskripsi`, `teknologi_digunakan`, `link_demo`, `link_github`, `gambar_project`, `tahun_dibuat`, `kategori`) VALUES
(1, 1, 'My Time Routine: Cyberpunk Productivity App', 'Aplikasi manajemen waktu mobile berbasis Android yang memungkinkan pengguna membuat, menjalankan timer, dan melacak statistik aktivitas harian. Menggunakan Room Database untuk penyimpanan data lokal secara real-time dan mengadopsi estetika unik Cyberpunk Neon Pixel Art.', 'Kotlin, Room DB, Coroutines, Flow, MPAndroidChart, Glide', '', 'https://github.com/RhadisyaMeila/MyTimeRoutine.git', '/images/portofolio/project1.jpg', 2024, 'mobile'),
(2, 1, 'DiaryApp - Buku Harian Digital', 'Aplikasi buku harian digital responsif dengan tampilan aesthetic yang dapat beradaptasi di berbagai perangkat (mobile, tablet, desktop). Menggunakan font decorative dan color palette pastel untuk pengalaman menulis yang menyenangkan.', 'React Native, Expo, JavaScript, React Navigation', '', 'https://github.com/RhadisyaMeila/diary-app.git', '/images/portofolio/project2.jpg', 2025, 'mobile'),
(3, 1, 'Bioskop Rhadisya Meila XXI – Futuristic Ticket Booking App', 'Aplikasi pemesanan tiket bioskop dengan fitur login, dashboard film, pemesanan tiket interaktif, dan riwayat pesanan. Mengadopsi desain futuristik dengan pengalaman pengguna yang modern.', 'HTML, CSS, JavaScript, LocalStorage', '', 'https://github.com/RhadisyaMeila/Bioskop.git', '/images/portofolio/project3.jpg', 2025, 'web_app'),
(4, 1, 'Aramedic : Aplikasi Konsultasi & Pendaftaran Dokter Online ', 'Aplikasi mobile-first untuk membantu pengguna mencari dokter berdasarkan spesialisasi (Dermatology, Neurology, dll.) dan gejala umum, serta melakukan booking appointment dengan melihat ketersediaan jadwal dokter.', 'Kotlin, Room DB, Coroutines, Flow, Glide', NULL, 'https://github.com/RhadisyaMeila/aramedic.git', '/images/portofolio/project4.jpg', 2025, 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikasi`
--

CREATE TABLE `sertifikasi` (
  `id` int NOT NULL,
  `biodata_id` int DEFAULT NULL,
  `nama_sertifikasi` varchar(255) DEFAULT NULL,
  `institusi_penerbit` varchar(255) DEFAULT NULL,
  `tahun_diterbit` year DEFAULT NULL,
  `link_sertifikasi` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sertifikasi`
--

INSERT INTO `sertifikasi` (`id`, `biodata_id`, `nama_sertifikasi`, `institusi_penerbit`, `tahun_diterbit`, `link_sertifikasi`, `deskripsi`) VALUES
(1, 1, 'Sertifikat Asisten Praktikum Kalkulus', 'Universitas Muhammadiyah Sukabumi', 2025, '', 'Sebagai Asisten Praktikum Kalkulus pada kegiatan Praktikum Semester Ganjil Tahun Akademik 2025/2026. Periode September - Januari 2026.'),
(2, 1, 'Sertifikat Panitia Masa Orientasi Teknik Informatika 2024', 'Program Studi Teknik Informatika', 2024, '', 'Sebagai Panitia Bidang KESEHATAN. Tema: \"Membangun Kepemimpinan yang Berintegritas Berlandaskan Nilai Kekeluargaan dan Etika\".'),
(3, 1, 'Get Started with Cloud Storage (Skill Badge)', 'Google Cloud', 2025, '', 'Data Management Skill Badge');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keahlian_biodata_id_foreign` (`biodata_id`);

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
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikan_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengalaman_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
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
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sertifikasi`
--
ALTER TABLE `sertifikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
