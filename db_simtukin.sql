-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2020 pada 14.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simtukin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongans`
--

CREATE TABLE `golongans` (
  `golongan_id` bigint(20) UNSIGNED NOT NULL,
  `golongan_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_angka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `golongans`
--

INSERT INTO `golongans` (`golongan_id`, `golongan_nama`, `golongan_angka`, `created_at`, `updated_at`) VALUES
(1, 'Juru', 'Golongan I', NULL, NULL),
(2, 'Pengatur', 'Golongan II', NULL, NULL),
(3, 'Penata', 'Golongan III', NULL, NULL),
(4, 'Pembina', 'Golongan IV', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `grades`
--

CREATE TABLE `grades` (
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `grade_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grades`
--

INSERT INTO `grades` (`grade_id`, `grade_nama`, `grade_nominal`, `created_at`, `updated_at`) VALUES
(2, '5', 2493000, '2020-12-07 00:34:07', '2020-12-09 02:23:45'),
(3, '6', 2702000, '2020-12-07 00:34:18', '2020-12-09 02:25:11'),
(5, '7', 2928000, '2020-12-09 06:51:28', '2020-12-09 06:51:28'),
(9, '8', 3000000, '2020-12-12 06:57:51', '2020-12-12 06:57:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterlambatans`
--

CREATE TABLE `keterlambatans` (
  `terlambat_id` bigint(20) UNSIGNED NOT NULL,
  `terlambat_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `terlambat_waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_pegawais`
--

CREATE TABLE `kinerja_pegawais` (
  `kinerja_id` bigint(20) UNSIGNED NOT NULL,
  `kinerja_status` enum('belum','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kinerja_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kinerja_tahun` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kinerja_pegawais`
--

INSERT INTO `kinerja_pegawais` (`kinerja_id`, `kinerja_status`, `kinerja_bulan`, `kinerja_tahun`, `created_at`, `updated_at`) VALUES
(1, 'belum', 'Desember', '2020', '2020-12-07 12:16:47', '2020-12-10 13:53:23'),
(2, 'belum', 'Januari', '2021', '2020-12-07 12:17:05', NULL),
(25, 'belum', 'Februari', '2021', '2020-12-12 06:59:31', '2020-12-12 06:59:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_pegawai_details`
--

CREATE TABLE `kinerja_pegawai_details` (
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `detail_user_id` bigint(20) UNSIGNED NOT NULL,
  `detail_kinerja_id` bigint(20) UNSIGNED NOT NULL,
  `detail_hukuman_disiplin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_sakit_dgn_surat` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_sakit_tanpa_surat` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_cuti_bersalin` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanpa_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_07_022206_create_grades_table', 2),
(5, '2020_12_07_022526_create_kinerja_pegawais_table', 2),
(6, '2020_12_07_022608_create_kinerja_pegawai_details_table', 2),
(7, '2020_12_07_022808_create_keterlambatans_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkats`
--

CREATE TABLE `pangkats` (
  `pangkat_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_golongan_id` bigint(20) UNSIGNED NOT NULL,
  `pangkat_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pangkats`
--

INSERT INTO `pangkats` (`pangkat_id`, `pangkat_golongan_id`, `pangkat_nama`, `pangkat_ruang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Juru Muda', 'A', NULL, NULL),
(2, 1, 'Juru Muda Tingkat I', 'B', NULL, NULL),
(3, 1, 'Juru', 'C', NULL, NULL),
(4, 1, 'Juru Tingkat I', 'D', NULL, NULL),
(5, 2, 'Pengatur Muda', 'A', NULL, NULL),
(6, 2, 'Pengatur Muda Tingkat I', 'B', NULL, NULL),
(7, 2, 'Pengatur', 'C', NULL, NULL),
(8, 2, 'Pengatur Tingkat I', 'D', NULL, NULL),
(9, 3, 'Penata Muda', 'A', NULL, NULL),
(10, 3, 'Penata Muda Tingkat I', 'B', NULL, NULL),
(11, 3, 'Penata', 'C', NULL, NULL),
(12, 3, 'Penata Tingkat I', 'D', NULL, NULL),
(13, 4, 'Pembina', 'A', NULL, NULL),
(14, 4, 'Pembina Tingkat I', 'B', NULL, NULL),
(15, 4, 'Pembina Utama Muda', 'C', NULL, NULL),
(16, 4, 'Pembina Utama Madya', 'D', NULL, NULL),
(17, 4, 'Pembina Utama', 'E', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_grade_id` bigint(20) DEFAULT NULL,
  `user_pangkat_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_nik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` enum('TAMAT SD / SEDERAJAT','SLTP / SEDERAJAT','SLTA / SEDERAJAT','DIPLOMA I / II','AKADEMI / DIPLOMA III / S. MUDA','DIPLOMA IV / STRATA I','STRATA II','STRATA III','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` enum('Belum Kawin','Kawin Tercatat','Kawin Belum Tercatat','Cerai Hidup','Cerai Mati') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pegawai` enum('PNS','Non PNS','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Pegawai','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_grade_id`, `user_pangkat_id`, `name`, `email`, `email_verified_at`, `password`, `nip_nik`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `tempat_lahir`, `agama`, `pendidikan`, `jabatan`, `status_perkawinan`, `status_pegawai`, `no_hp`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 'admin', 'admin@gmail.com', NULL, '$2y$10$WwvxQOr4Xi/kaPA.0OXmvOOdN7ZDyDdMF2FkElpTsKw.vNPTqH.lq', '', 'Laki-Laki', '', '0000-00-00', '', 'Islam', 'TAMAT SD / SEDERAJAT', '', 'Belum Kawin', 'PNS', '', 'Admin', NULL, '2020-12-05 06:17:05', '2020-12-05 06:17:05'),
(15, 9, 15, 'nofrianti', 'nofrianti@gmail.com', NULL, '$2y$10$uGua5QZsSduiDmV4hbG9RuMJ.UzBGtA5ZWhzOkc/pf07i9TBWRmfW', '46274', 'Perempuan', 'pekanbaru', '2020-12-02', 'Ujung Batu', 'Islam', 'DIPLOMA IV / STRATA I', 'Master', 'Belum Kawin', 'PNS', '444145', 'Pegawai', NULL, '2020-12-12 06:59:00', '2020-12-12 06:59:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`golongan_id`);

--
-- Indeks untuk tabel `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indeks untuk tabel `keterlambatans`
--
ALTER TABLE `keterlambatans`
  ADD PRIMARY KEY (`terlambat_id`);

--
-- Indeks untuk tabel `kinerja_pegawais`
--
ALTER TABLE `kinerja_pegawais`
  ADD PRIMARY KEY (`kinerja_id`);

--
-- Indeks untuk tabel `kinerja_pegawai_details`
--
ALTER TABLE `kinerja_pegawai_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pangkats`
--
ALTER TABLE `pangkats`
  ADD PRIMARY KEY (`pangkat_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `golongans`
--
ALTER TABLE `golongans`
  MODIFY `golongan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `keterlambatans`
--
ALTER TABLE `keterlambatans`
  MODIFY `terlambat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `kinerja_pegawais`
--
ALTER TABLE `kinerja_pegawais`
  MODIFY `kinerja_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kinerja_pegawai_details`
--
ALTER TABLE `kinerja_pegawai_details`
  MODIFY `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pangkats`
--
ALTER TABLE `pangkats`
  MODIFY `pangkat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
