<?php
  function conectarBD(){
    $mysqli = new mysqli ("127.0.0.1", "phpRoot", "123", "mastodon");
    if ($mysqli->connect_errno) {
      echo "Fallo en la conexion: ".$mysqli->connect_errno;
    }
    return $mysqli;
  }
//====================================================================
  function getNoticias(){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 5";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "getNoticias Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //EJECUCION DE SENTENCIA SQL
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
      echo "getNoticias Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    //RECORRER RESULTADOS DE LA SELECT
    $id = -1;
    $titulo = "";
    $resumen = "";
    $descripcion = "";
    $enlace = "";
    $fecha = "0000-00-00";
    $user= -1;
    $vincular = $sentencia->bind_result($id, $titulo, $resumen, $descripcion, $enlace, $fecha, $user);
    if (!$vincular) {
      echo "getNoticias Fallo Asociando Parametros a Variables: ".$mysqli->errno;
    }
    $noticiasArray = array();
    while ($sentencia->fetch()) {
      $noticia = array(
        "id_noticia"=>$id,
        "titulo"=>$titulo,
        "resumen"=>$resumen,
        "descripcion"=>$descripcion,
        "enlace"=>$enlace,
        "fecha"=>$fecha,
        "id_usuario"=>$user
      );
      $noticiasArray[]=$noticia;
      }
      $mysqli->close();
      return $noticiasArray;
  }//FIN DE LA FUNCION getNoticias
