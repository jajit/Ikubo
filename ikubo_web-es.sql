-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2018 a las 12:30:21
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ikubo_web-es`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actas`
--

CREATE TABLE `actas` (
  `id_acta` int(1) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actas`
--

INSERT INTO `actas` (`id_acta`, `titulo`, `url`) VALUES
(1, 'Reunion del consejo 00/00/0000', 'https://drive.google.com/file/d/0B9a7n11FwY56X0FERl94Z3NUUUE/view');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro`
--

CREATE TABLE `miembro` (
  `id_miembro` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `junta` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `miembro`
--

INSERT INTO `miembro` (`id_miembro`, `nombre`, `apellidos`, `dni`, `telefono`, `junta`) VALUES
(1, 'Mikel', 'Iceta', '72546857G', '648791529', 1),
(2, 'Ruben', 'Naranjo', '45198275D', '645427211', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `autor` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `version_corta` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `version_completa` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `autor`, `titulo`, `version_corta`, `version_completa`) VALUES
(1, 'Mikel', 'baia', 'aijdsas', 'alksdjsdjasd'),
(24, '', 'Reunion de Estudiantes', 'Baia cosas', 'Version completa wea'),
(25, '', 'Esto ens una notisia jej', 'Ensta es la denscripsion corta como tu', 'baia la version completa ajaj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_miembro` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_miembro`, `username`, `password`) VALUES
(1, 'habboclub', 'habboclub');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actas`
--
ALTER TABLE `actas`
  ADD PRIMARY KEY (`id_acta`);

--
-- Indices de la tabla `miembro`
--
ALTER TABLE `miembro`
  ADD PRIMARY KEY (`id_miembro`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id_miembro` (`id_miembro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actas`
--
ALTER TABLE `actas`
  MODIFY `id_acta` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `miembro`
--
ALTER TABLE `miembro`
  MODIFY `id_miembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `nacleusuarios` FOREIGN KEY (`id_miembro`) REFERENCES `miembro` (`id_miembro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
