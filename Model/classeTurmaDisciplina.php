<?php

class TurmaDisciplina{
    private $CodTurma;
    private $CodDisciplina;
    private $codUsuarioProfessor;
    private $cod_turma_disciplina;
    
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($CodTurma, $CodDisciplina, $codUsuarioProfessor){
      
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

     public function alterar($cod_turma_disciplina, $cod_disciplina, $cod_usuario_professor){
         echo "alterar";
         echo "cod TurmaDisciplina = " . $cod_turma_disciplina;
         echo "cod Disciplina = " . $cod_disciplina;
         echo "cod professor = " .$cod_usuario_professor;


        include("conexao.php");
        echo "Conectado";
        $this->cod_turma_disciplina = $cod_turma_disciplina;
        $this->cod_disciplina = $cod_disciplina;
        $this->cod_usuario_professor = $cod_usuario_professor;
        echo "<hr>";
        echo $sql = "update turma_disciplina set cod_disciplina='$this->cod_disciplina', cod_usuario_professor ='$this->cod_usuario_professor' 
        where cod_turma_disciplina ='$this->cod_turma_disciplina'";

        $query=$conectar->query($sql);

        if ($query){
      	    return 1;
        }else{
            printf("Errormessage: %s\n", $conectar->error);
	        return 0;
        }
     }


    public function listaturma_Disciplina(){
      //echo $_SESSION["cod_turma"]; 
              $this->CodTurma = $_SESSION["cod_turma"]; //seta o valor que esta na sessao cod_turma na variavel da classe CodTurma
              $sql = "select * from turma_disciplina where cod_turma = $this->CodTurma";
              //$_SESSION["cod_turma"];
              include("conexao.php");
            	$retorno = $conectar->query($sql);//roda a consulta sql no banco
              $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
        
              if($row_cnt > 0){//se o numero de linha for maior que 0 ele retorna o vetor com os dados do usuário
              //$tipoCurso = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
              $CodTurma = array();    //CRIA ARRAY VAZIO
              while ($linha = $retorno->fetch_array()) {//colocar os dados do usuário selecionado em um veto
              $CodTurma[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
    }

    return $CodTurma;
    }else{
    return false;

    }
    }
}


?>
