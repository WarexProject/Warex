-- phpMyAdmin SQL Dump

-- version 5.2.1

-- https://www.phpmyadmin.net/

--

-- Servidor: localhost

-- Tiempo de generación: 03-04-2024 a las 21:20:56

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



-- --------------------------------------------------------



--

-- Estructura de tabla para la tabla `COMPANIES`

--



CREATE TABLE `COMPANIES` (

  `NIF` varchar(9) NOT NULL,

  `CompanyName` varchar(250) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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

  `ProductName` varchar(150) NOT NULL,

  `TotalProductQuantity` int(11) NOT NULL,

  `Description` varchar(254) DEFAULT NULL,

  `UnitPrice` int(11) NOT NULL,

  `ExpiryDate` date DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------



--

-- Estructura de tabla para la tabla `SECTION`

--



CREATE TABLE `SECTION` (

  `SectionID` int(11) NOT NULL,

  `WarehouseID` int(11) NOT NULL,

  `SectionName` varchar(254) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------



--

-- Estructura de tabla para la tabla `SHELF`

--



CREATE TABLE `SHELF` (

  `ShelfID` int(11) NOT NULL,

  `SectionID` int(11) NOT NULL,

  `ShelfName` varchar(254) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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

  ADD PRIMARY KEY (`ProductID`);



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

  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;



--

-- AUTO_INCREMENT de la tabla `SECTION`

--

ALTER TABLE `SECTION`

  MODIFY `SectionID` int(11) NOT NULL AUTO_INCREMENT;



--

-- AUTO_INCREMENT de la tabla `SHELF`

--

ALTER TABLE `SHELF`

  MODIFY `ShelfID` int(11) NOT NULL AUTO_INCREMENT;



--

-- AUTO_INCREMENT de la tabla `WAREHOUSES`

--

ALTER TABLE `WAREHOUSES`

  MODIFY `WarehouseID` int(11) NOT NULL AUTO_INCREMENT;



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