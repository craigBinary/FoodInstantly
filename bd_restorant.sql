-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2017 a las 05:54:25
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_restorant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_calificacion_restorant`
--

CREATE TABLE `tbl_calificacion_restorant` (
  `id_calificacion` int(11) NOT NULL,
  `comentario` int(11) DEFAULT NULL,
  `estrellas` int(5) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_restorant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `usuario_cliente` varchar(40) NOT NULL,
  `password_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `celular`, `usuario_cliente`, `password_cliente`) VALUES
(2, 'Craig', 'Fernandez', 999999999, 'craig', '202cb962ac59075b964b07152d234b70'),
(3, 'Diego', 'Guajardo', 123456789, 'diego', '202cb962ac59075b964b07152d234b70'),
(4, 'Marcelo', 'Acevedo', 2147483647, 'marcelo', '202cb962ac59075b964b07152d234b70');

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
(1, 'macul'),
(2, 'peñalolén'),
(3, 'santiago'),
(4, 'la_florida'),
(5, 'puente_alto'),
(6, 'providencia'),
(7, 'maipú'),
(8, 'quinta_normal'),
(9, 'las_condes');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen_plato`
--

CREATE TABLE `tbl_imagen_plato` (
  `id_imagen_plato` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `nombre_imagen_plato` varchar(100) NOT NULL,
  `imagen_plato` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen_restaurant`
--

