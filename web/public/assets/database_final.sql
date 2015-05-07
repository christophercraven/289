-- BePlace.com database
--
-- Access credentials:
-- admin login: admin@admin.com
-- password: admin
--
-- user login: demo@demo.com
-- password: demo
-- 
--
-- 
-- Generation Time: May 07, 2015 at 02:56 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db289`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_add`
--

CREATE TABLE IF NOT EXISTS `address_add` (
  `id_add` int(11) NOT NULL,
  `type_typ_add` tinyint(4) DEFAULT NULL,
  `street_add` varchar(45) DEFAULT NULL,
  `street2_add` varchar(45) DEFAULT NULL,
  `city_add` varchar(30) DEFAULT NULL,
  `zipcode_zip_add` int(9) DEFAULT NULL,
  PRIMARY KEY (`id_add`),
  KEY `fk_address_add_zipcode_zip1` (`zipcode_zip_add`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_app`
--

CREATE TABLE IF NOT EXISTS `app_app` (
  `id_app` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name_app` varchar(45) DEFAULT NULL,
  `tagline_app` varchar(140) DEFAULT NULL,
  `creator_app_usr` mediumint(9) NOT NULL,
  `sponsor_app_spo` smallint(6) DEFAULT NULL,
  `desc_app` varchar(1024) DEFAULT NULL,
  `icon_app` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_app`),
  KEY `creator_app_usr` (`creator_app_usr`),
  KEY `sponsor_app_spo` (`sponsor_app_spo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `app_app`
--

INSERT INTO `app_app` (`id_app`, `name_app`, `tagline_app`, `creator_app_usr`, `sponsor_app_spo`, `desc_app`, `icon_app`) VALUES
(3, 'Calendar', 'A calendar of awesomeness at your fingertips!', 6, 2, 'With this excellent calendar app, you have everything you need to keep track of important dates. This calendar is designed to help you get all your favorite events line up and organized so you know where and when stuff is happening, and you can even share events with friends!', 'img/apps/Calendar.png'),
(4, 'Note Taker', 'The best note taking app you ever saw.', 6, 3, 'Note Taker is a note taking app like no other. It lets you take notes really fast and can intelligently set up note contexts.', 'img/apps/Notes.png'),
(5, 'Super Stop Watch', 'Control time backwards and forwards!', 6, NULL, 'Super Stop Watch is unique because it lets you count down or count up in time by hours, minutes, seconds and even tenths of a second.', 'img/apps/Clock.png'),
(6, 'Photo Jockey', 'Quick photo-taking and photo-finding app.', 4, NULL, 'For those in a hurry, you need this app to snap quick photos without fiddling around. Also lets you shuffle and scan through tons of pics really fast so you can post them anywhere in a hurry.', 'img/apps/iPod.png'),
(9, 'Pic Snip', 'A fast photo-cropping and cut-out tool.', 4, NULL, 'With Pic Snip, you can quickly crop photos to just the good parts. You can even use cut-out shapes like stars and circles to trim your photos.', 'img/apps/Chat.png'),
(10, 'Red Eye Begone!', 'A super-simple red-eye reduction app.', 3, NULL, 'Just touch the red eyes in your photos and Red Eye Begone! does the rest. It really is that simple, and effective too.', 'img/apps/Settings.png');

-- --------------------------------------------------------

--
-- Table structure for table `app_app_has_user_usr`
--

CREATE TABLE IF NOT EXISTS `app_app_has_user_usr` (
  `app_app_id_app` mediumint(9) NOT NULL,
  `user_usr_id_usr` mediumint(9) NOT NULL,
  `types_typ_id_typ` tinyint(4) NOT NULL,
  KEY `app_app_id_app` (`app_app_id_app`,`user_usr_id_usr`,`types_typ_id_typ`),
  KEY `user_usr_id_usr` (`user_usr_id_usr`),
  KEY `types_typ_id_typ` (`types_typ_id_typ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_app_has_user_usr`
--

INSERT INTO `app_app_has_user_usr` (`app_app_id_app`, `user_usr_id_usr`, `types_typ_id_typ`) VALUES
(3, 2, 3),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `colors_col`
--

CREATE TABLE IF NOT EXISTS `colors_col` (
  `name_col` varchar(17) NOT NULL,
  PRIMARY KEY (`name_col`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors_col`
--

INSERT INTO `colors_col` (`name_col`) VALUES
('AliceBlue'),
('AntiqueWhite'),
('Aqua'),
('Aquamarine'),
('Azure'),
('Beige'),
('Bisque'),
('Black'),
('BlanchedAlmond'),
('Blue'),
('BlueViolet'),
('Brown'),
('Burlywood'),
('CadetBlue'),
('Chartreuse'),
('Chocolate'),
('Coral'),
('Cornflower'),
('Cornsilk'),
('Crimson'),
('Cyan'),
('DarkBlue'),
('DarkCyan'),
('DarkGoldenrod'),
('DarkGray'),
('DarkGreen'),
('DarkKhaki'),
('DarkMagenta'),
('DarkOliveGreen'),
('DarkOrange'),
('DarkOrchid'),
('DarkRed'),
('DarkSalmon'),
('DarkSeaGreen'),
('DarkSlateBlue'),
('DarkSlateGray'),
('DarkTurquoise'),
('DarkViolet'),
('DeepPink'),
('DeepSkyBlue'),
('DimGray'),
('DodgerBlue'),
('Firebrick'),
('FloralWhite'),
('ForestGreen'),
('Fuchsia'),
('Gainsboro'),
('GhostWhite'),
('Gold'),
('Goldenrod'),
('Gray'),
('Green'),
('GreenYellow'),
('Honeydew'),
('HotPink'),
('IndianRed'),
('Indigo'),
('Ivory'),
('Khaki'),
('Lavender'),
('LavenderBlush'),
('LawnGreen'),
('LemonChiffon'),
('LightBlue'),
('LightCoral'),
('LightCyan'),
('LightGoldenrod'),
('LightGray'),
('LightGreen'),
('LightPink'),
('LightSalmon'),
('LightSeaGreen'),
('LightSkyBlue'),
('LightSlateGray'),
('LightSteelBlue'),
('LightYellow'),
('Lime'),
('LimeGreen'),
('Linen'),
('Magenta'),
('Maroon'),
('MediumAquamarine'),
('MediumBlue'),
('MediumOrchid'),
('MediumPurple'),
('MediumSeaGreen'),
('MediumSlateBlue'),
('MediumSpringGreen'),
('MediumTurquoise'),
('MediumVioletRed'),
('MidnightBlue'),
('MintCream'),
('MistyRose'),
('Moccasin'),
('NavajoWhite'),
('NavyBlue'),
('OldLace'),
('Olive'),
('OliveDrab'),
('Orange'),
('OrangeRed'),
('Orchid'),
('PaleGoldenrod'),
('PaleGreen'),
('PaleTurquoise'),
('PaleVioletRed'),
('PapayaWhip'),
('PeachPuff'),
('Peru'),
('Pink'),
('Plum'),
('PowderBlue'),
('Purple'),
('RebeccaPurple'),
('Red'),
('RosyBrown'),
('RoyalBlue'),
('SaddleBrown'),
('Salmon'),
('SandyBrown'),
('SeaGreen'),
('Seashell'),
('Sienna'),
('Silver'),
('SkyBlue'),
('SlateBlue'),
('SlateGray'),
('Snow'),
('SpringGreen'),
('SteelBlue'),
('Tan'),
('Teal'),
('Thistle'),
('Tomato'),
('Turquoise'),
('Violet'),
('WebGray'),
('WebGreen'),
('WebMaroon'),
('WebPurple'),
('Wheat'),
('White'),
('WhiteSmoke'),
('Yellow'),
('YellowGreen');

-- --------------------------------------------------------

--
-- Table structure for table `fruits_fru`
--

CREATE TABLE IF NOT EXISTS `fruits_fru` (
  `name_fru` varchar(16) NOT NULL,
  PRIMARY KEY (`name_fru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fruits_fru`
--

INSERT INTO `fruits_fru` (`name_fru`) VALUES
('Apple'),
('Apricot'),
('Avocado'),
('Banana'),
('Bartlettpear'),
('Bilberry'),
('Blackberry'),
('Blackcurrant'),
('BloodOrange'),
('Blueberry'),
('Boysenberry'),
('Cantaloupe'),
('Cherimoya'),
('Cherry'),
('Clementine'),
('Cloudberry'),
('Coconut'),
('Cranberry'),
('Currant'),
('Damson'),
('Date'),
('Dragonfruit'),
('Durian'),
('Elderberry'),
('Feijoa'),
('Fig'),
('Gojiberry'),
('Gooseberry'),
('Grape'),
('Grapefruit'),
('Guava'),
('Honeydew'),
('Huckleberry'),
('Jackfruit'),
('Jambul'),
('Jujube'),
('Kiwifruit'),
('Kumquat'),
('Lemon'),
('Lime'),
('Loquat'),
('Lychee'),
('Mandarine'),
('Mango'),
('Marionberry'),
('Melon'),
('Miraclefruit'),
('Mulberry'),
('Nectarine'),
('Olive'),
('Orange'),
('Papaya'),
('Passionfruit'),
('Peach'),
('Pear'),
('Persimmon'),
('Physalis'),
('Pineapple'),
('Plum'),
('Pomegranate'),
('Pomelo'),
('PurpleMangosteen'),
('Quince'),
('Raisin'),
('Rambutan'),
('Raspberry'),
('Redcurrant'),
('Rockmelon'),
('Salalberry'),
('Salmonberry'),
('Satsuma'),
('Starfruit'),
('Strawberry'),
('Tamarillo'),
('Tangerine'),
('Tomato'),
('Watermelon'),
('Westernraspberry');

-- --------------------------------------------------------

--
-- Table structure for table `image_img`
--

CREATE TABLE IF NOT EXISTS `image_img` (
  `id_img` mediumint(9) NOT NULL,
  `href_img` varchar(80) DEFAULT NULL,
  `type_img` tinyint(4) DEFAULT NULL,
  `alt_img` varchar(45) DEFAULT NULL,
  `id_usr_img` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_img`),
  KEY `id_usr_img` (`id_usr_img`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_img`
--

INSERT INTO `image_img` (`id_img`, `href_img`, `type_img`, `alt_img`, `id_usr_img`) VALUES
(0, 'http://seeklogo.com/images/C/Coca-Cola-logo-108E6559A3-seeklogo.com.gif', NULL, 'Coca Cola logo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `levels_lvl`
--

CREATE TABLE IF NOT EXISTS `levels_lvl` (
  `id_lvl` tinyint(4) NOT NULL,
  `name_lvl` varchar(25) DEFAULT NULL,
  `desc_lvl` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id_lvl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels_lvl`
--

INSERT INTO `levels_lvl` (`id_lvl`, `name_lvl`, `desc_lvl`) VALUES
(0, 'profile only', 'The lowest User Level is simply allowed to login, view the Dashboard, and edit their own profile. That''s it!'),
(10, 'admin', 'The admin user can add, edit, delete, promote, and demote any user.');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_pro`
--

CREATE TABLE IF NOT EXISTS `profiles_pro` (
  `id_pro` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tagline_pro` varchar(140) DEFAULT NULL,
  `desc_pro` varchar(512) DEFAULT NULL,
  `id_pro_usr` mediumint(9) DEFAULT NULL,
  `type_pro_typ` tinyint(4) DEFAULT NULL,
  `avatar_pro_img` mediumint(9) DEFAULT NULL,
  `logo_pro_img` mediumint(9) DEFAULT NULL,
  `website_pro` varchar(45) DEFAULT NULL,
  `app_pro_app` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `id_pro_usr` (`id_pro_usr`),
  KEY `fk_profiles_pro_types_typ1` (`type_pro_typ`),
  KEY `fk_profiles_pro_image_img1` (`logo_pro_img`),
  KEY `fk_profiles_pro_image_img2` (`avatar_pro_img`),
  KEY `fk_profiles_pro_app_app1` (`app_pro_app`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profiles_pro`
--

INSERT INTO `profiles_pro` (`id_pro`, `tagline_pro`, `desc_pro`, `id_pro_usr`, `type_pro_typ`, `avatar_pro_img`, `logo_pro_img`, `website_pro`, `app_pro_app`) VALUES
(1, 'Administrator', 'Administrator of Beplace.com', 7, 10, NULL, NULL, 'http://beplace.com/profiles/users/admin', NULL),
(2, 'Hire me, I''m an app developer!', 'I''m an app developer from the United States with a passion for apps. I make apps and I use apps all the time. Please vote for my apps on Beplace!', 6, 2, NULL, NULL, 'http://beplace.com/profiles/users/demo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors_spo`
--

CREATE TABLE IF NOT EXISTS `sponsors_spo` (
  `id_spo` smallint(6) NOT NULL AUTO_INCREMENT,
  `name_spo` varchar(45) NOT NULL,
  `contact_spo_usr` mediumint(9) NOT NULL,
  `logo_spo_img` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_spo`),
  KEY `contact_spo_usr` (`contact_spo_usr`),
  KEY `logo_spo_img` (`logo_spo_img`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sponsors_spo`
--

INSERT INTO `sponsors_spo` (`id_spo`, `name_spo`, `contact_spo_usr`, `logo_spo_img`) VALUES
(2, 'Pepsi', 3, NULL),
(3, 'Coca Cola', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `states_sta`
--

CREATE TABLE IF NOT EXISTS `states_sta` (
  `fullname_sta` varchar(45) DEFAULT NULL,
  `shortname_sta` varchar(5) DEFAULT NULL,
  `statecode_sta` char(2) NOT NULL,
  PRIMARY KEY (`statecode_sta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types_typ`
--

CREATE TABLE IF NOT EXISTS `types_typ` (
  `id_typ` tinyint(4) NOT NULL,
  `name_typ` varchar(25) DEFAULT NULL,
  `desc_typ` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id_typ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types_typ`
--

INSERT INTO `types_typ` (`id_typ`, `name_typ`, `desc_typ`) VALUES
(0, 'Basic', 'This user must earn the right to vote on Beplace.'),
(1, 'Voter', 'This user has earned the right to vote on Beplace.'),
(2, 'Creator', 'The Creator has earned the right to vote and create apps on Beplace.'),
(3, 'Sponsor', 'This Sponsor has earned the right to vote, create and sponsor apps on Beplace.'),
(4, 'Teammate', 'Teammates help design and develop your app.'),
(5, 'Customer', 'Customers are your most valuable friends because they can help promote and support your app and your team through referrals and purchases.'),
(10, 'Adminstrator', 'The administrator has the right to vote, create apps, sponsor apps, and administrate Beplace.');

-- --------------------------------------------------------

--
-- Table structure for table `users_usr`
--

CREATE TABLE IF NOT EXISTS `users_usr` (
  `id_usr` mediumint(9) NOT NULL AUTO_INCREMENT,
  `first_usr` varchar(20) DEFAULT NULL,
  `last_usr` varchar(35) DEFAULT NULL,
  `address_usr` int(11) DEFAULT NULL,
  `level_usr_lvl` tinyint(4) DEFAULT NULL,
  `email_usr` varchar(254) NOT NULL,
  `type_usr_typ` tinyint(4) DEFAULT NULL,
  `pw_usr` char(128) DEFAULT NULL,
  `update_usr` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `regdate_usr` datetime DEFAULT NULL,
  `active_usr` tinyint(1) DEFAULT '1',
  `username_usr` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usr`),
  UNIQUE KEY `email_usr` (`email_usr`),
  UNIQUE KEY `username_usr` (`username_usr`),
  KEY `level_usr_lvl` (`level_usr_lvl`),
  KEY `fk_users_usr_types_typ1` (`type_usr_typ`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_usr`
--

INSERT INTO `users_usr` (`id_usr`, `first_usr`, `last_usr`, `address_usr`, `level_usr_lvl`, `email_usr`, `type_usr_typ`, `pw_usr`, `update_usr`, `regdate_usr`, `active_usr`, `username_usr`) VALUES
(1, 'Demo user', NULL, NULL, NULL, 'demo@beplace.com', NULL, 'beplace', '2015-03-03 20:15:25', '2015-03-03 15:15:25', 1, 'demo'),
(2, 'James', NULL, NULL, NULL, 'james@bond.com', NULL, 'password', NULL, NULL, 1, NULL),
(3, 'Abe', NULL, NULL, NULL, 'abe@lincoln.com', NULL, 'password', NULL, NULL, 1, NULL),
(4, 'George', NULL, NULL, NULL, 'george@washington.com', NULL, 'password', NULL, NULL, 1, NULL),
(6, 'Demo user', NULL, NULL, 0, 'demo@demo.com', NULL, '$2a$10$MijokKQ0k8NPYc0bcKL.Ievnsw7GlcZkbFqCuQHOlDMNwocgE1pz2', NULL, NULL, 1, NULL),
(7, 'Admin', NULL, NULL, 10, 'admin@admin.com', NULL, '$2a$10$v4j1ZbcJIvmBNL//4UIiiuOJLHITtXyR86CUbNEetc60VPKI7vhse', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_usr_has_address_add`
--

CREATE TABLE IF NOT EXISTS `users_usr_has_address_add` (
  `users_usr_id_usr` mediumint(9) NOT NULL,
  `address_add_id_add` int(11) NOT NULL,
  PRIMARY KEY (`users_usr_id_usr`,`address_add_id_add`),
  KEY `fk_users_usr_has_address_add_address_add1` (`address_add_id_add`),
  KEY `fk_users_usr_has_address_add_users_usr1` (`users_usr_id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `votes_vot`
--

CREATE TABLE IF NOT EXISTS `votes_vot` (
  `id_vot` int(11) NOT NULL,
  `voter_usr_vot` mediumint(9) NOT NULL,
  `app_app_vot` mediumint(9) DEFAULT NULL,
  `user_usr_vot` mediumint(9) DEFAULT NULL,
  `sponsor_spo_vot` smallint(6) DEFAULT NULL,
  `date_vot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_vot`),
  KEY `fk_Votes_vot_users_usr1` (`voter_usr_vot`),
  KEY `fk_Votes_vot_app_app1` (`app_app_vot`),
  KEY `fk_Votes_vot_users_usr2` (`user_usr_vot`),
  KEY `fk_Votes_vot_sponsors_spo1` (`sponsor_spo_vot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zipcode_zip`
--

CREATE TABLE IF NOT EXISTS `zipcode_zip` (
  `id_zip` int(9) NOT NULL,
  `statecode_sta_zip` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_zip`),
  KEY `fk_zipcode_zip_states_sta1` (`statecode_sta_zip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_add`
--
ALTER TABLE `address_add`
  ADD CONSTRAINT `fk_address_add_zipcode_zip1` FOREIGN KEY (`zipcode_zip_add`) REFERENCES `zipcode_zip` (`id_zip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `app_app`
--
ALTER TABLE `app_app`
  ADD CONSTRAINT `app_app_ibfk_1` FOREIGN KEY (`sponsor_app_spo`) REFERENCES `sponsors_spo` (`id_spo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `creator_app_usr` FOREIGN KEY (`creator_app_usr`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `app_app_has_user_usr`
--
ALTER TABLE `app_app_has_user_usr`
  ADD CONSTRAINT `fk_app_app_has_user_usr_types_typ1` FOREIGN KEY (`types_typ_id_typ`) REFERENCES `types_typ` (`id_typ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_app_app_has_user_usr_app_app1` FOREIGN KEY (`app_app_id_app`) REFERENCES `app_app` (`id_app`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_app_app_has_user_usr_user_usr1` FOREIGN KEY (`user_usr_id_usr`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_img`
--
ALTER TABLE `image_img`
  ADD CONSTRAINT `id_usr_img` FOREIGN KEY (`id_usr_img`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profiles_pro`
--
ALTER TABLE `profiles_pro`
  ADD CONSTRAINT `fk_profiles_pro_app_app1` FOREIGN KEY (`app_pro_app`) REFERENCES `app_app` (`id_app`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profiles_pro_image_img1` FOREIGN KEY (`logo_pro_img`) REFERENCES `image_img` (`id_img`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profiles_pro_image_img2` FOREIGN KEY (`avatar_pro_img`) REFERENCES `image_img` (`id_img`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profiles_pro_types_typ1` FOREIGN KEY (`type_pro_typ`) REFERENCES `types_typ` (`id_typ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_pro_usr` FOREIGN KEY (`id_pro_usr`) REFERENCES `users_usr` (`id_usr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsors_spo`
--
ALTER TABLE `sponsors_spo`
  ADD CONSTRAINT `sponsors_spo_ibfk_1` FOREIGN KEY (`logo_spo_img`) REFERENCES `image_img` (`id_img`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_spo_usr` FOREIGN KEY (`contact_spo_usr`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_usr`
--
ALTER TABLE `users_usr`
  ADD CONSTRAINT `fk_users_usr_types_typ1` FOREIGN KEY (`type_usr_typ`) REFERENCES `types_typ` (`id_typ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `level_usr_lvl` FOREIGN KEY (`level_usr_lvl`) REFERENCES `levels_lvl` (`id_lvl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_usr_has_address_add`
--
ALTER TABLE `users_usr_has_address_add`
  ADD CONSTRAINT `fk_users_usr_has_address_add_address_add1` FOREIGN KEY (`address_add_id_add`) REFERENCES `address_add` (`id_add`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_usr_has_address_add_users_usr1` FOREIGN KEY (`users_usr_id_usr`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `votes_vot`
--
ALTER TABLE `votes_vot`
  ADD CONSTRAINT `fk_Votes_vot_app_app1` FOREIGN KEY (`app_app_vot`) REFERENCES `app_app` (`id_app`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Votes_vot_sponsors_spo1` FOREIGN KEY (`sponsor_spo_vot`) REFERENCES `sponsors_spo` (`id_spo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Votes_vot_users_usr1` FOREIGN KEY (`voter_usr_vot`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Votes_vot_users_usr2` FOREIGN KEY (`user_usr_vot`) REFERENCES `users_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zipcode_zip`
--
ALTER TABLE `zipcode_zip`
  ADD CONSTRAINT `fk_zipcode_zip_states_sta1` FOREIGN KEY (`statecode_sta_zip`) REFERENCES `states_sta` (`statecode_sta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
