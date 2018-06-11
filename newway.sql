-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2018 às 09:01
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newway`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `nw_cavaleiros`
--

CREATE TABLE `nw_cavaleiros` (
  `Cod_Cavaleiro` int(11) NOT NULL,
  `nome` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `classe` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `especialidade` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `vida` int(4) NOT NULL,
  `defesa` int(4) NOT NULL,
  `dano` int(4) NOT NULL,
  `vataque` double NOT NULL,
  `vmovimento` int(4) NOT NULL,
  `IMG_Cavaleiro` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `nw_cavaleiros`
--

INSERT INTO `nw_cavaleiros` (`Cod_Cavaleiro`, `nome`, `classe`, `especialidade`, `vida`, `defesa`, `dano`, `vataque`, `vmovimento`, `IMG_Cavaleiro`, `Ativo`) VALUES
(9, 'sdsdsad', 'Mago', 'Ataque a Distancia', 40, 40, 250, 1, 12, '3', 1),
(10, 'Teste 1111', 'Sacerdote', 'Tanker,Matador de Chefes,Ataque em Area', 90, 40, 200, 23, 13, '8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nw_cavaleiros`
--
ALTER TABLE `nw_cavaleiros`
  ADD PRIMARY KEY (`Cod_Cavaleiro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nw_cavaleiros`
--
ALTER TABLE `nw_cavaleiros`
  MODIFY `Cod_Cavaleiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
