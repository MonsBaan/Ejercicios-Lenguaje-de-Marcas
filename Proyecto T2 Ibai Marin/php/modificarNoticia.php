<?php
  include "datos.php";

  $resultado = modNoticia($_POST['idNoticia'], $_POST['titulo'], $_POST['resumen'], $_POST['desc'], $_POST['link']);

  header("location: ../index.php");
?>
