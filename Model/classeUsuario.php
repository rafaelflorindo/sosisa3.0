<?php

class Usuario{
    private $nome;
    private $login;
    private $senha;
    private $tipoUsuario;
    private $status;
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;

    }

    public function cadastrar($nome, $login, $senha, $tipoUsuario, $status){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->nome = $nome;
      $this->login = $login;
      $this->tipoUsuario = $tipoUsuario;
      $this->status = $status;
      $this->senha = sha1(md5($senha));
      $sql="insert into usuario (nome, login, senha, cod_tipo_usuario, status) values 
      ('$this->nome', '$this->login', '$this->senha','$this->tipoUsuario','$this->status')";
     
      echo $sql; 
      $query=$conectar->query($sql);
      if ($query){
        return 1;
      }else{
  return 0;
      }
    }
    
    public function alterar($cod_usuario, $nome, $login,$senha, $cod_tipo_usuario,$status){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_usuario = $cod_usuario;
      $this->nome = $nome;
      $this->login = $login;
      $this->senha = $senha;  
      $this->cod_tipo_usuario = $cod_tipo_usuario;
      $this->status = $status;
     
      $sql="alter table usuario nome='$this->nome', login='$this->login', senha ='$this->senha',cod_tipo_usuario ='$this->cod_tipo_usuario',status ='$this->status' where cod_usuario ='$this->cod_usuario'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }

    







    public function listaTipoUsuario(){
    	include("conexao.php");
      $sql = "select * from usuario";

    	$retorno = $conectar->query($sql);//roda a consulta sql no banco
    	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
    	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
    	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
    	  return $tipoUsuario;
    	}else{
    	  return false;
    	}
    }

    public function listaUsuarioCoordenador(){
      $sql = "select codigo, nome from usuario WHERE cod_tipo_usuario = 2 AND status = true";
      include("conexao.php");
      $retorno=$conectar->query($sql);
      $tipo = array();    //CRIA ARRAY VAZIO
      while ($linha = $conectar = $retorno ->fetch_array()) {
          $tipo[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }
      return $tipo;   //RETORNA O ARRAY
    }

     public function listaUsuarioProfessor(){
      $sql = "select codigo, nome from usuario WHERE cod_tipo_usuario = 3 AND status = true";
      include("conexao.php");
      $retorno=$conectar->query($sql);
      $tipo = array();    //CRIA ARRAY VAZIO
      while ($linha = $conectar = $retorno ->fetch_array()) {
          $tipo[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }
      return $tipo;   //RETORNA O ARRAY
    }
    
}//fim da classe

?>
