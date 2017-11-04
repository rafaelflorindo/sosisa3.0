<?php
	session_start();
	if(!isset($_SESSION["nome"])){
		header('location: Views/FormLogin.php?mensagem=erro');
	}
?>