CREATE TABLE `tbl_imagen_restaurant` (
  `id_imagen_restaurant` int(11) NOT NULL,
  `nombre_imagen_restaurant` varchar(40) NOT NULL,
  `imagen_restaurant` mediumblob NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `tiempo_preparacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_plato`
--

INSERT INTO `tbl_plato` (`id_plato`, `id_restaurant`, `nombre_plato`, `id_tipo_plato`, `estado_plato`, `precio`, `descripcion_plato`, `tiempo_preparacion`) VALUES
(1, 1, 'Sandwich Chacarero', 1, 1, 2500, 'Sandwich hecho con churrasco, porotos verdes, tomate, mayonesa.', '20 min'),
(2, 3, 'Antipasto Piccola ', 9, 1, 6999, 'Exquisita  combinación  de  quesos,  jamón  crudo,  jamón  \nde pierna, crujientes galletitas, acompañado por deliciosa \nsalsa golf.\n¡La mejor idea para comenzar una gran comida!', '20 min'),
(3, 3, 'Cocktail de Camarones  Ecuatorianos  ', 9, 1, 4999, 'Exquisitos     y     frescos     camarones     ecuatorianos     \r\nacompañados por una suave \r\nmayonesa al limón.', '20 min'),
(4, 3, 'Aritos de Milán', 9, 1, 2299, 'Crujientes  aritos  de  cebolla  fritos,  acompañados  con  salsa  \r\nde soya.', '10 min'),
(5, 3, 'Provoleta ', 9, 1, 2799, 'Fino queso provoleta fundido con delicadas especias.', '10 min'),
(6, 3, 'Ensalada Italiana ', 8, 1, 2999, 'Las  más  frescas  lechugas  gourmet  combinadas  con  la  \r\nmejor  selección  de  rojos  tomates  en  gajos,  paltas,  ricas  \r\naceitunas  deshuesadas  y  arvejas,  decorada  con  queso  \r\nparmesano y crutones.', '15 min'),
(7, 3, 'Ensalada Primavera', 8, 1, 3899, 'La mejor selección de camarones unidos a los más frescos \r\ny coloridos vegetales. Lechuga gourmet, tomate, palmitos, \r\nchoclo,   zanahoria   y   champiñones,   acompañados   por   \r\ncubitos de suave quesillo.', '15 min'),
(8, 3, 'Salpicón de Ave', 8, 1, 3999, 'Delicioso pollo grillé en trozos sobre una cama de frescos \r\ntomates  en  cubitos  y  lechuga  gourmet,  acompañado  por  \r\npapas vapor en su punto exacto.', '20 min'),
(9, 3, 'Ensalada César', 8, 1, 3999, 'La mejor selección de trocitos de ave, en una suave cama \r\nde  lechuga  con  crujientes  crutones,  queso  parmesano  y  \r\ndressing Cesár', '15 min'),
(10, 3, 'Arroz ', 6, 1, 1999, '', ''),
(11, 3, 'Puré ', 6, 1, 1999, '', ''),
(12, 3, 'Papas Fritas', 6, 1, 1999, '', ''),
(13, 3, 'Verduras Calientes', 6, 1, 1999, '', ''),
(14, 3, 'Choclo a la Mantequilla', 6, 1, 1999, '', ''),
(15, 3, 'Agregado a lo Pobre', 6, 1, 2499, '', ''),
(16, 3, 'Champiñones', 6, 1, 2499, '', ''),
(17, 3, 'Ensalada Surtida', 10, 1, 1999, '', ''),
(18, 3, 'Ensalada Lechuga', 10, 1, 1999, '', ''),
(19, 3, 'Tomate', 10, 1, 1999, '', ''),
(20, 3, 'Ensalada a la Chilena (Tomate y Cebolla)', 10, 1, 1999, '', ''),
(21, 3, 'Porotos Verdes', 10, 1, 1999, '', ''),
(22, 3, 'Choclo', 10, 1, 1999, '', ''),
(23, 3, 'Palmitos', 10, 1, 1999, '', ''),
(24, 3, 'Sopa de Champiñones', 2, 1, 2499, '', '15 min'),
(25, 3, 'Sopa Piccola', 2, 1, 1999, '', '15 min'),
(26, 3, 'Consomé de Carne', 2, 1, 1899, '', '15 min'),
(27, 3, 'Fontana di Pasta Especial ', 7, 1, 12999, 'Una deliciosa mezcla de las más finas pastas, hechas en \r\ncasa, con Lasagna, Panzotti, Gnocchi, Tortelleti, Ravioli y \r\nCannelloni,  con  un  delicioso  acompañamiento  de  Salsa  \r\nBolognesa,  un  toque  de  crema  y  queso  Parmesano  que  \r\ncompletan una extraordinaria Fontana.', '25 min'),
(28, 3, 'Fontana Di gnocchi', 7, 1, 10999, 'Suaves y delicados gnocchis al dente bañados en nuestra \r\ntradicional receta Italiana de salsa bolognesa', '20 min'),
(29, 3, 'Fontana di Pasta', 7, 1, 10999, '¡Perfecto  para  compartir!,  una  exquisita  combinación  de  \r\nnuestras frescas pastas caseras al dente: Ravioli, Gnocchi, \r\nCannelloni, Lasagna y Fettuccini bañadas en la tradicional \r\nSalsa Bolognesa, un toque de crema y queso Parmesano \r\npara completar esta gran combinación.', '20 min'),
(30, 3, 'Spaghetti con Salsa Bolognesa', 7, 1, 3299, 'Deliciosos  Spaghetti  bañados  en  la  tradicional  receta  \r\nitaliana de Salsa Bolognesa de la casa, con un toque de \r\ncrema y queso parmesano.', '15 min'),
(31, 3, 'Tortelleti de Carne', 7, 1, 3999, '(Salsa  Bolognesa  o  a  la  Crema).  Deliciosa  pasta  rellena  \r\ncon carne y salsa bolognesa, un toque de crema y cubierta \r\nde queso parmesano.', '15 min'),
(32, 3, 'Sorrentinos', 7, 1, 3999, 'Frescos  sorrentinos  rellenos  de  jamón  y  ricotta,  bañados  \ncon  nuestra  tradicional  receta  de  salsa  bolognesa,  un  \ntoque de crema y cubierta de queso parmesano.', '15 min'),
(33, 3, 'Fettuccini', 7, 1, 3699, '(Salsa Bolognesa o a la Crema)\r\nLos más frescos fettuccinis bañados con nuestra tradicional \r\nreceta  de  salsa  bolognesa,  un  toque  de  crema  y  queso  \r\nparmesano', '15 min'),
(34, 3, 'Tripasta Especial ', 7, 1, 4999, '(Salsa Bolognesa o a la Crema)\r\nLas tres mejores pastas  (Lasagna, Ravioli Y Panzotti de Pavo) con \r\nnuestra exquisita salsa bolognesa, un toque de crema y cubierta \r\nde queso parmesano', '20 min'),
(35, 3, 'Cannelloni de Carne y Espinaca ', 7, 1, 4799, '(Salsa   Bolognesa   o   a   la   Crema).   Los   más   frescos   \r\ncannellonis  caseros  rellenos  con  una  exquisita  mezcla  \r\nde carne y espinacas, bañados con salsa bolognesa y un \r\ntoque de crema y queso parmesano.', '20 min'),
(36, 3, 'gnocchi ', 7, 1, 3699, 'Suaves y delicados gnocchis de papas naturales al dente \r\nbañados  en  nuestra  tradicional  receta  italiana  de  salsa  \r\nbolognesa y un toque de crema  y queso parmesano.', '20 min'),
(37, 3, 'Panzotti de Pavo', 7, 1, 3999, 'Nuestros   ricos   Panzotti   rellenos   con   pavo   y   nueces   \r\ncubiertos  por  nuestra  tradicional  salsa  bolognesa  y  un  \r\ntoque de crema y queso parmesano', '20 min'),
(38, 3, 'Lasagna', 7, 1, 4799, 'Exquisito  plato  hecho  de  láminas  de  pasta  casera  con  \r\nnuestra exclusiva receta de salsa bolognesa, crema, queso \r\nparmesano, exquisita capa de carne y queso mantecoso.', '20 min'),
(39, 3, 'Fettuccini con  Carne Mechada ', 7, 1, 4699, 'Exquisitos   fettuccini   caseros   acompañados   por   una   \r\ndeliciosa carne mechada cocida en su propio jugo y bañada \r\nen nuestra tradicional salsa bolognesa.', '20 min'),
(40, 3, 'Parrillada', 3, 1, 23999, 'Nuestra  tradicional  parrillada  compuesta  por  la  mejor  \r\nselección  de  carnes  de  vacuno  y  cerdo  doradas  en  su  \r\npunto  exacto.  Además,  deliciosas  prietas,  pollo  y  chorizo  \r\nde la casa creado según nuestra tradicional receta Italiana, \r\ntodo   condimentado   con   el   más   exquisito   chimichurri   \r\nacompañado por papas cocidas.', '30 min'),
(41, 3, 'Parrillada Especial', 3, 1, 25999, 'Deliciosa  parrillada  compuesta  por  2  ricas  brochetas  de  \r\ncarne de vacuno y 2 jugosos biffe de chorizo grilladas en \r\nsu punto exacto y chorizo de la casa creado según nuestra \r\ntradicional receta Italiana, además acompañado por papas \r\ncocidas.', '30 min'),
(42, 3, 'Parrillada Piccola ', 3, 1, 24999, 'Nuestra  parrillada  insignia,  compuesta  por  3  deliciosos  \r\ntrozos  de  carne  de  vacuno  grillé,  chorizo  de  la  casa  \r\ncreado  según  las  antiguas  recetas  de  comida  Italiana  y  \r\nacompañada por papas cocidas.', '30 min'),
(43, 3, 'Costillitas', 3, 1, 6999, 'Exquisitas costillitas de cerdo al horno doradas en su punto \r\nexacto.', '20 min'),
(44, 3, 'Lomo a la Chilena', 3, 1, 8799, 'Exquisito  Lomo  Grillé  en  su  punto,  acompañado  por  la  \r\nclásica ensalada de tomate y cebolla, tradicional en toda \r\nmesa chilena.', '20 min'),
(45, 3, 'Lomo al Tocino ', 3, 1, 9799, 'Delicioso lomo, con finas tiritas de tocino acompañado\r\ncon exquisitas papas duquesa hechas en casa, \r\nhorneadas en su punto.', '20 min'),
(46, 3, 'Carne Mechada con Puré y Salsa Bolognesa ', 3, 1, 5799, 'Deliciosa  carne  de  vacuno  cocida  en  su  jugo,  bañada  \r\nen  nuestra  tradicional  salsa  bolognesa,  acompañada  \r\npor un exquisito puré de papas casero.', '25 min'),
(47, 3, 'Lomo con salsa piamontesa y puré ', 3, 1, 9799, 'Lomo grillado en su punto exacto, bañado en nuestra conocida salsa \r\ncon  cebollines,  champiñones,  ají  de  cacho  de  cabra  y  un  toque  de  \r\ncrema acompañado por suave puré de papas casero.', '25 min'),
(48, 3, 'Biffe Chorizo a lo Pobre', 3, 1, 9799, 'Delicioso    Biffe    chorizo    grillado    a    la    perfeción,    \r\nacompañado  por  cebollas  pluma  finamente  doradas, \r\nlas  más  crujientes  papas  fritas  caseras  y  dos  huevos  \r\nfritos en su punto exacto.', '25 min'),
(49, 3, 'Spesatino', 3, 1, 5999, 'Deliciosa carne de vacuno salteada en su punto, bañada \r\nen  nuestra  tradicional  salsa  bolognesa,  con  un  toque  de  \r\nperejil,  acompañado  por  las  más  crujientes  papas  fritas  \r\ncaseras.', '20 min'),
(50, 3, 'Pollo Apanado Piccola', 11, 1, 4699, 'Exquisitas  pechugas  de  pollo  apanadas  con  un  delicioso  \r\nbatido especial para lograr un crujiente y sabroso plato.', '20 min'),
(51, 3, 'Pechuga de Pollo a la Parrilla', 11, 1, 4699, 'Exquisitas   pechugas   de   pollo   grilladas   a   la   parrilla   \r\nlentamente hasta obtener su punto ideal.', '20 min'),
(52, 3, 'Pollo a la Piamontesa', 11, 1, 4999, 'Ricos trocitos de pollo flambeados a la perfección con \r\ncebollines y champiñones seleccionados, aderezados \r\ncon ají de cacho de cabra y un toque de crema.', '20 min'),
(53, 3, 'Congrio a la Piccola', 12, 1, 6999, 'Ricos trocitos del más fresco congrio del Pacífico cocidos \r\nen su caldo con tomate, queso parmesano y crema.', '30 min'),
(54, 3, 'Coctel Camarón Ecuatoriano', 12, 1, 4999, 'Exquisitos y frescos camarones ecuatorianos acompañados \r\npor una suave salsa golf.', '20 min'),
(55, 3, 'Ostiones Apanados', 12, 1, 6999, 'La  selección  de  los  más  frescos  y  delicados  ostiones  \r\napanados servidos con salsa de soya.', '15 min'),
(56, 3, 'Congrio Della Nonna', 12, 1, 6999, 'El  más  fresco  congrio  especialmente  seleccionado,  con  \r\ncebollines y tomates naturales, cocinado al vino blanco y \r\ncon un toque de crema.', '25 min'),
(57, 3, 'Congrio Frito con Papas Fritas', 12, 1, 6999, 'Fresco filete de congrio frito acompañado por crujientes \r\npapas fritas.', '20 min'),
(58, 3, 'Profiterolli', 4, 1, 2499, 'Exquisitas masas de buñuelo rellenas con crema de vainilla \r\ny deliciosa crema chantilly, bañadas en una suave salsa de \r\nchocolate espolvoreada con azúcar flor.', '15 min'),
(59, 3, 'Cheesecake', 4, 1, 2499, 'Exquisito trozo de suave chessecake decorado con toques \r\nde crema chantilly y chocolate, sobre deliciosa salsa.', '15 min'),
(60, 3, 'Tiramisú ', 4, 1, 24999, 'Exquisito  bizcocho  de  champagne  remojado  \r\nen café con amaretto, queso crema y zabaione \r\nde huevo sobre salsa de chocolate y decorado \r\ncon toques de crema chantilly.', '15 min'),
(61, 3, 'Torta Chocolate', 4, 1, 2499, 'Delicioso  bizcocho  de  chocolate  relleno  con  crema  de  \r\nchocolate y mermelada de frambuesa y manjar, bañado en \r\nchocolate.', '15 min'),
(62, 3, 'Torta Mil Hojas', 4, 1, 2499, 'Delicioso  trozo  de  torta  mil  hojas  relleno  con  nuestro  \r\nexquisito   manjar   casero   sobre   salsa   de   chocolate   y   \r\ndecorado con toques de crema chantilly.', '15 min');

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
(1, 'administrador'),
(2, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `id_restaurant` int(11) NOT NULL,
  `nombre_restaurant` varchar(40) NOT NULL,
  `info_restaurant` varchar(100) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `num_contacto` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `calificacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`id_restaurant`, `nombre_restaurant`, `info_restaurant`, `id_comuna`, `num_contacto`, `email`, `calificacion`) VALUES
(1, 'Restaurant Al Paso', 'Restaurant que ofrece comida rápida para servir y llevar. Proporcionamos una amplia variedad de comi', 1, 1234123, 'alpaso@gmail.com', ''),
(2, 'Restaurant Sabores del Mundo', 'Restaurant que proporciona comidas gourmet de todos tipos.\r\nEspecializados en carnes.', 2, 32123, 'sabores@live.cl', ''),
(3, 'La Piccola Italia', 'Restaurant internacional que se especializa en comida Italiana.', 1, 543213, 'piccola@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud`
--

CREATE TABLE `tbl_solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `total_cuenta` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado_solicitud` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `password_usuario` varchar(30) NOT NULL,
  `id_privilegio` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario_restaurant`
--

INSERT INTO `tbl_usuario_restaurant` (`id_usuario`, `estado_usuario`, `nombre_usuario`, `password_usuario`, `id_privilegio`, `id_restaurant`) VALUES
(1, '1', 'dguajardo', 'alboadicto', 1, 3),
(2, '1', 'prueba', '1234', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_calificacion_restorant`
--
ALTER TABLE `tbl_calificacion_restorant`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `tbl_calificacion_restorant_ibfk_1` (`id_restorant`),
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
  ADD UNIQUE KEY `id_solicitud` (`id_solicitud`),
  ADD KEY `id_solicitud_2` (`id_solicitud`),
  ADD KEY `tbl_detalle_solicitud_ibfk_2` (`id_plato`);

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
  ADD KEY `tbl_restaurant_ibfk_1` (`id_comuna`);

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
  ADD UNIQUE KEY `id_privilegio` (`id_privilegio`),
  ADD KEY `id_restaurant` (`id_restaurant`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_calificacion_restorant`
--
ALTER TABLE `tbl_calificacion_restorant`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_comuna`
--
ALTER TABLE `tbl_comuna`
  MODIFY `id_comuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_detalle_solicitud`
--
ALTER TABLE `tbl_detalle_solicitud`
  MODIFY `id_detalle_solicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_imagen_plato`
--
ALTER TABLE `tbl_imagen_plato`
  MODIFY `id_imagen_plato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_imagen_restaurant`
--
ALTER TABLE `tbl_imagen_restaurant`
  MODIFY `id_imagen_restaurant` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_plato`
--
ALTER TABLE `tbl_plato`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `tbl_privilegio`
--
ALTER TABLE `tbl_privilegio`
  MODIFY `id_privilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `id_restaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_plato`
--
ALTER TABLE `tbl_tipo_plato`
  MODIFY `id_tipo_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario_restaurant`
--
ALTER TABLE `tbl_usuario_restaurant`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_detalle_solicitud`
--
ALTER TABLE `tbl_detalle_solicitud`
  ADD CONSTRAINT `tbl_detalle_solicitud_ibfk_1` FOREIGN KEY (`id_solicitud`) REFERENCES `tbl_solicitud` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detalle_solicitud_ibfk_2` FOREIGN KEY (`id_plato`) REFERENCES `tbl_plato` (`id_plato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `tbl_solicitud_ibfk_2` FOREIGN KEY (`id_restaurant`) REFERENCES `tbl_restaurant` (`id_restaurant`);

--
-- Filtros para la tabla `tbl_usuario_restaurant`
--
ALTER TABLE `tbl_usuario_restaurant`
  ADD CONSTRAINT `tbl_usuario_restaurant_ibfk_1` FOREIGN KEY (`id_privilegio`) REFERENCES `tbl_privilegio` (`id_privilegio`),
  ADD CONSTRAINT `tbl_usuario_restaurant_ibfk_2` FOREIGN KEY (`id_restaurant`) REFERENCES `tbl_restaurant` (`id_restaurant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
