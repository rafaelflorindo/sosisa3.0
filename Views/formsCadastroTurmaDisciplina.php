<?php
   // session_start();

    if(isset($_SESSION["cod_turma"])){
        $cod_turma = $_SESSION["cod_turma"];
    ?>
                                                
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cadastro da Turma Disciplina
                    <form action="./Controller/cadastroTurmaDisciplina.php" method="POST">  
                        <div class="row"> 
                            <div class="col-lg-5"> 
                                <div class="form-group">
                                    <label>Escolha uma disciplina</label><br>
                                    <select class="form-control" name="cod_disciplina"> 
                                                            <?php
                                                            include("./Model/classeDisciplina.php");
                                                            $objeto = new Disciplina();//classe
                                                            $retornoDisciplina = $objeto->listaDisciplina();
    //tras o vetor tipoDisciplina com os dados daa disciplina retornados pela query e armazena na variavel(vetor) retornoCurso
                                                            foreach($retornoDisciplina as $valor){
    //exibe na tela a cópia do retornoDisciplina em $valor
                                                            ?>
                                                                <option value="<?php echo $valor["codigo"] ?>">
                                                                                <?php echo $valor["descricao"]?>
                                                                </option>
                                                                <?php
                                                                    } //foreach
                                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Relacione o Professor</label><br>
                                    <select class="form-control" name="cod_tipo_usuario"> 
                                                            <?php
                                                            include("./Model/classeUsuario.php");
                                                            $objeto = new Usuario();
                                                            $retornoProfessor = $objeto->listaUsuarioProfessor();
                                                            foreach($retornoProfessor as $valor){
                                                            ?>
                                                                <option value="<?php echo $valor["codigo"] ?>">
                                                                                <?php echo $valor["nome"]?>
                                                                </option>
                                                                <?php
                                                                    } //foreach
                                                                ?>
                                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type="hidden" name="cod_turma" value="<?php echo $cod_turma; ?>">
                                                        <?php
                                                    }
                                                ?>
                                                    <button type="submit" class="btn btn-default">GRAVAR</button>
                                                    <button type="reset" class="btn btn-default">LIMPAR</button>
                            </div>
                        </div>
                    </form>

                               
                                <!-- /.col-lg-6 (nested) -->
                </div>
                            <!-- /.row (nested) -->
            </div>
                        <!-- /.panel-body -->
        </div>
                    <!-- /.panel -->
    </div>
                <!-- /.col-lg-12 -->
    <!-- /.row CORRIGIR DAQUI PARA BAIXO-->
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Disciplinas Cadastradas
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Codigo Turma</th>
                                <th>Codigo Diciplina</th>
                                <th>Codigo Professor</th>
        
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include ("./Model/classeTurmaDisciplina.php");
                            //include ("../Model/conexao.php");
                            $listaDisciplina = new TurmaDisciplina();
                           
                            $lista = $listaDisciplina->listaturma_Disciplina();

                            //var_dump($lista);

                            foreach($lista as $linha){
                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $linha['cod_turma'] ?></td>
                                    <td><?php echo $linha['cod_disciplina'] ?></td>
                                    <td><?php echo $linha['cod_usuario_professor'] ?></td> 
                                    <td><a href="formsCadastroCurso.php?codigo=<?php echo $linha['codigo'] ?>">
                                            <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                Alterar
                                            </button>
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






        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
