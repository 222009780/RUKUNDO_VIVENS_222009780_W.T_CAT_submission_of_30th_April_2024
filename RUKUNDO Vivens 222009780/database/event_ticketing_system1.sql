-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 10:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_ticketing_system1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `Date` varchar(150) DEFAULT NULL,
  `NumberOfTickets` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `customer_id`, `Date`, `NumberOfTickets`, `ticket_id`) VALUES
(1, 1, '2024-03-01', 2, 1),
(3, 2, '2024-03-03', 1, 2),
(4, 1, '2024-03-04', 4, 1),
(6, 1, '2024-03-01', 2, 1),
(7, 3, '', 10, 3),
(8, 3, '', 10, 3),
(9, 3, '', 10, 3),
(10, 2, '2024-04-29', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `FirstName`, `LastName`, `Phone`, `Address`, `Email`, `Password`) VALUES
(1, 'Mugabo', '078644', '078644', 'kigali', 'mugabo@gmail.com', ''),
(2, 'Mukuta', '09876554', '09876554', 'Byumba', 'muguta2gmail.com', ''),
(3, 'piter', '07864409', '07864409', 'kigali_mbumba', '07864409', ''),
(5, 'Jean Pierre', 'NIYONSHUTI', '+250786407569', 'kigali', 'jeanpierreniyonshuti@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `date`, `description`, `category`) VALUES
(1, 'Music Concert', '2024-03-15', 'Live performance by various artists', 'Concert'),
(2, 'Art Exhibition', '2024-04-20', 'Showcasing contemporary art pieces', 'Exhibition'),
(3, 'Music Concert', '2024-03-15', 'Live performance by various artists', 'Concert'),
(4, 'Tech Conference', '2024-06-25', 'Bringing together industry experts to discuss the latest trends in technology', 'Conference'),
(7, 'Jean Pierre NIYONSHUTI', '2024-04-29', 'A manager for passionate ', 'A'),
(8, '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `event_id`, `type`, `price`, `available`) VALUES
(1, 2, 'General Admission', '20.00', 100),
(2, 1, 'VIP', '50.00', 50),
(3, 3, 'Standard', '15.00', 200),
(4, 4, 'Regular', '10.00', 150),
(5, 2, 'Early Bird', '100.00', 50),
(6, 2, 'General Admission', '20.00', 100),
(7, 3, 'Liquid', '99999999.99', 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `Name`, `Address`, `Capacity`, `ContactPerson`) VALUES
(1, 'Hitimana', 'Kigali _Huye', 1000000, '786400000'),
(2, 'peter', '1200', 1200, '07865'),
(4, 'peter', '1200', 1200, '07865'),
(6, 'HARAMBINEZA Daniel ', 'kigali', 20000, '0729554144');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `fk_booking_customer` (`customer_id`),
  ADD KEY `fk_booking_ticket` (`ticket_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_ticket_event` (`event_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk_booking_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
