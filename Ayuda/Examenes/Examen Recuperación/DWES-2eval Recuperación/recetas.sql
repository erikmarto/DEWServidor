-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2015 a las 11:50:23
-- Versión del servidor: 5.5.41
-- Versión de PHP: 5.4.4-14+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test_recetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recetas_id` int(11) NOT NULL,
  `matprimas_id` int(11) NOT NULL,
  `gramos` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recetas_id` (`recetas_id`),
  KEY `ingredientes_id` (`matprimas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `recetas_id`, `matprimas_id`, `gramos`) VALUES
(1, 1, 1, 80.00),
(2, 1, 2, 70.00),
(3, 1, 4, 100.00),
(4, 1, 5, 60.00),
(5, 2, 1, 100.00),
(6, 2, 2, 90.00),
(7, 2, 4, 100.00),
(8, 2, 3, 80.00),
(9, 2, 6, 45.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matprimas`
--

CREATE TABLE IF NOT EXISTS `matprimas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `preciokg` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `matprimas`
--

INSERT INTO `matprimas` (`id`, `nombre`, `preciokg`) VALUES
(1, 'Mozarella', 10.00),
(2, 'Tomate', 1.20),
(3, 'Champiñones', 3.00),
(4, 'Pimiento', 1.20),
(5, 'Alcachofas', 1.50),
(6, 'Jamón york', 9.50),
(7, 'Atún', 11.00),
(8, 'Piña', 1.30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descri` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `costecalculado` decimal(10,0) DEFAULT NULL,
  `pvp` decimal(10,0) DEFAULT NULL,
  `elaboracion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `descri`, `costecalculado`, `pvp`, `elaboracion`) VALUES
(1, 'Caprichosa', 0, 0, '-Poner tomate\r\n-Espolvorear la mozarella\r\n-Añadir los champiñones en el centro\r\n-El pimiento formando un círculo\r\n-Hornear 8 minutos'),
(2, 'Caprichosa', 0, 9, '-Poner tomate\r\n-Espolvorear la mozarella\r\n-Añadir los champiñones en el centro\r\n-El pimiento formando un círculo\r\n-Hornear 8 minutos'),
(3, 'Caprichosa', 0, 9, '-Poner tomate\n-Espolvorear la mozarella\n-Añadir los champiñones en el centro\n-El pimiento formando un círculo\n-Hornear 8 minutos'),
(4, 'Marinera', NULL, NULL, 'bla bla bla bla\r\nbla bla bla bla\r\nbla bla bla bla\r\nbla bla bla bla\r\nbla bla bla bla\r\nbla bla bla bla\r\nbla bla bla blabla bla bla bla\r\nbla bla bla bla');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`recetas_id`) REFERENCES `recetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredientes_ibfk_2` FOREIGN KEY (`matprimas_id`) REFERENCES `matprimas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
