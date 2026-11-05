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
  <meta name="Title" content="Asociación de Empresarios del Vino de la Ribeira Sacra">
  <meta name="Author" content="J.Javier González Falagán">
  <meta name="description" content="Página de la Asociación de Empresarios del Vino de la Ribeira Sacra">
  <meta name="Keywords" content="Ribeira Sacra, Asociación de Empresarios, Vino">
  <meta name="Language" content="Spanish">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title data-i18n="pgProcesaSuscripcion_titulo">AsEViRiS / Procesa suscripción</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>

  <!-- Mensaje de confirmación para el usuario de envío de datos correcto -->
  <dialog id="mensajeOk" class="subscribe-mensajeOk">
    <img src="../images/useranonyme-check-10270681.svg" class="img-confirmacion" alt="Símbolo de confirmación">
    <p data-i18n="suscripcion_mensajeOk_1">Tus datos se han enviado correctamente.</p>
    <p data-i18n="suscripcion_mensajeOk_2">Gracias por suscribirte a nuestro boletín de noticias.</p>
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

  <!-- Mensaje de error para el usuario en caso de fallo en el envío de datos -->
  <dialog id="mensajeError" class="subscribe-mensajeError">
    <img src="../images/openicons-attention-98513.svg" class="img-alerta" alt="Símbolo de alerta">
    <p id="mensajeDeError_1">El servidor encontró un error interno y no pudo completar tu solicitud.</p>
    <p id="mensajeDeError_2">Inténtalo de nuevo pasados unos minutos.</p>
    <p id="mensajeDeError_3">Gracias.</p>
    <div class="ta-center">
      <button id="btnmensajeErrorAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

  <!-- Inserción en la base de datos de los datos introducidos en el apartado de suscripción al boletín de noticias -->
  <?php
  if (isset($_POST["subscribe-email"])) {
    $nombre = $_POST["subscribe-nombre"];
    $email = $_POST["subscribe-email"];
    $regexNombre = "/^([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$/";
    $regexEmail = "/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,6}/";

    // Se establecen las condiciones para registrar la suscripción en la base de datos
    if (
      preg_match($regexNombre, $nombre) && !(strlen($nombre) < 2) && !(strlen($nombre) > 255)
      && preg_match($regexEmail, $email) && !(strlen($email) < 6) && !(strlen($email) > 255)
    ) {
      require "../app/conexionMySQL.php";
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

      // Captura de excepciones o errores en tiempo de ejecución
      try {
        $conexion = conexion();
        $sql = "INSERT INTO emails (nombre, email) VALUES ('$nombre', '$email')";
        $conexion->query($sql);

        // Mensaje de confirmación para el usuario de envío de datos correcto
        echo '<script>';
        echo 'const dialog = document.getElementById("mensajeOk");';
        echo 'const btnAceptar = document.getElementById("btnmensajeOkAceptar");';
        echo 'dialog.showModal();';
        echo 'btnAceptar.addEventListener("click", () => {';
        echo 'dialog.close();';

        // Se vuelve a la página previa
        echo 'if (document.referrer) {';
        echo 'window.location.href = document.referrer;';
        echo '} else {';
        echo 'window.history.back();';
        echo '}';
        echo '});';
        echo '</script>';
        $conexion->close();

        // Procesado de las excepciones o errores capturados en tiempo de ejecución
      } catch (mysqli_sql_exception $error) {

        // Mensaje de error para el usuario en caso de fallo en el envío de datos
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
        echo 'case 1062:';
        echo 'switch (idioma) {';
        echo 'case "gl":';
        echo 'mensajeDeError_1.textContent = "O enderezo de correo electrónico que introduciches xa existe na nosa base de datos.";';
        echo 'mensajeDeError_2.textContent = "Compróbao e téntao de novo.";';
        echo 'mensajeDeError_3.textContent = "Grazas.";';
        echo 'break;';
        echo 'case "es":';
        echo 'mensajeDeError_1.textContent = "El email que has introducido ya existe en nuetra base de datos.";';
        echo 'mensajeDeError_2.textContent = "Revísalo e inténtalo de nuevo.";';
        echo 'mensajeDeError_3.textContent = "Gracias.";';
        echo 'break;';
        echo 'case "ca":';
        echo 'mensajeDeError_1.textContent = "L\'email que has introduït ja existeix a la nostra base de dades.";';
        echo 'mensajeDeError_2.textContent = "Revisa-ho i torna-ho a intentar.";';
        echo 'mensajeDeError_3.textContent = "Gràcies.";';
        echo 'break;';
        echo 'case "eu":';
        echo 'mensajeDeError_1.textContent = "Sartu duzun helbide elektronikoa dagoeneko badago gure datu-basean.";';
        echo 'mensajeDeError_2.textContent = "Begiratu eta saiatu berriro.";';
        echo 'mensajeDeError_3.textContent = "Eskerrik asko.";';
        echo 'break;';
        echo '}';
        echo '}';
        echo 'dialog.showModal();';
        echo 'btnAceptar.addEventListener("click", () => {';
        echo 'dialog.close();';

        // Se vuelve a la página previa
        echo 'window.history.back();';
        echo '});';
        echo '</script>';
      }
    } else {
      if (
        !preg_match($regexNombre, $nombre)
        || (strlen($nombre) < 2)
        || (strlen($nombre) > 255)
      ) {
        $errorNombre = true;
      }
      if (
        !preg_match($regexEmail, $email)
        || (strlen($email) < 6)
        || (strlen($email) > 255)
      ) {
        $errorEmail = true;
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

      // Se vuelve a la página previa
      echo 'window.history.back();';
      echo '});';
      echo '</script>';
    }
  }
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptGeneral.js"></script>

</body>

</html>