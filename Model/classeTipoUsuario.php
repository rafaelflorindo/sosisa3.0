<?php

class TipoUsuario{
    private $descricao;
  
    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
//}
     public function listaTipoUsuario(){
        $sql="select * from tipo_usuario";
        include("conexao.php");
        $retorno=$conectar->query($sql);
        $tipo = array();    //CRIA ARRAY VAZIO
        while ($linha = $conectar = $retorno ->fetch_array()) {
            $tipo[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
        }
        return $tipo;   //RETORNA O ARRAY
            # code...
        }

       
    
     public function alterar($cod_tipo_usuario, $descricao){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_tipo_usuario = $cod_tipo_usuario;
      $this->descricao = $descricao;
           
      $sql="alter table tipo_usuario descricao='$this->descricao' where cod_tipo_usuario ='$this->cod_tipo_usuario'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }







    
    public function cadastrar($descricao){
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
}


?>

