-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 03:32 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progres_db`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `get_id_progres`(vgroup_progres varchar(50),vid_progres integer) RETURNS int(11)
BEGIN
	declare nilai integer default 0;
	SELECT id from tabel_progres where group_progres = vgroup_progres
and id_progres = vid_progres and revisi_progres = (select max(revisi_progres) from tabel_progres WHERE group_progres = vgroup_progres
and id_progres = vid_progres)  and nilai_progres =  (select max(nilai_progres) from tabel_progres WHERE group_progres = vgroup_progres
and id_progres = vid_progres and revisi_progres = (select max(revisi_progres) from tabel_progres WHERE group_progres = vgroup_progres
and id_progres = vid_progres)) into nilai ;
	
RETURN nilai ;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_customer`
--

CREATE TABLE IF NOT EXISTS `tabel_customer` (
  `kode_customer` char(4) NOT NULL DEFAULT '',
  `nama_customer` varchar(20) DEFAULT NULL,
  `no_telpon` varchar(12) DEFAULT NULL,
  `alamat_customer` text,
  `email` varchar(20) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_customer`
--

INSERT INTO `tabel_customer` (`kode_customer`, `nama_customer`, `no_telpon`, `alamat_customer`, `email`, `website`) VALUES
('C001', 'Berlianti', '081311157890', NULL, 'Berlianti@gmail.com', 'www.buanagarden.com'),
('C002', 'Theresia', '081211100225', NULL, 'Theresia@gmail.com', 'www.Whanabakti.com'),
('C003', 'Silvia Cinta', '08130002110', NULL, 'Silvia@gmail.com', 'www.inti karya makmu'),
('C004', 'Heriawan', '081912120090', NULL, 'Heriawan@sentraponse', 'www.sentra ponsel.co'),
('C005', 'BUDI PRIYANTO', '081900010002', '', 'BudiBSI@gmail.coma', 'www.bsi.ac.id'),
('C006', 'Adjie Guntoro', '088786758899', 'Petukangen Banget Lagi', 'adjoe@dasd.com', 'www.buanamedika.com'),
('C007', 'rendy pandu', '0899997656', 'jakarta', 'pandurendy90@gmail.c', 'www.Bina Sarana Inda.com');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_order`
--

CREATE TABLE IF NOT EXISTS `tabel_order` (
`id` int(11) NOT NULL,
  `kode_order` varchar(12) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_proyek` varchar(20) DEFAULT NULL,
  `alamat_proyek` text,
  `kode_customer` char(4) DEFAULT NULL,
  `kode_sales` char(4) DEFAULT NULL,
  `kode_teknisi_1` char(4) DEFAULT NULL,
  `kode_teknisi_2` char(4) DEFAULT NULL,
  `catatan_progres` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_order`
--

INSERT INTO `tabel_order` (`id`, `kode_order`, `tgl_order`, `nama_proyek`, `alamat_proyek`, `kode_customer`, `kode_sales`, `kode_teknisi_1`, `kode_teknisi_2`, `catatan_progres`) VALUES
(4, 'PO17100002', '2017-11-13', 'WARNA GUNA', 'Jakarta Selatan', 'C001', 'S002', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_order_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `tabel_order_pekerjaan` (
`id` int(11) NOT NULL,
  `kode_pekerjaan` varchar(12) DEFAULT NULL,
  `nama_proyek` varchar(20) DEFAULT NULL,
  `kode_customer` char(4) DEFAULT NULL,
  `alamat_proyek` text,
  `tgl_progres` date DEFAULT NULL,
  `kode_sales` char(4) DEFAULT NULL,
  `kode_teknisi_1` char(4) DEFAULT NULL,
  `kode_teknisi_2` char(4) DEFAULT NULL,
  `isi_spk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_order_pekerjaan`
--

INSERT INTO `tabel_order_pekerjaan` (`id`, `kode_pekerjaan`, `nama_proyek`, `kode_customer`, `alamat_proyek`, `tgl_progres`, `kode_sales`, `kode_teknisi_1`, `kode_teknisi_2`, `isi_spk`) VALUES
(2, '17/10/0002', 'APL', 'C002', 'jakarta ', '2017-11-28', 'S002', 'T001', 'T002', ''),
(3, '17/02/0010', 'Sinar Mas', 'C003', 'Jakarta', '2017-11-14', 'S001', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_progres`
--

CREATE TABLE IF NOT EXISTS `tabel_progres` (
`id` int(11) NOT NULL,
  `group_progres` varchar(10) DEFAULT NULL,
  `kode_order` varchar(12) DEFAULT NULL,
  `kode_pekerjaan` varchar(12) DEFAULT NULL,
  `id_progres` int(11) DEFAULT NULL,
  `nilai_progres` int(11) DEFAULT NULL,
  `catatan_progres` text,
  `update_progres` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `revisi_progres` int(11) DEFAULT '0',
  `catatan_kadiv` text,
  `tgl_pengerjaan` date DEFAULT NULL,
  `tgl_penyelesaian` date DEFAULT NULL,
  `file_marking_pdf` varchar(30) DEFAULT NULL,
  `foto_marking_jpg` varchar(30) DEFAULT NULL,
  `file_memo_pdf` varchar(30) DEFAULT NULL,
  `file_complain_pdf` varchar(30) DEFAULT NULL,
  `file_ba_ceklis_pdf` varchar(30) DEFAULT NULL,
  `foto_pekerjaan_jpg` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_progres`
--

INSERT INTO `tabel_progres` (`id`, `group_progres`, `kode_order`, `kode_pekerjaan`, `id_progres`, `nilai_progres`, `catatan_progres`, `update_progres`, `revisi_progres`, `catatan_kadiv`, `tgl_pengerjaan`, `tgl_penyelesaian`, `file_marking_pdf`, `foto_marking_jpg`, `file_memo_pdf`, `file_complain_pdf`, `file_ba_ceklis_pdf`, `foto_pekerjaan_jpg`) VALUES
(1, 'MARKING', '', NULL, 4, 58, 'test catatan', '2017-11-05 01:40:11', 0, 'test juga', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_sales`
--

CREATE TABLE IF NOT EXISTS `tabel_sales` (
  `kode_sales` char(4) NOT NULL,
  `nama_sales` varchar(20) DEFAULT NULL,
  `no_telpon` varchar(12) DEFAULT NULL,
  `alamat_sales` text,
  `email` varchar(30) DEFAULT NULL,
  `tanggal_gabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_sales`
--

INSERT INTO `tabel_sales` (`kode_sales`, `nama_sales`, `no_telpon`, `alamat_sales`, `email`, `tanggal_gabung`) VALUES
('S001', 'Handoyo Gunawan', '081210002122', 'jakarta kode 1 hbh', 'Handoyo@salesenduro.com', '2017-10-01'),
('S002', 'Linda Suciana', '081210002122', 'jakarta barat kode 2j k', 'linda@sales.enduro.com', '2017-10-30'),
('S003', 'suryadi', '09090909090', 'tangerang', 'pandurendy@yahoo.com', '2017-10-17'),
('S004', 'Hilmam', '090909', 'jakarta barat', 'Hlmal@yahoo.com', '2017-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_teknisi`
--

CREATE TABLE IF NOT EXISTS `tabel_teknisi` (
  `kode_teknisi` char(4) NOT NULL,
  `nama_teknisi` varchar(20) NOT NULL,
  `tgl_gabung` date DEFAULT NULL,
  `alamat_teknisi` text NOT NULL,
  `no_telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_teknisi`
--

INSERT INTO `tabel_teknisi` (`kode_teknisi`, `nama_teknisi`, `tgl_gabung`, `alamat_teknisi`, `no_telpon`) VALUES
('T001', 'Ari Santoso', '2011-01-01', 'Jakarta', '081210002122'),
('T002', 'Bayu Dwi Susanto', '2011-02-02', 'Jakarta', '081300000001'),
('T003', 'Dwi Budi Wibowo', '2011-03-03', 'Jakarta', '081210002122'),
('T004', 'Dana', '2011-04-04', 'Jakarta', '081900010002'),
('T005', 'Erik Sutiawan', '2011-05-05', 'Jakarta', '083800000121'),
('T006', 'Herdiawan', '2011-06-14', 'Jakarta', '081211111110'),
('T007', 'Sarwo Edi Wibowo', '2011-07-14', 'Tangerang', '081213131313'),
('T008', 'suyatno', '2017-11-06', 'jakarta ajahh', '0897666666');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order`
--
CREATE TABLE IF NOT EXISTS `view_order` (
`id` int(11)
,`kode_order` varchar(12)
,`tgl_order` date
,`nama_proyek` varchar(20)
,`kode_customer` char(4)
,`nama_customer` varchar(20)
,`alamat_customer` text
,`no_telpon` varchar(12)
,`nama_sales` varchar(20)
,`alamat_sales` text
,`alamat_proyek` text
,`catatan` text
,`kode_sales` char(4)
,`teknisi_1` varchar(20)
,`teknisi_2` varchar(20)
,`email` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order_pekerjaan`
--
CREATE TABLE IF NOT EXISTS `view_order_pekerjaan` (
`id` int(11)
,`kode_pekerjaan` varchar(12)
,`tgl_progres` date
,`nama_proyek` varchar(20)
,`kode_customer` char(4)
,`nama_customer` varchar(20)
,`alamat_customer` text
,`no_telpon` varchar(12)
,`nama_sales` varchar(20)
,`alamat_sales` text
,`alamat_proyek` text
,`isi_spk` varchar(30)
,`kode_sales` char(4)
,`teknisi_1` varchar(20)
,`teknisi_2` varchar(20)
,`email` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_progres_marking`
--
CREATE TABLE IF NOT EXISTS `view_progres_marking` (
`id_progres` int(11)
,`id` bigint(11)
,`tgl_order` date
,`nama_proyek` varchar(20)
,`kode_customer` char(4)
,`nama_customer` varchar(20)
,`alamat_customer` text
,`no_telpon` varchar(12)
,`nama_sales` varchar(20)
,`alamat_sales` text
,`alamat_proyek` text
,`catatan_kadiv` text
,`kode_sales` char(4)
,`group_progres` varchar(10)
,`kode_order` varchar(12)
,`nilai_progres` bigint(11)
,`catatan_progres` text
,`revisi_progres` bigint(11)
,`tgl_pengerjaan` date
,`tgl_penyelesaian` date
,`nama_teknisi1` varchar(20)
,`nama_teknisi2` varchar(20)
,`update_progres` int(2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_progres_marking_new`
--
CREATE TABLE IF NOT EXISTS `view_progres_marking_new` (
`id_progres` int(11)
,`id` bigint(11)
,`tgl_order` date
,`nama_proyek` varchar(20)
,`kode_customer` char(4)
,`nama_customer` varchar(20)
,`alamat_customer` text
,`no_telpon` varchar(12)
,`nama_sales` varchar(20)
,`alamat_sales` text
,`alamat_proyek` text
,`catatan_kadiv` text
,`kode_sales` char(4)
,`group_progres` varchar(10)
,`kode_order` varchar(12)
,`nilai_progres` bigint(11)
,`catatan_progres` text
,`revisi_progres` bigint(11)
,`tgl_pengerjaan` date
,`tgl_penyelesaian` date
,`nama_teknisi1` varchar(20)
,`nama_teknisi2` varchar(20)
,`update_progres` int(2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_progres_pekerjaan`
--
CREATE TABLE IF NOT EXISTS `view_progres_pekerjaan` (
`id_progres` int(11)
,`id` bigint(11)
,`kode_pekerjaan` varchar(12)
,`tgl_progres` date
,`nama_proyek` varchar(20)
,`kode_customer` char(4)
,`nama_customer` varchar(20)
,`alamat_customer` text
,`no_telpon` varchar(12)
,`nama_sales` varchar(20)
,`alamat_sales` text
,`alamat_proyek` text
,`isi_spk` varchar(30)
,`kode_sales` char(4)
,`group_progres` varchar(10)
,`kode_order` varchar(12)
,`nilai_progres` bigint(11)
,`catatan_progres` text
,`revisi_progres` bigint(11)
,`tgl_pengerjaan` date
,`tgl_penyelesaian` date
,`file_memo_pdf` varchar(30)
,`file_complain_pdf` varchar(30)
,`file_ba_ceklis_pdf` varchar(30)
,`foto_pekerjaan_jpg` varchar(30)
,`nama_teknisi1` varchar(20)
,`nama_teknisi2` varchar(20)
,`update_progres` int(2)
);
-- --------------------------------------------------------

--
-- Structure for view `view_order`
--
DROP TABLE IF EXISTS `view_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order` AS select `a`.`id` AS `id`,`a`.`kode_order` AS `kode_order`,`a`.`tgl_order` AS `tgl_order`,`a`.`nama_proyek` AS `nama_proyek`,`a`.`kode_customer` AS `kode_customer`,`b`.`nama_customer` AS `nama_customer`,`b`.`alamat_customer` AS `alamat_customer`,`b`.`no_telpon` AS `no_telpon`,`c`.`nama_sales` AS `nama_sales`,`c`.`alamat_sales` AS `alamat_sales`,`a`.`alamat_proyek` AS `alamat_proyek`,`a`.`catatan_progres` AS `catatan`,`a`.`kode_sales` AS `kode_sales`,`d`.`nama_teknisi` AS `teknisi_1`,`e`.`nama_teknisi` AS `teknisi_2`,`b`.`email` AS `email` from ((((`tabel_order` `a` left join `tabel_customer` `b` on((`a`.`kode_customer` = `b`.`kode_customer`))) left join `tabel_sales` `c` on((`a`.`kode_sales` = `c`.`kode_sales`))) left join `tabel_teknisi` `d` on((`a`.`kode_teknisi_1` = `d`.`kode_teknisi`))) left join `tabel_teknisi` `e` on((`a`.`kode_teknisi_2` = `e`.`kode_teknisi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_order_pekerjaan`
--
DROP TABLE IF EXISTS `view_order_pekerjaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order_pekerjaan` AS select `a`.`id` AS `id`,`a`.`kode_pekerjaan` AS `kode_pekerjaan`,`a`.`tgl_progres` AS `tgl_progres`,`a`.`nama_proyek` AS `nama_proyek`,`a`.`kode_customer` AS `kode_customer`,`b`.`nama_customer` AS `nama_customer`,`b`.`alamat_customer` AS `alamat_customer`,`b`.`no_telpon` AS `no_telpon`,`c`.`nama_sales` AS `nama_sales`,`c`.`alamat_sales` AS `alamat_sales`,`a`.`alamat_proyek` AS `alamat_proyek`,`a`.`isi_spk` AS `isi_spk`,`a`.`kode_sales` AS `kode_sales`,`d`.`nama_teknisi` AS `teknisi_1`,`e`.`nama_teknisi` AS `teknisi_2`,`b`.`email` AS `email` from ((((`tabel_order_pekerjaan` `a` left join `tabel_customer` `b` on((`a`.`kode_customer` = `b`.`kode_customer`))) left join `tabel_sales` `c` on((`a`.`kode_sales` = `c`.`kode_sales`))) left join `tabel_teknisi` `d` on((`a`.`kode_teknisi_1` = `d`.`kode_teknisi`))) left join `tabel_teknisi` `e` on((`a`.`kode_teknisi_2` = `e`.`kode_teknisi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_progres_marking`
--
DROP TABLE IF EXISTS `view_progres_marking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_progres_marking` AS select `a`.`id` AS `id_progres`,coalesce(`b`.`id`,0) AS `id`,`a`.`tgl_order` AS `tgl_order`,`a`.`nama_proyek` AS `nama_proyek`,`a`.`kode_customer` AS `kode_customer`,`a`.`nama_customer` AS `nama_customer`,`a`.`alamat_customer` AS `alamat_customer`,`a`.`no_telpon` AS `no_telpon`,`a`.`nama_sales` AS `nama_sales`,`a`.`alamat_sales` AS `alamat_sales`,`a`.`alamat_proyek` AS `alamat_proyek`,`a`.`catatan` AS `catatan_kadiv`,`a`.`kode_sales` AS `kode_sales`,coalesce(`b`.`group_progres`,'') AS `group_progres`,coalesce(`b`.`kode_order`,'') AS `kode_order`,coalesce(`b`.`nilai_progres`,0) AS `nilai_progres`,coalesce(`b`.`catatan_progres`,'') AS `catatan_progres`,coalesce(`b`.`revisi_progres`,0) AS `revisi_progres`,`b`.`tgl_pengerjaan` AS `tgl_pengerjaan`,`b`.`tgl_penyelesaian` AS `tgl_penyelesaian`,`a`.`teknisi_1` AS `nama_teknisi1`,`a`.`teknisi_2` AS `nama_teknisi2`,dayofmonth(`b`.`update_progres`) AS `update_progres` from (`view_order` `a` left join `tabel_progres` `b` on((`b`.`id` = `get_id_progres`('MARKING',`a`.`id`)))) group by `a`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `view_progres_marking_new`
--
DROP TABLE IF EXISTS `view_progres_marking_new`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_progres_marking_new` AS select `a`.`id` AS `id_progres`,coalesce(`b`.`id`,0) AS `id`,`a`.`tgl_order` AS `tgl_order`,`a`.`nama_proyek` AS `nama_proyek`,`a`.`kode_customer` AS `kode_customer`,`a`.`nama_customer` AS `nama_customer`,`a`.`alamat_customer` AS `alamat_customer`,`a`.`no_telpon` AS `no_telpon`,`a`.`nama_sales` AS `nama_sales`,`a`.`alamat_sales` AS `alamat_sales`,`a`.`alamat_proyek` AS `alamat_proyek`,`a`.`catatan` AS `catatan_kadiv`,`a`.`kode_sales` AS `kode_sales`,coalesce(`b`.`group_progres`,'') AS `group_progres`,coalesce(`b`.`kode_order`,'') AS `kode_order`,coalesce(`b`.`nilai_progres`,0) AS `nilai_progres`,coalesce(`b`.`catatan_progres`,'') AS `catatan_progres`,coalesce(`b`.`revisi_progres`,0) AS `revisi_progres`,`b`.`tgl_pengerjaan` AS `tgl_pengerjaan`,`b`.`tgl_penyelesaian` AS `tgl_penyelesaian`,`a`.`teknisi_1` AS `nama_teknisi1`,`a`.`teknisi_2` AS `nama_teknisi2`,dayofmonth(`b`.`update_progres`) AS `update_progres` from (`view_order` `a` left join `tabel_progres` `b` on((`b`.`id` = ''))) group by `a`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `view_progres_pekerjaan`
--
DROP TABLE IF EXISTS `view_progres_pekerjaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_progres_pekerjaan` AS select `a`.`id` AS `id_progres`,coalesce(`b`.`id`,0) AS `id`,`a`.`kode_pekerjaan` AS `kode_pekerjaan`,`a`.`tgl_progres` AS `tgl_progres`,`a`.`nama_proyek` AS `nama_proyek`,`a`.`kode_customer` AS `kode_customer`,`a`.`nama_customer` AS `nama_customer`,`a`.`alamat_customer` AS `alamat_customer`,`a`.`no_telpon` AS `no_telpon`,`a`.`nama_sales` AS `nama_sales`,`a`.`alamat_sales` AS `alamat_sales`,`a`.`alamat_proyek` AS `alamat_proyek`,`a`.`isi_spk` AS `isi_spk`,`a`.`kode_sales` AS `kode_sales`,coalesce(`b`.`group_progres`,'') AS `group_progres`,coalesce(`b`.`kode_order`,'') AS `kode_order`,coalesce(`b`.`nilai_progres`,0) AS `nilai_progres`,coalesce(`b`.`catatan_progres`,'') AS `catatan_progres`,coalesce(`b`.`revisi_progres`,0) AS `revisi_progres`,`b`.`tgl_pengerjaan` AS `tgl_pengerjaan`,`b`.`tgl_penyelesaian` AS `tgl_penyelesaian`,`b`.`file_memo_pdf` AS `file_memo_pdf`,`b`.`file_complain_pdf` AS `file_complain_pdf`,`b`.`file_ba_ceklis_pdf` AS `file_ba_ceklis_pdf`,`b`.`foto_pekerjaan_jpg` AS `foto_pekerjaan_jpg`,`a`.`teknisi_1` AS `nama_teknisi1`,`a`.`teknisi_2` AS `nama_teknisi2`,dayofmonth(`b`.`update_progres`) AS `update_progres` from (`view_order_pekerjaan` `a` left join `tabel_progres` `b` on((`b`.`id` = `get_id_progres`('PEKERJAAN',`a`.`id`)))) group by `a`.`id`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_customer`
--
ALTER TABLE `tabel_customer`
 ADD PRIMARY KEY (`kode_customer`), ADD UNIQUE KEY `tabel_customer_idx1` (`kode_customer`) USING HASH;

--
-- Indexes for table `tabel_order`
--
ALTER TABLE `tabel_order`
 ADD PRIMARY KEY (`id`), ADD KEY `kode_order` (`kode_order`), ADD KEY `kode_order_2` (`kode_order`), ADD KEY `kode_customer` (`kode_customer`), ADD KEY `kode_customer_2` (`kode_customer`), ADD KEY `kode_teknisi_1` (`kode_teknisi_1`), ADD KEY `kode_teknisi_2` (`kode_teknisi_2`), ADD KEY `kode_sales` (`kode_sales`);

--
-- Indexes for table `tabel_order_pekerjaan`
--
ALTER TABLE `tabel_order_pekerjaan`
 ADD PRIMARY KEY (`id`), ADD KEY `kode_pekerjaan` (`kode_pekerjaan`), ADD KEY `kode_teknisi_1` (`kode_teknisi_1`), ADD KEY `kode_teknisi_2` (`kode_teknisi_2`), ADD KEY `kode_sales` (`kode_sales`), ADD KEY `kode_customer` (`kode_customer`);

--
-- Indexes for table `tabel_progres`
--
ALTER TABLE `tabel_progres`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tabel_progres_idx3` (`group_progres`,`id_progres`,`nilai_progres`,`revisi_progres`), ADD UNIQUE KEY `kode_pekerjaan_2` (`kode_pekerjaan`), ADD UNIQUE KEY `kode_progres` (`kode_order`), ADD KEY `tabel_progres_idx1` (`group_progres`), ADD KEY `tabel_progres_idx2` (`kode_order`), ADD KEY `kode_pekerjaan` (`kode_pekerjaan`);

--
-- Indexes for table `tabel_sales`
--
ALTER TABLE `tabel_sales`
 ADD UNIQUE KEY `tabel_salesman_idx` (`kode_sales`) USING BTREE;

--
-- Indexes for table `tabel_teknisi`
--
ALTER TABLE `tabel_teknisi`
 ADD PRIMARY KEY (`kode_teknisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_order`
--
ALTER TABLE `tabel_order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_order_pekerjaan`
--
ALTER TABLE `tabel_order_pekerjaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_progres`
--
ALTER TABLE `tabel_progres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_order`
--
ALTER TABLE `tabel_order`
ADD CONSTRAINT `tabel_order_ibfk_2` FOREIGN KEY (`kode_customer`) REFERENCES `tabel_customer` (`kode_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tabel_order_ibfk_3` FOREIGN KEY (`kode_teknisi_1`) REFERENCES `tabel_teknisi` (`kode_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tabel_order_ibfk_4` FOREIGN KEY (`kode_teknisi_2`) REFERENCES `tabel_teknisi` (`kode_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tabel_order_ibfk_5` FOREIGN KEY (`kode_sales`) REFERENCES `tabel_sales` (`kode_sales`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_order_pekerjaan`
--
ALTER TABLE `tabel_order_pekerjaan`
ADD CONSTRAINT `tabel_order_pekerjaan_ibfk_1` FOREIGN KEY (`kode_teknisi_1`) REFERENCES `tabel_teknisi` (`kode_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tabel_order_pekerjaan_ibfk_2` FOREIGN KEY (`kode_teknisi_2`) REFERENCES `tabel_teknisi` (`kode_teknisi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tabel_order_pekerjaan_ibfk_3` FOREIGN KEY (`kode_sales`) REFERENCES `tabel_sales` (`kode_sales`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tabel_order_pekerjaan_ibfk_4` FOREIGN KEY (`kode_customer`) REFERENCES `tabel_customer` (`kode_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_progres`
--
ALTER TABLE `tabel_progres`
ADD CONSTRAINT `tabel_progres_ibfk_2` FOREIGN KEY (`kode_pekerjaan`) REFERENCES `tabel_order_pekerjaan` (`kode_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
