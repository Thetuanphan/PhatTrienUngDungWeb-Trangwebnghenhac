-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 07, 2021 lúc 06:49 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wednhac`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `MaAlbum` int(10) NOT NULL,
  `TenAlbum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LinkHinhAnh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChuDe` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`MaAlbum`, `TenAlbum`, `LinkHinhAnh`, `ChuDe`) VALUES
(1, 'RAP VIỆT', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(2, 'AvaMax-King', 'https://i1.sndcdn.com/artworks-dxu3qzuzZzTCpfky-nxzcjA-t500x500.jpg', ''),
(3, 'Top 100 Nhạc Trữ Tình Việt Nam Hay Nhất', 'https://zumic.com/wp-content/uploads/2014/04/ariana-grande-iggy-azaleas-problem-lyric-video-zumic.jpg', ''),
(4, 'Top 100 Nhạc EDM Việt Nam Hay Nhất', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/c/5/f/c/c5fc615c43215c6b72676f42767855ee.jpg', ''),
(5, 'Top 100 Nhạc POP Âu Mỹ Việt Nam Hay Nhất', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/e/9/f/6/e9f6c74d1651a3dcf0be456822f1eefd.jpg', ''),
(6, 'Top 100 Nhạc Hàn Quốc Hay Nhất', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/2/d/d/0/2dd000bcd585f01edd235c0c3f21c2f9.jpg', ''),
(7, 'Top 100 Nhạc Trẻ Việt Nam Hay Nhất', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/d/c/5/0/dc5063c848cf0bf33a62f157544f4299.jpg', ''),
(8, 'Dalab - Thanh Xuân', 'https://i.ytimg.com/vi/GgQFO8dL5XQ/maxresdefault.jpg', ''),
(9, 'Dua Lipa-Levitating', 'https://i1.sndcdn.com/artworks-Qz6ZhZMRYyz8H80k-w8lePg-t500x500.jpg', ''),
(10, 'Arian Grande-Problem', 'https://zumic.com/wp-content/uploads/2014/04/ariana-grande-iggy-azaleas-problem-lyric-video-zumic.jpg', ''),
(11, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(12, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(13, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(14, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(15, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(16, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', ''),
(17, 'ablum', 'https://photo-resize-zmp3.zadn.vn/w320_r1x1_jpeg/cover/3/0/5/4/3054142743e7126f44a54ba61a72a68a.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albumyeuthich`
--

