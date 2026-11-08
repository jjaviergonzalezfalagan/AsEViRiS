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
  <title data-i18n="pgEnoturismo_titulo">AsEViRiS / Enoturismo</title>
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
    <section class="sub-slider sub-slider-enoturismo">
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
          <a href="https://pixabay.com/es/users/lopez_grande-6443852/" class="fc-secondary fc-blue" target="_blank">Lopez_Grande</a> (2018).
          <a href="https://pixabay.com/es/photos/oto%C3%B1o-galicia-rio-sil-ourense-3853560/" class="fc-secondary fc-blue fs-italic" target="_blank">Panorama otoñal del Cañón del Sil en Galicia, España, con viñedos y río</a>.
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
          <a href="enoturismo.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_enoturismo">
            Enoturismo </a>

          <!-- Se muestra esta opción del menú sólo si el usuario ha iniciado sesión -->
          <?php
          if (isset($_SESSION["codBodega"])) {
            echo '<a href="asociadosDatosBodega.php" class="nav-menu" data-i18n="menu_navegacion_asociados">
            Asociados </a>';
          }
          ?>

          <a href="contacto.php" class="nav-menu" data-i18n="menu_navegacion_contacto">
            Contacto </a>

          <!-- Esta opción de menú muestra "Entrar" si el usuario 
           no ha iniciado sesión y "Salir" si la ha iniciado -->
          <?php
          if (!isset($_SESSION["codBodega"])) {
            echo '<button name="login-button" class="button-bg1" onclick="window.open(' . "'acceso.php', '_self'" . ');"><span class="bstp-icon bi bi-person-circle"></span>&nbsp;&nbsp;<span data-i18n="menu_navegacion_entrar">Entrar</span></button>';
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
    <div class="pb-80">
    </div>
    <section class="contained">
      <h2 class="section-title ff-sackers" data-i18n="pgEnoturismo_seccion_enoturismo_titulo">
        Enoturismo </h2>

      <!-- Sección "Enoturismo" -->
      <div class="col-full ta-left">

        <!-- Apartado vídeo -->
        <div class="col-wide flo-left ta-center">
          <p class="fc-primary fs-h2-intro ta-left" data-i18n="pgEnoturismo_seccion_enoturismo_video_titulo">
            El legado del vino hecho paisaje.</p>
          <video width="640" height="360" controls>
            <source src="../video/ruta_del_vino_ribeira_sacra.webm">
          </video>
          <div class="pt-7 ta-center">

            <!-- Derechos de autor -->
            <span class="fs-display-flex-end">
              <a href="https://www.youtube.com/@crdoribeirasacra2636" class="fc-secondary fc-blue" target="_blank">CRDO Ribeira Sacra</a> (2012).
              <a href="https://www.youtube.com/watch?v=KQ6jpVkTcDA" class="fc-secondary fc-blue fs-italic" target="_blank">Ruta do Viño da Ribeira Sacra</a>.
              <span data-i18n="derechos_autor_licencia">Licencia</span>
              <a href="https://www.youtube.com/t/terms#6836f7c8bf" class="fc-secondary fc-blue" target="_blank">YouTube</a>.
            </span>
          </div>
        </div>

        <!-- Apartado texto -->
        <div class="col-slim flo-left">
          <p class="fc-primary fs-h2-intro ta-left" data-i18n="pgEnoturismo_seccion_enoturismo_texto_titulo">
            Tu destino es Ribeira Sacra, somos vino.</p>
          <p class="ta-left mlmr-a"><span data-i18n="pgEnoturismo_seccion_enoturismo_parrafo_1">
              El Enoturismo o también llamado turismo del vino es el turismo en que el vino es parte esencial de la propuesta. </span>
            <br>
            <br>
            <span data-i18n="pgEnoturismo_seccion_enoturismo_parrafo_2">
              Cultura del vino, arquitectura del vino, paisaje del vino y el propio vino se suman en una propuesta que busca trasmitir la esencia de una región por medio de su vinculación al producto vinícola. </span>
            <br>
            <br>
            <span data-i18n="pgEnoturismo_seccion_enoturismo_parrafo_3">
              El enoturismo engloba en la práctica muchas cosas y no todas debemos vincularlas necesariamente al vino. </span>
            <br>
            <br>
            <span data-i18n="pgEnoturismo_seccion_enoturismo_parrafo_4">
              Hablamos de un estilo de turismo de calidad, en medios rurales y con un hilo conductor en las actividades; el gusto por las cosas buenas, lo que nos ofrece la tierra y transforma el hombre. </span>
          </p>
        </div>
      </div>
      <div class="row flex-just-center broken-float">

        <!-- Sección "Bodegas" -->
        <div class="col-tri">
          <div class="card-career">
            <h3 class="ff-sackers mb-5 mt-15" data-i18n="pgEnoturismo_seccion_bodegas_titulo">
              Bodegas </h3>
            <div class="col-balance flo-left">
              <p data-i18n="pgEnoturismo_seccion_bodegas_texto"> Sumérgete en nuestros viñedos y descubre nuestros vinos </p>
            </div>
            <div class="col-balance flo-left">
              <img src="../images/maja-petric-vGQ49l9I4EE-unsplash.jpg" alt="Persona sosteniendo uvas">

              <!-- Derechos de autor -->
              <span class="fs-display-flex-end">
                <a href="https://unsplash.com/es/@majapetric" class="fc-secondary fc-blue" target="_blank">Petric, M.</a> (2015).
                <a href="https://unsplash.com/es/fotos/persona-sosteniendo-uvas-vGQ49l9I4EE" class="fc-secondary fc-blue fs-italic" target="_blank">Persona sosteniendo uvas</a>.
                <span data-i18n="derechos_autor_licencia">Licencia</span>
                <a href="https://unsplash.com/es/licencia" class="fc-secondary fc-blue" target="_blank">Unsplash</a>.
              </span>
            </div>
            <hr class="broken-float">
            <div class="ta-center mt-15">
              <a href="http://www.enoturismogalicia.es/es/bodegas/do/ribeira-sacra-3" target="_blank"
                class="btn-bg1 border-round"><span data-i18n="boton_ver_ahora"> Ver ahora </span></a>
            </div>
          </div>
        </div>

        <!-- Sección "Alojamientos" -->
        <div class="col-tri">
          <div class="card-career">
            <h3 class="ff-sackers mb-5 mt-15" data-i18n="pgEnoturismo_seccion_alojamientos_titulo"> Alojamientos </h3>
            <div class="col-balance flo-left">
              <p data-i18n="pgEnoturismo_seccion_alojamientos_texto"> Descansa con la tranquilidad de estar rodeado de plena naturaleza </p>
            </div>
            <div class="col-balance flo-left">
              <img src="../images/locuig-ribeira-sacra-1284216.jpg" alt="Ribeira sacra, San esteban del sil">

              <!-- Derechos de autor -->
              <span class="fs-display-flex-end">
                <a href="https://pixabay.com/es/users/locuig-2144769/" class="fc-secondary fc-blue" target="_blank">locuig</a> (2016).
                <a href="https://pixabay.com/es/photos/ribeira-sacra-san-esteban-del-sil-1284216/" class="fc-secondary fc-blue fs-italic" target="_blank">Ribeira sacra, San esteban del sil</a>.
                <span data-i18n="derechos_autor_licencia">Licencia</span>
                <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
              </span>
            </div>
            <hr class="broken-float">
            <div class="ta-center mt-15">
              <a href="http://www.enoturismogalicia.es/es/alojamientos/do/ribeira-sacra-3" target="_blank"
                class="btn-bg1 border-round"><span data-i18n="boton_ver_ahora"> Ver ahora </span></a>
            </div>
          </div>
        </div>

        <!-- Sección "Ruta del Vino" -->
        <div class="col-tri">
          <div class="card-career">
            <h3 class="ff-sackers mb-5 mt-15" data-i18n="pgEnoturismo_seccion_ruta_del_vino_titulo">
              Ruta del Vino </h3>
            <div class="col-balance flo-left">
              <p data-i18n="pgEnoturismo_seccion_ruta_del_vino_texto"> Conoce todos los atractivos de la Ribeira Sacra y su entorno </p>
            </div>
            <div class="col-balance flo-left">
              <img src="../images/pexels-christian-palau-579567521-38714303.jpg" alt="Desfiladero con acantilados verdes">

              <!-- Derechos de autor -->
              <span class="fs-display-flex-end">
                <a href="https://www.pexels.com/es-es/@christian-palau-579567521/" class="fc-secondary fc-blue" target="_blank">Palau, C.</a> (2026).
                <a href="https://www.pexels.com/es-es/foto/vista-escenica-del-desfiladero-del-rio-bajo-cielos-nublados-38714303/" class="fc-secondary fc-blue fs-italic" target="_blank">Desfiladero con acantilados verdes</a>.
                <span data-i18n="derechos_autor_licencia">Licencia</span>
                <a href="https://www.pexels.com/es-ES/license/" class="fc-secondary fc-blue" target="_blank">pexels</a>.
              </span>
            </div>
            <hr class="broken-float">
            <div class="ta-center mt-15">
              <a href="http://rutadelvinoribeirasacra.org/" target="_blank" class="btn-bg1 border-round"><span data-i18n="boton_ver_ahora"> Ver ahora </span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- PIÉ DE PÁGINA -->
  <?php
  include "include/pieDePagina.inc.php";
  ?>

  <!-- Sección de aviso de uso de cookies -->
  <?php
  include "include/avisoDeCookies.inc.html";
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptBannerCookies.js"></script>
  <script src="../js/scriptFunciones.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>