<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location: customers/logged.php');
    }else{
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="../js/main.js"></script>
    <link href="css/font-awesome.win.css" rel="stylesheet">    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Monicao S/A</title>
</head>

<body class="fundo">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                    <?php
                        if(isset($_SESSION['nao_autenticado'])){
                            echo "<div class='alert alert-danger'><p>ERRO: Usuário e/ou Senha incorretos</p></div>";
                        }
                        unset($_SESSION['nao_autenticado']);
                    ?>
                        <h5 class="card-title text-center">Login</h5>
                        <form class="form-signin" action="logado/login.php" method="POST">
                            <div class="form-label-group">
                                <input name="usuario" type="text" id="inputUsuario" class="form-control" placeholder="Usuário" autocomplete="off" required autofocus>
                                <label for="inputUsuario">Usuário</label>
                            </div>

                            <div class="form-label-group">
                                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" autocomplete="off" required>
                                <label for="inputPassword">Senha</label>
                            </div>
                            <button class="my-btn btn btn-lg btn-primary btn-block text-uppercase" type="submit">Autenticar</button>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
<?php }?>