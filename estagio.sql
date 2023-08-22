-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2023 às 19:32
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `componentes`
--

CREATE TABLE `componentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `eq_tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `componentes`
--

INSERT INTO `componentes` (`id`, `nome`, `eq_tag`) VALUES
(1, 'Reservatório de água ', 'RGEMTF002'),
(4, 'Válvula para simulação de cavitação', 'RGEMTF002'),
(6, 'Bomba centrífuga', 'RGEMTF002'),
(17, 'Válvula', 'RGEMMNT001'),
(18, 'Válvula', 'RGEMMNT001'),
(19, 'Reservatório de água ', 'RGEMTF001'),
(20, 'Reservatório de água ', 'RGEMMNT001');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `tag` varchar(255) NOT NULL,
  `equipamento` varchar(255) NOT NULL,
  `ativo` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`tag`, `equipamento`, `ativo`, `fabricante`) VALUES
('RGEMMNT001', 'Motogerador diesel', '44485', 'Toyama'),
('RGEMMNT002', 'aquecedor de água tipo banho maria', '42629', 'Kacil'),
('RGEMMNT003', 'balança eletrônica de precisão', '46717', 'AAKER'),
('RGEMTF001', 'Experimento de Reynolds', '041419', 'Eco Educacional Equipamentos Didáticos'),
('RGEMTF002', 'Experimento de bombas centrífugas', '041421', 'Eco Educacional Equipamentos didáticos'),
('RGEMTF003', 'Equipamento de perda de carga em acessórios hidráulicos', '041420', 'Eco Educacional Equipamentos Didáticos'),
('RGEMTF004', 'Determinação do perfil de velocidade do escoamento do ar', '42237', 'Otam ventiladores'),
('RGEMTF005', 'Experimento de túnel de convecção forçada', '041422', 'Eco Educacional Equipamentos didáticos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `cargo`) VALUES
(16, 'Administrador', 25, 'Administrador'),
(17, 'Fulano de Tal', 8000, 'Técnico'),
(18, 'Fulana de Tal', 0, 'Técnico'),
(19, 'Marina', 8000, 'Técnico'),
(20, 'Gisele', 0, 'Técnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `funcionario` varchar(255) NOT NULL,
  `componente` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `frequencia` varchar(255) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `manutencao`
--

INSERT INTO `manutencao` (`id`, `tag`, `funcionario`, `componente`, `descricao`, `frequencia`, `data`) VALUES
(14, 'RGEMTF002', 'Fulana de Tal', '6', 'Limpeza', 'Diária', '2023-06-26'),
(15, 'RGEMTF002', 'Administrador', '1', 'Limpeza do reservatório', 'Semanal', '2023-06-28'),
(16, 'RGEMTF002', 'Administrador', '1', 'Troca de peças', 'Mensal', '2023-07-21'),
(17, 'RGEMTF002', 'Marina', '6', 'Troca de peças', 'Semestral', '2023-12-22'),
(18, 'RGEMTF002', 'Gisele', '1', 'Troca de peças', 'Diária', '2023-06-26');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eqtag_fk` (`eq_tag`);

--
-- Índices para tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`tag`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `eqtag_fk` FOREIGN KEY (`eq_tag`) REFERENCES `equipamentos` (`tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
