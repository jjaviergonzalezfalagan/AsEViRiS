/* 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
*/

// Gestión del banner de cookies
document.addEventListener("DOMContentLoaded", function () {
    const banner = document.getElementById("cookie-banner");
    const btn = document.getElementById("btn-accept-cookies");

    // Se verifica si existe la aceptación en localStorage
    if (!localStorage.getItem("cookies-aceptadas")) {
        banner.style.display = "flex";
    }
    btn.addEventListener("click", function () {

        // Se almacena la preferencia y se oculta el banner
        localStorage.setItem("cookies-aceptadas", "true");
        banner.style.display = "none";
    });
});

// Gestión de la preferencia y selección de idioma
$(document).ready(function () {

    // Se define el idioma por defecto: el almacenado en localStorage o "gl" en su defecto
    const savedLang = localStorage.getItem('preferredLang') || 'gl';

    // Se establece el select en el idioma actual
    $('#language-switcher').val(savedLang);

    // Se carga el idioma inicial
    loadLanguage(savedLang);

    // Se establece el evento al cambiar el selector de idioma
    $('#language-switcher').on('change', function () {
        const selectedLang = $(this).val();
        localStorage.setItem('preferredLang', selectedLang); // Guardar preferencia
        loadLanguage(selectedLang);
    });

    // Función para cargar y aplicar las traducciones
    function loadLanguage(lang) {
        $.getJSON(`../lang/${lang}.json`, function (data) {
            $('[data-i18n]').each(function () {
                const key = $(this).data('i18n');
                if (data[key]) {

                    // Si el elemento es un input o tiene placeholder es posible adaptarlo
                    $(this).text(data[key]);
                }
            });

            // Cambia el atributo lang del HTML para SEO/Accesibilidad (Opcional)
            $('html').attr('lang', lang);
        }).fail(function () {
            console.error("No se pudo cargar el archivo de idioma: " + lang);
        });
    }
})

// Función para crear una ventana emergente centrada
function abrirVentanaCentrada(url, titulo, ancho, alto) {
    const anchos = window.screen.width;
    const altos = window.screen.height - 125;
    const izquierda = (anchos / 2) - (ancho / 2);
    const arriba = (altos / 2) - (alto / 2);
    const opciones = `width=${ancho},height=${alto},top=${arriba},left=${izquierda},resizable=false,scrollbars=yes`;
    window.open(url, titulo, opciones);
}