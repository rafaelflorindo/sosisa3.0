<?php
 if (
  isset($_POST["descricao"]) 
  
  ){

        $descricao= $_POST["descricao"];
       
	    include("../Model/classeTipoUsuario.php");
	    $cadastro = new TipoUsuario();
	    $cadastro->cadastrar($descricao);
	      
	    if($cadastro){
	      header('location: ../Views/formsTipoUsuario.php?mensagem=sucesso');
	    }else{
	      header('location: ../Views/formsTipoUsuario.php?mensagem=erro');
	    }

    }
  
?>
