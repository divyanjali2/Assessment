-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 07:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymgtsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `availability` varchar(20) NOT NULL,
  `borrowed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `category`, `isbn`, `author`, `price`, `quantity`, `location`, `availability`, `borrowed`) VALUES
(5, 'Lord', 'Psychological', '9780399529207', 'William', '1000.00', 3, 'Rack3', 'Available', 'Having'),
(7, 'The', ' Historical Fiction', '9781781100486', 'Jerome', '1200.00', 3, 'Rack3', 'NotAvailable', 'Borrowed'),
(8, 'The Two Towers', 'Fantasy Fiction', '9780618153992', 'John Ronald Reuel Tolkien', '3000.00', 2, 'Rack6', 'Available', 'Having'),
(9, 'The', 'Novel', '9781408824856', 'Khaled', '2500.00', 2, 'Rack4', 'NotAvailable', 'Borrowed'),
(10, 'Cinderella', 'Fantasy Fiction', '9781625814562', 'Naomi McMillan', '2000.00', 5, 'Rack6', 'Available', 'Borrowed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '$2y$10$a7azgPLN3QO44dm8c3Tk.eLiKIVYSKsrUAalYij5Q//StguFaJA9W'),
('admin', '$2y$10$7NATUA4IK4IUQRrKQ6xCeelGbBe0MXWrsDVLM/S5lnBigMqQdaMjO'),
('admin', '$2y$10$j3tYpNdTWb00IE7de72phetXfN/.cuO0aGTmmFVHaJoU4sBPp0Mbm'),
('admin', '$2y$10$J747wXdhAAK8SzAYIXFmwecrDVU6C4Se8uTm1V7cRFCNN4Db5bFmG'),
('admin', '$2y$10$mkB7f9Cw8IkUcpzOZUjADOaR0WwxOnfcM2HaR6752S3TEIQ59VKCS'),
('qwe', '$2y$10$Tja1GiCIP3uG4M75MNIHh.B4sqQHc1WgZrNy6VpqCyoyCl8OHrZa.'),
('qwe', '$2y$10$JOcYsw35VgzeRL3pciEB0eMRkmz70oU8sb1Bg74l92Mqfas.w2PAm'),
('admin', '$2y$10$HDurtwvQdOJVn/s/szM1y.8bTNRzi2oZX1cyFh8P9.eQ/vU0yxnBq'),
('admin', '$2y$10$BR1jEFJH1rvuSdw.RwaHVehXNxfw/78dIvwlldojh4u5mGJ5XTOA2'),
('admin', '$2y$10$S0O.Gjta1a4Y1qxrsuJ6A.0KKjKFlsSHKeV2HUMHPztp6.dDmoYra'),
('hii', '$2y$10$nvAYh3Y.WkHlsiiOJyoXJO/NwKtm5OEEH1.oxQPvwvPPGHDi60r7a'),
('Kavindu', '$2y$10$UCdGmQ4Wlymp9q5gRcuceOtSE8J53RX/COA1xVuMYFBPbLLVwEuly'),
('adminlib', '$2y$10$5ZxMQwr4lOUq7xPSgt39DuVpMi8OvBc.xtOm6w0B6/Bk.jAqU6dKi'),
('adminlib', '$2y$10$zQA6kPwt2nXzfmocJYKRDewNoA5oOO2X5NLFuSkU0GDti/aeQwV1W'),
('navodya', '$2y$10$.FP9g/yy8JgAjzeYRrsr6uohyRyPyXwwBMLQy1OwavRBrPk2JplT.'),
('', '$2y$10$k0c6sJb7X5i3RZ/acawaCu7AnVa0s9ZmCLCfLYRFp/zY3Ra3uphca'),
('', '$2y$10$3hln/7yKjrfNKa/63r8BlOqNxCR5Ss9mBcfFeq9y1y1XkmI66fCTq'),
('admin_library', '$2y$10$4yeJtO1.A0DywZaSA8EQ1OEjmxB7K8c727tQ9QZDesRaK6LS50tly'),
('admin_library', '$2y$10$WC2ggigZsOCSMYaGcC8F4eDwggN3FtzYhZC/XVv1sjthm0eI.GljG'),
('library', '$2y$10$12acn.4jzKoh5O5TEDKaIefVbEhWPIEJnSo5/MOUN5lgBtc4tI0pe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
