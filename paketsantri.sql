-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 09:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paketsantri`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_asrama`
--

CREATE TABLE `data_asrama` (
  `id_asrama` int(11) NOT NULL,
  `nama_asrama` varchar(100) NOT NULL,
  `gedung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_asrama`
--

INSERT INTO `data_asrama` (`id_asrama`, `nama_asrama`, `gedung`) VALUES
(1, 'laki', 'gedung A'),
(2, 'perempuan', 'gedung B');

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori_paket`
--

CREATE TABLE `data_kategori_paket` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kategori_paket`
--

INSERT INTO `data_kategori_paket` (`id_kategori`, `nama_kategori`) VALUES
(1, 'makanan basah'),
(2, 'makanan kering'),
(3, 'non makanan');

-- --------------------------------------------------------

--
-- Table structure for table `data_paket`
--

CREATE TABLE `data_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `kategori_paket_id` int(11) NOT NULL,
  `penerima_paket_id` int(11) NOT NULL,
  `asrama_id` int(11) NOT NULL,
  `pengirim_paket` varchar(100) NOT NULL,
  `isi_paket_sita` varchar(200) NOT NULL,
  `status_paket` enum('Diambil','Belum Diambil','Disita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_paket`
--

INSERT INTO `data_paket` (`id_paket`, `nama_paket`, `tanggal_diterima`, `kategori_paket_id`, `penerima_paket_id`, `asrama_id`, `pengirim_paket`, `isi_paket_sita`, `status_paket`) VALUES
(7, 'bungkus', '2020-09-23', 1, 2, 1, 'asd', 'vva', 'Belum Diambil'),
(8, 'bingkis', '2020-08-19', 2, 2, 2, 'ascsd', 'bba', 'Disita'),
(9, 'baju', '2020-09-04', 2, 1, 2, 'basrgt', 'iya', 'Disita'),
(10, 'muchsi', '2020-09-08', 2, 363636, 2, 'gfgf', 'aaaa', 'Disita'),
(11, 'bingkis', '2020-09-19', 3, 2, 2, 'ascsd', 'bba', 'Diambil'),
(12, 'r', '2020-09-02', 1, 123, 1, 'ascsd', 'bba', 'Belum Diambil'),
(13, 'a', '2020-09-01', 2, 1, 2, 'basrgt', 'iya', 'Diambil'),
(14, 'g', '2020-05-03', 1, 2, 1, 'gfgf', 'aaaa', 'Diambil'),
(16, 'er', '2020-09-25', 1, 1, 1, 're', 'eeee', 'Disita'),
(17, 'lala', '2020-07-25', 1, 1, 1, 'ttt', 'hhhh', 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `data_santri`
--

CREATE TABLE `data_santri` (
  `NIS` int(100) NOT NULL,
  `nama_santri` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asrama_id` int(11) NOT NULL,
  `total_paket_diterima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_santri`
--

INSERT INTO `data_santri` (`NIS`, `nama_santri`, `alamat`, `asrama_id`, `total_paket_diterima`) VALUES
(1, 'pak bos', 'jl batam no 56', 1, 4),
(2, 'pak ndut', 'jl sawomatang no 77', 2, 2),
(123, 'dudit', 'sebelah', 1, 100),
(444, 'bbbb', 'bbb', 2, 4),
(1212, 'jjaaa', 'vvv', 1, 5),
(1241, 'jj', 'vvv', 2, 3),
(363636, 'muchsin', 'blitar', 1, 5),
(3636361, 'nawal', 'bin auf', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama_user`, `username`, `password`, `level`, `role_id`) VALUES
(2, 'muchsin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 0, 1),
(11, 'erik', 'eee', 'dac0762f688031d2f1f2bb88a4a24dd5', 0, 3),
(12, 'bagas31', 'bagas31', '2ad02161072dd647484a80df989acacc', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`, `menu`) VALUES
(1, 'super admin', 'Dashboard,Data santri,Data Paket,laporan Data paket, laporan kategori dan paket sita,Data user,set'),
(2, 'admin', 'Dashboard,Data santri,Data Paket,laporan Data paket, laporan kategori dan paket sita, set'),
(3, 'petugas', 'Dashboard,Data santri,Data Paket,laporan Data paket, laporan kategori dan paket sita'),
(4, 'guru', 'dashboard,laporan data paket,laporan kategori dan paket sita');

-- --------------------------------------------------------

--
-- Table structure for table `token_lupa_password`
--

CREATE TABLE `token_lupa_password` (
  `id_token` int(11) NOT NULL,
  `token` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `status_reset` varchar(20) NOT NULL,
  `tanggal_ganti_password` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_asrama`
--
ALTER TABLE `data_asrama`
  ADD PRIMARY KEY (`id_asrama`);

--
-- Indexes for table `data_kategori_paket`
--
ALTER TABLE `data_kategori_paket`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_paket`
--
ALTER TABLE `data_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_kategori_paket` (`kategori_paket_id`),
  ADD KEY `id_penerima_paket` (`penerima_paket_id`),
  ADD KEY `id_asrama` (`asrama_id`);

--
-- Indexes for table `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `asrama_id` (`asrama_id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `token_lupa_password`
--
ALTER TABLE `token_lupa_password`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_asrama`
--
ALTER TABLE `data_asrama`
  MODIFY `id_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kategori_paket`
--
ALTER TABLE `data_kategori_paket`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_paket`
--
ALTER TABLE `data_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `NIS` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3636362;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `token_lupa_password`
--
ALTER TABLE `token_lupa_password`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_paket`
--
ALTER TABLE `data_paket`
  ADD CONSTRAINT `data_paket_ibfk_1` FOREIGN KEY (`asrama_id`) REFERENCES `data_asrama` (`id_asrama`),
  ADD CONSTRAINT `data_paket_ibfk_2` FOREIGN KEY (`penerima_paket_id`) REFERENCES `data_santri` (`NIS`),
  ADD CONSTRAINT `data_paket_ibfk_3` FOREIGN KEY (`kategori_paket_id`) REFERENCES `data_kategori_paket` (`id_kategori`);

--
-- Constraints for table `data_santri`
--
ALTER TABLE `data_santri`
  ADD CONSTRAINT `data_santri_ibfk_1` FOREIGN KEY (`asrama_id`) REFERENCES `data_asrama` (`id_asrama`);

--
-- Constraints for table `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
