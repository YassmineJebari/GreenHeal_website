-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 déc. 2022 à 23:10
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `green_heal`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `IDtype` int(11) NOT NULL,
  `typeMenu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`IDtype`, `typeMenu`) VALUES
(1, 'Stater'),
(2, 'Plat'),
(3, 'Drinks'),
(4, 'Deserts');

-- --------------------------------------------------------

--
-- Structure de la table `chef`
--

CREATE TABLE `chef` (
  `chef_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chef`
--

INSERT INTO `chef` (`chef_id`, `user_id`) VALUES
(2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`client_id`, `user_id`) VALUES
(1, 2),
(4, 4),
(8, 8),
(9, 9),
(10, 14),
(17, 17),
(18, 18),
(19, 19);

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `discount`, `status`) VALUES
(8, 'PR7OI4', 20, 'Not valid'),
(9, 'PRZEJ4', 20, 'Not valid'),
(10, 'PRYHKM', 20, 'Not valid'),
(11, 'PR35SZ', 20, 'Valid'),
(12, 'PRK1CW', 20, 'Valid'),
(13, 'PRHKPG', 20, 'Valid'),
(14, 'PRMZYS', 20, 'Valid'),
(15, 'PRJ9CF', 20, 'Valid'),
(16, 'PRFP4E', 20, 'Valid'),
(17, 'PRQR48', 20, 'Valid'),
(18, 'PRRDK3', 20, 'Valid'),
(19, 'PR1KZM', 20, 'Valid'),
(20, 'PR62IQ', 20, 'Valid'),
(21, 'PRVB3C', 20, 'Valid'),
(22, 'PRPV7Q', 20, 'Valid'),
(23, 'PRO4EN', 20, 'Valid'),
(24, 'PRSOIL', 20, 'Valid'),
(25, 'PR4M1H', 20, 'Valid'),
(26, 'PRC5KF', 20, 'Valid'),
(27, 'PRRGT2', 20, 'Valid'),
(28, 'PR2PET', 20, 'Valid'),
(29, 'PRMC0Q', 20, 'Valid'),
(30, 'PR9QA6', 20, 'Valid'),
(31, 'PRMURR', 20, 'Valid'),
(32, 'PRMCDJ', 20, 'Valid'),
(33, 'PRQXZS', 20, 'Valid'),
(34, 'PRG8CZ', 20, 'Valid'),
(35, 'PRDGVI', 20, 'Valid'),
(36, 'PRN1C5', 20, 'Valid'),
(37, 'PRWD0M', 20, 'Valid'),
(38, 'PRNDKS', 20, 'Valid'),
(39, 'PR5C0G', 20, 'Valid'),
(40, 'PRZMBF', 20, 'Valid'),
(41, 'PRM6J7', 20, 'Valid'),
(42, 'PRHN5D', 20, 'Valid'),
(43, 'PRHECB', 20, 'Valid'),
(44, 'PRBRV0', 20, 'Valid'),
(45, 'PRP7VW', 20, 'Valid'),
(46, 'PRB5W5', 20, 'Valid'),
(47, 'PRK7JW', 20, 'Valid'),
(48, 'PR8EKR', 20, 'Valid'),
(49, 'PRGAMI', 20, 'Valid'),
(50, 'PRQBD0', 20, 'Valid'),
(51, 'PRI5X7', 20, 'Valid'),
(52, 'PRKRBI', 20, 'Valid'),
(53, 'PRHLTJ', 20, 'Valid'),
(54, 'PRTN5D', 20, 'Valid'),
(55, 'PR3N04', 20, 'Valid'),
(56, 'PR1PY0', 20, 'Valid'),
(57, 'PRR7H1', 20, 'Valid'),
(58, 'PRKZXB', 20, 'Valid'),
(59, 'PRG52H', 20, 'Valid'),
(60, 'PRWXU8', 20, 'Valid'),
(61, 'PRM57X', 20, 'Valid'),
(62, 'PRPZVL', 20, 'Valid'),
(63, 'PRPN5K', 20, 'Valid'),
(64, 'PRQDAE', 20, 'Valid'),
(65, 'PR1L01', 20, 'Valid'),
(66, 'PRVETT', 20, 'Valid'),
(67, 'PRYL11', 20, 'Valid'),
(68, 'PRUR9A', 20, 'Valid'),
(69, 'PR6K8V', 20, 'Valid'),
(70, 'PR41ZN', 20, 'Valid'),
(71, 'PRD2U8', 20, 'Valid'),
(72, 'PR23ZD', 20, 'Valid'),
(73, 'PR44WO', 20, 'Valid'),
(74, 'PRRJT4', 20, 'Valid'),
(75, 'PRQV7F', 20, 'Valid'),
(76, 'PRFA8M', 20, 'Valid'),
(77, 'PRM46E', 20, 'Valid'),
(78, 'PRTV7L', 20, 'Valid'),
(79, 'PRNHFC', 20, 'Valid'),
(80, 'PRI39V', 20, 'Valid'),
(81, 'PRJXVJ', 20, 'Valid'),
(82, 'PRFK5V', 20, 'Valid'),
(83, 'PRS0XY', 20, 'Valid'),
(84, 'PR5AR7', 20, 'Valid'),
(85, 'PRQLUX', 20, 'Valid'),
(86, 'PRPJHO', 20, 'Valid'),
(87, 'PRLR7D', 20, 'Valid'),
(88, 'PRXN4M', 20, 'Valid'),
(89, 'PRSNDY', 20, 'Valid'),
(90, 'PRWYAP', 20, 'Valid'),
(91, 'PR4G51', 20, 'Valid');

-- --------------------------------------------------------

--
-- Structure de la table `director`
--

CREATE TABLE `director` (
  `director_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `director`
