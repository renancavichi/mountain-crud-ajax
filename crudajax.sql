-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Out-2018 às 22:51
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudajax`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `iduser`, `texto`) VALUES
(3, 1, 'dasdasd a asd as'),
(4, 1, 'sadas asa ds'),
(5, 1, ' fsda fa sdf asdf'),
(6, 1, 'teste2'),
(7, 1, 'Teste 3'),
(8, 1, 'Teste 4'),
(9, 1, 'jhgkjgjk'),
(10, 1, 'O famoso Monte Everest, localizado na cordilheira do Himalaia Mauna Kea, montanha com metros da base (no fundo do Oceano PacÃ­fico) atÃ© o topo O Pico da Neblina, com 2 994 metros, Ã© o ponto mais alto do Brasil Campos do JordÃ£o Ã© a cidade mais alta e montanhosa do Brasil com 1628m de altitude, estÃ¡ localizada no maciÃ§o da Serra da Mantiqueira Montanhas Tatra em Zakopane (PolÃ³nia) Montanha ou monte (do latim montanea, de mons, montis) Ã© uma forma de relevo. Uma sequÃªncia de montanhas denomina-se cordilheira. Uma montanha tem imponÃªncia e altitude superiores a uma colina, embora nÃ£o exista uma altitude especÃ­fica para essa diferenciaÃ§Ã£o.'),
(11, 1, 'Isso Ã© um <b>teste</b>'),
(15, 1, 'OlÃ¡ Mundo'),
(16, 1, '123'),
(17, 2, 'asdasdadd'),
(18, 2, 'Teste'),
(19, 1, '123 teste'),
(20, 2, 'Bla!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `name`, `pass`, `photo`) VALUES
(1, 'renan', 'Renan Cavichi', '779a923d69b2e072747b11975ba86949de167037', 'renancavichi.jpg'),
(2, 'fulano', 'Fulano', 'e98c49038c9bcaf634aee2bf7e3240f978b04dfa', 'fulano.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
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
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
