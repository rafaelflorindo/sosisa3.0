<?php
	include("validasessao.php");
//header('location: Views/FormLogin.php');
	if(isset($_GET["mensagem"])=="sucesso"){
		echo "Login realizado com sucesso";
		echo "<br>Seja bem vindo " . $_SESSION["nome"];
		?>
			<br><a href="logout.php">Sair</a>
		<?php
	}
?>
