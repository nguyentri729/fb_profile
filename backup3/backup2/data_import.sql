-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 14, 2018 lúc 07:36 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ducloc98_new`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `action_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_action` int(11) NOT NULL,
  `where_action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid_fb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `email`, `password`, `name`, `phone_number`, `uid_fb`, `time_creat`, `user_creat`, `active`) VALUES
(1, 'kidkend@yahoo.com', '2ff3a7a227127be8bfa38976b559853f', 'Trí Nguyễn', '01653360041', '4', 1528695811, 1, 1),
(2, 'kyou@gmail.com\n', '4f9f36817d0d6c9dcf9c019079e03d22', 'Nguyễn Đức Lộc', '01653360041', '100005500358832', 1528695811, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_gia`
--

CREATE TABLE `bang_gia` (
  `id` int(11) NOT NULL,
  `dich_vu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_ctv` int(11) NOT NULL,
  `gia_dl` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_gia`
--

INSERT INTO `bang_gia` (`id`, `dich_vu`, `gia_ctv`, `gia_dl`, `time_creat`, `user_creat`) VALUES
(1, 'bot_comment', 5000, 0, 1530608220, 1),
(2, 'bot_reactions', 3000, 2500, 1530347982, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_gia_buff`
--

CREATE TABLE `bang_gia_buff` (
  `id` int(11) NOT NULL,
  `dich_vu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_clone_dl` int(11) NOT NULL,
  `gia_clone_ctv` int(11) NOT NULL,
  `gia_that_dl` int(11) NOT NULL,
  `gia_that_ctv` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_gia_buff`
--

INSERT INTO `bang_gia_buff` (`id`, `dich_vu`, `gia_clone_dl`, `gia_clone_ctv`, `gia_that_dl`, `gia_that_ctv`, `time_creat`, `user_creat`) VALUES
(1, 'buff_like', 200, 100, 300, 700, 0, 0),
(2, 'buff_reactions', 200, 100, 300, 700, 0, 0),
(3, 'buff_share', 200, 100, 300, 700, 0, 0),
(4, 'buff_follow', 200, 100, 300, 700, 0, 0),
(5, 'buff_rate', 200, 100, 300, 700, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot_comment`
--

CREATE TABLE `bot_comment` (
  `id` int(11) NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_use` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `post_mot_lan` int(11) NOT NULL,
  `khoang_cach_lan` int(11) NOT NULL,
  `max_post_ngay` int(11) NOT NULL,
  `group_tt` int(11) NOT NULL,
  `page_tt` int(11) NOT NULL,
  `profile_tt` int(11) NOT NULL,
  `list_tt` int(11) NOT NULL,
  `age_start` int(11) NOT NULL,
  `age_end` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `ds_list` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cum_tu_ko_tt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_ko_tt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `token_die` int(11) NOT NULL,
  `cookie_die` int(11) NOT NULL,
  `type_reactions` int(11) NOT NULL COMMENT 'Loại sử dụng : 1 là token, 0 là cookie',
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot_comment_noidung`
--

CREATE TABLE `bot_comment_noidung` (
  `id` int(11) NOT NULL,
  `id_main` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sticker_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bot_reactions`
--

CREATE TABLE `bot_reactions` (
  `id` int(11) NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_use` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `post_mot_lan` int(11) NOT NULL,
  `khoang_cach_lan` int(11) NOT NULL,
  `max_post_ngay` int(11) NOT NULL,
  `group_tt` int(11) NOT NULL,
  `page_tt` int(11) NOT NULL,
  `profile_tt` int(11) NOT NULL,
  `list_tt` int(11) NOT NULL,
  `age_start` int(11) NOT NULL,
  `age_end` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `ds_list` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cum_tu_ko_tt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_ko_tt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cam_xuc_su_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `token_die` int(11) NOT NULL,
  `cookie_die` int(11) NOT NULL,
  `type_reactions` int(11) NOT NULL COMMENT 'Loại sử dụng : 1 là token, 0 là cookie',
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buff_follow`
--

CREATE TABLE `buff_follow` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follow_luu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `type_clone` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `ghi_chu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buff_like`
--

CREATE TABLE `buff_like` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `type_clone` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buff_rate`
--

CREATE TABLE `buff_rate` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `type_clone` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buff_reactions`
--

CREATE TABLE `buff_reactions` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `cam_xuc_su_dung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_clone` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `ghi_chu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buff_share`
--

CREATE TABLE `buff_share` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `type_clone` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `ghi_chu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctv_acc`
--

CREATE TABLE `ctv_acc` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid_fb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_acc` int(11) NOT NULL COMMENT '1 la CTV, 2 DL',
  `chi_tieu_thang` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctv_acc`
--

INSERT INTO `ctv_acc` (`id`, `email`, `password`, `name`, `money`, `phone_number`, `uid_fb`, `type_acc`, `chi_tieu_thang`, `time_creat`, `user_creat`, `active`) VALUES
(1, 'kidkend@yahoo.com', '2ff3a7a227127be8bfa38976b559853f', 'Trí Nguyễn', 844208, '01653360041', '100006861829132', 2, 1020792, 1528695811, 1, 1),
(10, 'loctit@gmail.com', '4f9f36817d0d6c9dcf9c019079e03d22', 'Nguyen Duc Loc', 3476667, '01653354412', '100005500358832', 2, 10330298, 1529301893, 1, 1),
(11, 'hoanghuonggiang771998@gmail.com', '020bdb72755a0a8dd758d1761171be3c', 'Hoàng Thị Hương Giang', 1890020, '213123122312323112', '100004144924902', 2, 109980, 1529506358, 2, 1),
(12, 'chuonglephuongtrach1999@gmail.com', 'c83a4328ff2b00a1902703aa5fb7a784', 'Chương Lê', 200000, '123123352', '100024306124733', 1, 1038990, 1530415298, 2, 1),
(13, 'admin@likecuoi.vn', '4f9f36817d0d6c9dcf9c019079e03d22', 'Đinh Mạnh Hưng', 0, '0164214544', '100008472451638', 2, 0, 1530608167, 1, 1),
(14, 'vietanh@gmail.com', 'ae92fdb4c8c187cfe2484abc9ed31ae4', 'Nguyen Viet Anh', 682000, '1231423231', '100008015923225', 2, 318000, 1531021028, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctv_sessions`
--

CREATE TABLE `ctv_sessions` (
  `id` int(11) NOT NULL,
  `c_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_session` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_creat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_vip`
--

CREATE TABLE `package_vip` (
  `id` int(11) NOT NULL,
  `name_package` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mieu_ta` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `max_post` int(11) NOT NULL,
  `type_package` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_clone` int(11) NOT NULL,
  `gia_nguoithat` int(11) NOT NULL,
  `doi_tuong_dung` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanli_acc`
--

CREATE TABLE `quanli_acc` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid_fb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanli_acc`
--

INSERT INTO `quanli_acc` (`id`, `email`, `password`, `name`, `phone_number`, `uid_fb`, `time_creat`, `user_creat`, `active`) VALUES
(1, 'kidkend@yahoo.com', '2ff3a7a227127be8bfa38976b559853f', 'Trí Nguyễn', '01653360041', '4', 1528695811, 1, 1),
(2, 'kyou@gmail.com', '4f9f36817d0d6c9dcf9c019079e03d22', 'Lộc Tit', '01696777897', '5', 152895811, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server_bot`
--

CREATE TABLE `server_bot` (
  `id` int(11) NOT NULL,
  `url_server` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bot_reactions` int(11) NOT NULL,
  `bot_comment` int(11) NOT NULL,
  `bot_post` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server_buff`
--

CREATE TABLE `server_buff` (
  `id` int(11) NOT NULL,
  `url_server` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buff_like` int(11) NOT NULL,
  `buff_reactions` int(11) NOT NULL,
  `buff_comment` int(11) NOT NULL,
  `buff_share` int(11) NOT NULL,
  `buff_follow` int(11) NOT NULL,
  `buff_rate` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `server_vip`
--

CREATE TABLE `server_vip` (
  `id` int(11) NOT NULL,
  `url_server` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vip_reactions` int(11) NOT NULL,
  `vip_comment` int(11) NOT NULL,
  `vip_share` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vip_comment`
--

CREATE TABLE `vip_comment` (
  `id` int(11) NOT NULL,
  `uid_vip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_vip` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong_dung` int(11) NOT NULL,
  `so_luong_co` int(11) NOT NULL,
  `so_post_dung` int(11) NOT NULL,
  `so_post_co` int(11) NOT NULL,
  `loai_acc_tuong_tac` int(11) NOT NULL COMMENT '0 là clone, 1 là thật',
  `so_luong_lan` int(11) NOT NULL,
  `khoang_cach_moi_lan` int(11) NOT NULL,
  `tuoi_tu` int(11) NOT NULL,
  `tuoi_den` int(11) NOT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `time_use` int(11) NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vip_comment_noi_dung`
--

CREATE TABLE `vip_comment_noi_dung` (
  `id` int(11) NOT NULL,
  `id_main` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sticker_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_creat` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vip_reactions`
--

CREATE TABLE `vip_reactions` (
  `id` int(11) NOT NULL,
  `uid_vip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_vip` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong_dung` int(11) NOT NULL,
  `so_luong_co` int(11) NOT NULL,
  `so_post_dung` int(11) NOT NULL,
  `so_post_co` int(11) NOT NULL,
  `cam_xuc_su_dung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_acc_tuong_tac` int(11) NOT NULL COMMENT '0 là clone, 1 là thật',
  `so_luong_lan` int(11) NOT NULL,
  `khoang_cach_moi_lan` int(11) NOT NULL,
  `tuoi_tu` int(11) NOT NULL,
  `tuoi_den` int(11) NOT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `time_use` int(11) NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_luu_tru` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_creat` int(11) NOT NULL,
  `time_creat` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bang_gia`
--
ALTER TABLE `bang_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bang_gia_buff`
--
ALTER TABLE `bang_gia_buff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bot_comment`
--
ALTER TABLE `bot_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bot_comment_noidung`
--
ALTER TABLE `bot_comment_noidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bot_reactions`
--
ALTER TABLE `bot_reactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buff_follow`
--
ALTER TABLE `buff_follow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buff_like`
--
ALTER TABLE `buff_like`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buff_rate`
--
ALTER TABLE `buff_rate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buff_reactions`
--
ALTER TABLE `buff_reactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buff_share`
--
ALTER TABLE `buff_share`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Chỉ mục cho bảng `ctv_acc`
--
ALTER TABLE `ctv_acc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ctv_sessions`
--
ALTER TABLE `ctv_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_vip`
--
ALTER TABLE `package_vip`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quanli_acc`
--
ALTER TABLE `quanli_acc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `server_bot`
--
ALTER TABLE `server_bot`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `server_buff`
--
ALTER TABLE `server_buff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `server_vip`
--
ALTER TABLE `server_vip`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vip_comment`
--
ALTER TABLE `vip_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vip_comment_noi_dung`
--
ALTER TABLE `vip_comment_noi_dung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vip_reactions`
--
ALTER TABLE `vip_reactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1033;
--
-- AUTO_INCREMENT cho bảng `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `bang_gia`
--
ALTER TABLE `bang_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `bang_gia_buff`
--
ALTER TABLE `bang_gia_buff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `bot_comment`
--
ALTER TABLE `bot_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT cho bảng `bot_comment_noidung`
--
ALTER TABLE `bot_comment_noidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT cho bảng `bot_reactions`
--
ALTER TABLE `bot_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT cho bảng `buff_follow`
--
ALTER TABLE `buff_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `buff_like`
--
ALTER TABLE `buff_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `buff_rate`
--
ALTER TABLE `buff_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `buff_reactions`
--
ALTER TABLE `buff_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `buff_share`
--
ALTER TABLE `buff_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ctv_acc`
--
ALTER TABLE `ctv_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `ctv_sessions`
--
ALTER TABLE `ctv_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT cho bảng `package_vip`
--
ALTER TABLE `package_vip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT cho bảng `quanli_acc`
--
ALTER TABLE `quanli_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `server_bot`
--
ALTER TABLE `server_bot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `server_buff`
--
ALTER TABLE `server_buff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `server_vip`
--
ALTER TABLE `server_vip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `vip_comment`
--
ALTER TABLE `vip_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `vip_comment_noi_dung`
--
ALTER TABLE `vip_comment_noi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT cho bảng `vip_reactions`
--
ALTER TABLE `vip_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
