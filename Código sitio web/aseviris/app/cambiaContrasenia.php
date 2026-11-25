<!-- 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
-->

<?php
if (!isset($_SESSION)) {
  session_start();
}

// Si no hay una sesión iniciada redirige a la página "Acceso"
if (!isset($_SESSION["codBodega"])) {
  header("Location: acceso.php");
  exit;
}

if (isset($_POST["actualizar_contrasenia"])) {

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codBodega = $_SESSION["codBodega"] ?? '';
    $password_actual = $_POST["password_actual"];
    $nueva_password = $_POST["nueva_password"];
    $confirmar_password = $_POST["confirmar_password"];
    require "conexionMySQL.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Captura de excepciones o errores en tiempo de ejecución
    try {
      $conexion = conexion();
      $sql = 'SELECT contrasenia FROM bodegas WHERE codBodega="' . htmlspecialchars($codBodega) . '"';
      $resultado = $conexion->query($sql);
      $datosBodega = $resultado->fetch_array();
      if (!password_verify($password_actual, $datosBodega["contrasenia"])) {
        $mensaje = '<img src="../images/useranonyme-red-10270682.svg" class="img-error flo-left mt-13" alt="Símbolo de alerta"><p class="fw-bold fc-red flo-left ml-5" data-i18n="pgCambiarContrasenia_mensaje_1">La contraseña actual es incorrecta.</p>';
        include "../content/asociadosCambiarContrasenia.php";
        exit;
      } else  if ($nueva_password !== $confirmar_password) {
        $mensaje = '<img src="../images/useranonyme-red-10270682.svg" class="img-error flo-left mt-13" alt="Símbolo de alerta"><p class="flo-left fw-bold fc-red ml-5" data-i18n="pgCambiarContrasenia_mensaje_2">Las nuevas contraseñas no coinciden.</p>';
        include "../content/asociadosCambiarContrasenia.php";
        exit;
      } else {
        $nueva_password_hash = password_hash($nueva_password, PASSWORD_BCRYPT);
        $sqlUpdate = "UPDATE bodegas SET contrasenia = '$nueva_password_hash' WHERE codBodega='" . htmlspecialchars($codBodega) . "'";
        $conexion->query($sqlUpdate);
        $conexion->close();
        $mensaje = '<img src="../images/useranonyme-check-10270681.svg" class="img-Ok flo-left mt-13" alt="Símbolo de alerta"><p class="flo-left fw-bold fc-green ml-5" data-i18n="pgCambiarContrasenia_mensaje_3">La contraseña se ha actualizado correctamente.</p>';
        include "../content/asociadosCambiarContrasenia.php";
        exit;
      }

      // Procesado de las excepciones o errores capturados en tiempo de ejecución
    } catch (mysqli_sql_exception $error) {
      $mensaje = '<div class="ta-center"><img src="../images/openicons-attention-98513.svg" class="img-alerta mt-13" alt="Símbolo de alerta"><p class="mt-13" data-i18n="pgCambiarContrasenia_mensaje_4">El servidor encontró un error interno y no pudo completar tu solicitud.</p><p data-i18n="pgCambiarContrasenia_mensaje_5">Inténtalo de nuevo pasados unos minutos.</p><p data-i18n="pgCambiarContrasenia_mensaje_6">Gracias.</p></div>';
      include "../content/asociadosCambiarContrasenia.php";
      exit;
    }
  }
}
?>