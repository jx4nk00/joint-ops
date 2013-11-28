-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2013 a las 22:32:10
-- Versión del servidor: 5.0.96-community-log
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `opservic_jo_desarrollo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE IF NOT EXISTS `anticipos` (
  `id_anticipos` int(3) NOT NULL auto_increment,
  `valor_anticipo` int(7) default NULL,
  PRIMARY KEY  (`id_anticipos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id_banco` int(3) NOT NULL auto_increment,
  `nombre_banco` varchar(100) default NULL,
  PRIMARY KEY  (`id_banco`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `nombre_banco`) VALUES
(1, 'Banco de Chile'),
(2, 'Bando Santander'),
(3, ' Banco de Crédito e Inversiones (BCI)'),
(4, 'Corpbanca'),
(5, 'Scotiabank Chile'),
(6, 'Banco Bilbao Vizcaya Argentaria, Chile (BBVA)'),
(7, 'Banco del Estado de Chile (Banco Estado)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_servicio`
--

CREATE TABLE IF NOT EXISTS `codigos_servicio` (
  `id_codigo` int(3) NOT NULL auto_increment,
  `codigo` varchar(30) default NULL,
  `f_creacion` date default NULL,
  PRIMARY KEY  (`id_codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `codigos_servicio`
--

INSERT INTO `codigos_servicio` (`id_codigo`, `codigo`, `f_creacion`) VALUES
(1, 'OPS-TestCode', '2013-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_miembros`
--

CREATE TABLE IF NOT EXISTS `datos_miembros` (
  `id_datos` int(3) NOT NULL auto_increment,
  `telefono` varchar(10) default NULL,
  `correo` varchar(30) default NULL,
  `cta_corriente` varchar(50) default NULL,
  PRIMARY KEY  (`id_datos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `datos_miembros`
--

INSERT INTO `datos_miembros` (`id_datos`, `telefono`, `correo`, `cta_corriente`) VALUES
(1, '11111111', 'juanka.rk@gmail.com', '11111-1'),
(2, '11111111', 'omar.pizarro.spreng@gmail.com', '22222-22-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE IF NOT EXISTS `depositos` (
  `id_depositos` int(6) NOT NULL auto_increment,
  `id_miembros` int(3) NOT NULL,
  `id_anticipos` int(3) NOT NULL,
  `gastos_incurridos` int(6) default NULL,
  `retencion_bh` int(6) default NULL,
  `total_depositar` int(6) default NULL,
  PRIMARY KEY  (`id_depositos`),
  KEY `depositos_FKIndex1` (`id_anticipos`),
  KEY `depositos_FKIndex2` (`id_miembros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_empresa`
--

CREATE TABLE IF NOT EXISTS `gastos_empresa` (
  `id_gastos_empresa` int(3) NOT NULL auto_increment,
  `id_liquidaciones` int(3) NOT NULL,
  `gastos_traduccion` varchar(100) default NULL,
  `total_gastos_traduccion` int(6) default NULL,
  `work_in_office` varchar(100) default NULL,
  `total_wif` int(6) default NULL,
  `revision_entrega` varchar(100) default NULL,
  `total_re` int(6) default NULL,
  `entrega_envio` varchar(100) default NULL,
  `total_ee` int(6) default NULL,
  `gestion_comercial` varchar(100) default NULL,
  `total_gestion_comercial` int(6) default NULL,
  `administracion_contable` varchar(100) default NULL,
  `total_admin_contable` int(6) default NULL,
  `total_gastos_empresa` int(6) default NULL,
  PRIMARY KEY  (`id_gastos_empresa`),
  KEY `gastos_empresa_FKIndex6` (`id_liquidaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gc_informes`
--

CREATE TABLE IF NOT EXISTS `gc_informes` (
  `id_gc_informes` int(3) NOT NULL auto_increment,
  `detalle` varchar(200) default NULL,
  `total_gastos` int(7) default NULL,
  `inspector` tinyint(1) default NULL,
  PRIMARY KEY  (`id_gc_informes`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `gc_informes`
--

INSERT INTO `gc_informes` (`id_gc_informes`, `detalle`, `total_gastos`, `inspector`) VALUES
(1, 'GC 1', 1000, 1),
(2, 'GC 1', 1000, 1),
(3, 'GC 1', 1000, 1),
(4, 'GC 1', 1000, 1),
(5, 'GC 1', 1000, 1),
(6, 'GCI 2', 2, 1),
(7, '5', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honorarios_proforma`
--

CREATE TABLE IF NOT EXISTS `honorarios_proforma` (
  `id_honorarios_proforma` int(3) NOT NULL auto_increment,
  `id_proformas` int(3) NOT NULL,
  `fecha` date default NULL,
  `detalle_Servicio` varchar(200) NOT NULL,
  `id_lugar` int(3) NOT NULL,
  `id_participante` int(3) NOT NULL,
  `calificacion` varchar(4) default NULL,
  `unidad_cobro` varchar(50) default NULL,
  `valor_dolar` decimal(5,2) NOT NULL,
  `cant_htd` int(3) default NULL,
  `total` int(6) default NULL,
  PRIMARY KEY  (`id_honorarios_proforma`),
  KEY `honorarios_proforma_FKIndex1` (`id_proformas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `honorarios_proforma`
--

INSERT INTO `honorarios_proforma` (`id_honorarios_proforma`, `id_proformas`, `fecha`, `detalle_Servicio`, `id_lugar`, `id_participante`, `calificacion`, `unidad_cobro`, `valor_dolar`, `cant_htd`, `total`) VALUES
(1, 1, '0000-00-00', 'Detalle 1', 0, 0, 'S', 'Diario', 0.00, 1, 4),
(2, 1, '0000-00-00', 'detalle 1 ', 0, 0, 'M', 'Diario', 0.00, 2, 4),
(3, 1, '0000-00-00', 'Detalle Testin1', 3, 1, 'P', 'Diario', 500.00, 1, 500),
(4, 1, '0000-00-00', 'Detalle Testin1.1', 3, 2, 'M', '', 500.00, 2, 1000),
(5, 1, '2012-06-08', 'Invento 1', 5, 1, 'P', 'Diario', 515.00, 1, 515),
(6, 1, '2012-06-09', 'Invento 1', 2, 2, 'T', '', 515.00, 2, 1030),
(7, 1, '2012-07-14', 'Invento 1', 8, 0, 'M', '', 515.00, 3, 1545),
(8, 1, '2012-06-16', 'Invento 1', 9, 2, 'S', '', 515.00, 1, 515),
(9, 6, '2013-11-28', '1000animales', 3, 1, 'P', 'Diario', 500.25, 1, 500),
(10, 6, '2013-11-28', '1000animales1', 6, 2, 'T', 'Hora', 500.25, 2, 1001),
(11, 6, '2013-11-28', '1000animales2', 7, 2, 'M', 'Turno', 500.25, 3, 1501),
(12, 6, '2013-11-28', '1000animales3', 4, 1, 'S', 'Lump Sum', 500.25, 4, 2001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE IF NOT EXISTS `impresiones` (
  `id_impresiones` int(3) NOT NULL auto_increment,
  `valor_hoja` int(4) default NULL,
  `cant_hojas` int(4) default NULL,
  `num_copias` int(4) default NULL,
  `detalle` varchar(200) default NULL,
  `total_impresion` int(6) default NULL,
  `inspector` tinyint(1) default NULL,
  PRIMARY KEY  (`id_impresiones`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `impresiones`
--

INSERT INTO `impresiones` (`id_impresiones`, `valor_hoja`, `cant_hojas`, `num_copias`, `detalle`, `total_impresion`, `inspector`) VALUES
(1, 200, 123, 3, 'Detalle ImpresiÃ³n 1', NULL, 1),
(2, 200, 123, 3, 'Detalle ImpresiÃ³n 1', NULL, 1),
(3, 200, 123, 3, 'Detalle ImpresiÃ³n 1', NULL, 1),
(4, 200, 123, 3, 'Detalle ImpresiÃ³n 1', NULL, 1),
(5, 200, 123, 3, 'Detalle ImpresiÃ³n 1', NULL, 1),
(6, 2, 2, 2, '2', NULL, 1),
(7, 5, 5, 5, '5', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
  `id_informes` int(3) NOT NULL auto_increment,
  `id_proyectos` int(3) NOT NULL,
  `ruta` varchar(100) default NULL,
  PRIMARY KEY  (`id_informes`),
  KEY `informes_FKIndex1` (`id_proyectos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id_informes`, `id_proyectos`, `ruta`) VALUES
(1, 4, 'informes/391-27-11-2013-Reunión 30 de Octubre.jo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectores_ayudantes`
--

CREATE TABLE IF NOT EXISTS `inspectores_ayudantes` (
  `id_inspectores_ayudantes` int(3) NOT NULL auto_increment,
  `id_miembros` int(3) NOT NULL,
  `id_liquidaciones` int(3) NOT NULL,
  `pago` int(7) default NULL,
  `inspector` tinyint(1) default NULL,
  PRIMARY KEY  (`id_inspectores_ayudantes`),
  KEY `inspectores_ayudantes_FKIndex1` (`id_miembros`),
  KEY `inspectores_ayudantes_FKIndex2` (`id_liquidaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE IF NOT EXISTS `liquidaciones` (
  `id_liquidaciones` int(3) NOT NULL auto_increment,
  `id_proyectos` int(3) NOT NULL,
  `id_valor_dolar` int(3) NOT NULL,
  `id_otros_gastos` int(3) NOT NULL,
  `id_impresiones` int(3) NOT NULL,
  `id_rendiciones_de_gastos` int(3) NOT NULL,
  `id_valores_facturados` int(3) NOT NULL,
  `id_gc_informes` int(3) NOT NULL,
  `numero_liq` int(4) default NULL,
  `fecha_creacion` date default NULL,
  `ref_cliente` varchar(50) default NULL,
  `num_cont` int(3) default NULL,
  `turnos_trabajados` int(2) default NULL,
  `tarifado` varchar(100) default NULL,
  `total_inspectores` int(6) default NULL,
  `activo` tinyint(1) default NULL,
  PRIMARY KEY  (`id_liquidaciones`),
  KEY `liquidaciones_FKIndex4` (`id_otros_gastos`),
  KEY `liquidaciones_FKIndex5` (`id_valor_dolar`),
  KEY `liquidaciones_FKIndex6` (`id_impresiones`),
  KEY `liquidaciones_FKIndex7` (`id_gc_informes`),
  KEY `liquidaciones_FKIndex8` (`id_rendiciones_de_gastos`),
  KEY `liquidaciones_FKIndex9` (`id_valores_facturados`),
  KEY `liquidaciones_FKIndex10` (`id_proyectos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`id_liquidaciones`, `id_proyectos`, `id_valor_dolar`, `id_otros_gastos`, `id_impresiones`, `id_rendiciones_de_gastos`, `id_valores_facturados`, `id_gc_informes`, `numero_liq`, `fecha_creacion`, `ref_cliente`, `num_cont`, `turnos_trabajados`, `tarifado`, `total_inspectores`, `activo`) VALUES
(1, 1, 0, 0, 3, 3, 3, 3, 3, '0000-00-00', '2013-11-06', 0, 1, '1', 0, 1),
(2, 1, 0, 4, 4, 4, 4, 4, 4, '2013-11-06', 'Referencia1', 1, 1, 'Tarifado 1', 0, 1),
(3, 1, 1, 5, 5, 5, 5, 5, 5, '2013-11-06', 'Referencia1', 1, 1, 'Tarifado 1', 0, 1),
(4, 1, 1, 6, 6, 6, 6, 6, 6, '2013-11-06', 'Referencia 2', 2, 2, 'Tarifado 2', 14, 1),
(5, 4, 1, 7, 7, 7, 7, 7, 7, '2013-11-27', 'Referencia PC Nuevo', 123, 123, '123', 140, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones_servicios`
--

CREATE TABLE IF NOT EXISTS `liquidaciones_servicios` (
  `id_liquidaciones_servicios` int(3) NOT NULL auto_increment,
  `id_liquidaciones` int(3) NOT NULL,
  `valor_Facturado` int(6) default NULL,
  `total_gastos` int(6) default NULL,
  `utilidad` int(6) default NULL,
  `porcentaje_acuerdo` decimal(4,2) default NULL,
  `total_a_cancelar` int(6) default NULL,
  PRIMARY KEY  (`id_liquidaciones_servicios`),
  KEY `liquidaciones_servicios_FKIndex1` (`id_liquidaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `id_lugares` int(3) NOT NULL auto_increment,
  `nombre_lugar` varchar(100) character set utf8 default NULL,
  `direccion` varchar(100) character set utf8 default NULL,
  PRIMARY KEY  (`id_lugares`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id_lugares`, `nombre_lugar`, `direccion`) VALUES
(1, 'Puerto de Arica', 'SD'),
(2, 'Puerto de Iquique', 'SD'),
(3, 'Puerto de Antofagasta', 'SD'),
(4, 'Puerto de Caldera', 'SD'),
(5, 'Puerto de Coquimbo', 'SD'),
(6, 'Puerto de Valparaíso', 'SD'),
(7, 'Puerto de San Antonio', 'SD'),
(8, 'Puerto de Talcahuano', 'SD'),
(9, 'Puerto de Puerto Montt', 'SD'),
(10, 'Puerto de Castro', 'SD'),
(11, 'Puerto de Chacabuco', 'SD'),
(12, 'Puerto de Punta Arenas', 'SD'),
(13, 'Puerto de puerto Williams', 'SD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(3) NOT NULL auto_increment,
  `mensaje` varchar(200) default NULL,
  PRIMARY KEY  (`id_mensaje`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `id_miembros` int(3) NOT NULL auto_increment,
  `id_banco` int(3) NOT NULL,
  `id_privilegio` int(3) NOT NULL,
  `id_usuarios` int(3) NOT NULL,
  `id_datos` int(3) NOT NULL,
  `p_nombre` varchar(20) character set utf8 collate utf8_spanish_ci default NULL,
  `s_nombre` varchar(20) character set utf8 collate utf8_spanish_ci default NULL,
  `apellido_p` varchar(20) character set utf8 collate utf8_spanish_ci default NULL,
  `apellido_m` varchar(20) character set utf8 collate utf8_spanish_ci default NULL,
  `rut` varchar(10) default NULL,
  `f_nac` date default NULL,
  `f_creacion` date default NULL,
  `activo` tinyint(1) default NULL,
  PRIMARY KEY  (`id_miembros`),
  KEY `miembros_FKIndex1` (`id_usuarios`),
  KEY `miembros_FKIndex2` (`id_banco`),
  KEY `miembros_FKIndex3` (`id_privilegio`),
  KEY `miembros_FKIndex4` (`id_datos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id_miembros`, `id_banco`, `id_privilegio`, `id_usuarios`, `id_datos`, `p_nombre`, `s_nombre`, `apellido_p`, `apellido_m`, `rut`, `f_nac`, `f_creacion`, `activo`) VALUES
(1, 4, 1, 1, 1, 'Juan', 'Carlos', 'Garces', 'Bernt', '11111111-1', '1991-08-23', '2013-11-06', 1),
(2, 7, 1, 2, 2, 'Omar', 'Ignacio', 'Pizarro', 'Spreng', '11111111-1', '1988-09-21', '2013-11-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_gastos`
--

CREATE TABLE IF NOT EXISTS `otros_gastos` (
  `id_otros_gastos` int(3) NOT NULL auto_increment,
  `detalle` varchar(200) default NULL,
  `valor` int(7) default NULL,
  `inspector` tinyint(1) default NULL,
  PRIMARY KEY  (`id_otros_gastos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `otros_gastos`
--

INSERT INTO `otros_gastos` (`id_otros_gastos`, `detalle`, `valor`, `inspector`) VALUES
(1, 'Otros Gastos 1', 2000, 1),
(2, 'Otros Gastos 1', 2000, 1),
(3, 'Otros Gastos 1', 2000, 1),
(4, 'Otros Gastos 1', 2000, 1),
(5, 'Otros Gastos 1', 2001, 1),
(6, 'Otros Gastos 2', 2, 1),
(7, '5', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppms`
--

CREATE TABLE IF NOT EXISTS `ppms` (
  `id_ppms` int(6) NOT NULL auto_increment,
  `porcentaje` int(3) default NULL,
  `fecha_ingreso` date default NULL,
  PRIMARY KEY  (`id_ppms`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id_privilegio` int(3) NOT NULL auto_increment,
  `nombre_privilegio` varchar(50) default NULL,
  `tipo` int(1) default NULL,
  PRIMARY KEY  (`id_privilegio`)
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
-- Estructura de tabla para la tabla `proformas`
--

CREATE TABLE IF NOT EXISTS `proformas` (
  `id_proformas` int(3) NOT NULL auto_increment,
  `id_proyectos` int(3) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `total_proforma` int(6) default NULL,
  PRIMARY KEY  (`id_proformas`),
  KEY `proformas_FKIndex1` (`id_proyectos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `proformas`
--

INSERT INTO `proformas` (`id_proformas`, `id_proyectos`, `fecha_creacion`, `cliente`, `total_proforma`) VALUES
(1, 1, '2013-11-07', 'Cliente 1', 0),
(2, 1, '2013-11-07', 'Cliente 1', 0),
(3, 1, '2013-11-07', 'cliente 1', 0),
(4, 4, '2013-11-27', 'Cliente Juanka Testin g1', 1500),
(5, 4, '2013-11-27', 'Cave & CIA LTDA.', 3605),
(6, 4, '2013-11-27', '1000animales', 5003);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_proyectos` int(3) NOT NULL auto_increment,
  `id_lugares` int(3) NOT NULL,
  `id_miembros` int(3) NOT NULL,
  `id_codigo` int(3) NOT NULL,
  `nombre_proyecto` varchar(100) default NULL,
  `nombre_nave` varchar(50) default NULL,
  `fecha_inicio` date default NULL,
  `fecha_termino` date default NULL,
  `descripcion` longtext,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_proyectos`),
  KEY `proyectos_FKIndex1` (`id_codigo`),
  KEY `proyectos_FKIndex2` (`id_miembros`),
  KEY `proyectos_FKIndex3` (`id_lugares`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyectos`, `id_lugares`, `id_miembros`, `id_codigo`, `nombre_proyecto`, `nombre_nave`, `fecha_inicio`, `fecha_termino`, `descripcion`, `activo`) VALUES
(1, 9, 1, 1, 'Proyecto1', 'Nave1', '2013-11-06', '2013-11-30', 'asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas asdasdas ', 0),
(2, 0, 0, 1, 'Proyecto Activo', 'Activo', '2013-11-26', '2013-11-28', 'Proyecto Activo Tsting!', 1),
(3, 7, 1, 1, 'Testing Activo 2', 'Activo 2', '2013-11-27', '2013-11-29', 'Testing Activo 2', 1),
(4, 2, 2, 1, 'mcdonnal', 'big mac', '2013-11-27', '2013-11-30', 'abc 123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id_registro` int(3) NOT NULL auto_increment,
  `id_miembros` int(3) default NULL,
  `detalle` varchar(200) default NULL,
  PRIMARY KEY  (`id_registro`),
  KEY `registros_FKIndex1` (`id_miembros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendiciones_de_gastos`
--

CREATE TABLE IF NOT EXISTS `rendiciones_de_gastos` (
  `id_rendiciones_de_gastos` int(3) NOT NULL auto_increment,
  `codigo_rend` varchar(50) default NULL,
  `total_rend` int(7) default NULL,
  `inspector` tinyint(1) default NULL,
  PRIMARY KEY  (`id_rendiciones_de_gastos`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `rendiciones_de_gastos`
--

INSERT INTO `rendiciones_de_gastos` (`id_rendiciones_de_gastos`, `codigo_rend`, `total_rend`, `inspector`) VALUES
(1, 'Rendicion 1', 1, 1),
(2, 'Rendicion 1', 1, 1),
(3, 'Rendicion 1', 1, 1),
(4, 'Rendicion 1', 1, 1),
(5, 'Rendicion 1', 1, 1),
(6, 'RendiciÃ³n 2', 2, 1),
(7, '5', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(3) NOT NULL auto_increment,
  `id_miembros` int(3) NOT NULL,
  `id_proyectos` int(3) NOT NULL,
  `nombre_servicio` varchar(100) default NULL,
  PRIMARY KEY  (`id_servicio`),
  KEY `servicios_FKIndex1` (`id_proyectos`),
  KEY `servicios_FKIndex2` (`id_miembros`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `id_miembros`, `id_proyectos`, `nombre_servicio`) VALUES
(1, 1, 1, 'Servicio 1'),
(2, 1, 1, 'Servicio2'),
(3, 0, 2, 'asd'),
(4, 1, 3, 'as'),
(5, 2, 4, 'sdfgh'),
(6, 2, 4, '2345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(3) NOT NULL auto_increment,
  `username` varchar(40) default NULL,
  `pass` varchar(40) default NULL,
  PRIMARY KEY  (`id_usuarios`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `username`, `pass`) VALUES
(1, 'jx4nk00', '7275039246dd3d0d0af166c228429e6ecf798f0b'),
(2, 'om.pizarro', '5a9f5bcf0ff39aedb75a70e060d3eda6ecc771f9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores_facturados`
--

CREATE TABLE IF NOT EXISTS `valores_facturados` (
  `id_valores_facturados` int(3) NOT NULL auto_increment,
  `fact_exenta` int(6) default NULL,
  `fact_afecta` int(6) default NULL,
  `bol_honorario` int(6) default NULL,
  `invoice` int(6) default NULL,
  `total_fact_exenta` int(6) default NULL,
  `total_fact_afecta` int(6) default NULL,
  `total_bol_honorario` int(6) default NULL,
  `total_invoice` int(6) default NULL,
  `inspector` tinyint(1) default NULL,
  PRIMARY KEY  (`id_valores_facturados`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `valores_facturados`
--

INSERT INTO `valores_facturados` (`id_valores_facturados`, `fact_exenta`, `fact_afecta`, `bol_honorario`, `invoice`, `total_fact_exenta`, `total_fact_afecta`, `total_bol_honorario`, `total_invoice`, `inspector`) VALUES
(1, 1, 100, 100, 1, NULL, NULL, NULL, NULL, 1),
(2, 1, 100, 100, 1, NULL, NULL, NULL, NULL, 1),
(3, 1, 100, 100, 1, NULL, NULL, NULL, NULL, 1),
(4, 1, 100, 100, 1, NULL, NULL, NULL, NULL, 1),
(5, 1, 100, 100, 1, NULL, NULL, NULL, NULL, 1),
(6, 2, 100, 100, 2, NULL, NULL, NULL, NULL, 1),
(7, 5, 5, 5, 5, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_dolar`
--

CREATE TABLE IF NOT EXISTS `valor_dolar` (
  `id_valor_dolar` int(3) NOT NULL auto_increment,
  `fecha_variacion` date default NULL,
  `valor` decimal(5,2) default NULL,
  PRIMARY KEY  (`id_valor_dolar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `valor_dolar`
--

INSERT INTO `valor_dolar` (`id_valor_dolar`, `fecha_variacion`, `valor`) VALUES
(1, '2013-11-07', 500.25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
