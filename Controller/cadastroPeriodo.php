<?php
  if (
  isset($_POST["descricao"])
  ){

    $descricao=$_POST["descricao"];
   
      
 	include("../Model/classePeriodo.php");
	$cadastro = new Periodo();
	$cadastro->cadastrar($descricao);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroPeriodo.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroPeriodo.php?mensagem=erro');
	}


  }

?>