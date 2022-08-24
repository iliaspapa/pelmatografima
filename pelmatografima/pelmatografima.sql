-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 22 Οκτ 2020 στις 11:35:48
-- Έκδοση διακομιστή: 10.1.40-MariaDB
-- Έκδοση PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `pelmatografima`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `pelma`
--

CREATE TABLE `pelma` (
  `ID` int(11) NOT NULL,
  `fmodel` text NOT NULL,
  `flot` text NOT NULL,
  `pmodel` text NOT NULL,
  `plot` text NOT NULL,
  `sizel` int(11) DEFAULT NULL,
  `sizeh` int(11) DEFAULT NULL,
  `kataskeuastis` varchar(40) DEFAULT NULL,
  `perigrafi` text,
  `date_in` date NOT NULL,
  `date_out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `phones`
--

CREATE TABLE `phones` (
  `ID` int(11) NOT NULL,
  `number` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `country_code` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `polisi`
--

CREATE TABLE `polisi` (
  `ID` int(11) NOT NULL,
  `idpel` int(11) NOT NULL,
  `idsun` int(11) DEFAULT NULL,
  `idpelm` int(11) NOT NULL,
  `penc` text,
  `date` date NOT NULL,
  `inmov` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prosthiki`
--

CREATE TABLE `prosthiki` (
  `ID` int(11) NOT NULL,
  `pelmID` int(11) NOT NULL,
  `penc` varchar(100) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `synalasomenoi`
--

CREATE TABLE `synalasomenoi` (
  `ID` int(11) NOT NULL,
  `nEnc` varchar(191) NOT NULL,
  `lnEnc` varchar(191) NOT NULL,
  `street` varchar(20) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `town` varchar(20) DEFAULT NULL,
  `tk` int(11) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `paroxos` tinyint(1) NOT NULL,
  `dateofadmition` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `pelma`
--
ALTER TABLE `pelma`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kataskeyastis` (`kataskeuastis`),
  ADD KEY `size` (`sizel`,`sizeh`) USING BTREE,
  ADD KEY `date_in` (`date_in`),
  ADD KEY `date_out` (`date_out`);

--
-- Ευρετήρια για πίνακα `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Ευρετήρια για πίνακα `polisi`
--
ALTER TABLE `polisi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idpel` (`idpel`),
  ADD KEY `idsun` (`idsun`),
  ADD KEY `date` (`date`),
  ADD KEY `idpelm` (`idpelm`);

--
-- Ευρετήρια για πίνακα `prosthiki`
--
ALTER TABLE `prosthiki`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `date` (`date`),
  ADD KEY `pelmID` (`pelmID`);

--
-- Ευρετήρια για πίνακα `synalasomenoi`
--
ALTER TABLE `synalasomenoi`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`lnEnc`,`nEnc`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `pelma`
--
ALTER TABLE `pelma`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `phones`
--
ALTER TABLE `phones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `polisi`
--
ALTER TABLE `polisi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `prosthiki`
--
ALTER TABLE `prosthiki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `synalasomenoi`
--
ALTER TABLE `synalasomenoi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`owner_id`) REFERENCES `synalasomenoi` (`ID`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `polisi`
--
ALTER TABLE `polisi`
  ADD CONSTRAINT `polisi_ibfk_1` FOREIGN KEY (`idpel`) REFERENCES `synalasomenoi` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `polisi_ibfk_2` FOREIGN KEY (`idpelm`) REFERENCES `pelma` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `polisi_ibfk_3` FOREIGN KEY (`idsun`) REFERENCES `synalasomenoi` (`ID`) ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `prosthiki`
--
ALTER TABLE `prosthiki`
  ADD CONSTRAINT `prosthiki_ibfk_1` FOREIGN KEY (`pelmID`) REFERENCES `pelma` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
