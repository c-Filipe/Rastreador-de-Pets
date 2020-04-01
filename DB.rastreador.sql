-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Abr-2020 às 21:16
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rastreador`
--
CREATE DATABASE IF NOT EXISTS `rastreador` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rastreador`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicoloc`
--

DROP TABLE IF EXISTS `historicoloc`;
CREATE TABLE IF NOT EXISTS `historicoloc` (
  `idHistorico` int(5) NOT NULL AUTO_INCREMENT,
  `idPet` int(11) NOT NULL,
  `idRastreador` int(4) NOT NULL,
  `DataHistorico` date NOT NULL,
  `Hora` time NOT NULL,
  `latitude_inicial` double NOT NULL,
  `latitude_final` double NOT NULL,
  `longitude_inicial` double NOT NULL,
  `longitude_final` double NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `idRastreador` (`idRastreador`),
  KEY `ovomeu` (`idPet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historicoloc`
--

INSERT INTO `historicoloc` (`idHistorico`, `idPet`, `idRastreador`, `DataHistorico`, `Hora`, `latitude_inicial`, `latitude_final`, `longitude_inicial`, `longitude_final`) VALUES
(3, 8, 8, '2014-09-12', '17:40:00', -19.780358, -19.778513, -43.911862, -43.914588),
(4, 8, 8, '2014-09-13', '19:30:00', -19.778513, -19.849989, -43.914588, -44.006823);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

DROP TABLE IF EXISTS `localizacao`;
CREATE TABLE IF NOT EXISTS `localizacao` (
  `idLocalizacao` int(5) NOT NULL AUTO_INCREMENT,
  `IdRastreador` int(11) DEFAULT NULL,
  `IdPet` int(11) DEFAULT NULL,
  `Latitude_Atual` double DEFAULT NULL,
  `Longitude_Atual` double DEFAULT NULL,
  PRIMARY KEY (`idLocalizacao`),
  KEY `IdRastreador` (`IdRastreador`),
  KEY `IdPet` (`IdPet`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`idLocalizacao`, `IdRastreador`, `IdPet`, `Latitude_Atual`, `Longitude_Atual`) VALUES
(9, 8, 8, -19.780358, -43.911862);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

DROP TABLE IF EXISTS `pet`;
CREATE TABLE IF NOT EXISTS `pet` (
  `IdPet` int(11) NOT NULL AUTO_INCREMENT,
  `NomePet` varchar(30) NOT NULL,
  `TipoPet` varchar(25) DEFAULT NULL,
  `DataNasc` datetime DEFAULT NULL,
  `SexoPet` varchar(5) DEFAULT NULL,
  `IdUsuario` int(4) DEFAULT NULL,
  `idRastreador` int(4) DEFAULT NULL,
  PRIMARY KEY (`IdPet`),
  UNIQUE KEY `idRastreador` (`idRastreador`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`IdPet`, `NomePet`, `TipoPet`, `DataNasc`, `SexoPet`, `IdUsuario`, `idRastreador`) VALUES
(8, 'Pandora', 'cachorro', '0000-00-00 00:00:00', 'Femea', 1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rastreador`
--

DROP TABLE IF EXISTS `rastreador`;
CREATE TABLE IF NOT EXISTS `rastreador` (
  `IdRastreador` int(4) NOT NULL AUTO_INCREMENT,
  `IdCadastro` varchar(5) NOT NULL,
  `DataAtivacao` datetime DEFAULT NULL,
  `IdUsuario` int(4) DEFAULT NULL,
  `IdPet` int(15) DEFAULT NULL,
  PRIMARY KEY (`IdRastreador`),
  KEY `IdUsuario` (`IdUsuario`),
  KEY `IdPet` (`IdPet`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rastreador`
--

INSERT INTO `rastreador` (`IdRastreador`, `IdCadastro`, `DataAtivacao`, `IdUsuario`, `IdPet`) VALUES
(8, '101', '2020-03-30 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(4) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `Sobrenome` varchar(30) NOT NULL,
  `Email` varchar(90) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `Estado` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Cidade` varchar(60) DEFAULT NULL,
  `Bairro` varchar(60) DEFAULT NULL,
  `Rua` varchar(60) DEFAULT NULL,
  `CEP` int(8) DEFAULT NULL,
  `Numero` int(4) DEFAULT NULL,
  `Complemento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Estado`, `Cidade`, `Bairro`, `Rua`, `CEP`, `Numero`, `Complemento`) VALUES
(1, 'Carlos', 'Filipe', 'carlos.filipe.developer@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'Minas Gerais', 'Santa Luzia', '', 'G', 33113040, 0, '');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `historicoloc`
--
ALTER TABLE `historicoloc`
  ADD CONSTRAINT `idRastreador` FOREIGN KEY (`idRastreador`) REFERENCES `rastreador` (`IdRastreador`),
  ADD CONSTRAINT `ovomeu` FOREIGN KEY (`idPet`) REFERENCES `pet` (`IdPet`);

--
-- Limitadores para a tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD CONSTRAINT `IdPet` FOREIGN KEY (`IdPet`) REFERENCES `pet` (`IdPet`),
  ADD CONSTRAINT `localizacao_ibfk_1` FOREIGN KEY (`IdRastreador`) REFERENCES `rastreador` (`IdRastreador`);

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `pet_ibfk_3` FOREIGN KEY (`idRastreador`) REFERENCES `rastreador` (`IdRastreador`);

--
-- Limitadores para a tabela `rastreador`
--
ALTER TABLE `rastreador`
  ADD CONSTRAINT `rastreador_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `rastreador_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `rastreador_ibfk_3` FOREIGN KEY (`IdPet`) REFERENCES `pet` (`IdPet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
