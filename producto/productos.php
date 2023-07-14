<?php include("db.php"); ?>
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
        <form action="producto/save_producto.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="autor" class="form-control" placeholder="autor" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="categoria" class="form-control" placeholder="categoria" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="anio_publicacion" class="form-control" placeholder="año publicacion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="editorial" class="form-control" placeholder="editorial" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio" class="form-control" placeholder="precio" autofocus>
          </div>
          <input type="submit" name="save_producto" class="btn btn-success btn-block" value="Guardar producto">
        </form>
      </div>
    </div>




    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Año</th>
            <th>Editorial</th>
            <th>Precio</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $link = AbrirConexion();
          $query = "SELECT * FROM producto";
          $result = EjecutarConsulta($query,$link);    

          while($fila=mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $fila['titulo']; ?></td>
            <td><?php echo $fila['autor']; ?></td>
            <td><?php echo $fila['descripcion']; ?></td>
            <td><?php echo $fila['categoria']; ?></td>
            <td><?php echo $fila['anio_publicacion']; ?></td>
            <td><?php echo $fila['editorial']; ?></td>
            <td><?php echo $fila['precio']; ?></td>
            <td>
              <a href="producto/edit_producto.php?id=<?php echo $fila['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="producto/delete_producto.php?id=<?php echo $fila['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>