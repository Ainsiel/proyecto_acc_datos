<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_socio'])) {
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $id_usuario = $_POST['id_usuario'];
  $id_membresia = $_POST['id_membresia'];
  $query = "INSERT INTO socio(direccion, telefono, id_usuario, id_membresia) VALUES ('$direccion', '$telefono', '$id_usuario', '$id_membresia')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Socio Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: socios.php');

}

?>