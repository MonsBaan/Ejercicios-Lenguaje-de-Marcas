<?php
  include "datos.php";

  $resultado = bajaNoticia($_GET['id_noticia']);
  header("location: ../index.php");
 ?>
