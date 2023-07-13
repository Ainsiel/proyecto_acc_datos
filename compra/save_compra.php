<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_compra'])) {
  $id_usuario = $_POST['id_usuario'];
  $id_producto = $_POST['id_producto'];
  $query = "INSERT INTO compra(id_usuario, id_producto) VALUES ('$id_usuario', '$id_producto')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Compra Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: compras.php');

}

?>