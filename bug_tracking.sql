-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 12:49 PM
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

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `admin_id`, `project_id`, `tester_id`, `dev_id`, `bug_name`, `create_on`, `close_on`, `page_url`, `description`, `status`, `image`, `active`) VALUES
(1, 1, 1, 1, 1, 'css', '2024-03-23', '2024-03-30', '123', 'php', 'pending', '2.png', 1),
(2, 1, 1, 1, 2, 'css proper format in project', '2024-03-26', '2024-03-30', 'http://localhost/Bug_Tracking_System/login.php', 'proper set css', 'pending', 'test.png', 1);

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

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`id`, `name`, `email`, `age`, `password`, `gender`, `number`, `image`, `skill`, `active`) VALUES
(1, 'Ajay', 'ajay@gmail.com', 23, '1234', 'male', '9723567455', 'download.jpg', 'php , javascript ', 1),
(2, 'Isha', 'isha@gmail.com', 22, '81dc9bdb52d04dc20036', 'female', '985624123', '4944a64cf17bb54fc27172750d5c1422', 'php , css , html', 1),
(9, 'Ankur', 'ankur@gmail.com', 25, '1234', 'male', '9723567455', 'download.jpg', 'java developer', 1),
(11, 'Rutvi', 'rutvi@gmail.com', 22, '1234', 'female', '6654785415', '1f.png', 'marn', 1);

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

--
-- Dumping data for table `developer_project`
--

INSERT INTO `developer_project` (`id`, `project_name`, `ad_id`, `dev_id`, `task_name`, `bug_id`, `create_on`, `close_on`, `status`, `description`, `developer_comment`, `tester_comment`, `active`, `tes_status`) VALUES
(1, 'php project', 1, 2, 'crudsdfdsf', 1, '2024-03-23', '2024-03-30', 'not about', 'vgvnhsfsf', '', 'check and reply11', 1, ''),
(2, 'Ai System', 1, 1, 'crud', 1, '2024-03-23', '2024-03-27', 'pending', 'vgvnh', '', 'check', 1, '');

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

--
-- Dumping data for table `tester`
--

INSERT INTO `tester` (`id`, `name`, `email`, `password`, `age`, `gender`, `number`, `image`, `active`) VALUES
(1, 'Ajay', 'ajay@gmail.com', '1234', 20, 'male', '9723567455', 'download.jpg', 1),
(9, 'Isha', 'isha@gmail.com', '1234', 22, 'female', '985624123', '1f.png', 1),
(10, 'shubham', 'shubham@gmail.com', '1234', 22, 'male', '68593652417', '2.png', 1),
(11, 'rauf', 'rauf@gmail.com', '1234', 23, 'male', '68593652417', '2.png', 1);

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

--
-- Dumping data for table `tester_project`
--

INSERT INTO `tester_project` (`id`, `project_name`, `ad_id`, `tester_id`, `task_name`, `create_on`, `close_on`, `status`, `description`, `tester_comment`, `developer_comment`, `active`, `dev_status`) VALUES
(1, 1, 1, 1, '', '2024-03-23', '2024-03-30', 'sucess', 'bjhgjk', '', 'checked11', 1, ''),
(2, 2, 1, 9, '', '2024-03-26', '2024-03-28', 'pending', 'php project complete', '', '', 1, '');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `developer_project`
--
ALTER TABLE `developer_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tester`
--
ALTER TABLE `tester`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tester_project`
--
ALTER TABLE `tester_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
