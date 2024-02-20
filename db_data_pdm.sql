-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 05:18 AM
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
-- Database: `db_data_pdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `i_error_application`
--

CREATE TABLE `i_error_application` (
  `ERROR_ID` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `MODULES` varchar(100) DEFAULT NULL,
  `CONTROLLER` varchar(200) DEFAULT NULL,
  `FUNCTION` varchar(200) DEFAULT NULL,
  `ERROR_LINE` varchar(30) DEFAULT NULL,
  `ERROR_MESSAGE` varchar(1000) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `PARAM` varchar(300) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `CREATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i_error_application`
--

INSERT INTO `i_error_application` (`ERROR_ID`, `ID_USER`, `MODULES`, `CONTROLLER`, `FUNCTION`, `ERROR_LINE`, `ERROR_MESSAGE`, `STATUS`, `PARAM`, `CREATE_DATE`, `CREATE_TIME`, `DELETE_MARK`, `UPDATE_BY`, `UPDATE_DATE`) VALUES
(7059, 's9984', 'WQDQ', 'ab', 'ab', 'ab', 'WQR', 'ab', 'ab', '2024-02-20', '2024-02-20 03:19:41', '1', NULL, '2024-02-20 03:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_user`
--

CREATE TABLE `jenis_user` (
  `ID_JENIS_USER` int(11) NOT NULL,
  `NAME_JENIS_USER` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_user`
--

INSERT INTO `jenis_user` (`ID_JENIS_USER`, `NAME_JENIS_USER`) VALUES
(0, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MENU_ID` varchar(3) NOT NULL,
  `ID_LEVEL` varchar(3) DEFAULT NULL,
  `MENU_NAME` varchar(300) DEFAULT NULL,
  `MENU_LINK` varchar(300) DEFAULT NULL,
  `MENU_ICON` varchar(300) DEFAULT NULL,
  `PARENT_ID` varchar(30) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MENU_ID`, `ID_LEVEL`, `MENU_NAME`, `MENU_LINK`, `MENU_ICON`, `PARENT_ID`, `CREATE_BY`, `CREATE_DATE`, `DELETE_MARK`, `UPDATE_BY`, `UPDATE_DATE`) VALUES
('A36', '2', 'MENU', 'http://127.0.0.1:8000/menubar', 'fas fa-home', '1', 'devi', '2024-02-19', '1', NULL, '2024-02-19 06:19:49'),
('k76', 'y44', 'MENU BARU', 'http://127.0.0.1:8000/me', 'fas fa-h', '2', 'devi', '2024-02-19', '1', NULL, '2024-02-19 09:15:47'),
('p16', '2', 'MENU AB', 'http://127.0.0.1:8000/me', 'fas fa-home', '2', 'devi', '2024-02-19', '0', NULL, '2024-02-19 07:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `menu_level`
--

CREATE TABLE `menu_level` (
  `ID_LEVEL` varchar(3) NOT NULL,
  `LEVEL` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_level`
--

INSERT INTO `menu_level` (`ID_LEVEL`, `LEVEL`) VALUES
('1', 'Mudah'),
('2', 'Sedang'),
('y44', 'Mudahh');

-- --------------------------------------------------------

--
-- Table structure for table `menu_user`
--

CREATE TABLE `menu_user` (
  `NO_SETTING` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `MENU_ID` varchar(3) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `CREATE_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_user`
--

INSERT INTO `menu_user` (`NO_SETTING`, `ID_USER`, `MENU_ID`, `CREATE_DATE`, `CREATE_TIME`, `DELETE_MARK`, `UPDATE_BY`, `UPDATE_DATE`) VALUES
(3962, 'P2133', 'A36', '2024-02-19', '2024-02-19 10:04:17', '1', NULL, '2024-02-19 10:04:17'),
(4940, 'P2133', 'k76', '2024-02-19', '2024-02-19 10:20:43', '1', NULL, '2024-02-19 10:20:43'),
(6797, 'P2133', 'p16', '2024-02-19', '2024-02-19 10:21:29', '0', NULL, '2024-02-19 10:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_USER` varchar(30) NOT NULL,
  `NAMA_USER` varchar(60) DEFAULT NULL,
  `USERNAME` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `NO_HP` varchar(30) DEFAULT NULL,
  `WA` varchar(30) DEFAULT NULL,
  `PIN` varchar(30) DEFAULT NULL,
  `ID_JENIS_USER` int(11) DEFAULT NULL,
  `STATUS_USER` varchar(30) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_USER`, `NAMA_USER`, `USERNAME`, `password`, `email`, `NO_HP`, `WA`, `PIN`, `ID_JENIS_USER`, `STATUS_USER`, `DELETE_MARK`, `CREATE_BY`, `CREATE_DATE`, `UPDATE_BY`, `UPDATE_DATE`) VALUES
('A1854', 'DeviAA', 'devAA', '$2y$12$8.3v2cQG/d/v6T1Ezc5AoOxX.7HFMm9h3Aj9wD2f3MNxFbtJAZUwC', 'devianggiaata41@gmail.com', '8294810924', '2141241', '125215', 1, '1', '0', 'system', '2024-02-19', NULL, '2024-02-19 12:08:19'),
('b2039', 'r23325', '53256236', '$2y$12$bqP8KntCbiWbT.2Npo97Ju2nrIUha1HklCNc7N9ZDKBO6atrqCa7O', '236@gmIL.COM', '2353263634', '5236236326', '3632623', 1, '1', '0', 'Devi Anggita', '2024-02-19', NULL, '2024-02-19 14:54:46'),
('f9579', 'ANGGITA', 'ANGGITA', '$2y$12$gy/IvjNKkV4aISODfU968ekEOj2D.RWNfCJPTG44JwgioiyIsFkD.', 'anggita@gmail.com', '3425463275623', '2533253265', '326326326', 1, '1', '1', 'Devi Anggita', '2024-02-20', NULL, '2024-02-20 03:54:21'),
('g4450', 'SASAqdwASA', 'SASAqs', '324234325', 'sasa@gmail.com', '34643647', '743737', '743747', 1, '1', '1', 'Devi Anggita', '2024-02-20', NULL, '2024-02-20 03:44:48'),
('i2030', 'devisaf', 'devi', NULL, 'deviangg79ita41@gmail.com', '12521', '25125', '251', 1, '1', '0', 'system', '2024-02-19', NULL, '2024-02-19 02:49:05'),
('M1356', 'Devi', 'SADASFAF', '$2y$12$KpBoWcC9uUAGT6TDaf7K5e2R4rO6ny86U3.EUByPzoQikFd9HtKFG', 'devianggita41AFS@gmail.com', '6677777866', '8768789687678', '678698687', 1, '1', '1', 'Devi Anggita', '2024-02-19', NULL, '2024-02-19 14:44:25'),
('m5479', 'wrqw4634', 'wrqwr', NULL, 'rwqrwq@gmail.com', '35365', '3636', '6323', 1, '1', '0', 'system', '2024-02-19', NULL, '2024-02-19 14:26:10'),
('O0170', 'sa', 'ad', '$2y$12$e9BpkNwWkeAYH7ViMQwvYO3.KFFVxMZgh2GaXiml8z57NtKzt61V2', 'adisurya1a4@mail.com', 'add', 'ad', 'd', 1, '1', '1', 'Devi Anggita', '2024-02-20', NULL, '2024-02-20 03:28:34'),
('P2133', 'putra', 'putra', '$2y$12$BJ2vfMNhzJFbKjaPhTovH.9WIXiwsMqhk3UMR3QG5VH1jbSNdOb26', 'putra123@gmail.com', '124215', '52215', '125215', 1, '1', '1', 'system', '2024-02-18', NULL, '2024-02-18 12:31:50'),
('Q4491', 'Adi SUrya', 'surya', '$2y$12$WRRVqxE1D3/A3PrzdjlwIu04x8O8QBD6TQGv0zTriqNT7cG9nVagO', 'surya123@gmail.com', '215325', '23523', '53235', 1, '1', '0', 'system', '2024-02-19', NULL, '2024-02-19 10:58:46'),
('s9984', 'Devi', 'Devi Anggita', '$2y$12$ZUCwjU2eg8FGCm7I0IKG/OAvJyVUinfc45YNiza2CzCZRyvviHthW', 'devianggita41@gmail.com', NULL, NULL, NULL, 0, '1', '1', 'system', '2024-02-19', NULL, '2024-02-19 14:24:38'),
('U2991', 'vi', 'vi', '$2y$12$lbvgnnA.wzmz89X6RUdLqO367sSrdY5THLfc7AsjGKmxYVPz2oAOu', 'vi@gmail.vcom', '347286487235', '5788356728568', '2537632875', 1, '1', '1', 'Devi Anggita', '2024-02-20', NULL, '2024-02-20 03:22:05'),
('y5599', 'Devi', 'RTR2364', '$2y$12$rJFn67xacy.9p0PdZATm2.Sdd8rr3jeQewrRtS2PHNPqqsOXGF9PC', 'devianggita64342641@gmail.com', '022192', '4373474', '74323', 1, '1', '1', 'Devi Anggita', '2024-02-19', NULL, '2024-02-19 14:56:54'),
('z3519', '6675', '654564', '$2y$12$OnyzpU8IEwWv9FIrzIzBUODSgBiXjwImTtzY6Dtqso4CRNu.BcK/u', '67756@gmail.com', '3256326', '46436', '62332', 1, '1', '1', 'Devi Anggita', '2024-02-20', NULL, '2024-02-20 03:38:54'),
('Z7664', 'Devi', 'err', '$2y$12$JfSgOhfZCuQcUh2E7lWJP.5GOd4JRFqt/DPPHQT1/jksOQpeZwqE2', 'devianggita41werwe@gmail.com', '022192', '5343643', '4643747', 1, '1', '1', 'Devi Anggita', '2024-02-19', NULL, '2024-02-19 14:41:25'),
('Z7714', 'Devie5325', '5321', '$2y$12$rJXZYI8VRuZ5GQ24bJe0XuQ1RhzHTZ7DA/wGjASWeauG3foO7mbj2', 'devianggita43521@gmail.com', '022192', '6243431', '3161414', 1, '1', '1', 'Devi Anggita', '2024-02-19', NULL, '2024-02-19 14:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `NO_ACTIVITY` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `DISCRIPSI` varchar(300) DEFAULT NULL,
  `STATUS` varchar(30) DEFAULT NULL,
  `MENU_ID` varchar(3) DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`NO_ACTIVITY`, `ID_USER`, `DISCRIPSI`, `STATUS`, `MENU_ID`, `DELETE_MARK`, `CREATE_BY`, `CREATE_DATE`) VALUES
(1569, 'i2030', 'deswaf', 'aktifARDEw', 'k76', '0', 'devi', '2024-02-19'),
(7878, 'P2133', 'jhjkh', 'fghg', 'k76', '1', 'devi', '2024-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `user_foto`
--

CREATE TABLE `user_foto` (
  `NO_FOTO` int(11) NOT NULL,
  `ID_USER` varchar(30) DEFAULT NULL,
  `FOTO` varchar(200) DEFAULT NULL,
  `CREATE_BY` varchar(30) DEFAULT NULL,
  `CREATE_DATE` date DEFAULT NULL,
  `DELETE_MARK` varchar(1) DEFAULT NULL,
  `UPDATE_BY` varchar(30) DEFAULT NULL,
  `UPDATE_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_foto`
--

INSERT INTO `user_foto` (`NO_FOTO`, `ID_USER`, `FOTO`, `CREATE_BY`, `CREATE_DATE`, `DELETE_MARK`, `UPDATE_BY`, `UPDATE_DATE`) VALUES
(4149, 'f9579', '_1708401261.jpeg', 'Devi Anggita', '2024-02-20', '1', NULL, '2024-02-20 03:54:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `i_error_application`
--
ALTER TABLE `i_error_application`
  ADD PRIMARY KEY (`ERROR_ID`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `jenis_user`
--
ALTER TABLE `jenis_user`
  ADD PRIMARY KEY (`ID_JENIS_USER`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MENU_ID`),
  ADD KEY `ID_LEVEL` (`ID_LEVEL`);

--
-- Indexes for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`ID_LEVEL`);

--
-- Indexes for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`NO_SETTING`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `MENU_ID` (`MENU_ID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `ID_JENIS_USER` (`ID_JENIS_USER`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`NO_ACTIVITY`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `MENU_ID` (`MENU_ID`);

--
-- Indexes for table `user_foto`
--
ALTER TABLE `user_foto`
  ADD PRIMARY KEY (`NO_FOTO`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `i_error_application`
--
ALTER TABLE `i_error_application`
  MODIFY `ERROR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9093;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `i_error_application`
--
ALTER TABLE `i_error_application`
  ADD CONSTRAINT `i_error_application_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID_LEVEL`) REFERENCES `menu_level` (`ID_LEVEL`);

--
-- Constraints for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD CONSTRAINT `menu_user_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`),
  ADD CONSTRAINT `menu_user_ibfk_2` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_JENIS_USER`) REFERENCES `jenis_user` (`ID_JENIS_USER`);

--
-- Constraints for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD CONSTRAINT `user_activity_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`),
  ADD CONSTRAINT `user_activity_ibfk_2` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`),
  ADD CONSTRAINT `user_activity_ibfk_3` FOREIGN KEY (`MENU_ID`) REFERENCES `menu` (`MENU_ID`);

--
-- Constraints for table `user_foto`
--
ALTER TABLE `user_foto`
  ADD CONSTRAINT `user_foto_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
