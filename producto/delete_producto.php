<?php

include('../db.php');

$link = AbrirConexion();

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM producto WHERE id = $id";
  $result = mysqli_query($link, $query);
  if(!$result) {
    die("Query Failed: " . mysqli_error($link));
  }

  $_SESSION['message'] = 'Producto Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>