-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2026 a las 22:59:19
-- Versión del servidor: 10.11.16-MariaDB
-- Versión de PHP: 8.3.36


-- --------------------------------------------------------

--
-- Creación de la BBDD aseviris
--

DROP DATABASE IF EXISTS aseviris;
CREATE DATABASE aseviris;
USE aseviris;

-- 
-- Creación de la cuenta de usuario de la BBDD
--

DROP USER IF EXISTS aseviris;
CREATE USER 'aseviris'@'%' IDENTIFIED BY 'zUk%:%)G[4WW(%y317:kZ';
GRANT ALL PRIVILEGES ON aseviris.* TO 'aseviris'@'%';

-- --------------------------------------------------------


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aseviris`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `idBodega` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codBodega` varchar(9) NOT NULL,
  `zona` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `codPostal` varchar(5) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL,
  `telefono` varchar(13) NOT NULL,
  `fax` varchar(13) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `personaContacto` varchar(255) NOT NULL,
  `superficie` varchar(50) DEFAULT NULL,
  `produccion` varchar(50) DEFAULT NULL,
  `marcasComerciales` varchar(500) DEFAULT NULL,
  `variedadesDeUva` varchar(500) DEFAULT NULL,
  `premios` varchar(500) DEFAULT NULL,
  `rutaLogo` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`idBodega`, `nombre`, `codBodega`, `zona`, `direccion`, `codPostal`, `localidad`, `provincia`, `latitud`, `longitud`, `telefono`, `fax`, `email`, `web`, `personaContacto`, `superficie`, `produccion`, `marcasComerciales`, `variedadesDeUva`, `premios`, `rutaLogo`, `contrasenia`) VALUES
