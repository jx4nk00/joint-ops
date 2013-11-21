-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2013 a las 21:30:55
-- Versión del servidor: 5.1.70-cll
-- Versión de PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `opizarro_joint_ops`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE IF NOT EXISTS `anticipos` (
  `id_anticipos` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) NOT NULL,
  `id_liquidaciones` int(3) NOT NULL,
  `valor_anticipo` int(7) DEFAULT NULL,
  PRIMARY KEY (`id_anticipos`),
  KEY `anticipos_FKIndex1` (`id_liquidaciones`),
  KEY `anticipos_FKIndex2` (`id_miembros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id_banco` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_banco` varchar(100) DEFAULT NULL,
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
  `id_codigo` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
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
  `id_datos` int(3) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `cta_corriente` varchar(50) DEFAULT NULL,
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
  `id_gastos_empresa` int(3) NOT NULL AUTO_INCREMENT,
  `id_liquidaciones` int(3) NOT NULL,
  `id_otros_gastos` int(3) NOT NULL,
  `id_inspectores_ayudantes` int(3) NOT NULL,
  `id_gc_informes` int(3) NOT NULL,
  `id_impresiones` int(3) NOT NULL,
  `id_rendiciones_de_gastos` int(3) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `valor` int(7) DEFAULT NULL,
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
  `id_gastos_propios` int(3) NOT NULL AUTO_INCREMENT,
  `id_tipos_gp` int(3) NOT NULL,
  `id_gastos_empresa` int(3) NOT NULL,
  `valor` int(7) DEFAULT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gastos_propios`),
  KEY `gastos_propios_FKIndex1` (`id_gastos_empresa`),
  KEY `gastos_propios_FKIndex2` (`id_tipos_gp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gc_informes`
--

CREATE TABLE IF NOT EXISTS `gc_informes` (
  `id_gc_informes` int(3) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) DEFAULT NULL,
  `total_gastos` int(7) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_gc_informes`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE IF NOT EXISTS `impresiones` (
  `id_impresiones` int(3) NOT NULL AUTO_INCREMENT,
  `valor_hoja` int(4) DEFAULT NULL,
  `cant_hojas` int(4) DEFAULT NULL,
  `num_copias` int(4) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_impresiones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE IF NOT EXISTS `informes` (
  `id_informes` int(3) NOT NULL AUTO_INCREMENT,
  `id_proyectos` int(3) NOT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `cod_informe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_informes`),
  KEY `informes_FKIndex1` (`id_proyectos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectores_ayudantes`
--

CREATE TABLE IF NOT EXISTS `inspectores_ayudantes` (
  `id_inspectores_ayudantes` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) NOT NULL,
  `id_liquidaciones` int(3) NOT NULL,
  `pago` int(7) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_inspectores_ayudantes`),
  KEY `inspectores_ayudantes_FKIndex1` (`id_miembros`),
  KEY `inspectores_ayudantes_FKIndex2` (`id_liquidaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE IF NOT EXISTS `liquidaciones` (
  `id_liquidaciones` int(3) NOT NULL AUTO_INCREMENT,
  `id_proyectos` int(3) NOT NULL,
  `id_porce_acuerdos` int(3) NOT NULL,
  `id_valor_dolar` int(3) NOT NULL,
  `id_otros_gastos` int(3) NOT NULL,
  `id_impresiones` int(3) NOT NULL,
  `id_rendiciones_de_gastos` int(3) NOT NULL,
  `id_valores_facturados` int(3) NOT NULL,
  `id_gc_informes` int(3) NOT NULL,
  `numero_liq` int(4) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `nombre_servicio` varchar(50) DEFAULT NULL,
  `ref_cliente` varchar(50) DEFAULT NULL,
  `servicio` varchar(200) DEFAULT NULL,
  `num_cont` int(3) DEFAULT NULL,
  `turnos_trabajados` int(2) DEFAULT NULL,
  `tarifado` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_liquidaciones`),
  KEY `liquidaciones_FKIndex3` (`id_porce_acuerdos`),
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
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `id_lugares` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_lugar` varchar(100) DEFAULT NULL,
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
  `id_mensaje` int(3) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `p_nombre` varchar(20) DEFAULT NULL,
  `s_nombre` varchar(20) DEFAULT NULL,
  `apellido_p` varchar(20) DEFAULT NULL,
  `apellido_m` varchar(20) DEFAULT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `f_nac` date DEFAULT NULL,
  `f_creacion` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
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
(3, 1, 1, 3, 3, 'Testing', 'Calidad', 'Unab', '2013', '11111111-1', '1990-09-23', '2013-09-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_gastos`
--

CREATE TABLE IF NOT EXISTS `otros_gastos` (
  `id_otros_gastos` int(3) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) DEFAULT NULL,
  `valor` int(7) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_otros_gastos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porce_acuerdos`
--

CREATE TABLE IF NOT EXISTS `porce_acuerdos` (
  `id_porce_acuerdos` int(3) NOT NULL AUTO_INCREMENT,
  `porcentaje` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_porce_acuerdos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id_privilegio` int(3) NOT NULL AUTO_INCREMENT,
  `nombre_privilegio` varchar(50) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
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
  `id_proyectos` int(3) NOT NULL AUTO_INCREMENT,
  `id_lugares` int(3) NOT NULL,
  `id_miembros` int(3) NOT NULL,
  `id_codigo` int(3) NOT NULL,
  `nombre_proyecto` varchar(100) DEFAULT NULL,
  `nombre_nave` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_proyectos`),
  KEY `proyectos_FKIndex1` (`id_codigo`),
  KEY `proyectos_FKIndex2` (`id_miembros`),
  KEY `proyectos_FKIndex3` (`id_lugares`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(18, 2, 3, 1, 'ejemplo', 'shoffy', '2013-09-26', '2013-09-30', ',<jlkjskldjlasjdlaskjdklasjdlk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id_registro` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `registros_FKIndex1` (`id_miembros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendiciones_de_gastos`
--

CREATE TABLE IF NOT EXISTS `rendiciones_de_gastos` (
  `id_rendiciones_de_gastos` int(3) NOT NULL AUTO_INCREMENT,
  `codigo_rend` varchar(50) DEFAULT NULL,
  `total_rend` int(7) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_rendiciones_de_gastos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(3) NOT NULL AUTO_INCREMENT,
  `id_miembros` int(3) NOT NULL,
  `id_proyectos` int(3) NOT NULL,
  `nombre_servicio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `servicios_FKIndex1` (`id_proyectos`),
  KEY `servicios_FKIndex2` (`id_miembros`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
(15, 3, 18, 'proyecto'),
(16, 3, 18, 'daniel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_gp`
--

CREATE TABLE IF NOT EXISTS `tipos_gp` (
  `id_tipos_gp` int(3) NOT NULL AUTO_INCREMENT,
  `tipo` int(2) DEFAULT NULL,
  `nombre_tipo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipos_gp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuarios` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
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
  `id_valores_facturados` int(3) NOT NULL AUTO_INCREMENT,
  `fact_exenta` int(6) DEFAULT NULL,
  `fact_afecta` int(6) DEFAULT NULL,
  `bol_honorario` int(6) DEFAULT NULL,
  `invoice` int(6) DEFAULT NULL,
  `inspector` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_valores_facturados`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_dolar`
--

CREATE TABLE IF NOT EXISTS `valor_dolar` (
  `id_valor_dolar` int(3) NOT NULL AUTO_INCREMENT,
  `fecha_variacion` date DEFAULT NULL,
  `valor` int(7) DEFAULT NULL,
  PRIMARY KEY (`id_valor_dolar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         