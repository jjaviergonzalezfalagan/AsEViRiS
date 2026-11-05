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

$nombre = "";
$email = "";
$errorNombre = "";
$errorEmail = "";
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
  <title data-i18n="pgInicio_titulo">AsEViRiS / Inicio</title>
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
    <section class="slider">
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
          <p><a href="#laAsociacion" class="btn-bg2 border-round mt-20"><span data-i18n="boton_saber_mas">Saber Más </span><i class="bi bi-chevron-compact-right"></i></a></p>
        </div>
      </div>

      <!-- Enlaces a redes sociales -->
      <?php
      include "include/redesSociales.inc.html";
      ?>

    </section>

    <!-- Menú de navegación -->
    <nav>
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
          <a href="index.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_inicio">
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
            <h2 class="no-margin ff-sackers fs-h2 fc-white" data-i18n="pgInicio_menu_vertical_titulo"> Inicio </h2>
            <hr>
            <a href="#laAsociacion">
              <i class="bi bi-chevron-compact-right"></i>
              <span class="ff-sackers" data-i18n="pgInicio_menu_vertical_entrada_1">
                AsEViRiS </span></a>
            <a href="#agenda">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgInicio_menu_vertical_entrada_2">
                Agenda </span></a>
            <a href="#nuestrosVinos">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgInicio_menu_vertical_entrada_3">
                Nuestros vinos </span></a>
            <a href="#noticias">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgInicio_menu_vertical_entrada_4">
                Noticias </span></a>
            <a href="#suscribete">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgInicio_menu_vertical_entrada_5">
                Suscripción al boletín de noticias </span></a>
            <a href="#contacta">
              <i class="bi bi-chevron-compact-right"></i>
              <span data-i18n="pgInicio_menu_vertical_entrada_6">
                Contacta con nosotros </span></a>
          </div>
        </div>

        <!-- ÁREA DE CONTENIDOS -->
        <div class="col-eighty">

          <!-- Sección "La Asociación" -->
          <div id="laAsociacion" class="pb-67"></div>
          <section class="contained row">
            <h2 class="section-title ff-sackers" data-i18n="pgInicio_seccion_asociacion_titulo">
              AsEViRiS </h2>
            <div class="col-balance mt-50 ta-left">
              <span class="fc-primary fs-h2-intro">
                <span class="ff-sackers" data-i18n="pgInicio_seccion_asociacion_parrafo_1_cabecera"> AsEViRiS </span>
                <span data-i18n="pgInicio_seccion_asociacion_parrafo_1"> es la Asociación de Empresarios del Vino de la Ribeira Sacra. Una asociación sin ánimo de lucro que nace con la finalidad de defender los intereses de las bodegas acogidas a la Denominación de Origen Ribeira Sacra en general y los de sus miembros asociados en particular. </span></span>
              <p data-i18n="pgInicio_seccion_asociacion_parrafo_2">
                La Denominación de Origen Ribeira Sacra (aprobada en 1996 para proteger el origen, garantizar la calidad y promocionar los vinos de esta zona) agrupa vinos gallegos de prestigio elaborados en dicha zona con las variedades de uva loureira, treixadura, godello, dona branca y torrantés (vinos blancos) y mencía, brancellao, sousón y merenzao (vinos tintos). </p>
              <p data-i18n="pgInicio_seccion_asociacion_parrafo_3">
                En el Consello Regulador de la D.O. Ribeira Sacra están inscritas en la actualidad más de 1.200 hectáreas de viñedo que cultivan, aproximadamente, 3.000 viticultores, embotellando el producto bajo el amparo de la D.O. un centenar de bodegas. </p>
              <p data-i18n="pgInicio_seccion_asociacion_parrafo_4">
                La producción de uva dentro del Consello Regulador se sitúa alrededor de los 7.000.000 de kilos en uno de los paisajes vitícolas más espectaculares y bellos del mundo. </p>

              <!-- Derechos de autor -->
              <span class="fs-display-flex-end">
                1.
                <a href="https://pixabay.com/es/users/tama66-1032521/" class="fc-secondary fc-blue" target="_blank">Tama66</a> (2021).
                <a href="https://pixabay.com/es/photos/vi%C3%B1edos-r%C3%ADo-mosela-monta%C3%B1as-r%C3%ADo-6754281/" class="fc-secondary fc-blue fs-italic" target="_blank">Viñedos, Río mosela y Montañas</a>.
                <span data-i18n="derechos_autor_licencia">Licencia</span>
                <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
                <br>
                2.
                <a href="https://pixabay.com/es/users/ilonaburschl-3558510/" class="fc-secondary fc-blue" target="_blank">Burschl, I.</a> (2018).
                <a href="https://pixabay.com/es/photos/uva-vi%C3%B1edos-vid-colores-de-oto%C3%B1o-3716266/" class="fc-secondary fc-blue fs-italic" target="_blank">Uva, Viñedos y Vid</a>.
                <span data-i18n="derechos_autor_licencia">Licencia</span>
                <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
              </span>

              <br>
              <a href="asociacion.php" class="btn-bg1 mt-25 border-round" data-i18n="boton_saber_mas">
                Saber Más </a>
            </div>
            <div class="col-balance mt-50">
              <div class="sticky-img-dual">
                <img src="../images/tama66-vineyards-6754281.jpg" alt="Viñedos, Río mosela y Montañas">
                <img src="../images/blob.svg" alt="Fondo gris" class="blob">
                <img src="../images/ilonaburschl-grape-3716266.jpg" alt="Uva, Viñedos y Vid">
              </div>
            </div>
            <div class="sticky-img-dual-spacer"></div>
          </section>

          <!-- Sección "Agenda" -->
          <div id="agenda" class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers" data-i18n="pgInicio_seccion_agenda_titulo">
              Agenda </h2>
            <div class="row mt-50 flex-just-center">

              <!-- Evento 1 -->
              <div class="col-tri">
                <article class="card-blog">
                  <img src="../images/couleur-cork-1574810_1920.jpg" alt="Corcho, Corchos de vino y Cierres">
                  <div class="info">
                    <h3 class="mt-5 mb-5 fc-primary fs-h3" data-i18n="pgInicio_seccion_agenda_noticia_1_titulo">
                      Foodex JAPÓN 2027 </h3>
                    <p class="ml-a mt-5" data-i18n="pgInicio_seccion_agenda_noticia_1_fecha">
                      08/03/2027 </p>
                  </div>
                  <p class="ml-10 mt-5 mb-20 ta-left" data-i18n="pgInicio_seccion_agenda_noticia_1_texto">
                    La feria FOODEX, llevada a cabo anualmente en el centro internacional de conferencias Makuhari Messe en la ciudad de Chiba (aledaña a Tokio), es la mayor feria agroalimentaria que se celebra en la zona Asia-Pacífico, incluyendo Oceanía.
                  </p>
                  <a href="actualidad.php#event_1" class="ml-10">
                    <span data-i18n="boton_ver_evento"> Ver evento </span>
                    &nbsp;
                    <i class="bi bi-box-arrow-up-right"></i></a>
                </article>
              </div>

              <!-- Evento 2 -->
              <div class="col-tri">
                <article class="card-blog">
                  <img src="../images/pexels-toan-van-1745332-14794082.jpg" alt="Fila de botellas de vino">
                  <div class="info">
                    <h3 class="mt-5 mb-5 fc-primary fs-h3" data-i18n="pgInicio_seccion_agenda_noticia_2_titulo">
                      ProWein 2027 DÜSSELDORF </h3>
                    <p class="ml-a mt-5" data-i18n="pgInicio_seccion_agenda_noticia_2_fecha">
                      28/06/2027 </p>
                  </div>
                  <p class="ml-10 mt-5 mb-20 ta-left" data-i18n="pgInicio_seccion_agenda_noticia_2_texto"> ProWein 2027 Dusseldorf, la feria del vino de Dusseldorf (Alemania) ofertará un año más un programa muy completo en el cual podremos encontrarnos con: degustaciones, seminarios y eventos en vivo enabundancia, proporcionar gran experiencia de primera mano y un ambiente original y vibrante. </p>
                  <a href="actualidad.php#event_2" class="ml-10">
                    <span data-i18n="boton_ver_evento"> Ver evento </span>
                    &nbsp;
                    <i class="bi bi-box-arrow-up-right"></i></a>
                </article>
              </div>

              <!-- Evento 3 -->
              <div class="col-tri">
                <article class="card-blog">
                  <img src="../images/kamilla-isalieva-Rv2XfyRoD2o-unsplash.jpg" alt="Fila de copas de vino">
                  <div class="info">
                    <h3 class="mt-5 mb-5 fc-primary fs-h3" data-i18n="pgInicio_seccion_agenda_noticia_3_titulo">
                      Feria del vino de ALSACIA 2027 </h3>
                    <p class="ml-a mt-5" data-i18n="pgInicio_seccion_agenda_noticia_3_fecha">
                      09/10/2027 </p>
                  </div>
                  <p class="ml-10 mt-5 mb-20 ta-left" data-i18n="pgInicio_seccion_agenda_noticia_3_texto"> “Foire aux Vins d'Alsace 2027 Colmar", la Feria del vino de Alsacia, es un evento de gran importancia dentro del sector en Francia, de ahí que en este evento se den cita los mejores profesionales y expertos relacionados con el sector. </p>
                  <a href="actualidad.php#event_3" class="ml-10">
                    <span data-i18n="boton_ver_evento"> Ver evento </span>
                    &nbsp;
                    <i class="bi bi-box-arrow-up-right"></i></a>
                </article>
              </div>
            </div>
          </section>

          <!-- Sección "Nuestros Vinos" -->
          <div id="nuestrosVinos" class="pb-67"></div>
          <section class="bg-secundary-foot ta-center">
            <h2 class="section-title ff-sackers bg-secundary-foot" data-i18n="pgInicio_seccion_nuestros_vinos_titulo">
              Nuestros Vinos </h2>
            <div class="contained row flex-just-center">
              <div class="col-full">
                <hr>
              </div>

              <!-- Apartado "Historia" -->
              <div class="col-tri">
                <i class="bi bi-bank fs-h2"></i>
                <h3 class="mt-10 ff-sackers fs-h2" data-i18n="pgInicio_seccion_nuestros_vinos_historia_titulo">
                  Historia </h3>
                <p class="ta-left" data-i18n="pgInicio_seccion_nuestros_vinos_historia_texto">
                  La Ribeira Sacra es una zona que comprende las riberas de los ríos Cabe, Sil y Miño. Está situada en la zona sur de la provincia de Lugo y el norte de la provincia de Ourense, en Galicia, España. </p>
                <a href="denominacion.php#historia" class="btn-bg2 border-round mt-25"
                  data-i18n="boton_saber_mas"> Saber más </a>
              </div>

              <!-- Apartado "Denominación de Origen" -->
              <div class="col-tri">
                <i class="bi bi-clipboard2-check fs-h2"></i>
                <h3 class="mt-10 ff-sackers fs-h2" data-i18n="pgInicio_seccion_nuestros_vinos_denominacion_titulo">
                  Denominación de Origen </h3>
                <p class="ta-left" data-i18n="pgInicio_seccion_nuestros_vinos_denominacion_texto">
                  La Ribeira Sacra está considerada como Denominación de Origen desde que fue autorizada el 3 de Septiembre de 1996 por orden de la Consellería de Agricultura, Gandería e Montes de la Xunta de Galicia. </p>
                <a href="denominacion.php#denominacionOrigen" class="btn-bg2 border-round mt-25"
                  data-i18n="boton_saber_mas"> Saber más </a>
              </div>

              <!-- Apartado "Bodegas Asociadas" -->
              <div class="col-tri">
                <i class="bi bi-info-square fs-h2"></i>
                <h3 class="mt-10 ff-sackers fs-h2" data-i18n="pgInicio_seccion_nuestros_vinos_bodegas_titulo">
                  Bodegas Asociadas </h3>
                <p class="ta-left" data-i18n="pgInicio_seccion_nuestros_vinos_bodegas_texto">
                  Conoce las bodegas que forman parte de la Asociación de Empresarios del Vino de la Ribeira Sacra
                  <span class="ff-sackers">"AsEViRiS"</span>, su ubicación, sus características, sus datos de contacto y sus vinos.
                </p>
                <a href="bodegas.php#bodegas" class="btn-bg2 border-round mt-25" data-i18n="boton_saber_mas"> Saber más </a>
              </div>

            </div>
          </section>

          <!-- Sección "Noticias" -->
          <div id="noticias" class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers" data-i18n="pgInicio_seccion_noticias_titulo">
              Noticias </h2>
            <div class="row mt-50 flex-just-center">

              <!-- Noticia 1 -->
              <div class="col-tri">
                <article class="card-team">
                  <img src="../images/alfonso-scarpa-g14fZqFSF0I-unsplash_853.jpg" alt="Mujer con el pelo rizado bebiendo vino blanco en una copa">
                  <h3 class="title fs-h3" data-i18n="pgInicio_seccion_noticias_articulo_1_titulo">
                    Los vinos "RIBEIRA SACRA" fueron presentados en 9 ciudades andaluzas </h3>
                  <div class="info">
                    <h4 class="fs-h4" data-i18n="pgInicio_seccion_noticias_articulo_1_fecha">
                      27/03/2026 </h4>
                    <p class="ta-left" data-i18n="pgInicio_seccion_noticias_articulo_1_texto">
                      La unidad móvil de la campaña visitó en las tres últimas semanas Córdoba, Sevilla, Huelva, Jerez de la Frontera, Cádiz, Marbella, Málaga, Granada y Almería. </p>
                    <a href="actualidad.php#new_1" class="btn-bg2 border-round mt-25"
                      data-i18n="boton_leer_noticia"> Leer noticia </a>
                  </div>
                </article>
              </div>

              <!-- Noticia 2 -->
              <div class="col-tri">
                <article class="card-team">
                  <img src="../images/pexels-ds-stories-7267573_853.jpg" alt="Tres medallas en bloques de podio">
                  <h3 class="title fs-h3" data-i18n="pgInicio_seccion_noticias_articulo_2_titulo">
                    Vinos de la Ribeira Sacra premiados en el 30º Concurso Internacional de Vinos de Montaña </h3>
                  <div class="info">
                    <h4 class="fs-h4" data-i18n="pgInicio_seccion_noticias_articulo_2_fecha">
                      18/05/2026 </h4>
                    <p class="ta-left" data-i18n="pgInicio_seccion_noticias_articulo_2_texto">
                      A dicho certamen las bodegas de la D.O. Ribeira Sacra, catalogadas como viticultura de montaña, presentaron un total de 59 muestras, 46 muestras orrespondientes a vino tinto y 13 muestras a vino blanco, principalmente de la añada de 2014, pero también se presentaron 12 muestras correspondientes a añadas anteriores. </p>
                    <a href="actualidad.php#new_2" class="btn-bg2 border-round mt-25"
                      data-i18n="boton_leer_noticia"> Leer noticia </a>
                  </div>
                </article>
              </div>

              <!-- Noticia 3 -->
              <div class="col-tri">
                <article class="card-team">
                  <img src="../images/yanhao-fang-PugZ4OnB3_Y-unsplash_853.jpg" alt="Gente disfrutando de una cafetería al aire libre bajo sombrillas rojas">
                  <h3 class="title fs-h3" data-i18n="pgInicio_seccion_noticias_articulo_3_titulo">
                    Las terrazas de la Ribeira Sacra unifican su estética con el vino como protagonista
                  </h3>
                  <div class="info">
                    <h4 class="fs-h4" data-i18n="pgInicio_seccion_noticias_articulo_3_fecha">
                      25/07/2026 </h4>
                    <p class="ta-left" data-i18n="pgInicio_seccion_noticias_articulo_3_texto">
                      El color burdeos de los caldos será obligatorio para las sombrillas -La ordenanza busca homogeneizar colores en todos los locales y eliminar marcas publicitarias del mobiliario- </p>
                    <a href="actualidad.php#new_3" class="btn-bg2 border-round mt-25"
                      data-i18n="boton_leer_noticia"> Leer noticia </a>
                  </div>
                </article>
              </div>
            </div>
          </section>

          <!-- Sección "Suscríbete al boletín de noticias" -->
          <?php
          include "include/suscripcionBoletinNoticias.php";
          ?>

          <!-- Sección "Contacta con nosotros" -->
          <div id="contacta" class="pb-67"></div>
          <section class="contained ta-center">
            <h2 class="section-title ff-sackers" data-i18n="pgInicio_seccion_contacta_titulo">
              Contacta con nosotros </h2>
            <p class="col-wide mlmr-a mt-50 ta-left" data-i18n="pgInicio_seccion_contacta_parrafo_1">
              La afiliación a la Asociación de Empresarios del Vino de la Ribeira Sacra <span class="ff-sackers"> "AsEViRiS"</span> es totalmente voluntaria y responde a la necesidad de las empresas de pertenecer a una organización que defienda sus intereses -comunes a los de otras empresas- y les mantenga informados de los asuntos específicos que les puedan fectar en el desarrollo normal de sus actividades. </p>
            <p class="col-wide mlmr-a ta-left" data-i18n="pgInicio_seccion_contacta_parrafo_2">
              El ingreso en la Asociación deberá solicitarse por escrito dirigido al Presidente. </p>
            <a href="contacto.php" class="btn-bg1 border-round mt-25"
              data-i18n="pgInicio_seccion_contacta_boton"> Ponte en contacto </a>
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