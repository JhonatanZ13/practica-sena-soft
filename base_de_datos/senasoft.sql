-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2021 a las 06:46:49
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senasoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(10) NOT NULL,
  `cli_nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cli_apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cli_identificacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nombres`, `cli_apellidos`, `cli_identificacion`) VALUES
(1, 'Freddy', 'Caicedo', '1144111444'),
(2, 'Edwin', 'Sanchez', '4411444111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_bodega`
--

CREATE TABLE `entrada_bodega` (
  `ent_bod_id` int(10) NOT NULL,
  `ent_bod_fecha` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `prov_id` int(10) NOT NULL,
  `usu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_bodega_detalle`
--

CREATE TABLE `entrada_bodega_detalle` (
  `ent_det_id` int(10) NOT NULL,
  `ent_det_cantidad` int(10) NOT NULL,
  `ent_bod_id` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `est_id` int(2) NOT NULL,
  `est_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`est_id`, `est_nombre`) VALUES
(1, 'Activo'),
(2, 'InActivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `fac_id` int(10) NOT NULL,
  `fac_fecha` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cli_id` int(10) NOT NULL,
  `suc_id` int(10) NOT NULL,
  `usu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `fac_det_id` int(10) NOT NULL,
  `fac_det_cantidad` int(10) NOT NULL,
  `fac_det_precio` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `inv_id` int(10) NOT NULL,
  `suc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_producto`
--

CREATE TABLE `inventario_producto` (
  `inv_pro_id` int(10) NOT NULL,
  `inv_pro_cantidad` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `inv_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pro` int(10) NOT NULL,
  `nombre_pro` varchar(120) NOT NULL,
  `unidades_en_existencia` int(10) NOT NULL,
  `unidades_en_pedido` int(10) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pro`, `nombre_pro`, `unidades_en_existencia`, `unidades_en_pedido`, `estado`) VALUES
(1, 'Té Dharamsala', 39, 0, 1),
(2, 'Cerveza tibetana Barley', 17, 40, 1),
(3, 'Sirope de regaliz', 13, 70, 1),
(4, 'Especias Cajun del chef Anton', 53, 0, 1),
(5, 'Mezcla Gumbo del chef Anton', 0, 0, 1),
(6, 'Mermelada de grosellas de la abuela', 120, 0, 1),
(7, 'Peras secas orgánicas del tío Bob', 15, 0, 1),
(8, 'Salsa de arándanos Northwoods', 6, 0, 1),
(9, 'Buey Mishi Kobe', 29, 0, 1),
(10, 'Pez espada', 31, 0, 1),
(11, 'Queso Cabrales', 22, 30, 1),
(12, 'Queso Manchego La Pastora', 86, 0, 1),
(13, 'Algas Konbu', 24, 0, 1),
(14, 'Cuajada de judías', 35, 0, 1),
(15, 'Salsa de soja baja en sodio', 39, 0, 1),
(16, 'Postre de merengue Pavlova', 29, 0, 1),
(17, 'Cordero Alice Springs', 0, 0, 1),
(18, 'Langostinos tigre Carnarvon', 42, 0, 1),
(19, 'Pastas de té de chocolate', 25, 0, 1),
(20, 'Mermelada de Sir Rodney\'s', 40, 0, 1),
(21, 'Bollos de Sir Rodney\'s', 3, 40, 1),
(22, 'Pan de centeno crujiente estilo Gustaf\'s', 104, 0, 1),
(23, 'Pan fino', 61, 0, 1),
(24, 'Refresco Guaraná Fantástica', 20, 0, 1),
(25, 'Crema de chocolate y nueces NuNuCa', 76, 0, 1),
(26, 'Ositos de goma Gumbär', 15, 0, 1),
(27, 'Chocolate Schoggi', 49, 0, 1),
(28, 'Col fermentada Rössle', 26, 0, 1),
(29, 'Salchicha Thüringer', 0, 0, 1),
(30, 'Arenque blanco del noroeste', 10, 0, 1),
(31, 'Queso gorgonzola Telino', 0, 70, 1),
(32, 'Queso Mascarpone Fabioli', 9, 40, 1),
(33, 'Queso de cabra', 112, 0, 1),
(34, 'Cerveza Sasquatch', 111, 0, 1),
(35, 'Cerveza negra Steeleye', 20, 0, 1),
(36, 'Escabeche de arenque', 112, 0, 1),
(37, 'Salmón ahumado Gravad', 11, 50, 1),
(38, 'Vino Côte de Blaye', 17, 0, 1),
(39, 'Licor verde Chartreuse', 69, 0, 1),
(40, 'Carne de cangrejo de Boston', 123, 0, 1),
(41, 'Crema de almejas estilo Nueva Inglaterra', 85, 0, 1),
(42, 'Tallarines de Singapur', 26, 0, 1),
(43, 'Café de Malasia', 17, 10, 1),
(44, 'Azúcar negra Malacca', 27, 0, 1),
(45, 'Arenque ahumado', 5, 70, 1),
(46, 'Arenque salado', 95, 0, 1),
(47, 'Galletas Zaanse', 36, 0, 1),
(48, 'Chocolate holandés', 15, 70, 1),
(49, 'Regaliz', 10, 60, 1),
(50, 'Chocolate blanco', 65, 0, 1),
(51, 'Manzanas secas Manjimup', 20, 0, 1),
(52, 'Cereales para Filo', 38, 0, 1),
(53, 'Empanada de carne', 0, 0, 1),
(54, 'Empanada de cerdo', 21, 0, 1),
(55, 'Paté chino', 115, 0, 1),
(56, 'Gnocchi de la abuela Alicia', 21, 10, 1),
(57, 'Raviolis Angelo', 36, 0, 1),
(58, 'Caracoles de Borgoña', 62, 0, 1),
(59, 'Raclet de queso Courdavault', 79, 0, 1),
(60, 'Camembert Pierrot', 19, 0, 1),
(61, 'Sirope de arce', 113, 0, 1),
(62, 'Tarta de azúcar', 17, 0, 1),
(63, 'Sandwich de vegetales', 24, 0, 1),
(64, 'Bollos de pan de Wimmer', 22, 80, 1),
(65, 'Salsa de pimiento picante de Luisiana', 76, 0, 1),
(66, 'Especias picantes de Luisiana', 4, 100, 1),
(67, 'Cerveza Laughing Lumberjack', 52, 0, 1),
(68, 'Barras de pan de Escocia', 6, 10, 1),
(69, 'Queso Gudbrandsdals', 26, 0, 1),
(70, 'Cerveza Outback', 15, 10, 1),
(71, 'Crema de queso Fløtemys', 26, 0, 1),
(72, 'Queso Mozzarella Giovanni', 14, 0, 1),
(73, 'Caviar rojo', 101, 0, 1),
(74, 'Queso de soja Longlife', 4, 20, 1),
(75, 'Cerveza Klosterbier Rhönbräu', 125, 0, 1),
(76, 'Licor Cloudberry', 57, 0, 1),
(77, 'Salsa verde original Frankfurter', 32, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `prov_id` int(10) NOT NULL,
  `prov_nit` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `prov_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prov_telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`prov_id`, `prov_nit`, `prov_nombre`, `prov_telefono`) VALUES
(1, '123456789', 'Importadora la mayor', '603309906'),
(2, '465445465', 'Importadora la menor', '56565645');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(10) NOT NULL,
  `rol_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nombre`) VALUES
(1, 'Super Administrador'),
(2, 'Administrador'),
(3, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_bodega`
--

CREATE TABLE `salida_bodega` (
  `sal_bod_id` int(10) NOT NULL,
  `sal_bod_fecha` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `suc_id` int(10) NOT NULL,
  `usu_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_bodega_detalle`
--

CREATE TABLE `salida_bodega_detalle` (
  `sal_det` int(10) NOT NULL,
  `sal_det_cantidad` int(10) NOT NULL,
  `sal_bod_id` int(10) NOT NULL,
  `id_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `suc_id` int(10) NOT NULL,
  `suc_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`suc_id`, `suc_nombre`) VALUES
(1, 'sucursal 1 - Principal'),
(2, 'sucursal 2 - El trébol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(10) NOT NULL,
  `usu_nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usu_correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usu_pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `est_id` int(10) NOT NULL,
  `rol_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nombres`, `usu_apellidos`, `usu_correo`, `usu_pass`, `est_id`, `rol_id`) VALUES
(1, 'Juan David', 'Conejo', 'juanconejo@misena.edu.co', '123456', 1, 1),
(2, 'Jhonatan ', 'Zambrano', 'Zambrano@misena.edu.co', '123456', 1, 1),
(3, 'Felipe', 'Santofimio', 'santofimio@misena.edu.co', '123456', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `entrada_bodega`
--
ALTER TABLE `entrada_bodega`
  ADD PRIMARY KEY (`ent_bod_id`),
  ADD KEY `prov_id` (`prov_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `entrada_bodega_detalle`
--
ALTER TABLE `entrada_bodega_detalle`
  ADD PRIMARY KEY (`ent_det_id`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `ent_bod_id` (`ent_bod_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`fac_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `suc_id` (`suc_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`fac_det_id`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `suc_id` (`suc_id`);

--
-- Indices de la tabla `inventario_producto`
--
ALTER TABLE `inventario_producto`
  ADD PRIMARY KEY (`inv_pro_id`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `inv_id` (`inv_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `salida_bodega`
--
ALTER TABLE `salida_bodega`
  ADD PRIMARY KEY (`sal_bod_id`),
  ADD KEY `suc_id` (`suc_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `salida_bodega_detalle`
--
ALTER TABLE `salida_bodega_detalle`
  ADD PRIMARY KEY (`sal_det`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `sal_bod_id` (`sal_bod_id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`suc_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `est_id` (`est_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entrada_bodega`
--
ALTER TABLE `entrada_bodega`
  MODIFY `ent_bod_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrada_bodega_detalle`
--
ALTER TABLE `entrada_bodega_detalle`
  MODIFY `ent_det_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `est_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `fac_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `fac_det_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `inv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_producto`
--
ALTER TABLE `inventario_producto`
  MODIFY `inv_pro_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `prov_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salida_bodega`
--
ALTER TABLE `salida_bodega`
  MODIFY `sal_bod_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salida_bodega_detalle`
--
ALTER TABLE `salida_bodega_detalle`
  MODIFY `sal_det` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `suc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `salida_bodega`
--
ALTER TABLE `salida_bodega`
  ADD CONSTRAINT `salida_bodega_ibfk_1` FOREIGN KEY (`suc_id`) REFERENCES `sucursal` (`suc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_bodega_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
