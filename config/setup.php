<?php 
require_once("database.php");
$db_con = database_connection();
$db_con->exec("CREATE DATABASE IF NOT EXISTS `Camagru` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Camagru`;
CREATE TABLE `Comment` (
  `image` varchar(260) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` datetime DEFAULT NULL,
  `comment-id` int(11) NOT NULL,
  `user` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_nom` varchar(260) NOT NULL,
  `img_taille` varchar(25) NOT NULL,
  `img_type` varchar(25) NOT NULL,
  `user_login` varchar(250) NOT NULL,
  `likes` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `user` varchar(260) NOT NULL,
  `image` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date DEFAULT NULL,
  `cle` varchar(32) DEFAULT NULL,
  `actif` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD UNIQUE KEY `comment-id` (`comment-id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `comment-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=767;
--
-- AUTO_INCREMENT pour la table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;
--
-- AUTO_INCREMENT pour la table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
");
?>
