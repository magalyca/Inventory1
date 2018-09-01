-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 05:57 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_inventory`
--

CREATE TABLE `all_inventory` (
  `account_manager` varchar(32) NOT NULL,
  `tag_number` int(16) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(64) NOT NULL,
  `building_num` int(11) NOT NULL,
  `building_name` varchar(32) NOT NULL,
  `room_num` varchar(8) NOT NULL,
  `asset_key` int(11) NOT NULL,
  `asset_description` varchar(64) NOT NULL,
  `cost` int(11) NOT NULL,
  `serial_num` varchar(8) NOT NULL,
  `invoice` varchar(8) NOT NULL,
  `po_num` varchar(8) NOT NULL,
  `status` varchar(16) NOT NULL,
  `comment` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_inventory`
--

INSERT INTO `all_inventory` (`account_manager`, `tag_number`, `date`, `description`, `building_num`, `building_name`, `room_num`, `asset_key`, `asset_description`, `cost`, `serial_num`, `invoice`, `po_num`, `status`, `comment`) VALUES
('Figueroa, Andres', 11111, '0000-00-00', 'COMPUTER, NOTEBOOK DELL LATITUDE E6400', 115, 'E-ENGR E', '3.267', 78301, 'Coll of Engg & Computer Sci', 1957, '1A222', 'XH57FC35', '57189', 'F', ''),
('Tomai, Emmet', 55555, '2013-09-03', 'TOSHIBA LAPTOP SATELLITE', 115, 'E-ENGR E', '1.297', 75302, 'Coll of Engg & Computer Sci', 1000, '1A111', 'XD87FR38', '54200', 'F', ''),
('Cruz, Agapito', 65408, '2017-12-03', 'COMPUTER, NOTEBOOK DELL LATITUDE E6400', 115, 'E-ENGR E', '1.294', 75301, 'Coll of Engg & Computer Sci', 1957, '8', 'XD87FR37', '54199', 'F', 'c'),
('Cruz, Agapito', 65428, '2017-12-03', 'COMPUTER, NOTEBOOK DELL LATITUDE E6400', 115, 'E-ENGR E', '1.294', 75301, 'Coll of Engg & Computer Sci', 1957, '2', 'XD87FR37', '54199', 'F', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `asset_user`
--

CREATE TABLE `asset_user` (
  `id` int(11) NOT NULL,
  `tag_num` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_user`
--

INSERT INTO `asset_user` (`id`, `tag_num`, `user_id`, `start_date`, `end_date`) VALUES
(1, 65408, 2, '2017-12-03', NULL),
(2, 65428, 2, '2017-12-03', NULL),
(3, 55555, 3, '2013-09-03', NULL),
(4, 65408, 4, '2009-09-03', '2017-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `missing`
--

CREATE TABLE `missing` (
  `tag_number` int(11) NOT NULL,
  `description` varchar(64) NOT NULL,
  `comment` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing`
--

INSERT INTO `missing` (`tag_number`, `description`, `comment`) VALUES
(74744922, 'Lenovo desktop computer Model 2009', 'Item couldn\'t be found in the designated room'),
(74746187, 'Lenovo desktop computer Model 2009', 'Room does not exist or no longer operated by UTRGV'),
(74746629, 'lenovo desktop computer year 2012', 'Item couldn\'t be found in the designated room'),
(747048531, 'lenovo desktop computer year 2012', 'Item couldn\'t be found in the designated room'),
(747048538, 'lenovo desktop computer year 2012', 'Item couldn\'t be found in the designated room'),
(747049420, 'lenovo desktop computer year 2012', 'Item couldn\'t be found in the designated room'),
(747049536, 'lenovo desktop computer year 2012', 'Item couldn\'t be found in the designated room'),
(747071393, 'Lenovo desktop computer Model 2009', 'Room does not exist or no longer operated by UTRGV'),
(747072681, 'Lenovo desktop computer 2009', 'Item couldn\'t be found in the designated room'),
(747077848, 'Lenovo desktop computer 2009', 'Item couldn\'t be found in the designated room');

-- --------------------------------------------------------

--
-- Table structure for table `surplus`
--

CREATE TABLE `surplus` (
  `tag_number` int(11) NOT NULL,
  `comment` varchar(64) NOT NULL,
  `surplus_by` varchar(32) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surplus`
--

INSERT INTO `surplus` (`tag_number`, `comment`, `surplus_by`, `date`) VALUES
(43273, 'taken to Surplus pre-2009', 'Perez, Maria', '2008-12-23'),
(46075, 'taken to Surplus pre-2009', 'de Leon, Martin', '2008-11-23'),
(46756, 'taken to Surplus January 2017', 'Cantu, Eli', '2017-01-10'),
(52837, 'per 2012 email from Omar Cantu', 'Cantu, Omar', '2012-08-23'),
(53994, 'sent to Surplus pre-2016', 'Cantu, Eli', '2015-12-10'),
(61959, 'per Brenda Ley', 'Ley, Brenda', '0000-00-00'),
(63596, 'per Brenda Ley', 'Ley, Brenda', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `tag_number` int(11) NOT NULL,
  `date_transfered` date NOT NULL,
  `transfer_from` varchar(32) NOT NULL,
  `transfer_to` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`tag_number`, `date_transfered`, `transfer_from`, `transfer_to`) VALUES
(55555, '2013-09-03', 'Smith , Will', 'Tomai, Emmet'),
(65408, '2017-12-03', 'David ', 'Cruz, Agapito'),
(65428, '2017-12-03', 'David ', 'Cruz, Agapito');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `Name` varchar(32) NOT NULL,
  `tag_num` int(11) NOT NULL,
  `Comment` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`Name`, `tag_num`, `Comment`) VALUES
('Cruz, Agapito', 65408, 'change equipment location'),
('Cruz, Agapito', 65428, 'change equipment location');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `role`) VALUES
(1, 'admin@admin', 'admin', 0),
(2, 'agapito@utrgv', 'test', 1),
(3, 'tomai@utrgv', 'test1', 1),
(4, 'david@it.utrgv', 'test2', 1),
(7, 'maga@maga', 'maga', 0),
(8, 'eli@cantu', 'eli', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_inventory`
--
ALTER TABLE `all_inventory`
  ADD PRIMARY KEY (`tag_number`);

--
-- Indexes for table `asset_user`
--
ALTER TABLE `asset_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing`
--
ALTER TABLE `missing`
  ADD PRIMARY KEY (`tag_number`);

--
-- Indexes for table `surplus`
--
ALTER TABLE `surplus`
  ADD PRIMARY KEY (`tag_number`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`tag_number`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`tag_num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `tag_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65429;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
