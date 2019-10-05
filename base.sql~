-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2019 at 02:47 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `betisier`
--

-- --------------------------------------------------------

--
-- Table structure for table `citation`
--

CREATE TABLE IF NOT EXISTS `citation` (
  `cit_num` int(11) NOT NULL AUTO_INCREMENT,
  `per_num` int(11) NOT NULL,
  `per_num_valide` int(11) DEFAULT NULL,
  `per_num_etu` int(11) NOT NULL,
  `cit_libelle` tinytext NOT NULL,
  `cit_date` date NOT NULL,
  `cit_valide` bit(1) NOT NULL DEFAULT b'0',
  `cit_date_valide` date DEFAULT NULL,
  `cit_date_depo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `citation_pk` (`cit_num`),
  KEY `est_auteur_fk` (`per_num`),
  KEY `valide_fk` (`per_num_valide`),
  KEY `depose_fk` (`per_num_etu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `citation`
--

INSERT INTO `citation` (`cit_num`, `per_num`, `per_num_valide`, `per_num_etu`, `cit_libelle`, `cit_date`, `cit_valide`, `cit_date_valide`, `cit_date_depo`) VALUES
(1, 55, 1, 53, 'Tous les 4, vous commencez à me casser les pieds !!!', '2018-10-03', b'1', NULL, '2018-10-04 00:00:00'),
(2, 38, 53, 38, 'Les notes, c''est comme l''eau : plus on pompe, plus ça monte', '2018-10-24', b'0', '2018-10-25', '2018-10-24 00:00:00'),
(3, 56, 1, 54, 'C plus fort que toi', '2018-10-19', b'1', '2018-10-20', '2018-10-19 00:00:00'),
(4, 38, 53, 38, 'Ce qui fait marcher l''informatique, c''est la fumée car lorsque la fumée sort du pc, plus rien ne fonctionne', '2018-10-24', b'0', '2018-10-25', '2018-10-26 00:00:00'),
(19, 55, NULL, 3, 'Et surtout notez bien ce que je viens d''effacer !	\r\n							\r\n			', '2018-11-04', b'0', NULL, '2018-11-01 14:50:53'),
(36, 1, NULL, 3, 'Qu''est ce qu''il me baragouine ce loulou ? ', '2018-11-04', b'0', NULL, '2018-11-02 13:01:18'),
(37, 55, NULL, 39, 'Moi aussi, si j''avais votre âge, j''aimerais bien que se soit Aurore qui assure ce cours', '2019-10-05', b'0', NULL, '2019-10-05 10:29:03'),
(38, 55, NULL, 39, 'Vous voulez le suicide des profs de Mathématiques', '2019-10-05', b'0', NULL, '2019-10-05 12:48:48'),
(39, 55, NULL, 39, ' Vous voulez le ---  des profs de Mathématique', '2019-10-05', b'0', NULL, '2019-10-05 12:49:07'),
(40, 55, NULL, 39, '  Vous voulez le suicide  des profs de Mathématique', '2019-10-05', b'0', NULL, '2019-10-05 12:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `dep_num` int(11) NOT NULL AUTO_INCREMENT,
  `dep_nom` varchar(30) NOT NULL,
  `vil_num` int(11) NOT NULL,
  PRIMARY KEY (`dep_num`),
  KEY `vil_num` (`vil_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`dep_num`, `dep_nom`, `vil_num`) VALUES
(1, 'Informatique', 7),
(2, 'GEA', 6),
(3, 'GEA', 7),
(4, 'SRC', 7),
(5, 'HSE', 5),
(6, 'Génie civil', 16);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `div_num` int(11) NOT NULL AUTO_INCREMENT,
  `div_nom` varchar(30) NOT NULL,
  PRIMARY KEY (`div_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_num`, `div_nom`) VALUES
(1, 'Année 1'),
(2, 'Année 2'),
(3, 'Année Spéciale'),
(4, 'Licence Professionnelle');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `per_num` int(11) NOT NULL,
  `dep_num` int(11) NOT NULL,
  `div_num` int(11) NOT NULL,
  PRIMARY KEY (`per_num`),
  KEY `dep_num` (`dep_num`),
  KEY `div_num` (`div_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`per_num`, `dep_num`, `div_num`) VALUES
(3, 2, 2),
(38, 6, 1),
(39, 2, 4),
(53, 2, 1),
(54, 3, 2),
(58, 1, 2),
(59, 1, 2),
(64, 2, 1),
(65, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `fon_num` int(11) NOT NULL AUTO_INCREMENT,
  `fon_libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`fon_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fonction`
--

INSERT INTO `fonction` (`fon_num`, `fon_libelle`) VALUES
(1, 'Directeur'),
(2, 'Chef de département'),
(3, 'Technicien'),
(4, 'Secrètaire'),
(5, 'Ingénieur'),
(6, 'Imprimeur'),
(7, 'Enseignant'),
(8, 'Chercheur');

-- --------------------------------------------------------

--
-- Table structure for table `mot`
--

CREATE TABLE IF NOT EXISTS `mot` (
  `mot_id` int(11) NOT NULL AUTO_INCREMENT,
  `mot_interdit` text NOT NULL,
  PRIMARY KEY (`mot_id`),
  FULLTEXT KEY `mot_interdit` (`mot_interdit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mot`
--

INSERT INTO `mot` (`mot_id`, `mot_interdit`) VALUES
(1, 'sexe'),
(2, 'merde'),
(3, 'toutou'),
(4, 'gestion'),
(5, 'mathématique'),
(6, 'suicide');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `per_num` int(11) NOT NULL AUTO_INCREMENT,
  `per_nom` varchar(30) NOT NULL,
  `per_prenom` varchar(30) NOT NULL,
  `per_tel` char(14) NOT NULL,
  `per_mail` varchar(30) NOT NULL,
  `per_admin` int(11) NOT NULL,
  `per_login` varchar(20) NOT NULL,
  `per_pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`per_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`per_num`, `per_nom`, `per_prenom`, `per_tel`, `per_mail`, `per_admin`, `per_login`, `per_pwd`) VALUES
(1, 'Marley', 'Bob', '0555555555', 'Bob@unilim.fr', 0, 'Bob', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(3, 'Parbal', 'Gilles', '0555555554', 'Gilles.Parbal@yahoo.fr', 0, 'Gilles', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(38, 'Michu', 'Marcel', '0555555555', 'Michu@sfr.fr', 0, 'Marcel', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(39, 'Renard', 'Pierrot', '0655555555', 'Pierrot@gmail.fr', 0, 'sql', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(53, 'Delmas', 'Sophie', '0789562314', 'Sophie@unilim.fr', 0, 'Soso', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(54, 'Dupuy', 'Pascale', '0554565859', 'pascale@free.fr', 0, 'Pascale', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(55, 'Chastagner  ', 'Michel  ', '0555555555', 'Michel.C@yahoo.fr', 1, 'bd  ', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(56, 'Monediere ', 'Thierrry ', '0555555552', 'Th.mo@orange.fr', 0, 'TM ', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(58, 'Vivenot', 'Stéphane', '0555555550', 'S.V@hotmail.fr', 0, 'Stef', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(59, 'Afritt', 'Barack', '0555555553', 'BA@hotmail.fr', 0, 'NM', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(63, 'Hugel', 'Thomas', '0555555554', 'Thomas.hugel@unilim.fr', 0, 'TH', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(64, 'Bienlepetit', 'Ambroise', '0555555555', 'Ambroise.Bienlepetit@unilim.fr', 0, 'Ambroise', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(65, 'Goche', 'Elvira', '0555555555', 'Elvira.Goche@unilim.fr', 0, 'Elvira', 'a06438628f40b128727bc1c0d1c9f529a0b78b53'),
(67, 'Cuite', 'Walter', '0555555555', 'Walter.cuite@unilim.fr', 1, 'Walter', 'a06438628f40b128727bc1c0d1c9f529a0b78b53');

-- --------------------------------------------------------

--
-- Table structure for table `salarie`
--

CREATE TABLE IF NOT EXISTS `salarie` (
  `per_num` int(11) NOT NULL,
  `sal_telprof` varchar(20) NOT NULL,
  `fon_num` int(11) NOT NULL,
  PRIMARY KEY (`per_num`),
  KEY `fon_num` (`fon_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salarie`
--

INSERT INTO `salarie` (`per_num`, `sal_telprof`, `fon_num`) VALUES
(1, '0123456978', 4),
(55, '0654237865', 7),
(56, '0654237864', 8),
(63, '0654237860', 2),
(67, '0555555555', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `vil_num` int(11) NOT NULL AUTO_INCREMENT,
  `vil_nom` varchar(100) NOT NULL,
  PRIMARY KEY (`vil_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`vil_num`, `vil_nom`) VALUES
(5, 'Tulle'),
(6, 'Brive'),
(7, 'Limoges'),
(8, 'Guéret'),
(9, 'Périgueux'),
(10, 'Bordeaux'),
(11, 'Paris'),
(12, 'Toulouse'),
(13, 'Lyon'),
(14, 'Poitiers'),
(15, 'Ambazac'),
(16, 'Egletons'),
(17, 'Orléans');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `cit_num` int(11) NOT NULL,
  `per_num` int(11) NOT NULL,
  `vot_valeur` int(11) NOT NULL,
  PRIMARY KEY (`cit_num`,`per_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`cit_num`, `per_num`, `vot_valeur`) VALUES
(1, 38, 15),
(2, 39, 8),
(3, 38, 2),
(4, 39, 12),
(3, 55, 20),
(3, 3, 20);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citation`
--
ALTER TABLE `citation`
  ADD CONSTRAINT `citation_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  ADD CONSTRAINT `citation_ibfk_2` FOREIGN KEY (`per_num_valide`) REFERENCES `personne` (`per_num`),
  ADD CONSTRAINT `citation_ibfk_3` FOREIGN KEY (`per_num_etu`) REFERENCES `etudiant` (`per_num`);

--
-- Constraints for table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`vil_num`) REFERENCES `ville` (`vil_num`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`dep_num`) REFERENCES `departement` (`dep_num`),
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`div_num`) REFERENCES `division` (`div_num`);

--
-- Constraints for table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `salarie_ibfk_1` FOREIGN KEY (`per_num`) REFERENCES `personne` (`per_num`),
  ADD CONSTRAINT `salarie_ibfk_2` FOREIGN KEY (`fon_num`) REFERENCES `fonction` (`fon_num`);
