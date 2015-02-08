-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 08 feb 2015 kl 19:28
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `microcms`
--
CREATE DATABASE IF NOT EXISTS `microcms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `microcms`;

-- --------------------------------------------------------

--
-- Tabellstruktur `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `locked` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumpning av Data i tabell `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `body`, `locked`) VALUES
(1, 'index', 'Index', 'This is the index page.\r\n', ''),
(2, 'about', 'About', 'This is the about page.', 'Yes'),
(3, 'blog', 'Blog', 'This is the blog page.', 'No'),
(4, 'portfolio', 'Portfolio', 'This is the portfolio page', 'No'),
(5, 'links', 'Links', 'This is the links page.', 'No'),
(6, 'index/subpage1', 'Index - Subpage 1', 'This is the first subpage of Index.', 'Yes'),
(7, 'index/subpage2', 'Index - Subpage 2', 'This is the second subpage of Index.', 'Yes'),
(8, 'index/subpage3', 'Index - Subpage 3', 'This is the third subpage of Index.', 'Yes'),
(9, 'portfolio/subpage1', 'Portfolio - Subpage 1', 'This is the first subpage of Portfolio.', 'Yes'),
(10, 'portfolio/subpage2', 'Portfolio - Subpage 2', 'This is the second subpage of Portfolio.', 'Yes'),
(11, 'portfolio/subpage3', 'Portfolio - Subpage 3', 'This is the third subpage of Portfolio.', 'Yes'),
(12, 'portfolio/subpage3/subpage1', 'Portfolio - Subpage 3 - Subpage 1', 'This is the first subpage of Portfolio - Subpage 3.', 'Yes'),
(13, 'portfolio/subpage3/subpage2', 'Portfolio - Subpage 3 - Subpage 2', 'This is the second subpage of Portfolio - Subpage 3.', 'Yes'),
(14, 'portfolio/subpage3/subpage3', 'Portfolio - Subpage 3 - Subpage 3', 'This is the third subpage of Portfolio - Subpage 3.', 'Yes');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `level`, `email`, `password`) VALUES
(1, 0, 'test@test.com', 'test'),
(2, 1, 'admin@admin.com', 'admin');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