--

INSERT INTO `director` (`director_id`, `user_id`) VALUES
(10, 10),
(12, 13);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `StartDate` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Cost` int(11) NOT NULL,
  `LocationID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`EventID`, `Title`, `Description`, `StartDate`, `photo`, `Cost`, `LocationID`) VALUES
(4, 'Christmas ', 'It\'s time to enjoy some holiday cheer, so join us for dinner for Christmas is here!\nCome to eat, drink and be merry with us at our annual Christmas putlock!', '2022-12-16', 'e1.jpg', 2, 'Ariana'),
(5, 'Halloween', 'Trick or treat! We’re getting the gang together for a Halloween party. We’ll start the night with drinks and snacks at our home, then hit the streets with the kids to stock up on sweets. ', '2022-12-17', 'e2.png', 12, 'Ariana'),
(6, 'Holiday ', 'If you’re struggling to put your holiday cheer into words, don’t worry, we’ve got you covered. \n\nRead on for some helpful tips and tricks to get the perfect  holiday party invitation wording every time!', '2022-12-22', 'e3.jpg', 20, 'Ben Arous');

-- --------------------------------------------------------

--
-- Structure de la table `ing`
--

CREATE TABLE `ing` (
  `iding` int(11) NOT NULL,
  `noming` varchar(50) NOT NULL,
  `typeing` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ing`
--

INSERT INTO `ing` (`iding`, `noming`, `typeing`, `qte`) VALUES
(2, 'spicy', 'spicy', 4),
(4, 'salty', 'salty', 6),
(5, 'potato', 'veg', 10),
(6, 'tomato', 'vegetale ', 7),
(7, 'sweet', 'sweet', 50),
(10, 'food', 'food', 50),
(12, 'dsqd', 'dsqd', 20),
(13, 'xwxw', 'xwxw', 20);

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `livreur_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `IDMenu` int(11) NOT NULL,
  `NomMenu` varchar(255) NOT NULL,
  `PhotoMenu` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `MenuEvent` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Promotion` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `iding` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`IDMenu`, `NomMenu`, `PhotoMenu`, `Description`, `MenuEvent`, `Prix`, `Promotion`, `type`, `iding`, `menu_id`) VALUES
(8, 'Santa salad', 'cs1.jpg', 'Santa salad\n Packed full of macadamias, cranberries and peaches, this festive salad will complement all the best Christmas spreads.', 'Christmas ', 15, 131, 1, 2, 0),
(10, 'Spooky soup', 'sp1.jpg', 'Spooky halloween vegetable soup has a bean broth base and is loaded with vegetable cut out skulls, bats, pumpkins and bones', 'Halloween', 12, 131, 2, 4, 0),
(15, 'Scary shrimps', 'sp2.jpg', 'scary Shrimp are crustaceans  with elongated bodies and a primarily swimming mode of locomotion', 'Halloween', 18, 123, 2, 5, 0),
(16, 'Chicken wings', 'm5.jpg', 'chicken wing, coated with a vinegar-and-cayenne-pepper hot sauce mixed with butter', 'none', 10, 123, 2, 5, 0),
(17, 'MeatBalls', 'm4.jpg', 'A meatball is ground meat rolled into a ball,  along with other ingredients, such as bread crumbs, minced onion, eggs, butter, and seasoning', 'none', 13, 10, 2, 2, 0),
(20, 'Cheese Loaf', 'm6.jpg', 'Here\'s a deliciously different sandwich. It\'s yummy warm from the oven or off the grill at a cookout.', 'none', 20, 19, 2, 2, 0),
(27, 'Pesto Pull-Apart Bread', 'm3.jpg', 'This easy pesto bread is easy to make by hand and super fluffy and tender. Filled with pesto and a little cheese, it makes the best appetizer or snack.', 'none', 12, 10, 2, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `type_of_reclamation` enum('food','staff','service') NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `message` varchar(255) NOT NULL,
  `email` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `type_of_reclamation`, `date`, `message`, `email`) VALUES
(2, 'staff', '2022-12-18', 'the staff didnt treat me well', 17),
(5, 'food', '2022-12-14', 'gfhgf', 9),
(6, 'service', '2022-12-13', 'i didnt like the service', 17),
(7, 'food', '2022-12-14', 'awawa', 17),
(8, 'service', '2022-12-17', 'zeaze', 19),
(10, 'service', '2022-12-18', 'helppp', 19);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `panier_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `nb_commande` int(11) NOT NULL,
  `date_checkout` varchar(255) NOT NULL,
  `checkOut_verify` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`panier_id`, `client_id`, `commande_id`, `nb_commande`, `date_checkout`, `checkOut_verify`, `date_added`) VALUES
