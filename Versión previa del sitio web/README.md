>>> Estructura de carpetas y archivos del sitio web <<<
Carpeta raíz “aseviris” de la que dependen directamente las siguientes carpetas:
- app: Contiene los archivos necesarios para la ejecución de procesos en el lado
  del servidor. Esta parte actúa como intermediaria, recibe las peticiones del
  usuario, consulta al modelo y selecciona la vista adecuada para responder. Dentro
  del patrón Modelo Vista Controlador (MVC), los archivos ubicados aquí estarían
  relacionados con la parte del Controlador.
- content: Contiene los archivos necesarios para formar la interfaz gráfica o capa
  de presentación que muestra los datos al usuario. Dentro del patrón Modelo Vista
  Controlador (MVC), los archivos ubicados aquí estarían relacionados con la parte
  de la Vista.
  Esta carpeta contiene a su vez la carpeta:
    - include: Contiene archivos con fragmentos de código compartido por varias páginas
      y serán incluidos en ellas mediante el uso de la sentencia "include" de PHP.
- css: Contiene los archivos de estilos CSS.
  Esta carpeta contiene a su vez la carpeta:
    - fonts: Contiene los archivos de fuentes True Type utilizadas en el sitio.
- images: Contiene los recursos de imágenes.
- js: Contiene la librería jquery-4.0.0.min.js y los scripts de JavaScript.
- lang: Contiene los archivos json con las traducciones de idiomas.
- video: Contiene los recursos de video.
