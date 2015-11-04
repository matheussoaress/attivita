<?php $tarefas = array();?>

<!DOCTYPE html>
<html>
<head>
    <title>Tarefa - Attivita</title>
    
    <link rel="shortcut icon" href="../img/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../vendor/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../vendor/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/datatables/extensions/Buttons/css/buttons.dataTables.css">

    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    
    <script type="text/javascript" src="../vendor/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../vendor/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../vendor/datatables/extensions/Buttons/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="../vendor/datatables/extensions/Buttons/js/buttons.html5.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
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
                        <li class="active"><a href="#">Tarefas <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Usuários</a></li>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nome do Usuário <span class="caret"></span></a>
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
                                <button class="btn  btn-primary btn-md button-color col" data-id="" data-tipo="" data-toggle="modal" data-target="#modalInserir"><span class="glyphicon glyphicon-plus-sign"></span></button>
                                <button class="btn  btn-primary btn-md button-color col" data-id="" data-tipo="" data-toggle="modal" data-target="#modalBuscar"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped dataTable" id="tarefas" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tarefa</th>
                                        <th>Responsável</th>
                                        <th>Tempo limite</th>
                                        <th class="actions">Ações</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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