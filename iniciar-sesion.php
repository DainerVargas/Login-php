<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action="iniciar-sesion.php" method="post">
        <h1>¡WELCOME!</h1>
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <input type="submit" value="Registrarme" name="btn" class="btn">
    </form>
  <div class="hijo">
    <?php
    session_start();
    if (isset($_SESSION["usuario"])) {
        header("Location:area_restringida.php");
        exit();
    }
        $cone= new mysqli("localhost","root","","registro","3306");
        if(!empty($_POST["btn"])){
            if(empty($_POST["nombre"]) and empty($_POST["apellido"]) and empty($_POST["usuario"]) and empty($_POST["contraseña"])){
                echo "<h4>Llene todos los campos por favor</h4>";
            }else{
               $usuario=trim($_POST["usuario"]);
               $contraseña=md5(trim($_POST["contraseña"]));

               $sql="SELECT * FROM datos WHERE usuario='$usuario' and contraseña='$contraseña'";

               $result=mysqli_query($cone,$sql);
               if(mysqli_num_rows($result)){
                $_SESSION["usuario"]=$usuario;
                header("location:area_restringida.php");
            }  else{
                echo "<h4>Acceso denegado</h4>";
            }
            }
        }
    ?>
 </div>

</body>
</html>