//====================================================================
  function getGiras(){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "SELECT * FROM giras ORDER BY fecha DESC";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "getGiras Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //EJECUCION DE SENTENCIA SQL
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
      echo "getGiras Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    //RECORRER RESULTADOS DE LA SELECT
    $id = -1;
    $nombre = "";
    $fecha = "0000-00-00";
    $localizacion = "";
    $enlace = "";
    $user= -1;
    $vincular = $sentencia->bind_result($id, $nombre, $fecha, $localizacion, $enlace, $user);
    if (!$vincular) {
      echo "getGiras Fallo Asociando Parametros a Variables: ".$mysqli->errno;
    }

    $girasArray = array();
    while ($sentencia->fetch()) {
      $gira = array(
        "id_gira"=>$id,
        "nombre"=>$nombre,
        "fecha"=>$fecha,
        "localizacion"=>$localizacion,
        "enlace"=>$enlace,
        "id_usuario"=>$user
      );
      $girasArray[]=$gira;
      }
      $mysqli->close();
      return $girasArray;

  }//FIN DE LA FUNCION getGiras
  //====================================================================
  function getMerch(){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "SELECT * FROM merch";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "getMerch Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //EJECUCION DE SENTENCIA SQL
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
      echo "getMerch Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    //RECORRER RESULTADOS DE LA SELECT
    $id = -1;
    $imagen = "";
    $nombre = "";
    $enlace = "";
    $audio = "";
    $user = -1;
    $vincular = $sentencia->bind_result($id, $imagen, $nombre, $enlace, $audio, $user);
    if (!$vincular) {
      echo "getMerch Fallo Asociando Parametros a Variables: ".$mysqli->errno;
    }

    $merchArray = array();
    while ($sentencia->fetch()) {
      $merch = array(
        "id_merch"=>$id,
        "imagen"=>$imagen,
        "nombre"=>$nombre,
        "enlace"=>$enlace,
        "audio"=>$audio,
        "id_usuario"=>$user

      );
      $merchArray[]=$merch;
    }
    $mysqli->close();
    return $merchArray;
  }//FIN DE LA FUNCION getMerch
  //====================================================================
  function insertarUsuario($user, $password, $email){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "INSERT INTO login (nombre, contraseña, email) VALUES (?,?,?)";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "insertarUsuario Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //ASOCIAR PARAMETROS
    $vincular = $sentencia->bind_param("sss", $user, $password, $email);
    if (!$vincular) {
      echo "insertarUsuario Fallo asociando parametros ".$mysqli->errno;
    }
    //EJECUTAR SENTENCIA
    $resultado = $sentencia->execute();
    if (!$ejecucion) {
      echo "insertarUsuario Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    $mysqli->close();
    return $resultado;
  }//FIN DE LA FUNCION insertarUsuario
  //====================================================================
  function loginUser($user, $password){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "SELECT * FROM login WHERE nombre = ? AND contraseña = ?";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "loginUser Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //ASOCIAR PARAMETROS
    $bind = $sentencia->bind_param("ss", $user, $password);
    if (!$bind) {
      echo "loginUser Fallo asociando parametros ".$mysqli->errno;
    }
    //EJECUTAR SENTENCIA
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
      echo "loginUser Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    $id = -1;
    $user = "";
    $password = "";
    $email = "";
    $vincular = $sentencia->bind_result($id, $user, $password, $email);
    if (!$vincular) {
      echo "loginUser Fallo Asociando Parametros a Variables: ".$mysqli->errno;
    }

    $resultadoUser = array();

    if ($sentencia->fetch()) {
      $resultadoUser = array (
        'id_user' => $id,
        'nombre' => $user,
        'contraseña' => $password,
        'email' => $email
      );
    }
    $mysqli->close();
    return $resultadoUser;
  }//FIN DE LA FUNCION loginUser
  //====================================================================
  function altaNoticia($titulo, $resumen, $desc, $link, $fecha, $idUser){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "INSERT INTO noticias(titulo, resumen, descripcion, enlace, fecha, id_usuario) VALUES (?,?,?,?,?,?)";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "altaNoticia Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //ASOCIAR PARAMETROS
    $bind = $sentencia->bind_param("sssssi", $titulo, $resumen, $desc, $link, $fecha, $idUser);
    if (!$bind) {
      echo "altaNoticia Fallo asociando parametros ".$mysqli->errno;
    }
    //EJECUTAR SENTENCIA
    $resultado = $sentencia->execute();
    if (!$resultado) {
      echo "altaNoticia Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    $mysqli->close();
    return $resultado;
  }//FIN DE LA FUNCION altaNoticia
  //====================================================================
  function bajaNoticia($idNoticia){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "DELETE FROM noticias WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "bajaNoticia Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //ASOCIAR PARAMETROS
    $bind = $sentencia->bind_param("i", $idNoticia);
    if (!$bind) {
      echo "bajaNoticia Fallo asociando parametros ".$mysqli->errno;
    }
    //EJECUTAR SENTENCIA
    $resultado = $sentencia->execute();
    if (!$resultado) {
      echo "bajaNoticia Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    $mysqli->close();
    return $resultado;
  }//FIN DE LA FUNCION bajaNoticia
  //====================================================================
  function modNoticia($id, $titulo, $resumen, $descripcion, $enlace){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "UPDATE noticias SET titulo = ?, resumen = ?, descripcion = ?, enlace = ? WHERE id_noticia = ?";

    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "modNoticia Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //ASOCIAR PARAMETROS
    $bind = $sentencia->bind_param("ssssi", $titulo, $resumen, $descripcion, $enlace, $id);
    if (!$bind) {
      echo "modNoticia Fallo asociando parametros ".$mysqli->errno;
    }
    //EJECUTAR SENTENCIA
    $resultado = $sentencia->execute();
    if (!$resultado) {
      echo "modNoticia Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    $mysqli->close();
    return $resultado;
  }//FIN DE LA FUNCION modNoticia
  //====================================================================
  function selNoticia($idNoticia){
      //ABRIR CONEXION
      $mysqli=conectarBD();
      //PREPARAR SELECT
      $sql = "SELECT * FROM noticias WHERE id_noticia = ?";
      $sentencia = $mysqli->prepare($sql);
      if (!$sentencia) {
        echo "selNoticia Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
      }
      //ASOCIAR PARAMETROS
      $bind = $sentencia->bind_param("i", $idNoticia);
      if (!$bind) {
        echo "selNoticia Fallo asociando parametros ".$mysqli->errno;
      }
      //EJECUTAR SENTENCIA
      $resultado = $sentencia->execute();
      if (!$resultado) {
        echo "selNoticia Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
      }
      //RECORRER RESULTADOS DE LA SELECT
      $id = -1;
      $titulo = "";
      $resumen = "";
      $descripcion = "";
      $enlace = "";
      $fecha = "0000-00-00";
      $idUser = -1;
      $vincular = $sentencia->bind_result($id, $titulo, $resumen, $descripcion, $enlace, $fecha, $idUser);
      if (!$vincular) {
        echo "selNoticia Fallo Asociando Parametros a Variables: ".$mysqli->errno;
      }
      $resultadoNot = array();

      while ($sentencia->fetch()) {
        $resultadoNot = array (
          'id_noticia' => $id,
          'titulo' => $titulo,
          'resumen' => $resumen,
          'descripcion' => $descripcion,
          'enlace' => $enlace,
          'fecha' => $fecha,
          'id_usuario' => $idUser
        );
      }
      $mysqli->close();
      return $resultadoNot;
    }//FIN DE LA FUNCION selNoticia
  //====================================================================
  function selUser($idUser){
  //ABRIR CONEXION
  $mysqli=conectarBD();
  //PREPARAR SELECT
  $sql = "SELECT * FROM login WHERE id_user = ?";
  $sentencia = $mysqli->prepare($sql);
  if (!$sentencia) {
    echo "selNoticia Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
  }
  //ASOCIAR PARAMETROS
  $bind = $sentencia->bind_param("i", $idUser);
  if (!$bind) {
    echo "selNoticia Fallo asociando parametros ".$mysqli->errno;
  }
  //EJECUTAR SENTENCIA
  $resultado = $sentencia->execute();
  if (!$resultado) {
    echo "selNoticia Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
  }
  //RECORRER RESULTADOS DE LA SELECT
  $id = -1;
  $nombre = "";
  $password = "";
  $email = "";

  $vincular = $sentencia->bind_result($id, $nombre, $password, $email);
  if (!$vincular) {
    echo "selNoticia Fallo Asociando Parametros a Variables: ".$mysqli->errno;
  }
  $resultadoNot = array();

  while ($sentencia->fetch()) {
    $resultadoNot = array (
      'id_user' => $id,
      'nombre' => $nombre,
      'contraseña' => $password,
      'email' => $email
    );
  }
  $mysqli->close();
  return $resultadoNot;
}//FIN DE LA FUNCION selUser
  //====================================================================
  function getMiembros(){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "SELECT * FROM miembros";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "getMiembros Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //EJECUCION DE SENTENCIA SQL
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
      echo "getMiembros Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    //RECORRER RESULTADOS DE LA SELECT
    $id = -1;
    $nombre = "";
    $descripcion = "";
    $imagen = "";
    $posicion = "";
    $user= -1;
    $vincular = $sentencia->bind_result($id, $nombre, $descripcion, $imagen, $posicion, $user);
    if (!$vincular) {
      echo "getMiembros Fallo Asociando Parametros a Variables: ".$mysqli->errno;
    }

    $miembros = array();
    while ($sentencia->fetch()) {
      $miembro = array(
        "id_miembro"=>$id,
        "nombre"=>$nombre,
        "descripcion"=>$descripcion,
        "imagen"=>$imagen,
        "posicion"=>$posicion,
        "id_usuario"=>$user
      );
      $miembros[]=$miembro;
      }
      $mysqli->close();
      return $miembros;
  }//FIN DE LA FUNCION getMiembros
  //====================================================================
  function getGaleria(){
    //ABRIR CONEXION
    $mysqli=conectarBD();
    //PREPARAR SELECT
    $sql = "SELECT * FROM galeria";
    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia) {
      echo "getMiembros Fallo en la Preparacion de la Sentencia ".$mysqli->errno;
    }
    //EJECUCION DE SENTENCIA SQL
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
      echo "getMiembros Fallo en la Ejecucion de la Sentencia ".$mysqli->errno;
    }
    //RECORRER RESULTADOS DE LA SELECT
    $id = -1;
    $imagen = "";
    $user= -1;
    $vincular = $sentencia->bind_result($id, $imagen, $user);
    if (!$vincular) {
      echo "getMiembros Fallo Asociando Parametros a Variables: ".$mysqli->errno;
    }

    $imagenes = array();
    while ($sentencia->fetch()) {
      $imagen = array(
        "id_galeria"=>$id,
        "imagen"=>$imagen,
        "id_usuario"=>$user
      );
      $imagenes[]=$imagen;
      }
      $mysqli->close();
      return $imagenes;
  }//FIN DE LA FUNCION getMiembros
  //====================================================================
 ?>
