<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 11/10/2017
 * Time: 10:59
 */

if (isset($_POST["codigo"])){
    include("../Model/classeCurso.php");
    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $carga_horaria = $_POST["carga_horaria"];
    $cod_usuario_coordenador = $_POST["cod_usuario_coordenador"];

    
    $buscarCurso = new Curso("curso");

    $retornoCurso = $buscarCurso->editar($codigo, $descricao, $carga_horaria, $cod_usuario_coordenador);
    /*foreach($retornoUsuario as $linha) {
        echo $linha['codigo'];
        echo $linha['descricao'];
        $date = new DateTime($linha['dataCadastro']);

        echo $date->format('d-m-Y h:m:s');
    }*/
}