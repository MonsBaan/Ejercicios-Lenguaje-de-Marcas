<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <a href="index.html"><title>Mastodon</title></a>
    <link rel="stylesheet" href="css/registro.css">
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

      <form id="formulario" action="php/altaNoticia.php" method="post">
        <label id="label" for="titulo">Titulo</label>
        <input id="txt" type="text" name="titulo" placeholder="Introduce el titulo"><br>
        <label id="label" for="desc">Resumen</label>
        <input id="txt" type="text" name="resumen" placeholder="Introduce un breve resumen"><br>
        <label id="label" for="desc">Descripcion</label>
        <input id="txt" type="text" name="desc" placeholder="Introduce la descripcion"><br>
        <label id="label" for="link">Enlace</label>
        <input id="txt" type="thidden" name="link" placeholder="Introduce el enlace"><br>
        <?php
        $fecha = date('Y-m-d');
        echo "<input id='txt' type='hidden' name='fecha' value='".$fecha."'>";
        echo "<input id='user' type='hidden' name='idUser' value='".$_SESSION['idUser']."'>";
         ?>
        <input id="enviar" type="submit" value="Enviar"/>
      </form>
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
