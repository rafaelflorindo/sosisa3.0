CREATE TABLE `tipo_usuario` (
	  codigo int auto_increment,
  `descricao` varchar(30) DEFAULT NULL,
  primary key (codigo)
);

CREATE TABLE `tipo_sistema` (
	  codigo int auto_increment,
  `descricao` varchar(30) DEFAULT NULL,
  primary key (codigo)
);

CREATE TABLE usuario(
    codigo int auto_increment,
    nome varchar (50),
    login varchar (30),
    senha varchar (200),
    status boolean,
    primary key(codigo),
    );

CREATE TABLE `usuario_tipo_sistema` (
  `cod_usuario` int(11) NOT NULL,
  `cod_tipo_sistema` int(11) NOT NULL,
    primary key (cod_usuario, cod_tipo_sistema),
    foreign key (cod_usuario) references usuario(codigo),
    foreign key (cod_tipo_sistema) references tipo_sistema(codigo)
    );
    
CREATE TABLE `curso` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `cod_usuario_coordenador` int(11) DEFAULT NULL,
      primary key(codigo)
    );

CREATE TABLE `serie` (
  codigo int auto_increment,
  `descricao` varchar(30) DEFAULT NULL,
    primary key (codigo)
);


CREATE TABLE `periodo` (
  codigo int auto_increment,
  `descricao` varchar(30) DEFAULT NULL,
primary key (codigo)
);


CREATE TABLE `turma` (
  codigo int auto_increment,
  `descricao` varchar(30) DEFAULT NULL,
  `cod_curso` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `cod_periodo` int(11) DEFAULT NULL,
  `cod_serie` int(11) DEFAULT NULL,
	primary key (codigo),
    foreign key (cod_curso) references curso(codigo),
	foreign key (cod_periodo) references periodo(codigo),
	foreign key (cod_serie) references serie(codigo)
    );


CREATE TABLE `disciplina` (
  codigo int auto_increment,
  `descricao` varchar(30) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
primary key (codigo)
);


CREATE TABLE `turma_disciplina` (
  `cod_turma` int(11) NOT NULL,
  `cod_disciplina` int(11) NOT NULL,
  `cod_usuario_professor` int(11) NOT NULL,
primary key (cod_turma, cod_disciplina, cod_usuario_professor),
foreign key (cod_turma) references turma(codigo),
    foreign key (cod_disciplina) references disciplina(codigo),
 foreign key (cod_usuario_professor) references usuario(codigo)
);


CREATE TABLE `usuario_aluno_turma` (
  `cod_usuario_aluno` int(11) NOT NULL,
  `cod_turma` int(11) NOT NULL,
primary key (cod_usuario_aluno, cod_turma),
foreign key (cod_usuario_aluno) references usuario(codigo),
    foreign key (cod_turma) references turma(codigo)
);

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

CREATE TABLE `permissao` (
  `cod_usuario` int(11) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL
  primary key (cod_usuario, cod_tipo_usuario),
foreign key (cod_usuario) references usuario(cod_usuario),
foreign key (cod_tipo_usuario) references tipo_usuario(codigo)
  );

ALTER TABLE `permissao`
  ADD PRIMARY KEY (`cod_usuario`,`cod_tipo_usuario`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_tipo_usuario` (`cod_tipo_usuario`);

DELIMITER//
CREATE TRIGGER valorpadrao before insert
  on usuario for each row
begin
  if new.senha = '' then
    set new.senha = '1231';
    end IF;
end//

insert into usuario
  (login,senha)
  values
  ('ABC','');



DELIMITER //
create TRIGGER insereLog after insert on curso for each row
  begin
  insert into log(nome_tabela, log, chave, data)
  values
  ('curso','inseriu Coord: '|| new.cod_usuario_coordenador, 'codigo=' || new.codigo) ;
  end //

CREATE TABLE permissao(
cod_usuario int,
cod_tipo_usuario int,
primary key (cod_usuario, cod_tipo_usuario),
foreign key (cod_usuario) references usuario(codigo),
foreign key (cod_tipo_usuario) references tipo_usuario(codigo)
);
