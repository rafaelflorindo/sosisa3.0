<?php
class Login{

    private $login,$senha,$permissao;//autenticação de usuários
   
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
          include ("conexao.php");
          $retorno = $conectar->query($sql);//roda a consulta sql no banco
          $row_cnt = $retorno->num_rows;//numero de registro retornado da consulta sql

          if($row_cnt > 0){//se o numero de linha for maio que 0 ele retorna o vetor com os dados do usuário
              $user = $retorno->fetch_array();//colocar os dados do usuário selecionado em um vetor
              return  $user;//retorna um vetor com todos os valores do registro logado
           }else {
              return false;
          }
    }
    public function verificarPermissao($permissao){
        $this->permissao = addslashes($permissao);//evita sqlInjection
        echo $this->permissao;
        $sql = "select * from permissao where cod_usuario = '$this->permissao'";
        include ("conexao.php");
        $retornoPermissao = $conectar->query($sql);
        $tipoPermissao = array();    //CRIA ARRAY VAZIO
        while ($linha = $retornoPermissao ->fetch_array()) {
            $tipoPermissao[] = $linha;   //ALIMENTA O ARRAY DINAMICAMENTE
        }
        return $tipoPermissao;   //RETORNA O ARRAY
    }
}