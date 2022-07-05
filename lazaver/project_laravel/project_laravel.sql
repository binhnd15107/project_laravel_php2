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
(44, 'Danh mục Cún', '2022-01-26', '2022-01-26'),
(52, 'Danh Mục Mèo', '2022-02-03', '2022-02-03'),
(53, 'Danh Mục flms;kf;ldfs', '2022-02-04', '2022-02-25');

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
(39, 41, 'cám ơn mọi người đã ủng hộ shop', '2022-02-14', '2022-02-14', 18),
(40, 29, 'hello mọi người', '2022-02-14', '2022-02-14', 18),
(41, 41, 'chó đẹp lắm', '2022-02-21', '2022-02-21', 38),
(42, 39, 'sản phẩm rất đẹp', '2022-02-21', '2022-02-21', 37),
(43, 41, 'hello các p', '2022-02-22', '2022-02-22', 17),
(45, 29, 'đẹp lắm nha', '2022-02-22', '2022-02-22', 17),
(48, 41, 'sản phẩm chất lượng', '2022-02-23', '2022-02-23', 18);

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
(77, 39, 'ald-den-moob-1-năm-tuoi-logo-510x510.jpg', '2022-02-04', '2022-02-04'),
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
(6, 'rotti-600x338.jpg', '[Chia sẻ] 4 lý do bạn nên sở hữu ngay một chú chó Rottweiler!', 'hinh-anh-cho-Rottweiler-12-600x600.jpg', '<p>Bạn đang muốn nuôi một chú chó đẹp, trung thành, dễ chăm và có sức khỏe tốt. Bạn đi hỏi mọi người và nhận được câu trả lời rằng “Vậy thì chó Rottweiler là một sự lựa chọn hợp lý đấy!”. Nhưng bạn vẫn còn rất băn khoăn vì nhiều lý do khác nhau. Trong bài viết dưới đây, Dogily Petshop sẽ giúp bạn giải đáp tất cả những băn khoăn ấy, để bạn chắc chắn hơn về quyết định có nên “rinh” ngay một bạn chó Rottweiler về nhà hay không!&nbsp;</p>', '<p style=\"margin-bottom: 6px;\">Giống như anh hùng Hy Lạp Hercules trong thần thoại, Rottweiler mạnh mẽ và chân thật với một trái tim nhân ái. Thường được gọi một cách trìu mến là Roti hoặc Rốt, giống chó này có nguồn gốc từ Đức, nơi nó được sử dụng để lùa gia súc và kéo xe cho nông dân và người bán thịt. Lịch sử đó được phản ánh qua khuôn ngực rộng và cơ thể rắn chắn của Rottweiler. Khi di chuyển, Rottweiler thể hiện sức mạnh và khả năng chịu đựng phi thường, nhưng khi bạn nhìn vào mắt những chú chó Rottweiler, bạn sẽ thấy những hồ nước ấm, màu nâu sẫm đem lại một cảm giác êm dịu, thông minh, lanh lợi và không sợ hãi.</p><p style=\"margin-bottom: 6px; color: rgb(10, 10, 10); font-family: Roboto, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);\">&nbsp;</p>', 'cho-golden-golden-dogily-petshop-4-510x383-1.jpg', '2022-02-22', '2022-02-22'),
(7, 'giong-cho-tongao-tay-tang-600x400.jpg', 'Top 10 giống chó to bảo vệ cho ngôi nhà của bạn', 'giong-cho-to-great-dane.jpg', '<p style=\"margin-bottom: 6px;\">Top 10 giống chó to nhất thế giới sẽ là bài viết tiếp theo mà Dogily muốn gởi đến các bạn sau top 10&nbsp;<a href=\"https://dogily.vn/cho-canh/giong-cho-nho/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">giống chó nhỏ</a>&nbsp;xinh. Đây không chỉ là người bạn trung thành của con người mà còn có thể giữ nhà, cứu hộ hay săn thú.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Giống chó to Great Dane</h2><p style=\"margin-bottom: 6px;\">Với cân nặng tầm 45 – 54kg,&nbsp;<a href=\"https://dogily.vn/cho-canh/great-dane/\" style=\"touch-action: manipulation;\">Great Dane</a>&nbsp;không phải là giống chó to nhất thế giới. Tuy nhiên chúng lại nắm giữ kỷ lục thế giới về chiều cao của loài cún. Một chú Great Dane trưởng thành cao tầm 71 – 76cm nếu đứng thẳng. Rất nhiều con còn vượt xa chiều cao trung bình này.</p>', '<p style=\"margin-bottom: 6px;\">Thậm chí có trường hợp hợp cá biệt cao tới tận 1.12m. Đó là Zeus, chú chó đang giữ kỷ lục về hạng mục này. Bù lại, giống chó to Great Dane lại không sở hữu tuổi thọ lâu dài. Thông thường chúng chỉ sống đến tầm 6 – 8 tuổi, cá nhân Zeus cũng đã lìa trần khi mới ăn sinh nhật lần thứ 5.</p><p style=\"margin-bottom: 6px;\">Giống chó to này có nguồn gốc từ nước Đức. Tổ tiên của chúng được cho là sản phẩm lai tạo giữa chó English Mastiff và Irish Wolfhound.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Giống chó to Neapolitan Mastiff (Ngao Ý)</h2><p style=\"margin-bottom: 6px;\"><a href=\"https://dogily.vn/cho-canh/neapolitan-mastiff/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">Neapolitan Mastiff</a>&nbsp;có khởi nguồn từ miền nam Italia. Vì thuộc giống chó ngao nên không có gì khó hiểu khi Neapolitan Mastiff cũng nằm trong danh sách các giống chó to có thân hình đồ sộ nhất.</p>', 'giong-cho-to-Neapolitan-Mastiff.jpg', '2022-02-22', '2022-02-22'),
(8, 'cua-hang-cho-canh-dogilypetshop.jpg', 'Top 8 cửa hàng bán chó cảnh uy tín nhất tại Hà Nội', 'cua-hang-ban-cho-canh-uy-tin-ha-noi-tung-loc-pet.jpg', '<p style=\"margin-bottom: 6px;\">“Người yêu có thể không có, nhưng chó phải có một con.” Bạn nào đang ở Hà thành mà muốn tìm Boss về bầu bạn thì tham khảo qua danh sách các cửa hàng bán&nbsp;<a href=\"https://dogily.vn/cho-canh/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">chó cảnh</a>&nbsp;uy tín này nhé.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Dogily Petshop – Cửa hàng bán chó cảnh uy tín tại Hà Nội</h2><p style=\"margin-bottom: 6px;\"><a href=\"https://dogily.vn/\" style=\"touch-action: manipulation;\">Dogily Petshop</a>&nbsp;là thương hiệu chuyên nhập khẩu chó cảnh uy tín từ châu Âu về, đồng thời đi đầu trong việc xây dựng hệ thống trang trại tự chủ nhân giống tại Việt Nam. Qua nhiều năm hoạt động, Dogily đã hình thành nên mối quan hệ hợp tác mật thiết với các trại chó đáng tin cậy khắp trời Âu, Nhật Bản hay Thái Lan.</p>', '<p><span style=\"text-align: justify;\">Sau khi tìm thấy nguồn gen quý, các chú chó bố, chó mẹ này sẽ được đưa về trang trại Dogily Kennel. Tại đây, tất cả các bé đều được hưởng chế độ dinh dưỡng, chăm sóc và tiến hành nhân giống theo mô hình chuẩn châu Âu. Bản thân nhà sáng lập và đội ngũ nhân viên của cửa hàng bán chó cảnh Dogily cũng là người yêu quý thú cưng. Họ hoạt động với sứ mệnh đưa những chú cún khỏe đẹp, tình cảm, trung thành đến làm bạn với ai có nhu cầu.</span></p>', 'cua-hang-ban-cho-canh-uy-tin-ha-noi-azpet-shop.jpg', '2022-02-22', '2022-02-22'),
(9, 'meo-van-tho-nhi-ky- (1).jpg', 'Top 10 giống mèo thông minh nhất hành tinh', 'meo-long-ngan-abyssinian-.jpg', '<p style=\"margin-bottom: 6px;\"><a href=\"https://dogily.vn/meo-canh/\" style=\"touch-action: manipulation;\">Mèo</a>&nbsp;không dễ huấn luyện như chó. Mèo cũng không đảm nhận vai trò truy tìm tội phạm, phát hiện chất cấm như chó có thể làm. Nhưng theo nhiều kết quả khảo sát, thực tế chỉ số thông minh của loài mèo lại cao hơn cả cún. Mời các bạn cùng&nbsp;<a href=\"https://dogily.vn/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"touch-action: manipulation;\">Dogily</a>&nbsp;điểm danh&nbsp;top 10 giống mèo thông minh nhất&nbsp;nhé.</p><h2 style=\"width: 943px; margin-bottom: 0.5em; text-rendering: optimizespeed; line-height: 1.3;\">Mèo thông minh Abyssinian&nbsp;lông ngắn</h2><p style=\"margin-bottom: 6px;\">Giữ vị trí quán quân trong top 10 giống mèo thông minh nhất hành tinh là Abyssinian</p>', '<p><span style=\"text-align: justify;\">Mèo Abyssinian được công nhận là loài động vật đặc biệt thông minh. Chúng rất gần gũi với con người và hay chơi đùa cùng chủ, thậm chí còn “đọc” được cả suy nghĩ của chủ nhân mình.&nbsp;Loài mèo này nổi tiếng về mức độ thông minh đến mức từng được nhắc đến trong bộ phim hoạt hình “Gia đình Simpson” với khả năng đổi kênh Tivi.</span></p>', 'meo-van-tho-nhi-ky- (1).jpg', '2022-02-22', '2022-02-22');

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
(26, 'French Bulldog Bò sữa', 2000000, 1670000, '<p style=\"margin-bottom: 8px;\">✔️ Giống: chó Bull Pháp (French Bulldog, Bull dog Pháp)</p><p style=\"margin-bottom: 8px;\">✔️ Màu sắc: bò sữa.</p><p style=\"margin-bottom: 8px;\">✔️ Giới tính: cái.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 02 tháng.</p>', 'cho2.jpg', '2022-02-04', '2022-02-09', 19, 44),
(27, 'Poodle Tiny màu nâu đỏ', 1300000, 1200000, '<p style=\"margin-bottom: 8px;\">✔️ Giống: chó Poodle Tiny.</p><p style=\"margin-bottom: 8px;\">✔️ Màu sắc: nâu đỏ.</p><p style=\"margin-bottom: 8px;\">✔️ Giới tính: đực, cái.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 02 tháng.</p>', 'de8.jpg', '2022-02-04', '2022-02-25', 1, 44),
(28, 'Chow Chow vàng', 1200000, 1100000, '<p style=\"margin-bottom: 8px;\">✔️ Giống: chó Chow chow.</p><p style=\"margin-bottom: 8px;\">✔️ Màu sắc: vàng.</p><p style=\"margin-bottom: 8px;\">✔️ Giới tính: đực.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 02 tháng.</p>', 'de12.jpg', '2022-02-04', '2022-02-21', 0, 44),
(29, 'Pug mặt xệ vàng', 2000000, 1800000, '<p style=\"margin-bottom: 8px;\">✔️ Giống: chó Pug.</p><p style=\"margin-bottom: 8px;\">✔️ Màu sắc: vàng.</p><p style=\"margin-bottom: 8px;\">✔️ Giới tính: đực.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 02 tháng.</p>', 'de16.jpg', '2022-02-04', '2022-02-25', 16, 44),
(30, 'Hạt Royal Canin Kitten Brishtish', 200000, 80000, '<p style=\"margin-bottom: 8px;\">Thông tin sản phẩm:</p><p style=\"margin-bottom: 8px;\">Xuất xứ: Pháp</p><p style=\"margin-bottom: 8px;\">Thương hiệu:&nbsp;Royal Canin – thương hiệu nổi tiếng trên</p><p style=\"margin-bottom: 8px;\"> toàn cầu về việc cung cấp dinh dưỡng sức khỏe vật nuôi.</p><p style=\"margin-bottom: 8px;\"><font color=\"#0a0a0a\" face=\"Roboto, sans-serif\"><span style=\"font-size: 14px; background-color: rgb(255, 255, 255);\">Khối lượng:&nbsp;2kg</span></font></p>\"', '3-1-510x510 - Copy.png', '2022-02-04', '2022-02-04', 22, 53),
(31, 'Balo phi hành gia size nhỏ', 70000, NULL, '<p class=\"giatk\" style=\"margin-bottom: 8px;\">Với thiết kế đặt biệt thời trang và đẹp mặt nhưng </p><p class=\"giatk\" style=\"margin-bottom: 8px;\">không kém phần thoải mái cho các bé .</p><p class=\"giatk\" style=\"margin-bottom: 8px;\"> Mặt trước được làm từ nhựa cứng </p><p class=\"giatk\" style=\"margin-bottom: 8px;\">bóng với nhiều hình ảnh đẹp lạ.</p><p style=\"margin-bottom: 8px;\"><br></p><div><br></div>\"', 'Long-van-chuyen-hang-khong-italia.jpg', '2022-02-04', '2022-02-04', 28, 53),
(32, 'Túi thái cho chó mèo size nhỏ', 59000, 50000, '<p><span style=\"text-align: justify;\">Túi thái cho chó mèo size lớn được làm từ chất liệu tốt,</span></p><p><span style=\"text-align: justify;\"> bền, đẹp và chắc chắn. </span></p><p><span style=\"text-align: justify;\">Có nhiều màu sắc ưa nhìn cho bạn chọn lựa.</span></p>\"', 'o-nem-trong-suot-cho-meo-11-510x510.jpg', '2022-02-04', '2022-02-14', 30, 53),
(35, 'Anh Lông Ngắn Xám Xanh', 30000000, 29000000, '<p style=\"margin-bottom: 8px;\">✔️&nbsp;Giống: mèo Anh lông ngắn (British Shorthair, Aln).</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Màu sắc: xám xanh.</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Giới tính:&nbsp;đực.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 10 tháng.</p><p style=\"margin-bottom: 8px;\">✔️ Nguồn gốc: nhập khẩu châu Âu (liên bang Nga).</p>', 'meo-anh-long-ngan-nhap-khau-9.jpg', '2022-02-04', '2022-02-22', 39, 52),
(36, 'Munchkin Silver tai cụp', 2500000, NULL, '<p style=\"margin-bottom: 8px;\">✔️&nbsp;Giống:&nbsp;mèo Munchkin.</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Màu sắc:&nbsp;Silver.</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Giới tính:&nbsp;đực.</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Tuổi:&nbsp;2 tháng.</p>', 'meo-chan-ngan-tai-cup-silver-1-510x340.jpg', '2022-02-04', '2022-02-09', 10, 52),
(37, 'Mèo Anh lông dài nhập khẩu', 4000000, 3600000, '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Giống:&nbsp;mèo British Longhair (mèo Anh lông dài, Ald)</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Màu sắc:&nbsp;silver</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Giới tính:&nbsp;cái</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Tuổi:&nbsp;8 tháng.</li></ul>', 'meo-silver-nhap-khau-nga-4-th-1-1-510x340.jpg', '2022-02-04', '2022-02-06', 14, 52),
(39, 'Mèo Anh lông dài đen', 500000, 470000, '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Giống:&nbsp;mèo British Longhair (mèo Anh lông dài, Ald)</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Màu sắc:&nbsp;đen</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Giới tính:&nbsp;đực</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Tuổi:&nbsp;10 tháng.</li></ul>', 'ald-den-moob-1-năm-tuoi-logo-510x510.jpg', '2022-02-04', '2022-02-22', 4, 52),
(40, 'Munchkin Bicolor', 2000000, NULL, '<p style=\"margin-bottom: 8px;\">✔️&nbsp;Giống:&nbsp;mèo Munchkin.</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Màu sắc: Bicolor.</p><p style=\"margin-bottom: 8px;\">✔️&nbsp;Giới tính:&nbsp;đực.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 4 tháng.</p>', 'meo-munchkin-bicolor-4-thang-1-510x340.jpg', '2022-02-07', '2022-02-15', 30, 52),
(41, 'chó Poodle Tiny tai bướm.', 3400000, 3200000, '<p style=\"margin-bottom: 8px;\">✔️ Giống: chó Poodle Tiny tai bướm.</p><p style=\"margin-bottom: 8px;\">✔️ Màu sắc: kem trắng.</p><p style=\"margin-bottom: 8px;\">✔️ Giới tính: đực, cái.</p><p style=\"margin-bottom: 8px;\">✔️ Tuổi: 02 tháng.</p>', 'de1.jpg', '2022-02-07', '2022-02-25', 11, 44),
(42, 'Dầu Thơm khử mùi và mềm lông Forcans', 54000, 50000, '<ul style=\"list-style-position: initial; list-style-image: initial; padding: 0px; margin-bottom: 1.3em;\"><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Giúp lông mượt mà và thơm mát sau khi tắm.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Giúp lông dễ chải và đặc biệt chống rụng lông, làm cho lông ngày càng dày hơn.</li><li style=\"margin-bottom: 0.6em; margin-left: 1.3em;\">Tinh chất Aloe Vera làm cho hương thơm lưu lại lâu hơn, lông mượt mà hơn.</li></ul>', 'dau-thom-khu-mui-va-mem-long-forcans-1-510x510.jpg', '2022-02-07', '2022-02-23', 29, 53),
(43, 'Túi thái cho chó mèo size nhỏ', 150000, NULL, '<p><span style=\"text-align: justify;\">Túi đeo chéo cho chó mèo dành cho chó mèo</span></p><p><span style=\"text-align: justify;\"> được làm từ chất liệu tốt, bền, đẹp và chắc chắn.</span></p><p><span style=\"text-align: justify;\"> Có nhiều màu sắc ưa nhìn cho bạn chọn lựa.</span></p>', 'tui-deo-cheo-1-510x510.jpg', '2022-02-07', '2022-02-23', 44, 53);

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
(53, 18, 36, '2022-02-14', '2022-02-14', 'cám ơn bạn'),
(55, 38, 39, '2022-02-21', '2022-02-21', 'hello shop'),
(57, 17, 40, '2022-02-22', '2022-02-22', 'cám ơn bạn'),
(59, 18, 41, '2022-02-22', '2022-02-22', 'cám ơn bạn'),
(63, 18, 43, '2022-02-23', '2022-02-23', 'cám ơn bạn'),
(66, 18, 40, '2022-02-24', '2022-02-24', 'cám ơn bạn'),
(67, 18, 42, '2022-02-24', '2022-02-24', 'cám ơn bạn'),
(69, 18, 41, '2022-02-25', '2022-02-25', 'cám ơn bạn');

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
(27, 17, 'Hoàng nguyễn', 348048435, 'Yên Kiện-Hà Nội', 30670000, 'binhnguyen@gmail.com', 'Ghi Chú...', '2022-02-09', '2022-02-14', 3),
(36, 38, 'Đức Bình', 348048435, 'Yên Kiện-Hà Nội', 16250000, 'tinnguyen@gmail.com', 'Ghi Chú...', '2022-02-21', '2022-02-22', 2),
(37, 38, 'Đức Bình', 348048435, 'Yên Kiện-Hà Nội', 18700000, 'tinnguyen@gmail.com', 'Ghi Chú...', '2022-02-21', '2022-02-25', 2),
(41, 18, 'admin', 348048435, 'Yên Kiện-Hà Nội', 24450000, 'binhpoly@gmail.com', 'Ghi Chú...', '2022-02-23', '2022-02-23', 2),
(44, 18, 'admin', 348048435, 'Yên Kiện-Hà Nội', 18200000, 'binhpoly@gmail.com', 'Ghi Chú...', '2022-02-25', '2022-02-25', 1);

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
(17, 'Hoàng nguyễn', 'binhnguyen@gmail.com', 'photos-meandnature15.jpg', '$2y$10$D4ZpWmzIg2O7RQgKJRIw..BM0HJS2dyyya.L5F2BWKCsys8djQB6y', 'Yên Kiện-Hà Nội', 348048435, '2022-02-05', '2022-02-05', 1),
(18, 'admin', 'binhpoly@gmail.com', 'photos-livelikeaflower6.jpg', '$2y$10$Qr1HvV3Lw84VLI64Wy8HfemTOygr3gnjSAY0.VQhj3E3P9HxaPGI6', 'Yên Kiện-Hà Nội', 348048435, '2022-02-08', '2022-02-08', 2),
(37, 'Nguyễn Đức Bình', 'ducbinhdzvcl@gmail.com', 'python.jpg', '$2y$10$nn26fGdUpcMK59wBfhp3p.bZMZfgDBljQuFXrXwpHzAn5pCt9Sxsa', 'Yên Kiện-Hà Nội', 348048435, '2022-02-18', '2022-02-18', 1),
(38, 'Đức Bình', 'tinnguyen@gmail.com', 'qa.jpg', '$2y$10$c/rQ7QaxHGYztYJquJf7aeC8YPHNVCwjvRmqdM1N.fg.ApxeF5A9e', 'Yên Kiện-Hà Nội', 348048435, '2022-02-18', '2022-02-18', 1);

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
