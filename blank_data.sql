-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 01:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bug_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `age`, `gender`, `number`, `image`, `role`, `active`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', 20, 'male', '9756234185', '2.png', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(20) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `project_id` int(20) NOT NULL,
  `tester_id` int(20) NOT NULL,
  `dev_id` int(20) NOT NULL,
  `bug_name` text NOT NULL,
  `create_on` date NOT NULL,
  `close_on` date NOT NULL,
  `page_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `skill` varchar(255) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `developer_project`
--

CREATE TABLE `developer_project` (
  `id` int(10) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `ad_id` int(255) NOT NULL,
  `dev_id` int(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `bug_id` int(100) NOT NULL,
  `create_on` date NOT NULL,
  `close_on` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `developer_comment` varchar(255) NOT NULL,
  `tester_comment` varchar(255) NOT NULL,
  `active` int(2) NOT NULL,
  `tes_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `create_on` date NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `message`, `create_on`, `type`) VALUES
(1, 'bug', ' 123', '2024-04-01', ''),
(2, 'bug', ' 9636', '2024-04-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

CREATE TABLE `tester` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tester_project`
--

CREATE TABLE `tester_project` (
  `id` int(10) NOT NULL,
  `project_name` int(255) NOT NULL,
  `ad_id` int(255) NOT NULL,
  `tester_id` int(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `create_on` date NOT NULL,
  `close_on` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tester_comment` varchar(255) NOT NULL,
  `developer_comment` varchar(255) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `dev_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` enum('admin','developer','tester') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `gender`, `email`, `password`, `number`, `birth_date`, `image`, `role`) VALUES
(1, 'Ajay', 23, 'male', 'admin@gmail.com', '1234', '9756234185', '2001-05-10', 'download.jpg', 'admin'),
(2, 'Ankur', 25, 'male', 'developer@gmail.com', '1234', '9756234125', '2001-02-20', 'download.jpg', 'developer'),
(3, 'darshil', 24, 'male', 'tester@gmail.com', '1234', '9756234185', '2001-06-10', 'download.jpg', 'tester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dev_id` (`dev_id`),
  ADD KEY `tester_id` (`tester_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `pro_id` (`project_id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `developer_project`
--
ALTER TABLE `developer_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `bug_id` (`bug_id`),
  ADD KEY `dev_id` (`dev_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tester`
--
ALTER TABLE `tester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tester_project`
--
ALTER TABLE `tester_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dev_id` (`tester_id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `tester_project_ibfk_1` (`project_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developer_project`
--
ALTER TABLE `developer_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tester`
--
ALTER TABLE `tester`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tester_project`
--
ALTER TABLE `tester_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
