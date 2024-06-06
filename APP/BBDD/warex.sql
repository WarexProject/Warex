-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 16:02:28
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
-- Estructura de tabla para la tabla `access`
--

CREATE TABLE `access` (
  `DNI` varchar(9) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LastName` varchar(80) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `Permissions` varchar(4) NOT NULL DEFAULT 'READ',
  `CompanyID` varchar(9) NOT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `access`
--

INSERT INTO `access` (`DNI`, `Name`, `LastName`, `UserName`, `Permissions`, `CompanyID`, `Password`) VALUES
('01734562T', 'Antonio', 'Alonso', 'Antonio', 'READ', '01234567S', '$2y$10$w3faYt6/DsLggXL3qOlncezNF08Laiku9ZB3DO4AHWH95L8cCEV6G'),
('02564753T', 'Adrian', 'Leal Vacas', 'Adrian', 'ALL', '12345678A', '$2y$10$63I9et4gHsD2LPp01cTBUeGKliKtczPENgWW8JqIvugqBJCm4LtB6'),
('02566617R', 'Mario', 'Martin', 'Mario', 'ALL', '12345678A', '$2y$10$2n/7lshoI.pHExu5qFQLX.3WSdVrauLAHtFC8Flm58c3hvxp3bKoq'),
('02592050L', 'Miguel Angel', 'De la calle', 'Miguel', 'ALL', '12345678A', '$2y$10$2AwHssekZyr3L9pCYYy2r.ar49laOhCKxgjkUVmyO5.l0E/bS.FNO'),
('21354789D', 'Juan', 'González', 'Juan', 'READ', '23456789C', '$2y$10$fTq/34N/hGOAUsjaAQvYUOPDjm9WQX9qfYgg/ikjSGYX4fnP3xhem'),
('32165498B', 'Francisco', 'García', 'Francisco', 'READ', '12345678A', '$2y$10$Nj4Y5uqPy2F4CLawwlUsSO7LRZ4eJ1cIsNb1gWLYyxL3OMb9IFCAu'),
('34561287F', 'Luis', 'López', 'Luis', 'READ', '34567890E', '$2y$10$ZNdEY5sLcXqm3cBcZXBkN.2zHVepnB8pVAixY5P7sp1asJOC1W5HG'),
('45267890H', 'Carlos', 'Sánchez', 'Carlos', 'READ', '45678901G', '$2y$10$o/4P15KP6wfNDqY6xFyDge5WZrNY.jiC7zMEy03F3jTEUmplfpHAi'),
('56742389J', 'José', 'Gómez', 'José', 'READ', '56789012I', '$2y$10$IjBrkJTknMa97Dg7JMgI6uMwKWwxeem/CgcRs0ZrvdYQQ8i6NQiwO'),
('68451237L', 'Alberto', 'Jiménez', 'Alberto', 'READ', '67890123K', '$2y$10$0EtKMhPATr8wc5MSyb12hu/HzVRqrc6vNQkgxqr5cvH3oDk.q8ymi'),
('74328901N', 'David', 'Hernández', 'David', 'READ', '78901234M', '$2y$10$2TgT3/5PrCaQGdTMzBd7..7g6ONO2IWie6xR4/FHELnamSOp9oyW2'),
('86723451G', 'Laura', 'Martínez', 'Laura', 'READ', '87654320F', '$2y$10$2XTkzDUWf/4njm0wFc8kQOgWXfcfKHOtDztZSLtAGaFLbhx3Yb/xG'),
('87624135S', 'Lucía', 'Romero', 'Lucía', 'READ', '87654326R', '$2y$10$gn7j/45PrlR7YXcI0a3cgerPCn5eRBM6T/xX8zgUz6fql7Ub9CY46'),
('87632154C', 'María', 'Fernández', 'María', 'READ', '87654321B', '$2y$10$P2NbJJPoy1qwMNTn/h.f/.LaKSsH0M5YeL.LwiFQye6NYE5UoLUjW'),
('87642153O', 'Sofía', 'Díaz', 'Sofía', 'READ', '87654324N', '$2y$10$riooIhy3wv2R8XPe.8Rc6uPb5eX8FqnAtwThLXq5YrL6N9ZUQ9l12'),
('87653210K', 'Elena', 'Martín', 'Elena', 'READ', '87654312J', '$2y$10$DXFnFirOI9N3xAimqO265es.M6SzfLpenk3QWvElvG1D3m5Uyz84y'),
('89126743P', 'Jorge', 'Álvarez', 'Jorge', 'READ', '89012345O', '$2y$10$JHnWoa2tNt7uOydA0pDmXOh9IVv/PLkLByjh4i7AM3cwsc9tyuQQm'),
('89761234I', 'Marta', 'Pérez', 'Marta', 'READ', '98765431H', '$2y$10$Xq.gheoopd2nAxFnBi0/GudieKKB0136XVEFxofoaOTAZXt6cx1jW'),
('90213456R', 'Pablo', 'Muñoz', 'Pablo', 'READ', '90123456Q', '$2y$10$cNCC7k09e1dJhTx8EOlnTeCE6ULH/NBw.BFaOrq2hA7Nd/nbtFAIm'),
('97864521E', 'Ana', 'Rodríguez', 'Ana', 'READ', '98765432D', '$2y$10$7TWKoNSY2vLrzxpS5Q6I3eKnduifLjJx2dKcCCxyohs4fOIp52lte'),
('98563241Q', 'Patricia', 'Moreno', 'Patricia', 'READ', '98765425P', '$2y$10$OqnEbBZPnSSJQWvHOosUfuqrD6W9htAWTL84.2KdfxutC2UIBjZ5O'),
('98563421U', 'Silvia', 'Gutiérrez', 'Silvia', 'READ', '98765427T', '$2y$10$sMX7VtGhhUNgWBQKfXLj2ei2CWSfsnHSwGsLOHMxRs2mZVztTp7i.'),
('98731245M', 'Carmen', 'Ruiz', 'Carmen', 'READ', '98765423L', '$2y$10$MxU2G2YhLGeWf346/kzdUe/wqvUNXiLPOb1QDb1zu/XeLbsg5RrFO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `NIF` varchar(9) NOT NULL,
  `CompanyName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`NIF`, `CompanyName`) VALUES
