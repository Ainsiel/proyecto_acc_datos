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
        <form action="save_prestamo.php" method="POST">
          <div class="form-group">
            <input type="text" name="id_socio" class="form-control" placeholder="ID Socio" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_producto" class="form-control" placeholder="ID Producto" autofocus>
          </div>
          <input type="submit" name="save_prestamo" class="btn btn-success btn-block" value="Guardar Prestamo">
        </form>
      </div>
    </div>


    <!---TABLE--->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha inicio</th>
            <th>Fecha devolucion</th>
            <th>ID Socio</th>
            <th>ID Producto</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "../db.php";
          $link = AbrirConexion();
          $query = "SELECT * FROM prestamo";
          $result = EjecutarConsulta($query,$link);    

          while($fila=mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['fecha_inicio']; ?></td>
            <td><?php echo $fila['fecha_devolucion']; ?></td>
            <td><?php echo $fila['id_socio']; ?></td>
            <td><?php echo $fila['id_producto']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('../includes/footer.php'); ?>