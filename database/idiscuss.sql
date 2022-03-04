-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 11:57 AM
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
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_sno` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_description` varchar(255) NOT NULL,
  `CurrentDT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_sno`, `categories_name`, `categories_description`, `CurrentDT`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers ', '2022-02-01 16:04:34'),
(5, 'Javascript', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Over 97% of websites use JavaScript on the client side for web page behavior, often incorporating third-party l', '2022-02-21 12:26:38'),
(6, 'Java', 'java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2022-02-21 12:26:38'),
(7, 'Django', 'Django is a Python-based free and open-source web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit. ', '2022-02-21 12:29:09'),
(8, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2022-02-21 12:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `comments_content` varchar(255) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `commentby` int(20) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `comments_content`, `thread_id`, `date`, `commentby`, `verified`) VALUES
(1, 'To edit the Path environment variable press Win+R to start Run and in the field Open enter: sysdm. cpl and click on OK. Now you can click on OK in all three dialogs to close them. Restart the Command Prompt and enter python --version once again, and you', 20, '2022-02-21 12:20:10.000000', 6, 1),
(2, 'thats usefull', 20, '2022-02-21 12:25:13.000000', 6, 1),
(3, 'Enter about:config in address bar and then type javascript in the filter section. The preference name \"javascript. enabled\" should have true as its value. If you are not clear look at following screenshot.', 21, '2022-02-21 12:30:44.000000', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`sno`, `name`, `email`, `description`, `date`) VALUES
(1, 'ritik garg', 'abcd@gmail.com', 'heello', '2022-02-22 17:06:45.000000'),
(2, 'sws', 'cc', 'cwxc', '2022-02-22 17:20:49.000000'),
(3, 'sws', 'cc', 'cwxc', '2022-02-22 17:21:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `quizanswer`
--

CREATE TABLE `quizanswer` (
  `aid` int(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_id` int(255) NOT NULL,
  `catid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizanswer`
--

INSERT INTO `quizanswer` (`aid`, `answer`, `ans_id`, `catid`) VALUES
(1, 'p(\"hello world\");', 1, 1),
(2, 'echo(\"hello world\");', 1, 1),
(3, 'print(\"hello world\")', 1, 1),
(4, ' #This is a comment', 2, 1),
(5, ' /*This is a comment*/', 2, 1),
(6, ' //This is a comment', 2, 1),
(8, '.py', 3, 1),
(9, '.pt', 3, 1),
(10, '.pyt', 3, 1),
(11, 'The HEAD section', 1, 5),
(12, 'Both HEAD and BODY Section', 1, 5),
(13, 'The BODY section', 1, 5),
(14, 'msg(\"Hello World\");', 2, 5),
(15, 'alertbox(\"Hello World\");', 2, 5),
(16, 'alert(\"Hello World\");', 2, 5),
(17, 'function=myFunction()', 3, 5),
(18, 'function:myFunction()', 3, 5),
(19, 'function myFunction()', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quizquestion`
--

CREATE TABLE `quizquestion` (
  `qid` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` int(255) NOT NULL,
  `catid` int(255) NOT NULL,
  `thread_quesno` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizquestion`
--

INSERT INTO `quizquestion` (`qid`, `question`, `answer`, `catid`, `thread_quesno`) VALUES
(1, 'What is a correct syntax to output \"Hello World\" in Python?', 3, 1, 1),
(2, 'How do you insert COMMENTS in Python code?', 4, 1, 2),
(3, 'What is the correct file extension for Python files?\r\n\r\n', 8, 1, 3),
(6, 'Where is the correct place to insert a JavaScript?', 12, 5, 1),
(7, 'How do you write \"Hello World\" in an alert box?', 16, 5, 2),
(8, 'How do you create a function in JavaScript?', 19, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sno`, `username`, `emailid`, `password`, `date`) VALUES
(6, 'hrithikgarg', 'ssdhsa@skjn', '$2y$10$.AGjjanFaTtM2soTwonaLuMFtbQ0hlqIubsKt2OnLDCd8VD8gP.be', '2022-02-13 09:46:03.000000'),
(7, 'ritik gag', 'ritikgarg@gmail.com', '$2y$10$zKKdD.EgUoKTXoZ.KML7aem/d92ZbHXVub3fy3yb4Yk7OPLRemwb6', '2022-02-21 12:12:00.000000'),
(8, 'abc', 'abcd@gmail.com', '$2y$10$5mz7dcwDa0VqnCficykvT.BW/pCG32z.xOkeJ0.1sZcKpFq6F2TVy', '2022-03-01 13:27:55.000000');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` varchar(255) NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `date`) VALUES
(20, 'python not working', 'python not working in window 11', 1, 6, '2022-02-21 12:19:29.000000'),
(21, 'javascript not working', 'javascript not working in linux', 5, 6, '2022-02-21 12:29:49.000000'),
(22, 'pyhton', 'abc', 1, 6, '2022-02-23 09:18:06.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_sno`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `quizanswer`
--
ALTER TABLE `quizanswer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quizanswer`
--
ALTER TABLE `quizanswer`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quizquestion`
--
ALTER TABLE `quizquestion`
  MODIFY `qid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
