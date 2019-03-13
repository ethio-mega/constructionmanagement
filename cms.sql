-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2019 at 09:36 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

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
-- Table structure for table `approved_pr`
--

CREATE TABLE `approved_pr` (
  `id` int(11) NOT NULL,
  `material_description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `approved_date` date NOT NULL,
  `date_to_submit` date NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `unit` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `remark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_pr`
--

INSERT INTO `approved_pr` (`id`, `material_description`, `quantity`, `approved_date`, `date_to_submit`, `requested_by`, `unit`, `unit_price`, `total_price`, `remark`) VALUES
(11, 'Fero ', 21, '2019-03-13', '0000-00-00', ' yidnek ', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bidding_request`
--

CREATE TABLE `bidding_request` (
  `id` int(11) NOT NULL,
  `purchasor_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `standard` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding_request`
--

INSERT INTO `bidding_request` (`id`, `purchasor_name`, `type`, `standard`, `amount`, `remarks`) VALUES
(1, 'joseph awoke', 'john', 'sdk', 323, ''),
(2, 'yoseph awoke', 'Fero', '1stfdgvd', 200, ''),
(4, 'fcdjfbh', 'Bricks', '1stfsfs', 3000, ''),
(26, 'almaz', 'gobez', 'temari', 444, 'nat');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_record`
--

CREATE TABLE `inventory_record` (
  `id` int(11) NOT NULL,
  `material_description` text NOT NULL,
  `delivered_date` date NOT NULL,
  `delivered_by` varchar(30) NOT NULL,
  `unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `remark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_record`
--

INSERT INTO `inventory_record` (`id`, `material_description`, `delivered_date`, `delivered_by`, `unit`, `quantity`, `unit_price`, `total_price`, `remark`) VALUES
(1, 'sjsj  ', '2019-03-13', '  du  ', 0, 0, 0, 0, 0),
(2, 'cement  ', '2019-03-13', '  yidne  ', 0, 21, 0, 0, 0),
(3, 'cement  ', '2019-03-13', '  yidne  ', 0, 21, 0, 0, 0),
(4, 'cement  ', '2019-03-13', '  yidne  ', 0, 33, 0, 0, 0),
(5, 'cement  ', '2019-03-13', '  yidne  ', 0, 33, 0, 0, 0),
(6, 'cement  ', '2019-03-13', '  yidne  ', 0, 33, 0, 0, 0),
(7, 'cement  ', '2019-03-13', '  yidne  ', 0, 42, 0, 0, 0),
(8, 'cement  ', '2019-03-13', '  yidne  ', 0, 31, 0, 0, 0),
(9, 'cement  ', '2019-03-13', '  yidne  ', 0, 32, 0, 0, 0),
(10, 'cement  ', '2019-03-13', '  yidne  ', 0, 12, 0, 0, 0),
(11, 'cement  ', '2019-03-13', '  yidne  ', 0, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `limited_pro_request`
--

CREATE TABLE `limited_pro_request` (
  `id` int(11) NOT NULL,
  `purchasor_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `standard` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `limited_pro_request`
--

INSERT INTO `limited_pro_request` (`id`, `purchasor_name`, `type`, `standard`, `amount`, `remarks`) VALUES
(1, 'jos', 'john', 'sdk', 323, 'fuc'),
(2, 'hgf', 'Fero', '1st', 200, 'ke'),
(4, 'mebre', 'Bricks', '1st', 3000, 'yo'),
(5, 'jo', 'dfd', 'dfgd', 32, 'u'),
(7, 'yidne', 'jij', 'jkj', 88, 'jj'),
(8, 'mule', 'hj', 'hj', 78, 'hj'),
(20, 'chala', 'chube', 'chebete', 555, 'hoo');

-- --------------------------------------------------------

--
-- Table structure for table `proforma_request`
--

CREATE TABLE `proforma_request` (
  `id` int(11) NOT NULL,
  `purchasor_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `standard` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proforma_request`
--

INSERT INTO `proforma_request` (`id`, `purchasor_name`, `type`, `standard`, `amount`, `remarks`) VALUES
(8, 'Ladlk Slkdj', 'hj', 'hjh', 898, ''),
(9, 'Ladlk Slkdj', 'hkjh', 'uii', 88, 'bnb'),
(12, 'j', 'm', 'l', 8, 'iu'),
(13, 'Ladlk Slkdj', 'jij', 'jkj', 88, 'jj'),
(14, 'abebe', 'beso', 'bela', 333, 'really');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requests`
--

CREATE TABLE `purchase_requests` (
  `id` int(11) NOT NULL,
  `material_description` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `remark` int(11) NOT NULL,
  `acceptance_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requested_materials`
--

CREATE TABLE `requested_materials` (
  `id` int(11) NOT NULL,
  `material_description` text NOT NULL,
  `requested_date` date NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `material_description` text NOT NULL,
  `unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `remark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `material_description`, `unit`, `quantity`, `unit_price`, `total_price`, `remark`) VALUES
(9, 'cement  ', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `e_mail`, `password`, `role`, `status`) VALUES
('sdlk', 'sldjk', 'jo@gmail.com', '2db95e8e1a9267b7a1188556b2013b33', 'Inventory_officer', 0),
('l', 'l', 'l@gmail.com', '2db95e8e1a9267b7a1188556b2013b33', 'purchaser', 1),
('ladlk', 'slkdj', 'lo@gmail.com', '2db95e8e1a9267b7a1188556b2013b33', 'purchaser', 0),
('slkdj', 'lskjd', 'lwskj', 'ee240af7fdcb3919b16636eaa81f1be8', 'purchaser', 0),
('sdg', 'sdf', 'sdfsdf@', 'd9729feb74992cc3482b350163a1a010', 'site_manager', 0),
('yidnek', 'yidnek', 'y@gmail.com', '415290769594460e2e485922904f345d', 'purchaser', 1),
('yidne', 'yidne', 'yid@gmail.com', '415290769594460e2e485922904f345d', 'Inventory_officer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_pr`
--
ALTER TABLE `approved_pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_record`
--
ALTER TABLE `inventory_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_materials`
--
ALTER TABLE `requested_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`e_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_pr`
--
ALTER TABLE `approved_pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `inventory_record`
--
ALTER TABLE `inventory_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `requested_materials`
--
ALTER TABLE `requested_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
