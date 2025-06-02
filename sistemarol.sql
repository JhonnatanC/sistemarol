-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2025 a las 18:40:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemarol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(120) DEFAULT NULL,
  `area` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `ubicacion`, `area`) VALUES
(15, 'jhonnatan', 'INFORMATICA', 'A'),
(16, 'Redes', 'Lado H', 'CENTER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ci_empleado` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ci_empleado`, `nombre`, `apellido`, `telefono`, `direccion`, `correo`, `id_departamento`) VALUES
(0, 'juan', 'CSASA', 1000000000, 'SASAS', 'jhjhj@asas', 15),
(10101010, 'juan  sss', 'tezs ss', 2147483647, 'machachi sss', 'juna@123ss', 15),
(1754420345, 'jhonnatan', 'cauza', 988101174, 'machachi', 'jhonnatan12@gmial.com', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `mes` varchar(50) DEFAULT NULL,
  `hora25` decimal(10,2) DEFAULT NULL,
  `hora50` decimal(10,2) DEFAULT NULL,
  `hora100` decimal(10,2) DEFAULT NULL,
  `bono` decimal(10,2) DEFAULT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `totalIngreso` decimal(10,2) DEFAULT NULL,
  `iess` decimal(10,2) DEFAULT NULL,
  `multas` decimal(10,2) DEFAULT NULL,
  `atrasos` decimal(10,2) DEFAULT NULL,
  `alimentacion` decimal(10,2) DEFAULT NULL,
  `anticipo` decimal(10,2) DEFAULT NULL,
  `otros` decimal(10,2) DEFAULT NULL,
  `totalEgreso` decimal(10,2) DEFAULT NULL,
  `totalPagar` decimal(10,2) DEFAULT NULL,
  `ci_empleado` int(11) DEFAULT NULL,
  `fecha_regitro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `mes`, `hora25`, `hora50`, `hora100`, `bono`, `sueldo`, `totalIngreso`, `iess`, `multas`, `atrasos`, `alimentacion`, `anticipo`, `otros`, `totalEgreso`, `totalPagar`, `ci_empleado`, `fecha_regitro`) VALUES
(1, 'Enero', 3.91, 4.70, 6.26, 1.00, 500.00, 515.87, 47.50, 1.00, 1.00, 1.00, 1.00, 1.00, 52.50, 463.37, 0, '2025-05-27 16:11:17'),
(2, 'Enero', 3.91, 4.70, 6.26, 1.00, 500.00, 515.87, 47.50, 1.00, 1.00, 1.00, 1.00, 1.00, 52.50, 463.37, 0, '2025-05-27 16:12:52'),
(3, 'Febrero', 3.91, 4.70, 6.26, 20.00, 500.00, 534.87, 47.50, 5.00, 1.00, 100.00, 10.00, 10.00, 173.50, 361.37, 0, '2025-05-27 16:15:14'),
(4, 'Febrero', 3.13, 3.75, 5.00, 2.00, 200.00, 213.88, 19.00, 1.00, 1.00, 1.00, 1.00, 1.00, 24.00, 189.88, 0, '2025-05-27 16:17:03'),
(5, 'Enero', 3.91, 4.70, 6.26, 1.00, 500.00, 515.87, 47.50, 1.00, 1.00, 1.00, 1.00, 1.00, 52.50, 463.37, 1754420345, '2025-05-27 16:21:29'),
(6, 'Septiembre', 3.91, 4.70, 6.26, 1.00, 500.00, 515.87, 47.50, 1.00, 1.00, 1.00, 1.00, 1.00, 52.50, 463.37, 1754420345, '2025-05-28 16:37:00'),
(7, 'Noviembre', 3.91, 4.70, 6.26, 1.00, 500.00, 515.87, 47.50, 1.00, 1.00, 1.00, 1.00, 1.00, 52.50, 463.37, 1754420345, '2025-05-28 16:38:06'),
(8, 'Junio', 3.91, 4.70, 6.26, 1.00, 500.00, 515.87, 47.50, 1.00, 1.00, 1.00, 1.00, 1.00, 52.50, 463.37, 0, '2025-05-28 16:38:46'),
(9, 'Julio', 3.91, 23.48, 6.26, 10.00, 500.00, 543.65, 47.50, 1.00, 4.00, 4.00, 2.00, 0.00, 0.00, 543.65, 1754420345, '2025-05-29 15:17:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ci_empleado`),
  ADD KEY `fkdepartamento_empleado` (`id_departamento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `fkempleado_rol` (`ci_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fkdepartamento_empleado` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `fkempleado_rol` FOREIGN KEY (`ci_empleado`) REFERENCES `empleado` (`ci_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
