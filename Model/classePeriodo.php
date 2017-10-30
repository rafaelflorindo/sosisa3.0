<?php

class Periodo{
    private $descricao;
  
    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
//}
   
    public function cadastrar($descricao){
        include("conexao.php");
        echo "Conectado";
         
        $this->descricao = $descricao;
         
        $sql="insert into periodo (descricao) values ('$this->descricao')";

        echo $sql;
        $query=$conectar->query($sql);
        if ($query){
          	return 1;
        }else{
	        return 0;
        }
    }


    public function alterar($cod_periodo, $descricao){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_periodo = $cod_periodo;
      $this->descricao = $descricao;
           
      $sql="alter table periodo descricao='$this->descricao' where cod_periodo ='$this->cod_periodo'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }









        public function listaPeriodo(){
        $sql = "select * from periodo";
      include("conexao.php");
        
        $retorno = $conectar->query($sql);//roda a consulta sql no banco
        $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
        
        if($row_cnt > 0){//se o numero de linha for maior que 0 ele retorna o vetor com os dados do usuário
          //$tipoCurso = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
          $tipoPeriodo = array();    //CRIA ARRAY VAZIO
      while ($linha = $retorno->fetch_array()) {//colocar os dados do usuário selecionado em um veto
          $tipoPeriodo[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }

        return $tipoPeriodo;
        }else{
          return false;

        }
        }
    /*public function listaTipoUsuario(){
	$sql = "select * from tipo_usuario";

$retorno = $this->conexao->query($sql);//roda a consulta sql no banco
	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
	
	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuÃ¡rio
	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuÃ¡rio selecionado em um vetor
	  return $tipoUsuario;
	}else{
	  return false;
	}
    }*/
}


?>

