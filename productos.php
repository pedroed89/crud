<?php
include('shared/header.php');
?>
<div class="container">
  <h1>Productos</h1>
  <!-- Flexbox container for aligning the toasts -->
  <a href="crear-producto.php" class="btn btn-primary">Crear</a>
  <br>
  <form id="filtrarForm" action="productos.php" method="get">
    <label for="desde">Desde</label>
    <input type="text" name="desde" id="desde" value="<?php echo isset($_GET["desde"])?$_GET["desde"]:'';  ?>">
    <label for="hasta">Hasta</label>
    <input type="text" name="hasta" id="hasta" value="<?php echo isset($_GET["hasta"])?$_GET["hasta"]:'';  ?>">
    <label for="cantidad">Cantidad</label>
    <input type="radio" checked="checked" name="criterio" id="cantidad">
    <label for="precio">Precio</label>
    <input type="radio" name="criterio" id="precio">
    <input type="hidden" name="criterioValor" id="criterioValor">
    <button type="submit" onclick="filtrar_func(event)" id="filtrar">Filtrar</button>
  </form>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categoria</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php
    include('db.php'); 
    $q = "SELECT id,nombre,cantidad,precio,descripcion,categoria_id FROM producto";
    
    if(isset($_GET["desde"]) && isset($_GET["hasta"]) && isset($_GET["criterio"])){
      $desde = $_GET["desde"];
      $hasta = $_GET["hasta"];
      $criterio = $_GET["criterioValor"];
      if($criterio === "cantidad"){
        $q = "SELECT id,nombre,cantidad,precio,descripcion,categoria_id FROM producto where cantidad>=$desde and cantidad<=$hasta";
      }
      else{
        $q = "SELECT id,nombre,cantidad,precio,descripcion,categoria_id FROM producto where precio>=$desde and precio<=$hasta";
      }
      
      echo $criterio;
    }
    $response = $connection->query($q);

    if ($response->num_rows > 0) {
        while($row = $response->fetch_assoc()) {
            echo '<tr id="'.$row["id"].'">
            <td>'.$row["nombre"].'</td>
            <td>'.$row["cantidad"].'</td>
            <td>'.$row["precio"].'</td>
            <td>'.$row["descripcion"].'</td>
            <td>'.$row["categoria_id"].'</td>
            <td style="display:flex">
            <form action="crear-producto.php" method="get">
            <input type="hidden" value="'.$row["id"].'" name="id">
            <button type="submit" class="btn btn-primary">
            Editar</button>
            </form>
            <form id="deleteForm'.$row["id"].'" action="validations/product-delete.php" method="post">
            <input name="id" type="hidden" value="'.$row["id"].'">
            <button type="submit" id="delete'.$row["id"].'" onclick="clickHandler(event)" class="btn btn-danger">
            Eliminar</button>
            </form>
            </td>
             </tr>';              
        }
    } else {
        printf('No record found.<br />');
    }
  ?>
  </tbody>
</table>
  </div>
  <?php include('shared/footer.php') ?>
