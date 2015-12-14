-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2015 a las 07:43:18
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recetario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `añaden`
--

CREATE TABLE IF NOT EXISTS `añaden` (
  `id_usuario` int(11) NOT NULL,
  `id_receta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_recetas`
--

CREATE TABLE IF NOT EXISTS `categorias_recetas` (
`id_categoria_receta` int(11) NOT NULL,
  `nombre_categoria_receta` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_recetas`
--

INSERT INTO `categorias_recetas` (`id_categoria_receta`, `nombre_categoria_receta`) VALUES
(1, 'Tapas'),
(2, 'Carnes'),
(3, 'Pescados'),
(4, 'Cócteles'),
(5, 'Platos combinados'),
(6, 'Platos de cuchara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
`id_ingrediente` int(11) NOT NULL,
  `nombre_ingrediente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unidad_medida` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id_ingrediente`, `nombre_ingrediente`, `unidad_medida`, `id_tipo_ingrediente`) VALUES
(1, 'conejo', 'gramos', 1),
(2, 'garbanzos', 'gramos', 2),
(3, 'patatas', 'gramos', 3),
(4, 'gurullos', 'gramos', 2),
(5, 'tomate', 'gramos', 3),
(6, 'pimiento', 'gramos', 3),
(7, 'ajos', 'gramos', 3),
(8, 'aceite', 'mililitros', 4),
(9, 'tomillo', 'gramos', 5),
(10, 'laurel', 'gramos', 5),
(11, 'agua', 'mililitros', 4),
(12, 'sal', 'miligramos', 4),
(13, 'azafran', 'miligramos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE IF NOT EXISTS `recetas` (
`id_receta` int(11) NOT NULL,
  `nombre_receta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ingrediente_principal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numero_unidades` int(11) DEFAULT NULL,
  `numero_personas` int(11) DEFAULT NULL,
  `tiempo_elaboracion` int(11) NOT NULL,
  `preparacion` text COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria_receta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`, `nombre_receta`, `ingrediente_principal`, `foto`, `numero_unidades`, `numero_personas`, `tiempo_elaboracion`, `preparacion`, `id_usuario`, `id_categoria_receta`) VALUES
(1, 'Champiñones con salsa de vino', 'champiñones', '', NULL, 2, 60, 'textotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotexto', 0, 1),
(3, 'Whisky Sour', 'Whisky', '', 1, NULL, 20, 'textotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotexto', 1, 4),
(4, 'Patatas bravas', 'Patatas', '', NULL, 1, 40, 'textotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotextotexto', 1, 1),
(5, 'Gurullos', 'Patatas y garbanzos', '../img/gurullos.jpg', 0, 1, 40, 'textotextotextotextotextotextotextotextotextotextotextotextotextotexto', 1, 6),
(7, 'prueba', '', '', 10, 0, 20, 'texto texto', 2, 1),
(8, 'purueba', '', '', 2, 0, 10, 'texto texto', 1, 1),
(9, '', '', '', 0, 0, 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE IF NOT EXISTS `tiene` (
  `id_receta` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`id_receta`, `id_ingrediente`, `cantidad`) VALUES
(5, 1, 1000),
(5, 2, 200),
(5, 3, 300),
(5, 5, 80),
(5, 6, 100),
(5, 7, 100),
(5, 9, 20),
(5, 8, 10),
(5, 10, 10),
(5, 11, 100),
(5, 12, 15),
(5, 13, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_ingredientes`
--

CREATE TABLE IF NOT EXISTS `tipos_ingredientes` (
`id_tipo_ingrediente` int(11) NOT NULL,
  `nombre_tipo_ingrediente` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_ingredientes`
--

INSERT INTO `tipos_ingredientes` (`id_tipo_ingrediente`, `nombre_tipo_ingrediente`) VALUES
(1, 'carne'),
(2, 'legumbres'),
(3, 'hortalizas'),
(4, 'condimentos'),
(5, 'especias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE IF NOT EXISTS `tipos_usuario` (
  `id_tipousuario` int(1) NOT NULL,
  `nombre_tipousuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id_tipousuario`, `nombre_tipousuario`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(255) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipousuario` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `nickname`, `contrasena`, `id_tipousuario`) VALUES
(1, 'Francisco', 'García', 'pakoveralm', 'paco', 2),
(2, 'administrador', 'administrador', 'administrador', 'administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `añaden`
--
ALTER TABLE `añaden`
 ADD PRIMARY KEY (`id_usuario`,`id_receta`);

--
-- Indices de la tabla `categorias_recetas`
--
ALTER TABLE `categorias_recetas`
 ADD PRIMARY KEY (`id_categoria_receta`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
 ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
 ADD PRIMARY KEY (`id_receta`);

--
-- Indices de la tabla `tipos_ingredientes`
--
ALTER TABLE `tipos_ingredientes`
 ADD PRIMARY KEY (`id_tipo_ingrediente`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
 ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_recetas`
--
ALTER TABLE `categorias_recetas`
MODIFY `id_categoria_receta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
MODIFY `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipos_ingredientes`
--
ALTER TABLE `tipos_ingredientes`
MODIFY `id_tipo_ingrediente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
