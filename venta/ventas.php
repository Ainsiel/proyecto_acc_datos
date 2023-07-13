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
        <form action="save_venta.php" method="POST">
          <div class="form-group">
            <input type="text" name="id_usuario" class="form-control" placeholder="ID Usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="id_producto" class="form-control" placeholder="ID Producto" autofocus>
          </div>
          <input type="submit" name="save_venta" class="btn btn-success btn-block" value="Guardar Venta">
        </form>
      </div>
    </div>


    <!---TABLE--->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>ID Usuario</th>
            <th>ID Producto</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "../db.php";
          $link = AbrirConexion();
          $query = "SELECT * FROM venta";
          $result = EjecutarConsulta($query,$link);    

          while($fila=mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['fecha_venta']; ?></td>
            <td><?php echo $fila['id_usuario']; ?></td>
            <td><?php echo $fila['id_producto']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('../includes/footer.php'); ?>