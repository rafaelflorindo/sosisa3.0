-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2017 às 15:19
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
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `cod_usuario_coordenador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sistema`
--

CREATE TABLE `tipo_sistema` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_sistema`
--

INSERT INTO `tipo_sistema` (`codigo`, `descricao`) VALUES
(1, 'Helpdesk'),
(2, 'Shar.Five');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`codigo`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Coordenador'),
(3, 'Professor'),
(4, 'Aluno');

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

CREATE TABLE `permissao` (
  `cod_usuario` int(11) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL,
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
  `status` tinyint(1) DEFAULT NULL,
  `cod_tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `nome`, `login`, `senha`, `status`, `cod_tipo_usuario`) VALUES
(1, 'Administrador', 'adm', 'adcd7048512e64b48da55b027577886ee5a36350', 1, 1);

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
-- Extraindo dados da tabela `usuario_tipo_sistema`
--

INSERT INTO `usuario_tipo_sistema` (`cod_usuario`, `cod_tipo_sistema`) VALUES
(1, 1),
(1, 2);

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_tipo_usuario` (`cod_tipo_usuario`);

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
-- AUTO_INCREMENT for table `tipo_sistema`
--
ALTER TABLE `tipo_sistema`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

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
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`codigo`);

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





CREATE TABLE duvida(
codigo int,
cod_turma int,
cod_disciplina int,
cod_usuario_professor int,
assunto varchar(20),
pergunta longtext,
resposta longtext,
primary key (codigo),
foreign key (cod_turma) references turma(codigo),
foreign key (cod_disciplina) references disciplina(codigo),
foreign key (cod_usuario_professor) references usuario(codigo)
);

insert into curso
    (codigo, descricao,carga_horaria,cod_usuario_coordenador)
    values
    (1,'TEC.INFORMATICA','60',1);
    
    insert into serie
    (codigo, descricao)
    values
    (1,'A');
    
   insert into periodo
    (codigo, descricao)
    values
    (1,'1bim'); 
    
    insert into turma
    (codigo, descricao,cod_curso,ano,cod_periodo,cod_serie)
    values
    (1,'ISA',1,2017,1,1);
    
    insert into disciplina
    (codigo, descricao, carga_horaria,status)
    values
    (1,'IPW',60,1);
    
     insert into duvida
    (codigo,cod_turma,cod_disciplina,cod_usuario_professor,assunto,pergunta,resposta)
    values
    (2,1,1,1,'rede','o que é rede', 'A tecnologia é a espinha dorsal dos negócios, seja para uma startup, PME ou empresa de grande porte. ... Se a sua empresa é uma provedora de serviços de TI e, portanto, desenvolve, implementa e/ou integra projetos em companhias de vários portes, você deve considerar o "monitoramento de redes" como um aliado.' );


 insert into duvida
    (codigo,cod_turma,cod_disciplina,cod_usuario_professor,assunto,pergunta,resposta)
    values
    (1,1,1,1,'rede','abc','aaee')



CREATE TABLE arquivo(
codigo int,
cod_turma int,
cod_disciplina int,
cod_usuario_professor int,
caminho varchar(20),
assunto varchar(30),
primary key (codigo),
foreign key (cod_turma) references turma(codigo),
foreign key (cod_disciplina) references disciplina(codigo),
foreign key (cod_usuario_professor) references usuario(codigo)
);


CREATE TABLE log(
codigo int,
chave varchar(30),
data timestamp,
log text,
nome_tabela varchar(30),
cod_usuario int,
primary key (codigo),
foreign key (cod_usuario) references usuario(codigo)
);


insert into disciplina
    (codigo, descricao, carga_horaria,status)
    values
    (1,'IPW',60,1);


insert into usuario
(codigo,nome,login,senha,status,cod_tipo_usuario)
values
(1,'Alessandro','adm',123,1,3)