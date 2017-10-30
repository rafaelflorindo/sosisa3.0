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
    
    public function listaUsuarios(){
      $sql = "select * from usuario";
      include("conexao.php");
      
      $retorno = $conectar->query($sql);//roda a consulta sql no banco
      $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
      
      if($row_cnt > 0){//se o numero de linha for maior que 0 ele retorna o vetor com os dados do usuário
        //$tipoCurso = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
        $usuario = array();    //CRIA ARRAY VAZIO
      while ($linha = $retorno->fetch_array()) {//colocar os dados do usuário selecionado em um veto
          $usuario[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }

        return $usuario;
      }else{
        return false;

      }
        }


   public function listaUm(){
        $sql = "select * from $this->tabela where codigo= $this->codigo";
        include("conexao.php");
      $retorno = $conectar->query($sql);
      $row_cnt = $retorno->num_rows;
      if($row_cnt > 0){
        $usuario = array();
      while ($linha = $retorno->fetch_array()) {
          $usuario[] = $linha;
      }
        return $usuario;
      }else{
        return false;
      }
        }




   public function cadastrar(){
        $sql="insert into tipo_usuario (descricao) values ('$this->descricao')";
        include("conexao.php");
      $retorno = $conectar->query($sql);
      $row_cnt = $retorno->num_rows;
      if($row_cnt > 0){
        $usuario = array();
      while ($linha = $retorno->fetch_array()) {
          $usuario[] = $linha;
      }
        return $usuario;
      }else{
        return false;
      }
        }


 public function editar(){
        echo   $sql="update tipo_usuario set descricao='$this->descricao' where codigo = '$this->codigo'";
        include("conexao.php");
      $retorno = $conectar->query($sql);
      $row_cnt = $retorno->num_rows;
      if($row_cnt > 0){
        $usuario = array();
      while ($linha = $retorno->fetch_array()) {
          $usuario[] = $linha;
      }
        return $usuario;
      }else{
        return false;
      }
        }

}


