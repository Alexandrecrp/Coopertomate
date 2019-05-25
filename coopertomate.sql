-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Maio-2019 às 16:13
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coopertomate`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `calibre`
--

CREATE TABLE `calibre` (
  `id` int(11) NOT NULL,
  `calibre` decimal(4,2) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `calibre`
--

INSERT INTO `calibre` (`id`, `calibre`, `status`) VALUES
(1, '4.00', NULL),
(2, '5.00', NULL),
(3, '6.00', NULL),
(4, '6.50', NULL),
(5, '7.00', NULL),
(6, '8.00', NULL),
(7, '9.00', NULL),
(8, '10.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(7) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `status`) VALUES
(1, 'Extra', NULL),
(2, 'Cat I', NULL),
(3, 'Cat II', NULL),
(4, 'Cat III', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(100) NOT NULL,
  `idusuariocadastro` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `cnpj` bigint(14) UNSIGNED ZEROFILL NOT NULL,
  `ie` int(8) UNSIGNED ZEROFILL NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(5) UNSIGNED ZEROFILL NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cep` int(8) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `idusuariocadastro`, `cliente`, `cnpj`, `ie`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `cep`, `email`, `telefone`, `latitude`, `longitude`, `status`) VALUES
(1, 11, 'Ale', 22222222222222, 22222222, 'TABOCA MA 006 SN', 00301, 'Goiás', 'Supermercado', 'Tasso Fragoso', 'Goiás', 65820000, 'donalu@gmail.com', 34991788477, '-18.64600000', '-48.19380000', NULL),
(2, 11, 'Alan', 33333333333333, 33333333, 'Mato grosso', 33333, 'Centro', 'Avenida', 'Araguari', 'Minas Gerais', 33333333, 'alansc092@gmail.com', 03492312525, '-18.64610000', '-48.19381000', NULL),
(3, 11, 'Dona lu', 55555555555555, 55555555, 'Rodovia 5', 01560, 'Santa Terezinha', 'Avenida', 'Araguari', 'Minas Gerais', 00001234, 'alansc092@gmail.com', 03492312525, '-18.64600000', '-48.19380000', NULL),
(4, 11, 'Ale2', 22222222222221, 00001234, 'Rodovia 5', 01560, 'Santa Terezinha', 'Avenida', 'Araguari', 'Minas Gerais', 00001234, 'alansc092@gmail.com', 03492312525, '-18.64600000', '-48.19380000', NULL),
(6, 11, 'Maycon cliente', 22222222222224, 22222222, 'Rua dos Portadores', 01560, 'Santa Terezinha', 'Avenida', 'Araguari', 'Minas Gerais', 38443020, 'alansc092@gmail.com', 03492312525, '-18.64600000', '-48.19380000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id` int(11) NOT NULL,
  `cores` varchar(8) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `cores`, `status`) VALUES
