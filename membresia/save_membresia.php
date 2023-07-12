<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_membresia'])) {
  $tipo = $_POST['tipo'];
  $dias = $_POST['dias'];
  $query = "INSERT INTO membresia(tipo, dias) VALUES ('$tipo', '$dias')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Membresia Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: membresias.php');

}

?>