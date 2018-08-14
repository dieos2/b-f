-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Mar-2017 às 11:48
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(11) NOT NULL,
  `data_abertura` datetime NOT NULL,
  `valor_abertura` decimal(10,2) DEFAULT NULL,
  `data_fechamento` datetime NOT NULL,
  `valor_fechamento` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`id`, `data_abertura`, `valor_abertura`, `data_fechamento`, `valor_fechamento`) VALUES
(1, '2017-02-20 14:12:05', '45.00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Blusa'),
(2, 'Vestido'),
(3, 'Croped'),
(4, 'Body'),
(5, 'short'),
(6, 'conjunto'),
(7, 'Macaquinho'),
(8, 'Calça Fitnes'),
(9, 'Short Fitnes'),
(10, 'Top'),
(11, 'Bolsa'),
(12, 'Conjunto de lingerie'),
(13, 'Calcinhas '),
(14, 'Saia'),
(15, 'Calça'),
(16, 'Macacão Fitnes'),
(17, 'Acessorio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `telefone` int(11) NOT NULL,
  `instagram` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `telefone`, `instagram`) VALUES
(1, 'Padrão', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `foto` varchar(40) NOT NULL,
  `sexo` int(11) NOT NULL,
  `data` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`, `sobrenome`, `foto`, `sexo`, `data`) VALUES
(1, 'Diego', 'Serra', 'diego.jpg', 0, '2017-01-25 20:27:18'),
(2, 'Aline', 'Bastos', 'aline.jpg', 1, '2017-01-25 20:29:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `novo` tinyint(1) NOT NULL DEFAULT '0',
  `vendido` double NOT NULL,
  `preco_custo` decimal(10,2) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `data`, `id_user`, `foto`, `novo`, `vendido`, `preco_custo`, `id_categoria`) VALUES
(21, 'Vestido preto rodado', 'Vestido preto rodado', '40.00', '2017-03-04 16:35:44', 1, '7031fccb98e41743b52ec3c64a22f147.jpg', 0, 1, '20.00', 2),
(22, 'Vestido preto e bege', 'Vestido preto e bege ', '40.00', '2017-03-04 16:36:23', 1, '51a865ae7bda563726050dce42ac9778.jpg', 0, 1, '20.00', 2),
(23, 'Vestido branco e rosa ', 'Vestido branco e rosa ', '40.00', '2017-03-04 16:37:01', 1, '160083c8efa596036a5ed6cef5d603f1.jpg', 0, 1, '20.00', 2),
(24, 'Vestido veludo azul', 'Vestido branco e rosa ', '40.00', '2017-03-04 16:37:56', 1, 'e07987726f2443450cd71f2633311ecc.jpg', 0, 1, '20.00', 2),
(25, 'Vestido veludo marron', 'Vestido branco e rosa ', '40.00', '2017-03-04 16:38:15', 1, '2dc8cd6ae30eee8bf992f53b0e849984.jpg', 0, 1, '20.00', 2),
(26, 'Vestido preto costa nua', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:40:42', 1, '56d18c29ef4e002f6e61818ea6d36dfe.jpg', 0, 1, '15.00', 2),
(27, 'Vestido gravatinha estampado', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:41:17', 1, '430599558177fbe46251ef4cb11e0e2a.jpg', 0, 1, '15.00', 2),
(28, 'Vestido costa nua estampado', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:42:14', 1, 'eccd363d3c4e1a9138efe332dbe40227.jpg', 0, 1, '15.00', 2),
(29, 'Vestido costa nua estampado', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:42:24', 1, 'c2df669c1229ca764d1f3e4d651c9917.jpg', 0, 1, '15.00', 2),
(30, 'Vestido azul pompom', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:42:57', 1, 'b500fa554393fcb1636069584a68236f.jpg', 0, 1, '15.00', 2),
(31, 'Vestido longo ônibus ', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:43:23', 1, 'eb5f1652c7c49de3e033e697bbb8b0eb.jpg', 0, 1, '15.00', 2),
(32, 'Vestido longo azul', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:43:46', 1, '22db698c2e93b16d2c410cc6a64db288.jpg', 0, 1, '15.00', 2),
(33, 'Vestido longo vermelho', 'Vestido branco e rosa ', '30.00', '2017-03-04 16:44:11', 1, '1127ab795dc1bd693cbde4b4e2f40515.jpg', 0, 1, '15.00', 2),
(34, 'Vestido branco estampadinho', 'Vestido branco e rosa ', '35.00', '2017-03-04 16:45:05', 1, '84e63781804840eef3dbc482c990b93a.jpg', 0, 1, '18.00', 2),
(35, 'Vestido cinza com azul', 'Vestido branco e rosa ', '35.00', '2017-03-04 16:46:35', 1, '95a38cdbb25c407709c84def9ac43b34.jpg', 0, 1, '18.00', 2),
(36, 'Vestido preto e branco', 'Vestido branco e rosa ', '35.00', '2017-03-04 16:47:22', 1, 'dcc32ad962e9d58863b88628c4f8ff69.jpg', 0, 1, '18.00', 2),
(37, 'Vestido branco com rosas', 'Vestido branco e rosa ', '35.00', '2017-03-04 16:47:51', 1, 'a26844d2667c8710a96b773b7637593f.jpg', 0, 1, '18.00', 2),
(38, 'Vestido laranja preto e branco ', 'Vestido branco e rosa ', '35.00', '2017-03-04 16:48:28', 1, 'c8c7943dc02d3b0db8f961848a3c1998.jpg', 0, 1, '18.00', 2),
(39, 'Vestido listrado branco e preto', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:49:24', 1, 'aec357662c3625ac90808308a1e7ac63.jpg', 0, 1, '10.00', 2),
(40, 'Vestido listrado azul com branco', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:50:16', 1, '6fe8196351cbfa0d6a71de89fbc78d60.jpg', 0, 1, '10.00', 2),
(41, 'Vestido preto e branco', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:50:44', 1, 'c66d8c96a61a553f03dd9ccac537b96f.jpg', 0, 1, '10.00', 2),
(42, 'Vestido listrado azul com branco com alça', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:51:17', 1, '701514291aef7ed1e771243661b077f9.jpg', 0, 1, '10.00', 2),
(43, 'Vestido listrado preto com branco com alça', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:51:41', 1, 'c5c83de77824cb2a124ecefceb094a10.jpg', 0, 1, '10.00', 2),
(44, 'Vestido preto com azul', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:52:14', 1, 'e75277b216061aa03c58402c52ff867a.jpg', 0, 1, '10.00', 2),
(45, 'Vestido preto e cinza', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:52:41', 1, 'c4e0e4607e6cec7cd88b340bf3bb1dd2.jpg', 0, 1, '10.00', 2),
(46, 'Vestido preto e rosa', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:52:59', 1, 'e9bee7973783c992a1c4b6ea737f32f9.jpg', 0, 1, '10.00', 2),
(47, 'Vestido preto e branco', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:53:21', 1, 'a43c9cd3d135afbbf3659039c6f7007e.jpg', 0, 1, '10.00', 2),
(48, 'Vestido preto e estampado', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:53:47', 1, '8ac87bd95b99241c1992f7e250f22d56.jpg', 0, 1, '10.00', 2),
(49, 'Vestido amarelo e azul estampado', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:54:10', 1, '7237fee397a6bd43427a54c7e6b6745b.jpg', 0, 1, '10.00', 2),
(50, 'Vestido amarelo vermelho e verde', 'Vestido branco e rosa ', '20.00', '2017-03-04 16:54:32', 1, '0a02f8c994ba935f70d670a13c2cdcff.jpg', 0, 1, '10.00', 2),
(51, 'Macaquinho estampado Rosa marrom e roxo', 'Macaquinho', '20.00', '2017-03-04 17:01:54', 1, 'e613231290a2bce9eebeb725a7c1390f.jpg', 0, 1, '10.00', 7),
(52, 'Macaquinho de malha preto', 'Macaquinho', '20.00', '2017-03-04 17:02:36', 1, '2cf686fc54ecf3f766070792cc9627c7.jpg', 0, 1, '10.00', 7),
(53, 'Macaquinho de malha azul', 'Macaquinho', '20.00', '2017-03-04 17:02:51', 1, '65e77632df2c07f6c9816bc632d99c39.jpg', 0, 1, '10.00', 7),
(54, 'Macaquinho de viscose preto', 'Macaquinho', '20.00', '2017-03-04 17:03:12', 1, '65aef9ee62e58638f1ba553df8868336.jpg', 0, 1, '10.00', 7),
(55, 'Macaquinho Costa nua estampado azul', 'Macaquinho', '20.00', '2017-03-04 17:03:40', 1, 'b403fb021f27266f57d3670244ecb7cf.jpg', 0, 1, '10.00', 7),
(56, 'Macaquinho Costa nua estampado rosa', 'Macaquinho', '20.00', '2017-03-04 17:03:55', 1, '82e8e377409a2fa7f6cbe34f42dcac00.jpg', 0, 1, '10.00', 7),
(57, 'Macaquinho Costa nua estampado vermelho', 'Macaquinho', '20.00', '2017-03-04 17:04:11', 1, 'c168abc54e5b247a01d4b55010171735.jpg', 0, 1, '10.00', 7),
(58, 'Macaquinho Costa nua azul claro', 'Macaquinho', '20.00', '2017-03-04 17:04:38', 1, 'e34c53b6aa01c35aa72dcabf91d71acf.jpg', 0, 1, '10.00', 7),
(59, 'Macaquinho preto com bolinha vermelha', 'Macaquinho', '20.00', '2017-03-04 17:05:01', 1, 'ef65a1b7386d2ae17d52e296e39bd7c8.jpg', 0, 1, '10.00', 7),
(60, 'Macaquinho viscose Preto', 'Macaquinho', '30.00', '2017-03-04 17:05:40', 1, '7c93ee91f9a0031589e0296e812c550f.jpg', 0, 1, '15.00', 7),
(61, 'Macaquinho cor de vinho pompom', 'Macaquinho', '30.00', '2017-03-04 17:06:08', 1, '5d9bdaab869e0da26f7f23e2acffb502.jpg', 0, 1, '15.00', 7),
(62, 'Macaquinho cor de vinho viscose', 'Macaquinho', '30.00', '2017-03-04 17:06:29', 1, '0fb531a5570e9e7ae74bb95928b917c4.jpg', 0, 1, '15.00', 7),
(63, 'Macaquinho Preto estampado azul', 'Macaquinho', '30.00', '2017-03-04 17:07:02', 1, '9c7aba5ba17d04a8c90deb1b718ce6f3.jpg', 0, 1, '15.00', 7),
(64, 'Macaquinho Preto estampado vermelho', 'Macaquinho', '30.00', '2017-03-04 17:07:21', 1, 'ef0f77d5506a1cc70d5b15df09dabd64.jpg', 0, 1, '15.00', 7),
(65, 'Macaquinho viscose vermelho', 'Macaquinho', '30.00', '2017-03-04 17:07:57', 1, '51e6f26a2e77cb177c0f5404cc4fd5e7.jpg', 0, 1, '15.00', 7),
(66, 'Macaquinho elefante', 'Macaquinho', '30.00', '2017-03-04 17:08:20', 1, 'da48647b9210a690d33f95ef73facfc0.jpg', 0, 1, '15.00', 7),
(67, 'Macaquinho esquilo', 'Macaquinho', '30.00', '2017-03-04 17:08:40', 1, '6cdab673a891f8b5e1f29f387bbe91ed.jpg', 0, 1, '15.00', 7),
(68, 'Macaquinho estampado azul', 'Macaquinho', '30.00', '2017-03-04 17:09:01', 1, 'b45be286a1ba66dc18e5093802fa6482.jpg', 0, 1, '15.00', 7),
(69, 'Macaquinho estampado Preto azul e rosa', 'Macaquinho', '30.00', '2017-03-04 17:09:32', 1, '0b827462f443540aae5ac5d615868928.jpg', 0, 1, '15.00', 7),
(70, 'Macaquinho laço no peito', 'Macaquinho', '30.00', '2017-03-04 17:09:58', 1, '9d5c14936106c6377c2c63a4dc9bff10.jpg', 0, 1, '15.00', 7),
(71, 'Macaquinho laço', 'Macaquinho', '40.00', '2017-03-04 17:10:39', 1, 'eca16f00cd8f5946a8fa3b23e6a3ff57.jpg', 0, 1, '20.00', 7),
(72, 'Saia listrada azul e branco', 'Saia', '20.00', '2017-03-04 17:12:04', 1, '300136a1fd51fd7c5828849fd25d1a3b.jpg', 0, 1, '10.00', 14),
(73, 'Saia listrada cinza e preto', 'Saia', '20.00', '2017-03-04 17:12:36', 1, '7c1ef771bcee91be7ccc57656f7d6cf4.jpg', 0, 1, '10.00', 14),
(74, 'Saia listrada azul branco e verde', 'Saia', '20.00', '2017-03-04 17:12:56', 1, '3958e7d490e194d69d7ef3d47e3bf466.jpg', 0, 1, '10.00', 14),
(75, 'Blusa branca', 'Blusa', '10.00', '2017-03-04 17:13:59', 1, '4a5aa09f68830fe96462a47cb6942cfb.jpg', 0, 1, '5.00', 1),
(76, 'Blusa rosa', 'Blusa', '10.00', '2017-03-04 17:14:16', 1, '735d271070e81b1fdd084c3e7bb43141.jpg', 0, 1, '5.00', 1),
(77, 'Blusa azul', 'Blusa', '10.00', '2017-03-04 17:14:37', 1, '757b549cf57edaee2f5d366c33d6537f.jpg', 0, 1, '5.00', 1),
(78, 'Blusa preta', 'Blusa', '10.00', '2017-03-04 17:14:59', 1, '5816811c87aa6523ca548271657c984b.jpg', 0, 1, '5.00', 1),
(79, 'Blusa amarela', 'Blusa', '10.00', '2017-03-04 17:15:26', 1, '63f6273b3dc9948d0a8d1fa1b9d36207.jpg', 0, 1, '5.00', 1),
(80, 'Blusa vermelha', 'Blusa', '10.00', '2017-03-04 17:16:01', 1, '9a119ceabbd9d41c1d919fe882ae7091.jpg', 0, 1, '5.00', 1),
(81, 'Blusa peplum cadeado', 'Blusa', '20.00', '2017-03-04 17:16:33', 1, '0dfd11fab2d0211f35cb24aee31e3c05.jpg', 0, 1, '10.00', 1),
(82, 'Blusa peplum azul', 'Blusa', '20.00', '2017-03-04 17:16:53', 1, '54a8856a3f90f03506356a1bbaeb0c2b.jpg', 0, 1, '10.00', 1),
(83, 'Blusa peplum love', 'Blusa', '20.00', '2017-03-04 17:17:35', 1, 'a8be5285647aa175422f4ea73b5db9df.jpg', 0, 1, '10.00', 1),
(84, 'Blusa peplum preta e branca', 'Blusa', '20.00', '2017-03-04 17:18:01', 1, '9e85a37ccd10c6ecaf73e095a02e794a.jpg', 0, 1, '10.00', 1),
(85, 'Blusa peplum Florida', 'Blusa', '20.00', '2017-03-04 17:18:21', 1, '1db6ed3b9f4951106b17ebd693782a4b.jpg', 0, 1, '10.00', 1),
(86, 'Blusa peplum caveira preta', 'Blusa', '20.00', '2017-03-04 17:18:45', 1, '910fecd7a9d66f6cfd5a87746d6f2ab2.jpg', 0, 1, '10.00', 1),
(87, 'Blusa peplum Florida', 'Blusa', '20.00', '2017-03-04 17:19:20', 1, '79bb65a3279e1c8898d908c58f333e54.jpg', 0, 1, '10.00', 1),
(88, 'Blusa peplum caveira verde', 'Blusa', '20.00', '2017-03-04 17:19:37', 1, '68e8fc3d40b899433522acbd509c2d8e.jpg', 0, 1, '10.00', 1),
(89, 'Blusa coração', 'Blusa', '20.00', '2017-03-04 17:19:55', 1, 'c3db462c2e8c6e58cb5b75d1fab6442a.jpg', 0, 1, '10.00', 1),
(90, 'Blusa passaros', 'Blusa', '20.00', '2017-03-04 17:20:09', 1, 'ccbfa3773e8d34580a2477365093a83f.jpg', 0, 1, '10.00', 1),
(94, 'Cropped rosa e amarelo ', 'Cropped rosa e amarelo ', '20.00', '2017-03-05 14:25:49', 1, '338cb940953dfcfd8dfab78135153884.jpg', 0, 1, '10.00', 3),
(95, 'Cropped viscose preto', 'Cropped rosa e amarelo ', '20.00', '2017-03-05 14:26:32', 1, '14b9f2b4d8806132c3527a672b1f5813.jpg', 0, 1, '10.00', 3),
(96, 'Cropped viscose verde', 'Cropped rosa e amarelo ', '20.00', '2017-03-05 14:26:51', 1, '5f3f9d49d4c9076eafeec5514dc6c950.jpg', 0, 1, '10.00', 3),
(97, 'Cropped gola alta cinza', 'Cropped rosa e amarelo ', '10.00', '2017-03-05 14:27:29', 1, '6c512b48c5d4ff0539f5c51c0344ef99.jpg', 0, 1, '5.00', 3),
(98, 'Cropped capitão América', 'Cropped capitão América', '10.00', '2017-03-05 14:27:57', 1, 'e5b60239b2bbf928fd781aa4b1e1a46a.jpg', 0, 1, '5.00', 3),
(99, 'Cropped Snup', 'Cropped Snup', '10.00', '2017-03-05 14:28:15', 1, '84c456b144732cf9709d01153a452b24.jpg', 0, 1, '5.00', 3),
(100, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 14:28:55', 1, '884e3d81717f2e42a366ed5dbb95c143.jpg', 0, 1, '3.99', 3),
(101, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 14:29:30', 1, '04f31bb0df1bf3dbf87cbba659504fa6.jpg', 0, 1, '3.33', 3),
(102, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 14:29:37', 1, 'eede83bf0ea95694b3196f73f78580e9.jpg', 0, 1, '3.33', 3),
(103, 'Conjunto pompom preto', 'Conjunto pompom preto', '30.00', '2017-03-05 14:30:33', 1, '54c2e9b1b67c78675ab726cd9009b0ec.jpg', 0, 1, '15.00', 6),
(104, 'Conjunto pompom vermelho', 'Conjunto pompom vermelho', '30.00', '2017-03-05 14:30:53', 1, '709fdb006a12540ccee2946dd381047f.jpg', 0, 1, '15.00', 6),
(105, 'Conjunto pompom triangulo', 'Conjunto pompom triangulo', '30.00', '2017-03-05 14:31:19', 1, '6762ecbb64f28dab99c74ef3532d15d8.jpg', 0, 1, '15.00', 6),
(106, 'Conjunto rosa e azul', 'Conjunto rosa e azul', '30.00', '2017-03-05 14:37:46', 1, '5543a4861ce63a2958fc2b95c11a188b.jpg', 0, 1, '15.00', 6),
(107, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:38:36', 1, 'b28250af247882708f6c3aa7fa122be9.jpg', 0, 1, '5.00', 9),
(108, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:38:45', 1, '5af14cb05d5d0166f8a4330b977a2eac.jpg', 0, 1, '5.00', 9),
(109, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:38:50', 1, '95855fd58364fd17a671a907989e0afc.jpg', 0, 1, '5.00', 9),
(110, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:38:54', 1, '3c66585deaa1e31c2164ad4b92c94e5b.jpg', 0, 1, '5.00', 9),
(111, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:38:58', 1, '54191155dc76c4db010ae7eefbfb5ca1.jpg', 0, 1, '5.00', 9),
(112, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:39:04', 1, '9ce1f797730f60cd91763f169d1eb757.jpg', 0, 1, '5.00', 9),
(113, 'Short Fitnes', 'Short Fitnes', '10.00', '2017-03-05 14:39:09', 1, 'f9f2479eca4b5d33f148e3497f1e27c4.jpg', 0, 1, '5.00', 9),
(114, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:13', 1, 'f4d011af81b44be9bfe7d826a438c19b.jpg', 0, 1, '10.00', 8),
(115, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:26', 1, '53f6d2cc38b0178d8eba52e8909f3194.jpg', 0, 1, '10.00', 8),
(116, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:33', 1, 'd778bacabe43f3334f3f61c1c236446e.jpg', 0, 1, '10.00', 8),
(117, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:37', 1, 'bdfa53f4492060aae36426ccfbd7f5a0.jpg', 0, 1, '10.00', 8),
(118, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:41', 1, '9c22600019b4c5b174eb813033542828.jpg', 0, 1, '10.00', 8),
(119, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:46', 1, '1a57322780a8814d49a8ef4f245a954c.jpg', 0, 1, '10.00', 8),
(120, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 14:40:50', 1, '37656aa9eb7722a902f4b8bea042c2e0.jpg', 0, 1, '10.00', 8),
(121, 'Top Estampado', 'Top Estampado', '10.00', '2017-03-05 14:41:29', 1, 'e6a6a6878a74f029b17ff368b24988a7.jpg', 0, 1, '5.00', 10),
(122, 'Top Estampado', 'Top Estampado', '10.00', '2017-03-05 14:41:35', 1, 'a98cbe5ad488f3b130a00c1134ddf9c9.jpg', 0, 1, '5.00', 10),
(123, 'Top Estampado', 'Top Estampado', '10.00', '2017-03-05 14:41:40', 1, '5b96430c307e8cdd7c217c39c7659563.jpg', 0, 1, '5.00', 10),
(124, 'Top Estampado', 'Top Estampado', '10.00', '2017-03-05 14:41:45', 1, '1cb052a351633f91acbc3211e6df42cb.jpg', 0, 1, '5.00', 10),
(125, 'Top Preto', 'Top Preto', '10.00', '2017-03-05 14:44:53', 1, 'c083dc5e29032228d681356ecddf11c4.jpg', 0, 1, '5.00', 10),
(126, 'Top Preto', 'Top Preto', '10.00', '2017-03-05 14:44:58', 1, 'c96e65a52f1d67efe68a55db417761cc.jpg', 0, 1, '5.00', 10),
(127, 'Croped Rosa', 'Croped Rosa', '10.00', '2017-03-05 14:45:18', 1, '59c61a8b0cec7551bcfaadb9b183065f.jpg', 0, 1, '5.00', 3),
(128, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:45:46', 1, 'dc8599c1deb923fd453e0b3b602f1255.jpg', 0, 1, '5.00', 3),
(129, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:45:51', 1, '9e12ee25fa6f4c265b206c6d11442121.jpg', 0, 1, '5.00', 3),
(130, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:45:57', 1, '1cc5534897b52765958f247c4180203e.jpg', 0, 1, '5.00', 3),
(131, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:46:01', 1, '409d8e057d152e12ee0462066d7a627f.jpg', 0, 1, '5.00', 3),
(132, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:46:06', 1, '4fb546beb0e3f2f02444f11bc6d9b38d.jpg', 0, 1, '5.00', 3),
(133, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:46:11', 1, '4ecc1a2ccf53ceed284955e3332798c3.jpg', 0, 1, '5.00', 3),
(134, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:46:15', 1, 'eb7fe6147d7ef64fae8e12cbd6fc28a3.jpg', 0, 1, '5.00', 3),
(135, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:46:20', 1, 'ae383e12de43a112b7d3b8626bf52ccf.jpg', 0, 1, '5.00', 3),
(136, 'Croped Estampado', 'Croped Estampado', '10.00', '2017-03-05 14:46:24', 1, 'f7d72848aa58a9e45fc5ad0fa6b34a5a.jpg', 0, 1, '5.00', 3),
(137, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:46:57', 1, '706a64108108fd0a317e5cd8b4624564.jpg', 0, 1, '10.00', 5),
(138, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:47:32', 1, '268d43dca11903d8de01c006b27c4a67.jpg', 0, 1, '10.00', 5),
(139, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:48:11', 1, 'ef40a290f8bea155bcc597164bfa6297.jpg', 0, 1, '10.00', 5),
(140, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:48:17', 1, '70e220aeb427be847d5e04a4108a55b1.jpg', 0, 1, '10.00', 5),
(141, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:48:26', 1, '2d6940a9e2a1dc770b0fb1b02494540d.jpg', 0, 1, '10.00', 5),
(142, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:48:31', 1, 'ad01d74b4c9feb1cf3587eaebdc6bf7f.jpg', 0, 1, '10.00', 5),
(143, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:48:35', 1, '1535659539453cdf6ed293db88761717.jpg', 0, 1, '10.00', 5),
(144, 'Short Jeans', 'Short Jeans', '20.00', '2017-03-05 14:48:40', 1, 'c34c334b085839b7002498a7795c20bf.jpg', 0, 1, '10.00', 5),
(145, 'Short de Tecido', 'Short de Tecido', '10.00', '2017-03-05 14:49:09', 1, '1c1b41b67d927f2e2b3ada98c293b98a.jpg', 0, 1, '5.00', 5),
(146, 'Short de Tecido', 'Short de Tecido', '10.00', '2017-03-05 14:49:15', 1, '883464c4ac5718072edd92c3fd823126.jpg', 0, 1, '5.00', 5),
(147, 'Short de Tecido', 'Short de Tecido', '10.00', '2017-03-05 14:49:19', 1, 'db3d46418c50d7f866751b7468a960b9.jpg', 0, 1, '5.00', 5),
(148, 'Short de Tecido', 'Short de Tecido', '10.00', '2017-03-05 14:49:24', 1, 'f824bbd79b797a51fd44a7f49c913e8b.jpg', 0, 1, '5.00', 5),
(149, 'Short de Tecido', 'Short de Tecido', '10.00', '2017-03-05 14:49:28', 1, 'b60843612287d74c332c76a7e9161f22.jpg', 0, 1, '5.00', 5),
(150, 'Short de Tecido', 'Short de Tecido', '10.00', '2017-03-05 14:49:32', 1, '84fcf8e247d684bd878fa29b47fee3c3.jpg', 0, 1, '5.00', 5),
(151, 'Calcinhas Variadas', 'Calcinhas Variadas', '5.00', '2017-03-05 14:50:24', 1, 'a0c9a8a7226dc923533c2572a813c97b.jpg', 0, 1, '2.50', 13),
(152, 'Calcinhas Variadas', 'Calcinhas Variadas', '5.00', '2017-03-05 14:50:30', 1, '893440d756efbd769afb37b0773dd260.jpg', 0, 1, '2.50', 13),
(153, 'Calcinhas Variadas', 'Calcinhas Variadas', '5.00', '2017-03-05 14:50:34', 1, '1cdac69d773c2e8b1ca95c1a5cc69e9e.jpg', 0, 1, '2.50', 13),
(154, 'Calcinhas Variadas', 'Calcinhas Variadas', '5.00', '2017-03-05 14:50:39', 1, '1ce657a650b1a2547091acd2c04b4546.jpg', 0, 1, '2.50', 13),
(155, 'Bolsa Nude', 'Bolsa Nude', '20.00', '2017-03-05 14:51:13', 1, '9c5a3d1cdfb408d4474115da73f9f703.jpg', 0, 1, '10.00', 11),
(156, 'Bolsa Salmão / Laranja', 'Bolsa Salmão / Laranja', '20.00', '2017-03-05 14:51:39', 1, '8205ec3a5c7f258f52bbdda1cd1bfad5.jpg', 0, 1, '10.00', 11),
(157, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:52:17', 1, '084026ebeadd15bb8f2011373e41ae53.jpg', 0, 1, '11.00', 12),
(158, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:52:17', 1, 'b2a79a980b9f55027eaced1008c9d272.jpg', 0, 1, '11.00', 12),
(159, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:53:53', 1, 'e5389102a0916873af85c22e29762ae6.jpg', 0, 1, '11.00', 12),
(160, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:53:59', 1, '26ddd04bf94edb2583cf2878c55204a9.jpg', 0, 1, '11.00', 12),
(161, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:54:08', 1, '60edf9842d9f417a22b1a99f42c06c9e.jpg', 0, 1, '11.00', 12),
(162, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:54:14', 1, '83d42be0ab87fd4d7c6aa98f5c45fc8a.jpg', 0, 1, '11.00', 12),
(163, 'Conjunto de Lingerir', 'Conjunto de Lingerir', '22.00', '2017-03-05 14:54:18', 1, '27bcd6d586322740a636deed27baf459.jpg', 0, 1, '11.00', 12),
(164, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:55:49', 1, '99678c10ea095c75e950648cdf43b055.jpg', 0, 1, '10.00', 4),
(165, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:55:57', 1, '8cfec647ef032625da6c56cadc44f7a1.jpg', 0, 1, '10.00', 4),
(166, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:30', 1, 'a4a701c0057fb1bbd749c3cbd9539008.jpg', 0, 1, '10.00', 4),
(167, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:35', 1, '491dc1a1ad5e64442c3b6acb048a0133.jpg', 0, 1, '10.00', 4),
(168, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:39', 1, '17878ee2cb4bf1df66be255a319a97a5.jpg', 0, 1, '10.00', 4),
(169, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:44', 1, '49258a7812db2be1787e6a14d51531b8.jpg', 0, 1, '10.00', 4),
(170, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:48', 1, 'ac4d29da754fb1fd9e677e4a59df2382.jpg', 0, 1, '10.00', 4),
(171, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:52', 1, '7dccf707bd82a4d25daf129c082a44a2.jpg', 0, 1, '10.00', 4),
(172, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:57:57', 1, '666dc0b5f63ca43d03d356b3b2eeb712.jpg', 0, 1, '10.00', 4),
(173, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:02', 1, '3b45c063beff1d5f9abfc81c95a7345d.jpg', 0, 1, '10.00', 4),
(174, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:06', 1, '5cd7137ae0b22195b048b73d28f30dc6.jpg', 0, 1, '10.00', 4),
(175, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:10', 1, 'f98e33272814bb2836f08f5387d4ffa5.jpg', 0, 1, '10.00', 4),
(176, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:14', 1, 'ca609123c9f2d83a7ffbcca1252604f0.jpg', 0, 1, '10.00', 4),
(177, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:18', 1, 'facd68853771ab930db1770c1ce819e7.jpg', 0, 1, '10.00', 4),
(178, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:22', 1, '2f5861c9fa406fd68d9a3e49df7b135f.jpg', 0, 1, '10.00', 4),
(179, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:26', 1, '6b0c90818eae61e93d1a18ef32ef7f35.jpg', 0, 1, '10.00', 4),
(180, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:30', 1, '2c4202ca0303b1785ba61a8cf7aeb222.jpg', 0, 1, '10.00', 4),
(181, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:34', 1, '95412924efa9b6d262211e81cfbfb93e.jpg', 0, 1, '10.00', 4),
(182, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:38', 1, 'f35ddc406115278490d566bd0a776319.jpg', 0, 1, '10.00', 4),
(183, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:49', 1, 'b73d5de609a94f7c0ea8da03e8ebc9b8.jpg', 0, 1, '10.00', 4),
(184, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:53', 1, '327a909de39cedd4e34b1500fb13f6cb.jpg', 0, 1, '10.00', 4),
(185, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:58:58', 1, '0b6106bcda310202de50aa4929726bfa.jpg', 0, 1, '10.00', 4),
(186, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:02', 1, '3b303eba55693c1af21045b582478be5.jpg', 0, 1, '10.00', 4),
(187, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:06', 1, 'd948edcf3603cce88c088009f1840d21.jpg', 0, 1, '10.00', 4),
(188, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:10', 1, 'b55e2a624747fdb7d4ede0953e31051a.jpg', 0, 1, '10.00', 4),
(189, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:15', 1, '52d1ccdeec163cd1ec20d4d5a91cf78d.jpg', 0, 1, '10.00', 4),
(190, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:20', 1, '6bb41486611fd8a512a30811d436cc09.jpg', 0, 1, '10.00', 4),
(191, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:24', 1, '8a571502d2261ba00bae3dd7978cb62f.jpg', 0, 1, '10.00', 4),
(192, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:28', 1, '2029634c9ee06adda898f087dac56e33.jpg', 0, 1, '10.00', 4),
(193, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:32', 1, 'e1aea1a2549a5d6c6ec0ca0b870111c5.jpg', 0, 1, '10.00', 4),
(194, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:37', 1, '57c57217b861eaf40303c9e1b6769cd9.jpg', 0, 1, '10.00', 4),
(195, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:41', 1, 'dac1297427a2820f4255e3993570c9f0.jpg', 0, 1, '10.00', 4),
(196, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:45', 1, '55f4c0001e10b875e25f222dc30e7eac.jpg', 0, 1, '10.00', 4),
(197, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:50', 1, '9181b41be851e4c58773db49b967c386.jpg', 0, 1, '10.00', 4),
(198, 'Body Variado', 'Body Variado', '20.00', '2017-03-05 14:59:54', 1, '6975216676965809dceebdde4f7d3008.jpg', 0, 1, '10.00', 4),
(199, 'Body Variado', 'Body Variado', '25.00', '2017-03-05 15:00:04', 1, '346cd22d64d9c817a46bca2fc8d55d7f.jpg', 0, 1, '12.00', 4),
(200, 'Bolsa Variadas', 'Bolsa Variadas', '25.00', '2017-03-05 15:01:24', 1, '250ed6d7b31f768a70d500685977a71b.jpg', 0, 1, '12.90', 11),
(201, 'Bolsa Variadas', 'Bolsa Variadas', '25.00', '2017-03-05 15:01:29', 1, 'ed5c15ffb01f96d97e7893d2e9e1deb4.jpg', 0, 1, '12.90', 11),
(202, 'Bolsa Variadas', 'Bolsa Variadas', '25.00', '2017-03-05 15:01:33', 1, '177b9ed185b673e729328ab4b9f9a9da.jpg', 0, 1, '12.90', 11),
(203, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:01:46', 1, '07ccc968552c7226e504670326e3f1fb.jpg', 0, 1, '12.90', 11),
(204, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:01:53', 1, '0119000a8f3bf268126a4eb4779effdf.jpg', 0, 1, '12.90', 11),
(205, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:01:57', 1, 'f40308d2a34d064245472434d5d5e478.jpg', 0, 1, '12.90', 11),
(206, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:02:04', 1, '1309693cef5179b14185f137601bc55c.jpg', 0, 1, '12.90', 11),
(207, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:02:09', 1, '75e38a2a1fa6f78f54cd66616c233ab9.jpg', 0, 1, '12.90', 11),
(208, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:02:14', 1, '5c4dbfc512a933138f68118ab3f413d2.jpg', 0, 1, '12.90', 11),
(209, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:02:22', 1, 'c004458f321effa0e137c9ddcf4710c7.jpg', 0, 1, '12.90', 11),
(210, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:02:29', 1, 'e2858944e196cf13ab9ad185c27e5f4b.jpg', 0, 1, '12.90', 11),
(211, 'Bolsa Variadas', 'Bolsa Variadas', '30.00', '2017-03-05 15:02:33', 1, '88470b5b0bb7d9811d4cbb93606dae68.jpg', 0, 1, '12.90', 11),
(212, 'Vestido Azul', 'Vestido Azul', '45.00', '2017-03-05 17:30:30', 1, 'c34c97eb3cc96e656eda9d3c117b5320.jpg', 0, 1, '25.00', 2),
(213, 'Vestido Preto', 'Vestido Preto', '45.00', '2017-03-05 17:30:39', 1, '2498738ca1891c25dd77a60e091c3d6c.jpg', 0, 1, '25.00', 2),
(214, 'Vestido Rosa', 'Vestido Rosa', '25.00', '2017-03-05 17:30:54', 1, '9de8b633969e45ee2f9e664b2d46af96.jpg', 0, 1, '12.00', 2),
(215, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:31:13', 1, 'a6cdc2b4b9b69369e2cf464fe7d76dd3.jpg', 0, 1, '10.00', 2),
(216, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:31:18', 1, '527bc8d934f9887bc1da962808600152.jpg', 0, 1, '10.00', 2),
(217, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:31:22', 1, '1e25c010ae5d4693b1bcf51e69b95d89.jpg', 0, 1, '10.00', 2),
(218, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:31:29', 1, '316de1073959db8d855100fd228c2b2e.jpg', 0, 1, '10.00', 2),
(219, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:31:37', 1, '872fb3d2e218b843783cf338dce7bf39.jpg', 0, 1, '10.00', 2),
(220, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:32:03', 1, '778d8b1d6e809feba372ecb9f7ad4993.jpg', 0, 1, '10.00', 2),
(221, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:32:55', 1, '6b0020a56319fd0225d32879da0ea4ef.jpg', 0, 1, '10.00', 2),
(222, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:32:58', 1, '13e3d91a25833a09f4a1ff559e1baf34.jpg', 0, 1, '10.00', 2),
(223, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:33:02', 1, '3d0cc834969d7c1f6e93f505f667a9c6.jpg', 0, 1, '10.00', 2),
(224, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:33:05', 1, 'c1a68f8aef0b32d6c18688eb1126e041.jpg', 0, 1, '10.00', 2),
(225, 'Vestido Variados', 'Vestido Variados', '20.00', '2017-03-05 17:33:10', 1, '1516b39c1e3bf85bfb00ac065d62d41c.jpg', 0, 1, '10.00', 2),
(226, 'Vestido Longo', 'Vestido Longo', '45.00', '2017-03-05 17:33:26', 1, '31a56426520bc19cf10b53d6bc269a0f.jpg', 0, 1, '22.00', 2),
(227, 'Vestido Variados', 'Vestido Variados', '40.00', '2017-03-05 17:33:43', 1, 'a9fb7e6a1e385bb021b0bb8821302b5d.jpg', 0, 1, '20.00', 2),
(228, 'Vestido Variados', 'Vestido Variados', '40.00', '2017-03-05 17:33:46', 1, '6cd3e7bba734a7924426fc79483667c0.jpg', 0, 1, '20.00', 2),
(229, 'Vestido Variados', 'Vestido Variados', '40.00', '2017-03-05 17:34:10', 1, 'c632330a14c3718075694a11267ba711.jpg', 0, 1, '20.00', 2),
(230, 'Vestido Variados', 'Vestido Variados', '30.00', '2017-03-05 17:35:20', 1, '1d54fc4962b209a465ebbb42e8792c04.jpg', 0, 1, '15.00', 2),
(231, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:20', 1, '51b44fa8eaff52044504525181b86d0f.jpg', 0, 1, '10.00', 7),
(232, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:34', 1, '2e0265338465bd968258bed4358bb197.jpg', 0, 1, '10.00', 7),
(233, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:38', 1, '0bb23eac7790752eb1562f2331d46ca6.jpg', 0, 1, '10.00', 7),
(234, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:42', 1, '6c2be91b1554c35867211badee305abd.jpg', 0, 1, '10.00', 7),
(235, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:46', 1, 'cfd8601b6137368757cf92c3e3ae1bad.jpg', 0, 1, '10.00', 7),
(236, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:56', 1, '4a36ae8dc337771eb35d97dd3cf97cd8.jpg', 0, 1, '10.00', 7),
(237, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:36:59', 1, '309579724264ce033658c7e54e87ab46.jpg', 0, 1, '10.00', 7),
(238, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:37:05', 1, '84c9023f58a05a60762d923e7208919f.jpg', 0, 1, '10.00', 7),
(239, 'Macaquinho Variados', 'Macaquinho Variados', '18.00', '2017-03-05 17:37:29', 1, '8409908632b4e73706e0c17b0863a1ac.jpg', 0, 1, '8.00', 7),
(240, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:37:56', 1, '3a346c824f9549ba26c16675e524d501.jpg', 0, 1, '10.00', 7),
(241, 'Macaquinho Variados', 'Macaquinho Variados', '30.00', '2017-03-05 17:38:05', 1, '8324effb63ca40d4e5bc1dd64c6fe53f.jpg', 0, 1, '15.00', 7),
(242, 'Macaquinho Variados', 'Macaquinho Variados', '30.00', '2017-03-05 17:38:10', 1, '5b604e52e9df394a5743552e9b54e8fc.jpg', 0, 1, '15.00', 7),
(243, 'Macaquinho Variados', 'Macaquinho Variados', '30.00', '2017-03-05 17:38:14', 1, '324287a9262dd24dccda511e75838b75.jpg', 0, 1, '15.00', 7),
(244, 'Macaquinho Variados', 'Macaquinho Variados', '20.00', '2017-03-05 17:38:29', 1, 'e755c20752e9ee6f27d63a8c38878a59.jpg', 0, 1, '10.00', 7),
(245, 'Blusa Peplum Preta', 'Blusa Peplum Preta', '20.00', '2017-03-05 17:39:26', 1, 'fafdb596578c71bd07de5daaebc45c92.jpg', 0, 1, '10.00', 1),
(246, 'Blusa Tulhe', 'Blusa Tulhe', '20.00', '2017-03-05 17:39:44', 1, '0aa1648163be5c77b3ba180f7bdae819.jpg', 0, 1, '10.00', 1),
(247, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:12', 1, '5f8f6fff08293f5c6fd49329bee2d86b.jpg', 0, 1, '5.00', 1),
(248, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:16', 1, 'dc308d38460893fb14b7e8f6091d6990.jpg', 0, 1, '5.00', 1),
(249, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:24', 1, '581b5437523ad1b84c53b07ac96c3163.jpg', 0, 1, '5.00', 1),
(250, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:29', 1, '770a267ed26c25bb2113018cdd5c1c8e.jpg', 0, 1, '5.00', 1),
(251, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:33', 1, '5a7549030db411aa7f6f4db86becf6ac.jpg', 0, 1, '5.00', 1),
(252, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:37', 1, 'f20d5d0f454da836782cf9b345e3b2f7.jpg', 0, 1, '5.00', 1),
(253, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:42', 1, 'e13b449a574efc6d265fe18653a2a779.jpg', 0, 1, '5.00', 1),
(254, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:45', 1, 'b6a4db954db027f70dea250bba7de2bc.jpg', 0, 1, '5.00', 1),
(255, 'Blusa Variadas', 'Blusa Variadas', '15.00', '2017-03-05 17:40:49', 1, '3984ab3a9e2c7552973542fe3889dcfe.jpg', 0, 1, '5.00', 1),
(256, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:01', 1, '8cf5a82823ed6fa76fd17613afe2f812.jpg', 0, 1, '5.00', 1),
(257, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:05', 1, 'a599e52a0c43e197e8bf65bae8c406fc.jpg', 0, 1, '5.00', 1),
(258, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:09', 1, '487dc1c7bef3109e3628b12385353047.jpg', 0, 1, '5.00', 1),
(259, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:13', 1, '321e4caa227dc0ffaa1fd0bfee17d59e.jpg', 0, 1, '5.00', 1),
(260, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:17', 1, 'bd637a992897d260da3948d4281283ea.jpg', 0, 1, '5.00', 1),
(261, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:20', 1, 'ce8a4dcad3dd136680da699404015a2b.jpg', 0, 1, '5.00', 1),
(262, 'Blusa Variadas', 'Blusa Variadas', '10.00', '2017-03-05 17:41:24', 1, '72499aff45b503c596473ea6733f902b.jpg', 0, 1, '5.00', 1),
(263, 'Blusa de Manga', 'Blusa de Manga', '20.00', '2017-03-05 17:41:40', 1, 'e93090606a1ecd02186428770c56edb3.jpg', 0, 1, '10.00', 1),
(264, 'Blusa de Manga', 'Blusa de Manga', '20.00', '2017-03-05 17:41:44', 1, '82fe87eab8c0b4a2e2ca6a40ec189e05.jpg', 0, 1, '10.00', 1),
(265, 'Blusa de Manga', 'Blusa de Manga', '20.00', '2017-03-05 17:41:49', 1, '77f9da30c2f1b140c7954796d0b31b47.jpg', 0, 1, '10.00', 1),
(266, 'Blusa Peplum Vinho', 'Blusa Peplum Vinho', '20.00', '2017-03-05 17:42:18', 1, '18f9d43b1d39f99d2d758fa3ce2bd6e9.jpg', 0, 1, '10.00', 1),
(267, 'Blusa Variada', 'Blusa Variada', '10.00', '2017-03-05 17:42:37', 1, '81be0f3301aac6a264eef18452b842fb.jpg', 0, 1, '5.00', 1),
(268, 'Blusa Jeans', 'Blusa Jeans', '25.00', '2017-03-05 17:43:15', 1, '21428102cb4bb8e71693248d3a6f46bf.jpg', 0, 1, '10.00', 1),
(269, 'Blusa Jeans', 'Blusa Jeans', '25.00', '2017-03-05 17:43:19', 1, 'fefa2503c48207706f419d8245505643.jpg', 0, 1, '10.00', 1),
(270, 'Blusa Jeans', 'Blusa Jeans', '25.00', '2017-03-05 17:43:30', 1, 'f81aa9fb00ec11f7386a53e767c11c12.jpg', 0, 1, '10.00', 1),
(271, 'Saia Preta', 'Saia Preta', '22.00', '2017-03-05 17:44:09', 1, '65b8c7f0a5aa6e5151680b808ec7e82e.jpg', 0, 1, '10.00', 14),
(272, 'Saia Preta', 'Saia Preta', '22.00', '2017-03-05 17:44:13', 1, '0b53c06e37e1b6ecdd8bec1897d5594b.jpg', 0, 1, '10.00', 14),
(273, 'Calça Jeans', 'Calça Jeans', '25.00', '2017-03-05 17:46:35', 1, 'e144bd2b72b85ecd67cf573bc85844f8.jpg', 0, 1, '10.00', 15),
(274, 'Calça Jeans', 'Calça Jeans', '20.00', '2017-03-05 17:46:41', 1, '475ac29f850c0ae9bb9145e7e103a456.jpg', 0, 1, '10.00', 15),
(275, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:48:49', 1, 'f4ec328dac60a99c19f120c48678930a.jpg', 0, 1, '10.00', 5),
(276, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:48:52', 1, '9343ab9a303f1fa1d519f51eeccb101a.jpg', 0, 1, '10.00', 5),
(277, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:48:56', 1, '9aea067c93dd7834a25b947129dd984a.jpg', 0, 1, '10.00', 5),
(278, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:48:59', 1, '4661c06fe0e16d8d55b56c588ff1ebfc.jpg', 0, 1, '10.00', 5),
(279, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:49:02', 1, 'c6601c103a6ca08df146bcf4308e1ff0.jpg', 0, 1, '10.00', 5),
(280, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:49:05', 1, 'c3999e8ef42a8f4cd2e6ad8c6ab2b72f.jpg', 0, 1, '10.00', 5),
(281, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:49:09', 1, '9f00e6e14d4281a8f05be02f799f806f.jpg', 0, 1, '10.00', 5),
(282, 'Short Jeans', 'Short Jeans', '25.00', '2017-03-05 17:49:13', 1, '4916dfffd00433c2c27d470cc5b900ba.jpg', 0, 1, '10.00', 5),
(283, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:50:26', 1, '75a21dcf91c949d840956dcb368c21ea.jpg', 0, 1, '5.00', 3),
(284, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:50:31', 1, '3176bba0ba80f59f140904458b900b0c.jpg', 0, 1, '5.00', 3),
(285, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:50:35', 1, '8d67aa9c373ab5bb8859be4267b7c9ba.jpg', 0, 1, '5.00', 3),
(286, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:52:37', 1, '35c40d7d9eb6eb8360481755d5f2a227.jpg', 0, 1, '5.00', 3),
(287, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:52:40', 1, 'e257b165a8536f59ba18bafe57c2b3a7.jpg', 0, 1, '5.00', 3),
(288, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:52:44', 1, '22d112f63e289177d1fa584ea402166e.jpg', 0, 1, '5.00', 3),
(289, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:52:48', 1, '0577c59dd4fa30091eca32d2f05df1fc.jpg', 0, 1, '5.00', 3),
(290, 'Cropped Variados ', 'Cropped Variados ', '10.00', '2017-03-05 17:53:09', 1, '691f5e01a7503d0f0f1ac8e82a7a669b.jpg', 0, 1, '5.00', 3),
(292, 'Conjunto Pompom Preto', 'Conjunto Pompom Preto', '30.00', '2017-03-05 17:53:57', 1, '58f9ff86b01e77f7ec0997f6c402ddd4.jpg', 0, 1, '15.00', 6),
(293, 'Conjunto Pompom Rosa', 'Conjunto Pompom Rosa', '30.00', '2017-03-05 17:54:13', 1, 'a8b48d4a24be1ac0836a280d6d48cc87.jpg', 0, 1, '15.00', 6),
(294, 'Conjunto Piguete Preto', 'Conjunto Piguete Preto', '30.00', '2017-03-05 17:54:44', 1, 'eae65a289695fcbcf61d4885b4ab1162.jpg', 0, 1, '15.00', 6),
(295, 'Conjunto Piguete Azul', 'Conjunto Piguete Azul', '30.00', '2017-03-05 17:54:51', 1, 'c0e902543b24eee37f44b2e6dbf146df.jpg', 0, 1, '15.00', 6),
(296, 'Conjunto Viscose', 'Conjunto Viscose', '30.00', '2017-03-05 17:55:14', 1, 'da91248fde86bcca67685ef5e77aaaf3.jpg', 0, 1, '15.00', 6),
(297, 'Conjunto Viscose', 'Conjunto Viscose', '30.00', '2017-03-05 17:55:17', 1, 'e6869dfc3d2c853b9868941a076b0502.jpg', 0, 1, '15.00', 6),
(298, 'Conjunto Viscose', 'Conjunto Viscose', '30.00', '2017-03-05 17:55:21', 1, 'c49ee1d39a5193a43a8d5edde73b8467.jpg', 0, 1, '15.00', 6),
(299, 'Conjunto Begaline', 'Conjunto Begaline', '30.00', '2017-03-05 17:55:33', 1, '873e8142f4ab5db3a0f9eb262230e5c8.jpg', 0, 1, '15.00', 6),
(300, 'Conjunto Begaline', 'Conjunto Begaline', '30.00', '2017-03-05 17:55:37', 1, '860dc26be8c1a974d3811c5dcc3e86e7.jpg', 0, 1, '15.00', 6),
(301, 'Conjunto Begaline', 'Conjunto Begaline', '30.00', '2017-03-05 17:55:40', 1, '979493144b19af6e0ce42f977db498f8.jpg', 0, 1, '15.00', 6),
(302, 'Conjunto Begaline', 'Conjunto Begaline', '30.00', '2017-03-05 17:55:51', 1, 'f2e836c3126548a1628d6771b29d58e8.jpg', 0, 1, '15.00', 6),
(303, 'Conjunto Begaline', 'Conjunto Begaline', '30.00', '2017-03-05 17:57:48', 1, '8f1ce93f1c7c920611c8851a783f71cc.jpg', 0, 1, '15.00', 6),
(304, 'Conjunto Begaline', 'Conjunto Begaline', '30.00', '2017-03-05 17:57:52', 1, 'cb89c9e36e263fc3c2706bc15e6cbe1c.jpg', 0, 1, '15.00', 6),
(305, 'Short Begaline', 'Short Begaline', '20.00', '2017-03-05 17:58:14', 1, 'e6c2609273366413f3d191131e8aa6db.jpg', 0, 1, '10.00', 5),
(306, 'Short Begaline', 'Short Begaline', '20.00', '2017-03-05 17:58:18', 1, '1d5e2e2636944b21b148c2aff9f645dc.jpg', 0, 1, '10.00', 5),
(307, 'Cropped Variados ', 'Cropped Variados ', '5.00', '2017-03-05 17:59:10', 1, 'b1a2a794db538f0581ede2a4579623d6.jpg', 0, 1, '5.00', 3),
(308, 'Body Variado', 'Body Variado', '15.00', '2017-03-05 17:59:31', 1, '433343458b5db4123fa738e36150e216.jpg', 0, 1, '5.00', 4),
(309, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 17:59:48', 1, '3394118231d0a26318d4de89fcca9e61.jpg', 0, 1, '10.00', 8),
(310, 'Calça Fitnes', 'Calça Fitnes', '20.00', '2017-03-05 17:59:51', 1, 'd6ac1968b6027b12bb519cfca9dc4c02.jpg', 0, 1, '10.00', 8),
(311, 'Macacão Fitnes', 'Macacão Fitnes', '40.00', '2017-03-05 18:00:56', 1, 'a7f17f78ceaf084be5f02b8cb9f1f665.jpg', 0, 1, '20.00', 12),
(312, 'Macacão Fitnes', 'Macacão Fitnes', '40.00', '2017-03-05 18:01:01', 1, '3f4cb74d719c1051fbab3571ef9291cd.jpg', 0, 1, '20.00', 12),
(313, 'Macacão Fitnes', 'Macacão Fitnes', '40.00', '2017-03-05 18:01:04', 1, '765f3d2830c274b8201c50c91eba7585.jpg', 0, 1, '20.00', 12),
(314, 'Macacão Fitnes', 'Macacão Fitnes', '40.00', '2017-03-05 18:01:10', 1, '68aff04f8f6945b659eb618fc4e771a2.jpg', 0, 1, '25.00', 12),
(315, 'Bolsa Variadas', 'Bolsa Variadas', '10.00', '2017-03-05 18:01:44', 1, '33a1704055430e2381c26539f21667f3.jpg', 0, 1, '5.00', 11),
(316, 'Bolsa Variadas', 'Bolsa Variadas', '10.00', '2017-03-05 18:01:47', 1, '8c10b33e164e305fe9ea7ba651190a80.jpg', 0, 1, '5.00', 11),
(317, 'Bolsa Variadas', 'Bolsa Variadas', '10.00', '2017-03-05 18:01:51', 1, '9184312f9557c0f8bc5c1dcedd8868b5.jpg', 0, 1, '5.00', 11),
(318, 'Bolsa Variadas', 'Bolsa Variadas', '10.00', '2017-03-05 18:01:54', 1, '439344d0be46cb2b482d4dcc68b590ca.jpg', 0, 1, '5.00', 11),
(319, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:03:50', 1, '620669a2def92ed949dda9128cc764aa.jpg', 0, 1, '5.00', 17),
(320, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:03:54', 1, '7b5420abd38771dc2fbea13c15118468.jpg', 0, 1, '5.00', 17),
(321, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:00', 1, 'ced4a50f956d9bf1d863247d872f774f.jpg', 0, 1, '5.00', 17),
(322, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:04', 1, '8afe1437240a28dc61fbc75c75354f25.jpg', 0, 1, '5.00', 17),
(323, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:09', 1, '920e63ed3fcb37b1ba13b028eea90bd1.jpg', 0, 1, '5.00', 17),
(324, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:17', 1, 'a61f46d7bc434e40abdf03f7e251af6f.jpg', 0, 1, '5.00', 17),
(325, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:21', 1, 'b815253c5930226c8cf8e30e13428de3.jpg', 0, 1, '5.00', 17),
(326, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:25', 1, 'ea2acfd0e80866f45c0ca53d19f44037.jpg', 0, 1, '5.00', 17),
(327, 'Brinco Variados', 'Brinco Variados', '10.00', '2017-03-05 18:04:28', 1, 'b42ab8357e3569da6e6f7c66b88e7097.jpg', 0, 1, '5.00', 17),
(328, 'Colar', 'Colar', '20.00', '2017-03-05 18:04:40', 1, 'ca7901becbfaa8ed0ec18ff4bdba32c8.jpg', 0, 1, '10.00', 17),
(329, 'Bolsa Variadas', 'Bolsa Variadas', '10.00', '2017-03-05 18:08:57', 1, '5b786be3af82f53f15e7c1883778aac6.jpg', 0, 1, '5.00', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_venda`
--

CREATE TABLE `tipo_venda` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_venda`
--

INSERT INTO `tipo_venda` (`id`, `nome`) VALUES
(1, 'a vista'),
(2, 'debito'),
(3, 'credito'),
(4, 'credito parcelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `id_facebook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`, `id_facebook`) VALUES
(1, 'dieos', 'iIHwcNBWH6ncLRHxskkXXndLf2L_aT9L', '$2y$13$.YYlkkwSuVHRhTzELX4g..E0de/TQQdc4suA0M8wuVddvoP6ikqne', NULL, 'dieos2@gmail.com', 10, 1424098148, 1424098148, 30, 0),
(2, 'dieos2', 'iIHwcNBWH6ncLRHxskkXXndLf2L_aT9L', '$2y$13$.YYlkkwSuVHRhTzELX4g..E0de/TQQdc4suA0M8wuVddvoP6ikqne', NULL, 'dieos2@gmail.com', 10, 1424098148, 1424098148, 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_caixa` int(11) DEFAULT NULL,
  `id_vendaTipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `valor`, `data`, `id_cliente`, `id_caixa`, `id_vendaTipo`) VALUES
(6, '160.00', '2017-03-05 22:08:57', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda_produto`
--

INSERT INTO `venda_produto` (`id`, `id_produto`, `valor`, `id_venda`) VALUES
(57, 21, '40.00', 6),
(58, 22, '40.00', 6),
(59, 23, '40.00', 6),
(60, 24, '40.00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
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
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `tipo_venda`
--
ALTER TABLE `tipo_venda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_caixa` (`id_caixa`),
  ADD KEY `id_vendaTipo` (`id_vendaTipo`);

--
-- Indexes for table `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`,`id_venda`),
  ADD KEY `id_venda` (`id_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT for table `tipo_venda`
--
ALTER TABLE `tipo_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `venda_produto`
--
ALTER TABLE `venda_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_caixa`) REFERENCES `caixa` (`id`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_vendaTipo`) REFERENCES `tipo_venda` (`id`);

--
-- Limitadores para a tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD CONSTRAINT `venda_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `venda_produto_ibfk_2` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
