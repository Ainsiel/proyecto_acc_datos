<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_rol'])) {
  $tipo = $_POST['tipo'];
  $descripcion = $_POST['descripcion'];
  $query = "INSERT INTO rol(tipo, descripcion) VALUES ('$tipo', '$descripcion')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Rol Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: roles.php');

}

?>