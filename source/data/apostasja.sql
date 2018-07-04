-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Jul-2018 às 00:05
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apostasja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

CREATE TABLE `campeonatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id`, `nome`) VALUES
(1, 'Copa do Mundo 2018'),
(2, 'Copa do Brasil 2018'),
(3, 'Campeonato Brasileiro 2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `data` datetime NOT NULL,
  `id_campeonato` int(11) NOT NULL,
  `id_time_casa` int(11) NOT NULL,
  `id_time_visitante` int(11) NOT NULL,
  `local` varchar(255) NOT NULL,
  `valor` float NOT NULL,
  `resultado_casa` int(11) NOT NULL,
  `resultado_visitante` int(11) NOT NULL,
  `popular` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `status`, `data`, `id_campeonato`, `id_time_casa`, `id_time_visitante`, `local`, `valor`, `resultado_casa`, `resultado_visitante`, `popular`) VALUES
(1, 'sem_resultado', '2018-07-04 18:00:00', 1, 1, 2, 'Goiânia Brasil', 10, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE `times` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id`, `nome`, `logo`) VALUES
(1, 'Brasil', 'bandeira_brasil.PNG'),
(2, 'Alemanha', 'bandeira_alemanha.jpg'),
(3, 'Costa Rica', 'bandeira_costa_rica.png'),
(4, 'Sérvia', 'bandeira_servia.png'),
(5, 'Suécia', 'bandeira_suecia.png'),
(6, 'França', 'bandeira_franca.jpg'),
(7, 'Uruguai', 'bandeira_uruguai.png'),
(8, 'Argentina', 'bandeira_argentina.jpg'),
(9, 'Suíça', 'bandeira_suica.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campeonatos`
--
ALTER TABLE `campeonatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
