<?php
class conexao{

    private $local,$user,$password,$banco,$conexao;//atributos de conexaão com o banco de dados
    private $login,$senha,$permissao;//autenticação de usuários
   
    public function conectar(){
      $this->local = "localhost";
      $this->user = "u649696891_isa1";
      $this->password = "isa12017";
      $this->banco = "u649696891_isa1";
      //$this->conexao = new mysqli($this->local,$this->user,$this->password,$this->banco);
      echo "Alessandro1";
      $link = new mysqli_connect("localhost","u649696891_isa1","isa12017","u649696891_isa1");
      echo "Alessandro";
      if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

      if ($this->conexao){
        
        echo "teste";//passa por aqui, quer dizer que esta conectando com o banco
        //var_dump($this->conexao);

        $retorno = $this->conexao1->query("select * from usuario");

        echo ("teste".$retorno->num_rows);
        
        echo $row_cnt = $this->conexao1->num_rows;//numero de registro retornado da consulta sql
            
        //exit;
        return $this->conexao;//retorna a conexao

      }else{
        echo "erro";
      }
      //return $this->conexao;
        
    }
    public function __construct(){
      /*$this->local = "localhost";
      $this->user = "root";
      $this->password = "";
      $this->banco = "sos2";
      $this->conexao = new mysqli($this->local,$this->user,$this->password,$this->banco);
    */
      /*$this->local = "https://db92.hostinger.com.br/";
      $this->user = "u649696891_isa1";
      $this->password = "isa12017";
      $this->banco = "u649696891_isa1";
      $this->conexao = new mysqli($this->local,$this->user,$this->password,$this->banco);
      if ($this->conexao){
        //echo sha1(md5(123));
        //exit;
      }else{
        echo "erro";
        //exit;
      }*/
    }
/*métodos mágicos*/
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    } 

    public function verificarusuario($login,$senha){
          $this->login = addslashes($login);//evita sqlInjection
          $this->senha = addslashes($senha);
          $this->senha = sha1(md5($senha));//encriptação dos dados
          echo "<br><hr>";
          
          echo $sql = "select * from usuario where login = '$this->login' and senha ='$this->senha'";
          //até aqui esta rodando, e montando o sql correto com o teste com sucesso direto pelo phpmyadmin
          //parece que não estamos com o atributo de conexao ativo
         // $conexao = new conexao();
          $conexao1=$this->conectar();
          if($conexao1){
            echo "conectado";
            $retorno = $this->conexao1->query($sql);//roda a consulta sql no banco

            echo "oi";
            //exit;
            echo $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql
            //exit;
              if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
                 $user = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
                 return  $user;//retorna um vetor com todos os valores do registro logado 
             }else{
                return false;
             }
          }         
    }
}


