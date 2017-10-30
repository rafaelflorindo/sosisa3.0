<?php

class Turma{
    private $descricao;
    private $cod_curso;
    private $ano;
    private $cod_periodo;
    private $cod_serie;
   

    public function __set($atributo, $valor){
        $this->$atributo=$valor;
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function cadastrar($descricao, $cod_curso, $ano, $cod_periodo, $cod_serie){
      
      include("conexao.php");
      echo "Conectado";
      
      $this->descricao = $descricao;
      $this->cod_curso = $cod_curso;
      $this->ano = $ano;
      $this->cod_periodo = $cod_periodo;
      $this->cod_serie = $cod_serie;
      echo $sql="insert into turma (descricao, cod_curso, ano, cod_periodo, cod_serie) values 
      ('$this->descricao', '$this->cod_curso', '$this->ano','$this->cod_periodo','$this->cod_serie')";
     
      $query=$conectar->query($sql);
      $cod_turma = $conectar->insert_id;
      echo "$cod_turma";
     
      if ($query){
        return $cod_turma;
        //return 1;
      }else{
        return 0;
      }
    }

    public function listaTurmaDiscplina(){
    
        include("conexao.php");
        $sql = "select * from turma_disciplina";
        $query=$conectar->query($sql);
        
        $listaTurmaDiscplinas=array();
        echo "<table BORDER=1><th>TURMA</th><th>DISCIPLINA</th><th>PROFESSOR</th>";   
        while ($dados = $query->fetch_array()){
            $listaTurmaDiscplinas[] = $dados;
        }
        return $listaTurmaDiscplinas;
    }
}
?>

<?php
    /*$query=$conectar->query($sql);
      if ($query){
      	return 1;
      }else{
	return 0;
      }
    }*/
    /*public function listaTurma(){
	$sql = "select * from turma";

	$retorno = $this->conexao->query($sql);//roda a consulta sql no banco
	$row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
	
	if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
	  $tipoUsuario = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
	  return $tipoUsuario;
	}else{
	  return false;
	}
    }*/
   /* public function listaTurmaDiscplina(){
    
        include("conexao.php");
        $sql = "select * from turma_disciplina";
        $query=$conectar->query($sql);
        
        $listaTurmaDiscplinas=array();
        echo "<table BORDER=1><th>TURMA</th><th>DISCIPLINA</th><th>PROFESSOR</th>";   
        while ($dados = $query->fetch_array()){
            $listaTurmaDiscplinas[] = $dados
        }
        return $listaTurmaDiscplinas;*/
            /*echo "<tr><td>$dados[id_]</td>";
            echo "<td>$dados[nome]</td>";
            echo "<td>$dados[email]</td>";
            echo "<td>$dados[ano_nascimento]</td>";
            echo "<td><a href = alterar.php?id_pessoa=$dados[id_pessoa]>alterar </a></td>";
            
            echo "</tr>"; */
    
//}//fim da classe

?>
