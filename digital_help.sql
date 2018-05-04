-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2018 às 04:03
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_help`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('dmtshgug3onpnk4nhgu473m72vuk9seu', '::1', 1525395987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339353938373b),
('8vg4ib7r6pg969jqi192odottn8sl19o', '::1', 1525396412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339363431323b),
('qnjd5qnnd7moovsu8dlojmk9jb0o7a2q', '::1', 1525396881, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339363838313b7573756172696f7c4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a343a226e6f6d65223b733a32323a22456c656e6963696f204d61746f7320652053696c7661223b733a383a2274656c65666f6e65223b733a31353a22283734292039393930362d37313731223b733a353a226c6f67696e223b733a33303a22656c656e6963696f5f6469676974616c406d756e69636970696f2e636f6d223b733a353a2273656e6861223b733a33323a223035363665303664323338353562373862633737653366346633643664333532223b733a363a22737461747573223b733a313a2231223b733a353a226e6976656c223b733a31333a2241646d696e6973747261646f72223b733a31313a22646174615f637265617465223b733a31393a22323031382d30342d30372031323a34353a3337223b7d6c6f6761646f7c623a313b),
('fjrve17niphk3rsurjiadqrob42trt4a', '::1', 1525397294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339373239343b7573756172696f7c4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a343a226e6f6d65223b733a32323a22456c656e6963696f204d61746f7320652053696c7661223b733a383a2274656c65666f6e65223b733a31353a22283734292039393930362d37313731223b733a353a226c6f67696e223b733a33303a22656c656e6963696f5f6469676974616c406d756e69636970696f2e636f6d223b733a353a2273656e6861223b733a33323a223035363665303664323338353562373862633737653366346633643664333532223b733a363a22737461747573223b733a313a2231223b733a353a226e6976656c223b733a31333a2241646d696e6973747261646f72223b733a31313a22646174615f637265617465223b733a31393a22323031382d30342d30372031323a34353a3337223b7d6c6f6761646f7c623a313b),
('jt0lmsqbmsuu4rebems49iab18ddtqa9', '::1', 1525398135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339383133353b7573756172696f7c4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a343a226e6f6d65223b733a32323a22456c656e6963696f204d61746f7320652053696c7661223b733a383a2274656c65666f6e65223b733a31353a22283734292039393930362d37313731223b733a353a226c6f67696e223b733a33303a22656c656e6963696f5f6469676974616c406d756e69636970696f2e636f6d223b733a353a2273656e6861223b733a33323a223035363665303664323338353562373862633737653366346633643664333532223b733a363a22737461747573223b733a313a2231223b733a353a226e6976656c223b733a31333a2241646d696e6973747261646f72223b733a31313a22646174615f637265617465223b733a31393a22323031382d30342d30372031323a34353a3337223b7d6c6f6761646f7c623a313b),
('3jhavf5kspkuovufm3ehd37c4l690msh', '::1', 1525399383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339393338333b7573756172696f7c4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a343a226e6f6d65223b733a32323a22456c656e6963696f204d61746f7320652053696c7661223b733a383a2274656c65666f6e65223b733a31353a22283734292039393930362d37313731223b733a353a226c6f67696e223b733a33303a22656c656e6963696f5f6469676974616c406d756e69636970696f2e636f6d223b733a353a2273656e6861223b733a33323a223035363665303664323338353562373862633737653366346633643664333532223b733a363a22737461747573223b733a313a2231223b733a353a226e6976656c223b733a31333a2241646d696e6973747261646f72223b733a31313a22646174615f637265617465223b733a31393a22323031382d30342d30372031323a34353a3337223b7d6c6f6761646f7c623a313b),
('4en81vn2iqsis81jjseupqd86l216b0d', '::1', 1525399384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353339393338333b7573756172696f7c4f3a383a22737464436c617373223a383a7b733a323a226964223b733a313a2231223b733a343a226e6f6d65223b733a32323a22456c656e6963696f204d61746f7320652053696c7661223b733a383a2274656c65666f6e65223b733a31353a22283734292039393930362d37313731223b733a353a226c6f67696e223b733a33303a22656c656e6963696f5f6469676974616c406d756e69636970696f2e636f6d223b733a353a2273656e6861223b733a33323a223035363665303664323338353562373862633737653366346633643664333532223b733a363a22737461747573223b733a313a2231223b733a353a226e6976656c223b733a31333a2241646d696e6973747261646f72223b733a31313a22646174615f637265617465223b733a31393a22323031382d30342d30372031323a34353a3337223b7d6c6f6761646f7c623a313b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo_c`
--

