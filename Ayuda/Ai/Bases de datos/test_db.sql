-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2018 a las 10:27:25
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(16) NOT NULL,
  `id_usuario` int(16) NOT NULL,
  `texto` text COLLATE utf8_spanish_ci,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aprobado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `id_usuario`, `texto`, `fecha`, `aprobado`) VALUES
(1, 1, 'ENTRADA DE PRUEBA, ROMMO ES HOMO, ALVARO ME COME LOS HUEVOS', '2018-11-29 10:23:56', 0),
(2, 1, 'PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 PRUEBA 2 ', '2018-11-29 10:25:46', 1),
(3, 2, 'Mi primera entrada desde PHP', '2018-11-29 11:15:37', 0),
(4, 2, 'Mi segunda entrada desde PHP', '2018-11-29 11:15:46', 0),
(5, 2, 'Mi segunda entrada desde PHP', '2018-11-29 11:18:33', 0),
(6, 2, 'Mi segunda entrada desde PHP', '2018-11-29 11:18:44', 0),
(7, 2, 'Mi segunda entrada desde PHP', '2018-11-29 11:20:52', 0),
(8, 2, 'Mi segunda entrada desde PHP', '2018-11-29 11:31:50', 0),
(9, 2, 'Mi segunda entrada desde PHP', '2018-11-30 10:28:59', 0),
(10, 2, 'Mi segunda entrada desde PHP', '2018-11-30 10:42:02', 0),
(11, 2, 'Mi segunda entrada desde PHP', '2018-12-03 11:09:48', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(16) NOT NULL,
  `usuario` char(16) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(24) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `estado` enum('P','A','B','') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellidos`, `password`, `estado`) VALUES
(1, 'Pepe', 'Perez', 'García', 'e10adc3949ba59abbe56e057f20f883e', 'A'),
(2, 'amocholi', 'Alvaro', 'Mocholi Gil', 'soytonto99', 'A'),
(3, 'rdllumioquinga', 'rommel david', 'llumiquinga toapanta', 'soytonto99', 'A'),
(4, 'Juanito', 'Emiliano', 'Torres', 'reyemiliano123', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asd` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entradas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
