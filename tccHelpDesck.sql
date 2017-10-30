CREATE TABLE tipo_usuario(
  codigo int,
  descricao varchar(30),
  primary key (codigo)
);

CREATE TABLE tipo_sistema(
  codigo int auto_increment,
  descricao varchar(30),
  primary key (codigo)
);


CREATE TABLE usuario(
    codigo int auto_increment,
    nome varchar (50),
    login varchar (30),
    senha varchar (200),
    status boolean,
    cod_tipo_usuario int,
    primary key(codigo),
foreign key(cod_tipo_usuario) references tipo_usuario(codigo)       
    );
    
CREATE TABLE usuario_tipo_sistema(
    cod_usuario int,
    cod_tipo_sistema int,
    primary key (cod_usuario, cod_tipo_sistema),
    foreign key (cod_usuario) references usuario(codigo),
    foreign key (cod_tipo_sistema) references tipo_sistema(codigo)
    );
    
       insert into usuario
    (codigo, nome, login, senha, status, cod_tipo_usuario)
    values
    (1,'Administrador','adm','123',true,1);
    
        
  insert into usuario
    (codigo, nome, login, senha, status, cod_tipo_usuario)
    values
    (2,'Marcio','Mar','123',true,2);
    
      insert into usuario
    (codigo, nome, login, senha, status, cod_tipo_usuario)
    values
    (3,'Rafael','Raf','123',true,3); 
    
    insert into tipo_usuario
    (codigo, descricao)
    values
    (1,'Administrador');
    
    
    
    insert into tipo_usuario
    (codigo, descricao)
    values
       
    (2,'Coordenador');
    
    insert into tipo_usuario
    (codigo, descricao)
    values
    (3,'Professor');
    
    insert into tipo_usuario
    (codigo, descricao)
    values
    (4,'Aluno');
    
    
    insert into tipo_sistema
    (codigo, descricao)
    values
    (1,'HelpKesk');
    
    insert into tipo_sistema
    (codigo, descricao)
    values
    
    (2,'Shar.Five');
    
    
    
    
    insert into usuario
    (codigo, nome, login, senha, status, cod_tipo_usuario)
    values
    (1,'Administrador','adm','123',true,1)
    
    
    
    
    
    insert into usuario_tipo_sistema
    (cod_usuario,cod_tipo_sistema)
    values
    (1,1)
    
    insert into usuario_tipo_sistema
    (cod_usuario,cod_tipo_sistema)
    values
    (1,2)
    
    
CREATE TABLE curso(
    codigo int auto_increment,
    descricao varchar (30),
    carga_horaria int,
    cod_usuario_coordenador int,
    cod_usuario_alteacao int,   
    primary key(codigo)
    );
    
CREATE TABLE serie(
    codigo int,
    descricao varchar(30),
    primary key (codigo)
);

CREATE TABLE periodo(
codigo int,
descricao varchar(30),
primary key (codigo)
);


CREATE TABLE turma(
codigo int,
descricao varchar(30),
cod_curso int,
ano int,
cod_periodo int,
cod_serie int,
primary key (codigo),
    foreign key (cod_curso) references curso(codigo),
    foreign key (cod_periodo) references periodo(codigo),
 foreign key (cod_serie) references serie(codigo)
    );

CREATE TABLE disciplina(
codigo int,
descricao varchar(30),
carga_horaria int,
status boolean,
primary key (codigo)
);


CREATE TABLE turma_disciplina(
cod_turma int,
cod_disciplina int,
cod_usuario_professor int,
primary key (cod_turma, cod_disciplina, cod_usuario_professor),
foreign key (cod_turma) references turma(codigo),
    foreign key (cod_disciplina) references disciplina(codigo),
 foreign key (cod_usuario_professor) references usuario(codigo)
);


CREATE TABLE usuario_aluno_turma(
cod_usuario_aluno int,
cod_turma int,
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
pergunta text,
resposta text,
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
