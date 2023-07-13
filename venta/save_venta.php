<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_venta'])) {
  $id_usuario = $_POST['id_usuario'];
  $id_producto = $_POST['id_producto'];
  $query = "INSERT INTO venta(id_usuario, id_producto) VALUES ('$id_usuario', '$id_producto')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Venta Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: ventas.php');

}

?>