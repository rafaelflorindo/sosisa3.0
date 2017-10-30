<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 11/10/2017
 * Time: 10:59
 */

if (isset($_POST["codigo"])){
    include("../Model/disciplina.php");
    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
     $cargaHoraria = $_POST["cargaHoraria"];
    
    
    $buscarDisciplina = new conexao("tipo_Disciplina");

    $retornoDisciplina = $buscarDisciplina->editar($codigo, $descricao, $cargaHoraria);
    /*foreach($retornoUsuario as $linha) {
        echo $linha['codigo'];
        echo $linha['descricao'];
        $date = new DateTime($linha['dataCadastro']);

        echo $date->format('d-m-Y h:m:s');
    }*/
}