-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2018 at 11:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6239395_fitness`
--
CREATE DATABASE IF NOT EXISTS `id6239395_fitness` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id6239395_fitness`;

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `korisnikId` int(11) NOT NULL,
  `teamId` int(11) NOT NULL,
  `ocena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_image` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `text`, `id_image`) VALUES
(1, 'Body Combat', 'Far far away, behind the word mountains, far from t', 1),
(2, 'Yoga Programs', 'Far far away, behind the word mountains, far from t', 2),
(3, 'Cycling Program', 'Far far away, behind the word mountains, far from t', 3),
(4, 'Boxing Fitness', 'Far far away, behind the word mountains, far from t', 4),
(5, 'Swimming Program', 'Far far away, behind the word mountains, far from t', 5),
(6, 'Massage', 'Far far away, behind the word mountains, far from t', 6);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `src` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src`, `alt`) VALUES
(1, 'images/fit-dumbell.svg', 'Body Combat'),
(2, 'images/fit-yoga.svg', 'Yoga Programs'),
(3, 'images/fit-cycling.svg', 'Cycling Program'),
(4, 'images/fit-boxing.svg', 'Boxing Fitness'),
(5, 'images/fit-swimming.svg', 'Swimming Program'),
(6, 'images/fit-massage.svg', 'Massage'),
(7, 'images/1528416733about.jpg', 'aaaa'),
(8, 'images/1528417139about.jpg', 'aaaa'),
(9, 'images/1528417190about.jpg', 'aaaa'),
(10, 'images/1528417250about.jpg', 'aaaa'),
(11, 'images/1528417368about.jpg', 'aaaa'),
(12, 'images/1528417372about.jpg', 'aaaa'),
(13, 'images/1528417386about.jpg', 'aaaa'),
(14, 'images/1528417389about.jpg', 'aaaa'),
(15, 'images/1528418090about.jpg', 'aaaa'),
(16, 'images/1528418267about.jpg', 'aaaa'),
(17, 'images/1528418271about.jpg', 'aaaa'),
(18, 'images/1528418306about.jpg', 'aaaa'),
(19, 'images/1528418309about.jpg', 'aaaa'),
(20, '../../images/1528420548about.jpg', 'aaaa'),
(21, '../../images/1528421738about.jpg', 'aaaa'),
(22, '../../images/1528421773about.jpg', 'aaaa'),
(23, '../../images/1528421789about.jpg', 'aaaa'),
(24, 'images/1528422490about.jpg', 'aaaa'),
(25, 'images/1528422595about.jpg', 'aaaa'),
(26, 'images/1528422663about.jpg', 'aaaa'),
(27, 'images/152881406155a7ae30-8464-48de-b6d2-671125bbfe5f-nahweb-690x480.jpg', 'aaaa'),
(28, 'images/1528814092150903058.1_xl.jpg', 'aaaa'),
(29, 'images/1528814118igor_loos.jpg', 'aaaa'),
(30, 'images/1528814218lukasz-gliszczynski-trener-personalny-fitness-17.jpg', 'aaaa'),
(31, 'images/1528814231Milos-Milojevic_v1.jpg', 'aaaa'),
(32, 'images/1528814354images.jpg', 'aaaa'),
(33, 'images/1530470149slika.jpg', 'aaaa'),
(34, 'images/1530470153slika.jpg', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`) VALUES
(3, 'Schedule'),
(4, 'Team'),
(5, 'About'),
(6, 'Login/Register'),
(7, 'Classes');

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE `odgovor` (
  `id` int(11) NOT NULL,
  `tekst_odgovora` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_pitanja` int(11) NOT NULL,
  `broj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`id`, `tekst_odgovora`, `id_pitanja`, `broj`) VALUES
(1, 'Dizanje Tegova', 1, 1),
(2, 'Kardio', 1, 1),
(3, 'CrossFit', 1, 0),
(4, 'Veslanje', 1, 0),
(6, 'Trcanje', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

CREATE TABLE `pitanje` (
  `id` int(11) NOT NULL,
  `tekst_pitanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pitanje`
--

INSERT INTO `pitanje` (`id`, `tekst_pitanja`) VALUES
(1, 'Koji tip treninga najvise volite');

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE `rezultat` (
  `id` int(11) NOT NULL,
  `id_odgovor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pitanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezultat`
--

INSERT INTO `rezultat` (`id`, `id_odgovor`, `id_user`, `id_pitanja`) VALUES
(46, 1, 5, 1),
(61, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_day` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `id_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `time`, `id_day`, `id_classes`, `id_team`) VALUES
(1, '06AM-7AM', 1, 1, 1),
(2, '07AM-8AM', 1, 2, 2),
(3, '08AM-9AM', 1, 3, 3),
(4, '09AM-10AM', 1, 4, 4),
(5, '06AM-7AM', 2, 3, 1),
(6, '07AM-8AM', 2, 1, 2),
(7, '08AM-9AM', 2, 3, 5),
(8, '09AM-10AM', 2, 5, 4),
(10, '15-16AM', 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `type`, `text`, `id_image`) VALUES
(1, 'John Doe', 'Body Trainer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia', 27),
(2, 'James Smith', 'Swimming Trainer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia', 28),
(3, 'Joe Holder', 'Chief Executive Officer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 29),
(4, 'Bret Contreras', 'Chief Executive Officer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts', 30),
(6, 'David Kirsch', 'Chief Executive Officer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 31),
(12, 'Marko Markovic', 'Swimming Trainer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 32),
(13, 'Naziv tima', 'Opis tima ', 'Tekst tima', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `id_role`) VALUES
(2, 'Luka', 'Lukic', 'peraperic@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1),
(5, 'Petar', 'Peric', 'luka.lukic@ict.edu.rs', '4e8a273b3543207fe94f17515b68f247', 2),
(6, 'Nemanja', 'Lukic', 'nemanja.lukic@ict.edu.rs', 'sifra1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pitanje`
--
ALTER TABLE `pitanje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pitanje`
--
ALTER TABLE `pitanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rezultat`
--
ALTER TABLE `rezultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
