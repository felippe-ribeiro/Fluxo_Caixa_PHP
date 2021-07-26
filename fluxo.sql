-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 03-Abr-2015 às 01:03
-- Versão do servidor: 5.5.38-35.2
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grupo382_fluxo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_cat`
--

CREATE TABLE IF NOT EXISTS `lc_cat` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_cat`
--

INSERT INTO `lc_cat` (`id`, `nome`) VALUES
(16, 'Thaluany');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_contas`
--

CREATE TABLE IF NOT EXISTS `lc_contas` (
  `id` int(11) NOT NULL,
  `de_para` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8,
  `tipo` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `conta_mensal` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `pago` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_movimento`
--

CREATE TABLE IF NOT EXISTS `lc_movimento` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  `descricao` longtext,
  `valor` float DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_movimento`
--

INSERT INTO `lc_movimento` (`id`, `tipo`, `dia`, `mes`, `ano`, `cat`, `descricao`, `valor`) VALUES
(79, 0, 10, 3, 2015, 16, 'testando descrição', 500),
(80, 1, 4, 6, 2014, 16, 'divida', 1000),
(81, 1, 11, 3, 2015, 16, 'salario', 2100),
(82, 0, 11, 3, 2015, 16, 'gasto', 100),
(83, 0, 11, 3, 2015, 16, 'gassto', 90),
(84, 0, 11, 3, 2015, 16, 'teste', 60),
(85, 1, 11, 3, 2015, 16, 'comissão', 440);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_usuarios`
--

CREATE TABLE IF NOT EXISTS `lc_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_usuarios`
--

INSERT INTO `lc_usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(31, 'Admin', 'admin@admin.com', 'MTIzNDU2', 'administrador'),
(32, 'Roger Costa', 'rmcc.roger@gmail.com', 'dGhhcm9nZXIwMDIyNTU=', 'administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lc_cat`
--
ALTER TABLE `lc_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_contas`
--
ALTER TABLE `lc_contas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_movimento`
--
ALTER TABLE `lc_movimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_usuarios`
--
ALTER TABLE `lc_usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lc_cat`
--
ALTER TABLE `lc_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lc_contas`
--
ALTER TABLE `lc_contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `lc_movimento`
--
ALTER TABLE `lc_movimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `lc_usuarios`
--
ALTER TABLE `lc_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
