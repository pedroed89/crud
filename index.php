<?php
include('shared/header.php');
?>
<div class="container">
  <!-- Flexbox container for aligning the toasts -->
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
            echo '<tr id="'.$row["id"].'"><td>'.$row["nombre"].'</td><td>'.$row["mail"].'</td><td>'.$row["telefono"].'</td><td>'.$row["username"].'</td><td style="display:flex"><form action="crear.php" method="get"><input type="hidden" value="'.$row["id"].'" name="id"><button type="submit" class="btn btn-primary">Editar</button></form><form id="deleteForm'.$row["id"].'" action="validations/confirm-delete.php" method="post"><input name="id" type="hidden" value="'.$row["id"].'"><button type="submit" id="delete'.$row["id"].'" onclick="clickHandler(event)" class="btn btn-danger">Eliminar</button></form></td> </tr>';              
        }
    } else {
        printf('No record found.<br />');
    }
  ?>
  </tbody>
</table>
  </div>

<?php include('shared/footer.php') ?>