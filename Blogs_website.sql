-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2023 at 06:26 PM
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
-- Database: `Blogs_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accountstatus`
--

CREATE TABLE `Accountstatus` (
  `accountStatus_ID` int(11) NOT NULL,
  `statusDescription` varchar(255) DEFAULT NULL,
  `dateChanged` date DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Accountstatus`
--

INSERT INTO `Accountstatus` (`accountStatus_ID`, `statusDescription`, `dateChanged`, `user_ID`) VALUES
(1, 'Active', '2023-04-20', 1),
(2, 'Inactive', '2023-03-27', 2),
(3, 'Suspended', '2023-03-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Activitylog`
--

CREATE TABLE `Activitylog` (
  `activity_ID` int(11) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `activity_date` date DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Activitylog`
--

INSERT INTO `Activitylog` (`activity_ID`, `activity_type`, `activity_date`, `User_ID`) VALUES
(1, 'Login ', '2023-04-09', 2),
(2, 'Logout', '2023-03-27', 2),
(3, 'Page view', '2023-04-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_Id` int(11) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `password_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_Id`, `admin_username`, `password_admin`) VALUES
(1, 'admin1', 'password1');

-- --------------------------------------------------------

--
-- Table structure for table `Blog_posts`
--

CREATE TABLE `Blog_posts` (
  `Blog_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Published_date` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Blog_posts`
--

INSERT INTO `Blog_posts` (`Blog_ID`, `title`, `Published_date`, `content`, `User_ID`, `Category_ID`) VALUES
(1, 'Fundamentals of Databa', '2023-04-21', 'Best Subject for knowing the SQL ', 2, 1),
(2, 'Future of Machine Learning', '2023-04-05', 'latest trends in machine learning', 1, 1),
(3, 'Edge computing', '2023-04-05', 'explores the concept of edge computing, its benefits', 4, 1),
(7, 'Computer Architecture', '2023-04-05', 'Architecture in computer science', 3, 1),
(8, 'Switzerland', '2023-04-21', 'Heaven on Earth', 1, 2),
(9, 'Hyderabad', '2023-04-21', 'Best City', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_ID` int(11) NOT NULL,
  `no_of_posts` int(11) DEFAULT NULL,
  `category_type` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_ID`, `no_of_posts`, `category_type`, `Description`, `Blog_ID`) VALUES
(1, 2, 'Technology', 'Posts related to technology', 1),
(2, 1, 'Travel', 'Posts related to travel', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `Comment_ID` int(11) NOT NULL,
  `Date_published` date DEFAULT NULL,
  `comment_content` varchar(255) DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`Comment_ID`, `Date_published`, `comment_content`, `Blog_ID`, `User_ID`) VALUES
(1, '2023-04-11', 'Great post and, very informative!', 1, 1),
(2, '2022-01-10', 'I agree with your comparison!', 2, 1),
(3, '2022-01-11', 'Thanks for the review, I found it very helpful', 3, 3),
(5, '2023-04-09', 'Wow great post mate', 2, 1),
(6, '2023-04-14', 'Good post', 3, 2),
(7, '2023-04-20', 'Really nice blog', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Dislike`
--

CREATE TABLE `Dislike` (
  `dislike_ID` int(11) NOT NULL,
  `dislike_date` date DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dislike`
--

INSERT INTO `Dislike` (`dislike_ID`, `dislike_date`, `Reason`, `Blog_ID`, `User_ID`) VALUES
(1, '2022-01-06', 'Not informative', 1, 2),
(2, '2022-01-07', 'Too long', 2, 1),
(3, '2022-01-08', 'Boring', 3, 3),
(4, '2023-04-20', 'Not good', 2, 1),
(5, '2023-04-20', 'Bad one ', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Like`
--

CREATE TABLE `Like` (
  `like_ID` int(11) NOT NULL,
  `liked_date` date DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Like`
--

INSERT INTO `Like` (`like_ID`, `liked_date`, `Blog_ID`, `User_ID`) VALUES
(1, '2022-01-06', 1, 2),
(2, '2022-01-07', 2, 1),
(3, '2023-04-20', 2, 1),
(4, '2023-04-20', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `message_ID` int(11) NOT NULL,
  `message_dt` date DEFAULT NULL,
  `message_data` varchar(255) DEFAULT NULL,
  `sender_userID` int(11) DEFAULT NULL,
  `recipient_userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`message_ID`, `message_dt`, `message_data`, `sender_userID`, `recipient_userID`) VALUES
(1, '2023-03-28', 'Hello, how are you?', 1, 2),
(2, '2023-03-28', 'I am doing well, thanks for asking.', 2, 1),
(3, '2023-03-27', 'Can we schedule a meeting for next week?', 1, 3),
(4, '2023-04-14', 'hello how are you !', 1, 3),
(5, '2023-04-20', 'Hlo', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `rating_id` int(11) NOT NULL,
  `dateRated` date DEFAULT NULL,
  `ratingValue` int(11) DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`rating_id`, `dateRated`, `ratingValue`, `Blog_ID`) VALUES
(1, '2023-04-13', 5, 2),
(2, '2022-01-07', 4, 2),
(3, '2022-01-08', 5, 3),
(4, '2023-04-22', 4, 2),
(5, '2023-04-22', 4, 2),
(6, '2023-04-07', 4, 2),
(8, '2023-04-08', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SearchHistory`
--

CREATE TABLE `SearchHistory` (
  `Search_ID` int(11) NOT NULL,
  `searchQuery` varchar(255) DEFAULT NULL,
  `searchResult` text DEFAULT NULL,
  `SearchDate` date DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SearchHistory`
--

INSERT INTO `SearchHistory` (`Search_ID`, `searchQuery`, `searchResult`, `SearchDate`, `User_ID`) VALUES
(1, 'MySQL tutorial', 'A beginner\'s guide to MySQL', '2023-03-29', 1),
(2, 'Python web frameworks', 'Comparing Django and Flask', '2023-03-28', 2),
(3, 'Data visualization tools', 'A review of Tableau, PowerBI, and Qlik', '2023-03-27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Settings`
--

CREATE TABLE `Settings` (
  `settings_Id` int(11) NOT NULL,
  `settings_value` varchar(255) DEFAULT NULL,
  `setting_changed_date` date DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Settings`
--

INSERT INTO `Settings` (`settings_Id`, `settings_value`, `setting_changed_date`, `User_ID`) VALUES
(1, 'true', '2022-01-05', 1),
(2, 'false', '2022-01-06', 2),
(3, 'true', '2022-01-07', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Statistics`
--

CREATE TABLE `Statistics` (
  `statistics_ID` int(11) NOT NULL,
  `statisticsValue` int(11) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `statistics_type` varchar(255) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Statistics`
--

INSERT INTO `Statistics` (`statistics_ID`, `statisticsValue`, `DateRecorded`, `statistics_type`, `User_ID`, `Blog_ID`) VALUES
(1, 102, '2022-01-09', 'Page Views', 1, NULL),
(2, 50, '2022-01-10', 'Page Views', 2, NULL),
(3, 75, '2022-01-11', 'Page Views', 3, NULL),
(4, NULL, '2022-01-12', 'Blog Post Views', 1, 1),
(5, NULL, '2022-01-13', 'Blog Post Views', 2, 2),
(6, NULL, '2022-01-14', 'Blog Post Views', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `D_O_J` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_ID`, `username`, `password`, `Email`, `D_O_J`) VALUES
(1, 'Akshay', 'password123', 'akshay@yahoo.com', '2022-01-01'),
(2, 'Ashish', 'qwerty456', 'ashish@yahoo.com', '2022-01-02'),
(3, 'BobSmith', 'letmein789', 'bobsmith@example.com', '2022-01-03'),
(4, 'megha', 'pass122', 'megha123@hotmail.com', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `Userrole`
--

CREATE TABLE `Userrole` (
  `userRole_ID` int(11) NOT NULL,
  `rolename` varchar(255) DEFAULT NULL,
  `Role_Description` varchar(255) DEFAULT NULL,
  `Role_created_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Userrole`
--

INSERT INTO `Userrole` (`userRole_ID`, `rolename`, `Role_Description`, `Role_created_Date`) VALUES
(1, 'Admin', 'Full control over the website', '2022-01-01'),
(2, 'Editor', 'Can create and edit blog posts', '2022-01-01'),
(3, 'Subscriber', 'Can view blog posts and comment', '2022-01-01'),
(4, 'Author', '.', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `Views`
--

CREATE TABLE `Views` (
  `view_ID` int(11) NOT NULL,
  `view_Count` int(11) DEFAULT NULL,
  `view_Date` date DEFAULT NULL,
  `Blog_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Views`
--

INSERT INTO `Views` (`view_ID`, `view_Count`, `view_Date`, `Blog_ID`) VALUES
(1, 100, '2022-01-06', 2),
(2, 200, '2022-01-05', 1),
(3, 50, '2022-01-08', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accountstatus`
--
ALTER TABLE `Accountstatus`
  ADD PRIMARY KEY (`accountStatus_ID`),
  ADD KEY `changedBy` (`user_ID`);

--
-- Indexes for table `Activitylog`
--
ALTER TABLE `Activitylog`
  ADD PRIMARY KEY (`activity_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `Blog_posts`
--
ALTER TABLE `Blog_posts`
  ADD PRIMARY KEY (`Blog_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD KEY `Blog_ID` (`Blog_ID`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Blog_ID` (`Blog_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Dislike`
--
ALTER TABLE `Dislike`
  ADD PRIMARY KEY (`dislike_ID`),
  ADD KEY `Blog_ID` (`Blog_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Like`
--
ALTER TABLE `Like`
  ADD PRIMARY KEY (`like_ID`),
  ADD KEY `Blog_ID` (`Blog_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`message_ID`),
  ADD KEY `sender_userID` (`sender_userID`),
  ADD KEY `recipient_userID` (`recipient_userID`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `Blog_ID` (`Blog_ID`);

--
-- Indexes for table `SearchHistory`
--
ALTER TABLE `SearchHistory`
  ADD PRIMARY KEY (`Search_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Settings`
--
ALTER TABLE `Settings`
  ADD PRIMARY KEY (`settings_Id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `Statistics`
--
ALTER TABLE `Statistics`
  ADD PRIMARY KEY (`statistics_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Blog_ID` (`Blog_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `Userrole`
--
ALTER TABLE `Userrole`
  ADD PRIMARY KEY (`userRole_ID`);

--
-- Indexes for table `Views`
--
ALTER TABLE `Views`
  ADD PRIMARY KEY (`view_ID`),
  ADD KEY `Blog_ID` (`Blog_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Blog_posts`
--
ALTER TABLE `Blog_posts`
  MODIFY `Blog_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Like`
--
ALTER TABLE `Like`
  MODIFY `like_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Views`
--
ALTER TABLE `Views`
  MODIFY `view_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Accountstatus`
--
ALTER TABLE `Accountstatus`
  ADD CONSTRAINT `accountstatus_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Activitylog`
--
ALTER TABLE `Activitylog`
  ADD CONSTRAINT `activitylog_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Blog_posts`
--
ALTER TABLE `Blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Category`
--
ALTER TABLE `Category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`);

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Dislike`
--
ALTER TABLE `Dislike`
  ADD CONSTRAINT `dislike_ibfk_1` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`),
  ADD CONSTRAINT `dislike_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Like`
--
ALTER TABLE `Like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_userID`) REFERENCES `User` (`User_ID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_userID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Rating`
--
ALTER TABLE `Rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`);

--
-- Constraints for table `SearchHistory`
--
ALTER TABLE `SearchHistory`
  ADD CONSTRAINT `searchhistory_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Settings`
--
ALTER TABLE `Settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`);

--
-- Constraints for table `Statistics`
--
ALTER TABLE `Statistics`
  ADD CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`),
  ADD CONSTRAINT `statistics_ibfk_2` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`);

--
-- Constraints for table `Views`
--
ALTER TABLE `Views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`Blog_ID`) REFERENCES `Blog_posts` (`Blog_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
