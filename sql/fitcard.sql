-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Out-2018 às 04:37
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitcard`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` tinyint(4) NOT NULL,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(5, 'Borracharia', 'Borracharia'),
(6, 'Oficina', 'Oficina'),
(7, 'Posto', 'Posto'),
(8, 'Restaurante', 'Restaurante'),
(9, 'Supermercado', 'Supermercado'),
(10, 'Ativo', 'Ativo'),
(11, 'Inativo', 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `cnpj` varchar(14) COLLATE utf8_bin NOT NULL,
  `razao_social` varchar(255) COLLATE utf8_bin NOT NULL,
  `nome_fantasia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_uf` tinyint(4) DEFAULT NULL,
  `telefone` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `id_categoria` tinyint(4) DEFAULT NULL,
  `id_situacao` tinyint(4) DEFAULT NULL,
  `agencia` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `conta` varchar(6) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` tinyint(4) NOT NULL,
  `nome` varchar(20) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `nome`, `descricao`) VALUES
(1, 'Ativo', 'Ativo'),
(2, 'Inativo', 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `id` tinyint(4) NOT NULL,
  `sigla` varchar(2) COLLATE utf8_bin NOT NULL,
  `nome` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`id`, `sigla`, `nome`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'ES', 'Espírito Santo'),
(8, 'GO', 'Goiás'),
(9, 'MA', 'Maranhão'),
(10, 'MT', 'Mato Grosso'),
(11, 'MS', 'Mato Grosso do Sul'),
(12, 'MG', 'Minas Gerais'),
(13, 'PA', 'Pará'),
(14, 'PB', 'Paraíba'),
(15, 'PR', 'Paraná'),
(16, 'PE', 'Pernambuco'),
(17, 'PI', 'Piauí'),
(18, 'RJ', 'Rio de Janeiro'),
(19, 'RN', 'Rio Grande do Norte'),
(20, 'RS', 'Rio Grande do Sul'),
(21, 'RO', 'Rondônia'),
(22, 'RR', 'Roraima'),
(23, 'SC', 'Santa Catarina'),
(24, 'SP', 'São Paulo'),
(25, 'SE', 'Sergipe'),
(26, 'TO', 'Tocantins');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`cnpj`),
  ADD KEY `fk_estabelecimento_id_uf` (`id_uf`),
  ADD KEY `fk_estabelecimento_id_categoria` (`id_categoria`),
  ADD KEY `fk_estabelecimento_id_situacao` (`id_situacao`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uf`
--
ALTER TABLE `uf`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD CONSTRAINT `fk_estabelecimento_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fk_estabelecimento_id_situacao` FOREIGN KEY (`id_situacao`) REFERENCES `situacao` (`id`),
  ADD CONSTRAINT `fk_estabelecimento_id_uf` FOREIGN KEY (`id_uf`) REFERENCES `uf` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
