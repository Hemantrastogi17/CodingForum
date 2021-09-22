-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 02:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cat_request`
--

CREATE TABLE `add_cat_request` (
  `add_cat_sno` int(8) NOT NULL,
  `cat_title` varchar(50) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `add_cat_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_cat_request`
--

INSERT INTO `add_cat_request` (`add_cat_sno`, `cat_title`, `cat_desc`, `add_cat_time`) VALUES
(1, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', '2021-01-08 14:27:52'),
(2, 'jQuery', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.', '2021-01-08 14:31:05'),
(3, 'Go Language', 'Go is a statically typed, compiled programming language designed at Google by Robert Griesemer, Rob Pike, and Ken Thompson. ', '2021-01-08 14:52:48'),
(4, 'Go Language', 'Go is a statically typed, compiled programming language designed at Google by Robert Griesemer, Rob Pike, and Ken Thompson. ', '2021-01-08 14:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(8) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `categories_desc` varchar(255) NOT NULL,
  `date_of_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories`, `categories_desc`, `date_of_creation`) VALUES
(1, 'Python', 'Python is an interpreted, high-level and general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.', '2021-01-06 11:53:53'),
(2, 'Javscript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-or', '2021-01-06 11:54:27'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2021-01-06 11:55:12'),
(4, 'PHP', 'PHP is a general-purpose scripting language especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2021-01-06 11:55:32'),
(5, 'C', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions.', '2021-01-06 11:56:09'),
(6, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.', '2021-01-06 11:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` varchar(1000) NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'Please share some screenshots so that we can understand what the problme is based on the error displayed.', 1, 7, '2021-01-06 13:00:33'),
(2, 'The command for python installation in Kali Linux is:\r\napt-get installl python3 -y', 2, 6, '2021-01-06 13:01:23'),
(3, 'The command for python installation in Kali Linux is:\r\napt-get installl python3 -y', 2, 4, '2021-01-06 13:03:00'),
(4, 'The command for python installation in Kali Linux is:\r\napt-get installl python3 -y', 2, 1, '2021-01-06 13:03:18'),
(6, 'comment', 6, 2, '2021-01-07 13:55:08'),
(7, 'Jumbotron should not be visible now', 4, 9, '2021-01-07 14:31:40'),
(8, '<script>\"Hello\"</script>', 4, 9, '2021-01-07 14:49:44'),
(9, '<script>\"Hello\"</script>', 4, 9, '2021-01-07 14:49:54'),
(10, '&lt;script&gt;Hello&lt;/script&gt;', 3, 9, '2021-01-07 14:50:29'),
(11, '&lt;script&gt;alert(\"Hello\")&lt;/script&gt;', 3, 9, '2021-01-07 14:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(8) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `concern_desc` varchar(500) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sno`, `uname`, `email`, `concern_desc`, `time`) VALUES
(1, 'Hemant rastogi', 'hemantrastogi17@gmail.com', 'I can\'t login to my account.Please help me with what shoukd I do', '2021-01-08 16:38:15'),
(2, 'Gautam Sachdeva', 'gsachdeva721@gmail.com', '', '2021-01-08 16:55:46'),
(3, 'Gautam Sachdeva', 'gsachdeva721@gmail.com', 'Hi I am just checking the feature', '2021-01-08 16:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` varchar(255) NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `time`) VALUES
(1, 'Unable to install Pycharm IDE in Windows', 'Getting installation related errors while installing PyCharm IDE', 1, 1, '2021-01-06 12:10:35'),
(2, 'How to install python in linux?', 'Can someone please tell me the command to install python in Kali Linux?', 1, 2, '2021-01-06 12:57:15'),
(3, 'Best source for Python beginners', 'Can somebody recommend be a good source to learn Python programming?\r\n', 1, 3, '2021-01-06 13:06:06'),
(4, 'Best source for Python beginners', 'Can somebody recommend be a good source to learn Python programming?\r\n', 1, 4, '2021-01-06 13:10:11'),
(6, 'ISF Experiment-2', 'Desc', 1, 2, '2021-01-07 13:54:55'),
(10, 'Hi', 'Hello', 1, 9, '2021-01-07 14:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `users123`
--

CREATE TABLE `users123` (
  `sno` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users123`
--

INSERT INTO `users123` (`sno`, `user_email`, `user_pass`, `time`) VALUES
(1, '123@test.com', 'hemant', '2021-01-06 14:37:08'),
(2, 'yatinrastogi14@gmail.com', '$2y$10$tolvEqfbOJX3gsqtGQlhtOuv9ZNP78sPlKSG0C2J8UeKxOTl.TGvK', '2021-01-06 14:53:04'),
(3, 'hemantrastogi17@gmail.com', '$2y$10$xnBFiyiA8iAsMlkyXsKXrOhZRByf1hlA07dsVuWpoyT.Nsjee.lr.', '2021-01-06 14:56:17'),
(4, 'ritvikrastogi33@gmail.com', '$2y$10$h7uoNwNQuCiyJqII6VlYHusZQUV0Xiyuicn.z/hvcJO5l4Nu2ZA6q', '2021-01-06 15:00:46'),
(5, 'gsachdeva721@gmail.com', '$2y$10$FeuM3/z18SqCMKD87n3qnOW56.FE6EghZCIYQmgY0J8B275YN6X72', '2021-01-06 16:34:46'),
(6, 'rharshit@gmail.com', '$2y$10$kqMoQ/XmfRK4.Vj.pid7..qxg0M8pVnIKd43EWUqrfzi4ki6oHhLy', '2021-01-06 16:38:03'),
(7, 'gsachdeva7217@gmail.com', '$2y$10$gSgBUcBiyZThTBZLPWQp2OO84/b9Kbmm1v916O3CYPelv.TFVHnE6', '2021-01-06 18:21:01'),
(8, 'firefist@123.com', '$2y$10$ofH4PoFqlt2pvqpJz17P..DlcpSGze6xQvBsvtRidsLagb6cxsPu2', '2021-01-06 18:22:51'),
(9, 'Firefist', '$2y$10$gPu2mm.WWnWqAIdvR/QqROxWwtey76yr4BNEtj3/dCD519RLASrzO', '2021-01-07 14:06:29'),
(10, 'avirallakhanpaul', '$2y$10$QjKpcY8Dpg3XyOWhFHdgXOT1iKSXw2Ifp5IEaus2jxX8Lw1sNsh2y', '2021-01-10 22:17:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cat_request`
--
ALTER TABLE `add_cat_request`
  ADD PRIMARY KEY (`add_cat_sno`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users123`
--
ALTER TABLE `users123`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cat_request`
--
ALTER TABLE `add_cat_request`
  MODIFY `add_cat_sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users123`
--
ALTER TABLE `users123`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
