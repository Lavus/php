-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/11/2011 às 21h40min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `compra-coletiva`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(8, 'Esporte'),
(7, 'Jogos'),
(6, 'Informatica'),
(5, 'Livros'),
(10, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mensagem` varchar(1024) NOT NULL,
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecovenda`
--

CREATE TABLE IF NOT EXISTS `enderecovenda` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `adicionais` varchar(200) NOT NULL,
  `CEP` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `enderecovenda`
--

INSERT INTO `enderecovenda` (`codigo`, `estado`, `cidade`, `bairro`, `rua`, `numero`, `telefone`, `adicionais`, `CEP`) VALUES
(1, 'jhhgj', 'hhhgghj', 'ghjhjg', 'hgjhgjhjg', 12, 122, 'jgjgh', 1221),
(2, 'aa', 'aa', 'aa', 'aa', 0, 0, 'aa', 0),
(3, 'aa', 'aa', 'aa', 'aa', 0, 0, 'aa', 0),
(4, 'jj', 'jj', 'jj', 'jj', 0, 0, 'jjl', 0),
(5, 'das', 'das', 'sad', 'sdaasd', 0, 0, 'das', 0),
(6, 'as', 'das', 'das', 'asd', 0, 0, 'daasd', 0),
(7, 'jbdf', 'f', 'vbb', 'dfbbfdf', 0, 0, 'bdfdbf', 0),
(8, 'p', 'p', 'p', 'p', 1, 1, 'p', 1),
(9, 'm', 'm', 'm', 'm', 0, 0, 'm', 0),
(10, 'aa', 'aa', 'aa', 'aa', 11, 122, 'aa', 1),
(11, 'ijhigyl.gdsg', 'sdfgg', 'dggsddg', 'sgdsggs', 0, 0, 'dsdsggsddsgdgs', 0),
(12, 'as', 'jj', 'jj', 'jj', 11, 122, 'aa', 11),
(13, 'q', 'q', 'q', 'q', 0, 0, 'q', 0),
(14, 'h', 'h', 'h', 'h', 0, 0, 'h', 0),
(15, 'o', 'o', 'o', 'o', 0, 0, 'o', 0),
(16, '', '', '', '', 0, 0, '', 0),
(17, '', '', '', '', 0, 0, '', 0),
(18, '', '', '', '', 0, 0, '', 0),
(19, '', '', '', '', 0, 0, '', 0),
(20, '', '', '', '', 0, 0, '', 0),
(21, '', '', '', '', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formapagamento`
--

CREATE TABLE IF NOT EXISTS `formapagamento` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `formapagamento`
--

INSERT INTO `formapagamento` (`codigo`, `nome`) VALUES
(1, 'Boleto Bancario'),
(2, 'Cartão de Cretito'),
(3, 'PageSeguro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `guardaprodutos`
--

CREATE TABLE IF NOT EXISTS `guardaprodutos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigousuarios` int(11) NOT NULL,
  `codigoprodutos` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_usuarios` (`codigousuarios`),
  KEY `fk_produtos` (`codigoprodutos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `guardaprodutos`
--

INSERT INTO `guardaprodutos` (`codigo`, `codigousuarios`, `codigoprodutos`) VALUES
(34, 0, 44),
(31, 34, 44),
(24, 34, 44),
(30, 34, 44),
(33, 43, 44),
(29, 1, 44),
(35, 0, 44),
(36, 0, 44),
(37, 0, 42),
(38, 0, 44),
(39, 0, 44),
(40, 0, 44),
(41, 0, 44),
(42, 0, 44),
(43, 0, 44),
(44, 0, 44),
(45, 0, 44),
(46, 0, 44),
(47, 0, 44),
(48, 0, 44),
(49, 0, 44),
(50, 49, 44),
(52, 48, 44),
(53, 48, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `listad`
--

CREATE TABLE IF NOT EXISTS `listad` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoproduto` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fkprodutos` (`codigoproduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `listad`
--

INSERT INTO `listad` (`codigo`, `codigoproduto`) VALUES
(17, 0),
(16, 0),
(15, 0),
(14, 27),
(18, 0),
(19, 0),
(20, 0),
(25, 38),
(22, 39),
(23, 40),
(24, 41),
(26, 42),
(27, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `valor` float NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `categorias` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `FKcategoria` (`categorias`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `titulo`, `descricao`, `valor`, `imagem`, `categorias`, `position`) VALUES
(42, 'titulo', 'descrever produto', 0, '9f19a8123869ed792e813e65a08e3330.jpeg', 8, 1),
(43, 'titulo', 'descrever produto', 99, 'e8a791f386ea04632c1a60f832a09fd7.jpg', 8, 3),
(44, 'titulo', 'descrever produto', 44, 'afb649c042ff734a70bf6da1c2a8f5ce.jpeg', 8, 1),
(38, 'titulo', 'descrever produto', 0, '9decdca674321ad46a313806139abcb9.jpg', 8, 1),
(39, 'titulo', 'descrever produto', 0, '1403c914a510af5b29adf3f17015d558.jpg', 8, 1),
(40, 'titulo', 'descrever produto', 0, 'd7fde1ee3e1ae5421990efa0873c7755.jpg', 8, 1),
(41, 'titulo', 'descrever produto', 0, '4d010c12cf580a940b1df34823c885fd.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosindex`
--

CREATE TABLE IF NOT EXISTS `produtosindex` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoproduto` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fkprodutos` (`codigoproduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `produtosindex`
--

INSERT INTO `produtosindex` (`codigo`, `codigoproduto`) VALUES
(9, 0),
(8, 0),
(7, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE IF NOT EXISTS `promocoes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoproduto` int(11) NOT NULL,
  `regras` varchar(500) NOT NULL,
  `datainicio` datetime NOT NULL,
  `datafim` datetime NOT NULL,
  `prazoentrega` datetime NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fkprodutos` (`codigoproduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoproduto` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `FKproduto` (`codigoproduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`codigo`, `codigoproduto`) VALUES
(15, 43),
(14, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoconta`
--

CREATE TABLE IF NOT EXISTS `tipoconta` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipoconta`
--

INSERT INTO `tipoconta` (`codigo`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(18) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `CPF` varchar(19) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `CEP` int(8) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `tipoconta` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `FK_CPFclientes` (`CPF`),
  KEY `fkconta` (`tipoconta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `login`, `senha`, `CPF`, `email`, `endereco`, `CEP`, `nome`, `tipoconta`) VALUES
(1, 'jean', '1234', '', '', '', 0, 'Jean Ricardo', 1),
(2, 'henry', '1234', '', '', '', 0, 'Henry P.C', 2),
(19, 'pi', 'pi', 'pi', 'piwi', 'piwi land', 1, 'piwi', 2),
(20, 'killua', '1234', '123', 'killua@gon', 'Hunter', 123, 'killua', 2),
(42, 'lo', 'llllllllllllll', 'lllllllll', 'llllllllllllll', 'llllllllllllllllllllllllllllllllll', 0, 'll', 2),
(41, 'ki', 'ki', 'ki', 'ki', 'ki', 0, 'ki', 2),
(40, '', '', '', '', '', 0, '', 2),
(39, '', '', '', '', '', 0, '', 2),
(38, 'lo', 'lol', 'lol', 'lol', 'lol', 0, 'lol', 2),
(37, '', '', '', '', '', 0, '', 2),
(36, '', '', '', '', '', 0, '', 2),
(35, '', '', '', '', '', 0, '', 2),
(34, '', '', '', '', '', 0, '', 2),
(43, '', '', '', '', '', 0, '', 2),
(44, 'ko', 'ko', 'ko', 'ko', 'ko', 0, 'ko', 2),
(45, '', '', '', '', '', 0, '', 2),
(46, '', '', '', '', '', 0, '', 2),
(47, '', '', '0', '', '', 0, '', 2),
(48, 'f', 'f', 'f', 'f', 'f', 0, 'f', 2),
(49, 'i', 'i', 'i', 'i', 'i', 0, 'i', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoproduto` int(11) NOT NULL,
  `codigousuario` int(11) NOT NULL,
  `endereco` int(11) NOT NULL,
  `formapagamento` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `fkenderecovendas` (`endereco`),
  KEY `fkprodutos` (`codigoproduto`),
  KEY `fkusuarios` (`codigousuario`),
  KEY `FKformapagamento` (`formapagamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo`, `codigoproduto`, `codigousuario`, `endereco`, `formapagamento`) VALUES
(18, 42, 48, 0, 1),
(17, 44, 1, 15, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
