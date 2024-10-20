-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 08:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(2, 'tevin', 'odero', 'obiero@gmail.com', '#obi2030');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','archived') DEFAULT 'approved',
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `firstname`, `email`, `gender`, `location`, `status`, `password`, `phone_number`, `lastname`, `address`) VALUES
(48, 'joylene', 'joylene@gmail.com', 'female', 'meru', 'approved', '#Karibu2030', '0722334444', 'joylene', '123 maua road meru'),
(49, 'joylene 2', 'jolyele2@gmail.com', 'female', 'meru', 'approved', '#Joylene22023', '0711223344', 'joylene 3', '43432meru'),
(53, 'proff', 'were@gmail.com', 'female', 'nairobi', 'approved', '123456', '0700001234', 'were', '1123 nairobi'),
(54, 'peter', 'tevin@gmail.com', 'male', 'nyeri', 'approved', '#Karibu2030', '0700001234', 'tevin', 'nyeri 40600');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `reply` varchar(50) DEFAULT NULL,
  `userid` int(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` enum('pending','read','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `phonenumber`, `message`, `receiver`, `reply`, `userid`, `email`, `status`) VALUES
(41, NULL, NULL, NULL, 'Work completed ', 'joyleen@gmail.com', NULL, NULL, 'odongo@gmail.com', 'read'),
(42, NULL, NULL, NULL, 'Well done guys', 'kafar@gmail.com', NULL, NULL, 'joylene@gmail.com', 'pending'),
(43, NULL, NULL, NULL, 'Welcome', 'joylene@gmail.com', NULL, NULL, 'joyleen@gmail.com', 'read'),
(44, NULL, NULL, NULL, 'Oyaa ', 'kafar@gmail.com', NULL, NULL, 'odongo@gmail.com', 'pending'),
(45, NULL, NULL, NULL, 'Oyaa', 'odongo@gmail.com', NULL, NULL, 'kafar@gmail.com', 'pending'),
(46, NULL, NULL, NULL, 'Oyaa', 'odongo@gmail.com', NULL, NULL, 'kafar@gmail.com', 'pending'),
(47, NULL, NULL, NULL, 'abc', 'nur@gmail.com', NULL, NULL, 'jacky@gmail.com', 'pending'),
(48, NULL, NULL, NULL, 'aa', 'jacky@gmail.com', NULL, NULL, 'nur@gmail.com', 'pending'),
(49, NULL, NULL, NULL, 'aab', 'charles@majengo.com', NULL, NULL, 'jacky@gmail.com', 'pending'),
(50, NULL, NULL, NULL, 'wassup\r\n', 'odongo@gmail.com', NULL, NULL, 'kafar@gmail.com', 'pending'),
(51, NULL, NULL, NULL, 'a', 'eltonkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(52, NULL, NULL, NULL, 'a', 'eltonkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(53, NULL, NULL, NULL, 'a', 'eltonkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(54, NULL, NULL, NULL, 'a', 'eltonkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(55, NULL, NULL, NULL, 'a', 'eltonkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(56, NULL, NULL, NULL, 'a', 'eltonkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(57, NULL, NULL, NULL, 'a', 'ambrosedeh@gmail.com', NULL, NULL, 'joyleen@gmail.com', 'pending'),
(58, NULL, NULL, NULL, 'a', 'joyleen@gmail.com', NULL, NULL, 'jolyele2@gmail.com', 'read'),
(59, NULL, NULL, NULL, 's', '', NULL, NULL, 's', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `finance_manager`
--

CREATE TABLE `finance_manager` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` enum('pending','approved','rejected','') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finance_manager`
--

INSERT INTO `finance_manager` (`id`, `firstname`, `lastname`, `gender`, `password`, `account_status`, `email`) VALUES
(1, 'lionel', 'messi', 'male', '123456', 'approved', 'messi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `driver_id` int(50) NOT NULL,
  `order_status` enum('pending','payment_approved','rejected','serviced','occupied','awaiting_payment_approval','exited') NOT NULL DEFAULT 'pending',
  `quantity` int(50) NOT NULL,
  `orderdate` varchar(50) DEFAULT NULL,
  `comment` varchar(50) NOT NULL DEFAULT 'no comment',
  `leave_date` varchar(50) NOT NULL,
  `no_of_days` int(11) GENERATED ALWAYS AS (to_days(str_to_date(`leave_date`,'%Y-%m-%d')) - to_days(str_to_date(`orderdate`,'%Y-%m-%d'))) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `driver_id`, `order_status`, `quantity`, `orderdate`, `comment`, `leave_date`) VALUES
(66, 61, 48, 2, 'serviced', 11, '0000-00-00', 'no comment', ''),
(67, 72, 49, 2, 'serviced', 11, '0000-00-00', 'no comment', ''),
(68, 73, 53, 4, 'serviced', 2, '0000-00-00', 'no comment', ''),
(69, 73, 54, 0, 'occupied', 11, '0000-00-00', 'no comment', ''),
(70, 67, 54, 0, 'awaiting_payment_approval', 11, '0000-00-00', 'no comment', ''),
(71, 76, 54, 3, 'serviced', 5, '0000-00-00', 'no comment', ''),
(72, 76, 54, 3, 'serviced', 22, '0000-00-00', 'no comment', ''),
(73, 77, 54, 0, 'awaiting_payment_approval', 11, '1729399477', 'no comment', '2024-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(50) NOT NULL,
  `finance_manager_id` int(50) DEFAULT NULL,
  `customer_id` int(50) DEFAULT NULL,
  `amount` int(50) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_code` varchar(50) DEFAULT NULL,
  `product_id` int(50) NOT NULL,
  `payment_status` enum('pending','approved','rejected') NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `finance_manager_id`, `customer_id`, `amount`, `payment_date`, `transaction_code`, `product_id`, `payment_status`, `supplier_id`, `order_id`) VALUES
