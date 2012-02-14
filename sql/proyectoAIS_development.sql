-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-02-2012 a las 15:58:12
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectoais_development`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  KEY `index_cita_on_paciente_id` (`paciente_id`),
  KEY `index_cita_on_medico_id` (`medico_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `paciente_id`, `medico_id`, `tipo_paciente`, `frecuentacion_inst`, `frecuentacion_serv`, `tipo_atencion`, `atencion_por`, `area_referencia`, `fecha`, `turno`, `informe_medico`) VALUES
(11, 18539330, 3444, 'Asegurado', 'De Primera Vez', 'De primera vez', 'Nuevo', 'Control', 'Consulta Externa', '2012-02-15', 'Mañana', NULL),
(12, 18539330, 3444, 'Asegurado', 'Subsiguiente', 'Subsiguiente', 'Re consulta', 'Control', 'Consulta Externa', '2012-02-22', 'Mañana', NULL),
(13, 8466948, 2974, 'No Asegurado', 'De Primera Vez', 'De primera vez', 'Nuevo', 'Control', 'SEGURO INTERIOR', '2012-02-16', 'Mañana', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_medicas`
--

CREATE TABLE IF NOT EXISTS `historia_medicas` (
  `numero_expediente` int(11) NOT NULL AUTO_INCREMENT,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paciente_id` int(11) DEFAULT NULL,
  `cita_id` int(11) NOT NULL,
  PRIMARY KEY (`numero_expediente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `historia_medicas`
--

INSERT INTO `historia_medicas` (`numero_expediente`, `informe`, `paciente_id`, `cita_id`) VALUES
(2, '', 1, 3);

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
  `telefono` bigint(15) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_historia` bigint(15) DEFAULT NULL,
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
  `telefono_urgencias` bigint(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_pacientes_on_historia_medica_id` (`numero_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `telefono`, `direccion`, `numero_historia`, `fecha_nacimiento`, `lugar_nacimiento`, `nombre_padre`, `nombre_madre`, `seguro_social`, `provincia`, `distrito`, `corregimiento`, `nombre_urgencias`, `parentesco_urgencias`, `telefono_urgencias`) VALUES
(8466948, 'Dilia', 'Coromoto', 'Cones', 'Carvo', 'Femenino', 4166229033, 'Las Villas', 1, '1962-07-20', 'Cantaura', 'Alcibiades', 'Corina', 'Si', 'Carrizal', 'Miranda', 'Venezuela', 'Oswaldo', 'Hijo', 4141613227),
(18539330, 'Oswaldo', 'Andres', 'Diaz', 'Cones', 'Masculino', 4141613227, 'Las Villas', 1, '1989-11-25', 'Cantaura', 'Oswaldo', 'Dilia', 'Si', 'Carrizal', 'Miranda', 'Venezuela', 'Coromoto', 'Madre', 4166229033),
(20546378, 'Pedro ', 'Pablo ', 'Perez', 'Jimenez', 'Masculino', 4145687948, 'Caracas', 3, '1999-02-02', 'Caracas', 'Pedro', 'Palomina', 'Si', 'Caracas', 'Caracas', 'Caracas', 'palomina', 'madre', 4268974562);

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
(100, 'Cirugia General'),
(101, 'CIR. CARDIO VASC'),
(102, 'CIRUGIA TORACICA'),
(103, 'COLOPROCTOLOGIA'),
(104, 'SOPORTE METABOL'),
(110, 'CIR. VASC. PERIF'),
(120, 'NEUROCIRUGIA'),
(130, 'OFTALMOLOGIA'),
(131, 'OPTOMETRIA'),
(140, 'OTORRINO'),
(141, 'FONIATRIA Y AUDIO'),
(150, 'ORTOP Y TRAUM'),
(160, 'UROLOGIA'),
(170, 'CIR. PLASTICA'),
(171, 'U. DE QUEMADOS'),
(180, 'CIR. MAXILO FACIAL'),
(181, 'ODONTOLOGIA GEN'),
(200, 'MEDICINA INTERNA'),
(201, 'GERIATRIA'),
(202, 'REUMATOLOGIA'),
(203, 'HEMATOLOGIA'),
(204, 'NEUROLOGIA'),
(205, 'NEUROFISIOLOGIA'),
(206, 'ENDOCRINOLOGIA'),
(207, 'DIABETOLOGIA'),
(208, 'QUIMIOTERAPIA'),
(220, 'CARDIOLOGIA'),
(221, 'U.CORONARIA'),
(230, 'GASTRO'),
(240, 'ENF. INFECCIOSAS'),
(250, 'PSIQUIATRIA'),
(251, 'PSICOLOGIA'),
(260, 'NEUMOLOGIA'),
(270, 'NEFROLOGIA'),
(280, 'DERMATOLOGIA'),
(2, 'URG.GINECO OBS.'),
(300, 'GINECOLOGIA'),
(301, 'CLINICA EVAL QUIRURGICA'),
(302, 'CLINICA DE INEFRTILIDAD'),
(303, 'CLINICA DE COLOPOSCOPIA'),
(304, 'CLINICA DE MAMAS'),
(305, 'CLINICA DE ENF.TROFOBLAST'),
(310, 'OBSTETRICIA'),
(311, 'CLINICA EMB.DE A.RIESGO'),
(312, 'CLINICA EMB PROLONGADO'),
(313, 'CLINICA ULTRASONIDO'),
(314, 'CLINICA MONITOREO FETAL'),
(315, 'CLINICA DE CESAREA'),
(420, 'IMANEGOLOGIA'),
(421, 'MEDICINA NUCLEAR'),
(422, 'RADIOLOGIA INTERVENC.'),
(440, 'MED.FISICA Y REHAB.'),
(441, 'FISIOTERAPIA'),
(520, 'NUTRICION'),
(530, 'EPIDEMILOGIA'),
(540, 'TRABAJO SOCIAL'),
(550, 'SALUD OCUPACIONAL'),
(1, 'URGENCIA GENERAL'),
(600, 'UNI. DE C. INTENSIVOS'),
(601, 'ANESTESILOGIA'),
(105, 'POST OPERATORIO'),
(443, 'LAB. DE ELECTRODIAG'),
(190, 'UNIDAD DE TRAUMA'),
(603, 'CLINICA DEL DOLOR'),
(602, 'U. DE C. SEMI INT'),
(443, 'LABORATORIO DE ELECTRODIA');

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
  `clave` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_profesional` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_profesional` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_usuarios_on_servicio_id` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `telefono`, `direccion`, `servicio_id`, `clave`, `rol`, `tipo_profesional`, `codigo_profesional`) VALUES
(386, 'Amado', NULL, 'Escartin', 'Ch', 'Masculino', NULL, NULL, 280, NULL, 'Medico', 'Medico especialista', 101),
(2974, 'Jaime', NULL, 'Avila', NULL, 'Masculino', NULL, NULL, 280, NULL, 'Medico', 'Medico especialista', 101),
(3444, 'Reynaldo', NULL, 'Arosemena', NULL, 'Masculino', NULL, NULL, 280, NULL, 'Medico', 'Medico especialista', 101),
(19294704, 'Miguel', 'Angel', 'Martinez', 'Farias', 'Masculino', 1313, 'Av...', NULL, 'miguel', 'Taquillero', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
