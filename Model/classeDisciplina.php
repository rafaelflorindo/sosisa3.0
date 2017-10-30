
<?php

class Disciplina{
    private $descricao;
    private $cargaHoraria;
    private $status;
    
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($descricao, $cargaHoraria, $status){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->descricao = $descricao;
      $this->cargaHoraria = $cargaHoraria;
      $this->status = $status;
   
      $sql="insert into disciplina (descricao, carga_horaria, status) values 
      ('$this->descricao', '$this->cargaHoraria', '$this->status')";
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }

     public function alterar($cod_disciplina, $descricao, $cargaHoraria, $status){
      
      include("conexao.php");
      echo "Conectado";
      $this->cod_disciplina = $cod_disciplina;
      $this->descricao = $descricao;
      $this->cargaHoraria = $cargaHoraria;
      $this->status = $status;
           
      $sql="alter table discplina descricao='$this->descricao', cargaHoraria='$this->cargaHoraria', status ='$this->status' where cod_disciplina ='$this->cod_disciplina'";
     
     
      $query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }









    public function listaDisciplina(){
        $sql = "select * from disciplina ORDER BY descricao ASC";
      include("conexao.php");
        
        $retorno = $conectar->query($sql);//roda a consulta sql no banco
        $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
        
        if($row_cnt > 0){//se o numero de linha for maior que 0 ele retorna o vetor com os dados do usuário
          //$tipoCurso = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
          $tipoSerie = array();    //CRIA ARRAY VAZIO
      while ($linha = $retorno->fetch_array()) {//colocar os dados do usuário selecionado em um veto
          $tipoDisciplina[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
      }

        return $tipoDisciplina;
        }else{
          return false;

        }
        }        /*include("conexao.php");
        $sql = "select * from disciplina";
        $query=$conectar->query($sql);
        
        $listaDisciplina=array();
        //echo "<table BORDER=1><th>TURMA</th><th>DISCIPLINA</th><th>PROFESSOR</th>";   
        while ($dados = $query->fetch_array()){
            $listaDisciplina[] = $dados
        }
        return $listaDisciplina;*/



	/*$sql = "select * from disciplina";

	$retorno = $this->conexao->query($sql);//roda a consulta sql no banco
	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
	
	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
	  return $tipoUsuario;
	}else{
	  return false;
	}*/
    
    
}//fim da classe

?>
