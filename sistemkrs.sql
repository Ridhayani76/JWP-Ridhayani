-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2022 pada 14.20
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemkrs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama_dsn` varchar(35) NOT NULL,
  `nip` bigint(21) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dsn`, `nip`, `status`) VALUES
(1, 'Tio Aditya', 19710823, 'Dosen PNS'),
(2, 'Joni Lee', 19710821, 'Dosen Tetap PNS'),
(3, 'Haikal', 19100392, 'DOSEN TIDAK TETAP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(12) NOT NULL,
  `kd_waktu` int(11) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL,
  `nip` bigint(21) NOT NULL,
  `nim` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kode_mk`, `kd_waktu`, `kode_ruang`, `nip`, `nim`) VALUES
(2, '001', 1, 'FST-104', 19710821, 19106050034),
(3, '234', 2, 'FST-302', 19100392, 19106050045);

-- --------------------------------------------------------

--
-- Struktur dari tabel `makul`
--

CREATE TABLE `makul` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(12) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `sks` int(1) NOT NULL,
  `jenis_mk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makul`
--

INSERT INTO `makul` (`id`, `kode_mk`, `nama_mk`, `sks`, `jenis_mk`) VALUES
(1, '001', 'Algoritma', 3, 'Wajib'),
(2, '234', 'Pemrograman Web', 3, 'Wajib'),
(3, '456', 'Rekayasa Perangkat Lunak', 2, 'Wajib');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nama_mhs` varchar(35) NOT NULL,
  `nim` bigint(12) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`id`, `nama_mhs`, `nim`, `prodi`, `fakultas`, `semester`) VALUES
(7, 'Ridhayani', 19106050045, 'Teknik Informatika', 'Sains dan Teknologi', 7),
(13, 'Mahen', 19106050034, 'Teknik Informatika', 'Sains dan Teknologi', 7),
(14, 'Jeri', 20106050004, 'Teknik Informatika', 'Sains dan Teknologi', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  `proyektor` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `kode_ruang`, `kapasitas`, `proyektor`) VALUES
(1, 'FST-104', 20, 'Ada'),
(2, 'FST-302', 20, 'Ada'),
(3, 'FST-404', 30, 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id` int(11) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `mulai_pukul` time NOT NULL,
  `selesai_pukul` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id`, `hari`, `mulai_pukul`, `selesai_pukul`) VALUES
(1, 'Senin', '08:00:00', '10:00:00'),
(2, 'Selasa', '09:30:00', '11:30:00'),
(3, 'Rabu', '13:00:00', '14:40:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_makul` (`kode_mk`),
  ADD KEY `kd_waktu` (`kd_waktu`),
  ADD KEY `kd_ruang` (`kode_ruang`),
  ADD KEY `kode_mk` (`kode_mk`,`kd_waktu`,`kode_ruang`,`nip`,`nim`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_mk` (`kode_mk`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_ruang` (`kode_ruang`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `makul`
--
ALTER TABLE `makul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang` (`kode_ruang`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kd_waktu`) REFERENCES `waktu` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`),
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`kode_mk`) REFERENCES `makul` (`kode_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
