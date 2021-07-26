-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2021 a las 23:50:15
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solicitudes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id` int NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id`, `nombre`) VALUES
(1, 'lunes'),
(2, 'martes'),
(3, 'miércoles'),
(4, 'jueves'),
(5, 'viernes'),
(6, 'sábado'),
(7, 'domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_solicitudes`
--

CREATE TABLE `dias_solicitudes` (
  `solicitudes_id` int NOT NULL,
  `dias_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `id` int NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `primer_apellido` varchar(85) NOT NULL,
  `segundo_apellido` varchar(85) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `jefes`
--

INSERT INTO `jefes` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `celular`, `identificacion`, `email`, `create_at`) VALUES
(1, 'Zlatan', 'Ibrahimovic', '', '12345678', '987456321', 'zi@correo.com', '2021-07-24'),
(2, 'Lionel Andrés ', 'Messi', 'Cuccittini', '741258963', '741258963', 'lamc@correo.com', '2021-07-24'),
(3, 'Cristiano', 'Ronaldo', '', '9513578462', '856134654', 'cr@correo.com', '2021-07-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `primer_apellido` varchar(85) NOT NULL,
  `segundo_apellido` varchar(85) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `identificacion` varchar(10) NOT NULL,
  `create_at` date NOT NULL,
  `jefes_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `email`, `identificacion`, `create_at`, `jefes_id`) VALUES
(1, 'Sergio', 'Aguero', '', 'sa@correo.com', '645132', '2021-07-24', 1),
(2, 'Mario', 'Gotze', '', 'mg@correo.com', '8431321', '2021-07-24', 3),
(3, 'Sergio ', 'Ramos', '', 'sr@correo.com', '84313', '2021-07-24', 1),
(4, 'David', 'de Gea', 'Quintana', 'ddq@correo.co', '113315545', '2021-07-24', 1),
(5, 'Kalidou', 'Koulibaly', '', 'kk@correo.com', '555313', '2021-07-24', 2),
(6, 'N\'Golo ', 'Kanté ', '', 'nk@correo.com', '16311355', '2021-07-24', 2),
(7, 'Marco', 'Reus', '', 'mr@correo.com', '55333135', '2021-07-24', 3),
(8, 'Eden', 'Hazard', '', 'eh@correo.com', '555656', '2021-07-24', 3),
(9, 'Luis Alberto', 'Suarez', 'Díaz', 'lasd@correo.com', '335546486', '2021-07-24', 2),
(10, 'Neymar', 'Junior', '', 'nj@correo.com', '45313513', '2021-07-24', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitantes`
--

CREATE TABLE `solicitantes` (
  `id` int NOT NULL,
  `nombre` varchar(85) DEFAULT NULL,
  `primer_apellido` varchar(85) DEFAULT NULL,
  `segundo_apellido` varchar(85) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `create_at` date NOT NULL,
  `jefes_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `tipo_ausentismo` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` date NOT NULL,
  `hora_fin` date NOT NULL,
  `frecuencia` varchar(50) NOT NULL,
  `explicacion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  `solicitantes_id` int NOT NULL,
  `jefes_id` int NOT NULL,
  `personas_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dias_solicitudes`
--
ALTER TABLE `dias_solicitudes`
  ADD PRIMARY KEY (`solicitudes_id`,`dias_id`),
  ADD KEY `dias_solicitudes_dias_fk` (`dias_id`);

--
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas_jefes_fk` (`jefes_id`);

--
-- Indices de la tabla `solicitantes`
--
ALTER TABLE `solicitantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitantes_jefes_fk` (`jefes_id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitudes_jefes_fk` (`jefes_id`),
  ADD KEY `solicitudes_personas_fk` (`personas_id`),
  ADD KEY `solicitudes_solicitantes_fk` (`solicitantes_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dias_solicitudes`
--
ALTER TABLE `dias_solicitudes`
  ADD CONSTRAINT `dias_solicitudes_dias_fk` FOREIGN KEY (`dias_id`) REFERENCES `dias` (`id`),
  ADD CONSTRAINT `dias_solicitudes_solicitudes_fk` FOREIGN KEY (`solicitudes_id`) REFERENCES `solicitudes` (`id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_jefes_fk` FOREIGN KEY (`jefes_id`) REFERENCES `jefes` (`id`);

--
-- Filtros para la tabla `solicitantes`
--
ALTER TABLE `solicitantes`
  ADD CONSTRAINT `solicitantes_jefes_fk` FOREIGN KEY (`jefes_id`) REFERENCES `jefes` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_jefes_fk` FOREIGN KEY (`jefes_id`) REFERENCES `jefes` (`id`),
  ADD CONSTRAINT `solicitudes_personas_fk` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `solicitudes_solicitantes_fk` FOREIGN KEY (`solicitantes_id`) REFERENCES `solicitantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
