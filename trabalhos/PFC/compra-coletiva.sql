-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Set 28, 2011 as 09:41 AM
-- Versão do Servidor: 5.1.49
-- Versão do PHP: 5.3.3-1ubuntu9.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `compra-coletiva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `codigoanuncio` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30000) NOT NULL,
  `valor` int(11) NOT NULL,
  `datainicio` datetime NOT NULL,
  `datafim` datetime NOT NULL,
  `minimovenda` int(11) NOT NULL,
  `valorkm` int(11) NOT NULL,
  `prazoentrega` datetime NOT NULL,
  `imagem` varchar(20) NOT NULL,
  `regras` varchar(200) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoanuncio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`codigoanuncio`, `descricao`, `valor`, `datainicio`, `datafim`, `minimovenda`, `valorkm`, `prazoentrega`, `imagem`, `regras`, `titulo`) VALUES
(1, '10', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 10, '0000-00-00 00:00:00', '', '', ''),
(2, '10', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 10, '0000-00-00 00:00:00', '10 is 10', '', ''),
(4, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '71a446baf8f4571b4cdc', 'regras', 'titulo'),
(5, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '71a446baf8f4571b4cdc', 'regras', 'titulo'),
(6, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '71a446baf8f4571b4cdc', 'regras', 'titulo'),
(7, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 'f439f5b1b3abf5a6a963', 'regras', 'titulo'),
(8, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '771b7a8ad5338856a4df', 'regras', 'titulo'),
(9, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '771b7a8ad5338856a4df', 'regras', 'titulo'),
(10, 'descrever produto', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '1785fd987612246a514e', 'regras', 'titulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `codigocidade` int(10) NOT NULL AUTO_INCREMENT,
  `nomecidade` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigocidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`codigocidade`, `nomecidade`) VALUES
(1, 'Joinville'),
(2, 'Araquari');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `nomefantasia` varchar(50) NOT NULL,
  `razaosocial` varchar(50) NOT NULL,
  `CNPJ` varchar(19) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `codigocidade` int(10) NOT NULL,
  `telefone` int(10) NOT NULL,
  `CEP` int(8) NOT NULL,
  `liberado` char(1) NOT NULL,
  PRIMARY KEY (`CNPJ`),
  KEY `FK_codigocidade` (`codigocidade`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`nomefantasia`, `razaosocial`, `CNPJ`, `endereco`, `codigocidade`, `telefone`, `CEP`, `liberado`) VALUES
('São José Atacadão', 'São José Atacadão', '44.990.901/0001-43', 'Rua das Flores', 0, 2147483647, 89210770, 'n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE IF NOT EXISTS `planos` (
  `codigoplano` int(11) NOT NULL AUTO_INCREMENT,
  `CNPJcliente` varchar(19) NOT NULL,
  `nomeusuario` varchar(50) NOT NULL,
  `nomeanuncio` varchar(500) NOT NULL,
  `nomeplano` varchar(200) NOT NULL,
  PRIMARY KEY (`codigoplano`),
  KEY `fk_CNPJcliente` (`CNPJcliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `planos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigologin` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(18) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `CNPJclientes` varchar(19) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `codigocidade` int(10) NOT NULL,
  `CEP` int(8) NOT NULL,
  PRIMARY KEY (`codigologin`),
  KEY `FK_CNPJclientes` (`CNPJclientes`),
  KEY `FK_codigocidade` (`codigocidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigologin`, `login`, `senha`, `CNPJclientes`, `email`, `endereco`, `codigocidade`, `CEP`) VALUES
(1, 'a', 'a', 'a', 'anakubiack@hotmail.com', 'a', 0, 0),
(2, 'l', 'l', 'l', 'l', 'l', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `codigovendas` int(11) NOT NULL AUTO_INCREMENT,
  `datahora` datetime NOT NULL,
  `codigoanuncio` int(11) NOT NULL,
  `login` varchar(18) NOT NULL,
  `endereco` varchar(400) NOT NULL,
  `CEP` int(11) NOT NULL,
  `cidade` int(11) NOT NULL,
  `valorintrega` int(11) NOT NULL,
  PRIMARY KEY (`codigovendas`),
  KEY `fk_codigologin` (`login`),
  KEY `fk_codigocidade` (`cidade`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `vendas`
--

