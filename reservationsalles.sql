-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 avr. 2020 à 15:44
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(3, 'reservation', 'coiffeur', '2020-03-17 13:00:00', '2020-03-17 13:00:00', 5),
(4, 'reservation', 'coiffeur', '2020-03-17 13:00:00', '2020-03-17 13:00:00', 5),
(5, 'rdv pro', 'rdv important', '2020-04-08 14:00:00', '2020-04-08 15:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'didier', '$2y$12$TD7KewzuM07z4me5x6OGD.WWI2EtQDvWAinTyQiY1Bf.WblCsgGsa'),
(2, 'pierre', '$2y$10$WEnlQoiHijhTxEhDhWcBSuIGK64enpYFEZjiUSdp3UJfBncIU9rBm'),
(3, 'antoine', '$2y$10$4Y5z0DzsSRhIGMo6eV9QmOxOuATfcZgPOCiOnKwhB/H1EfDhOXMOG'),
(4, 'pierro', '$2y$10$BzVHq7gjgr6YiDT1XLwfMexRHKEYpRgcn0E5zvDDK6PvCPJPT3Rhy'),
(5, 'claude', '$2y$10$P/sQdGXuGAsT5mFhlbTiu.Y5lCLuZqGB7GAoKV1QG9GMMn8mbSUQK'),
(6, 'laurent', '$2y$10$9I4hXU2yzbBw1iDJN8SYe.5i4SYIJfqplKMqLvtLA9xtv1eQjj8Gm'),
(7, 'kalif', '$2y$10$KDsCrRBcHfUHccq0U9BD6eibuo6cAPXOduHHTlUz8fy4/iAqeNiy.'),
(8, 'jul', '$2y$10$PDmC42dxwCK0ZCnVku5mU.SDgiMfP7UaRT6bKyDGV09LaQUP158Cm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
