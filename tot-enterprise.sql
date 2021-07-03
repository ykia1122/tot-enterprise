-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 04:41 AM
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
-- Database: `tot-enterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` char(3) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('CCC', 'CPU Casing'),
('CGC', 'Graphic Card'),
('CKB', 'KEYBOARD'),
('CMS', 'MOUSE'),
('CPD', 'Pen Drive'),
('CRM', 'RAM');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_number` char(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(11) NOT NULL,
  `order_number` char(10) NOT NULL,
  `product_id` char(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` char(5) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` varchar(150) NOT NULL,
  `image_path` varchar(30) NOT NULL,
  `nett_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `category_id` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `image_path`, `nett_price`, `product_quantity`, `category_id`) VALUES
('CC001', 'Aigo Starship CPU case', 'Transparents side CPU case', '/images/casing/CC001.jpg', '109.00', 50, 'CCC'),
('CC002', 'Antec P8 ATX Gaming PC case', 'Cool and nice Casing', '/images/casing/CC002.jpg', '119.00', 50, 'CCC'),
('CC003', 'ATX AZZA Photios 250 CSAZ-250', 'Cool and nice Casing', '/images/casing/CC003.jpg', '108.00', 50, 'CCC'),
('CC004', 'ATX AZZA Titan (CSAZ-240)', 'Black Cool Casing', '/images/casing/CC004.jpg', '118.00', 50, 'CCC'),
('CC005', 'E-ATX black mid tower case', 'Black Noce Casing', '/images/casing/CC005.jpg', '128.00', 50, 'CCC'),
('CC006', 'HP COMPAQ 8100 ELITE SFF17 CPU', 'Simple normal Casing', '/images/casing/CC006.jpg', '110.00', 50, 'CCC'),
('CC007', 'Segotep LUX ATX Gaming CPU cas', 'Simple normal Casing', '/images/casing/CC007.jpg', '110.00', 50, 'CCC'),
('CC008', 'Segotep Warship EVO Gaming CPU', 'Black and Red CPU casing', '/images/casing/CC008.jpg', '139.00', 50, 'CCC'),
('DP001', 'HP USB 16GB', 'Cool and light design', '/images/pendrive/PD001.jpg', '39.00', 50, 'CPD'),
('DP002', 'HP V220W 8GB USB', 'Silver and light design', '/images/pendrive/PD002.jpg', '38.00', 50, 'CPD'),
('DP003', 'Sandisk Cruzer Blade 32GB', 'Small but big space store design', '/images/pendrive/PD003.jpg', '30.00', 50, 'CPD'),
('DP004', 'Sandisk Cruzer Force CZ71 8 GB', 'Suitable for light user', '/images/pendrive/PD004.jpg', '20.00', 50, 'CPD'),
('DP005', 'Sandisk Cruzer switch 4GB USB', 'Small storage, Suitable for light user', '/images/pendrive/PD005.jpg', '18.00', 50, 'CPD'),
('DP006', 'Sandisk Ultra CZ48 32GB USB', 'Large storage with cool design', '/images/pendrive/PD006.jpg', '35.00', 50, 'CPD'),
('DP007', 'Transcend 700 32 GB USB', 'Open Close pen drive', '/images/pendrive/PD007.jpg', '33.00', 50, 'CPD'),
('DP008', 'Transcend Jetflash 700 USB 8GB', '8GB storage Pen Drive', '/images/pendrive/PD008.jpg', '19.00', 50, 'CPD'),
('GC001', 'Gigabyte GeForce GTX 1050 Ti', 'High Graphic resoltion', '/images/graphiccard/GC001.png', '780.00', 50, 'CGC'),
('GC002', 'Gigabyte Nvidia Geforce GTX 75', 'High Graphic resoltion', '/images/graphiccard/GC002.png', '580.00', 50, 'CGC'),
('GC003', 'MSI GeForce GTX 1050 Ti', 'High Graphic resoltion', '/images/graphiccard/GC003.png', '789.00', 50, 'CGC'),
('GC004', 'MSI GeForce GTX 1080 Tii', 'High Graphic resoltion', '/images/graphiccard/GC004.png', '790.00', 50, 'CGC'),
('GC005', 'MSI GT 710', 'Normal graphic resolution', '/images/graphiccard/GC005.png', '590.00', 50, 'CGC'),
('GC006', 'MSI GT 730', 'Normal high graphic resolution', '/images/graphiccard/GC006.png', '630.00', 50, 'CGC'),
('GC007', 'MSI GTX 980 Ti', 'middle high graphic resolution', '/images/graphiccard/GC007.png', '690.00', 50, 'CGC'),
('GC008', 'MSI GTX 1050TI', 'High graphic resolution good for gaming', '/images/graphiccard/GC008.png', '790.00', 50, 'CGC'),
('KB001', 'Wireless Keyboard K270', 'Full-size, Unifying wireless', '/images/keyboard/KB001.png', '30.00', 50, 'CKB'),
('KB002', 'Classic Keyboard K100', 'Full-featured minimal design', '/images/keyboard/KB002.png', '50.00', 50, 'CKB'),
('KB003', 'Keyboard K120', 'Comfortable, quiet typing', '/images/keyboard/KB003.png', '45.00', 50, 'CKB'),
('KB004', 'G910', 'RGB Mechanical Gaming Keyboard', '/images/keyboard/KB004.png', '49.00', 50, 'CKB'),
('KB005', 'G810', 'RGB Mechanical Gaming Keyboard', '/images/keyboard/KB005.png', '60.00', 50, 'CKB'),
('KB006', 'PRO', 'Designed for Esports Professionals', '/images/keyboard/KB006.png', '99.00', 50, 'CKB'),
('KB007', 'Razer Huntsman Elite', 'Razer Gaming Keyboard with nice LED light', '/images/keyboard/KB007.png', '120.00', 50, 'CKB'),
('MS001', 'Logitech K800', 'Normal Mouse', '/images/mouse/MS001.png', '30.00', 50, 'CMS'),
('MS002', 'Logitech K850', 'Normal Mouse', '/images/mouse/MS002.png', '35.00', 50, 'CMS'),
('MS003', 'Logitech G880', 'Normal Mouse(Grey)', '/images/mouse/MS003.png', '40.00', 50, 'CMS'),
('MS004', 'Logitech G-8', 'Gaming Mouse', '/images/mouse/MS004.png', '49.00', 50, 'CMS'),
('MS005', 'Logitech G-10', 'Gaming Mouse with lighting logo', '/images/mouse/MS005.png', '49.00', 50, 'CMS'),
('MS006', 'Logitech G-11', 'Gaming Mouse with good handling', '/images/mouse/MS006.png', '60.00', 50, 'CMS'),
('RM001', 'Adata DDR2 800 2GB RAM', 'contains 2GB RAM', '/images/RAM/RM001.jpg', '80.00', 50, 'CRM'),
('RM002', 'Adata RAM DDR3 1600 8GB', 'Large RAM slot with DDR3', '/images/RAM/RM002.jpg', '170.00', 50, 'CRM'),
('RM003', 'Adata RAM DDR4 2400 16GB', 'Middle RAM slot with DDR4', '/images/RAM/RM003.jpg', '165.00', 50, 'CRM'),
('RM004', 'Adata SO_DDR3 1600 8GB RAM', '8 RAM slot with DDR3', '/images/RAM/RM004.jpg', '160.00', 50, 'CRM'),
('RM005', 'Adata SO-DDR4 2400 4GB', '4 RAM slot with DDR4', '/images/RAM/RM005.jpg', '150.00', 50, 'CRM'),
('RM006', 'Adata_DDR3-4GB', 'Normal RAM', '/images/RAM/RM006.jpg', '110.00', 50, 'CRM'),
('RM007', 'CRUCIAL CT4G4DFS824A 4GB DDR4 ', '4GB DDR4 RAM good to try', '/images/RAM/RM007.jpg', '160.00', 50, 'CRM'),
('RM008', 'CRUCIAL Desktop Longdimm DDR4 ', 'DDR4 with high MHZ', '/images/RAM/RM008.jpg', '169.00', 50, 'CRM'),
('RM009', 'Kingston 4GB 2400 DDR4', 'Kingston DDR4 with 4GB RAM', '/images/RAM/RM009.jpg', '159.00', 50, 'CRM');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` char(12) NOT NULL,
  `order_number` char(10) NOT NULL,
  `transaction_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `salt` varchar(33) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email_address`, `salt`, `password`) VALUES
(3, 'ykia99', 'ooiykyk@gmail.com', '1r38EPjCTRr6qp87ZuSqZcAeqYqkRIff', '$2y$10$1r38EPjCTRr6qp87ZuSqZOP/rPRrHxEq4eFjNXOeSKHYRpygQQH.m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_number`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `fk_orderNumber` (`order_number`),
  ADD KEY `fk_productId` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_categoryid` (`category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_tran_order` (`order_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderNumber` FOREIGN KEY (`order_number`) REFERENCES `order` (`order_number`),
  ADD CONSTRAINT `fk_productId` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_categoryid` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_tran_order` FOREIGN KEY (`order_number`) REFERENCES `order` (`order_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
