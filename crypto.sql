-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 12:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `min_balance` int(11) DEFAULT NULL,
  `max_users` int(11) DEFAULT NULL,
  `app_version` int(11) DEFAULT NULL,
  `update_type` varchar(200) DEFAULT NULL,
  `app_description` text DEFAULT NULL,
  `app_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `min_balance`, `max_users`, `app_version`, `update_type`, `app_description`, `app_link`) VALUES
(1, 0, 10, 2, 'force', 'Bug Fixed', 'https://drive.google.com/file/d/1ZFDNvFBFNdq_K1fL4tC7cJCMpHiwwhuj/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `date_created`) VALUES
(1, 'hi', 'gello', NULL),
(2, 'hello', 'how are you', NULL),
(3, 'hi', 'helllo', NULL),
(4, 'Hello', 'This is Test Notification', NULL),
(5, 'fdf', 'dfdfd', '2022-07-18 21:50:25'),
(6, 'Test', 'Good evening', '2022-07-29 18:16:28'),
(7, 'Hi', 'Sprint Test', '2022-08-12 08:34:54'),
(8, 'Hi', 'Test Sprint', '2022-08-12 08:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reward` int(11) NOT NULL,
  `steps` int(11) NOT NULL,
  `reward_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `user_id`, `reward`, `steps`, `reward_date`) VALUES
(1, 1, 500, 500, '2022-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `reward_settings`
--

CREATE TABLE `reward_settings` (
  `id` int(11) NOT NULL,
  `value` text DEFAULT NULL,
  `reward` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reward_settings`
--

INSERT INTO `reward_settings` (`id`, `value`, `reward`) VALUES
(1, '2000', '1'),
(2, '4000', '2'),
(3, '6000', '200'),
(4, '8000', '200'),
(5, '10000', '200'),
(6, '12000', '400'),
(7, '14000', '500'),
(8, '16000', '600'),
(9, '18000', '700'),
(10, '20000', '300');

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` text DEFAULT NULL,
  `steps` int(11) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `earn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `user_id`, `date`, `steps`, `calories`, `earn`) VALUES
