<?php
session_start();
if (!$_SESSION['usuario'] || $_SESSION['nivelacesso'] < 1) {
    Header('Location: index.php');
    exit();
}
?>