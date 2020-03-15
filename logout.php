<?php
session_start();
unset($_SESSION['usuario']);//derruba uma sessao apenas
//session_destroy();
header('Location: index.php');
?>
