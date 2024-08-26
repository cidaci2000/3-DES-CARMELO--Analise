-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/08/2024 às 17:02
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alessandra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(8) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `telefone`, `endereco`, `cidade`, `estado`, `tipo`) VALUES
(15, 'jane', 'adm@gmail.com', '12345678', '45999003009', 'r Araucaria', 'Cascavel', 'RJ', 1),
(9, 'Otavio', 'admin@adm.com', '12345678', '45999003009', 'r Araucaria', 'Cascavel', 'PR', 1),
(3, 'Pedro', 'Pedro@gmail.com', '123456', '45999003009', 'r Araucaria', 'Cascavel', 'MG', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sorvetes`
--

CREATE TABLE `sorvetes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sorvetes`
--

INSERT INTO `sorvetes` (`id`, `nome`, `imagem`, `descricao`, `preco`) VALUES
(10, 'chocolate', 'uploads/66b6e0a359ff3_video.jpg', 'hiuuyguyuy', 11.00),
(11, 'morango', 'uploads/66b6e1f2249bb_images.jpeg', 'hjhjhjh', 22.00),
(12, 'chocolate', 'uploads/66b6e211024db_images (5).jpeg', 'hhkjhjh', 23.00),
(13, 'chocolate', 'uploads/66b6e2e1a4b35_images (5).jpeg', 'hhkjhjh', 23.00),
(14, 'chocolate', 'uploads/66b6e413807b0_images (5).jpeg', 'hhkjhjh', 23.00),
(15, 'chocolate', 'uploads/66b6e41927696_images (5).jpeg', 'hhkjhjh', 23.00),
(16, 'chocolate', 'uploads/66b6e44bf3ea9_images (5).jpeg', 'hhkjhjh', 23.00),
(17, 'chocolate', 'uploads/66b6e49600af0_images (5).jpeg', 'hhkjhjh', 23.00),
(18, 'chocolate', 'uploads/66b6e50231f53_images (5).jpeg', 'hhkjhjh', 23.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Índices de tabela `sorvetes`
--
ALTER TABLE `sorvetes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `sorvetes`
--
ALTER TABLE `sorvetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
