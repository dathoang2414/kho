-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 13, 2023 lúc 08:39 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_kho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblhanghoa`
--

CREATE TABLE `tblhanghoa` (
  `Hanghoa_ma` varchar(10) NOT NULL,
  `Hanghoa_ten` varchar(50) NOT NULL,
  `Hanghoa_dvt` varchar(50) NOT NULL,
  `Hanghoa_gia` bigint(20) NOT NULL,
  `Hanghoa_xuat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblhanghoa`
--

INSERT INTO `tblhanghoa` (`Hanghoa_ma`, `Hanghoa_ten`, `Hanghoa_dvt`, `Hanghoa_gia`, `Hanghoa_xuat`) VALUES
('ifnx', 'Iphone X', 'cái', 30000001, 39999999),
('ip 13', 'iphone 13', 'cái', 300000000, 400000000),
('ip11', 'iphone 11 ', 'cái', 10000000, 100000000),
('ip14', 'iphone 14', 'cái', 1000000, 2000000),
('ip15', 'iphone 15', 'cái', 10000001, 20000001),
('ip7', 'iphone 7', 'cái', 1000000, 2000000);

--
-- Bẫy `tblhanghoa`
--
DELIMITER $$
CREATE TRIGGER `tg1` AFTER INSERT ON `tblhanghoa` FOR EACH ROW INSERT INTO tblkho VALUES(NEW.Hanghoa_ma,null)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg10` AFTER DELETE ON `tblhanghoa` FOR EACH ROW DELETE FROM tblkho WHERE tblkho.Hanghoa_ma = old.Hanghoa_ma
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg9` AFTER UPDATE ON `tblhanghoa` FOR EACH ROW UPDATE tblkho SET tblkho.Hanghoa_ma = new.Hanghoa_ma WHERE tblkho.Hanghoa_ma= old.Hanghoa_ma
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblkho`
--

