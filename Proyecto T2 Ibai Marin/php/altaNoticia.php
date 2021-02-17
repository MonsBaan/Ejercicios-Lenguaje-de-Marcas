<?php
  include "datos.php";

  $resultado = altaNoticia($_POST['titulo'], $_POST['resumen'], $_POST['desc'], $_POST['link'], $_POST['fecha'], $_POST['idUser']);
  header("location: ../index.php");
?>