(85, 9, 16, 1, '13/12/2022 - 13:39:40 PM', 1, '2022-12-13'),
(86, 9, 17, 1, '13/12/2022 - 13:39:40 PM', 1, '2022-12-13'),
(87, 9, 16, 1, '13/12/2022 - 13:40:05 PM', 1, '2022-12-13'),
(88, 9, 16, 1, '', 0, '2022-12-13'),
(89, 9, 17, 3, '', 0, '2022-12-13'),
(94, 17, 16, 1, '13/12/2022 - 14:40:53 PM', 1, '2022-12-13'),
(95, 17, 17, 3, '13/12/2022 - 14:40:53 PM', 1, '2022-12-13'),
(96, 17, 16, 1, '18/12/2022 - 12:56:39 PM', 1, '2022-12-14'),
(97, 17, 17, 1, '18/12/2022 - 12:56:39 PM', 1, '2022-12-16'),
(99, 18, 16, 2, '', 0, '2022-12-16'),
(103, 19, 16, 1, '18/12/2022 - 18:38:10 PM', 1, '2022-12-18'),
(104, 19, 16, 1, '18/12/2022 - 18:51:23 PM', 1, '2022-12-18'),
(105, 19, 16, 1, '18/12/2022 - 19:08:42 PM', 1, '2022-12-18'),
(106, 19, 16, 1, '18/12/2022 - 19:15:47 PM', 1, '2022-12-18');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `id_reclamation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id`, `reponse`, `id_reclamation`) VALUES
(28, 'We look into it', 8),
(29, 'Wr look into it', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `evenement`) VALUES
(16, 19, 6);

-- --------------------------------------------------------

--
-- Structure de la table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `menuid` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `review_table`
--

