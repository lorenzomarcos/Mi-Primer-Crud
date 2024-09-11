
<?php include ("modelo/conexion.php"); ?>
<?php

if($_POST){
print_r($_POST);
$nombre= $_POST["nombre"];
$apellido= $_POST["apellido"];
$email= $_POST["email"];
$conn= new conexion();
$sql="INSERT INTO `crud` (`id`, `nombre`, `apellido`, `email`) VALUES (NULL, '$nombre', '$apellido', '$email');";
$conn->ejecutar($sql);
header("location:index.php");

}

if($_GET) {
    
 
    $id=$_GET["borrar"];
    $conn= new conexion();
    $sql="DELETE FROM `crud` WHERE `crud`.`id` =".$id;
    $conn->ejecutar($sql);
    header("location:index.php");
}







$conn= new conexion();
$crud=$conn->consultar("SELECT * FROM `crud`");


//print_r($resultado);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en PHP y Mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    
<h1 class= "text-center p-3">HOLA MUNDO</h1>
<div class="continer-fluid row">

<form action="index.php" method="POST" enctype="multipart/form-data"  class="col-4 p-3">
<h3 class="text-center text-secondary">Registro de Persona</h3>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
    <input type="text" class="form-control" name="nombre" required>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
    <input type="text" class="form-control" name="apellido" required>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Email</label>
    <input type="email" class="form-control" name="email"required>
    </div>

    <button type="submit" class="btn btn-success" name="btnregistrar" value="ok">Registrar</button>
</form >
<div class="col-8 p-4">

    <table class="table">
    <thead class="bg-info">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">email</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    
<?php  foreach ($crud as $crudd) { ?>

    <tr>

        <td><?php echo $crudd ["id"]; ?></td>
        <td><?php echo $crudd ["nombre"]; ?></td>
        <td><?php echo $crudd ["apellido"]; ?></td>
        <td><?php echo $crudd ["email"]; ?></td>
        <td>
        <a class="btn btn-info" href="editar.php?id=<?php echo $crudd['id']; ?>">Editar</a>
        
        <a class="btn btn-danger" href="?borrar=<?php echo $crudd ['id']; ?>">Eliminar</a>
        
        
    </td>
    </tr>
<?php } ?>
    
    </tbody>
    </table>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>