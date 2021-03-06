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
    <script type="text/javascript" src="../js/relatorio.js"></script>
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
                        <li><a href="/attivita/sys/tarefa.php">Tarefas </a></li>
                        <li class="active"><a href="/attivita/sys/relatorio.php">Relatório<span class="sr-only">(current)</span></a></li>
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
                                <li><a id="sair" href="#">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>

    <div class="content">
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
                                <button class="btn  btn-primary btn-md button-color col" data-id="" data-tipo="" data-toggle="modal" data-target="#modalRelatorio"><span class="glyphicon glyphicon-filter"></span></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id='relat' class="panel-body"></div>
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

<div class="modal fade " id="modalRelatorio" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalRelatorioLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modalRelatorioLabel">Gerar Relatório</h4>
            </div>
            <div class="modal-body">
                <form id='relatorio'>
                    <div id="form-group">
                        <input type="hidden" value="1" name='filtro' id='filtro'>
                        <div id="col-md-12">
                            <label for="status"> Tipo de Relatório:</label>
                            <select id='tprelatorio' name='tprelatorio' class="form-control">
                                <option value="1">Anual</option>
                                <option value="2">Mensal</option>
                                <option value="3">Semanal</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="gerar" class="btn btn-primary button-color">Gerar Relatório</button>
            </div>
        </div>
    </div>
</div>
