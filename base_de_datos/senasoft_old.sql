-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2021 a las 20:33:27
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
