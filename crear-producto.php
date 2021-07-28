<?php

include('shared/header.php'); 

$id = isset($_GET["id"]) ? $_GET["id"] :0;
$nombre = "";
$precio = "";
$cantidad = "";
$categoria = "";
$descripcion = "";
include('db.php'); 
    $q = "SELECT id,nombre,cantidad,precio,descripcion,categoria FROM producto WHERE id = $id";
    $response = $connection->query($q);
    if ($response->num_rows > 0) {
      while($row = $response->fetch_assoc()) {
        $cantidad = $row['cantidad'];
        $precio = $row['precio'];
        $nombre = $row['nombre'];
        $categoria =$row['categoria']; 
        $descripcion =$row['descripcion'];          
      }
  }

?>

<div class="container">
  <?php

    if($id===0){
      echo "<h1>Crear</h1>";
    }
    else{
      echo "<h1>Editar</h1>";
    }
  
  
  ?>
<form action="validations/producto-valid.php" method="post" class="row g-3">
<div class="col-12">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <label for="nombre" class="form-label">Nombre del Producto</label>
    <input type="text" value="<?php echo $nombre;?>"name="nombre" class="form-control" id="nombre" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Precio</label>
    <input type="text" value="<?php echo $precio;?>" name="precio" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="cantidad" class="form-label">Cantidad</label>
    <input type="text" class="form-control" value="<?php echo $cantidad;?>" id="cantidad" name="cantidad" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="username" class="form-label">Categoria</label>
    <input type="number" class="form-control" value="<?php echo $categoria;?>" id="categoria" name="categoria" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="username" class="form-label">Descripcion</label>
    <textarea type="text" class="form-control" id="descripcion" name="descripcion" placeholder=""><?php echo $descripcion;?></textarea>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>
</div>


<?php include('shared/footer.php'); ?>