(33, NULL, 49, 369, '2024-06-19 12:45:30', 'AHGDHFG123', 54, 'approved', 0, ''),
(34, NULL, 49, 1599, '2023-07-18 09:46:03', 'AHGDHFG123', 56, 'approved', 0, '56,57'),
(35, NULL, 48, 0, '2024-07-17 06:42:59', 'AAAAAAA111', 59, 'pending', 0, '59'),
(36, NULL, 48, 1353, '2024-07-21 03:42:41', 'ASDFGHUJIO', 61, 'pending', 0, '61'),
(37, 1, NULL, 1353, '2024-07-24 10:24:21', 'ASDFGHUJIO', 61, 'approved', 1, ''),
(38, NULL, 48, 5658, '2024-07-30 22:26:05', 'GFGFDGFDGF', 62, 'pending', 0, '62,63,64,65'),
(39, NULL, 49, 136795, '2024-10-12 15:40:39', '1123ASDCDD', 67, 'approved', 0, '67'),
(40, NULL, 53, 10300, '2024-10-12 18:28:53', '1123ASDCDD', 68, 'approved', 0, '68'),
(41, NULL, 54, 55300, '2024-10-14 18:59:37', '1123ASDCDD', 69, 'pending', 0, '69'),
(42, NULL, 54, 110300, '2024-10-15 10:09:11', '1123ASDCDD', 70, 'pending', 0, '70'),
(43, NULL, 54, 11000, '2024-10-15 11:25:51', '1123ASDCDD', 71, 'approved', 0, '71'),
(44, NULL, 54, 45000, '2024-10-15 11:39:48', '1123ASDCDD', 72, 'approved', 0, '72'),
(45, NULL, 54, 990300, '2024-10-20 04:44:59', '1123ASDCDD', 73, 'pending', 0, '73');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `stock_out` int(50) NOT NULL,
  `product_img_name` varchar(50) NOT NULL,
  `cost_per_item` int(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `supplier_id` int(50) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `total_cost` int(50) GENERATED ALWAYS AS (`cost_per_item` * `stock_in`) VIRTUAL,
  `stock_balance` int(50) GENERATED ALWAYS AS (`quantity` - `stock_out`) VIRTUAL,
  `description` varchar(150) NOT NULL,
  `stock_in` int(50) NOT NULL DEFAULT 0,
  `location` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `property_manager_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `quantity`, `stock_out`, `product_img_name`, `cost_per_item`, `category`, `batch_no`, `purchase_date`, `supplier_id`, `status`, `description`, `stock_in`, `location`, `type`, `property_manager_email`) VALUES
(67, 'Moi Drive Serviced', 22, 0, 'clean.jpg', 10000, 'Serviced', '<br /><b>Warning</b>:  Undefined variable $bno in ', '', 0, 'approved', 'clean rooms with kitched', 22, '', NULL, ''),
(77, 'Mbuta lounge vacation kisumu', 11, 0, 'dcd.jpg', 30000, 'Vacation', '76', '', 0, 'approved', 'clean rooms with kitched', 11, 'Kisumu', 'bnb', 'mimi@gmail.com'),
(81, 'nyeri heights', 3, 0, 'interior.webp', 11223, 'Vacation', '77', '', 0, 'approved', 'plenty plenty plenty oo', 3, 'Nyeri', 'bnb', 'mimi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `property_manager`
--

CREATE TABLE `property_manager` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_manager`
--

INSERT INTO `property_manager` (`id`, `firstname`, `lastname`, `gender`, `password`, `account_status`, `email`) VALUES
(1, 'mimi', 'too', 'male', '#Mimi@2023', 'approved', 'mimi@gmail.com'),
(2, 'bukayo', 'saka', 'male', '#Starboy2030', 'approved', 'starboy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE `room_service` (
  `driver_id` int(50) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `van_id` varchar(50) NOT NULL,
  `status` enum('available','allocated') NOT NULL DEFAULT 'available',
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_service`
--

INSERT INTO `room_service` (`driver_id`, `driver_name`, `email`, `van_id`, `status`, `phone_number`, `password`, `account_status`) VALUES
(2, 'mary', 'mary@gmail', '334', 'allocated', '0711233234', '#Mary2030', 'approved'),
(3, 'mark', 'mark@gmail', '11234', 'allocated', '0733224411', '#Mark2030', 'approved'),
(4, 'cyril', 'cyril@gmai.l', '765', 'available', '0788663453', '#Cyril2030', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `room_service_manager`
--

CREATE TABLE `room_service_manager` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_service_manager`
--

INSERT INTO `room_service_manager` (`id`, `firstname`, `lastname`, `gender`, `password`, `account_status`, `email`) VALUES
(1, 'mimi', 'too', 'male', '#Sisi@2023', 'approved', 'sisi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_manager`
--
ALTER TABLE `finance_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_manager`
--
ALTER TABLE `property_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `room_service_manager`
--
ALTER TABLE `room_service_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `finance_manager`
--
ALTER TABLE `finance_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `property_manager`
--
ALTER TABLE `property_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_service`
--
ALTER TABLE `room_service`
  MODIFY `driver_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_service_manager`
--
ALTER TABLE `room_service_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
