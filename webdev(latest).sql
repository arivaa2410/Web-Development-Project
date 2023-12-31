-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 02:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` varchar(5) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `Title`, `Description`, `Time`) VALUES
('N001', 'Loke: Free Prasarana train for the disabled in Klang Valley starting February', 'KAJANG (Dec 21): All OKU card holders will enjoy free public transportation services under Prasarana Malaysia Bhd (Prasarana) from Feb 1 next year, said Transport Minister Anthony Loke Siew Fook.', '2023-12-21 02:15:00'),
('N002', 'As Malaysia’s next king takes up Singapore high-speed rail cause, is it a case of too costly, too late?', 'Malaysia’s government is under sudden pressure to revive a multibillion-dollar high-speed rail (HSR) link to Singapore, after the nation’s king-in-waiting said it should be brought back, sparking public debate on the project three years after it was shelv', '2023-12-19 12:30:00'),
('N003', 'Man goes viral for hogging LRT seat, eating and drinking on the train; RapidKL says he has been advised not to repeat behaviour', 'KUALA LUMPUR — An unidentified RapidKL LRT commuter was filmed displaying inconsiderate behaviour towards other commuters, such as hogging seats on the train during peak hour travel, refusing to remove his bag that he placed on an empty seat, as well as e', '2023-12-11 11:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `StationID` varchar(10) NOT NULL,
  `StationName` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `ArrivalStationID` varchar(10) NOT NULL,
  `Facilities` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`StationID`, `StationName`, `Location`, `ArrivalStationID`, `Facilities`) VALUES
('IP001', 'Ipoh Railway Station', 'Ipoh', 'IP002', 1),
('JB001', 'Johor Bahru Sentral', 'Johor Bahru', 'JB002', 1),
('KK001', 'Kota Kinabalu Railway Station', 'Kota Kinabalu', 'KK002', 0),
('KL001', 'Kuala Lumpur Sentral', 'Kuala Lumpur', 'KL002', 1),
('PG001', 'Penang Sentral', 'Butterworth', 'PG002', 0),
('PT001', 'Putatan', 'Sabah', 'RY001', 0),
('RY001', 'Rayoh', 'Sabah', 'PT001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `TrainID` varchar(10) NOT NULL,
  `TrainName` varchar(255) NOT NULL,
  `TrainType` varchar(255) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`TrainID`, `TrainName`, `TrainType`, `Capacity`) VALUES
('T001', 'Express 101', 'Express', 200),
('T002', 'Local 202', 'Local', 150),
('T003', 'High-Speed 301', 'High-Speed', 300),
('T004', 'Commuter 401', 'Commuter', 180),
('T005', 'Freight 501', 'Freight', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainschedule`
--

CREATE TABLE `trainschedule` (
  `ScheduleID` varchar(10) NOT NULL,
  `TrainID` varchar(10) NOT NULL,
  `DepartureStationID` varchar(10) DEFAULT NULL,
  `DepartureStationName` varchar(255) DEFAULT NULL,
  `DepartureTime` datetime DEFAULT NULL,
  `ArrivalStationID` varchar(10) DEFAULT NULL,
  `ArrivalStationName` varchar(255) DEFAULT NULL,
  `ArrivalTime` datetime DEFAULT NULL,
  `Platform` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainschedule`
--

INSERT INTO `trainschedule` (`ScheduleID`, `TrainID`, `DepartureStationID`, `DepartureStationName`, `DepartureTime`, `ArrivalStationID`, `ArrivalStationName`, `ArrivalTime`, `Platform`) VALUES
('TS001', 'T001', 'IP001', 'Ipoh Railway Station', NULL, 'KL001', 'Kuala Lumpur Sentral', NULL, '1'),
('TS002', 'T002', 'KL001', 'Kuala Lumpur Sentral', NULL, 'PG001', 'Penang Sentral', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `current_password` varchar(255) DEFAULT NULL,
  `new_password` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `username`, `name`, `email`, `current_password`, `new_password`, `birthday`, `country`, `phone`) VALUES
(1, 'Fatimah_04', 'Fatimah binti Abu', 'timah@gmail.com', '10250508', '78542558', '1990-05-15', 'IPOH', '0142766469'),
(2, 'Annura', 'Siti Annura binti Jenab', 'SitiAnnura@yahoo.com', '25050592', '89806472', '1985-08-22', 'KUALA lumpur', '+0194066349');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `country`, `verification_code`, `email_verified_at`, `reset_token`) VALUES
(1, 'Arivaananthan', 'Chegaran', 'Arivaa10', '$2y$10$X03WJtHU.WEYzUcHOlbrEOKtFHMqQBqTZSS4PtM8BtumuApUqqb1S', 'arivaananthanjb@gmail.com', 'Malaysia', '', NULL, NULL),
(3, 'Eswarie', 'Panjacharam', 'Eswarie24', '$2y$10$uX7NHmQgYv3N40pantBDO.BRLEtbTBBRyJTb6EKR2bh89h1Rh47DK', 'eswarieramesh@gmail.com', 'Malaysia', '', NULL, NULL),
(4, 'Chegaran', 'Murugaya', 'Chegaran12', '$2y$10$bGQyZZLej.VEy4.df3WiRudvkSM9RhSdVvAsDbMG20JeYV3klqMZm', 'chegaranmurugaya@gmail.com', 'Malaysia', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`StationID`),
  ADD KEY `StationName` (`StationName`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`TrainID`);

--
-- Indexes for table `trainschedule`
--
ALTER TABLE `trainschedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `train_schedule` (`TrainID`),
  ADD KEY `arrival_station_id_schedule` (`ArrivalStationID`),
  ADD KEY `departure_station_id_schedule` (`DepartureStationID`),
  ADD KEY `departure_station_name_schedule` (`DepartureStationName`),
  ADD KEY `arrival_station_name_schedule` (`ArrivalStationName`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trainschedule`
--
ALTER TABLE `trainschedule`
  ADD CONSTRAINT `arrival_station_id_schedule` FOREIGN KEY (`ArrivalStationID`) REFERENCES `stations` (`StationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrival_station_name_schedule` FOREIGN KEY (`ArrivalStationName`) REFERENCES `stations` (`StationName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departure_station_id_schedule` FOREIGN KEY (`DepartureStationID`) REFERENCES `stations` (`StationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departure_station_name_schedule` FOREIGN KEY (`DepartureStationName`) REFERENCES `stations` (`StationName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `train_schedule` FOREIGN KEY (`TrainID`) REFERENCES `trains` (`TrainID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
