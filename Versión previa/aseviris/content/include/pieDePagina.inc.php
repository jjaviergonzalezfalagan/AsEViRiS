<footer class="fc-white">
  <div class="contained row flex-just-center">

    <!-- Sección "Aseviris" -->
    <div class="col-quad">
      <h3 class="ff-sackers" data-i18n="footer_seccion_asociacion_titulo">
        AsEViRiS </h3>
      <p class="ta-left" data-i18n="footer_seccion_asociacion_texto">
        La Asociación de Empresarios del Vino de la Ribeira Sacra es una asociación sin ánimo de lucro que nace con la
        finalidad de defender los intereses de las bodegas acogidas a la Denominación de Origen Ribeira Sacra en general
        y los de sus miembros asociados en particular. </p>
      <p>
        <small>
          <a class="aviso-legal" href="avisoLegal.php"
            onclick="abrirVentanaCentrada(this.href, 'Aviso Legal', 950, 600); return false;">
            <span data-i18n="footer_seccion_asociacion_aviso_legal">
              - Aviso Legal y Política de Privacidad - </span></a>
        </small>
      </p>
    </div>

    <!-- Sección "Contacta con nosotros" -->
    <div class="col-quad">
      <h3 class="ff-sackers" data-i18n="footer_seccion_contacta_titulo"> Contacta con nosotros </h3>
      <p class="display-block fc-white icon-link-static mt-10 mb-10">
        <i class="bi bi-telephone-fill"></i> +34 644 711 166
      </p>
      <a href="mailto:info@aseviris.ddns.net" class="display-block fc-white fc-blue icon-link mt-10 mb-10">
        <i class="bi bi-envelope-fill"></i> info.aseviris@gmail.com </a>
      <a href="https://www.openstreetmap.org/?mlat=42.52525&amp;mlon=-7.50881#map=13/42.52513/-7.50898" class="display-block fc-white fc-blue icon-link mt-10 mb-10" target="_blank">
        <i class="bi bi-geo-alt-fill"></i> 27400 Monforte de Lemos </a>
      <a href="https://www.facebook.com/?locale=es_ES" target="_blank"
        class="display-block fc-white fc-blue icon-link mt-10 mb-10">
        <i class="bi bi-facebook" title="Síguenos en facebook"></i>
        <span data-i18n="footer_seccion_contacta_siguenos_facekook"> Síguenos en Facebook </span></a>
      <a href="https://www.instagram.com" target="_blank"
        class="display-block fc-white fc-blue icon-link mt-10 mb-10">
        <i class="bi bi-instagram" title="Síguenos en instagram"></i>
        <span data-i18n="footer_seccion_contacta_siguenos_instagram"> Síguenos en Instagram </span></a>
      <a href="https://twitter.com/?lang=es" target="_blank"
        class="display-block fc-white fc-blue icon-link mt-10 mb-10">
        <i class="bi bi-twitter-x" title="Síguenos en twitter"></i>
        <span data-i18n="footer_seccion_contacta_siguenos_twitter"> Síguenos en X </span></a>
      <a href="https://www.youtube.com" target="_blank" class="display-block fc-white fc-blue icon-link mt-10 mb-10">
        <i class="bi bi-youtube" title="Síguenos en youtube"></i>
        <span data-i18n="footer_seccion_contacta_siguenos_youtube"> Síguenos en YouTube </span></a>
    </div>

    <!-- Sección "Horario de oficina" -->
    <div class="col-quad">
      <h3 class="ff-sackers" data-i18n="footer_seccion_horario_titulo"> Horario de oficina </h3>
      <p class="mt-10 mb-10 fw-bold">
        <span data-i18n="footer_seccion_horario_lunes_viernes"> Lunes a Viernes: </span>
        <span class="fw-normal display-block"> 09:00 - 14:00 </span>
        <span class="fw-normal display-block"> 16:00 - 19:00 </span>
      </p>
      <p class="mt-10 mb-10 fw-bold">
        <span data-i18n="footer_seccion_horario_sabado"> Sábado: </span>
        <span class="fw-normal display-block"> 9:00 - 13:00 </span>
      </p>
      <p class="mt-10 mb-10 fw-bold">
        <span data-i18n="footer_seccion_horario_domingo"> Domingo: </span>
        <span class="fw-normal display-block" data-i18n="footer_seccion_horario_cerrado"> Cerrado </span>
      </p>
    </div>

    <!-- Sección "Enlaces Útiles" -->
    <div class="col-quad">
      <h3 class="ff-sackers" data-i18n="footer_seccion_enlaces_titulo"> Enlaces útiles </h3>
      <div class="col-enlaces-utiles">
        <a href="index.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_inicio"> Inicio </span></a>
        <a href="asociacion.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_asociacion"> La Asociación </span></a>
        <a href="actualidad.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_actualidad"> Actualidad </span></a>
        <a href="denominacion.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_denominacion"> Denominación </span></a>
        <a href="bodegas.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_bodegas"> Bodegas </span></a>
        <a href="enoturismo.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_enoturismo"> Enoturismo </span></a>

        <?php
        if (isset($_SESSION["codBodega"])) {
          echo '<a href="asociadosDatosBodega.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_asociados"> Asociados </span></a>';
        }
        ?>

        <a href="contacto.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_contacto"> Contacto </span></a>

        <?php
        if (!isset($_SESSION["codBodega"])) {
          echo '<a href="acceso.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_iniciar_sesion"> Entrar </span></a>';
        } else {
          echo '<a href="logout.php" class="display-block fc-white fc-blue mt-5 mb-5">
          <i class="bi bi-chevron-compact-right"></i>
          <span data-i18n="footer_seccion_enlaces_cerrar_sesion"> Salir </span></a>';
        }
        ?>

      </div>
    </div>

    <!-- Sección "Validador CSS" -->
    <a id="ccs-validator" class="mb-5" href="https://jigsaw.w3.org/css-validator/check/referer" target="_blank"
      rel="noopener">
      <img class="ccs-validator-img" src="https://jigsaw.w3.org/css-validator/images/vcss-blue" alt="¡CSS Válido!">
    </a>
  </div>

  <!-- Sección "Copyright / Autor" -->
  <div id="copyright" class="copy ta-center fc-white">
    <div id="autor">
      <small>
        &copy;
        <span data-i18n="footer_seccion_copyright_autor"> J.Javier González Falagán </span>
        -
        <span data-i18n="footer_seccion_copyright_email"> ue47292@edu.xunta.gal </span>
        <br>
        <span data-i18n="footer_seccion_copyright_proyecto"> Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web </span>
        <br>
        <span data-i18n="footer_seccion_copyright_centro"> CIFP A Carballeira-Marcos Valcárcel </span>
        -
        <span data-i18n="footer_seccion_copyright_ubicacion"> Ourense </span>
        -
        <span data-i18n="footer_seccion_copyright_fecha"> diciembre 2026 </span>
      </small>
    </div>
  </div>
</footer>