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
        <form action="save_rol.php" method="POST">
          <div class="form-group">
            <input type="text" name="tipo" class="form-control" placeholder="Tipo rol" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion rol"></textarea>
          </div>
          <input type="submit" name="save_rol" class="btn btn-success btn-block" value="Guardar Rol">
        </form>
      </div>
    </div>


    <!---TABLE--->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tipo</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "../db.php";
          $link = AbrirConexion();
          $query = "SELECT * FROM rol";
          $result = EjecutarConsulta($query,$link);    

          while($fila=mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $fila['tipo']; ?></td>
            <td><?php echo $fila['descripcion']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('../includes/footer.php'); ?>