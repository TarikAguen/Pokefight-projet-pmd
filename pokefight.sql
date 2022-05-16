-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 mai 2022 à 21:24
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pokefight`
--

-- --------------------------------------------------------

--
-- Structure de la table `monster`
--

DROP TABLE IF EXISTS `monster`;
CREATE TABLE IF NOT EXISTS `monster` (
  `id_pokemon` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `link-gif` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `str` int(30) NOT NULL,
  `hp` int(30) NOT NULL,
  `spd` int(30) NOT NULL,
  `def` int(30) NOT NULL,
  PRIMARY KEY (`id_pokemon`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monster`
--

INSERT INTO `monster` (`id_pokemon`, `name`, `link-gif`, `str`, `hp`, `spd`, `def`) VALUES
(1, 'ronflex', '', 2, 4, 2, 3),
(2, 'Arcanin', '', 20, 20, 20, 20),
(3, 'Geratina', '', 20, 20, 20, 20),
(4, 'Mew', '', 20, 20, 20, 20),
(5, 'Pikachu', '', 20, 20, 20, 20),
(6, 'Jungko', '', 20, 20, 20, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(1000) NOT NULL,
  `id_pokemon` int(100) DEFAULT NULL,
  `gold` int(255) DEFAULT NULL,
  `victory` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `email`, `mdp`, `id_pokemon`, `gold`, `victory`) VALUES
