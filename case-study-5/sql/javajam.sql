-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30


--
-- Database: `javajam`
--
USE javajam;

-- --------------------------------------------------------

--
-- Creating table structure for table `prices`
--

CREATE TABLE `prices` (
  `name` varchar(255) NOT NULL,
  `price` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserting data for table `prices`
--

INSERT INTO `prices` (`name`, `price`) VALUES
('Just Java', 2.00),
('Cafe au Lait(s)', 3.00),
('Cafe au Lait(d)', 4.00),
('Iced Cappuccino(s)', 4.75),
('Iced Cappuccino(d)', 5.75);
COMMIT;

-- --------------------------------------------------------

--
-- Creating table structure for table `orders`
--

CREATE TABLE `orders` (
  `coffee` varchar(255) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `sales` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserting data for table `orders`
--

INSERT INTO `orders` (`coffee`, `category`, `quantity`, `sales`) VALUES
('Just Java', '', 1, 5.7),
('Cafe au Lait', 'single', 1, 3),
('Iced Cappuccino', 'single', 1, 2.5),
('Cafe au Lait', 'single', 1, 3),
('Iced Cappuccino', 'single', 1, 2.5),
('Just Java', '', 1, 5.7),
('Cafe au Lait', 'double', 1, 4.5),
('Iced Cappuccino', 'double', 1, 3.5),
('Just Java', '', 1, 5.7),
('Cafe au Lait', 'single', 4, 12),
('Iced Cappuccino', 'double', 2, 7),
('Just Java', '', 3, 17.1),
('Cafe au Lait', 'single', 1, 3),
('Iced Cappuccino', 'single', 2, 5),
('Just Java', '', 1, 2),
('Just Java', '', 2, 4),
('Cafe au Lait', 'single', 10, 30),
('Just Java', '', 2, 4),
('Cafe au Lait', 'double', 3, 12),
('Just Java', '', 2, 7);

