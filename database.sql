-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 01:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reklasicizam`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `KorisnikID` int(11) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `Grad` varchar(50) NOT NULL,
  `PostanskiBroj` int(11) NOT NULL,
  `Adresa` varchar(50) NOT NULL,
  `Telefon` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`KorisnikID`, `Ime`, `Prezime`, `Grad`, `PostanskiBroj`, `Adresa`, `Telefon`, `Email`, `Password`, `Role`) VALUES
(1, 'Miloš', 'Pavlović', 'Novi Sad', 21101, 'Narodnih heroja 4', '062399200', 'milosp@gmail.com', 'stolica123', ''),
(2, 'Zoran', 'Mikić', 'Novi Sad', 21102, 'Vojvođanska 5', '063220132', 'zoranmikic@gmail.com', 'zoran222', ''),
(4, 'Zorana', 'Ružić', 'Beograd', 11010, 'Vojvode Stepe 134', '065433231', 'ruziczorana@hotmail.com', 'roletneee', ''),
(5, 'Goran', 'Mitrović', 'Beograd', 11010, 'Timočke divizije 6', '064223120', 'mitrovicg@gmail.com', 'mitroviccc', ''),
(19, 'Milica', 'Vukić', 'Beograd', 11000, 'Bahtijara Vagabzade 28', '063223553', 'milicavu@gmail.com', 'vukic123', ''),
(21, 'Ognjen', 'Milikić', 'Beograd', 11000, 'Timočke divizije 1/9', '0641203395', 'ognjen.milikic97@gmail.com', 'ognjencar', 'admin'),
(22, 'Dušan', 'Micić', 'Beograd', 11010, 'Generala Štefanika 44', '0639953223', 'dusanmicic@gmail.com', 'dusandusan', ''),
(23, 'Luka', 'Mihajlovic', 'Beograd', 11010, 'Patrisa Lumumbe 69', '0621027997', 'lukamihajlovic@hotmail.com', 'lukamihajlovic', ''),
(25, 'Slavisa', 'Devitovic', 'Negotin', 22000, 'Vojislava Ilica 62', '062233924', 'slavisadevitovic@gmail.com', 'devitoah', '');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbina`
--

