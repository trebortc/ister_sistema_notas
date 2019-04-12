-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2019 a las 02:10:04
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_academica`
--

CREATE TABLE `actividad_academica` (
  `ID_ACTIVIDAD_ACADEMICA` int(11) NOT NULL,
  `ID_ASIGNATURA_PERIODO` int(11) DEFAULT NULL,
  `NOTA` decimal(2,2) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `REF_CALIFICACION_PLANTILLA` varchar(256) DEFAULT NULL,
  `REF_PARCIAL_PLANTILLA` varchar(256) DEFAULT NULL,
  `FECHA_PRESENTACION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_informativa`
--

CREATE TABLE `actividad_informativa` (
  `ID_ACTIVIDAD_INFORMATIVA` int(11) NOT NULL,
  `ID_ASIGNATURA_PERIODO` int(11) DEFAULT NULL,
  `TITULO` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `IMAGEN` varchar(256) DEFAULT NULL,
  `ARCHIVO_ADJUNTO` varchar(256) DEFAULT NULL,
  `LINK` varchar(256) DEFAULT NULL,
  `FECHA_PUBLICACION` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad_informativa`
--

INSERT INTO `actividad_informativa` (`ID_ACTIVIDAD_INFORMATIVA`, `ID_ASIGNATURA_PERIODO`, `TITULO`, `DESCRIPCION`, `IMAGEN`, `ARCHIVO_ADJUNTO`, `LINK`, `FECHA_PUBLICACION`) VALUES
(1, NULL, 'Libro 1', 'Ejemplo de libro', 'aaa.png', '621df4876d286a3afed3d03ca3b16e5b.pdf', 'www.ejm.com', '2014-01-01 00:00:00'),
(2, NULL, 'Deber 1', 'Introduccion a un nuevo año electivo', '2d0cd1f27ae48669b6977e306ca91c3d.png', 'acc097db54554d65026a201092671439.pdf', 'https://twitter.com/home', '2019-08-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `ID_ASIGNATURA` int(11) NOT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `NIVEL` int(11) DEFAULT NULL,
  `CREDITOS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`ID_ASIGNATURA`, `NOMBRE`, `DESCRIPCION`, `NIVEL`, `CREDITOS`) VALUES
(1, 'Programacion I', 'Introduccion  a la logica de programacion', 1, 4),
(2, 'Ejem1', 'nada', 1, 2),
(3, 'Ejem2', 'Ejemplo 2', 1, 2),
(4, 'Ejem3', 'Ejemplo 3', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_periodo`
--

CREATE TABLE `asignatura_periodo` (
  `ID_ASIGNATURA_PERIODO` int(11) NOT NULL,
  `ID_PERIODO_ACADEMICO` int(11) DEFAULT NULL,
  `ID_ASIGNATURA` int(11) DEFAULT NULL,
  `ID_AULA` int(11) DEFAULT NULL,
  `ID_PROFESOR` int(11) DEFAULT NULL,
  `ID_CALIFICACION_PLANTILLA` int(11) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  `CREDITOS` int(11) DEFAULT NULL,
  `HORA_INICIO` time DEFAULT NULL,
  `HORA_FIN` time DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura_periodo`
--

INSERT INTO `asignatura_periodo` (`ID_ASIGNATURA_PERIODO`, `ID_PERIODO_ACADEMICO`, `ID_ASIGNATURA`, `ID_AULA`, `ID_PROFESOR`, `ID_CALIFICACION_PLANTILLA`, `ESTADO`, `CREDITOS`, `HORA_INICIO`, `HORA_FIN`, `CAPACIDAD`) VALUES
(1, 1, 1, 2, 2, NULL, 'A', 2, NULL, NULL, 30),
(2, 1, 4, 1, 2, NULL, 'A', 2, NULL, NULL, 30),
(3, 1, 2, 2, 2, NULL, 'A', 10, NULL, NULL, 20),
(4, 1, 3, 2, 1, NULL, 'A', 4, NULL, NULL, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `ID_AULA` int(11) NOT NULL,
  `UBICACION` varchar(256) DEFAULT NULL,
  `CAPACIDAD` int(11) DEFAULT NULL,
  `OBSERVACIONES` varchar(1024) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`ID_AULA`, `UBICACION`, `CAPACIDAD`, `OBSERVACIONES`, `ESTADO`) VALUES
(1, 'E-1', 33, 'Sin novedad', 'A'),
(2, 'Alta', 20, 'Ninguna', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_plantilla`
--

CREATE TABLE `calificacion_plantilla` (
  `ID_CALIFICACION_PLANTILLA` int(11) NOT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_plantilla_detalle`
--

CREATE TABLE `calificacion_plantilla_detalle` (
  `ID_CALIFICACION_PLANTILLA_DETALLE` int(11) NOT NULL,
  `ID_CALIFICACION_PLANTILLA` int(11) DEFAULT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `PORCENTAJE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_CARRERA` int(11) NOT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_CARRERA`, `NOMBRE`, `DESCRIPCION`, `ESTADO`) VALUES
(1, 'INGENIERIA EN INFORMATICA', 'CARRERA RELACIONADA CON TEMAS COMPUTACIONALES', 'A'),
(2, 'INGENIERIA EN SISTEMAS', 'CARRERA RELACIONADA CON TEMAS COMPUTACIONALES', 'A'),
(3, 'INGENIERIA MECANICA', 'CARRERA RELACIONADA CON LA REPARACION DE MAQUINAS', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `ID_NICK` int(11) DEFAULT NULL,
  `ID_CARRERA` int(11) DEFAULT NULL,
  `IDENTIFICACION` varchar(14) DEFAULT NULL,
  `TIPO_IDENTIFICACION` varchar(64) DEFAULT NULL,
  `NOMBRES` varchar(64) DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `CELULAR` varchar(12) DEFAULT NULL,
  `TELEFONO` varchar(12) DEFAULT NULL,
  `EMAIL` varchar(64) DEFAULT NULL,
  `DIRECCION` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTUDIANTE`, `ID_NICK`, `ID_CARRERA`, `IDENTIFICACION`, `TIPO_IDENTIFICACION`, `NOMBRES`, `FECHA_NACIMIENTO`, `CELULAR`, `TELEFONO`, `EMAIL`, `DIRECCION`) VALUES
(29, 21, 1, '1718536509', 'C', 'Robert Vicente Tene Curipoma', '2000-08-28', '0997474321', '022625072', 'trebortc@hotmail.com', 'Cdla. Ibarra'),
(30, 23, NULL, '1919191919', 'C', 'Elvis Cano Perez', '2019-04-03', '0999999997', '022625078', 'treborvt11c@hotmail.com', 'Guamani');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_asignatura`
--

CREATE TABLE `estudiante_asignatura` (
  `ID_ESTUDIANTE_ASIGNATURA` int(11) NOT NULL,
  `ID_ASIGNATURA_PERIODO` int(11) DEFAULT NULL,
  `ID_ESTUDIANTE` int(11) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  `NOTA_FINAL` decimal(2,2) DEFAULT NULL,
  `PARCIAL_1` decimal(2,2) UNSIGNED DEFAULT NULL,
  `PARCIAL_2` decimal(2,2) UNSIGNED DEFAULT NULL,
  `PARCIAL_3` decimal(2,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ID_NOTA` int(11) NOT NULL,
  `ID_ESTUDIANTE_ASIGNATURA` int(11) DEFAULT NULL,
  `ID_ACTIVIDAD_ACADEMICA` int(11) DEFAULT NULL,
  `NOTA_FINAL` decimal(2,2) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial_plantilla`
--

CREATE TABLE `parcial_plantilla` (
  `ID_PARCIAL_PLANTILLA` int(11) NOT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `NOTA_APRUEBA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parcial_plantilla`
--

INSERT INTO `parcial_plantilla` (`ID_PARCIAL_PLANTILLA`, `NOMBRE`, `DESCRIPCION`, `NOTA_APRUEBA`) VALUES
(1, 'Primer parcial 1', 'Nota para el primer parcial', '14.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial_plantilla_detalle`
--

CREATE TABLE `parcial_plantilla_detalle` (
  `ID_PARCIAL_PLANTILLA_DETALLE` int(11) NOT NULL,
  `ID_PARCIAL_PLANTILLA` int(11) DEFAULT NULL,
  `PORCENTAJE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parcial_plantilla_detalle`
--

INSERT INTO `parcial_plantilla_detalle` (`ID_PARCIAL_PLANTILLA_DETALLE`, `ID_PARCIAL_PLANTILLA`, `PORCENTAJE`) VALUES
(1, 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_academico`
--

CREATE TABLE `periodo_academico` (
  `ID_PERIODO_ACADEMICO` int(11) NOT NULL,
  `ID_PARCIAL_PLANTILLA` int(11) DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo_academico`
--

INSERT INTO `periodo_academico` (`ID_PERIODO_ACADEMICO`, `ID_PARCIAL_PLANTILLA`, `FECHA_INICIO`, `FECHA_FIN`, `ESTADO`) VALUES
(1, 1, '2019-04-01', '2019-04-30', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `ID_PROFESOR` int(11) NOT NULL,
  `ID_NICK` int(11) DEFAULT NULL,
  `IDENTIFICACION` varchar(14) DEFAULT NULL,
  `TIPO_IDENTIFICACION` varchar(64) DEFAULT NULL,
  `NOMBRES` varchar(64) DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `TITULO` varchar(64) DEFAULT NULL,
  `CELULAR` varchar(12) DEFAULT NULL,
  `TELEFONO` varchar(12) DEFAULT NULL,
  `EMAIL` varchar(64) DEFAULT NULL,
  `CARGO` varchar(64) DEFAULT NULL,
  `DIRECCION` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID_PROFESOR`, `ID_NICK`, `IDENTIFICACION`, `TIPO_IDENTIFICACION`, `NOMBRES`, `FECHA_NACIMIENTO`, `TITULO`, `CELULAR`, `TELEFONO`, `EMAIL`, `CARGO`, `DIRECCION`) VALUES
(1, NULL, '1718536560', 'C', 'Robert', '2013-04-02', 'Ing Sistemas', '0997854587', '2625072', 'tre@hotmail', 'Licenciando', 'Chillogallo'),
(2, NULL, '1707641427', 'C', 'MARIA DELFINA CURIPOMA MACAS', '1961-11-12', 'INGENIERO EN ALIMENTOS', '0997474323', '022625045', 'mari@gmail.com', 'LICENCIA EN CIENCIAS DE MANEJO DE ALIMENTOS', 'Cdla. Ibarra Barrio 4 de Agosto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `ID_RESPUESTA` int(11) NOT NULL,
  `RES_ID_RESPUESTA` int(11) DEFAULT NULL,
  `ID_ACTIVIDAD_INFORMATIVA` int(11) DEFAULT NULL,
  `ID_NICK` int(11) DEFAULT NULL,
  `MENSAJE` varchar(256) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_NICK` int(11) NOT NULL,
  `NICK` varchar(64) DEFAULT NULL,
  `CLAVE` varchar(64) DEFAULT NULL,
  `TIPO` varchar(64) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_NICK`, `NICK`, `CLAVE`, `TIPO`, `ESTADO`, `FECHA_CREACION`) VALUES
(1, 'trebortc', '$2y$13$ptzwdZgs8CiyvZ53p9YKi.TxV/EN20516SeLzA27tsdZaWFvYN.Au', 'ROLE_ADMIN', 'A', '2012-01-01 00:00:00'),
(2, 'abogado', '$2y$13$NWja0DuMswqzCmH0X0ho9.uqjMRLcAHDT4ZiGe8U15V5rORNHFCF.', 'ROLE_ADMIN', 'A', '2012-01-01 00:00:00'),
(6, 'anita', '$2y$13$C.RyWPpZSt5DLY7IiOhGmOCVM83WYd4Ai1CBR3L0Q6qPFwLNp/t5W', 'ROLE_ADMIN', 'A', '2014-01-01 00:00:00'),
(10, 'felipe', '$2y$13$b.7gfmoRyXzETFKXEkhyx.X7mcOG0IeKW4Yr2BH3juY.WAQAN6ED2', 'ROLE_ADMIN', 'A', NULL),
(18, 'robert', '$2y$13$X/VLnOVWW8hKfUD/95hsg.F8CJpdgk4uHwPYaIGuh3iqIDs1w19ni', 'ROLE_ADMIN', 'A', '2014-01-01 00:00:00'),
(20, 'treborvtc@hotmail.com', '$2y$13$w4DctTJTByiq6YMA8jrg3.epDyfGK0ZllJVCXSCq51UsT7vI4wLf.', 'ROLE_EST', 'A', NULL),
(21, 'trebortc@hotmail.com', '$2y$13$K6kd6uF0L6vi7OtRi.rC1O.BYi/O6cA9cgkBYpAMfNDzj82UkCU1G', 'ROLE_EST', 'A', NULL),
(22, 'mari@gmail.com', '$2y$13$qlIbTUA1ASHLHPHS/uPdZ.HMjToua1nokyFuG40A/uUYWBUJNFiUO', 'ROLE_PROF', 'A', NULL),
(23, 'treborvt11c@hotmail.com', '$2y$13$NfJPn45S.R4oRpUAt/yjL.T4beGSbCg.KKXLe8VGMkSN8MARoBYvC', 'ROLE_EST', 'A', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_academica`
--
ALTER TABLE `actividad_academica`
  ADD PRIMARY KEY (`ID_ACTIVIDAD_ACADEMICA`),
  ADD KEY `FK_RELATIONSHIP_27` (`ID_ASIGNATURA_PERIODO`);

--
-- Indices de la tabla `actividad_informativa`
--
ALTER TABLE `actividad_informativa`
  ADD PRIMARY KEY (`ID_ACTIVIDAD_INFORMATIVA`),
  ADD KEY `FK_RELATIONSHIP_18` (`ID_ASIGNATURA_PERIODO`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`ID_ASIGNATURA`);

--
-- Indices de la tabla `asignatura_periodo`
--
ALTER TABLE `asignatura_periodo`
  ADD PRIMARY KEY (`ID_ASIGNATURA_PERIODO`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_PERIODO_ACADEMICO`),
  ADD KEY `FK_RELATIONSHIP_20` (`ID_PROFESOR`),
  ADD KEY `FK_RELATIONSHIP_26` (`ID_CALIFICACION_PLANTILLA`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_ASIGNATURA`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_AULA`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`ID_AULA`);

--
-- Indices de la tabla `calificacion_plantilla`
--
ALTER TABLE `calificacion_plantilla`
  ADD PRIMARY KEY (`ID_CALIFICACION_PLANTILLA`);

--
-- Indices de la tabla `calificacion_plantilla_detalle`
--
ALTER TABLE `calificacion_plantilla_detalle`
  ADD PRIMARY KEY (`ID_CALIFICACION_PLANTILLA_DETALLE`),
  ADD KEY `FK_RELATIONSHIP_11` (`ID_CALIFICACION_PLANTILLA`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_CARRERA`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`),
  ADD KEY `FK_RELATIONSHIP_22` (`ID_NICK`),
  ADD KEY `FK_RELATIONSHIP_25` (`ID_CARRERA`);

--
-- Indices de la tabla `estudiante_asignatura`
--
ALTER TABLE `estudiante_asignatura`
  ADD PRIMARY KEY (`ID_ESTUDIANTE_ASIGNATURA`),
  ADD KEY `FK_RELATIONSHIP_21` (`ID_ESTUDIANTE`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_ASIGNATURA_PERIODO`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`ID_NOTA`),
  ADD KEY `FK_RELATIONSHIP_16` (`ID_ESTUDIANTE_ASIGNATURA`),
  ADD KEY `FK_RELATIONSHIP_17` (`ID_ACTIVIDAD_ACADEMICA`);

--
-- Indices de la tabla `parcial_plantilla`
--
ALTER TABLE `parcial_plantilla`
  ADD PRIMARY KEY (`ID_PARCIAL_PLANTILLA`);

--
-- Indices de la tabla `parcial_plantilla_detalle`
--
ALTER TABLE `parcial_plantilla_detalle`
  ADD PRIMARY KEY (`ID_PARCIAL_PLANTILLA_DETALLE`),
  ADD KEY `FK_RELATIONSHIP_12` (`ID_PARCIAL_PLANTILLA`);

--
-- Indices de la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  ADD PRIMARY KEY (`ID_PERIODO_ACADEMICO`),
  ADD KEY `FK_RELATIONSHIP_13` (`ID_PARCIAL_PLANTILLA`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`ID_PROFESOR`),
  ADD KEY `FK_RELATIONSHIP_23` (`ID_NICK`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`ID_RESPUESTA`),
  ADD KEY `FK_RELATIONSHIP_19` (`ID_ACTIVIDAD_INFORMATIVA`),
  ADD KEY `FK_RELATIONSHIP_24` (`ID_NICK`),
  ADD KEY `FK_RESPUESTAS_RELACIONADAS` (`RES_ID_RESPUESTA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_NICK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_academica`
--
ALTER TABLE `actividad_academica`
  MODIFY `ID_ACTIVIDAD_ACADEMICA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_informativa`
--
ALTER TABLE `actividad_informativa`
  MODIFY `ID_ACTIVIDAD_INFORMATIVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `ID_ASIGNATURA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `asignatura_periodo`
--
ALTER TABLE `asignatura_periodo`
  MODIFY `ID_ASIGNATURA_PERIODO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `ID_AULA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificacion_plantilla`
--
ALTER TABLE `calificacion_plantilla`
  MODIFY `ID_CALIFICACION_PLANTILLA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificacion_plantilla_detalle`
--
ALTER TABLE `calificacion_plantilla_detalle`
  MODIFY `ID_CALIFICACION_PLANTILLA_DETALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID_CARRERA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_ESTUDIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `estudiante_asignatura`
--
ALTER TABLE `estudiante_asignatura`
  MODIFY `ID_ESTUDIANTE_ASIGNATURA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `ID_NOTA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parcial_plantilla`
--
ALTER TABLE `parcial_plantilla`
  MODIFY `ID_PARCIAL_PLANTILLA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parcial_plantilla_detalle`
--
ALTER TABLE `parcial_plantilla_detalle`
  MODIFY `ID_PARCIAL_PLANTILLA_DETALLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  MODIFY `ID_PERIODO_ACADEMICO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `ID_PROFESOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `ID_RESPUESTA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_NICK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_academica`
--
ALTER TABLE `actividad_academica`
  ADD CONSTRAINT `FK_RELATIONSHIP_27` FOREIGN KEY (`ID_ASIGNATURA_PERIODO`) REFERENCES `asignatura_periodo` (`ID_ASIGNATURA_PERIODO`);

--
-- Filtros para la tabla `actividad_informativa`
--
ALTER TABLE `actividad_informativa`
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`ID_ASIGNATURA_PERIODO`) REFERENCES `asignatura_periodo` (`ID_ASIGNATURA_PERIODO`);

--
-- Filtros para la tabla `asignatura_periodo`
--
ALTER TABLE `asignatura_periodo`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_PERIODO_ACADEMICO`) REFERENCES `periodo_academico` (`ID_PERIODO_ACADEMICO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_PROFESOR`) REFERENCES `profesor` (`ID_PROFESOR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_26` FOREIGN KEY (`ID_CALIFICACION_PLANTILLA`) REFERENCES `calificacion_plantilla` (`ID_CALIFICACION_PLANTILLA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_ASIGNATURA`) REFERENCES `asignatura` (`ID_ASIGNATURA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID_AULA`);

--
-- Filtros para la tabla `calificacion_plantilla_detalle`
--
ALTER TABLE `calificacion_plantilla_detalle`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_CALIFICACION_PLANTILLA`) REFERENCES `calificacion_plantilla` (`ID_CALIFICACION_PLANTILLA`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`ID_NICK`) REFERENCES `usuario` (`ID_NICK`),
  ADD CONSTRAINT `FK_RELATIONSHIP_25` FOREIGN KEY (`ID_CARRERA`) REFERENCES `carrera` (`ID_CARRERA`);

--
-- Filtros para la tabla `estudiante_asignatura`
--
ALTER TABLE `estudiante_asignatura`
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ID_ESTUDIANTE`) REFERENCES `estudiante` (`ID_ESTUDIANTE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_ASIGNATURA_PERIODO`) REFERENCES `asignatura_periodo` (`ID_ASIGNATURA_PERIODO`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`ID_ESTUDIANTE_ASIGNATURA`) REFERENCES `estudiante_asignatura` (`ID_ESTUDIANTE_ASIGNATURA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`ID_ACTIVIDAD_ACADEMICA`) REFERENCES `actividad_academica` (`ID_ACTIVIDAD_ACADEMICA`);

--
-- Filtros para la tabla `parcial_plantilla_detalle`
--
ALTER TABLE `parcial_plantilla_detalle`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_PARCIAL_PLANTILLA`) REFERENCES `parcial_plantilla` (`ID_PARCIAL_PLANTILLA`);

--
-- Filtros para la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`ID_PARCIAL_PLANTILLA`) REFERENCES `parcial_plantilla` (`ID_PARCIAL_PLANTILLA`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`ID_NICK`) REFERENCES `usuario` (`ID_NICK`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`ID_ACTIVIDAD_INFORMATIVA`) REFERENCES `actividad_informativa` (`ID_ACTIVIDAD_INFORMATIVA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`ID_NICK`) REFERENCES `usuario` (`ID_NICK`),
  ADD CONSTRAINT `FK_RESPUESTAS_RELACIONADAS` FOREIGN KEY (`RES_ID_RESPUESTA`) REFERENCES `respuestas` (`ID_RESPUESTA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