(1, 'Adega Algueira S.L.', 'aalg.5814', 'Subzona de Amandi', 'Francos - Doade', '27424', 'Sober', 'Lugo', '42.417766', '-7.474619', '982410299', '982410300', 'info@adegaalgueira.com', 'https://www.adegaalgueira.com', 'Pilar Montero Santiago', '14 Hectáreas', '70.000 botellas', 'Algueira, Algueira Amaral, Algueira Anadelia, Algueira Carravel, Algueira Castagaia, Algueira Cortezada, Algueira Escalada, Algueira Finca Cortezada, Algueira Fincas, Algueira Homenaje, Algueira Pizarra, Algueira Risco, Algueira Serradelo, Brandan, Carballo Gallego y Medialeva.', 'Mencía, Merenzao, Sousón, Caíño, Garnacha, Treixadura, Godello, Albariño y Albarello.', 'En 2023, \"Premio Bacelo de Plata\" de la Fundación Álvaro de las Casas, \"por la utilización de la lengua gallega en el etiquetaje y su apuesta por la elaboración de vinos de calidad\". En 2020, Premio Mencía barrica 17 (otras añadas) en la XVI Cata de los vinos de la Ribeira Sacra.', '../images/adegasImage1.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(2, 'Adega Cachín, SC', 'acac.5612', 'Subzona de Ribeiras do Sil', 'Abeleda', '32764', 'A Teixeira', 'Ourense', '42.417659', '-7.474512', '988501800', '988501801', 'info@adegacachin.com', 'https://www.adegacachin.com', 'Carolina Ruiz Moya', '5 Hectáreas', '23.000 litros', 'Peza do Rei y Do Pereira.', 'Mencía, Brancellao, Treixadura, Godello y Albariño.', 'En 2024, 2º Premio en \"Brancos\" en la Cata dos viños da Ribeira Sacra. En 2023, Premio a la \"Excelencia\" por los vinos \"Mencía barrica 2020\" y \"Mencía 2021\".', '../images/adegasImage2.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(3, 'Adega do Mollón S.L.', 'amol.5612', 'Subzona de Ribeiras do Sil', 'Casanova, Mollón', '32448', 'Nogueira de Ramuín', 'Ourense', '42.426222', '-7.740147', '988222272', '988222273', 'info.pombares@mundo-r.com', 'https://pombares.com', 'Alejandra Prieto Iglesias', '4 Hectáreas', '30.000 litros', 'Pombares.', 'Mencía, Garnacha, Treixadura, Godello y Albariño.', 'En 2024, Mención honorífica \"Blanco plurivarietal\" (añada 2023) en la  XV Cata de los vinos de Ribeira Sacra. En 2023, 2º Premio en blancos y otras añadas (Mencía barrica 05) en la XIV Cata de los vinos de Ribeira Sacra.', '../images/adegasImage3.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(4, 'Adega Ponte da Boga S.L.', 'apon.5511', 'Subzona de Ribeiras do Sil', 'Lugar do Couto - Sampaio', '32760', 'Castro Caldelas', 'Ourense', '42.386944', '-7.385555', '988203306', '988203307', 'info.pdaboga@pontedaboga.es', 'https://pontedaboga.es', 'Inmaculada Cabrera Díaz', '23 Hectáreas', '188.500 litros', 'A Ponte da Boga, Bancales Olvidados, Capricho, Expresión Histórica, G Ponte da Boga, Licis, Mañana Mejora, P Ponte da Boga, Ponte da Boga, Porto de Lobos, Sartenes o Canciones y Sazón.', 'Mencía, Brancellao, Merenzao, Sousón, Treixadura, Godello, Dona Branca y Albariño.', 'En 2023, \"Bacchus de Plata\" para el vino \"A Ponte da Boga\" (añada de 2019). En 2021, \"Diploma Mencía\" en la Cata de los vinos de Galicia.', '../images/adegasImage4.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(5, 'Adega Vella Xeracións, S.L.', 'avel.5140', 'Subzona de Ribeiras do Sil', 'Eirexa, 14 - Abeleda', '32764', 'A Teixeira', 'Ourense', '42.395104', '-7.440251', '988047602', '988047603', 'info.adegavella@terra.com', 'https://adegavella.es', 'Víctor Santiago Ortega', '5 Hectáreas', '43.000 litros', '12 Adega Vella, 1904 Adega Vella, Adega Vella, Baluce, Quitapesares Adega Vella y Tradición.', 'Mencía, Merenzao, Mouratón, Treixadura, Godello y Albariño.', 'En 2023, \"Acio de bronce\" en la Cata de Vinos de Galicia (Distinción Gallaecia 2023 para 12 Adega Vella). En 2023, 3er Premio en blancos en la Cata de Ribeira Sacra 2023.', '../images/adegasImage5.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(6, 'Adegas e Viñedos Lareu S.L.', 'alar.6129', 'Subzona de Chantada', 'Fondo de Vila - Sabadelle', '27517', 'Chantada', 'Lugo', '42.643098', '-7.736865', '982561820', '982561821', 'info.adegaslareu@gmail.com', 'https://www.adegaslareu.com', 'Eva León Gallardo', '2.5 Hectáreas', '13.000 litros', 'Noa, Ouvenza y Sabatelius.', 'Mencía, Garnacha, Treixadura y Godello.', 'En 2025, Diploma 04 para el vino \"Sabatelius\" en el Concurso Internacional de vinos de montaña. En 2023, Premio en la categoría de otras añadas para el vino \"Sabatelius Mencía\" (Barrica 2021), en la XIX Cata de los vinos de Ribeira Sacra. ', '../images/adegasImage6.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(7, 'Adegas e Viñedos Vía Romana S.L.', 'arom.6163', 'Subzona de Chantada', 'A Ermida - Belesar', '27500', 'Chantada', 'Lugo', '42.594346', '-7.730226', '982454005', '982454094', 'info.viaromana@viaromana.es', 'https://www.viaromana.es', 'Alfonso Mora Delgado', '16 Hectáreas', '165.000 litros', 'Conde de Lagariños, Pazo de Outeiro ,Ribeirapena, Vía Romana, Vía Romana VR y Via Romana do Camiño.', 'Mencía, Brancellao, Merenzao y Godello.', 'En 2022, 3er Premio en tintos en la Cata de la Ribeira Sacra. En 2021, Mención \"Vinos Excelencia\" para las variedades Godello y Mencía.', '../images/adegasImage7.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(8, 'Adegas Moure S.A.', 'amou.6118', 'Subzona de Ribeiras do Miño', 'Avda. Buenos Aires, 12 - Escairón', '27540', 'O Saviñao', 'Lugo', '42.566202', '-7.676697', '982452031', '982452700', 'info.abadiadacova@adegasmoure.com', 'https://www.adegasmoure.com', 'Amparo Peña Hidalgo', '15 Hectáreas', '271.250 litros', 'A Rosa do Viño, Abadia da Cova, Abadia da Cova (1124), A Fuga, Cepa Vella, Cimbro y Moure Tradición.', 'Mencía, Merenzao, Godello, Albariño, Albarello y Arauxa.', 'En 2024, 2º Premio en blancos en la Cata de la Ribeira Sacra. En 2024, 3er Diploma para el vino \"Abadia da Cova (1124)\" en la XXXII Cata dos viños de Galicia.', '../images/adegasImage8.jpeg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(9, 'Alma das Donas S.L.U.', 'adon.4510', 'Subzona de Ribeiras do Miño', 'Ribas de Sil, 1 - Pombeiro', '27470', 'Pantón', 'Lugo', '42.449294', '-7.707001', '988200045', '988200047', 'info@almadasdonas.com', 'https://almadasdonas.com', 'Elisa Campos Herrera', '3 Hectáreas', '18.000 litros', 'Almalarga, Almamadre, Celeiros, Punta Minchocas y Verdes Matas.', 'Mencía y Godello.', 'En 2025, 1er Premio en la categoría de otras añadas para el vino \"Almamadre\" en la XXXI Cata de los vinos de Ribeira Sacra. En 2024, Diploma Mencía en la Cata de los vinos de Galicia.', '../images/adegasImage9.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(10, 'Amedo S.L.', 'amed.5511', 'Subzona de Chantada', 'Tarrio - San Fiz s/n', '27500', 'Chantada', 'Lugo', '42.612227', '-7.726990', '982184488', '982184489', 'info.adegasamedo@gmail.com', 'https://www.adegasamedo.com', 'Vicente Navarro Ramírez', '12 Hectáreas', '55.000 litros', 'Amedo, As Glorias, Pero Bernal y Pero Bernal Selección.', 'Mencía, Tempranillo, Garnacha, Treixadura, Godello, Albariño y Torrontés.', 'En 2023, 5º Diploma para el vino \"Pero Bernal Selección\" en la XXV Cata dos viños de Galicia. En 2022, Mención \"Distinguidos Gallaecia\" para el vino \"As Glorias 2011 Gran Oro\".', '../images/adegasImage10.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(11, 'Bodegas Costoya S.L.', 'bcos.7715', 'Subzona de Ribeiras do Sil', 'Boga, 26 - Abeleda', '32764', 'A Teixeira', 'Ourense', '42.391064', '-7.437659', '988417273', '988417274', 'info.costoya@temera.com', 'https://www.vinosthemera.com', 'Jesus Méndez Pastor', '5 Hectáreas', '35.000 litros', 'A Cerca, Alodio 212, Alodio 343, Alodio 898, Alodio de Antonia, Alodio Terradentro, Fraga Fonda, Noite Pecha, Pena de Matacas, Pena de Xastre, Pena Furada, Terroirs by Alodio, Terroirs of Alodio, Terroirs of Spain y Themera.', 'Mencía, Brancellao, Merenzao, Treixadura, Godello, Dona Branca, Albariño y Torrontés.', 'En 2024, \"Bacchus de Bronce\" para el vino \"Themera 2023\". En 2023, Mención \"Vinos Excelencia\" Mencía Barrica 2021 y Mencía 2021 para los vinos \"Terradentro\" y \"Pena de Xastre\".', '../images/adegasImage11.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(12, 'Bodegas de Rectoral de Amandi S.A.U.', 'rama.7164', 'Subzona de Amandi', 'Amandi', '27423', 'Sober', 'Lugo', '42.494378', '-7.589026', '988384200', '988384068', 'info.rectoral@bodegasgallegas.com', 'https://www.bodegasgallegas.com', 'Ángel Díaz Román', '140 Hectáreas', '2.000.000 botellas', 'Rectoral de Amandi.', 'Mencía.', 'En 2024, 1er Premio para el vino \"Rectoral de Amandi\" en el XXIV Concurso de vinos tintos gallegos de Bilbao. En 2023, 5º Diploma para el vino \"Rectoral de Amandi\" en el Concurso internacional de vinos de montaña.', '../images/adegasImage12.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(13, 'Bodegas Helmántica S.A.L.', 'bhel.7108', 'Subzona de Ribeiras do Sil', 'Rúa do Castiñeiro Vello, 2', '32290', 'Sarreaus', 'Ourense', '42.34340722941639', '-7.878509202894807', '988755433', '988755434', 'info@bodegashelmantica.ddns.net', 'http://bodegashelmantica.ddns.net/index', 'Federico García Lorca', '7,7 Hectáreas', '1700 litros', 'Helmántica Roble, Helmántica Crianza, Helmántica Reserva y Helmántica Gran Reserva.', 'Mencía, Garnacha, Treixadura, Godello y Albariño.', 'En 2023, premio a la \"Excelencia\" por sus vinos Godello y Mencía. En 2022, premio \"Distinguidos Gallaecia 2022\" para el vino \"Helmántica Gran Reserva\".', '../images/adegasImage13.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(14, 'Casa Moreiras S.L.', 'cmor.4813', 'Subzona de Ribeiras do Miño', 'San Martín de Siós', '27430', 'Pantón', 'Lugo', '42.497788', '-7.610272', '986122774', '986122774', 'bodega@casamoreiras.com', 'https://www.casamoreiras.com', 'Gema Cano Ferrer', '10 Hectáreas', '57.000 litros', 'Adrás, Campaza, Casa Curro, Casa Moreiras, Casa Moreiras Selección, La Invitación de Pepa, La Propuesta de María, Ladeiras de Adras, Massimo y Ordalia.', 'Mencía, Godello y Albariño.', 'En 2023, Diploma a Casa Moreiras (Godello 2022) desde \"Distinciones Gallaecia\". En 2023, \"Medalla de oro\" en la Cata transfronteriza de Galicia y Norte de Portugal (revista HG&T).', '../images/adegasImage14.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(15, 'Don Bernardino S.L.', 'dber.3104', 'Subzona de Amandi', 'Santa Cruz de Brosmos', '27425', 'Sober', 'Lugo', '42.4210916', '-7.528713', '982403600', '982403600', 'info@donbernardino.com', 'https://www.donbernardino.com', 'Manuel Molina Guerrero', '4 Hectáreas', '38.000 litros', 'Antergo, Don Bernardino, Don Pedro, El Otro DB, Lagoa & Borges, O Sono de Ly, Santo Graal y Tierra de Preguntas.', 'Mencía.', 'En 2024, \"Diploma Mencía\" en la Cata de los vinos de Galicia. En 2024, \"Diploma 03\" para el vino \"Don Bernardino\" en el Concurso internacional de vinos de montaña.', '../images/adegasImage15.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(16, 'Grupo Peago S.L. ', 'gpea.5511', 'Subzona de Chantada', 'Sequeiras, 1 - Camporramiro', '27515', 'Chantada', 'Lugo', '42.587591', '-7.730427', '982446238', '94412 227', 'condadodesequeiras@grupopeago.com', 'https://www.condadodesequeiras.com', 'Laura Guerrero Durán', '12 Hectáreas', '85.000 litros', 'Besos de Laura, Caricias de Sara, Condado de Sequeiras y Esperón.', 'Mencía, Treixadura y Godello.', 'En 2023, Mención Distinguidos Gallaecia Gran Oro para el vino \"Besos de Laura\" (2022). En 2022, Medalla de oro para el vino \"Caricias de Sara\" en la Cata transfronteriza Galicia y norte de Portugal (Revista HG&T).', '../images/adegasImage16.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(17, 'Regina Viarum S.L.', 'rvia.6613', 'Subzona de Amandi', 'Doade', '27424', 'Sober', 'Lugo', '42.408851', '-7.476543', '986288212', '986227129', 'info@reginaviarum.es', 'https://reginaviarum.es', 'María Elena Gómez Pérez', '14 Hectáreas', '130.000 litros', 'Finca La Capitana, vHeroico, vRegina Expresión, vRegina Viarum Ecológico, vRegina Viarum Godello, vRegina Viarum Mencia, vRegina Viarum Rosae y vVia Appia.', 'Mencía, Brancellao, Sousón, Tempranillo, Treixadura y Godello.', 'En 2024, Mención \"Vino Excelencia\" para el vino \"vRegina Viarum Ecológico\" en la Cata de los vinos de Ribeira Sacra. En 2022, 2º Premio en blancos y otras añadas para el vino \"vRegina Viarum\" (Godello 21) en la Cata de los vinos de Ribeira Sacra.', '../images/adegasImage17.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(18, 'Régoa C.B.', 'rego.4409', 'Subzona de Amandi', 'Pinol', '27460', 'Sober', 'Lugo', '42.396159', '-7.550163', '982101555', '982101557', 'info@regoa.es', 'http://www.regoa.es', 'Álvaro Sáez Morales', '10 Hectáreas', '', 'Régoa, Régoa Iria y Régoa TN.', 'Mencía, Brancellao, Caíño y Albarello.', 'En 2023, Diploma para el vino \"Régoa Iria\" en la Cata de los vinos de Galicia. En 2022, \"Acio de bronce\", Distinción Gallaecia 2022, para el vino \"Régoa TN\" en la cata de Vinos de Galicia.', '../images/adegasImage18.jpg', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(19, 'Ronsel do Sil S.L.', 'rons.6512', 'Subzona de Ribeiras do Sil', 'Sacardebois', '32740', 'Parada de Sil', 'Ourense', '42.383702', '-7.51939,15', '988984923', '988984924', 'info@ronseldosil.com', 'https://www.ronseldosil.com', 'Raúl Marín Moreno', '10 Hectáreas', '25.000 litros', 'Alba Plena, Alpendre, Arpegio, Ourive, Portico da Gloria, Veluveira y Vel´uveyra.', 'Mencía, Merenzao, Caíño, Garnacha, Treixadura, Godello y Dona Branca.', 'En 2024, Premio en la categoría de otras añadas para el vino \"Pórtico da Gloria 2022\" en la XXIX Cata de los vinos de Ribeira Sacra. En 2022, 4º Diploma para el vino \"Alba Plena\" (Mencía\'21) en la XXXIV Cata dos viños de Galicia.', '../images/adegasImage19.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2'),
(20, 'S.A.T. Virxen dos Remedios 837 XUGA', 'vrem.6185', 'Subzona de Ribeiras do Miño', 'Diomondi, 56', '27548', 'O Saviñao', 'Lugo', '42.584852', '-7.709142', '982171720', '982171720', 'info@virxendosremedios.es', 'https://www.virxendosremedios.es', 'Marina Reyes Ramos', '3.5 Hectáreas', '33.000 litros', 'Castro Candaz Boca do Demo, Castro Candaz Finca El Curvado, Castro Candaz Finca La Vertical, Catropuntos, Demo, Maga, Maga Ouro, Pazo de Bexán, Rutas do Destino y Viña Vella.', 'Mencía, Brancellao, Garnacha, Treixadura, Godello, Albariño y Torrontés.', 'En 2024, 5º Diploma para el vino \"Maga Ouro\" en el Concurso internacional de vinos de montaña. En 2023, Premio \"Blanco Plurivarietal\" para el vino \"Viña Vella\" en la XXV Cata de los vinos de Ribeira Sacra.', '../images/adegasImage20.png', '$2y$05$zb3bpIgeFIK7epDe3L6ti.yodKZ9E0T.rcHxuvbnGYZbix2s8bom2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `idEmail` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`idEmail`, `nombre`, `email`) VALUES
(1, 'Pilar Montero Santiago', 'pilar.montero@adegaalgueira.com'),
(2, 'Carolina Ruiz Moya', 'carolina.ruiz@adegacachin.com'),
(3, 'Alejandra Prieto Iglesias', 'alejandra.prieto@pombares.com'),
(4, 'Inmaculada Cabrera Díaz', 'inmaculada.cabrea@pontedaboga.es'),
(5, 'Víctor Santiago Ortega', 'victor.santiago@adegavella.com'),
(6, 'Eva León Gallardo', 'eva.leon@adegaslareu.com'),
(7, 'Alfonso Mora Delgado', 'alfonso.mora@viaromana.es'),
(8, 'Amparo Peña Hidalgo', 'amparo.pena@adegasmoure.com'),
(9, 'Elisa Campos Herrera', 'elisa.campos@almadasdonas.com'),
(10, 'Vicente Navarro Ramírez', 'vicente.navarro@adegasamedo.com'),
(11, 'Jesus Méndez Pastor', 'jesus.mendez@temera.com'),
(12, 'Ángel Díaz Román', 'angel.diaz@bodegasgallegas.com'),
(13, 'Federico García Lorca', 'federico.garcia@bodegashelmantica.ddns.net'),
(14, 'Gema Cano Ferrer', 'gema.cano@casamoreiras.com'),
(15, 'Manuel Molina Guerrero', 'manuel.molina@donbernardino.com'),
(16, 'Laura Guerrero Durán', 'laura.guerrero@grupopeago.com'),
(17, 'María Elena Gómez Pérez', 'melena.gomez@reginaviarum.es'),
(18, 'Álvaro Sáez Morales', 'alvaro.saez@regoa.es'),
(19, 'Raúl Marín Moreno', 'raul.marin@ronseldosil.com'),
(20, 'Marina Reyes Ramos', 'marina.reyes@virxendosremedios.es');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`idBodega`),
  ADD UNIQUE KEY `uq_nombre` (`nombre`),
  ADD UNIQUE KEY `uq_codBodega` (`codBodega`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`idEmail`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
