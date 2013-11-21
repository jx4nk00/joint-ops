-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-11-2013 a las 21:01:57
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_servicio`
--

CREATE TABLE IF NOT EXISTS `codigos_servicio` (
  `id_codigo` int(3) NOT NULL auto_increment,
  `codigo` varchar(30) default NULL,
  `f_creacion` date default NULL,
  PRIMARY KEY  (`id_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honorarios_proforma`
--

CREATE TABLE IF NOT EXISTS `honorarios_proforma` (
  `id_honorarios_proforma` int(3) NOT NULL auto_increment,
  `id_proformas` int(3) NOT NULL,
  `fecha` date default NULL,
  `calificacion` varchar(4) default NULL,
  `unidad_cobro` varchar(50) default NULL,
  `cant_htd` int(3) default NULL,
  `total` int(6) default NULL,
  PRIMARY KEY  (`id_honorarios_proforma`),
  KEY `honorarios_proforma_FKIndex1` (`id_proformas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `total_gastos_empresa` int(6) default NULL,
  `total_inspectores` int(6) default NULL,
  `total_servicio_chp` int(6) default NULL,
  `total_servicio_usd` int(6) default NULL,
  `activo` tinyint(1) default NULL,
  PRIMARY KEY  (`id_liquidaciones`),
  KEY `liquidaciones_FKIndex4` (`id_otros_gastos`),
  KEY `liquidaciones_FKIndex5` (`id_valor_dolar`),
  KEY `liquidaciones_FKIndex6` (`id_impresiones`),
  KEY `liquidaciones_FKIndex7` (`id_gc_informes`),
  KEY `liquidaciones_FKIndex8` (`id_rendiciones_de_gastos`),
  KEY `liquidaciones_FKIndex9` (`id_valores_facturados`),
  KEY `liquidaciones_FKIndex10` (`id_proyectos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `nombre_lugar` varchar(100) default NULL,
  `direccion` varchar(100) default NULL,
  PRIMARY KEY  (`id_lugares`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `p_nombre` varchar(20) default NULL,
  `s_nombre` varchar(20) default NULL,
  `apellido_p` varchar(20) default NULL,
  `apellido_m` varchar(20) default NULL,
  `rut` varchar(10) default NULL,
  `f_nac` date default NULL,
  `f_creacion` date default NULL,
  `activo` tinyint(1) default NULL,
  PRIMARY KEY  (`id_miembros`),
  KEY `miembros_FKIndex1` (`id_usuarios`),
  KEY `miembros_FKIndex2` (`id_banco`),
  KEY `miembros_FKIndex3` (`id_privilegio`),
  KEY `miembros_FKIndex4` (`id_datos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proformas`
--

CREATE TABLE IF NOT EXISTS `proformas` (
  `id_proformas` int(3) NOT NULL auto_increment,
  `id_proyectos` int(3) NOT NULL,
  `total_proforma` int(6) default NULL,
  PRIMARY KEY  (`id_proformas`),
  KEY `proformas_FKIndex1` (`id_proyectos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY  (`id_proyectos`),
  KEY `proyectos_FKIndex1` (`id_codigo`),
  KEY `proyectos_FKIndex2` (`id_miembros`),
  KEY `proyectos_FKIndex3` (`id_lugares`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(3) NOT NULL auto_increment,
  `username` varchar(40) default NULL,
  `pass` varchar(40) default NULL,
  PRIMARY KEY  (`id_usuarios`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_dolar`
--

CREATE TABLE IF NOT EXISTS `valor_dolar` (
  `id_valor_dolar` int(3) NOT NULL auto_increment,
  `fecha_variacion` date default NULL,
  `valor` int(7) default NULL,
  PRIMARY KEY  (`id_valor_dolar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
