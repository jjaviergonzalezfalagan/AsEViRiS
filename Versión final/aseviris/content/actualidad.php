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
  <title data-i18n="pgActualidad_titulo">AsEViRiS / Actualidad</title>
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
    <section class="sub-slider sub-slider-actualidad">
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
          <a href="actualidad.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_actualidad">
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

    <section class="reset">
      <div class="row broken-float">

        <!-- Menú de navegación vertical -->
        <div class="col-twenty order-tab-1">
          <div class="card-side card-side-navigation">
            <h2 class="no-margin ff-sackers fs-h2 fc-white" data-i18n="pgActualidad_menu_vertical_titulo"> Actualidad </h2>
            <div class="linea-separacion fc-white"></div>
            <a href="#eventos">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgActualidad_menu_vertical_entrada_1">
                Eventos </span></a>
            <a href="#noticias">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgActualidad_menu_vertical_entrada_2">
                Noticias </span></a>
            <a href="#suscribete">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgActualidad_menu_vertical_entrada_3">
                Suscripción al boletín de noticias </span></a>
          </div>
        </div>

        <!-- ÁREA DE CONTENIDOS -->
        <div class="col-eighty">

          <!-- Sección "Eventos" -->
          <div id="eventos" class="pb-67"></div>
          <section class="contained">
            <h2 class="section-title ff-sackers" data-i18n="pgActualidad_seccion_eventos_titulo">
              Eventos </h2>

            <!-- Sección "Evento 1" -->
            <div id="event_1" class="pb-67"></div>
            <div>
              <div class="row flex-alig-center ta-left">
                <div class="col-balance">
                  <span class="fc-primary fs-h3" data-i18n="pgActualidad_seccion_eventos_evento_1_titulo">
                    Foodex JAPÓN 2027 </span>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_1_parrafo_1"> La feria FOODEX,llevada a cabo anualmente en el centro internacional de conferencias Makuhari Messe en la ciudad de Chiba (aledaña a Tokio), es la mayor feria agroalimentaria que se celebra en la zona Asia-Pacífico, incluyendo Oceanía, constituyendo un importante escaparate para las empresas interesadas en introducirse en el mercado japonés y en el asiático en general y/o consolidar su presencia en los mismos. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_1_parrafo_2"> ICEX España Exportación e Inversiones organiza una pabellón oficial en la feria FOODEX 2027 que tendrá lugar del 8 al 11 de marzo de 2027 en el recinto ferial Makuhari Messe International Convention Complex (Makuhari Messe) de Chiba (Tokio). </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_1_parrafo_3"> La próxima será la 51ª edición de esta feria internacional, dedicada a los sectores de la alimentación y las bebidas. Es de periodicidad anual y, desde su primera edición en 1976, está dirigida a un público exclusivamente profesional. Atrae a un gran número de compradores líderes del sector de la alimentación, abarcando desde mayoristas a minoristas, supermercados, catering, importadores de bebidas, restauración, etc. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_1_parrafo_4"> La actividad descrita puede ser susceptible de ser financiada por la Unión Europea a través de los Fondos Europeos de Desarrollo Regional (FEDER), de las que ICEX España Exportación e Inversiones es órgano ejecutor. </p>
                </div>
                <div class="col-balance order-tab-1 ta-center">
                  <img src="../images/couleur-cork-1574810_1920.jpg" alt="Corcho, Corchos de vino y Cierres">

                  <!-- Derechos de autor -->
                  <span class="fs-display-flex-end">
                    <a href="https://pixabay.com/es/users/couleur-1195798/" class="fc-secondary fc-blue" target="_blank">Couleur</a> (2016).
                    <a href="https://pixabay.com/es/photos/corcho-corchos-de-vino-cierres-1574810/" class="fc-secondary fc-blue fs-italic" target="_blank">Corcho, Corchos de vino y Cierres</a>.
                    <span data-i18n="derechos_autor_licencia">Licencia</span>
                    <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
                  </span>

                </div>
              </div>
            </div>

            <!-- Sección "Evento 2" -->
            <div id="event_2" class="pb-67"></div>
            <div class="linea-separacion fc-gray"></div>
            <div>
              <div class="row flex-alig-center ta-left">
                <div class="col-balance ta-center">
                  <img src="../images/pexels-toan-van-1745332-14794082.jpg" alt="Fila de botellas de vino en una bodega">

                  <!-- Derechos de autor -->
                  <span class="fs-display-flex-end">
                    <a href="https://www.pexels.com/es-es/@toan-van-1745332/" class="fc-secondary fc-blue" target="_blank">Văn, T.</a> (2022).
                    <a href="https://www.pexels.com/es-es/foto/alcohol-botellas-fila-hilera-14794082/" class="fc-secondary fc-blue fs-italic" target="_blank">Fila de botellas de vino en una bodega</a>.
                    <span data-i18n="derechos_autor_licencia">Licencia</span>
                    <a href="https://www.pexels.com/es-ES/license/" class="fc-secondary fc-blue" target="_blank">pexels</a>.
                  </span>

                </div>
                <div class="col-balance"> <span class="fc-primary fs-h3"
                    data-i18n="pgActualidad_seccion_eventos_evento_2_titulo">
                    ProWeiN 2027 DÜSSELDORF </span>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_2_parrafo_1"> ProWein 2027 Dusseldorf, la feria del vino de Dusseldorf (Alemania) ofertará un año más un programa muy completo en el cual podremos encontrarnos con: degustaciones, seminarios y eventos en vivo en abundancia, proporcionar gran experiencia de primera mano y un ambiente original y vibrante. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_2_parrafo_2"> Prowein 2027 Düsseldorf, tendrá lugar este año nuevamente en esta ciudad alemana entre los próximos días 28 al 30 de junio de 2027 en las instalaciones del recinto ferial Messe Düsseldorf. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_2_parrafo_3"> En ProWein 2027 Dusseldorf, se nos mostrarán las últimas novedades e innovaciones relacionadas con el sector, puesto que como decimos en ella se darán cita los mejores profesionales y expertos del sector, siendo para todos ellos un evento de casi inexcusable asistencia, tanto por las novedades que en él se podrán observar como por los contactos que podrán establecerse. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_2_parrafo_4"> ProWein 2027 Dusseldorf contará con la presencia de los mejores expertos del sector, no en vano es una de las ferias más importantes del mismo de cuantas de celebran en Alemania. </p>
                </div>
              </div>
            </div>

            <!-- Sección "Evento 3" -->
            <div id="event_3" class="pb-67"></div>
            <div class="linea-separacion fc-gray"></div>
            <div>
              <div class="row flex-alig-center ta-left">
                <div class="col-balance"><span class="fc-primary fs-h3"
                    data-i18n="pgActualidad_seccion_eventos_evento_3_titulo">
                    Feria del vino de ALSACIA 2027 </span>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_3_parrafo_1"> “Foire aux Vins d'Alsace 2027 Colmar", la Feria del vino de Alsacia, es un evento de gran importancia dentro del sector en Francia, de ahí que en este evento se den cita los mejores profesionales y expertos relacionados con el sector. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_3_parrafo_2"> Foire aux Vins d'Alsace 2027, la feria del vino de Alsacia 2027, celebrará este año una nueva edición entre los próximos días 09 al 13 de octubre de 2027 en la ciudad francesa de Colmar. Una cita que debido a su importancia se ha convertido en un evento de casi inexcusable asistencia para todos los profesionales del sector, así como para los aficionados al mismo, debido a su importancia y a los contactos que se podrán establecer por parte de los profesionales con la posible demanda. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_3_parrafo_3"> Los vinos ecológicos españoles acudirán a esta nueva edición de la “Foire aux Vins d'Alsace 2027 Colmar". La Federación Española de Empresas con Productos Ecológicos (FEPECO) está gestionando la presencia de este tipo de vinos con stand propio. El vino ecológico es uno de los productos cuyo consumo ha experimentado un mayor crecimiento en los últimos años. </p>
                  <p data-i18n="pgActualidad_seccion_eventos_evento_3_parrafo_4"> En definitiva, una feria de referencia dentro del sector en Francia, de ahí que se haya convertido en un evento de casi inexcusable asistencia para las mejores empresas y profesionales relacionados con el mismo, tanto por las novedades que en ella se podrán observar como por los contactos que se podrán establecer y conseguir. </p>
                </div>
                <div class="col-balance order-tab-1 ta-center">
                  <img src="../images/kamilla-isalieva-Rv2XfyRoD2o-unsplash.jpg" alt="Fila de copas de vino encima de una mesa">

                  <!-- Derechos de autor -->
                  <span class="fs-display-flex-end">
                    <a href="https://unsplash.com/es/@kamillaisalieva" class="fc-secondary fc-blue" target="_blank">Isalieva, K.</a> (2020).
                    <a href="https://unsplash.com/es/fotos/una-fila-de-copas-de-vino-encima-de-una-mesa-Rv2XfyRoD2o" class="fc-secondary fc-blue fs-italic" target="_blank">Fila de copas de vino encima de una mesa</a>.
                    <span data-i18n="derechos_autor_licencia">Licencia</span>
                    <a href="https://unsplash.com/es/licencia" class="fc-secondary fc-blue" target="_blank">Unsplash</a>.
                  </span>

                </div>
              </div>
            </div>
          </section>

          <!-- Sección "Noticias" -->
          <div id="noticias" class="pb-67"> </div>
          <section class="contained">
            <div id="new_1" class="pb-67"> </div>
            <h2 class="section-title ff-sackers" data-i18n="pgActualidad_seccion_noticias_titulo"> Noticias </h2>

            <!-- Sección "Noticia 1" -->
            <div>
              <div class="row flex-alig-center ta-left">
                <div class="col-balance ta-center">
                  <img src="../images/alfonso-scarpa-g14fZqFSF0I-unsplash.jpg" alt="Mujer con el pelo rizado bebiendo vino blanco en una copa">

                  <!-- Derechos de autor -->
                  <span class="fs-display-flex-end">
                    <a href="https://unsplash.com/es/@lucidistortephoto" class="fc-secondary fc-blue" target="_blank">Scarpa, A.</a> (2026).
                    <a href="https://unsplash.com/es/fotos/mujer-con-el-pelo-rizado-bebiendo-vino-blanco-en-una-copa-g14fZqFSF0I" class="fc-secondary fc-blue fs-italic" target="_blank">Mujer con el pelo rizado bebiendo vino blanco en una copa</a>.
                    <span data-i18n="derechos_autor_licencia">Licencia</span>
                    <a href="https://unsplash.com/es/licencia" class="fc-secondary fc-blue" target="_blank">Unsplash</a>.
                  </span>

                </div>
                <div class="col-balance"> <span class="fc-primary fs-h3"
                    data-i18n="pgActualidad_seccion_noticias_noticia_1_titulo">
                    Los vinos "RIBEIRA SACRA" fueron presentados en 9 ciudades andaluzas </span>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_1_parrafo_1"> La unidad móvil de "Sabores de Galicia" en la que participa la D.O Ribeira Sacra, que ampara casi un centenar de bodegas y 200 marcas comerciales de vino, ha visitado desde el inicio de la campaña -a principios de este mes de abril- un total de 9 ciudades de Andalucía: Córdoba, Sevilla, Huelva, Jerez de la Frontera, Cádiz, Marbella, Málaga, Granada y Almería. </p>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_1_parrafo_2"> Durante este tiempo, varios centenares de personas de estas localidades, incluyendo representantes de diferentes instituciones locales y público especializado como sumilieres o miembros de asociaciones gastronómicas, pudieron disfrutar de primera mano de las catas comentadas ofrecidas. </p>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_1_parrafo_3"> La campaña "Sabores de Galicia", que tendrá continuidad en la Comunidad de Murcia, pretende dar a conocer la singularidad vinícola de la Ribeira Sacra y poner en valor la tradición milenaria con la que se elaboran sus vinos, que en la actualidad cuentan con un gran prestigio en el ámbito nacional e internacional. Tras Murcia, la unidad móvil visitará diferentes ciudades de la Comunidad Valenciana para, después, continuar su periplo por otros puntos de la geografía española. </p>
                </div>
              </div>
            </div>

            <!-- Sección "Noticia 2" -->
            <div id="new_2" class="pb-67"></div>
            <div class="linea-separacion fc-gray"></div>
            <div>
              <div class="row flex-alig-center ta-left">
                <div class="col-balance"> <span class="fc-primary fs-h3"
                    data-i18n="pgActualidad_seccion_noticias_noticia_2_titulo">
                    Vinos de la Ribeira Sacra premiados en el 30º Concurso Internacional de Vinos de Montaña </span>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_2_parrafo_1"> A dicho certamen las bodegas de la D.O. Ribeira Sacra, catalogadas como viticultura de montaña, presentaron un total de 59 muestras, 46 muestras correspondientes a vino tinto y 13 muestras a vino blanco, principalmente de la añada de 2025, pero también se presentaron 12 muestras correspondientes a añadas anteriores. </p>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_2_parrafo_2"> A este concurso internacional se han presentado un total de 576 muestras procedentes de 9 países diferentes; y se han otorgado un total de 191 medallas en las diferentes categorías.
                  </p>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_2_parrafo_3"> No todos los países pueden presentar sus vinos a este concurso, según el reglamento del organismo internacional pueden participar en concurso: "los vinos producidos en áreas que se caracterizan por tener una viticultura de montaña o en fuerte pendiente. Su objetivo es enfatizar las características únicas de esos productos así como dar a conocer a los consumidores los aspectos culturales de la viticultura de montaña y el valioso trabajo que los viticultores hacen para la salvaguardia del territorio y del medio ambiente, para que los consumidores mismos puedan apreciar todo esto." </p>
                </div>
                <div class="col-balance order-tab-1 ta-center">
                  <img src="../images/pexels-ds-stories-7267573.jpg" alt="Tres medallas en bloques de podio">

                  <!-- Derechos de autor -->
                  <span class="fs-display-flex-end">
                    <a href="https://www.pexels.com/es-es/@ds-stories/" class="fc-secondary fc-blue" target="_blank">DS stories</a> (2021).
                    <a href="https://www.pexels.com/es-es/foto/lugar-ganador-bloques-bloqueos-7267573/" class="fc-secondary fc-blue fs-italic" target="_blank">Tres medallas en bloques de podio</a>.
                    <span data-i18n="derechos_autor_licencia">Licencia</span>
                    <a href="https://www.pexels.com/es-ES/license/" class="fc-secondary fc-blue" target="_blank">pexels</a>.
                  </span>

                </div>
              </div>
            </div>

            <!-- Sección "Noticia 3" -->
            <div id="new_3" class="pb-67"></div>
            <div class="linea-separacion fc-gray"></div>
            <div>
              <div class="row flex-alig-center ta-left">
                <div class="col-balance ta-center">
                  <img src="../images/yanhao-fang-PugZ4OnB3_Y-unsplash.jpg" alt="Gente disfrutando de una cafetería al aire libre bajo sombrillas rojas">

                  <!-- Derechos de autor -->
                  <span class="fs-display-flex-end">
                    <a href="https://unsplash.com/es/@alamanga" class="fc-secondary fc-blue" target="_blank">Fang, Y.</a> (2026).
                    <a href="https://unsplash.com/es/fotos/gente-disfrutando-de-una-cafeteria-al-aire-libre-bajo-sombrillas-rojas-PugZ4OnB3_Y" class="fc-secondary fc-blue fs-italic" target="_blank">Gente disfrutando de una cafetería al aire libre bajo sombrillas rojas</a>.
                    <span data-i18n="derechos_autor_licencia">Licencia</span>
                    <a href="https://unsplash.com/es/licencia" class="fc-secondary fc-blue" target="_blank">Unsplash</a>.
                  </span>

                </div>
                <div class="col-balance"><span class="fc-primary fs-h3"
                    data-i18n="pgActualidad_seccion_noticias_noticia_3_titulo"> Las terrazas de la Ribeira Sacra unifican su estética con el vino como protagonista </span>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_3_parrafo_1"> El color burdeos de los caldos será obligatorio para las sombrillas -La ordenanza busca homogeneizar colores en todos los locales y eliminar marcas publicitarias del mobiliario- </p>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_3_parrafo_2"> Que las terrazas de los establecimientos hosteleros no rompan el encanto paisajístico y natural de la Ribeira Sacra. Es lo que busca el Consorcio de Turismo de la Ribeira Sacra con la ordenanza reguladora que está preparando en esta materia y que se centra exclusivamente en la parte estética de estos locales de atención al público, haciendo hincapié en cuestiones de ornato y de materiales utilizados en las instalaciones. </p>
                  <p data-i18n="pgActualidad_seccion_noticias_noticia_3_parrafo_3"> El objetivo de esta ordenanza, según confirman desde el propio Consorcio de Turismo, es homogeneizar los colores en las zonas de terraza de los locales hosteleros, eliminado la mezcla de tonalidades y los colores llamativos, así como retirar las marcas publicitarias en sombrillas y en el resto del mobiliario. </p>
                </div>
              </div>
            </div>
          </section>

          <!-- Sección "Suscríbete al boletín de noticias" -->
          <?php
          include "include/suscripcionBoletinNoticias.php";
          ?>

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
  <script src="../js/scriptFunciones.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>