-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2021 at 06:23 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `basketId` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`basketId`),
  KEY `FK_CONCERNE_USER` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basketId`, `userId`) VALUES
(16, 2),
(12, 2),
(13, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(33, 8),
(34, 8),
(35, 2),
(39, 2),
(40, 2),
(41, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `typeProduct` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `typeProduct`) VALUES
(1, 'pc portable'),
(2, 'ordinateur de bureau'),
(3, 'pc gaming'),
(4, 'carte graphique'),
(5, 'processeur'),
(8, 'Mémoire PC'),
(6, 'ecran');

-- --------------------------------------------------------

--
-- Table structure for table `fichetechnique`
--

DROP TABLE IF EXISTS `fichetechnique`;
CREATE TABLE IF NOT EXISTS `fichetechnique` (
  `ficheId` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `tailleMemoire` int DEFAULT NULL,
  `processeur` varchar(100) DEFAULT NULL,
  `processeurFab` varchar(100) DEFAULT NULL,
  `resolutionEcran` varchar(100) DEFAULT NULL,
  `tailleEcran` varchar(50) DEFAULT NULL,
  `carteGraphique` varchar(100) DEFAULT NULL,
  `typeHdd` varchar(20) DEFAULT NULL,
  `tailleHdd` int DEFAULT NULL,
  `poids` decimal(10,0) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ficheId`),
  KEY `FK_CONCERNE_PRODUIT` (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fichetechnique`
--

INSERT INTO `fichetechnique` (`ficheId`, `productId`, `prix`, `tailleMemoire`, `processeur`, `processeurFab`, `resolutionEcran`, `tailleEcran`, `carteGraphique`, `typeHdd`, `tailleHdd`, `poids`, `OS`) VALUES
(1, 1, '999', 8, 'Core i5-10300H', 'intel', '1920 x 1080 pixels', '15.6 pouces', 'GeForce GTX 1650', 'SSD', 256, '22', 'windows 10'),
(2, 2, '2250', 16, 'Core i7-10875H', 'intel', '1920 x 1080 pixels', '15.6 pouces', 'GeForce RTX 2070 SUPER', 'SSD', 512, '22', 'windows 10'),
(3, 3, '750', 8, 'Core i5-9500', 'intel', '', '', 'Intel UHD Graphics 630', 'HDD', 1024, '793', 'windows 10 pro'),
(4, 4, '4000', 32, 'Core i7-10700K', 'intel', '', '', 'GeForce RTX 3090', 'SSD', 1024, '1286', 'windows 10'),
(5, 5, '990', 12, '', '', '', '', 'Radeon RX 6700 XT', '', 0, '0', ''),
(6, 6, '555', 12, '', '', '', '', 'GeForce RTX 3060', '', 0, '0', ''),
(7, 7, '90', NULL, 'Ryzen 3', 'AMD', '', '', '', '', 0, '0', ''),
(8, 8, '650', NULL, 'Ryzen 9 5900X', 'AMD', '', '', '', '', 0, '0', ''),
(9, 9, '140', NULL, '', '', '1920 x 1080 pixels', '22 pouces', '', '', 0, '28', ''),
(10, 10, '4200', NULL, '', '', '3840 x 2160 pixels', '65 pouces', '', '', 0, '368', ''),
(11, 11, '996', 128432, '', '', '', '', '', '', 0, '0', ''),
(12, 12, '36', 4, '', '', '', '', '', '', 0, '0', ''),
(13, 13, '2600', 16, 'Core i9-10850K', 'intel', '', '', 'GeForce RTX 3070', 'SSD', 2048, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(300) NOT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `description` text,
  `categoryID` int DEFAULT NULL,
  `onTop` bit(1) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  KEY `FK_APPARTIENT_A` (`categoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `imgUrl`, `description`, `categoryID`, `onTop`) VALUES