CREATE TABLE `conteudo_c` (
  `id_c` int(11) NOT NULL,
  `titulo_c` int(11) DEFAULT NULL,
  `descricao_c` varchar(150) DEFAULT NULL,
  `categoria_fk_c` int(11) DEFAULT NULL COMMENT 'tabela man_categoria',
  `assunto_c` text,
  `revisar_publicado` enum('0','1') DEFAULT NULL,
  `data_c` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conteudo_c`
--

INSERT INTO `conteudo_c` (`id_c`, `titulo_c`, `descricao_c`, `categoria_fk_c`, `assunto_c`, `revisar_publicado`, `data_c`) VALUES
(3, 3, 'De onde ele vem?', 3, 'Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do \"de Finibus Bonorum et Malorum\" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, \"Lorem Ipsum dolor sit amet...\" vem de uma linha na seção 1.10.32.', '1', '2018-05-01 19:34:28'),
(4, 5, 'Novo titulo?', 3, 'Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do \"de Finibus Bonorum et Malorum\" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, \"Lorem Ipsum dolor sit amet...\" vem de uma linha na seção 1.10.32.', '1', '2018-05-01 19:46:28'),
(7, 4, 'Novo titulo trinta e três', 2, 'Visualizar o conteúdo HTML na guia Visualizar\r\nAnteriormente, a guia Visualizar no painel Rede mostrava o código de um recurso HTML em determinadas situações, enquanto renderizava uma visualização do HTML em outras. A guia Preview agora sempre faz uma renderização básica do HTML. Não se destina a ser um navegador completo, por isso pode não exibir o HTML exatamente como você espera. Se você quiser ver o código HTML, clique na guia Response ou clique com o botão direito do mouse em um recurso e selecione o painel Open in Sources ', '1', '2018-05-03 00:31:23'),
(8, 1, 'adicionando alunos ao sistemas', 4, '- Título =  Como adicionar alunos\r\n- Categoria = Usuários do sistema Município Digital.\r\nSubstituições locais agora funcionam com alguns estilos definidos em HTML\r\nQuando o DevTools lançou o Local Overrides no Chrome 65, uma limitação era que ele não podia rastrear alterações nos estilos definidos no HTML. Por exemplo, na figura 7 há uma regra de estilo na headdo documento que declara font-weight: boldde h1elementos.', '1', '2018-05-03 00:40:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `man_categoria`
--

CREATE TABLE `man_categoria` (
  `id_ct` int(11) NOT NULL,
  `nome_cat` varchar(50) DEFAULT NULL,
  `posicao_ct` int(11) DEFAULT '1',
  `img_cat` varchar(60) DEFAULT NULL,
  `data_ct` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `man_categoria`
--

INSERT INTO `man_categoria` (`id_ct`, `nome_cat`, `posicao_ct`, `img_cat`, `data_ct`) VALUES
(1, 'Categoria App', 1, 'f2ce34b1fdabf99a8be1c31fdf4066e9.svg', '2018-05-01 18:07:15'),
(2, 'Categoria Sistemas', 2, 'df889a7d2ed887a2e251c213091f3ecc.svg', '2018-05-01 18:07:34'),
(3, 'Categoria Alunos', 3, 'bbff01a14f6d91fdbe47dd98ffe0b8e8.svg', '2018-05-01 18:07:59'),
(4, 'Usuários do sistemas Município Digital', 7, '6cc7bb813d2a644bfa3ebd4bb850add5.svg', '2018-05-01 20:00:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `man_duvidas`
--

CREATE TABLE `man_duvidas` (
  `id_dv` int(11) NOT NULL,
  `nome_dv` varchar(100) DEFAULT NULL,
  `cargo_dv` varchar(50) DEFAULT NULL,
  `email_dv` varchar(75) DEFAULT NULL,
  `instituicao_dv` varchar(100) DEFAULT NULL,
  `telefone_dv` varchar(20) DEFAULT NULL,
  `assunto_dv` varchar(50) DEFAULT NULL,
  `msg_dv` text,
  `cliente_dv` enum('Não','Sim') DEFAULT NULL,
  `status_dv` enum('Novo','Não lida','Lida','Respondido') NOT NULL DEFAULT 'Novo',
  `data_dv` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `man_duvidas`
--

INSERT INTO `man_duvidas` (`id_dv`, `nome_dv`, `cargo_dv`, `email_dv`, `instituicao_dv`, `telefone_dv`, `assunto_dv`, `msg_dv`, `cliente_dv`, `status_dv`, `data_dv`) VALUES
(14, 'Elenicio', 'Diretor', 'eleniciosouza7@gmail.com', 'Escola Vida', '(47) 9.1987-5203', 'Como cadastrar aulas', 'From this tutorial we have started learning one new topics in Codeigniter tutorial. In this topics we will discuss how can we make crud system by using Ajax with Codeigniter framework. ', 'Não', 'Novo', '2018-04-28 16:00:38'),
(15, 'Taciene Matos', 'Professora', 'taci@gmail.com', 'Casa do Aluno', '(74) 9.8847-3333', 'Matricula dos alunos', 'We always require to add conformation box before delete mysql rows in our codeigniter 3 application. now what i will do, when user will click on delete button or link i want to pop up messages or jquery confirm box with message like \"Are you sure want to remove this item ?\" If user click Yes proceed to delete if click No nothing to do that\'s it. In this example we will create \"items\" table and two routes with GET and DELETE method. one route will list of all items and another for remove item. So basically we will also create one controller with two method. So it is very easy a', 'Sim', 'Novo', '2018-04-28 18:42:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `man_ordenacao`
--

CREATE TABLE `man_ordenacao` (
  `id_ordenacao` int(11) NOT NULL,
  `nome_ordenacao` varchar(100) DEFAULT NULL,
  `posicao_ordenacao` int(11) DEFAULT NULL,
  `id_categoria_fk` int(11) DEFAULT NULL COMMENT 'relação com man_categoria',
  `data_create_categoria` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `man_ordenacao`
--

INSERT INTO `man_ordenacao` (`id_ordenacao`, `nome_ordenacao`, `posicao_ordenacao`, `id_categoria_fk`, `data_create_categoria`) VALUES
(1, 'Ordenação 57', 1, 3, '2018-05-01 18:10:28'),
(2, 'Ordenação 2', 2, 2, '2018-05-01 18:10:44'),
(3, 'Ordenação 3', 3, 1, '2018-05-01 18:11:00'),
(4, 'Ordenação 22', 22, 1, '2018-05-01 18:45:26'),
(6, 'Ordenação 4', 4, 2, '2018-05-01 18:48:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `man_titulo`
--

CREATE TABLE `man_titulo` (
  `id_titulo` int(11) NOT NULL,
  `nome_titulo` varchar(100) DEFAULT NULL,
  `palavra_chave` varchar(255) DEFAULT NULL,
  `posicao_titulo` int(11) DEFAULT '1',
  `id_ordenacao_fk` int(11) DEFAULT NULL COMMENT 'relação com a tabela man_ordenação',
  `data_titulo` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `man_titulo`
--

INSERT INTO `man_titulo` (`id_titulo`, `nome_titulo`, `palavra_chave`, `posicao_titulo`, `id_ordenacao_fk`, `data_titulo`) VALUES
(1, 'Como adicionar alunos', 'alunos, adicionar, app, site', 1, 1, '2018-05-01 18:36:00'),
(3, 'Titulo 2', 'titulo dois, vários titulo', 2, 2, '2018-05-01 19:01:17'),
(4, 'Titulo 33', 'titulo três, títulos alunos, trinta a três', 3, 3, '2018-05-01 19:01:58'),
(5, 'Título 44', 'titulo quatro', 4, 6, '2018-05-01 19:06:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_log`
--

CREATE TABLE `usuarios_log` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `status` enum('1','2') DEFAULT '1',
  `nivel` enum('Administrador','Usuário') DEFAULT 'Usuário',
  `data_create` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_log`
--

INSERT INTO `usuarios_log` (`id`, `nome`, `telefone`, `login`, `senha`, `status`, `nivel`, `data_create`) VALUES
(1, 'Elenicio Matos e Silva', '(74) 99906-7171', 'elenicio_digital@municipio.com', '0566e06d23855b78bc77e3f4f3d6d352', '1', 'Administrador', '2018-04-07 12:45:37'),
(2, 'Gilva Silva Carvalho', '(74) 91234-1234', 'gilvan@municipio.com', 'b3beb4e9b63e77f9a780c1b602f589f2', '2', 'Administrador', '2018-04-12 20:46:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `conteudo_c`
--
ALTER TABLE `conteudo_c`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `fk_categoria` (`categoria_fk_c`),
  ADD KEY `fk_titulo` (`titulo_c`);

--
-- Indexes for table `man_categoria`
--
ALTER TABLE `man_categoria`
  ADD PRIMARY KEY (`id_ct`);

--
-- Indexes for table `man_duvidas`
--
ALTER TABLE `man_duvidas`
  ADD PRIMARY KEY (`id_dv`);

--
-- Indexes for table `man_ordenacao`
--
ALTER TABLE `man_ordenacao`
  ADD PRIMARY KEY (`id_ordenacao`),
  ADD KEY `fk_categoria_man` (`id_categoria_fk`);

--
-- Indexes for table `man_titulo`
--
ALTER TABLE `man_titulo`
  ADD PRIMARY KEY (`id_titulo`),
  ADD KEY `fk_man_ordenacao` (`id_ordenacao_fk`);

--
-- Indexes for table `usuarios_log`
--
ALTER TABLE `usuarios_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conteudo_c`
--
ALTER TABLE `conteudo_c`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `man_categoria`
--
ALTER TABLE `man_categoria`
  MODIFY `id_ct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `man_duvidas`
--
ALTER TABLE `man_duvidas`
  MODIFY `id_dv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `man_ordenacao`
--
ALTER TABLE `man_ordenacao`
  MODIFY `id_ordenacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `man_titulo`
--
ALTER TABLE `man_titulo`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios_log`
--
ALTER TABLE `usuarios_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conteudo_c`
--
ALTER TABLE `conteudo_c`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_fk_c`) REFERENCES `man_categoria` (`id_ct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_titulo` FOREIGN KEY (`titulo_c`) REFERENCES `man_titulo` (`id_titulo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `man_titulo`
--
ALTER TABLE `man_titulo`
  ADD CONSTRAINT `fk_man_ordenacao` FOREIGN KEY (`id_ordenacao_fk`) REFERENCES `man_ordenacao` (`id_ordenacao`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
