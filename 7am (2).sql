-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 07:14 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13
<?php

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `7am`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `com_view`
--
CREATE TABLE `com_view` (
`id` int(11)
,`username` varchar(250)
,`title` varchar(250)
,`description` text
);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(250) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `category`, `filename`, `status`, `date`, `ip`, `posted_by`) VALUES
(1, 'This program is free software; you can redistribute', 'This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.\r\nThis program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.', 'Politics', 'Penguins.jpg', 1, '2018-07-07 08:26:46', '::1', 2),
(2, 'This program is distributed in the hope that', 'This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Politics', 'Penguins.jpg', 1, '2018-07-07 08:29:56', '::1', 2),
(4, 'ou should have received a copy of the GNU', 'This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.\r\n\r\nThis program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details. \r\n\r\nYou should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.', 'Movies', 'Jellyfish.jpg', 1, '2018-07-07 08:56:25', '::1', 4),
(6, 'This program is free software; you can redistribute', 'This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.', 'Sports', 'Hydrangeas.jpg', 1, '2018-07-08 08:51:45', '::1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `terms` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `date_of_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(15) NOT NULL DEFAULT 'Inactive',
  `ip` varchar(50) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `account_status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `gender`, `mobile`, `address`, `city`, `state`, `terms`, `dob`, `date_of_reg`, `status`, `ip`, `avatar`, `account_status`) VALUES
(1, 'ravi kumar', 'ravi@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '9885776740', 'Sr nagar', 'Hyderabad', 'Telangana', '1', '2015-10-10', '2018-07-01 08:55:32', 'Inactive', '::1', '', 'Active'),
(2, 'ram', 'ram@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '2112312312', 'SR Nagar', 'Hyderabad', 'Telangana', '1', '2015-10-10', '2018-07-01 09:08:48', 'Active', '::1', 'Hydrangeas.jpg', 'Active'),
(3, 'rambabburi', 'rambabburi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '9885776740', 'sadasd', 'Hyderabad', 'Andhrapradesh', '1', '2015-10-10', '2018-07-01 09:14:27', 'Active', '::1', 'Penguins.jpg', 'Active'),
(4, 'root', 'admin@mail.com', '202cb962ac59075b964b07152d234b70', 'male', '9885776740', 'as', 'Pune', 'Maharastra', '1', '2015-10-10', '2018-07-01 09:28:34', 'Active', '::1', '', 'Active'),
(5, 'hello', 'hello@mail.com', '202cb962ac59075b964b07152d234b70', 'male', '1212121212', 'sr nagar', 'Hyderabad', 'Telangana', '1', '2015-10-10', '2018-07-02 07:24:33', 'Inactive', '::1', '', 'Active'),
(7, 'lakshmi', 'lakshmi@mail.com', '202cb962ac59075b964b07152d234b70', 'male', '9885776740', 'dsad', 'Pune', 'Madhyapradesh', '1', '2015-10-10', '2018-07-02 07:26:57', 'Inactive', '::1', '', 'Active'),
(8, 'kiran', 'kiran@mail.com', '202cb962ac59075b964b07152d234b70', 'male', '1212121212', 'sdd', 'Hyderabad', 'Andhrapradesh', '1', '2017-11-12', '2018-07-02 07:28:18', 'Inactive', '::1', '', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reg_view`
--
CREATE TABLE `reg_view` (
`id` int(11)
,`username` varchar(250)
,`email` varchar(250)
,`city` varchar(50)
,`mobile` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_of_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `date_of_reg`) VALUES
(1, 'ravi kumar', 'ravi@mail.com', '202cb962ac59075b964b07152d234b70', '2018-06-29 08:36:23'),
(2, 'ram', 'ram@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2018-06-29 08:40:43'),
(3, 'koti', 'koti@mail.com', '4297f44b13955235245b2497399d7a93', '2018-06-29 08:41:39'),
(4, 'laskhmi', 'lakshmi@mail.com', '202cb962ac59075b964b07152d234b70', '2018-06-29 08:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobile`, `pincode`, `city`) VALUES
(1, 'ram', 'ram@mail.com', '202cb962ac59075b964b07152d234b70', 123123123, '500032', 'HYderabad'),
(2, 'Naresh', 'naresh@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 5656565656, '500038', 'Hyderabad'),
(3, 'Suresh', 'suresh@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 9879879871, '500038', 'Hyderabad'),
(4, 'Ravi', 'ravi@mail.com', '202cb962ac59075b964b07152d234b70', 1212121212, '121212', 'Delhi'),
(5, 'lakshmi', 'lakshmi@mail.com', '202cb962ac59075b964b07152d234b70', 1212121212, '123213', 'Chennai'),
(6, 'rak', 'rak@mail.com', '202cb962ac59075b964b07152d234b70', 234344343, 'Hyderabad', '121212'),
(7, 'rak1', 'rak1@mail.com', '202cb962ac59075b964b07152d234b70', 234344343, '121212', 'Hyderabad');

-- --------------------------------------------------------

--
-- Structure for view `com_view`
--
DROP TABLE IF EXISTS `com_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `com_view`  AS  select `register`.`id` AS `id`,`register`.`username` AS `username`,`news`.`title` AS `title`,`news`.`description` AS `description` from (`register` join `news`) ;

-- --------------------------------------------------------

--
-- Structure for view `reg_view`
--
DROP TABLE IF EXISTS `reg_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reg_view`  AS  select `register`.`id` AS `id`,`register`.`username` AS `username`,`register`.`email` AS `email`,`register`.`city` AS `city`,`register`.`mobile` AS `mobile` from `register` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
?>
