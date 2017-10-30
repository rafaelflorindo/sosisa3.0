<?php
  if (
  isset($_POST["descricao"])

  ){

    $descricao=$_POST["descricao"];
   
      
 	include("../Model/classeTipoSistema.php");
	$cadastro = new TipoSistema();
	$cadastro->cadastrar($descricao);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroTipoSistema.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroTipoSistema.php?mensagem=erro');
	}
  }
?>