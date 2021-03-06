<?php 
    include_once '../autoload.php';
    if(!\sys\controller\UsuarioController::testarLogin()){
        header('Location: /attivita');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tarefa - Attivita</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/datepicker/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <script type="text/javascript" src="../vendor/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../vendor/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../vendor/jquery_mask_plugin/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../vendor/validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/tarefa.js"></script>
</head>
<body>

    <div class="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="../img/logo-min.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/attivita/sys/tarefa.php">Tarefas <span class="sr-only">(current)</span></a></li>
                        <li><a href="/attivita/sys/relatorio.php">Relatório</a></li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= isset($_SESSION['usuario'])?$_SESSION['usuario']['nome']:"" ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Meu perfil</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>


    <div class="content">
        <h4>Em aberto</h4>
        <div class="row">
            <div class="col-xs-12" id="conteudo">
                <div class="box box-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="alert alert-info pull-left hidden" id="conteudo-mensagem">
                                <i class="fa fa-info"></i>
                                <span>Mensagem</span>
                            </div>
                            <div class="pull-right">
                                <button class="btn  btn-primary btn-md button-color col" data-id="" data-tipo="" data-toggle="modal" data-target="#inserir"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                <button class="btn  btn-primary btn-md button-color col" data-id="" data-tipo="" data-toggle="modal" data-target="#modalFiltrar"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id='lista' class="panel-body"></div>
                    </div><!-- ./panel-default -->
                </div><!-- ./box-info -->
            </div><!-- ./col-xs-12 -->
        </div><!-- ./row -->    
        <h4>Concluídas</h4>
        <div class="row">
            <div class="col-xs-12" id="conteudo">
                <div class="box box-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="alert alert-info pull-left hidden">
                                <i class="fa fa-info"></i>
                                <span>Mensagem</span>
                            </div>
                            <div class="pull-right">
                                <button class="btn  btn-primary btn-md button-color col" data-id="" data-tipo="" data-toggle="modal" data-target="#modalFiltrarConcluida"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id='listaConcluida' class="panel-body"></div>
                    </div><!-- ./panel-default -->
                </div><!-- ./box-info -->
            </div><!-- ./col-xs-12 -->
        </div><!-- ./row -->    
    </div>
    
    <div class="footer">
        <div id="corp" class="col-md-6">© 2015 Attività &trade; Corporation</div>
            <div id="contact" class="col-md-6"> 
                Redes Sociais: 
                <a href="#"><img src="../img/icon-1.jpg"></a>
                <a href="#"><img src="../img/icon-2.jpg"></a>
                <a href="#"><img src="../img/icon-3.jpg"></a>
            </div>
        </div>
    </div>

</body>
</html>


<!-- Modal inserir tarefa -->

<div class="modal fade" id="inserir" tabindex="-1" role="dialog" aria-labelledby="inserirLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="inserirLabel">Nova Tarefa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="cadastra">
                        <div class="form-group">
                            <div class="col-md-12"> 
                                <label for="titulo"> Título: </label>
                                <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Digite o título da tarefa" maxlength="100">
                            </div>
                            <div class="col-md-6">
                                <label for="duracao"> Duração: </label>
                                <input type="number" id="duracao" name="duracao" class="number form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="agendar"> Agendar para: </label>
                                <input type="text" id="agendar" name="agendar" class="form-control">
                            </div>
                            <div class="col-md-8">
                                <label for="prioridade"> Prioridade: </label> <br>
                                <div class="btn-group " data-toggle="buttons" >
                                    <label class="btn btn-default button-radio "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="1" checked> 1
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="2" checked> 2
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="3" checked> 3
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="4" checked> 4
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="5" checked> 5
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="6" checked> 6
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="7" checked> 7
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="8" checked> 8
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="9" checked> 9
                                    </label>
                                    <label class="btn btn-default "> 
                                         <input type="radio" name="prioridade" id="prioridade" autocomplete="off" value="10" checked> 10
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="tarefa"> Tarefa: </label>
                                <textarea id="tarefa" name="tarefa" maxlength="1950" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id='cadastrar' class="btn btn-primary button-color">Cadastrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DELEGAR -->

<div class="modal fade " id="modalDelegar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDelegarLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modalDelegarLabel">Delegar tarefa:</h4>
            </div>
            <div class="modal-body">
                <form id='delega'>
                    <div id="form-group">
                        <input type="hidden" value="0" name='tarefa' id='delegaTarefa'>
                        <div id="col-md-12">
                            <label for="usuario"> Usuário:</label>
                            <select id='usuario' name='usuario' class="form-control">
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id='delegar' class="btn btn-primary button-color">Delegar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ALTERAR STATUS -->

<div class="modal fade " id="modalStatus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalStatusLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modalStatusLabel">Alterar Status:</h4>
            </div>
            <div class="modal-body">
                <form id='altera'>
                    <div id="form-group">
                        <input type="hidden" value="0" name='tarefa' id='alteraTarefa'>
                        <div id="col-md-12">
                            <label for="status"> Novo status:</label>
                            <select id='status' name='status' class="form-control">
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="alterar" class="btn btn-primary button-color">Alterar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal filtrar tarefa -->

<div class="modal fade" id="modalFiltrar" tabindex="-1" role="dialog" aria-labelledby="modalFiltrarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalFiltrarLabel">Filtrar Tarefa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="filtra">
                    <input type="hidden" value="1" name='filtro' id='filtro'>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="duracao"> Duração: </label>
                                <select id="sDuracao" name="sDuracao" class="form-control">
                                    <option value="<">Menor que</option>
                                    <option value=">">Maior que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <input type="text" id="duracao" name="duracao" class="number form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="agendar"> Agendado para: </label>
                                <select id="sAgendado" name="sAgendado" class="form-control">
                                    <option value="<">Menor que</option>
                                    <option value=">">Maior que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <input type="text" id="agendar" name="agendar" class="number form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="prioridade"> Prioridade: </label> <br>
                                <select id="sPrioridade" name="sPrioridade" class="form-control">
                                    <option value="<">Menor que</option>
                                    <option value=">">Maior que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <input type="text" name="prioridade" id="prioridade" autocomplete="off" class="form-control"> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id='filtrar' class="btn btn-primary button-color">Filtrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal filtrar tarefa concluida-->

<div class="modal fade" id="modalFiltrarConcluida" tabindex="-1" role="dialog" aria-labelledby="modalFiltrarConcluidaLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalFiltrarConcluidaLabel">Filtrar Tarefa</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="filtraConcluida">
                    <input type="hidden" value="1" name='filtro' id='filtro'>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="duracao"> Duração: </label>
                                <select id="sDuracao" name="sDuracao" class="form-control">
                                    <option value="<">Menor que</option>
                                    <option value=">">Maior que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <input type="text" id="duracao" name="duracao" class="number form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="agendar"> Agendado para: </label>
                                <select id="sAgendado" name="sAgendado" class="form-control">
                                    <option value="<">Menor que</option>
                                    <option value=">">Maior que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <input type="text" id="agendar" name="agendar" class="number form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="prioridade"> Prioridade: </label> <br>
                                <select id="sPrioridade" name="sPrioridade" class="form-control">
                                    <option value="<">Menor que</option>
                                    <option value=">">Maior que</option>
                                    <option value="=">Igual a</option>
                                </select>
                                <input type="text" name="prioridade" id="prioridade" autocomplete="off" class="form-control"> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id='filtrarConcluidas' class="btn btn-primary button-color">Filtrar</button>
            </div>
        </div>
    </div>
</div>
