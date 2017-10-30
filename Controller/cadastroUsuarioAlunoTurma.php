<?php
  if (
  isset($_POST["codUsuarioAluno"]) &&     
  isset($_POST["codTurma"]) 
  
  ){

          
    $ccodUsuarioAluno=$_POST["codUsuarioAluno"];
    $codTurma=$_POST["codTurma"];
   
	
	include("../Model/classeUsuarioAlunoTurma.php");
	$cadastro = new UsuarioAlunoTurma();
	$cadastro->cadastrar($codUsuarioAluno, $codTurma);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroUsuarioAlunoTurma.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroUsuarioAlunoTurma.php?mensagem=erro');
	}
    }else{
      header('location: ../Views/formsCadastroUsuarioAlunoTurma.php?mensagem=preencher campos');
    }
  }else{
    echo "Erro";
  }
?>
