-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 16 Janvier 2019 à 21:43
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'bio', 'sandwichs ingrédients bio et locaux'),
(2, 'végétarien', 'sandwichs végétariens - peuvent contenir des produits laitiers'),
(3, 'traditionnel', 'sandwichs traditionnels : jambon, pâté, poulet etc ..'),
(4, 'chaud', 'sandwichs chauds : américain, burger, '),
(5, 'veggie', '100% Veggie'),
(16, 'world', 'Tacos, nems, burritos, nos sandwichs du monde entier');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `titre` varchar(64) NOT NULL,
  `type` varchar(64) DEFAULT 'image/jpeg',
  `def_x` int(11) DEFAULT NULL,
  `def_y` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT '0',
  `filename` varchar(512) DEFAULT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `titre`, `type`, `def_x`, `def_y`, `taille`, `filename`, `s_id`) VALUES
(1, 'bucheron_0', 'image/png', 1650, 600, 15468, 'img_5a045cd771388.png', 4),
(2, 'bucheron_1', 'image/gif', 1280, 480, 9600, 'img_5a045cd7779f5.gif', 4),
(3, 'bucheron_2', 'image/png', 800, 600, 7500, 'img_5a045cd77b852.png', 4),
(4, 'bucheron_3', 'image/jpeg', 1024, 960, 15360, 'img_5a045cd7807ed.jpeg', 4),
(5, 'bucheron_4', 'image/jpeg', 2018, 600, 18918, 'img_5a045cd786ad9.jpeg', 4),
(6, 'bucheron_5', 'image/gif', 1024, 768, 12288, 'img_5a045cd78a8ba.gif', 4),
(7, 'bucheron_6', 'image/png', 1280, 480, 9600, 'img_5a045cd78ea86.png', 4),
(8, 'bucheron_7', 'image/jpeg', 1440, 480, 10800, 'img_5a045cd792b9c.jpeg', 4),
(9, 'jambon-beurre_0', 'image/jpeg', 800, 1080, 13500, 'img_5a045cd796f93.jpeg', 5),
(10, 'jambon-beurre_1', 'image/gif', 600, 480, 4500, 'img_5a045cd79b534.gif', 5),
(11, 'jambon-beurre_2', 'image/gif', 1280, 960, 19200, 'img_5a045cd79f1d4.gif', 5),
(12, 'jambon-beurre_3', 'image/jpeg', 1024, 600, 9600, 'img_5a045cd7a3269.jpeg', 5),
(13, 'fajitas poulet_0', 'image/png', 2018, 600, 18918, 'img_5a045cd7a61c1.png', 6),
(14, 'fajitas poulet_1', 'image/png', 600, 480, 4500, 'img_5a045cd7aa2bb.png', 6),
(15, 'fajitas poulet_2', 'image/jpeg', 600, 1080, 10125, 'img_5a045cd7ae2ad.jpeg', 6),
(16, 'le forestier_0', 'image/png', 1280, 768, 15360, 'img_5a045cd7b3f9b.png', 7),
(17, 'le forestier_1', 'image/jpeg', 1280, 600, 12000, 'img_5a045cd7b8382.jpeg', 7),
(18, 'le forestier_2', 'image/png', 800, 480, 6000, 'img_5a045cd7bc197.png', 7),
(19, 'le forestier_3', 'image/gif', 1024, 960, 15360, 'img_5a045cd7c012e.gif', 7),
(20, 'la mer_0', 'image/gif', 600, 600, 5625, 'img_5a045cd7c44c0.gif', 8),
(21, 'la mer_1', 'image/png', 1650, 960, 24750, 'img_5a045cd7c8560.png', 8),
(22, 'la mer_2', 'image/png', 600, 960, 9000, 'img_5a045cd7cc6be.png', 8),
(23, 'la mer_3', 'image/png', 1650, 600, 15468, 'img_5a045cd7d02d4.png', 8),
(24, 'la mer_4', 'image/jpeg', 1440, 600, 13500, 'img_5a045cd7d4307.jpeg', 8),
(25, 'la mer_5', 'image/gif', 1280, 1080, 21600, 'img_5a045cd7d80e1.gif', 8),
(26, 'le panini_0', 'image/jpeg', 1650, 960, 24750, 'img_5a045cd7dc714.jpeg', 9),
(27, 'le panini_1', 'image/png', 600, 600, 5625, 'img_5a045cd7e0cf6.png', 9),
(28, 'le panini_2', 'image/gif', 2018, 768, 24216, 'img_5a045cd7e4937.gif', 9),
(29, 'le panini_3', 'image/gif', 1024, 1080, 17280, 'img_5a045cd7e8888.gif', 9),
(30, 'le panini_4', 'image/jpeg', 800, 768, 9600, 'img_5a045cd7ec3ab.jpeg', 9),
(31, 'le panini_5', 'image/jpeg', 2018, 600, 18918, 'img_5a045cd7f0105.jpeg', 9),
(32, 'le panini_6', 'image/png', 1440, 960, 21600, 'img_5a045cd7f3de0.png', 9),
(33, 'le panini_7', 'image/png', 800, 768, 9600, 'img_5a045cd803833.png', 9),
(34, 'club_1', 'image/png', 800, 600, 7500, 'img_5a0465e7cd2c0.png', 10),
(35, 'club_2', 'image/png', 1024, 768, 12288, 'img_5a0465e7e6dad.png', 10),
(36, 'forestier', 'image/png', 600, 400, 3750, 'img_5a0465e7eb4b8.png', 10),
(37, 'mounach1', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(38, 'mounach2', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(39, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6),
(40, 'Bingerville', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(41, 'Cocody', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(42, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6),
(43, 'Bingerville', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(44, 'Cocody', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(45, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6),
(46, 'Bingerville', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(47, 'Cocody', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(48, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6),
(49, 'Bingerville', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(50, 'Cocody', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(51, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6),
(52, 'Bingerville', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(53, 'Cocody', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(54, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6),
(55, 'Bingerville', 'image/jpeg', NULL, NULL, 0, 'newImage1.jpg', 6),
(56, 'Cocody', 'image/jpeg', NULL, NULL, 0, 'newimage2.jpg', 6),
(57, 'Abidjanaise', 'image/jpeg', NULL, NULL, 0, 'newimage3.jpg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `sand2cat`
--

CREATE TABLE `sand2cat` (
  `sand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sand2cat`
--

INSERT INTO `sand2cat` (`sand_id`, `cat_id`) VALUES
(4, 3),
(4, 4),
(5, 3),
(5, 1),
(6, 4),
(6, 16),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 4),
(9, 16),
(10, 3),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `sandwich`
--

CREATE TABLE `sandwich` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `type_pain` text NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sandwich`
--

INSERT INTO `sandwich` (`id`, `nom`, `description`, `type_pain`, `deleted_at`) VALUES
(4, 'bucheron', 'un sandwich de bucheron : frites, fromage, saucisse, steack, lard grillés, mayo', 'baguette', NULL),
(5, 'jambon-beurre', 'le jambon-beurre traditionnel, avec des cornichons', 'baguette', NULL),
(6, 'fajitas poulet', 'fajitas au poulet avec ses tortillas de mais, comme à Puebla', 'tortillas', NULL),
(7, 'le forestier', 'le bon sandwich au gout de la forêt', 'baguette campagne', NULL),
(8, 'la mer', 'le sandwich au goût de la mer, saumon fumé ', 'mie', NULL),
(9, 'le panini', 'le panini napolitain authentique : jambon de parme, chèvre, olives noires, tomates séchées', 'panini', NULL),
(10, 'le club sandwich', 'le club sandwich comme à Saratoga : pain toasté, filet de dinde, bacon, laitue, tomate', 'mie', '2019-01-02'),
(49, 'Abidjanaise', ' Pain au four traditionnel', 'Mie', NULL),
(50, 'Abidjanaise', ' Pain au four traditionnel', 'Mie', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `taille_sandwich`
--

CREATE TABLE `taille_sandwich` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `taille_sandwich`
--

INSERT INTO `taille_sandwich` (`id`, `nom`, `description`) VALUES
(1, 'petite faim', 'le sandwich rapide pour les petites faims, même si elles sont sérieuses'),
(2, 'complet', 'le sandwich taille optimale pour un casse-croûte à toute heure'),
(3, 'grosse faim', 'à partager, ou pour les affamés'),
(4, 'ogre', 'pour les faims d\'ogres, et encore ....');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `taille_id` int(11) NOT NULL,
  `sand_id` int(11) NOT NULL,
  `prix` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`taille_id`, `sand_id`, `prix`) VALUES
(1, 4, '6.00'),
(2, 4, '6.50'),
(3, 4, '7.00'),
(4, 4, '8.00'),
(1, 5, '3.50'),
(2, 5, '4.00'),
(3, 5, '5.00'),
(4, 5, '6.00'),
(1, 6, '5.00'),
(2, 6, '7.00'),
(3, 6, '9.00'),
(4, 6, '12.00'),
(1, 7, '5.00'),
(2, 7, '6.00'),
(3, 7, '7.00'),
(4, 7, '10.00'),
(1, 8, '4.00'),
(2, 8, '5.00'),
(3, 8, '7.00'),
(2, 9, '6.00'),
(3, 9, '10.00'),
(1, 10, '5.00'),
(2, 10, '6.00'),
(3, 10, '7.00'),
(4, 10, '8.00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sandwich`
--
ALTER TABLE `sandwich`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `taille_sandwich`
--
ALTER TABLE `taille_sandwich`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `sandwich`
--
ALTER TABLE `sandwich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `taille_sandwich`
--
ALTER TABLE `taille_sandwich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
