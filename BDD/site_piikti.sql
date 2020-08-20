-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 mars 2020 à 02:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_piikti`
--

-- --------------------------------------------------------

--
-- Structure de la table `piikti_produit`
--

DROP TABLE IF EXISTS `piikti_produit`;
CREATE TABLE IF NOT EXISTS `piikti_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `desc_produit` text NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `sexe_produit` varchar(255) NOT NULL,
  `cat_produit` varchar(255) NOT NULL,
  `tailleS` varchar(11) DEFAULT NULL,
  `tailleM` varchar(11) DEFAULT NULL,
  `tailleL` varchar(11) DEFAULT NULL,
  `chemin_photo_produit` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piikti_produit`
--

INSERT INTO `piikti_produit` (`id`, `id_utilisateur`, `nom_produit`, `desc_produit`, `prix_produit`, `sexe_produit`, `cat_produit`, `tailleS`, `tailleM`, `tailleL`, `chemin_photo_produit`) VALUES
(15, 14, 'Gagoul', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada mollis leo eu ultrices. Nunc a sodales ipsum. Vivamus condimentum tempus nisl, ut convallis velit tempus eu. Donec sagittis sollicitudin turpis, et malesuada lorem dignissim id. Vivamus porta eu magna non maximus. In hac habitasse platea dictumst. Donec a mauris ullamcorper, volutpat mi id, pellentesque diam. Curabitur ut commodo nulla. Praesent vitae sapien eu urna accumsan iaculis. Proin volutpat velit a dolor pellentesque tincidunt. Duis cursus arcu in nibh scelerisque hendrerit.', 20, 'homme', 'accessoires', 'S', 'M', NULL, 'upload/photo_produits/Photo_15.jpg'),
(16, 14, 'Bob', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin rhoncus, dolor quis posuere feugiat, nibh justo pellentesque arcu, id maximus lorem dui eget erat. Curabitur accumsan magna sed tortor eleifend sollicitudin. Vivamus vel ullamcorper lectus, eget vulputate erat. Vestibulum tempus, dolor in elementum laoreet, neque mauris porttitor ligula, at volutpat ex est id sapien. Nullam imperdiet sem nunc, nec volutpat mauris tempus sed. Quisque non tristique enim, sit amet pharetra sapien. Sed tincidunt nibh vel iaculis finibus. Quisque dolor ex, ornare non libero id, eleifend porttitor justo. Morbi eu porttitor justo. Aliquam blandit, elit vel pretium finibus, mauris turpis cursus diam, eu accumsan tortor sem id felis. Mauris et ultrices ex. Nam blandit facilisis lectus a varius. Morbi sed suscipit massa, volutpat consectetur odio.', 16, 'femme', 'accessoires', 'S', NULL, NULL, 'upload/photo_produits/Photo_16.jpg'),
(17, 14, 'Jogging tendances', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin rhoncus, dolor quis posuere feugiat, nibh justo pellentesque arcu, id maximus lorem dui eget erat. Curabitur accumsan magna sed tortor eleifend sollicitudin. Vivamus vel ullamcorper lectus, eget vulputate erat. Vestibulum tempus, dolor in elementum laoreet, neque mauris porttitor ligula, at volutpat ex est id sapien. Nullam imperdiet sem nunc, nec volutpat mauris tempus sed. Quisque non tristique enim, sit amet pharetra sapien. Sed tincidunt nibh vel iaculis finibus. Quisque dolor ex, ornare non libero id, eleifend porttitor justo. Morbi eu porttitor justo. Aliquam blandit, elit vel pretium finibus, mauris turpis cursus diam, eu accumsan tortor sem id felis. Mauris et ultrices ex. Nam blandit facilisis lectus a varius. Morbi sed suscipit massa, volutpat consectetur odio.', 26, 'homme', 'manteaux_blousons', NULL, 'M', 'L', 'upload/photo_produits/Photo_17.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `piikti_users`
--

DROP TABLE IF EXISTS `piikti_users`;
CREATE TABLE IF NOT EXISTS `piikti_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `date_Inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piikti_users`
--

