<?php
include('shared/header.php');

$user = isset($_SESSION['username'])?$_SESSION['username']:"";

$my_Usr = "Username: ".  $user;
$termino = "";
if(isset($_GET['termino']))
{
  $termino = $_GET['termino'];
}
include('db.php'); 
$q = "SELECT id,nombre,mail,telefono,username,imagen FROM usuario";
$response = $connection->query($q);


?>

<div class="container">
  <h4><?php echo $user;?></h4>
  <!-- Flexbox container for aligning the toasts -->
    <a href="crear.php" class="btn btn-primary">Crear</a>
    <a id="test" class="btn btn-primary">Sweet</a>
    <br>
    <div class="row">
      <div class="col-4" >
        <br>
      <form action="index.php" method="GET" style="display: flex;flex-direction:row">
        <input type="text" name="termino" value="<?php echo isset($_GET['termino'])? $_GET['termino'] : "" ?>" class="form-control" placeholder="Filtrar">
        <button type="submit" href="index.php" class="btn btn-danger">Filtrar</button>
    </form>
      </div>
    </div>

    
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Mail</th>
      <th scope="col">Telefono</th>
      <th scope="col">Usuario</th>
      <th scope="col">Foto</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php

    if ($response->num_rows > 0) {
        while($row = $response->fetch_assoc()) {
          if($termino != ""){
            if(strpos(strtolower($row["nombre"]),strtolower($termino)) !== false || strpos(strtolower($row["telefono"]),strtolower($termino)) !== false){
              echo '<tr id="'.$row["id"].'"><td>'.$row["nombre"].'</td><td>'.$row["mail"].'</td><td>'.$row["telefono"].'</td><td>'.$row["username"].'</td><td><img style="width:50px;" src="upload/'.$row["imagen"].'"></td><td style="display:flex"><form action="crear.php" method="get"><input type="hidden" value="'.$row["id"].'" name="id"><button type="submit" class="btn btn-primary">Editar</button></form><form id="deleteForm'.$row["id"].'" action="validations/confirm-delete.php" method="post"><input name="id" type="hidden" value="'.$row["id"].'"><button type="submit" id="delete'.$row["id"].'" onclick="clickHandler(event)" class="btn btn-danger">Eliminar</button></form></td> </tr>';      
            }
          }
          else{
            echo '<tr id="'.$row["id"].'"><td>'.$row["nombre"].'</td><td>'.$row["mail"].'</td><td>'.$row["telefono"].'</td><td>'.$row["username"].'</td><td><img style="width:50px;" src="upload/'.$row["imagen"].'"></td><td style="display:flex"><form action="crear.php" method="get"><input type="hidden" value="'.$row["id"].'" name="id"><button type="submit" class="btn btn-primary">Editar</button></form><form id="deleteForm'.$row["id"].'" action="validations/confirm-delete.php" method="post"><input name="id" type="hidden" value="'.$row["id"].'"><button type="submit" id="delete'.$row["id"].'" onclick="clickHandler(event)" class="btn btn-danger">Eliminar</button></form></td> </tr>';      
          }
        }
    } else {
        printf('No record found.<br />');
    }
  ?>
  </tbody>
</table>
  </div>

<?php include('shared/footer.php') ?>