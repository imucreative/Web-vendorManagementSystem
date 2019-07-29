-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jul 2019 pada 17.10
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imun8523_vms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbcatalog`
--

CREATE TABLE `dtbcatalog` (
  `catalogId` int(11) NOT NULL,
  `vendorId` varchar(5) NOT NULL,
  `name` varchar(45) NOT NULL,
  `file` varchar(100) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbcategory`
--

CREATE TABLE `dtbcategory` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbcategory`
--

INSERT INTO `dtbcategory` (`categoryId`, `name`, `delete`) VALUES
(1, 'PIPING', 0),
(2, 'ELECTRICAL', 0),
(3, 'CIVIL', 0),
(4, 'TOOLS', 0),
(23, 'SEWA EQUIPMENT', 0),
(24, 'MECHANICAL', 0),
(25, 'TERG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbinfo`
--

CREATE TABLE `dtbinfo` (
  `infoId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `logoFull` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbinfo`
--

INSERT INTO `dtbinfo` (`infoId`, `name`, `alias`, `address`, `telp`, `fax`, `email`, `logo`, `logoFull`) VALUES
(1, 'CV. TRUST JAYA', 'TRJ', 'PONDOK CILEGON INDAH BLOK D23 NO 06 CILEGON BANTEN', '0254 387280', '0254 387280', 'trustjaya@gmail.com', 'logo.png', 'logo-full.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbstatususer`
--

CREATE TABLE `dtbstatususer` (
  `statusId` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbstatususer`
--

INSERT INTO `dtbstatususer` (`statusId`, `name`, `delete`) VALUES
(1, 'Administartor', 0),
(2, 'Procurement', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbusers`
--

CREATE TABLE `dtbusers` (
  `userId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1= aktif, 2= tidak aktif',
  `delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbusers`
--

INSERT INTO `dtbusers` (`userId`, `name`, `username`, `password`, `status`, `delete`) VALUES
(1, 'Naira', 'naira', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'Agam', 'agam', '93aa88d53279ccb3e40713d4396e198f', 2, 0),
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(5, 'Ibnu', 'ibnu', '9c5e461fe9e504323a2bb37ae7de413c', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbvendor`
--

CREATE TABLE `dtbvendor` (
  `vendorId` varchar(5) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `address` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `catalog` varchar(50) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbvendor`
--

INSERT INTO `dtbvendor` (`vendorId`, `categoryId`, `name`, `description`, `address`, `telp`, `fax`, `email`, `npwp`, `catalog`, `delete`) VALUES
('CCC', 1, 'CAKRA CITRA CEMPAKA', 'PT XX', 'XXX', '123', '1234', 'CCC@GM.COM', '1231231.231.231.2', 'Chrysanthemum.jpg', 0),
('CTJ', 3, 'CV TRUST JAYA123', 'PENYEWAAN BARANG-BARANG ELECTRICT123', 'JL RAYA PONDOK123', '089998089890A', '0821982892A', 'CTJ@GMAIL.COM', '999182923637A', 'inquiry_64.png', 0),
('HMI', 24, 'HYUNDAI MOBIL INDONESIA', 'VENDOR MOBIL OPERASIONAL', 'JL TEUKU NYAK ARIEF', '0877777777', '089999999', 'SALES@HYUNDAIMOBIL.C', '123123-345345-345345', 'download.png', 0),
('HNK', 23, 'HAFIS NURYATAMA KONTRUKSIPOI', 'SEWA CRANE', 'AAA', '111', '111', 'HNK@GMAIL.COME', '1', '', 0),
('MMA', 1, 'PT MITRA MAKMUR ANGKASA123', 'PERUSAHAAN TOOLS123', 'JL RAYA KAPUK 123', '08777123', '08888123', 'MITRA123@GMAIL.COMET', '2', '', 0),
('SLA', 1, 'SINAR LAUT ABADI', 'JUAL PIPA', 'JL RAYA LAGI', '0877777', '0866666', 'sla@gmail.com', '3', '', 0),
('TM', 4, 'TERUS MAJU', 'JUAL ALAT BANGUNAN', 'JL RAYA', '08777', '08999', 'TM@GMAIL.COM', '4', '', 0),
('TMO', 2, 'TERUS MAJU OKE', 'JUAL ALAT BANGUNAN', 'JL RAYA', '08777', '08999', 'tm@gmail.com', '5', '', 0),
('VMIP', 24, 'VALVEMATIC INDO PRATAMA', 'PNEUMATIC, ELECTRICAL ACTUATOR, VALVE AUTOMATION CONTROL DAN VIBRATOR ISOLATOR', 'JL. HAYAM WURUK NO 127 JAKARTA BARAT DKI JAKARTA 11180, INDONESIA', '02162310899', '02162310899', 'VALVEMATICINDO@GMAIL.COM', '01.000.993.88.333', '13_electrical.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtremail`
--

CREATE TABLE `dtremail` (
  `id` int(11) NOT NULL,
  `vendorId` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `sendFrom` varchar(45) NOT NULL,
  `sendTo` varchar(45) NOT NULL,
  `sendCc` varchar(45) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dtremail`
--

INSERT INTO `dtremail` (`id`, `vendorId`, `date`, `sendFrom`, `sendTo`, `sendCc`, `subject`, `message`, `attachment`, `status`, `delete`) VALUES
(11, 'SLA', '2019-07-20', 'sales@gmail.com', 'dyanzzz@gmail.com', '', 'Note untuk PT xxx', '<p>Dear.</p><p>Mohon untuk mengirimkan daftar harga yang lebih detail</p>', '', 0, 0),
(12, 'SLA', '2019-07-20', 'sales@gmail.com', 'sla@gmail.com', 'poi@tre', 'poi', '<p>poi</p>', '', 0, 0),
(13, 'SLA', '2019-07-20', 'sales@gmail.com', 'tm@gmail.com', 'poi@tre', 'tre', '<p><b>tre</b></p>', '', 0, 0),
(14, 'SLA', '2019-07-20', 'sales@gmail.com', 'TM@GMAIL.COM', 'aasdasd@q', 'asd', '<p>asd</p>', '', 0, 0),
(15, 'HNK', '2019-07-23', 'budi@gmail.com', 'HNK@GMAIL.COME', 'budi@gmail.om', 'tes', '<p>tes aja</p>', '', 0, 0),
(16, 'HNK', '2019-07-23', 'budi@gmail.com', 'HNK@GMAIL.COME', 'asd', 'asd', '<p>asd</p>', '', 0, 0),
(17, 'TM', '2019-07-23', 'budi@gmail.com', 'TM@GMAIL.COM', 'asd', 'asd', '<p>asd</p>', '', 0, 0),
(18, 'TM', '2019-07-23', 'budi@gmail.com', 'TM@GMAIL.COM', 'asd', 'asd', '<p>asd</p>', 'inquiry_5121.png', 0, 0),
(19, 'HMI', '2019-07-23', 'budi@gmail.com', 'SALES@HYUNDAIMOBIL.Com', 'anwar@gmail.com', 'minta catalog mobil hyundai', '<p>dear hyundai</p><p>saya minta catalog mobil hyundai tucson dan kona sebagai perbandingan.</p><p>mohon dikirimkan juga price list lieasing</p><p><br></p><p>regards</p><p>budi</p>', 'business2.png', 0, 0),
(20, 'CTJ', '2019-07-23', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes', '<p>tes</p>', '', 0, 0),
(21, 'HMI', '2019-07-23', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes aja', '<p>tes aja</p>', '', 0, 0),
(22, 'HMI', '2019-07-23', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes aja', '<p>tes aja</p>', '', 0, 0),
(23, 'MMA', '2019-07-23', 'anto@gmail.com', 'dyanzzz@gmail.com', 'dian.trib@gmail.com', 'Tes lagi aja ke gmail', '<p>Tes lagi aja ke gmail<br></p>', 'package_512.png', 0, 0),
(24, 'VMIP', '2019-07-24', 'trustjaya@gmail.com', 'VALVEMATICINDO@GMAIL.COM', 'ibnuchaidir.trj@gmail.com', 'Testing', '<p>Testing</p>', 'Safety_Respirator.pdf', 0, 0),
(25, 'VMIP', '2019-07-24', 'trustjaya@gmail.com', 'VALVEMATICINDO@GMAIL.COM', 'ibnuchaidir.trj@gmail.com', 'Testing', '<p>test</p>', '04_head.pdf', 0, 0),
(26, 'VMIP', '2019-07-24', 'trustjaya@gmail.com', 'ibnuchaidir.94@gmail.com', 'ibnuchaidir.trj@gmail.com', 'Testing', '<p>test</p>', '04_head2.pdf', 0, 0),
(27, 'VMIP', '2019-07-24', 'trustjaya@gmail.com', 'ibnuchaidir.94@gmail.com', 'ibnuchaidir.trj@gmail.com', 'Testing', '<p>test</p>', '04_head4.pdf', 0, 0),
(28, 'VMIP', '2019-07-24', 'trustjaya@gmail.com', 'ibnuchaidir.94@gmail.com', 'ibnuchaidir.trj@gmail.com', 'Testing', '<p>test</p>', '04_head6.pdf', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtrproject`
--

CREATE TABLE `dtrproject` (
  `projectId` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtrprojectvendor`
--

CREATE TABLE `dtrprojectvendor` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `vendorId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dtbcatalog`
--
ALTER TABLE `dtbcatalog`
  ADD PRIMARY KEY (`catalogId`);

--
-- Indeks untuk tabel `dtbcategory`
--
ALTER TABLE `dtbcategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indeks untuk tabel `dtbinfo`
--
ALTER TABLE `dtbinfo`
  ADD PRIMARY KEY (`infoId`);

--
-- Indeks untuk tabel `dtbusers`
--
ALTER TABLE `dtbusers`
  ADD PRIMARY KEY (`userId`);

--
-- Indeks untuk tabel `dtbvendor`
--
ALTER TABLE `dtbvendor`
  ADD PRIMARY KEY (`vendorId`);

--
-- Indeks untuk tabel `dtremail`
--
ALTER TABLE `dtremail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtrproject`
--
ALTER TABLE `dtrproject`
  ADD PRIMARY KEY (`projectId`);

--
-- Indeks untuk tabel `dtrprojectvendor`
--
ALTER TABLE `dtrprojectvendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dtbcatalog`
--
ALTER TABLE `dtbcatalog`
  MODIFY `catalogId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dtbcategory`
--
ALTER TABLE `dtbcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `dtbinfo`
--
ALTER TABLE `dtbinfo`
  MODIFY `infoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dtbusers`
--
ALTER TABLE `dtbusers`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dtremail`
--
ALTER TABLE `dtremail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `dtrproject`
--
ALTER TABLE `dtrproject`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dtrprojectvendor`
--
ALTER TABLE `dtrprojectvendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
