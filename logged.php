<?php
include('verifyLogin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="fundoLogado">
    <!--<div class="d-flex flex-row-reverse bd-highlight">
        <div class="p-2 bd-highlight">
            <a class="btn btn-outline-danger" href="logout.php">Sair</a>
        </div>
        <div class=" p-2 bd-highlight">
            <h3 class="usuario"><?php echo $_SESSION['usuario']; ?></h3>
        </div>
    </div>-->
    <div class="d-flex flex-row-reverse bd-highlight">
        <div class="btn-group dropleft" role="group">
            <button type="button" class="btn btn-outline-dark">
                <h5 class="usuario"><?php echo $_SESSION['usuario']; ?></h5>
            </button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" disabled>Nível de Acesso: <?= "Admin" ?></a>
                <a class="dropdown-item" href="#" disabled>Editar perfil</a>
                <div class="dropdown-divider"></div>
                <a class="btn btn-outline-danger dropdown-item" href="logout.php">Logout</a>
                <!--<a class="dropdown-item" href="#">Link separado</a>-->
            </div>
        </div>
    </div>
    <br>

    <!-- ================================== AQUI FICARÁ O HEADER!!!!!!!!!!!! ===================================== 
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Odonto Monicao</h3>
                </h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#menu">Animación</a>

                </li>
                <li>
                    <a href="#menu">Ilustración</a>


                </li>
                <li>
                    <a href="#menu">Interacción</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
                <li>
                    <a href="#">Acerca</a>
                </li>
                <li>
                    <a href="#">contacto</a>
                </li>
            </ul>
        </nav>
    </div>-->

</html>