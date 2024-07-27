-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 04:56 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'Gosho Aoyama'),
(2, 'Eiichiro Oda');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Conan - Thám tử lừng danh'),
(2, 'Onepiece - Đảo hải tặc'),
(13, 'Truyện vui');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_giohang`
--

CREATE TABLE `chitiet_giohang` (
  `ct_id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `soluong` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_giohang`
--

INSERT INTO `chitiet_giohang` (`ct_id`, `id_cart`, `id_pro`, `price`, `soluong`) VALUES
(98, 87, 1, 18.000, 10),
(99, 87, 6, 18.000, 30),
(100, 87, 15, 22.000, 1),
(101, 87, 2, 16.000, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chtiet_donhang`
--

CREATE TABLE `chtiet_donhang` (
  `id` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `soluong` int(255) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chtiet_donhang`
--

INSERT INTO `chtiet_donhang` (`id`, `price`, `soluong`, `id_pro`, `id_donhang`) VALUES
(105, 18.000, 1, 1, 223),
(106, 18.000, 1, 6, 223),
(107, 22.000, 1, 15, 223),
(108, 50.000, 1, 1, 224),
(109, 50.000, 1, 4, 225),
(110, 18.000, 1, 1, 226),
(111, 18.000, 2, 6, 226),
(112, 22.000, 1, 15, 226),
(113, 139.000, 1, 13, 227),
(114, 48.000, 1, 1, 228),
(115, 18.000, 10, 1, 229),
(116, 18.000, 21, 6, 229),
(117, 22.000, 1, 15, 229),
(118, 16.000, 5, 2, 229),
(119, 48.000, 1, 1, 230),
(120, 48.000, 1, 6, 231),
(121, 48.000, 1, 6, 233),
(122, 48.000, 1, 6, 234),
(123, 48.000, 1, 6, 238),
(124, 48.000, 1, 6, 239),
(125, 48.000, 1, 6, 240),
(126, 46.000, 1, 2, 241),
(127, 46.000, 1, 2, 242),
(128, 46.000, 1, 2, 243),
(129, 46.000, 1, 2, 244),
(130, 46.000, 1, 2, 245),
(131, 46.000, 1, 2, 246),
(132, 46.000, 1, 2, 247),
(133, 46.000, 1, 2, 248),
(134, 46.000, 1, 2, 249),
(135, 46.000, 1, 2, 250),
(136, 46.000, 1, 2, 251),
(137, 18.000, 10, 1, 252),
(138, 18.000, 21, 6, 252),
(139, 22.000, 1, 15, 252),
(140, 16.000, 6, 2, 252),
(141, 48.000, 1, 6, 253),
(142, 48.000, 1, 6, 254),
(143, 48.000, 1, 6, 255),
(144, 48.000, 1, 6, 256),
(145, 48.000, 1, 6, 257),
(146, 48.000, 1, 6, 258),
(147, 48.000, 1, 6, 259),
(148, 48.000, 1, 6, 260),
(149, 48.000, 1, 6, 261),
(150, 48.000, 1, 1, 262),
(151, 18.000, 10, 1, 263),
(152, 18.000, 21, 6, 263),
(153, 22.000, 1, 15, 263),
(154, 16.000, 6, 2, 263),
(155, 18.000, 10, 1, 264),
(156, 18.000, 21, 6, 264),
(157, 22.000, 1, 15, 264),
(158, 16.000, 6, 2, 264),
(159, 48.000, 1, 6, 265),
(160, 48.000, 1, 6, 266),
(161, 48.000, 1, 6, 267),
(162, 48.000, 1, 6, 268),
(163, 48.000, 1, 6, 269),
(164, 48.000, 1, 6, 271),
(165, 18.000, 10, 1, 273),
(166, 18.000, 21, 6, 273),
(167, 22.000, 1, 15, 273),
(168, 16.000, 6, 2, 273),
(169, 48.000, 1, 4, 274),
(170, 48.000, 1, 6, 275),
(171, 48.000, 1, 6, 276),
(172, 18.000, 10, 1, 277),
(173, 18.000, 21, 6, 277),
(174, 22.000, 1, 15, 277),
(175, 16.000, 6, 2, 277),
(176, 48.000, 1, 6, 278),
(177, 18.000, 10, 1, 279),
(178, 18.000, 30, 6, 279),
(179, 22.000, 1, 15, 279),
(180, 16.000, 6, 2, 279),
(181, 18.000, 10, 1, 280),
(182, 18.000, 30, 6, 280),
(183, 22.000, 1, 15, 280),
(184, 16.000, 6, 2, 280),
(185, 52.000, 1, 15, 281),
(186, 46.000, 1, 2, 282),
(187, 48.000, 1, 1, 283),
(188, 48.000, 1, 1, 284),
(189, 48.000, 1, 1, 285),
(190, 48.000, 1, 1, 286),
(191, 48.000, 1, 1, 287),
(192, 48.000, 1, 1, 288),
(193, 48.000, 1, 1, 289),
(194, 48.000, 1, 1, 290),
(195, 48.000, 1, 1, 291),
(196, 48.000, 1, 1, 292),
(197, 48.000, 1, 1, 293),
(198, 48.000, 1, 1, 294),
(199, 48.000, 1, 1, 295),
(200, 48.000, 1, 1, 296),
(201, 48.000, 1, 1, 297),
(202, 48.000, 1, 1, 298),
(203, 48.000, 1, 1, 299),
(204, 48.000, 1, 1, 300),
(205, 48.000, 1, 6, 301),
(206, 48.000, 1, 6, 302),
(207, 48.000, 1, 6, 303),
(208, 18.000, 10, 1, 304),
(209, 18.000, 30, 6, 304),
(210, 22.000, 1, 15, 304),
(211, 16.000, 6, 2, 304),
(212, 18.000, 10, 1, 305),
(213, 18.000, 30, 6, 305),
(214, 22.000, 1, 15, 305),
(215, 16.000, 6, 2, 305),
(216, 18.000, 10, 1, 306),
(217, 18.000, 30, 6, 306),
(218, 22.000, 1, 15, 306),
(219, 16.000, 6, 2, 306),
(220, 18.000, 10, 1, 307),
(221, 18.000, 30, 6, 307),
(222, 22.000, 1, 15, 307),
(223, 16.000, 6, 2, 307),
(224, 18.000, 10, 1, 308),
(225, 18.000, 30, 6, 308),
(226, 22.000, 1, 15, 308),
(227, 16.000, 6, 2, 308),
(228, 18.000, 10, 1, 309),
(229, 18.000, 30, 6, 309),
(230, 22.000, 1, 15, 309),
(231, 16.000, 6, 2, 309),
(232, 46.000, 1, 2, 310),
(233, 46.000, 1, 2, 311),
(234, 18.000, 10, 1, 312),
(235, 18.000, 30, 6, 312),
(236, 22.000, 1, 15, 312),
(237, 16.000, 6, 2, 312),
(238, 18.000, 10, 1, 313),
(239, 18.000, 30, 6, 313),
(240, 22.000, 1, 15, 313),
(241, 16.000, 6, 2, 313),
(242, 18.000, 10, 1, 314),
(243, 18.000, 30, 6, 314),
(244, 22.000, 1, 15, 314),
(245, 16.000, 6, 2, 314),
(246, 18.000, 10, 1, 315),
(247, 18.000, 30, 6, 315),
(248, 22.000, 1, 15, 315),
(249, 16.000, 6, 2, 315),
(250, 48.000, 1, 1, 316),
(254, 48.000, 1, 6, 320);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `commentText` text DEFAULT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `commentText`, `thoigian`) VALUES
(1, 2, 1, 'Hay vãi ol', '2023-11-08 15:11:57'),
(2, 2, 2, 'Hay', '2023-11-07 05:10:31'),
(15, 3, 4, 'Hello', '2023-11-06 17:00:00'),
(49, 3, 23, 'Hello', '2023-11-15 17:00:00'),
(50, 3, 23, 'Hello', '2023-11-15 17:00:00'),
(51, 3, 23, 'dsvdsv', '2023-11-15 17:00:00'),
(52, 3, 4, 'Hello', '2023-11-15 17:00:00'),
(53, 3, 4, 'Vịt', '2023-11-15 17:00:00'),
(54, 3, 4, 'Hì', '2023-11-15 17:00:00'),
(55, 1, 13, 'Hay thật', '2023-11-18 23:07:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `diachi_id` int(11) NOT NULL,
  `sdt_nhandonhang` varchar(255) NOT NULL,
  `quocgia` varchar(255) NOT NULL,
  `thanhpho` varchar(255) NOT NULL,
  `quanhuyen` varchar(255) NOT NULL,
  `nhacuthe` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`diachi_id`, `sdt_nhandonhang`, `quocgia`, `thanhpho`, `quanhuyen`, `nhacuthe`, `user_id`) VALUES
(158, '1242566358', 'hjm,hjk', 'm,jkm,kj', ',jk,', 'kj,jk', 3),
(159, '1242566358', 'hjm,hjk', 'm,jkm,kj', ',jk,', 'kj,jk', 3),
(160, '1242566358', 'hjm,hjk', 'm,jkm,kj', ',jk,', 'kj,jk', 3),
(161, '0839739717', 'kj,jk,', 'k,k', ',k,', 'kl,kl,', 3),
(162, '0839739717', 'juymjkum,', 'ukmujm', 'ụm', 'kumikum', 3),
(163, 'ỵ,kuj,', 'jk,jk', ',jk,', 'jk,jk', ',jk,', 3),
(164, 'ỵ,kuj,', 'jk,jk', ',jk,', 'jk,jk', ',jk,', 3),
(165, '45725742', 'ikiu', 'kiuk', 'iuku', 'kiuk', 3),
(166, '45725742', 'ikiu', 'kiuk', 'iuku', 'kiuk', 3),
(167, '0839739717', 'Thái bìnhg', 'HMNGHJMN', 'mhjmhj', 'HJMHJMHJ', 3),
(168, '0839739717', 'iukiuk', 'iukiu', 'kiuk', 'uku', 3),
(169, '1242566358', 'iukiuk', 'iukiu', 'kiuk', 'uku', 3),
(170, '0839739717', 'kl,.kl,.', 'kl.kl.', 'kl.kl', '.lk.k', 3),
(171, '1242566358', 'kl.kl;', '.kl;.', 'lk.kl.', 'kl.kl', 3),
(172, '0839739717', 'Thái bìnhg', 'HMNGHJMN', 'mhjmhj', 'cvdsvds', 3),
(173, '0839739717', 'utjnhn', 'hnhgn', 'hgnh', 'nhnhjnhj', 1),
(174, '0385906406', 'Thái bìnhg', 'HMNGHJMN', 'mhjmhj', 'hjmhjm', 49),
(196, '0839739717', 'jkljkl', 'kjljk', 'lkjl', 'kjljk', 3),
(197, '0839739717', 'ádasf', 'ádas', 'đá', 'ádas', 3),
(198, '45725742', 'ghf', 'hfgh', 'gfh', 'gfhfgh', 3),
(199, '1242566358', 'fgbnfgh', 'nfg', 'fgfg', 'fg', 3),
(200, '0839739717', 'dsfds', 'fdsf', 'dsfds', 'fdsf', 3),
(201, '0839739717', 'Thái bìnhg', 'HMNGHJMN', 'dfgdfg', 'dfgdf', 3),
(202, '0839739717', 'ews', 'dsacds', 'cdsc', 'dscds', 3),
(203, '0839739717', 'èg', 'dsds', 'dvdf', 'vdfv', 3),
(204, '0839739717', 'ádasd', 'sadas', 'đâs', 'dá', 3),
(205, '0839739717', 'sadasd', 'á', 'ádasd', 'ád', 3),
(206, '0839739717', 'gdtghtd', 'ghdfghf', 'hfgh', 'fghfg', 3),
(207, '0839739717', 'gdtghtd', 'ghdfghf', 'hfgh', 'fghfg', 3),
(208, '0839739717', 'dfads', 'csc', 'scds', 'cs', 3),
(209, '0839739717', 'dfads', 'csc', 'scds', 'cs', 3),
(210, '0839739717', 'dfads', 'csc', 'scds', 'cs', 3),
(211, '0839739717', 'dfvdf', 'vdfv', 'fdvd', 'vdv', 3),
(212, '0839739717', 'dfvdf', 'vdfv', 'fdvd', 'vdv', 3),
(213, '0839739717', 'cdsc', 'dscds', 'cds', 'cscs', 3),
(214, '0839739717', 'cdsc', 'dscds', 'cds', 'cscs', 3),
(215, '0839739717', 'ghngh', 'nghn', 'hgnhg', 'nhgnhg', 3),
(216, '0839739717', 'ghngh', 'nghn', 'hgnhg', 'nhgnhg', 3),
(217, '0839739717', 'Thái bìnhg', 'HMNGHJMN', 'mhjmhj', 'hjmhjm', 3),
(218, '0839739717', 'Thái bìnhg', 'HMNGHJMN', 'mhjmhj', 'hjmhjm', 3),
(219, '0839739717', 'Thái bìnhg', 'dfgvfd', 'vfdv', 'fdvfd', 3),
(220, '0839739717', 'Thái bìnhg', 'dfgvfd', 'vfdv', 'fdvfd', 3),
(221, '0839739717', 'dfbvdfg', 'bvdfb', 'dfbdf', 'bdf', 3),
(222, '0839739717', 'Thái bìnhg', 'HMNGHJMN', 'mhjmhj', 'dsfdsf', 3),
(223, '0839739717', 'ádfas', 'dfasd', 'ádas', 'dá', 3),
(224, '0839739717', 'ádfas', 'dfasd', 'ádas', 'dá', 3),
(225, '0839739717', 'ádasd', 'ádsa', 'đá', 'ádasd', 3),
(226, '0839739717', 'ádasd', 'ádsa', 'đá', 'ádasd', 3),
(227, '0839739717', 'ádasd', 'ádsa', 'đá', 'ádasd', 3),
(228, '0839739717', 'ádasd', 'ádsa', 'đá', 'ádasd', 3),
(229, '0839739717', 'Thái bìnhg', 'sấcc', 'ác', 'âcsc', 3),
(230, '0839739717', 'Thái bìnhg', 'ádas', 'đâs', 'dá', 3),
(231, '0839739717', 'Thái bìnhg', 'ádas', 'đâs', 'dá', 3),
(232, '0839739717', 'dsvds', 'vdsv', 'dsvds', 'v', 3),
(233, 'vdsv', 'dsvds', 'vdsvdsv', 'dsvds', 'vdsbv', 3),
(234, '0839739717', 'dsvds', 'vdsvdsv', 'dsvds', 'vdsbv', 3),
(235, '0839739717', 'dsvds', 'vdsvdsv', 'dsvds', 'vdsbv', 3),
(236, '0839739717', 'âcs', 'các', 'âcsc', 'á', 3),
(237, '0839739717', 'Thái bìnhg', 'kj,jk,', 'kj,kj', ',kj,jk', 3),
(238, '0839739717', 'ythty', 'htyh', 'tyh', 'tyhty', 3),
(239, '0839739717', 'Thái bìnhg', 'jhmhj', 'mhjmhj', 'mhjmjh', 3),
(240, '0839739717', 'ghngh', 'nghn', 'ghnghn', 'ghn', 3),
(241, '0839739717', 'Thái bìnhg', 'kl,lk,', 'kl,lk', ',lk,lk', 3),
(242, '0839739717', 'k,jk', ',k,k', ',k,k', ',kl,', 3),
(243, '0839739717', 'dsfd', 'sfdsf', 'dsf', 'dsfdsf', 3),
(244, '0839739717', 'ghjgj', 'ghjhg', 'jghj', 'hhg', 3),
(245, '0839739717', 'ghfgf', 'hgfh', 'bgfhbgf', 'hfgb', 3),
(246, '0839739717', 'dfbvdfv', 'dfvdf', 'vfdvdf', 'vdfvdf', 3),
(247, '0839739717', ',jk', 'jk,jk', ',jk,', 'jk,jk,', 3),
(248, '0839739717', 'jk,jk', ',jk,kj', 'j,jk,', 'jk,jk', 3),
(249, '0839739717', 'dsfdf', 'dsfdsf', 'dsfdsf', 'dsfdsf', 3),
(250, '0839739717', 'đà', 'dsfcds', 'fdsfds', 'fdsfds', 3),
(251, '0839739717', 'fghfgb', 'fgbfg', 'bfgb', 'fgbfgb', 3),
(252, '0839739717', 'Thái bìnhg', 'Thái Bình', 'mhjmhjsadasdsdasd', 'sdasas', 3),
(253, '0839739717', 'Thái bìnhg', 'xzx czx', 'sdsad', 'đasa', 3),
(254, '0839739717', 'Thái bìnhg', 'xzx czx', 'sdsad', 'đasa', 3),
(255, '0839739717', 'Thái bìnhg', 'xzx czx', 'sdsad', 'đasa', 3),
(256, '0839739717', 'cacsa', 'câcs', 'scasa', 'sấcc', 3),
(257, '0839739717', 'dcvds', 'vcds', 'vcdsv', 'ds', 3),
(258, '0839739717', 'kj,jk,', 'kj,kj', ',jk,', 'kj,jk', 3),
(259, '0839739717', 'Thái bìnhg', 'ioulioul', 'iolio', 'liolio', 3),
(260, '0839739717', 'dfg', 'gfbfg', 'bfgbfg', 'bfgb', 3),
(261, '0839739717', 'dfg', 'gfbfg', 'bfgbfg', 'bfgb', 3),
(262, '0839739717', 'thyty', 'htyh', 'tyhty', 'htyh', 3),
(263, '0839739717', 'thyty', 'htyh', 'tyhty', 'htyh', 3),
(264, '0839739717', 'thyty', 'htyh', 'tyhty', 'htyh', 3),
(265, '0839739717', 'thyty', 'htyh', 'tyhty', 'htyh', 3),
(266, '0839739717', 'dfvdf', 'vdfv', 'dfvdf', 'vdfv', 3),
(267, '0839739717', 'dfvdf', 'vdfv', 'dfvdf', 'vdfv', 3),
(268, '0839739717', 'hjmhjk', 'mhjmh', 'jmhjm', 'hjmhj', 3),
(269, '0839739717', 'hjmhj', 'mhjm', 'hjmhjm', 'hj', 3),
(270, '0839739717', 'hjmhj', 'mhjm', 'hjmhjm', 'hj', 3),
(271, '0839739717', 'hjmhj', 'mhjm', 'hjmhjm', 'hj', 3),
(272, '0839739717', 'hjmhj', 'mhjm', 'hjmhjm', 'hj', 3),
(273, '0839739717', 'hjmhj', 'mhjm', 'hjmhjm', 'hj', 3),
(274, '0839739717', 'hjmhj', 'mhjm', 'hjmhjm', 'hj', 3),
(275, '0839739717', 'fdgbdfg', 'bgvb', 'cvbcvb', 'cvbcv', 3),
(276, '0839739717', 'fdgbdfg', 'bgvb', 'cvbcvb', 'cvbcv', 3),
(277, '0839739717', 'fdgbdfg', 'bgvb', 'cvbcvb', 'cvbcv', 3),
(278, '0839739717', 'hjmhj', 'mhjmhj', 'hjmhj', 'mhjmhj', 3),
(279, '0839739717', 'hjmhj', 'mhjmhj', 'hjmhj', 'mhjmhj', 3),
(280, '0839739717', 'hjmhj', 'mhjmhj', 'hjmhj', 'mhjmhj', 3),
(281, '0839739717', 'hjmhj', 'mhjmhj', 'hjmhj', 'mhjmhj', 3),
(282, '0839739717', 'bcvncbv', 'nbcvn', 'bcnbvn', 'bvnbv', 3),
(283, '0839739717', 'hjmhj', 'mhjmhj', 'hjmhj', 'mhjmhj', 3),
(284, '0839739717', 'dsvdsv', 'dsvds', 'vdsv', 'dsvdsv', 3),
(285, '0839739717', 'k,j', ',kj,k', ',kj,', 'jk,jk,', 3),
(286, '0839739717', 'Thái bìnhg', ';l/;l', '/l;/', 'l;/l;/l;', 3),
(287, '0839739717', 'Thái bìnhg', ';l/;l', '/l;/', 'l;/l;/l;', 3),
(288, '0839739717', 'Thái bìnhg', ';l/;l', '/l;/', 'l;/l;/l;', 3),
(289, '0839739717', 'Thái bìnhg', ';l/;l', '/l;/', 'l;/l;/l;', 3),
(290, '0839739717', 'kj,.jk', ',jk,', 'jk,', 'kj,jk,', 65),
(291, '0839739717', 'k,jk', ',jk,', 'jk,jk', ',jk,', 65),
(292, '0839739717', 'ghmngh', 'mghm', 'ghmghm', 'ghm', 65),
(293, '0839739717', 'cbvcv', 'cvb', 'cvbcv', 'bcvb', 65),
(294, '45725742', 'cx c', 'x cx', ' cx ', 'cx cx', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhang_id` int(11) NOT NULL,
  `diachi` int(11) NOT NULL,
  `ghichu_dh` text NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kieu_thanhtoan` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_giohang` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`donhang_id`, `diachi`, `ghichu_dh`, `ngaydat`, `kieu_thanhtoan`, `price`, `tinhtrang`, `id_giohang`, `id_user`) VALUES