CREATE TABLE `narudzbina` (
  `NarudzbinaID` int(11) NOT NULL,
  `KorisnikID` int(11) NOT NULL,
  `ProizvodID` int(11) NOT NULL,
  `Velicina` varchar(2) NOT NULL,
  `Kolicina` int(11) NOT NULL,
  `DatumNarudzbine` datetime NOT NULL DEFAULT current_timestamp(),
  `Realizovano` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbina`
--

INSERT INTO `narudzbina` (`NarudzbinaID`, `KorisnikID`, `ProizvodID`, `Velicina`, `Kolicina`, `DatumNarudzbine`, `Realizovano`) VALUES
(8, 21, 2, 'L', 3, '2021-05-28 00:00:00', 1),
(9, 21, 2, 'L', 2, '2021-05-28 00:00:00', 1),
(10, 22, 12, 'L', 2, '2021-05-28 00:00:00', 1),
(11, 22, 12, 'L', 2, '2021-05-28 00:00:00', 1),
(41, 22, 2, 'S', 1, '2021-05-28 00:00:00', 1),
(42, 22, 1, 'XS', 1, '2021-05-28 00:00:00', 1),
(43, 22, 2, 'L', 2, '2021-05-28 21:00:54', 1),
(44, 21, 2, 'M', 2, '2021-05-29 20:23:11', 1),
(47, 19, 9, 'XL', 1, '2021-06-02 10:24:08', 1),
(49, 21, 2, 'XS', 1, '2021-06-02 12:58:10', 1),
(50, 21, 2, 'XS', 1, '2021-06-02 13:01:15', 1),
(51, 21, 2, 'XS', 1, '2021-06-02 13:01:15', 0),
(52, 21, 1, 'XS', 4, '2021-06-02 13:19:27', 0),
(53, 21, 4, 'XS', 2, '2021-06-02 13:24:14', 0),
(54, 21, 3, 'XS', 1, '2021-06-02 13:32:23', 0),
(57, 19, 5, 'XS', 1, '2021-07-01 15:22:22', 0),
(59, 19, 7, 'S', 1, '2021-07-01 18:35:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbinabezregistracije`
--

CREATE TABLE `narudzbinabezregistracije` (
  `narudzbinaBezRegistracijeID` int(11) NOT NULL,
  `ProizvodID` int(11) NOT NULL,
  `Ime` varchar(30) NOT NULL,
  `Prezime` varchar(30) NOT NULL,
  `Grad` varchar(30) NOT NULL,
  `PostanskiBroj` int(11) NOT NULL,
  `Adresa` varchar(30) NOT NULL,
  `Telefon` varchar(30) NOT NULL,
  `Velicina` varchar(2) NOT NULL,
  `Kolicina` tinyint(4) NOT NULL,
  `DatumNarudzbine` datetime NOT NULL DEFAULT current_timestamp(),
  `Realizovano` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbinabezregistracije`
--

INSERT INTO `narudzbinabezregistracije` (`narudzbinaBezRegistracijeID`, `ProizvodID`, `Ime`, `Prezime`, `Grad`, `PostanskiBroj`, `Adresa`, `Telefon`, `Velicina`, `Kolicina`, `DatumNarudzbine`, `Realizovano`) VALUES
(3, 1, 'Zoran', 'Ilic', 'Beograd', 11000, 'Narodnih heroja 4', '0641203395', 'S', 2, '2021-05-26 00:00:00', 1),
(4, 3, 'Zoran', 'Jevtic', 'Beograd', 11010, 'Timocke divizije', '0641203395', 'L', 1, '2021-05-27 00:00:00', 1),
(5, 3, 'Zoran', 'Milikic', 'Beograd', 11010, 'Rebeke Vest 74c', '0652323232', 'XS', 1, '2021-05-27 00:00:00', 1),
(6, 3, 'Goran', 'Popovic', 'Nis', 21000, 'Husinjskih rudara 15', '063223311', 'M', 1, '0000-00-00 00:00:00', 1),
(7, 3, 'Goran', 'Popovic', 'Nis', 21000, 'Husinjskih rudara 15', '063223311', 'M', 1, '0000-00-00 00:00:00', 1),
(8, 1, 'Luka', 'Letvica', 'Kragujevac', 12000, 'Vojislava Ilica 45', '0641203395', 'XS', 1, '2021-05-28 00:00:00', 1),
(9, 2, 'Luka', 'Markovic', 'Kragujevac', 11000, 'Sutjeska 5', '0639953223', 'S', 2, '2021-06-02 10:37:22', 1),
(10, 3, 'Luka', 'Markovic', 'Kragujevac', 11000, 'Sutjeska 5', '0639953223', 'M', 1, '2021-06-02 10:37:22', 1),
(11, 2, 'Zoran', 'Letvica', 'Beograd', 11000, 'Timocke divizije', '0641203231', 'S', 2, '2021-06-02 10:39:54', 1),
(12, 1, 'Zoran', 'Ilic', 'Kragujevac', 12000, 'Timocke divizije', '0641203231', 'XS', 1, '2021-06-02 11:39:38', 1),
(13, 1, 'Zoran', 'Ilic', 'Kragujevac', 12000, 'Timocke divizije', '0641203231', 'XS', 1, '2021-06-02 11:40:31', 1),
(14, 3, 'Zoran', 'Ilic', 'Beograd', 11000, 'Timocke divizije', '0641203395', 'XS', 1, '2021-06-02 12:19:12', 1),
(15, 2, 'Zoran', 'Ilic', 'Beograd', 12000, 'Timocke divizije', '0641203395', 'M', 2, '2021-06-02 13:28:58', 1),
(16, 2, 'Zoran', 'Milikic', 'Beograd', 11000, 'Timocke divizije', '0641203395', 'M', 2, '2021-06-02 13:31:59', 1),
(17, 3, 'Zoran', 'Milikic', 'Beograd', 11000, 'Timocke divizije', '0641203395', 'XS', 1, '2021-06-02 13:31:59', 0),
(18, 2, 'Ognjen', 'Milikic', 'Beograd', 11010, 'Timocke divizije', '062323223', 'M', 2, '2021-06-21 14:01:35', 0),
(19, 7, 'Ognjen', 'Milikic', 'Beograd', 11010, 'Timocke divizije', '062323223', 'M', 2, '2021-06-21 14:01:36', 0),
(20, 2, 'Ognjen', 'Mihajlovic', 'Beograd', 11010, 'Timocke divizije', '0621022222', 'XS', 12, '2021-07-01 14:30:46', 0),
(21, 12, 'Ognjen', 'Mihajlovic', 'Beograd', 11010, 'Rebeke Vest 74c', '0621022222', 'XS', 1, '2021-07-01 15:09:01', 0),
(22, 7, 'Ognjen', 'Mihajlovic', 'Beograd', 11010, 'Timocke divizije', '0621022222', 'XS', 1, '2021-07-01 15:13:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ProizvodID` int(11) NOT NULL,
  `NazivProizvoda` varchar(50) NOT NULL,
  `Cena` float NOT NULL,
  `PutanjaDoSlike` varchar(70) NOT NULL,
  `PutanjaDoZumiraneSlike` varchar(70) NOT NULL,
  `DostupnaKolicina` int(11) NOT NULL,
  `Autor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ProizvodID`, `NazivProizvoda`, `Cena`, `PutanjaDoSlike`, `PutanjaDoZumiraneSlike`, `DostupnaKolicina`, `Autor`) VALUES
(1, 'Andrić - And suddenly i felt nothing M', 1699, 'images/product-card-andric-m.png', 'images/product-card-andric-zoomed.png', 20, 'Andrić'),
(2, 'Njegoš - GTA Lovćen M', 2199, 'images/product-card-njegos-m.png', 'images/product-card-njegos-zoomed.png', 20, 'Njegoš'),
(3, 'Crnjanski - The eyes M', 1799, 'images/product-card-crnjanski-m.png', 'images/product-card-crnjanski-zoomed.png', 5, 'Crnjanski'),
(4, 'Reklasicizam - Logo M', 1699, 'images/product-card-reklasicizam-m.png', 'images/product-card-reklasicizam-zoomed.png', 0, 'Reklasicizam'),
(5, 'Alečković i Maksimović- Totally Spies Ž', 2199, 'images/product-card-aleckovicmaksimovic-z.png', 'images/product-card-aleckovicmaksimovic-zoomed.png', 20, 'Alečković i Maksimović'),
(6, 'Andrić - And suddenly i felt nothing Ž', 1699, 'images/product-card-andric-z.png', 'images/product-card-andric-zoomed.png', 8, 'Andrić'),
(7, 'Njegoš - GTA Lovćen Ž', 2199, 'images/product-card-njegos-z.png', 'images/product-card-njegos-zoomed.png', 15, 'Njegoš'),
(8, 'Crnjanski - The eyes Ž', 1799, 'images/product-card-crnjanski-z.png', 'images/product-card-crnjanski-zoomed.png', 8, 'Crnjanski'),
(9, 'Reklasicizam - Logo Ž', 1699, 'images/product-card-reklasicizam-z.png', 'images/product-card-reklasicizam-zoomed.png', 10, 'Reklasicizam'),
(10, 'Reklasicizam - Tekst M', 1599, 'images/product-card-reklasicizamtekst-m.png', 'images/product-card-reklasicizamtekst-zoomed.png', 12, 'Reklasicizam'),
(11, 'Reklasicizam - Tekst Ž', 1599, 'images/product-card-reklasicizamtekst-z.png', 'images/product-card-reklasicizamtekst-zoomed.png', 15, 'Reklasicizam'),
(12, 'Dostojevski - Voćkice M', 2099, 'images/product-card-dostojevski-m.png', 'images/product-card-dostojevski-zoomed.png', 10, 'Dostojevski'),
(13, 'Dostojevski - Voćkice Ž', 2099, 'images/product-card-dostojevski-z.png', 'images/product-card-dostojevski-zoomed.png', 5, 'Dostojevski');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`KorisnikID`);

