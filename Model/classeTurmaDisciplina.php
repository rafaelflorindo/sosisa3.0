<?php

class TurmaDisciplina{
    private $CodTurma;
    private $CodDisciplina;
    private $codUsuarioProfessor;
    
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($CodTurma, $CodDisciplina,$codUsuarioProfessor){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->CodTurma = $CodTurma;
      $this->CodDisciplina = $CodDisciplina;
      $this->codUsuarioProfessor = $codUsuarioProfessor;
   
      $sql="insert into turma_disciplina (cod_turma, cod_disciplina, cod_usuario_professor) values 
      ('$this->CodTurma', '$this->CodDisciplina', '$this->codUsuarioProfessor')";
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }

     public function alterar($cod_turma_disciplina,$CodTurma, $CodDisciplina, $codUsuarioProfessor){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_turma_disciplina = $cod_turma_disciplina;
      $this->CodTurma = $CodTurma;
      $this->CodDisciplina = $CodDisciplina;
      $this->codUsuarioProfessor = $codUsuarioProfessor;
           
      $sql="alter table turma_disciplina CodTurma='$this->CodTurma', CodDisciplina='$this->CodDisciplina', codUsuarioProfessor ='$this->codUsuarioProfessor' where cod_turma_discplina ='$this->cod_turma_discplina'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }


    public function listaturma_Disciplina(){
      echo $_SESSION["cod_turma"];
              $sql = "select * from turma_disciplina where cod_turma = $this->CodTurma";
              //;$_SESSION['cod_turma']";
              include("conexao.php");
            	$retorno =$conectar->query($sql);//roda a consulta sql no banco
            	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
            	
            	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
            	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
            	  return $tipoUsuario;
            	}else{
            	  return false;
            	}
    }
    
}//fim da classe

?>