(46, 12, '2022-07-18', 100, 30, 10),
(47, 13, '2022-07-20', 13, 0, 13),
(48, 13, '2022-07-21', 19, 1, 19),
(49, 13, '2022-07-22', 2736, 91, 2736),
(50, 13, '2022-07-23', 132, 4, 132),
(51, 14, '2022-07-27', 48, 2, 48),
(52, 14, '2022-07-28', 473, 15, 473),
(53, 13, '2022-07-29', 16, 1, 16),
(54, 14, '2022-07-30', 10, 0, 10),
(55, 14, '2022-07-31', 626, 20, 626),
(56, 13, '2022-08-10', 44, 1, 44),
(57, 22, '2022-08-11', 1392, 64, 1392),
(58, 21, '2022-08-12', 12, 0, 12),
(59, 21, '2022-08-13', 335, 12, 335),
(60, 22, '2022-08-14', 716, 33, 716),
(61, 26, '2022-08-15', 62, 2, 62),
(62, 25, '2022-08-16', 810, 29, 810),
(63, 22, '2022-08-18', 103, 4, 103),
(64, 24, '2022-08-20', 3518, 137, 3518),
(65, 29, '2022-08-23', 120, 4, 120);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `wallet_balance` int(11) DEFAULT NULL,
  `wallet_address` text DEFAULT NULL,
  `steps` int(11) DEFAULT NULL,
  `reward` int(11) DEFAULT NULL,
  `registered_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `weight`, `height`, `age`, `wallet_balance`, `wallet_address`, `steps`, `reward`, `registered_date`) VALUES
(1, 'Jaya Prasad', 'jp@gmail.com', '12345678', NULL, 45, 34, 45, 0, '0xd1e665da42619b45681fffca178d84c5e207143a', 113056, 0, NULL),
(2, 'Prasad', 'jp1@gmail.com', '12345678', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Vijay', 'vjdeveloper2020@gmail.com', '123456', 'Male', 48, 160, 20, NULL, NULL, NULL, NULL, NULL),
(4, 'Prasad', 'prasad@gmail.com', '12345678', 'Male', 50, 165, 20, NULL, NULL, NULL, NULL, NULL),
(5, 'Prasad', 'erer@gmail.com', '12345678', 'male', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-06-30'),
(6, 'Prasad', 'jj@gmail.com', '12345678', 'male', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-06-30'),
(7, 'Prasad', 'jje@gmail.com', '12345678', 'male', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-06-30'),
(8, 'test', 'xojefa4789@meidir.com', '12345', 'Male', NULL, NULL, NULL, NULL, NULL, 125, 200, '2022-06-30'),
(10, 'Testuser', 'rofiwe1399@shbiso.com', '12345', 'Male', NULL, NULL, NULL, 0, '0x58838932f053d9cda50385b47dd08229ddf2d85a', 0, 0, '2022-07-01'),
(11, 'tester', 'sowir38656@lenfly.com', '123456', 'Male', NULL, NULL, NULL, 0, '0x58838932f053d9cda50385b47dd08229ddf2d85a', 66464, 0, '2022-07-01'),
(12, 'Makein', 'makeinappdevelopment@gmail.com', '12345678', 'Male', 50, 155, 25, 0, '0xd1e665da42619b45681fffca178d84c5e207143a', 585, 200, '2022-07-01'),
(13, 'Rozar', 'thesprintapps@gmail.com', '000000', 'Male', 60, 172, 21, NULL, NULL, 6018, 200, '2022-07-02'),
(14, 'Alex jones', 'gautamsinghji95@gmail.com', 'gautam@199', 'Male', 60, 167, 20, NULL, NULL, 7541, 700, '2022-07-02'),
(15, 'Punk', 'bansalji800@gmail.com', 'bansal123', 'Male', 90, 156, 24, NULL, NULL, 2853, 200, '2022-07-02'),
(16, 'Jai Lakshmi Jha', 'jailakshmijha6552@gmail.com', 'Sandeep@123', 'Female', 67, 155, 40, NULL, NULL, 0, 0, '2022-07-02'),
(17, 'Alex hisake', 'thesprintappyt@gmail.com', 'Sprint@123', 'Male', 74, 185, 21, NULL, NULL, 2039, 0, '2022-07-28'),
(18, 'Alex Jones', 'tamzida19@gmail.com', 'Password@1', 'Male', 70, 180, 24, NULL, NULL, 0, 0, '2022-08-07'),
(19, 'test01', 'misogi0100@gmail.com', 'misogi01test', 'Male', 50, 150, 19, NULL, NULL, 45, 200, '2022-08-07'),
(20, 'Miri Amir', 'miriamir751@gmail.com', 'Fallout4', 'Male', 70, 180, 21, NULL, NULL, 0, 0, '2022-08-10'),
(21, 'Rozar', 'dewaansingh822@gmail.com', '000333', 'Male', 60, 182, 60, NULL, NULL, 9861, 0, '2022-08-11'),
(22, 'Henrico', 'hen2601@outlook.com', 'Henric0@sprint', 'Male', 80, 180, 26, NULL, NULL, 14040, 200, '2022-08-11'),
(23, 'Cj', 'catherinesantos0217@gmail.com', '@Sprintblossom17', 'Female', 56, 162, 32, NULL, NULL, 119, 200, '2022-08-12'),
(24, 'jesus torres', 'jesust07@gmail.com', '1Km45%ytest', 'Male', 70, 173, 29, NULL, NULL, 3518, 0, '2022-08-12'),
(25, 'Archit Garg', 'garchit33@gmail.com', 'Archit@123', 'Male', 67, 163, 25, NULL, NULL, 5408, 0, '2022-08-15'),
(26, 'Mxjed', 'mxjedsada@gmail.com', 'madmax77', 'Male', 65, 173, 25, NULL, NULL, 124, 200, '2022-08-15'),
(27, 'Muhammad Irpansyah', 'muhammadirpansyah0109@gmail.com', 'Dewvan010915', 'Male', 54, 162, 23, NULL, NULL, 6822, 400, '2022-08-15'),
(28, 'shamcom', 'sham.elmohamedy@gmail.com', 'Sy4mt35t', 'Male', 58, 160, 25, NULL, NULL, 0, 0, '2022-08-22'),
(29, 'andy', 'anbu1668899@yahoo.com', 'Lixiaoteng', 'Male', 68, 170, 29, NULL, NULL, 240, 200, '2022-08-23'),
(30, 'Raj', 'umeshsingh18271@gmail.com', '000333', 'Male', 61, 170, 21, NULL, NULL, 238, 200, '2022-08-28'),
(31, 'Rohit', 'kambojr9568@gmail.com', '000333', 'Male', 65, 172, 20, NULL, NULL, 0, 0, '2022-08-30'),
(32, 'Zagir', 'zagir4752@gmail.com', '000333', 'Male', 61, 172, 21, 20, '0x2A41650a8EC14C8C767de98B670Cba66ebBB9200', 3359, 0, '2022-08-30'),
(33, 'pankha', 'nimisaha123@gmail.com', 'nimi123', 'Male', 89, 173, 23, NULL, NULL, 112, 200, '2022-08-30'),
(34, 'DefiP', 'defipirates@gmail.com', 'defi123', 'Male', 85, 170, 21, NULL, NULL, 0, 0, '2022-08-30'),
(35, 'Argue', 'danbichenshi@hotmail.com', 'asd8873864', 'Male', 80, 178, 31, 19577, '0x463109AffD9029eb86609431Ed3B05D03304e639', 65809, 0, '2022-08-30'),
(36, 'milad', 'golezanbagh18@gmail.com', 'Zanbagh18', 'Male', 68, 172, 30, NULL, NULL, 11539, 0, '2022-08-30'),
(37, 'lukas', 'lukaszlukasz107@gmail.com', 'nandi22', 'Male', 75, 183, 31, NULL, NULL, 3804, 0, '2022-08-30'),
(38, 'Abde', 'aliabde20@gmail.com', 'BellaZasmitha21', 'Male', 45, 170, 27, NULL, NULL, 15113, 0, '2022-08-30'),
(39, 'Eduardo Miranda', 'dudumci@gmail.com', 'edunix1978', 'Male', 90, 178, 44, NULL, NULL, 0, 0, '2022-08-30'),
(40, 'suny', 'sunylm@tutanota.com', 'jk888888', 'Male', 63, 173, 39, NULL, NULL, 0, 0, '2022-08-30'),
(41, 'Liang', 'shylock1987lzl@gmail.com', 'Qwe10086', 'Male', 55, 165, 35, NULL, NULL, 9169, 0, '2022-08-30'),
(42, 'ajajsj', '941929873@qq.com', 'asd8873864', 'Male', 80, 178, 31, NULL, NULL, 0, 0, '2022-08-30'),
(43, '托尼', 'tony870927123@gmail.com', 'tony870927', 'Male', 80, 171, 34, NULL, NULL, 1003, 0, '2022-08-30'),
(44, 'andy', 'andyliu9500@gmail.com', 'XA8116025', 'Male', 70, 178, 32, NULL, NULL, 0, 0, '2022-08-30'),
(45, 'Papa Gumbs', 'syansean10@gmail.com', 'Barcelona10', 'Male', 57, 168, 23, NULL, NULL, 0, 0, '2022-08-30'),
(46, 'pengbitao107', 'pengbitao12345@gmail.com', 'wshnqdr870615', 'Male', 65, 172, 35, NULL, NULL, 0, 0, '2022-08-30'),
(47, 'hick984', 'yuehu002@gmail.com', 'Grey984970', 'Male', 91, 173, 37, NULL, NULL, 0, 0, '2022-08-30'),
(48, 'Nitish kumar singh', 'biku07nitish07@gmail.com', 'Stepin.2SFP', 'Male', 72, 173, 28, NULL, NULL, 0, 0, '2022-08-30'),
(49, 'jack', '1fstswap1@gmail.com', 'jack123456', 'Male', 123, 123, 28, NULL, NULL, 106030, 0, '2022-08-30'),
(50, 'RugIsLove', 'zephyl2@gmail.com', 'lufarial', 'Male', 85, 175, 35, NULL, NULL, 586, 0, '2022-08-30'),
(51, '呆神', '2561523838@qq.com', 'qwert123', 'Male', 65, 180, 20, NULL, NULL, 0, 0, '2022-08-30'),
(52, 'Robin Singh', 'syash.saini@gmail.com', 'Nokia@302', 'Male', 99, 164, 34, NULL, NULL, 0, 0, '2022-08-30'),
(53, 'Jank_Rau', 'jqrao020@gmail.com', 'Getlost0711', 'Male', 65, 171, 39, NULL, NULL, 11, 0, '2022-08-30'),
(54, 'lili', '1150735518@qq.com', '123qaz', 'Male', 52, 163, 23, NULL, NULL, 0, 0, '2022-08-30'),
(55, 'nan', 'z1319982515@gmail.com', 'qaz198507', 'Male', 555, 555, 55, NULL, NULL, 0, 0, '2022-08-30'),
(56, 'lzm', '269121725@qq.com', 'lzm0212', 'Male', 78, 178, 36, NULL, NULL, 88885, 0, '2022-08-30'),
(57, 'zhu', '525339089@qq.com', 'zhudi2001', 'Male', 80, 175, 25, NULL, NULL, 25021, 0, '2022-08-30'),
(58, 'aju', 'sjff4she88@gmail.com', 'sjf18650801605', 'Male', 62, 173, 35, NULL, NULL, 38762, 0, '2022-08-30'),
(59, 'Mehmet Ali Altürk', 'mehmetalialturk@gmail.com', '123457', 'Male', 78, 179, 35, NULL, NULL, 10289, 0, '2022-08-31'),
(60, 'aj', 'nanbanindrajith@gmail.com', '12345', 'Male', 80, 168, 30, NULL, NULL, 161, 0, '2022-09-01'),
(61, 'Ahmed Radwan', 'ahmedfathyradwan@yahoo.com', 'Gigoag291!', 'Male', 105, 183, 49, 10630, '0x68cf9F895A192291232Bb49C271D5F73B6bC6974', 10054, 0, '2022-09-02'),
(62, 'Markus', 'markusbeni@yahoo.es', 'M@rkusss1234', 'Male', 85, 180, 25, NULL, NULL, 11914, 0, '2022-09-03'),
(63, 'Omarski', 'yildirimomar@hotmail.com', 'Samsun55@', 'Male', 107, 176, 26, NULL, NULL, 0, 0, '2022-09-04'),
(64, 'masayuki', 'rokugatsuno@gmail.com', '1945123', 'Male', 55, 168, 48, 10715, '0xC37Cc9294ae39390841C52AEE59b2A2Be6d392E6', 12327, 0, '2022-09-05'),
(65, 'Mokhtar Ahmadi', 'mokhtarbahal@gmail.com', '13563593', 'Male', 75, 172, 38, 9305, '0xF14A4d9c52f0E9852C5aeffE8bf1E73bfCb8d610', 1149, 0, '2022-09-06'),
(66, 'Prasad', 'jayaprasad356@gmail.com', 's1234567890', 'Male', 60, 170, 25, 0, '0xbea556231a87fcbb8de2abe94e0502b6dce443f6', 0, 0, '2022-09-06'),
(67, 'KOKO FANDHY', 'kokofandhy@gmail.com', 'Adipor45', 'Male', 65, 175, 38, 0, '0x4B7E82945689377707Df7Ab346b89737E5D7b662', 301, 0, '2022-09-07'),
(68, 'cecilio bartolo', 'cecilio.bartolo@gmail.com', 'Takbuhanna2', 'Male', 88, 175, 51, 0, '0x2754eac69de52a4405486232f89b659ed2294656', 0, 0, '2022-09-07'),
(69, 'gxc', '2411599627@qq.com', '959974.gan', 'Male', 165, 165, 27, 0, '0x0091f735714AfEB30B177Df66A84C41eEA50Ec5E', 0, 0, '2022-09-07'),
(70, 'jodes', 'Joshitv384@gmail.com', 'J1o2s3h4u5a6@@', 'Male', 80, 85, 20, 30036, '0x6ca1aa8e21db8f05dc961e07d6bb1fba66e2bd57', 5959, 6, '2022-09-08'),
(71, 'yinchengfeng', '2529624505@qq.com', 'yin123321', 'Male', 70, 180, 33, NULL, NULL, 0, 0, '2022-09-08'),
(72, 'ultrain', 'lifeone886@gmail.com', 'Zt123456', 'Male', 75, 175, 24, 0, '0x130d40676b7c3eff51c8301d530c9b19e7026534', 144, 0, '2022-09-08'),
(73, 'David', 'foreverbent@comcast.net', 'Arianna15$', 'Male', 65, 123, 38, 0, '0x5b290615f89c31c4740bd4dd67bb083cf4d58968', 0, 0, '2022-09-08'),
(74, 'daefr5t6', 'dueell2014@gmail.com', 'saw1289Q', 'Male', 456, 45, 45, NULL, NULL, 0, 0, '2022-09-10'),
(75, 'krik', 'krikunan@gmail.com', 'S000s30t!@', 'Male', 76, 185, 42, 0, '0x6a83482e89d540c1afc2f151db5c4324ecfdf9c8', 33306, 0, '2022-09-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_settings`
--
ALTER TABLE `reward_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
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
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reward_settings`
--
ALTER TABLE `reward_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
