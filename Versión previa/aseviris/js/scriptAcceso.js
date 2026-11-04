/* 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
*/

// Captura la carga del DOM
document.addEventListener("DOMContentLoaded", function () {

  // Definición de variables para mostrar/ocultar contraseña en la página de acceso
  const contraseniaItag = document.getElementById("contrasenia-itag");
  const contraseniaInput = document.getElementById("contrasenia-input");

  // Función para cambiar entre las opciones mostrar/ocultar contraseña en el campo "Contraseña"
  contraseniaItag.addEventListener("click", elemento => {
    if (elemento.target.classList.contains("bi-eye-fill")) {
      elemento.target.classList.remove("bi-eye-fill");
      elemento.target.classList.add("bi-eye-slash-fill");
      contraseniaInput.type = "text";
    } else {
      elemento.target.classList.remove("bi-eye-slash-fill");
      elemento.target.classList.add("bi-eye-fill");
      contraseniaInput.type = "password";
    }
  });
});