CREATE TABLE `albumyeuthich` (
  `MaNguoiDung` int(10) NOT NULL,
  `MaAlbum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `albumyeuthich`
--

INSERT INTO `albumyeuthich` (`MaNguoiDung`, `MaAlbum`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihat`
--

CREATE TABLE `baihat` (
  `MaBaiHat` int(10) NOT NULL,
  `TenBaiHat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenCaSi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LinkBaiHat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://img.lovepik.com/element/40131/7988.png_860.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baihat`
--

INSERT INTO `baihat` (`MaBaiHat`, `TenBaiHat`, `TenCaSi`, `LinkBaiHat`, `HinhAnh`) VALUES
(1, 'Cho mình em', 'Binz - Đen vâu', 'https://drive.google.com/uc?export=download&id=14S_ccsnvxA0-uMUGbcLMJ9C6-VocOqEU', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(2, 'Muộn rồi mà sao còn', 'Sơn Tùng MTP', 'https://drive.google.com/uc?export=download&id=1iUaMOHOHfxY-FBRgucqcpnKRe871C_ek', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(3, 'GONE', 'Rose', 'https://drive.google.com/uc?export=download&id=1ED9Bg5YuX_cQLfIjAupJIXovQ1hZdz44', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(4, 'Lay la lay', 'Jack', 'https://drive.google.com/uc?export=download&id=1eVavrbQj86Svtbf0h9-NVMh_J37Zy-6t', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(5, 'Lỡ say bye là bye', 'LemeseChangg', 'https://drive.google.com/uc?export=download&id=1OOBM4Q6qhk9Vds7NCec2euBrOGVW3hsN', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(6, 'On the ground', 'Rose', 'https://drive.google.com/uc?export=download&id=1jsDf6dd7mpRkAH9t-VC6Qm_hx1tHwUpn', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(7, 'Sài gòn đau lòng quá', 'Hứu Kim Tuyền', 'https://drive.google.com/uc?export=download&id=18_Kg9RHAwXIa_ybfjsHvR8mq38QQihd2', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(8, 'Vách ngọc ngà', 'Anh Rồng', 'https://drive.google.com/uc?export=download&id=16fc19MF3UvJZHL3z04OZjrkvnA8VaZhe', 'https://img.lovepik.com/element/40131/7988.png_860.png'),
(9, 'Cô đọc vương', 'Thiên Tú', 'https://drive.google.com/uc?export=download&id=1jfyIbv5lh58ou-c15dS6vFdvn-JoJIBY', 'https://img.lovepik.com/element/40131/7988.png_860.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihatyeuthich`
--

CREATE TABLE `baihatyeuthich` (
  `MaNguoiDung` int(10) NOT NULL,
  `MaBaiHat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaChucVu` int(10) NOT NULL,
  `TenChucVu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaChucVu`, `TenChucVu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_baihatalbum`
--

CREATE TABLE `ct_baihatalbum` (
  `MaAlbum` int(10) NOT NULL,
  `MaBaiHat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_baihatalbum`
--

INSERT INTO `ct_baihatalbum` (`MaAlbum`, `MaBaiHat`) VALUES
(1, 1),
(1, 2),
(1, 1),
(1, 1),
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_theloaibaihat`
--

CREATE TABLE `ct_theloaibaihat` (
  `MaBaiHat` int(11) NOT NULL,
  `MaTheLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_theloaibaihat`
--

INSERT INTO `ct_theloaibaihat` (`MaBaiHat`, `MaTheLoai`) VALUES
(1, 1),
(2, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(10) NOT NULL,
  `TenNguoiDung` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci DEFAULT NULL,
  `TaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'https://png.pngtree.com/png-clipart/20190920/original/pngtree-user-flat-character-avatar-png-png-image_4643588.jpg',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaChucVu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoiDung`, `TenNguoiDung`, `TaiKhoan`, `MatKhau`, `Avatar`, `email`, `MaChucVu`) VALUES
(1, 'Admin', 'linh', '1', 'https://png.pngtree.com/png-clipart/20190920/original/pngtree-user-flat-character-avatar-png-png-image_4643588.jpg', NULL, 1),
(2, 'Người Dùng 1', 'quang', '1', 'https://png.pngtree.com/png-clipart/20190920/original/pngtree-user-flat-character-avatar-png-png-image_4643588.jpg', NULL, 2),
(3, NULL, 'cam', '1', 'https://png.pngtree.com/png-clipart/20190920/original/pngtree-user-flat-character-avatar-png-png-image_4643588.jpg', 'cam@gm.com', 2),
(13, NULL, 'tuan', '1', 'https://png.pngtree.com/png-clipart/20190920/original/pngtree-user-flat-character-avatar-png-png-image_4643588.jpg', '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `MaTheLoai` int(10) NOT NULL,
  `TenTheLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`MaTheLoai`, `TenTheLoai`) VALUES
(1, 'Rap'),
(2, 'Ballad');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD UNIQUE KEY `MaAlbum` (`MaAlbum`);

--
-- Chỉ mục cho bảng `albumyeuthich`
--
ALTER TABLE `albumyeuthich`
  ADD KEY `FK_AByeuthich_ND` (`MaNguoiDung`),
  ADD KEY `FK_AByeuthich_AB` (`MaAlbum`);

--
-- Chỉ mục cho bảng `baihat`
--
ALTER TABLE `baihat`
  ADD UNIQUE KEY `MaBaiHat` (`MaBaiHat`);

--
-- Chỉ mục cho bảng `baihatyeuthich`
--
ALTER TABLE `baihatyeuthich`
  ADD KEY `FK_BHyeuthich_ND` (`MaNguoiDung`),
  ADD KEY `FK_BHyeuthic_BH` (`MaBaiHat`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD UNIQUE KEY `MaChucVu` (`MaChucVu`);

--
-- Chỉ mục cho bảng `ct_baihatalbum`
--
ALTER TABLE `ct_baihatalbum`
  ADD KEY `Fk_CT_Album_BaiHat` (`MaAlbum`);

--
-- Chỉ mục cho bảng `ct_theloaibaihat`
--
ALTER TABLE `ct_theloaibaihat`
  ADD KEY `FK_CTTheLoai_BaiHat` (`MaBaiHat`),
  ADD KEY `FK_CTTheLoai_TheLoai` (`MaTheLoai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD UNIQUE KEY `MaNguoiDung` (`MaNguoiDung`),
  ADD UNIQUE KEY `TaiKhoan` (`TaiKhoan`),
  ADD KEY `FK_ND_CV` (`MaChucVu`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD UNIQUE KEY `MaTheLoai` (`MaTheLoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `MaAlbum` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `baihat`
--
ALTER TABLE `baihat`
  MODIFY `MaBaiHat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `MaTheLoai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `albumyeuthich`
--
ALTER TABLE `albumyeuthich`
  ADD CONSTRAINT `FK_AByeuthich_AB` FOREIGN KEY (`MaAlbum`) REFERENCES `album` (`MaAlbum`),
  ADD CONSTRAINT `FK_AByeuthich_ND` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`);

--
-- Các ràng buộc cho bảng `baihatyeuthich`
--
ALTER TABLE `baihatyeuthich`
  ADD CONSTRAINT `FK_BHyeuthic_BH` FOREIGN KEY (`MaBaiHat`) REFERENCES `baihat` (`MaBaiHat`),
  ADD CONSTRAINT `FK_BHyeuthich_ND` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`);

--
-- Các ràng buộc cho bảng `ct_baihatalbum`
--
ALTER TABLE `ct_baihatalbum`
  ADD CONSTRAINT `FK_CTAlbum_Album` FOREIGN KEY (`MaAlbum`) REFERENCES `album` (`MaAlbum`),
  ADD CONSTRAINT `Fk_CT_Album_BaiHat` FOREIGN KEY (`MaAlbum`) REFERENCES `baihat` (`MaBaiHat`);

--
-- Các ràng buộc cho bảng `ct_theloaibaihat`
--
ALTER TABLE `ct_theloaibaihat`
  ADD CONSTRAINT `FK_CTTheLoai_BaiHat` FOREIGN KEY (`MaBaiHat`) REFERENCES `baihat` (`MaBaiHat`),
  ADD CONSTRAINT `FK_CTTheLoai_TheLoai` FOREIGN KEY (`MaTheLoai`) REFERENCES `theloai` (`MaTheLoai`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `FK_ND_CV` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
