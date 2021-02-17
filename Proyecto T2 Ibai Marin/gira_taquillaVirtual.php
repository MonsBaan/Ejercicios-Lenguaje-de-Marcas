<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <a href="index.html"><title>Mastodon</title></a>
    <link rel="stylesheet" href="css/styleGira_taquillaVirtual.css">
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
        <li><a href="index.php" class="linkTitulo" class="linkTitulo">Inicio</a></li>
        <li><a href="gira_giraCompleta.php" class="linkTitulo">Gira</a>
          <ul>
            <li><a href="gira_giraCompleta.php" class="linkTitulo">Gira Completa</a></li>
            <li><a href="gira_galeria.php" class="linkTitulo">Galeria</a></li>
            <li id="taquillaVirtual" class="active"><a href="gira_taquillaVirtual.php" class="linkTitulo">Taquilla Virtual</a></li>
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
      <h2 id="ultimasnoticias">Gira Completa 2020-2021</h2>
    <div id="FechasGira">
      <h3 class="TituloGira">DOWNLOAD FESTIVAL 2021</a></h3>
      <p>Download Festival 2021</p>
      <p>Donington ParkCastle, Donington, UK</p>
      <h5><a href="https://www.songkick.com/festivals/1948-download/id/39585273-download-festival-2021?utm_source=46422&utm_medium=partner" class="compraTicket"></h>Compra de Tickets</a></h5>
      <h4 class="fechaGira">Junio 05 2021</h4>
    </div>
    <div id="FechasGira">
      <h3 class="TituloGira">ROCK AM RING 2021</a></h3>
      <p>Rock am Ring 2021</p>
      <p>Nürburgring, Nürburg, Germany</p>
      <h5><a href="https://www.songkick.com/festivals/1237-rock-am-ring/id/39558573-rock-am-ring-2021?utm_source=46422&utm_medium=partner" class="compraTicket"></h>Compra de Tickets</a></h5>
      <h4 class="fechaGira">Junio 11-13 2021</h4>
    </div>
    <div id="FechasGira">
      <h3 class="TituloGira">ROCK IM RING 2021</a></h3>
      <p>Rock im Park 2021</p>
      <p>Zeppelinfeld, Nuremberg, Germany</p>
      <h5><a href="https://www.songkick.com/festivals/19-rock-im-park/id/39617093-rock-im-park-2021?utm_source=46422&utm_medium=partner" class="compraTicket"></h>Compra de Tickets</a></h5>
      <h4 class="fechaGira">Junio 11-13 2021</h4>
    </div>
    <div id="FechasGira">
      <h3 class="TituloGira">DAGSPASS - TONS OF ROCK</a></h3>
      <p>Dagspass - Tons of Rock 2021</p>
      <p>Ekeberg, Oslo, Norway</p>
      <h5><a href="https://www.songkick.com/festivals/3274536-dagspass-tons-of-rock/id/39706851-dagspass--tons-of-rock-2021?utm_source=46422&utm_medium=partner" class="compraTicket"></h>Compra de Tickets</a></h5>
      <h4 class="fechaGira">Junio 24 2021</h4>
    </div>
    <div id="FechasGira">
      <h3 class="TituloGira">MONSTER ENERGY AFTERSHOCK 2021</a></h3>
      <p>Monster Energy Aftershock 2021</p>
      <p>Discovery Park, Sacramento, CA, US</p>
      <h5><a href="https://www.songkick.com/festivals/745774-monster-energy-aftershock/id/39649774-monster-energy-aftershock-2021?utm_source=46422&utm_medium=partner" class="compraTicket"></h>Compra de Tickets</a></h5>
      <h4 class="fechaGira">Octubre 10 2021</h4>
    </div>
    <div class= "floatclear"></div>

    <div id="pie">
      <div id="rrss">
        <div> Siguenos en redes sociales </div>
        <p></p>
        <a href="https://es-es.facebook.com/"><img class="iconosSociales" src="images/facebook.jpg"/></a>
        <a href="https://twitter.com/?lang=es"><img class="iconosSociales" src="images/twitter.png"/></a>
        <a href="https://www.instagram.com/?hl=es"><img class="iconosSociales" src="images/instagram.jpg"/></a>
      </div>
  </body>
</html>
