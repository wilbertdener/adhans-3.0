-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Mar-2025 às 03:17
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_adhans`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

DROP TABLE IF EXISTS `exames`;
CREATE TABLE IF NOT EXISTS `exames` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `nome_pac` varchar(100) DEFAULT NULL,
  `diagnostico` tinyint(1) NOT NULL,
  `data` date NOT NULL,
  `id_foto1` int(10) NOT NULL,
  `id_foto2` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `local` varchar(100) NOT NULL,
  `Roi_dentro1` varchar(10) DEFAULT NULL,
  `Roi_dentro2` varchar(10) DEFAULT NULL,
  `Roi_dentro3` varchar(10) DEFAULT NULL,
  `Roi_fora1` varchar(10) DEFAULT NULL,
  `Roi_fora2` varchar(10) DEFAULT NULL,
  `Roi_fora3` varchar(10) DEFAULT NULL,
  `tempo` tinyint(1) DEFAULT NULL,
  `dimensao` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imgs`
--

DROP TABLE IF EXISTS `imgs`;
CREATE TABLE IF NOT EXISTS `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `area` varchar(11) NOT NULL,
  `topico` varchar(100) DEFAULT NULL,
  `metodo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imgs`
--

INSERT INTO `imgs` (`id`, `local`, `nome`, `descricao`, `area`, `topico`, `metodo`) VALUES
(3, '/adhans/img/sistema/foto1.png\n', 'foto1', '', '', NULL, NULL),
(2, '/adhans/img/sistema/foto2.png\n', 'foto2', '', '', NULL, NULL),
(1, '/adhans/img/sistema/logo.bmp\n', 'logo', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nome` varchar(250) NOT NULL,
  `nome_social` varchar(250) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `crm` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `email`, `nome`, `nome_social`, `data_de_nascimento`, `ativo`, `crm`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'Wilbert dener', 'Wilbert Dener', '2022-12-28', 1, '115222', '/adhans/img/perfil/1.jpg'),
(2, 'user', 'user', 'user', 'user', 'user', NULL, 1, NULL, '/adhans/img/perfil/usuario.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
