-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 12:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelago`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `limit_place` int(11) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arriv` date NOT NULL,
  `departure` varchar(55) NOT NULL,
  `arrival` varchar(55) NOT NULL,
  `trademark` varchar(255) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `limit_place`, `date_depart`, `date_arriv`, `departure`, `arrival`, `trademark`, `date_add`, `admin`) VALUES
(2, 133, '2021-05-26', '2021-05-26', 'safi', 'casa', 'xyz', '2021-05-27 10:46:27', 'Othmane');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_in_user` tinyint(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_flight` int(11) NOT NULL,
  `id_passanger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `birthday`, `role`) VALUES
(1, 'othmanekahtal', 'othmanekahtal@gmail.com', '$2y$10$MGTqp6MdKvjn8Qvx95ii7u0ImKD47Y335Zuq0HhaPbYwk8XfDPU5O', '2021-05-11', 'admin'),
(3, 'othmane', 'othmanekahtal@test.com', '$2y$10$XSaSlopCIgAWOGutqP8huerUzW3rI1SD6qDks3uAQW2oSbmBpRT8e', '2021-05-13', 'admin'),
(4, 'ahmedtest', 'othmanekahtal@ahmed.com', '$2y$10$sHu.2UBSVFDiHXWEaM7BRu2t22hsOBWB9p2JBj0Z.Utp8iS1Iy6vG', '2021-05-05', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `frkey_id_user` (`id_user`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frkey_id_Flights` (`id_flight`),
  ADD KEY `frkey_id_passanger` (`id_passanger`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `frkey_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `frkey_id_Flights` FOREIGN KEY (`id_flight`) REFERENCES `flights` (`id`),
  ADD CONSTRAINT `frkey_id_passanger` FOREIGN KEY (`id_passanger`) REFERENCES `passenger` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
