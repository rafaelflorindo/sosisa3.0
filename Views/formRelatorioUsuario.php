<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 11/10/2017
 * Time: 11:06
 */?>
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
  <?php
      if (isset($_GET["codigo"])){
        include("./Model/classeUsuario.php");
        $codigo = $_GET["codigo"];
        $buscarUsuario = new conexao("usuario");
        $retornoUsuario = $buscarUsuario->listaUm($codigo);
        foreach($retornoUsuario as $linha)
        ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cadastro do Usuário</h3>
                </div>
                <div class="panel-body">

                    <form action="./Controller/cadastroUsuario.php" method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <label>Text Input</label>
                                <input class="form-control" type="text" name="nome" value="<?php echo $linha['nome']; ?>">
                                 <input class="form-control" type="text" name="login" value="<?php echo $linha['login']; ?>">
                                 <input class="form-control" type="text" name="senha" value="<?php echo $linha['senha']; ?>">
                                 <input class="form-control" type="text" name="status" value="<?php echo $linha['status']; ?>">
                                 <input class="form-control" type="text" name="cod_tipo_usuario" value="<?php echo $linha['cod_tipo_usuario']; ?>">
                            </div>
                            <input class="form-control" type="hidden" name="codigo" value="<?php echo $linha['codigo']; ?>">
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="
                            <?php 
                                if (isset($_GET["codigo"])){ 
                                    echo "EDITAR"; 
                                } 
                            ?>" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
          <?php
      }else{//caso não tenha código escolhido, lista todos os registros

          ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tipos de Usuarios</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro dos Usuarios
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>nome</th>
                                <th>login</th>
                                <th>senha</th>
                                <th>Tipo do Usuario</th>
                                <th>stauts</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include ("./Model/classeUsuario.php");
                            $listaTipoUsuario = new Usuario("usuario");
                            $usuario = $listaTipoUsuario->listaTipoUsuario();
                            foreach($usuario as $linha){
                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $linha['codigo'] ?></td>
                                    <td><?php echo $linha['nome'] ?></td>
                                    <td><?php echo $linha['login'] ?></td>
                                    <td><?php echo $linha['senha'] ?></td>
                                    <td><?php echo $linha['cod_tipo_usuario'] ?></td>
                                    <!--<td><?php echo $linha['status'] ?></td>-->

                                    <td><?php

                                    $date = new DateTime($linha['dataCadastro']);
                                            //$linha['dataCadastro']
                                            echo $date->format('d-m-Y h:m:s'); ?></td>
                                        <td class="center">


                                        <!--  <button type="button" class="btn btn-outline btn-default" title="Alterar Registro" data-toggle="modal" data-target="#myModal">
                                                <a href="./Controller/teste.php?codigo=<?php echo $linha['codigo'] ?>">Visualizar
                                                </a>
                                            </button>-->
                                        <a href="formsCadastroUsuario.php?codigo=<?php echo $linha['codigo'] ?>">
                                            <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                Visualizar
                                            </button>
                                        </a>

                                        <a href="./Controller/cadastroUsuario.php?codigo=<?php echo $linha['codigo'] ?>"> <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                Inativar

                                            </button></a>
                                    </td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Some text in the modal.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                        <!--<div class="well">
                            <h4>DataTables Usage Informationssssss</h4>
                            <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                            <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                        </div>-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->

    </div>
          <?php
      }
  ?>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>

