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
  <title data-i18n="pgDenominacion_titulo">AsEViRiS / Denominación de Origen</title>
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
    <section class="sub-slider sub-slider-denominacion">
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
          <a href="https://pixabay.com/es/users/bru-no-1161770/" class="fc-secondary fc-blue" target="_blank">Bru-nO</a> (2018).
          <a href="https://pixabay.com/es/photos/oto%C3%B1o-sale-de-uvas-vino-vi%C3%B1edos-3761748/" class="fc-secondary fc-blue fs-italic" target="_blank">Otoño, Sale de y Uvas</a>.
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
          <a href="denominacion.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_denominacion">
            Denominación </a>
          <a href="bodegas.php" class="nav-menu" data-i18n="menu_navegacion_bodegas">
            Bodegas </a>
          <a href="enoturismo.php" class="nav-menu" data-i18n="menu_navegacion_enoturismo">
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

        <!-- Menú de navegación vertical -->
        <div class="col-twenty order-tab-1">
          <div class="card-side card-side-navigation">
            <h2 class="no-margin ff-sackers fs-h2 fc-white">
              <span data-i18n="pgDenominacion_menu_vertical_titulo">
                Denominación </span>
            </h2>
            <hr>
            <a href="#denominacionOrigen">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgDenominacion_menu_vertical_entrada_1">
                Denominación de Origen </span></a>
            <a href="#historia">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgDenominacion_menu_vertical_entrada_2">
                Historia </span></a>
          </div>
        </div>

        <!-- ÁREA DE CONTENIDOS -->
        <div class="col-eighty">

          <!-- Sección "Denominación de Origen" -->
          <div id="denominacionOrigen" class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers" data-i18n="pgDenominacion_seccion_denominacion_titulo">
              Denominación de Origen </h2>
            <div class="row flex-alig-center mt-25 ta-left">
              <div class="col-balance ta-center">
                <img src="../images/wolfblur-wine-2408620_1920.jpg" alt='Vino, Retro y Copa de vino'>

                <!-- Derechos de autor -->
                <span class="fs-display-flex-end">
                  <a href="https://pixabay.com/es/users/wolfblur-2503887/" class="fc-secondary fc-blue" target="_blank">WolfBlur</a> (2017).
                  <a href="https://pixabay.com/es/photos/vino-retro-copa-de-vino-2408620/" class="fc-secondary fc-blue fs-italic" target="_blank">Vino, Retro y Copa de vino</a>.
                  <span data-i18n="derechos_autor_licencia">Licencia</span>
                  <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
                </span>
              </div>
              <div class="col-balance">
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_1"> La Ribeira Sacra está considerada como Denominación de Origen desde que fue autorizada el 3 de Septiembre de 1996 por orden de la Consellería de Agricultura, Gandería e Montes de la Xunta de Galicia. </p>
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_2"> De este modo se nombró un Consejo Regulador que controla y protege los distintos tipos de vinos de la Ribeira Sacra autorizados y garantiza su calidad, encargándose así mismo de promocionar el producto en el mercado y proteger su nombre. </p>
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_3"> Viticultores y bodegueros de la Ribeira Sacra apostaron por el control, calidad y personalización de los vinos, para obtener los que hoy en día pueden ser considerados como uno de los vinos más singulares de occidente. </p>
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_4"> Hoy en día están inscritas en el consejo regulador de la D.O.Ribeira Sacra 1.250 hectáreas que cultivan 2.817 viticultores, embotellando el vino bajo el amparo de la D.O. unas 90 bodegas actualmente. </p>
              </div>
            </div>
            <div class="row flex-alig-center ta-left">
              <div class="col-balance">
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_5"> La D.O. Ribeira Sacra ronda los 4.735.900 de kilos de uva dentro del Consejo Regulador, aunque en su conjunto la Ribeira Sacra se sitúa entorno a los 15.000.000 de kilos. </p>
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_6"> El cuidado de la vid, la atención durante la vendimia, el esmero en la selección de la uva, la utilización de variedades autóctonas, la innovación e investigación tanto en la viña como en la bodega y los rigurosos controles de calidad han posibilitado que Ribeira Sacra sea una D.O. asociada a la calidad y exclusividad. </p>
                <p data-i18n="pgDenominacion_seccion_denominacion_parrafo_7"> Ribeira Sacra es una marca de prestigio con mucha proyeccion de futuro y que desde hace años funciona con gran éxito en los mercados internacionales. </p>
              </div>
              <div class="col-balance order-tab-1 ta-center">
                <img src="../images/Figura-1-Mapa-de-la-D-O-Ribeira-Sacra-Subzonas-municipios-y-parroquias.png"
                  alt="Mapa de la D. O. Ribeira Sacra. Subzonas, municipios y parroquias">

                <!-- Derechos de autor -->
                <div class="display-flex-end">
                  <span class="pr-25 pt-2 fs-display-flex-end">
                    <a href="https://www.researchgate.net/profile/Carlos-Romaris/" class="fc-secondary fc-blue" target="_blank">Patiño Romarís, C.A.</a> &
                    <a href="https://www.researchgate.net/profile/Breixo-Rodal/" class="fc-secondary fc-blue" target="_blank">Martins Rodal, B.</a> &
                    <a href="https://www.researchgate.net/profile/Ruben-Camilo-Lois-Gonzalez-2/" class="fc-secondary fc-blue" target="_blank">Lois González, R.C.</a> (2026).
                    <a href="https://www.researchgate.net/figure/Figura-1-Mapa-de-la-D-O-Ribeira-Sacra-Subzonas-municipios-y-parroquias_fig1_400861858/" class="fc-secondary fc-blue fs-italic" target="_blank">Mapa de la D. O. Ribeira Sacra. Subzonas, municipios y parroquias</a>.
                    <a href="https://creativecommons.org/licenses/by-nc/4.0/" class="fc-secondary fc-blue" target="_blank">CC BY-NC 4.0</a>.
                  </span>
                </div>
                <br>
                <a class="fs-minor" href="../images/Figura-1-Mapa-de-la-D-O-Ribeira-Sacra-Subzonas-municipios-y-parroquias.png" target="_blank">
                  <span data-i18n="enlace_ver_a_pagina_completa"> Ver a página completa </span>
                  &nbsp;
                  <i class="bi bi-box-arrow-up-right"></i></a>
              </div>
            </div>
          </section>

          <!-- Sección "Historia" -->
          <div id="historia" class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers" data-i18n="pgDenominacion_seccion_historia_titulo">
              Historia </h2>
            <div class="row flex-alig-center mt-25 ta-left">
              <div class="col-balance mt-25 order-tab-1  ta-center">
                <img src="../images/pexels-jesus-marchante-364768634-14748184.jpg" alt="Pasillo de claustro, evocando historia y tranquilidad">

                <!-- Derechos de autor -->
                <span class="fs-display-flex-end">
                  <a href="https://www.pexels.com/es-es/@jesus-marchante-364768634/" class="fc-secondary fc-blue" target="_blank">Marchante, J.</a> (2022).
                  <a href="https://www.pexels.com/es-es/foto/patio-castillo-paso-pasaje-14748184/" class="fc-secondary fc-blue fs-italic" target="_blank">Pasillo de claustro, evocando historia y tranquilidad</a>.
                  <span data-i18n="derechos_autor_licencia">Licencia</span>
                  <a href="https://www.pexels.com/es-ES/license/" class="fc-secondary fc-blue" target="_blank">pexels</a>.
                </span>
              </div>
              <div class="col-balance">
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_1"> La Ribeira Sacra es una zona que comprende las riberas del río Cabe, río Sil y del río Miño. Está situada en la zona sur de la provincia de Lugo y el norte de la provincia de Ourense, en Galicia, España. La capital de la zona se convino que fuese la ciudad de Monforte de Lemos, (Lugo). </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_2"> El topónimo "Ribeira Sacra" podría proceder de la Edad Media y, en un principio, se pensó que el origen de su denominación estaría en el latín "Rivoira Sacrata" y que podría responder a la gran cantidad de monasterios y templos ubicados en los monumentales cañones y escarpadas laderas que jalonan la zona. Actualmente se pueden visitar 18 monasterios entre los que cabe destacar el de San Esteban de Ribas del Sil (actualmente Parador), San Pedro de Rocas, Santa Cristina o Montederramo, entre otros. </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_3"> La Ribeira Sacra es también conocida por la calidad de sus vinos, muy recurridos en la gastronomía gallega. Existe constancia de la existencia de viníferas antes de la llegada de los romanos, pero a ellos se les atribuye el inicio de la actual estructura de A Ribeira Sacra: la extrema disposición de los “socalcos” (bancales). </p>
              </div>
            </div>
            <div class="row flex-alig-center ta-left">
              <div class="col-balance">
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_4"> La leyenda asegura que los vinos de la D.O. Ribeira Sacra eran ya demandados por los césares romanos para consumir en Italia. Se dice que los romanos plantaron las primeras vides que convivirían con las vides silvestres de la ribera del Sil. Para crear estas primeras terrazas y cubrirlas de vides los romanos utilizaron el sudor y el esfuerzo de los esclavos. Este tipo de estructura o distribución en escalera fue la solución que los romanos vieron para salvar la pendiente del terreno. </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_5"> Posteriormente, en el siglo VI, la Ribeira Sacra se pobló de monjes que impulsaron el levantamiento de numerosas ermitas, conventos y monasterios que contribuyeron en gran medida a consolidar el cultivo de la vid en la zona. Perfeccionaron procedimientos y dieron la forma definitiva a este espectacular paisaje en bancales que vemos en la actualidad. </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_6"> En la Edad Media, por lo tanto, el vino fue uno de los principales impulsores económicos de A Ribeira Sacra y así se mantuvo hasta bien entrado el siglo XIX, como producto para el comercio y como producto para el autoconsumo en la gran mayoría de las casas de agricultores, ganadores y viticultores. </p>
              </div>
              <div class="col-balance ta-center">
                <img src="../images/pexels-andrew-mcleod-1500867-2894470.jpg" alt="Viñedos en terrazas y paisaje fluvial">

                <!-- Derechos de autor -->
                <span class="fs-display-flex-end">
                  <a href="https://www.pexels.com/es-es/@andrew-mcleod-1500867/" class="fc-secondary fc-blue" target="_blank">McLeod, A.</a> (2019).
                  <a href="https://www.pexels.com/es-es/foto/fotografia-de-paisajes-de-cordilleras-verdes-y-marrones-2894470/" class="fc-secondary fc-blue fs-italic" target="_blank">Viñedos en terrazas y paisaje fluvial</a>.
                  <span data-i18n="derechos_autor_licencia">Licencia</span>
                  <a href="https://www.pexels.com/es-ES/license/" class="fc-secondary fc-blue" target="_blank">pexels</a>.
                </span>
              </div>
            </div>
            <div class="row flex-alig-center ta-center">
              <div class="col-balance order-tab-1">
                <img src="../images/couleur-grapes-1696921_1920.jpg" alt="Uvas, Fruta y Vino">

                <!-- Derechos de autor -->
                <span class="fs-display-flex-end">
                  <a href="https://pixabay.com/es/users/couleur-1195798/" class="fc-secondary fc-blue" target="_blank">Couleur</a> (2016).
                  <a href="https://pixabay.com/es/photos/uvas-fruta-vino-planta-vid-1696921/" class="fc-secondary fc-blue fs-italic" target="_blank">Uvas, Fruta y Vino</a>.
                  <span data-i18n="derechos_autor_licencia">Licencia</span>
                  <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
                </span>
              </div>
              <div class="col-balance ta-left">
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_7"> A mediados del XIX, A Ribeira Sacra no consigue escaparse de la filoxera que ataca a las vides de toda España, aunque aquí el impacto es menor. </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_8"> Con la llegada del siglo XX, el uso de porta injertos comienza a solucionar el problema de la filoxera y las zonas de producción de vid vuelven a dedicarse a la elaboración de vino. En los primeros años para autoconsumo y años después ya se empezaría a comercializar lo que se denomina vino a granel. </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_9"> Así fue avanzando el siglo XX hasta llegar a conseguir la D.O. para los vinos de Ribeira Sacra en 1996. </p>
                <p data-i18n="pgDenominacion_seccion_historia_parrafo_10"> Hoy la producción de vino es un importante motor de desarrollo económico de la Ribeira Sacra y una poderosa señal de identidad. </p>
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