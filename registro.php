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
    <form action="registro.php" method="post">
        <h1>¡REGISTRATE!</h1>
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <input type="submit" value="Registrarme" name="btn" class="btn">
    </form>

    <div class="hijo2">
    <?php
        $cone=new mysqli("localhost","root","","registro","3306");
        if(!empty($_POST["btn"])){
            if(empty($_POST["nombre"]) and empty($_POST["apellido"]) and empty($_POST["usuario"]) and empty($_POST["contraseña"])){
                echo "<h4>llene todo los campos</h4>";

            }else{
                $nombre=trim($_POST["nombre"]);
                $apellido=trim($_POST["apellido"]);
                $usuario=trim($_POST["usuario"]);
                $contraseña=trim(md5($_POST["contraseña"]));

                $sql="INSERT INTO datos (nombre,apellido,usuario,contraseña) VALUES ('$nombre', '$apellido','$usuario','$contraseña')";
                $result=mysqli_query($cone,$sql);
                if($sql){
                    echo "<h4>Usuario registrado</h4>";
                }else{
                    echo "Usuario NO registrado";
                }

            }
        }
    ?>
    </div>
</body>
</html>