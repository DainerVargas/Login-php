<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location:index.html");
    exit();
}

// Resto del código de la página restringida
// ...
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área restringida</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>LOGO</h1>
        <nav class="menu">
             <a href="iniciar-sesion.php">Inicio</a>
            <a href="registro.php">Registrarse</a>
            <a href="actualizar.php">Actualizar datos</a>
            <a href="consultar.php">consultar</a>
            <a href="Delete.php">Eliminar registro</a>
            <a href="cerrar.php">Cerrar sesion</a>
        </nav>
    </header>
    <h2>WELCOME <?php echo $_SESSION["usuario"];?></h2>
    
</body>
</html>
