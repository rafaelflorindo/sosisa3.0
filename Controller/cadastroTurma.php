<?php
  
  if (
      isset($_POST["acao"]) &&
      isset($_POST["descricao"]) &&
      isset($_POST["cod_curso"]) &&
      isset($_POST["ano"]) &&
     isset($_POST["cod_periodo"]) &&
     isset($_POST["cod_serie"])
  ){
      var_dump($_POST);
    $acao=$_POST["acao"];

    $descricao=$_POST["descricao"];
    $cod_curso=$_POST["cod_curso"];
    $ano=$_POST["ano"];
    $cod_periodo=$_POST["cod_periodo"];
    $cod_serie=$_POST["cod_serie"];
   if (isset($_POST["cod_turma"])){
       $cod_turma=$_POST["cod_turma"];
   }
   echo $cod_turma;

	include("../Model/classeTurma.php");
	$cadastro = new Turma();

	if($acao=="cadastrar" && !$cod_turma){
        $retornoTurma = $cadastro->cadastrar($descricao, $cod_curso, $ano, $cod_periodo, $cod_serie);
        if($retornoTurma){
            session_start();
            $_SESSION["cod_turma"] = $retornoTurma;
            header('location: ../index.php?pagina=formsCadastroTurmaDisciplina.php&mensagem=sucesso');
        }else{
            header('location: ../index.php?pagina=formsCadastroTurma.php&mensagem=erro');
        }

    }elseif ($acao=="alterar" && $cod_turma){
	   /* echo "Alterar";
        echo "Turma = " . $cod_turma;
	    echo "Descrição = " . $descricao;
        echo "Curso = " . $cod_curso;
        echo "Ano = " . $ano;
        echo "Periodo = " . $cod_periodo;
        echo "serie = " . $cod_serie;
	    exit;*/
        $retornoTurmaAlterar = $cadastro->alterar($cod_turma, $descricao, $cod_curso, $ano, $cod_periodo, $cod_serie);
        if($retornoTurmaAlterar){
            header('location: ../index.php?pagina=formsCadastroTurma.php&acao=listar&mensagem=sucesso');
        }else{
            header('location: ../index.php?pagina=formsCadastroTurma.php&mensagem=erro');
        }
    }



  
    
    }else{
    echo "Erro!!!!";
    var_dump($_POST);
    exit;
  }
?>
