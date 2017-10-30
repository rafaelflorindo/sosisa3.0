<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 11/10/2017
 * Time: 10:59
 */

if (isset($_POST["codigo"])){
    include("../Model/usuario.php");
    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    
    $buscarUsuario = new conexao("tipo_usuario");

    $retornoUsuario = $buscarUsuario->editar($codigo, $descricao);
    /*foreach($retornoUsuario as $linha) {
        echo $linha['codigo'];
        echo $linha['descricao'];
        $date = new DateTime($linha['dataCadastro']);

        echo $date->format('d-m-Y h:m:s');
    }*/
}