-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 27, 2022 lúc 03:46 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manage_product`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `id_cate`, `img`) VALUES
(2, 'Bitis Hunter', 1, 'https://a.ipricegroup.com/media/Sneaker/Bitis/Giay_Bitis_Hunter_1.jpg'),
(3, 'logitech G102', 2, 'https://anphat.com.vn/media/product/33297_logitech_g102_lightsync.png'),
(4, 'Tủ lạnh toshiba', 3, 'https://cdn.mediamart.vn/images/product/-1acEuA.png'),
(5, 'Razer deathadder', 2, 'https://pcmarket.vn/media/product/8093_razer_da_elite.jpg'),
(13, 'bàn phím G905', 2, 'https://anphat.com.vn/media/product/27911_durgod_k320_space_gray__1_.png'),
(14, 'lò nướng', 3, 'http://cdn01.dienmaycholon.vn/filewebdmclnew/public/picture/experience/article_4292.jpg'),
(23, 'Dép tổ ông', 1, 'https://cf.shopee.vn/file/2727c633dc6d296510dee58d61ff5cd9'),
(24, 'Dép lào ', 1, 'https://cf.shopee.vn/file/7b7c33f4df2f77aab38af7b2cd3c3d01'),
(25, 'Mobitech', 2, 'https://catthanh.com/1_html/img/product_img/thum/1302860299_500x123.jpg'),
(26, 'Bàn phím cơ Akko', 2, 'https://hanoicomputercdn.com/media/product/51901_tong_the_ban_phim_co_akko_3108s_rgb_pro_pink_cherry_mx_brown_switch.jpg'),
(27, 'Ti vi Sony ', 3, 'https://cdn.mediamart.vn/images/product/smart-tivi-4k-sony-kd50x80j-55-inch-android-tv-AR7PwI.jpg'),
(28, 'Máy sưởi ', 3, 'https://kenh14cdn.com/203336854389633024/2021/1/6/a-16099287168311372358765.jpg'),
(29, 'Smart Quạt', 3, 'https://vcdn-sohoa.vnecdn.net/2019/12/04/Quat-Halogen-2928-1575431836.jpg'),
(30, 'Máy lạnh', 3, 'https://cdn.nguyenkimmall.com/images/thumbnails/600/336/detailed/640/10045075-may-lanh-daikin-1-hp-atf25uv1v-1.jpg'),
(33, 'Máy tính bàn ', 2, 'https://worklap.vn/picture/file/tin-tuc-tong-hop/may-tinh-ban.jpg'),
(35, 'Laptop ASUS TUF', 1, 'https://cdn.ankhang.vn/media/product/20275_laptop_asus_tuf_gaming_f17_fx706hc_hx009t_1.jpg'),
(38, 'Robot hút bụi', 3, 'https://antien.vn/uploaded/LIECTROUX-ZK901/Robot-hut-bui-lau-nha-Liectroux-ZK901-chinh-hang.jpg'),
(39, 'Quạt tản nhiệt laptop', 2, 'https://cdn.tgdd.vn/Files/2013/12/23/534419/3-dieu-can-quan-tam-khi-mua-de-tan-nhiet-1.jpg'),
(40, 'Quạt mini', 3, 'https://cf.shopee.vn/file/163554c9a7826bcf39b6f4e5d0a034f0'),
(41, 'Quạt trần', 3, 'https://kaiyokukan.vn/Data/ResizeImage/data/upload/images/product/oka_181/dong/i_quat_tran_kaiyo_oka_dongx768x768x4.png'),
(42, 'Tủ lạnh mini', 1, 'https://cdn01.dienmaycholon.vn/filewebdmclnew/public/picture/experience/article_1238.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `For_key_id_cate` (`id_cate`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `For_key_id_cate` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
