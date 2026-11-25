<div id="suscribete" class="pb-67"></div>
<div class="subscribe subscribe-background bg-primary-foot">
  <div class="contained row ta-center display-flex-center">
    <div class="col-full fc-white">
      <span class="suscribe-form-title" data-i18n="suscripcion_titulo">Suscríbete a nuestro boletín de noticias</span>
    </div>
    <div class="col-eighty">
      <form name="suscribe-form" class="suscribe-form" action="../app/procesaSuscripcion.php" method="POST">
        <fieldset class="suscribe-form-fieldset">
          <div class="mt-10 ta-right">
            <label for="subscribe-nombre" class="fs-italic" data-i18n="suscripcion_nombre">Escribe aquí tu nombre:
            </label>
            <input type="text" id="subscribe-nombre" name="subscribe-nombre" class="ml-10 mr-10" value="<?php echo $nombre; ?>" title="Este campo admite hasta 255 caracteres. No admite números, símbolos ni caracteres especiales." pattern="^([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$" minlength="2" maxlength="255" autocomplete="on" required>

            <?php
            if ($errorNombre) {
              echo '<div class="col-full no-padding display-flex-end">';
              echo '<div class="col-balance mt-10 mr-10 no-padding br-15 bg-white fc-black ta-left">';
              echo '<small><p class="ml-5"><img src="../images/useranonyme-red-10270682.svg" class="img-error-small" alt="Símbolo de alerta"><span data-i18n="suscripcion_error_1"> Revisa este campo. No puede estar vacío.</span></p>
              <p class="ml-25" data-i18n="suscripcion_error_2">Admite hasta 255 caracteres. No admite números, símbolos ni caracteres especiales.</p></small>';
              echo '</div>';
              echo '</div>';
            }
            ?>

          </div>
          <div class="mt-10 ta-right">
            <label for="subscribe-email" class="fs-italic" data-i18n="suscripcion_email">Escribe aquí tu email: </label>
            <input type="email" id="subscribe-email" name="subscribe-email" class="ml-10 mr-10" value="<?php echo $email; ?>" title='Este campo admite direcciones de correo válidas de entre 6 y 255 caracteres con el formato: "nombre@dominio.extensión".' pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,6}" minlength="6" maxlength="255" autocomplete="on" required>

            <?php
            if ($errorEmail) {
              echo '<div class="col-full no-padding display-flex-end">';
              echo '<div class="col-balance mt-10 mr-10 no-padding br-15 bg-white fc-black ta-left">';
              echo '<small><p class="ml-5"><img src="../images/useranonyme-red-10270682.svg" class="img-error-small" alt="Símbolo de alerta"><span data-i18n="suscripcion_error_1"> Revisa este campo. No puede estar vacío.</span></p>
              <p class="ml-25" data-i18n="suscripcion_error_3">Admite direcciones de correo válidas de entre 6 y 255 caracteres con el formato: "nombre@dominio.extensión".</p></small>';
              echo '</div>';
              echo '</div>';
              $errorEmail = false;
            }
            ?>

            <div class="mt-10 ta-right">
              <button type="submit" class="btn-suscripcion btn-bg2 border-round ml-10 mr-10"
                data-i18n="suscripcion_boton">Suscríbete</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>