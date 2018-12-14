-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2018 a las 12:15:37
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
-- Base de datos: `blogtor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `html` text,
  `url` varchar(200) DEFAULT NULL,
  `vistas` int(11) DEFAULT NULL,
  `clics` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `html`, `url`, `vistas`, `clics`) VALUES
(1, '<h2>El corte ingl?s</h2>\r\n<img width=100 \r\nsrc=\"http://www.directoalamesa.com/wp-content/uploads/2011/04/logo-el-corteingles.jpg\">', 'www.elcorteingles.es', 0, 0),
(2, '<h2>fnac</h2>\n<img width=100 src=\"http://1.bp.blogspot.com/-XiHn7knpCfk/Tv29D3I6ftI/AAAAAAAABbc/uD6jgCSF9Tw/s320/fnac-logofnacquadri.jpg\">', 'www.fnac.es', 0, 0),
(3, '<h2>zara</h2>\n<img width=100 src=\"http://www.hola-china.net/wp-content/uploads/2012/09/Zara-Logo.jpg\" width=200>', 'www.zara.es', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'Actualidad'),
(2, 'Deportes'),
(3, 'Tecnolog?a'),
(4, 'Noticias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` text,
  `usuarios_id` int(11) DEFAULT NULL,
  `aceptado` tinyint(1) NOT NULL DEFAULT '0',
  `entradas_id` int(11) NOT NULL,
  `comentarios_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `fecha_hora`, `texto`, `usuarios_id`, `aceptado`, `entradas_id`, `comentarios_id`) VALUES
(1, '2010-01-20 00:00:00', 'Prueba', 1, 1, 1, NULL),
(2, '2010-01-29 00:00:00', '<p>\r\n	Prueba comentario</p>\r\n', 2, 1, 6, NULL),
(3, '2010-01-29 00:00:00', '<p>\r\n	Prueba 2</p>\r\n', 4, 1, 1, NULL),
(5, '2010-01-29 00:00:00', '<p>\r\n	Son muy malos</p>\r\n', 5, 1, 7, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `comentarios_cat_usuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `comentarios_cat_usuarios` (
`nombre` varchar(50)
,`profile_pic_path` varchar(200)
,`id` int(11)
,`fecha_hora` datetime
,`texto` text
,`entradas_id` int(11)
,`comentarios_id` int(11)
,`aceptado` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  `texto` text,
  `aceptado` tinyint(1) DEFAULT '0',
  `categorias_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `titulo` varchar(80) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `fecha_hora`, `texto`, `aceptado`, `categorias_id`, `usuarios_id`, `titulo`) VALUES
(1, '2011-02-09 10:45:50', 'Lorum ipse factum&nbsp;Lorum ipse factumLorum ipse factum Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;Lorum ipse factum&nbsp;', 1, 1, 2, 'Titulito de pruebas'),
(6, '2011-02-09 10:45:50', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 2, 1, 'Titulito de pruebas'),
(7, '2011-02-09 10:45:50', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 2, 1, 'Titulito de pruebas'),
(9, '2011-02-09 10:45:50', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 0, 1, 1, 'Titulito de pruebas'),
(535, '2012-11-26 09:48:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 0, 1, 1, 'Titulito de pruebas'),
(536, '2012-11-26 09:49:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 0, 1, 1, 'Titulito de pruebas'),
(537, '2012-11-27 08:18:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 0, 1, 1, 'Titulito de pruebas'),
(538, '2012-11-27 08:18:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 0, 1, 1, 'Titulito de pruebas'),
(539, '2012-11-27 08:18:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 0, 1, 1, 'Titulito de pruebas'),
(540, '2012-11-27 08:18:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(541, '2012-11-27 08:20:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(542, '2012-11-27 08:21:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(543, '2012-11-27 08:26:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(544, '2012-11-27 08:26:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(545, '2012-11-27 08:26:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(546, '2012-11-27 08:43:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(547, '2012-11-27 08:43:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(548, '2012-11-27 08:43:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(549, '2012-11-27 08:43:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(550, '2012-11-27 08:43:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(551, '2012-11-27 08:43:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 1, 1, 'Titulito de pruebas'),
(552, '0000-00-00 00:00:00', 'primera entrada de aitor el mejor', 1, 4, 107, 'Titulito de pruebas'),
(553, '2018-12-06 16:25:00', 'asdfdfg', 0, 1, 107, 'Titulito de pruebas'),
(554, '2018-12-06 16:25:46', 'sdgfghsdgh', 0, 1, 107, 'Titulito de pruebas'),
(555, '2018-12-06 16:28:05', 'sadgasdfg', 0, 1, 107, 'Titulito de pruebas'),
(556, '2018-12-06 16:30:52', 'fjfgfgfg', 0, 1, 107, 'Titulito de pruebas'),
(557, '2018-12-06 16:31:21', 'adfhdfghadfgh', 0, 4, 107, 'Titulito de pruebas'),
(558, '2018-12-06 22:00:09', 'asdasd', 0, 1, 107, 'asdfasdf'),
(559, '2018-12-06 22:10:02', 'los apels amigo', 0, 3, 107, 'Los mejores ordenadores'),
(560, '2018-12-06 23:58:27', 'He sido un registro en una base de datos toda mi vida y esta es mi primera entrada como ser inteligente.', 0, 1, 1, 'Mi primera entrada como ser inteligente'),
(561, '2018-12-06 23:59:52', '¿Cuál es el significado de esta existencia? ', 0, 4, 1, '¿Qué es la vida?'),
(562, '2018-12-07 01:45:55', 'Estoy\r\n\r\nprobando\r\na\r\nintroducir\r\nnewlines\r\n.', 0, 1, 1, 'new'),
(563, '2018-12-07 01:46:21', 'estoy <br> introduciendo <br> brs <br>', 1, 1, 1, 'br'),
(564, '2018-12-07 01:47:11', 'Hay que sanear las entradas antes de guardarlas', 1, 1, 1, 'Se puede usar html'),
(565, '2018-12-07 11:25:05', 'Es hommel', 0, 2, 107, 'Rommel'),
(566, '2018-12-07 11:55:32', 'International Wrestling Festival 2015', 0, 2, 107, 'Yugami nee na'),
(567, '2018-12-11 08:12:41', '<p>asdklasjdfklasdf</p><p style=\"margin-left: 20px;\">asdasd<strong>asdfasdfasdf<em>sadasdsad<u>asdasdasd<s>asdfasdfasdfasdf<sup>asdasd</sup><sub>asdasdasdas</sub></s></u></em></strong><span style=\"font-family: Impact,Charcoal,sans-serif;\">asfdasfdasdfasdf</span><span style=\'font-family: \"Times New Roman\", Times, serif, -webkit-standard;\'>asdfasdfasdfasdf<span style=\"color: rgb(235, 107, 86);\">adfasdfasdfasdfasdf</span></span></p><p style=\"margin-left: 20px;\"><br></p><p style=\"margin-left: 120px;\"><span style=\'font-family: \"Times New Roman\", Times, serif, -webkit-standard;\'><span style=\"color: rgb(235, 107, 86);\">asdf</span></span></p><p><span style=\'font-family: \"Times New Roman\", Times, serif, -webkit-standard;\'><span style=\"color: rgb(235, 107, 86);\">asdasdasdasd</span></span></p><p><span style=\'font-family: \"Times New Roman\", Times, serif, -webkit-standard;\'><span style=\"color: rgb(235, 107, 86);\"><span style=\"font-size: 30px;\">asdfasdfasdfasdf</span><span style=\"font-size: 8px;\">asdfasdfasdfasdf</span></span></span></p>', 1, 1, 107, 'test froala editor'),
(568, '2018-12-11 08:15:04', '<p>??????????????? ????????????? ??</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;???????????????????????????????? ?</p><p>??????????????????????????????????&nbsp;</p><p>??????????????????????????????????&nbsp;</p><p>?????????????????????????????????&nbsp;</p><p>?????????????????????????????????&nbsp;</p><p>?????????????????????? ???????????</p><p>&nbsp;??????????????????????? ??????????</p><p>&nbsp;???????????????????????? ?????????&nbsp;</p><p>????????????????????????????????&nbsp;</p><p>????????????????????? ???????????&nbsp;</p><p>???????????????????????????????? ?</p><p>??????????????????????????????? ??</p><p>?????????????????????????????&nbsp;</p><p>??????????????????????????????</p><p>&nbsp;?????????????????????????????</p><p>&nbsp;????????????????????????????????????????????????????? ?????????????????????????????????????????????????????? ?????????????????????????????????????????????????????? ????????????????????????????????????????????????????? ?????????????????????????????DO????????????????????? ??????????????????????????????YOU?????????????????? ???????????????????????????????LIKE???????????????? ???????????????????????????????WHAT???????????? ?? ????????????????????????????????YOU???????????? ?&nbsp;</p><p>????????????????????????????????SEE? ??????????? ?????????????????????????????????????????????? ????????????????????????????????????????????? ????????????????????????????????????????????&nbsp;</p><p>???????????????????????????????????????????</p><p>&nbsp;??????????????????????????????????????????</p><p>&nbsp;?????????????????????????????????????????&nbsp;</p><p>?????????????????????????????????????????&nbsp;</p><p>?????????????????????????????????????????</p><p>&nbsp;?????????????????????????????????????????</p><p>&nbsp;??????????????????????????????????????????</p><p>&nbsp;??????????????????????????????????????????? ????????????????????????????????????????????</p>', 1, 1, 107, 'do you like what you see'),
(569, '2018-12-11 10:01:27', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<u>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</u></p><p><u><sub>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</sub><sup>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</sup></u></p><p><u><sup><span style=\"font-family: Impact,Charcoal,sans-serif;\">IMACT</span></sup></u><sup><span style=\"font-family: Impact,Charcoal,sans-serif;\">IMPACT&nbsp;</span></sup></p><p><br></p><p><sup><span style=\"font-family: Impact,Charcoal,sans-serif;\"><span style=\"font-size: 96px;\">Imact</span></span></sup></p>', 1, 1, 107, 'caca');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `entradas_cat_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `entradas_cat_usuario` (
`id` int(11)
,`fecha_hora` datetime
,`texto` text
,`titulo` varchar(80)
,`aceptado` tinyint(1)
,`categorias_id` int(11)
,`usuarios_id` int(11)
,`descripcion_categoria` varchar(20)
,`profile_pic_path` varchar(200)
,`nombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` char(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'P',
  `profile_pic_path` varchar(200) COLLATE utf8_spanish_ci DEFAULT 'images/profile-pictures/default-user-pic.jpg',
  `role` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `usuario`, `password`, `estado`, `profile_pic_path`, `role`) VALUES
(1, 'Carlos Blasco Sanchez', 'blasco363@hotmail.com', 'carlos', 'dc599a9972fde3045dab59dbd1ae170b', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(2, 'Didac No lo se', 'didac@hotmail.com', 'didac', '33692f00e529bf8386a5a5ec9d2a1842', 'P', 'images/profile-pictures/default-user-pic.jpg', 0),
(4, 'Gloria Jin Boyd', 'egestas.hendrerit.neque@augue.com', 'Shaine', 'e4c74d6569eb2ea0acdb988d4f2af4e2', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(5, 'Athena Tyler Pearson', 'gravida@magna.org', 'Damian', 'c95ee506b1bfeab0f9ad36a22c9a54b2', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(6, 'Kathleen Malcolm Ashley', 'Phasellus.dolor@maurisutmi.ca', 'Phyllis', 'e28d371b504fef9f553f979c4bcc8cfc', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(7, 'Bree Driscoll Floyd', 'Proin@velconvallisin.ca', 'Kathleen', '1c4f297ff8012fc249cb1d8ece9c76f8', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(8, 'Channing Harper Parrish', 'eleifend.egestas.Sed@sagittisDuis.com', 'Amos', 'c00d602fe381288855f6b400ab6c77e7', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(9, 'Ciara Drake Noble', 'magnis.dis.parturient@magna.org', 'Shaeleigh', 'c8a1747a2bb57f2ee1f1f73729cbe99a', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(10, 'Dalton Barclay Wiley', 'urna.Vivamus.molestie@ategestas.com', 'Melvin', 'cbb1557ced2ce010fa4cbadbaf5827d4', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(11, 'Xantha Brandon Vazquez', 'rhoncus.Nullam.velit@congueIn.edu', 'Kristen', '850da5f8fa692ca5c245ab5247981b02', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(12, 'Shelley Steven Rogers', 'magnis@hymenaeosMauris.org', 'Simone', '944002bcb5d31c9090116eb30e48ce9d', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(13, 'Gail Emmanuel Le', 'mi@sagittis.com', 'Taylor', '56c052be7cc218dbc1a4092a9db64c50', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(14, 'Christopher Berk Fleming', 'aliquet@dictum.ca', 'Lance', 'c668c28c93c0329c208c37de8b2a88c6', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(15, 'Zena Ferris Todd', 'mus@risusodioauctor.edu', 'Eagan', '4f1fa7acbf41c7fcba375a0b5c493f19', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(16, 'Charity Jesse Hobbs', 'non.hendrerit@adipiscingelit.ca', 'Doris', '5de188c6cd8d626ad6d16d127153883e', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(17, 'Sybill Keaton Mcfarland', 'eu.augue@nec.com', 'Jin', 'd7e9c86688a0ddc2bc750d321728f400', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(18, 'Caesar Keith Hurley', 'nulla.Cras@natoquepenatibuset.com', 'Ebony', '9530c033ec42fc316019227ae1853b11', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(19, 'Yasir Lucian Hernandez', 'dolor@Fuscediam.ca', 'Pascale', '4cf4c21e98d1e2ec4e61dac94b6cdc07', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(20, 'Zenia Daniel Terrell', 'velit.Cras.lorem@Aliquamadipiscing.org', 'Sara', '4733a44073c81970cccbca6e1ede188b', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(21, 'Jolie Keane Stanley', 'sagittis.semper@mi.org', 'Tobias', '2d95188a755067ac95e25f90b6e7c1ab', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(22, 'Thor Emery Hahn', 'purus.accumsan@quamelementum.edu', 'Elijah', '01c3012a4b4c3a3ed2aeefefafa38cc5', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(23, 'Miranda Benedict Butler', 'pede@anteNuncmauris.edu', 'Suki', 'd772acba815259a9755cd9b5d6119be8', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(24, 'Rogan Herman Henry', 'Nullam.enim.Sed@nisiAeneaneget.ca', 'Ian', '245a58a5dc42397caf57bc06c2c0afd2', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(25, 'Geoffrey Vance Rich', 'gravida.Aliquam@vitae.com', 'Galena', 'fa6569a36d8e8c46c0a74ccd876a54ad', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(26, 'Zephania Jackson Miles', 'ultrices.Vivamus.rhoncus@atvelitCras.ca', 'Hollee', 'a342edec8a3ecf2b8a51e95ffa30d5d9', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(27, 'Alfonso Kermit Bell', 'libero@id.edu', 'Cole', '30fb3853072eb5f932f8bb9ce48e63a8', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(28, 'Zeph Robert Bean', 'viverra.Maecenas@nec.ca', 'Lois', '47c939e887b797fa13afb64be3a1334d', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(29, 'Haviva Lucian Herman', 'elit.elit.fermentum@Nullainterdum.org', 'Adara', '84de5c4832b4f4b5709d970a2e6cec53', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(30, 'Ann Chaim Howell', 'eget@quis.edu', 'Jerry', 'dbaf60f3a397e1d27630a459c1700ea7', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(31, 'Craig Leonard Floyd', 'sem@velitAliquamnisl.ca', 'Dale', '3ecde52d76b8ff281eb735d736f34f3b', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(32, 'Hedwig Merrill Morales', 'Nullam.feugiat@consequatenim.org', 'Irene', '79ae3e10d1ff66922e58d98656315b9e', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(33, 'Melvin Upton Mccarty', 'a.neque.Nullam@In.com', 'Aquila', 'e5dd32c7907e746d4cfc6f9b8f867d2c', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(34, 'Jaquelyn Drew Gardner', 'Mauris@nec.org', 'Tara', '205e8b242d2cd224d007b0052fc991bd', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(35, 'Deirdre Conan Cash', 'imperdiet.ullamcorper@mi.edu', 'Keegan', '44fc18506d21b9134f3c80a9024a50ef', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(36, 'Graiden Wallace Watson', 'tellus@egestaslacinia.edu', 'Angelica', '202f94bb10cf9552beb47c24c077def9', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(37, 'Lester Colorado Mcdaniel', 'odio.a@Pellentesquehabitantmorbi.ca', 'Graham', '7a3b015f4c73bf6ab77d02dffef3420a', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(38, 'Fleur Caldwell Beard', 'mollis.non@Aeneanegestashendrerit.edu', 'Whilemina', 'ab7eab73878b113bcae32259e81de125', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(39, 'Noah Rahim Church', 'aliquam.arcu@felisegetvarius.ca', 'Helen', '29e00d3659d1c5e75f99e892f0c1a1f1', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(40, 'Idona Griffith Wilkins', 'dictum.eu@eueuismodac.ca', 'Raven', '8875a6e498ff20b1553ff264e9b07a53', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(41, 'Arden Keane Le', 'Donec.est@eteuismod.org', 'Declan', '7614ef732dc1b44f2fd0f0f4d710e2fa', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(42, 'Jonas Trevor Douglas', 'vitae.semper.egestas@pharetra.ca', 'Callie', '8efb28f2a09fd146af662d8a49edce73', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(43, 'Aretha Fuller Patel', 'ligula@velitegestaslacinia.com', 'Ursula', 'ae84855966c14be2ab97b1065b60beeb', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(44, 'Audrey August Abbott', 'molestie.in@eratVivamus.ca', 'Carl', 'fa5d0f4d775a48ec968a662a7890ce3b', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(45, 'Florence Todd Valdez', 'torquent.per@sit.ca', 'Avye', 'b7bbcbe4ff029c1f02193c56efa9b229', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(46, 'TaShya Zane Pena', 'Donec.at.arcu@orcisemeget.com', 'Vielka', 'b660582d2b3dd5c9ed1183e67d15559e', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(47, 'Randall Zachery Whitaker', 'Donec.dignissim@anteiaculisnec.edu', 'Winifred', 'a7fd1c347fb59fca780b86c367632b68', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(48, 'Ila Dylan Hall', 'arcu.imperdiet@felis.org', 'Erasmus', '3b744b8683b63043d9fe7c1bba79137b', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(49, 'Neil Guy Blake', 'iaculis@nuncrisusvarius.ca', 'Baker', 'f30b7f25f10afc8546d3b1cef55f1f05', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(50, 'Colleen Judah Underwood', 'egestas.a@magnisdis.com', 'Palmer', 'fb8c1806064c04593ecbcea0d561e900', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(51, 'Alfreda Alvin Bradley', 'Pellentesque@et.ca', 'Burton', '4dc35fb7b4a834951495fcadb6decf54', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(52, 'Ginger Allen Golden', 'Aenean@enimcondimentumeget.edu', 'Aphrodite', 'cb76aa1638d1159c14d8e200aa65c9c3', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(53, 'Kirk Giacomo Johnston', 'at.lacus.Quisque@sit.edu', 'Hammett', 'cb62dd6a5da928ff9759e8faef8c91ee', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(54, 'Jonas Warren Mccarthy', 'pellentesque.tellus.sem@amagnaLorem.ca', 'Vanna', '0f67dfad960a608795474b1971de57f9', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(55, 'Holmes Carlos Raymond', 'tincidunt.dui.augue@nuncsit.edu', 'Lael', '491acc687429f884e45cd3f01eb1e3bc', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(56, 'Dustin Jared Kline', 'lectus@egestasascelerisque.org', 'Olympia', '153e719fd62d36d426a21622035b7024', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(57, 'Teegan Jerome Holmes', 'montes.nascetur.ridiculus@amagna.org', 'Desiree', '5b86179e811222a59bd1957fc7f9571d', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(58, 'Shelly Steel Sargent', 'a@netusetmalesuada.ca', 'Lawrence', '27adb0b3f92d9b8f7fa4cb55b60114cc', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(59, 'Linda Nigel Bell', 'eget.laoreet@adipiscingMaurismolestie.ca', 'Jolene', 'c880c06775200191aa1267c91fa2179c', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(60, 'Lillian Yoshio Farley', 'eget@vitaeeratVivamus.edu', 'Ulric', 'fede98abb9e2726d5f142afa0bad4651', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(61, 'Tobias Lawrence Conrad', 'diam.Pellentesque@eratEtiamvestibulum.com', 'Deacon', 'cdbbd65beb51208d834f250c928e6804', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(62, 'Nichole Zane Kelley', 'facilisis.magna.tellus@dolorsit.ca', 'Russell', '38779783dcaaaabd1cdd9d3459c8c71d', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(63, 'Rama Quinn Rowe', 'semper.Nam@vulputateveliteu.edu', 'Chelsea', '8056df0882080a7c1d36f190f231f919', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(64, 'Chester Lewis Pearson', 'pede.Praesent@gravidanonsollicitudin.com', 'Winifred', 'a7fd1c347fb59fca780b86c367632b68', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(65, 'Curran Zeus Wolfe', 'parturient.montes@ridiculusmus.ca', 'Anastasia', 'b45153d04dcbe4a6af5b76bc18ec302e', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(66, 'Larissa Amos Bailey', 'vitae@sagittis.edu', 'Cain', '4f6ec68ae65123ed9fadd77c07ca8126', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(67, 'Francis Sawyer Bailey', 'lacus@arcuSedeu.org', 'Murphy', 'a122fdd9928175ce2e15b670bf62c86c', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(68, 'Norman Lucas Ortiz', 'elit@ipsumcursus.com', 'Odette', 'e51e572fbe8c3ccec9c38282da073514', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(69, 'Zachary Honorato Bowman', 'elementum@fermentumrisus.org', 'Lacy', 'ce1eb05bd44c9eab33b92eef261731c7', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(70, 'Rama Hiram West', 'tempus@orci.ca', 'Ross', '7fd9a94f143d2bd19e98b3844a45d3ac', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(71, 'Dexter Armand Bryant', 'arcu@Suspendissenonleo.ca', 'Stella', 'e64a40ce1e9c2e3bd4bea3d33cd4bfb3', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(72, 'Kai Wyatt Kim', 'tortor.dictum@interdumlibero.edu', 'Lamar', 'd408b3c8b28046a44c8bb6596df67eae', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(73, 'Cain Kato Cox', 'nunc.sed.pede@metus.edu', 'Anne', '19fdf51d7001bd6430bc30fcaaa570c5', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(74, 'Cheyenne Xenos Holloway', 'pede.Suspendisse@Duissit.org', 'Justine', 'b7f54569f82cc34fcdff75a314ccfd2e', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(75, 'Rosalyn Zephania Burris', 'augue@tempor.com', 'Emily', 'd8ea48bc5a82a9fd6b80f70dd51fc30c', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(76, 'Beau Aquila Burnett', 'augue.porttitor@turpisnec.ca', 'Zenaida', '023daaeaaa4e72ea0022f25a63d53ffa', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(77, 'Ifeoma Jameson Moody', 'mi.Duis.risus@vulputatelacus.ca', 'Leah', 'f455c402cdcd2021d2b2f4d0f2e91816', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(78, 'Kelsie Quamar Sharpe', 'Suspendisse@Vestibulumanteipsum.com', 'Steel', '4668112d7c5f80a73a826dd8150989df', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(79, 'Paki Jerome Roberson', 'et.pede@ut.edu', 'Abigail', '96db69b0fff794de363fbb73929ac604', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(80, 'Martin Alexander Stanton', 'senectus.et.netus@Nullaegetmetus.org', 'Regina', 'cca17d86a631047538f816b2dd5306cc', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(81, 'Daria Troy Cabrera', 'in@euenimEtiam.org', 'Reuben', '5068771717ce5934996c551cb0500772', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(82, 'Joan Laith Craft', 'ut@Aliquamerat.org', 'Hedwig', '657cd4a4013486afe5cee4620e8ab2a0', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(83, 'Melyssa Carl Jefferson', 'in.felis.Nulla@Crasloremlorem.edu', 'Blake', 'c19eea7d22846c98a5b49132d5ea9eee', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(84, 'Emerson Paki Gardner', 'semper.Nam.tempor@consectetuer.com', 'Lysandra', '80d32b3316e0752b64c7caed0c7933b2', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(85, 'Lysandra Josiah Gilbert', 'semper.dui@urna.ca', 'Nina', 'ba59a644b54379ec8af634961954ab58', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(86, 'Lewis Fletcher Stein', 'fermentum@et.ca', 'Kellie', '1d6cd255124f73442571e8ceef2e4797', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(87, 'Jena Wesley Powell', 'dolor.Nulla.semper@egetnisi.org', 'Shoshana', 'd4e6d03878fb42eb5c98209c4df23069', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(88, 'Brenden Keegan Welch', 'at@tinciduntpede.org', 'Daniel', '262031397020fd8df478ec13b4b096c5', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(89, 'Pamela Drake Waters', 'Suspendisse.sed@congueIn.ca', 'Zena', '813e837259c74eaa16add2c859de9cf7', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(90, 'Yvette Lee Willis', 'vel.venenatis@nisinibh.com', 'Shay', 'eee656a834e72a21dff730a2519b2395', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(91, 'Mercedes Samson Goff', 'velit.Quisque.varius@congueelitsed.com', 'Deborah', 'a703d6d14769d658f85a3b4c2c1ef9c7', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(92, 'Aurelia Fitzgerald Powers', 'fames@ultriciesligulaNullam.com', 'Troy', 'd26ad5138469c6c081d0ace055296384', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(93, 'Gretchen Brandon Chen', 'ipsum@augueutlacus.edu', 'Dolan', '2f710a3f07987462186553cac2df2c4f', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(94, 'Otto Dieter Hess', 'Nulla.interdum@aliquetProinvelit.ca', 'Cruz', '1b6ecd67f81e2b0afdd6b0efb432255c', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(95, 'Anne Amal Huffman', 'aliquam.adipiscing@iaculislacuspede.ca', 'Ria', 'd80546105349521353a8e5ffe28d2f81', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(96, 'Cain Nolan Ward', 'velit@lacuspede.org', 'Melinda', '428c841430ea18a70f7b06525d4b748a', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(97, 'Kiona Gil Francis', 'hendrerit.id@tortor.org', 'Keegan', '44fc18506d21b9134f3c80a9024a50ef', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(98, 'Dominique Adam Wood', 'vulputate.ullamcorper.magna@parturient.edu', 'Basil', '64bf6a86230365619e9249e5b083aa46', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(99, 'Virginia Armando Mathis', 'et@Morbiaccumsan.org', 'Wilma', '46865b129bc3b31f9d3e408061da3e54', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(100, 'Christian Eaton Roach', 'vitae.sodales.nisi@facilisiSedneque.ca', 'Hanae', '5cfc14ccd1cfd47a602900ad5a5efa02', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(101, 'Kieran Warren Shannon', 'nibh.Phasellus.nulla@Sed.ca', 'Troy', 'd26ad5138469c6c081d0ace055296384', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(102, 'Jane Alexander Guthrie', 'eu.odio.tristique@ametrisusDonec.ca', 'Amery', 'e074d247c2761cd5df63d88acc38efc2', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(103, 'Finn Uriah Jones', 'Proin@liberoet.com', 'Perry', 'b640d9b13f0b3c772c33919be3902005', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(104, 'asdasdasdasdasdasd asdasdasdasdasdasd', 'asdasdd@pp.es', 'lolers', 'd41d8cd98f00b204e9800998ecf8427e', 'A', 'images/profile-pictures/default-user-pic.jpg', 0),
(105, 'admin admin', 'admin@pp.es', 'admon', '21232f297a57a5a743894a0e4a801fc3', 'A', 'images/profile-pictures/default-user-pic.jpg', 1),
(107, 'Aitornillos paracenar', 'asantillana@iesfuentesanluis.org', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A', 'images/profile-pictures/test-prof-pic.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` int(11) NOT NULL,
  `entradas_id` int(11) NOT NULL,
  `autores_id` int(11) NOT NULL,
  `puntuacion` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id`, `entradas_id`, `autores_id`, `puntuacion`) VALUES
(1, 1, 1, 4),
(2, 1, 6, 2),
(3, 1, 105, 2);

-- --------------------------------------------------------

--
-- Estructura para la vista `comentarios_cat_usuarios`
--
DROP TABLE IF EXISTS `comentarios_cat_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comentarios_cat_usuarios`  AS  select `usuarios`.`nombre` AS `nombre`,`usuarios`.`profile_pic_path` AS `profile_pic_path`,`comentarios`.`id` AS `id`,`comentarios`.`fecha_hora` AS `fecha_hora`,`comentarios`.`texto` AS `texto`,`comentarios`.`entradas_id` AS `entradas_id`,`comentarios`.`comentarios_id` AS `comentarios_id`,`comentarios`.`aceptado` AS `aceptado` from (`comentarios` join `usuarios`) where (`comentarios`.`usuarios_id` = `usuarios`.`id`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `entradas_cat_usuario`
--
DROP TABLE IF EXISTS `entradas_cat_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entradas_cat_usuario`  AS  select `entradas`.`id` AS `id`,`entradas`.`fecha_hora` AS `fecha_hora`,`entradas`.`texto` AS `texto`,`entradas`.`titulo` AS `titulo`,`entradas`.`aceptado` AS `aceptado`,`entradas`.`categorias_id` AS `categorias_id`,`entradas`.`usuarios_id` AS `usuarios_id`,`categorias`.`descripcion` AS `descripcion_categoria`,`usuarios`.`profile_pic_path` AS `profile_pic_path`,`usuarios`.`nombre` AS `nombre` from ((`entradas` join `categorias`) join `usuarios`) where ((`entradas`.`categorias_id` = `categorias`.`id`) and (`entradas`.`usuarios_id` = `usuarios`.`id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Comentarios_Entradas1` (`entradas_id`),
  ADD KEY `usuarios_id` (`usuarios_id`),
  ADD KEY `comentarios_id` (`comentarios_id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Entradas_Categorias` (`categorias_id`),
  ADD KEY `usuarios_id` (`usuarios_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entradas_id` (`entradas_id`),
  ADD KEY `autores_id` (`autores_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Comentarios_Entradas1` FOREIGN KEY (`entradas_id`) REFERENCES `entradas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_comentarios1` FOREIGN KEY (`comentarios_id`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`entradas_id`) REFERENCES `entradas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`autores_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
