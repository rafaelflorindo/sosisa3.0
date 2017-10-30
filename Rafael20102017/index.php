<?php
	require("validasessao.php");
	if(isset($_GET["mensagem"])=="sucesso"){
		echo "Login realizado com sucesso";
		echo "<br>Seja bem vindo " . $_SESSION["nome"];
        //echo "<br>Nivel " . $_SESSION["tipo_usuario"];
        $tipo_usuario = $_SESSION["tipo_usuario"];

        $tipo_usuario = explode(",",$tipo_usuario);

        foreach ($tipo_usuario as $valor){
            echo "<br>$valor";
        }

		?>
			<br><a href="logout.php">Sair</a>
		<?php
	}
?>
