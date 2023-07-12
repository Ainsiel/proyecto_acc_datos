<?php

include('../db.php');

$link = AbrirConexion();

if (isset($_POST['save_usuario'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $contrasenia = $_POST['contrasenia'];
  $id_rol = $_POST['id_rol'];
  $query = "INSERT INTO usuario(nombre, email, contrasenia, id_rol) VALUES ('$nombre', '$email', '$contrasenia', '$id_rol')";
  $result = EjecutarConsulta($query,$link);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'User Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: usuarios.php');

}

?>