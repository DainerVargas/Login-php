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
    <div class="delete">
    <h1>TABLA DE REGISTRO</h1>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registro";
        
        // Crear conexión
        $conn = mysqli_connect($servername, $username, $password, $dbname);
       

// Consulta para obtener los registros de la base de datos
$sql = "SELECT ID, nombre, apellido, usuario, contraseña FROM datos";
$resultado = mysqli_query($conn, $sql);

// Mostrar los registros en una tabla

echo "<table width='100%' border='1px solid black'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Usuario</th><th>Contraseña</th><th>Eliminar</th></tr>";
while ($fila = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>$fila[ID]</td>";
    echo "<td>$fila[nombre]</td>";
    echo "<td>$fila[apellido]</td>";
    echo "<td>$fila[usuario]</td>";
    echo "<td>$fila[contraseña]</td>";
    echo "<td><a href=Delete.php?ID=$fila[ID]>Eliminar</a></td>";
    echo "</tr>";
}
echo "</table>";

if (isset($_GET['ID'])) {
    // Recuperar el ID del registro a eliminar
    $id = $_GET['ID'];

    // Crear la consulta SQL para eliminar el registro
    if($sql = "DELETE FROM datos WHERE ID = $id"){

        if (mysqli_query($conn, $sql)) {
            header("location:Delete.php");
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }
    }

    // Ejecutar la consulta
    
}


    ?>
    </div>
</body>
</html>