INSERT INTO `review_table` (`review_id`, `UserID`, `user_rating`, `user_review`, `menuid`, `datetime`) VALUES
(137, 17, 5, 'I really liked this', 16, 1671380221),
(142, 8, 4, 'Good dish but need more spice', 16, 1671380440),
(144, 19, 3, 'It was ok', 16, 1671380671);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `verified_email` int(1) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_ajout` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `nom`, `prenom`, `username`, `email`, `role`, `phone`, `password`, `status`, `verified_email`, `token`, `about_me`, `fb_link`, `linkedin_link`, `img_url`, `address`, `date_ajout`) VALUES
(1, 'younes', 'ben', 'nour', 'nour.ben.younes16@gmail.com', 'Admin', '1234', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '1le78m94s3rzfq6ygcit0bp5j2nvdwoahkx', '', '', '', 'IMG-639874cc8d2ea4.04695775.png', '', '2022-12-12'),
(2, 'sarra', 'ben ouhiba', 'sarra', 'salmaaaaa@espriiiii.tn', 'Client', '1213', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'm46dikpo1ebglvwqzh8fr92t3y7sax0nc5j', '', '', '', 'IMG-63986e580834b4.28079491.jpg', '', '2022-12-12'),
(4, 'jihen', 'madame ', 'jihen', 'aezeaze@gmail.com', 'Livreur ', '1234', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'x185hr9zwjenac02q3vtip6sy74lkmdfbgo', '', '', '', 'IMG-63986e486b1280.09820136.jpg', '', '2022-12-13'),
(8, 'yasmine', 'jebari', 'yasmine', 'nour.benyunes@esprit.tn', 'Client', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'jcl1ks5678m0bnx4dr2wpg9vzyhq3eaitfo', '', '', '', 'IMG-63986e9c08ffe6.55746654.jpg', '', '2022-12-13'),
(9, 'sarra', 'ben ouhiba', 'sarroura', 'nour.byounes@esprit.tn', 'Client', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'dg1ej0wkpc3btnvazo6y9sh87i4qx2mr5lf', '', '', '', 'IMG-63985dfa50af95.20409169.jpg', '', '2022-12-13'),
(10, 'yasmine', 'jibari', 'yasmine', 'neaze@gmail.com', 'Director', '56598', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 'rc45q3dnblzajog2yvi7p91emkf0sxt86wh', '', '', '', 'IMG-63986e7b178323.76155447.jpg', '', '2022-12-13'),
(12, 'yasmine', 'chef', 'chef', 'chef@gmail.com', 'Chef', '123', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 'n1gjrh3ikae9d2pl07m6fqy5cxsow48vtbz', NULL, NULL, NULL, 'IMG-639859ec299bb2.37970945.jpg', NULL, '2022-12-13'),
(13, 'jihed', 'jihed', 'jihed', 'jihed@gmail.com', 'Director', '123', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 'td4lw5jgq02fn967skvxaipzroym8heb1c3', '', '', '', 'IMG-639870ba460ec1.00736328.jpg', '', '2022-12-13'),
(14, 'nour', 'ben younes', 'nour', 'nour@jj.tn', 'Client', '1234', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '70djlzs5ct91yorqbkif8g34w6pve2xnamh', NULL, NULL, NULL, 'defaultUserImage.png', NULL, '2022-12-13'),
(17, 'nour', 'ben younes', 'nour', 'nour.@esprit.tn', 'Client', '123', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'r7i32n1pteh9jyoglmckbqw8xvz4d5sa0f6', NULL, NULL, NULL, 'defaultUserImage.png', NULL, '2022-12-13'),
(18, 'aaa', 'aaa', 'aaa', 'aaaa@ggg.com', 'Client', '132', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 'bmephalsn1rjwvzdfy2t79g0k43cxoq86i5', NULL, NULL, NULL, 'defaultUserImage.png', NULL, '2022-12-16'),
(19, 'jjjjjjjjjjjjj', 'jjjjjjjjjjj', 'Love', 'nour.benyounes@esprit.tn', 'Client', '64565468', '670b14728ad9902aecba32e22fa4f6bd', 1, 1, 'qtzphif62nxabrgv3jk49mcys8d0l1ewo75', '', '', '', 'IMG-639f3c08e20022.20645708.jpg', '', '2022-12-18');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`IDtype`);

--
-- Index pour la table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chef_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `userC_id` (`user_id`);

--
-- Index pour la table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Index pour la table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`),
  ADD KEY `userD_id` (`user_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Index pour la table `ing`
--
ALTER TABLE `ing`
  ADD PRIMARY KEY (`iding`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`livreur_id`),
  ADD KEY `userL_id` (`user_id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IDMenu`),
  ADD KEY `fk_menu_type` (`type`),
  ADD KEY `fk_menu_ing` (`iding`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usermes` (`email`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`panier_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `menu_id` (`commande_id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_reclamation_id` (`id_reclamation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event` (`evenement`),
  ADD KEY `fk_user` (`nom`);

--
-- Index pour la table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_review` (`UserID`),
  ADD KEY `fk_menu` (`menuid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `IDtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chef`
--
ALTER TABLE `chef`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `director`
--
ALTER TABLE `director`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ing`
--
ALTER TABLE `ing`
  MODIFY `iding` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `livreur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `IDMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `panier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chef`
--
ALTER TABLE `chef`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `userC_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `userD_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD CONSTRAINT `userL_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_ing` FOREIGN KEY (`iding`) REFERENCES `ing` (`iding`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_type` FOREIGN KEY (`type`) REFERENCES `categories` (`IDtype`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_usermes` FOREIGN KEY (`email`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_id` FOREIGN KEY (`commande_id`) REFERENCES `menu` (`IDMenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_id_reclamation_id` FOREIGN KEY (`id_reclamation`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`evenement`) REFERENCES `events` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`nom`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `review_table`
--
ALTER TABLE `review_table`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`menuid`) REFERENCES `menu` (`IDMenu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_review` FOREIGN KEY (`UserID`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
