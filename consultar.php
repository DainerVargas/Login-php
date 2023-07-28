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
    <form action="consultar.php" method="post">
        <h1>CONSULTAR!</h1>
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="submit" value="Consultar" name="btn" class="btn">
    </form>
  <div class="tabla">
    <?php
        $cone = new mysqli("localhost","root","","registro","3306");
        if(!empty($_POST["btn"])){
            if(empty($_POST["usuario"])){
                echo "<h4>Llene el campo por favor</h4>";
            }else
            {
                $usuario=trim($_POST["usuario"]);

                $sql="SELECT * FROM datos WHERE usuario='$usuario'";

                $result=mysqli_query($cone,$sql);

                while($datos=mysqli_fetch_array($result)){
                    echo "
                    <table width='60%' border='1px solid black'>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Contraseña</th>
    </tr>
    <tr>
        <td>$datos[nombre]</td>
        <td>$datos[apellido]</td>
        <td>$datos[usuario]</td>
        <td>$datos[contraseña]</td>
    </tr>
   </table>
                    
                    
                    ";
                }
            }
        }
    ?>

 </div>

</body>
</html>


<!-- $cone= new mysqli("localhost","root","","registro","3306");
    if(!empty($_POST["btn"])){
        if(empty($_POST["usuario"])){
            echo "<h4>Llene el campo por favor</h4>";
        }else{
            $usuario=trim($_POST["usuario"]);

            $sql="SELECT * FROM datos WHERE usuario='$usuario'";

            $result=mysqli_query($cone,$sql);

            while($datos=mysqli_fetch_array($result)){
                echo "
                <table width='100%' border='1px solid black' border-collaps='collaps'>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                </tr>
                <tr>
                    <td>$datos[nombre]</td>
                    <td>$datos[apellido]</td>
                    <td>$datos[usuario]</td>
                    <td>$datos[contraseña]</td>
                </tr>
                ";
            }
        }
    } -->