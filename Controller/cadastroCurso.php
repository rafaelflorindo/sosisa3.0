<?php
  if (
  isset($_POST["descricao"]) && 
  isset($_POST["cargaHoraria"]) && 
  isset($_POST["codUsuarioCoordenador"]) 

  ){

    $descricao=$_POST["descricao"];
    $carga_horaria=$_POST["carga_horaria"];
    $cod_usuario_coordenador=$_POST["cod_usuario_coordenador"];
      
 	include("../Model/classeCurso.php");
	$cadastro = new Curso();
	$cadastro->cadastrar($descricao, $carga_horaria, $cod_usuario_coordenador);
  $retornoCurso = $cadastro->cadastrar($descricao, $carga_horaria, $cod_usuario_coordenador);
	  
  if($retornoCurso){
    //echo $retornoCurso;
    session_start();
    $_SESSION["cod_curso"] = $retornoCurso;

    header('location: ../index.php?pagina=formsCadastroCurso.php');
    }else{
    header('location: ../index.php?pagina=formsCadastroCurso.php');
    }
  
    
    }else{
    echo "Erro!!!!";
    var_dump($_POST);
    exit;
  }
?>
