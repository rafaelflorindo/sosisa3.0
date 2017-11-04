
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
<!--<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">HELP DESK</h1>
            </div>-->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form action="./Controller/cadastroDisciplina.php" role="form" method="post">
                                        
                                        <div class="form-group">
                                             <label>Cadastro de Disciplinas</label>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                               <div class="col-lg-5">
                                                    <form action=  "./Controller/cadastroDisciplina.php" method="post">
                                                        <div class="form-group">
                                                            <label>Disciplina</label>
                                                            <input name="descricao" class="form-control" placeholder="Casdastre a Disciplina">
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-10">        
                                                                <div class="form-group">
                                                                    <label>Carga Horária</label>
                                                                    <input name="cargaHoraria" class="form-control" placeholder="Casdastre a carga horária do curso">
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-10">        
                                                                        <div class="form-group">
                                                                            <label>Status da Disciplina</label>
                                                                            <div class="radio">
                                                                                <label>
                                                                                <input type="radio" name="status" id="optionsRadios1" value="1" checked>Ativo
                                                                                </label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input type="radio" name="status" id="optionsRadios2" value="0">Inativo
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-default">GRAVAR</button>
                                                <button type="submit" class="btn btn-default">GRAVAR</button>
                                                <button type="reset" class="btn btn-default">LIMPAR</button>
                                            </div>
                                        </div>
                                                    </form>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        <!-- /.panel-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!--</div>-->
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-10">
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
                            include ("./Model/classeDisciplina.php");
                            //include ("../Model/conexao.php");
                            $listaDisciplina = new Disciplina();
                           
                            $lista = $listaDisciplina->listaDisciplina();

                            //var_dump($lista);

if ($lista != false) {  //devolvendo se a linha for false
                            foreach($lista as $linha){
                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $linha['codigo'] ?></td>
                                    <td><?php echo $linha['descricao'] ?></td>
                                    <td><?php echo $linha['carga_horaria'] ?></td> 
                                    <td><a href="formsCadastroDisciplina.php?codigo=<?php echo $linha['codigo'] ?>">
                                            <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                Alterar
                                            </button>
                                    </td>
                                </tr>
                            <?php } } ?>
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