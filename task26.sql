-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 12:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task26`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`) VALUES
(1, 'about-us.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `about_items`
--

CREATE TABLE `about_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_items`
--

INSERT INTO `about_items` (`id`, `title`, `content`) VALUES
(1, 'Two-One Donec porttitor augue', 'Quisque bibendum cursus viverra. Mauris at ex ipsum. Aenean condimentum urna nisl, eget interdum ante euismod vel. Aliquam at metus sit amet nunc dapibus posuere.'),
(2, 'Two-Two Donec porttitor augue RAAD', 'Maecenas et metus nisl. Morbi ac interdum metus. Aliquam erat volutpat. Donec posuere tortor vel volutpat consequat. Mauris sagittis magna vel tellus semper interdum et id sapien.\n\n'),
(3, '1-03 Donec porttitor augue', 'Quisque bibendum cursus viverra. Mauris at ex ipsum. Aenean condimentum urna nisl, eget interdum ante euismod vel. Aliquam at metus sit amet nunc dapibus posuere.\n\n'),
(4, '2-03 Donec porttitor augue', 'Maecenas et metus nisl. Morbi ac interdum metus. Aliquam erat volutpat. Donec posuere tortor vel volutpat consequat. Mauris sagittis magna vel tellus semper interdum et id sapien.\n\n'),
(5, '3-03 Donec porttitor augue', 'Maecenas et metus nisl. Morbi ac interdum metus. Aliquam erat volutpat. Donec posuere tortor vel volutpat consequat. Mauris sagittis magna vel tellus semper interdum et id sapien.\n\n'),
(6, '01 Four Columns', 'Mauris at ex ipsum. Aenean condimentum urna nisl, eget interdum ante euismod vel. Aliquam at metus sit amet nunc dapibus posuere.\n\n'),
(7, '02 Four Columns', 'Aliquam erat volutpat. Donec posuere tortor vel volutpat consequat. Mauris sagittis magna vel tellus semper interdum et id sapien.\n\n'),
(8, '03 Four Columns', 'Morbi ac interdum metus. Donec posuere tortor vel volutpat consequat. Mauris sagittis magna vel tellus semper interdum et id sapien.\n\n'),
(9, '04 Four Columns', 'Aliquam erat volutpat. Donec posuere tortor vel volutpat consequat. Mauris sagittis magna vel tellus semper interdum et id sapien.\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `imageUpload` varchar(255) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `bloggerName` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `publishDate` varchar(255) NOT NULL,
  `commentsCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) VALUES
(2, 'blog-thumb-01.jpg', 'Lifestyle', '', 'Donec tincidunt leo', '2025-06-09', 0),
(4, 'blog-thumb-02.jpg', 'LIFESTYLE', 'RAAD', 'Mauris ac dolor ornare', '2025-06-09', 0),
(5, 'banner-item-05.jpg', 'LIFESTYLE', 'RAAD', 'ssssssssssssss', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`) VALUES
(1, 'RAAD', 'rrrrrrrrrrrr'),
(3, 'Raad Jaber1', 'sssssssssssssssssssssssssssssssssss'),
(4, 'RAAD', 'عع');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `phone` int(200) NOT NULL,
  `email` text NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `phone`, `email`, `address`) VALUES
(1, 2147483647, 'Clevermind@gmail.com', 'Amman -KHBP');

-- --------------------------------------------------------

--
-- Table structure for table `haf`
--

CREATE TABLE `haf` (
  `title` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `haf`
--

INSERT INTO `haf` (`title`, `facebook`, `instagram`, `twitter`, `ID`) VALUES
('clever mind', 'https://www.facebook.com/ClevermindICT/', 'https://www.instagram.com/clevermindpob/', 'https://twitter.com/search?q=cleverMindICT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `name`, `email`, `subject`, `massage`) VALUES
(2, 'RAAD', 'raedjaber52@gmail.com', 'gg', 'uuu');

-- --------------------------------------------------------

--
-- Table structure for table `newest`
--

CREATE TABLE `newest` (
  `id` int(11) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `bloggerName` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `publishDate` date NOT NULL,
  `commentsCount` int(11) NOT NULL,
  `imageUpload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newest`
--

INSERT INTO `newest` (`id`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`, `imageUpload`) VALUES
(2, 'LIFESTYLE', 'RAAD', 'Best Template Website for HTML CSS', '2025-05-31', 0, 'blog-post-01.jpg'),
(4, 'Fashion', 'gg', 'Donec tincidunt leo nec magna', '2025-05-08', 0, 'blog-post-02.jpg'),
(6, 'Healthy', 'Clever', 'Etiam id diam vitae lorem dictum', '2025-06-01', 0, 'blog-post-03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `imageUpload` varchar(255) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `bloggerName` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `publishDate` varchar(255) NOT NULL,
  `commentsCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) VALUES
(1, 'blog-thumb-02.jpg', 'LIFESTYLE', 'raad', 'Aenean pulvinar gravida sem nec\r\n', '2025-06-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slid`
--

CREATE TABLE `slid` (
  `ID` int(11) NOT NULL,
  `imageUpload` varchar(255) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `bloggerName` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `publishDate` date NOT NULL,
  `commentsCount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slid`
--

INSERT INTO `slid` (`ID`, `imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) VALUES
(20, 'banner-item-01.jpg', 'raad', 'raad', 'Morbi Dapibus Condimentum', '2025-05-04', '0'),
(24, 'banner-item-02.jpg', 'clever', ' mind', 'Donec Porttitor Augue', '2025-06-16', '0'),
(25, 'banner-item-03.jpg', 'LIFESTYLE', 'RAAD', 'Best HTML Template', '2025-05-06', '0'),
(26, 'banner-item-04.jpg', 'FASHION', 'AHMAD', 'Responsive and Mobile Ready Layouts', '2025-05-07', '0'),
(27, '', 'NATURE', 'Admin', 'Cras Congue sed', '2025-05-14', '0'),
(29, 'banner-item-06.jpg', 'LIFESTYLE', 'uni', 'Cacca', '2025-05-31', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_items`
--
ALTER TABLE `about_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `haf`
--
ALTER TABLE `haf`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newest`
--
ALTER TABLE `newest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slid`
--
ALTER TABLE `slid`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_items`
--
ALTER TABLE `about_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newest`
--
ALTER TABLE `newest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slid`
--
ALTER TABLE `slid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
