-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2025 às 21:16
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
-- Banco de dados: `abepoli`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `senha_admin` varchar(255) NOT NULL,
  `nome_admin` varchar(255) DEFAULT NULL,
  `foto_admin` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `email_admin`, `senha_admin`, `nome_admin`, `foto_admin`) VALUES
(2, 'silvareginmr@gmail.com', 'reginaldo123', 'Reginaldo Abepoli', 0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000090504c5445fffffffbafa391b398fecf87fbab9efbaea4fed0868eb195fbada18baf93fbaa9d89ae91fbb2a6fed185fffaf9cfddd2feefeddde7dfeef3effdd3cdfccbc3feedeb97b79ef5f8f6fddcd7fcc0b7fee6e3fdcfc8fbb6abe2eae49ebca4abc4b0fdc590fcbeb4b4cbb9c1d3c5fcb79dc7d7cafddad4fcc094fbb2a1fdc293feca8bfcba9afbb59ed6e2d8bacfbefee3de44f438ba000009b649444154789ced9c6b77aa3814869582dc2c2a2a7885566bb53d55ffffbf9b04b022e4b295422293e7c3ac3933ebb8f2b26fd93b814e47a15028140a8542a15028140a854241c11b2e66b3d979e8895e483d78b3795f777484d37d1f0f452fe7cff126966e752fa07f9f4f452fe96ff9ccc9cb443a931639ab3777ba65f4556b5cd55b150d9899b1db124fa509c4666c8715e73a4d60b7db6f432cce4831f86bc489e8e5fd0154174d253e7f282e193e8ab3cdbbe80556c5eb330576bbceb31bf1cc362132e2b347e29c1d863812452fb11a5c277d7a371db24a4566c399e845dec770ba584caf659c1b864f16888bb9a527f49799eb7d0214ceaf3f303c8f9793e5e759d29dce62e5fca615cb592df07f1b03146615d13bcfbba841b62cf4949cd552c21debe4564cdaff81157ae3be934fbb963e974de3aaa4c5ea0fc15e3aeb96ffba3e16ad290fb143b2ace102a07049e990bbcebb44f148e990fa43be42fd4c6d20f5953412671421d67cc557b8e853f73dd2eccb3dfad68cafb04b1f01c8d33f723aa42ae867d1e212ea13882c2c432802b6668fa37f8a96d781744855e88b9687e07748557016a2f57586b50a94a1f70054f56a8816d899f2bbdc4a881f8c4f6bb6a12e3c1087b5a652198a3e60da94615cb84fa1f841ce3bc8888671f8f9b7fffafadaef3f0ef788146f434823df350efbef97d75ecaebcbf7fe00d6283e0e3b1e37991a87b7975eefe50afac35717a8517c2ee56edb0c637f232f13f9f20194285a5e8757f38dc3f76b495fa2f11f44a2047b9a0e3b128d9f97b2013389102b4ab02fc5d0d3a971a00a44006cb812ad2d85711b8125b0b7e71ad1115f2b52bcf2bc3435e11b432082a7303ff3170c79e669fcb0057223d192a054fc72b6ca9eca3321cf4da5f1d114af5c170f4c7d48e11753a123d5601f332e9af01fb91202153a4bd1826e988edffbc52e036d66380a595e2a9505a713dd295db0e487216b5b6375e528f509d3b9432e877c85b45c6ae9731946c1191382f5800a29f5d072de253220add6270a3971d87b2b29b474cb5a49750d9cb15fe3e7d2d79fa2c2c97028933a0c7b84c1ae87bdefb209fb12b967026782c10ec457529e91e5c83083372b353e589d45390a1389521ca85de08ed998463c90ff0ebec4210b0bfe409f1e89441f4d25ca6345c0c9a1f14149a7af8c298d3c5d21e44cc6f847f2d3de0b730c254bd7043b75323eca838cd7ef5225bc458693df0efd1a4d5162f7edb5776bc03d6f1c2cc1a01bb3849e3a1987af975e3215c6437dbe3e59a6a49d09fc5ccde87eecdfbe116ffb1fd0b18c1c4344b00d138df79dadc9f1be10e06ee5c3c8316403dcad7c18194e9c20c76a8f23c94b0a809b878f22870deb0c4439e29075b1b42a72e452e6cdd28ab7dde4a887ac9b26ab79258192ec693af40ed19a56cb42125c31b9f04994a89f2b86a82e491862c6658916ea0caadd7693a705c6cc8a236f077f2ca1dad56849eafd056f7ef3518f55720f0da49096a7e43221663a5925df65d19dd53c6b5d410a69f95692727f03feb8cee76c71fdb80e240ead09b9c394eb9d2e1a905ba7d698f816ad7c3e4a06b0a7412997308fb464d9cef000cc522d8f7074a5cbf44e1e13fe202e79336d587873cd9166bbc687db1ea7d79bbdf75cadd1a53b5c63c19dc45d1aa4f32a79c1d9d2b352fa34f0de34c9bdb335fc9ccce7934f09ab201bce6b89920cee2bc13ae2976510530d56d5776478afb03af41354c9aeac3dce827299a8350291a392ee1359d67355050e4baba8d1796f4392c9e12daddc474ff4ecab272d63315921d74431d96fe3974b33bce170dad68fcf2a140a4523ac07bee825d4cbc0b5ddb5e845d44aa069e646f422ea24d4daae706d6b9a3d10bd8a3a392285ed8ec3ad891486a25751273152a8895e44ad4428d144a217512761eb8b858f128db913bd8a3a19b9a8581c45afa24e06ff8b6261b7ba586c90c2a0d50a71396c75b148ca612c7a11b5d2facea2838a857912bd883a0971396c75c1f7ddb67787c99666247a1575d2fefe172bb45bad106f4b4de0b8d41f9ce2280aa228de8e9e6717b4832af4b781699b781ea099a6696bf1b3181e6fbc35be423f761371574c377a0e8d8942aecbedec82be54a3b8bdd01d41025218db657d183b6a3c1cc3e3360e4c8c166d06102f3af1158601c18099199bed4afc5de466b9204907b66bc7dc5325be429f2e1059b14147f53766d9974c1b8964ae9fab9061418cdbd87ee864521682746f190ab871c816a869c19f4b21b2d628b92015e9d235f214c61c810d6d6a8f2e6f191aad7de0d4c313ebc9a58faf8948dc719781133b5946f277a90a47805f6ec04d073c0ba6cf9adc0532f7a521cf45931faefd12c0082410e192064e4c85114461edbd970f5945f6b483b21456f73400f86803f502f49c2f12b5929611bd03f6613f5ab7425810fe523a8359d3a718dc429129acd74bc3bbf4e1f514f20d7d12058def9a330da4503025e26922f9f83000fe60cd871ef7ead34a16a34d84a1cfaee6230170a5c8736b458dbc2d0195c2e481d53b4e3edd91487312f3e9867232b3012bac370ca1b1525c552efd914fd7e055b6de4ddbdd99f497eb83279f90c24d58ef89c0faee4c9a615e35e1e6c22c2af4c1f16dd62af0b144932eecd731939b0ac55802167b64c26dbd0a8f8fda303760c1dbb6e2a6066e42fe20b21a90f68dc6a5669036357013d67d2ef7701c62cc34a12617686f7d0d9c48eb1f26ded139119697e6f9e45edb6d410457d9068ee51eac8799c43414a3624104d720bb81f37f70d92292ee6df06fd8f91f05ef489b18783f5e2e52fc4cd04db9003b46236f69541398c45fb15c404b90dbcc85c63b5b7cd22a71baca677de058c46dea8aca3d631a0268bf5678df0258819a3b92a95412536938eeae4903562aec06afc2dd3fc7b85daa9fec607e37d02128cf34291065fb4a1251ca4fba8b4b5e04cd489b15483f8386e18e6e922924ae9b1688ac5829a1467eeef21ea4ab68f2dcf7c2ae8a44fb685e77a6803ce3d6dc129259f34e6a590491f69b4cb93f639a822e32869be28d9e7b24e27f24ad2c77176806e2ae09ad834ad1983642bcd6d78d85de671b0415926ab26fe38c818579e88dc6477d35d9b7b137dd6e2cc32bdfc7e8c1784c9a3d96939ad4cb0e4db38edd879c35db83d3feafbb91e84669b87bc45951aaa1eed84c5b0a07cdb3de04f77a2b4a35142735ed48c6abeee128b6efb2a4b9098926345d29f5a51c379a4dbbee5626206552dbdec8e69f05d6db4803faab597252e49e3b89f20b157f748a6c176ecb8b3c37383dc745ee8470b48d6d17ecb2a6ed06db279277c11fede2005faa35a94af17b06b6169d9ee8758a12a1bf1e6c377184a4baae6b5f482507517c1aac9f585d9e30f47d7f3d3a1e0788e331c9327e4bb41159bb26f1ea628b589f5afd9aa542a15028140a8542a150281482f80f4ce5b514ed5392b90000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_produtos`
--

CREATE TABLE `categorias_produtos` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias_produtos`
--

INSERT INTO `categorias_produtos` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Vestuário'),
(2, 'Utensílios'),
(3, 'Itens Portáteis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id_doacao` int(11) NOT NULL,
  `doador` varchar(255) NOT NULL,
  `valores` int(11) NOT NULL,
  `destinado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(255) NOT NULL,
  `telefone_funcionario` int(13) NOT NULL,
  `email_funcionario` varchar(255) NOT NULL,
  `cargo_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `tipo` enum('foto','video') NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(255) NOT NULL,
  `texto_noticia` text NOT NULL,
  `imagem_noticia` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `imagem_produto` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `imagem_produto`, `nome_produto`, `preco_produto`, `id_categoria`) VALUES
(5, './img/camiseta produto abepoli.jpg', 'Camiseta Instituto Abepoli', 50, 1),
(6, './img/CAMISETA 2 - FUNDO TRANSPARENTE.png', 'Camiseta Abelha Jatai', 50, 1),
(7, './img/camiseta 3 abepoli.jpg', 'Camiseta Manadaçaia', 50, 1),
(8, './img/produto boné abepoli.jpg', 'Boné Instituto Abepoli', 50, 1),
(13, './img/copo 1 produto abepoli.jpg', 'Caneca Personalizada Instituto Abepoli', 50, 2),
(14, './img/copo produto abepoli.jpg', 'Caneca Personalizada Escola Meliponário', 50, 2),
(16, './img/ecobag produto abepoli.jpg', 'Bolsa EcoBag Personalizada Instituto Abepoli', 50, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id_doacao`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices para tabela `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id_doacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_produtos` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
