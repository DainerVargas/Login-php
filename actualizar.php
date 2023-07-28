<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>LOGO</h1>
        <nav class="menu">
        <a href="index.html">Inicio</a>
            <a href="iniciar-sesion.php">Iniciar sesion</a>
            <a href="registro.php">Registrarse</a>
            <a href="actualizar.php">Actualizar datos</a>
            <a href="consultar.php">consultar</a>
            <a href="Delete.php">Eliminar registro</a>
        </nav>
    </header>
<div class="conte">
    <form action="actualizar.php" method="post">
    <h1>ACTUALIZAR</h1>
        <input type="text"  name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <h1>VERIFICA</h1>
        <input type="text" name="user" placeholder="Usuario" required>
        <input type="password" name="contra" placeholder="Contraseña" required>
        <input type="submit" name="btn" class="btn" value="Registrarse">
    </form>
    </div>

    <?php
    
        $cone = new mysqli("localhost","root","","registro","3306");
        if(!empty($_POST["btn"])){
            if(empty($_POST["nombre"]) and empty($_POST["apellido"]) and empty($_POST["usuario"]) and empty($_POST["contraseña"]) and empty($_POST["user"]) and empty($_POST["contra"])){
                echo "Llene todos los campos";
            }else{
                $nombre=trim($_POST["nombre"]);
                $apellido=trim($_POST["apellido"]);
                $usuario=trim($_POST["usuario"]);
                $contraseña= md5(trim($_POST["contraseña"]));
                $user=trim($_POST["user"]);
                $contra= md5(trim($_POST["contra"]));

                $sql="UPDATE `datos` SET `nombre`='$nombre',`apellido`=' $apellido',`usuario`='$usuario',`contraseña`='$contraseña' WHERE usuario='$user' and contraseña='$contra'";

                $result=mysqli_query($cone,$sql);
                if($result){
                    echo "Usuario Actualizado";
                }else{
                    echo "Usuario NO Actualizado";
                }
            }
        }
    ?>
</body>
</html>