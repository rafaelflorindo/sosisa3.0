<?php

class conexao{
    private $login, $senha, $permissao, $conn, $tabela, $codigo;//autenticação de usuários


    public function __construct($tabela="usuario"){
        $this->tabela = $tabela;
    }

/*métodos mágicos*/
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    } 

    public function verificarusuario($login,$senha){
          $this->login = addslashes($login);//evita sqlInjection
          $this->senha = addslashes($senha);
          $this->senha = sha1(md5($senha));//encriptação dos dados
          echo "<br><hr>";
          include ('conect.php');
          echo $sql = "select * from $this->tabela where login = '$this->login' and senha ='$this->senha'";
          $retorno = $conn->query($sql);//roda a consulta sql no banco
          echo $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
          if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
              $user = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
              return  $user;//retorna um vetor com todos os valores do registro logado
          }else{
              return false;
          }
    }
    public function listaDisciplinas(){
        include ('conexao.php');
        $sql = "select * from $this->tabela";
        $retorno = $conectar->query($sql);//roda a consulta sql no banco
        $disciplinas=array();
        while ($disciplina = $retorno->fetch_array()){
            $disciplinas[]=$disciplina;
        }
        return $disciplinas;
    }

    public function listaUm($codigo){
        include ('conexao.php');
        $this->codigo=$codigo;
        $sql = "select * from $this->tabela where codigo= $this->codigo";
        $retorno = $conectar->query($sql);//roda a consulta sql no banco
        $disciplinas=array();
        while ($disciplina = $retorno->fetch_array()){
            $disciplinas[]=$disciplina;
        }
        return $disciplinas;

    }
    public function cadastrar($descricao){
        include("conexao.php");
        echo "Conectado";
        $this->descricao = $descricao;
         
        $sql="insert into tipo_disciplina (descricao) values ('$this->descricao')";

        $query=$conectar->query($sql);
        if ($query){
            return 1;
        }else{
          return 0;
        }
      }
        public function editar($codigo, $descricao, $cargaHoraria){
        include("conexao.php");
        //echo "Conectado";
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->cargaHoraria = $cargaHoraria;
         
     echo   $sql="update tipo_disciplina set descricao='$this->descricao' where codigo = '$this->codigo'";
//exit;
        $query=$conectar->query($sql);
        if ($query){
            echo "ok";
            //return 1;
        }else{
          echo "erro";
            //return 0;
        }
      }
}


