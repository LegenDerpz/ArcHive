-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 16, 2024 at 02:02 PM
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
('0df4ed16-bba3-11ef-a443-244bfecb82ff', 'Walter', 'Isaacson'),
('193655b2-bb9d-11ef-a443-244bfecb82ff', 'Adam', 'Wallace'),
('35f33686-bba3-11ef-a443-244bfecb82ff', 'Americas Test', 'Kitchen Kids'),
('3abef54a-bb9f-11ef-a443-244bfecb82ff', 'Suzanne', 'Collins'),
('4502ca79-bb9b-11ef-a443-244bfecb82ff', 'Rebecca', 'Yarros'),
('5a002c67-bba0-11ef-a443-244bfecb82ff', 'Wendi', 'Silvano'),
('686ceefa-b0a8-11ef-9f5a-244bfecb82ff', 'Kent', 'Jordan'),
('768ef05b-bba0-11ef-a443-244bfecb82ff', 'Hanya', 'Yanagihara'),
('90ec44c0-bb9f-11ef-a443-244bfecb82ff', 'James', 'Clear'),
('97b8aad5-bba0-11ef-a443-244bfecb82ff', 'Sarah J.', 'Maas'),
('9dbff515-bb9b-11ef-a443-244bfecb82ff', 'Rashid', 'Khalidi'),
('a4275818-bba2-11ef-a443-244bfecb82ff', 'Lucy', 'Score'),
('a48047df-bb9e-11ef-a443-244bfecb82ff', 'Wendy', 'Loggia'),
('b3a6d788-944c-11ef-97eb-244bfecb82ff', 'iShow', 'Speed'),
('b4de1886-bba3-11ef-a443-244bfecb82ff', 'Britney', 'Spears'),
('b646f726-bba7-11ef-a443-244bfecb82ff', 'Bonnie', 'Garmus'),
('d12bfee9-bba6-11ef-a443-244bfecb82ff', 'Barbra', 'Streisand'),
('d2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Clive Staples', 'Lewis'),
('d5146ef2-bb9e-11ef-a443-244bfecb82ff', 'Robert', 'Greene'),
('d89725c7-92b8-11ef-a137-244bfecb82ff', 'Rick', 'Riordan'),
('d8b52768-92b1-11ef-a137-244bfecb82ff', 'J.K.', 'Rowling'),
('e7b7c32a-bba2-11ef-a443-244bfecb82ff', 'Matthew', 'McConaughey'),
('e7c78e6d-bb9c-11ef-a443-244bfecb82ff', 'Matthew', 'Perry'),
('e87332ab-bb99-11ef-a443-244bfecb82ff', 'Mark P. O.', 'Morford'),
('ff63fb0f-bba3-11ef-a443-244bfecb82ff', 'David', 'Grann');

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
('04d737aa-944d-11ef-97eb-244bfecb82ff', 'Python for Idiots', '686ceefa-b0a8-11ef-9f5a-244bfecb82ff', 'Technology, Educational, Programming', 200, '2024-05-15', '', 'A Python book.'),
('0b0ad9a8-9f4d-11ef-b08b-244bfecb82ff', 'The Chronicles of Narnia: The Voyage of the Dawn Treader', 'd2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Fantasy, Action, Adventure, Literature', 99, '1952-09-15', '0b0ad9a8-9f4d-11ef-b08b-244bfecb82ff/the-voyage-of-the-dawn-treader.jpg', NULL),
('0df55235-bba3-11ef-a443-244bfecb82ff', 'Elon Musk', '0df4ed16-bba3-11ef-a443-244bfecb82ff', 'Biography, Nonfiction, Business, Technology', 149, '2023-09-16', '0df55235-bba3-11ef-a443-244bfecb82ff/81Kaj5++6pL._SL1500_.jpg', ''),
('1937080d-bb9d-11ef-a443-244bfecb82ff', 'How to Catch a Turkey', '193655b2-bb9d-11ef-a443-244bfecb82ff', 'Childrens, Fiction', 200, '2018-12-15', '1937080d-bb9d-11ef-a443-244bfecb82ff/81P9B8sY4AL._SL1500_.jpg', ''),
('35431b07-bb9c-11ef-a443-244bfecb82ff', 'Hundred Years War on Palestine', '9dbff515-bb9b-11ef-a443-244bfecb82ff', 'History, Nonfiction, Politics, War', 85, '2019-06-04', '35431b07-bb9c-11ef-a443-244bfecb82ff/Hundred Years War on Palestine.jpg', ''),
('3abf8ca7-bb9f-11ef-a443-244bfecb82ff', 'The Ballad of Songbirds and Snakes (A Hunger Games Novel) (The Hunger Games)', '3abef54a-bb9f-11ef-a443-244bfecb82ff', 'Adventure, War, Science fiction, Romance, Action, Thriller', 170, '2020-06-28', '3abf8ca7-bb9f-11ef-a443-244bfecb82ff/81EGcrHKG-L._SL1500_.jpg', ''),
('450389fd-bb9b-11ef-a443-244bfecb82ff', ' Iron Flame (The Empyrean, 2)', '4502ca79-bb9b-11ef-a443-244bfecb82ff', 'Fantasy, Romance', 150, '2023-03-04', '450389fd-bb9b-11ef-a443-244bfecb82ff/Iron Flame (The Empyrean, 2).jpg', ''),
('5456659b-bba3-11ef-a443-244bfecb82ff', 'The Complete Cookbook for Young Chefs: 100+ Recipes that Youll Love to Cook and Eat', '35f33686-bba3-11ef-a443-244bfecb82ff', 'Cookbook', 130, '2018-07-09', '5456659b-bba3-11ef-a443-244bfecb82ff/911pI+iDkCL._SL1500_.jpg', ''),
('5a0070c7-bba0-11ef-a443-244bfecb82ff', 'Turkey Trouble', '5a002c67-bba0-11ef-a443-244bfecb82ff', 'Picture Books, Childrens, Holiday, Animals, Humor, Storytime, Fiction', 300, '2009-02-20', '5a0070c7-bba0-11ef-a443-244bfecb82ff/91QEOvkzI9L._SL1500_.jpg', ''),
('768f98dc-bba0-11ef-a443-244bfecb82ff', 'A Little Life', '768ef05b-bba0-11ef-a443-244bfecb82ff', 'Fiction, Contemporary, LGBT, Literary Fiction, Queer, Adult, Mental Health', 100, '2015-03-07', '768f98dc-bba0-11ef-a443-244bfecb82ff/71If19m2RXL._SL1200_.jpg', ''),
('8b56887d-92b2-11ef-a137-244bfecb82ff', 'Harry Potter and the Chamber of Secrets', 'd8b52768-92b1-11ef-a137-244bfecb82ff', 'Fantasy', 90, '1998-07-02', '8b56887d-92b2-11ef-a137-244bfecb82ff/harry-potter-and-the-chamber-of-secrets-6.jpg', NULL),
('90ec85ff-bb9f-11ef-a443-244bfecb82ff', 'Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones', '90ec44c0-bb9f-11ef-a443-244bfecb82ff', 'Self-improvement, Nonfiction', 150, '2018-08-12', '90ec85ff-bb9f-11ef-a443-244bfecb82ff/81ANaVZk5LL._SL1500_.jpg', ''),
('97b8f592-bba0-11ef-a443-244bfecb82ff', 'House of Flame and Shadow (Crescent City, 3)', '97b8aad5-bba0-11ef-a443-244bfecb82ff', 'Fantasy, Dragons, Young Adult, Fiction, High Fantasy, Magic, Science Fiction, Fantasy', 120, '2023-01-06', '97b8f592-bba0-11ef-a443-244bfecb82ff/91jbHTNpy6L._SL1500_.jpg', ''),
('a427aad2-bba2-11ef-a443-244bfecb82ff', 'The Christmas Fix', 'a4275818-bba2-11ef-a443-244bfecb82ff', 'Christmas, Romance, Holiday, Contemporary Romance, Contemporary Fiction, Humor', 80, '2023-09-07', 'a427aad2-bba2-11ef-a443-244bfecb82ff/81mc3ShZMJL._SL1500_.jpg', ''),
('a480766e-bb9e-11ef-a443-244bfecb82ff', 'Taylor Swift: A Little Golden Book Biography', 'a48047df-bb9e-11ef-a443-244bfecb82ff', 'Picture Books, Biography', 200, '2023-04-18', 'a480766e-bb9e-11ef-a443-244bfecb82ff/81NsX5gOJkL._SL1500_.jpg', ''),
('a5975cf0-92f0-11ef-a137-244bfecb82ff', 'Harry Potter and the Sorcerers Stone', 'd8b52768-92b1-11ef-a137-244bfecb82ff', 'Fantasy', 99, '1997-06-25', 'a5975cf0-92f0-11ef-a137-244bfecb82ff/harry-potter-and-the-sorcerers-stone-cover.jpg', NULL),
('b4de5688-bba3-11ef-a443-244bfecb82ff', 'The Woman in Me', 'b4de1886-bba3-11ef-a443-244bfecb82ff', 'Memoir', 50, '2023-08-12', 'b4de5688-bba3-11ef-a443-244bfecb82ff/61BWsc9eGbL._SL1500_.jpg', ''),
('b6473547-bba7-11ef-a443-244bfecb82ff', 'Lessons in Chemistry: A Novel', 'b646f726-bba7-11ef-a443-244bfecb82ff', 'Fiction, Historical Fiction', 55, '2022-01-06', 'b6473547-bba7-11ef-a443-244bfecb82ff/71dQACXhz6L._SL1500_.jpg', ''),
('c3f02059-9f4c-11ef-b08b-244bfecb82ff', 'The Chronicles of Narnia: Prince Caspian - The Return to Narnia', 'd2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Fantasy, Action, Adventure, Literature', 99, '1952-09-15', 'c3f02059-9f4c-11ef-b08b-244bfecb82ff/prince-caspian-the-chronicles-of-narnia-book-4.jpg', NULL),
('c60357b8-bba2-11ef-a443-244bfecb82ff', 'Things We Never Got Over (Knockemout)', 'a4275818-bba2-11ef-a443-244bfecb82ff', 'Romance, Contemporary, Contemporary Romance, Fiction, Adult, Chick Lit', 60, '2022-07-28', 'c60357b8-bba2-11ef-a443-244bfecb82ff/81WklxcuSZL._SL1500_.jpg', ''),
('d12c85cc-bba6-11ef-a443-244bfecb82ff', 'My Name Is Barbra', 'd12bfee9-bba6-11ef-a443-244bfecb82ff', 'Autobiography', 90, '2023-06-12', 'd12c85cc-bba6-11ef-a443-244bfecb82ff/71musw9bJWL._SL1500_.jpg', ''),
('d266bba4-9f4b-11ef-b08b-244bfecb82ff', 'Chronicles of Narnia: The Lion, The Witch, and The Wardrobe', 'd2666cb8-9f4b-11ef-b08b-244bfecb82ff', 'Fantasy, Action, Adventure, Literature', 100, '1950-10-16', 'd266bba4-9f4b-11ef-b08b-244bfecb82ff/the-lion-the-witch-and-the-wardrobe-the-chronicles-of-narnia-book-2.jpg', NULL),
('d514b2d3-bb9e-11ef-a443-244bfecb82ff', 'The 48 Laws of Power', 'd5146ef2-bb9e-11ef-a443-244bfecb82ff', 'Nonfiction', 100, '1998-05-25', 'd514b2d3-bb9e-11ef-a443-244bfecb82ff/611X8GI7hpL._SL1500_.jpg', ''),
('d897a622-92b8-11ef-a137-244bfecb82ff', 'Percy Jackson and the Olympians: The Lightning Thief', 'd89725c7-92b8-11ef-a137-244bfecb82ff', 'Fantasy, Adventure, Mythology', 80, '2005-06-28', 'd897a622-92b8-11ef-a137-244bfecb82ff/percy-jackson-and-the-olympians-book-one-the-lightning-thief-disney-tie-in-edition.jpg', ''),
('d8bcca61-bba3-11ef-a443-244bfecb82ff', 'Fourth Wing (The Empyrean, 1)', '4502ca79-bb9b-11ef-a443-244bfecb82ff', 'Fantasy', 140, '2023-02-15', 'd8bcca61-bba3-11ef-a443-244bfecb82ff/91n7p-j5aqL._SL1500_.jpg', ''),
('e7b7f761-bba2-11ef-a443-244bfecb82ff', 'Just Because', 'e7b7c32a-bba2-11ef-a443-244bfecb82ff', 'Picture Books, Childrens, Fiction', 200, '2023-08-12', 'e7b7f761-bba2-11ef-a443-244bfecb82ff/81dEhELNVAL._SL1500_.jpg', ''),
('e7c7d37d-bb9c-11ef-a443-244bfecb82ff', 'Friends, Lovers, and the Big Terrible Thing: A Memoir', 'e7c78e6d-bb9c-11ef-a443-244bfecb82ff', 'Memoir', 100, '2023-07-08', 'e7c7d37d-bb9c-11ef-a443-244bfecb82ff/81tdvyI0MeL._SL1500_.jpg', ''),
('e8738766-bb99-11ef-a443-244bfecb82ff', ' Classical Mythology', 'e87332ab-bb99-11ef-a443-244bfecb82ff', 'History', 150, '2002-02-24', 'e8738766-bb99-11ef-a443-244bfecb82ff/classical mythology.jpg', ''),
('ff644771-bba3-11ef-a443-244bfecb82ff', 'Killers of the Flower Moon: The Osage Murders and the Birth of the FBI', 'ff63fb0f-bba3-11ef-a443-244bfecb82ff', 'Nonfiction, True Crime', 60, '2017-05-02', 'ff644771-bba3-11ef-a443-244bfecb82ff/819bD-wfwoL._SL1500_.jpg', ''),
('ff748983-bba0-11ef-a443-244bfecb82ff', 'Percy Jackson and the Olympians: The Chalice of the Gods (Percy Jackson & the Olympians)', 'd89725c7-92b8-11ef-a137-244bfecb82ff', 'Fantasy, Adventure, Mythology', 300, '2023-03-16', 'ff748983-bba0-11ef-a443-244bfecb82ff/91prhAgYTNL._SL1500_.jpg', '');

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
('23792250-b0c7-11ef-9f5a-244bfecb82ff', '1104e5fc-920b-11ef-93d3-244bfecb82ff', '0b0ad9a8-9f4d-11ef-b08b-244bfecb82ff', 1, '2024-12-02 05:04:41'),
('3cad586a-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', 1, '2024-10-27 11:35:54'),
('95f72b7a-bb61-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'c3f02059-9f4c-11ef-b08b-244bfecb82ff', 1, '2024-12-16 04:55:27'),
('af6f89ef-bbab-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '0df55235-bba3-11ef-a443-244bfecb82ff', 1, '2024-12-16 01:45:56'),
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
('7691090a-bba0-11ef-a443-244bfecb82ff', 'Adult'),
('d2678dd3-9f4b-11ef-b08b-244bfecb82ff', 'Adventure'),
('5a019e54-bba0-11ef-a443-244bfecb82ff', 'Animals'),
('d12cfc6d-bba6-11ef-a443-244bfecb82ff', 'Autobiography'),
('a4812e5c-bb9e-11ef-a443-244bfecb82ff', 'Biography'),
('0df5dd64-bba3-11ef-a443-244bfecb82ff', 'Business'),
('c603a678-bba2-11ef-a443-244bfecb82ff', 'Chick Lit'),
('19373554-bb9d-11ef-a443-244bfecb82ff', 'Childrens'),
('a4286000-bba2-11ef-a443-244bfecb82ff', 'Christmas'),
('768fd3b5-bba0-11ef-a443-244bfecb82ff', 'Contemporary'),
('a428c658-bba2-11ef-a443-244bfecb82ff', 'Contemporary Fiction'),
('a428985a-bba2-11ef-a443-244bfecb82ff', 'Contemporary Romance'),
('54571287-bba3-11ef-a443-244bfecb82ff', 'Cookbook'),
('97b995ab-bba0-11ef-a443-244bfecb82ff', 'Dragons'),
('abc27948-9f37-11ef-b08b-244bfecb82ff', 'Drama'),
('150f82de-b0ab-11ef-9f5a-244bfecb82ff', 'Educational'),
('91fe71bc-9ec3-11ef-82cd-244bfecb82ff', 'Fantasy'),
('22e03703-9ec5-11ef-82cd-244bfecb82ff', 'Fiction'),
('22e0d032-9ec5-11ef-82cd-244bfecb82ff', 'Gaming'),
('97b9f967-bba0-11ef-a443-244bfecb82ff', 'High Fantasy'),
('b6477157-bba7-11ef-a443-244bfecb82ff', 'Historical Fiction'),
('9dc07503-bb9b-11ef-a443-244bfecb82ff', 'History'),
('5a010571-bba0-11ef-a443-244bfecb82ff', 'Holiday'),
('5a01d0c0-bba0-11ef-a443-244bfecb82ff', 'Humor'),
('76906832-bba0-11ef-a443-244bfecb82ff', 'LGBT'),
('76909ae6-bba0-11ef-a443-244bfecb82ff', 'Literary Fiction'),
('d268226d-9f4b-11ef-b08b-244bfecb82ff', 'Literature'),
('97ba2e25-bba0-11ef-a443-244bfecb82ff', 'Magic'),
('e7c88f85-bb9c-11ef-a443-244bfecb82ff', 'Memoir'),
('76913847-bba0-11ef-a443-244bfecb82ff', 'Mental Health'),
('ff74d483-bba0-11ef-a443-244bfecb82ff', 'Mythology'),
('9dc0a2b3-bb9b-11ef-a443-244bfecb82ff', 'Nonfiction'),
('a480fcdb-bb9e-11ef-a443-244bfecb82ff', 'Picture Books'),
('9dc0eabf-bb9b-11ef-a443-244bfecb82ff', 'Politics'),
('15102bb0-b0ab-11ef-9f5a-244bfecb82ff', 'Programming'),
('7690d061-bba0-11ef-a443-244bfecb82ff', 'Queer'),
('abc248d5-9f37-11ef-b08b-244bfecb82ff', 'Romance'),
('3ac0214a-bb9f-11ef-a443-244bfecb82ff', 'Science fiction'),
('90ecbaa2-bb9f-11ef-a443-244bfecb82ff', 'Self-improvement'),
('5a01fd7b-bba0-11ef-a443-244bfecb82ff', 'Storytime'),
('70316854-b0a8-11ef-9f5a-244bfecb82ff', 'Technology'),
('3ac050ce-bb9f-11ef-a443-244bfecb82ff', 'Thriller'),
('ff647298-bba3-11ef-a443-244bfecb82ff', 'True Crime'),
('9dc1bc14-bb9b-11ef-a443-244bfecb82ff', 'War'),
('97b9c10b-bba0-11ef-a443-244bfecb82ff', 'Young Adult');

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
('23795297-b0c7-11ef-9f5a-244bfecb82ff', '1104e5fc-920b-11ef-93d3-244bfecb82ff', '0b0ad9a8-9f4d-11ef-b08b-244bfecb82ff', '2024-12-02 05:04:41', NULL, 'BORROWED', 1),
('3cad9015-944f-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', '2024-10-27 11:35:54', NULL, 'BORROWED', 4),
('413f1871-bbac-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '0df55235-bba3-11ef-a443-244bfecb82ff', NULL, '2024-12-16 01:50:00', 'RETURNED', 1),
('83b2d4f3-bb61-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', NULL, '2024-12-16 04:54:56', 'RETURNED', 1),
('95f76118-bb61-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'c3f02059-9f4c-11ef-b08b-244bfecb82ff', '2024-12-16 04:55:27', NULL, 'BORROWED', 2),
('9cde45fb-bb61-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', 'c3f02059-9f4c-11ef-b08b-244bfecb82ff', NULL, '2024-12-16 04:55:38', 'RETURNED', 1),
('ab795d7d-9459-11ef-97eb-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '04d737aa-944d-11ef-97eb-244bfecb82ff', NULL, '2024-10-27 12:50:35', 'RETURNED', 2),
('af6fcec4-bbab-11ef-a443-244bfecb82ff', '51996d22-921c-11ef-93d3-244bfecb82ff', '0df55235-bba3-11ef-a443-244bfecb82ff', '2024-12-16 01:45:56', NULL, 'BORROWED', 2),
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
