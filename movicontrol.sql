-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2020 a las 13:54:03
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
('730182731', 'Francisco', 'Franco', '987654321', '1936-07-09', '12345', 2, 'files/curriculums/curriculum_Trabajador Ejemplo_Apellido Ejemplo.pdf', 'files/contratos/contrato_Trabajador Ejemplo_Apellido Ejemplo.pdf'),
('12345677', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('12345678p', 'Jorge', 'Martin-Albo Calvera', '975632182', '2002-06-25', '12345', 3, 'files/curriculums/curriculum_Jorge_Martin-Albo Calvera.pdf', 'files/contratos/contrato_Jorge_Martin-Albo Calvera.pdf'),
('73018273U', 'Maria Jesus', 'Calvera Navarro', '987654321', '1992-06-05', '12345', 6, 'files/curriculums/curriculum_Maria Jesus_Calvera Navarro.pdf', 'files/contratos/contrato_Maria Jesus_Calvera Navarro.pdf'),
('1234567r', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('123456tr', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('12345ttr', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('12345ytr', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('1q345ytr', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('1q345ctr', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('1q345c5r', '123123', '1231232', '12312312', '1997-08-05', '1234', 3, '', ''),
('63819287O', 'Mariano', 'Blasco Royo', '973182731', '1965-08-23', '1234', 6, 'files/curriculums/curriculum_Mariano_Blasco Royo.pdf', 'files/contratos/contrato_Mariano_Blasco Royo.pdf'),
('12345678q', 'Sigmundo', 'Alvarado Martinez Fernandez 3º', '987654321', '1985-02-13', '12345', 1, 'files/curriculums/curriculum_Sigmundo_Alvarado Martinez.pdf', 'files/contratos/contrato_Sigmundo_Alvarado Martinez.pdf'),
('1234412', 'maria', 'Paquez', '973182731', '2020-03-17', '12345', 3, 'files/curriculums/curriculum_maria_Paquez.pdf', 'files/contratos/contrato_maria_Paquez.pdf'),
('8767542r', 'Ernesto', 'Baloncesto', '975632182', '2020-03-26', '45361823', 2, 'files/curriculums/curriculum_Ernesto_Baloncesto.pdf', 'files/contratos/contrato_Ernesto_Baloncesto.pdf'),
('87675422', 'Ernesto', 'Baloncesto', '975632182', '2020-03-26', '45361823', 2, 'files/curriculums/curriculum_Ernesto_Baloncesto.pdf', 'files/contratos/contrato_Ernesto_Baloncesto.pdf'),
('87675421', 'Ernesto', 'Baloncesto', '975632182', '2020-03-26', '45361823', 2, 'files/curriculums/curriculum_Ernesto_Baloncesto.pdf', 'files/contratos/contrato_Ernesto_Baloncesto.pdf'),
('81782363', 'David', 'Causape', '0928370', '1999-08-09', '1234', 1, 'files/curriculums/curriculum_David_Causape.', 'files/contratos/contrato_David_Causape.'),
('7261517e', 'Tsubasa', 'Ozora', '975632182', '1432-12-21', '12345', 4, 'files/curriculums/curriculum_Tsubasa_Ozora.', 'files/contratos/contrato_Tsubasa_Ozora.'),
('asdsda', 'Julia', 'Altozano ', '973182731', '1342-04-13', '12345', 4, 'files/curriculums/curriculum_Julia_Altozano .', 'files/contratos/contrato_Julia_Altozano .');

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
