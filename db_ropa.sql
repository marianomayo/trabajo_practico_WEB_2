-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 01:32:51
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentarios` varchar(255) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `commentedBy` varchar(255) NOT NULL,
  `id_coment_pantalon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentarios`, `puntaje`, `commentedBy`, `id_coment_pantalon`) VALUES
(138, 'muy buena 2', 5, 'admin mariano123', 17),
(139, 'muy buena 2 123', 5, 'admin mariano123', 17),
(140, 'prueba', 1, 'admin mariano123', 24),
(141, 'prueba otro usuariio', 2, 'camila', 24),
(142, 'das', 1, 'camila', 22),
(144, 'comentarios para ver filtro', 5, 'admin mariano123', 24),
(145, 'comentarios para ver ', 5, 'admin mariano123', 24),
(146, 'otra cosa', 3, 'admin mariano123', 24),
(147, 'otra cosa nueva', 2, 'admin mariano123', 24),
(148, 'prueba', 2, 'unodeprueba', 30),
(149, 'ahora ? ', 1, 'admin unodeprueba', 30),
(150, 'ajskldas', 1, 'admin mariano123', 24),
(151, 'masdas', 1, 'admin mariano123', 24),
(152, 'nuevo comentario de lucas', 2, 'admin lucas123', 24),
(153, 'comentario de puntaje 4', 4, 'admin lucas123', 24),
(154, 'comentario de puntaje 4', 4, 'admin lucas123', 24),
(155, 'comentario de puntaje 4', 4, 'admin lucas123', 24),
(156, 'mi primer comentario', 1, 'admin lucas123', 54),
(157, 'mi segundo comentario', 2, 'admin lucas123', 54),
(158, 'solo comentario', 2, 'usuario1', 31),
(159, 'comentarios', 1, 'admin lucas123', 22),
(161, 'sfdsf', 3, 'admin lucas123', 22),
(166, 'sfdsf', 4, 'admin lucas123', 22),
(167, 'otor coment', 2, 'usuario83', 22),
(168, 'otor coment', 2, 'usuario83', 22),
(169, 'muy bueno el pantalon', 4, 'admin lucas123', 50),
(170, 'es durable, recomndado', 5, 'usuario1', 52),
(171, 'comentario con buena calificacion', 3, 'usuario1', 22),
(172, 'muy buena coleccion', 3, 'usuario', 94),
(173, 'calidad buena', 4, 'usuario', 94);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `descripcion`, `marca`) VALUES
(3, 'nueva descripcion de narrow', 'NARROW'),
(6, 'para el campo', 'PAMPERO'),
(7, 'descripcion de Kloster', 'KLOSTER'),
(10, 'descripcion de Huapi', 'HUAPI'),
(11, 'descripcion de levi´s', 'LEVI´S'),
(12, 'descripcion de bearcliff', 'BEARCLIFF'),
(13, 'descripcion de basement', 'BASEMENT'),
(14, 'descripcion de americanino', 'AMERICANINO'),
(15, 'descripcion de mossimo', 'MOSSIMO'),
(28, 'PARA IR CERQUITA', 'CERCANI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalon`
--

CREATE TABLE `pantalon` (
  `id_pantalones` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `talle` int(11) NOT NULL,
  `color` varchar(55) NOT NULL,
  `tela` varchar(55) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantalon`
--

INSERT INTO `pantalon` (`id_pantalones`, `nombre`, `talle`, `color`, `tela`, `precio`, `imagen`, `id_marca`) VALUES
(22, 'Rally', 35, 'azul oscuro', 'estilizada', 2990, 'pantalon-muestra.jpg', 28),
(50, 'mariano', 456, 'sda', 'das', 456, NULL, 11),
(52, 'otro lucas', 40, 'gris', 'suave', 6088, 'parabestir.jpg', 3),
(66, 'pantalon chupin', 42, 'marron claro', 'elastizada', 3570, 'panta_rojo.jpg', 7),
(68, 'panta vestir', 42, 'azul marino', '40', 3000, 'gabardina.jpg', 12),
(85, 'veige', 34, 'mostaza', 'ajustable', 3450, 'panta_mostaza.jpg', 13),
(88, 'casual', 39, 'blanco', 'suave', 2570, 'parabestir.jpg', 15),
(89, 'prima-verano', 42, 'celeste', 'elastizada', 4380, 'casual_azu.jpg', 3),
(92, 'lucas', 4, '3', '5', 6, 'Koala.jpg', 3),
(93, 'vestiment', 45, 'gris', 'tipo traje', 3870, 'php4EA4.tmp', 10),
(94, 'clasic', 42, 'azul', 'vaquero', 25000, 'muchos_panta.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`, `administrador`) VALUES
(5, 'lucas123', '$2y$10$oTxg6SodRUUZRpcNnOYgaua.tYZ66MlJV.TFzcB33LC9gYEPWR3Ya', 1),
(8, 'mariano123', '$2y$10$nQTJWkxZfULLNkmBK.pOvOk4pKBiM2Tcaqx2i/9xEf/pjDrArJk0K', 1),
(45, 'marianomayo', '$2y$10$/wudlfVYF0Yl57.DPnEK2eQPNC0f5q6RFQsJqf.YQxxnIL6MGpjYy', 0),
(47, 'unodeprueba', '$2y$10$zbUT9gHiFFacylQEeFCQ6.s3hXwlhG/UYdPa/0ANpAmVcCFKy31yq', 0),
(49, 'usuario83', '$2y$10$WLHtrdO5rCODAlxidb9y2.fs97N.DJZmvQqyu1vC43u5H5jlGdzp2', 0),
(51, 'usuario', '$2y$10$NdV1/BEfU4Dsj5WMs9VriOZ2JatZeLwCGjNAr0VHB8pTCDSlXW3b2', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `pantalon`
--
ALTER TABLE `pantalon`
  ADD PRIMARY KEY (`id_pantalones`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `pantalon`
--
ALTER TABLE `pantalon`
  MODIFY `id_pantalones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pantalon`
--
ALTER TABLE `pantalon`
  ADD CONSTRAINT `pantalon_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
