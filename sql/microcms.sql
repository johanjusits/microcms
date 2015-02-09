-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 09 feb 2015 kl 21:29
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
  `menu_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `locked` varchar(10) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumpning av Data i tabell `pages`
--

INSERT INTO `pages` (`id`, `name`, `menu_name`, `title`, `body`, `locked`, `url`) VALUES
(1, 'index', 'Index', 'Index', 'This is the Index page.\r\n', 'No', '/index.php'),
(2, 'about', 'About', 'About', 'This is the about page.', 'No', '/about.php'),
(3, 'blog', 'Blog', 'Blog', 'This is the blog page.', 'Yes', '/blog.php'),
(4, 'portfolio', 'Portfolio', 'Portfolio', 'This is the portfolio page', 'No', '/portfolio.php'),
(5, 'links', 'Links', 'Links', 'This is the links page.', 'No', '/links.php'),
(15, 'candy', 'Candy', 'Free Candy', 'Come here for lots of candy!', 'Yes', '/candy.php');

-- --------------------------------------------------------

--
-- Tabellstruktur `subpages`
--

CREATE TABLE IF NOT EXISTS `subpages` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `locked` varchar(10) NOT NULL,
  `page_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `subpages`
--

INSERT INTO `subpages` (`id`, `name`, `menu_name`, `title`, `body`, `locked`, `page_id`, `url`) VALUES
(1, 'index/subpage1', 'Subpage 1', 'Index - Subpage 1', 'This is the first subpage of Index.', 'Yes', 1, '/index/subpage1.php'),
(2, 'index/subpage2', 'Subpage 2', 'Index - Subpage 2', 'This is the second subpage of Index.', 'Yes', 1, '/index/subpage2.php'),
(3, 'index/subpage3', 'Subpage 3', 'Index - Subpage 3', 'This is the third subpage of Index.', 'Yes', 1, '/index/subpage3.php'),
(4, 'portfolio/subpage1', 'Subpage 1', 'Portfolio - Subpage 1', 'This is the first subpage of Portfolio.', 'Yes', 4, '/portfolio/subpage1.php'),
(5, 'portfolio/subpage2', 'Subpage 2', 'Portfolio - Subpage 2', 'This is the second subpage of Portfolio.', 'Yes', 4, '/portfolio/subpage2.php'),
(6, 'portfolio/subpage3', 'Subpage 3', 'Portfolio - Subpage 3', 'This is the third subpage of Portfolio.', 'Yes', 4, '/portfolio/subpage3.php');

-- --------------------------------------------------------

--
-- Tabellstruktur `sub_subpages`
--

CREATE TABLE IF NOT EXISTS `sub_subpages` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(1024) NOT NULL,
  `locked` varchar(10) NOT NULL,
  `subpage_id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumpning av Data i tabell `sub_subpages`
--

INSERT INTO `sub_subpages` (`id`, `name`, `menu_name`, `title`, `body`, `locked`, `subpage_id`, `url`) VALUES
(3, 'portfolio/subpage3/subpage1', 'Subpage 1', 'Portfolio - Subpage 3 - Subpage 1', 'This is the first subpage for Portfolio Subpage 3.', 'Yes', 6, '/portfolio/subpage3/subpage1.php'),
(4, 'portfolio/subpage3/subpage2', 'Subpage 2', 'Portfolio - Subpage 3 - Subpage 2', 'This is the second subpage for Portfolio Subpage 3.', 'Yes', 6, '/portfolio/subpage3/subpage2.php'),
(5, 'portfolio/subpage3/subpage3', 'Subpage 3', 'Portfolio - Subpage 3 - Subpage 3', 'This is the third subpage for Portfolio - Subpage 3.', 'Yes', 6, '/portfolio/subpage3/subpage3.php');

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
-- Index för tabell `subpages`
--
ALTER TABLE `subpages`
 ADD PRIMARY KEY (`id`), ADD KEY `page_id` (`page_id`);

--
-- Index för tabell `sub_subpages`
--
ALTER TABLE `sub_subpages`
 ADD PRIMARY KEY (`id`), ADD KEY `subpage_id` (`subpage_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT för tabell `subpages`
--
ALTER TABLE `subpages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `sub_subpages`
--
ALTER TABLE `sub_subpages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `subpages`
--
ALTER TABLE `subpages`
ADD CONSTRAINT `subpages_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`);

--
-- Restriktioner för tabell `sub_subpages`
--
ALTER TABLE `sub_subpages`
ADD CONSTRAINT `sub_subpages_ibfk_1` FOREIGN KEY (`subpage_id`) REFERENCES `subpages` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