('01234567S', 'Seguridad y Vigilancia Privada S.L. '),
('12345678A', 'Innovaciones Tecnológicas S.A. '),
('23456789C', 'Construcciones y Reformas del Norte S.L. '),
('34567890E', 'Servicios de Limpieza Integral S.L. '),
('45678901G', 'Consultores Financieros Asociados S.L. '),
('56789012I', 'Arquitectura y Diseño Urbano S.L. '),
('67890123K', 'Publicidad y Marketing Creativo S.L. '),
('78901234M', 'Innovación y Desarrollo Industrial S.L. '),
('87654312J', 'Exportaciones e Importaciones del Mediterráneo S.A. '),
('87654320F', 'Transporte y Logística Global S.A. '),
('87654321B', 'Agroalimentaria Verde SL '),
('87654324N', 'Servicios Médicos y de Salud Integral S.A. '),
('87654326R', 'Comercio Internacional y Exportaciones S.A. '),
('89012345O', 'Producción Audiovisual y Medios S.L. '),
('90123456Q', 'Ingeniería y Consultoría Técnica S.L. '),
('98765423L', 'Gestión de Recursos Humanos Global S.A. '),
('98765425P', 'Distribuciones Alimentarias del Norte S.A. '),
('98765427T', 'Investigación y Desarrollo Biotecnológico S.A. '),
('98765431H', 'Soluciones Informáticas Avanzadas S.A. '),
('98765432D', 'Energías Renovables del Sur S.A. '),
('T02564753', 'Adrián. S.L.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `WarehouseID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SectionID` int(11) NOT NULL,
  `ShelfID` int(11) NOT NULL,
  `TotalProductQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`WarehouseID`, `ProductID`, `SectionID`, `ShelfID`, `TotalProductQuantity`) VALUES
(21, 124, 322, 6, 40),
(21, 125, 322, 6, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `CompanyID` varchar(9) NOT NULL,
  `ProductName` varchar(150) NOT NULL,
  `TotalProductQuantity` int(11) NOT NULL,
  `Description` varchar(254) DEFAULT NULL,
  `UnitPrice` float(11,0) NOT NULL,
  `ExpiryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ProductID`, `CompanyID`, `ProductName`, `TotalProductQuantity`, `Description`, `UnitPrice`, `ExpiryDate`) VALUES
(124, '12345678A', 'SmartHome Hub', 50, 'Central de domótica inteligente.', 100, '2024-06-10'),
(125, '12345678A', 'VirtualReality Glasses', 80, 'Gafas de realidad virtual de última generación.', 250, '2024-07-22'),
(126, '12345678A', 'NanoTech Smartwatch', 200, 'Reloj inteligente con tecnología nanotecnológica.', 180, '2024-08-15'),
(127, '12345678A', 'Biometric Security System', 120, 'Sistema de seguridad biométrica avanzada.', 350, '2024-09-03'),
(128, '12345678A', 'AI-Powered Assistants', 300, 'Asistentes virtuales impulsados por inteligencia artificial.', 200, '2024-10-19'),
(129, '12345678A', 'Quantum Computing Servers', 50, 'Servidores de computación cuántica.', 800, '2024-11-27'),
(130, '12345678A', 'Augmented Reality Headset', 180, 'Visor de realidad aumentada de alta calidad.', 300, '2024-12-05'),
(131, '12345678A', 'Eco-Friendly Solar Panels', 250, 'Paneles solares ecológicos y eficientes.', 500, '2025-01-14'),
(132, '12345678A', 'IoT Home Sensors', 100, 'Sensores domésticos para el Internet de las cosas.', 150, '2025-02-08'),
(133, '12345678A', 'Wireless Charging Pads', 90, 'Plataformas de carga inalámbrica.', 80, '2025-03-17'),
(134, '12345678A', 'Autonomous Drones', 70, 'Drones autónomos de última tecnología.', 600, '2025-04-21'),
(135, '12345678A', '3D Printing Machines', 400, 'Impresoras 3D de alto rendimiento.', 700, '2025-05-02'),
(136, '12345678A', 'Advanced Robotics Kits', 60, 'Kits avanzados de robótica.', 400, '2025-06-30'),
(137, '12345678A', 'Biodegradable Electronics', 170, 'Electrónicos biodegradables.', 220, '2025-07-18'),
(138, '12345678A', 'Health Monitoring Wearables', 220, 'Dispositivos portátiles para monitoreo de salud.', 120, '2025-08-09'),
(139, '12345678A', 'Cybersecurity Software Suite', 130, 'Suite de software de ciberseguridad.', 900, '2025-09-11'),
(140, '12345678A', 'Renewable Energy Batteries', 110, 'Baterías de energía renovable.', 380, '2025-10-06'),
(141, '12345678A', 'Self-Driving Car Systems', 190, 'Sistemas para automóviles autónomos.', 750, '2025-11-25'),
(142, '12345678A', 'Digital Wallets', 350, 'Carteras digitales innovadoras.', 280, '2025-12-28'),
(143, '12345678A', 'Smart City Solutions', 280, 'Soluciones para ciudades inteligentes.', 650, '2026-01-09'),
(144, '12345678A', 'Blockchain-based Authentication', 75, 'Autenticación basada en tecnología blockchain.', 420, '2026-02-14'),
(145, '12345678A', 'Precision Farming Technologies', 160, 'Tecnologías de agricultura de precisión.', 480, '2026-03-03'),
(146, '12345678A', 'Telemedicine Platforms', 240, 'Plataformas de telemedicina.', 320, '2026-04-28'),
(147, '12345678A', 'Clean Energy Vehicles', 135, 'Vehículos ecológicos.', 560, '2026-05-15'),
(148, '12345678A', 'Wearable Fitness Trackers', 175, 'Dispositivos para seguimiento de actividad física.', 140, '2026-06-20'),
(149, '12345678A', 'Hydroponic Gardening Kits', 95, 'Kits de jardinería hidropónica.', 170, '2026-07-07'),
(150, '12345678A', 'Home Automation Systems', 225, 'Sistemas de automatización del hogar.', 260, '2026-08-26'),
(151, '12345678A', 'Intelligent Traffic Management', 85, 'Gestión de tráfico inteligente.', 740, '2026-09-13'),
(152, '12345678A', 'Remote Work Collaboration Tools', 145, 'Herramientas de colaboración para trabajo remoto.', 730, '2026-10-31'),
(153, '12345678A', 'Sustainable Packaging Solutions', 270, 'Soluciones de embalaje sostenible.', 930, '2026-11-04'),
(154, '12345678A', 'Personalized Medicine Apps', 65, 'Aplicaciones de medicina personalizada.', 590, '2026-12-22'),
(155, '12345678A', 'Urban Mobility Solutions', 310, 'Soluciones de movilidad urbana.', 880, '2027-01-27'),
(156, '12345678A', 'AI-driven Marketing Platforms', 260, 'Plataformas de marketing impulsadas por IA.', 930, '2027-02-01'),
(157, '12345678A', 'Educational Coding Robots', 105, 'Robots educativos de programación.', 550, '2027-03-16'),
(158, '12345678A', 'Advanced Materials Research', 140, 'Investigación de materiales avanzados.', 780, '2027-04-09'),
(159, '12345678A', 'Precision Agriculture Drones', 230, 'Drones para agricultura de precisión.', 960, '2027-05-08'),
(160, '12345678A', 'Clean Energy Storage Solutions', 125, 'Soluciones de almacenamiento de energía limpia.', 870, '2027-06-26'),
(161, '12345678A', 'Smart Grid Infrastructure', 195, 'Infraestructura de redes inteligentes.', 920, '2027-07-14'),
(162, '12345678A', 'Connected Car Accessories', 115, 'Accesorios para autos conectados.', 450, '2027-08-23'),
(163, '12345678A', 'Smart Clothing Technology', 320, 'Tecnología de ropa inteligente.', 760, '2027-09-19'),
(164, '12345678A', 'Digital Health Platforms', 210, 'Plataformas de salud digital.', 680, '2027-10-29'),
(165, '12345678A', 'Next-Gen Food Delivery Systems', 330, 'Sistemas de entrega de alimentos de próxima generación.', 510, '2027-11-08'),
(166, '12345678A', 'Renewable Energy Microgrids', 500, 'Microredes de energía renovable.', 850, '2027-12-17'),
(167, '12345678A', 'E-Waste Recycling Services', 400, 'Servicios de reciclaje de desechos electrónicos.', 980, '2028-01-22'),
(168, '12345678A', 'Urban Air Quality Monitors', 600, 'Monitores de calidad del aire urbano.', 360, '2028-02-25'),
(169, '12345678A', 'Cybersecurity Training Platforms', 450, 'Plataformas de entrenamiento en ciberseguridad.', 330, '2028-03-07'),
(170, '12345678A', 'Eco-Friendly Transportation', 520, 'Transporte ecológico.', 940, '2028-04-30'),
(171, '12345678A', 'Smart Office Furniture', 380, 'Muebles de oficina inteligentes.', 570, '2028-05-05'),
(172, '12345678A', 'Climate Change Prediction Models', 420, 'Modelos de predicción del cambio climático.', 860, '2028-06-10'),
(173, '12345678A', 'Personal Security Devices', 470, 'Dispositivos de seguridad personal.', 710, '2028-07-01'),
(174, '12345678A', 'Biometric Payment Solutions', 570, 'Soluciones de pago biométrico.', 590, '2028-08-28'),
(175, '12345678A', 'Smart Waste Management Systems', 350, 'Sistemas de gestión de residuos inteligentes.', 840, '2028-09-24'),
(176, '12345678A', 'Precision Irrigation Controllers', 370, 'Controladores de riego de precisión.', 790, '2028-10-20'),
(177, '12345678A', 'Sustainable Fashion Apps', 490, 'Aplicaciones de moda sostenible.', 920, '2028-11-13'),
(178, '12345678A', 'Remote Patient Monitoring Devices', 540, 'Dispositivos de monitoreo remoto de pacientes.', 670, '2028-12-02'),
(179, '12345678A', 'Autonomous Delivery Robots', 430, 'Robots de entrega autónomos.', 930, '2029-01-11'),
(180, '12345678A', 'Energy-Efficient HVAC Systems', 480, 'Sistemas de HVAC eficientes en energía.', 720, '2029-02-19'),
(181, '12345678A', 'Urban Farming Solutions', 560, 'Soluciones de agricultura urbana.', 590, '2029-03-25'),
(182, '12345678A', 'AI-driven Financial Planning Tools', 510, 'Herramientas de planificación financiera impulsadas por IA.', 890, '2029-04-14'),
(183, '12345678A', 'Personalized Virtual Reality Experiences', 380, 'Experiencias de realidad virtual personalizadas.', 950, '2029-05-30'),
(184, '87654321B', 'Aceite de Oliva Virgen Extra', 100, NULL, 10, NULL),
(185, '87654321B', 'Miel Orgánica de Flores Silvestres', 50, NULL, 8, NULL),
(186, '87654321B', 'Salsa de Tomate Artesanal', 200, NULL, 15, NULL),
(187, '87654321B', 'Frutas y Verduras Frescas de Temporada', 75, NULL, 12, NULL),
(188, '87654321B', 'Productos lácteos de Granja Ecológica', 150, NULL, 20, NULL),
(189, '23456789C', 'Ladrillos Cerámicos ', 50, NULL, 100, NULL),
(190, '23456789C', 'Azulejos Decorativos ', 80, NULL, 250, NULL),
(191, '23456789C', 'Cemento Reforzado ', 200, NULL, 180, NULL),
(192, '23456789C', 'Puertas de Madera Maciza ', 120, NULL, 350, NULL),
(193, '23456789C', 'Ventanas de Aluminio ', 300, NULL, 200, NULL),
(194, '98765432D', 'Paneles Solares Fotovoltaicos ', 50, NULL, 800, NULL),
(195, '98765432D', 'Aerogeneradores Eólicos ', 180, NULL, 300, NULL),
(196, '98765432D', 'Baterías de Almacenamiento ', 250, NULL, 500, NULL),
(197, '98765432D', 'Cargadores Solares Portátiles ', 100, NULL, 150, NULL),
(198, '98765432D', 'Sistemas de Energía Solar Residencial ', 90, NULL, 80, NULL),
(199, '34567890E', 'Limpieza de Oficinas ', 70, NULL, 600, NULL),
(200, '34567890E', 'Mantenimiento de Espacios Públicos ', 400, NULL, 700, NULL),
(201, '34567890E', 'Limpieza de Cristales ', 60, NULL, 400, NULL),
(202, '34567890E', 'Desinfección de Superficies ', 170, NULL, 220, NULL),
(203, '34567890E', 'Tratamiento de Suelos ', 220, NULL, 120, NULL),
(204, '87654320F', 'Transporte Marítimo de Carga ', 130, NULL, 900, NULL),
(205, '87654320F', 'Servicios de Almacenaje ', 110, NULL, 380, NULL),
(206, '87654320F', 'Logística de Distribución ', 190, NULL, 750, NULL),
(207, '87654320F', 'Transporte Aéreo de Mercancías ', 350, NULL, 280, NULL),
(208, '87654320F', 'Soluciones de Transporte Intermodal ', 280, NULL, 650, NULL),
(209, '45678901G', 'Planificación Financiera Personalizada ', 75, NULL, 420, NULL),
(210, '45678901G', 'Asesoramiento en Inversiones ', 160, NULL, 480, NULL),
(211, '45678901G', 'Gestión de Patrimonios ', 240, NULL, 320, NULL),
(212, '45678901G', 'Consultoría Fiscal ', 135, NULL, 560, NULL),
(213, '45678901G', 'Análisis de Riesgos Financieros ', 175, NULL, 140, NULL),
(214, '98765431H', 'Software de Gestión Empresarial ', 95, NULL, 170, NULL),
(215, '98765431H', 'Soluciones de Seguridad Informática ', 225, NULL, 260, NULL),
(216, '98765431H', 'Desarrollo de Aplicaciones Móviles ', 85, NULL, 740, NULL),
(217, '98765431H', 'Servicios de Cloud Computing ', 145, NULL, 730, NULL),
(218, '98765431H', 'Consultoría en Tecnologías de la Información ', 270, NULL, 930, NULL),
(219, '56789012I', 'Diseño Arquitectónico Sostenible ', 65, NULL, 590, NULL),
(220, '56789012I', 'Planificación Urbana Integral ', 310, NULL, 880, NULL),
(221, '56789012I', 'Diseño de Espacios Públicos ', 260, NULL, 930, NULL),
(222, '56789012I', 'Proyectos de Rehabilitación Urbana ', 105, NULL, 550, NULL),
(223, '56789012I', 'Diseño de Interiores ', 140, NULL, 780, NULL),
(224, '87654312J', 'Exportación de Productos Agroalimentarios ', 230, NULL, 960, NULL),
(225, '87654312J', 'Importación de Productos Técnicos ', 125, NULL, 870, NULL),
(226, '87654312J', 'Comercio Exterior de Materias Primas ', 195, NULL, 920, NULL),
(227, '87654312J', 'Servicios de Aduanas y Logística ', 115, NULL, 450, NULL),
(228, '87654312J', 'Gestión de Operaciones de Comercio Internacional ', 320, NULL, 760, NULL),
(229, '67890123K', 'Estrategias de Marketing Digital ', 210, NULL, 680, NULL),
(230, '67890123K', 'Diseño Gráfico Publicitario ', 330, NULL, 510, NULL),
(231, '67890123K', 'Creación de Contenido Multimedia ', 500, NULL, 850, NULL),
(232, '67890123K', 'Campañas Publicitarias Interactivas ', 400, NULL, 980, NULL),
(233, '67890123K', 'Investigación de Mercado y Segmentación ', 600, NULL, 360, NULL),
(234, '98765423L', 'Selección de Personal ', 450, NULL, 330, NULL),
(235, '98765423L', 'Formación y Desarrollo Profesional ', 520, NULL, 940, NULL),
(236, '98765423L', 'Consultoría en Gestión del Talento ', 380, NULL, 570, NULL),
(237, '98765423L', 'Servicios de Outsourcing de RRHH ', 420, NULL, 860, NULL),
(238, '98765423L', 'Evaluación del Desempeño y Clima Laboral ', 470, NULL, 710, NULL),
(239, '78901234M', 'Investigación y Desarrollo de Productos ', 570, NULL, 590, NULL),
(240, '78901234M', 'Consultoría en Procesos Industriales ', 350, NULL, 840, NULL),
(241, '78901234M', 'Diseño de Prototipos y Maquinaria', 370, NULL, 790, NULL),
(242, '78901234M', 'Servicios de Optimización de la Producción', 490, NULL, 920, NULL),
(243, '78901234M', 'Análisis de Calidad y Mejora Continua', 540, NULL, 670, NULL),
(244, '87654324N', 'Consultas Médicas Especializadas', 430, NULL, 930, NULL),
(245, '87654324N', 'Servicios de Diagnóstico por Imagen', 480, NULL, 720, NULL),
(246, '87654324N', 'Tratamientos de Rehabilitación Física', 560, NULL, 590, NULL),
(247, '87654324N', 'Atención Domiciliaria de Enfermería', 510, NULL, 890, NULL),
(248, '87654324N', 'Programas de Prevención y Promoción de la Salud', 380, NULL, 950, NULL),
(249, '89012345O', 'Producción de Contenidos Audiovisuales', 100, NULL, 10, NULL),
(250, '89012345O', 'Edición y Postproducción de Vídeo', 50, NULL, 8, NULL),
(251, '89012345O', 'Fotografía Publicitaria y de Eventos', 200, NULL, 15, NULL),
(252, '89012345O', 'Diseño Gráfico para Medios Digitales', 75, NULL, 12, NULL),
(253, '89012345O', 'Creación de Campañas Publicitarias Multimedia', 150, NULL, 20, NULL),
(254, '98765425P', 'Distribución de Productos Perecederos', 50, NULL, 950, NULL),
(255, '98765425P', 'Logística de Alimentos Congelados', 80, NULL, 10, NULL),
(256, '98765425P', 'Comercialización de Productos Gourmet', 200, NULL, 8, NULL),
(257, '98765425P', 'Exportación de Especialidades Regionales', 120, NULL, 15, NULL),
(258, '98765425P', 'Venta al Por Mayor de Productos Alimenticios', 300, NULL, 12, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section`
--

CREATE TABLE `section` (
  `SectionID` int(11) NOT NULL,
  `WarehouseID` int(11) NOT NULL,
  `SectionName` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`SectionID`, `WarehouseID`, `SectionName`) VALUES
(322, 21, 'Hogar Inteligente'),
(323, 21, 'Realidad Extendida'),
(324, 21, 'Dispositivos Portátiles'),
(325, 21, 'Seguridad Biométrica'),
(326, 21, 'Inteligencia Artificial'),
(327, 21, 'Computación Avanzada'),
(328, 21, 'Energía Sostenible'),
(329, 21, 'Internet de las Cosas (IoT)'),
(330, 21, 'Carga Inalámbrica'),
(331, 21, 'Robótica'),
(332, 21, 'Fabricación Aditiva'),
(333, 21, 'Electrónica Ecológica'),
(334, 21, 'Salud Tecnológica'),
(335, 21, 'Ciberseguridad'),
(336, 21, 'Energía Renovable'),
(337, 21, 'Transporte Autónomo'),
(338, 21, 'Finanzas Digitales'),
(339, 21, 'Ciudades Inteligentes'),
(340, 21, 'Agricultura de Precisión'),
(341, 21, 'Sostenibilidad Ambiental'),
(384, 22, 'Hogar Inteligente'),
(385, 22, 'Realidad Extendida'),
(386, 22, 'Dispositivos Portátiles'),
(387, 22, 'Seguridad Biométrica'),
(388, 22, 'Inteligencia Artificial'),
(389, 22, 'Computación Avanzada'),
(390, 22, 'Energía Sostenible'),
(391, 22, 'Internet de las Cosas (IoT)'),
(392, 22, 'Carga Inalámbrica'),
(393, 22, 'Robótica'),
(394, 22, 'Fabricación Aditiva'),
(395, 22, 'Electrónica Ecológica'),
(396, 22, 'Salud Tecnológica'),
(397, 22, 'Ciberseguridad'),
(398, 22, 'Energía Renovable'),
(399, 22, 'Transporte Autónomo'),
(400, 22, 'Finanzas Digitales'),
(401, 22, 'Ciudades Inteligentes'),
(402, 22, 'Agricultura de Precisión'),
(403, 22, 'Sostenibilidad Ambiental'),
(446, 23, 'Hogar Inteligente'),
(447, 23, 'Realidad Extendida'),
(448, 23, 'Dispositivos Portátiles'),
(449, 23, 'Seguridad Biométrica'),
(450, 23, 'Inteligencia Artificial'),
(451, 23, 'Computación Avanzada'),
(452, 23, 'Energía Sostenible'),
(453, 23, 'Internet de las Cosas (IoT)'),
(454, 23, 'Carga Inalámbrica'),
(455, 23, 'Robótica'),
(456, 23, 'Fabricación Aditiva'),
(457, 23, 'Electrónica Ecológica'),
(458, 23, 'Salud Tecnológica'),
(459, 23, 'Ciberseguridad'),
(460, 23, 'Energía Renovable'),
(461, 23, 'Transporte Autónomo'),
(462, 23, 'Finanzas Digitales'),
(463, 23, 'Ciudades Inteligentes'),
(464, 23, 'Agricultura de Precisión'),
(465, 23, 'Sostenibilidad Ambiental'),
(508, 24, 'Hogar Inteligente'),
(509, 24, 'Realidad Extendida'),
(510, 24, 'Dispositivos Portátiles'),
(511, 24, 'Seguridad Biométrica'),
(512, 24, 'Inteligencia Artificial'),
(513, 24, 'Computación Avanzada'),
(514, 24, 'Energía Sostenible'),
(515, 24, 'Internet de las Cosas (IoT)'),
(516, 24, 'Carga Inalámbrica'),
(517, 24, 'Robótica'),
(518, 24, 'Fabricación Aditiva'),
(519, 24, 'Electrónica Ecológica'),
(520, 24, 'Salud Tecnológica'),
(521, 24, 'Ciberseguridad'),
(522, 24, 'Energía Renovable'),
(523, 24, 'Transporte Autónomo'),
(524, 24, 'Finanzas Digitales'),
(525, 24, 'Ciudades Inteligentes'),
(526, 24, 'Agricultura de Precisión'),
(527, 24, 'Sostenibilidad Ambiental'),
(570, 25, 'Hogar Inteligente'),
(571, 25, 'Realidad Extendida'),
(572, 25, 'Dispositivos Portátiles'),
(573, 25, 'Seguridad Biométrica'),
(574, 25, 'Inteligencia Artificial'),
(575, 25, 'Computación Avanzada'),
(576, 25, 'Energía Sostenible'),
(577, 25, 'Internet de las Cosas (IoT)'),
(578, 25, 'Carga Inalámbrica'),
(579, 25, 'Robótica'),
(580, 25, 'Fabricación Aditiva'),
(581, 25, 'Electrónica Ecológica'),
(582, 25, 'Salud Tecnológica'),
(583, 25, 'Ciberseguridad'),
(584, 25, 'Energía Renovable'),
(585, 25, 'Transporte Autónomo'),
(586, 25, 'Finanzas Digitales'),
(587, 25, 'Ciudades Inteligentes'),
(588, 25, 'Agricultura de Precisión'),
(589, 25, 'Sostenibilidad Ambiental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shelf`
--

CREATE TABLE `shelf` (
  `ShelfID` int(11) NOT NULL,
  `SectionID` int(11) NOT NULL,
  `ShelfName` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `shelf`
--

INSERT INTO `shelf` (`ShelfID`, `SectionID`, `ShelfName`) VALUES
(6, 322, 'Automatización del Hogar'),
(7, 322, 'Seguridad Residencial'),
(8, 322, 'Eficiencia Energética'),
(9, 323, 'Realidad Virtual'),
(10, 323, 'Realidad Aumentada'),
(11, 323, 'Mixta (Realidad Mixta)'),
(12, 324, 'Wearables para la Salud'),
(13, 324, 'Tecnología Vestible'),
(14, 324, 'Dispositivos de Seguimiento y Actividad'),
(15, 325, 'Reconocimiento Facial'),
(16, 325, 'Escaneo de Iris'),
(17, 325, 'Huella Digital'),
(18, 326, 'Asistentes Virtuales'),
(19, 326, 'Aprendizaje Automático'),
(20, 326, 'Procesamiento de Lenguaje Natural'),
(21, 327, 'Computación Cuántica'),
(22, 327, 'Supercomputación'),
(23, 327, 'Computación en la Nube'),
(24, 328, 'Paneles Solares'),
(25, 328, 'Almacenamiento de Energía'),
(26, 328, 'Energía Eólica'),
(27, 329, 'Dispositivos Domésticos Conectados'),
(28, 329, 'Soluciones Industriales'),
(29, 329, 'Tecnología Médica IoT'),
(30, 330, 'Cargadores de Mesa'),
(31, 330, 'Cargadores de Pared'),
(32, 330, 'Cargadores Portátiles'),
(33, 331, 'Robótica Industrial'),
(34, 331, 'Robots de Asistencia'),
(35, 331, 'Robótica Educativa'),
(36, 332, 'Impresoras 3D de Plástico'),
(37, 332, 'Impresoras 3D Metálicas'),
(38, 332, 'Impresoras 3D de Alimentos'),
(39, 333, 'Dispositivos Reciclables'),
(40, 333, 'Componentes de Bajo Consumo de Energía'),
(41, 333, 'Electrónica Biodegradable'),
(42, 334, 'Dispositivos de Monitoreo'),
(43, 334, 'Tecnología de Diagnóstico'),
(44, 334, 'Herramientas de Telemedicina'),
(45, 335, 'Protección de Redes'),
(46, 335, 'Software Antivirus'),
(47, 335, 'Seguridad de Datos'),
(48, 336, 'Baterías Solares'),
(49, 336, 'Energía Geotérmica'),
(50, 336, 'Hidrógeno Verde'),
(51, 337, 'Vehículos Autónomos'),
(52, 337, 'Drones de Entrega'),
(53, 337, 'Transporte Público Autónomo'),
(54, 338, 'Criptomonedas'),
(55, 338, 'Fintech'),
(56, 338, 'Banca en Línea'),
(57, 339, 'Sistemas de Tráfico Inteligentes'),
(58, 339, 'Gestión de Residuos Inteligente'),
(59, 339, 'Servicios de Energía Inteligente'),
(60, 340, 'Monitoreo de Cultivos'),
(61, 340, 'Tecnología de Riego Eficiente'),
(62, 340, 'Robótica Agrícola'),
(63, 341, 'Tecnología de Reciclaje'),
(64, 341, 'Monitoreo Ambiental'),
(65, 341, 'Energías Limpias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouses`
--

CREATE TABLE `warehouses` (
  `WarehouseID` int(11) NOT NULL,
  `CompanyID` varchar(9) NOT NULL,
  `TotalProductQuantity` int(11) NOT NULL,
  `RefrigeratingChamber` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `warehouses`
--

INSERT INTO `warehouses` (`WarehouseID`, `CompanyID`, `TotalProductQuantity`, `RefrigeratingChamber`) VALUES
(21, '12345678A', 50000, 0),
(22, '12345678A', 120000, 1),
(23, '12345678A', 300000, 0),
(24, '12345678A', 450000, 1),
(25, '12345678A', 750000, 0),
(26, '87654321B', 70000, 1),
(27, '87654321B', 280000, 0),
(28, '87654321B', 540000, 1),
(29, '87654321B', 610000, 0),
(30, '87654321B', 150000, 1),
(31, '87654321B', 420000, 0),
(32, '23456789C', 370000, 1),
(33, '23456789C', 200000, 0),
(34, '23456789C', 380000, 1),
(35, '98765432D', 440000, 0),
(36, '34567890E', 830000, 1),
(37, '34567890E', 760000, 0),
(38, '34567890E', 50000, 1),
(39, '34567890E', 580000, 0),
(40, '34567890E', 730000, 1),
(41, '34567890E', 690000, 0),
(42, '34567890E', 480000, 1),
(43, '34567890E', 860000, 0),
(44, '87654320F', 120000, 1),
(45, '87654320F', 620000, 0),
(46, '45678901G', 250000, 1),
(47, '45678901G', 800000, 0),
(48, '45678901G', 530000, 1),
(49, '98765431H', 110000, 0),
(50, '98765431H', 680000, 1),
(51, '98765431H', 290000, 0),
(52, '98765431H', 370000, 1),
(53, '56789012I', 340000, 0),
(54, '56789012I', 480000, 1),
(55, '56789012I', 650000, 0),
(56, '56789012I', 720000, 1),
(57, '56789012I', 380000, 0),
(58, '87654312J', 490000, 1),
(59, '67890123K', 570000, 0),
(60, '67890123K', 660000, 1),
(61, '67890123K', 220000, 0),
(62, '98765423L', 260000, 1),
(63, '98765423L', 430000, 0),
(64, '98765423L', 840000, 1),
(65, '78901234M', 190000, 0),
(66, '78901234M', 780000, 1),
(67, '78901234M', 880000, 0),
(68, '78901234M', 140000, 1),
(69, '87654324N', 860000, 0),
(70, '87654324N', 670000, 1),
(71, '87654324N', 460000, 0),
(72, '87654324N', 150000, 1),
(73, '87654324N', 740000, 0),
(74, '89012345O', 610000, 1),
(75, '89012345O', 890000, 0),
(76, '98765425P', 730000, 1),
(77, '98765425P', 250000, 0),
(78, '98765425P', 870000, 1),
(79, '98765425P', 560000, 0),
(80, '98765425P', 320000, 1),
(81, '98765425P', 680000, 0),
(82, '90123456Q', 830000, 1),
(83, '90123456Q', 690000, 0),
(84, '90123456Q', 770000, 1),
(85, '87654326R', 310000, 0),
(86, '87654326R', 450000, 1),
(87, '87654326R', 790000, 0),
(88, '87654326R', 670000, 1),
(89, '01234567S', 840000, 0),
(90, '01234567S', 620000, 1),
(91, '01234567S', 540000, 0),
(92, '01234567S', 380000, 1),
(93, '01234567S', 550000, 0),
(94, '01234567S', 480000, 1),
(95, '01234567S', 720000, 0),
(96, '01234567S', 870000, 1),
(97, '01234567S', 180000, 0),
(98, '01234567S', 610000, 1),
(99, '01234567S', 420000, 0),
(100, '01234567S', 460000, 1),
(101, '98765427T', 780000, 0),
(102, '98765427T', 290000, 1),
(103, '98765427T', 670000, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `FK_CompanyID_ACCESS` (`CompanyID`) USING BTREE;

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`NIF`) USING BTREE;

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`WarehouseID`,`ProductID`,`SectionID`,`ShelfID`),
  ADD KEY `FK_WarehouseID_LOCATION` (`WarehouseID`),
  ADD KEY `FK_ProductID_LOCATION` (`ProductID`),
  ADD KEY `FK_SectionID_LOCATION` (`SectionID`),
  ADD KEY `FK_ShelfID_LOCATION` (`ShelfID`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_CompanyID_PRODUCTS` (`CompanyID`);

--
-- Indices de la tabla `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionID`),
  ADD KEY `FK_WarehouseID_SECTION` (`WarehouseID`) USING BTREE;

--
-- Indices de la tabla `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`ShelfID`),
  ADD KEY `FK_SectionID_SHELF` (`SectionID`) USING BTREE;

--
-- Indices de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`WarehouseID`),
  ADD KEY `FK_CompanyID_WAREHOUSES` (`CompanyID`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT de la tabla `section`
--
ALTER TABLE `section`
  MODIFY `SectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;

--
-- AUTO_INCREMENT de la tabla `shelf`
--
ALTER TABLE `shelf`
  MODIFY `ShelfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `WarehouseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `FK_CompanyID_ACCESS` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`NIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `FK_ProductID_LOCATION` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_SectionID_LOCATION` FOREIGN KEY (`SectionID`) REFERENCES `section` (`SectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ShelfID_LOCATION` FOREIGN KEY (`ShelfID`) REFERENCES `shelf` (`ShelfID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_WarehouseID_LOCATION` FOREIGN KEY (`WarehouseID`) REFERENCES `warehouses` (`WarehouseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CompanyID_PRODUCTS` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`NIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_WarehouseID` FOREIGN KEY (`WarehouseID`) REFERENCES `warehouses` (`WarehouseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `FK_SectionID` FOREIGN KEY (`SectionID`) REFERENCES `section` (`SectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `FK_CompanyID_WAREHOUSES` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`NIF`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
