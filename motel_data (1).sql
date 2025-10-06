-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: MariaDB-11.2
-- Thời gian đã tạo: Th12 02, 2024 lúc 10:20 PM
-- Phiên bản máy phục vụ: 11.2.2-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `motel_data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `catalogue` longtext NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `price_promotion` float NOT NULL DEFAULT 0,
  `album` longtext NOT NULL,
  `icon` text NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `order` int(11) NOT NULL,
  `info` text NOT NULL,
  `rate` float NOT NULL,
  `hot` tinyint(4) NOT NULL,
  `cloneid` int(11) NOT NULL,
  `namsinh` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `huong` varchar(50) NOT NULL,
  `namxaydung` int(11) NOT NULL,
  `sub_album` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_catalogue`
--

CREATE TABLE `article_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `sub_album` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `login` tinyint(4) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_translate`
--

CREATE TABLE `article_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `sub_title` longtext NOT NULL,
  `sub_content` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `album_title` longtext NOT NULL,
  `sub_album_title` longtext NOT NULL,
  `router` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL,
  `dientich` text NOT NULL,
  `desc` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` longtext NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_catalogue`
--

CREATE TABLE `attribute_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_relationship`
--

CREATE TABLE `attribute_relationship` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `module` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `attributeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute_translate`
--

CREATE TABLE `attribute_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `module_primary` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_title` text NOT NULL,
  `canonical` varchar(100) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(50) DEFAULT NULL,
  `member_id` int(11) NOT NULL DEFAULT 0,
  `voucherid` text DEFAULT NULL,
  `cityid` varchar(10) DEFAULT NULL,
  `nation` varchar(255) DEFAULT NULL,
  `qrpost` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `districtid` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `messages` text DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `quantity` float NOT NULL DEFAULT 0,
  `type` varchar(50) DEFAULT NULL,
  `subtotal` float NOT NULL DEFAULT 0,
  `option` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `bookingid` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `fullname` text NOT NULL,
  `services` longtext NOT NULL,
  `old_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `time` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `voucherid` text NOT NULL,
  `percent` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` longtext NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand_catalogue`
--

CREATE TABLE `brand_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `album` text NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand_relationship`
--

CREATE TABLE `brand_relationship` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `module` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand_translate`
--

CREATE TABLE `brand_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `slogan` text NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clipboard_signup`
--

CREATE TABLE `clipboard_signup` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_live` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `parentid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `album` text NOT NULL,
  `comment` longtext NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contactid` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `theloai` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `job` text NOT NULL,
  `info` longtext NOT NULL,
  `reply` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `userid_replied` int(11) NOT NULL,
  `deleted_at` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `replied_at` int(11) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `checkin` text DEFAULT NULL,
  `checkout` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `contactid`, `phone`, `theloai`, `email`, `fullname`, `address`, `title`, `content`, `gender`, `job`, `info`, `reply`, `type`, `userid_replied`, `deleted_at`, `created_at`, `replied_at`, `userid_created`, `checkin`, `checkout`) VALUES
