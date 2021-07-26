-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 26-Jul-2021 às 14:58
-- Versão do servidor: 8.0.25-0ubuntu0.20.04.1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `caixa_cef`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_cat`
--

CREATE TABLE `lc_cat` (
  `id` int NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `Tipo` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_cat`
--

INSERT INTO `lc_cat` (`id`, `nome`, `Tipo`) VALUES
(17, 'Recebimento Fundo Fixo', 'Receita'),
(18, 'Estorno Compras', 'Receita'),
(19, 'Saque Compras', 'Despesa'),
(21, 'Reembolso Transporte', 'Despesa'),
(22, 'Saque Serviços', ''),
(23, 'Estorno Serviços', ''),
(24, 'Reembolso Diversos', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_centro_custo`
--

CREATE TABLE `lc_centro_custo` (
  `id` int NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `centro_custo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_centro_custo`
--

INSERT INTO `lc_centro_custo` (`id`, `descricao`, `centro_custo`) VALUES
(1, 'ABC', 4194),
(2, 'DEF', 3111);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_contas`
--

CREATE TABLE `lc_contas` (
  `id` int NOT NULL,
  `de_para` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dia` int DEFAULT NULL,
  `mes` int DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `observacoes` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `tipo` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `conta_mensal` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `pago` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_contas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_itens`
--

CREATE TABLE `lc_itens` (
  `id` int NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(5000) NOT NULL,
  `cod_mv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_itens`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_movimento`
--

CREATE TABLE `lc_movimento` (
  `id` int NOT NULL,
  `tipo` int DEFAULT NULL,
  `dia` int DEFAULT NULL,
  `mes` int DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `cat` int DEFAULT NULL,
  `descricao` longtext,
  `valor` float DEFAULT NULL,
  `responsavel` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_movimento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_pedido`
--

CREATE TABLE `lc_pedido` (
  `id` int NOT NULL,
  `justificativa` varchar(5000) NOT NULL,
  `itens_id` int NOT NULL,
  `centro_custo_id` int NOT NULL,
  `pessoa` varchar(100) NOT NULL,
  `dia` int NOT NULL,
  `mes` int NOT NULL,
  `ano` int NOT NULL,
  `quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_pedido`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_usuarios`
--

CREATE TABLE `lc_usuarios` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_usuarios`
--
//Senha Padrão -- Mudar
INSERT INTO `lc_usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(31, 'Super Admin', 'superadmin@email.com', 'bXVkYXI=', 'supadm'),
(44, 'Gestor do Sistema', 'gestor@email.com', 'bXVkYXI=', 'gestor'),
(45, 'Administrador', 'administrador@email.com', 'bXVkYXI==', 'administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lc_cat`
--
ALTER TABLE `lc_cat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lc_centro_custo`
--
ALTER TABLE `lc_centro_custo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lc_contas`
--
ALTER TABLE `lc_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lc_itens`
--
ALTER TABLE `lc_itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lc_movimento`
--
ALTER TABLE `lc_movimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lc_pedido`
--
ALTER TABLE `lc_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itens_id_fk` (`itens_id`),
  ADD KEY `centro_custo_id_fk` (`centro_custo_id`);

--
-- Índices para tabela `lc_usuarios`
--
ALTER TABLE `lc_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lc_cat`
--
ALTER TABLE `lc_cat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `lc_centro_custo`
--
ALTER TABLE `lc_centro_custo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `lc_contas`
--
ALTER TABLE `lc_contas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `lc_itens`
--
ALTER TABLE `lc_itens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lc_movimento`
--
ALTER TABLE `lc_movimento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT de tabela `lc_pedido`
--
ALTER TABLE `lc_pedido`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `lc_usuarios`
--
ALTER TABLE `lc_usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lc_pedido`
--
ALTER TABLE `lc_pedido`
  ADD CONSTRAINT `centro_custo_id_fk` FOREIGN KEY (`centro_custo_id`) REFERENCES `lc_centro_custo` (`id`),
  ADD CONSTRAINT `item_id_fk` FOREIGN KEY (`itens_id`) REFERENCES `lc_itens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
