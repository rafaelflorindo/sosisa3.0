<?php

class Curso{
    private $descricao;
    private $cargaHoraria;
    private $codUsuarioCoordenador;
    
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($descricao, $cargaHoraria, $codUsuarioCoordenador){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->descricao = $descricao;
      $this->cargaHoraria = $cargaHoraria;
      $this->codUsuarioCoordenador = $codUsuarioCoordenador;
           
      $sql="insert into curso (descricao, carga_horaria, cod_usuario_coordenador) values 
      ('$this->descricao', '$this->cargaHoraria', '$this->codUsuarioCoordenador')";

      echo $sql;
      $query=$conectar->query($sql);
        if ($query){
      	return 1;
        }else{
	       return 0;
      }
    }
    public function listaCurso(){
    	$sql = "select c.codigo,  c.descricao, c.carga_horaria, c.cod_usuario_coordenador, u.codigo, u.nome from curso as c, usuario as u where c.cod_usuario_coordenador = u.codigo;";

      include("conexao.php");
    	
      $retorno = $conectar->query($sql);//roda a consulta sql no banco
    	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
    	
    	if($row_cnt > 0){//se o numero de linha for maior que 0 ele retorna o vetor com os dados do usuário
    	  //$tipoCurso = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
    	  $tipoCurso = array();    //CRIA ARRAY VAZIO
      while ($linha = $retorno->fetch_array()) {//colocar os dados do usuário selecionado em um veto
          $tipoCurso[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }

        return $tipoCurso;
    	}else{
    	  return false;

    	}
        }
    
}//fim da classe

?>
