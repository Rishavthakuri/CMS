-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 05:44 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mobiles'),
(2, 'Furniture'),
(3, 'Electronics & Appliances'),
(4, 'Services'),
(5, 'Jobs'),
(6, 'Real State');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) VALUES
(1, 42, 'rihav', 'rishavthakuri69@gmail.com', 'nice one', '2018-04-12', 'unapproved');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_title`) VALUES
(1, 'Biratnagar'),
(4, 'Jhapa'),
(5, 'Dharan'),
(6, 'Inaruwa'),
(7, 'Janakpur');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_location_id` int(11) NOT NULL,
  `post_price` int(11) NOT NULL,
  `post_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_tags`, `post_comment_count`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_location_id`, `post_price`, `post_address`) VALUES
(47, 'ok', 0, 'published', 2, 'ok', '', 'rishav', '2018-04-23', '', 'ok        ', 5, 200, 'ok'),
(49, 'ok', 0, 'published', 1, 'ok', '', 'rishav', '2018-04-23', '', '<p>ok</p>', 1, 300, 'ok'),
(50, 'ok', 0, 'published', 1, 'ok', '', 'rishav', '2018-04-23', '', '<p>ok</p>', 1, 300, 'ok'),
(51, 'ok', 0, 'draft', 1, 'ok', '', 'rishav', '2018-04-23', '', '<p>ok</p>', 7, 300, 'ok'),
(57, 'ok', 0, 'draft', 1, 'ok', '', 'rishav', '2018-04-26', '', 'ok                ', 1, 0, 'ok'),
(58, 'ok', 0, 'draft', 1, 'ok', '', 'rishav', '2018-04-26', '', 'ok        ', 1, 0, 'ok'),
(59, 'work', 0, 'draft', 1, 'work', '', 'rishav', '2018-04-26', '', 'work        ', 1, 200, 'work'),
(60, 'wee', 0, 'published', 1, 'wee', '', 'rishav', '2018-04-29', 'barbian.jpeg', '<p>we</p>', 7, 300, 'wee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2a$07$usesomesillystringforsalt$',
  `token` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `post_location_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`, `phone`, `post_location_id`) VALUES
(43, 'rishav', '$2a$07$usesomesillystringfore0bNOHvoVFqRynUax.4cT8rN1c1MlCjO', 'Rishav', 'Malla', 'rishavthakuri69@gmail.com', 'DSC_0636.jpg', 'admin', '$2a$07$usesomesillystringforsalt$', 'd50f6b41cdaf3a1bfe7f6b51cd7ab9c0ded9e026e786754935d694715223a2403d960f58bb37ec109165e36f5763f9ae320f', '9842553420', 1),
(48, 'bicky', '$2a$07$usesomesillystringforeSBpSmN76Zkye75UmNihZcd/C99kit1y', 'bicky', 'tamang', 'bickytamang101@gmail.com', 'images.png', 'subscriber', '$2a$07$usesomesillystringforsalt$', '1e0b73849dacd551eacf4977105fe5023273ddda1dbbfb42965d1d35be0651c4160483666fb94f23c921937f7aae860666ec', '9805398530', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(3, '8e89c2129c40a21c0caa0834f20889dd', 1522949350),
(4, 'd7b33a073d2c2717bb438999e31eb944', 1522949287),
(5, '62a05cff60b1b2109e86aaab9a1f8399', 1522948851),
(6, 'a694cc1bb510e76d756ea9fc83ee5297', 1523037865),
(7, '801c85fcc5788420a2102284f2ffc041', 1523031658),
(8, '69d4fc90b29c4672d9e55504fcf91d29', 1523097104),
(9, '83e30f320a357ed8012d029742faf725', 1523181193),
(10, 'ab5f832024edd45c03bef9eb4f4ce38f', 1523207372),
(11, '5171f3df80f7c9d2523f9a7fc939988a', 1523207381),
(12, '9e083098b580655834c57611f1d03dae', 1523246917),
(13, '4f95afdb3de8c5a3d001b99bdc273e5b', 1523359658),
(14, 'e31378be7116aa08fb156d3de793eabb', 1523424735),
(15, '0b8e0e63a9f4083f59485aaa2d97aeca', 1523513960),
(16, 'dfe69784226a03842fcd56003e59697b', 1523516337),
(17, '475b528671a7bf8a1f368d563c76448b', 1523527757),
(18, '1ba6c8e065ff8e4a5c5c8e5c02e117e8', 1523528510),
(19, '39ae9f827f8f0b95d9aab9ec2e05f555', 1523533298),
(20, '264cd6f42fcdb9b09790198d43ae96e3', 1523643862),
(21, 'f4885efb830042bc92905f79717127f0', 1523766325),
(22, '3f382874f3f9f7611a24d4a7b31ad0d6', 1523947842),
(23, 'b6fd38db1a935f4e3f04946be7fef1cc', 1523988182),
(24, '4e3a9efb2727f083ce8bcd89c6089f54', 1524369666),
(25, 'dd9a595f96701b96084ef00ba586f4b1', 1524501657),
(26, '8ca84cfb35a5527343c5502767584e9f', 1524539129),
(27, '798b969ee61e1209e795c121ed0e930b', 1524715287),
(28, 'da5194644d21a2b09100102b109406d8', 1524768035),
(29, '5e526cd99577617b872a1d6818bb6b60', 1525004839),
(30, 'adcaa548f0d6bfccca2d013c2641bd20', 1525016662);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
