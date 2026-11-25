/* 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
*/

// Captura la carga del DOM
document.addEventListener("DOMContentLoaded", function () {

  // Definición de variables para mostrar/ocultar contraseña en la página cambiar contraseña
  const passwordActualItag = document.getElementById("password-actual-itag");
  const passwordActualInput = document.getElementById("password-actual-input");
  const nuevaPasswordItag = document.getElementById("nueva-password-itag");
  const nuevaPasswordInput = document.getElementById("nueva-password-input");
  const confirmarPasswordItag = document.getElementById("confirmar-password-itag");
  const confirmarPasswordInput = document.getElementById("confirmar-password-input");

  // Función para cambiar entre las opciones mostrar/ocultar contraseña en el campo "Contraseña actual"
  passwordActualItag.addEventListener("click", elemento => {
    if (elemento.target.classList.contains("bi-eye-fill")) {
      elemento.target.classList.remove("bi-eye-fill");
      elemento.target.classList.add("bi-eye-slash-fill");
      passwordActualInput.type = "text";
    } else {
      elemento.target.classList.remove("bi-eye-slash-fill");
      elemento.target.classList.add("bi-eye-fill");
      passwordActualInput.type = "password";
    }
  });

  // Función para cambiar entre las opciones mostrar/ocultar contraseña en el campo "Nueva contraseña"
  nuevaPasswordItag.addEventListener("click", elemento => {
    if (elemento.target.classList.contains("bi-eye-fill")) {
      elemento.target.classList.remove("bi-eye-fill");
      elemento.target.classList.add("bi-eye-slash-fill");
      nuevaPasswordInput.type = "text";
    } else {
      elemento.target.classList.remove("bi-eye-slash-fill");
      elemento.target.classList.add("bi-eye-fill");
      nuevaPasswordInput.type = "password";
    }
  });

  // Función para cambiar entre las opciones mostrar/ocultar contraseña en el campo "Confirmar nueva contraseña"
  confirmarPasswordItag.addEventListener("click", elemento => {
    if (elemento.target.classList.contains("bi-eye-fill")) {
      elemento.target.classList.remove("bi-eye-fill");
      elemento.target.classList.add("bi-eye-slash-fill");
      confirmarPasswordInput.type = "text";
    } else {
      elemento.target.classList.remove("bi-eye-slash-fill");
      elemento.target.classList.add("bi-eye-fill");
      confirmarPasswordInput.type = "password";
    }
  });
});