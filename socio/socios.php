<?php include('../includes/header.php'); ?>
<main class="container p-4">
  <div class="row">

    <!-- MESSAGES -->
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_socio.php" method="POST">
          <div class="form-group">
            <input type="text" name="direccion" class="form-control" placeholder="Direccion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="Telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_usuario" class="form-control" placeholder="ID Usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_membresia" class="form-control" placeholder="ID Membresia" autofocus>
          </div>
          <input type="submit" name="save_socio" class="btn btn-success btn-block" value="Guardar Socio">
        </form>
      </div>
    </div>


    <!---TABLE--->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>ID Usuario</th>
            <th>ID Membresia</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "../db.php";
          $link = AbrirConexion();
          $query = "SELECT * FROM socio";
          $result = EjecutarConsulta($query,$link);    

          while($fila=mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $fila['direccion']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['id_usuario']; ?></td>
            <td><?php echo $fila['id_membresia']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('../includes/footer.php'); ?>