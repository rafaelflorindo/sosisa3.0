<?php

class UsuarioAlunoTurma{
    private $codUsuarioAluno;
    private $codTurma;
     
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($codUsuarioAluno, $codTurma){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->codUsuarioAluno = $codUsuarioAlunoo;
      $this->codTurma = $codTurma;
      
           
      $sql="insert into Usuario_Aluno_Turma (codUsuarioAluno, codTurma) values 
      ('$this->codUsuarioAluno', '$this->codTurma')";
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }
    public function listaUsuario_Aluno_Turma(){
	/*$sql = "select * from Usuario_Aluno_Turma";

	$retorno = $this->conexao->query($sql);//roda a consulta sql no banco
	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
	
	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
	  return $tipoUsuario;
	}else{
	  return false;
	}*/
    }
    
}//fim da classe

?>
