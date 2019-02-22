-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2019 a las 11:29:06
-- Versión del servidor: 10.0.37-MariaDB-0+deb8u1
-- Versión de PHP: 7.2.14-1+0~20190113100657.14+jessie~1.gbpd83c69

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test_buses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE IF NOT EXISTS `asientos` (
`id` int(11) NOT NULL,
  `viajes_id` int(11) NOT NULL,
  `asiento` int(11) NOT NULL,
  `ocupado` int(11) NOT NULL,
  `pasajero` varchar(40) COLLATE utf32_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`id`, `viajes_id`, `asiento`, `ocupado`, `pasajero`) VALUES
(1, 1, 1, 0, NULL),
(2, 1, 2, 1, 'MANUEL RUIZ'),
(3, 1, 3, 0, NULL),
(4, 2, 1, 1, 'CARMEN PEREZ'),
(5, 2, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE IF NOT EXISTS `viajes` (
`id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `destino` char(30) COLLATE utf32_spanish2_ci NOT NULL,
  `plazas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `fecha`, `destino`, `plazas`) VALUES
(1, '2019-02-27', 'Madrid', 3),
(2, '2019-02-28', 'Barcelona', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
 ADD PRIMARY KEY (`id`), ADD KEY `viajes_id` (`viajes_id`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asientos`
--
ALTER TABLE `asientos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asientos`
--
ALTER TABLE `asientos`
ADD CONSTRAINT `asientos_ibfk_1` FOREIGN KEY (`viajes_id`) REFERENCES `viajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
