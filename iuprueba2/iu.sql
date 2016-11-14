-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2016 a las 22:45:16
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionalidad`
--

CREATE TABLE `funcionalidad` (
  `id_funcionalidad` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `id_rol` int(25) NOT NULL,
  `descripcion` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `funcionalidad`
--

INSERT INTO `funcionalidad` (`id_funcionalidad`, `id_rol`, `descripcion`) VALUES
('pepa', 2, 'pepa'),
('pepe', 3, 'pepe'),
('pepita', 0, 'dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `NOMBRE_GRUPO` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`NOMBRE_GRUPO`) VALUES
('ESPARTACO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `FUNCIONALIDAD` varchar(45) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `GRUPOS_FUNCIONALIDAD` varchar(45) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USUARIO` varchar(40) COLLATE utf32_spanish_ci NOT NULL,
  `PASSWORD` varchar(128) COLLATE utf32_spanish_ci NOT NULL,
  `NOMBRE` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `APELLIDOS` varchar(45) COLLATE utf32_spanish_ci DEFAULT NULL,
  `DNI` varchar(45) COLLATE utf32_spanish_ci NOT NULL,
  `GRUPO_USUARIO` varchar(45) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USUARIO`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `DNI`, `GRUPO_USUARIO`) VALUES
('pepa', 'pepa', 'pp', 'pp', '3', 'ESPARTACO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `funcionalidad`
--
ALTER TABLE `funcionalidad`
  ADD PRIMARY KEY (`id_funcionalidad`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`NOMBRE_GRUPO`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`FUNCIONALIDAD`,`GRUPOS_FUNCIONALIDAD`),
  ADD KEY `GRUPO_idx` (`GRUPOS_FUNCIONALIDAD`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUARIO`,`GRUPO_USUARIO`),
  ADD UNIQUE KEY `DNI_UNIQUE` (`DNI`),
  ADD KEY `NOMBREGRUPO_idx` (`GRUPO_USUARIO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `FUNCIONALIDAD_PERMISOS` FOREIGN KEY (`FUNCIONALIDAD`) REFERENCES `funcionalidad` (`id_funcionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `GRUPO_PERMISOS` FOREIGN KEY (`GRUPOS_FUNCIONALIDAD`) REFERENCES `grupo` (`NOMBRE_GRUPO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `NOMBREGRUPO` FOREIGN KEY (`GRUPO_USUARIO`) REFERENCES `grupo` (`NOMBRE_GRUPO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
