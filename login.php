<?php
session_start();
include('connectDB.php');
if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}
$user = mysqli_real_escape_string($connection, $_POST['usuario']);
$passw = mysqli_real_escape_string($connection, $_POST['senha']);
$query = "SELECT usuario_id, usuario FROM usuarios WHERE usuario='{$user}' AND senha=md5('{$passw}')";
$result = mysqli_query($connection, $query);  //recebe o resultado da consulta

$row = mysqli_num_rows($result);
if ($row == 1) {
    $_SESSION['usuario'] = $user;
    header('Location: logged.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}
