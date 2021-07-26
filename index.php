<?php
include('shared/header.php');
?>
<div class="container">
    <a href="crear.php" class="btn btn-primary">Crear</a>
    <a id="test" class="btn btn-primary">Sweet</a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Mail</th>
      <th scope="col">Telefono</th>
      <th scope="col">Usuario</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php
    include('db.php'); 
    $q = "SELECT id,nombre,mail,telefono,username FROM usuario";
    $response = $connection->query($q);

    if ($response->num_rows > 0) {
        while($row = $response->fetch_assoc()) {
            echo '<tr id="'.$row["id"].'"><td>'.$row["nombre"].'</td><td>'.$row["mail"].'</td><td>'.$row["telefono"].'</td><td>'.$row["username"].'</td><td><a href="crear.php" class="btn btn-primary">Editar</a><a onclick="clickHandler(event)" id="delete'.$row["id"].'" class="btn btn-danger">Eliminar</a></td> </tr>';              
        }
    } else {
        printf('No record found.<br />');
    }
  ?>
  </tbody>
</table>
  </div>

<?php include('shared/footer.php') ?>