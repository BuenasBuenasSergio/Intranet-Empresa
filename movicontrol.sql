-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2020 a las 13:06:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `movicontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `idPuesto` int(11) NOT NULL,
  `puesto` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`idPuesto`, `puesto`) VALUES
(1, 'Trabajador'),
(2, 'Encargado'),
(3, 'Jefe de Proyecto'),
(4, 'Secretaria'),
(5, 'Recursos Humanos'),
(6, 'Propioetario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `idSecciones` int(11) NOT NULL,
  `seccion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `class` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSecciones`, `seccion`, `direccion`, `descripcion`, `image`, `class`) VALUES
(1, 'Personal', 'Personal\\menuPersonal.php', 'Control de Personal', 'icon fa fa-users', 'item item-green col-lg-4 col-6'),
(2, 'Proyectos', 'proyectos.php', 'Control de Proyectos', 'icon fa fa-file', 'item item-pink item-2 col-lg-4 col-6'),
(3, 'SAT', '', 'Control de servicios tecnicos', 'icon fa fa-tools', 'item item-blue col-lg-4 col-6'),
(4, 'Noticias', 'noticias.php', 'Las ultimas Noticias de la empresa', 'icon fa fa-newspaper', 'item item-purple col-lg-4 col-6'),
(5, 'Convenios', '', 'Empresas asociadas', 'icon fa fa-shopping-cart', 'item item-primary col-lg-4 col-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `fecNac` date NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idPuesto` int(11) NOT NULL,
  `curriculum` text COLLATE utf8_unicode_ci NOT NULL,
  `contrato` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`dni`, `nombre`, `apellido`, `telefono`, `fecNac`, `password`, `idPuesto`, `curriculum`, `contrato`) VALUES
('73440250p', 'Sergio', 'Martin-Albo Calvera', '973182731', '1997-08-28', 'sergio15', 3, 'files/curriculums/curriculum_Sergio_Martin-Albo Calvera.pdf', 'files/contratos/contrato_Sergio_Martin-Albo Calvera.pdf'),
('12345678p', 'Jorge', 'Martin-Albo Calvera', '975632182', '2002-06-25', '12345', 3, 'files/curriculums/curriculum_Jorge_Martin-Albo Calvera.pdf', 'files/contratos/contrato_Jorge_Martin-Albo Calvera.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`idPuesto`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSecciones`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `idPuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `idSecciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
