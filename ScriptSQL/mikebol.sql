-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2017 a las 00:01:16
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mikebol`
--

CREATE DATABASE IF NOT EXISTS `mikebol` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `mikebol`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_e_instructor`
--

CREATE TABLE `admin_e_instructor` (
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `num_documento` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `idchat` int(255) NOT NULL,
  `mensaje` varchar(5000) NOT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_planilla`
--

CREATE TABLE `detalle_planilla` (
  `iddetalle_planilla` int(15) NOT NULL,
  `idplanilla` int(15) NOT NULL,
  `idequipo` int(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `idnovedad` int(15) NOT NULL,
  `tiempo_accion` varchar(45) NOT NULL,
  `minuto_novedad` int(15) NOT NULL,
  `penales` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idequipo` int(15) NOT NULL,
  `nombre_equipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_torneo`
--

CREATE TABLE `equipo_torneo` (
  `idequipo_torneo` int(15) NOT NULL,
  `idtorneo` int(15) NOT NULL,
  `idequipo` int(15) NOT NULL,
  `idgrupo` int(15) NOT NULL,
  `idfase` int(15) NOT NULL,
  `idestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` tinyint(1) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `descripcion`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `idfase` int(15) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(15) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_ficha`
--

CREATE TABLE `grupo_ficha` (
  `idgrupo_ficha` int(15) NOT NULL,
  `grupo_ficha` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_programa`
--

CREATE TABLE `nom_programa` (
  `idnom_programa` int(15) NOT NULL,
  `programa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `idnovedad` int(15) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_ficha`
--

CREATE TABLE `num_ficha` (
  `idnum_ficha` int(15) NOT NULL,
  `ficha` varchar(15) NOT NULL,
  `idgrupo_ficha` int(15) NOT NULL,
  `idnom_programa` int(15) NOT NULL,
  `idestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_persona`
--

CREATE TABLE `perfil_persona` (
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `num_documento` int(12) NOT NULL,
  `idnum_ficha` int(15) NOT NULL,
  `eps` varchar(45) NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `idequipo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilla`
--

CREATE TABLE `planilla` (
  `idplanilla` int(15) NOT NULL,
  `idtorneo` int(15) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `nombre_arbitro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(15) NOT NULL,
  `descripcion_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `descripcion_rol`) VALUES
(1, 'Adminsitrador'),
(2, 'Instructor'),
(3, 'Capitan'),
(4, 'Jugador'),
(5, 'Nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `idtipo_documento` varchar(15) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `idestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `idtorneo` int(15) NOT NULL,
  `nombre_torneo` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `idestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `correo` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `idrol` int(15) NOT NULL,
  `idtipo_documento` varchar(15) DEFAULT NULL,
  `idestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_e_instructor`
--
ALTER TABLE `admin_e_instructor`
  ADD KEY `correo` (`correo`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `correo` (`correo`);

--
-- Indices de la tabla `detalle_planilla`
--
ALTER TABLE `detalle_planilla`
  ADD PRIMARY KEY (`iddetalle_planilla`),
  ADD KEY `idplanilla` (`idplanilla`,`idequipo`,`correo`,`idnovedad`),
  ADD KEY `idnovedad` (`idnovedad`),
  ADD KEY `idequipo` (`idequipo`),
  ADD KEY `correo` (`correo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idequipo`);

--
-- Indices de la tabla `equipo_torneo`
--
ALTER TABLE `equipo_torneo`
  ADD PRIMARY KEY (`idequipo_torneo`),
  ADD KEY `idtorneo` (`idtorneo`,`idequipo`,`idgrupo`,`idfase`),
  ADD KEY `idequipo` (`idequipo`),
  ADD KEY `idfase` (`idfase`),
  ADD KEY `idgrupo` (`idgrupo`),
  ADD KEY `idestado` (`idestado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`idfase`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `grupo_ficha`
--
ALTER TABLE `grupo_ficha`
  ADD PRIMARY KEY (`idgrupo_ficha`);

--
-- Indices de la tabla `nom_programa`
--
ALTER TABLE `nom_programa`
  ADD PRIMARY KEY (`idnom_programa`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`idnovedad`);

--
-- Indices de la tabla `num_ficha`
--
ALTER TABLE `num_ficha`
  ADD PRIMARY KEY (`idnum_ficha`),
  ADD KEY `idgrupo_ficha` (`idgrupo_ficha`,`idnom_programa`),
  ADD KEY `idnom_programa` (`idnom_programa`),
  ADD KEY `idestado` (`idestado`);

--
-- Indices de la tabla `perfil_persona`
--
ALTER TABLE `perfil_persona`
  ADD KEY `idnum_ficha` (`idnum_ficha`,`idequipo`),
  ADD KEY `idequipo` (`idequipo`),
  ADD KEY `correo` (`correo`);

--
-- Indices de la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD PRIMARY KEY (`idplanilla`),
  ADD KEY `idtorneo` (`idtorneo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idtipo_documento`),
  ADD KEY `idestado` (`idestado`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`idtorneo`),
  ADD KEY `idestado` (`idestado`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `idtipo_documento` (`idtipo_documento`),
  ADD KEY `idestado` (`idestado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_planilla`
--
ALTER TABLE `detalle_planilla`
  MODIFY `iddetalle_planilla` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idequipo` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipo_torneo`
--
ALTER TABLE `equipo_torneo`
  MODIFY `idequipo_torneo` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `idfase` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo_ficha`
--
ALTER TABLE `grupo_ficha`
  MODIFY `idgrupo_ficha` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nom_programa`
--
ALTER TABLE `nom_programa`
  MODIFY `idnom_programa` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `idnovedad` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `num_ficha`
--
ALTER TABLE `num_ficha`
  MODIFY `idnum_ficha` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `planilla`
--
ALTER TABLE `planilla`
  MODIFY `idplanilla` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `idtorneo` int(15) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin_e_instructor`
--
ALTER TABLE `admin_e_instructor`
  ADD CONSTRAINT `admin_e_instructor_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `user` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `user` (`correo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_planilla`
--
ALTER TABLE `detalle_planilla`
  ADD CONSTRAINT `detalle_planilla_ibfk_1` FOREIGN KEY (`idnovedad`) REFERENCES `novedad` (`idnovedad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_planilla_ibfk_2` FOREIGN KEY (`idplanilla`) REFERENCES `planilla` (`idplanilla`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_planilla_ibfk_3` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_planilla_ibfk_4` FOREIGN KEY (`correo`) REFERENCES `user` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_torneo`
--
ALTER TABLE `equipo_torneo`
  ADD CONSTRAINT `equipo_torneo_ibfk_1` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_torneo_ibfk_2` FOREIGN KEY (`idtorneo`) REFERENCES `torneo` (`idtorneo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_torneo_ibfk_3` FOREIGN KEY (`idfase`) REFERENCES `fase` (`idfase`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_torneo_ibfk_4` FOREIGN KEY (`idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_torneo_ibfk_5` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `num_ficha`
--
ALTER TABLE `num_ficha`
  ADD CONSTRAINT `num_ficha_ibfk_1` FOREIGN KEY (`idgrupo_ficha`) REFERENCES `grupo_ficha` (`idgrupo_ficha`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `num_ficha_ibfk_2` FOREIGN KEY (`idnom_programa`) REFERENCES `nom_programa` (`idnom_programa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `num_ficha_ibfk_3` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_persona`
--
ALTER TABLE `perfil_persona`
  ADD CONSTRAINT `perfil_persona_ibfk_3` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `perfil_persona_ibfk_4` FOREIGN KEY (`idnum_ficha`) REFERENCES `num_ficha` (`idnum_ficha`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `perfil_persona_ibfk_5` FOREIGN KEY (`correo`) REFERENCES `user` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD CONSTRAINT `planilla_ibfk_1` FOREIGN KEY (`idtorneo`) REFERENCES `torneo` (`idtorneo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD CONSTRAINT `tipo_documento_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD CONSTRAINT `torneo_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idtipo_documento`) REFERENCES `tipo_documento` (`idtipo_documento`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
