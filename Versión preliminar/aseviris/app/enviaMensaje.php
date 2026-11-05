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
  <meta name="Title" content="Asociación de Empresarios del Vino de la Ribeira Sacra">
  <meta name="Author" content="J.Javier González Falagán">
  <meta name="description" content="Página de la Asociación de Empresarios del Vino de la Ribeira Sacra">
  <meta name="Keywords" content="Ribeira Sacra, Asociación de Empresarios, Vino">
  <meta name="Language" content="Spanish">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title data-i18n="pgEnviaMensaje_titulo">AsEViRiS / Envía mensaje</title>
  <link rel="preload" href="../css/styles.css" as="style">
  <link rel="preload" href="../css/bootstrap-icons.css" as="style">
  <link rel="stylesheet" type="text/css" media="all" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap-icons.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
</head>

<body>

  <!-- Mensaje de confirmación para el usuario de envío del mensaje -->
  <dialog id="mensajeOk" class="mensajeOk">
    <img src="../images/useranonyme-check-10270681.svg" class="img-confirmacion" alt="Símbolo de confirmación">
    <p data-i18n="enviaMensaje_mensajeOk_1">Tu mensaje se ha enviado correctamente.</p>
    <p data-i18n="enviaMensaje_mensajeOk_2">En breve nos pondremos en contacto contgo.</p>
    <p data-i18n="enviaMensaje_mensajeOk_3">Gracias por contactar con nosotros.</p>
    <div class="ta-center">
      <button id="btnmensajeOkAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

  <!-- Mensaje de error para el usuario en caso de error en el envío del mensaje -->
  <dialog id="mensajeError" class="mensajeError">
    <img src="../images/openicons-attention-98513.svg" class="img-alerta" alt="Símbolo de alerta">
    <p data-i18n="enviaMensaje_mensajeDeError_1">El servidor encontró un error interno y no pudo enviar tu mensaje.</p>
    <p data-i18n="enviaMensaje_mensajeDeError_2">Inténtalo de nuevo en unos minutos o envía tu consulta a info.aseviris@gmail.com.</p>
    <p data-i18n="enviaMensaje_mensajeDeError_3">Gracias.</p>
    <div class="ta-center">
      <button id="btnmensajeErrorAceptar" class="btn-bg1 border-round mt-25" data-i18n="boton_aceptar">Aceptar</button>
    </div>
  </dialog>

  <?php
  if (!isset($_SESSION)) {
    session_start();
  }

  require "../app/Exception.php";
  require "../app/PHPMailer.php";
  require "../app/SMTP.php";

  // Importar las clases necesarias al espacio de nombres global
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  // Instanciar la clase; pasar "true" habilita las excepciones
  $mail = new PHPMailer(true);
  if (isset($_POST['message-enviar'])) {

    // Captura de excepciones o errores en tiempo de ejecución
    try {

      // Configuración del Servidor SMTP
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                  // "DEBUG_SERVER" para depurar errores
      $mail->isSMTP();                                     // Definir que se usará SMTP
      $mail->Host       = 'smtp.gmail.com';                // Servidor SMTP de salida
      $mail->SMTPAuth   = true;                            // Habilitar autenticación SMTP
      $mail->Username   = 'infoaseviris@gmail.com';        // Usuario SMTP (tu correo)
      $mail->Password   = 'cowmjyflemjkrlkt';              // Clave de aplicación)
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Cifrado TLS implícito
      $mail->Port       = 587;                             // Puerto TCP (587 para TLS / 465 para SSL)

      // Destinatarios
      $user_name = $mail->Username;
      $from_name = "Info AsEViRiS";
      $address_to = "infoaseviris@gmail.com";
      $mail->setFrom($user_name, $from_name);
      $mail->addAddress($address_to);                      // Correo del receptor

      // Cuerpo del correo
      $mail->isHTML(true);                                 // Configurar formato en HTML
      $mail->Subject = $_POST['message-asunto'];
      $mail->Body .= "<h4 style='color:#901d1d;'>- Persona de contacto -</h4>";
      $mail->Body .= "<p>" . $_POST['message-nombre'] . ".</p>";
      $mail->Body .= "<h4 style='color:#901d1d;'>- eMail -</h4>";
      $mail->Body .= "<p>" . $_POST['message-email'] . "</p>";
      $mail->Body .= "<h4 style='color:#901d1d;'>- Teléfono -</h4>";
      $mail->Body .= "<p>" . $_POST['message-telefono'] . ".</p>";
      $mail->Body .= "<h4 style='color:#901d1d;'>- Consulta -</h4>";
      $mail->Body .= "<p>" . $_POST['message-mensaje'] . "</p>";
      $mail->Body .= "<h4 style='color:#901d1d;'>- Fecha y hora del envío -</h4>";
      $mail->Body .= "<p>" . date("d-m-Y H:i:s") . ".</p>";
      //$mail->AltBody = 'Este es el texto plano para clientes de correo que no soportan HTML.';

      // Envío del correo y mensaje de confirmación para el usuario de envío del mensaje
      $mail->send();
      echo '<script>';
      echo 'const dialog = document.getElementById("mensajeOk");';
      echo 'const btnAceptar = document.getElementById("btnmensajeOkAceptar");';
      echo 'dialog.showModal();';
      echo 'btnAceptar.addEventListener("click", () => {';
      echo 'dialog.close();';
      echo 'window.location.href = "../content/contacto.php";';
      echo '});';
      echo '</script>';

      // Captura de excepciones o errores en tiempo de ejecución
    } catch (Exception $error) {

      // Mensaje de error para el usuario en caso de error en el envío del mensaje
      echo '<script>';
      echo 'const dialog = document.getElementById("mensajeError");';
      echo 'const btnAceptar = document.getElementById("btnmensajeErrorAceptar");';
      echo 'dialog.showModal();';
      echo 'btnAceptar.addEventListener("click", () => {';
      echo 'dialog.close();';
      echo 'window.location.href = "../content/contacto.php";';
      echo '});';
      echo '</script>';
    }
  };
  ?>

  <!-- Carga de Scripts -->
  <script src="../js/jquery-4.0.0.min.js"></script>
  <script src="../js/scriptGeneral.js"></script>

</body>

</html>