(223, 161, 'jkljkl', '2023-11-28 17:30:33', 1, 88.000, 4, 87, 3),
(224, 161, 'adfsads', '2023-11-01 17:31:11', 1, 50.000, 4, NULL, 3),
(225, 165, 'dfghbdfgh', '2023-10-10 17:31:09', 1, 50.000, 4, NULL, 3),
(226, 158, 'fhnfgh', '2023-11-28 17:56:03', 1, 106.000, 4, 87, 3),
(227, 161, 'sdfs', '2023-11-28 17:56:05', 1, 139.000, 4, NULL, 3),
(228, 161, 'dfgdf', '2023-11-28 17:56:08', 1, 48.000, 4, NULL, 3),
(229, 161, 'ewdfeqwdf', '2023-11-29 15:26:37', 1, 690.000, 2, 87, 3),
(230, 161, 'dfvdfvg', '2023-11-29 15:26:40', 1, 48.000, 5, NULL, 3),
(231, 161, 'adsasf', '2023-11-29 15:27:48', 1, 48.000, 5, NULL, 3),
(233, 161, 'fghfghfg', '2023-11-30 00:41:33', 1, 48.000, 5, NULL, 3),
(234, 161, 'fghfghfg', '2023-11-30 00:54:54', 1, 48.000, 5, NULL, 3),
(238, 161, 'ấcdsc', '2023-11-30 04:26:18', 1, 48.000, 5, NULL, 3),
(239, 161, 'ấcdsc', '2023-11-30 00:48:05', 1, 48.000, 5, NULL, 3),
(240, 161, 'ấcdsc', '2023-11-30 00:41:34', 1, 48.000, 5, NULL, 3),
(241, 161, 'dfdsgvdfv', '2023-11-30 00:41:34', 1, 46.000, 5, NULL, 3),
(242, 161, 'dfdsgvdfv', '2023-11-30 00:41:35', 1, 46.000, 5, NULL, 3),
(243, 161, 'dgvbdfgbdfg', '2023-11-30 00:41:35', 1, 46.000, 5, NULL, 3),
(244, 161, 'dgvbdfgbdfg', '2023-11-30 00:41:35', 1, 46.000, 5, NULL, 3),
(245, 161, 'tyhtyht', '2023-11-30 00:41:36', 1, 46.000, 5, NULL, 3),
(246, 161, 'tyhtyht', '2023-11-30 00:41:36', 1, 46.000, 5, NULL, 3),
(247, 161, 'thfghnfg', '2023-11-30 00:41:36', 1, 46.000, 5, NULL, 3),
(248, 161, 'thfghnfg', '2023-11-30 00:41:37', 1, 46.000, 5, NULL, 3),
(249, 161, 'fvdfsvd', '2023-11-30 00:41:37', 1, 46.000, 5, NULL, 3),
(250, 161, 'fvdfsvd', '2023-11-30 00:41:37', 1, 46.000, 5, NULL, 3),
(251, 161, 'gdfgdf', '2023-11-30 00:41:38', 1, 46.000, 5, NULL, 3),
(252, 161, 'dsfsd', '2023-11-30 00:41:38', 1, 706.000, 5, 87, 3),
(253, 161, 'ầdsfas', '2023-11-30 00:41:38', 1, 48.000, 5, NULL, 3),
(254, 161, 'ầdsfas', '2023-11-30 00:41:39', 1, 48.000, 5, NULL, 3),
(255, 161, 'sdasd', '2023-11-30 00:41:39', 1, 48.000, 5, NULL, 3),
(256, 161, 'sdasd', '2023-11-30 00:41:39', 1, 48.000, 5, NULL, 3),
(257, 161, 'sdasd', '2023-11-30 00:41:40', 1, 48.000, 5, NULL, 3),
(258, 161, 'sdasd', '2023-11-30 00:41:40', 1, 48.000, 5, NULL, 3),
(259, 161, 'xcaxc', '2023-11-30 00:41:40', 1, 48.000, 5, NULL, 3),
(260, 161, 'ádasd', '2023-11-30 00:41:41', 1, 48.000, 5, NULL, 3),
(261, 161, 'ádasd', '2023-11-30 00:41:41', 1, 48.000, 5, NULL, 3),
(262, 161, 'dsvdscv', '2023-11-30 00:41:41', 1, 48.000, 5, NULL, 3),
(263, 161, 'dsvdsvds', '2023-11-30 00:41:42', 1, 706.000, 5, 87, 3),
(264, 161, 'dsvdsvds', '2023-11-30 00:41:42', 1, 706.000, 5, 87, 3),
(265, 161, 'cãc', '2023-11-30 00:41:43', 1, 48.000, 5, NULL, 3),
(266, 161, 'uykmyuikm,', '2023-11-30 00:41:43', 1, 48.000, 5, NULL, 3),
(267, 161, 'rthgrtyh', '2023-11-30 00:41:43', 1, 48.000, 5, NULL, 3),
(268, 161, 'hjhmhjm', '2023-11-30 00:41:44', 1, 48.000, 5, NULL, 3),
(269, 161, 'ghnghn', '2023-11-30 00:41:44', 1, 48.000, 5, NULL, 3),
(271, 161, 'k,kl,jk,kil', '2023-11-30 00:41:45', 1, 48.000, 5, NULL, 3),
(272, 161, 'jkm,jk,jk', '2023-11-30 00:46:18', 1, 706.000, 5, 87, 3),
(273, 161, 'dsffds', '2023-11-30 00:31:27', 1, 706.000, 5, 87, 3),
(274, 161, 't45gt4rg', '2023-11-30 00:30:28', 1, 48.000, 5, NULL, 3),
(275, 161, 'vdfsvds', '2023-11-30 00:31:26', 1, 48.000, 5, NULL, 3),
(276, 161, 'kj,jk,', '2023-11-30 01:16:08', 1, 48.000, 5, NULL, 3),
(277, 161, 'jkjk,', '2023-11-01 01:15:32', 1, 706.000, 2, 87, 3),
(278, 161, 'bdfgb cfvbn', '2023-11-30 09:49:39', 1, 48.000, 2, NULL, 3),
(279, 161, 'fvdfbvdf', '2023-11-30 09:49:40', 1, 868.000, 2, 87, 3),
(280, 161, 'fhygnfhgjn', '2023-11-30 09:49:40', 1, 868.000, 2, 87, 3),
(281, 161, 'ádadsa', '2023-12-01 04:57:00', 1, 52.000, 5, NULL, 3),
(282, 161, 'sấccsa', '2023-12-01 04:57:02', 1, 46.000, 5, NULL, 3),
(283, 161, 'ácfadsca', '2023-12-01 04:57:04', 1, 48.000, 5, NULL, 3),
(284, 161, 'jk,jk,.', '2023-12-01 04:57:05', 2, 48.000, 5, NULL, 3),
(285, 161, 'ioliol', '2023-12-01 04:57:07', 1, 48.000, 5, NULL, 3),
(286, 161, 'dfgbdfhbdf', '2023-12-01 04:57:09', 2, 48.000, 5, NULL, 3),
(287, 161, 'dfgbdfhbdf', '2023-12-01 04:57:12', 2, 48.000, 5, NULL, 3),
(288, 161, 'rtyhtyhjt', '2023-12-01 04:57:15', 2, 48.000, 5, NULL, 3),
(289, 161, 'rtyhtyhjt', '2023-12-01 04:57:17', 2, 48.000, 5, NULL, 3),
(290, 161, 'rtyhtyhjt', '2023-12-01 04:57:18', 2, 48.000, 5, NULL, 3),
(291, 161, 'rtyhtyhjt', '2023-12-01 04:57:19', 2, 48.000, 5, NULL, 3),
(292, 161, 'dfsvdefbv ', '2023-12-01 04:57:21', 2, 48.000, 5, NULL, 3),
(293, 161, 'dfsvdefbv ', '2023-12-01 04:57:27', 2, 48.000, 5, NULL, 3),
(294, 161, 'ịukuykm', '2023-12-01 04:57:33', 2, 48.000, 5, NULL, 3),
(295, 161, 'hjmhjm', '2023-12-01 04:57:35', 1, 48.000, 5, NULL, 3),
(296, 161, 'hjmhjm', '2023-12-01 04:57:37', 2, 48.000, 5, NULL, 3),
(297, 161, 'hjmhjm', '2023-12-01 04:57:40', 2, 48.000, 5, NULL, 3),
(298, 161, 'hjmhjm', '2023-12-01 04:58:00', 2, 48.000, 5, NULL, 3),
(299, 161, 'hjmhjm', '2023-12-01 04:58:02', 2, 48.000, 5, NULL, 3),
(300, 161, 'hjmhjm', '2023-12-01 04:58:05', 2, 48.000, 2, NULL, 3),
(301, 161, 'cvbcvbcv', '2023-12-01 04:58:07', 1, 48.000, 2, NULL, 3),
(302, 161, 'cvbcvbcv', '2023-12-01 04:58:09', 2, 48.000, 5, NULL, 3),
(303, 161, 'cvbcvbcv', '2023-12-01 04:58:12', 2, 48.000, 5, NULL, 3),
(304, 161, 'hjmhjm', '2023-12-01 04:58:15', 2, 868.000, 5, 87, 3),
(305, 161, 'hjmhjm', '2023-12-01 04:58:19', 2, 868.000, 5, 87, 3),
(306, 161, 'hjmhjm', '2023-12-01 04:58:21', 2, 868.000, 5, 87, 3),
(307, 161, 'hjmhjm', '2023-12-01 04:58:24', 2, 868.000, 5, 87, 3),
(308, 161, 'gvdbdgvn ', '2023-12-01 04:58:26', 2, 868.000, 5, 87, 3),
(309, 161, 'hjmhjm', '2023-12-01 04:58:31', 2, 868.000, 5, 87, 3),
(310, 161, 'dsvdsv', '2023-12-01 04:58:32', 2, 46.000, 5, NULL, 3),
(311, 161, 'k,k,', '2023-12-01 04:58:34', 2, 46.000, 5, NULL, 3),
(312, 161, 'l./l;/l;', '2023-12-01 05:10:27', 2, 868.000, 1, 87, 3),
(313, 161, 'l./l;/l;', '2023-12-01 05:10:24', 2, 868.000, 2, 87, 3),
(314, 161, 'l./l;/l;', '2023-12-01 05:09:30', 2, 868.000, 1, 87, 3),
(315, 161, 'l./l;/l;', '2023-12-01 05:10:42', 2, 0.000, 1, 87, 3),
(316, 161, 'kl.jkl.jk', '2023-12-01 05:00:05', 2, 0.000, 1, NULL, 65),
(320, 165, 'css', '2023-12-01 05:12:22', 2, 0.000, 1, NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `giohang_id` int(11) NOT NULL,
  `user_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`giohang_id`, `user_name_id`) VALUES
(90, 1),
(93, 2),
(87, 3),
(94, 48),
(95, 65);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kieu_thanhtoan`
--

CREATE TABLE `kieu_thanhtoan` (
  `kieutt_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `kieu_thanhtoan`
--

INSERT INTO `kieu_thanhtoan` (`kieutt_id`, `name`) VALUES
(1, 'Thanh toán khi nhận được hàng'),
(2, 'Chuyển khoản ngân hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id_giamgia` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`id_giamgia`, `name`) VALUES
(1, 'duongnguyen'),
(2, 'vitconmayman');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_tap` varchar(255) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mieuta` text NOT NULL,
  `author` int(11) NOT NULL,
  `page` int(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `price` double(10,3) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `luotthich` int(255) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `name_tap`, `soluong`, `image`, `mieuta`, `author`, `page`, `format`, `weight`, `price`, `discount`, `luotthich`, `trangthai`, `category_id`) VALUES
(1, 'Thám tử lừng danh Conan', 'Tập 1', 20, 'conantap1.jpg', 'Kudo Shinichi là một cậu thám tử học sinh năng nổ với biệt tài suy luận có thể sánh ngang với Sherlock Holmes! Một ngày nọ, khi mải đuổi theo những kẻ khả nghi, cậu đã bị chúng cho uống một loại thuốc kì lạ khiến cho cơ thể bị teo nhỏ. Vậy là một thám tử ', 1, 184, 'bìa mềm', 120, 20.000, '18.000', 126, 0, 1),
(2, 'Thám tử lừng danh Conan', 'Tập 2', 50, 'conantap2.jpg', 'Conan đã quyết định ở nhờ tại văn phòng thám tử Kogoro, bố của Mori Ran - bạn gái cậu, để lần theo tung tích tổ chức bí ẩn kia. Nhằm tránh con mắt người đời, hàng ngày cậu đến trường như một học sinh cấp 1 bình thường. Và với tài suy luận lừng danh của mình, cậu vẫn đứng đằng sau ông bác thám tử \"gà mờ\" Mori Kogoro phá giải những vụ án hóc búa một cách tài tình!!', 1, 176, 'bìa mềm', 140, 20.000, '16.000', 126, 0, 1),
(3, 'Thám tử lừng danh Conan', 'Tập 3', 50, 'conantap3.jpg', 'Một học sinh cấp 3 bỗng chốc biến thành cậu bé cấp 1!\r\nMọi việc trở nên khó khăn hơn, nhưng dòng máu thám tử trong tôi vẫn sục sôi, giúp tôi chinh phục những vụ án mới!! Nhưng bạn biết không, để giữ kín thân phận của mình tôi đã phải khổ sở lắm đó!!\r\nTôi là Edogawa Conan - Thám tử nhí lừng danh!', 1, 185, 'bìa mềm', 250, 20.000, '', 51, 0, 1),
(4, 'Thám tử lừng danh Conan', 'Tập 4', 50, 'conantap4.jpg', 'Người nhỏ nhưng trí tuệ thì không nhỏ tẹo nào đâu nhé!! Bằng chứng là một loạt những bí ẩn đều lần lượt được tôi khám phá ra hết! Nhưng ước gì tôi sớm quay trở lại hình dạng ban đầu để lật tẩy danh tính bọn người mặc áo đen. Cũng là để được gặp lại Ran nữa!! Tôi là EDOGAWA CONAN - Thám tử lừng danh!', 1, 176, 'bìa mềm', 140, 20.000, '18.000', 60, 0, 1),
(5, 'Thám tử lừng danh Conan', 'Tập 5', 50, 'conantap5.jpg', 'Shinichi thật tâm không muốn Ran vì mình mà bị liên lụy. Cậu phải lảng tránh mỗi lần Ran hỏi về bố mẹ mình. Đúng lúc, một người đàn bà mặc đồ đen xuất hiện trước cửa nhà ông Mori tự xưng là mẹ của Conan và xin dẫn cháu về! Vẫn chưa hết bàng hoàng thì mụ ta còn nói cả về cha mẹ ruột của cậu và khẳng định cậu chính là Kudo Shinichi đang bị mất tích?? Sau đó, Conan bị dẫn đến một ngôi nhà hoang và tại đây cậu còn gặp một người đàn ông đeo mặt nạ... Qua đó, Conan biết được có một vụ án mạng sắp xảy ra... Cậu nhóc đã trốn thoát, tiếp tục truy tìm hai tên mặc đồ đen ấy!', 1, 192, 'bìa mềm', 120, 20.000, '', 10, 0, 1),
(6, 'Thám tử lừng danh Conan', 'Tập 6', 50, 'conantap6.jpg', 'Conan đã quyết định ở nhờ tại văn phòng thám tử Kogoro, bố của Mori Ran - bạn gái cậu, để lần theo tung tích tổ chức bí ẩn kia. Nhằm tránh con mắt người đời, hàng ngày cậu đến trường như một học sinh cấp 1 bình thường. Và với tài suy luận lừng danh của mình, cậu vẫn đứng đằng sau ông bác thám tử \"gà mờ\" Mori Kogoro phá giải những vụ án hóc búa một cách tài tình!!', 1, 176, 'bìa mềm', 140, 20.000, '18.000', 127, 0, 1),
(7, 'Thám tử lừng danh Conan', 'Tập 7', 50, 'conantap7.jpg', 'Nhận được lá thư mời kì lạ, chúng tớ khởi hành đến một hòn đảo sóng nước mênh mông... Đi thì cũng được, nhưng tôi không ngờ rằng lần này lại bị cuốn vào vụ án giết người hàng loạt xảy ra xung quanh cây đàn piano... Phá xong án thì rắc rối mới lại đến. Không biết từ đâu, một cô bạn gái mới toanh của tớ bỗng xuất hiện? Xem ra tâm lí con gái còn khó hơn cả những vụ án rắc rối nhất! Có ai giải đáp giúp tớ sự tức giận của Ran là gì được không?!', 1, 180, 'bìa mềm', 120, 20.000, '', 2, 0, 1),
(8, 'Thám tử lừng danh Conan', 'Tập 8', 50, 'conantap8.jpg', 'Xem chút nữa là Ran đã phát hiện ra thân phận của tớ rồi! Cũng may ứng biến kịp nên nguy hiểm tạm qua đi, nhưng giá mà tớ có thể làm cho cô ấy yên tâm hơn thì tốt biết mấy... Tớ đâu phải không muốn trở lại là Kudo Shinichi, nhưng cứ hết vụ án này đến vụ khác xảy ra khiến tớ chẳng còn tâm trí nghĩ đến chuyện đó nữa!! Rồi bỗng nhiên \"Nam tước bóng đêm\", kẻ chỉ có trong trí tưởng tượng lại từ đâu bay tới!', 1, 188, 'bìa mềm', 120, 25.000, '', 0, 0, 1),
(9, 'Thám tử lừng danh Conan', 'Tập 9', 50, 'conantap9.jpg', 'Vốn là thám tử cấp 3 tiếng tăm lẫy lừng, vậy mà giờ tớ lại phải học lại tiểu học thế này... Ayumi bị mất tích trong khi cả lũ đang chơi trốn tìm! Sau đó tưởng rằng mình sẽ được nghỉ ngơi thảnh thơi ở suối nước nóng, ai ngờ tớ lại phải đối mặt với một vụ án mạng! Ít ra cũng phải cho tớ tĩnh dưỡng một chút chứ, tớ vẫn chỉ là một thằng nhóc tiểu học thôi mà!!', 1, 180, 'bìa mềm', 120, 20.000, '', 1, 0, 1),
(10, 'Thám tử lừng danh Conan', 'Tập 10', 50, 'conantap10.jpg', 'Những vụ án nối tiếp nhau, không mời mà đến. Cứ như vậy thì sao tớ có thể một lúc gánh hết đây? Ơ, sao tự dưng người tớ cứ nóng dần, nóng dần... sắp không chịu nổi nữa rồi! Đúng lúc ấy, một anh chàng thám tử mới xuất hiện!', 1, 184, 'bìa mềm', 140, 20.000, '15.000', 15, 0, 1),
(11, 'Magic Kaito', 'Tập 1', 20, 'magic_kaito_tap1.jpg', 'Hắn chính là Kid, siêu đạo chích hào hoa phong nhã, xuất quỷ nhập thần luôn phô trương bằng những màn ảo thuật hoành tráng! Trang bị gương mặt thản nhiên học được từ cha làm vũ khí, tối nay tên trộm bảnh bao này lại nhắm đến những món bảo vật thế kỉ. Sau 8 năm đằng đẵng, hắn đã trở lại khuấy động cả đêm thâu...!!', 1, 204, 'bìa mềm', 160, 25.000, '22.000', 40, 0, 1),
(12, 'Magic Kaito', 'Tập 5', 20, 'magic_kaito_tap5.jpg', 'Siêu đạo chích Kid – Quý ông xuất quỷ nhập thần sẽ tái xuất cùng những màn ảo thuật rực rỡ!\r\nĐêm nay, hắn định sẽ lấy đi viên đá quý bằng phong thái hoa mĩ của mình... Nhưng một kẻ lạ mặt bất ngờ xuất hiện để trợ giúp cảnh sát!?\r\nLí do Kuroba Kaito quyết định trở thành “Siêu đạo chích Kid” là...\r\nVà những bí mật luôn bị cặp ba mẹ đạo chích của cậu che giấu sẽ đều được bật mí!', 1, 188, 'bìa mềm', 160, 25.000, '20.000', 47, 0, 1),
(13, 'Hồ Sơ Tuyệt Mật', 'Tập dài', 20, 'ho_so_tuyet_mat_ai_haibara.jpg', 'Thiên tài khoa học vừa “ngầu” vừa dễ thương!! Tất tần tật về bé Ai ♥ \r\nTUYỂN TẬP CHÍNH THỨC CỦA RIÊNG AI HAIBARA!\r\nTừ ánh mắt lạnh lùng đến nụ cười ấm áp... Tập san về sức hấp dẫn từ nhiều góc độ của Ai Haibara!! Từ TV series, Movie, Tập đặc biệt ONE... và những chỉ dẫn toàn diện để khám phá con người Haibara! Câu chuyện trưởng thành của Ai Haibara/ Báo cáo nghiên cứu APTX 4869 của Shiho Miyano/ Tóm tắt quá trình truy lùng “Sherry” của Tổ chức Áo đen/ Catalogue thời trang... và hơn thế nữa! Bộ sưu tập hình minh họa có sự xuất hiện của Ai Haibara do tác giả Gosho Aoyama chắp bút, thêm vào đó là cả những hình minh họa phiên bản giới hạn!!', 1, 108, 'bìa mềm', 420, 109.000, '97.000', 38, 0, 1),
(14, 'Onepiece - Đảo Hải tặc', 'Tập 1', 20, 'onepiecetap1.jpg', 'One Piece (Vua hải tặc) bộ thuộc thể loại truyện tranh Hành động kể về một cậu bé tên Monkey D. Luffy, giong buồm ra khơi trên chuyến hành trình tìm kho báu huyền thoại One Piece và trở thành Vua hải tặc.\nĐể làm được điều này, cậu phải đến được tận cùng của vùng biển nguy hiểm và chết chóc nhất thế giới: Grand Line (Đại Hải Trình). Luffy đội trên đầu chiếc mũ rơm như một nhân chứng lịch sử vì chiếc mũ rơm đó đã từng thuộc về hải tặc hùng mạnh: Hải tặc vương Gol. D. Roger và tứ hoàng Shank \"tóc đỏ\".\nLuffy lãnh đạo nhóm hải tặc Mũ Rơm qua East Blue (Biển Đông) và rồi tiến đến Grand Line. Cậu theo dấu chân của vị vua hải tặc quá cố, Gol. D. Roger, chu du từ đảo này sang đảo khác để đến với kho báu vĩ đại.', 2, 208, 'bìa mềm', 150, 22.000, '20.000', 53, 0, 2),
(15, 'Onepiece - Đảo Hải tặc', 'Tập 2', 20, 'onepiecetap2.jpg', 'EIICHIRO ODA : “Hỡi người chủ nhà hào hiệp, các vị khách đã đến rồi đây. Hướng về phương nào, những người ngồi gần cửa ra vào là người khó mà ở yên một chỗ” - Bài hát của hải tặc Bắc Âu, nghe cũng hay đấy chứ?', 2, 200, 'bìa mềm', 150, 22.000, '', 50, 0, 2),
(16, 'Onepiece - Đảo Hải tặc', 'Tập 3', 5, 'onepiecetap3.jpg', 'EIICHIRO ODA : Nếu được nghỉ nguyên một năm thì tôi có chuyện rất muốn làm. Đó là mài giũa kĩ năng sử dụng các loại họa phẩm cùng các phương pháp vẽ cho thật thành thạo. Được vậy thì tranh của tôi sẽ đa dạng hơn nhiều. Có ai đó từng nói “thế giới này thật nhỏ bé”, phải không?', 2, 200, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(17, 'Onepiece - Đảo Hải tặc', 'Tập 4', 10, 'onepiecetap4.jpg', 'Ngôi làng bình yên của Usopp bị hải tặc nhắm đến! Biết trước sự việc, nhóm Luffy đã quyết định ngăn chặn ý định tấn công của bọn chúng. Thế nhưng chờ mãi chẳng thấy tên nào, trong khi ở bờ biển kế bên lại có tiếng la hét...!?', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(18, 'Onepiece - Đảo Hải tặc', 'Tập 5', 6, 'onepiecetap5.jpg', 'Cuối cùng Luffy cũng đối đầu với tên cựu hải tặc Kiahadore!! Trận chiến nảy lửa trên con dốc dẫn vào làng liệu sẽ có hồi kết thúc!? Một bên, nhóm viện trợ cho đám nhóc đang bị rượt đuổi trong rừng, Zoro và Usopp đang...?', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(19, 'Onepiece - Đảo Hải tặc', 'Tập 6', 2, 'onepiecetap6.jpg', 'Lên đường tìm kiếm đầu bếp, cả nhóm đã ghé thăm nhà hàng trên biển... Trong lúc Don Krieg đang thực hiện âm mưu đánh chiếm nhà hàng thì trước mặt Luffy bỗng xuất hiện một bóng người...? Những chuyến phiêu lưu trên đại dương xoay quanh \"ONE PIECE\" lại bắt đầu!!', 2, 192, 'bìa mềm', 150, 22.000, '20.000', 20, 0, 2),
(20, 'Onepiece - Đảo Hải tặc', 'Tập 7', 16, 'onepiecetap7.jpg', 'Bắt Zeff làm con tin, băng Krieg đã đưa ra vô số yêu cầu quá đáng!! Đối mặt với một gã hèn hạ, Luffy hoàn toàn không hiểu lí do tại sao Sanji không hề phản ứng lại. Qua những hành động của anh ấy, duyên nợ với Zeff dần dần sáng tỏ... ', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(21, 'Onepiece - Đảo Hải tặc', 'Tập 8', 0, 'onepiecetap8.jpg', 'Không màng đến sống chết, Luffy mang trong mình niềm tin mạnh mẽ, quyết phân thắng bại với Krieg. Trận chiến cao cả của nhà hàng trên biển đã đến hồi kết thúc!? Cuối cùng, giờ phút phiêu lưu của Sanji đã đến... ', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(22, 'Onepiece - Đảo Hải tặc', 'Tập 9', 7, 'onepiecetap9.jpg', 'Bọn Luffy sau khi đuổi kịp Nami đến Arlong Park - Nơi bị đám người cá chiếm đóng đã đối mặt với một sự thật kinh hoàng. Liệu tấm lòng của những người đồng đội có thể chạm đến một Nami luôn đơn độc chiến đấu hay không? Những chuyến phiêu lưu trên đại dương xoay quanh \"ONE PIECE\" lại bắt đầu!!', 2, 208, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(23, 'Onepiece - Đảo Hải tặc', 'Tập 10', 8, 'onepiecetap10.jpg', 'Đáp lại tiếng thét xé lòng của Nami, hội Luffy đã quyết giúp cô đánh bại Ariong! Không may Luffy lại bị rơi xuống biển và lâm vào tình trạng nguy kịch!! Những người đồng đội còn lại đành phải vừa đánh, vừa nghĩ cách cứu Luffy. Những chuyến phiêu lưu trên đại dương xoay quanh \"ONE PIECE\" lại bắt đầu!!', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 0, 2),
(26, 'Onepiece-Đảo hai tặc', 'Tập 11', 20, 'z4390961030097_c481107c0a8fafaddcfc316698c8dae5.jpg', 'Hay xịn', 2, 150, 'Bìa cứng', 200, 20.000, '20', 1, 0, 2),
(27, 'Onepiece-Đảo hai tặc', 'Tập 12', 20, 'z4471495669872_64942d6d9becf302abf67d5b6b70e513.jpg', 'XỊn xò con gà', 2, 130, 'Bìa cứng', 200, 140.000, '100', 0, 0, 2),
(28, 'Onepiece-Đảo hai tặc', 'Red', 20, 'onepice_red.jpg', 'Hay Thật sự luôn á', 2, 150, 'Bìa cứng', 200, 140.000, '0', 0, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'admin'),
(4, 'Giám Đốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `tinhtrang_id` int(11) NOT NULL,
  `name_tt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`tinhtrang_id`, `name_tt`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Chờ lấy hàng'),
(3, 'Đang vận chuyển'),
(4, 'Đã nhận đơn hàng'),
(5, 'Đã hủy đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `ma_xacminh` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone`, `adress`, `ma_xacminh`, `role_id`) VALUES
(1, 'admin', 'admin', 'admin', '0385906407', '0385906406', NULL, 4),
(2, 'User1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1', '123456789', 'Hà Nội', NULL, 2),
(3, 'Nguyễn Viết Dương', 'Anhnhat2', 'duongnvph33352@fpt.edu.vn', '0385906405', 'An quý - Quỳnh Phụ - Thái Bình', 81597, 1),
(4, 'Nguyễn Huy Tân', '241024', 'tannhph41034@fpt.edu.vn', '0886635676', 'Thanh Hóa', NULL, 2),
(48, 'Viết Dương', '2004', '2004@gmail.com', '0385906407', 'An quý - Quỳnh Phụ - Thái Bình', NULL, 1),
(49, 'VIETDUONG', 'sấccfas', 'VIETDUONG@GMAIL.COM', '0385906407', 'hjmhjm', NULL, 1),
(50, 'VIETDUONG', 'sấccfas', 'VIETDUONG@GMAIL.COM', '0385906407', 'hjmhjm', NULL, 1),
(51, 'VIETDUONG', 'sấccfas', 'VIETDUONG@GMAIL.COM', '0385906406', 'hjmhjm', NULL, 1),
(52, 'VIETDUONG', 'sấccfas', 'VIETDUONG@GMAIL.COM', '0385906406', 'hjmhjm', NULL, 1),
(53, 'VIETDUONG', 'sấccfas', 'VIETDUONG@GMAIL.COM', '0385906406', 'hjmhjm', NULL, 1),
(54, 'VIETDUONG', 'hmjh', 'VIETDUONG@GMAIL.COM', '0385906406', 'dfvdfv', NULL, 1),
(55, 'Nguyễn Viết Dương', '2004', 'duonganvh2004@gmail.com', '02323232', 'An quý', NULL, 1),
(56, 'Nguyễn Viết Dương', '2004', 'cdscdsdsc@gmail.com', '0232325', 'cdsacdsa', NULL, 1),
(57, 'vietduong204', '', 'VIETDUONG@GMAIL.COM', '0385906406', 'âcsc', NULL, 1),
(58, 'Duong10052004', '', 'VIETDUONG@GMAIL.COM', '2004', 'âcsc', NULL, 1),
(65, 'Nguyen Viet Duong', 'Anhnhat1', 'duongnv10504@gmail.com', '0385906401', 'Thái Bình', 25764, 1),
(66, 'Nguyen Viet Duong', 'Anhnhat1', 'tienvnph32803@fpt.edu.vn', '0385906400', 'Thái Bình', 85491, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `chtiet_donhang`
--
ALTER TABLE `chtiet_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`diachi_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhang_id`),
  ADD KEY `diachi` (`diachi`),
  ADD KEY `kieu_thanhtoan` (`kieu_thanhtoan`),
  ADD KEY `tinhtrang` (`tinhtrang`),
  ADD KEY `id_giohang` (`id_giohang`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD KEY `user_name_id` (`user_name_id`);

--
-- Chỉ mục cho bảng `kieu_thanhtoan`
--
ALTER TABLE `kieu_thanhtoan`
  ADD PRIMARY KEY (`kieutt_id`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id_giamgia`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`tinhtrang_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `chtiet_donhang`
--
ALTER TABLE `chtiet_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `diachi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `kieu_thanhtoan`
--
ALTER TABLE `kieu_thanhtoan`
  MODIFY `kieutt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id_giamgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `tinhtrang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `product` (`author`);

--
-- Các ràng buộc cho bảng `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  ADD CONSTRAINT `chitiet_giohang_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `giohang` (`giohang_id`),
  ADD CONSTRAINT `chitiet_giohang_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `chtiet_donhang`
--
ALTER TABLE `chtiet_donhang`
  ADD CONSTRAINT `chtiet_donhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`donhang_id`),
  ADD CONSTRAINT `chtiet_donhang_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_10` FOREIGN KEY (`tinhtrang`) REFERENCES `tinhtrang` (`tinhtrang_id`),
  ADD CONSTRAINT `donhang_ibfk_11` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`giohang_id`),
  ADD CONSTRAINT `donhang_ibfk_12` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `donhang_ibfk_8` FOREIGN KEY (`diachi`) REFERENCES `diachi` (`diachi_id`),
  ADD CONSTRAINT `donhang_ibfk_9` FOREIGN KEY (`kieu_thanhtoan`) REFERENCES `kieu_thanhtoan` (`kieutt_id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_3` FOREIGN KEY (`user_name_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
