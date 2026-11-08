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
  <title data-i18n="pgLogout_titulo">AsEViRiS / Logout</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>

  <!-- Mensaje de confirmación para el usuario de cierre de sesión correcto -->
  <dialog id="mensajeOk" class="mensajeOk">
    <img src="../images/useranonyme-check-10270681.svg" class="img-confirmacion" alt="Símbolo de confirmación">
    <p data-i18n="pgLogout_mensajeOk">Tu sesión se ha cerrado correctamente.</p>
    <div class="ta-center">
      <button id="btnmensajeOkAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

  <?php
  session_start();
  session_unset();
  session_destroy();

  // Mensaje de confirmación para el usuario de cierre de sesión correcto
  echo '<script>';
  echo 'const dialog = document.getElementById("mensajeOk");';
  echo 'const btnAceptar = document.getElementById("btnmensajeOkAceptar");';
  echo 'dialog.showModal();';
  echo 'btnAceptar.addEventListener("click", () => {';
  echo 'dialog.close();';
  echo 'window.location.href = "../content/index.php";';
  echo '});';
  echo '</script>';
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>