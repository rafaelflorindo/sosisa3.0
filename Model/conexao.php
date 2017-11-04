<?php


    //$conectar=new mysqli("localhost","root","","u649696891_isa2");

    mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $conectar = new mysqli("localhost", "root", "", "sos2");
            //echo 'Conectado com sucesso';
            return $conectar;//retorna a conexao
        } catch (Exception $e) {
            echo 'ERROR:'.$e->getMessage();
        }
        /*
        $this->local = "https://db92.hostinger.com.br/";
              $this->user = "u649696891_isa1";
              $this->password = "isa12017";
              $this->banco = "u649696891_isa1";
        */
?>

