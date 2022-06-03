-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2022 at 08:21 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2021x064`
--

-- --------------------------------------------------------

--
-- Table structure for table `benzinska_postaja`
--

CREATE TABLE `benzinska_postaja` (
  `benzinska_id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `godina_nastanka` int(11) NOT NULL,
  `natoceno` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benzinska_postaja`
--

INSERT INTO `benzinska_postaja` (`benzinska_id`, `naziv`, `adresa`, `godina_nastanka`, `natoceno`, `korisnik_id`) VALUES
(1, 'Petrol', 'adresa1', 2021, 5000, 1),
(2, 'Crodux', 'adresa2', 2021, 5000, 2),
(3, 'OMW', 'adresa3', 2022, 2000, 3),
(4, 'INA', 'adresa4', 2022, 1000, 1),
(5, 'Tifon', 'adresa5', 2021, 6000, 2),
(6, 'Mikol', 'adresa6', 2020, 50000, 6),
(7, 'LUKOIL', 'adresa7', 2021, 7000, 7),
(8, 'Shell', 'adresa8', 2021, 4000, 8),
(9, 'Ferotom', 'adresa9', 2020, 10000, 9),
(10, 'Mitea', 'adresa10', 2021, 4000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `gorivo`
--

CREATE TABLE `gorivo` (
  `gorivo_id` int(11) NOT NULL,
  `naziv_goriva` varchar(45) NOT NULL,
  `cijena` double NOT NULL,
  `kolicina` double NOT NULL,
  `status_goriva_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gorivo`
--

INSERT INTO `gorivo` (`gorivo_id`, `naziv_goriva`, `cijena`, `kolicina`, `status_goriva_id`, `korisnik_id`) VALUES
(1, 'benzin', 11.83, 2000, 1, 1),
(2, 'dizel', 12.5, 2000, 1, 2),
(3, 'plin', 15.83, 0, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `grad_id` int(11) NOT NULL,
  `naziv_grada` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`grad_id`, `naziv_grada`) VALUES
(1, 'Koprivnica'),
(2, 'Zagreb'),
(3, 'Varaždin'),
(4, 'Rijeka'),
(5, 'Osijek');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `datum_rodenja` date NOT NULL,
  `korisnicko_ime` varchar(45) NOT NULL,
  `lozinka` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `telefon`, `datum_rodenja`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'Ivo', 'Ivic', '+385100', '2000-01-01', 'iivic', '123'),
(2, 'Pero', 'peric', '+385101', '2000-01-02', 'pperic', '1234'),
(3, 'Ana', 'Anic', '+385102', '2000-01-03', 'aanic', '12345'),
(4, 'Drago', 'Dragic', '+385103', '2000-01-04', 'ddragic', '123456'),
(5, 'Matko', 'Matkic', '+385104', '2000-01-05', 'mmatkic', '1234567'),
(6, 'Ivan', 'Ivanic', '+385105', '2000-01-06', 'iivanic', '12345678'),
(7, 'Beta', 'Betic', '+385106', '2000-01-07', 'bbetic', '123456789'),
(8, 'Tina', 'Tinic', '+385107', '2000-01-08', 'ttinic', '234'),
(9, 'Marko', 'Markic', '+385108', '2000-01-09', 'mmarkic', '2345'),
(10, 'Leo', 'Leic', '+385109', '2000-01-10', 'lleic', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_vozilo`
--

