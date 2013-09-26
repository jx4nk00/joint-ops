-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2013 a las 04:43:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ops_joint_ops`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE IF NOT EXISTS `anticipos` (
  `id_anticipos` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) NOT NULL,
  `id_liquidaciones` int(3) NOT NULL,
  `id_miembro` int(3) DEFAULT NULL,
  `valor_anticipo` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_anticipos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id_banco` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_banco` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_servicio`
--

CREATE TABLE IF NOT EXISTS `codigos_servicio` (
  `id_codigo` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  PRIMARY KEY (`id_codigo`,`id_miembros`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_miembros`
--

CREATE TABLE IF NOT EXISTS `datos_miembros` (
  `id_datos` int(3) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `cta_corriente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_datos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_empresa`
--

CREATE TABLE IF NOT EXISTS `gastos_empresa` (
  `id_gastos_empresa` int(3) NOT NULL AUTO_INCREMENT,
  `id_tipos_gastos` int(3) NOT NULL,
  `id_liquidaciones` int(3) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `valor` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_gastos_empresa`,`id_tipos_gastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gc_informes`
--

CREATE TABLE IF NOT EXISTS `gc_informes` (
  `id_gc_informes` int(3) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) DEFAULT NULL,
  `total_gastos` int(6) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_gc_informes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE IF NOT EXISTS `impresiones` (
  `id_impresiones` int(3) NOT NULL AUTO_INCREMENT,
  `valor_hoja` int(6) DEFAULT NULL,
  `cant_hojas` int(6) DEFAULT NULL,
  `num_copias` int(6) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_impresiones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
  `id_informes` int(3) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) DEFAULT NULL,
  `cod_informe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_informes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectores_ayudantes`
--

CREATE TABLE IF NOT EXISTS `inspectores_ayudantes` (
  `id_inspectores_ayudantes` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) NOT NULL,
  `id_liquidaciones` int(3) NOT NULL,
  `pago` int(8) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_inspectores_ayudantes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE IF NOT EXISTS `liquidaciones` (
  `id_liquidaciones` int(3) NOT NULL AUTO_INCREMENT,
  `id_informes` int(3) NOT NULL,
  `id_porce_acuerdos` int(3) NOT NULL,
  `id_valor_dolar` int(3) NOT NULL,
  `id_lugares` int(3) NOT NULL,
  `id_otros_gastos` int(3) NOT NULL,
  `id_impresiones` int(3) NOT NULL,
  `id_rendiciones_de_gastos` int(3) NOT NULL,
  `id_valores_facturados` int(3) NOT NULL,
  `id_gc_informes` int(3) NOT NULL,
  `numero_liq` varchar(8) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `nombre_servicio` varchar(100) DEFAULT NULL,
  `ref_cliente` varchar(50) DEFAULT NULL,
  `servicio` varchar(200) DEFAULT NULL,
  `num_cont` int(3) DEFAULT NULL,
  `turnos_trabajados` int(3) DEFAULT NULL,
  `tarifado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_liquidaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `id_lugares` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_lugares`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(3) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `id_miembros` int(3) NOT NULL AUTO_INCREMENT,
  `id_banco` int(3) NOT NULL,
  `id_privilegio` int(3) NOT NULL,
  `id_usuarios` int(3) NOT NULL,
  `id_datos` int(3) NOT NULL,
  `p_nombre` varchar(10) DEFAULT NULL,
  `s_nombre` varchar(10) DEFAULT NULL,
  `apellido_p` varchar(20) DEFAULT NULL,
  `apellido_m` varchar(20) DEFAULT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `f_nac` date DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_miembros`),
  KEY `miembros_FKIndex1` (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_gastos`
--

CREATE TABLE IF NOT EXISTS `otros_gastos` (
  `id_otros_gastos` int(3) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) DEFAULT NULL,
  `valor` int(8) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_otros_gastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porce_acuerdos`
--

CREATE TABLE IF NOT EXISTS `porce_acuerdos` (
  `id_porce_acuerdos` int(3) NOT NULL AUTO_INCREMENT,
  `porcentaje` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_porce_acuerdos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id_privilegio` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_privilegio` varchar(50) DEFAULT NULL,
  `tipo` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_privilegio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id_registro` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembro` int(3) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendiciones_de_gastos`
--

CREATE TABLE IF NOT EXISTS `rendiciones_de_gastos` (
  `id_rendiciones_de_gastos` int(3) NOT NULL AUTO_INCREMENT,
  `codigo_rend` varchar(50) DEFAULT NULL,
  `total_rend` int(8) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_rendiciones_de_gastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_gastos`
--

CREATE TABLE IF NOT EXISTS `tipos_gastos` (
  `id_tipos_gastos` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipos_gastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(3) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores_facturados`
--

CREATE TABLE IF NOT EXISTS `valores_facturados` (
  `id_valores_facturados` int(3) NOT NULL AUTO_INCREMENT,
  `fact_exenta` int(8) DEFAULT NULL,
  `fact_afecta` int(8) DEFAULT NULL,
  `bol_honorario` int(8) DEFAULT NULL,
  `invoice` int(8) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_valores_facturados`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_dolar`
--

CREATE TABLE IF NOT EXISTS `valor_dolar` (
  `id_valor_dolar` int(3) NOT NULL AUTO_INCREMENT,
  `fecha_variacion` date DEFAULT NULL,
  `valor` double(3,2) DEFAULT NULL,
  PRIMARY KEY (`id_valor_dolar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
