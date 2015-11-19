<?php require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Attivita</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/datepicker/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="vendor/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="vendor/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="vendor/jquery_mask_plugin/jquery.mask.min.js"></script>
    <script type="text/javascript" src="vendor/validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
    <header>
        <img src="img/logo.png">
    </header>
    <div id="content">
        <div id="body" class="centro">
            <div id='login' class="centro">
                <h3>Login</h3>
                <span class="alert-info text-alert " style="display: none;" id="conteudo-mensagem">
                    <i class="fa fa-info"></i>
                    <span>Mensagem</span>
                </span>
                <form id="login">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="sr-only" for="email">Usuário</label>
                            <input type="email" class="form-control" id="usuario" name="usuario" placeholder="usuario" required>
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                        </div>
                        <div class="col-md-6">
                            <input type="button" id="entrar" value="Entrar" class="btn btn-primary btn-block button-color">
                        </div>
                        <div class="col-md-6">
                            <input type="button" value="Cadastrar" class="btn btn-default btn-block"data-toggle="modal" data-target="#novo"> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div id="corp" class="col-md-6">© 2015 Attività &trade; Corporation</div>
        <div id="contact" class="col-md-6"> 
            Redes Sociais: 
            <a href="#"><img src="img/icon-1.jpg"></a>
            <a href="#"><img src="img/icon-2.jpg"></a>
            <a href="#"><img src="img/icon-3.jpg"></a>
        </div>
    </footer>
</body>
</html>

<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Novo usuário</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="novo">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="nome">Nome: <span class="obrig">*</span></label>
                                <input id="nome" name="nome" type="text" class="form-control"  maxlength="100" placeholder="Seu nome completo">
                            </div>
                            <div class="col-md-6">
                                <label for="nascimento">Data de Nascimento:</label>
                                <input id="nascimento" name="nascimento" type="text" class="form-control" placeholder="Sua data de nascimento">
                            </div>
                            <div class="col-md-6">
                                <label for="email">E-mail: <span class="obrig">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">@</div>
                                    <input id="email" name="email" type="email" class="form-control"  maxlength="100" placeholder="E-mail que você mais utiliza">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="senha">Confirme sua senha: <span class="obrig">*</span></label>
                                <input id="senha" name="senha" type="password" minlength="6" maxlength="50" class="form-control" placeholder="Escolha uma senha segura">
                            </div>
                            <div class="col-md-6">
                                <label for="nova_senha">Senha: <span class="obrig">*</span></label>
                                <input id="nova_senha" name="nova_senha" type="password"  minlength="6" maxlength="50" class="form-control" placeholder="Digite a mesma senha">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="modal-footer">
                <div id="bottons">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                    <button type="button" id="cadastrar" class="btn btn-primary button-color">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>