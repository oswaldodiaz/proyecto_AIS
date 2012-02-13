-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-02-2012 a las 14:58:37
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectoAIS_development`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cita_id` int(11) DEFAULT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `tipo_paciente` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frecuentacion_inst` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frecuentacion_serv` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_atencion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atencion_por` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_referencia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `turno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informe_medico` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_cita_on_paciente_id` (`paciente_id`),
  KEY `index_cita_on_medico_id` (`medico_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `cita_id`, `paciente_id`, `medico_id`, `tipo_paciente`, `frecuentacion_inst`, `frecuentacion_serv`, `tipo_atencion`, `atencion_por`, `area_referencia`, `fecha`, `turno`, `informe_medico`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, NULL, 'Asegurado', 'De Primera Vez', 'De primera vez', 'Nuevo', 'Control', 'Consulta Externa', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_medicas`
--

CREATE TABLE IF NOT EXISTS `historia_medicas` (
  `numero_expediente` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_medico` int(11) NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_profesional` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_profesional` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_medicos_on_servicio_id` (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19023501 ;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `codigo_medico`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `telefono`, `direccion`, `servicio_id`, `clave`, `rol`, `tipo_profesional`, `codigo_profesional`, `created_at`, `updated_at`) VALUES
(19023500, 220, 'Leonardo', 'Alberto', 'Da Silva', 'Perez', 'Masculino', 412234235, 'Altamira', 1234, 'leonardo', 'Medico', 'internista', 231, '2012-02-07 10:42:00', '2012-02-07 10:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_historia` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_padre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_madre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seguro_social` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `distrito` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `corregimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_urgencias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentesco_urgencias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_urgencias` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_pacientes_on_historia_medica_id` (`numero_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `telefono`, `direccion`, `numero_historia`, `fecha_nacimiento`, `lugar_nacimiento`, `nombre_padre`, `nombre_madre`, `seguro_social`, `provincia`, `distrito`, `corregimiento`, `nombre_urgencias`, `parentesco_urgencias`, `telefono_urgencias`, `created_at`, `updated_at`) VALUES
(1, 'Oswaldo  ', 'Andres  ', 'Diaz', 'Bolivar', 'Masculino', 113124, 'Av...', 1, '0000-00-00', 'Caracas', 'WTF', 'Piru', 'No', 'Miranda', 'Carrizal', 'Carrizal', 'Miguel', 'allegado', 0, '2012-01-31 00:00:00', '2012-01-31 00:00:00'),
(123, ' ', ' ', '', '', '', 0, '', 12341, '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18539330, 'Oswaldo      ', 'ANdres     ', 'DIaz', 'Cones', 'Masculino', 2147483647, 'Las Villas', 123, '1989-11-25', 'Cantaura', 'OSwaldo', 'Dilia', 'NO', 'Miranda', 'Carrizal', 'Carrizal', 'Miguel', 'Novio', 765765, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19209051, 'Manuela', 'Ela', 'VIllavicencio', 'Bolivar', 'Femenino', 2147483647, 'Caracas', 2147483647, '0000-00-00', 'Caracas', 'cualquier', 'vaina', 'No', 'Caracas', 'Caracas', 'Caracas', 'Leonardo', 'allegado', 604032142, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20546378, 'Pedro ', 'Pablo ', 'Perez', 'Jimenez', 'Masculino', 2147483647, 'Caracas', 123124, '1999-02-02', 'Caracas', 'Pedro', 'Palomina', 'Si', 'Caracas', 'Caracas', 'Caracas', 'palomina', 'madre', 32423523, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schema_migrations`
--

CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `unique_schema_migrations` (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `schema_migrations`
--

INSERT INTO `schema_migrations` (`version`) VALUES
('20120118133512'),
('20120118134239'),
('20120118134403'),
('20120118134829'),
('20120125020132');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `codigo_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`codigo_servicio`, `nombre_servicio`) VALUES
(100, 'Cirugia General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `segundo_apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tipo_profesional` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_profesional` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_usuarios_on_servicio_id` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `telefono`, `direccion`, `servicio_id`, `nombre_usuario`, `clave`, `rol`, `created_at`, `updated_at`, `tipo_profesional`, `codigo_profesional`) VALUES
(212, 'Ysabella', 'Ela', 'Carneiro', 'Bolivar', 'Femenino', 3232, 'av...', 0, NULL, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(19294704, 'Miguel', 'Angel', 'Martinez', 'Farias', 'Masculino', 1313, 'Av...', NULL, 'miguel.martinez', 'miguel', 'Taquillero', '2012-01-27 00:00:00', '2012-01-27 00:00:00', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
