-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 24 Juin 2014 à 07:59
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `myne`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_comment`,`id_review`,`id_user`),
  KEY `fk_comment_review1_idx` (`id_review`),
  KEY `fk_comment_user1_idx` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_review`, `id_user`, `content`, `status`, `date`) VALUES
(1, 1, 2, 'Je suis d''accord!', 1, '2014-06-18 00:00:00'),
(2, 1, 2, 'Non, tu est nul.', 1, '2014-06-10 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `api_token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  UNIQUE KEY `id_cutomer_UNIQUE` (`id_customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `email`, `password`, `api_token`) VALUES
(1, 'Pierre', 'test@test.com', '7399addc8dacd71815eee39f394ec3f7', '6a52f85027a5477719d6c650ea3338fd');

-- --------------------------------------------------------

--
-- Structure de la table `customer_product`
--

CREATE TABLE IF NOT EXISTS `customer_product` (
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  KEY `id_product_idx` (`id_product`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `customer_product`
--

INSERT INTO `customer_product` (`id_customer`, `id_product`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE IF NOT EXISTS `edition` (
  `id_edition` int(11) NOT NULL AUTO_INCREMENT,
  `id_review` int(11) NOT NULL,
  `content` text NOT NULL,
  `mood` tinyint(4) NOT NULL COMMENT '0: neutral',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_edition`,`id_review`),
  KEY `fk_edition_review1_idx` (`id_review`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `ean_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id_product`, `ean_code`, `name`) VALUES
(1, '12345678901233', 'Product YOLO'),
(2, '12345678901233', 'Product TEST');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rate` smallint(6) NOT NULL,
  `publication` tinyint(4) NOT NULL COMMENT '1: only the user can see his reviews',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_review`,`id_user`,`id_product`),
  KEY `fk_review_user_idx` (`id_user`),
  KEY `fk_review_product1_idx` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_product`, `title`, `content`, `rate`, `publication`, `date`) VALUES
(1, 1, 1, '', 'Super produit!', 10, 1, '2014-06-23 00:00:00'),
(2, 1, 1, '', 'Pue la merde', 1, 1, '2014-06-20 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_facebook` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `publication` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: let the publication be set by the review publication',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `id_facebook`, `first_name`, `last_name`, `email`, `publication`, `status`, `date`) VALUES
(1, '1234567891', 'Pierre', 'Grimaud', 'p@g.com', 0, 1, '2014-06-23 00:00:00'),
(2, '1039203931', 'Jérôme', 'Duval', 'nigglet@dzou.africa', 0, 1, '2014-06-24 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_user`
--

CREATE TABLE IF NOT EXISTS `user_has_user` (
  `id_user` int(11) NOT NULL,
  `id_facebook_friend` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_review1` FOREIGN KEY (`id_review`) REFERENCES `review` (`id_review`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `edition`
--
ALTER TABLE `edition`
  ADD CONSTRAINT `fk_edition_review1` FOREIGN KEY (`id_review`) REFERENCES `review` (`id_review`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_product1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_user`
--
ALTER TABLE `user_has_user`
  ADD CONSTRAINT `fk_user_has_user_user1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
