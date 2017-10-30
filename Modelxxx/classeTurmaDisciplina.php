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
    public function listaturma_Disciplina(){
              //echo $_SESSION["cod_turma"];
              $this->CodTurma = $_SESSION["cod_turma"];
            	$sql = "select * from turma_disciplina where cod_turma = $this->CodTurma";
              include("conexao.php");
            	$retorno = $conectar->query($sql);//roda a consulta sql no banco

            	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
            	
            	//$retorno=$conectar->query($sql);
              $tipo = array();    //CRIA ARRAY VAZIO
              while ($linha = $conectar = $retorno ->fetch_array()) {
                  $tipo[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
              }
              return $tipo;   //RETORNA O ARRAY
            }
    
}//fim da classe

?>
