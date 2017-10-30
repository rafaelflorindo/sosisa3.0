<?php
  if (
  isset($_POST["codTurma"]) && 
  isset($_POST["codDisciplina"]) &&  
  isset($_POST["codUsuarioAluno"]) && 
  isset($_POST["codUsuarioProfessor"]) && 
  isset($_POST["pergunta"]) &&   
  isset($_POST["resposta"]) && 
  isset($_POST["assunto"])
  ){

    $codTurma=$_POST["codTurma"];
    $codDisciplina=$_POST["codDisciplina"];
    $codUsuarioAluno=$_POST["codUsuarioAluno"];
    $codUsuarioProfessor=$_POST["codUsuarioProfessor"];
    $pergunta=$_POST["pergunta"];
    $resposta=$_POST["resposta"];
    $assunto=$_POST["assunto"];
      
	
	include("../Model/classeDuvida.php");
	$cadastro = new Duvida();
	$cadastro->cadastrar($codTurm, $codDisciplin, $codUsuarioAluno, $codUsuarioProfessor, $pergunta, $resposta, $assunto);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroDuvida.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroDuvida.php?mensagem=erro');
	}
    }else{
      header('location: ../Views/formsCadastroDuvida.php?mensagem=preencher os campos');
    }
  }else{
    echo "Erro";
  }
?>
