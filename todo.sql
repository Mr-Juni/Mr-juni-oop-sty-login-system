-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2019 at 09:00 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(100) NOT NULL,
  `user_id` int(254) NOT NULL,
  `task_title` varchar(254) NOT NULL,
  `task_description` text NOT NULL,
  `task_accomplish_method` varchar(254) NOT NULL,
  `task_time` varchar(254) NOT NULL,
  `task_date` varchar(254) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `user_id`, `task_title`, `task_description`, `task_accomplish_method`, `task_time`, `task_date`, `status`) VALUES
(1, 2, 'Play video game', 'I will play video game before i read my books.', 'I will play it with my friend', '04:36 AM', '2019-02-11', 0),
(2, 2, 'Go movies', 'I am goin to watch a movie with my girlfrd', '', '04:40 AM', '2019-02-09', 0),
(3, 1, 'Go cycling with friend', 'I will join my bestie and my girlfrd and go for a fun.', 'We would go to the top of the mountain at the east wing', '04:43 AM', '2019-02-09', 0),
(4, 3, 'Make a movie', 'I wanr to make a nigerian movie', '', '09:43 AM', '2019-02-14', 0),
(5, 1, 'Go to work', 'I am programmer and i code a living', '', '09:50 AM', '2019-02-15', 0),
(6, 1, 'Eat a lunch with friends', 'Mike is coming to town', '', '09:51 AM', '2019-02-12', 0),
(7, 3, 'Repair Laptop', 'I need to change my os of mylaptop', '', '09:52 AM', '2019-02-14', 0),
(8, 3, 'See my babe', 'It is her birthday, we are going out for dinner', '', '09:52 AM', '2019-02-15', 0),
(9, 2, 'Friend', 'Tu', '', '09:59 AM', '2019-02-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `ip` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `name`, `ip`) VALUES
(1, 'juniCodefire', '$2y$10$9Fp0gyUvi/I4giqtbi1llOOYWXmENFKCWekCrS6j3oKIOynOviEFS', 'junipreach2017@gmail.com', 'Obi okechukwu', '127.0.0.1'),
(2, 'juniflyer', '$2y$10$FmguCsPbDZHlP.P5.Y10Pesoihl41xenbsXEpRSWEXc2Xrtp8vWiu', 'juniworld2017@gmail.com', 'David chukwunonye', '127.0.0.1'),
(3, 'tino', '$2y$10$WAVBQATMv2s29Ce3BsqrxO1FzIIO7iDKF4vKO3WsAzLWoMYyqlnIW', 'tino@gmail.com', 'Tino black', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
