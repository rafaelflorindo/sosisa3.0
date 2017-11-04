<?php
require("validasessao.php");
/*if(isset($_SESSION["nome"])){
    $tipo_usuario = $_SESSION["permissao"];
    foreach ($tipo_usuario as $linha){
        echo "<br>Permissão $linha[cod_tipo_usuario]";
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="./Views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./Views/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./Views/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./Views/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./Views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php
            include("Views/menu.php");
        ?>
        ?>
    </div>
          <!--<div id="wrapper">-->
        <?php

        	if (isset($_GET["pagina"])){
        		$pagina = $_GET["pagina"];
        		include("./Views/" . $pagina);
        	}else{
        		$pagina = "home.php";
        		include("./Views/" . $pagina);
        	}

        ?>
	<!--</div>-->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./Views/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./Views/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./Views/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="./Views/vendor/raphael/raphael.min.js"></script>
    <script src="./Views/vendor/morrisjs/morris.min.js"></script>
    <script src="./Views/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./Views/dist/js/sb-admin-2.js"></script>
 <!-- DataTables JavaScript -->
    <script src="./Views/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./Views/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./Views/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
