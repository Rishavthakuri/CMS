-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2018 at 06:25 PM
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
(1, 'Bootstrap'),
(2, 'javascript');

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
(1, 12, 'rishav', 'rishavthakuri69@gmail.com', 'Hello this is comment.', '2018-04-03', 'unapproved'),
(2, 16, 'bicky', 'bickytamang101@gmail.com', 'Hello this is comment.', '2018-04-03', 'unapproved');

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
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_tags`, `post_comment_count`, `post_status`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`) VALUES
(12, 'ssdfa', 1, 'published', 1, 'lsalkfmls', 'sdfsd', '2018-03-25', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in nisl ut lacus vestibulum porta. Nulla in blandit mi. Ut egestas fringilla porta. Nullam porttitor convallis pulvinar. Proin faucibus metus id semper finibus. Sed varius rutrum nulla, eu volutpat est elementum et. Nulla in enim iaculis, vestibulum purus sed, lacinia sem.\r\n\r\nDuis laoreet dui vel nibh aliquam venenatis. Donec laoreet diam sed dictum convallis. Nam maximus turpis erat, in eleifend lectus ullamcorper ac. Praesent elementum, elit in posuere sagittis, sapien leo lacinia est, eget condimentum urna ante id tellus. Curabitur quis est posuere, rhoncus diam at, vestibulum dui. Cras hendrerit mauris vitae nibh semper blandit. Ut aliquet tincidunt nulla at aliquam. Donec suscipit vitae tortor non dictum. Donec sed sodales lacus. Proin at elit ac nunc vestibulum iaculis ac at libero. Aliquam gravida libero nibh, eu rhoncus ante tempor et. Quisque eu faucibus ante, eu egestas elit. Donec sagittis velit non mauris mollis convallis.                '),
(16, 'wordpress', 1, 'published', 1, 'Hllo', 'rishav', '2018-03-28', '', '<p>sdf</p>'),
(23, 'wordpress', 0, 'published', 1, 'Hllo', 'rishav', '2018-03-30', '', '<p>sdf</p>'),
(24, 'ssdfa', 0, 'published', 1, 'lsalkfmls', 'sdfsd', '2018-03-30', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in nisl ut lacus vestibulum porta. Nulla in blandit mi. Ut egestas fringilla porta. Nullam porttitor convallis pulvinar. Proin faucibus metus id semper finibus. Sed varius rutrum nulla, eu volutpat est elementum et. Nulla in enim iaculis, vestibulum purus sed, lacinia sem.\r\n\r\nDuis laoreet dui vel nibh aliquam venenatis. Donec laoreet diam sed dictum convallis. Nam maximus turpis erat, in eleifend lectus ullamcorper ac. Praesent elementum, elit in posuere sagittis, sapien leo lacinia est, eget condimentum urna ante id tellus. Curabitur quis est posuere, rhoncus diam at, vestibulum dui. Cras hendrerit mauris vitae nibh semper blandit. Ut aliquet tincidunt nulla at aliquam. Donec suscipit vitae tortor non dictum. Donec sed sodales lacus. Proin at elit ac nunc vestibulum iaculis ac at libero. Aliquam gravida libero nibh, eu rhoncus ante tempor et. Quisque eu faucibus ante, eu egestas elit. Donec sagittis velit non mauris mollis convallis.                '),
(25, 'ssdfa', 0, 'published', 1, 'lsalkfmls', 'sdfsd', '2018-03-30', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in nisl ut lacus vestibulum porta. Nulla in blandit mi. Ut egestas fringilla porta. Nullam porttitor convallis pulvinar. Proin faucibus metus id semper finibus. Sed varius rutrum nulla, eu volutpat est elementum et. Nulla in enim iaculis, vestibulum purus sed, lacinia sem.\r\n\r\nDuis laoreet dui vel nibh aliquam venenatis. Donec laoreet diam sed dictum convallis. Nam maximus turpis erat, in eleifend lectus ullamcorper ac. Praesent elementum, elit in posuere sagittis, sapien leo lacinia est, eget condimentum urna ante id tellus. Curabitur quis est posuere, rhoncus diam at, vestibulum dui. Cras hendrerit mauris vitae nibh semper blandit. Ut aliquet tincidunt nulla at aliquam. Donec suscipit vitae tortor non dictum. Donec sed sodales lacus. Proin at elit ac nunc vestibulum iaculis ac at libero. Aliquam gravida libero nibh, eu rhoncus ante tempor et. Quisque eu faucibus ante, eu egestas elit. Donec sagittis velit non mauris mollis convallis.                '),
(26, 'wordpress', 0, 'draft', 1, 'Hllo', 'rishav', '2018-03-30', '', '<p>sdf</p>'),
(27, 'wordpress', 0, 'published', 1, 'Hllo', 'rishav', '2018-03-30', '', '<p>sdf</p>'),
(28, 'ssdfa', 0, 'published', 1, 'lsalkfmls', 'sdfsd', '2018-03-30', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in nisl ut lacus vestibulum porta. Nulla in blandit mi. Ut egestas fringilla porta. Nullam porttitor convallis pulvinar. Proin faucibus metus id semper finibus. Sed varius rutrum nulla, eu volutpat est elementum et. Nulla in enim iaculis, vestibulum purus sed, lacinia sem.\r\n\r\nDuis laoreet dui vel nibh aliquam venenatis. Donec laoreet diam sed dictum convallis. Nam maximus turpis erat, in eleifend lectus ullamcorper ac. Praesent elementum, elit in posuere sagittis, sapien leo lacinia est, eget condimentum urna ante id tellus. Curabitur quis est posuere, rhoncus diam at, vestibulum dui. Cras hendrerit mauris vitae nibh semper blandit. Ut aliquet tincidunt nulla at aliquam. Donec suscipit vitae tortor non dictum. Donec sed sodales lacus. Proin at elit ac nunc vestibulum iaculis ac at libero. Aliquam gravida libero nibh, eu rhoncus ante tempor et. Quisque eu faucibus ante, eu egestas elit. Donec sagittis velit non mauris mollis convallis.                '),
(29, 'knd', 0, 'draft', 2, 'jnaskdjf', 'nkdjsj', '2018-04-06', '', '<p>kjfndsk</p>');

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
  `randSalt` varchar(255) NOT NULL DEFAULT '$2a$07$usesomesillystringforsalt$'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(42, 'Nickson', '$2a$07$usesomesillystringforeSBpSmN76Zkye75UmNihZcd/C99kit1y', 'Nickson', 'siwakoti', 'hello@gmail.com', '', 'subscriber', '$2a$07$usesomesillystringforsalt$'),
(43, 'rishav', '$2a$07$usesomesillystringfore0bNOHvoVFqRynUax.4cT8rN1c1MlCjO', 'Rishav', 'Malla', 'rishavthakuri69@gmail.com', '', 'subscriber', '$2a$07$usesomesillystringforsalt$'),
(44, 'demo', '$2a$07$usesomesillystringforeSWF4dTeO9dx/O0tpWiSQPZFXmhFPGkC', 'demo', '', 'demo@gmail.com', '', 'admin', '$2a$07$usesomesillystringforsalt$');

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
(6, 'a694cc1bb510e76d756ea9fc83ee5297', 1523031914),
(7, '801c85fcc5788420a2102284f2ffc041', 1523031658);

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
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
