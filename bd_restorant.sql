-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-06-2017 a las 02:13:30
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_restaurant2.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_calificacion_restorant`
--

CREATE TABLE `tbl_calificacion_restorant` (
  `id_calificacion` int(11) NOT NULL,
  `comentario` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `estrellas` int(5) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `fecha_calificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_calificacion_restorant`
--

INSERT INTO `tbl_calificacion_restorant` (`id_calificacion`, `comentario`, `estrellas`, `id_cliente`, `id_restaurant`, `fecha_calificacion`) VALUES
(1, 'Comentario de prueba 1 Comentario de prueba 1 Comentario de prueba 1Comentario de prueba 1Comentario de prueba 1Comentario de prueba 1Comentario de prueba 1', 1, 4, 3, '2017-05-09 14:43:16'),
(2, 'Comentario de prueba 2', 2, 2, 3, '2017-05-17 10:23:33'),
(3, 'Comentario de prueba 3', 3, 2, 3, '2017-05-24 15:26:43'),
(4, 'Comentario de prueba 4', 4, 3, 3, '2017-02-15 17:35:17'),
(5, 'Comentario de prueba 5', 5, 4, 3, '2017-05-26 21:31:19'),
(6, 'prueba', 3, 2, 3, '2017-05-09 09:34:13'),
(7, '2', 2, 2, 3, '2017-06-14 12:40:16'),
(8, '22', 222, 2, 3, '2017-03-14 12:35:20'),
(9, '3', 3, 3, 3, '2017-05-01 18:20:26'),
(10, 'prueba comentario final', 2, 2, 3, '2017-06-13 01:55:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `usuario_cliente` varchar(40) NOT NULL,
  `password_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `celular`, `mail`, `usuario_cliente`, `password_cliente`) VALUES
