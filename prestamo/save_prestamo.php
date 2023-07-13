<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_prestamo'])) {
  $id_socio = $_POST['id_socio'];
  $id_producto = $_POST['id_producto'];
  $query = "INSERT INTO prestamo(id_socio, id_producto) VALUES ('$id_socio', '$id_producto')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Prestamo Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: prestamos.php');

}

?>