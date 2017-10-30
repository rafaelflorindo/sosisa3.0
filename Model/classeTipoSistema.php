<?php

class TipoSistema{
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

      $sql="insert into tipo_sistema (descricao) values 
      ('$this->descricao')";

      echo $sql;
      $query=$conectar->query($sql);
        if ($query){
        return 1;
        }else{
           return 0;
      }
    }

     public function alterar($cod_tipo_sistema, $descricao){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_tipo_sistema = $cod_tipo_sistema;
      $this->descricao = $descricao;
           
      $sql="alter table tipo_sistema descricao='$this->descricao' where cod_tipo_sistema ='$this->cod_tipo_sistema'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }











     public function listaTipoSistema(){
        $sql="select * from tipo_sistema";
        include("conexao.php");
        $retorno=$conectar->query($sql);
        $tipo = array();    //CRIA ARRAY VAZIO
        while ($linha = $conectar = $retorno ->fetch_array()) {
            $tipo[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
        }
        return $tipo;   //RETORNA O ARRAY
            # code...
        }

       
    
  /*  public function cadastrar($descricao){
        include("conexao.php");
        echo "Conectado";
         
        $this->descricao = $descricao;
         
        $sql="insert into tipo_usuario (descricao) values ('$this->descricao')";

        $query=$conectar->query($sql);
        if ($query){
          	return 1;
        }else{
	        return 0;
        }
    }
    */
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

