-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 28, 2024 at 04:03 AM
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
-- Database: `archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `firstName`, `lastName`) VALUES
('04d6a829-944d-11ef-97eb-244bfecb82ff', 'Kent John', 'Jordan'),
('4b7fbee2-92e9-11ef-a137-244bfecb82ff', 'Mister', 'Bean'),
('aad74a1b-92de-11ef-a137-244bfecb82ff', '', ''),
('b3a6d788-944c-11ef-97eb-244bfecb82ff', 'iShow', 'Speed'),
('c34bbccf-938d-11ef-b402-244bfecb82ff', 'Bebi', 'DV'),
('d89725c7-92b8-11ef-a137-244bfecb82ff', 'Rick', 'Riordan'),
('d8b52768-92b1-11ef-a137-244bfecb82ff', 'J.K.', 'Rowling');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `title` varchar(255) NOT NULL,
  `authorId` char(36) NOT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `publicationDate` date DEFAULT NULL,
  `imageLocation` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `authorId`, `genre`, `quantity`, `publicationDate`, `imageLocation`) VALUES
('04d737aa-944d-11ef-97eb-244bfecb82ff', 'Python for Idiots', '04d6a829-944d-11ef-97eb-244bfecb82ff', 'Technology, Educational, Programming', 197, '2024-05-15', NULL),
('8b56887d-92b2-11ef-a137-244bfecb82ff', 'Harry Potter and the Chamber of Secrets', 'd8b52768-92b1-11ef-a137-244bfecb82ff', 'Fantasy', 90, '1998-07-02', NULL),
('a5975cf0-92f0-11ef-a137-244bfecb82ff', 'Harry Potter and the Sorcerers Stone', 'd8b52768-92b1-11ef-a137-244bfecb82ff', 'Fantasy', 99, '1997-06-25', NULL),
('b3a704f1-944c-11ef-97eb-244bfecb82ff', 'How To Git Gud', 'b3a6d788-944c-11ef-97eb-244bfecb82ff', 'Gaming', 169, '2024-01-07', NULL),
('d897a622-92b8-11ef-a137-244bfecb82ff', 'Percy Jackson and the Olympians: The Lightning Thief', 'd89725c7-92b8-11ef-a137-244bfecb82ff', 'Fantasy', 80, '2005-06-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `userId` char(36) NOT NULL,
  `bookId` char(36) NOT NULL,
  `quantity` int(11) NOT NULL,
  `borrowDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `userId`, `bookId`, `quantity`, `borrowDate`) VALUES
('11f8b590-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'b3a704f1-944c-11ef-97eb-244bfecb82ff', 1, '2024-10-27 11:34:42'),
('147d24d7-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'a5975cf0-92f0-11ef-a137-244bfecb82ff', 1, '2024-10-27 11:34:46'),
('3cad586a-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', 2, '2024-10-27 11:35:54'),
('d044e4c6-944e-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', 1, '2024-10-27 11:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `userId` char(36) NOT NULL,
  `bookId` char(36) NOT NULL,
  `borrowDate` datetime DEFAULT NULL,
  `returnDate` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userId`, `bookId`, `borrowDate`, `returnDate`, `status`, `quantity`) VALUES
('0cb53018-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '8b56887d-92b2-11ef-a137-244bfecb82ff', NULL, '2024-10-27 11:34:33', 'RETURNED', 1),
('11f8e14e-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'b3a704f1-944c-11ef-97eb-244bfecb82ff', '2024-10-27 11:34:42', NULL, 'BORROWED', 1),
('147d58e9-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'a5975cf0-92f0-11ef-a137-244bfecb82ff', '2024-10-27 11:34:46', NULL, 'BORROWED', 2),
('20b2c6ce-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'a5975cf0-92f0-11ef-a137-244bfecb82ff', NULL, '2024-10-27 11:35:07', 'RETURNED', 1),
('3cad9015-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', '2024-10-27 11:35:54', NULL, 'BORROWED', 4),
('ab795d7d-9459-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', NULL, '2024-10-27 12:50:35', 'RETURNED', 2),
('d0450c4a-944e-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', '2024-10-27 11:32:52', NULL, 'BORROWED', 1),
('d559dfda-944e-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '8b56887d-92b2-11ef-a137-244bfecb82ff', '2024-10-27 11:33:00', NULL, 'BORROWED', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstName`, `lastName`, `userType`) VALUES
('1104e5fc-920b-11ef-93d3-244bfecb82ff', 'Franz', 'test@gmail.com', 'password', 'Franz', 'Dela Victoria', 'USER'),
('51996d22-921c-11ef-93d3-244bfecb82ff', 'LegenDerpz', 'admin@gmail.com', 'nopassword', 'Franz Christian', 'Dela Victoria', 'ADMIN'),
('befda4cd-920d-11ef-93d3-244bfecb82ff', 'Test', 'test2@gmail.com', 'password', 'Testo', 'Testi', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
