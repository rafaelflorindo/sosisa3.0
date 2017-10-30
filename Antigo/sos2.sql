-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Out-2017 às 02:19
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sos2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `codigo` int(11) NOT NULL,
  `cod_turma` int(11) DEFAULT NULL,
  `cod_disciplina` int(11) DEFAULT NULL,
  `cod_usuario_professor` int(11) DEFAULT NULL,
  `caminho` varchar(20) DEFAULT NULL,
  `assunto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `cod_usuario_coordenador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codigo`, `descricao`, `carga_horaria`, `cod_usuario_coordenador`) VALUES
(1, 'adm', 101, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`codigo`, `descricao`, `carga_horaria`, `status`) VALUES
(1, 'IPW', 60, 1),
(2, 'BD', 60, 1),
(3, 'LP', 80, 1),
(4, 'IPW', 0, 1),
(5, 'LP', 0, 1),
(6, 'BD', 0, 1),
(7, 'PP', 202, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvida`
--

CREATE TABLE `duvida` (
  `codigo` int(11) NOT NULL,
  `cod_turma` int(11) DEFAULT NULL,
  `cod_disciplina` int(11) DEFAULT NULL,
  `cod_usuario_professor` int(11) DEFAULT NULL,
  `assunto` varchar(20) DEFAULT NULL,
  `pergunta` longtext,
  `resposta` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `codigo` int(11) NOT NULL,
  `chave` varchar(30) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log` text,
  `nome_tabela` varchar(30) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`codigo`, `descricao`) VALUES
(1, ''),
(2, '1BIM'),
(3, 'A'),
(4, 'A'),
(5, 'B'),
(6, 'C'),
(7, '1bim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `cod_usuario` int(11) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `serie`
--

INSERT INTO `serie` (`codigo`, `descricao`) VALUES
(1, 'A'),
(3, 'B'),
(4, 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sistema`
--

CREATE TABLE `tipo_sistema` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`codigo`, `descricao`, `dataCadastro`) VALUES
(1, 'Administrador', '2017-10-12 01:01:54'),
(2, 'Coordenador', '2017-10-12 01:01:54'),
(3, 'Professor (a)', '2017-10-12 01:19:15'),
(4, 'Aluno', '2017-10-12 01:01:54'),
(5, 'Diretor', '2017-10-12 01:01:54'),
(6, 'Zelador', '2017-10-18 22:30:28'),
(7, 'Zelador', '2017-10-18 22:32:54'),
(8, 'gandula', '2017-10-18 22:35:19'),
(9, 'Diretoria', '2017-10-18 23:46:20'),
(10, 'Diretorias', '2017-10-18 23:49:11'),
(11, 'Diretoriasq', '2017-10-18 23:50:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `cod_periodo` int(11) DEFAULT NULL,
  `cod_serie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

CREATE TABLE `turma_disciplina` (
  `cod_turma` int(11) NOT NULL,
  `cod_disciplina` int(11) NOT NULL,
  `cod_usuario_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_aluno_turma`
--

CREATE TABLE `usuario_aluno_turma` (
  `cod_usuario_aluno` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_tipo_sistema`
--

CREATE TABLE `usuario_tipo_sistema` (
  `cod_usuario` int(11) NOT NULL,
  `cod_tipo_sistema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_turma` (`cod_turma`),
  ADD KEY `cod_disciplina` (`cod_disciplina`),
  ADD KEY `cod_usuario_professor` (`cod_usuario_professor`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `duvida`
--
ALTER TABLE `duvida`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_turma` (`cod_turma`),
  ADD KEY `cod_disciplina` (`cod_disciplina`),
  ADD KEY `cod_usuario_professor` (`cod_usuario_professor`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tipo_sistema`
--
ALTER TABLE `tipo_sistema`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_curso` (`cod_curso`),
  ADD KEY `cod_periodo` (`cod_periodo`),
  ADD KEY `cod_serie` (`cod_serie`);

--
-- Indexes for table `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD PRIMARY KEY (`cod_turma`,`cod_disciplina`,`cod_usuario_professor`),
  ADD KEY `cod_disciplina` (`cod_disciplina`),
  ADD KEY `cod_usuario_professor` (`cod_usuario_professor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuario_aluno_turma`
--
ALTER TABLE `usuario_aluno_turma`
  ADD PRIMARY KEY (`cod_usuario_aluno`,`cod_turma`),
  ADD KEY `cod_turma` (`cod_turma`);

--
-- Indexes for table `usuario_tipo_sistema`
--
ALTER TABLE `usuario_tipo_sistema`
  ADD PRIMARY KEY (`cod_usuario`,`cod_tipo_sistema`),
  ADD KEY `cod_tipo_sistema` (`cod_tipo_sistema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `periodo`
--
ALTER TABLE `periodo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipo_sistema`
--
ALTER TABLE `tipo_sistema`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`codigo`),
  ADD CONSTRAINT `arquivo_ibfk_2` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`codigo`),
  ADD CONSTRAINT `arquivo_ibfk_3` FOREIGN KEY (`cod_usuario_professor`) REFERENCES `usuario` (`codigo`);

--
-- Limitadores para a tabela `duvida`
--
ALTER TABLE `duvida`
  ADD CONSTRAINT `duvida_ibfk_1` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`codigo`),
  ADD CONSTRAINT `duvida_ibfk_2` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`codigo`),
  ADD CONSTRAINT `duvida_ibfk_3` FOREIGN KEY (`cod_usuario_professor`) REFERENCES `usuario` (`codigo`);

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`codigo`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`cod_curso`) REFERENCES `curso` (`codigo`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`cod_periodo`) REFERENCES `periodo` (`codigo`),
  ADD CONSTRAINT `turma_ibfk_3` FOREIGN KEY (`cod_serie`) REFERENCES `serie` (`codigo`);

--
-- Limitadores para a tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `turma_disciplina_ibfk_1` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`codigo`),
  ADD CONSTRAINT `turma_disciplina_ibfk_2` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`codigo`),
  ADD CONSTRAINT `turma_disciplina_ibfk_3` FOREIGN KEY (`cod_usuario_professor`) REFERENCES `usuario` (`codigo`);

--
-- Limitadores para a tabela `usuario_aluno_turma`
--
ALTER TABLE `usuario_aluno_turma`
  ADD CONSTRAINT `usuario_aluno_turma_ibfk_1` FOREIGN KEY (`cod_usuario_aluno`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `usuario_aluno_turma_ibfk_2` FOREIGN KEY (`cod_turma`) REFERENCES `turma` (`codigo`);

--
-- Limitadores para a tabela `usuario_tipo_sistema`
--
ALTER TABLE `usuario_tipo_sistema`
  ADD CONSTRAINT `usuario_tipo_sistema_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`codigo`),
  ADD CONSTRAINT `usuario_tipo_sistema_ibfk_2` FOREIGN KEY (`cod_tipo_sistema`) REFERENCES `tipo_sistema` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
