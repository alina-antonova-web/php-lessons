-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2018 at 02:55 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmoteka`
--

CREATE TABLE `filmoteka` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `genre` text NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmoteka`
--

INSERT INTO `filmoteka` (`id`, `title`, `genre`, `year`, `description`, `photo`) VALUES
(2, 'Облачный атлас', 'драма', 2012, '      Шесть историй — пять реинкарнаций, происходящих в разное время, тесно переплетаются между собой…    ', '736317996308.jpg'),
(4, 'Ночной дозор', 'фэнтази', 2004, '  ', '852022107876.jpg'),
(5, 'Дневной Дозор', 'фантастика', 2005, '  ', '432172215916.jpg'),
(7, 'Зеленая миля', 'драма', 1999, '  ', '288179622450.jpg'),
(22, 'Властилин колец', 'фэнтази', 2001, 'Сказания о Средиземье — это хроника Великой войны за Кольцо, войны, длившейся не одну тысячу лет. Тот, кто владел Кольцом, получал власть над всеми живыми тварями, но был обязан служить злу.', '780113647831.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'test@test.ru', '111222'),
(2, 'mail', 'mail@mail.ru', '333444'),
(3, 'Alina', 'alina@mail.ru', 'qwad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmoteka`
--
ALTER TABLE `filmoteka`
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
-- AUTO_INCREMENT for table `filmoteka`
--
ALTER TABLE `filmoteka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
