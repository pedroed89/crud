<?php include('shared/header.php') ?>
<div class="container">
<form action="validations/crear-valid.php" method="post" class="row g-3">
<div class="col-12">
    <label for="nombre" class="form-label">Nombre y Apellidos</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="mail" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Repetir password</label>
    <input type="password" class="form-control" id="inputPassword5" name="password_conf">
  </div>

  <div class="col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>
</div>


<?php include('shared/footer.php'); ?>