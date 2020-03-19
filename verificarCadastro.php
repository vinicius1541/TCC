<?php
session_start();
include('connectDB.php');

$nome = mysqli_real_escape_string($connection, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($connection, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($connection, trim(md5($_POST['senha'])));
$email = mysqli_real_escape_string($connection, trim($_POST['email']));
$endereco = mysqli_real_escape_string($connection, trim($_POST['end']));
$cel = mysqli_real_escape_string($connection, trim($_POST['cel']));
$cpf = mysqli_real_escape_string($connection, trim($_POST['cpf']));
$rg = mysqli_real_escape_string($connection, trim($_POST['rg']));
$nivelAcesso = mysqli_real_escape_string($connection, trim($_POST['nivel']));


$sql = "SELECT COUNT(*) total FROM usuarios WHERE usuario='$usuario'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastrar.php');
    exit;
}
$sql = "INSERT INTO funcionarios(nome,cpf,rg,celular,email,endereco,ativo,dtEntrada,dtSaida) VALUES('$nome', '$cpf', '$rg', '$cel','$email','$endereco',1, NOW(), null)";
if($connection->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}


$sql1 = "SELECT * FROM funcionarios WHERE cpf = '$cpf'";
$result1 = mysqli_query($connection,$sql1);
while($sql1 = mysqli_fetch_array($result1)){
    $idFuncionario = $sql1["funcionario_id"];
}
if($idFuncionario != null){
    $sql2 = "INSERT INTO usuarios(usuario, senha, ativo, nivelacesso_id,funcionario_id) VALUES('$usuario', '$senha', 1, $nivelAcesso  , $idFuncionario)";
    $result2 = mysqli_query($connection,$sql2);
}



$connection->close();
header('Location: cadastrar.php');
exit;
?>