CREATE TABLE `korisnik_vozilo` (
  `korisnik_id` int(11) NOT NULL,
  `vozilo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik_vozilo`
--

INSERT INTO `korisnik_vozilo` (`korisnik_id`, `vozilo_id`) VALUES
(1, 2),
(2, 3),
(3, 3),
(5, 3),
(6, 3),
(8, 3),
(9, 3),
(10, 3),
(4, 5),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `mjesto`
--

CREATE TABLE `mjesto` (
  `mjesto_id` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `benzinska_id` int(11) NOT NULL,
  `status_mjesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mjesto`
--

INSERT INTO `mjesto` (`mjesto_id`, `naziv`, `korisnik_id`, `benzinska_id`, `status_mjesta_id`) VALUES
(1, 'mjesto1', 1, 1, 1),
(2, 'mjesto2', 2, 3, 2),
(3, 'mjesto3', 3, 4, 1),
(4, 'mjesto4', 4, 4, 1),
(5, 'mjesto5', 5, 5, 2),
(6, 'mjesto6', 6, 6, 1),
(7, 'mjesto7', 7, 7, 2),
(8, 'mjesto8', 8, 8, 1),
(9, 'mjesto9', 9, 10, 2),
(10, 'mjesto10', 10, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sadrzi_benzinsku`
--

CREATE TABLE `sadrzi_benzinsku` (
  `benzinska_id` int(11) NOT NULL,
  `grad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sadrzi_benzinsku`
--

INSERT INTO `sadrzi_benzinsku` (`benzinska_id`, `grad_id`) VALUES
(1, 1),
(2, 1),
(4, 1),
(3, 2),
(5, 2),
(10, 2),
(6, 3),
(9, 3),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sadrzi_gorivo`
--

CREATE TABLE `sadrzi_gorivo` (
  `benzinska_id` int(11) NOT NULL,
  `gorivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sadrzi_gorivo`
--

INSERT INTO `sadrzi_gorivo` (`benzinska_id`, `gorivo_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_goriva`
--

CREATE TABLE `status_goriva` (
  `status_goriva_id` int(11) NOT NULL,
  `ima` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_goriva`
--

INSERT INTO `status_goriva` (`status_goriva_id`, `ima`) VALUES
(1, 1),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_mjesta`
--

CREATE TABLE `status_mjesta` (
  `status_mjesta_id` int(11) NOT NULL,
  `slobodno` tinyint(4) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_mjesta`
--

INSERT INTO `status_mjesta` (`status_mjesta_id`, `slobodno`, `status`) VALUES
(1, 1, 'otvorena'),
(2, 0, 'zatvorena'),
(3, 0, 'u kvaru'),
(4, 0, '?eka naplatu'),
(5, 1, 'otvorena'),
(6, 1, 'otvorena');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_id` int(11) NOT NULL,
  `naziv_tipa` varchar(45) NOT NULL,
  `korisnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_id`, `naziv_tipa`, `korisnik_id`) VALUES
(1, 'administrator', 1),
(2, 'moderator', 2),
(3, 'registriran', 3),
(4, 'neregistriran', 4),
(5, 'moderator', 5),
(6, 'administrator', 6),
(7, 'registriran', 7),
(8, 'registriran', 8),
(9, 'moderator', 9),
(10, 'neregistriran', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tocenje`
--

CREATE TABLE `tocenje` (
  `tocenje_id` int(11) NOT NULL,
  `kolicina_natocenog_goriva` int(11) NOT NULL,
  `mjesto_id` int(11) NOT NULL,
  `vozilo_id` int(11) NOT NULL,
  `gorivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tocenje`
--

INSERT INTO `tocenje` (`tocenje_id`, `kolicina_natocenog_goriva`, `mjesto_id`, `vozilo_id`, `gorivo_id`) VALUES
(1, 10, 1, 2, 2),
(2, 10, 2, 3, 1),
(3, 10, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `vozilo_id` int(11) NOT NULL,
  `marka` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `registracija` varchar(45) NOT NULL,
  `prijedeni_km` int(11) NOT NULL,
  `gorivo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`vozilo_id`, `marka`, `model`, `registracija`, `prijedeni_km`, `gorivo_id`) VALUES
(1, 'Opel', 'Corsa', 'KC-0002-CV', 200000, 1),
(2, 'Opel', 'Astra', 'KC-323-EF', 20000, 2),
(3, 'Renault', 'Megan', 'VZ-111-DF', 500000, 1),
(4, 'Audi', 'a4', 'KC-343-CV', 4000, 2),
(5, 'Citroen', 'c3', 'ZG-222-CV', 33333, 3),
(6, 'Opel', 'Astra', 'KZ-0002-CV', 200000, 2),
(7, 'Volvo', 'model1', 'RI-0002-CV', 333212, 2),
(8, 'BMW', 'c3', 'KC-022-CV', 44444, 1),
(9, 'Fiat', 'Punto', 'OS-0002-CV', 200000, 3),
(10, 'Opel', 'Zafira', 'KC-4443-CV', 200000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benzinska_postaja`
--
ALTER TABLE `benzinska_postaja`
  ADD PRIMARY KEY (`benzinska_id`,`korisnik_id`),
  ADD KEY `fk_benzinska_postaja_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `gorivo`
--
ALTER TABLE `gorivo`
  ADD PRIMARY KEY (`gorivo_id`,`status_goriva_id`,`korisnik_id`),
  ADD KEY `fk_gorivo_status_goriva1_idx` (`status_goriva_id`),
  ADD KEY `fk_gorivo_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`grad_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`);

--
-- Indexes for table `korisnik_vozilo`
--
ALTER TABLE `korisnik_vozilo`
  ADD PRIMARY KEY (`korisnik_id`,`vozilo_id`),
  ADD KEY `fk_korisnik_vozilo_vozilo1_idx` (`vozilo_id`);

--
-- Indexes for table `mjesto`
--
ALTER TABLE `mjesto`
  ADD PRIMARY KEY (`mjesto_id`,`benzinska_id`,`status_mjesta_id`),
  ADD KEY `fk_mjesto_benzinska_postaja1_idx` (`benzinska_id`),
  ADD KEY `fk_mjesto_status_mjesta1_idx` (`status_mjesta_id`);

--
-- Indexes for table `sadrzi_benzinsku`
--
ALTER TABLE `sadrzi_benzinsku`
  ADD PRIMARY KEY (`benzinska_id`,`grad_id`),
  ADD KEY `fk_sadrzi_benzinsku_grad1_idx` (`grad_id`);

--
-- Indexes for table `sadrzi_gorivo`
--
ALTER TABLE `sadrzi_gorivo`
  ADD PRIMARY KEY (`benzinska_id`,`gorivo_id`),
  ADD KEY `fk_sadrzi_gorivo_gorivo1_idx` (`gorivo_id`);

--
-- Indexes for table `status_goriva`
--
ALTER TABLE `status_goriva`
  ADD PRIMARY KEY (`status_goriva_id`);

--
-- Indexes for table `status_mjesta`
--
ALTER TABLE `status_mjesta`
  ADD PRIMARY KEY (`status_mjesta_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_id`,`korisnik_id`),
  ADD UNIQUE KEY `tip_id_UNIQUE` (`tip_id`),
  ADD KEY `fk_tip_korisnika_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `tocenje`
--
ALTER TABLE `tocenje`
  ADD PRIMARY KEY (`tocenje_id`,`mjesto_id`,`vozilo_id`,`gorivo_id`),
  ADD UNIQUE KEY `gorivo_gorivo_id_UNIQUE` (`gorivo_id`),
  ADD KEY `fk_tocenje_mjesto1_idx` (`mjesto_id`),
  ADD KEY `fk_tocenje_vozilo1_idx` (`vozilo_id`),
  ADD KEY `fk_tocenje_gorivo1_idx` (`gorivo_id`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`vozilo_id`,`gorivo_id`),
  ADD KEY `fk_vozilo_gorivo1_idx` (`gorivo_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benzinska_postaja`
--
ALTER TABLE `benzinska_postaja`
  ADD CONSTRAINT `fk_benzinska_postaja_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gorivo`
--
ALTER TABLE `gorivo`
  ADD CONSTRAINT `fk_gorivo_status_goriva1` FOREIGN KEY (`status_goriva_id`) REFERENCES `status_goriva` (`status_goriva_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gorivo_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik_vozilo`
--
ALTER TABLE `korisnik_vozilo`
  ADD CONSTRAINT `fk_korisnik_vozilo_korisnik` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_vozilo_vozilo1` FOREIGN KEY (`vozilo_id`) REFERENCES `vozilo` (`vozilo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mjesto`
--
ALTER TABLE `mjesto`
  ADD CONSTRAINT `fk_mjesto_benzinska_postaja1` FOREIGN KEY (`benzinska_id`) REFERENCES `benzinska_postaja` (`benzinska_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mjesto_status_mjesta1` FOREIGN KEY (`status_mjesta_id`) REFERENCES `status_mjesta` (`status_mjesta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sadrzi_benzinsku`
--
ALTER TABLE `sadrzi_benzinsku`
  ADD CONSTRAINT `fk_sadrzi_benzinsku_benzinska_postaja1` FOREIGN KEY (`benzinska_id`) REFERENCES `benzinska_postaja` (`benzinska_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sadrzi_benzinsku_grad1` FOREIGN KEY (`grad_id`) REFERENCES `grad` (`grad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sadrzi_gorivo`
--
ALTER TABLE `sadrzi_gorivo`
  ADD CONSTRAINT `fk_sadrzi_gorivo_benzinska_postaja1` FOREIGN KEY (`benzinska_id`) REFERENCES `benzinska_postaja` (`benzinska_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sadrzi_gorivo_gorivo1` FOREIGN KEY (`gorivo_id`) REFERENCES `gorivo` (`gorivo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD CONSTRAINT `fk_tip_korisnika_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tocenje`
--
ALTER TABLE `tocenje`
  ADD CONSTRAINT `fk_tocenje_mjesto1` FOREIGN KEY (`mjesto_id`) REFERENCES `mjesto` (`mjesto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tocenje_vozilo1` FOREIGN KEY (`vozilo_id`) REFERENCES `vozilo` (`vozilo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tocenje_gorivo1` FOREIGN KEY (`gorivo_id`) REFERENCES `gorivo` (`gorivo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD CONSTRAINT `fk_vozilo_gorivo1` FOREIGN KEY (`gorivo_id`) REFERENCES `gorivo` (`gorivo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
