<?php
session_start();
include_once '../includes/connectDB.php';

if (isset($_POST['btn-editar'])) :
    $funcionario_id = mysqli_escape_string($connection, $_POST['funcionario_id']);
    $nome = mysqli_real_escape_string($connection, trim($_POST['nome']));
    $usuario = mysqli_real_escape_string($connection, trim($_POST['usuario']));
    $senha = mysqli_real_escape_string($connection, trim($_POST['senha']));
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $endereco = mysqli_real_escape_string($connection, trim($_POST['end']));
    $cel = mysqli_real_escape_string($connection, trim($_POST['cel']));
    $cpf = mysqli_real_escape_string($connection, trim($_POST['cpf']));
    $rg = mysqli_real_escape_string($connection, trim($_POST['rg']));
    $ativo = mysqli_real_escape_string($connection, trim($_POST['ativo']));
    $nivelAcesso = mysqli_real_escape_string($connection, trim($_POST['nivel']));
    if($nivelAcesso == 0):
        $ativo=0;
    else:
        $ativo=1;
    endif;
    $sql = "UPDATE funcionarios SET nome='{$nome}', cpf='{$cpf}', rg='{$rg}', celular='{$cel}', email='{$email}', endereco='{$endereco}', ativo={$ativo} WHERE funcionario_id='{$funcionario_id}'";
    $resultado = mysqli_query($connection, $sql);
    if ($resultado) :

        $sql = "UPDATE usuarios set usuario='{$usuario}', senha='{$senha}', ativo='{$ativo}', nivelacesso_id='{$nivelAcesso}' WHERE funcionario_id='{$funcionario_id}'";
        $resultado = mysqli_query($connection, $sql);
        if ($resultado) :
            $_SESSION['sucesso'] = true;
            $_SESSION['msg'] = "Atualizado com sucesso!";
            //$_SESSION['msg'] = "$sql";
            header('Location: editarCadastro.php?id=' . $funcionario_id);
        else :
            $_SESSION['erro'] = true;
            $_SESSION['msg'] = "Sinto muito, <br>ocorreu um erro ao tentar atualizar :(";
            //$_SESSION['msg'] = "$sql";
            header('Location: editarCadastro.php?id=' . $funcionario_id);
        endif;
    else :
        $_SESSION['erro'] = true;
        $_SESSION['msg'] = "Sinto muito, <br>ocorreu um erro ao tentar atualizar :(";
        //$_SESSION['msg'] = "$sql";
        header('Location: editarCadastro.php?id=' . $funcionario_id);
    endif;

endif;
