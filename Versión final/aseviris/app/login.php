<!-- 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
-->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Title" content="Asociación de Empresarios del Vino de la Ribeira Sacra">
  <meta name="Author" content="J.Javier González Falagán">
  <meta name="description" content="Página de la Asociación de Empresarios del Vino de la Ribeira Sacra">
  <meta name="Keywords" content="Ribeira Sacra, Asociación de Empresarios, Vino">
  <meta name="Language" content="Spanish">
  <title data-i18n="pgLogin_titulo">AsEViRiS / Login</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>

  <!-- Mensaje de error para el usuario en caso de fallo de conexión con la base de datos -->
  <dialog id="mensajeError" class="mensajeError">
    <img src="../images/openicons-attention-98513.svg" class="img-alerta">
    <p id="mensajeDeError_1">El servidor encontró un error interno y no pudo completar tu solicitud.</p>
    <p id="mensajeDeError_2">Inténtalo de nuevo pasados unos minutos.</p>
    <p id="mensajeDeError_3">Gracias.</p>
    <div class="ta-center">
      <button id="btnmensajeErrorAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

  <?php
  if (isset($_POST["entrar"])) {
    $codBodega = $_POST["codBodega"] ?? '';
    $contrasenia = $_POST["contrasenia"] ?? '';
    if (empty($codBodega) || empty($contrasenia)) {
      $error = '<img src="../images/useranonyme-red-10270682.svg" class="img-error flo-left mt-13" alt="Símbolo de alerta"><p class="flo-left fw-bold fc-red mt-15 ml-5" data-i18n="pgAcceso_seccion_inicio_sesion_error_1">Debes introducir un código de bodega y una contraseña.</p>';
      include "../content/acceso.php";
      exit;
    } else {
      require "conexionMySQL.php";
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      // Captura de excepciones o errores en tiempo de ejecución
      try {
        $conexion = conexion();
        $sqlSelect = "SELECT * FROM bodegas WHERE codBodega = " . '"' . htmlspecialchars($codBodega) . '"';
        $resultado = $conexion->query($sqlSelect);
        $datos = $resultado->fetch_array();
        if ($codBodega && password_verify($contrasenia, $datos['contrasenia'])) {
          session_start();
          $_SESSION["codBodega"] = $codBodega;
          header("Location: ../content/asociadosDatosBodega.php");
        } else {
          $error = '<img src="../images/useranonyme-red-10270682.svg" class="img-error flo-left mt-13" alt="Símbolo de alerta"><p class="flo-left fw-bold fc-red mt-15 ml-5" data-i18n="pgAcceso_seccion_inicio_sesion_error_2">El código de bodega o la contraseña son incorrectos.</p>';
          include "../content/acceso.php";
          exit;
        }
        $conexion->close();
        exit;

        // Procesado de las excepciones o errores capturados en tiempo de ejecución
      } catch (mysqli_sql_exception $error) {

        // Mensaje de error para el usuario en caso de fallo de conexión con la base de datos
        echo '<script>';
        echo 'let idioma;';
        echo 'if (localStorage.getItem("preferredLang") === null) {';
        echo 'idioma = "gl";';
        echo '} else {';
        echo 'idioma = localStorage.getItem("preferredLang");';
        echo '}';
        echo 'const dialog = document.getElementById("mensajeError");';
        echo 'const btnAceptar = document.getElementById("btnmensajeErrorAceptar");';
        echo 'const mensajeDeError_1 = document.getElementById("mensajeDeError_1");';
        echo 'const mensajeDeError_2 = document.getElementById("mensajeDeError_2");';
        echo 'const mensajeDeError_3 = document.getElementById("mensajeDeError_3");';
        echo 'switch (' . $error->getCode() . ') {';
        echo 'case 2002:';
        echo 'switch (idioma) {';
        echo 'case "gl":';
        echo 'mensajeDeError_1.textContent = "O servidor atopou un erro interno e non puido completar a túa solicitude.";';
        echo 'mensajeDeError_2.textContent = "Téntao de novo dentro duns minutos.";';
        echo 'mensajeDeError_3.textContent = "Grazas.";';
        echo 'break;';
        echo 'case "es":';
        echo 'mensajeDeError_1.textContent = "El servidor encontró un error interno y no pudo completar tu solicitud.";';
        echo 'mensajeDeError_2.textContent = "Inténtalo de nuevo pasados unos minutos.";';
        echo 'mensajeDeError_3.textContent = "Gracias.";';
        echo 'break;';
        echo 'case "ca":';
        echo 'mensajeDeError_1.textContent = "El servidor va trobar un error intern i no va poder completar la teva sol·licitud.";';
        echo 'mensajeDeError_2.textContent = "Intenta-ho de nou passats uns minuts.";';
        echo 'mensajeDeError_3.textContent = "Gràcies.";';
        echo 'break;';
        echo 'case "eu":';
        echo 'mensajeDeError_1.textContent = "Zerbitzariak barne-errore bat izan du eta ezin izan du zure eskaera burutu.";';
        echo 'mensajeDeError_2.textContent = "Saiatu berriro minutu batzuk barru.";';
        echo 'mensajeDeError_3.textContent = "Eskerrik asko.";';
        echo 'break;';
        echo '};';
        echo 'break;';
        echo '}';
        echo 'dialog.showModal();';
        echo 'btnAceptar.addEventListener("click", () => {';
        echo 'dialog.close();';
        echo 'window.location.href = "../content/acceso.php";';
        echo '});';
        echo '</script>';
      }
    }
  }
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>