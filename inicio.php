<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
require_once("includes/conexion.php");
if(isset($_SESSION['usuario'])){
    echo '<div class="header">';
    echo '<span>Hola: '.$_SESSION['usuario'].'</span> | ';
    echo '<a href="logout.php">SALIR</a>';
    echo '</div>';
}else{
    header('location:index.php');
}
?>
    <h2>ingresamos</h2>
</body>
</html>