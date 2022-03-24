-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 09:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(1) NOT NULL,
  `ad_name` varchar(20) NOT NULL,
  `ad_email` varchar(60) NOT NULL,
  `ad_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `ad_name`, `ad_email`, `ad_pass`) VALUES
(1, 'Islamyearul', 'islamyearul@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(20) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'First cat name', 'First cat des'),
(4, 'Nature', 'Nature'),
(5, 'Travel', 'Travel'),
(6, 'Photography', 'Photography');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_category` int(255) NOT NULL,
  `post_author` varchar(60) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_comment` int(255) NOT NULL,
  `post_summery` varchar(200) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_image`, `post_category`, `post_author`, `post_date`, `post_comment`, `post_summery`, `post_tag`, `post_status`) VALUES
(1, 'Albizia lebbeck', 'ts uses include environmental management, forage, medicine and wood. It is cultivated as a shade tree in North and South America.[4] In India and Pakistan, the tree is used to produce timber. Wood from Albizia lebbeck has a density of 0.55-0.66 g/cm3 or higher.[5]\r\n\r\nEven where it is not native, some indigenous herbivores are liable to utilize lebbeck as a food resource. For example, the greater rhea (Rhea americana) has been observed feeding on it in the cerrado of Brazil.[6]\r\n\r\nEthnobotany\r\nLebbeck is an astringent, also used by some cultures to treat boils, cough, to treat the eye, flu, gingivitis, lung problems, pectoral problems, is used as a tonic, and is used to treat abdominal tumors.[7] The bark is used medicinally to treat inflammation.[8] This information was obtained via ethnobotanical records, which are a reference to how a plant is used by indigenous peoples, not verifiable, scientific or medical evaluation of the effectiveness of these claims. Albizia lebbeck is also psychoactive.[9]', '3cdd7db2149554995ca05e279fc78036.jpg', 4, 'Admin', '2021-07-27 16:35:15', 3, 'Plant Research', 'plant, nature', 1),
(2, 'Albizia lebbeck', 'dgdsgds', 'landscape-scene-of-forest-with-river-and-many-trees-free-vector (1).jpg', 4, 'Admin', '2021-07-25 13:33:14', 3, 'Plant Research', 'plant, nature', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_with_cat`
-- (See below for the actual view)
--
CREATE TABLE `post_with_cat` (
`post_id` int(255)
,`post_title` varchar(150)
,`post_content` longtext
,`post_image` varchar(255)
,`post_author` varchar(60)
,`post_date` timestamp
,`post_comment` int(255)
,`post_summery` varchar(200)
,`post_tag` varchar(255)
,`post_status` tinyint(3)
,`cat_id` int(20)
,`cat_name` text
);

-- --------------------------------------------------------

--
-- Structure for view `post_with_cat`
--
DROP TABLE IF EXISTS `post_with_cat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_with_cat`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_image` AS `post_image`, `posts`.`post_author` AS `post_author`, `posts`.`post_date` AS `post_date`, `posts`.`post_comment` AS `post_comment`, `posts`.`post_summery` AS `post_summery`, `posts`.`post_tag` AS `post_tag`, `posts`.`post_status` AS `post_status`, `catagory`.`cat_id` AS `cat_id`, `catagory`.`cat_name` AS `cat_name` FROM (`posts` join `catagory` on(`posts`.`post_category` = `catagory`.`cat_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