(1, 'Lenovo IdeaPad Gaming 3 15IMH05', '../../../src/img/produit/1624485408LD0005762116_1_0005776572.jpg', 'Le PC portable Gamer Lenovo IdeaPad Gaming 3 15IMH05 offre des performances remarquables pour un prix abordable. Avec ses composants performants, son clavier rétroéclairé et son écran de 15.6&quot;, il offre un excellent confort de jeu.', 1, b'1'),
(2, 'AORUS 15G XB-8FR2130MH', '../../../src/img/produit/1624485594LD0005660735_2_0005661380.jpg', 'Profitez de hautes performances de jeu et aussi d\'une excellente mobilité avec le PC portable Gamer AORUS 15G ! En plus de composants ultra-performants, il bénéficie d\'un écran 240 Hz avec cadre mince offrant un affichage de haute qualité.', 1, b'0'),
(3, 'Dell OptiPlex 3070 MT', '../../../src/img/produit/1624485743LD0005647444_2.jpg', 'Le Dell OptiPlex 3070 MT (DH3XN) offre de bonnes performances et un fonctionnement fluide et rapide grâce à son puissant processeur Intel Core i5-9500, ses 8 Go de mémoire DDR4 et son HDD 1 To.', 2, b'1'),
(4, 'HP Omen GT13-0955nf', '../../../src/img/produit/1624486116LD0005828612_1_0005828615_0005833957_0005833985.jpg', 'Le HP Omen GT13 est un PC Gaming efficace et stylé. Il s\'appuie sur des composants performants pour vous permettre de jouer à vos jeux PC favoris dans les meilleures conditions : Processeur Intel Core i7-10700K, DDR4, SSD NVMe et carte graphique NVIDIA GeForce RTX 3090.', 2, b'0'),
(5, 'ASRock AMD Radeon RX 6700 XT Challenger Pro', '../../../src/img/produit/1624486405LD0005802836_1.jpg', 'La carte graphique ASRock AMD Radeon RX 6700 XT Challenger Pro 12GB OC est une carte graphique gaming qui est animée par l\'architecture RDNA 2 destinée aux gamers exigeants. Elle est la carte graphique idéale pour une utilisation en 1440p avec des fréquences d\'images ultra-élevées.', 4, b'1'),
(6, 'ASUS DUAL GeForce RTX 3060', '../../../src/img/produit/1624486485LD0005849903_1.jpg', 'La carte graphique ASUS GeForce RTX Dual 3060 12G LHR embarque 12 Go de mémoire vidéo de nouvelle génération GDDR6. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 4, b'0'),
(7, 'AMD Ryzen 3 1200 AF Wraith Stealth Edition', '../../../src/img/produit/1624486558LD0005668738_1.jpg', 'L\'AMD Ryzen 3 1200 AF est LE processeur Quad-Core abordable grand public d\'AMD : fréquence de 3.1 GHz à 3.4 GHz, 8 Mo de cache L3 et seulement 65W de TDP ! Il vous permettra de doter votre machine d\'un processeur Quad-Core performant pour un rapport performances / prix incroyable.', 5, b'0'),
(8, 'AMD Ryzen 9 5900X', '../../../src/img/produit/1624486628LD0005746003_1.jpg', 'Le processeur AMD Ryzen 9 5900X est ce qui se fait de mieux pour le jeu vidéo et le streaming : 12 Cores, 24 Threads et GameCache 70 Mo. Sans parler des fréquences natives et boost qui atteignent des sommets pour vous permettre de profiter de vos jeux préférés dans les meilleures conditions.', 5, b'1'),
(9, 'LG 22&#34; LED 22MK430H-B', '../../../src/img/produit/1624486693LD0005216148_2.jpg', 'Regroupant des fonctionnalités idéales pour des parties de haute volée, le moniteur 22MK430H-B signé LG vous accompagnera idéalement dans votre quête de la victoire. Savourez des moments intenses devant cet écran Full HD doté d\'une dalle IPS et de la technologie AMD FreeSync.', 6, b'1'),
(10, 'ASUS 65&#34; LED - ROG Swift PG65UQ', '../../../src/img/produit/1624486787LD0005571741_2.jpg', 'Du haut de ses 65 pouces de diagonale, le moniteur ROG Swift PG65UQ trône au sommet de la gamme des moniteurs de jeu ASUS. Goûtez aux 144 Hz, à la technologie G-Sync Ultimate, au Quantum Dot et au HDR 1000 pour découvrir une nouvelle manière de jouer, toujours plus immersive !', 6, b'1'),
(11, 'HyperX Fury DDR4 3466 MHz CL17', '../../../src/img/produit/1624486913LD0005709713_1.jpg', 'La célèbre mémoire HyperX Fury revient avec un design actualisé du dissipateur de chaleur qui est aminci tout en gardant une efficacité redoutable Son style racé apporté par le dissipateur apporte une touche gaming assumée. Elle est compatible avec les processeurs Intel et AMD les plus récents.', 8, b'1'),
(12, 'Corsair ValueSelect DDR4 2400MHz CL16', '../../../src/img/produit/1624486999LD0004368527_2.jpg', 'Avec la nouvelle gamme de mémoires PC haute fiabilité ValueSelect, Corsair propose des solutions stables et performantes pour les plateformes nouvelle génération. Avec des tensions nominales de 1.2V les mémoires PC ValueSelect sont optimisées pour les plateformes Intel de 6ème génération !', 8, b'0'),
(13, 'LDLC PC ATOMIZER', '../../../src/img/produit/1624555786LD0005714266_1.jpg', 'Vous rêviez d\'une machine puissante qui vous fera prendre l\'ascendant sur votre adversaire ? LDLC l\'a fait et vous propose le PC ATOMIZER ! Cette configuration haut de gamme vous fera évoluer et découvrir la puissance des derniers composants pour toujours être à la pointe de la technologie.', 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

DROP TABLE IF EXISTS `productlist`;
CREATE TABLE IF NOT EXISTS `productlist` (
  `productId` int DEFAULT NULL,
  `basketId` int DEFAULT NULL,
  KEY `FK_REFERENCE_PRODUIT` (`productId`),
  KEY `FK_APPARTIEN_PANIER` (`basketId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`productId`, `basketId`) VALUES
(5, 23),
(10, 35),
(3, 22),
(11, 17),
(13, 18),
(1, 21),
(5, 25),
(4, 34),
(11, 27),
(13, 28),
(4, 29),
(13, 30),
(13, 31),
(13, 32),
(13, 33),
(9, 36),
(13, 37),
(8, 38),
(8, 39),
(3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ban` varchar(50) DEFAULT NULL,
  `roleId` int DEFAULT '2',
  PRIMARY KEY (`userId`),
  KEY `FK_ROLE_DEFINI` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `login`, `email`, `password`, `ban`, `roleId`) VALUES
(1, 'GuyVil1', 'guy.vilain1@gmail.com', '17zehWIp0M8MQ', '1725653610', 1),
(2, 'Neceroth', 'neceroth@gmail.com', '17j/AQkpV6BbU', '1736545548', 1),
(8, 'Neceroth2', 'neceroth2@gmail.com', '17T6apk/M8yYc', '1732827645', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