INSERT INTO `piikti_users` (`id`, `nom`, `prenom`, `dateNaissance`, `mail`, `mdp`, `date_Inscription`) VALUES
(9, 'Jacket', 'Aurélien', '2020-03-05', 'jacket@gmail.com', '$2y$10$d8Y06dLMqtHPa66KnEpCIOwHRI/fMBK4m5QGfrcOTpxtL68P/kpmS', '2020-03-17'),
(10, 'David', 'David', '1997-02-18', 'dognin@gmail.com', '$2y$10$65ydCRFavubiylUwhYmK8.2WkRBlvLhmvsTACXYO65UQpWY6lj3qS', '2020-03-17'),
(11, 'Kasket', 'Sarah', '2001-02-07', 'kasket@gmail.com', '$2y$10$YJhH8nBwmP2jgihqEQSe3OBZPzG7KW.6Po/QteLepcHgI57vFzrDC', '2020-03-17'),
(12, 'Dognin', 'Audrey', '1991-06-05', 'papi@gmail.com', '$2y$10$IawCXQesPB7lbkhdbfTunuoYnEwCQCW2EMlSpnZKgHgNi7AVJ43hi', '2020-03-17'),
(13, 'Peto', 'Damin', '1991-11-13', 'peta@gmail.com', '$2y$10$sroM42hJg2AvFYQscKwLAuygcKIZikS49jdxWRIbw3L3ig32Fnetu', '2020-03-18'),
(14, 'Cast', 'Jean-michel', '1989-06-13', 'cast@gmail.com', '$2y$10$6RUZNBEBBNYObvEeMjbXKO7.ixXKCfKNu5vFsfj19MhItVfhRQ7LC', '2020-03-18');

-- --------------------------------------------------------

--
-- Structure de la table `piikti_users_meta`
--

DROP TABLE IF EXISTS `piikti_users_meta`;
CREATE TABLE IF NOT EXISTS `piikti_users_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `chemin_photo_profile` varchar(255) DEFAULT NULL,
  `facebook_lien` text DEFAULT NULL,
  `instagram_lien` text DEFAULT NULL,
  `pinterest_lien` text DEFAULT NULL,
  `langue_defaut` varchar(255) NOT NULL DEFAULT 'Français',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piikti_users_meta`
--

INSERT INTO `piikti_users_meta` (`id`, `id_utilisateur`, `description`, `numero`, `chemin_photo_profile`, `facebook_lien`, `instagram_lien`, `pinterest_lien`, `langue_defaut`) VALUES
(1, 8, NULL, NULL, NULL, 'https://daviddognin.com/', NULL, NULL, 'Français'),
(2, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elementum accumsan iaculis. Integer non pulvinar nunc. Cras sapien enim, porttitor non nisl vel, convallis tempor sem. Nullam a tristique tortor, ut interdum tellus. Integer eleifend consequat turpis, ac egestas lectus interdum in. Curabitur id tincidunt lacus. Nunc in felis convallis, ornare nulla at, ullamcorper ante. Donec non mauris ac ipsum mattis finibus eu volutpat tellus. Suspendisse potenti. Morbi egestas vulputate viverra. Suspendisse potenti. Suspendisse quis blandit nulla.', '0675087422', 'upload/photo_profile/Photo_10.jpg', 'https://daviddognin.com/', 'https://www.instagram.com/?hl=fr', NULL, 'Français'),
(3, 11, 'Sed vestibulum velit urna, et suscipit purus aliquet convallis. Ut consectetur neque sit amet aliquet blandit. Mauris eu libero sodales, rhoncus eros vel, varius enim. Nam a dolor eu libero sodales efficitur. Ut vestibulum viverra ante non interdum. Duis commodo elementum cursus. Cras rhoncus massa non lacus rhoncus, non congue ligula viverra. Phasellus vehicula nunc lorem, nec consectetur odio consectetur in. Maecenas nec pulvinar nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt ullamcorper lacus. Aenean accumsan, neque at suscipit pharetra, nisl libero gravida sem, id lacinia neque nibh et nisi. Sed posuere ligula at fringilla fermentum.', NULL, 'upload/photo_profile/Photo_11.jpg', 'https://daviddognin.com/', NULL, NULL, 'Français'),
(4, 12, NULL, NULL, NULL, 'https://daviddognin.com/', NULL, NULL, 'Français'),
(5, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque nisi a cursus tempus. Vivamus placerat tortor et diam varius, nec venenatis lacus mattis. Mauris quis quam odio. Proin pretium dui mi, quis hendrerit odio consequat efficitur. Aliquam volutpat lobortis justo, vel blandit orci bibendum sollicitudin. Suspendisse volutpat ut massa eget elementum. Vestibulum nec nunc fermentum, pulvinar mauris nec, euismod felis. Aliquam efficitur ante vel leo blandit laoreet.', NULL, NULL, NULL, NULL, NULL, 'Français'),
(7, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent malesuada mollis leo eu ultrices. Nunc a sodales ipsum. Vivamus condimentum tempus nisl, ut convallis velit tempus eu. Donec sagittis sollicitudin turpis, et malesuada lorem dignissim id. Vivamus porta eu magna non maximus. In hac habitasse platea dictumst. Donec a mauris ullamcorper, volutpat mi id, pellentesque diam. Curabitur ut commodo nulla. Praesent vitae sapien eu urna accumsan iaculis. Proin volutpat velit a dolor pellentesque tincidunt. Duis cursus arcu in nibh scelerisque hendrerit.', '0674545485', 'upload/photo_profile/Photo_14.jpg', NULL, NULL, NULL, 'Français');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
