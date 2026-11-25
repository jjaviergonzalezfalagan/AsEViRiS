/* 
 *  Proyecto del Ciclo Formativo de Grado Superior en Desarrollo de Aplicaciones Web
 *  J.Javier González Falagán
 *  ue47292@edu.xunta.gal
 *  CIFP A Carballeira-Marcos Valcárcel
 *  Ourense, diciembre 2026
*/

// Función para crear una ventana emergente centrada
function abrirVentanaCentrada(url, titulo, ancho, alto) {
    const anchos = window.screen.width;
    const altos = window.screen.height - 125;
    const izquierda = (anchos / 2) - (ancho / 2);
    const arriba = (altos / 2) - (alto / 2);
    const opciones = `width=${ancho},height=${alto},top=${arriba},left=${izquierda},resizable=false,scrollbars=yes`;
    window.open(url, titulo, opciones);
}