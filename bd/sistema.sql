-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jan-2020 às 19:28
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nrofa` varchar(100) NOT NULL,
  `consumidor` varchar(100) NOT NULL,
  `fornecedor` varchar(150) NOT NULL,
  `relator` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `valor_2` float(10,2) NOT NULL,
  `data1` date NOT NULL,
  `ano` int(11) NOT NULL,
  `recurso` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `id_usuario`, `nrofa`, `consumidor`, `fornecedor`, `relator`, `valor`, `valor_2`, `data`, `ano`, `recurso`, `total`) VALUES
(238, 7, '1', '1', '1', 'Demetrius', '50.00', 4.00, '2020-03-01', 2020, 'Tempestivo', 0),
(240, 7, '1', '1', '1', 'Demetrius', '1.00', 1.00, '2020-04-01', 2018, 'Tempestivo', 0),
(241, 7, '1', 'joao', 'tim', 'Filipe', '1.00', 1.00, '2020-03-01', 2018, 'Intempestivo', 0),
(242, 7, '1', '1', '2', 'Demetrius', '1.00', 0.00, '2020-05-01', 2018, 'Tempestivo', 0),
(243, 7, '1', 'joao', 'tim', 'Demetrius', '1.00', 0.00, '2020-05-01', 2018, 'Intempestivo', 0),
(245, 7, '1', '1', '122222222222222', 'Cyro', '1.00', 1.00, '2020-07-01', 2018, 'Tempestivo', 0),
(246, 7, '1', '1', '1', 'Cyro', '1.00', 2.00, '2020-08-01', 2018, 'Tempestivo', 0),
(248, 7, '1', '1', '1', 'Demetrius', '1.00', 1.00, '2020-10-01', 2020, 'Tempestivo', 0),
(249, 7, '2', '1', '1', 'Cyro', '1.00', 1.00, '2020-10-01', 2018, 'Tempestivo', 0),
(250, 7, '1', '1', 'oi', 'Demetrius', '1.00', 1.00, '2020-11-01', 2020, 'Intempestivo', 0),
(251, 7, '2521212121212', 'joao', 'tim', 'Cyro', '236565.25', 100000000.00, '2020-12-01', 2020, 'Tempestivo', 0),
(252, 7, '1', '1', '1', 'Cyro', '1.00', 1.00, '2020-12-01', 2020, 'Tempestivo', 0),
(253, 7, '1', 'joao', '1', 'Filipe', '1.00', 1.00, '2020-11-01', 2020, 'Tempestivo', 0),
(254, 7, '1', 'joao', 'tim', 'Cyro', '1.00', 1.00, '2020-09-01', 2020, 'Tempestivo', 0),
(255, 7, '1', '1', '1', 'Cyro', '1.00', 1.00, '2020-06-01', 52020, 'Tempestivo', 0),
(258, 7, '1', 'joao', 'tim', 'Demetrius', '1.00', 120.50, '2020-01-01', 2000, 'Intempestivo', 0),
(259, 7, '1', '1', 'tim', 'Demetrius', '1.20', 1200.00, '2020-01-01', 2020, 'Tempestivo', 0),
(261, 7, '1', '1', 'tim', 'Demetrius', '111.00', 111.11, '2020-01-10', 2018, 'Tempestivo', 0),
(262, 7, '1', 'joao', 'tim', 'Demetrius', '1.20', 11200.00, '2020-11-11', 2018, 'Tempestivo', 0),
(264, 7, '1', 'joao', 'tim', 'Demetrius', '200.00', 200.00, '2020-01-01', 2018, 'Tempestivo', 0),
(267, 7, '1', '1', 'tim', 'Demetrius', '300.00', 300.00, '2020-01-01', 2018, 'Tempestivo', 0),
(269, 7, '1', 'joao', 'tim', 'Demetrius', '100.00', 100.00, '2020-01-01', 2018, 'Tempestivo', 0),
(270, 7, '1', '1', 'tim', 'Demetrius', '111.00', 111.11, '2020-01-01', 2018, 'Tempestivo', 0),
(274, 7, '1', 'joao', 'tim', 'Demetrius', '2.00', 22.00, '2020-01-01', 2020, 'Tempestivo', 0),
(276, 7, '', '', '', '', '', 0.00, '0000-00-00', 0, '', 0),
(277, 7, '1', '1', '1', 'Demetrius', '1', 1.00, '2020-01-01', 200, 'Tempestivo', 0),
(278, 7, '', '', '', '', '', 0.00, '0000-00-00', 0, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores2`
--

CREATE TABLE `fornecedores2` (
  `id_fornecedor2` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nrofa2` int(11) NOT NULL,
  `consumidor2` varchar(100) NOT NULL,
  `fornecedor2` varchar(100) NOT NULL,
  `relator2` varchar(100) NOT NULL,
  `valor2` decimal(50,0) NOT NULL,
  `valor_seg` decimal(10,2) NOT NULL,
  `data2` date NOT NULL,
  `ano2` int(11) NOT NULL,
  `recurso2` varchar(100) NOT NULL,
  `total2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores2`
--

INSERT INTO `fornecedores2` (`id_fornecedor2`, `id_usuario`, `nrofa2`, `consumidor2`, `fornecedor2`, `relator2`, `valor2`, `valor_seg`, `data2`, `ano2`, `recurso2`, `total2`) VALUES
(12, 7, 1, '1', '1', 'Demetrius', '1', '0.00', '2020-03-01', 2020, 'Tempestivo', 0),
(14, 7, 2147483647, 'maria', 'oi', 'SÃ©rgio', '9882', '0.00', '2020-01-21', 2000, 'Intempestivo', 0),
(15, 7, 1, '1', '1', 'Demetrius', '250', '0.00', '2020-04-01', 2020, 'Tempestivo', 0),
(16, 7, 1, '1', '1', 'Kaio', '1', '1.00', '2020-01-01', 2028, 'Tempestivo', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatores`
--

CREATE TABLE `relatores` (
  `id_relator` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dataCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `email`, `senha`, `dataCaptura`) VALUES
(7, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2018-05-17'),
(10, 'RogÃ©rio  de SÃ¡', 'RogÃ©rio', 'rogeriodesaf@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-12-26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `fornecedores2`
--
ALTER TABLE `fornecedores2`
  ADD PRIMARY KEY (`id_fornecedor2`);

--
-- Índices para tabela `relatores`
--
ALTER TABLE `relatores`
  ADD PRIMARY KEY (`id_relator`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT de tabela `fornecedores2`
--
ALTER TABLE `fornecedores2`
  MODIFY `id_fornecedor2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `relatores`
--
ALTER TABLE `relatores`
  MODIFY `id_relator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
