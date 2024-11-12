-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 12, 2024 at 12:57 PM
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
('0d49cef1-9e93-11ef-82cd-244bfecb82ff', 'Popo', 'Peepo'),
('b3a6d788-944c-11ef-97eb-244bfecb82ff', 'iShow', 'Speed'),
('d2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Clive Staples', 'Lewis'),
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
  `imageLocation` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `authorId`, `genre`, `quantity`, `publicationDate`, `imageLocation`, `description`) VALUES
('04d737aa-944d-11ef-97eb-244bfecb82ff', 'Python for Idiots', '04d6a829-944d-11ef-97eb-244bfecb82ff', 'Technology, Educational, Programming', 197, '2024-05-15', NULL, NULL),
('0b0ad9a8-9f4d-11ef-b08b-244bfecb82ff', 'The Chronicles of Narnia: The Voyage of the Dawn Treader', 'd2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Fantasy, Action, Adventure, Literature', 100, '1952-09-15', '0b0ad9a8-9f4d-11ef-b08b-244bfecb82ff/the-voyage-of-the-dawn-treader.jpg', NULL),
('22dff7be-9ec5-11ef-82cd-244bfecb82ff', 'Buko Juice', '0d49cef1-9e93-11ef-82cd-244bfecb82ff', 'Fantasy, Fiction, Gaming', 345, '2024-10-29', '22dff7be-9ec5-11ef-82cd-244bfecb82ff/Automata Quiz 6 Part 2 - Dela Victoria.jpg', NULL),
('8b56887d-92b2-11ef-a137-244bfecb82ff', 'Harry Potter and the Chamber of Secrets', 'd8b52768-92b1-11ef-a137-244bfecb82ff', 'Fantasy', 90, '1998-07-02', '8b56887d-92b2-11ef-a137-244bfecb82ff/harry-potter-and-the-chamber-of-secrets-6.jpg', NULL),
('a5975cf0-92f0-11ef-a137-244bfecb82ff', 'Harry Potter and the Sorcerers Stone', 'd8b52768-92b1-11ef-a137-244bfecb82ff', 'Fantasy', 99, '1997-06-25', 'a5975cf0-92f0-11ef-a137-244bfecb82ff/harry-potter-and-the-sorcerers-stone-cover.jpg', NULL),
('abc20260-9f37-11ef-b08b-244bfecb82ff', 'Read or Gay', '0d49cef1-9e93-11ef-82cd-244bfecb82ff', 'Romance, Fantasy, Drama', 34, '2024-11-20', 'abc20260-9f37-11ef-b08b-244bfecb82ff/peepo.jpg', 'Read this book or u gay'),
('b3a704f1-944c-11ef-97eb-244bfecb82ff', 'How To Git Gud', 'b3a6d788-944c-11ef-97eb-244bfecb82ff', 'Gaming', 169, '2024-01-07', NULL, NULL),
('c3f02059-9f4c-11ef-b08b-244bfecb82ff', 'The Chronicles of Narnia: Prince Caspian - The Return to Narnia', 'd2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Fantasy, Action, Adventure, Literature', 100, '1952-09-15', 'c3f02059-9f4c-11ef-b08b-244bfecb82ff/prince-caspian-the-chronicles-of-narnia-book-4.jpg', NULL),
('d266bba4-9f4b-11ef-b08b-244bfecb82ff', 'Chronicles of Narnia: The Lion, The Witch, and The Wardrobe', 'd2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Fantasy, Action, Adventure, Literature', 100, '1950-10-16', 'd266bba4-9f4b-11ef-b08b-244bfecb82ff/the-lion-the-witch-and-the-wardrobe-the-chronicles-of-narnia-book-2.jpg', NULL),
('d897a622-92b8-11ef-a137-244bfecb82ff', 'Percy Jackson and the Olympians: The Lightning Thief', 'd89725c7-92b8-11ef-a137-244bfecb82ff', 'Fantasy', 80, '2005-06-28', 'd897a622-92b8-11ef-a137-244bfecb82ff/percy-jackson-and-the-olympians-book-one-the-lightning-thief-disney-tie-in-edition.jpg', NULL);

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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
('d267614d-9f4b-11ef-b08b-244bfecb82ff', 'Action'),
('d2678dd3-9f4b-11ef-b08b-244bfecb82ff', 'Adventure'),
('abc27948-9f37-11ef-b08b-244bfecb82ff', 'Drama'),
('91fe71bc-9ec3-11ef-82cd-244bfecb82ff', 'Fantasy'),
('22e03703-9ec5-11ef-82cd-244bfecb82ff', 'Fiction'),
('22e0d032-9ec5-11ef-82cd-244bfecb82ff', 'Gaming'),
('d268226d-9f4b-11ef-b08b-244bfecb82ff', 'Literature'),
('abc248d5-9f37-11ef-b08b-244bfecb82ff', 'Romance');

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
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre` (`genre`);

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
