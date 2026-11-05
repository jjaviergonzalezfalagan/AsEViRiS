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
  <title data-i18n="pgRecursosAsociados_titulo">AsEViRiS / Recursos Asociados</title>
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
    <section class="sub-slider sub-slider-asociados">
      <div class="slider-contained">
        <div class="slider-title fc-white">

          <!-- Logo e identificación -->
          <h1 class="ff-sackers">
            <a href="index.php" class="logo-back-to-index fc-white">
              <img src="../images/logo-aseviris.gif" class="logo-aseviris" alt="Logo AsEViRiS">
            </a>
          </h1>
          <p class="fw-normal fc-white  fs-cabecera ff-sackers" data-i18n="logo_titulo">
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
          <a href="https://pixabay.com/es/users/protocultura-8153034/" class="fc-secondary fc-blue" target="_blank">Protocultura</a> (2020).
          <a href="https://pixabay.com/es/photos/r%C3%ADo-sil-galicia-Ourense-ribera-5177145/" class="fc-secondary fc-blue fs-italic" target="_blank">Río, Sil y Galicia</a>.
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
          <a href="index.php" class="nav-menu" data-i18n="menu_navegacion_inicio">
            Inicio </a>
          <a href="asociacion.php" class="nav-menu" data-i18n="menu_navegacion_asociacion">
            La Asociación </a>
          <a href="actualidad.php" class="nav-menu" data-i18n="menu_navegacion_actualidad">
            Actualidad </a>
          <a href="denominacion.php" class="nav-menu" data-i18n="menu_navegacion_denominacion">
            Denominación </a>
          <a href="bodegas.php" class="nav-menu" data-i18n="menu_navegacion_bodegas">
            Bodegas </a>
          <a href="enoturismo.php" class="nav-menu" data-i18n="menu_navegacion_enoturismo">
            Enoturismo </a>

          <!-- Se muestra esta opción del menú sólo si el usuario ha iniciado sesión -->
          <?php
          if (isset($_SESSION["codBodega"])) {
            echo '<a href="asociadosDatosBodega.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_asociados">
            Asociados </a>';
          }
          ?>

          <a href="contacto.php" class="nav-menu" data-i18n="menu_navegacion_contacto">
            Contacto </a>

          <!-- Esta opción de menú muestra "Entrar" si el usuario 
           no ha iniciado sesión y "Salir" si la ha iniciado -->
          <?php
          if (!isset($_SESSION["codBodega"])) {
            echo '<button name="login-button" class="button-bg1" onclick="window.open(' . "'acceso.php', '_self'" . ');"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;<span data-i18n="menu_navegacion_entrar">Entrar</span></button>';
          } else {
            echo '<button name="login-button" class="button-bg2" onclick="window.open(' . "'../app/logout.php', '_self'" . ');"><span data-i18n="menu_navegacion_salir">Salir</span>&nbsp;&nbsp;<i class="bi bi-box-arrow-right"></i></button>';
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
        <div id="documentacion"></div>

        <!-- Menú de navegación vertical -->
        <div class="col-twenty order-tab-1">
          <div class="card-side card-side-navigation">
            <h2 class="no-margin ff-sackers fs-h2 fc-white">
              <span data-i18n="pgAsociados_menu_vertical_titulo">Asociados</span>
            </h2>
            <hr>
            <a href="asociadosDatosBodega.php#bodega">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgAsociados_menu_vertical_datos_bodega">Datos de la bodega</span></a>
            <a href="asociadosCambiarContrasenia.php#cambiaContrasenia">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgAsociados_menu_vertical_cambiar_contrasenia">Cambiar contraseña</span></a>
            <a href="asociadosRecursos.php#documentacion">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgAsociados_menu_vertical_documentacion">
                Documentación </span></a>
            <p class="ml-15 fc-white"><i class="bi bi-dot"></i>
              <span data-i18n="pgAsociados_menu_vertical_legislacion">
                Legislación </span>
            </p>
            <p class="ml-15 fc-white"><i class="bi bi-dot"></i>
              <span data-i18n="pgAsociados_menu_vertical_subvenciones">
                Subvenciones </span>
            </p>
          </div>
        </div>

        <!-- ÁREA DE CONTENIDOS -->
        <div class="col-eighty">

          <!-- Sección "Documentación" -->
          <div class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers" data-i18n="pgRecursosAsociados_seccion_documentacion_titulo"> Documentación </h2>
            <div class="col-full mlmr-a mt-25 ta-left">

              <!-- Sección "Legislación" -->
              <div class="col-balance flo-left mlmr-a ta-center">
                <h3 class="no-margin ff-sackers ta-left fs-h2" data-i18n="pgRecursosAsociados_seccion_legislacion_titulo">
                  Legislación </h3>
                <hr>

                <!-- Sección "Legislación - entrada 1" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_legislacion_entrada_1">
                  Pliego de condiciones de la D.O. Ribeira Sacra </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="https://mediorural.xunta.gal/sites/default/files/temas/agricultura/covid/PLIEGO%20DE%20CONDICIONES%20DO%20RIBEIRA%20SACRA%20TEMPORAL%20septiembre%202021.pdf"
                  class="mlmr-a" target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

                <!-- Sección "Legislación - entrada 2" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_legislacion_entrada_2">
                  Resolución del 24 de julio de 2012 por la que se da publicidad al pliego de condiciones de la D.O. Ribeira Sacra (DOGA 24/08/2012) </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="http://ribeirasacra.org/media/documentos/PREGOCONDICONS.pdf" target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

                <!-- Sección "Legislación - entrada 3" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_legislacion_entrada_3">
                  Ficha técnica D.O. Ribeira Sacra </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="https://mediorural.xunta.gal/sites/default/files/produtos/Ficha-tecnica-DO-Ribeira-Sacra-2021.pdf"
                  target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo">
                </a>

                <!-- Sección "Legislación - entrada 4" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_legislacion_entrada_4">
                  Procedimiento de gestión de la Certificación D.O. Ribeira Sacra </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="http://ribeirasacra.org/media/documentos/PO-04%20-%20Procedimiento%20de%20Gestion%20de%20la%20Certificacion.pdf"
                  target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

                <!-- Sección "Legislación - entrada 5" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_legislacion_entrada_5">
                  Reglamento de la Unión Europea sobre el etiquetado en productos con D.O. </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="http://ribeirasacra.org/media/documentos/RegUE538Etiquetado.pdf" target="_blank"
                  title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>
              </div>

              <!-- Sección "Subvenciones" -->
              <div class="col-balance flo-left mlmr-a ta-center">
                <h3 class="no-margin ff-sackers ta-left fs-h2" data-i18n="pgRecursosAsociados_seccion_subvenciones_titulo">
                  Subvenciones </h3>
                <hr>

                <!-- Sección "Subvenciones - entrada 1" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_subvenciones_entrada_1">
                  Ayudas de apoyo a la internacionalicación de la PYME española </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="https://ribeirasacra.org/media/documentos/BOE0804ICEX.pdf" target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

                <!-- Sección "Subvenciones - entrada 2" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_subvenciones_entrada_2">
                  Ayudas para el fomento de contratación de seguros agrarios </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="https://ribeirasacra.org/media/documentos/DOGA0604.pdf" target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

                <!-- Sección "Subvenciones - entrada 3" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_subvenciones_entrada_3">
                  Ayudas a los planes de restauración y reconversión da la viña en GALICIA </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="https://ribeirasacra.org/media/documentos/DOGA%2023%2001%20%20REEST.%20E%20RECONV.%20VINA%20AnuncioG0165-020115-0009_gl.pdf"
                  target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

                <!-- Sección "Subvenciones - entrada 4" -->
                <p class="col-ninety ta-left mlmr-a" data-i18n="pgRecursosAsociados_seccion_subvenciones_entrada_4">
                  Ayudas para la promoción del sector vitivinícola </p>
                <span class="fw-bold" data-i18n="boton_descargar"> Descargar </span>&nbsp;
                <a href="https://ribeirasacra.org/media/documentos/09-01%20Promocion%203%BA%20paises%20AnuncioG0165-261214-0009_gl.pdf"
                  target="_blank" title="Descargar"><img src="../images/agp_studios-download-23364.gif" class="img-download" alt="Imagen dinámica con flecha hacia abajo"></a>

              </div>
              <div class="broken-float">
              </div>
            </div>
          </section>
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
  <script src="../js/scriptGeneral.js"></script>

</body>

</html>