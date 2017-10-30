<?php

class Serie{
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
         
        $sql="insert into serie (descricao) values ('$this->descricao')";

        $query=$conectar->query($sql);
        if ($query){
          	return 1;
        }else{
	        return 0;
        }
    }

    
     public function alterar($cod_serie, $descricao){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_serie = $cod_serie;
      $this->descricao = $descricao;
           
      $sql="alter table serie descricao='$this->descricao' where cod_serie ='$this->cod_serie'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }

   public function listaSerie(){
        $sql = "select * from serie ORDER BY descricao ASC";
      include("conexao.php");
        
        $retorno = $conectar->query($sql);//roda a consulta sql no banco
        $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
        
        if($row_cnt > 0){//se o numero de linha for maior que 0 ele retorna o vetor com os dados do usuário
          //$tipoCurso = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
          $tipoSerie = array();    //CRIA ARRAY VAZIO
      while ($linha = $retorno->fetch_array()) {//colocar os dados do usuário selecionado em um veto
          $tipoSerie[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }

        return $tipoSerie;
        }else{
          return false;

        }
        }
}


?>

