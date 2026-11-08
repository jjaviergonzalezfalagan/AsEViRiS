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
  <title data-i18n="pgAsociados_titulo">AsEViRiS / Asociados</title>
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
        <div id="bodega"></div>

        <!-- Menú de navegación vertical -->
        <div class="col-twenty order-tab-1">
          <div class="card-side card-side-navigation">
            <h2 class="no-margin ff-sackers fs-h2 fc-white">
              <span data-i18n="pgAsociados_menu_vertical_titulo">Asociados</span>
            </h2>
            <div class="linea-separacion fc-white"></div>
            <a href="asociadosDatosBodega.php#bodega">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgAsociados_menu_vertical_datos_bodega">Datos de la bodega</span></a>
            <a href="asociadosCambiarContrasenia.php#cambiaContrasenia">
              <span class="bstp-icon bi bi-chevron-compact-right"></span>
              <span data-i18n="pgAsociados_menu_vertical_cambiar_contrasenia">Cambiar contraseña</span></a>
            <a href="asociadosRecursos.php#documentacion">
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
        <?php
        $codBodega = $_SESSION["codBodega"] ?? '';
        $errorNombre = $_SESSION["errorNombre"] ?? '';
        $nombre = $_SESSION["nombre"] ?? '';
        $errorZona = $_SESSION["errorZona"] ?? '';
        $zona = $_SESSION["zona"] ?? '';
        $errorSuperficie =  $_SESSION["errorSuperficie"] ?? '';
        $superficie = $_SESSION["superficie"] ?? '';
        $errorProduccion =  $_SESSION["errorProduccion"] ?? '';
        $produccion = $_SESSION["produccion"] ?? '';
        $errorVariedadesDeUva =  $_SESSION["errorVariedadesDeUva"] ?? '';
        $variedadesDeUva = $_SESSION["variedadesDeUva"] ?? '';
        $errorMarcasComerciales =  $_SESSION["errorMarcasComerciales"] ?? '';
        $marcasComerciales = $_SESSION["marcasComerciales"] ?? '';
        $errorPremios = $_SESSION["errorPremios"] ?? '';
        $premios = $_SESSION["premios"] ?? '';
        $errorDireccion = $_SESSION["errorDireccion"] ?? '';
        $direccion = $_SESSION["direccion"] ?? '';
        $errorCodPostal = $_SESSION["errorCodPostal"] ?? '';
        $codPostal = $_SESSION["codPostal"] ?? '';
        $errorLocalidad = $_SESSION["errorLocalidad"] ?? '';
        $localidad =  $_SESSION["localidad"] ?? '';
        $errorProvincia = $_SESSION["errorProvincia"] ?? '';
        $provincia = $_SESSION["provincia"] ?? '';
        $errorWeb = $_SESSION["errorWeb"] ?? '';
        $web = $_SESSION["web"] ?? '';
        $errorEmail = $_SESSION["errorEmail"] ?? '';
        $email = $_SESSION["email"] ?? '';
        $errorTelefono =  $_SESSION["errorTelefono"] ?? '';
        $telefono = $_SESSION["telefono"] ?? '';
        $errorFax =  $_SESSION["errorFax"] ?? '';
        $fax = $_SESSION["fax"] ?? '';
        $errorPersonaContacto = $_SESSION["errorPersonaContacto"] ?? '';
        $personaContacto = $_SESSION["personaContacto"] ?? '';

        require "../app/conexionMySQL.php";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Captura de excepciones o errores en tiempo de ejecución
        try {
          $conexion = conexion();
          $sqlSelect = 'SELECT * FROM bodegas WHERE codBodega="' . htmlspecialchars($codBodega) . '"';
          $resultado = $conexion->query($sqlSelect);
          $datosBodega = $resultado->fetch_array();
          echo '<div class="col-eighty">';

          // Sección "Datos de la Bodega"
          echo '<div class="pb-67"> </div>';
          echo '<section class="contained">';
          echo '<h2 class="section-title ff-sackers"><span data-i18n="pgAsociados_seccion_area_contenidos_titulo">Datos de la Bodega</span></h2>';
          echo '<div class="mt-25 ml-130">';
          echo '<form name="datosBodega-form" class="datosBodega-form ta-center" action="../app/actualizaDatosBodega.php" method="POST">';
          echo '<fieldset class="primaryColor-fieldset">';
          echo '<img src="' . $datosBodega["rutaLogo"] . '" class="img-unheight mt-50 bdg-logo" alt="Adega Algueira S.L.">';
          echo '<small><span data-i18n="pgAsociados_seccion_datos_bodega_campos_obligatorios">Los campos marcados con * son obligatorios.</span></small>';

          // Tabla conteniendo los campos del formulario
          echo '<table class="col-wide ta-left">';

          // Campo "Código de bodega"
          echo '<tr><td class="datosBodega-form-td-1"><strong><label for="codBodega" data-i18n="pgAsociados_seccion_datos_bodega_codigo">Código de bodega: </label></strong></td><td class="datosBodega-form-td-2"><input type="text" class="bg-red fw-bold" id="codBodega" name="codBodega" value="' . $datosBodega["codBodega"] . '" disabled></td></tr>';

          // Campo "Nombre"
          if (!$errorNombre) {
            if (!isset($_SESSION["nombre"])) {
              $campoNombre = $datosBodega["nombre"];
            } else {
              $campoNombre = $nombre;
              unset($_SESSION["nombre"]);
            }
          } else {
            $campoNombre = '';
          }
          echo '<tr><td><strong><label for="nombre" data-i18n="pgAsociados_seccion_datos_bodega_nombre">Nombre:* </label></strong></td><td><input type="text" id="nombre" name="nombre" value="' . $campoNombre . '" title="Este campo admite hasta 100 caracteres. No admite símbolos ni caracteres especiales." pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ .,:;\"\r\nºª()_-]+$" maxlength="100" autocomplete="on" required></td></tr>';
          if ($errorNombre) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_2">No puede estar vacío ni contener más de 100 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Localización"
          if (!$errorZona) {
            if (!isset($_SESSION["zona"])) {
              $campoZona = $datosBodega["zona"];
            } else {
              $campoZona = $zona;
              unset($_SESSION["zona"]);
            }
          } else {
            $campoZona = '';
          }
          echo '<tr><td><strong><label for="zona" data-i18n="pgAsociados_seccion_datos_bodega_localizacion">Localización: </label></strong></td><td><input type="text" class="datosBodega-form-input" id="zona" name="zona" value="' .  $campoZona . '" title="Este campo admite hasta 255 caracteres. No admite símbolos ni caracteres especiales." maxlength="255" autocomplete="on"></td></tr>';
          if ($errorZona) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_6">No puede contener más de 255 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Superficie"
          if (!$errorSuperficie) {
            if (!isset($_SESSION["superficie"])) {
              $campoSuperficie = $datosBodega["superficie"];
            } else {
              $campoSuperficie = $superficie;
              unset($_SESSION["superficie"]);
            }
          } else {
            $campoSuperficie = '';
          }
          echo '<tr><td><strong><label for="superficie" data-i18n="pgAsociados_seccion_datos_bodega_superficie">Superficie (ha): </label></strong></td><td><input type="text" class="datosBodega-form-input" id="superficie" name="superficie" value="' . $campoSuperficie . '" title="Este campo admite hasta 50 caracteres. No admite símbolos ni caracteres especiales." maxlength="50" autocomplete="on"></td></tr>';
          if ($errorSuperficie) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_7">No puede contener más de 50 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Producción"
          if (!$errorProduccion) {
            if (!isset($_SESSION["produccion"])) {
              $campoProduccion = $datosBodega["produccion"];
            } else {
              $campoProduccion = $produccion;
              unset($_SESSION["produccion"]);
            }
          } else {
            $campoProduccion = '';
          }
          echo '<tr><td><strong><label for="produccion" data-i18n="pgAsociados_seccion_datos_bodega_produccion">Producción: </label></strong></td><td><input type="text" class="datosBodega-form-input" id="produccion" name="produccion" value="' . $campoProduccion . '" title="Este campo admite hasta 50 caracteres. No admite símbolos ni caracteres especiales." maxlength="50" autocomplete="on"></td></tr>';
          if ($errorProduccion) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_7">No puede contener más de 50 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Variedades de uva"
          if (!$errorVariedadesDeUva) {
            if (!isset($_SESSION["variedadesDeUva"])) {
              $campoVariedadesDeUva = $datosBodega["variedadesDeUva"];
            } else {
              $campoVariedadesDeUva = $variedadesDeUva;
              unset($_SESSION["variedadesDeUva"]);
            }
          } else {
            $campoVariedadesDeUva = '';
          }
          echo '<tr><td><strong><label for="variedadesDeUva" data-i18n="pgAsociados_seccion_datos_bodega_variedades_uva">Variedades de uva: </label></strong></td><td><textarea id="variedadesDeUva" name="variedadesDeUva" class="datosBodega-form-input" title="Este campo admite hasta 500 caracteres. No admite símbolos ni caracteres especiales." maxlength="500" autocomplete="on">' . $campoVariedadesDeUva . '</textarea></td></tr>';
          if ($errorVariedadesDeUva) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_8">No puede contener más de 500 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_15">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Marcas comerciales"
          if (!$errorMarcasComerciales) {
            if (!isset($_SESSION["marcasComerciales"])) {
              $campoMarcasComerciales = $datosBodega["marcasComerciales"];
            } else {
              $campoMarcasComerciales = $marcasComerciales;
              unset($_SESSION["marcasComerciales"]);
            }
          } else {
            $campoMarcasComerciales = '';
          }
          echo '<tr><td><strong><label for="marcasComerciales" data-i18n="pgAsociados_seccion_datos_bodega_marcas_comerciales">Marcas comerciales: </label></strong></td><td><textarea class="datosBodega-form-input" id="marcasComerciales" name="marcasComerciales" title="Este campo admite hasta 500 caracteres. No admite símbolos ni caracteres especiales." maxlength="500" autocomplete="on">' . $campoMarcasComerciales . '</textarea></td></tr>';
          if ($errorMarcasComerciales) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_8">No puede contener más de 500 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_15">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Premios"
          if (!$errorPremios) {
            if (!isset($_SESSION["premios"])) {
              $campoPremios = $datosBodega["premios"];
            } else {
              $campoPremios = $premios;
              unset($_SESSION["premios"]);
            }
          } else {
            $campoPremios = '';
          }
          echo '<tr><td><strong><label for="premios" data-i18n="pgAsociados_seccion_datos_bodega_premios">Premios: </label></strong></td><td><textarea class="datosBodega-form-input" id="premios" name="premios" title="Este campo admite hasta 500 caracteres. No admite símbolos ni caracteres especiales." maxlength="500" autocomplete="on">' . $campoPremios . '</textarea></td></tr>';
          if ($errorPremios) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_8">No puede contener más de 500 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_15">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Dirección"
          if (!$errorDireccion) {
            if (!isset($_SESSION["direccion"])) {
              $campoDireccion = $datosBodega["direccion"];
            } else {
              $campoDireccion = $direccion;
              unset($_SESSION["direccion"]);
            }
          } else {
            $campoDireccion = '';
          }
          echo '<tr><td><strong><label for="direccion" data-i18n="pgAsociados_seccion_datos_bodega_direccion">Dirección: </label></strong></td><td><input type="text" id="direccion" name="direccion" value="' . $campoDireccion . '" title="Este campo admite hasta 255 caracteres. No admite símbolos ni caracteres especiales." pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ .,:;\"\r\nºª()_-]+$" maxlength="255" autocomplete="on" required></td></tr>';
          if ($errorDireccion) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_3">No puede estar vacío ni contener más de 255 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Código Postal"
          if (!$errorCodPostal) {
            if (!isset($_SESSION["codPostal"])) {
              $campoCodPostal = $datosBodega["codPostal"];
            } else {
              $campoCodPostal = $codPostal;
              unset($_SESSION["codPostal"]);
            }
          } else {
            $campoCodPostal = '';
          }
          echo '<tr><td><strong><label for="codPostal" data-i18n="pgAsociados_seccion_datos_bodega_cPostal">Código postal: </label></strong></td><td><input type="text" id="codPostal" name="codPostal" value="' . $campoCodPostal . '" title="Este campo admite hasta 5 caracteres numéricos." pattern="^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$" minlength="5" maxlength="5" autocomplete="on" required></td></tr>';
          if ($errorCodPostal) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_4">No puede estar vacío y tiene que contener 5 caracteres numéricos.</span></small></td></tr>';
          }

          // Campo "Localidad"
          if (!$errorLocalidad) {
            if (!isset($_SESSION["localidad"])) {
              $campoLocalidad = $datosBodega["localidad"];
            } else {
              $campoLocalidad = $localidad;
              unset($_SESSION["localidad"]);
            }
          } else {
            $campoLocalidad = '';
          }
          echo '<tr><td><strong><label for="localidad" data-i18n="pgAsociados_seccion_datos_bodega_localidad">Localidad: </label></strong></td><td><input type="text" id="localidad" name="localidad" value="' . $campoLocalidad . '" title="Este campo admite hasta 255 caracteres. No admite números, símbolos ni caracteres especiales." pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜçÇàèòÀÈÒíïÍÏl·l\s\'\-\/\.,\(\)]+$" maxlength="255" autocomplete="on" required></td></tr>';
          if ($errorLocalidad) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_3">No puede estar vacío ni contener más de 255 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Provincia"
          if (!$errorProvincia) {
            if (!isset($_SESSION["provincia"])) {
              $campoProvincia = $datosBodega["provincia"];
            } else {
              $campoProvincia = $provincia;
              unset($_SESSION["provincia"]);
            }
          } else {
            $campoProvincia = '';
          }
          echo '<tr><td><strong><label for="provincia" data-i18n="pgAsociados_seccion_datos_bodega_provincia">Provincia: </label></strong></td><td><input type="text" id="provincia" name="provincia" value="' . $campoProvincia . '" title="Este campo admite hasta 255 caracteres. No admite números, símbolos ni caracteres especiales." pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜçÇàèòÀÈÒíïÍÏl·l\s\'\-\/\.,\(\)]+$" maxlength="255" autocomplete="on" required></td></tr>';
          if ($errorProvincia) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_3">No puede estar vacío ni contener más de 255 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          // Campo "Web"
          if (!$errorWeb) {
            if (!isset($_SESSION["web"])) {
              $campoWeb = $datosBodega["web"];
            } else {
              $campoWeb = $web;
              unset($_SESSION["web"]);
            }
          } else {
            $campoWeb = '';
          }
          echo '<tr><td><strong><label for="web" data-i18n="pgAsociados_seccion_datos_bodega_web">WEB: </label></strong></td><td><input type="url" class="datosBodega-form-input" id="web" name="web" value="' . $campoWeb . '" title="Este campo admite hasta 255 caracteres." pattern="^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$" maxlength="255" autocomplete="on" required></td></tr>';
          if ($errorWeb) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_14">Admite direcciones de Internet válidas de hasta 255 caracteres con el formato: http(s)://dominio.extensión".</span></small></td></tr>';
          }

          // Campo "email"
          if (!$errorEmail) {
            if (!isset($_SESSION["email"])) {
              $campoEmail = $datosBodega["email"];
            } else {
              $campoEmail = $email;
              unset($_SESSION["email"]);
            }
          } else {
            $campoEmail = '';
          }
          echo '<tr><td><strong><label for="email" data-i18n="pgAsociados_seccion_datos_bodega_email">eMail: </label></strong></td><td><input type="email" id="email" name="email" value="' . $campoEmail . '" title="Este campo admite direcciones de correo válidas de entre 6 y 255 caracteres con el formato: ' . '"nombre@dominio.extensión"' . ' pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,6}" maxlength="255" autocomplete="on" required></td></tr>';
          if ($errorEmail) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_11">No puede estar vacío.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_12">Admite direcciones de correo válidas de entre 6 y 255 caracteres con el formato: "nombre@dominio.extensión".</span></small></td></tr>';
          }

          // Campo "Teléfono"
          if (!$errorTelefono) {
            if (!isset($_SESSION["telefono"])) {
              $campoTelefono = $datosBodega["telefono"];
            } else {
              $campoTelefono = $telefono;
              unset($_SESSION["telefono"]);
            }
          } else {
            $campoTelefono = '';
          }
          echo '<tr><td><strong><label for="telefono" data-i18n="pgAsociados_seccion_datos_bodega_telefono">Teléfono:* </label></strong></td><td><input type="tel" id="telefono" name="telefono" value="' . $campoTelefono . '" title="Este campo admite números de teléfono válidos en España." pattern="^(?:(?:\+|00)34)?[6789]\d{8}$" maxlength="13" autocomplete="on" required></td></tr>';
          if ($errorTelefono) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_11">No puede estar vacío.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_13">Únicamente admite números de teléfono válidos en España.</span></small></td></tr>';
          }

          // Campo "Fax"
          if (!$errorFax) {
            if (!isset($_SESSION["fax"])) {
              $campoFax = $datosBodega["fax"];
            } else {
              $campoFax = $fax;
              unset($_SESSION["fax"]);
            }
          } else {
            $campoFax = '';
          }
          echo '<tr><td><strong><label for="fax" data-i18n="pgAsociados_seccion_datos_bodega_fax">Fax: </label></strong></td><td><input type="tel" class="datosBodega-form-input" id="fax" name="fax" value="' . $campoFax . '" title="Este campo admite números de teléfono válidos en España." maxlength="13" autocomplete="on"></td></tr>';
          if ($errorFax) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_13">Únicamente admite números de teléfono válidos en España.</span></small></td></tr>';
          }

          // Campo "Persona de contacto"
          if (!$errorPersonaContacto) {
            if (!isset($_SESSION["personaContacto"])) {
              $campoPersonaContacto = $datosBodega["personaContacto"];
            } else {
              $campoPersonaContacto = $personaContacto;
              unset($_SESSION["personaContacto"]);
            }
          } else {
            $campoPersonaContacto = '';
          }
          echo '<tr><td><strong><label for="personaContacto" data-i18n="pgAsociados_seccion_datos_bodega_contacto">Persona de contacto: </label></strong></td><td><input type="text" id="personaContacto" name="personaContacto" value="' . $campoPersonaContacto . '" title="Este campo admite hasta 255 caracteres. No admite símbolos ni caracteres especiales." pattern="^([A-Za-zÑñÁáÉéÍíÓóÚú]+[\'\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+[\'\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$" maxlength="255" autocomplete="on" required></td></tr>';
          if ($errorPersonaContacto) {
            echo '<tr><td></td><td><img src="../images/useranonyme-red-10270682.svg" class="img-error-small flo-left ml-20" alt="Símbolo de alerta"><small><span class="flo-left fc-red ml-5" data-i18n="pgAsociados_seccion_datos_bodega_error_1">Revisa este campo.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_3">No puede estar vacío ni contener más de 255 caracteres.</span><br><span class="flo-left fc-red ml-42" data-i18n="pgAsociados_seccion_datos_bodega_error_10">No admite símbolos ni caracteres especiales.</span></small></td></tr>';
          }

          echo '</table>';
          echo '<div class="ta-center">';
          echo '<button type="submit" id="actualizarDatosBodega" class="btn-bg1 border-round mt-20" name="actualizarDatosBodega" value="actualizarDatosBodega" data-i18n="boton_actualizar">Actualizar</input>';
          echo '</div>';
          echo '</fieldset>';
          echo '</form>';
          echo '</div>';
          echo '</section>';
          $resultado->free();
          $conexion->close();

          // Procesado de las excepciones o errores capturados en tiempo de ejecución
        } catch (mysqli_sql_exception $error) {

          // ÁREA DE CONTENIDOS en caso de fallo en el acceso a la base de datos
          echo '<div class="col-eighty">';
          echo '<section class="contained">';
          echo '<h2 class="section-title ff-sackers"><span data-i18n="pgAsociados_seccion_area_contenidos_titulo">Asociados</span></h2>';
          echo '<div class="mt-40 ml-130">';
          echo '<div id="contenedorError" class="ta-center">';
          echo '<img src="../images/openicons-attention-98513.svg" class="img-alerta">';
          echo '<p data-i18n="pgAsociados_error_p1">El servidor encontró un error interno y no pudo completar tu solicitud.</p>';
          echo '<p data-i18n="pgAsociados_error_p2">Inténtalo de nuevo pasados unos minutos.</p>';
          echo '<p data-i18n="pgAsociados_error_p3">Gracias.</p>';
          echo '</div>';
          echo '</div>';
          echo '</section>';
          echo '</div>';
        }
        ?>

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