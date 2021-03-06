-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 05:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `id_transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_products`, `id_user`, `so_luong`, `tong_tien`, `created_at`, `updated_at`, `id_transaction`) VALUES
(30, 26, 17, 1, 1670000, '2022-02-09', '2022-02-09', 27),
(31, 35, 17, 1, 29000000, '2022-02-09', '2022-02-09', 27),
(43, 41, 38, 5, 16000000, '2022-02-21', '2022-02-21', 36),
(44, 42, 38, 5, 250000, '2022-02-21', '2022-02-21', 36),
(45, 28, 38, 17, 18700000, '2022-02-21', '2022-02-21', 37),
(51, 27, 18, 20, 24000000, '2022-02-23', '2022-02-23', 41),
(52, 43, 18, 3, 450000, '2022-02-23', '2022-02-23', 41),
(57, 29, 18, 3, 5400000, '2022-02-25', '2022-02-25', 44),
(58, 41, 18, 4, 12800000, '2022-02-25', '2022-02-25', 44);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(44, 'Danh m???c C??n', '2022-01-26', '2022-01-26'),
(52, 'Danh M???c M??o', '2022-02-03', '2022-02-03'),
(53, 'Danh M???c flms;kf;ldfs', '2022-02-04', '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `content` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_products`, `content`, `created_at`, `updated_at`, `id_user`) VALUES
(34, 43, 'vvsvsvsvsdv', '2022-02-13', '2022-02-13', 17),
(39, 41, 'c??m ??n m???i ng?????i ???? ???ng h??? shop', '2022-02-14', '2022-02-14', 18),
(40, 29, 'hello m???i ng?????i', '2022-02-14', '2022-02-14', 18),
(41, 41, 'ch?? ?????p l???m', '2022-02-21', '2022-02-21', 38),
(42, 39, 's???n ph???m r???t ?????p', '2022-02-21', '2022-02-21', 37),
(43, 41, 'hello c??c p', '2022-02-22', '2022-02-22', 17),
(45, 29, '?????p l???m nha', '2022-02-22', '2022-02-22', 17),
(48, 41, 's???n ph???m ch???t l?????ng', '2022-02-23', '2022-02-23', 18);

-- --------------------------------------------------------

--
-- Table structure for table `img_deltai`
--

CREATE TABLE `img_deltai` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_deltai`
--

INSERT INTO `img_deltai` (`id`, `id_products`, `image`, `created_at`, `updated_at`) VALUES
(7, 19, 'dog6.png', '2022-01-27', '2022-01-27'),
(8, 19, 'dog7.png', '2022-01-27', '2022-01-27'),
(9, 19, 'dog8.png', '2022-01-27', '2022-01-27'),
(19, 24, 'de4.jpg', '2022-02-04', '2022-02-04'),
(20, 25, 'de1.jpg', '2022-02-04', '2022-02-04'),
(21, 25, 'de2.jpg', '2022-02-04', '2022-02-04'),
(22, 25, 'de3.jpg', '2022-02-04', '2022-02-04'),
(23, 25, 'de4.jpg', '2022-02-04', '2022-02-04'),
(24, 26, 'cho2.jpg', '2022-02-04', '2022-02-04'),
(25, 26, 'de5.jpg', '2022-02-04', '2022-02-04'),
(26, 26, 'de6.jpg', '2022-02-04', '2022-02-04'),
(27, 26, 'de7.jpg', '2022-02-04', '2022-02-04'),
(28, 27, 'de8.jpg', '2022-02-04', '2022-02-04'),
(29, 27, 'de9.jpg', '2022-02-04', '2022-02-04'),
(30, 27, 'de10.jpg', '2022-02-04', '2022-02-04'),
(31, 27, 'de11.jpg', '2022-02-04', '2022-02-04'),
(32, 28, 'de12.jpg', '2022-02-04', '2022-02-04'),
(33, 28, 'de13.jpg', '2022-02-04', '2022-02-04'),
(34, 28, 'de14.jpg', '2022-02-04', '2022-02-04'),
(35, 28, 'de15jpg.jpg', '2022-02-04', '2022-02-04'),
(36, 29, 'de16.jpg', '2022-02-04', '2022-02-04'),
(37, 29, 'de17.jpg', '2022-02-04', '2022-02-04'),
(38, 29, 'de18.jpg', '2022-02-04', '2022-02-04'),
(39, 29, 'de19.jpg', '2022-02-04', '2022-02-04'),
(40, 30, '1-1-510x510 (1).png', '2022-02-04', '2022-02-04'),
(41, 30, '1-1-510x510.png', '2022-02-04', '2022-02-04'),
(42, 30, '3-1-510x510.png', '2022-02-04', '2022-02-04'),
(43, 30, '6-1-510x510.png', '2022-02-04', '2022-02-04'),
(44, 31, 'Long-van-chuyen-hang-khong-italia.jpg', '2022-02-04', '2022-02-04'),
(45, 31, 'tui-mang-ho-dau.jpg', '2022-02-04', '2022-02-04'),
(46, 31, 'tui-mang-thu-cung-.jpg', '2022-02-04', '2022-02-04'),
(47, 31, 'tui-xach-nho-nylon-510x510.jpg', '2022-02-04', '2022-02-04'),
(48, 32, 'o-nem-trong-suot-cho-meo-3-510x510.jpg', '2022-02-04', '2022-02-04'),
(49, 32, 'o-nem-trong-suot-cho-meo-7-510x510.jpg', '2022-02-04', '2022-02-04'),
(50, 32, 'o-nem-trong-suot-cho-meo-9-510x510.jpg', '2022-02-04', '2022-02-04'),
(51, 32, 'o-nem-trong-suot-cho-meo-11-510x510.jpg', '2022-02-04', '2022-02-04'),
(52, 32, 'o-nem-trong-suot-cho-meo-12-510x510.jpg', '2022-02-04', '2022-02-04'),
(53, 33, 'tui-deo-cheo-1-510x510.jpg', '2022-02-04', '2022-02-04'),
(54, 33, 'tui-deo-cheo-2-510x510.png', '2022-02-04', '2022-02-04'),
(55, 33, 'tui-deo-cheo-510x510.jpg', '2022-02-04', '2022-02-04'),
(56, 34, 'dau-thom-khu-mui-va-mem-long-forcans-1-510x510.jpg', '2022-02-04', '2022-02-04'),
(57, 34, 'dau-thom-khu-mui-va-mem-long-forcans-2-510x510.jpg', '2022-02-04', '2022-02-04'),
(58, 34, 'dau-thom-khu-mui-va-mem-long-forcans-3-510x510.jpg', '2022-02-04', '2022-02-04'),
(59, 34, 'dau-thom-khu-mui-va-mem-long-forcans-6-510x510.jpg', '2022-02-04', '2022-02-04'),
(60, 35, 'meo-anh-long-ngan-nhap-khau-1.jpg', '2022-02-04', '2022-02-04'),
(61, 35, 'meo-anh-long-ngan-nhap-khau-3.jpg', '2022-02-04', '2022-02-04'),
(62, 35, 'meo-anh-long-ngan-nhap-khau-9.jpg', '2022-02-04', '2022-02-04'),
(63, 35, 'meo-anh-long-ngan-nhap-khau-22-510x340.jpg', '2022-02-04', '2022-02-04'),
(64, 36, 'meo-chan-ngan-tai-cup-silver-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(65, 36, 'meo-chan-ngan-tai-cup-silver-2-510x340.jpg', '2022-02-04', '2022-02-04'),
(66, 36, 'meo-chan-ngan-tai-cup-silver-3-510x340.jpg', '2022-02-04', '2022-02-04'),
(67, 36, 'meo-chan-ngan-tai-cup-silver-4-510x340.jpg', '2022-02-04', '2022-02-04'),
(68, 37, 'avarta-1-510x510.jpg', '2022-02-04', '2022-02-04'),
(69, 37, 'meo-silver-nhap-khau-nga-4-th-1-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(70, 37, 'meo-silver-nhap-khau-nga-4-th-2-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(71, 37, 'meo-silver-nhap-khau-nga-4-th-3-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(72, 38, 'meo-munchkin-bicolor-4-thang-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(73, 38, 'meo-munchkin-bicolor-4-thang-3-510x340.jpg', '2022-02-04', '2022-02-04'),
(74, 38, 'meo-munchkin-bicolor-4-thang-5-510x340.jpg', '2022-02-04', '2022-02-04'),
(75, 38, 'meo-munchkin-bicolor-4-thang-7-510x340.jpg', '2022-02-04', '2022-02-04'),
(76, 38, 'meo-munchkin-bicolor-4-thang-10-510x340.jpg', '2022-02-04', '2022-02-04'),
(77, 39, 'ald-den-moob-1-n??m-tuoi-logo-510x510.jpg', '2022-02-04', '2022-02-04'),
(78, 39, 'meo-anh-long-dai-mau-den-1-nam-tuoi-2-1-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(79, 39, 'meo-anh-long-dai-mau-den-1-nam-tuoi-4-1-1-510x340.jpg', '2022-02-04', '2022-02-04'),
(80, 39, 'meo-anh-long-dai-mau-den-1-nam-tuoi-4-2-510x340.jpg', '2022-02-04', '2022-02-04'),
(81, 40, 'meo-munchkin-bicolor-4-thang-1-510x340.jpg', '2022-02-07', '2022-02-07'),
(82, 40, 'meo-munchkin-bicolor-4-thang-3-510x340.jpg', '2022-02-07', '2022-02-07'),
(83, 40, 'meo-munchkin-bicolor-4-thang-5-510x340.jpg', '2022-02-07', '2022-02-07'),
(84, 40, 'meo-munchkin-bicolor-4-thang-7-510x340.jpg', '2022-02-07', '2022-02-07'),
(85, 40, 'meo-munchkin-bicolor-4-thang-10-510x340.jpg', '2022-02-07', '2022-02-07'),
(86, 41, 'de1.jpg', '2022-02-07', '2022-02-07'),
(87, 41, 'de2.jpg', '2022-02-07', '2022-02-07'),
(88, 41, 'de3.jpg', '2022-02-07', '2022-02-07'),
(89, 41, 'de4.jpg', '2022-02-07', '2022-02-07'),
(90, 42, 'dau-thom-khu-mui-va-mem-long-forcans-1-510x510.jpg', '2022-02-07', '2022-02-07'),
(91, 42, 'dau-thom-khu-mui-va-mem-long-forcans-2-510x510.jpg', '2022-02-07', '2022-02-07'),
(92, 42, 'dau-thom-khu-mui-va-mem-long-forcans-3-510x510.jpg', '2022-02-07', '2022-02-07'),
(93, 42, 'dau-thom-khu-mui-va-mem-long-forcans-6-510x510.jpg', '2022-02-07', '2022-02-07'),
(94, 43, 'tui-deo-cheo-1-510x510.jpg', '2022-02-07', '2022-02-07'),
(95, 43, 'tui-deo-cheo-2-510x510.png', '2022-02-07', '2022-02-07'),
(96, 43, 'tui-deo-cheo-510x510.jpg', '2022-02-07', '2022-02-07'),
(97, 43, 'tui-mang-ho-dau.jpg', '2022-02-07', '2022-02-07'),
(98, 43, 'tui-mang-thu-cung-.jpg', '2022-02-07', '2022-02-07'),
(99, 43, 'tui-xach-nho-nylon-510x510.jpg', '2022-02-07', '2022-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `loveproduct`
--

CREATE TABLE `loveproduct` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `so_tim` int(11) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loveproduct`
--

INSERT INTO `loveproduct` (`id`, `id_user`, `id_products`, `so_tim`, `created_at`, `updated_at`) VALUES
(145, 16, 36, 1, '2022-02-11', '2022-02-11'),
(159, 18, 29, 1, '2022-02-13', '2022-02-13'),
(161, 18, 42, 1, '2022-02-13', '2022-02-13'),
(162, 18, 43, 1, '2022-02-13', '2022-02-13'),
(163, 18, 37, 1, '2022-02-13', '2022-02-13'),
(167, 17, 28, 1, '2022-02-22', '2022-02-22'),
(169, 17, 27, 1, '2022-02-22', '2022-02-22'),
(173, 18, 41, 1, '2022-02-23', '2022-02-23'),
(174, 18, 35, 1, '2022-02-23', '2022-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `img_poster` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `img_content` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `content_one` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content_two` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img_content_two` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `img_poster`, `title`, `img_content`, `content_one`, `content_two`, `img_content_two`, `created_at`, `updated_at`) VALUES
(6, 'rotti-600x338.jpg', '[Chia s???] 4 l?? do b???n n??n s??? h???u ngay m???t ch?? ch?? Rottweiler!', 'hinh-anh-cho-Rottweiler-12-600x600.jpg', '<p>B???n ??ang mu???n nu??i m???t ch?? ch?? ?????p, trung th??nh, d??? ch??m v?? c?? s???c kh???e t???t. B???n ??i h???i m???i ng?????i v?? nh???n ???????c c??u tr??? l???i r???ng ???V???y th?? ch?? Rottweiler l?? m???t s??? l???a ch???n h???p l?? ?????y!???. Nh??ng b???n v???n c??n r???t b??n kho??n v?? nhi???u l?? do kh??c nhau. Trong b??i vi???t d?????i ????y, Dogily Petshop s??? gi??p b???n gi???i ????p t???t c??? nh???ng b??n kho??n ???y, ????? b???n ch???c ch???n h??n v??? quy???t ?????nh c?? n??n ???rinh??? ngay m???t b???n ch?? Rottweiler v??? nh?? hay kh??ng!&nbsp;</p>', '<p style=\"margin-bottom: 6px;\">Gi???ng nh?? anh h??ng Hy L???p Hercules trong th???n tho???i, Rottweiler m???nh m??? v?? ch??n th???t v???i m???t tr??i tim nh??n ??i. Th?????ng ???????c g???i m???t c??ch tr??u m???n l?? Roti ho???c R???t, gi???ng ch?? n??y c?? ngu???n g???c t??? ?????c, n??i n?? ???????c s??? d???ng ????? l??a gia s??c v?? k??o xe cho n??ng d??n v?? ng?????i b??n th???t. L???ch s??? ???? ???????c ph???n ??nh qua khu??n ng???c r???ng v?? c?? th??? r???n ch???n c???a Rottweiler. Khi di chuy???n, Rottweiler th??? hi???n s???c m???nh v?? kh??? n??ng ch???u ?????ng phi th?????ng, nh??ng khi b???n nh??n v??o m???t nh???ng ch?? ch?? Rottweiler, b???n s??? th???y nh???ng h??? n?????c ???m, m??u n??u s???m ??em l???i m???t c???m gi??c ??m d???u, th??ng minh, lanh l???i v?? kh??ng s??? h??i.</p><p style=\"margin-bottom: 6px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);\">&nbsp;</p>', 'cho-golden-golden-dogily-petshop-4-510x383-1.jpg', '2022-02-22', '2022-02-22'),
(7, 'giong-cho-tongao-tay-tang-600x400.jpg', 'Top 10 gi???ng ch?? to b???o v??? cho ng??i nh?? c???a b???n', 'giong-cho-to-great-dane.jpg', '<p style=\"margin-bottom: 6px;\">Top 10 gi???ng ch?? to nh???t th??? gi???i s??? l?? b??i vi???t ti???p theo m?? Dogily mu???n g???i ?????n c??c b???n sau top 10&nbsp;<a href=\"https://dogily.vn/cho-canh/giong-cho-nho/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">gi???ng ch?? nh???</a>&nbsp;xinh. ????y kh??ng ch??? l?? ng?????i b???n trung th??nh c???a con ng?????i m?? c??n c?? th??? gi??? nh??, c???u h??? hay s??n th??.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Gi???ng ch?? to Great Dane</h2><p style=\"margin-bottom: 6px;\">V???i c??n n???ng t???m 45 ??? 54kg,&nbsp;<a href=\"https://dogily.vn/cho-canh/great-dane/\" style=\"touch-action: manipulation;\">Great Dane</a>&nbsp;kh??ng ph???i l?? gi???ng ch?? to nh???t th??? gi???i. Tuy nhi??n ch??ng l???i n???m gi??? k??? l???c th??? gi???i v??? chi???u cao c???a lo??i c??n. M???t ch?? Great Dane tr?????ng th??nh cao t???m 71 ??? 76cm n???u ?????ng th???ng. R???t nhi???u con c??n v?????t xa chi???u cao trung b??nh n??y.</p>', '<p style=\"margin-bottom: 6px;\">Th???m ch?? c?? tr?????ng h???p h???p c?? bi???t cao t???i t???n 1.12m. ???? l?? Zeus, ch?? ch?? ??ang gi??? k??? l???c v??? h???ng m???c n??y. B?? l???i, gi???ng ch?? to Great Dane l???i kh??ng s??? h???u tu???i th??? l??u d??i. Th??ng th?????ng ch??ng ch??? s???ng ?????n t???m 6 ??? 8 tu???i, c?? nh??n Zeus c??ng ???? l??a tr???n khi m???i ??n sinh nh???t l???n th??? 5.</p><p style=\"margin-bottom: 6px;\">Gi???ng ch?? to n??y c?? ngu???n g???c t??? n?????c ?????c. T??? ti??n c???a ch??ng ???????c cho l?? s???n ph???m lai t???o gi???a ch?? English Mastiff v?? Irish Wolfhound.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Gi???ng ch?? to Neapolitan Mastiff (Ngao ??)</h2><p style=\"margin-bottom: 6px;\"><a href=\"https://dogily.vn/cho-canh/neapolitan-mastiff/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">Neapolitan Mastiff</a>&nbsp;c?? kh???i ngu???n t??? mi???n nam Italia. V?? thu???c gi???ng ch?? ngao n??n kh??ng c?? g?? kh?? hi???u khi Neapolitan Mastiff c??ng n???m trong danh s??ch c??c gi???ng ch?? to c?? th??n h??nh ????? s??? nh???t.</p>', 'giong-cho-to-Neapolitan-Mastiff.jpg', '2022-02-22', '2022-02-22'),
(8, 'cua-hang-cho-canh-dogilypetshop.jpg', 'Top 8 c???a h??ng b??n ch?? c???nh uy t??n nh???t t???i H?? N???i', 'cua-hang-ban-cho-canh-uy-tin-ha-noi-tung-loc-pet.jpg', '<p style=\"margin-bottom: 6px;\">???Ng?????i y??u c?? th??? kh??ng c??, nh??ng ch?? ph???i c?? m???t con.??? B???n n??o ??ang ??? H?? th??nh m?? mu???n t??m Boss v??? b???u b???n th?? tham kh???o qua danh s??ch c??c c???a h??ng b??n&nbsp;<a href=\"https://dogily.vn/cho-canh/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">ch?? c???nh</a>&nbsp;uy t??n n??y nh??.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Dogily Petshop ??? C???a h??ng b??n ch?? c???nh uy t??n t???i H?? N???i</h2><p style=\"margin-bottom: 6px;\"><a href=\"https://dogily.vn/\" style=\"touch-action: manipulation;\">Dogily Petshop</a>&nbsp;l?? th????ng hi???u chuy??n nh???p kh???u ch?? c???nh uy t??n t??? ch??u ??u v???, ?????ng th???i ??i ?????u trong vi???c x??y d???ng h??? th???ng trang tr???i t??? ch??? nh??n gi???ng t???i Vi???t Nam. Qua nhi???u n??m ho???t ?????ng, Dogily ???? h??nh th??nh n??n m???i quan h??? h???p t??c m???t thi???t v???i c??c tr???i ch?? ????ng tin c???y kh???p tr???i ??u, Nh???t B???n hay Th??i Lan.</p>', '<p><span style=\"text-align: justify;\">Sau khi t??m th???y ngu???n gen qu??, c??c ch?? ch?? b???, ch?? m??? n??y s??? ???????c ????a v??? trang tr???i Dogily Kennel. T???i ????y, t???t c??? c??c b?? ?????u ???????c h?????ng ch??? ????? dinh d?????ng, ch??m s??c v?? ti???n h??nh nh??n gi???ng theo m?? h??nh chu???n ch??u ??u. B???n th??n nh?? s??ng l???p v?? ?????i ng?? nh??n vi??n c???a c???a h??ng b??n ch?? c???nh Dogily c??ng l?? ng?????i y??u qu?? th?? c??ng. H??? ho???t ?????ng v???i s??? m???nh ????a nh???ng ch?? c??n kh???e ?????p, t??nh c???m, trung th??nh ?????n l??m b???n v???i ai c?? nhu c???u.</span></p>', 'cua-hang-ban-cho-canh-uy-tin-ha-noi-azpet-shop.jpg', '2022-02-22', '2022-02-22'),
(9, 'meo-van-tho-nhi-ky- (1).jpg', 'Top 10 gi???ng m??o th??ng minh nh???t h??nh tinh', 'meo-long-ngan-abyssinian-.jpg', '<p style=\"margin-bottom: 6px;\"><a href=\"https://dogily.vn/meo-canh/\" style=\"touch-action: manipulation;\">M??o</a>&nbsp;kh??ng d??? hu???n luy???n nh?? ch??. M??o c??ng kh??ng ?????m nh???n vai tr?? truy t??m t???i ph???m, ph??t hi???n ch???t c???m nh?? ch?? c?? th??? l??m. Nh??ng theo nhi???u k???t qu??? kh???o s??t, th???c t??? ch??? s??? th??ng minh c???a lo??i m??o l???i cao h??n c??? c??n. M???i c??c b???n c??ng&nbsp;<a href=\"https://dogily.vn/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">Dogily</a>&nbsp;??i???m danh&nbsp;top 10 gi???ng m??o th??ng minh nh???t&nbsp;nh??.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">M??o th??ng minh Abyssinian&nbsp;l??ng ng???n</h2><p style=\"margin-bottom: 6px;\">Gi??? v??? tr?? qu??n qu??n trong top 10 gi???ng m??o th??ng minh nh???t h??nh tinh l?? Abyssinian</p>', '<p><span style=\"text-align: justify;\">M??o Abyssinian ???????c c??ng nh???n l?? lo??i ?????ng v???t ?????c bi???t th??ng minh. Ch??ng r???t g???n g??i v???i con ng?????i v?? hay ch??i ????a c??ng ch???, th???m ch?? c??n ????????c??? ???????c c??? suy ngh?? c???a ch??? nh??n m??nh.&nbsp;Lo??i m??o n??y n???i ti???ng v??? m???c ????? th??ng minh ?????n m???c t???ng ???????c nh???c ?????n trong b??? phim ho???t h??nh ???Gia ????nh Simpson??? v???i kh??? n??ng ?????i k??nh Tivi.</span></p>', 'meo-van-tho-nhi-ky- (1).jpg', '2022-02-22', '2022-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_product` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) DEFAULT 0,
  `intro` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `img_produc` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `so_luong` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `price`, `sale`, `intro`, `img_produc`, `created_at`, `updated_at`, `so_luong`, `category_id`) VALUES
(26, 'French Bulldog B?? s???a', 2000000, 1670000, '<p style=\"margin-bottom: 8px;\">?????? Gi???ng: ch?? Bull Ph??p (French Bulldog, Bull dog Ph??p)</p><p style=\"margin-bottom: 8px;\">?????? M??u s???c: b?? s???a.</p><p style=\"margin-bottom: 8px;\">?????? Gi???i t??nh: c??i.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 02 th??ng.</p>', 'cho2.jpg', '2022-02-04', '2022-02-09', 19, 44),
(27, 'Poodle Tiny m??u n??u ?????', 1300000, 1200000, '<p style=\"margin-bottom: 8px;\">?????? Gi???ng: ch?? Poodle Tiny.</p><p style=\"margin-bottom: 8px;\">?????? M??u s???c: n??u ?????.</p><p style=\"margin-bottom: 8px;\">?????? Gi???i t??nh: ?????c, c??i.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 02 th??ng.</p>', 'de8.jpg', '2022-02-04', '2022-02-25', 1, 44),
(28, 'Chow Chow v??ng', 1200000, 1100000, '<p style=\"margin-bottom: 8px;\">?????? Gi???ng: ch?? Chow chow.</p><p style=\"margin-bottom: 8px;\">?????? M??u s???c: v??ng.</p><p style=\"margin-bottom: 8px;\">?????? Gi???i t??nh: ?????c.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 02 th??ng.</p>', 'de12.jpg', '2022-02-04', '2022-02-21', 0, 44),
(29, 'Pug m???t x??? v??ng', 2000000, 1800000, '<p style=\"margin-bottom: 8px;\">?????? Gi???ng: ch?? Pug.</p><p style=\"margin-bottom: 8px;\">?????? M??u s???c: v??ng.</p><p style=\"margin-bottom: 8px;\">?????? Gi???i t??nh: ?????c.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 02 th??ng.</p>', 'de16.jpg', '2022-02-04', '2022-02-25', 16, 44),
(30, 'H???t Royal Canin Kitten Brishtish', 200000, 80000, '<p style=\"margin-bottom: 8px;\">Th??ng tin s???n ph???m:</p><p style=\"margin-bottom: 8px;\">Xu???t x???: Ph??p</p><p style=\"margin-bottom: 8px;\">Th????ng hi???u:&nbsp;Royal Canin ??? th????ng hi???u n???i ti???ng tr??n</p><p style=\"margin-bottom: 8px;\"> to??n c???u v??? vi????c cung c????p dinh d?????ng s???c kh???e v???t nu??i.</p><p style=\"margin-bottom: 8px;\"><font color=\"#0a0a0a\" face=\"Roboto, sans-serif\"><span style=\"font-size: 14px; background-color: rgb(255, 255, 255);\">Kh???i l?????ng:&nbsp;2kg</span></font></p>\"', '3-1-510x510 - Copy.png', '2022-02-04', '2022-02-04', 22, 53),
(31, 'Balo phi h??nh gia size nh???', 70000, NULL, '<p class=\"giatk\" style=\"margin-bottom: 8px;\">V???i thi???t k??? ?????t bi???t th???i trang v?? ?????p m???t nh??ng </p><p class=\"giatk\" style=\"margin-bottom: 8px;\">kh??ng k??m ph???n tho???i m??i cho c??c b?? .</p><p class=\"giatk\" style=\"margin-bottom: 8px;\"> M???t tr?????c ???????c l??m t??? nh???a c???ng </p><p class=\"giatk\" style=\"margin-bottom: 8px;\">b??ng v???i nhi???u h??nh ???nh ?????p l???.</p><p style=\"margin-bottom: 8px;\"><br></p><div><br></div>\"', 'Long-van-chuyen-hang-khong-italia.jpg', '2022-02-04', '2022-02-04', 28, 53),
(32, 'T??i th??i cho ch?? m??o size nh???', 59000, 50000, '<p><span style=\"text-align: justify;\">T??i th??i cho ch?? m??o size l???n ????????c la??m t???? ch???t li???u t???t,</span></p><p><span style=\"text-align: justify;\"> b???n, ?????p va?? ch???c ch???n. </span></p><p><span style=\"text-align: justify;\">Co?? nhi????u m??u s???c ??a nh??n cho ba??n cho??n l????a.</span></p>\"', 'o-nem-trong-suot-cho-meo-11-510x510.jpg', '2022-02-04', '2022-02-14', 30, 53),
(35, 'Anh L??ng Ng???n X??m Xanh', 30000000, 29000000, '<p style=\"margin-bottom: 8px;\">??????&nbsp;Gi???ng: m??o Anh l??ng ng???n (British Shorthair, Aln).</p><p style=\"margin-bottom: 8px;\">??????&nbsp;M??u s???c: x??m xanh.</p><p style=\"margin-bottom: 8px;\">??????&nbsp;Gi???i t??nh:&nbsp;?????c.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 10 th??ng.</p><p style=\"margin-bottom: 8px;\">?????? Ngu???n g???c: nh???p kh???u ch??u ??u (li??n bang Nga).</p>', 'meo-anh-long-ngan-nhap-khau-9.jpg', '2022-02-04', '2022-02-22', 39, 52),
(36, 'Munchkin Silver tai c???p', 2500000, NULL, '<p style=\"margin-bottom: 8px;\">??????&nbsp;Gi???ng:&nbsp;m??o Munchkin.</p><p style=\"margin-bottom: 8px;\">??????&nbsp;M??u s???c:&nbsp;Silver.</p><p style=\"margin-bottom: 8px;\">??????&nbsp;Gi???i t??nh:&nbsp;?????c.</p><p style=\"margin-bottom: 8px;\">??????&nbsp;Tu???i:&nbsp;2 th??ng.</p>', 'meo-chan-ngan-tai-cup-silver-1-510x340.jpg', '2022-02-04', '2022-02-09', 10, 52),
(37, 'M??o Anh l??ng d??i nh???p kh???u', 4000000, 3600000, '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Gi???ng:&nbsp;m??o British Longhair (m??o Anh l??ng d??i, Ald)</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">M??u s???c:&nbsp;silver</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Gi???i t??nh:&nbsp;c??i</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Tu???i:&nbsp;8 th??ng.</li></ul>', 'meo-silver-nhap-khau-nga-4-th-1-1-510x340.jpg', '2022-02-04', '2022-02-06', 14, 52),
(39, 'M??o Anh l??ng d??i ??en', 500000, 470000, '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Gi???ng:&nbsp;m??o British Longhair (m??o Anh l??ng d??i, Ald)</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">M??u s???c:&nbsp;??en</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Gi???i t??nh:&nbsp;?????c</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Tu???i:&nbsp;10 th??ng.</li></ul>', 'ald-den-moob-1-n??m-tuoi-logo-510x510.jpg', '2022-02-04', '2022-02-22', 4, 52),
(40, 'Munchkin Bicolor', 2000000, NULL, '<p style=\"margin-bottom: 8px;\">??????&nbsp;Gi???ng:&nbsp;m??o Munchkin.</p><p style=\"margin-bottom: 8px;\">??????&nbsp;M??u s???c: Bicolor.</p><p style=\"margin-bottom: 8px;\">??????&nbsp;Gi???i t??nh:&nbsp;?????c.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 4 th??ng.</p>', 'meo-munchkin-bicolor-4-thang-1-510x340.jpg', '2022-02-07', '2022-02-15', 30, 52),
(41, 'ch?? Poodle Tiny tai b?????m.', 3400000, 3200000, '<p style=\"margin-bottom: 8px;\">?????? Gi???ng: ch?? Poodle Tiny tai b?????m.</p><p style=\"margin-bottom: 8px;\">?????? M??u s???c: kem tr???ng.</p><p style=\"margin-bottom: 8px;\">?????? Gi???i t??nh: ?????c, c??i.</p><p style=\"margin-bottom: 8px;\">?????? Tu???i: 02 th??ng.</p>', 'de1.jpg', '2022-02-07', '2022-02-25', 11, 44),
(42, 'D???u Th??m kh??? m??i v?? m???m l??ng Forcans', 54000, 50000, '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Gi??p l??ng m?????t m?? v?? th??m m??t sau khi t???m.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Gi??p l??ng d??? ch???i v?? ?????c bi???t ch???ng r???ng l??ng, l??m cho l??ng ng??y c??ng d??y h??n.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Tinh ch???t Aloe Vera l??m cho h????ng th??m l??u l???i l??u h??n, l??ng m?????t m?? h??n.</li></ul>', 'dau-thom-khu-mui-va-mem-long-forcans-1-510x510.jpg', '2022-02-07', '2022-02-23', 29, 53),
(43, 'T??i th??i cho ch?? m??o size nh???', 150000, NULL, '<p><span style=\"text-align: justify;\">T??i ??eo che??o cho ch?? m??o da??nh cho ch?? m??o</span></p><p><span style=\"text-align: justify;\"> ????????c la??m t???? ch???t li???u t???t, b???n, ?????p va?? ch???c ch???n.</span></p><p><span style=\"text-align: justify;\"> Co?? nhi????u m??u s???c ??a nh??n cho ba??n cho??n l????a.</span></p>', 'tui-deo-cheo-1-510x510.jpg', '2022-02-07', '2022-02-23', 44, 53);

-- --------------------------------------------------------

--
-- Table structure for table `repcomment`
--

CREATE TABLE `repcomment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `repContent` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repcomment`
--

INSERT INTO `repcomment` (`id`, `id_user`, `id_comment`, `created_at`, `updated_at`, `repContent`) VALUES
(39, 17, 31, '2022-02-13', '2022-02-13', 'bsdsbvdsvfsv'),
(53, 18, 36, '2022-02-14', '2022-02-14', 'c??m ??n b???n'),
(55, 38, 39, '2022-02-21', '2022-02-21', 'hello shop'),
(57, 17, 40, '2022-02-22', '2022-02-22', 'c??m ??n b???n'),
(59, 18, 41, '2022-02-22', '2022-02-22', 'c??m ??n b???n'),
(63, 18, 43, '2022-02-23', '2022-02-23', 'c??m ??n b???n'),
(66, 18, 40, '2022-02-24', '2022-02-24', 'c??m ??n b???n'),
(67, 18, 42, '2022-02-24', '2022-02-24', 'c??m ??n b???n'),
(69, 18, 41, '2022-02-25', '2022-02-25', 'c??m ??n b???n');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Users'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `provider_user_id` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_address` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `user_email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `trang_thai` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `id_user`, `user_name`, `user_phone`, `user_address`, `tong_tien`, `user_email`, `noidung`, `created_at`, `updated_at`, `trang_thai`) VALUES
(27, 17, 'Ho??ng nguy???n', 348048435, 'Y??n Ki???n-H?? N???i', 30670000, 'binhnguyen@gmail.com', 'Ghi Ch??...', '2022-02-09', '2022-02-14', 3),
(36, 38, '?????c B??nh', 348048435, 'Y??n Ki???n-H?? N???i', 16250000, 'tinnguyen@gmail.com', 'Ghi Ch??...', '2022-02-21', '2022-02-22', 2),
(37, 38, '?????c B??nh', 348048435, 'Y??n Ki???n-H?? N???i', 18700000, 'tinnguyen@gmail.com', 'Ghi Ch??...', '2022-02-21', '2022-02-25', 2),
(41, 18, 'admin', 348048435, 'Y??n Ki???n-H?? N???i', 24450000, 'binhpoly@gmail.com', 'Ghi Ch??...', '2022-02-23', '2022-02-23', 2),
(44, 18, 'admin', 348048435, 'Y??n Ki???n-H?? N???i', 18200000, 'binhpoly@gmail.com', 'Ghi Ch??...', '2022-02-25', '2022-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` int(15) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `id_role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `img`, `matkhau`, `address`, `sdt`, `created_at`, `updated_at`, `id_role`) VALUES
(17, 'Ho??ng nguy???n', 'binhnguyen@gmail.com', 'photos-meandnature15.jpg', '$2y$10$D4ZpWmzIg2O7RQgKJRIw..BM0HJS2dyyya.L5F2BWKCsys8djQB6y', 'Y??n Ki???n-H?? N???i', 348048435, '2022-02-05', '2022-02-05', 1),
(18, 'admin', 'binhpoly@gmail.com', 'photos-livelikeaflower6.jpg', '$2y$10$Qr1HvV3Lw84VLI64Wy8HfemTOygr3gnjSAY0.VQhj3E3P9HxaPGI6', 'Y??n Ki???n-H?? N???i', 348048435, '2022-02-08', '2022-02-08', 2),
(37, 'Nguy???n ?????c B??nh', 'ducbinhdzvcl@gmail.com', 'python.jpg', '$2y$10$nn26fGdUpcMK59wBfhp3p.bZMZfgDBljQuFXrXwpHzAn5pCt9Sxsa', 'Y??n Ki???n-H?? N???i', 348048435, '2022-02-18', '2022-02-18', 1),
(38, '?????c B??nh', 'tinnguyen@gmail.com', 'qa.jpg', '$2y$10$c/rQ7QaxHGYztYJquJf7aeC8YPHNVCwjvRmqdM1N.fg.ApxeF5A9e', 'Y??n Ki???n-H?? N???i', 348048435, '2022-02-18', '2022-02-18', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_deltai`
--
ALTER TABLE `img_deltai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loveproduct`
--
ALTER TABLE `loveproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repcomment`
--
ALTER TABLE `repcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `img_deltai`
--
ALTER TABLE `img_deltai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `loveproduct`
--
ALTER TABLE `loveproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `repcomment`
--
ALTER TABLE `repcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `social_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
