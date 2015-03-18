-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 18 Mars 2015 à 15:41
-- Version du serveur: 5.5.41
-- Version de PHP: 5.5.22-1~dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `capteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `cap`
--

CREATE TABLE IF NOT EXISTS `cap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ladate` varchar(50) NOT NULL,
  `valeur` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `cap`
--

INSERT INTO `cap` (`id`, `ladate`, `valeur`) VALUES
(1, '45', '123132132131'),
(2, 'today', '159');

-- --------------------------------------------------------

--
-- Structure de la table `Element`
--

CREATE TABLE IF NOT EXISTS `Element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ladate` varchar(30) NOT NULL,
  `valeur` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `Element`
--

INSERT INTO `Element` (`id`, `ladate`, `valeur`) VALUES
(1, '17-03-2014', '43'),
(2, '17-03-2014', '454'),
(3, '17/03/15 17:25', '123456789'),
(4, '18/03/15 09:01', '78'),
(5, '18/03/15 13:16', '456546454'),
(6, '18/03/15 13:29:41', '789798797899778'),
(7, '18/03/15 13:51:21', '42'),
(8, '18/03/15 13:53:17:03', '789'),
(9, '18/03/15 13:53:37:03', '5'),
(10, '18/03/15 13:53:38:03', '5'),
(11, '18/03/15 14:21:58', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
