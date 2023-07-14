<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_producto'])) {
  $titulo = $_POST['titulo'];
  $autor= $_POST['autor'];
  $descripcion = $_POST['descripcion'];
  $categoria= $_POST['categoria'];
  $anio_publicacion = $_POST['anio_publicacion'];
  $editorial= $_POST['editorial'];
  $precio = $_POST['precio'];
  $query = "INSERT INTO producto(titulo, autor, descripcion, categoria, anio_publicacion, editorial, precio) VALUES ('$titulo', '$autor', '$descripcion', '$categoria', '$anio_publicacion', '$editorial', '$precio')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: ../index.php');

}

?>