CREATE TABLE `tblkho` (
  `Hanghoa_ma` varchar(10) NOT NULL,
  `Kho_sl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblkho`
--

INSERT INTO `tblkho` (`Hanghoa_ma`, `Kho_sl`) VALUES
('ifnx', 96),
('ip 13', 0),
('ip11', 0),
('ip14', 0),
('ip15', 90),
('ip7', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnguoidung`
--

CREATE TABLE `tblnguoidung` (
  `Nguoidung_ten` varchar(10) NOT NULL,
  `Nguoidung_mk` text NOT NULL,
  `Nguoidung_cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblnguoidung`
--

INSERT INTO `tblnguoidung` (`Nguoidung_ten`, `Nguoidung_mk`, `Nguoidung_cap`) VALUES
('abc', '123456', 2),
('admin', 'admin1357@', 1),
('admin1', '123456', 1),
('admin3', '123456', 1),
('admin4', '123456', 1),
('dat', '12345', 2),
('zinhinta', '123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnhaphanphoi`
--

CREATE TABLE `tblnhaphanphoi` (
  `Npp_ma` varchar(10) NOT NULL,
  `Npp_ten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblnhaphanphoi`
--

INSERT INTO `tblnhaphanphoi` (`Npp_ma`, `Npp_ten`) VALUES
('dgw', 'Công ty digiwo'),
('dior', 'DIOR'),
('gg', 'GUCCI'),
('sd', 'cty sd'),
('ssv', 'Công ty TNHH Samsung Việt Nam'),
('vvn', 'Viêt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblphieunhap`
--

CREATE TABLE `tblphieunhap` (
  `Phieunhap_ma` varchar(10) NOT NULL,
  `Hanghoa_ma` varchar(10) NOT NULL,
  `NPP_ma` varchar(10) NOT NULL,
  `Nguoidung_ten` varchar(10) NOT NULL,
  `Phieunhap_ngay` date NOT NULL,
  `Phieunhap_sl` int(11) NOT NULL,
  `Phieunhap_cost` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblphieunhap`
--

INSERT INTO `tblphieunhap` (`Phieunhap_ma`, `Hanghoa_ma`, `NPP_ma`, `Nguoidung_ten`, `Phieunhap_ngay`, `Phieunhap_sl`, `Phieunhap_cost`) VALUES
('p1', 'ip15', 'gg', 'admin', '2023-06-13', 100, 1000000100),
('st4', 'ifnx', 'dgw', 'abc', '2022-11-01', 10, 300000000),
('t54', 'ifnx', 'sd', 'abc', '2022-11-24', 100, 3000000000);

--
-- Bẫy `tblphieunhap`
--
DELIMITER $$
CREATE TRIGGER `tg2` BEFORE INSERT ON `tblphieunhap` FOR EACH ROW UPDATE tblkho 
SET tblkho.Kho_sl = tblkho.Kho_sl + new.Phieunhap_sl WHERE tblkho.Hanghoa_ma = new.Hanghoa_ma
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg3` AFTER UPDATE ON `tblphieunhap` FOR EACH ROW UPDATE tblkho SET tblkho.Kho_sl = tblkho.Kho_sl + new.Phieunhap_sl - old.Phieunhap_sl WHERE tblkho.Hanghoa_ma = new.Hanghoa_ma AND tblkho.Hanghoa_ma = old.Hanghoa_ma
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg4` AFTER DELETE ON `tblphieunhap` FOR EACH ROW UPDATE tblkho SET tblkho.Kho_sl = tblkho.Kho_sl - old.Phieunhap_sl WHERE tblkho.Hanghoa_ma = old.Hanghoa_ma
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblphieuxuat`
--

CREATE TABLE `tblphieuxuat` (
  `Phieuxuat_ma` varchar(10) NOT NULL,
  `Hanghoa_ma` varchar(10) NOT NULL,
  `Nguoidung_ten` varchar(10) NOT NULL,
  `Phieuxuat_ngay` date NOT NULL,
  `Phieuxuat_sl` int(11) NOT NULL,
  `Phieuxuat_cost` bigint(20) NOT NULL,
  `Phieuxuat_customer` varchar(50) NOT NULL,
  `Phieuxuat_sdt` char(10) NOT NULL,
  `Profit` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblphieuxuat`
--

INSERT INTO `tblphieuxuat` (`Phieuxuat_ma`, `Hanghoa_ma`, `Nguoidung_ten`, `Phieuxuat_ngay`, `Phieuxuat_sl`, `Phieuxuat_cost`, `Phieuxuat_customer`, `Phieuxuat_sdt`, `Profit`) VALUES
('p1', 'ifnx', 'abc', '2023-06-13', 10, 399999990, 'mr t', '0384667439', 33),
('p2', 'ip15', 'abc', '2023-06-13', 10, 200000010, 'mr t', '3456785678', 100),
('p3', 'ifnx', 'abc', '2023-06-10', 2, 799999998, 'mr kiem', '3456785678', 1233),
('p4', 'ifnx', 'abc', '2023-06-10', 2, 799999998, 'mr vuong', '6578767678', 1233);

--
-- Bẫy `tblphieuxuat`
--
DELIMITER $$
CREATE TRIGGER `tg5` AFTER INSERT ON `tblphieuxuat` FOR EACH ROW UPDATE tblkho 
SET tblkho.Kho_sl = tblkho.Kho_sl - new.Phieuxuat_sl WHERE tblkho.Hanghoa_ma = new.Hanghoa_ma
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg6` AFTER UPDATE ON `tblphieuxuat` FOR EACH ROW UPDATE tblkho SET tblkho.Kho_sl = tblkho.Kho_sl - new.Phieuxuat_sl + old.Phieuxuat_sl WHERE tblkho.Hanghoa_ma = new.Hanghoa_ma AND tblkho.Hanghoa_ma = old.Hanghoa_ma
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg7` AFTER DELETE ON `tblphieuxuat` FOR EACH ROW UPDATE tblkho SET tblkho.Kho_sl = tblkho.Kho_sl + old.Phieuxuat_sl WHERE tblkho.Hanghoa_ma = old.Hanghoa_ma
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblhanghoa`
--
ALTER TABLE `tblhanghoa`
  ADD PRIMARY KEY (`Hanghoa_ma`);

--
-- Chỉ mục cho bảng `tblkho`
--
ALTER TABLE `tblkho`
  ADD PRIMARY KEY (`Hanghoa_ma`);

--
-- Chỉ mục cho bảng `tblnguoidung`
--
ALTER TABLE `tblnguoidung`
  ADD PRIMARY KEY (`Nguoidung_ten`);

--
-- Chỉ mục cho bảng `tblnhaphanphoi`
--
ALTER TABLE `tblnhaphanphoi`
  ADD PRIMARY KEY (`Npp_ma`);

--
-- Chỉ mục cho bảng `tblphieunhap`
--
ALTER TABLE `tblphieunhap`
  ADD PRIMARY KEY (`Phieunhap_ma`,`Hanghoa_ma`),
  ADD KEY `Hanghoa_ma` (`Hanghoa_ma`),
  ADD KEY `NPP_ma` (`NPP_ma`),
  ADD KEY `Nguoidung_ten` (`Nguoidung_ten`);

--
-- Chỉ mục cho bảng `tblphieuxuat`
--
ALTER TABLE `tblphieuxuat`
  ADD PRIMARY KEY (`Phieuxuat_ma`,`Hanghoa_ma`),
  ADD KEY `Nguoidung_ten` (`Nguoidung_ten`),
  ADD KEY `Hanghoa_ma` (`Hanghoa_ma`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tblphieunhap`
--
ALTER TABLE `tblphieunhap`
  ADD CONSTRAINT `tblphieunhap_ibfk_1` FOREIGN KEY (`Hanghoa_ma`) REFERENCES `tblhanghoa` (`Hanghoa_ma`),
  ADD CONSTRAINT `tblphieunhap_ibfk_2` FOREIGN KEY (`NPP_ma`) REFERENCES `tblnhaphanphoi` (`Npp_ma`),
  ADD CONSTRAINT `tblphieunhap_ibfk_3` FOREIGN KEY (`Nguoidung_ten`) REFERENCES `tblnguoidung` (`Nguoidung_ten`);

--
-- Các ràng buộc cho bảng `tblphieuxuat`
--
ALTER TABLE `tblphieuxuat`
  ADD CONSTRAINT `tblphieuxuat_ibfk_1` FOREIGN KEY (`Nguoidung_ten`) REFERENCES `tblnguoidung` (`Nguoidung_ten`),
  ADD CONSTRAINT `tblphieuxuat_ibfk_2` FOREIGN KEY (`Hanghoa_ma`) REFERENCES `tblhanghoa` (`Hanghoa_ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
