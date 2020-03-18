<?php
session_start();
if (!$_SESSION['usuario']) {
    Header('Location: index.php');
    exit();
}
?>