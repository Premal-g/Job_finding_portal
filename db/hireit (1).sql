-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 04:59 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hireit`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_job`
--

CREATE TABLE `add_job` (
  `jno` int(11) NOT NULL,
  `Jtitle` varchar(500) NOT NULL,
  `Jtype` varchar(500) NOT NULL,
  `Jqul` varchar(500) NOT NULL,
  `Jexp` varchar(500) NOT NULL,
  `Jlocation` varchar(500) NOT NULL,
  `Jsalary` varchar(500) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `jadded_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_job`
--

INSERT INTO `add_job` (`jno`, `Jtitle`, `Jtype`, `Jqul`, `Jexp`, `Jlocation`, `Jsalary`, `cname`, `des`, `jadded_date`) VALUES
(4, 'Manager', 'Full Time', 'masters', '3 Year', 'mangalore', '50000', 'wipro', 'good', '20-08-22'),
(7, 'Accountant', 'Full Time', 'Masters', '3 Year', 'hubbli', '30000', 'infosis', 'candidate must pass C.A Exam', '20-08-22'),
(9, 'Assistant  Lecture', 'Full Time', 'Masters', '5 Year', 'kumta', '40000', 'baliga college', 'candidate must complete PHD', '20-08-22'),
(12, 'Food Delivery', 'Part Time', 'Any Degree', '6 Months', 'mangalore', '25000', 'zomato', 'candidate must have bike', '20-08-22'),
(13, 'Driver', 'Part Time', 'Any Degree', '1 Year', 'mysore', '25000', 'gibb school', 'candidate must all  lisence documents', '20-08-22'),
(14, 'doctor', 'Full time', 'Masters', '3 Year', 'karwar', '25000', 'canara hospital', 'good', '20-08-22'),
(21, 'Teacher', 'Remote', 'Masters', '3 Year', 'bangalore', '40000', 'baliga college', 'it is a good jo', '24-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `aid` varchar(500) NOT NULL,
  `apassword` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`aid`, `apassword`) VALUES
('premal', 'premal123');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `apno` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `jno` varchar(50) NOT NULL,
  `jdesc` varchar(500) NOT NULL,
  `status` int(11) DEFAULT '0',
  `apdate` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`apno`, `userid`, `jno`, `jdesc`, `status`, `apdate`) VALUES
(14, 'Vaibhav Gouda', '7', 'Applied for job status is pending!!!!', 0, '21-08-22'),
(20, 'Sneha Nayak', '7', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(21, 'Vaibhav Gouda', '14', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(22, 'pallavi', '12', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(23, 'Ritika Talekar', '12', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(24, 'Ritika Talekar', '13', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(25, 'savita', '12', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(26, 'savita', '4', 'Applied for job status is pending!!!!', 0, '22-08-22'),
(27, 'Vaibhav Gouda', '4', 'Applied for job status is pending!!!!', 0, '23-08-22'),
(28, 'Vaibhav Gouda', '9', 'Applied for job status is pending!!!!', 0, '24-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userid` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userid`, `message`, `subject`, `name`, `email`, `fdate`) VALUES
(11, 'it is easy to use', 'good', 'pallavi', 'pallavi@gmail.com', '2020-08-22'),
(7, 'must add all the job details', 'good', 'vishal', 'vishal@gmail.com', '2020-08-22'),
(8, 'app is good', 'verygood', 'rekha', 'rekha@gmail.com', '2020-08-22'),
(9, 'it is good expirience', 'good', 'sneha nayak', 'snehanayak@gmail.com', '2020-08-22'),
(10, 'we have good job recommendation', 'short', 'arpita nayak', 'arpita@gmail.com', '2020-08-22'),
(12, 'it is a user friendly job portal', 'good', 'ritika', 'ritika@gmail.com', '2020-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `usno` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `upassword` varchar(500) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rdate` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`usno`, `userid`, `email`, `upassword`, `mobile`, `address`, `rdate`) VALUES
(22, 'vishal nayak', 'vishal@gmail.com', 'c0585b027c681c1e31c1768ec4f33f78fb727a745c24efc9ae8485951ac0d1a9', '7658905432', 'Baada', '20-08-22'),
(21, 'pallavi', 'pallavi@gmail.com', 'e1e360b96c919c4a150e5015b80ecddd075d07ddb03ae54b16a37d1b674a4236', '8766543098', 'Kumta', '20-08-22'),
(20, 'Rekha kamble', 'rekha@gmail.com', '9f21fb21921d32a7647801fc17d3373e91cb378ebe565ae03bb4dbeef16918b6', '8765433890', 'manglore', '20-08-22'),
(19, 'Savita naik', 'savita@gmail.com', 'a2265deb820613e4389cae52431208f435b0d7c18925bfc0d8165f0cf4786482', '8765489084', 'karawar', '20-08-22'),
(18, 'Sneha Nayak', 'snehanayak@gmail.com', '14929ffeb923aeb31e1920dff6ba9a62e948fea734a97c558fdc4f8144e34b4b', '7465879053', 'Madangeri', '20-08-22'),
(17, 'Arpita Nayak', 'arpita@gmail.com', 'c4134e49d8570d664d82823d3de9f62af78a47a2aa78fa1fc19601404d99fcc1', '8762677890', 'Ankola', '20-08-22'),
(23, 'Steven pinto', 'steven@gmail.com', 'eb7c5c56e9994bb11d78bf0c7ebbe8ff2410a889a925e954859554e98562fd13', '9876543320', 'Sirsi', '20-08-22'),
(24, 'Reshma Naik', 'reshma@gmail.com', '1068f15f4d40617d48f0b0f1c6f34b55176f9a46b19f9a22e3de96b802bad855', '9108611929', 'Honnavara', '20-08-22'),
(25, 'Ritika Talekar', 'ritika@gmail.com', '4861762daa8f66be966f0f2c928b9b9ab3222b10e63e3042c2f4a09de26168f0', '8765439054', 'Bhatkal', '20-08-22'),
(26, 'Vaibhav Gouda', 'vaibhav@gmail.com', '6fad46713ab1898626e6a38d7496870ab46f51516dafb80a65ffcb17be9136a4', '9764370531', 'Dandeli', '20-08-22'),
(27, 'naveen', 'naveen@gmail.com', '11c156374c5c0af6cec42a6d3071f9553d7802a3e910afaa19a541169425adbe', '08463428753', 'ankola', '21-08-22'),
(28, 'savita', 'savitanaik@gmail.com', 'd66a47f6e68d7d303fd10e2e3fa9a12f07319ee1270b75f776c26b76110f406b', '08463428753', 'ankola', '22-08-22'),
(29, 'anu', 'anu@gmail.com', 'ab46ecdf56142e5ec4d67d56930277cc870efb48d8c45d528aef2f52d71a09c8', '8463428753', 'ankola', '24-08-22'),
(30, 'sonu', 'sonu@gmail.com', 'da79ae84da8c327c0e7b5c09e09b93bb3d00a7c016d0b65a3dffe300bc08f149', '8463428753', 'ankola', '24-08-22'),
(31, 'prajwal naik', 'prajwal@gmail.com', '3e99ef62d2e7989a9541c563246a3ffef3c21bf233064b7ad171427f292df1cd', '8463428753', 'ankola', '24-08-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_job`
--
ALTER TABLE `add_job`
  ADD PRIMARY KEY (`jno`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`apno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`usno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_job`
--
ALTER TABLE `add_job`
  MODIFY `jno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `apno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `usno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
