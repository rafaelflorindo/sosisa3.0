<?php
  if (
  isset($_POST["descricao"])
  ){

    $descricao=$_POST["descricao"];
   
      
 	include("../Model/classeSerie.php");
	$cadastro = new Serie();
	$cadastro->cadastrar($descricao);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroSerie.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroSerie.php?mensagem=erro');
	}


  }

?>