(1, 'SuuS', 'La@SooS', '$2y$10$M5km87iKv8BvLvOd6AfoSe7YDQSvOt0UmPf6m8elN3KOBJYyJtuge', NULL, NULL, NULL),
(2, 'jiji', 'jiji@jiji', '$2y$10$4k.EjmDtN9Fd..MMy4yPP.Sx/6Te/M85jLachFuWYImqCrOmxhpm2', NULL, NULL, NULL),
(3, 'dza', 'dza@dza', '$2y$10$Lp87XStb/cD2hpkOJ9.O1O5U8CZsF/Z9FxHkpLsdOwYWqdugNQsCG', NULL, NULL, NULL),
(4, 'tarikk', 'tarikk@tarikk', '$2y$10$0i.S1.T8oRrjinF/ssDRhu8WuGCGBX8xCAuUFzrARwYPSYgGUV/9S', NULL, NULL, NULL),
(5, 'tarika', 'tarika@tarika', '$2y$10$NE2AvE8JjFGInU3JebAwLOS5AQrlvhqVsXGiim8yvg4A13eqtii5O', NULL, NULL, NULL),
(6, 'tarikun', 'tarikun@tarikun', '$2y$10$LBnzbfKIuU62zAHW.RFzuechL1KWw1lP1pXl7P.6MhPRJ8WgFziEe', NULL, NULL, NULL),
(7, 'caca', 'caca@caca', '$2y$10$xJojHkoI2cTEDE0abzx2..rO4PgAV0eojleZwyvi4WmhpMjo0h3hi', NULL, NULL, NULL),
(8, 'kiki', 'kiki@kiki', '$2y$10$u0KZ3dhr.Z8cf6BS4tEBu.xf6FMMFPue8/AJTSHziUZShN6OSxAhC', NULL, NULL, NULL),
(9, 'kirat', 'kirat@kirat', '$2y$10$2JJ6RRc7o/peqp0/PTxbb.o.rQYhWGhNGQ5N3w5g3bqTNmAy3N7OS', 1, NULL, NULL),
(10, 'zizidu92', 'zizidu92@zizidu92', '$2y$10$DmCtC2FFJzYvgR2Qpl8ogO6NUiBPvnyQ8UeBkhDF0DZZlbBLCoYxe', 3, NULL, NULL),
(11, 'cacadu93', 'cacadu93@cacadu93', '$2y$10$hA4gvAS48Xjad6oBfgX/X.Lh.uTvrhefRCZmHrn4TsUAhDg7RRGxu', NULL, NULL, NULL),
(12, 'pipi', 'pipi@pipi', '$2y$10$glVaZmiAfu/qSPVsRrsA/eh.aFFYiKamWhhYTgysKrxuzvlJHlKbu', 2, NULL, NULL),
(13, 'tarikui', 'tarikui@tarikui', '$2y$10$31r3HH6yYvgFqozieY8Gmuj1aFRSt.e2zRzSkDm.Wqj4wliqgZp2C', 2, NULL, NULL),
(14, 'lpp', 'lpp@lpp', '$2y$10$gLgUbu1Crt/TsuZaAnTImuFi7P059e0n40So.zfG.S0InY9MNRUNm', 6, NULL, NULL),
(15, 'azer', 'azer@azer', '$2y$10$KvJYhCb31FtdyuvqFgu24eBQsuuT81QtMVcPeyAU0gJR8GD/SyPEe', 5, NULL, NULL),
(16, 'yuyu', 'yuyu@yuyu', '$2y$10$r6mIfA.Ewslkg0IhBKbPO.xxvz.3Hfn2cqIKTNRIOoc/jgeXg8t3.', 3, NULL, NULL),
(17, 'iop', 'iop@iop', '$2y$10$LPHYO4pQxBBTiHEyYdVEl.ADVgJsNAU/V7JZplS8dxWYMJy8wnkrS', 5, NULL, NULL),
(18, 'lop', 'lop@lop', '$2y$10$zQ6QlqzDPB4ruJ1RVzxuA.hWRQP84zAJ5SjP2IKSUnPE2SCEfOvhO', 2, NULL, NULL),
(19, 'mpo', 'mpo@mpo', '$2y$10$4B0hx7QpjHTkm79ARZGsOenAC557TQ/OmbhOtyki3T5YgvMPV4u2.', 3, NULL, NULL),
(20, 'tarikkk', 'tarikkk@tarikkk', '$2y$10$kUv6oOXbYZMybJRuLzBmp./chvyZmoZ8SsUFG3FjpZb93GONamhv.', 3, NULL, NULL),
(21, 'juju', 'juju@juju', '$2y$10$sYwiczjKsguJAKEeW5WfHu66kKpwrcNgjqh.fn4gbwhDl8G76d1Wu', 2, NULL, NULL),
(22, 'kio', 'kio@kio', '$2y$10$NDPiIKOxtUf9JVk/742SNO4/OnXBayfp7FCgbfKJofjLWIAAgvyDS', 3, NULL, NULL),
(23, 'kikidu92', 'kikidu92@kikidu92', '$2y$10$9YqnApstcrG1a7gpfEZX4eljkQZrCz8jUJO6KbctyprB7G69kxtBy', 2, NULL, NULL),
(24, 'momo', 'momo@momo', '$2y$10$.texgqGktZ0z8nf49U3kNeZ2EvIITL8V10dEJOZgwBE1Jflm8zcVW', 6, NULL, NULL),
(25, 'kuku', 'kuku@kuku', '$2y$10$APbNL7OO04345xMq2L7MaeR5gCX953e59tM7Y.sjU2xtUg/s7pwOC', 5, NULL, NULL),
(26, 'juji', 'juji@juji', '$2y$10$vwdy2.XRRVoeIgxT1ZInNuMto5qn2N1TT2SlgoW5Yd/8FfYV1xwAu', 3, NULL, NULL),
(27, 'cacaa', 'cacaa@cacaa', '$2y$10$W6ZXwzYV1oTJOnOlkCqYGOFLAGRsjzpBmEbB4NftT6IIpQpJcFvP2', NULL, NULL, NULL),
(28, 'mlk', 'mlk@mlk', '$2y$10$vk4rRJ8hoUvbnA8zjAaCkuzkQBzcYArS4.eN7rEF9OxiCxl9.tUa.', NULL, NULL, NULL),
(29, 'cacaaa', 'cacaaa@cacaaa', '$2y$10$o3JOYdwOdlfyVqxxgniuAeW1NCV6TfIUIatxrw0ikZ6lDOzXgHiZi', 1, NULL, NULL),
(30, 'jaaj', 'jaaj@jaaj', '$2y$10$YxkNguLShifGoXwQxhnktuhrihr6A2ErONOYIKELONFBLaxE6nJs2', 1, NULL, NULL),
(31, 'juuj', 'juuj@juuj', '$2y$10$eInmzVHGpJKKCdenIHy/4u0Udnj0fb0OFfqdfTbsQmc6.EYE6V83W', 3, NULL, NULL),
(32, 'melenchon', 'melenchon@melenchon', '$2y$10$/ogcoP.NS6UUMGekWZNM.OUAZ49AWlAKcwjUHKF0iFaP0wZxbmN86', 4, NULL, NULL),
(33, 'njnj', 'njnj@njnj', '$2y$10$HMu/gelzVesHbLa345639umFtf2Iq4P6uQQVy/6jXTIXKNbjAC2Za', 4, NULL, NULL),
(34, 'david', 'david@david', '$2y$10$5lyczkTwtB8lwbo2GHZJCuBDh/loFi3NR.wqBtaQNgsmS9gf/ntvu', 5, NULL, NULL),
(35, 'jhg', 'jhg@jhg', '$2y$10$dxdZZqStSOA77XIfA5VDCeedvA4t0PT8dAc0943mAy1wBqqsNFHlu', 2, NULL, NULL),
(36, 'qsd', 'qsd@qsd', '$2y$10$Dgpx/EHRp/cXi4WwaDD4vO6Z7Ry23h1vi5WcMLWL3Le2DS35Vyox2', 2, NULL, NULL),
(37, 'tyui', 'tyui@nhdz', '$2y$10$fxG8EeN6zYAlMdsPw1pYO.w90Tkoq.l6CGx824m2pCOOTEAh1PV7u', 2, NULL, NULL),
(38, 'gthj', 'gbhj@ghnj', '$2y$10$IjaGw75wvOM6ggU/soyt0.B.MAa5g3f63uNdXapSpQ7zptj8lcLD2', 3, NULL, NULL),
(39, 'gybhnj', 'hnd@dzj', '$2y$10$wi/7eAmORECd4we481.OwOpacxZ6rkpwIFux2wLp6r.mL1pD.8RP6', 1, NULL, NULL),
(40, 'ghjk', 'jhk@hjk', '$2y$10$uT72/Fifsdi.u7B1SQ076eM9tEmYeYVf85vfulqu7e2Ir./GaS7k.', 2, NULL, NULL),
(41, 'rfgthnj', 'gthj@ghjk', '$2y$10$rTmWpBiurhYsZ.1cJ5xATuOx0m4wci5xwy09hFmhnaKDj8JNy0JpK', 2, NULL, NULL),
(42, 'vgbhn', 'fvgbhnj@ghnj', '$2y$10$b3tY7FUYS9cKivg.4X4sIeH7LPkfm6Qgs.0bbAAbnEjKW7L8zVEcO', 2, NULL, NULL),
(43, 'lololo', 'lololo@lololo', '$2y$10$6iSq4RUXxb0AL6pzS6qzL.Qnik4P91WcndG08Qp/eVRfqlJUE4nnm', 3, NULL, NULL),
(44, 'frgthnj', 'fgh@vfgbhn', '$2y$10$WQxjFs2MvMfYvNedAteI9eIgIIbTTXQbJXB8fphWcy9JhXkvLWP2q', 1, NULL, NULL),
(45, 'fcvgbh', 'ghn@fvgbh', '$2y$10$Gc.TPtDl/h4jBL5xFiQXreRdIqxObbup2ERmOChkEtm8OxsxQWK1K', 3, NULL, NULL),
(46, 'frgbhnj', 'dada@dada', '$2y$10$LEWzdngkmQPp3XYvrjPU0ulRIynSoMeYnHJ5brzLbQWuG4HAoTgEe', 1, NULL, NULL),
(47, 'frghnj', 'fgvhj@gvfbhnj', '$2y$10$hBX.E6yWp40yev4nmFLTc.Fni4pGHwXEtITFisq2PzlIHdrZAM0lW', 2, NULL, NULL),
(48, 'rgthn', 'fgh@fvgb', '$2y$10$OCZ4h5xcQf4G0arw/rPqjuEqeP.MaJfH3MrjMgcEFX/JHzFTl.EWi', 2, NULL, NULL),
(49, 'rfghn', 'fgh@fvgbhn', '$2y$10$RD336.Yeuq5r28269i1geeQWYrBLoPI2Ma6.gXuYxYghEzdUtRWJS', 3, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