(1, 'CT_000001', '0961187500', '', 'minhbrots2@gmail.com', 'Hoàng Lê Minh', '', 'Khách đặt phòng cần tư vấn', 'tôi muốn đặt phongbg', 0, '', '', '', '', 0, 0, '2024-10-16 02:10:15', 0, 0, '16/10/2024', '17/10/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` longtext NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL,
  `released_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file_catalogue`
--

CREATE TABLE `file_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file_translate`
--

CREATE TABLE `file_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `router` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL,
  `released_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `id_general`
--

CREATE TABLE `id_general` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `suffix` varchar(20) NOT NULL,
  `prefix` varchar(20) NOT NULL,
  `num0` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `module` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `landingpage`
--

CREATE TABLE `landingpage` (
  `id` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location_catalogue`
--

CREATE TABLE `location_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location_relationship`
--

CREATE TABLE `location_relationship` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `module` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `attribute` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location_translate`
--

CREATE TABLE `location_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `keyword` text NOT NULL,
  `title` text NOT NULL,
  `attribute` text NOT NULL,
  `description` text NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` longtext NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `iframe` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `cloneid` int(11) NOT NULL,
  `tinhtrang` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media_catalogue`
--

CREATE TABLE `media_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `login` tinyint(4) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media_translate`
--

CREATE TABLE `media_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `icon` text NOT NULL,
  `viewed` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `iframe` longtext NOT NULL,
  `customer` text NOT NULL,
  `area` text NOT NULL,
  `phongcach` text NOT NULL,
  `brand` text NOT NULL,
  `sub_title` longtext NOT NULL,
  `sub_content` longtext NOT NULL,
  `template` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `id_social` text NOT NULL,
  `social` varchar(255) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` tinyint(1) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityid` varchar(20) NOT NULL,
  `districtid` varchar(20) NOT NULL,
  `wardid` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `description` text NOT NULL,
  `facebook_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `verify` varchar(50) NOT NULL,
  `remote_addr` varchar(20) NOT NULL,
  `user_agent` text NOT NULL,
  `check_promotion` tinyint(1) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_live` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_catalogue`
--

CREATE TABLE `member_catalogue` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_info`
--

CREATE TABLE `member_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_relationship`
--

CREATE TABLE `member_relationship` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_catalogue`
--

CREATE TABLE `menu_catalogue` (
  `id` int(11) NOT NULL,
  `value` text NOT NULL,
  `title` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_translate`
--

CREATE TABLE `menu_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `object_relationship`
--

CREATE TABLE `object_relationship` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `module` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` longtext NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `order` int(11) NOT NULL,
  `rate` float NOT NULL,
  `sub_album` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_catalogue`
--

CREATE TABLE `page_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `album` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `sub_album` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `login` tinyint(4) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_translate`
--

CREATE TABLE `page_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `sub_title` longtext NOT NULL,
  `sub_content` longtext NOT NULL,
  `viewed` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `sub_album_title` longtext NOT NULL,
  `router` varchar(255) NOT NULL,
  `template` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `locate` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `type_data` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `image` text NOT NULL,
  `catalogue` longtext NOT NULL,
  `time_end` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `panel_translate`
--

CREATE TABLE `panel_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `canonical` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `cityid` varchar(50) NOT NULL,
  `districtid` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price_catalogue`
--

CREATE TABLE `price_catalogue` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `articleid` varchar(255) NOT NULL,
  `productid_original` varchar(255) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` text NOT NULL,
  `price` text DEFAULT NULL,
  `price_promotion` text DEFAULT NULL,
  `bar_code` text NOT NULL,
  `model` text NOT NULL,
  `brandid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `album` text NOT NULL,
  `sub_album` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `viewed` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `time_end` datetime NOT NULL,
  `length` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `cloneid` int(11) NOT NULL,
  `landing_link` text NOT NULL,
  `hinhthuc` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_catalogue`
--

CREATE TABLE `product_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `album` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `landing_link` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_translate`
--

CREATE TABLE `product_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `icon` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `attribute` longtext NOT NULL,
  `content` longtext NOT NULL,
  `description` text NOT NULL,
  `video` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `sub_content` text NOT NULL,
  `sub_album_title` text NOT NULL,
  `template` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `huong` varchar(255) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `info` longtext NOT NULL,
  `brand` longtext NOT NULL,
  `shock` text NOT NULL,
  `meta_description` longtext NOT NULL,
  `made_in` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_version`
--

CREATE TABLE `product_version` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `attribute_catalogue` longtext NOT NULL,
  `attribute` longtext NOT NULL,
  `checked` longtext NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_wholesale`
--

CREATE TABLE `product_wholesale` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `number_start` longtext NOT NULL,
  `number_end` longtext NOT NULL,
  `price` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `promotionid` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `max` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `discount_value` float NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `image` text NOT NULL,
  `login` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion_relationship`
--

CREATE TABLE `promotion_relationship` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `promotionid` int(11) NOT NULL,
  `used` tinyint(1) NOT NULL,
  `used_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply`
--

CREATE TABLE `reply` (
  `objectid` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `router`
--

CREATE TABLE `router` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `module` varchar(50) NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `view` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide_catalogue`
--

CREATE TABLE `slide_catalogue` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

--
-- Đang đổ dữ liệu cho bảng `slide_catalogue`
--

INSERT INTO `slide_catalogue` (`id`, `keyword`, `publish`, `created_at`, `updated_at`, `deleted_at`, `userid_created`, `userid_updated`) VALUES
(1, 'main', 1, '2024-10-15 22:49:46', '2024-10-15 23:32:30', 0, 2, 2),
(2, 'testimonials', 1, '2024-10-16 01:08:49', '2024-10-16 01:13:55', 0, 2, 2),
(3, 'hotel', 1, '2024-10-16 01:17:36', '0000-00-00 00:00:00', 0, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide_catalogue_translate`
--

CREATE TABLE `slide_catalogue_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide_catalogue_translate`
--

INSERT INTO `slide_catalogue_translate` (`id`, `objectid`, `language`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`, `userid_created`, `userid_updated`) VALUES
(1, 1, 'vi', 'Banner chính', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(2, 2, 'vi', 'Lời chứng thực', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(3, 3, 'vi', 'Ảnh nhà nghỉ', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide_translate`
--

CREATE TABLE `slide_translate` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `alt` text NOT NULL,
  `canonical` text NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide_translate`
--

INSERT INTO `slide_translate` (`id`, `catalogueid`, `language`, `title`, `image`, `alt`, `canonical`, `description`, `content`, `created_at`, `updated_at`, `userid_created`, `userid_updated`) VALUES
(4, 1, 'vi', 'Mạnh Huy Hotel', '/upload/image/banner/tp-1688202990959320201046.webp', 'Chào mừng tới', '', '', '', '0000-00-00 00:00:00', '2024-10-15 23:32:30', 0, 2),
(7, 2, 'vi', 'chị Nguyễn Thị Hồng Ân', '/upload/image/banner/z4314116998293_e9ee88d0b069549419f2d370d3395967.jpg', '', '', 'Khách sạn có vị trí thuận tiện và chỗ để đồ rộng rãi, an toàn. Tôi cảm thấy rất thoải mái và yên tâm khi lưu trú ở đây. Nhân viên thân thiện và nhiệt tình, luôn sẵn sàng hỗ trợ khách hàng', '', '0000-00-00 00:00:00', '2024-10-16 01:13:55', 0, 2),
(8, 3, 'vi', '', '/upload/image/banner/z5928085008208_e4529ed248eca35a5bcb9229a5f31f0f(1).jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(9, 3, 'vi', '', '/upload/image/banner/z5931315032895_a707b5a23346743874b201c12b336d04.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(10, 3, 'vi', '', '/upload/image/banner/z5928074129926_23641c8b78eadcd6096aa37e2a8a8aa2.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(11, 3, 'vi', '', '/upload/image/banner/z5931322842347_178731f7b76b9d94856e8fd55e023bf5.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(12, 3, 'vi', '', '/upload/image/banner/z5931315040572_fb5da3feed434a6d5cb530c817d91f9a.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(13, 3, 'vi', '', '/upload/image/banner/z5928084632169_ddcb145cc9ec0b1e2d3cdd3a5064ef7b.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(14, 3, 'vi', '', '/upload/image/banner/z5928074172107_80ef4e259855db2be95d82f517b1ac37.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(15, 3, 'vi', '', '/upload/image/banner/z5928074175534_948a1b0042db3a2c39129068c3a0ede1.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(16, 3, 'vi', '', '/upload/image/banner/z5928074147346_d9f73ce45aa01657c1053cb2145d829e.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(17, 3, 'vi', '', '/upload/image/banner/z5931315048988_db79dd6b0743761a621e79f9a871064d.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(18, 3, 'vi', '', '/upload/image/banner/z5928074138065_39351ed7a6d046c4a17eb5bb9513b81b.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(19, 3, 'vi', '', '/upload/image/banner/z5928074144584_451d1f2568dbecd6f394431acc9f4c88.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(20, 3, 'vi', '', '/upload/image/banner/z5928074187056_94b99885789e2ee9dbcfcf36ae603afb.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(21, 3, 'vi', '', '/upload/image/banner/z5928074179092_7bfdc8d5af8897b5fcb67ac75e799632.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(22, 3, 'vi', '', '/upload/image/banner/z5928074160520_48924cb1c9ecac855e94ff8bab2655f1.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0),
(23, 3, 'vi', '', '/upload/image/banner/z5928074153465_d20f0313931fa5fb2929e1ad01d92d01.jpg', '', '', '', '', '2024-10-16 01:17:36', '0000-00-00 00:00:00', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `storeid` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityid` varchar(20) NOT NULL,
  `districtid` varchar(20) NOT NULL,
  `wardid` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_translate`
--

CREATE TABLE `system_translate` (
  `id` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `keyword` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

--
-- Đang đổ dữ liệu cho bảng `system_translate`
--

INSERT INTO `system_translate` (`id`, `language`, `keyword`, `content`, `created_at`, `updated_at`, `deleted_at`, `userid_created`, `userid_updated`) VALUES
(663, 'vi', 'homepage_company', 'Mạnh Huy', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(664, 'vi', 'homepage_brand', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(665, 'vi', 'homepage_color', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(666, 'vi', 'homepage_title_introduce', 'Chào mừng đến với nhà nghỉ Mạnh Huy', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(667, 'vi', 'homepage_introduce', '<h3 style=\"text-align: center; \"><span style=\"font-size:16px;\">Nh&agrave; nghỉ Mạnh Huy l&agrave; một địa điểm cho thu&ecirc; ph&ograve;ng nghỉ nằm tại Long Kh&aacute;nh, tỉnh Đồng Nai.</span></h3>\r\n\r\n<p style=\"text-align: center;\">Với địa chỉ cụ thể l&agrave; 54 Hồ Thị Hương, Xu&acirc;n Trung, Long Kh&aacute;nh, nh&agrave; nghỉ đ&atilde; hoạt động được 20 năm l&agrave; điểm dừng ch&acirc;n quen thuộc của c&aacute;c du kh&aacute;ch du lịch đến Long Kh&aacute;nh. Nh&agrave; nghỉ được kh&aacute;ch h&agrave;ng y&ecirc;u th&iacute;ch bởi vị tr&iacute; thuận lợi, dễ d&agrave;ng t&igrave;m đến nhờ gần bến xe Long Kh&aacute;nh v&agrave; c&aacute;c tiện &iacute;ch xung quanh. Dịch vụ th&acirc;n thiện v&agrave; ph&ograve;ng ốc sạch sẽ cũng l&agrave; một điểm cộng cho nh&agrave; nghỉ n&agrave;y.</p>\r\n', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(668, 'vi', 'homepage_gpkd', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(669, 'vi', 'homepage_logo', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(670, 'vi', 'homepage_logo_load', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(671, 'vi', 'homepage_logo_ft', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(672, 'vi', 'homepage_video', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(673, 'vi', 'homepage_copyright', 'Copyright All Right Reserved CVG', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(674, 'vi', 'homepage_copydescription', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(675, 'vi', 'homepage_copyright_link', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(676, 'vi', 'homepage_favicon', '/upload/image/logo/favicon-16x16.png', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(677, 'vi', 'aboutus_image', '/upload/image/banner/z5928085008208_e4529ed248eca35a5bcb9229a5f31f0f.jpg', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(678, 'vi', 'aboutus_title', 'Về chúng tôi', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(679, 'vi', 'aboutus_description', 'Nhà nghỉ Mạnh Huy là một địa điểm cho thuê phòng nghỉ nằm tại Long Khánh, tỉnh Đồng Nai. Với địa chỉ cụ thể là 54 Hồ Thị Hương, Xuân Trung, Long Khánh, nơi đây nhận được đánh giá 4.2 sao từ 30 đánh giá trên Google. Nhà nghỉ được khách hàng yêu thích bởi vị trí thuận lợi, dễ dàng tìm đến nhờ gần bến xe Long Khánh và các tiện ích xung quanh. Dịch vụ thân thiện và phòng ốc sạch sẽ cũng là một điểm cộng cho nhà nghỉ này.', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(680, 'vi', 'aboutus_title1', 'An ninh tuyệt đối', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(681, 'vi', 'aboutus_description1', 'Nhà nghỉ đảm bảo an toàn tuyệt đối với hệ thống camera giám sát và bảo vệ hoạt động 24/7. Phòng nghỉ được trang bị khóa điện tử hiện đại, bảo mật cao, mang lại sự yên tâm cho khách hàng trong suốt thời gian lưu trú.', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(682, 'vi', 'aboutus_title2', 'Ẩm thực Long Khánh', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(683, 'vi', 'aboutus_description2', 'Nhà nghỉ phục vụ bữa ăn sáng, trưa và chiều cho quý khách với những món ăn mới lạ, đặc sản của Long Khánh', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(684, 'vi', 'services_image', '/upload/image/banner/phong-ngu-khach-san-5-sao-2-637226034911724690.jpg', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(685, 'vi', 'services_title', 'Dịch vụ', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(686, 'vi', 'services_title1', 'Thức Uống Tươi Mát Đa Dạng', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(687, 'vi', 'services_description1', 'Khách sạn cung cấp nhiều loại đồ uống phong phú từ nước ép tươi, cà phê thơm ngon đến trà thanh mát. Tất cả đều được chế biến từ nguyên liệu chất lượng cao, mang lại sự sảng khoái và hài lòng cho khách hàng sau những giờ phút nghỉ ngơi.', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(688, 'vi', 'services_title2', 'Không Gian Yên Tĩnh Thư Giãn', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(689, 'vi', 'services_description2', 'Không gian tại nhà nghỉ được thiết kế để mang lại sự yên tĩnh, tránh xa sự ồn ào của phố thị, tạo điều kiện lý tưởng cho bạn nghỉ ngơi, thư giãn hoặc làm việc trong không gian yên bình và thoải mái.', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(690, 'vi', 'services_title3', 'Chỗ Để Đồ An Toàn Tiện Lợi', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(691, 'vi', 'services_description3', 'Phòng nghỉ được trang bị tủ để đồ rộng rãi, đảm bảo bạn có đủ không gian để lưu trữ hành lý và đồ dùng cá nhân một cách an toàn và gọn gàng, mang lại sự tiện lợi trong thời gian lưu trú.', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(692, 'vi', 'services_title4', 'Phòng vệ sinh tiện nghi', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(693, 'vi', 'services_description4', 'Phòng tắm được thiết kế sang trọng và hiện đại, đi kèm với đầy đủ các tiện ích như hệ thống tắm nước nóng, vòi sen áp lực cao và bồn rửa tiện nghi. Không gian sạch sẽ và thoáng đãng giúp khách hàng cảm nhận được sự thoải mái tối đa sau những giờ phút mệt mỏi.', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(694, 'vi', 'contact_address', '54 Hồ Thị Hương, Xuân Trung, Long Khánh, Đồng Nai', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(695, 'vi', 'contact_address_company', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(696, 'vi', 'contact_hotline', '0966 003 639', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(697, 'vi', 'contact_email', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(698, 'vi', 'contact_website', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(699, 'vi', 'contact_time', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(700, 'vi', 'contact_map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15669.210737271109!2d107.2427818!3d10.9404928!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174f984a7b0ca41%3A0xdd4f81231180a9ca!2zTmjDoCBuZ2jhu4kgTeG6oW5oIEh1eQ!5e0!3m2!1svi!2s!4v1729017220187!5m2!1svi!2s\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(701, 'vi', 'contact_map_link', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(702, 'vi', 'seo_meta_title', 'Motel Mạnh Huy', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(703, 'vi', 'seo_meta_description', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(704, 'vi', 'analytic_google_analytic', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(705, 'vi', 'facebook_facebook_pixel', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(706, 'vi', 'script_facebook_pixel', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(707, 'vi', 'social_facebook', 'https://www.facebook.com/hobatnhatminh', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(708, 'vi', 'social_messenger', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(709, 'vi', 'social_google', 'https://www.facebook.com/hobatnhatminh', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(710, 'vi', 'social_youtube', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(711, 'vi', 'social_twitter', 'https://www.facebook.com/hobatnhatminh', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(712, 'vi', 'social_link', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(713, 'vi', 'social_insta', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(714, 'vi', 'social_skype', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(715, 'vi', 'social_telegram', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(716, 'vi', 'social_zalo', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(717, 'vi', 'social_viber', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(718, 'vi', 'social_whatsapp', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(719, 'vi', 'social_pinterest', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(720, 'vi', 'social_tiktok', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(721, 'vi', 'social_snapchat', '', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(722, 'vi', 'website_status', '0', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(723, 'vi', 'website_index', '1', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(724, 'vi', 'website_canonical', 'normal', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2),
(725, 'vi', 'website_language', 'vi', '0000-00-00 00:00:00', '2024-10-16 02:20:11', 0, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag_relationship`
--

CREATE TABLE `tag_relationship` (
  `id` int(11) NOT NULL,
  `objectid` longtext NOT NULL,
  `module` varchar(255) NOT NULL,
  `language` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `tourid` varchar(255) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `catalogue` text NOT NULL,
  `price` float NOT NULL,
  `price_promotion` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `album` text NOT NULL,
  `sub_album` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `viewed` int(11) NOT NULL,
  `time_end` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_catalogue`
--

CREATE TABLE `tour_catalogue` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `album` text NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_schedule`
--

CREATE TABLE `tour_schedule` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `schedule_start` longtext NOT NULL,
  `schedule_to` longtext NOT NULL,
  `price` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_translate`
--

CREATE TABLE `tour_translate` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` longtext NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_album_title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `description` text NOT NULL,
  `video` text NOT NULL,
  `sub_title` text NOT NULL,
  `sub_content` text NOT NULL,
  `info` longtext NOT NULL,
  `canonical` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `start_at` text NOT NULL,
  `end_at` text NOT NULL,
  `day_start` text NOT NULL,
  `number_days` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_version`
--

CREATE TABLE `tour_version` (
  `id` int(11) NOT NULL,
  `objectid` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `attribute_catalogue` longtext NOT NULL,
  `attribute` longtext NOT NULL,
  `checked` longtext NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` tinyint(1) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityid` varchar(20) NOT NULL,
  `districtid` varchar(20) NOT NULL,
  `wardid` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `job` text NOT NULL,
  `description` text NOT NULL,
  `verify` varchar(50) NOT NULL,
  `remote_addr` varchar(20) NOT NULL,
  `user_agent` text NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_live` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `isadmin`, `catalogueid`, `email`, `password`, `salt`, `fullname`, `image`, `gender`, `address`, `cityid`, `districtid`, `wardid`, `phone`, `birthday`, `job`, `description`, `verify`, `remote_addr`, `user_agent`, `otp`, `otp_live`, `created_at`, `updated_at`, `deleted_at`, `last_login`, `publish`, `userid_created`, `userid_updated`) VALUES
(1, 0, 1, 'vjetanh2000@gmail.com', 'c0d417ef5b8eebbb30b6bd3f5917de71', '4w2NNYQs6xKbEhIqRZPBF1ce4OidR1Hv8tSmPpVqxsSXE9yE2dqJkTMULyIvQGkGlH7RIUvLtwWKaHua3gp7OsxCDfVYhTfnfnyjolljX3S85k6u3egZF0DrjgQibZu4p5WKTmcao0LX098rMi1WcOhDrBzCFPYzmUwJCbMG', 'Vanh Le', '/upload/image/admin/z3387688465671_96dd4ee8625b422b00c47095cdfdbf19.jpg', 1, '42 cau dat', '01TTT', '002HH', '00067', '0523591685', '21/06/2000', 'CEO of Steeler Industrial', '', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', '194862', '2022-10-30 00:21:42', '2020-09-09 14:50:19', '2022-09-05 21:30:03', 1, '2022-10-31 23:47:43', 1, 8, 23),
(2, 0, 1, 'cvg.ltd.tech@gmail.com', '95844dfa284b528fbed8550b5334914b', '0PVjXirx6GeEZJWgreMCMSQAzfrwbQm7ZKNFNP8tCEDyU3pyzxa89WxTJIMmsPn1ndHc4faLDO25iOoljAiIWSdFL1G7UhpFjdBzs4KcB0KRHYhYofXmUwgRA5CD76JB3Iu2NTlvqyktEGVOl8Sa0kbtveqv2R9o6nu3ghY9', 'CVG', '/upload/image/logo/logo-footer.png', 1, '', '0', '0', '0', '', '', '', '', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '', '0000-00-00 00:00:00', '2022-10-21 01:05:38', '2022-11-08 23:09:35', 0, '2024-10-15 22:32:24', 1, 23, 30),
(3, 0, 1, 'sanmedia.hcm@gmail.com', '79b08a0693f0afa1e5d8a7882abe4996', 'hJVU6ZgHXzoCsVgqVGTCbz0uQsKY9BScUBvG6fA5rqMfKmcOWtIFYE1EjfheR3DL5bpqhpvxlgWN8wJEayNes8e4krRtcmJzGPniPKQBStnZw2kT2FyMxDd9Ulm7X4d6RLXiCvAnZuHxuw70P1aMY13D0Q7F3oipSAlTI5r9', 'SanMedia', '/upload/image/logo-transparency.png', 1, '', '0', '0', '0', '', '', '', '', '', '113.173.178.198', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '216058', '2023-01-19 16:11:12', '2022-11-02 20:00:18', '2023-02-13 09:16:18', 1, '2023-02-18 12:03:31', 1, 30, 31),
(4, 1, 1, 'minhbrots2@gmail.com', 'b58c4e7fae80097f0aa0f51d8398667b', 'BnOmtWlF2ITwynEchPDDcvJed7659glWCXJko5zjZLMHHs6dTSAHC0DgOnfsvyIaVAI1LZQWMKYBfibxUu4YX5O6bE8kpAvxYtUrjbBVaiJo8elgmGKr1mqQSxptus3j7Xp3RKc4oU0wweVkh9Sqf9TF4a3NEZ7CMPirGz28', 'Hoàng Lê Minh', '/upload/image/admin/368332454_1341424983396369_1641869026696049108_n.jpg', 1, 'Hồng Hà, Hoàn Kiếm, Hà Nội', '01TTT', '002HH', '00067', '0961187500', '8-8-2000', '', '', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '', '0000-00-00 00:00:00', '2023-03-25 20:11:16', '2023-08-24 08:57:42', 0, '2024-12-02 22:19:12', 1, 30, 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_catalogue`
--

CREATE TABLE `user_catalogue` (
  `id` int(11) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `permission` longtext NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

--
-- Đang đổ dữ liệu cho bảng `user_catalogue`
--

INSERT INTO `user_catalogue` (`id`, `isadmin`, `title`, `permission`, `description`, `created_at`, `updated_at`, `deleted_at`, `publish`, `userid_created`, `userid_updated`) VALUES
(1, 0, 'Quản trị viên', '[\"backend\\/time_log\\/time_log\\/index\",\"backend\\/time_log\\/time_log\\/accept\",\"backend\\/time_log\\/time_log\\/delete\",\"backend\\/time_log\\/time_log\\/check\",\"backend\\/product\\/catalogue\\/index\",\"backend\\/product\\/catalogue\\/create\",\"backend\\/product\\/catalogue\\/update\",\"backend\\/product\\/catalogue\\/delete\",\"change_image\",\"backend\\/product\\/product\\/index\",\"backend\\/product\\/product\\/preview\",\"backend\\/product\\/product\\/create\",\"backend\\/product\\/product\\/update\",\"backend\\/product\\/product\\/delete\",\"backend\\/product\\/version\\/create\",\"backend\\/gift\\/gift\\/index\",\"backend\\/gift\\/gift\\/list\",\"backend\\/gift\\/gift\\/create\",\"backend\\/gift\\/gift\\/update\",\"backend\\/gift\\/gift\\/delete\",\"backend\\/product\\/brand\\/catalogue\\/index\",\"backend\\/product\\/brand\\/catalogue\\/create\",\"backend\\/product\\/brand\\/catalogue\\/update\",\"backend\\/product\\/brand\\/catalogue\\/delete\",\"backend\\/product\\/brand\\/brand\\/index\",\"backend\\/product\\/brand\\/brand\\/create\",\"backend\\/product\\/brand\\/brand\\/update\",\"backend\\/product\\/brand\\/brand\\/delete\",\"backend\\/product\\/store\\/index\",\"backend\\/product\\/store\\/create\",\"backend\\/product\\/store\\/update\",\"backend\\/product\\/store\\/delete\",\"backend\\/article\\/catalogue\\/index\",\"backend\\/article\\/catalogue\\/create\",\"backend\\/article\\/catalogue\\/update\",\"backend\\/article\\/catalogue\\/delete\",\"backend\\/article\\/article\\/index\",\"backend\\/article\\/article\\/create\",\"backend\\/article\\/article\\/update\",\"backend\\/article\\/article\\/delete\",\"backend\\/page\\/catalogue\\/index\",\"backend\\/page\\/catalogue\\/create\",\"backend\\/page\\/catalogue\\/update\",\"backend\\/page\\/catalogue\\/delete\",\"backend\\/page\\/page\\/index\",\"backend\\/page\\/page\\/create\",\"backend\\/page\\/page\\/update\",\"backend\\/page\\/page\\/delete\",\"backend\\/file\\/catalogue\\/index\",\"backend\\/file\\/catalogue\\/create\",\"backend\\/file\\/catalogue\\/update\",\"backend\\/file\\/catalogue\\/delete\",\"backend\\/file\\/file\\/index\",\"backend\\/file\\/file\\/create\",\"backend\\/file\\/file\\/update\",\"backend\\/file\\/file\\/delete\",\"backend\\/location\\/catalogue\\/index\",\"backend\\/location\\/catalogue\\/create\",\"backend\\/location\\/catalogue\\/update\",\"backend\\/location\\/catalogue\\/delete\",\"backend\\/location\\/location\\/index\",\"backend\\/location\\/location\\/create\",\"backend\\/location\\/location\\/update\",\"backend\\/location\\/location\\/delete\",\"backend\\/user\\/catalogue\\/index\",\"backend\\/user\\/catalogue\\/create\",\"backend\\/user\\/catalogue\\/update\",\"backend\\/user\\/catalogue\\/delete\",\"backend\\/user\\/user\\/index\",\"backend\\/user\\/user\\/create\",\"backend\\/user\\/user\\/update\",\"backend\\/user\\/user\\/delete\",\"backend\\/member\\/member\\/index\",\"backend\\/member\\/member\\/create\",\"backend\\/member\\/member\\/update\",\"backend\\/member\\/member\\/delete\",\"backend\\/bill\\/bill\\/index\",\"backend\\/bill\\/bill\\/detail\",\"backend\\/attribute\\/catalogue\\/index\",\"backend\\/attribute\\/catalogue\\/create\",\"backend\\/attribute\\/catalogue\\/update\",\"backend\\/attribute\\/catalogue\\/delete\",\"backend\\/attribute\\/attribute\\/index\",\"backend\\/attribute\\/attribute\\/create\",\"backend\\/attribute\\/attribute\\/update\",\"backend\\/attribute\\/attribute\\/delete\",\"backend\\/contact\\/contact\\/index\",\"backend\\/contact\\/contact\\/create\",\"backend\\/contact\\/contact\\/update\",\"backend\\/contact\\/contact\\/delete\",\"backend\\/booking\\/booking\\/index\",\"backend\\/booking\\/booking\\/create\",\"backend\\/booking\\/booking\\/update\",\"backend\\/booking\\/booking\\/delete\",\"backend\\/promotion\\/promotion\\/index\",\"backend\\/promotion\\/promotion\\/create\",\"backend\\/promotion\\/promotion\\/update\",\"backend\\/promotion\\/promotion\\/delete\",\"backend\\/comment\\/comment\\/index\",\"backend\\/comment\\/comment\\/create\",\"backend\\/comment\\/comment\\/update\",\"backend\\/comment\\/comment\\/delete\",\"backend\\/menu\\/menu\\/index\",\"backend\\/menu\\/menu\\/listmenu\",\"backend\\/menu\\/menu\\/createmenu\",\"backend\\/menu\\/menu\\/create\",\"backend\\/panel\\/panel\\/index\",\"backend\\/panel\\/panel\\/create\",\"backend\\/panel\\/panel\\/update\",\"backend\\/panel\\/panel\\/delete\",\"backend\\/slide\\/slide\\/index\",\"backend\\/slide\\/slide\\/create\",\"backend\\/slide\\/slide\\/update\",\"backend\\/slide\\/slide\\/delete\",\"backend\\/system\\/general\\/index\",\"backend\\/system\\/general\\/translator\",\"backend\\/language\\/language\\/index\",\"backend\\/language\\/language\\/create\",\"backend\\/language\\/language\\/update\",\"backend\\/language\\/language\\/delete\",\"backend\\/slide\\/translate\\/translate\",\"backend\\/translate\\/translate\\/translateobject\",\"backend\\/translate\\/translate\\/translateproduct\",\"backend\\/translate\\/translate\\/translatetour\",\"backend\\/translate\\/translate\\/translatecontact\",\"backend\\/translate\\/translate\\/translateattributecatalogue\",\"backend\\/translate\\/translate\\/translateattribute\",\"All\",\"folderView\",\"folderCreate\",\"folderRename\",\"folderDelete\",\"fileView\",\"fileUpload\",\"fileRename\",\"fileDelete\"]', '', '0000-00-00 00:00:00', '2023-12-23 03:14:06', 0, 1, 0, 30),
(2, 0, 'Thành viên', '[\"backend\\/user\\/catalogue\\/index\",\"backend\\/user\\/catalogue\\/create\",\"backend\\/user\\/catalogue\\/update\",\"backend\\/user\\/catalogue\\/delete\",\"backend\\/user\\/user\\/index\",\"backend\\/user\\/user\\/create\",\"backend\\/user\\/user\\/update\",\"backend\\/user\\/user\\/delete\",\"folderView\",\"folderCreate\",\"folderRename\",\"folderDelete\",\"fileView\",\"fileUpload\",\"fileRename\",\"fileDelete\"]', '', '0000-00-00 00:00:00', '2020-08-04 17:26:35', 0, 1, 0, 8),
(3, 0, 'Cộng tác viên', '', '', '0000-00-00 00:00:00', '2020-07-31 16:11:53', 0, 0, 0, 8),
(4, 0, 'Thực tập', '', '', '2020-07-31 16:15:32', '0000-00-00 00:00:00', 1, 1, 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_district`
--

CREATE TABLE `vn_district` (
  `districtid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinceid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_province`
--

CREATE TABLE `vn_province` (
  `provinceid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_village`
--

CREATE TABLE `vn_village` (
  `villageid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wardid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vn_ward`
--

CREATE TABLE `vn_ward` (
  `wardid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `districtid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `voucherid` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `max` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `warehouseid` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cityid` varchar(20) NOT NULL,
  `districtid` varchar(20) NOT NULL,
  `wardid` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website_control`
--

CREATE TABLE `website_control` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `router` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_start` date NOT NULL,
  `time_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website_system`
--

CREATE TABLE `website_system` (
  `id` int(11) NOT NULL,
  `module` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keyword` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `type` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `system` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deleted_at` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website_widget`
--

CREATE TABLE `website_widget` (
  `id` int(11) NOT NULL,
  `catalogueid` int(11) NOT NULL,
  `title` text NOT NULL,
  `keyword` text NOT NULL,
  `html` longtext NOT NULL,
  `css` longtext NOT NULL,
  `script` longtext NOT NULL,
  `location` text NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` tinyint(1) NOT NULL,
  `userid_created` int(11) NOT NULL,
  `userid_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPRESSED;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `article_catalogue`
--
ALTER TABLE `article_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `article_translate`
--
ALTER TABLE `article_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `attribute_catalogue`
--
ALTER TABLE `attribute_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `attribute_relationship`
--
ALTER TABLE `attribute_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `attribute_translate`
--
ALTER TABLE `attribute_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `brand_catalogue`
--
ALTER TABLE `brand_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `brand_relationship`
--
ALTER TABLE `brand_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `brand_translate`
--
ALTER TABLE `brand_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `clipboard_signup`
--
ALTER TABLE `clipboard_signup`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `file_catalogue`
--
ALTER TABLE `file_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `file_translate`
--
ALTER TABLE `file_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `id_general`
--
ALTER TABLE `id_general`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `landingpage`
--
ALTER TABLE `landingpage`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `location_catalogue`
--
ALTER TABLE `location_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `location_relationship`
--
ALTER TABLE `location_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `location_translate`
--
ALTER TABLE `location_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `media_catalogue`
--
ALTER TABLE `media_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `media_translate`
--
ALTER TABLE `media_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `member_catalogue`
--
ALTER TABLE `member_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `member_info`
--
ALTER TABLE `member_info`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `member_relationship`
--
ALTER TABLE `member_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `menu_catalogue`
--
ALTER TABLE `menu_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `menu_translate`
--
ALTER TABLE `menu_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `object_relationship`
--
ALTER TABLE `object_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `page_catalogue`
--
ALTER TABLE `page_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `page_translate`
--
ALTER TABLE `page_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `panel_translate`
--
ALTER TABLE `panel_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `price_catalogue`
--
ALTER TABLE `price_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_catalogue`
--
ALTER TABLE `product_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_translate`
--
ALTER TABLE `product_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_version`
--
ALTER TABLE `product_version`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `product_wholesale`
--
ALTER TABLE `product_wholesale`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `promotion_relationship`
--
ALTER TABLE `promotion_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `slide_catalogue`
--
ALTER TABLE `slide_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `slide_catalogue_translate`
--
ALTER TABLE `slide_catalogue_translate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide_translate`
--
ALTER TABLE `slide_translate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `system_translate`
--
ALTER TABLE `system_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `tag_relationship`
--
ALTER TABLE `tag_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `tour_catalogue`
--
ALTER TABLE `tour_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `tour_translate`
--
ALTER TABLE `tour_translate`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `tour_version`
--
ALTER TABLE `tour_version`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `user_catalogue`
--
ALTER TABLE `user_catalogue`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `vn_district`
--
ALTER TABLE `vn_district`
  ADD UNIQUE KEY `district_districtid_unique` (`districtid`) USING BTREE;

--
-- Chỉ mục cho bảng `vn_province`
--
ALTER TABLE `vn_province`
  ADD UNIQUE KEY `province_provinceid_unique` (`provinceid`) USING BTREE;

--
-- Chỉ mục cho bảng `vn_village`
--
ALTER TABLE `vn_village`
  ADD UNIQUE KEY `village_villageid_unique` (`villageid`) USING BTREE;

--
-- Chỉ mục cho bảng `vn_ward`
--
ALTER TABLE `vn_ward`
  ADD UNIQUE KEY `ward_wardid_unique` (`wardid`) USING BTREE;

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `website_control`
--
ALTER TABLE `website_control`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `website_system`
--
ALTER TABLE `website_system`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `website_widget`
--
ALTER TABLE `website_widget`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `article_catalogue`
--
ALTER TABLE `article_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `article_translate`
--
ALTER TABLE `article_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attribute_catalogue`
--
ALTER TABLE `attribute_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attribute_relationship`
--
ALTER TABLE `attribute_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `attribute_translate`
--
ALTER TABLE `attribute_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand_catalogue`
--
ALTER TABLE `brand_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand_relationship`
--
ALTER TABLE `brand_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand_translate`
--
ALTER TABLE `brand_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `clipboard_signup`
--
ALTER TABLE `clipboard_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `file_catalogue`
--
ALTER TABLE `file_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `file_translate`
--
ALTER TABLE `file_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `id_general`
--
ALTER TABLE `id_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `landingpage`
--
ALTER TABLE `landingpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `location_catalogue`
--
ALTER TABLE `location_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `location_relationship`
--
ALTER TABLE `location_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `location_translate`
--
ALTER TABLE `location_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media_catalogue`
--
ALTER TABLE `media_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media_translate`
--
ALTER TABLE `media_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member_catalogue`
--
ALTER TABLE `member_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member_info`
--
ALTER TABLE `member_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member_relationship`
--
ALTER TABLE `member_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu_catalogue`
--
ALTER TABLE `menu_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu_translate`
--
ALTER TABLE `menu_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `object_relationship`
--
ALTER TABLE `object_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `page_catalogue`
--
ALTER TABLE `page_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `page_translate`
--
ALTER TABLE `page_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `panel_translate`
--
ALTER TABLE `panel_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `price_catalogue`
--
ALTER TABLE `price_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_catalogue`
--
ALTER TABLE `product_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_translate`
--
ALTER TABLE `product_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_version`
--
ALTER TABLE `product_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_wholesale`
--
ALTER TABLE `product_wholesale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `promotion_relationship`
--
ALTER TABLE `promotion_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `router`
--
ALTER TABLE `router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slide_catalogue`
--
ALTER TABLE `slide_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slide_catalogue_translate`
--
ALTER TABLE `slide_catalogue_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slide_translate`
--
ALTER TABLE `slide_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `system_translate`
--
ALTER TABLE `system_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT cho bảng `tag_relationship`
--
ALTER TABLE `tag_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour_catalogue`
--
ALTER TABLE `tour_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour_translate`
--
ALTER TABLE `tour_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour_version`
--
ALTER TABLE `tour_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_catalogue`
--
ALTER TABLE `user_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `website_control`
--
ALTER TABLE `website_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `website_system`
--
ALTER TABLE `website_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `website_widget`
--
ALTER TABLE `website_widget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
