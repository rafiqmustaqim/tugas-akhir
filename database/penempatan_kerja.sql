-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Feb 2021 pada 10.53
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penempatan_kerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `id_prodi` varchar(5) DEFAULT NULL,
  `konsentrasi` varchar(50) DEFAULT NULL,
  `minat` varchar(100) DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `toeic` int(11) DEFAULT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon_orangtua` varchar(15) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `id_prodi`, `konsentrasi`, `minat`, `ipk`, `toeic`, `tahun_akademik`, `alamat`, `telepon`, `email`, `telepon_orangtua`, `foto`) VALUES
('180221070011', 'Nama Mahasiswa', 'KA', NULL, 'Akuntan', '2.90', 350, '2018/2019', 'Depok', '083808808571', 'asal@asalan.com', '08238983839', NULL),
('180221070031', 'Amara Faradilla', 'KA', NULL, 'Akuntan, Admin, Keuangan', '3.59', 400, '2018/2019', 'Jl. Danau Toba Ujung', '083721898094', 'amaraf@gmail.com', '083882233222', '180221070031.jpg'),
('180221070039', 'Asal', 'AB', NULL, 'sasdasd', '3.80', 200, '2018/2019', 'drtdt', '0812802132411', 'asal@asalan.com', '083882233222', '180221070039.jpg'),
('180288277770', 'Mahasiswa', 'AB', NULL, 'Database Admin, Programmer', '2.90', 200, '2019/2020', 'Database Administrator, Programmer, Web Programmer', '08231882000', 'mahasiswa@gmail.com', '0838399999898', NULL),
('1802882777701', 'Romdon Alamsyah', 'MI', NULL, '', '3.10', 300, '2020/2021', 'Depok', '0812802132411', 'asal@asalan.com', '08238983839', '1802882777701.jpg'),
('180442070017', 'Rafiq Mustaqim', 'MI', NULL, '', '3.30', 410, '2019/2020', 'Jl. Kemang RT 01/05 Kel. Pasir Putih, Kec. Sawangan , Depok Jawa Barat. 16519', '088683686391', 'rafiqmustaqim28@gmail.com', '92034790732', '180442070017.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minat_mahasiswa`
--

CREATE TABLE `minat_mahasiswa` (
  `id_minat` int(11) NOT NULL,
  `jenis_minat` varchar(50) DEFAULT NULL,
  `nim_mahasiswa` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `permintaan_via` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `jabatan` varchar(35) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `kriteria` text,
  `status_kerja` varchar(15) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `permintaan_via`, `tanggal`, `contact_person`, `jabatan`, `telepon`, `email`, `posisi`, `kriteria`, `status_kerja`, `kategori`) VALUES
(1, 'PT. Indofermex', 'Jl. Tole Iskandar', 'whatsapp', '0000-00-00', 'Adhi Ridwan', 'HRD', '083808808571', 'adhi@gmail.com', 'Programmer', 'PHP , MysSQL, HTML, CSS', 'Magang', 'permintaan'),
(6, 'PT. Maju Mundur', 'Depok', 'whatsapp', NULL, 'Adhi Ridwans', 'HRD', '0812802132412', 'member@gmail.com', 'Akuntan', 'Zahir, Office', 'Kerja', 'penawaran'),
(7, 'PT Pratesis', 'Jl. Mampang Prapatan Raya', 'whatsapp', '2021-02-19', 'Bu Kunti', 'HRD', '088683686391', 'asal@asalan.com', 'App Support', 'Yang Penting Mau Belajar', 'Kerja', 'penawaran'),
(8, 'PT Indosat Tbk', 'Jakarta', 'email', NULL, 'Rafiq', 'Direktur', '083834348383', 'rafiqmustaqim28@gmail.com', 'Programmer', 'Menguasai Framework', 'Kerja', 'permintaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(5) NOT NULL,
  `nama_prodi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
('AB', 'Administrasi Bisnis'),
('HUMAS', 'Hubungan Masyarakat'),
('KA', 'Komputerisasi Akuntansi'),
('MI', 'Manajemen Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_penempatan`
--

CREATE TABLE `proses_penempatan` (
  `id_proses` int(11) NOT NULL,
  `fk_id_perusahaan` int(11) NOT NULL,
  `nim_mahasiswa` varchar(15) DEFAULT NULL,
  `tgl_proses` date DEFAULT NULL,
  `posisi_dilamar` varchar(35) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `keterangan` text,
  `permasalahan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proses_penempatan`
--

INSERT INTO `proses_penempatan` (`id_proses`, `fk_id_perusahaan`, `nim_mahasiswa`, `tgl_proses`, `posisi_dilamar`, `status`, `keterangan`, `permasalahan`) VALUES
(18, 1, '180221070031', '2020-01-13', 'Akuntan', 'Kerja', 'Diterima', NULL),
(19, 1, '180442070017', '2020-01-13', 'Staf Programmer', 'Kerja', 'Diterima', NULL),
(20, 8, '1802882777701', '2021-02-17', 'Akuntan', 'Kerja', 'Diterima', NULL),
(21, 6, '180221070031', '2021-02-17', 'Staf Keuangan', 'Kerja', 'Tidak Lolos Interview', NULL),
(22, 1, '180442070017', '2021-02-18', 'Staf Keuangan', 'Kerja', 'Diterima', NULL),
(23, 8, '180442070017', '2021-02-19', 'Programmer', 'Kerja', 'Diterima', NULL),
(24, 8, '180442070017', '2021-02-20', 'Programmer', 'Kerja', 'Diterima', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `email`, `level`, `status`) VALUES
(1, 'rafiq', '3ee799373c31aec6597d4f79b44c7278c31a9c8e', 'Rafiq Mustaqim', 'rafiqmustaqim28@gmail.com', 'ADM', 1),
(5, 'Heny', '90a91f26c7da72864df0ad8a773a0d966a9932e7', 'Heny Arna Aprilia', 'heny@arna.aprila.co.id', 'ADM', 1),
(7, 'mara', '2335d06cdeac720fc5060327a82b2708b96c400b', 'mara', 'mara@takim.com', 'ADM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `minat_mahasiswa`
--
ALTER TABLE `minat_mahasiswa`
  ADD PRIMARY KEY (`id_minat`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `proses_penempatan`
--
ALTER TABLE `proses_penempatan`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `minat_mahasiswa`
--
ALTER TABLE `minat_mahasiswa`
  MODIFY `id_minat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `proses_penempatan`
--
ALTER TABLE `proses_penempatan`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
