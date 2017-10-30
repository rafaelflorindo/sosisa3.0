<?php
  if (
  isset($_POST["nome"]) && 
  isset($_POST["login"]) && 
  isset($_POST["senha"]) &&
  isset($_POST["senhaDuplicada"]) && 
  isset($_POST["tipoUsuario"]) && 
  isset($_POST["status"])
  ){

    $nome=$_POST["nome"];
    $login=$_POST["login"];
    $senha=$_POST["senha"];
    $senhaDuplicada=$_POST["senhaDuplicada"];
    $tipoUsuario = implode(",", $_POST["tipoUsuario"]);
    $status=$_POST["status"];
      
    if ($senha == $senhaDuplicada){
	
	include("../Model/classeUsuario.php");
	$cadastro = new Usuario();
	$cadastro->cadastrar($nome, $login, $senha, $tipoUsuario, $status);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroUsuario.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroUsuario.php?mensagem=erro');
	}
    }else{
      header('location: ../Views/formsCadastroUsuario.php?mensagem=senhasNaoConferem');
    }
  }else{
    echo "Erro";
  }
?>