--
-- Indexes for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD PRIMARY KEY (`NarudzbinaID`),
  ADD KEY `KorisnikID` (`KorisnikID`),
  ADD KEY `ProizvodID` (`ProizvodID`);

--
-- Indexes for table `narudzbinabezregistracije`
--
ALTER TABLE `narudzbinabezregistracije`
  ADD PRIMARY KEY (`narudzbinaBezRegistracijeID`),
  ADD KEY `ProizvodID` (`ProizvodID`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`ProizvodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `KorisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `narudzbina`
--
ALTER TABLE `narudzbina`
  MODIFY `NarudzbinaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `narudzbinabezregistracije`
--
ALTER TABLE `narudzbinabezregistracije`
  MODIFY `narudzbinaBezRegistracijeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ProizvodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD CONSTRAINT `narudzbina_ibfk_1` FOREIGN KEY (`KorisnikID`) REFERENCES `korisnik` (`KorisnikID`),
  ADD CONSTRAINT `narudzbina_ibfk_2` FOREIGN KEY (`ProizvodID`) REFERENCES `proizvod` (`ProizvodID`);

--
-- Constraints for table `narudzbinabezregistracije`
--
ALTER TABLE `narudzbinabezregistracije`
  ADD CONSTRAINT `narudzbinabezregistracije_ibfk_1` FOREIGN KEY (`ProizvodID`) REFERENCES `proizvod` (`ProizvodID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
