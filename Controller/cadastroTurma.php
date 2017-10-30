<?php
  
  if (
  isset($_POST["descricao"]) && 
  isset($_POST["cod_curso"]) && 
  isset($_POST["ano"]) && 
  isset($_POST["cod_periodo"]) && 
  isset($_POST["cod_serie"]) 
  
  ){
echo "ESTOU AQUI!!!!";
 var_dump($_POST);
//exit;
    $descricao=$_POST["descricao"];
    $cod_curso=$_POST["cod_curso"];
    $ano=$_POST["ano"];
    $cod_periodo=$_POST["cod_periodo"];
    $cod_serie=$_POST["cod_serie"];
   
	
	include("../Model/classeTurma.php");
	$cadastro = new Turma();
	$retornoTurma = $cadastro->cadastrar($descricao, $cod_curso, $ano, $cod_periodo, $cod_serie);

	if($retornoTurma){
    //echo $retornoTurma;
    session_start();
    $_SESSION["cod_turma"] = $retornoTurma;

    //echo "<hr>". $_SESSION["cod_turma"];
    //exit;
	  //header('location: ../Views/formsCadastroTurma.php?mensagem=sucesso');

    header('location: ../index.php?pagina=formsCadastroTurmaDisciplina.php');
	  }else{
	  header('location: ../index.php?pagina=formsCadastroTurmaDisciplina.php');
    }
  
    
    }else{
    echo "Erro!!!!";
    var_dump($_POST);
    exit;
  }
?>
