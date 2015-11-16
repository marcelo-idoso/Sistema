-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Nov-2015 às 19:56
-- Versão do servidor: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sch`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `LOGIN` varchar(40) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `TOKEN` varchar(255) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `DTA_INC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `LOGIN`, `EMAIL`, `SENHA`, `TOKEN`, `STATUS`, `DTA_INC`) VALUES
(21, 'Marcelo pereira da silva', 'idoso', 'marcelo@hotmail.com', 'b6e2a71e5d8de9afce4941001d8b73ac87d1770e064ae11d316bf73bd088194a6b3846502794948b6af0d1b934ddc75ea1b47991eefb627eeccf66cd1b8fb38a', 'd70b984b38d1cc42ecf7a1ab6184d2127410c6ec', 1, '2015-11-12 19:01:23'),
(25, '1', '2', '1', '6061473ca040344347161bdba928149c032cd46682a81b9b4de47ff48b807872b744bcfb7abd86f86512cf4de774ad5030f5f7684f513588090fb311d07ad59d', 'd70b984b38d1cc42ecf7a1ab6184d2127410c6ec', 1, '2015-11-13 18:02:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
