<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blank</h1>
            </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Cadastro da Turma
                    </div>
                    <div class="panel-body">
                        <form action="./Controller/cadastroTurma.php" role="form" method="post">
                            <div class="row">
                                <div class="col-lg-5">            
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <input class="form-control" placeholder="Casdastre a Turma" name="descricao">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Relacione o Curso</label><br>
                                        
                                        <select class="form-control" name="cod_curso"> 
                                            <?php
                                                include("./Model/classeCurso.php");
                                                $objeto = new Curso();//classe
                                                $retornoCurso = $objeto->listaCursoSelect();//tras o vetor tipoCurso com os dados do curso retornados pela query e armazena na variavel(vetor) retornoCurso
                                                foreach($retornoCurso as $valor){//exibe na tela a cópia do retornoCurso em $valor
                                            ?>    
                                            <option value="<?php echo $valor["codigo"]; ?>">
                                                    <?php echo $valor["descricao"]; ?>
                                            </option>
                                        <?php   } //foreach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Ano</label>
                                        <input class="form-control" placeholder="Casdastre o ano da turma" name="ano">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Relacione o Período</label><br>
                                            
                                            <select class="form-control" name="cod_periodo"> 
                                                       <?php
                                                    include("./Model/classePeriodo.php");
                                                    $objeto = new Periodo();//classe
                                                    $retornoPeriodo = $objeto->listaPeriodo();//tras o vetor tipoCurso com os dados do curso retornados pela query e armazena na variavel(vetor) retornoCurso
                                                    foreach($retornoPeriodo as $valor){//exibe na tela a cópia do retornoCurso em $valor
                                                ?>
                                                <option value="<?php echo $valor["codigo"]; ?>">
                                                                <?php echo $valor["descricao"]; ?>
                                                 </option>
                                            <?php    } //foreach ?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Relacione a série</label><br>
                                        <select class="form-control" name="cod_serie"> 
                                            <?php
                                                include("./Model/classeSerie.php");
                                                $objeto = new Serie();//classe
                                                $retornoSerie = $objeto->listaSerie();//tras o vetor tipoCurso com os dados do curso retornados pela query e armazena na variavel(vetor) retornoCurso
                                                foreach($retornoSerie as $valor){//exibe na tela a cópia do retornoCurso em $valor
                                            ?>
                                            <option value="<?php echo $valor["codigo"] ?>">
                                                    <?php echo $valor["descricao"]?>
                                            </option>
                                            <?php    } //foreach   ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-default">GRAVAR</button>
                                    <button type="reset" class="btn btn-default">LIMPAR</button>
                                </div>
                            </div>
                        </form>
                    </div>   
                        <!-- /.panel-body -->
                </div>
                    <!-- /.panel -->
            </div>
                <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
    </div>
            <!-- /.container-fluid -->
</div>
        <!-- /#page-wrapper -->