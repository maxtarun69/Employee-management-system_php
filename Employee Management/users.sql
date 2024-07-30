-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 07:26 PM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `email`, `password`) VALUES
('tarun@admin', 'admin@gmail.com', 'password'),
('tarun@admin', 'admin@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `status` enum('present','absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `attendance_date`, `status`) VALUES
(1, 376174, '2024-07-10', 'absent'),
(2, 439422, '2024-08-10', 'present'),
(4, 376174, '2024-03-04', 'present'),
(7, 112155, '2024-12-07', 'present'),
(8, 112155, '2024-12-07', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Email_Address` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Salary` varchar(50) DEFAULT NULL,
  `StartDate` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Fax` varchar(50) DEFAULT NULL,
  `Image_URL` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_ID`, `First_Name`, `Last_Name`, `Email_Address`, `Address`, `Position`, `Salary`, `StartDate`, `Phone`, `Fax`, `Image_URL`, `Status`) VALUES
(1, 'tarun', 'kurrey', 'tarun@gmail.com', 'gudiyari raipur', 'Hr', '40000', '08-03-2024', '9340814259', '5145273824', NULL, '0'),
(112155, 'Nayan ', 'kurrey', 'kurreynayan652@gmail.com', 'gangpur', 'hr', '40000', '13/7/2024', '9340657789', '6473829374', NULL, NULL),
(376174, 'Muskan', 'Dewangan', 'muskan@gmail.com', 'raipur', 'MCA', '70000', '03/06/2024', '8655467898', '1533726482', NULL, '0'),
(439422, 'suyash', 'shukla', 'shukla@gmaol.com', 'raipur', 'Hr', '50000', '03/06/2024', '8655467867', '1533726482', NULL, '0'),
(857437, 'Nidhi', 'shukla', 'shuklanidhi@gmaol.com', 'raipur cg', 'Hr.', '50000', '03/06/2024', '1234234569', '6473829374', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL,
  `status` enum('Pending','Approved','Refused') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `employee_name`, `leave_type`, `start_date`, `end_date`, `reason`, `status`) VALUES
(3, 'tarun', 'Sick Leave', '2024-01-01', '2024-11-02', 'my personal reason', 'Approved'),
(4, 'shuyash', 'Sick Leave', '2024-03-04', '2024-10-05', 'leave for veakend', 'Pending'),
(5, 'shuyash', 'Sick Leave', '2024-03-04', '2024-03-31', 'for my personal ', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(50) DEFAULT NULL,
  `contact` int(10) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `contact`, `email`, `password`) VALUES
('tarun', 2147483647, 'tarunkurrey02@gmail.com', 'maxx'),
('tarun', 2147483647, 'tarunkurrey02@gmail.com', 'maxx'),
('admin', 2147483647, 'hemant@gmail.com', 'khare');

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

CREATE TABLE `tasklist` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`id`, `employee_id`, `task`, `created_at`, `completed`) VALUES
(1, 1, 'Complete report for Q2', '2024-07-05 17:59:56', 0),
(2, 1, 'Complete report for Q2', '2024-07-06 18:33:58', 0),
(3, 376174, 'compleate my frontend', '2024-07-06 18:40:19', 0),
(4, 376174, 'Give user feed back panel', '2024-07-12 16:21:51', 0),
(5, 112155, 'irrigation', '2024-07-13 13:37:25', 0),
(6, 112155, 'Complete Primary', '2024-07-13 15:46:05', 0),
(7, 376174, 'Primery', '2024-07-13 15:47:04', 0),
(8, 376174, 'compaleate', '2024-07-13 15:47:31', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `task_view`
-- (See below for the actual view)
--
CREATE TABLE `task_view` (
`id` int(11)
,`employee_id` int(11)
,`task` text
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `task_view`
--
DROP TABLE IF EXISTS `task_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `task_view`  AS SELECT `t`.`id` AS `id`, `t`.`employee_id` AS `employee_id`, `t`.`task` AS `task`, `t`.`created_at` AS `created_at` FROM (`tasklist` `t` join `employees` `e` on(`t`.`employee_id` = `e`.`Employee_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasklist`
--
ALTER TABLE `tasklist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=857438;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasklist`
--
ALTER TABLE `tasklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`Employee_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
