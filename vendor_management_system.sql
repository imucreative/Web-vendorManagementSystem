-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 14 Okt 2019 pada 04.16
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vendor_management_system`
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
  `delete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dtbcatalog`
--

INSERT INTO `dtbcatalog` (`catalogId`, `vendorId`, `name`, `file`, `delete`) VALUES
(1, 'CTJ', 'Inquiry', 'inquiry_64.png', 0),
(2, 'CTJ', 'Tes Download Image', 'download.png', 0),
(3, 'HMI', 'Welden3', 'welden3.pdf', 0),
(4, 'CTJ', 'BUDI', 'cv-dts2.pdf', 0),
(5, 'CTJ', 'ANTO', 'profile.png', 0),
(6, 'POI', 'POI', 'cv-dts3.pdf', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbcategory`
--

CREATE TABLE `dtbcategory` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0
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
(24, 'AUTOMOTIVE', 0),
(25, 'TES1', 1);

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
(1, 'CV. TRUST JAYA', 'TRJ', 'JL. RAYA INDONESIA', '(62-21)888332', '(62-21)885', 'budi@gmail.com', 'logo.png', 'logo-full.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbstatususer`
--

CREATE TABLE `dtbstatususer` (
  `statusId` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dtbstatususer`
--

INSERT INTO `dtbstatususer` (`statusId`, `name`, `delete`) VALUES
(1, 'Administrator', 0),
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
  `delete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbusers`
--

INSERT INTO `dtbusers` (`userId`, `name`, `username`, `password`, `status`, `delete`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(2, 'Budi', 'budi', '00dfc53ee86af02e742515cdcf075ed3', 2, 0),
(3, 'AQ', 'qa', '8264ee52f589f4c0191aa94f87aa1aeb', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtbvendor`
--

CREATE TABLE `dtbvendor` (
  `vendorId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `address` varchar(100) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `rating` int(3) NOT NULL,
  `catalog` varchar(50) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtbvendor`
--

INSERT INTO `dtbvendor` (`vendorId`, `categoryId`, `name`, `description`, `address`, `provinsi`, `kota`, `kelurahan`, `telp`, `fax`, `email`, `npwp`, `rating`, `catalog`, `delete`) VALUES
(1, 3, 'CV TRUST JAYA123', 'PENYEWAAN BARANG-BARANG ELECTRICT123', 'JL RAYA PONDOK123', 'BANTEN', 'SERANG', 'CIPAYUNG', '089998089890', '0821982892A', 'CTJ@GMAIL.COM', '999182923637A', 0, 'inquiry_64.png', 0),
(2, 24, 'HYUNDAI MOBIL INDONESIAPOI', 'VENDOR MOBIL OPERASIONAL', 'JL TEUKU NYAK ARIEF', '', '', '', '0877777777', '089999999', 'SALES@HYUNDAIMOBIL.C', '123123-345345-345345', 0, 'download.png', 0),
(3, 23, 'HAFIS NURYATAMA KONTRUKSIPOI', 'SEWA CRANE', 'AAABBB', '', '', '', '111', '111', 'HNK@GMAIL.COME', '1', 0, 'sort_asc_disabled.png', 0),
(4, 1, 'PT MITRA MAKMUR ANGKASA123', 'PERUSAHAAN TOOLS123', 'JL RAYA KAPUK 123', '', '', '', '08777123', '08888123', 'MITRA123@GMAIL.COMET', '2', 0, '', 0),
(5, 1, 'POI', 'POI', 'POI', '', '', '', 'POI', 'POI', 'POI', 'POI', 0, '', 0),
(6, 1, 'SINAR LAUT ABADI', 'JUAL PIPA', 'JL RAYA LAGI', '', '', '', '0877777', '0866666', 'sla@gmail.com', '3', 0, '', 0),
(7, 4, 'TERUS MAJU', 'JUAL ALAT BANGUNAN', 'JL RAYA', '', '', '', '08777', '08999', 'TM@GMAIL.COM', '4', 0, '', 0),
(8, 2, 'TERUS MAJU OKE', 'JUAL ALAT BANGUNAN', 'JL RAYA', '', '', '', '08777', '08999', 'tm@gmail.com', '5', 0, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtremail`
--

CREATE TABLE `dtremail` (
  `id` int(11) NOT NULL,
  `vendorId` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(45) NOT NULL,
  `sendFrom` varchar(45) NOT NULL,
  `sendTo` varchar(45) NOT NULL,
  `sendCc` varchar(45) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `delete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dtremail`
--

INSERT INTO `dtremail` (`id`, `vendorId`, `date`, `time`, `sendFrom`, `sendTo`, `sendCc`, `subject`, `message`, `attachment`, `status`, `delete`) VALUES
(11, 'SLA', '2019-07-20', '10:10:10', 'sales@gmail.com', 'dyanzzz@gmail.com', '', 'Note untuk PT xxx', '<p>Dear.</p><p>Mohon untuk mengirimkan daftar harga yang lebih detail</p>', '', 0, 0),
(12, 'SLA', '2019-07-20', '', 'sales@gmail.com', 'sla@gmail.com', 'poi@tre', 'poi', '<p>poi</p>', '', 0, 0),
(13, 'SLA', '2019-07-20', '', 'sales@gmail.com', 'tm@gmail.com', 'poi@tre', 'tre', '<p><b>tre</b></p>', '', 0, 0),
(14, 'SLA', '2019-07-20', '', 'sales@gmail.com', 'TM@GMAIL.COM', 'aasdasd@q', 'asd', '<p>asd</p>', '', 0, 0),
(15, 'HNK', '2019-07-23', '', 'budi@gmail.com', 'HNK@GMAIL.COME', 'budi@gmail.om', 'tes', '<p>tes aja</p>', '', 0, 0),
(16, 'HNK', '2019-07-23', '', 'budi@gmail.com', 'HNK@GMAIL.COME', 'asd', 'asd', '<p>asd</p>', '', 0, 0),
(17, 'TM', '2019-07-23', '', 'budi@gmail.com', 'TM@GMAIL.COM', 'asd', 'asd', '<p>asd</p>', '', 0, 0),
(18, 'TM', '2019-07-23', '', 'budi@gmail.com', 'TM@GMAIL.COM', 'asd', 'asd', '<p>asd</p>', 'inquiry_5121.png', 0, 0),
(19, 'HMI', '2019-07-23', '', 'budi@gmail.com', 'SALES@HYUNDAIMOBIL.Com', 'anwar@gmail.com', 'minta catalog mobil hyundai', '<p>dear hyundai</p><p>saya minta catalog mobil hyundai tucson dan kona sebagai perbandingan.</p><p>mohon dikirimkan juga price list lieasing</p><p><br></p><p>regards</p><p>budi</p>', 'business2.png', 0, 0),
(20, 'CTJ', '2019-07-23', '', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes', '<p>tes</p>', '', 0, 0),
(21, 'HMI', '2019-07-23', '', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes aja', '<p>tes aja</p>', '', 0, 0),
(22, 'HMI', '2019-07-23', '', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes aja', '<p>tes aja</p>', '', 0, 0),
(23, 'MMA', '2019-07-23', '', 'anto@gmail.com', 'dyanzzz@gmail.com', 'dian.trib@gmail.com', 'Tes lagi aja ke gmail', '<p>Tes lagi aja ke gmail<br></p>', 'package_512.png', 0, 0),
(24, 'CTJ', '2019-08-02', '05:08:02', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes email', '<p>tes email</p>', 'cv-dts1.pdf', 0, 0),
(25, 'CTJ', '2019-08-02', '05:08:02', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes email', '<p>tes email</p>', 'cv-dts2.pdf', 0, 0),
(26, 'CTJ', '2019-08-02', '05:08:02', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes lagi email', '<p>tes lagi emailnya</p>', 'cv-dts3.pdf', 0, 0),
(27, 'CTJ', '2019-08-02', '05:08:02', 'budi@gmail.com', 'dyanzzz@gmail.com', '', 'tes email aja tanpa lampiran', '<p>tes email aja tanpa lampiran</p>', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtrproject`
--

CREATE TABLE `dtrproject` (
  `projectId` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `delete` int(1) NOT NULL DEFAULT 0
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
-- Indeks untuk tabel `dtbstatususer`
--
ALTER TABLE `dtbstatususer`
  ADD PRIMARY KEY (`statusId`);

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
  MODIFY `catalogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dtbvendor`
--
ALTER TABLE `dtbvendor`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dtremail`
--
ALTER TABLE `dtremail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
