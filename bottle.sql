-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Jul-2022 às 19:50
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bottle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` text COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `endereco`, `telefone`, `email`) VALUES
(1, 'MacMahone', 'Matola, R. 201', '2435345345', 'mc@cerveja.com'),
(2, 'Mutxopi COmpany', 'Chamanculo B', '870423323', ''),
(3, 'Heineken ', 'Alemanha, Bayern', '234567234', 'heinken@cerveja.com'),
(4, 'Heineken ', 'Alemanha, bayern', '3456789', 'heinken@cerveja.com'),
(5, '', '', '', ''),
(6, 'Heineken ', 'Alemanha, Bayern', '34567890', 'heinken@cerveja.com'),
(7, 'Heineken ', 'Alemanha, Bayern', '34567890', 'heinken@cerveja.com'),
(8, 'Jose Alberto', 'Maputo, Alto-Mae', '09876579', 'ja@cerveja.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecimento`
--

DROP TABLE IF EXISTS `fornecimento`;
CREATE TABLE IF NOT EXISTS `fornecimento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` int NOT NULL,
  `data_entrada` date NOT NULL,
  `fornecedor` int NOT NULL,
  `produto` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor` (`fornecedor`),
  KEY `produto` (`produto`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fornecimento`
--

INSERT INTO `fornecimento` (`id`, `quantidade`, `data_entrada`, `fornecedor`, `produto`) VALUES
(1, 20, '2022-07-01', 1, 1),
(7, 100, '2022-07-14', 0, 0),
(3, 55, '2021-05-02', 2, 3),
(8, 100, '2022-07-14', 7, 8),
(9, 200, '2022-06-09', 8, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

DROP TABLE IF EXISTS `gestor`;
CREATE TABLE IF NOT EXISTS `gestor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `username`, `senha`) VALUES
(1, 'Alessandro Mahumane', 'AlexMH', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `preco` float NOT NULL,
  `categoria` enum('VINHO','GIN','LIQUOR','VODKA','CERVEJA','REFRIGERANTE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `categoria`) VALUES
(1, '2M', 50, 'CERVEJA'),
(4, 'Txilar', 45, 'CERVEJA'),
(3, 'McGregory', 101, 'GIN'),
(7, 'Txilar', 45, 'CERVEJA'),
(8, 'Txilar', 45, 'CERVEJA'),
(9, 'Laurentina Preta', 560, 'CERVEJA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
