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
  <title data-i18n="pgDetalleBodega_titulo">AsEViRiS / Detalle de Bodega</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>
  <span class="fade"></span>
  <main>

    <!-- Selector de idioma -->
    <?php
    include "include/selectorIdioma.inc.html";
    ?>

    <!-- ÁREA DE CONTENIDOS -->
    <!-- Sección de información de bodegas -->
    <div class="col-full">

      <!-- Sección "Detalle de Bodega" -->
      <section>
        <fieldset class="primaryColor-fieldset">

          <!-- Consulta a la base de datos para obtener los datos de la bodega seleccionada -->
          <?php
          if (isset($_COOKIE['idBodega'])) {
            $idBodega = $_COOKIE['idBodega'];
            require "../app/conexionMySQL.php";
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            // Captura de excepciones o errores en tiempo de ejecución
            try {
              $conexion = conexion();
              $sql = "SELECT * FROM bodegas WHERE idBodega=" . htmlspecialchars($idBodega);
              $resultado = $conexion->query($sql);
              $datosBodega = $resultado->fetch_array();
              echo '<img src="' . $datosBodega["rutaLogo"] . '" class="img-unheight mt-50 bdg-logo" alt="' . $datosBodega["nombre"] . '">';
              echo '<h3 class="section-title ff-sackers fc-primary">' . $datosBodega["nombre"] . '</h3>';
              echo '<table>';
              echo '<tr><td><strong><span data-i18n="pgDetalleBodega_localizacion">Localización:</span></strong></td>';
              echo '<td>' . $datosBodega["zona"] . '</td></tr>';
              echo '<tr><td><strong><span data-i18n="pgDetalleBodega_superficie">Superficie:</span></strong></td><td>' . $datosBodega["superficie"] . '</td></tr>';
              echo '<tr><td><strong><span data-i18n="pgDetalleBodega_produccion">Producción:</span></strong></td><td>' . $datosBodega["produccion"] . '</td></tr>';
              echo '<tr><td><strong><span data-i18n="pgDetalleBodega_variedades_uva">Variedades de uva:</span></strong></td><td>' . $datosBodega["variedadesDeUva"] . '</td></tr>';
              echo '<tr><td><strong><span data-i18n="pgDetalleBodega_marcas_comerciales">Marcas comerciales:</span></strong></td><td>' . $datosBodega["marcasComerciales"] . '</td></tr>';
              echo '<tr><td><strong><span data-i18n="pgDetalleBodega_premios">Premios:</span></strong></td>
            <td>' . $datosBodega["premios"] . '</td></tr>';
              echo '<tr><td class="ta-center"><span class="bstp-icon bi bi-house-door fs-h3"></span></td><td>' . $datosBodega["direccion"] . ' - ' . $datosBodega["codPostal"] . ' ' . $datosBodega["localidad"] . ' - ' . $datosBodega["provincia"] . '</td></tr>';
              echo '<tr><td class="ta-center"><span class="bstp-icon bi bi-globe-europe-africa fs-h3"></span></td><td><a href="' . $datosBodega["web"] . '" target="_blank">' . $datosBodega["web"] . '</a></td></tr>';
              echo '<tr><td class="ta-center"><span class="bstp-icon bi bi-mailbox-flag fs-h3"></span></td><td>' . $datosBodega["email"] . '</td></tr>';
              echo '<tr><td class="ta-center"><span class="bstp-icon bi bi-telephone fs-h3"></span></td><td>' . $datosBodega["telefono"] . '</td></tr>';
              echo '<tr><td class="ta-center"><span class="bstp-icon bi bi-printer fs-h3"></span></td><td>' . $datosBodega["fax"] . '</td></tr>';
              echo '<tr><td class="ta-center"><span class="bstp-icon bi bi-person fs-h3"></span></td><td>' . $datosBodega["personaContacto"] . '</td></tr>';
              echo '</table>';
              $conexion->close();

              // Procesado de las excepciones o errores capturados en tiempo de ejecución
            } catch (mysqli_sql_exception $error) {

              // Mensaje de error para el usuario en caso de fallo de conexión con la base de datos
              echo '<div id="contenedorError" class="ta-center">';
              echo '<img src="../images/openicons-attention-98513.svg" class="img-alerta">';
              echo '<p data-i18n="pgDetalleBodega_error_p1">El servidor encontró un error interno y no pudo completar tu solicitud.</p>';
              echo '<p data-i18n="pgDetalleBodega_error_p2">Inténtalo de nuevo pasados unos minutos.</p>';
              echo '<p data-i18n="pgDetalleBodega_error_p3">Gracias.</p>';
              echo '</div>';
            }
          }
          ?>

          <div class="ta-center">
            <a onClick="window.close();" class="btn-bg1 mt-25 border-round"><span data-i18n="boton_cerrar">Cerrar</span></a>
          </div>
        </fieldset>
      </section>

      <!-- Aviso de uso de cookies -->
      <?php
      include "include/avisoDeCookies.inc.html";
      ?>

    </div>
  </main>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptBannerCookies.js"></script>
  <script src="../js/scriptIdioma.js"></script>

</body>

</html>