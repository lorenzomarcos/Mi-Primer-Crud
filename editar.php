
<?php
include("modelo/conexion.php");

$conn = new conexion();

// Verificar si se pasa un ID para editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener los datos del registro actual
    $sql = "SELECT * FROM crud WHERE id = $id";
    $result = $conn->consultar($sql);
    if (count($result) > 0) {
        $usuario = $result[0]; // Asumiendo que se recupera un solo registro
    } else {
        die("Usuario no encontrado");
    }
} else {
    die("ID no especificado");
}

// Actualizar usuario
if ($_POST) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];

    $sql = "UPDATE crud SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE id = $id";
    $conn->ejecutar($sql);

    header("Location: index.php"); // Redirigir después de actualizar
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1 class="text-center p-3">Edita Tus Datos</h1>
    <form action="" method="POST" class="col-4 p-3 m-auto">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $usuario['email']; ?>" required>
        </div>

        <button type="submit" class="btn btn-info">Editar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



