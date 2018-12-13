-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2015 a las 23:35:42
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vuelos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuertos`
--

CREATE TABLE IF NOT EXISTS `aeropuertos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(3) COLLATE utf32_spanish2_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `aeropuertos`
--

INSERT INTO `aeropuertos` (`id`, `codigo`, `ciudad`) VALUES
(1, 'VLC', 'Valencia'),
(2, 'MAD', 'Madrid'),
(3, 'BCN', 'Barcelona'),
(4, 'ORL', 'Paris Orly');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE IF NOT EXISTS `asientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vuelos_id` int(11) NOT NULL,
  `asiento` char(4) COLLATE utf32_spanish2_ci NOT NULL,
  `pasajero` varchar(60) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vuelos_id` (`vuelos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`id`, `vuelos_id`, `asiento`, `pasajero`, `precio`) VALUES
(1, 1, '01', 'Manolo García', '120'),
(2, 1, '02', 'Pepa Pérez', '120'),
(3, 1, '03', NULL, NULL),
(4, 1, '04', NULL, NULL),
(5, 1, '03', NULL, NULL),
(6, 1, '04', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE IF NOT EXISTS `aviones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(40) COLLATE utf32_spanish2_ci NOT NULL,
  `matricula` varchar(10) COLLATE utf32_spanish2_ci NOT NULL,
  `estado` char(1) COLLATE utf32_spanish2_ci NOT NULL,
  `filas` int(11) NOT NULL,
  `asientosfila` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `aviones`
--

INSERT INTO `aviones` (`id`, `modelo`, `matricula`, `estado`, `filas`, `asientosfila`) VALUES
(3, 'Boeing 727', 'HRT24', 'A', 26, 4),
(4, 'Boeing 737', 'HRT34', 'A', 30, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE IF NOT EXISTS `vuelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aviones_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `aeropue1_id` int(11) NOT NULL,
  `aeropue2_id` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aviones_id` (`aviones_id`,`aeropue1_id`,`aeropue2_id`),
  KEY `xs` (`aeropue1_id`),
  KEY `xd` (`aeropue2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `aviones_id`, `fecha`, `aeropue1_id`, `aeropue2_id`, `precio`) VALUES
(1, 3, '2015-02-18', 1, 2, '120'),
(2, 4, '2015-02-19', 2, 3, '100');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD CONSTRAINT `dd` FOREIGN KEY (`vuelos_id`) REFERENCES `vuelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `va` FOREIGN KEY (`aviones_id`) REFERENCES `aviones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `xd` FOREIGN KEY (`aeropue1_id`) REFERENCES `aeropuertos` (`id`),
  ADD CONSTRAINT `xf` FOREIGN KEY (`aeropue2_id`) REFERENCES `aeropuertos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
