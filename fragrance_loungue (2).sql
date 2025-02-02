-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 11:40 AM
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
(2, 'joy', 'leen', 'TEVIN OBIERO@gmail.com', '#TEVIN OBIERO12345');

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
  `status` enum('pending','approved','rejected','archived') DEFAULT 'pending',
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
(49, 'joylene 2', 'jolyele2@gmail.com', 'female', 'meru', 'approved', '#Joylene22024', '0711223344', 'joylene 3', '43432meru'),
(50, 'aaa', 'aa@gmail.com', 'male', 'sss', 'pending', 'ss', '0811221122', 'aaaa', 'ss');

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
(2, 'mary', 'mary@gmail', '334', 'available', '0711233234', '#Mary2030', 'approved'),
(3, 'mark', 'mark@gmail', '11234', 'allocated', '0733224411', '#Mark2030', 'approved'),
(4, 'cyril', 'cyril@gmail', '765', 'allocated', '0788663453', '#Cyril2030', 'approved');

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
(41, NULL, NULL, NULL, 'Work completed ', 'TEVIN OBIERO@gmail.com', NULL, NULL, 'odongo@gmail.com', 'read'),
(42, NULL, NULL, NULL, 'Well done guys', 'kafar@gmail.com', NULL, NULL, 'odongo@gmail.com', 'pending'),
(43, NULL, NULL, NULL, 'Welcome', 'odongo@gmail.com', NULL, NULL, 'TEVIN OBIERO@gmail.com', 'pending'),
(44, NULL, NULL, NULL, 'Oyaa ', 'kafar@gmail.com', NULL, NULL, 'odongo@gmail.com', 'pending'),
(45, NULL, NULL, NULL, 'Oyaa', 'odongo@gmail.com', NULL, NULL, 'kafar@gmail.com', 'pending'),
(46, NULL, NULL, NULL, 'Oyaa', 'odongo@gmail.com', NULL, NULL, 'kafar@gmail.com', 'pending'),
(47, NULL, NULL, NULL, 'abc', 'nur@gmail.com', NULL, NULL, 'jacky@gmail.com', 'pending'),
(48, NULL, NULL, NULL, 'aa', 'jacky@gmail.com', NULL, NULL, 'nur@gmail.com', 'pending'),
(49, NULL, NULL, NULL, 'aab', 'charles@majengo.com', NULL, NULL, 'jacky@gmail.com', 'pending'),
(50, NULL, NULL, NULL, 'wassup\r\n', 'odongo@gmail.com', NULL, NULL, 'kafar@gmail.com', 'pending'),
(51, NULL, NULL, NULL, 'a', 'TEVIN OBIEROkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(52, NULL, NULL, NULL, 'a', 'TEVIN OBIEROkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(53, NULL, NULL, NULL, 'a', 'TEVIN OBIEROkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(54, NULL, NULL, NULL, 'a', 'TEVIN OBIEROkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(55, NULL, NULL, NULL, 'a', 'TEVIN OBIEROkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(56, NULL, NULL, NULL, 'a', 'TEVIN OBIEROkoth59@gmail.com', NULL, NULL, '<br />\r\n<b>Warning</b>:  Undefined variable $user ', 'pending'),
(57, NULL, NULL, NULL, 'a', 'ambrosedeh@gmail.com', NULL, NULL, 'TEVIN OBIERO@gmail.com', 'pending'),
(58, NULL, NULL, NULL, 'a', 'TEVIN OBIERO@gmail.com', NULL, NULL, 'jolyele2@gmail.com', 'pending');

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
(1, 'lionel', 'messi', 'male', '#Messi2024', 'approved', 'messi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `driver_id` int(50) NOT NULL,
  `order_status` enum('pending','payment_approved','rejected','delivered','received','awaiting_payment_approval') NOT NULL DEFAULT 'pending',
  `quantity` int(50) NOT NULL,
  `orderdate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `driver_id`, `order_status`, `quantity`, `orderdate`) VALUES
(1, 1, 0, 0, 'pending', 0, ''),
(2, 1, 0, 0, 'pending', 0, ''),
(9, 1, 0, 0, 'pending', 0, ''),
(10, 1, 0, 0, 'pending', 0, ''),
(11, 1, 0, 0, 'pending', 0, ''),
(12, 1, 0, 0, 'pending', 0, ''),
(13, 1, 0, 0, 'pending', 0, ''),
(14, 1, 0, 0, 'pending', 0, ''),
(16, 1, 0, 0, 'pending', 0, NULL),
(17, 1, 0, 0, 'pending', 0, NULL),
(23, 2, 49, 3, 'payment_approved', 11, '1688275198'),
(28, 1, 49, 1, 'delivered', 44, NULL),
(29, 1, 49, 0, 'payment_approved', 11, '1688464267'),
(30, 2, 49, 0, 'awaiting_payment_approval', 33, '1688464267'),
(31, 1, 49, 0, 'awaiting_payment_approval', 11, '1689664085'),
(32, 2, 49, 0, 'awaiting_payment_approval', 11, '1689664756'),
(33, 1, 49, 0, 'awaiting_payment_approval', 55, '1689664892'),
(34, 1, 49, 0, 'awaiting_payment_approval', 11, '1689665557'),
(35, 2, 49, 0, 'awaiting_payment_approval', 11, '1689665557'),
(36, 2, 49, 0, 'awaiting_payment_approval', 33, '1689665557'),
(37, 1, 49, 0, 'awaiting_payment_approval', 12, '1689665681'),
(38, 2, 49, 0, 'awaiting_payment_approval', 11, '1689665681'),
(39, 2, 49, 0, 'awaiting_payment_approval', 11, '1689666154'),
(40, 2, 49, 0, 'awaiting_payment_approval', 1, '1689666154'),
(41, 2, 49, 0, 'awaiting_payment_approval', 4, '1689666154'),
(42, 1, 49, 0, 'awaiting_payment_approval', 11, '1689666492'),
(43, 2, 49, 0, 'awaiting_payment_approval', 1, '1689666492'),
(44, 1, 49, 0, 'awaiting_payment_approval', 11, '1689667641'),
(45, 1, 49, 0, 'awaiting_payment_approval', 2, '1689672064'),
(46, 1, 49, 0, 'awaiting_payment_approval', 11, '1689672358'),
(47, 2, 49, 0, 'awaiting_payment_approval', 11, '1689672427'),
(48, 1, 49, 0, 'awaiting_payment_approval', 11, '1689672454'),
(49, 2, 49, 0, 'awaiting_payment_approval', 1, '1689672454'),
(50, 1, 49, 0, 'awaiting_payment_approval', 11, '1689672586'),
(51, 2, 49, 0, 'awaiting_payment_approval', 4, '1689672586'),
(52, 1, 49, 0, 'awaiting_payment_approval', 11, '1689672649'),
(53, 2, 49, 0, 'awaiting_payment_approval', 2, '1689672649'),
(54, 1, 49, 0, 'awaiting_payment_approval', 1, '1689672815'),
(55, 1, 49, 0, 'awaiting_payment_approval', 2, '1689672815'),
(56, 2, 49, 2, 'payment_approved', 11, '1689673129'),
(57, 2, 49, 0, 'payment_approved', 2, '1689673129'),
(59, 2, 48, 0, 'awaiting_payment_approval', 0, '1721198551'),
(61, 1, 48, 0, 'pending', 11, NULL);

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
(34, NULL, 49, 1599, '2024-07-18 09:46:03', 'AHGDHFG123', 56, 'approved', 0, '56,57'),
(35, NULL, 48, 0, '2024-07-17 06:42:59', 'AAAAAAA111', 59, 'pending', 0, '59');

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
  `status` enum('pending','supplier_approved','rejected','payment_completed','depleted','instock','intransit') NOT NULL DEFAULT 'pending',
  `total_cost` int(50) GENERATED ALWAYS AS (`cost_per_item` * `quantity`) VIRTUAL,
  `stock_balance` int(50) GENERATED ALWAYS AS (`quantity` - `stock_out`) VIRTUAL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `quantity`, `stock_out`, `product_img_name`, `cost_per_item`, `category`, `batch_no`, `purchase_date`, `supplier_id`, `status`, `description`) VALUES
(1, 'dammit', 80, 0, 'dammit.jpg', 123, 'floral', 'BAT001', '2024-06-14', 0, 'instock', 'In this new design, Guerlain reflects the most opt'),
(2, 'acquadi', 123, 0, 'acquadi.jpg', 123, 'citrus', 'BAT002', '2024-06-15', 1, 'instock', 'In this new design, Guerlain reflects the most opt'),
(3, 'calvinklein', 123, 0, 'calvinklein.jpg', 145, 'aquatic', '', '', 1, 'pending', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(4, 'leaudissey', 123, 0, 'leaudissey.jpg', 100, 'floral', 'BAT004', '2024-06-15', 0, 'pending', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(52, 'coco', 50, 0, '', 3000, 'floral', 'BAT0052', '2024-05-31', 1, 'instock', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(53, 'coco2', 111, 0, '', 2000, 'floral', '52', '', 1, 'pending', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(54, 'coco3', 22, 0, '', 0, 'floral', '53', '', 0, 'pending', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(55, 'frankblaa', 203, 0, '', 0, 'floral', '54', '', 0, 'pending', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(56, 'test6', 112, 0, '', 0, 'floral', '55', '', 0, 'pending', 'In this new design, Guerlain reflects the most optimistic appearance of femininity: an amazing joie de vivre. Warm and blissful. The magnetic ambiance'),
(57, 'test', 123, 0, '', 0, 'floral', '56', '', 0, 'pending', 'teststs');

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
(1, 'mimi', 'too', 'male', '#Sisi@2024', 'approved', 'sisi@gmail.com');

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
(1, 'mimi', 'too', 'male', '#Mimi@2024', 'pending', 'mimi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `account_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `firstname`, `lastname`, `email`, `password`, `company`, `account_status`) VALUES
(1, 'yeye', 'yeye', 'yeye@gmail.com', '#Yeye@2024', 'xyz', 'approved');

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
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`driver_id`);

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
-- Indexes for table `room_service_manager`
--
ALTER TABLE `room_service_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_manager`
--
ALTER TABLE `property_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
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
  MODIFY `customer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `room_service`
--
ALTER TABLE `room_service`
  MODIFY `driver_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `finance_manager`
--
ALTER TABLE `finance_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `room_service_manager`
--
ALTER TABLE `room_service_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_manager`
--
ALTER TABLE `property_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
