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