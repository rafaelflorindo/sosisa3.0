<?php

class Duvida{
    private $codTurma;
    private $codDisciplina;
    private $codUsuarioAluno;
    private $codUsuarioProfessor;
    private $pergunta;
    private $resposta;
    private $assunto;

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($codTurma, $codDisciplina, $codUsuarioAluno, $codUsuarioProfessor, $pergunta, $resposta, $assunto){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->codTurma = $codTurma;
      $this->codDisciplina = $codDisciplina;
      $this->codUsuarioAluno = $codUsuarioAluno;
      $this->codUsuarioProfessor = $codUsuarioProfessor;
      $this->pergunta = $pergunta;
      $this->resposta = $resposta;
      $this->assunto = $assunto;

      $sql="insert into duvida (codTurma, codDisciplina, codUsuarioAluno, codUsuarioProfessor, pergunta, resposta, assunto) values 
      ('$this->codTurma', '$this->codDisciplina', '$this->codUsuarioAluno','$this->codUsuarioProfessor','$this->pergunta','$this->resposta','$this->assunto')";
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }
    public function listaDuvidaTotal(){
        $sql = "select * from duvida";

        $retorno = $this->conexao->query($sql);//roda a consulta sql no banco
        $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql

        if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
          $duvidas = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
          return $duvidas;
        }else{
          return false;
        }
    }
    public function listaDuvidaUm($codDuvida){
        $this->codDuvida = $codDuvida;
        $sql = "select * from duvida where codDuvida = $this->codDuvida";

        $retorno = $this->conexao->query($sql);//roda a consulta sql no banco
        $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql

        if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
            $duvidas = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
            return $duvidas;
        }else{
            return false;
        }
    }
    
}//fim da classe

?>
