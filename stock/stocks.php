<?php include("../db.php"); ?>
<?php include('../includes/header.php'); ?>
<main class="container p-4">
  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID Producto</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $link = AbrirConexion();
          $query = "SELECT * FROM stock";
          $result = EjecutarConsulta($query,$link);    

          while($fila=mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $fila['id_producto']; ?></td>
            <td><?php echo $fila['cantidad']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include('../includes/footer.php'); ?>