<?php
   $login= $_POST["login"];
   $senha= $_POST["senha"];
//   var_dump($_POST);
   include   ("../Model/usuario.php");
   
   $acesso = new conexao();
   
   $logar = $acesso->verificarusuario($login,$senha);
   
   if ($logar){//se logar for verdadeiro ele redireciona para a página de index dando continuidade
      session_start();
      $_SESSION["nome"]=$logar[1];
      //$_SESSION["tipo_usuario"] = $logar[5];
      $_SESSION["tipo_usuario"] = "1,2,3";
      header('location: ../index.php?mensagem=sucesso');
    }else{//caso contrário devolve ao formulário para inserir novo login
        header('location: ../Views/FormLogin.php?mensagem=erro');
   }
?> 