(2, 'Craig', 'Fernandez', 999999999, 'aaa@gmail.com', 'craig', '202cb962ac59075b964b07152d234b70'),
(3, 'Diego', 'Guajardo', 123456789, 'diegoxpirinchox@gmail.com', 'diego', '202cb962ac59075b964b07152d234b70'),
(4, 'Marcelo', 'Acevedo', 2147483647, 'bbb@gmail.com', 'marcelo', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comuna`
--

CREATE TABLE `tbl_comuna` (
  `id_comuna` int(11) NOT NULL,
  `nombre_comuna` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_comuna`
--

INSERT INTO `tbl_comuna` (`id_comuna`, `nombre_comuna`) VALUES
(1, 'SANTIAGO'),
(2, 'CERRILLOS'),
(3, 'CERRO NAVIA'),
(4, 'CONCHALÍ'),
(5, 'EL BOSQUE'),
(6, 'ESTACIÓN CENTRAL'),
(7, 'HUECHURABA'),
(8, 'INDEPENDENCIA'),
(9, 'LA CISTERNA'),
(10, 'LA FLORIDA'),
(11, 'LA GRANJA'),
(12, 'LA PINTANA'),
(13, 'LA REINA'),
(14, 'LAS CONDES'),
(15, 'LO BARNECHEA'),
(16, 'LO ESPEJO'),
(17, 'LO PRADO'),
(18, 'MACÚL'),
(19, 'MAIPÚ'),
(20, 'ÑUÑOA'),
(21, 'PEDRO AGUIRRE CERDA'),
(22, 'PEÑALOLÉN'),
(23, 'PROVIDENCIA'),
(24, 'PUDAHUEL'),
(25, 'QUILICURA'),
(26, 'QUINTA NORMAL'),
(27, 'RECOLETA'),
(28, 'RENCA'),
(29, 'SAN JOAQUÍN'),
(30, 'SAN MIGUEL'),
(31, 'SAN RAMÓN'),
(32, 'VITACURA'),
(33, 'PUENTE ALTO'),
(34, 'PIRQUE'),
(35, 'SAN JOSÉ DE MAIPO'),
(36, 'COLINA'),
(37, 'LAMPA'),
(38, 'TIL-TIL'),
(39, 'SAN BERNARDO'),
(40, 'BUIN'),
(41, 'CALERA DE TANFO'),
(42, 'PAINE'),
(43, 'MELIPILLA'),
(44, 'ALHUÉ'),
(45, 'CURACAVÍ'),
(46, 'MARIA PINTO'),
(47, 'SAN PEDRO'),
(48, 'TALAGANTE'),
(49, 'EL MONTE'),
(50, 'ISLA DE MAIPO'),
(51, 'PADRE HURTADO'),
(52, 'PEÑAFLOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_solicitud`
--

CREATE TABLE `tbl_detalle_solicitud` (
  `id_detalle_solicitud` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_detalle_solicitud`
--

INSERT INTO `tbl_detalle_solicitud` (`id_detalle_solicitud`, `cantidad`, `precio`, `id_plato`, `id_solicitud`) VALUES
(18, 1, 1000, 1, 1),
(19, 1, 200, 3, 1),
(20, 3, 1222, 4, 1),
(25, 4, 7996, 25, 9),
(26, 2, 4998, 24, 9),
(27, 1, 1999, 12, 9),
(28, 2, 666, 40, 11),
(29, 2, 666, 57, 11),
(30, 1, 666, 53, 12),
(31, 2, 666, 15, 12),
(32, 2, 666, 4, 12),
(33, 3, 666, 7, 13),
(34, 2, 666, 18, 13),
(35, 2, 666, 8, 14),
(36, 1, 666, 30, 14),
(37, 4, 666, 16, 14),
(38, 2, 666, 5, 10),
(39, 3, 666, 5, 17),
(40, 1, 666, 6, 17),
(41, 3, 666, 28, 18),
(42, 4, 666, 45, 18),
(43, 3, 666, 25, 18),
(44, 1, 666, 55, 19),
(45, 1, 666, 44, 19),
(46, 3, 666, 55, 20),
(47, 3, 666, 2, 20),
(48, 3, 666, 51, 21),
(49, 4, 666, 59, 20),
(50, 666, 666, 6, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen_plato`
--

CREATE TABLE `tbl_imagen_plato` (
  `id_imagen_plato` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `nombre_imagen_plato` varchar(250) NOT NULL,
  `imagen_plato` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_imagen_plato`
--

INSERT INTO `tbl_imagen_plato` (`id_imagen_plato`, `id_plato`, `nombre_imagen_plato`, `imagen_plato`) VALUES
(3, 2, 'antipasto.jpg', '../files/460c37_antipasto.jpg'),
(4, 63, 'Captura.PNG', '../files/35d8dc_Captura.PNG'),
(5, 22, 'choclocongelado.jpg', '../files/70a72a_choclocongelado.jpg'),
(6, 9, 'ensaladacesarconpollo173.jpg', '../files/df2643_ensaladacesarconpollo173.jpg'),
(7, 15, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen_restaurant`
--

CREATE TABLE `tbl_imagen_restaurant` (
  `id_imagen_restaurant` int(11) NOT NULL,
  `nombre_imagen_restaurant` varchar(250) NOT NULL,
  `imagen_restaurant` varchar(250) NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_imagen_restaurant`
--

INSERT INTO `tbl_imagen_restaurant` (`id_imagen_restaurant`, `nombre_imagen_restaurant`, `imagen_restaurant`, `id_restaurant`) VALUES
(4, 'lista de solicitudes para crear flujo.pn', '../files/65c5cd_lista de solicitudes para crear flujo.png', 3),
(5, 'logo200.jpg', '../files/61e28d_logo200.jpg', 2),
(7, 'IMG20170109WA0033.jpg', '../files/641989_IMG20170109WA0033.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plato`
--

CREATE TABLE `tbl_plato` (
  `id_plato` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `nombre_plato` varchar(100) NOT NULL,
  `id_tipo_plato` int(11) NOT NULL,
  `estado_plato` int(11) NOT NULL COMMENT '1=Activo;2=deshabilitado;3=eliminado',
  `precio` int(11) NOT NULL,
  `descripcion_plato` text NOT NULL,
  `tiempo_preparacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_plato`
--

INSERT INTO `tbl_plato` (`id_plato`, `id_restaurant`, `nombre_plato`, `id_tipo_plato`, `estado_plato`, `precio`, `descripcion_plato`, `tiempo_preparacion`) VALUES
(1, 1, 'Sandwich Chacarero', 1, 1, 2500, 'Sandwich hecho con churrasco, porotos verdes, tomate, mayonesa.', 20),
(2, 3, 'Antipasto Piccola ', 9, 1, 6999, 'Exquisita  combinación  de  quesos,  jamón  crudo,  jamón  \nde pierna, crujientes galletitas, acompañado por deliciosa \nsalsa golf.\n¡La mejor idea para comenzar una gran comida!', 20),
(3, 3, 'Cocktail de Camarones  Ecuatorianos  ', 9, 1, 4999, 'Exquisitos     y     frescos     camarones     ecuatorianos     \r\nacompañados por una suave \r\nmayonesa al limón.', 20),
(4, 3, 'Aritos de Milán', 9, 1, 2299, 'Crujientes  aritos  de  cebolla  fritos,  acompañados  con  salsa  \r\nde soya.', 10),
(5, 3, 'Provoleta ', 9, 1, 2799, 'Fino queso provoleta fundido con delicadas especias.', 10),
(6, 3, 'Ensalada Italiana ', 8, 1, 2999, 'Las  más  frescas  lechugas  gourmet  combinadas  con  la  \r\nmejor  selección  de  rojos  tomates  en  gajos,  paltas,  ricas  \r\naceitunas  deshuesadas  y  arvejas,  decorada  con  queso  \r\nparmesano y crutones.', 15),
(7, 3, 'Ensalada Primavera', 8, 1, 3899, 'La mejor selección de camarones unidos a los más frescos \r\ny coloridos vegetales. Lechuga gourmet, tomate, palmitos, \r\nchoclo,   zanahoria   y   champiñones,   acompañados   por   \r\ncubitos de suave quesillo.', 15),
(8, 3, 'Salpicón de Ave', 8, 1, 3999, 'Delicioso pollo grillé en trozos sobre una cama de frescos \r\ntomates  en  cubitos  y  lechuga  gourmet,  acompañado  por  \r\npapas vapor en su punto exacto.', 20),
(9, 3, 'Ensalada César', 8, 1, 3999, 'La mejor selección de trocitos de ave, en una suave cama \nde  lechuga  con  crujientes  crutones,  queso  parmesano  y  \ndressing Cesár', 15),
(10, 3, 'Arroz ', 6, 1, 1999, '', 5),
(11, 3, 'Puré ', 6, 1, 1999, '', 5),
(12, 3, 'Papas Fritas', 6, 1, 1999, '', 5),
(13, 3, 'Verduras Calientes', 6, 1, 1999, '', 5),
(14, 3, 'Choclo a la Mantequilla', 6, 1, 1999, '', 5),
(15, 3, 'Agregado a lo Pobre', 6, 1, 2499, '', 5),
(16, 3, 'Champiñones', 6, 1, 2499, '', 5),
(17, 3, 'Ensalada Surtida', 10, 1, 1999, '', 5),
(18, 3, 'Ensalada Lechuga', 10, 1, 1999, '', 5),
(19, 3, 'Tomate', 10, 1, 1999, '', 5),
(20, 3, 'Ensalada a la Chilena (Tomate y Cebolla)', 10, 1, 1999, '', 5),
(21, 3, 'Porotos Verdes', 10, 1, 1999, '', 5),
(22, 3, 'Choclo', 10, 1, 1999, '', 5),
(23, 3, 'Palmitos', 10, 1, 1999, '', 5),
(24, 3, 'Sopa de Champiñones', 2, 1, 2499, '', 15),
(25, 3, 'Sopa Piccola', 2, 1, 1999, '', 15),
(26, 3, 'Consomé de Carne', 2, 1, 1899, '', 15),
(27, 3, 'Fontana di Pasta Especial ', 7, 1, 12999, 'Una deliciosa mezcla de las más finas pastas, hechas en \r\ncasa, con Lasagna, Panzotti, Gnocchi, Tortelleti, Ravioli y \r\nCannelloni,  con  un  delicioso  acompañamiento  de  Salsa  \r\nBolognesa,  un  toque  de  crema  y  queso  Parmesano  que  \r\ncompletan una extraordinaria Fontana.', 25),
(28, 3, 'Fontana Di gnocchi', 7, 1, 10999, 'Suaves y delicados gnocchis al dente bañados en nuestra \r\ntradicional receta Italiana de salsa bolognesa', 20),
(29, 3, 'Fontana di Pasta', 7, 1, 10999, '¡Perfecto  para  compartir!,  una  exquisita  combinación  de  \r\nnuestras frescas pastas caseras al dente: Ravioli, Gnocchi, \r\nCannelloni, Lasagna y Fettuccini bañadas en la tradicional \r\nSalsa Bolognesa, un toque de crema y queso Parmesano \r\npara completar esta gran combinación.', 20),
(30, 3, 'Spaghetti con Salsa Bolognesa', 7, 1, 3299, 'Deliciosos  Spaghetti  bañados  en  la  tradicional  receta  \r\nitaliana de Salsa Bolognesa de la casa, con un toque de \r\ncrema y queso parmesano.', 15),
(31, 3, 'Tortelleti de Carne', 7, 1, 3999, '(Salsa  Bolognesa  o  a  la  Crema).  Deliciosa  pasta  rellena  \r\ncon carne y salsa bolognesa, un toque de crema y cubierta \r\nde queso parmesano.', 15),
(32, 3, 'Sorrentinos', 7, 1, 3999, 'Frescos  sorrentinos  rellenos  de  jamón  y  ricotta,  bañados  \ncon  nuestra  tradicional  receta  de  salsa  bolognesa,  un  \ntoque de crema y cubierta de queso parmesano.', 15),
(33, 3, 'Fettuccini', 7, 1, 3699, '(Salsa Bolognesa o a la Crema)\r\nLos más frescos fettuccinis bañados con nuestra tradicional \r\nreceta  de  salsa  bolognesa,  un  toque  de  crema  y  queso  \r\nparmesano', 15),
(34, 3, 'Tripasta Especial ', 7, 1, 4999, '(Salsa Bolognesa o a la Crema)\r\nLas tres mejores pastas  (Lasagna, Ravioli Y Panzotti de Pavo) con \r\nnuestra exquisita salsa bolognesa, un toque de crema y cubierta \r\nde queso parmesano', 20),
(35, 3, 'Cannelloni de Carne y Espinaca ', 7, 1, 4799, '(Salsa   Bolognesa   o   a   la   Crema).   Los   más   frescos   \r\ncannellonis  caseros  rellenos  con  una  exquisita  mezcla  \r\nde carne y espinacas, bañados con salsa bolognesa y un \r\ntoque de crema y queso parmesano.', 20),
(36, 3, 'gnocchi ', 7, 1, 3699, 'Suaves y delicados gnocchis de papas naturales al dente \r\nbañados  en  nuestra  tradicional  receta  italiana  de  salsa  \r\nbolognesa y un toque de crema  y queso parmesano.', 20),
(37, 3, 'Panzotti de Pavo', 7, 1, 3999, 'Nuestros   ricos   Panzotti   rellenos   con   pavo   y   nueces   \r\ncubiertos  por  nuestra  tradicional  salsa  bolognesa  y  un  \r\ntoque de crema y queso parmesano', 20),
(38, 3, 'Lasagna', 7, 1, 4799, 'Exquisito  plato  hecho  de  láminas  de  pasta  casera  con  \r\nnuestra exclusiva receta de salsa bolognesa, crema, queso \r\nparmesano, exquisita capa de carne y queso mantecoso.', 20),
(39, 3, 'Fettuccini con  Carne Mechada ', 7, 1, 4699, 'Exquisitos   fettuccini   caseros   acompañados   por   una   \r\ndeliciosa carne mechada cocida en su propio jugo y bañada \r\nen nuestra tradicional salsa bolognesa.', 20),
(40, 3, 'Parrillada', 3, 1, 23999, 'Nuestra  tradicional  parrillada  compuesta  por  la  mejor  \r\nselección  de  carnes  de  vacuno  y  cerdo  doradas  en  su  \r\npunto  exacto.  Además,  deliciosas  prietas,  pollo  y  chorizo  \r\nde la casa creado según nuestra tradicional receta Italiana, \r\ntodo   condimentado   con   el   más   exquisito   chimichurri   \r\nacompañado por papas cocidas.', 30),
(41, 3, 'Parrillada Especial', 3, 1, 25999, 'Deliciosa  parrillada  compuesta  por  2  ricas  brochetas  de  \r\ncarne de vacuno y 2 jugosos biffe de chorizo grilladas en \r\nsu punto exacto y chorizo de la casa creado según nuestra \r\ntradicional receta Italiana, además acompañado por papas \r\ncocidas.', 30),
(42, 3, 'Parrillada Piccola ', 3, 1, 24999, 'Nuestra  parrillada  insignia,  compuesta  por  3  deliciosos  \r\ntrozos  de  carne  de  vacuno  grillé,  chorizo  de  la  casa  \r\ncreado  según  las  antiguas  recetas  de  comida  Italiana  y  \r\nacompañada por papas cocidas.', 30),
(43, 3, 'Costillitas', 3, 1, 6999, 'Exquisitas costillitas de cerdo al horno doradas en su punto \r\nexacto.', 20),
(44, 3, 'Lomo a la Chilena', 3, 1, 8799, 'Exquisito  Lomo  Grillé  en  su  punto,  acompañado  por  la  \r\nclásica ensalada de tomate y cebolla, tradicional en toda \r\nmesa chilena.', 20),
(45, 3, 'Lomo al Tocino ', 3, 1, 9799, 'Delicioso lomo, con finas tiritas de tocino acompañado\r\ncon exquisitas papas duquesa hechas en casa, \r\nhorneadas en su punto.', 20),
(46, 3, 'Carne Mechada con Puré y Salsa Bolognesa ', 3, 1, 5799, 'Deliciosa  carne  de  vacuno  cocida  en  su  jugo,  bañada  \r\nen  nuestra  tradicional  salsa  bolognesa,  acompañada  \r\npor un exquisito puré de papas casero.', 25),
(47, 3, 'Lomo con salsa piamontesa y puré ', 3, 1, 9799, 'Lomo grillado en su punto exacto, bañado en nuestra conocida salsa \r\ncon  cebollines,  champiñones,  ají  de  cacho  de  cabra  y  un  toque  de  \r\ncrema acompañado por suave puré de papas casero.', 25),
(48, 3, 'Biffe Chorizo a lo Pobre', 3, 1, 9799, 'Delicioso    Biffe    chorizo    grillado    a    la    perfeción,    \r\nacompañado  por  cebollas  pluma  finamente  doradas, \r\nlas  más  crujientes  papas  fritas  caseras  y  dos  huevos  \r\nfritos en su punto exacto.', 25),
(49, 3, 'Spesatino', 3, 1, 5999, 'Deliciosa carne de vacuno salteada en su punto, bañada \r\nen  nuestra  tradicional  salsa  bolognesa,  con  un  toque  de  \r\nperejil,  acompañado  por  las  más  crujientes  papas  fritas  \r\ncaseras.', 20),
(50, 3, 'Pollo Apanado Piccola', 11, 1, 4699, 'Exquisitas  pechugas  de  pollo  apanadas  con  un  delicioso  \r\nbatido especial para lograr un crujiente y sabroso plato.', 20),
(51, 3, 'Pechuga de Pollo a la Parrilla', 11, 1, 4699, 'Exquisitas   pechugas   de   pollo   grilladas   a   la   parrilla   \r\nlentamente hasta obtener su punto ideal.', 20),
(52, 3, 'Pollo a la Piamontesa', 11, 1, 4999, 'Ricos trocitos de pollo flambeados a la perfección con \r\ncebollines y champiñones seleccionados, aderezados \r\ncon ají de cacho de cabra y un toque de crema.', 20),
(53, 3, 'Congrio a la Piccola', 12, 1, 6999, 'Ricos trocitos del más fresco congrio del Pacífico cocidos \r\nen su caldo con tomate, queso parmesano y crema.', 30),
(54, 3, 'Coctel Camarón Ecuatoriano', 12, 1, 4999, 'Exquisitos y frescos camarones ecuatorianos acompañados \r\npor una suave salsa golf.', 20),
(55, 3, 'Ostiones Apanados', 12, 1, 6999, 'La  selección  de  los  más  frescos  y  delicados  ostiones  \r\napanados servidos con salsa de soya.', 15),
(56, 3, 'Congrio Della Nonna', 12, 1, 6999, 'El  más  fresco  congrio  especialmente  seleccionado,  con  \r\ncebollines y tomates naturales, cocinado al vino blanco y \r\ncon un toque de crema.', 25),
(57, 3, 'Congrio Frito con Papas Fritas', 12, 1, 6999, 'Fresco filete de congrio frito acompañado por crujientes \r\npapas fritas.', 20),
(58, 3, 'Profiterolli', 4, 1, 2499, 'Exquisitas masas de buñuelo rellenas con crema de vainilla \r\ny deliciosa crema chantilly, bañadas en una suave salsa de \r\nchocolate espolvoreada con azúcar flor.', 15),
(59, 3, 'Cheesecake', 4, 1, 2499, '', 15),
(60, 3, 'Tiramisú ', 4, 1, 24999, 'Exquisito  bizcocho  de  champagne  remojado  \r\nen café con amaretto, queso crema y zabaione \r\nde huevo sobre salsa de chocolate y decorado \r\ncon toques de crema chantilly.', 15),
(61, 3, 'Torta Chocolate', 4, 1, 2499, 'Delicioso  bizcocho  de  chocolate  relleno  con  crema  de  \r\nchocolate y mermelada de frambuesa y manjar, bañado en \r\nchocolate.', 15),
(62, 3, 'Torta Mil Hojas', 4, 1, 2499, 'Delicioso  trozo  de  torta  mil  hojas  relleno  con  nuestro  \r\nexquisito   manjar   casero   sobre   salsa   de   chocolate   y   \r\ndecorado con toques de crema chantilly.', 15),
(63, 3, 'Plato de prueba', 5, 1, 4000, 'este es un plato de prueba', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_privilegio`
--

CREATE TABLE `tbl_privilegio` (
  `id_privilegio` int(11) NOT NULL,
  `nombre_privilegio` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_privilegio`
--

INSERT INTO `tbl_privilegio` (`id_privilegio`, `nombre_privilegio`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'EMPLEADO'),
(3, 'SISTEMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `nombre_restaurant` varchar(40) NOT NULL,
  `info_restaurant` varchar(500) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `num_contacto` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `calificacion` int(5) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `numero_direccion` int(11) NOT NULL,
  `mapa` varchar(500) DEFAULT NULL,
  `estado_restaurant` varchar(30) NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`id_restaurant`, `nombre_restaurant`, `info_restaurant`, `id_comuna`, `num_contacto`, `email`, `calificacion`, `direccion`, `numero_direccion`, `mapa`, `estado_restaurant`, `hora_apertura`, `hora_cierre`) VALUES
(1, 'Restaurant Al Paso', 'Restaurant que ofrece comida rápida para servir y llevar. Proporcionamos una amplia variedad de comi', 1, 1234123, 'alpaso@gmail.com', 4, 'Av. Viel ', 1806, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26625.07672798496!2d-70.66495797351378!3d-33.47184649594976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ef80c4f47aff710!2sEl+Pollo+Caballo!5e0!3m2!1ses!2scl!4v1496724174125', 'activo', '10:00:00', '18:00:00'),
(2, 'Restaurant Sabores del Mundo', 'Restaurant que proporciona comidas gourmet de todos tipos.\nEspecializados en carnes.', 2, 92123452, 'sabores@live.cl', 3, 'Víctor Manuel ', 1560, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26625.07672798496!2d-70.66495797351378!3d-33.47184649594976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x801e93430d794e69!2sPizza+Pizza!5e0!3m2!1ses!2scl!4v1496724259422', 'activo', '07:40:00', '13:00:00'),
(3, 'La Piccola Italia', 'Restaurant internacional que se especializa en comida Italiana.', 2, 12341234, 'piccola@gmail.com', 5, 'Avda Liber Bernardo O`Higgins ', 1870, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31669.77413655926!2d-70.67071053720144!3d-33.45256452815486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xae57babee81f345f!2sLa+Piccola+Italia!5e0!3m2!1ses!2scl!4v1496724422160', 'activo', '16:00:00', '16:05:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud`
--

CREATE TABLE `tbl_solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_cuenta` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado_solicitud` varchar(20) NOT NULL COMMENT 'pagado;cerrado',
  `fecha_cierre` datetime DEFAULT NULL,
  `usuario_cierre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_solicitud`
--

INSERT INTO `tbl_solicitud` (`id_solicitud`, `id_cliente`, `id_restaurant`, `fecha_hora`, `total_cuenta`, `cantidad`, `estado_solicitud`, `fecha_cierre`, `usuario_cierre`) VALUES
(1, 3, 3, '2017-06-04 21:22:34', 1500, 3, 'cerrado', '2017-06-26 23:06:09', 'dguajardo'),
(9, 2, 3, '2017-06-13 06:47:01', 14993, 7, 'cerrado', '2017-06-26 23:05:51', 'dguajardo'),
(10, 2, 3, '2017-06-13 06:47:01', 14993, 7, 'cerrado', '2017-06-26 23:07:34', 'dguajardo'),
(11, 3, 3, '2017-06-02 14:44:34', 1500, 3, 'cerrado', '2017-06-26 23:05:36', 'dguajardo'),
(12, 2, 3, '2017-06-26 18:47:29', 14993, 7, 'cerrado', '2017-06-26 23:06:19', 'dguajardo'),
(13, 2, 3, '2017-06-26 20:32:01', 14993, 7, 'cerrado', '2017-06-26 23:06:22', 'dguajardo'),
(14, 4, 3, '2017-06-27 03:03:54', 666, 666, 'cerrado', '2017-06-26 23:18:50', 'dguajardo'),
(17, 3, 3, '2017-06-27 03:08:36', 666, 666, 'cerrado', '2017-06-26 23:17:31', 'dguajardo'),
(18, 2, 3, '2017-06-27 03:08:36', 666, 666, 'cerrado', '2017-06-26 23:20:35', 'dguajardo'),
(19, 3, 3, '2017-06-27 23:37:52', 666, 666, 'cerrado', '2017-06-27 20:27:10', 'dguajardo'),
(20, 2, 3, '2017-06-27 23:43:19', 666, 666, 'cerrado', '2017-06-27 20:27:12', 'dguajardo'),
(21, 4, 3, '2017-06-28 00:32:18', 666, 666, 'cerrado', '2017-06-27 21:32:08', 'dguajardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_plato`
--

CREATE TABLE `tbl_tipo_plato` (
  `id_tipo_plato` int(11) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_plato`
--

INSERT INTO `tbl_tipo_plato` (`id_tipo_plato`, `nombre_tipo`) VALUES
(1, 'SANDWICH'),
(2, 'SOPAS'),
(3, 'CARNES'),
(4, 'POSTRES'),
(5, 'PIZZAS'),
(6, 'ACOMPAÑAMIENTOS'),
(7, 'PASTAS'),
(8, 'VEGETARIANAS'),
(9, 'ENTRADAS'),
(10, 'ENSALADAS'),
(11, 'POLLOS'),
(12, 'DEL MAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_restaurant`
--

CREATE TABLE `tbl_usuario_restaurant` (
  `id_usuario` int(11) NOT NULL,
  `estado_usuario` varchar(20) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `password_usuario` varchar(50) NOT NULL,
  `id_restaurant` int(11) DEFAULT NULL,
  `id_privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario_restaurant`
--

INSERT INTO `tbl_usuario_restaurant` (`id_usuario`, `estado_usuario`, `nombre_usuario`, `password_usuario`, `id_restaurant`, `id_privilegio`) VALUES
(5, '1', 'dguajardo', '0c377bc3f942a9d5e5334e563a81f7e9', 1, 1),
(6, '1', 'prueba', '81dc9bdb52d04dc20036dbd8313ed055', 3, 2),
(7, '1', 'prueba2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2),
(8, '1', 'prueba3', '289dff07669d7a23de0ef88d2f7129e7', 1, 2),
(11, '1', 'SuperUsuario', 'ed2b1f468c5f915f3f1cf75d7068baae', NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_calificacion_restorant`
--
ALTER TABLE `tbl_calificacion_restorant`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `tbl_calificacion_restorant_ibfk_1` (`id_restaurant`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_comuna`
--
ALTER TABLE `tbl_comuna`
  ADD PRIMARY KEY (`id_comuna`);

--
-- Indices de la tabla `tbl_detalle_solicitud`
--
ALTER TABLE `tbl_detalle_solicitud`
  ADD PRIMARY KEY (`id_detalle_solicitud`),
  ADD KEY `tbl_detalle_solicitud_ibfk_2` (`id_plato`),
  ADD KEY `id_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `tbl_imagen_plato`
--
ALTER TABLE `tbl_imagen_plato`
  ADD PRIMARY KEY (`id_imagen_plato`),
  ADD UNIQUE KEY `id_producto` (`id_plato`);

--
-- Indices de la tabla `tbl_imagen_restaurant`
--
ALTER TABLE `tbl_imagen_restaurant`
  ADD PRIMARY KEY (`id_imagen_restaurant`),
  ADD UNIQUE KEY `id_restaurant` (`id_restaurant`);

--
-- Indices de la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_restaurant` (`id_restaurant`),
  ADD KEY `id_tipo_plato` (`id_tipo_plato`);

--
-- Indices de la tabla `tbl_privilegio`
--
ALTER TABLE `tbl_privilegio`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Indices de la tabla `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`id_restaurant`),
  ADD KEY `tbl_restaurant_ibfk_1` (`id_comuna`),
  ADD KEY `id_comuna` (`id_comuna`);

--
-- Indices de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_restaurant` (`id_restaurant`);

--
-- Indices de la tabla `tbl_tipo_plato`
--
ALTER TABLE `tbl_tipo_plato`
  ADD PRIMARY KEY (`id_tipo_plato`);

--
-- Indices de la tabla `tbl_usuario_restaurant`
--
ALTER TABLE `tbl_usuario_restaurant`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_restaurant` (`id_restaurant`),
  ADD KEY `id_privilegio` (`id_privilegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_calificacion_restorant`
--
ALTER TABLE `tbl_calificacion_restorant`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_comuna`
--
ALTER TABLE `tbl_comuna`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `tbl_detalle_solicitud`
--
ALTER TABLE `tbl_detalle_solicitud`
  MODIFY `id_detalle_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `tbl_imagen_plato`
--
ALTER TABLE `tbl_imagen_plato`
  MODIFY `id_imagen_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_imagen_restaurant`
--
ALTER TABLE `tbl_imagen_restaurant`
  MODIFY `id_imagen_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `tbl_privilegio`
--
ALTER TABLE `tbl_privilegio`
  MODIFY `id_privilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_plato`
--
ALTER TABLE `tbl_tipo_plato`
  MODIFY `id_tipo_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario_restaurant`
--
ALTER TABLE `tbl_usuario_restaurant`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_detalle_solicitud`
--
ALTER TABLE `tbl_detalle_solicitud`
  ADD CONSTRAINT `tbl_detalle_solicitud_ibfk_2` FOREIGN KEY (`id_plato`) REFERENCES `tbl_plato` (`id_plato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_detalle_solicitud_ibfk_3` FOREIGN KEY (`id_solicitud`) REFERENCES `tbl_solicitud` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  ADD CONSTRAINT `tbl_plato_ibfk_1` FOREIGN KEY (`id_tipo_plato`) REFERENCES `tbl_tipo_plato` (`id_tipo_plato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_plato_ibfk_2` FOREIGN KEY (`id_restaurant`) REFERENCES `tbl_restaurant` (`id_restaurant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD CONSTRAINT `tbl_restaurant_ibfk_1` FOREIGN KEY (`id_comuna`) REFERENCES `tbl_comuna` (`id_comuna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  ADD CONSTRAINT `tbl_solicitud_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_solicitud_ibfk_2` FOREIGN KEY (`id_restaurant`) REFERENCES `tbl_restaurant` (`id_restaurant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuario_restaurant`
--
ALTER TABLE `tbl_usuario_restaurant`
  ADD CONSTRAINT `tbl_usuario_restaurant_ibfk_2` FOREIGN KEY (`id_restaurant`) REFERENCES `tbl_restaurant` (`id_restaurant`),
  ADD CONSTRAINT `tbl_usuario_restaurant_ibfk_3` FOREIGN KEY (`id_privilegio`) REFERENCES `tbl_privilegio` (`id_privilegio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
