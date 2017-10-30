<?php

class UsuarioTipoSistema{
    private $codUsuario;
    private $codTipoSistema;
     
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
     public function alterar($cod_usuario_tipo_sistema, $codUsuario, $codTipoSistema){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_usuario_tipo_sistema = $cod_usuario_tipo_sistema;
      $this->codUsuario = $codUsuario;
      $this->codTipoSistema = $codTipoSistema;
           
      $sql="alter table usuario_tipo_sistema codUsuario='$this->codUsuario', codTipoSistema='$this->codTipoSistema' where cod_usuario_tipo_sistema ='$this->cod_usuario_tipo_sistema'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }
 function cadastrar($codUsuario, $codTipoSistema){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->codUsuario = $codUsuario;
      $this->codTipoSistema = $codTipoSistema;
      
           
      $sql="insert into usuario_tipo_sistema (cod_usurio, cod_tipo_sistema) values 
      ('$this->codUsuario', '$this->codTipoSistema')";
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }
    public function listaUsuario_tipo_sistema(){
	/*$sql = "select * from usuario_tipo_sistema";

	$retorno = $this->conexao->query($sql);//roda a consulta sql no banco
	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
	
	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
	  return $tipoUsuario;
	}else{
	  return false;
	}*/
    }
    
}//fim da classe

?>
