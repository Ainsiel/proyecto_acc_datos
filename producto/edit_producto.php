<?php
include("../db.php");
$link = AbrirConexion();
$titulo = '';
$autor= '';
$descripcion = '';
$categoria= '';
$anio_publicacion = 2000;
$editorial= '';
$precio = 10234;

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM producto WHERE id=$id";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $titulo = $row['titulo'];
    $autor= $row['autor'];
    $descripcion = $row['descripcion'];
    $categoria= $row['categoria'];
    $anio_publicacion = $row['anio_publicacion'];
    $editorial= $row['editorial'];
    $precio = $row['precio'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $titulo = $_POST['titulo'];
  $autor= $_POST['autor'];
  $descripcion = $_POST['descripcion'];
  $categoria= $_POST['categoria'];
  $anio_publicacion = $_POST['anio_publicacion'];
  $editorial= $_POST['editorial'];
  $precio = $_POST['precio'];

  $query = "UPDATE producto set titulo = '$titulo', autor = '$autor', descripcion = '$descripcion', categoria = '$categoria', anio_publicacion = '$anio_publicacion', editorial = '$editorial', precio = '$precio' WHERE id=$id";
  mysqli_query($link, $query);
  $_SESSION['message'] = 'Producto Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_producto.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Update Titulo">
        </div>
        <div class="form-group">
          <input name="autor" type="text" class="form-control" value="<?php echo $autor; ?>" placeholder="Update autor">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <div class="form-group">
          <input name="categoria" type="text" class="form-control" value="<?php echo $categoria; ?>" placeholder="Update categoria">
        </div>
        <div class="form-group">
          <input name="anio_publicacion" type="text" class="form-control" value="<?php echo $anio_publicacion; ?>" placeholder="Update anio_publicacion">
        </div>
        <div class="form-group">
          <input name="editorial" type="text" class="form-control" value="<?php echo $editorial; ?>" placeholder="Update editorial">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Update precio">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>