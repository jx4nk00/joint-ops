-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2013 a las 21:30:46
-- Versión del servidor: 5.1.70-cll
-- Versión de PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `opizarro_jo_produccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE IF NOT EXISTS `anticipos` (
  `id_anticipos` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador de anticipos',
  `id_miembros` int(3) NOT NULL COMMENT 'identificador del miembro',
  `id_liquidaciones` int(3) NOT NULL COMMENT 'identificación de la liquidación',
  `valor_anticipo` int(7) DEFAULT NULL COMMENT 'valor monetario del anticipo',
  PRIMARY KEY (`id_anticipos`),
  KEY `anticipos_FKIndex1` (`id_liquidaciones`),
  KEY `anticipos_FKIndex2` (`id_miembros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id_banco` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador del banco',
  `nombre_banco` varchar(100) DEFAULT NULL COMMENT 'nombre propio de la institución bancaria',
  PRIMARY KEY (`id_banco`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `nombre_banco`) VALUES
(1, 'Banco de Chile'),
(2, 'Banco BBVA'),
(3, 'Banco Santander'),
(4, 'Banco del Desarrollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_servicio`
--

CREATE TABLE IF NOT EXISTS `codigos_servicio` (
  `id_codigo` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador del código',
  `codigo` varchar(30) DEFAULT NULL COMMENT 'código único de trabajo ',
  `f_creacion` date DEFAULT NULL COMMENT 'fecha de creación del código',
  PRIMARY KEY (`id_codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `codigos_servicio`
--

INSERT INTO `codigos_servicio` (`id_codigo`, `codigo`, `f_creacion`) VALUES
(1, 'OPS-001-13-1-2-Valparaiso', '2013-09-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_miembros`
--

CREATE TABLE IF NOT EXISTS `datos_miembros` (
  `id_datos` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador de los datos del miembro',
  `telefono` varchar(10) DEFAULT NULL COMMENT 'número de teléfono del miembro',
  `correo` varchar(30) DEFAULT NULL COMMENT 'correo electrónico del miembro',
  `cta_corriente` varchar(50) DEFAULT NULL COMMENT 'cuenta corriente del miembro',
  PRIMARY KEY (`id_datos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `datos_miembros`
--

INSERT INTO `datos_miembros` (`id_datos`, `telefono`, `correo`, `cta_corriente`) VALUES
(1, '11111111', 'juanka.rk@gmail.com', '123123-1-1'),
(2, '22222222', 'omar.pizarro.spreng@gmail.com', '24234-234-234'),
(3, '11111111', 'testing@sqa.cl', '123123123-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_empresa`
--

CREATE TABLE IF NOT EXISTS `gastos_empresa` (
  `id_gastos_empresa` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador del gasto de empresa',
  `id_liquidaciones` int(3) NOT NULL COMMENT 'identificación de la liquidación',
  `id_otros_gastos` int(3) NOT NULL COMMENT 'identificador de otros gastos',
  `id_inspectores_ayudantes` int(3) NOT NULL COMMENT 'identificación del inspector ayudante',
  `id_gc_informes` int(3) NOT NULL COMMENT 'identificador de los gastos por confección de informe',
  `id_impresiones` int(3) NOT NULL COMMENT 'identificador de impresiones',
  `id_rendiciones_de_gastos` int(3) NOT NULL COMMENT 'identificador de la rendición de gastor',
  `detalle` varchar(200) DEFAULT NULL COMMENT 'detalle del gasto de empresa',
  `valor` int(7) DEFAULT NULL COMMENT 'valor monetario del gasto de empresa',
  PRIMARY KEY (`id_gastos_empresa`),
  KEY `gastos_empresa_FKIndex1` (`id_rendiciones_de_gastos`),
  KEY `gastos_empresa_FKIndex2` (`id_impresiones`),
  KEY `gastos_empresa_FKIndex3` (`id_gc_informes`),
  KEY `gastos_empresa_FKIndex4` (`id_inspectores_ayudantes`),
  KEY `gastos_empresa_FKIndex5` (`id_otros_gastos`),
  KEY `gastos_empresa_FKIndex6` (`id_liquidaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_propios`
--

CREATE TABLE IF NOT EXISTS `gastos_propios` (
  `id_gastos_propios` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identifación de los gastos propios',
  `id_tipos_gp` int(3) NOT NULL COMMENT 'identificador del tipo de gasto propio',
  `id_gastos_empresa` int(3) NOT NULL COMMENT 'identificador del gasto de empresa',
  `valor` int(7) DEFAULT NULL COMMENT 'valor monetario del gasto propio',
  `detalle` varchar(100) DEFAULT NULL COMMENT 'detalle del gasto propio',
  PRIMARY KEY (`id_gastos_propios`),
  KEY `gastos_propios_FKIndex1` (`id_gastos_empresa`),
  KEY `gastos_propios_FKIndex2` (`id_tipos_gp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gc_informes`
--

CREATE TABLE IF NOT EXISTS `gc_informes` (
  `id_gc_informes` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador del gasto por confección de informe',
  `detalle` varchar(200) DEFAULT NULL COMMENT 'detalle del gasto por confección de informe',
  `total_gastos` int(7) DEFAULT NULL COMMENT 'valor monetario del total de gasto por confección de informe',
  `inspector` tinyint(1) DEFAULT NULL COMMENT 'identificador si el gasto fue por un inspector o gente',
  PRIMARY KEY (`id_gc_informes`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `gc_informes`
--

INSERT INTO `gc_informes` (`id_gc_informes`, `detalle`, `total_gastos`, `inspector`) VALUES
(1, 'qwer', 1, 0),
(2, 'qwer', 1, 0),
(3, 'qwer', 1, 0),
(4, 'eqweqwkelÃ±qwekÃ±lqweÃ±l', 123123, 0),
(5, 'dasdasdas', 4343, 1),
(6, '1', 1, 0),
(7, '9', 9, 0),
(8, '4', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE IF NOT EXISTS `impresiones` (
  `id_impresiones` int(3) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la impresión',
  `valor_hoja` int(4) DEFAULT NULL COMMENT 'valor monetario de 1 hoja',
  `cant_hojas` int(4) DEFAULT NULL COMMENT 'cantidad de hojas utilizadas en el informe',
  `num_copias` int(4) DEFAULT NULL COMMENT 'cantidad de informes copiados',
  `detalle` varchar(200) DEFAULT NULL COMMENT 'detalle del proceso de impresión',
  `inspector` tinyint(1) DEFAULT NULL COMMENT 'identificador si el informe fue almacenado por un inspector o gerente',
  PRIMARY KEY (`id_impresiones`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `impresiones`
--

INSERT INTO `impresiones` (`id_impresiones`, `valor_hoja`, `cant_hojas`, `num_copias`, `detalle`, `inspector`) VALUES
(1, 1, 1, 1, '1', 0),
(2, 1, 1, 1, '1', 0),
(3, 1, 1, 1, '1', 0),
(4, 1, 1, 1, '1', 0),
(5, 1, 1, 1, '1', 0),
(6, 1, 1, 1, '1', 0),
(7, 1, 1, 1, '1', 0),
(8, 1, 1, 1, '1', 0),
(9, 50, 324, 121, 'dadasdasd', 0),
(10, 400, 70, 5, 'dssfs', 1),
(11, 1, 1, 1, '1', 0),
(12, 9, 9, 9, '9', 0),
(13, 4, 4, 4, '4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
  `id_informes` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Identificación de Informe',
  `id_proyectos` int(3) NOT NULL COMMENT 'Identificación de Proyectos',
  `ruta` varchar(100) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Dirección remota donde aloja el informe',
  PRIMARY KEY (`id_informes`),
  KEY `informes_FKIndex1` (`id_proyectos`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id_informes`, `id_proyectos`, `ruta`) VALUES
(1, 0, 'informes/221-24-09-2013-Control de Robots móviles.docx'),
(2, 14, 'informes/348-24-09-2013-Control de Robots mÃ³viles.docx'),
(3, 14, 'informes/477-24-09-2013-Control de Robots móviles.docx'),
(4, 1, 'informes/370-24-09-2013-examen.docx'),
(5, 13, 'informes/603-24-09-2013-examen.docx'),
(6, 17, 'informes/800-26-09-2013-Resumen ejecutivo.pdf'),
(7, 18, 'informes/874-03-10-2013-build.txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectores_ayudantes`
--

CREATE TABLE IF NOT EXISTS `inspectores_ayudantes` (
  `id_inspectores_ayudantes` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Identificación de Inspectores ayudantes',
  `id_miembros` int(3) NOT NULL COMMENT 'Identificación de miembros',
  `id_liquidaciones` int(3) NOT NULL COMMENT 'Identificación de liquidaciones',
  `pago` int(7) DEFAULT NULL COMMENT 'Valor monetario a cancelar para el inspector',
  `inspector` tinyint(1) DEFAULT NULL COMMENT 'Identificación si el ayudante es inspector o gerente',
  PRIMARY KEY (`id_inspectores_ayudantes`),
  KEY `inspectores_ayudantes_FKIndex1` (`id_miembros`),
  KEY `inspectores_ayudantes_FKIndex2` (`id_liquidaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE IF NOT EXISTS `liquidaciones` (
  `id_liquidaciones` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación de liquidaciones',
  `id_proyectos` int(3) NOT NULL COMMENT 'Indentificación de proyectos',
  `id_porce_acuerdos` int(3) NOT NULL COMMENT 'Identificación del porcentaje de acuerdos',
  `id_valor_dolar` int(3) NOT NULL COMMENT 'Indentificación del valor del dolar',
  `id_otros_gastos` int(3) NOT NULL COMMENT 'Indentificación de otros gastos',
  `id_impresiones` int(3) NOT NULL COMMENT 'Indentificación de impresiones',
  `id_rendiciones_de_gastos` int(3) NOT NULL COMMENT 'Indentificación de las rendiciones de gastos',
  `id_valores_facturados` int(3) NOT NULL COMMENT 'Indentificación de los valores facturados',
  `id_gc_informes` int(3) NOT NULL COMMENT 'Indentificación de los gastos de confección del informes',
  `numero_liq` int(4) DEFAULT NULL COMMENT 'Numero de la liquidación',
  `fecha_creacion` date DEFAULT NULL COMMENT 'Fecha de la creación de la liquidación',
  `nombre_servicio` varchar(50) DEFAULT NULL COMMENT 'Nombre de servicio de la liquidación',
  `ref_cliente` varchar(50) DEFAULT NULL COMMENT 'Referencia del cliente para la liquidación',
  `servicio` varchar(200) DEFAULT NULL COMMENT 'Servicio realizado en la liquidación',
  `num_cont` int(3) DEFAULT NULL COMMENT 'Numero de contenedores revisados',
  `turnos_trabajados` int(2) DEFAULT NULL COMMENT 'Cantidad de turnos trabajados en el servicio',
  `tarifado` varchar(100) DEFAULT NULL COMMENT 'Valor monetario del costo del servicio',
  `activo` tinyint(1) DEFAULT NULL COMMENT 'Índice de liquidación vigente o cancelada',
  PRIMARY KEY (`id_liquidaciones`),
  KEY `liquidaciones_FKIndex3` (`id_porce_acuerdos`),
  KEY `liquidaciones_FKIndex4` (`id_otros_gastos`),
  KEY `liquidaciones_FKIndex5` (`id_valor_dolar`),
  KEY `liquidaciones_FKIndex6` (`id_impresiones`),
  KEY `liquidaciones_FKIndex7` (`id_gc_informes`),
  KEY `liquidaciones_FKIndex8` (`id_rendiciones_de_gastos`),
  KEY `liquidaciones_FKIndex9` (`id_valores_facturados`),
  KEY `liquidaciones_FKIndex10` (`id_proyectos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`id_liquidaciones`, `id_proyectos`, `id_porce_acuerdos`, `id_valor_dolar`, `id_otros_gastos`, `id_impresiones`, `id_rendiciones_de_gastos`, `id_valores_facturados`, `id_gc_informes`, `numero_liq`, `fecha_creacion`, `nombre_servicio`, `ref_cliente`, `servicio`, `num_cont`, `turnos_trabajados`, `tarifado`, `activo`) VALUES
(1, 18, 1, 0, 18, 12, 18, 7, 7, 1, '2013-10-15', NULL, '9', NULL, 9, 9, '9', 1),
(2, 6, 1, 1, 1, 1, 1, 1, 1, 8, '2013-10-15', NULL, 'Juanka CLiente', NULL, 1, 1, '1', 1),
(3, 24, 1, 0, 19, 13, 19, 8, 8, 9, '2013-10-17', NULL, '4', NULL, 4, 44, '4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `id_lugares` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación de lugares',
  `nombre_lugar` varchar(100) DEFAULT NULL COMMENT 'Nombre propio del puerto donde se realiza el servicio',
  PRIMARY KEY (`id_lugares`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id_lugares`, `nombre_lugar`) VALUES
(1, 'Valparaiso'),
(2, 'San Antonio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del mensaje',
  `mensaje` varchar(200) DEFAULT NULL COMMENT 'Descripción del mensaje',
  PRIMARY KEY (`id_mensaje`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `id_miembros` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del miembro',
  `id_banco` int(3) NOT NULL COMMENT 'Indentificación del banco',
  `id_privilegio` int(3) NOT NULL COMMENT 'Indentificación del privilegio',
  `id_usuarios` int(3) NOT NULL COMMENT 'Indentificación del usuario',
  `id_datos` int(3) NOT NULL COMMENT 'Indentificación de los datos',
  `p_nombre` varchar(20) DEFAULT NULL COMMENT 'Primer nombre del miembro',
  `s_nombre` varchar(20) DEFAULT NULL COMMENT 'Segundo nombre del miembro',
  `apellido_p` varchar(20) DEFAULT NULL COMMENT 'Apellido paterno del miembro',
  `apellido_m` varchar(20) DEFAULT NULL COMMENT 'Apellido materno del miembro',
  `rut` varchar(10) DEFAULT NULL COMMENT 'Rut del miembro',
  `f_nac` date DEFAULT NULL COMMENT 'Fecha de nacimiento',
  `f_creacion` date DEFAULT NULL COMMENT 'Fecha de creación',
  `activo` tinyint(1) DEFAULT NULL COMMENT 'Índice de miembro vigente o cancelado',
  PRIMARY KEY (`id_miembros`),
  KEY `miembros_FKIndex1` (`id_usuarios`),
  KEY `miembros_FKIndex2` (`id_banco`),
  KEY `miembros_FKIndex3` (`id_privilegio`),
  KEY `miembros_FKIndex4` (`id_datos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id_miembros`, `id_banco`, `id_privilegio`, `id_usuarios`, `id_datos`, `p_nombre`, `s_nombre`, `apellido_p`, `apellido_m`, `rut`, `f_nac`, `f_creacion`, `activo`) VALUES
(1, 1, 1, 1, 1, 'juan', 'carlos', 'garces', 'bernt', '11111111-8', '1991-08-23', '2013-09-03', 1),
(2, 2, 2, 2, 2, 'omar', 'ignacio', 'pizarro', 'spreng', '33333333-8', '1988-09-21', '2013-09-03', 1),
(3, 1, 3, 3, 3, 'Testing', 'Calidad', 'Unab', '2013', '11111111-1', '1990-09-23', '2013-09-23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_gastos`
--

CREATE TABLE IF NOT EXISTS `otros_gastos` (
  `id_otros_gastos` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación de otros gastos',
  `detalle` varchar(200) DEFAULT NULL COMMENT 'Detalle del gasto',
  `valor` int(7) DEFAULT NULL COMMENT 'Valor monetario del gasto',
  `inspector` tinyint(1) DEFAULT NULL COMMENT 'Identificación del gasto realizado por un inspector o un gerente',
  PRIMARY KEY (`id_otros_gastos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `otros_gastos`
--

INSERT INTO `otros_gastos` (`id_otros_gastos`, `detalle`, `valor`, `inspector`) VALUES
(1, 'dscfsdvxv', 11, 0),
(2, 'dscfsdvxv', 11, 0),
(3, 'dscfsdvxv', 11, 0),
(4, 'dscfsdvxv', 11, 0),
(5, 'dscfsdvxv', 11, 0),
(6, 'qwer', 1, 0),
(7, 'qwer', 1, 0),
(8, 'qwer', 1, 0),
(9, 'qwer', 1, 0),
(10, 'qwer', 1, 0),
(11, 'qwer', 1, 0),
(12, 'qwer', 1, 0),
(13, 'qwer', 1, 0),
(14, 'qwer', 1, 0),
(15, 'qeqweqwe', 1231, 0),
(16, 'dasdasdad', 5555, 1),
(17, '1', 1, 0),
(18, '9', 9, 0),
(19, '4', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porce_acuerdos`
--

CREATE TABLE IF NOT EXISTS `porce_acuerdos` (
  `id_porce_acuerdos` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación de porcentaje de acuerdos',
  `porcentaje` decimal(4,2) DEFAULT NULL COMMENT 'Valor porcentual del acuerdo',
  PRIMARY KEY (`id_porce_acuerdos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id_privilegio` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del privilegio',
  `nombre_privilegio` varchar(50) DEFAULT NULL COMMENT 'Nombre que describe el rango del privilegio',
  `tipo` int(1) DEFAULT NULL COMMENT 'Valor numérico asignado al privilegio',
  PRIMARY KEY (`id_privilegio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id_privilegio`, `nombre_privilegio`, `tipo`) VALUES
(1, 'Gerente', 1),
(2, 'Inspector', 2),
(3, 'Administrador', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_proyectos` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del proyecto',
  `id_lugares` int(3) NOT NULL COMMENT 'Indentificación del lugar',
  `id_miembros` int(3) NOT NULL COMMENT 'Indentificación del miembro',
  `id_codigo` int(3) NOT NULL COMMENT 'Indentificación del código',
  `nombre_proyecto` varchar(100) DEFAULT NULL COMMENT 'Nombre asignado al proyecto',
  `nombre_nave` varchar(50) DEFAULT NULL COMMENT 'Nombre de la nave',
  `fecha_inicio` date DEFAULT NULL COMMENT 'Fecha de inicio del proyecto',
  `fecha_termino` date DEFAULT NULL COMMENT 'Fecha estimada del termino del proyecto',
  `descripcion` longtext COMMENT 'Descripción del proyecto',
  PRIMARY KEY (`id_proyectos`),
  KEY `proyectos_FKIndex1` (`id_codigo`),
  KEY `proyectos_FKIndex2` (`id_miembros`),
  KEY `proyectos_FKIndex3` (`id_lugares`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyectos`, `id_lugares`, `id_miembros`, `id_codigo`, `nombre_proyecto`, `nombre_nave`, `fecha_inicio`, `fecha_termino`, `descripcion`) VALUES
(1, 1, 1, 1, 'Juanka Proyecto', 'Titatic', '2013-09-10', '2013-09-25', 'Este es un Proyecto de Prueba'),
(2, 1, 1, 1, 'Juanka Proyecto', 'Titatic', '2013-09-10', '2013-09-09', 'Este es un Proyecto de Prueba'),
(3, 1, 1, 1, 'Proyecto desde la web', 'Nave desde la web', '0000-00-00', '0000-00-00', 'DescripciÃ³n desde la WEB'),
(4, 1, 1, 1, 'asdasdasd', 'asdasdasd', '2013-09-10', '2013-09-24', 'asdasdasdasdad'),
(5, 1, 1, 1, 'Omar Project', 'Nave de Omar', '2013-09-10', '2013-09-30', 'Esta es la nave de Omar pizarro, destruyanla!'),
(6, 1, 2, 1, 'Veamos', 'Nave nueva', '2013-09-11', '2013-10-16', 'BLA BLA BLA!'),
(7, 2, 1, 1, 'qwert', 'qwer', '2013-09-11', '2013-09-02', 'qwertyu'),
(8, 2, 1, 1, 'vbvb', 'vbvbvb', '2013-09-11', '2013-09-30', 'vbvbvb'),
(9, 2, 1, 1, 'vbvb', 'vbvbvb', '2013-09-11', '2013-09-30', 'vbvbvb'),
(10, 2, 1, 1, 'tytty', 'tytyty', '2013-09-11', '2013-09-18', 'tytytytty'),
(11, 2, 1, 1, 'tytty', 'tytyty', '2013-09-11', '2013-09-18', 'tytytytty'),
(12, 2, 1, 1, 'tytty', 'tytyty', '2013-09-11', '2013-09-18', 'tytytytty'),
(13, 1, 2, 1, 'Proyecto Test de Servicios', 'Esta es mi nave', '2013-09-11', '2013-09-29', 'Este proyecto serÃ¡ de prueba '),
(14, 2, 1, 1, 'Aquiles', 'adsdasdasd', '2013-09-04', '2013-09-09', 'adasdasdsadasdd'),
(15, 1, 2, 1, 'proyecto de titulo', 'aquiles2', '2013-09-12', '2013-09-30', 'blablablablabla'),
(16, 1, 2, 1, 'Hola Amigos!', 'Nave para Tutorial', '2013-09-13', '2013-09-30', 'Hola amigos de la pagina WEB! '),
(17, 1, 2, 1, 'Guaton', 'nave guaton', '2013-09-17', '2013-09-30', 'ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD   ASD '),
(18, 2, 1, 1, 'Hito1', 'hito111', '2013-10-03', '2013-10-04', 'HGJHGJGJHGJH'),
(19, 0, 0, 0, '', '', '0000-00-00', '0000-00-00', ''),
(20, 2, 1, 1, 'clasesnuevas', 'nave clase', '2013-10-04', '2013-10-31', 'gsdfgsfdgsfgsdfgsdfggsdfgsfdgsfgsdfgsdfggsdfgsfdgsfgsdfgsdfggsdfgsfdgsfgsdfgsdfggsdfgsfdgsfgsdfgsdfg'),
(21, 2, 1, 1, 'Juanka Project', 'Juanka Nave', '2013-10-09', '2013-10-31', 'DescripciÃ³n DescripciÃ³n DescripciÃ³n DescripciÃ³n DescripciÃ³n DescripciÃ³n DescripciÃ³n Descripci'),
(22, 2, 1, 1, 'lorem', 'lorem', '2013-10-09', '2013-10-31', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labor'),
(23, 2, 1, 1, 'lorem', 'lorem', '2013-10-09', '2013-10-31', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labor'),
(24, 2, 1, 1, '123123123123123', 'CTCTCTCTCTCTCTCTCTCT', '2013-10-09', '2013-10-31', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id_registro` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del registro',
  `id_miembros` int(3) DEFAULT NULL COMMENT 'Indentificación del miembro',
  `detalle` varchar(200) DEFAULT NULL COMMENT 'Detalle del registro',
  PRIMARY KEY (`id_registro`),
  KEY `registros_FKIndex1` (`id_miembros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendiciones_de_gastos`
--

CREATE TABLE IF NOT EXISTS `rendiciones_de_gastos` (
  `id_rendiciones_de_gastos` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación de la rendición de gasto',
  `codigo_rend` varchar(50) DEFAULT NULL COMMENT 'Código de rendición de gastos',
  `total_rend` int(7) DEFAULT NULL COMMENT 'Valor monetario del total de la rendición de gastos',
  `inspector` tinyint(1) DEFAULT NULL COMMENT 'Identificación de la rendición elaborada por un inspector o un gerente',
  PRIMARY KEY (`id_rendiciones_de_gastos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `rendiciones_de_gastos`
--

INSERT INTO `rendiciones_de_gastos` (`id_rendiciones_de_gastos`, `codigo_rend`, `total_rend`, `inspector`) VALUES
(1, 'wer', 11, 0),
(2, 'wer', 11, 0),
(3, 'wer', 11, 0),
(4, 'wer', 11, 0),
(5, 'wer', 11, 0),
(6, 'qwerty', 1, 0),
(7, 'qwerty', 1, 0),
(8, 'qwerty', 1, 0),
(9, 'qwerty', 1, 0),
(10, 'qwerty', 1, 0),
(11, 'qwerty', 1, 0),
(12, 'qwerty', 1, 0),
(13, 'qwerty', 1, 0),
(14, 'qwerty', 1, 0),
(15, 'qeweqweq', 12312, 0),
(16, 'fsdfsdfsdf', 32323, 1),
(17, '1', 1, 0),
(18, '9', 9, 0),
(19, '4', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del servicio',
  `id_miembros` int(3) NOT NULL COMMENT 'Indentificación del miembro',
  `id_proyectos` int(3) NOT NULL COMMENT 'Indentificación del proyecto',
  `nombre_servicio` varchar(100) DEFAULT NULL COMMENT 'Nombre del servicio',
  PRIMARY KEY (`id_servicio`),
  KEY `servicios_FKIndex1` (`id_proyectos`),
  KEY `servicios_FKIndex2` (`id_miembros`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `id_miembros`, `id_proyectos`, `nombre_servicio`) VALUES
(1, 1, 12, 'Servicio1'),
(2, 1, 12, 'Servicio2'),
(3, 1, 12, 'Servicio3'),
(4, 2, 13, 'Limpiar pantallas'),
(5, 2, 13, 'remover basura'),
(6, 2, 13, 'Servir comida'),
(7, 2, 13, 'Aseo de piezas'),
(8, 2, 15, 'servicio 1'),
(9, 2, 15, 'servicio 2'),
(10, 2, 15, 'servicio 3'),
(11, 2, 16, 'Servicio Video'),
(12, 2, 16, 'Segundo Servicio'),
(13, 2, 17, '12345'),
(14, 2, 17, 'asdfgh'),
(15, 1, 18, 'NOTA70'),
(16, 1, 18, 'ISAOIDAOSIDO'),
(17, 0, 0, ''),
(18, 0, 0, ''),
(19, 0, 0, ''),
(20, 0, 0, ''),
(21, 0, 0, ''),
(22, 0, 0, ''),
(23, 0, 0, ''),
(24, 1, 23, 'l1'),
(25, 1, 24, 'CT'),
(26, 1, 24, 'CT'),
(27, 1, 24, 'CT'),
(28, 1, 24, 'CT'),
(29, 1, 24, 'CT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_gp`
--

CREATE TABLE IF NOT EXISTS `tipos_gp` (
  `id_tipos_gp` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del tipo de gasto propio',
  `tipo` int(2) DEFAULT NULL COMMENT 'Valor numerico que representa el tipo de gasto propio',
  `nombre_tipo` varchar(100) DEFAULT NULL COMMENT 'Nombre del tipo del gasto propio',
  `descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción del tipo de gasto propio',
  PRIMARY KEY (`id_tipos_gp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del usuario',
  `username` varchar(40) DEFAULT NULL COMMENT 'Nombre de usuario',
  `pass` varchar(40) DEFAULT NULL COMMENT 'Contraseña encriptada con sha1',
  PRIMARY KEY (`id_usuarios`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `username`, `pass`) VALUES
(1, 'jx4nk00', '7275039246dd3d0d0af166c228429e6ecf798f0b'),
(2, 'kuos', '5a9f5bcf0ff39aedb75a70e060d3eda6ecc771f9'),
(3, 'sqauser', '526f5f67f3781a11f9c1a4b1eb0a84b4e2879b19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores_facturados`
--

CREATE TABLE IF NOT EXISTS `valores_facturados` (
  `id_valores_facturados` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación de los valores facturados',
  `fact_exenta` int(6) DEFAULT NULL COMMENT 'Valor de la factura exenta',
  `fact_afecta` int(6) DEFAULT NULL COMMENT 'Valor monetario de la factura afecta',
  `bol_honorario` int(6) DEFAULT NULL COMMENT 'Valor monetario de la boleta de honorario',
  `invoice` int(6) DEFAULT NULL COMMENT 'Valor monetario del invoice',
  `inspector` tinyint(1) DEFAULT NULL COMMENT 'Identificador de los valores ingresados por un inspector o un gerente',
  PRIMARY KEY (`id_valores_facturados`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `valores_facturados`
--

INSERT INTO `valores_facturados` (`id_valores_facturados`, `fact_exenta`, `fact_afecta`, `bol_honorario`, `invoice`, `inspector`) VALUES
(1, 1, 1, 1, 1, 0),
(2, 1, 1, 1, 1, 0),
(3, 1, 1, 1, 1, 0),
(4, 12312, 123123, 13123, 123123, 0),
(5, 34234, 2423423, 234234, 123123, 1),
(6, 1, 1, 1, 1, 0),
(7, 9, 9, 9, 9, 0),
(8, 4, 4, 4, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_dolar`
--

CREATE TABLE IF NOT EXISTS `valor_dolar` (
  `id_valor_dolar` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Indentificación del valor del dolar',
  `fecha_variacion` date DEFAULT NULL COMMENT 'Fecha de modificación del dolar',
  `valor` int(7) DEFAULT NULL COMMENT 'Valor monetario del dolar',
  PRIMARY KEY (`id_valor_dolar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         