<?php
  if (
  isset($_POST["descricao"]) && 
  isset($_POST["cargaHoraria"]) && 
  isset($_POST["status"])
  ){

    $descricao=$_POST["descricao"];
    $cargaHoraria=$_POST["cargaHoraria"];
    $status=$_POST["status"];
      
    	
	include("../Model/classeDisciplina.php");
	$cadastro = new Disciplina();
	$cadastro->cadastrar(
	$descricao, $cargaHoraria, $status);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroDisciplina.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroDisciplina.php?mensagem=erro');
  }
  }
?>
