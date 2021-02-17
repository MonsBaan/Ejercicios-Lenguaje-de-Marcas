<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <a href="index.html"><title>Mastodon</title></a>
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="css/comun.css">
    <!-- https://fonts.google.com/specimen/Jura?stylecount=5&sort=popularity&sidebar.open=true&selection.family=Jura:wght@300;400;500;600;700 -->
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php
    session_start();
    include("php/datos.php")
    ?>
  </head><a href="#"></a>
  <div id="encabezado">
    <h1 id="tituloWeb">Mastodon</h1>
  </div>
  <body>
    <div id="menu">
      <ul>
        <li class="active"><a href="index.php" class="linkTitulo" class="linkTitulo">Inicio</a></li>
        <li><a href="gira_giraCompleta.php" class="linkTitulo">Gira</a>
          <ul>
            <li><a href="gira_giraCompleta.php" class="linkTitulo">Gira Completa</a></li>
            <li><a href="gira_galeria.php" class="linkTitulo">Galeria</a></li>
            <li id="taquillaVirtual"><a href="gira_taquillaVirtual.php" class="linkTitulo">Taquilla Virtual</a></li>
          </ul>
        </li>
        <li><a href="miembros.php" class="linkTitulo">Miembros</a></li>
        <li><a href="discografia.php" class="linkTitulo">Discografia</a></li>
      </ul>
      <?php
      if (isset( $_SESSION["user"] ) == false) {
        echo "<a class= 'enlaceMenu' href='registro.php'>Registro</a>";
        echo "<a class= 'enlaceMenu' href='login.php' style='margin-right: -21px;'>Login</a>";
      }else {
        echo "<a class='enlaceMenu' href='noticiaNueva.php' style='right: -10px; width: 40px;'>Alta</a>";
        echo "<a class='enlaceMenu' href='php/cerrarSesion.php' style='width: 115px;right: -47px;'>Cerrar Sesion</a>";
      }
      ?>
    </div>

    <div id="cuerpo">
      <?php
      $noticia = selNoticia($_GET['id_noticia']);
      $user = selUser($noticia['id_usuario']);
      echo "<h3 class='noticiaExph3' ><a href='".$noticia['enlace']."'>".$noticia['titulo']."</a></h3>";
      echo "<p class='noticiaExpP'>".$noticia['descripcion']."</p>";
      echo "<h4 class='noticiaExph4'>".$noticia['fecha']."</h4>";
      echo "<h4 class='noticiaExph4'>".$user['nombre']."</h4>";
      ?>

    </div>
    <div id="pie">
      <div id="rrss">
        <div> Siguenos en redes sociales </div>
        <p></p>
        <a href="https://es-es.facebook.com/"><img class="iconosSociales" src="images/facebook.jpg"/></a>
        <a href="https://twitter.com/?lang=es"><img class="iconosSociales" src="images/twitter.png"/></a>
        <a href="https://www.instagram.com/?hl=es"><img class="iconosSociales" src="images/instagram.jpg"/></a>
      </div>
    </div>
  </body>


</html>
