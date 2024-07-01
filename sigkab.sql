-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2024 pada 18.54
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
-- Database: `sigkab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `kode_desa` int(11) NOT NULL,
  `kode_kecamatan` varchar(100) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `alamat_desa` varchar(100) NOT NULL,
  `koordinat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`kode_desa`, `kode_kecamatan`, `nama_desa`, `alamat_desa`, `koordinat`) VALUES
(33212002, '3302010', 'Canduk', 'Caduk, Kec. Lumbir, Kabupaten Banyumas', '-7.4876205,109.016327'),
(33212006, '3302010', 'Cidora', 'Cidora, Kec. Lumbir, Kabupaten Banyumas', '-7.4762057,108.982588'),
(332022006, '3302020', 'Banteran', 'Jl. Banteran, Sengkalputung, Banteran, Kec. Wangon, Kabupaten Banyumas', '-7.5058569,109.0600408'),
(332022009, '3302020', 'Cikakak', 'Jl. Ajibarang - Wangon, Winduraja Wetan, Cikakak, Kec. Wangon, Kabupaten Banyumas', '-7.4799431,109.0619537'),
(332241003, '3302710', 'Berkoh', 'Jl. Gerilya Timur No.26, Sokabaru, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas', '-7.4378462,109.2571266'),
(332241007, '3302710', 'Tanjung', 'Jl. Kamper Raya, Bojong, Tanjung, Kec. Purwokerto Sel., Kabupaten Banyumas', '-7.438056,109.1957236'),
(332261001, '3302730', 'Sokanegara', 'JL Dr. Angka, No. 69, Karangkobar, Sokanegara, Kec. Purwokerto Tim., Kabupaten Banyumas', '-7.4160768,109.1997401'),
(332261002, '3302730', 'Kranji', 'Jl. Adhyaksa, Brubahan, Kranji, Kec. Purwokerto Tim., Kabupaten Banyumas', '-7.426179,109.2141397'),
(332271005, '3302740', 'Grendeng', 'Jl. Kampus No.608, Brubahan, Grendeng, Kec. Purwokerto Utara, Kabupaten Banyumas', '-7.4024077,109.2465992'),
(332271007, '3302740', 'Brobosan', 'Jl. Kamandaka No.8, Bobosan, Kec. Purwokerto Utara, Kabupaten Banyumas', '-7.4080841,109.2172605');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `kode_kabupaten` varchar(100) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `koordinat` varchar(100) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `luas_wilayah` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `kode_kabupaten`, `nama_kabupaten`, `koordinat`, `jumlah_penduduk`, `luas_wilayah`) VALUES
(1, '3302', 'Banyumas', '-7.362274826893668, 109.10943969842893', 82317924, 17083020.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kode_kecamatan` varchar(100) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `jumlah_penduduk` int(11) NOT NULL,
  `luas_wilayah` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kode_kecamatan`, `id_kabupaten`, `nama_kecamatan`, `jumlah_penduduk`, `luas_wilayah`) VALUES
('3302010', 1, 'LUMBIR', 50546, 10266.00),
('3302020', 1, 'WANGON', 84755, 6078.00),
('3302710', 1, 'PURWOKERTO SELATAN', 74305, 13705.00),
('3302730', 1, 'PURWOKERTO TIMUR', 58451, 8402.00),
('3302740', 1, 'PURWOKERTO UTARA', 48264, 90139.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`kode_desa`),
  ADD KEY `kode_kecamatan` (`kode_kecamatan`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kode_kecamatan`),
  ADD KEY `kecamatan_ibfk_1` (`id_kabupaten`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_2` FOREIGN KEY (`kode_kecamatan`) REFERENCES `kecamatan` (`kode_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_2` FOREIGN KEY (`id_kabupaten`) REFERENCES `kabupaten` (`id_kabupaten`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
