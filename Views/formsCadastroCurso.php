    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Cadastro do Curso
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <form action="./Controller/cadastroCurso.php" role="form" method="post">
                                    
                                    <div class="form-group">
                                            <label>Curso</label>
                                            <input name="descricao" class="form-control" placeholder="Casdastre o curso">

                                        <div class="row">
                                            <div class="col-lg-5">
                                            
                                                <div class="form-group">
                                                            <label>Carga Horária</label>
                                                            <input class="form-control" name="carga_horaria" placeholder="Casdastre a carga horária do curso">
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Relacione o Coordenador</label><br>
                                                            <select multiple name="codusuariocoordenador"> 
                                                                        <?php
                                                            include("./Model/classeUsuario.php");
                                                            $objeto = new Usuario();
                                                            $retornoCoordenador = $objeto->listaUsuarioCoordenador();
                                                                            foreach($retornoCoordenador as $valor){
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
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-10">        
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default">GRAVAR</button>
                                                    <button type="reset" class="btn btn-default">LIMPAR</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                     </div>    <!--<button type="reset" class="btn btn-default">ALTERAR</button>-->
                                </form>
                                   
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                                <!-- /.col-lg-6 (nested) -->
                        </div>
                            <!-- /.row (nested) -->
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

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

