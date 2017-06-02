<?php 
require_once("database.php");
$db_con = database_connection();
$db_con->exec("CREATE DATABASE IF NOT EXISTS `Camagru` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `camagru`;
CREATE TABLE IF NOT EXISTS `Comment` (
  `image` varchar(260) NOT NULL,
  `comment` varchar(260) NOT NULL,
  `date` datetime DEFAULT NULL,
  `comment-id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(260) NOT NULL,
  UNIQUE KEY `comment-id` (`comment-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`image`, `comment`, `date`, `comment-id`, `user`) VALUES
('new_image_35.png', 'les bg du game', '2017-05-14 13:57:51', 3, 'lucas'),
('989.jpg', 'ewrfwerf', '2017-05-17 11:24:57', 4, 'lucas'),
('989.jpg', 'ewrfwerf', '2017-05-17 11:25:03', 5, 'lucas'),
('989.jpg', 'wergwegr', '2017-05-17 11:25:10', 6, 'lucas'),
('new_image_20.png', 'trop swag!', '2017-05-18 13:28:10', 7, 'lucas'),
('new_image_20.png', 'trop swag!', '2017-05-18 13:28:15', 8, 'lucas'),
('new_image_37.png', 'etrgergtergt', '2017-05-19 15:04:41', 75, 'user1'),
('new_image_37.png', 'etrgergtergt', '2017-05-19 15:13:26', 76, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:14:05', 77, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:14:09', 78, 'user1'),
('new_image_37.png', 'edew', '2017-05-19 15:14:26', 79, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:35', 80, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:37', 81, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:38', 82, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:39', 83, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:40', 84, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:42', 85, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:42', 86, 'user1'),
('new_image_37.png', 'qqewd', '2017-05-19 15:14:43', 87, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:15:16', 88, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:15:28', 89, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:22:41', 90, 'user1'),
('new_image_37.png', 'qwefqwf', '2017-05-19 15:23:42', 91, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:24:03', 92, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:24:18', 93, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:24:19', 94, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:24:39', 95, 'user1'),
('new_image_37.png', 'qwefqwefq', '2017-05-19 15:24:53', 96, 'user1'),
('new_image_37.png', 'qwefqwef', '2017-05-19 15:25:22', 97, 'user1'),
('new_image_37.png', 'rwegwerg . ergwer gwe gwerg werg w rwegwerg . ergwer gwe gwerg werg wrwegwerg . ergwer gwe gwerg werg wrwegwerg . ergwer gwe gwerg werg wrwegwerg . ergwer gwe gwerg werg wrwegwerg . ergwer gwe gwerg werg wrwegwerg . ergwer gwe gwerg werg wrwegwerg . ergwer gwe', '2017-05-19 15:43:47', 99, 'user1'),
('new_image_37.png', 'qwedqwde qwed', '2017-05-19 15:44:14', 100, 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_nom` varchar(260) NOT NULL,
  `img_taille` varchar(25) NOT NULL,
  `img_type` varchar(25) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `user_login` varchar(250) NOT NULL,
  `likes` int(255) DEFAULT '0',
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=732 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_nom`, `img_taille`, `img_type`, `img_path`, `user_login`, `likes`) VALUES
(437, 'f85300d4acd2f153703ca706cdc8d6c6_large.jpeg', '10000', '.jpeg', '', 'lucas', 3),
(441, '20120709235311-ae92c2bf.jpg', '10000', '.jpg', '', 'lucas', 1),
(442, 'fond-ecran-hd-gratuit_89.jpg', '10000', '.jpg', '', 'lucas', 2),
(443, 'fonds-ecran-hd-gratuits_45.jpg', '10000', '.jpg', '', 'lucas', 0),
(444, 'new_image_7.png', '1', 'png', '', 'lucas', 0),
(445, '989.jpg', '10000', '.jpg', '', 'lucas', 1),
(446, 'tour-eiffel-Hd-Wallpaper.jpg', '10000', '.jpg', '', 'lucas', 0),
(447, 'Nebuleuse_fond_ecran_-_1920x1080.jpg', '10000', '.jpg', '', 'lucas', 1),
(448, 'fonds-ecran-hd-gratuits_11.jpg', '10000', '.jpg', '', 'lucas', 1),
(449, 'chat-cute.-550x327.jpg', '10000', '.jpg', '', 'lucas', 0),
(450, 'Etincelle_Fond_ecran_1600x900.jpg', '10000', '.jpg', '', 'lucas', 1),
(451, 'Wallpaper_HD_neige_winter_2012031318_78.jpg', '10000', '.jpg', '', 'lucas', 0),
(452, 'Magnifique_fond_ecran_HD_-_Hiver.jpg', '10000', '.jpg', '', 'lucas', 1),
(453, 'HD_Wallpaper_New_York_18.jpg', '10000', '.jpg', '', 'lucas', 0),
(494, 'new_image_48.png', '1', 'png', '', 'lucas', 1),
(501, 'new_image_28.png', '1', 'png', '', 'lucas', 0),
(508, 'new_image_35.png', '1', 'png', '', 'lucas', 2),
(509, 'new_image_27.png', '1', 'png', '', 'sofian', 1),
(573, 'new_image_25.png', '1', 'png', '', 'lucas', 0),
(616, 'new_image_19.png', '1', 'png', '', 'lucas', 0),
(617, 'new_image_20.png', '1', 'png', '', 'lucas', 1),
(621, 'a.jpg', '10000', '.jpg', '', 'lucas', 0),
(622, 'new_image_22.png', '1', 'png', '', 'lucas', 0),
(623, 'new_image_23.png', '1', 'png', '', 'lucas', 0),
(624, 'new_image_24.png', '1', 'png', '', 'lucas', 0),
(625, 'new_image_26.png', '1', 'png', '', 'lucas', 0),
(626, 'new_image_29.png', '1', 'png', '', 'lucas', 0),
(627, 'new_image_30.png', '1', 'png', '', 'lucas', 0),
(628, 'new_image_31.png', '1', 'png', '', 'lucas', 0),
(629, 'new_image_32.png', '1', 'png', '', 'lucas', 0),
(630, 'new_image_33.png', '1', 'png', '', 'lucas', 0),
(731, 'new_image_37.png', '1', 'png', '', 'user1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(260) NOT NULL,
  `image` varchar(260) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=316 ;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `user`, `image`) VALUES
(271, 'sofian', 'f85300d4acd2f153703ca706cdc8d6c6_large.jpeg'),
(280, 'lucas', 'Nebuleuse_fond_ecran_-_1920x1080.jpg'),
(281, 'lucas', 'Etincelle_Fond_ecran_1600x900.jpg'),
(282, 'lucas', '989.jpg'),
(283, 'lucas', 'Magnifique_fond_ecran_HD_-_Hiver.jpg'),
(284, 'lucas', 'new_image_35.png'),
(291, 'sofian', 'new_image_35.png'),
(298, 'lucas', 'fonds-ecran-hd-gratuits_11.jpg'),
(306, 'lucas', 'fond-ecran-hd-gratuit_89.jpg'),
(310, 'sofian', '20120709235311-ae92c2bf.jpg'),
(311, 'sofian', 'fond-ecran-hd-gratuit_89.jpg'),
(312, 'lucas', 'new_image_27.png'),
(313, 'lucas', 'new_image_48.png'),
(314, 'lucas', 'new_image_20.png'),
(315, 'lucas', 'f85300d4acd2f153703ca706cdc8d6c6_large.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE IF NOT EXISTS `user_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` binary(64) NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `login`, `password`, `email`, `creation_date`) VALUES
(46, 'lucas', '93e8a13252a40c9c3aa0cfdc601f5807d9148342eb26e7b1b854266d8e3fede5', 'charvolin0@gmail.com', '2017-05-06'),
(47, 'coucou', 'f6f2ea8f45d8a057c9566a33f99474da2e5c6a6604d736121650e2730c6fb0a3', 'coucou@gmail.com', '2017-05-06'),
(48, 'salut', 'ec9c3a34e791bda21bbcb69ea0eb875857497e0d48c75771b3d1adb5073ce791', 'salut@gmail.com', '2017-05-06'),
(49, 'elliott', '0f9c00b3f38f964ee172095f50e53fe9b9e01bd0e1a9f750d877bd26a84ffe18', 'esteph@gmail.com', '2017-05-11'),
(50, 'sofian', 'f6fed5e432f85280a0e98499830487c9daf94568a2c0e580534a36e23c34f029', 'sofian@gmail.com', '2017-05-11'),
(51, 'lucs', '93e8a13252a40c9c3aa0cfdc601f5807d9148342eb26e7b1b854266d8e3fede5', 'chaolin0@gmail.com', '2017-05-12'),
(52, 'powkefkqwpk', '93e8a13252a40c9c3aa0cfdc601f5807d9148342eb26e7b1b854266d8e3fede5', 'caewfw@gmail.com', '2017-05-19'),
(53, 'user1', '93e8a13252a40c9c3aa0cfdc601f5807d9148342eb26e7b1b854266d8e3fede5', 'weprfkoierof@gmail.com', '2017-05-19');
");
?>