(1, 'Verde', 0),
(2, 'Salada', 0),
(3, 'Colorido', 0),
(4, 'Vermelho', 0),
(5, 'Molho', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fazenda`
--

CREATE TABLE `fazenda` (
  `id` int(100) NOT NULL,
  `idusuariocadastro` int(11) NOT NULL,
  `produtor` int(11) NOT NULL,
  `fazenda` varchar(100) NOT NULL,
  `ie` int(8) UNSIGNED ZEROFILL NOT NULL,
  `cnpj` bigint(14) UNSIGNED ZEROFILL NOT NULL,
  `cgc` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `ccir` bigint(14) UNSIGNED ZEROFILL NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cep` int(8) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fazenda`
--

INSERT INTO `fazenda` (`id`, `idusuariocadastro`, `produtor`, `fazenda`, `ie`, `cnpj`, `cgc`, `endereco`, `cidade`, `ccir`, `estado`, `cep`, `email`, `telefone`, `latitude`, `longitude`, `status`) VALUES
(13, 11, 4, 'Feedback', 01234567, 01450499000100, 'MG1234567', 'Rua Floriano Peixoto 1561', 'Araguari', 01234567891234, 'Minas Gerais', 00000123, 'alexandrecrpfeedback@gmail.com', 34991788477, '-18.64600000', '-48.19380000', NULL),
(14, 11, 5, 'Mataboi', 01234567, 01450499000101, 'MG1234568', 'Rua dos Portadores 31', 'Araguari', 01234567891235, 'Minas Gerais', 00001234, 'alansc092@gmail.com', 03492312525, '-18.46100000', '-48.45600000', NULL),
(15, 11, 6, 'Fazenda Dona lu', 55555555, 55555555555555, 'MG5555555', 'Rodovia 5', 'Araguari', 01234567891234, 'Minas Gerais', 00001234, 'alansc092@gmail.com', 03492312525, '-18.64600000', '-48.45600000', NULL),
(19, 11, 4, 'Feedback', 01234561, 14504990001077, 'MG1234567', 'Rua Floriano Peixoto', 'Araguari', 01234567891234, 'Minas Gerais', 00000123, 'donalu@gmail.com', 34991788477, '-18.64600000', '-48.19380000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `grupo` varchar(7) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `grupo`, `status`) VALUES
(1, 'Oblongo', 0),
(2, 'Redondo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `idusuariocadastro` int(11) NOT NULL,
  `lote` varchar(100) NOT NULL,
  `cod_fazenda` int(11) NOT NULL,
  `cod_grupo` int(11) NOT NULL,
  `cod_cores` int(11) NOT NULL,
  `cod_calibre` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `qtdinicial` decimal(20,2) NOT NULL,
  `qtdvendida` decimal(20,2) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `idusuariocadastro`, `lote`, `cod_fazenda`, `cod_grupo`, `cod_cores`, `cod_calibre`, `cod_categoria`, `qtdinicial`, `qtdvendida`, `status`) VALUES
(3, 11, 'L-1232', 13, 0, 0, 0, 0, '2000.10', '123.10', NULL),
(4, 11, 'L-1234', 14, 0, 0, 0, 0, '1000.12', '1234.12', NULL),
(5, 11, 'L-1234lu', 15, 0, 0, 0, 0, '200.12', '2.12', NULL),
(6, 11, 'L-1235', 15, 2, 0, 0, 0, '200.12', '2.12', NULL),
(7, 11, 'L-1236', 15, 1, 2, 0, 0, '1000.12', '1234.12', NULL),
(8, 11, 'L-1237', 15, 2, 1, 1, 0, '200.12', '1234.12', NULL),
(9, 11, 'L-1238', 15, 2, 1, 2, 1, '200.12', '123.12', NULL),
(10, 11, 'L-12359', 15, 1, 3, 2, 2, '200.12', '1234.12', NULL),
(11, 11, 'L-12313', 14, 1, 1, 2, 1, '200.12', '123.10', NULL),
(12, 11, 'L-12311', 13, 2, 2, 1, 1, '3.00', '32.00', NULL),
(13, 11, 'L-1234lu1231', 13, 1, 1, 3, 1, '200.12', '32.00', NULL),
(14, 11, 'L-12341234125', 13, 2, 1, 2, 2, '201.13', '32.00', NULL),
(15, 11, 'L-12311velho', 13, 1, 2, 2, 2, '3.00', '123.12', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotevenda`
--

CREATE TABLE `lotevenda` (
  `id` int(11) NOT NULL,
  `idusuariocadastro` int(11) NOT NULL,
  `venda` varchar(10) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `valornegociado` decimal(20,8) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lotevenda`
--

INSERT INTO `lotevenda` (`id`, `idusuariocadastro`, `venda`, `cod_cliente`, `valornegociado`, `status`) VALUES
(1, 11, 'V-123', 1, '2000.45000000', NULL),
(2, 11, 'V-1234', 2, '3000.45000000', NULL),
(3, 11, 'V-1234lu', 3, '2000.45000000', NULL),
(13, 11, 'V-1234666', 1, '3000.45000000', NULL),
(22, 11, 'V-123555', 2, '2000.45000000', NULL),
(23, 11, 'V-12345', 1, '2000.45000000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotevendido`
--

CREATE TABLE `lotevendido` (
  `id` int(11) NOT NULL,
  `cod_venda` varchar(11) NOT NULL,
  `cod_lote` int(11) NOT NULL,
  `qtdvendido` float(20,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lotevendido`
--

INSERT INTO `lotevendido` (`id`, `cod_venda`, `cod_lote`, `qtdvendido`) VALUES
(3, '22', 3, 20.54000854),
(4, '22', 4, 10.53999996),
(5, '23', 3, 11.53999996),
(6, '23', 6, 12.53999996);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtor`
--

CREATE TABLE `produtor` (
  `id` int(11) NOT NULL,
  `idusuariocadastro` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cidade` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cep` int(8) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtor`
--

INSERT INTO `produtor` (`id`, `idusuariocadastro`, `nome`, `cpf`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `cep`, `email`, `telefone`, `status`) VALUES
(4, 11, 'Alexandre C. Rodrigues', 09018861650, 'Rua Floriano Peixoto', 1560, 'Santa Terezinha', 'Casa', 'Araguari', 'Minas Gerais', 38443020, 'alexandrecrpfeedback@gmail.com', 34991788477, NULL),
(5, 11, 'Alan Cardoso', 06215537608, 'Rua dos Portadores', 30, 'Goias', 'Casa', 'Araguari', 'Minas Gerais', 38443020, 'alansc092@gmail.com', 34992312525, NULL),
(6, 11, 'Luciana Rodrigues', 09018861651, 'Rua Floriano Peixoto', 1560, 'Santa Terezinha', 'Casa', 'Araguari', 'Minas Gerais', 00000123, 'donalu@gmail.com', 34991788477, NULL),
(7, 11, 'Luciana Rodrigues Pereira', 44444444444, 'Rua Floriano Peixoto', 2000, 'Santa Terezinha', 'Avenida', 'Araguari', 'Minas Gerais', 00000123, 'donalu@gmail.com', 34991788477, NULL),
(8, 11, 'Alexandre Cristóvão Rodrigues Pereira', 12345678910, 'Rua Floriano Peixoto 1560', 1561, 'Santa Terezinha', 'Avenida', 'Araguari', 'Minas Gerais', 00000123, 'alexandrecrpfeedback@gmail.com', 34991788477, NULL),
(9, 11, 'Maycon Leles', 00018861652, 'TABOCA MA 006 SN', 1560, 'Santa Terezinha', 'Avenida', 'Tasso Fragoso', 'Maranhão', 38443020, 'alansc092@gmail.com', 3492312525, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `idusuariocadastro` int(11) NOT NULL,
  `cpf` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `idusuariocadastro`, `cpf`, `nome`, `email`, `senha`, `status`) VALUES
(11, 11, 09018861650, 'Alexandre', 'alexandrecrp202@gmail.com', 'alan100', NULL),
(14, 11, 11111111111, 'maycon', 'alexandrecrpfeedback@gmail.com', '123', NULL),
(16, 11, 06215537608, 'Alan Cardoso', 'alexandrecrpfeedback@gmail.com', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calibre`
--
ALTER TABLE `calibre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fazenda`
--
ALTER TABLE `fazenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotevenda`
--
ALTER TABLE `lotevenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotevendido`
--
ALTER TABLE `lotevendido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtor`
--
ALTER TABLE `produtor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calibre`
--
ALTER TABLE `calibre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fazenda`
--
ALTER TABLE `fazenda`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lote`
--
ALTER TABLE `lote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lotevenda`
--
ALTER TABLE `lotevenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lotevendido`
--
ALTER TABLE `lotevendido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produtor`
--
ALTER TABLE `produtor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
