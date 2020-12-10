-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2020 at 05:52 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `AggieID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `firstname`, `lastname`, `password`, `email`, `AggieID`) VALUES
(1, 'Jerry', 'Jin', 'kjhjhjk', 'jhj@gmail.com', 'zpn'),
(2, 'Kat', 'Lissa', '$2y$10$YWDnqpE1JfPrs8ywf/HzBum9smEIoq2le4ph4hE4nCi/F7DW5zkZC', 'katimulissa@ncat.edu', 'fjkfd'),
(3, 'Kat', 'Lissa', '$2y$10$yLyhU.4DcK6miZ11cYcb0e4r5UJOw4vI5YQINkWV9bCcwacnFAZ/K', 'kljlf@aggies.ncat.edu', 'kfjkdf'),
(4, 'Kat', 'Lissa', '$2y$10$sbQ0PiReg7jzKtUgzt9IJu/G1vg3JHQSkS7YPEMPZOh4TLXnqz0IW', 'ffjfkfld@aggies.ncat.edu', 'hommme'),
(5, 'Kat', 'Lissa', '$2y$10$q25XULxaqs84tm.HqOHJsu007rscDfgX9q12Y8LaExBPFK986q6f.', 'kfsjflks@aggies.ncat.edu', 'kjkldajsf'),
(6, 'Kat', 'Lissa', '$2y$10$N.mAnJDfpTq9ENaaOn12b.OMFEe4JKoaLHo1nJwJrTHl/uNWMpM5y', 'dfkf@aggies.ncat.edu', 'fdsffdf'),
(7, 'Kat', 'Lissa', '$2y$10$U/b4E1F3HUYOXKxtRu1qUenoRoe9eQSQBkgmUcIUz.oKOqOQE2Zw.', 'jhjf@aggies.ncat.edu', 'kljk'),
(8, 'Kat', 'Lissa', '$2y$10$coZOezn8hYbnWONnMdgj0.qpt1P/kvzbvH4fC.Bw1NN5hlgimbMge', 'fjdhf@ncat.edu', 'fdfs');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `idSchedules` int NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `AggieID` varchar(45) DEFAULT NULL,
  `typesp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `password`, `email`, `AggieID`, `typesp`) VALUES
(17, 'Kat', 'Lissa', '$2y$10$0IgyACbWM4HtEn7k480LveNo/VCJMEw4MJ410lDwDjQBV8brOPFnK', 'katimulissa@ncat.edu', 'home', ''),
(18, 'Kat', 'Lissa', '$2y$10$BZFRSnYLxTvnTB/CoyIhYe6qa9YTBhVxOOxx8usma3BzdliBlhwTi', 'katimulissa@gmail.com', 'lnkjn', ''),
(26, 'Abi', 'Demino', '$2y$10$JlFL6soLEK8X37Ft/N0JiO27GW3iGVE8XeoV7I0aBgspIh1bb1yNW', 'fdfd@ncat.edu', 'homhome', ''),
(31, 'Mooncake', 'Lis', '$2y$10$8.p2nkrGfnBfuUUlAnnV.unETERLfxDPmOw04ZO2xI50zT4R5yB0O', 'kmli@aggies.ncat.edu', 'memememe', ''),
(40, 'Kat', 'Lissa', '$2y$10$WW2FATfUj33TYWRouvjpv.BzwlKGv1r84lY085m4rDUIqD1tGhmRe', 'kmmm@ncat.edu', 'mewmew', 'professor'),
(41, 'Kat', 'Lissa', '$2y$10$COTdASjxQhImXTIsg8w0yOXYxrjcfTQQEepAlaaY5pDy8CLlMTLn6', 'kati@ncat.edu', 'kmli', 'professor'),
(42, 'Kat', 'Lissa', '$2y$10$5BYTNyigZZuLMj4LdSfZouuLmQ9va1Wml5Jadsw3gVMNP9obZXRpW', 'katti@ncat.edu', 'kdfkk', 'professor'),
(43, 'Kat', 'Lissa', '$2y$10$hte87vX3b5cT7OR.dKCf7e9rSQfA830oPLLOBOiN3FmPGR3QAcElm', 'katti@aggies.ncat.edu', 'kdffff', 'student'),
(45, 'Kat', 'Lissa', '$2y$10$sJuhhGHsNOhT7.8a8W.ZcerbnuK5iT9aCUUIuCaip4D/Txc4OwGDi', 'katiiiii@ncat.edu', 'fkjf', 'professor'),
(46, 'Kat', 'Lissa', '$2y$10$3dLjoUU./LeHrui89nw/xeUtDYIDY/Yixvs8aRBTEFkXE613A1no.', 'manwar@ncat.edu', 'jhfd', 'professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`AggieID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`idSchedules`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`AggieID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `idSchedules` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
