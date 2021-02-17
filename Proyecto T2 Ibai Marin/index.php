
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
  </head>
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
      <div class="UltimasNoticias" id="seccion">
        <h2 id="ultimasnoticias">Ultimas Noticias</h2>

        <?php
          $noticia=getNoticias();
          for ($j=0; $j < sizeof($noticia); $j++) {
            echo "<div id=noticia>";
            echo "<h3><a href='".$noticia[$j]['enlace']."'>".$noticia[$j]['titulo']."</a></h3>";
            echo "<p>".$noticia[$j]['resumen']."</p>";
            if (isset( $_SESSION["user"] ) == true) {
              echo "<a class='enlaceMenu' href='noticiaMod.php?id_noticia=".$noticia[$j]['id_noticia']."' style='top: -8px;font-size: 15px;width: 78px;padding-left: 5px;'>Modificar</a>";
              echo "<a class='enlaceMenu' href='php/bajaNoticia.php?id_noticia=".$noticia[$j]['id_noticia']."' style='top: -8px;font-size: 15px;width: 44px;padding-left: 5px;margin-left: -1px;right: -48px;'>Baja</a>";
            }
            echo "<h4>".$noticia[$j]['fecha']."</h4>";
            echo "<p><a href='noticiaExp.php?id_noticia=".$noticia[$j]['id_noticia']."' class='leerMas'>Leer Mas</a></p>";
            echo "</div>";
          }
         ?>
        <div class= "floatclear"></div>

      </div>
      <div class="ProximasFechasGira" id="seccion">
        <h2>Proximas Fechas de Gira</h2>
        <?php
          $gira=getGiras();
          for ($j=0; $j < 4 ; $j++) {
            echo "<div id='FechasGira'>";
              echo "<h3 class='TituloGira'>".$gira[$j]['nombre']."</a></h3>";
              echo "<p>".$gira[$j]['nombre']."</p>";
              echo "<p>".$gira[$j]['localizacion']."</p>";
              echo "<h5><a href='".$gira[$j]['enlace']."' class='compraTicket'></h>Compra de Tickets</a></h5>";
              echo "<h4 class='fechaGira'>".$gira[$j]['fecha']."</h4>";
            echo "</div>";
          }
        ?>
          </div>
          <div class= "floatclear"></div>
      </div>
      <div class="ResumenMerchandising" id="seccion">
        <h2>Merchandising</h2>
        <?php
          $merch=getMerch();
          for ($j=0; $j < 3; $j++) {
            echo "<div id='album'>";
              echo "<img id= 'imagenAlbum' src='".$merch[$j]['imagen']."' alt='Album Mastodon Medium Rarities'>";
              echo "<h3>".$merch[$j]['nombre']."</h3>";
              echo "<h4 id='enlaceSpotify'><a href='".$merch[$j]['enlace']."' class='linkAlbum'>Enlace Spotify</a></h4>";
            echo "</div>";
          }
         ?>
      </div>
      <div class= "floatclear"></div>
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
