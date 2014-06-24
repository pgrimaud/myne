-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 24 Juin 2014 à 10:38
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
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `name_categorie` text,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=230 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `name_categorie`) VALUES
(1, 'Informatique>Composant>Carte Son'),
(2, 'Informatique>Composant>Alimentation PC'),
(3, 'Informatique>Composant>Carte d''acquisition TV / Vidéo'),
(4, 'Informatique>Composant>Processeur'),
(5, 'Informatique>Composant>Tuning et Watercooling'),
(6, 'Informatique>Composant>Ventilateur PC'),
(7, 'Informatique>Composant>Carte Mère'),
(8, 'Informatique>Composant>Carte Graphique'),
(9, 'Informatique>Composant>Carte Contrôleur'),
(10, 'Informatique>Composant>Batterie Informatique'),
(11, 'Informatique>Composant>Mémoire PC'),
(12, 'Hifi, Photo & Vidéo>Tv & Cinema>Décodeur TNT et Satellite'),
(13, 'Hifi, Photo & Vidéo>Tv & Cinema>Ecran et Accessoires Vidéoprojecteur'),
(14, 'Hifi, Photo & Vidéo>Tv & Cinema>Antenne et accessoires réception TV'),
(15, 'Hifi, Photo & Vidéo>Tv & Cinema>Home Cinéma'),
(16, 'Hifi, Photo & Vidéo>Tv & Cinema>Lecteur DVD et Blu Ray'),
(17, 'Hifi, Photo & Vidéo>Tv & Cinema>TV LCD'),
(18, 'Hifi, Photo & Vidéo>Tv & Cinema>Vidéoprojecteur'),
(19, 'Hifi, Photo & Vidéo>Photo & Vidéo>Lecteur de Carte Mémoire'),
(20, 'Hifi, Photo & Vidéo>Photo & Vidéo>Jumelle & Télescope'),
(21, 'Hifi, Photo & Vidéo>Photo & Vidéo>Développement Photo'),
(22, 'Hifi, Photo & Vidéo>Photo & Vidéo>Accessoire Image'),
(23, 'Hifi, Photo & Vidéo>Photo & Vidéo>Appareil Photo Numérique'),
(24, 'Hifi, Photo & Vidéo>Photo & Vidéo>Batterie Photo et Vidéo'),
(25, 'Hifi, Photo & Vidéo>Photo & Vidéo>Cadre et album photo'),
(26, 'Hifi, Photo & Vidéo>Photo & Vidéo>Cadre photo numérique'),
(27, 'Hifi, Photo & Vidéo>Photo & Vidéo>Caméscope'),
(28, 'Hifi, Photo & Vidéo>Photo & Vidéo>Carte Mémoire'),
(29, 'Hifi, Photo & Vidéo>Hifi et Son>Home Studio / Equipement DJ'),
(30, 'Hifi, Photo & Vidéo>Hifi et Son>Accessoire Son'),
(31, 'Hifi, Photo & Vidéo>Hifi et Son>Baladeur CD'),
(32, 'Hifi, Photo & Vidéo>Hifi et Son>Radio réveil'),
(33, 'Hifi, Photo & Vidéo>Hifi et Son>Radio portable'),
(34, 'Hifi, Photo & Vidéo>Hifi et Son>Platine CD'),
(35, 'Hifi, Photo & Vidéo>Hifi et Son>Micro'),
(36, 'Hifi, Photo & Vidéo>Hifi et Son>Lecteur MP3 / Multimédia'),
(37, 'Hifi, Photo & Vidéo>Hifi et Son>Enceintes Home Cinéma et Hifi'),
(38, 'Hifi, Photo & Vidéo>Hifi et Son>Elément Séparé'),
(39, 'Hifi, Photo & Vidéo>Hifi et Son>Dictaphone'),
(40, 'Hifi, Photo & Vidéo>Hifi et Son>Chaîne Hifi'),
(41, 'Hifi, Photo & Vidéo>Hifi et Son>Casque Audio & Micro'),
(42, 'Electroménager>Petit Electroménager>Robot Ménager'),
(43, 'Electroménager>Petit Electroménager>Machine à coudre'),
(44, 'Electroménager>Petit Electroménager>Cafetière et Expresso'),
(45, 'Electroménager>Petit Electroménager>Accessoires électroménager'),
(46, 'Electroménager>Cuisson>Table de cuisson'),
(47, 'Electroménager>Cuisson>Four'),
(48, 'Electroménager>Cuisson>Micro-ondes'),
(49, 'Electroménager>Cuisson>Hotte Aspirante'),
(50, 'Electroménager>Cuisson>Cuisinière'),
(51, 'Electroménager>Chauffage et climatisation>Climatiseur et ventilateur'),
(52, 'Electroménager>Froid et Conservation>Réfrigérateur'),
(53, 'Electroménager>Froid et Conservation>Cave à vin'),
(54, 'Electroménager>Lavage et Nettoyage>Cireuse'),
(55, 'Electroménager>Lavage et Nettoyage>Lave-vaisselle'),
(56, 'Electroménager>Lavage et Nettoyage>Lave-linge'),
(57, 'Electroménager>Lavage et Nettoyage>Centrale vapeur et Fer à repasser'),
(58, 'Electroménager>Lavage et Nettoyage>Sèche-linge'),
(59, 'Electroménager>Lavage et Nettoyage>Aspirateur'),
(60, 'Electroménager>Lavage et Nettoyage>Nettoyeurs Vapeur'),
(61, 'Electroménager>Electroménager>Petit Electroménager'),
(62, 'Cadeaux & Fleurs>Gadgets et Cadeaux personnalisés>Cadeau original'),
(63, 'Cadeaux & Fleurs>Maison et Décoration>Fleurs'),
(64, 'Auto et Moto>Moto et 2 Roues>Accessoires et pneus Moto'),
(65, 'Auto et Moto>Moto et 2 Roues>Moto Neuve et d''Occasion'),
(66, 'Auto et Moto>Auto>Accessoires GPS'),
(67, 'Auto et Moto>Auto>Accessoires multimédia auto'),
(68, 'Auto et Moto>Auto>Autoradio et Vidéo embarquée'),
(69, 'Auto et Moto>Auto>GPS'),
(70, 'Auto et Moto>Auto>Pneus auto'),
(71, 'Auto et Moto>Auto>Voiture Neuve et d''Occasion'),
(72, 'Auto et Moto>Auto>Accessoires, Pièces détachées & Tuning'),
(73, 'Informatique>Composant>Accessoires pour boîtier'),
(74, 'Informatique>Composant>Boîtier PC'),
(75, 'Informatique>Consommable & Accessoires>Encre, Cartouche, Toner'),
(76, 'Informatique>Consommable & Accessoires>CD/DVD vierge, Disquette, Zip...'),
(77, 'Informatique>Consommable & Accessoires>Accessoires pour écran'),
(78, 'Informatique>Consommable & Accessoires>Accessoires pour ordinateur portable'),
(79, 'Informatique>Consommable & Accessoires>Accessoires pour imprimante'),
(80, 'Informatique>Consommable & Accessoires>Tapis de souris'),
(81, 'Informatique>Consommable & Accessoires>Pavé Numérique'),
(82, 'Informatique>Consommable & Accessoires>Produits d''entretien informatique'),
(83, 'Informatique>Consommable & Accessoires>Connectique'),
(84, 'Informatique>Consommable & Accessoires>Housse / Rangement'),
(85, 'Informatique>Consommable & Accessoires>Papier pour impression'),
(86, 'Informatique>Périphérique>Enceintes PC et Multimedia'),
(87, 'Informatique>Périphérique>Tablette Graphique'),
(88, 'Informatique>Périphérique>Photocopieur'),
(89, 'Informatique>Périphérique>Webcam'),
(90, 'Informatique>Périphérique>Souris'),
(91, 'Informatique>Périphérique>Microphone'),
(92, 'Informatique>Périphérique>Imprimante'),
(93, 'Informatique>Périphérique>Ecran, moniteur'),
(94, 'Informatique>Périphérique>Clavier'),
(95, 'Informatique>Périphérique>Scanner'),
(96, 'Informatique>Réseau>Serveur d''impression'),
(97, 'Informatique>Réseau>Serveur'),
(98, 'Informatique>Réseau>Hub, Switch et Routeur'),
(99, 'Informatique>Réseau>Courant porteur (CPL)'),
(100, 'Informatique>Réseau>Carte Réseau'),
(101, 'Informatique>Réseau>Onduleur'),
(102, 'Informatique>Réseau>Commutateur KVM'),
(103, 'Informatique>Réseau>Point d''accès pour réseaux sans fil'),
(104, 'Informatique>Réseau>Accessoires et clés bluetooth'),
(105, 'Informatique>Réseau>Antenne Wifi'),
(106, 'Informatique>Ordinateurs>Mini PC'),
(107, 'Informatique>Ordinateurs>Ordinateur PC & Mac'),
(108, 'Informatique>Ordinateurs>Ordinateur Portable, Tablette multimédia'),
(109, 'Informatique>Stockage>Clé USB'),
(110, 'Informatique>Stockage>Lecteur DVD-Rom'),
(111, 'Informatique>Stockage>Lecteur de disquettes'),
(112, 'Informatique>Stockage>Lecteur de bande magnétique'),
(113, 'Informatique>Stockage>Graveur DVD et CD'),
(114, 'Informatique>Stockage>Disque dur'),
(115, 'Informatique>Logiciels et Services informatiques>Logiciel / CD Rom'),
(116, 'Jeux vidéo et Jouets>Accessoires consoles de jeux & PC>Accessoires Consoles & PC'),
(117, 'Jeux vidéo et Jouets>Accessoires consoles de jeux & PC>Volant'),
(118, 'Jeux vidéo et Jouets>Consoles & Jeux Vidéo>Console de jeux'),
(119, 'Jeux vidéo et Jouets>Consoles & Jeux Vidéo>Jeux Vidéo'),
(120, 'Livre, Musique, Film>Film>Produits dérivés'),
(121, 'Livre, Musique, Film>Film>DVD, Blu-Ray, VHS, UMD'),
(122, 'Livre, Musique, Film>Musique>CD'),
(123, 'Livre, Musique, Film>Musique>Vinyles'),
(124, 'Livre, Musique, Film>Livres et magazines>Journaux et magazines'),
(125, 'Livre, Musique, Film>Livres et magazines>Livres'),
(126, 'Jardin et Bricolage>Mobilier et Aménagement d''extérieur>Barbecue, Plancha et Accessoires'),
(127, 'Jardin et Bricolage>Mobilier et Aménagement d''extérieur>Station météo'),
(128, 'Jardin et Bricolage>Mobilier et Aménagement d''extérieur>Aménagement & Décoration d''extérieur'),
(129, 'Jardin et Bricolage>Mobilier et Aménagement d''extérieur>Arbre, Plante, Légume....'),
(130, 'Jardin et Bricolage>Mobilier et Aménagement d''extérieur>Piscines & Accessoires'),
(131, 'Jardin et Bricolage>Mobilier et Aménagement d''extérieur>Mobilier de jardin'),
(132, 'Jardin et Bricolage>Bricolage et Outillage>Bricolage et Outillage'),
(133, 'Finance, immobilier et vie pratique>Service Immobilier>Petites annonces Location'),
(134, 'Finance, immobilier et vie pratique>Service Immobilier>Petites annonces Achat'),
(135, 'Maison et Ameublement>Matériaux et Equipement de la maison>Sécurité & Domotique'),
(136, 'Maison et Ameublement>Matériaux et Equipement de la maison>Salle de Bain / Plomberie'),
(137, 'Maison et Ameublement>Matériaux et Equipement de la maison>Quincaillerie'),
(138, 'Maison et Ameublement>Matériaux et Equipement de la maison>Droguerie'),
(139, 'Maison et Ameublement>Matériaux et Equipement de la maison>Electricité'),
(140, 'Maison et Ameublement>Matériaux et Equipement de la maison>Matériaux'),
(141, 'Maison et Ameublement>Matériaux et Equipement de la maison>Traitement de l''eau & de l''air'),
(142, 'Maison et Ameublement>Matériaux et Equipement de la maison>Chauffage'),
(143, 'Maison et Ameublement>Décoration & Intérieur>Luminaire'),
(144, 'Maison et Ameublement>Décoration & Intérieur>Décoration'),
(145, 'Maison et Ameublement>Décoration & Intérieur>Art de la table & de la cuisine'),
(146, 'Maison et Ameublement>Décoration & Intérieur>Linge de maison'),
(147, 'Maison et Ameublement>Mobilier d''intérieur>Literie'),
(148, 'Mode & Accessoires>Mode et accessoires>Bijoux'),
(149, 'Mode & Accessoires>Mode et accessoires>Montre'),
(150, 'Mode & Accessoires>Mode et accessoires>Maroquinerie et bagagerie'),
(151, 'Mode & Accessoires>Mode et accessoires>Lunette de soleil'),
(152, 'Mode & Accessoires>Mode et accessoires>Autres accessoires pour homme, femme, enfant'),
(153, 'Mode & Accessoires>Mode et accessoires>Puériculture'),
(154, 'Mode & Accessoires>Mode et accessoires>Vêtement Enfant'),
(155, 'Mode & Accessoires>Mode et accessoires>Lingerie Femme'),
(156, 'Mode & Accessoires>Mode et accessoires>Ventes privées'),
(157, 'Mode & Accessoires>Mode et accessoires>Vêtement Femme'),
(158, 'Mode & Accessoires>Mode et accessoires>Vêtement Femme enceinte'),
(159, 'Mode & Accessoires>Mode et accessoires>Sous-vêtements homme'),
(160, 'Mode & Accessoires>Mode et accessoires>Vêtement Homme'),
(161, 'Sexy / Erotique>Sexy / Erotique>Accessoires Erotiques'),
(162, 'Sexy / Erotique>Sexy / Erotique>DVD Adultes'),
(163, 'Sexy / Erotique>Sexy / Erotique>Lingerie & sous-vêtements sexy'),
(164, 'Sport & Loisirs>Loisirs>Produits Animaux domestiques'),
(165, 'Sport & Loisirs>Loisirs>Instruments de musique'),
(166, 'Sport & Loisirs>Loisirs>Coffrets Sport & Loisirs'),
(167, 'Sport & Loisirs>Loisirs>Art et collection'),
(168, 'Sport & Loisirs>Loisirs>Billetterie & Sortie'),
(169, 'Sport & Loisirs>Loisirs>Partition de Musique'),
(170, 'Sport & Loisirs>Sport>Camping et randonnee'),
(171, 'Sport & Loisirs>Sport>Pêche'),
(172, 'Sport & Loisirs>Sport>Rugby'),
(173, 'Sport & Loisirs>Sport>Football'),
(174, 'Sport & Loisirs>Sport>Sports Nautiques'),
(175, 'Sport & Loisirs>Sport>Tennis'),
(176, 'Sport & Loisirs>Sport>Autres sports'),
(177, 'Sport & Loisirs>Sport>Outdoor / Sport Urbain'),
(178, 'Sport & Loisirs>Sport>Matériel ski / sport d''hiver'),
(179, 'Sport & Loisirs>Sport>Golf'),
(180, 'Sport & Loisirs>Sport>Formule 1 / Sports mécaniques'),
(181, 'Sport & Loisirs>Sport>Fitness'),
(182, 'Sport & Loisirs>Sport>Accessoire Cyclisme'),
(183, 'Sport & Loisirs>Sport>Cyclisme'),
(184, 'Sport & Loisirs>Sport>Basket-Ball'),
(185, 'Téléphonie & ADSL>Téléphonie mobile>Téléphone portable sans abonnement'),
(186, 'Téléphonie & ADSL>Téléphonie mobile>Accessoires pour téléphone portable'),
(187, 'Téléphonie & ADSL>Téléphonie mobile>Téléphone portable avec carte prépayée'),
(188, 'Téléphonie & ADSL>Téléphonie mobile>Téléphone portable avec abonnement'),
(189, 'Téléphonie & ADSL>Téléphonie fixe>Téléphone Fixe & VoIP'),
(190, 'Vin & Alimentation>Boissons chaudes et fraîches>Café et Thé'),
(191, 'Vin & Alimentation>Boissons chaudes et fraîches>Boissons non alcoolisées'),
(192, 'Jardin et Bricolage>Bricolage et Outillage>Equipement de travail et protection'),
(193, 'Jeux vidéo et Jouets>Jeux et jouets>Déguisements et Accessoires de fête'),
(194, 'Jeux vidéo et Jouets>Jeux et jouets>Jeux de plein air'),
(195, 'Jeux vidéo et Jouets>Jeux et jouets>Jeux'),
(196, 'Jeux vidéo et Jouets>Jeux et jouets>Jouets'),
(197, 'Jeux vidéo et Jouets>Jeux et jouets>Loisirs créatifs'),
(198, 'Jeux vidéo et Jouets>Jeux et jouets>Jouets bébé'),
(199, 'Santé - Beauté>Soin du corps et du visage>Soin Capillaire'),
(200, 'Santé - Beauté>Soin du corps et du visage>Appareil santé beauté'),
(201, 'Santé - Beauté>Soin du corps et du visage>Produit pour l''hygiène'),
(202, 'Santé - Beauté>Soin du corps et du visage>Soin du Visage'),
(203, 'Santé - Beauté>Soin du corps et du visage>Soin du Corps'),
(204, 'Santé - Beauté>Soin du corps et du visage>Produit Solaire'),
(205, 'Santé - Beauté>Soin du corps et du visage>Diététique et Bien-être'),
(206, 'Santé - Beauté>Santé>Premiers Soins'),
(207, 'Santé - Beauté>Santé>Matériel Médical'),
(208, 'Santé - Beauté>Santé>Relaxation & Parapharmacie'),
(209, 'Santé - Beauté>Santé>Lentilles de contact et Lunettes de vue'),
(210, 'Santé - Beauté>Santé>Intimité, Préservatif'),
(211, 'Santé - Beauté>Cosmétique et Parfum>Accessoires Beauté'),
(212, 'Santé - Beauté>Cosmétique et Parfum>Parfum'),
(213, 'Santé - Beauté>Cosmétique et Parfum>Maquillage'),
(214, 'Maison et Ameublement>Mobilier d''intérieur>Table et Chaise'),
(215, 'Maison et Ameublement>Mobilier d''intérieur>Canapé et Fauteuil'),
(216, 'Maison et Ameublement>Mobilier d''intérieur>Meuble de rangement'),
(217, 'Mode & Accessoires>Chaussure>Chaussure Enfant et Bébé'),
(218, 'Mode & Accessoires>Chaussure>Chaussure femme'),
(219, 'Mode & Accessoires>Chaussure>Chaussure homme'),
(220, 'Mode & Accessoires>Chaussure>Chaussure Sport Enfant'),
(221, 'Mode & Accessoires>Chaussure>Chaussure Sport Femme'),
(222, 'Mode & Accessoires>Chaussure>Chaussure Sport Homme'),
(223, 'Mode & Accessoires>Mode et accessoires>Alimentation bebe'),
(224, 'Mode & Accessoires>Mode et accessoires>Poussette et landau'),
(225, 'Mode & Accessoires>Mode et accessoires>Siege auto'),
(226, 'Mode & Accessoires>Mode et accessoires>Babyphone'),
(227, 'Mode & Accessoires>Mode et accessoires>Porte bebe'),
(228, 'Vin & Alimentation>Alimentation, Gastronomie>Gastronomie'),
(229, 'Vin & Alimentation>Alcool et Vin>Apéritfs Vin et Champagne, bieres');

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
  `id_categorie` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `link_image` text,
  PRIMARY KEY (`id_product`),
  KEY `id_categorie_idx` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id_product`, `ean_code`, `name`, `id_categorie`, `brand`, `link_image`) VALUES
(1, '1234567', 'test', 1, 'Marque', 'http://'),
(2, '1234567', 'test', 1, 'Marque', 'http://');

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
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_review`) REFERENCES `review` (`id_review`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

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
