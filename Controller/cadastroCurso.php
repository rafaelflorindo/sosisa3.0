<?php
  if (
  isset($_POST["descricao"]) && 
  isset($_POST["cargaHoraria"]) && 
  isset($_POST["codUsuarioCoordenador"]) 

  ){

    $descricao=$_POST["descricao"];
    $cargaHoraria=$_POST["cargaHoraria"];
    $codUsuarioCoordenador=$_POST["codUsuarioCoordenador"];
      
 	include("../Model/classeCurso.php");
	$cadastro = new Curso();
	$cadastro->cadastrar($descricao, $cargaHoraria, $codUsuarioCoordenador);
	  
	if($cadastro){
	  header('location: ../Views/formsCadastroCurso.php?mensagem=sucesso');
	}else{
	  header('location: ../Views/formsCadastroCurso.php?mensagem=erro');
	}/*else{
      header('location: ../Views/formsCadastroCurso.php?mensagem=CoordenadorNaoConfere');
    }
  else{
    echo "Erro";
  }*/
}
?>