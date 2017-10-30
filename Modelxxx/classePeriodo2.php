<?php

class Periodo{
    private $descricao;
  
    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
}

    
   /* public function cadastrar($descricao){
        include("conexao.php");
        echo "Conectado";
         
        $this->descricao = $descricao;
         
        $sql="insert into periodo (descricao) values ('$this->descricao')";

        $query=$conectar->query($sql);
        if ($query){
          	return 1;
        }else{
	        return 0;
        }
    }*/
    /*public function listaperiodo(){
	$sql = "select * from periodo";

$retorno = $this->conexao->query($sql);//roda a consulta sql no banco
	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
	
	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuÃ¡rio
	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuÃ¡rio selecionado em um vetor
	  return $tipoUsuario;
	}else{
	  return false;
	}
    }*/
    


?>

