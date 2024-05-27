-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2024 a las 14:49:50
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
-- Base de datos: `warex`
--

DROP DATABASE IF EXISTS `warex`;
CREATE DATABASE `warex`;
USE `warex`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ACCESS`
--

CREATE TABLE `ACCESS` (
  `DNI` varchar(9) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LastName` varchar(80) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `Permissions` varchar(4) NOT NULL DEFAULT 'READ',
  `CompanyID` varchar(9) NOT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ACCESS`
--

INSERT INTO `ACCESS` (`DNI`, `Name`, `LastName`, `UserName`, `Permissions`, `CompanyID`, `Password`) VALUES
('02564753T', 'Adrián', NULL, 'Adrian', 'READ', 'T02564753', '$2y$10$1rba/W0CbKpWaYj9FM4/huRxJatdn./lDCq9RjhKTb3WINqhu./Cm'),
('02564754T', 'Adrián2', 'Leal Vacas', 'Adrian', 'READ', 'T02564753', '$2y$10$TIIQ5mZO/8lmxQAL6wqy2.0mDmJNm69HIelcfMQymsZv48okkiKla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMPANIES`
--

CREATE TABLE `COMPANIES` (
  `NIF` varchar(9) NOT NULL,
  `CompanyName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `COMPANIES`
--

INSERT INTO `COMPANIES` (`NIF`, `CompanyName`) VALUES
('T02564753', 'Adrián. S.L.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LOCATION`
--

CREATE TABLE `LOCATION` (
  `WarehouseID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SectionID` int(11) NOT NULL,
  `ShelfID` int(11) NOT NULL,
  `TotalProductQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTS`
--

CREATE TABLE `PRODUCTS` (
  `ProductID` int(11) NOT NULL,
  `CompanyID` varchar(9) NOT NULL,
  `ProductName` varchar(150) NOT NULL,
  `TotalProductQuantity` int(11) NOT NULL,
  `Description` varchar(254) DEFAULT NULL,
  `UnitPrice` float(11,0) NOT NULL,
  `ExpiryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`ProductID`, `CompanyID`, `ProductName`, `TotalProductQuantity`, `Description`, `UnitPrice`, `ExpiryDate`) VALUES
(60, 'T02564753', 'Manzanas', 500, 'Manzana roja', 0, '2024-12-31'),
(61, 'T02564753', 'Pera', 100, NULL, 0, '2025-01-01'),
(62, 'T02564753', 'Plátano', 20, 'Plátano de canarias', 0, NULL),
(63, 'T02564753', 'Naranja', 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SECTION`
--

CREATE TABLE `SECTION` (
  `SectionID` int(11) NOT NULL,
  `WarehouseID` int(11) NOT NULL,
  `SectionName` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `SECTION`
--

INSERT INTO `SECTION` (`SectionID`, `WarehouseID`, `SectionName`) VALUES
(1, 1, 'A'),
(2, 1, 'B'),
(3, 1, 'C'),
(4, 1, 'D'),
(5, 1, 'E'),
(6, 2, 'A'),
(7, 2, 'B'),
(8, 2, 'C'),
(9, 2, 'D'),
(10, 2, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SHELF`
--

CREATE TABLE `SHELF` (
  `ShelfID` int(11) NOT NULL,
  `SectionID` int(11) NOT NULL,
  `ShelfName` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `SHELF`
--

INSERT INTO `SHELF` (`ShelfID`, `SectionID`, `ShelfName`) VALUES
(1, 1, 'Legumbres'),
(2, 1, 'Pasta'),
(3, 1, 'Latas'),
(4, 1, 'Arena'),
(5, 1, 'Carbon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `WAREHOUSES`
--

CREATE TABLE `WAREHOUSES` (
  `WarehouseID` int(11) NOT NULL,
  `CompanyID` varchar(9) NOT NULL,
  `TotalProductQuantity` int(11) NOT NULL,
  `RefrigeratingChamber` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `WAREHOUSES`
--

INSERT INTO `WAREHOUSES` (`WarehouseID`, `CompanyID`, `TotalProductQuantity`, `RefrigeratingChamber`) VALUES
(1, 'T02564753', 100000, 1),
(2, 'T02564753', 100001, 1),
(3, 'T02564753', 100002, 1),
(4, 'T02564753', 100003, 1),
(5, 'T02564753', 100004, 1),
(6, 'T02564753', 999998, 1),
(7, 'T02564753', 100006, 1),
(8, 'T02564753', 100007, 1),
(9, 'T02564753', 100008, 1),
(10, 'T02564753', 100009, 0),
(11, 'T02564753', 100010, 0),
(12, 'T02564753', 100011, 0),
(13, 'T02564753', 100012, 0),
(14, 'T02564753', 100013, 0),
(15, 'T02564753', 100014, 0),
(16, 'T02564753', 100015, 0),
(17, 'T02564753', 100016, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ACCESS`
--
ALTER TABLE `ACCESS`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `FK_CompanyID_ACCESS` (`CompanyID`) USING BTREE;

--
-- Indices de la tabla `COMPANIES`
--
ALTER TABLE `COMPANIES`
  ADD PRIMARY KEY (`NIF`) USING BTREE;

--
-- Indices de la tabla `LOCATION`
--
ALTER TABLE `LOCATION`
  ADD PRIMARY KEY (`WarehouseID`,`ProductID`,`SectionID`,`ShelfID`),
  ADD KEY `FK_WarehouseID_LOCATION` (`WarehouseID`),
  ADD KEY `FK_ProductID_LOCATION` (`ProductID`),
  ADD KEY `FK_SectionID_LOCATION` (`SectionID`),
  ADD KEY `FK_ShelfID_LOCATION` (`ShelfID`);

--
-- Indices de la tabla `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_CompanyID_PRODUCTS` (`CompanyID`);

--
-- Indices de la tabla `SECTION`
--
ALTER TABLE `SECTION`
  ADD PRIMARY KEY (`SectionID`),
  ADD KEY `FK_WarehouseID_SECTION` (`WarehouseID`) USING BTREE;

--
-- Indices de la tabla `SHELF`
--
ALTER TABLE `SHELF`
  ADD PRIMARY KEY (`ShelfID`),
  ADD KEY `FK_SectionID_SHELF` (`SectionID`) USING BTREE;

--
-- Indices de la tabla `WAREHOUSES`
--
ALTER TABLE `WAREHOUSES`
  ADD PRIMARY KEY (`WarehouseID`),
  ADD KEY `FK_CompanyID_WAREHOUSES` (`CompanyID`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `SECTION`
--
ALTER TABLE `SECTION`
  MODIFY `SectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `SHELF`
--
ALTER TABLE `SHELF`
  MODIFY `ShelfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `WAREHOUSES`
--
ALTER TABLE `WAREHOUSES`
  MODIFY `WarehouseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ACCESS`
--
ALTER TABLE `ACCESS`
  ADD CONSTRAINT `FK_CompanyID_ACCESS` FOREIGN KEY (`CompanyID`) REFERENCES `COMPANIES` (`NIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `LOCATION`
--
ALTER TABLE `LOCATION`
  ADD CONSTRAINT `FK_ProductID_LOCATION` FOREIGN KEY (`ProductID`) REFERENCES `PRODUCTS` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_SectionID_LOCATION` FOREIGN KEY (`SectionID`) REFERENCES `SECTION` (`SectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ShelfID_LOCATION` FOREIGN KEY (`ShelfID`) REFERENCES `SHELF` (`ShelfID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_WarehouseID_LOCATION` FOREIGN KEY (`WarehouseID`) REFERENCES `WAREHOUSES` (`WarehouseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD CONSTRAINT `FK_CompanyID_PRODUCTS` FOREIGN KEY (`CompanyID`) REFERENCES `COMPANIES` (`NIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `SECTION`
--
ALTER TABLE `SECTION`
  ADD CONSTRAINT `FK_WarehouseID` FOREIGN KEY (`WarehouseID`) REFERENCES `WAREHOUSES` (`WarehouseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `SHELF`
--
ALTER TABLE `SHELF`
  ADD CONSTRAINT `FK_SectionID` FOREIGN KEY (`SectionID`) REFERENCES `SECTION` (`SectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `WAREHOUSES`
--
ALTER TABLE `WAREHOUSES`
  ADD CONSTRAINT `FK_CompanyID_WAREHOUSES` FOREIGN KEY (`CompanyID`) REFERENCES `COMPANIES` (`NIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
