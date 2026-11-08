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
  <title data-i18n="pgCambiarContrasenia_titulo">AsEViRiS / Cambiar contraseña</title>
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
    <section class="sub-slider sub-slider-cambiaContrasenia">
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
          <a href="https://pixabay.com/es/photos/uva-uvas-tros-racimo-de-uvas-3606275/" class="fc-secondary fc-blue fs-italic" target="_blank"> Uva, Uvas y Tros</a>. Licencia
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
            echo '<a href="../content/asociadosDatosBodega.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_asociados">
            Asociados </a>';
          }
          ?>

          <a href="../content/contacto.php" class="nav-menu" data-i18n="menu_navegacion_contacto">
            Contacto </a>

          <!-- Esta opción de menú muestra "Entrar" si el usuario 
           no ha iniciado sesión y "Salir" si la ha iniciado -->
          <?php
          if (!isset($_SESSION["codBodega"])) {
            echo '<button name="login-button" class="button-bg1" onclick="window.open(' . "'../content/acceso.php', '_self'" . ');"><span class="bstp-icon bi bi-person-circle"></span>&nbsp;&nbsp;<span data-i18n="menu_navegacion_entrar">Entrar</span></button>';
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

    <section class="reset">
      <div class="row broken-float">
        <div id="cambiaContrasenia"></div>

        <!-- Menú de navegación vertical -->
        <div class="col-twenty order-tab-1">
          <div class="card-side card-side-navigation">
            <h2 class="no-margin ff-sackers fs-h2 fc-white">
              <span data-i18n="pgAsociados_menu_vertical_titulo">Asociados</span>
            </h2>
            <div class="linea-separacion fc-white"></div>
            <a href="../content/asociadosDatosBodega.php#bodega">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgAsociados_menu_vertical_datos_bodega">Datos de la bodega</span></a>
            <a href="../content/asociadosCambiarContrasenia.php#cambiaContrasenia">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgAsociados_menu_vertical_cambiar_contrasenia">Cambiar contraseña</span></a>
            <a href="../content/asociadosRecursos.php#documentacion">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgAsociados_menu_vertical_documentacion">
                Documentación </span></a>
            <p class="ml-15 fc-white"><span class="bstp-icon bi bi-dot"></span>
              <span data-i18n="pgAsociados_menu_vertical_legislacion">
                Legislación </span>
            </p>
            <p class="ml-15 fc-white"><span class="bstp-icon bi bi-dot"></span>
              <span data-i18n="pgAsociados_menu_vertical_subvenciones">
                Subvenciones </span>
            </p>
          </div>
        </div>

        <!-- ÁREA DE CONTENIDOS -->
        <div class="col-eighty">
          <!-- Sección "Datos de usuario" -->
          <div class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers">
              <span data-i18n="pgCambiarContrasenia_seccion_area_contenidos_titulo">Cambiar Contraseña</span>
            </h2>
            <div class="mt-25 ml-130">
              <form id="password-form" class="password-form" name="formularioCambioContrasenia" action="../app/cambiaContrasenia.php" method="POST">
                <fieldset class="primaryColor-fieldset">
                  <div class="col-tri mlmr-a">
                    <label for="password_actual" class="password-form-label-left" data-i18n="pgCambiarContrasenia_formularioCambioContrasenia_password_actual">Contraseña actual:</label>
                    <input type="password" id="password-actual-input" name="password_actual" title="Este campo admite entre 8 y 21 caracteres." minlength="8" maxlength="21" autocomplete="off" required>
                    <span id="password-actual-itag" class="mt--35 ml--35 bstp-icon bi bi-eye-fill icon-contrasenia" title="Mostrar contraseña"></span>
                    <label for="nueva_password" class="password-form-label-left mt-15" data-i18n="pgCambiarContrasenia_formularioCambioContrasenia_nueva_password">Nueva contraseña:</label>
                    <input type="password" id="nueva-password-input" name="nueva_password" title="Este campo admite entre 8 y 21 caracteres." minlength="8" maxlength="21" autocomplete="off" required>
                    <span id="nueva-password-itag" class="mt--35 ml--35 bstp-icon bi bi-eye-fill icon-contrasenia" title="Mostrar contraseña"></span>
                    <label for="confirmar_password" class="password-form-label-left mt-15" data-i18n="pgCambiarContrasenia_formularioCambioContrasenia_confirmar_password">Confirmar nueva contraseña:</label>
                    <input type="password" id="confirmar-password-input" name="confirmar_password" title="Este campo admite entre 8 y 21 caracteres." minlength="8" maxlength="21" autocomplete="off" required>
                    <span id="confirmar-password-itag" class="mt-6 ml--35 bstp-icon bi bi-eye-fill icon-contrasenia" title="Mostrar contraseña"></span>
                  </div>
                  <div class="display-flex-center">
                    <div>

                      <!-- Mensaje de resultado de la operación -->
                      <?php
                      if (isset($mensaje)) {
                        echo $mensaje;
                      }
                      ?>

                    </div>
                  </div>
                  <div class="col-full ta-center">
                    <button type="submit" name="actualizar_contrasenia" value="actualizar_contrasenia" class="btn-bg1 border-round mt-10" data-i18n="boton_enviar">Enviar</button>
                  </div>
                </fieldset>
              </form>
            </div>
          </section>
        </div>
      </div>
      </div>
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
  <script src="../js/scriptBannerCookies.js"></script>
  <script src="../js/scriptContrasenia.js"></script>
  <script src="../js/scriptFunciones.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>