<?php
  if (
      isset($_POST["acao"]) &&
      isset($_POST["cod_turma"]) &&
      isset($_POST["cod_disciplina"]) &&
      isset($_POST["cod_tipo_usuario"])
  ){
      $acao=$_POST["acao"];
      $codTurma=$_POST["cod_turma"];
      $cod_disciplina=$_POST["cod_disciplina"];
      $cod_usuario_professor=$_POST["cod_tipo_usuario"];
     
      if (isset($_POST["cod_turma_disciplina"])){
           $cod_turma_disciplina=$_POST["cod_turma_disciplina"];
      }
    	include("../Model/classeturmaDisciplina.php");
    	$cadastro = new TurmaDisciplina();

    	if($acao =="cadastrar"){
            $cadastro->cadastrar($codTurma, $cod_disciplina, $cod_usuario_professor);
        }elseif ($acao=="alterar" && $cod_turma_disciplina){

    	    $cadastro->alterar($cod_turma_disciplina, $cod_disciplina, $cod_usuario_professor);
        }

    	if($cadastro){
    	  header('location: ../index.php?pagina=formsCadastroTurmaDisciplina.php&mensagem=sucesso');
    	}else{
    	  header('location: ../index.php?pagina=formsCadastroTurmaDisciplina.php&mensagem=erro');
    	}
  }else{
    //header('location: ../Views/formsCadastroTurmaDisciplina.php?mensagem=preencher campos');
  }
    
?>
