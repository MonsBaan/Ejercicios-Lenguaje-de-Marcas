<?php
  include "datos.php";

  $user = $_POST["user"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  $resultado = insertarUsuario($user, $password, $email);
  header("location: ../index.php");

 ?>
