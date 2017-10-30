<?php
  if (
  isset($_POST["cod_turma"]) && 
  isset($_POST["cod_disciplina"]) &&   
  isset($_POST["cod_tipo_usuario"]) 
  
  ){

      $codTurma=$_POST["cod_turma"];      
      $codDisciplina=$_POST["cod_disciplina"];
      $codUsuarioProfessor=$_POST["cod_tipo_usuario"];
     
  	
    	include("./Model/classeturmaDisciplina.php");
    	$cadastro = new TurmaDisciplina();
    	$cadastro->cadastrar($codTurma, $codDisciplina, $codUsuarioProfessor);
    	  
    	if($cadastro){
    	  header('location: ./Views/formsCadastroTurmaDisciplina.php?mensagem=sucesso');
    	}else{
    	  header('location: ./Views/formsCadastroTurmaDisciplina.php?mensagem=erro');
    	}
  }else{
    header('location: ./Views/formsCadastroTurmaDisciplina.php?mensagem=preencher campos');
  }
    
?>
