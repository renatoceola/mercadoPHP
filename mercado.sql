-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Out-2020 às 20:22
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mercado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `numero` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `confirmado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`numero`, `total`, `confirmado`) VALUES
(1, '0', 1),
(2, '0', 1),
(3, '0', 1),
(4, '0', 1),
(5, '0', 1),
(6, '0', 1),
(7, '0', 1),
(8, '0', 1),
(9, '0', 1),
(10, '0', 1),
(11, '0', 1),
(12, '0', 1),
(13, '0', 1),
(14, '0', 1),
(15, '0', 1),
(16, '0', 1),
(17, '0', 1),
(18, '0', 1),
(19, '0', 1),
(20, '0', 1),
(21, '0', 1),
(22, '0', 1),
(23, '0', 1),
(24, '0', 1),
(25, '202', 1),
(26, '0', 1),
(27, '0', 1),
(28, '0', 1),
(29, '0', 1),
(30, '0', 1),
(31, '10', 1),
(32, '31', 1),
(33, '10', 1),
(34, '10', 1),
(35, '21', 1),
(36, '20', 1),
(37, '0', 1),
(38, '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `documento` int(11) NOT NULL,
  `produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`documento`, `produto`) VALUES
(25, 1),
(25, 1),
(25, 1),
(25, 1),
(25, 1),
(25, 10),
(25, 11),
(25, 10),
(25, 12),
(31, 1),
(32, 1),
(32, 10),
(33, 1),
(34, 1),
(35, 10),
(36, 1),
(36, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `Codigo` int(11) NOT NULL,
  `Descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Preco` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Codigo`, `Descricao`, `Preco`) VALUES
(1, 'Sabonete', '10'),
(2, 'Energético', '12'),
(3, 'Asas', '1'),
(4, 'teste', '2'),
(5, 'a', '0'),
(6, 'dado', '6'),
(7, '', '0'),
(8, 'a', '1'),
(9, 'barra', '50'),
(10, 'teste21', '21'),
(11, 'maria', '100'),
(12, 'a', '10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`Codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `documento`
--
ALTER TABLE `documento`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
