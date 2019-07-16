-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2018 a las 03:21:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jade2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `nombre_administrador` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombre_administrador`, `password`) VALUES
('admin', '$2y$10$5aYceIUPO0DVFw.QnTDjxOWvZlm5L4iGCEF9MKIjnZoaWGAjaIkc.'),
('frank', '$2y$10$xRUhekE.80RT99g42gYfkuD/50.GjZriWERXoklDjO5qiU3K3xQRG'),
('juan', '$2y$10$Md8Q6Qo6wH5mSigEuBTQCuBKOO5PSeF1zlZdvrPOIeBoVkmiBD4S2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `num_asignacion` int(8) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `num_inc` int(8) DEFAULT NULL,
  `nombre_administrador` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`num_asignacion`, `fecha_asignacion`, `num_inc`, `nombre_administrador`) VALUES
(855, '2017-08-30', 17, 'admin'),
(858, '2017-08-30', 14, 'admin'),
(860, '2017-08-30', 13, 'admin'),
(910, '2017-09-03', 15, 'admin'),
(911, '2017-09-03', 16, 'admin'),
(912, '2017-09-03', 18, 'juan'),
(913, '2017-09-12', 21, 'juan'),
(914, '2017-09-12', 22, 'admin'),
(915, '2017-09-12', 23, 'juan'),
(916, '2017-09-13', 24, 'juan'),
(917, '2017-09-18', 25, 'admin'),
(918, '2017-09-19', 26, 'juan'),
(919, '2017-09-30', 27, 'admin'),
(920, '2017-09-30', 28, 'juan'),
(921, '2017-09-30', 29, 'juan'),
(922, '2017-09-30', 30, 'juan'),
(923, '2017-09-30', 31, 'juan'),
(924, '2017-09-30', 32, 'juan'),
(925, '2017-09-30', 40, 'juan'),
(926, '2017-09-30', 41, 'juan'),
(927, '2017-09-30', 42, 'juan'),
(928, '2017-09-30', 43, 'juan'),
(929, '2017-09-30', 44, 'juan'),
(930, '2017-09-30', 45, 'juan'),
(931, '2017-09-30', 46, 'juan'),
(932, '2017-09-30', 47, 'juan'),
(933, '2017-11-12', 48, 'admin'),
(934, '2017-11-18', 49, 'juan'),
(935, '2018-02-24', 50, 'admin'),
(936, '2018-02-24', 51, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `num_inc` int(8) NOT NULL,
  `fecha` datetime NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `tipo_incidencia` varchar(50) NOT NULL,
  `descripcion` varchar(700) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `estatus` varchar(50) NOT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`num_inc`, `fecha`, `asunto`, `tipo_incidencia`, `descripcion`, `imagen`, `estatus`, `nombre_usuario`) VALUES
(8, '2017-08-20 15:01:12', 'prueba', 'problemas de correo', 'nnnnnn', 'fotos/hhhhh.jpg', 'Asignadas', 'admin'),
(11, '2017-08-25 21:46:13', 'prueeeeba', 'problemas de correo', 'mmmmmmmmmmmmmmmmmmmmmmmmmm', 'fotos/hhhhh.jpg', 'Asignadas', 'admin'),
(12, '2017-08-25 23:22:38', 'lllllllllllllllllllllle', 'problemas de correo', 'Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±', 'fotos/', 'Asignadas', 'admin'),
(13, '2017-08-27 13:26:18', 'ssss', 'problemas de correo', 'ffffff', 'fotos/hhhhh.jpg', 'Finalizada', 'jose'),
(14, '2017-08-27 13:26:57', 'ddddddddd', 'problemas de correo', 'jjjjj', 'fotos/', 'Finalizada', 'jose'),
(15, '2017-08-27 15:25:39', 'aaaa', 'problemas de correo', '\r\n\r\n\r\n\r\nkkkk', 'fotos/', 'Finalizada', 'jose'),
(16, '2017-08-28 21:39:24', 'dddd', 'problemas de correo', 'ddddd', 'fotos/', 'Finalizada', 'jose'),
(17, '2017-08-28 21:43:51', 'nnnnn', 'problemas de correo', 'mmmmm', 'fotos/', 'Finalizada', 'jose'),
(18, '2017-08-30 20:54:13', 'ppppppppppp', 'problemas de correo', 'pppppppppppp', 'fotos/', 'Finalizada', 'jose'),
(21, '2017-09-07 17:59:44', 'prueba 20', 'problemas con jade mercadeo', 'quiero que me instalen jade mercadeo por que este no me abre\r\n', 'fotos/', 'Finalizada', 'jose'),
(22, '2017-09-09 21:47:35', 'prueba 1o', 'problemas de conexion a internet', 'no logro conectarme a internet', 'fotos/hhhhh.jpg', 'Finalizada', 'jose'),
(23, '2017-09-11 21:58:07', 'pppppp', 'problemas de correo', 'eeeeeeeeeeeeeeeeeeeeeeeeeeee', 'fotos/', 'Finalizada', 'jose'),
(24, '2017-09-12 20:48:14', '', '', '', 'fotos/', 'Finalizada', 'jose'),
(25, '2017-09-12 20:49:47', '', '', '', 'fotos/', 'Finalizada', 'jose'),
(26, '2017-09-12 20:59:20', 'jjjjjjj', 'problemas de correo', 'nmnmnnnnnnnnnnnnnnnnnn', 'fotos/', 'Finalizada', 'jose'),
(27, '2017-09-12 21:12:07', 'ggggg', 'problemas de correo', 'lllllllll', 'fotos/', 'Finalizada', 'jose'),
(28, '2017-09-12 21:12:15', 'ggggg', 'problemas de correo', 'lllllllll', 'fotos/', 'Finalizada', 'jose'),
(29, '2017-09-12 21:12:23', 'ggggg', 'problemas de correo', 'lllllllll', 'fotos/', 'Finalizada', 'jose'),
(30, '2017-09-16 07:21:14', 'ddddddddd', '0', 'mmmmmm', 'fotos/', 'Finalizada', 'jose'),
(31, '2017-09-16 07:28:24', 'aaaaaa', '0', 'mmmmmmmmmmmmmmmmmmmmmmmmmmmmm', 'fotos/', 'Finalizada', 'jose'),
(32, '2017-09-16 07:31:32', 'bbbbbbbbb', '0', 'mmmmmbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'fotos/', 'Finalizada', 'jose'),
(40, '2017-09-17 16:22:15', 'ddddddddd', '', 'ddddddd', 'fotos/', 'Finalizada', 'jose'),
(41, '2017-09-17 16:23:42', 'ddddddddd', '', 'ddddddd', 'fotos/', 'Finalizada', 'jose'),
(42, '2017-09-17 16:25:57', 'ddddddddd', '', 'ddddddd', 'fotos/', 'Finalizada', 'jose'),
(43, '2017-09-17 16:26:49', 'ddddddddd', '', 'ddddddd', 'fotos/', 'Finalizada', 'jose'),
(44, '2017-09-17 16:27:10', 'ddddddddd', '', 'ddddd', 'fotos/', 'Finalizada', 'jose'),
(45, '2017-09-17 16:28:31', 'ddddddddd', '', 'ddddd', 'fotos/', 'Finalizada', 'jose'),
(46, '2017-09-17 16:29:23', 'ffffffffffffff', '', 'ffffff', 'fotos/', 'Finalizada', 'jose'),
(47, '2017-09-17 16:33:03', 'ggggg', 'Problemas de Correo', 'ggggggggg', 'fotos/', 'Finalizada', 'jose'),
(48, '2017-09-17 18:20:35', 'kmkmkkm', 'Problemas de Correo', 'njnjnjnj', 'fotos/', 'Finalizada', 'carlos'),
(49, '2017-09-18 18:54:29', 'mmmmmmmmmmmm', 'Problemas de Correo', 'mnmmnnm', 'fotos/hhhhh.jpg', 'Asignada', 'carlos'),
(50, '2017-11-14 05:13:27', 'prueba d', 'Problemas de Correo', 'no puedo enviar correo', 'fotos/', 'Finalizada', 'jose'),
(51, '2018-02-24 13:02:38', ',m,m,m', 'problemas con excel', 'm,qm,m,mm', 'fotos/', 'Asignada', 'pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `num_opinion` int(8) NOT NULL,
  `opinion` varchar(50) DEFAULT NULL,
  `num_inc` int(8) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`num_opinion`, `opinion`, `num_inc`, `nombre_usuario`) VALUES
(1, '', 12, 'admin'),
(2, '', 12, 'admin'),
(3, 'Excelente trabajo', 12, 'admin'),
(4, 'Resolvieron el problema', 14, 'jose'),
(5, 'Excelente trabajo', 15, 'jose'),
(6, 'Excelente trabajo', 15, 'jose'),
(7, 'Excelente trabajo', 15, 'jose'),
(8, 'Excelente trabajo', 15, 'jose'),
(9, 'Excelente trabajo', 13, 'jose'),
(10, 'Excelente trabajo', 15, 'jose'),
(11, 'Excelente trabajo', 13, 'jose'),
(12, 'Excelente trabajo', 15, 'jose'),
(13, 'Excelente trabajo', 13, 'jose'),
(14, 'Excelente trabajo', 13, 'jose'),
(15, 'Excelente trabajo', 14, 'jose'),
(16, 'Excelente trabajo', 15, 'jose'),
(17, 'Excelente trabajo', 15, 'jose'),
(18, 'Excelente trabajo', 18, 'jose'),
(19, 'mal trabajo', 22, 'jose'),
(20, 'Excelente trabajo', 21, 'jose'),
(21, 'Excelente trabajo', 47, 'jose'),
(22, 'Excelente trabajo', 45, 'jose'),
(23, 'Excelente trabajo', 46, 'jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soluciones`
--

