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
  <title data-i18n="pgBodegas_titulo">AsEViRiS / Bodegas</title>
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
    <section class="sub-slider sub-slider-bodegas">
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
          <a href="https://www.flickr.com/photos/22625483@N04/" class="fc-secondary fc-blue" target="_blank">Piñeiro, R.</a> (2011).
          <a href="https://es.wikipedia.org/wiki/Archivo:Doade,_Sober,_Galiza.jpg" class="fc-secondary fc-blue fs-italic" target="_blank">Doade, Sober, Galiza</a>.
          <a href="https://creativecommons.org/licenses/by-sa/2.0/deed.es" class="fc-secondary fc-blue" target="_blank">CC BY-SA 2.0</a>.
        </span>
      </div>
      <div class="contained">

        <!-- Selector de idioma -->
        <?php
        include "include/selectorIdioma.inc.html";
        ?>

        <!-- Opciones de navegación -->
        <label for="tablet-mobile-menu" class="navigation-container-label" data-i18n="menu_navegacion_titulo">
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
          <a href="bodegas.php" class="nav-menu fc-primary fw-bold" data-i18n="menu_navegacion_bodegas">
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

    <!-- ÁREA DE CONTENIDOS -->
    <!-- Sección "Bodegas" -->
    <div class="pb-13"> </div>
    <div id="bodegas" class="pb-67"> </div>
    <section class="contained">
      <h2 class="section-title ff-sackers" data-i18n="pgBodegas_seccion_bodegas_titulo"> Bodegas </h2>
      <div class="col-balance flo-left mlmr-a mt-25 ta-left">
        <p class="fc-primary fs-h2-intro" data-i18n="pgBodegas_seccion_bodegas_parrafo_1"> El modelo de "Adega" (Bodega) sería aquella empresa formada por uno o varios socios, que tiene una producción, por lo general elevada. Este tipo de productores pueden comprarle uvas a viticultores para elaborar sus vinos o bien pueden tener sus propios viñedos.
        </p>
        <p><span data-i18n="pgBodegas_seccion_bodegas_parrafo_2">La Asociación de Empresarios del Vino de la Ribeira Sacra </span><span class="ff-sackers"> "AsEViRiS" </span><span data-i18n="pgBodegas_seccion_bodegas_parrafo_3"> cuenta entre sus asociados con bodegas de las más antiguas de Galicia, con una de las más grandes y con una de las primeras que embotelló sus vinos.</span>
        </p>
        <p><span data-i18n="pgBodegas_seccion_bodegas_parrafo_4">En la actualidad la Asociación de Empresarios del Vino de la Ribeira Sacra</span><span class="ff-sackers"> "AsEViRiS" </span><span data-i18n="pgBodegas_seccion_bodegas_parrafo_5"> cuenta con un total de 20</span>
          <a href="#bodegasAsociadas" class="fc-primary" data-i18n="pgBodegas_seccion_bodegas_parrafo_6"> bodegas asociadas </a>.
        </p>
      </div>
      <div class="flo-left col-balance mt-50 ta-center">
        <img src="../images/gasparrocha-top-5078614_1920.jpg" alt="Los viñedos, Vino y Uvas">

        <!-- Derechos de autor -->
        <span class="fs-display-flex-end">
          <a href="https://pixabay.com/es/users/gasparrocha-273037/" class="fc-secondary fc-blue" target="_blank">Rocha, G.</a> (2020).
          <a href="https://pixabay.com/es/photos/los-vi%c3%b1edos-vino-uvas-vi%c3%b1edos-5078614/" class="fc-secondary fc-blue fs-italic" target="_blank">Los viñedos, Vino y Uvas</a>.
          <span data-i18n="derechos_autor_licencia">Licencia</span>
          <a href="https://pixabay.com/service/license-summary/" class="fc-secondary fc-blue" target="_blank">Pixabay</a>.
        </span>
      </div>
      <div class="broken-float"></div>
    </section>
    <div class="reset">
      <div class="row"></div>
    </div>

    <!-- Sección "Bodegas Asociadas" -->
    <div class="pb-13"> </div>
    <div id="bodegasAsociadas" class="pb-67"> </div>
    <section class="contained">
      <h2 class="section-title ff-sackers" data-i18n="pgBodegas_seccion_bodegas_asociadas_titulo"> Bodegas Asociadas </h2>
      <div class="col-full mlmr-a mt-25 ta-center">
        <div id="contenedorTablaListadoBodegas">

          <!-- Consulta a la base de datos para generar el listado de bodegas -->
          <?php
          require "../app/conexionMySQL.php";
          mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

          // Captura de excepciones o errores en tiempo de ejecución
          try {
            $conexion = conexion();
            $sql = "SELECT * FROM bodegas ORDER BY nombre";
            $resultado = $conexion->query($sql);
            echo '<table id="listadoBodegas" class="tablaListado">';
            echo '<tr>';
            echo '<th data-i18n="pgBodegas_seccion_bodegas_asociadas_tabla_col_1">Nombre</th>';
            echo '<th data-i18n="pgBodegas_seccion_bodegas_asociadas_tabla_col_2">Web</th>';
            echo '<th data-i18n="pgBodegas_seccion_bodegas_asociadas_tabla_col_3">email</th>';
            echo '<th data-i18n="pgBodegas_seccion_bodegas_asociadas_tabla_col_4">Teléfono</th>';
            echo '<th data-i18n="pgBodegas_seccion_bodegas_asociadas_tabla_col_5">Info Completa</th>';
            echo '</tr>';
            while ($registro = $resultado->fetch_array()) {
              echo "<tr>";
              echo "<td><span class='ff-sackers fc-primary'>" . $registro["nombre"] . "</span></td>";
              echo "<td>" . "<a href=" . $registro["web"] . " target='_blank'>" . $registro["web"] . "</a></td>";
              echo "<td>" . $registro["email"] . "</td>";
              echo "<td>" . $registro["telefono"] . "</td>";
              echo '<td> <a href="detalleBodega.php" class="ml-10" ';
              echo 'onclick="document.cookie=';
              echo "'idBodega=" . $registro["idBodega"] . "'; ";
              echo "abrirVentanaCentrada(this.href, 'Detalle de Bodega', 950, 600); return false;";
              echo '">';
              echo '<span data-i18n="boton_ver">Ver</span>';
              echo "&nbsp;";
              echo '<span class="bi bi-box-arrow-up-right"></span></a>';
              echo "</td>";
              echo "</tr>";
            }
            echo '</table>';
            $resultado->free();
            $conexion->close();

            // Procesado de las excepciones o errores capturados en tiempo de ejecución
          } catch (mysqli_sql_exception $error) {

            // Mensaje de error para el usuario en caso de fallo de conexión con la base de datos
            echo '<div id="contenedorError" class="ta-center">';
            echo '<img src="../images/openicons-attention-98513.svg" class="img-alerta">';
            echo '<p data-i18n="pgBodegas_error_p1">El servidor encontró un error interno y no pudo completar tu solicitud.</p>';
            echo '<p data-i18n="pgBodegas_error_p2">Inténtalo de nuevo pasados unos minutos.</p>';
            echo '<p data-i18n="pgBodegas_error_p3">Gracias.</p>';
            echo '</div>';
          }
          ?>

        </div>
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
  <script src="../js/scriptBannerCookies.js"></script>
  <script src="../js/scriptFunciones.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>