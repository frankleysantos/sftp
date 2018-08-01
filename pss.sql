-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 31-Jul-2018 às 11:53
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pss`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vaga` varchar(255) NOT NULL,
  `id_pessoa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pessoa` (`id_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `vaga`, `id_pessoa`) VALUES
(1, 'teste', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `mae` varchar(60) DEFAULT NULL,
  `pai` varchar(60) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `datanasc` varchar(45) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `rua` varchar(60) DEFAULT NULL,
  `numero` varchar(60) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `mae`, `pai`, `cpf`, `rg`, `datanasc`, `sexo`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `email`, `senha`, `token`, `time`) VALUES
(1, 'FRANKLEY DA SILVA SANTOS', 'DURVALINA RAMOS DOS SANTOS', 'JAIME DA SILVA SANTOS', '09019872630', '1631388', '16/07/1989', 'MASCULINO', 'RUA DOUTOR MANOEL ESTEVES', '196', 'AP 05', 'CENTRO', 'TEOFILO OTONI', 'MG', 'frankley.santos@teofilootoni.mg.gov.br', 'e10adc3949ba59abbe56e057f20f883e', '', '2018-07-30 17:59:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
