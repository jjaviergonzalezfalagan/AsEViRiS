<!-- 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
-->

<?php
function conexion()
{
  $mysqli_conexion = new mysqli("localhost", "aseviris", "zUk%:%)G[4WW(%y317:kZ", "aseviris");
  if ($mysqli_conexion->connect_errno) {
    echo "Error de conexión con la base de datos: " . $mysqli_conexion->connect_errno;
    exit;
  }
  mysqli_set_charset($mysqli_conexion, "utf8");
  return $mysqli_conexion;
}
?>