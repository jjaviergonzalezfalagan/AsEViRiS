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
  <title data-i18n="pgContacto_titulo">AsEViRiS / Contacto</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
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
    <section class="sub-slider sub-slider-contacto">
      <div class="slider-contained">
        <div class="slider-title fc-white">

          <!-- Logo e identificación -->
          <h1 class="ff-sackers">
            <a href="index.php" class="logo-back-to-index fc-white">
              <img src="../images/logo-aseviris.gif" class="logo-aseviris" alt="Logo AsEViRiS">
            </a>
          </h1>
          <p class="fw-normal fc-white fs-cabecera ff-sackers" data-i18n="logo_titulo">
            Asociación de Empresarios del Vino de la Ribeira Sacra</p>
          <p class="fw-normal fc-white fs-cabecera" data-i18n="advertencia_consumo">
            ¡Bebe de manera responsable! Tu bienestar es lo primero</p>
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
          <a href="https://www.pexels.com/es-es/@peter-dyllong-2158803154/" class="fc-secondary fc-blue" target="_blank">Dyllong, P.</a> (2025).
          <a href="https://www.pexels.com/es-es/foto/colinas-de-vinedos-en-terraza-bajo-un-cielo-azul-claro-37028180/" class="fc-secondary fc-blue fs-italic" target="_blank">Viñedos en terraza</a>.
          <span data-i18n="derechos_autor_licencia">Licencia</span>
          <a href="https://www.pexels.com/es-ES/license/" class="fc-secondary fc-blue" target="_blank">pexels</a>.
        </span>
      </div>
      <div class="contained">

        <!-- Selector de idioma -->
        <?php
        include "include/selectorIdioma.inc.html";
        ?>

        <!-- Opciones de navegación -->
        <label for="tablet-mobile-menu" class="navigation-container-label">
          Menú de navegación</label>
        <input type="checkbox" id="tablet-mobile-menu" name="tablet-mobile-menu" class="tab-mob-menu">
        <div class="navigation-container">
          <a href="index.php" class="nav-menu" data-i18n="menu_navegacion_inicio">
            Inicio</a>
          <a href="asociacion.php" class="nav-menu" data-i18n="menu_navegacion_asociacion">
            La Asociación</a>
          <a href="actualidad.php" class="nav-menu" data-i18n="menu_navegacion_actualidad">
            Actualidad</a>
          <a href="denominacion.php" class="nav-menu" data-i18n="menu_navegacion_denominacion">
            Denominación</a>
          <a href="bodegas.php" class="nav-menu" data-i18n="menu_navegacion_bodegas">
            Bodegas</a>
          <a href="enoturismo.php" class="nav-menu" data-i18n="menu_navegacion_enoturismo">
            Enoturismo</a>

          <!-- Se muestra esta opción del menú sólo si el usuario ha iniciado sesión -->
          <?php
          if (isset($_SESSION["codBodega"])) {
            echo '<a href="asociadosDatosBodega.php" class="nav-menu" data-i18n="menu_navegacion_asociados">
            Asociados </a>';
          }
          ?>

          <a href="contacto.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_contacto">
            Contacto</a>

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
    <!-- Sección "Contacta con nosotros" -->
    <div class="pb-80"> </div>
    <section class="contained">
      <h2 class="section-title ff-sackers" data-i18n="pgContacto_seccion_contacta_titulo">Contacto</h2>
      <p class="col-wide ta-left mlmr-a mt-50">
        <span data-i18n="pgContacto_seccion_contacta_parrafo_1_1">La afiliación a la Asociación de Empresarios del Vino de la Ribeira Sacra </span>
        <span class="ff-sackers" data-i18n="pgContacto_seccion_contacta_parrafo_1_2">"AsEViRiS" </span>
        <span data-i18n="pgContacto_seccion_contacta_parrafo_1_3">es totalmente voluntaria y responde a la necesidad de las empresas de pertenecer a una organización que defienda sus intereses - comunes a los de otras empresas - y les mantenga informados de los asuntos específicos que les puedan afectar en el desarrollo normal de sus actividades.</span>
      </p>
      <p class="col-wide ta-left mlmr-a" data-i18n="pgContacto_seccion_contacta_parrafo_2">El solicitante deberá aportar información sobre la empresa u organización (datos de contacto, NIF, página web...) y sobre la actividad (productos, Denominaciones de Origen, facturación, exportaciones...).
      </p>
      <p class="col-wide ta-left mlmr-a" data-i18n="pgContacto_seccion_contacta_parrafo_3">En el caso de miembros colectivos, se deberá aportar además el listado de miembros que forman parte de la organización, una copia de los Estatutos y el acuerdo de afiliación del órgano competente en la organización.
      </p>
      <p class="col-wide ta-left mlmr-a" data-i18n="pgContacto_seccion_contacta_parrafo_4">El ingreso en la Asociación se aprueba por la Comisión Ejecutiva, y el nuevo asociado se compromete a cumplir con lo establecido en los Estatutos de la organización y a abonar la cuota de afiliación, cantidad que se calcula anualmente en función del volumen de facturación de la empresa o de los socios de la asociación.
      </p>
      <div class="row">

        <!-- Sección "Mapa embebido de OpenStreetMap" -->
        <div class="col-balance map-embed ta-center">
          <iframe width="800" height="600" src="https://www.openstreetmap.org/export/embed.html?bbox=-7.613182067871095%2C42.4848840718379%2C-7.404785156250001%2C42.565345174766456&amp;layer=mapnik&amp;marker=42.52525345361604%2C-7.508805214652966"></iframe><br>
          <a class="fs-minor" href="https://www.openstreetmap.org/?mlat=42.52525&amp;mlon=-7.50881#map=13/42.52513/-7.50898" target="_blank"><span data-i18n="enlace_ver_a_pagina_completa">Ver a página completa </span> &nbsp;<span class="bstp-icon bi bi-box-arrow-up-right"></span></a>
        </div>

        <!-- Sección "Datos de contacto" -->
        <div class="col-balance"> <span class="fs-h4 mb-15 mt-25 fc-primary" data-i18n="pgContacto_seccion_datos_encuentranos_titulo">Encuéntranos</span>
          <a id="direccion" href="https://www.openstreetmap.org/?mlat=42.52525&amp;mlon=-7.50881#map=13/42.52513/-7.50898" class="display-inblock" target="_blank"><span class="bstp-icon bi bi-globe-europe-africa"></span>&nbsp;<span data-i18n="pgContacto_seccion_datos_encuentranos_texto">27400 Monforte de Lemos | LUGO</span></a>
          <br><br>
          <a href="https://www.openstreetmap.org/?mlat=42.52525&amp;mlon=-7.50881#map=13/42.52513/-7.50898" class="display-inblock" target="_blank"><span class="bstp-icon bi bi-geo-alt-fill"></span>&nbsp;<span data-i18n="pgContacto_seccion_datos_encuentranos_coordenadas">42.51908417447932, -7.515905321467272</span></a>
          <span class="fs-h4 mb-15 mt-25 fc-primary" data-i18n="pgContacto_seccion_datos_contactanos_titulo">Contáctanos</span>
          <a id="email" href="mailto:info@aseviris.ddns.net" class="display-inblock">
            <span class="bstp-icon bi bi-envelope-fill"></span>
            <span data-i18n="pgContacto_seccion_datos_contactanos_texto_1">contacto.aseviris@gmail.com</span>
          </a>
          &nbsp;
          <span id="telefono" class="display-inblock">
            <span class="bstp-icon bi bi-telephone-fill"></span>
            <span data-i18n="pgContacto_seccion_datos_contactanos_texto_2">+34644711166</span>
          </span>
          <span class="fs-h4 mb-15 mt-25 fc-primary" data-i18n="pgContacto_seccion_datos_siguenos_titulo">Síguenos</span>
          <a href="https://www.facebook.com/?locale=es_ES" class="display-inblock mr-10" target="_blank">
            <span class="bstp-icon bi bi-facebook"></span> Facebook</a>
          <a href="https://www.instagram.com" class="display-inblock mr-10" target="_blank">
            <span class="bstp-icon bi bi-instagram"></span> Instagram</a>
          <a href="https://twitter.com/?lang=es" class="display-inblock mr-10" target="_blank">
            <span class="bstp-icon bi bi-twitter-x"></span> X</a>
          <a href="https://www.youtube.com" class="display-inblock mr-10" target="_blank">
            <span class="bstp-icon bi bi-youtube"></span> YouTube</a>

          <!-- Sección "Formulario de contacto" -->
          <form name="contacto" class="message-form mt-50 mb-25" action="../app/enviaMensaje.php" method="POST">
            <span class="fs-h4 fc-primary mb-15" data-i18n="pgContacto_seccion_datos_mensaje_titulo">Envíanos un mensaje</span>
            <div>
              <label for="message-nombre" class="message-form-label-left" data-i18n="pgContacto_seccion_datos_mensaje_nombre">Nombre y apellidos:</label>
            </div>
            <div>
              <input type="text" id="message-nombre" name="message-nombre" class="mb-20 broken-float" title="Este campo admite entre 2 y 255 caracteres. No admite números, símbolos ni caracteres especiales." pattern="^([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$" minlength="2" maxlength="255" autocomplete="on" required>
            </div>
            <div>
              <label for="message-email" class="message-form-label-left" data-i18n="pgContacto_seccion_datos_mensaje_correo">Dirección de Correo electrónico:</label>
              <label for="message-telefono" class="message-form-label-rigth" data-i18n="pgContacto_seccion_datos_mensaje_telefono">Teléfono:</label>
            </div>
            <div class="row mb-20 broken-float">
              <input type="email" id="message-email" name="message-email" title='Este campo admite direcciones de correo válidas de entre 6 y 255 caracteres con el formato: "nombre@dominio.extensión".' pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,6}" minlength="6" maxlength="255" autocomplete="on" required>
              <input type="tel" class="ml-a" id="message-telefono" name="message-telefono" title="Este campo admite números de teléfono válidos en España." pattern="^(?:(?:\+|00)34)?[6789]\d{8}$" maxlength="13" autocomplete="on" required>
            </div>
            <div>
              <label for="message-asunto" class="message-form-label-left" data-i18n="pgContacto_seccion_datos_mensaje_asunto">Asunto:</label>
            </div>
            <input type="text" id="message-asunto" name="message-asunto" class="mb-20 broken-float" title="Este campo admite entre 5 y 100 caracteres." pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ .,()_-]+$" minlength="5" maxlength="100" autocomplete="on" required>
            <div>
              <label for="message-mensaje" class="message-form-label-left" data-i18n="pgContacto_seccion_datos_mensaje_escribe">Escribe aquí tu mensaje:</label>
            </div>
            <textarea id="message-mensaje" name="message-mensaje" class="broken-float" title="Este campo admite entre 5 y 500 caracteres." rows="5" minlength="5" maxlength="500" autocomplete="on" required></textarea>
            <button type="submit" class="btn-bg1 border-round mt-20" name="message-enviar" data-i18n="boton_enviar_mensaje">Enviar mensaje</button>
          </form>
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