CREATE TABLE `soluciones` (
  `num_solucion` int(8) NOT NULL,
  `tipo_incidencia` varchar(50) NOT NULL,
  `solucion` varchar(700) NOT NULL,
  `arc_solucion` varchar(200) NOT NULL,
  `fecha_solucion` date DEFAULT NULL,
  `nombre_administrador` varchar(5) DEFAULT NULL,
  `num_inc` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `soluciones`
--

INSERT INTO `soluciones` (`num_solucion`, `tipo_incidencia`, `solucion`, `arc_solucion`, `fecha_solucion`, `nombre_administrador`, `num_inc`) VALUES
(1, 'problemas de correo', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '', '2017-08-27', 'admin', 13),
(2, 'problemas con jade mercadeo', 'hhhhhhhhhhhhhhhhhhhhhhh', 'archivos/carta explicativa.doc', '2017-09-07', 'admin', 21),
(3, 'Problemas de Correo', 'deddddddd', 'archivos/actualizacon de datos .pdf', '2017-09-18', 'juan', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_incidencias`
--

CREATE TABLE `tipos_incidencias` (
  `num_tipo_inc` int(3) NOT NULL,
  `tipo_incidencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_incidencias`
--

INSERT INTO `tipos_incidencias` (`num_tipo_inc`, `tipo_incidencia`) VALUES
(1, 'Problemas de Correo'),
(2, 'xxxxxxxxxxxx'),
(3, 'problemas con excel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencias`
--

CREATE TABLE `transferencias` (
  `num_transf` int(8) NOT NULL,
  `fecha_transf` date NOT NULL,
  `nombre_administrador` varchar(50) DEFAULT NULL,
  `num_inc` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `password`, `departamento`) VALUES
('carlos', '$2y$10$TWHMINtofavDFx/Rso5A4eHcdljjIGvbET3nI/wmr3nsGlml5puTy', 'despacho'),
('jose', '$2y$10$1B4O1uH6.hwl0SNqWSfLfOS3v7TS01xsUW9iIlYO8E6KOogqMs1Q2', 'Almacen'),
('lucas', '$2y$10$4y0kCkoTW84RZXFtuCxKpeO70Q7ODNAEO2A59jZHI5YtksRI/IBuG', 'Almacen'),
('pedro', '$2y$10$GnIpyDbG1jERkJtltyHcL.a8I9KqnEeAbwq5r/difoEpqH0bimTO2', 'cobranzas'),
('petra', '$2y$10$2YDuSp/n3aGzHtHAXWFnLegWvWjqWMHcU2/2zQXRiSxTDYxa/i9a6', 'Almacen');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`nombre_administrador`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`num_asignacion`),
  ADD KEY `num_inc` (`num_inc`),
  ADD KEY `nombre_administrador` (`nombre_administrador`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`num_inc`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`num_opinion`),
  ADD KEY `num_inc` (`num_inc`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `soluciones`
--
ALTER TABLE `soluciones`
  ADD PRIMARY KEY (`num_solucion`),
  ADD KEY `nombre_administrador` (`nombre_administrador`),
  ADD KEY `num_inc` (`num_inc`);

--
-- Indices de la tabla `tipos_incidencias`
--
ALTER TABLE `tipos_incidencias`
  ADD PRIMARY KEY (`num_tipo_inc`);

--
-- Indices de la tabla `transferencias`
--
ALTER TABLE `transferencias`
  ADD PRIMARY KEY (`num_transf`),
  ADD KEY `nombre_administrador` (`nombre_administrador`),
  ADD KEY `num_inc` (`num_inc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `num_asignacion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=937;
--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `num_inc` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `num_opinion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `soluciones`
--
ALTER TABLE `soluciones`
  MODIFY `num_solucion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos_incidencias`
--
ALTER TABLE `tipos_incidencias`
  MODIFY `num_tipo_inc` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `transferencias`
--
ALTER TABLE `transferencias`
  MODIFY `num_transf` int(8) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`num_inc`) REFERENCES `incidencias` (`num_inc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`nombre_administrador`) REFERENCES `administrador` (`nombre_administrador`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_ibfk_1` FOREIGN KEY (`num_inc`) REFERENCES `incidencias` (`num_inc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `opinion_ibfk_2` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuarios` (`nombre_usuario`);

--
-- Filtros para la tabla `soluciones`
--
ALTER TABLE `soluciones`
  ADD CONSTRAINT `soluciones_ibfk_1` FOREIGN KEY (`nombre_administrador`) REFERENCES `administrador` (`nombre_administrador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `soluciones_ibfk_2` FOREIGN KEY (`num_inc`) REFERENCES `incidencias` (`num_inc`);

--
-- Filtros para la tabla `transferencias`
--
ALTER TABLE `transferencias`
  ADD CONSTRAINT `transferencias_ibfk_1` FOREIGN KEY (`nombre_administrador`) REFERENCES `administrador` (`nombre_administrador`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transferencias_ibfk_2` FOREIGN KEY (`num_inc`) REFERENCES `incidencias` (`num_inc`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
