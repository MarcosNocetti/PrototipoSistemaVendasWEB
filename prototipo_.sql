-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 08:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototipo_`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.empresa`
--

CREATE TABLE `tb_admin.empresa` (
  `nome` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `pais` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `social_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.social`
--

CREATE TABLE `tb_admin.social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `fbid` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `fbid`, `nome`, `email`, `tel`, `pass`, `avatar`, `estado`, `cidade`, `bairro`) VALUES
(1, 0, 'tupi', 'g@g.com', 989665147, '25d55ad283aa400af464c76d713c07ad', '', 'sp', 'sp', 'sp'),
(2, 0, 'Guilherme Tupinambá Durães', 'guilherme.tupinamba@gmail.com', 0, '25d55ad283aa400af464c76d713c07ad', 'default_user.png', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anuncios.fotos`
--

CREATE TABLE `tb_anuncios.fotos` (
  `id` int(11) NOT NULL,
  `anuncio_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anuncios.fotos`
--

INSERT INTO `tb_anuncios.fotos` (`id`, `anuncio_id`, `foto`) VALUES
(1, 7, 'iD7_30-05-20_3509.jpg'),
(2, 8, 'iD8_30-05-20_1782.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.anuncios`
--

CREATE TABLE `tb_site.anuncios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `descricao` text NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site.anuncios`
--

INSERT INTO `tb_site.anuncios` (`id`, `user_id`, `titulo`, `preco`, `descricao`, `categoria_id`, `estado`, `cidade`, `bairro`) VALUES
(1, 2, 'Nada', 0, 'fdhsfdsf', 10, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(2, 2, 'Nada', 0, 'oioipnp', 8, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(3, 2, 'Nada', 0, 'wefecqc', 10, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(4, 2, 'Nada', 0, 'sdfkçjaso', 9, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(5, 2, 'Nada', 0, 'gyfkufvhjlb', 6, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(6, 2, 'Nada', 0, 'jkgvk', 5, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(7, 2, 'Nada', 0, '23535ywgst', 9, 'SP', 'Santana de Parnaíba', 'Alphaville'),
(8, 2, 'Nada', 0, 'raegrgs', 8, 'SP', 'Santana de Parnaíba', 'Alphaville');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.categoria`
--

CREATE TABLE `tb_site.categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.fotos`
--

CREATE TABLE `tb_site.fotos` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `pagina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.paginas`
--

CREATE TABLE `tb_site.paginas` (
  `id` int(11) NOT NULL,
  `pagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_site.title`
--

CREATE TABLE `tb_site.title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pagina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anuncios.fotos`
--
ALTER TABLE `tb_anuncios.fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.anuncios`
--
ALTER TABLE `tb_site.anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.categoria`
--
ALTER TABLE `tb_site.categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.fotos`
--
ALTER TABLE `tb_site.fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.paginas`
--
ALTER TABLE `tb_site.paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.title`
--
ALTER TABLE `tb_site.title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anuncios.fotos`
--
ALTER TABLE `tb_anuncios.fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_site.anuncios`
--
ALTER TABLE `tb_site.anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_site.categoria`
--
ALTER TABLE `tb_site.categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_site.fotos`
--
ALTER TABLE `tb_site.fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_site.paginas`
--
ALTER TABLE `tb_site.paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_site.title`
--
ALTER TABLE `tb_site.title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
