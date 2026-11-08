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
?>

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
  <title data-i18n="pgActualizaDatosBodega_titulo">AsEViRiS / Actualiza datos bodega</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>

  <!-- Mensaje de confirmación para el usuario de datos actualizados correctamente -->
  <dialog id="mensajeOk" class="mensajeOk">
    <img src="../images/useranonyme-check-10270681.svg" class="img-confirmacion">
    <p id="mensajeDeConfirmacion">Los datos de la bodega se han actualizado correctamente.</p>
    <div class="ta-center">
      <button id="btnmensajeOkAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

  <!-- Mensaje de advertencia para el usuario de campos no cumplimentados correctamente -->
  <dialog id="mensajeAdvertencia" class="mensajeError">
    <img src="../images/useranonyme-red-10270682.svg" class="img-advertencia">
    <p id="mensajeAdvertencia_1">Existen campos que no se han cumplimentado correctamente.</p>
    <p id="mensajeAdvertencia_2">Revísalos e inténtalo de nuevo.</p>
    <p id="mensajeAdvertencia_3">Gracias.</p>
    <div class="ta-center">
      <button id="btnmensajeAdvertenciaAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

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
  if (isset($_POST["actualizarDatosBodega"])) {
    $codBodega = $_SESSION["codBodega"] ?? '';
    $nombre = $_POST["nombre"] ?? '';
    $zona = $_POST["zona"] ?? '';
    $superficie = $_POST["superficie"] ?? '';
    $produccion = $_POST["produccion"] ?? '';
    $variedadesDeUva = $_POST["variedadesDeUva"] ?? '';
    $marcasComerciales = $_POST["marcasComerciales"] ?? '';
    $premios = $_POST["premios"] ?? '';
    $direccion = $_POST["direccion"] ?? '';
    $codPostal = $_POST["codPostal"] ?? '';
    $localidad = $_POST["localidad"] ?? '';
    $provincia = $_POST["provincia"] ?? '';
    $web = $_POST["web"] ?? '';
    $email = $_POST["email"] ?? '';
    $telefono = $_POST["telefono"] ?? '';
    $fax = $_POST["fax"] ?? '';
    $personaContacto = $_POST["personaContacto"] ?? '';

    // Expresiones regulares para la validación de campos de formulario
    $regexCampoTexto = "#^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ .,:;\"\r\nºª()_-]+$#u";
    $regexCodPostal = "/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/";
    $regexPoblacion = "/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜçÇàèòÀÈÒíïÍÏl·l\s'\-\/\.,\(\)]+$/u";
    $regexWeb = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";
    $regexEmail = "/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,6}/";
    $regexTelefono = "/^(?:(?:\+|00)34)?[6789]\d{8}$/";
    $regexNombre = "#^([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$#u";

    if (

      // Condiciones de validación de los campos del formulario
      // Campo "Nombre"
      preg_match($regexCampoTexto, $nombre)
      && !(strlen($nombre) > 100)

      // Campo "Localización"
      && !(strlen($zona) > 255)
      && (empty($zona) || preg_match($regexCampoTexto, $zona))

      // Campo "Superficie"
      && !(strlen($superficie) > 50)
      && (empty($superficie) || preg_match($regexCampoTexto, $superficie))

      // Campo "Producción"
      && !(strlen($produccion) > 50)
      && (empty($produccion) || preg_match($regexCampoTexto, $produccion))

      // Campo "Variedades de uva"
      && !(strlen($variedadesDeUva) > 500)
      && (empty($variedadesDeUva) || preg_match($regexCampoTexto, $variedadesDeUva))

      // Campo "Marcas comerciales"
      && !(strlen($marcasComerciales) > 500)
      && (empty($marcasComerciales) || preg_match($regexCampoTexto, $marcasComerciales))

      // Campo "Premios"
      && !(strlen($premios) > 500)
      && (empty($premios) || preg_match($regexCampoTexto, $premios))

      // Campo "Dirección"
      && preg_match($regexCampoTexto, $direccion)
      && !(strlen($direccion) > 255)

      // Campo "Código Postal"
      && preg_match($regexCodPostal, $codPostal)

      // Campo "Localidad"
      && preg_match($regexPoblacion, $localidad)
      && !(strlen($localidad) > 255)

      // Campo "Provincia"
      && preg_match($regexPoblacion, $provincia)
      && !(strlen($provincia) > 255)

      // Campo "Web"
      && !(strlen($web) > 255)
      && (empty($web) || preg_match($regexWeb, $web))

      // Campo "email"
      && preg_match($regexEmail, $email)
      && !(strlen($email) > 255)

      // Campo "Teléfono"
      && preg_match($regexTelefono, $telefono)

      // Campo "Fax"
      && (empty($fax) || preg_match($regexTelefono, $fax))

      // Campo "Persona de contacto"
      && preg_match($regexNombre, $personaContacto)
      && !(strlen($personaContacto) > 255)

    ) {

      // Si los campos se validan correctamente se eliminan los errores guardados
      unset($_SESSION["errorNombre"]);
      unset($_SESSION["errorZona"]);
      unset($_SESSION["errorSuperficie"]);
      unset($_SESSION["errorProduccion"]);
      unset($_SESSION["errorVariedadesDeUva"]);
      unset($_SESSION["errorMarcasComerciales"]);
      unset($_SESSION["errorPremios"]);
      unset($_SESSION["errorDireccion"]);
      unset($_SESSION["errorCodPostal"]);
      unset($_SESSION["errorLocalidad"]);
      unset($_SESSION["errorProvincia"]);
      unset($_SESSION["errorWeb"]);
      unset($_SESSION["errorEmail"]);
      unset($_SESSION["errorTelefono"]);
      unset($_SESSION["errorFax"]);
      unset($_SESSION["errorPersonaContacto"]);

      // Captura de excepciones o errores en tiempo de ejecución
      try {
        require "conexionMySQL.php";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conexion = conexion();
        $sqlUpdate = "UPDATE bodegas SET 
          nombre = '$nombre',
          zona = '$zona',
          superficie = '$superficie', 
          produccion = '$produccion',
          variedadesDeUva = '$variedadesDeUva',
          marcasComerciales = '$marcasComerciales',
          premios = '$premios',
          direccion = '$direccion',
          codPostal = '$codPostal',
          localidad = '$localidad',
          provincia = '$provincia',
          web = '$web',
          email = '$email',
          telefono = '$telefono',
          fax = '$fax',
          personaContacto = '$personaContacto'
          WHERE codBodega = '$codBodega'";
        $conexion->query($sqlUpdate);

        // Mensaje de confirmación para el usuario de datos actualizados correctamente
        echo '<script>';
        echo 'let idioma;';
        echo 'if (localStorage.getItem("preferredLang") === null) {';
        echo 'idioma = "gl";';
        echo '} else {';
        echo 'idioma = localStorage.getItem("preferredLang");';
        echo '}';
        echo 'const dialog = document.getElementById("mensajeOk");';
        echo 'const btnAceptar = document.getElementById("btnmensajeOkAceptar");';
        echo 'const mensajeDeConfirmacion = document.getElementById("mensajeDeConfirmacion");';
        echo 'switch (idioma) {';
        echo 'case "gl":';
        echo 'mensajeDeConfirmacion.textContent = "Os datos da adega actualizáronse correctamente.";';
        echo 'break;';
        echo 'case "es":';
        echo 'mensajeDeConfirmacion.textContent = "Los datos de la bodega se han actualizado correctamente.";';
        echo 'break;';
        echo 'case "ca":';
        echo 'mensajeDeConfirmacion.textContent = "Les dades del celler s\'han actualitzat correctament.";';
        echo 'break;';
        echo 'case "eu":';
        echo 'mensajeDeConfirmacion.textContent = "Upeltegiaren datuak arrakastaz eguneratu dira.";';
        echo 'break;';
        echo '}';
        echo 'dialog.showModal();';
        echo 'btnAceptar.addEventListener("click", () => {';
        echo 'dialog.close();';
        echo 'window.location.href = "../content/asociadosDatosBodega.php#bodega";';
        echo '});';
        echo '</script>';
        $conexion->close();

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
        echo 'window.location.href = "../content/index.php";';
        echo '});';
        echo '</script>';
      }
    } else {

      // Condiciones de error en la validación de los campos del formulario
      // Campo "Nombre"
      if (!preg_match($regexCampoTexto, $nombre) || (strlen($nombre) > 100)) {
        $_SESSION["errorNombre"] = true;
      } else {
        $_SESSION["errorNombre"] = false;
        $_SESSION["nombre"] = $nombre;
      }

      // Campo "Localización"
      if ((strlen($zona) > 255) || (!empty($zona) && !preg_match($regexCampoTexto, $zona))) {
        $_SESSION["errorZona"] = true;
      } else {
        $_SESSION["errorZona"] = false;
        $_SESSION["zona"] = $zona;
      }

      // Campo "Superficie"
      if ((strlen($superficie) > 50) || (!empty($superficie) && !preg_match($regexCampoTexto, $superficie))) {
        $_SESSION["errorSuperficie"] = true;
      } else {
        $_SESSION["errorSuperficie"] = false;
        $_SESSION["superficie"] = $superficie;
      }

      // Campo "Producción"
      if ((strlen($produccion) > 50) || (!empty($produccion) && !preg_match($regexCampoTexto, $produccion))) {
        $_SESSION["errorProduccion"] = true;
      } else {
        $_SESSION["errorProduccion"] = false;
        $_SESSION["produccion"] = $produccion;
      }

      // Campo "Variedades de uva"
      if ((strlen($variedadesDeUva) > 500) || (!empty($variedadesDeUva) && !preg_match($regexCampoTexto, $variedadesDeUva))) {
        $_SESSION["errorVariedadesDeUva"] = true;
      } else {
        $_SESSION["errorVariedadesDeUva"] = false;
        $_SESSION["variedadesDeUva"] = $variedadesDeUva;
      }

      // Campo "Marcas comerciales"
      if ((strlen($marcasComerciales) > 500) || (!empty($marcasComerciales) && !preg_match($regexCampoTexto, $marcasComerciales))) {
        $_SESSION["errorMarcasComerciales"] = true;
      } else {
        $_SESSION["errorMarcasComerciales"] = false;
        $_SESSION["marcasComerciales"] = $marcasComerciales;
      }

      // Campo "Premios"
      if ((strlen($premios) > 500) || (!empty($premios) && !preg_match($regexCampoTexto, $premios))) {
        $_SESSION["errorPremios"] = true;
      } else {
        $_SESSION["errorPremios"] = false;
        $_SESSION["premios"] = $premios;
      }

      // Campo "Dirección"
      if (!preg_match($regexCampoTexto, $direccion) || (strlen($direccion) > 255)) {
        $_SESSION["errorDireccion"] = true;
      } else {
        $_SESSION["errorDireccion"] = false;
        $_SESSION["direccion"] = $direccion;
      }

      // Campo "Código Postal"
      if (!preg_match($regexCodPostal, $codPostal)) {
        $_SESSION["errorCodPostal"] = true;
      } else {
        $_SESSION["errorCodPostal"] = false;
        $_SESSION["codPostal"] = $codPostal;
      }

      // Campo "Localidad"
      if (!preg_match($regexPoblacion, $localidad) || (strlen($localidad) > 255)) {
        $_SESSION["errorLocalidad"] = true;
      } else {
        $_SESSION["errorLocalidad"] = false;
        $_SESSION["localidad"] = $localidad;
      }

      // Campo "Provincia"
      if (!preg_match($regexPoblacion, $provincia) || (strlen($provincia) > 255)) {
        $_SESSION["errorProvincia"] = true;
      } else {
        $_SESSION["errorProvincia"] = false;
        $_SESSION["provincia"] = $provincia;
      }

      // Campo "Web"
      if ((strlen($web) > 255) || (!empty($web) && !preg_match($regexWeb, $web))) {
        $_SESSION["errorWeb"] = true;
      } else {
        $_SESSION["errorWeb"] = false;
        $_SESSION["web"] = $web;
      }

      // Campo "email"
      if (!preg_match($regexEmail, $email) || (strlen($email) > 255)) {
        $_SESSION["errorEmail"] = true;
      } else {
        $_SESSION["errorEmail"] = false;
        $_SESSION["email"] = $email;
      }

      // Campo "Teléfono"
      if (!preg_match($regexTelefono, $telefono)) {
        $_SESSION["errorTelefono"] = true;
      } else {
        $_SESSION["errorTelefono"] = false;
        $_SESSION["telefono"] = $telefono;
      }

      // Campo "Fax"
      if (!empty($fax) && !preg_match($regexTelefono, $fax)) {
        $_SESSION["errorFax"] = true;
      } else {
        $_SESSION["errorFax"] = false;
        $_SESSION["fax"] = $fax;
      }

      // Campo "Persona de contacto"
      if (!preg_match($regexNombre, $personaContacto) || (strlen($personaContacto) > 255)) {
        $_SESSION["errorPersonaContacto"] = true;
      } else {
        $_SESSION["errorPersonaContacto"] = false;
        $_SESSION["personaContacto"] = $personaContacto;
      }

      // Mensaje de advertencia para el usuario de campos no cumplimentados correctamente
      echo '<script>';
      echo 'let idioma;';
      echo 'if (localStorage.getItem("preferredLang") === null) {';
      echo 'idioma = "gl";';
      echo '} else {';
      echo 'idioma = localStorage.getItem("preferredLang");';
      echo '}';
      echo 'const dialog = document.getElementById("mensajeAdvertencia");';
      echo 'const btnAceptar = document.getElementById("btnmensajeAdvertenciaAceptar");';
      echo 'const mensajeAdvertencia_1 = document.getElementById("mensajeAdvertencia_1");';
      echo 'const mensajeAdvertencia_2 = document.getElementById("mensajeAdvertencia_2");';
      echo 'const mensajeAdvertencia_3 = document.getElementById("mensajeAdvertencia_3");';
      echo 'switch (idioma) {';
      echo 'case "gl":';
      echo 'mensajeAdvertencia_1.textContent = "Hai campos que non se encheron correctamente.";';
      echo 'mensajeAdvertencia_2.textContent = "Revisaos e téntao de novo.";';
      echo 'mensajeAdvertencia_3.textContent = "Grazas.";';
      echo 'break;';
      echo 'case "es":';
      echo 'mensajeAdvertencia_1.textContent = "Existen campos que no se han cumplimentado correctamente.";';
      echo 'mensajeAdvertencia_2.textContent = "Revísalos e inténtalo de nuevo.";';
      echo 'mensajeAdvertencia_3.textContent = "Gracias.";';
      echo 'break;';
      echo 'case "ca":';
      echo 'mensajeAdvertencia_1.textContent = "Hi ha camps que no s\'han emplenat correctament.";';
      echo 'mensajeAdvertencia_2.textContent = "Revisa\'ls i torna-ho a intentar.";';
      echo 'mensajeAdvertencia_3.textContent = "Gràcies.";';
      echo 'break;';
      echo 'case "eu":';
      echo 'mensajeAdvertencia_1.textContent = "Eremu batzuk ez dira behar bezala bete.";';
      echo 'mensajeAdvertencia_2.textContent = "Berrikusi itzazu eta saiatu berriro.";';
      echo 'mensajeAdvertencia_3.textContent = "Eskerrik asko.";';
      echo 'break;';
      echo '}';
      echo 'dialog.showModal();';
      echo 'btnAceptar.addEventListener("click", () => {';
      echo 'dialog.close();';
      echo 'window.location.href = "../content/asociadosDatosBodega.php#bodega";';
      echo '});';
      echo '</script>';
    }
  }
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>