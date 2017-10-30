<?php
$login= $_POST["login"];
$senha= $_POST["senha"];
include   ("../Model/classeLogin.php");

$acesso = new Login();

$logar = $acesso->verificarusuario($login,$senha);

if ($logar){//se logar for verdadeiro ele redireciona para a página de index dando continuidade
    session_start();
    $_SESSION["nome"] = $logar[1];
    $permissao = $acesso->verificarPermissao($logar[0]);
    $_SESSION["permissao"] = $permissao;
    header('location: ../index.php?mensagem=sucesso');
}else{//caso contrário devolve ao formulário para inserir novo login
    header('location: ../Views/FormLogin.php?mensagem=erro');
}
?> 
