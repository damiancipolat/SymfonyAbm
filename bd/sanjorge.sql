-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2017 a las 15:04:50
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sanjorge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `direccion`) VALUES
(23, 'Damian', 'Cipolat', '33295515', '1566789712', 'damian.cipolat@gmail.com', 'tomorrowland 1234, caba'),
(24, 'Homero', 'Simpson', '10123456', '10132154', 'homer@fox.net', 'av siempre viva 123'),
(25, 'Napoleon', 'Bonaparte', '10123456', '10132151', 'napo@bonaparte.com', 'tes test 1234'),
(26, 'Gordon', 'Shonwey', '10123454', '1566759712', 'alf@melmaq.com', 'test test 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `idcliente` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `fecha`, `idcliente`) VALUES
(6, '2017-05-09 14:58:58', 23),
(7, '2017-05-09 14:59:48', 24),
(8, '2017-05-09 15:00:41', 26),
(9, '2017-05-09 15:02:33', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `idfactura` bigint(20) DEFAULT NULL,
  `producto` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo_unitario` float DEFAULT NULL,
  `impuestos` float DEFAULT NULL,
  `costo_total` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `idfactura`, `producto`, `cantidad`, `costo_unitario`, `impuestos`, `costo_total`) VALUES
(12, 6, 'Pizza de muzzarella', 2, 100, 0, 200),
(13, 7, 'Donut', 5, 10, 10, 50),
(14, 7, 'Buzz Cola', 1, 40, 0, 40),
(15, 8, 'Gato', 1, 400, 1, 400),
(16, 8, 'Cerveza', 1, 10, 90, 100),
(17, 8, 'Leche', 1, 45, 0, 45),
(18, 9, 'Espada', 100, 200, 0, 20000),
(19, 9, 'Polvora', 10, 500, 10, 5100);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
