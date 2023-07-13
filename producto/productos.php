<?php include("db.php"); ?>
<main class="container p-4">
  <div class="row">
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