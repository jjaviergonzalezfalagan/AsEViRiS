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

// Si hay una sesión iniciada redirige a la página "Asociados - Datos de la Bodega"
if (isset($_SESSION["codBodega"])) {
  header("Location: asociados.php");
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
  <title data-i18n="pgAcceso_titulo">AsEViRiS / Acceso</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>

  <!-- Mensaje que se mostrará en caso de que el navegador no soporte JavaScript -->
  <?php
  include "include/advertenciaNoScript.inc.html";
  ?>

  <span class="fade"></span>
  <main>

    <!-- CABECERA -->
    <!-- Fondo con animación de imágenes -->
    <section class="sub-slider sub-slider-acceso">
      <div class="slider-contained">
        <div class="slider-title fc-white">

          <!-- Logo e identificación -->
          <h1 class="ff-sackers">
            <a href="index.php" class="logo-back-to-index fc-white">
              <img src="../images/logo-aseviris.gif" class="logo-aseviris" alt="Logo AsEViRiS">
            </a>
          </h1>
          <p class="fw-normal fc-white fs-cabecera ff-sackers" data-i18n="logo_titulo">
            Asociación de Empresarios del Vino de la Ribeira Sacra </p>
          <p class="fw-normal fc-white fs-cabecera" data-i18n="advertencia_consumo">
            ¡Bebe de manera responsable! Tu bienestar es lo primero </p>
        </div>
      </div>

      <!-- Enlaces a redes sociales -->
      <?php
      include "include/redesSociales.inc.html";
      ?>
    </section>

    <!-- Menú de navegación -->
    <nav class="pb-20">

      <!-- Derechos de autor -->
      <div class="display-flex-end">
        <span class="pr-25 pt-2 fs-display-flex-end">
          <a href="https://pixabay.com/es/users/hobbel-9760576/" class="fc-secondary fc-blue" target="_blank">Hobbel</a> (2018).
          <a href="https://pixabay.com/es/photos/uva-uvas-tros-racimo-de-uvas-3606275/" class="fc-secondary fc-blue fs-italic" target="_blank"> Uva, Uvas y Tros</a>.
          <span data-i18n="derechos_autor_licencia">Licencia</span>
          <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
        </span>
      </div>
      <div class="contained">

        <!-- Selector de idioma -->
        <?php
        include "include/selectorIdioma.inc.html";
        ?>

        <!-- Opciones de navegación -->
        <label for="tablet-mobile-menu" class="navigation-container-label">
          Menú de navegación </label>
        <input type="checkbox" id="tablet-mobile-menu" name="tablet-mobile-menu" class="tab-mob-menu">
        <div class="navigation-container">
          <a href="../content/index.php" class="nav-menu" data-i18n="menu_navegacion_inicio">
            Inicio </a>
          <a href="../content/asociacion.php" class="nav-menu" data-i18n="menu_navegacion_asociacion">
            La Asociación </a>
          <a href="../content/actualidad.php" class="nav-menu" data-i18n="menu_navegacion_actualidad">
            Actualidad </a>
          <a href="../content/denominacion.php" class="nav-menu" data-i18n="menu_navegacion_denominacion">
            Denominación </a>
          <a href="../content/bodegas.php" class="nav-menu" data-i18n="menu_navegacion_bodegas">
            Bodegas </a>
          <a href="../content/enoturismo.php" class="nav-menu" data-i18n="menu_navegacion_enoturismo">
            Enoturismo </a>

          <!-- Se muestra esta opción del menú sólo si el usuario ha iniciado sesión -->
          <?php
          if (isset($_SESSION["codBodega"])) {
            echo '<a href="../content/asociadosDatosBodega.php" class="nav-menu" data-i18n="menu_navegacion_asociados">
            Asociados </a>';
          }
          ?>

          <a href="../content/contacto.php" class="nav-menu" data-i18n="menu_navegacion_contacto">
            Contacto </a>

          <!-- Esta opción de menú muestra "Entrar" si el usuario 
           no ha iniciado sesión y "Salir" si la ha iniciado -->
          <?php
          if (!isset($_SESSION["codBodega"])) {
            echo '<button name="login-button" class="button-bg3" onclick="window.open(' . "'../content/acceso.php', '_self'" . ');"><span class="bstp-icon bi bi-person-circle"></span>&nbsp;&nbsp;<span data-i18n="menu_navegacion_entrar">Entrar</span></button>';
          } else {
            echo '<button name="login-button" class="button-bg2" onclick="window.open(' . "'../app/logout.php', '_self'" . ');"><span data-i18n="menu_navegacion_salir">Salir</span>&nbsp;&nbsp;<span class="bstp-icon bi bi-box-arrow-right"></span></button>';
          }
          ?>

        </div>
      </div>
    </nav>

    <!-- Botones para volver arriba y a la página de inicio -->
    <?php
    include "include/botonesInicioArriba.inc.html";
    ?>

    <!-- ÁREA DE CONTENIDOS -->
    <!-- Sección "Inicio de sesión" -->
    <div class="pb-80"> </div>
    <section class="contained">
      <h2 class="section-title ff-sackers" data-i18n="pgAcceso_seccion_inicio_sesion_titulo">
        Acceso </h2>
      <div class="col-full ta-left">
        <form name="acceso" class="access-form mb-25" action="../app/login.php" method='post'>
          <fieldset class="primaryColor-fieldset">
            <legend class="fs-h3 fc-primary mt-50 ml-50" data-i18n="pgAcceso_seccion_inicio_sesion_cabecera">Bienvenido/a</legend>
            <div class="col-balance flo-left mlmr-a padd-0-75">
              <br>
              <p><span data-i18n="pgAcceso_seccion_inicio_sesion_texto_1">
                  Desde aquí los miembros de la Asociación de Empresarios del Vino de la Riberia Sacra
                </span><span class="ff-sackers" data-i18n="pgAcceso_seccion_inicio_sesion_texto_2"> "AsEViRiS"
                </span><span data-i18n="pgAcceso_seccion_inicio_sesion_texto_3"> podrán acceder con sus credenciales de acceso a la información exclusiva para asociados. </span></p>
            </div>
            <div class="col-balance flo-left mlmr-a padd-0-75">
              <label for="codBodega" class="access-form-label-left" data-i18n="pgAcceso_seccion_inicio_sesion_usuario">Código de bodega: </label>
              <input type="text" id="codBodega" name="codBodega" title="Este campo admite un código de bodega (cuatro letras, un punto y cuatro números)." pattern="^[A-Za-z]{4}\.[0-9]{4}$" minlength="9" maxlength="9" autocomplete="off" required>
              <br><br>
              <label for="contrasenia-input" class="access-form-label-left" data-i18n="pgAcceso_seccion_inicio_sesion_contrasena">Contraseña: </label>
              <input type="password" id="contrasenia-input" name="contrasenia" class="ml-a" title="Este campo admite entre 8 y 21 caracteres." minlength="8" maxlength="21" autocomplete="off" required>
              <span id="contrasenia-itag" class="mt-15 ml--40 bstp-icon bi bi-eye-fill icon-contrasenia" title="Mostrar contraseña"></span>
              <div>

                <?php
                if (isset($error)) {
                  echo $error;
                }
                ?>

              </div>
              <div class="col-seventy-five ta-center">
                <button type="submit" name="entrar" value="entrar" class="btn-bg1 border-round mt-20" data-i18n="boton_entrar">
                  Entrar </button>
                <br><br>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="broken-float"></div>
    </section>
  </main>

  <!-- PIÉ DE PÁGINA -->
  <?php
  include "include/pieDePagina.inc.php";
  ?>

  <!-- Aviso de uso de cookies -->
  <?php
  include "include/avisoDeCookies.inc.html";
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptAcceso.js"></script>
  <script src="../js/scriptBannerCookies.js"></script>
  <script src="../js/scriptFunciones.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>