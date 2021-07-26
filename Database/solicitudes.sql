-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2021 a las 20:23:31
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
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `id` int NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `primer_apellido` varchar(85) NOT NULL,
  `segundo_apellido` varchar(85) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `create_at` date NOT NULL,
  `identificacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `jefes`
--

INSERT INTO `jefes` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `telefono`, `email`, `create_at`, `identificacion`) VALUES
(1, 'Zlatan', 'Ibrahimovic', '', '12345678', 'zi@correo.com', '2021-07-24', '123456789'),
(2, 'Lionel Andrés ', 'Messi', 'Cuccittini', '741258963', 'lamc@correo.com', '2021-07-24', '987456321'),
(3, 'Cristiano', 'Ronaldo', '', '9513578462', 'cr@correo.com', '2021-07-24', '856134654');

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
  `create_at` date NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `jefe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `email`, `create_at`, `identificacion`, `jefe_id`) VALUES
(1, 'Sergio', 'Aguero', NULL, 'sa@correo.com', '2021-07-24', '645132', 1),
(2, 'Mario', 'Gotze', NULL, 'mg@correo.com', '2021-07-24', '8431321', 3),
(3, 'Sergio ', 'Ramos', NULL, 'sr@correo.com', '2021-07-24', '84313', 1),
(4, 'David', 'de Gea', 'Quintana', 'ddq@correo.co', '2021-07-24', '113315545', 1),
(5, 'Kalidou', 'Koulibaly', NULL, 'kk@correo.com', '2021-07-24', '555313', 2),
(6, 'N\'Golo ', 'Kanté ', NULL, 'nk@correo.com', '2021-07-24', '16311355', 2),
(7, 'Marco', 'Reus', NULL, 'mr@correo.com', '2021-07-24', '55333135', 3),
(8, 'Eden', 'Hazard', NULL, 'eh@correo.com', '2021-07-24', '555656', 3),
(9, 'Luis Alberto', 'Suarez', 'Díaz', 'lasd@correo.com', '2021-07-24', '335546486', 2),
(10, 'Neymar', 'Junior', NULL, 'nj@correo.com', '2021-07-24', '45313513', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitantes`
--

CREATE TABLE `solicitantes` (
  `id` int NOT NULL,
  `nombre` varchar(85) NOT NULL,
  `primer_apellido` varchar(85) NOT NULL,
  `segundo_apellido` varchar(85) DEFAULT NULL,
  `fecha_solicitud` date NOT NULL,
  `jefe_id` int NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `fecha_solicitud` date NOT NULL,
  `id` int NOT NULL,
  `tipo_ausentismo` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` date NOT NULL,
  `hora_fin` date NOT NULL,
  `numero_dias` int NOT NULL,
  `dias` varchar(200) NOT NULL,
  `frecuencia` varchar(200) NOT NULL,
  `explicacion` varchar(500) NOT NULL,
  `dias_id` int NOT NULL,
  `solicitantes_id` int NOT NULL,
  `jefes_id` int NOT NULL,
  `personas_id` int NOT NULL,
  `estado` tinyint(1) DEFAULT '0'
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
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas_jefes_fk` (`jefe_id`);

--
-- Indices de la tabla `solicitantes`
--
ALTER TABLE `solicitantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitantes_jefes_fk` (`jefe_id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitudes_solicitantes_fk` (`solicitantes_id`),
  ADD KEY `solicitudes_dias_fk` (`dias_id`),
  ADD KEY `solicitudes_jefes_fk` (`jefes_id`),
  ADD KEY `solicitudes_personas_fk` (`personas_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_jefes_fk` FOREIGN KEY (`jefe_id`) REFERENCES `jefes` (`id`);

--
-- Filtros para la tabla `solicitantes`
--
ALTER TABLE `solicitantes`
  ADD CONSTRAINT `solicitantes_jefes_fk` FOREIGN KEY (`jefe_id`) REFERENCES `jefes` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_dias_fk` FOREIGN KEY (`dias_id`) REFERENCES `dias` (`id`),
  ADD CONSTRAINT `solicitudes_jefes_fk` FOREIGN KEY (`jefes_id`) REFERENCES `jefes` (`id`),
  ADD CONSTRAINT `solicitudes_personas_fk` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `solicitudes_solicitantes_fk` FOREIGN KEY (`solicitantes_id`) REFERENCES `solicitantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
