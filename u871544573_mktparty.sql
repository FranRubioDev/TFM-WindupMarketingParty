-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2024 at 04:13 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u871544573_mktparty`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Conferencias'),
(2, 'Workshops');

-- --------------------------------------------------------

--
-- Table structure for table `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `dias`
--

INSERT INTO `dias` (`id`, `nombre`) VALUES
(1, 'Viernes'),
(2, 'Sábado');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `dia_id` int(11) NOT NULL,
  `hora_id` int(11) NOT NULL,
  `ponente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `disponibles`, `categoria_id`, `dia_id`, `hora_id`, `ponente_id`) VALUES
(1, 'SE0 - Como crear contenido para Google', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 46, 2, 2, 1, 1),
(2, 'Email Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 2, 2, 2),
(3, 'PPC / SEM - No pagues de más', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 1, 3, 3),
(4, 'WEB - Astro el Framework para SEO', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 1, 4, 8),
(5, 'Analítica - Looker o no Looker', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 45, 2, 1, 5, 4),
(6, 'WEB - El PHP no ha muerto, estaba de parranda', 'Esta es la descripciónDDD', 31, 2, 1, 6, 7),
(7, 'Email 1 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 1, 8, 2),
(8, 'Email 2 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 2, 7, 2),
(9, 'Email 3 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 2, 1, 2),
(10, 'Email 4 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 2, 2, 2),
(11, 'WEB - El PHP no ha muerto, estaba de parranda', 'Esta es la descripciónDDD', 32, 2, 2, 3, 7),
(12, 'Analítica - Looker o no Looker', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 46, 2, 2, 4, 4),
(13, 'WEB - Astro el Framework para SEO', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 29, 1, 2, 5, 8),
(14, 'PPC / SEM - No pagues de más', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 29, 1, 2, 6, 3),
(15, 'WEB - El PHP no ha muerto, estaba de parranda', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 2, 7, 3),
(16, 'SE0 - Como crear contenido para Google', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 46, 2, 2, 8, 1),
(17, 'Email Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 1, 1, 2),
(18, 'PPC / SEM - No pagues de más', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 1, 2, 3),
(19, 'WEB - Astro el Framework para SEO', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 1, 3, 8),
(20, 'Analítica - Looker o no Looker', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 45, 2, 1, 4, 4),
(21, 'WEB - El PHP no ha muerto, estaba de parranda', 'Esta es la descripciónDDD', 31, 2, 1, 5, 7),
(22, 'Email 1 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 1, 6, 2),
(23, 'Email 2 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 1, 7, 2),
(24, 'Email 3 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 2, 8, 5),
(25, 'Email 4 Mk - Campañas rentables', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 2, 2, 1, 2),
(26, 'WEB - El PHP no ha muerto, estaba de parranda', 'Esta es la descripciónDDD', 32, 2, 2, 2, 7),
(27, 'Analítica - Looker o no Looker', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 46, 2, 2, 3, 4),
(28, 'WEB - Astro el Framework para SEO', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 29, 1, 2, 4, 8),
(29, 'PPC / SEM - No pagues de más', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 29, 1, 2, 5, 3),
(30, 'WEB - El PHP no ha muerto, estaba de parranda', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 2, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `eventos_registros`
--

CREATE TABLE `eventos_registros` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `registro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `eventos_registros`
--

INSERT INTO `eventos_registros` (`id`, `evento_id`, `registro_id`) VALUES
(1, 3, 1),
(17, 3, 21),
(18, 3, 21),
(19, 3, 21),
(20, 3, 21),
(21, 6, 21),
(22, 3, 1),
(23, 3, 1),
(24, 2, 21),
(25, 5, 21),
(26, 3, 1),
(27, 4, 1),
(28, 5, 1),
(29, 6, 1),
(30, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `horas`
--

CREATE TABLE `horas` (
  `id` int(11) NOT NULL,
  `hora` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `horas`
--

INSERT INTO `horas` (`id`, `hora`) VALUES
(1, '10:00 - 10:55'),
(2, '11:00 - 11:55'),
(3, '12:00 - 12:55'),
(4, '13:00 - 13:55'),
(5, '16:00 - 16:55'),
(6, '17:00 - 17:55'),
(7, '18:00 - 18:55'),
(8, '19:00 - 19:55');

-- --------------------------------------------------------

--
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`id`, `nombre`) VALUES
(1, 'Gratuita'),
(2, 'Presencial'),
(3, 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `ponentes`
--

CREATE TABLE `ponentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `empresa` varchar(20) DEFAULT NULL,
  `imagen` varchar(32) DEFAULT NULL,
  `imagenempresa` varchar(32) DEFAULT NULL,
  `tags` varchar(120) DEFAULT NULL,
  `redes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `ponentes`
--

INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `empresa`, `imagen`, `imagenempresa`, `tags`, `redes`) VALUES
(1, 'Pablo', 'Sánchez', 'Madrid', 'IKEA', '6764a74ccf2b4b5b74e333016c13388a', '6764a74ccf2b4b5b74e333016c13388a', 'Content, Branding', '{\"facebook\":\"https://facebook.com/FranRubioDev\",\"twitter\":\"https://twitter.com/FranRubioDev\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/FranRubioDev\",\"tiktok\":\"\",\"github\":\"https://github.com/FranRubioDev\"}'),
(2, 'Ana', 'Días del Río', 'Barcelona', 'metricool', 'd697f6c454c36252d70abacd7599566c', 'd697f6c454c36252d70abacd7599566c', 'Consultoría, Influencers', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/FranRubioDev\",\"instagram\":\"https://instagram.com/FranRubioDev\",\"tiktok\":\"https://tiktok.com/@FranRubioDev\",\"github\":\"https://github.com/FranRubioDev\"}'),
(3, 'Raquel', 'Notario', 'Valencia', 'Carrefour', '55c7866df31370ec3299eed6eb63daa1', '55c7866df31370ec3299eed6eb63daa1', 'Redes Sociales, Meta, TikTok', '{\"facebook\":\"https://facebook.com/FranRubioDev\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/FranRubioDev\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@FranRubioDev\",\"github\":\"\"}'),
(4, 'Luís', 'Serrano', 'Sevilla', 'RealMadrid F.C.', 'de6e3fa0cde8402de4c28e6be0903ada', 'de6e3fa0cde8402de4c28e6be0903ada', 'Growthing, SEO', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/FranRubioDev\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/FranRubioDev\",\"tiktok\":\"\",\"github\":\"https://github.com/FranRubioDev\"}'),
(5, 'Miguel Ángel', 'Cervera', 'Zaragoza', 'Microsoft', 'cec8c9d7bcb4c19e87d1164bce8fe176', 'cec8c9d7bcb4c19e87d1164bce8fe176', 'Automatizaciones, IA', '{\"facebook\":\"https://facebook.com/FranRubioDev\",\"twitter\":\"https://twitter.com/FranRubioDev\",\"youtube\":\"https://youtube.com/FranRubioDev\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(6, 'Lucía', 'Sánchez', 'Málaga', 'WebMasters', '5332118b8d7690a1b992431802eafab1', '5332118b8d7690a1b992431802eafab1', 'WordPress, PHP', '{\"facebook\":\"https://facebook.com/FranRubioDev\",\"twitter\":\"https://twitter.com/FranRubioDev\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/FranRubioDev\",\"tiktok\":\"\",\"github\":\"https://github.com/FranRubioDev\"}'),
(7, 'David', 'Pérez', 'Bilbao', 'TechSavvy', '90956ece4adbd9f9ccb8f4ae80dc1537', '90956ece4adbd9f9ccb8f4ae80dc1537', 'Desarrollo Web', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/FranRubioDev\",\"instagram\":\"https://instagram.com/FranRubioDev\",\"tiktok\":\"https://tiktok.com/@FranRubioDev\",\"github\":\"https://github.com/FranRubioDev\"}'),
(8, 'Laura', 'Hernández', 'Murcia', 'NextGenCode', '9886ffc0d31e4c20a04acc1464630527', '9886ffc0d31e4c20a04acc1464630527', 'Analítica', '{\"facebook\":\"https://facebook.com/FranRubioDev\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/FranRubioDev\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@FranRubioDev\",\"github\":\"\"}'),
(9, 'Pedro', 'Jiménez', 'Valladolid', 'SoftInnovations', '6497c66bcc464e26871c046dd5bb86c8', '6497c66bcc464e26871c046dd5bb86c8', 'SEO', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/FranRubioDev\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/FranRubioDev\",\"linkedin\":\"\",\"web\":\"\"}');

-- --------------------------------------------------------

--
-- Table structure for table `regalos`
--

CREATE TABLE `regalos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `regalos`
--

INSERT INTO `regalos` (`id`, `nombre`) VALUES
(1, 'Sin especificar'),
(2, 'Camiseta Mujer - S'),
(3, 'Camiseta Mujer - M'),
(4, 'Camiseta Mujer - L'),
(5, 'Camiseta Mujer - XL'),
(6, 'Camiseta Hombre - S'),
(7, 'Camiseta Hombre - M'),
(8, 'Camiseta Hombre - L'),
(9, 'Camiseta Hombre - XL'),
(10, 'Camiseta Niño/a - 12');

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `pack_id` int(11) DEFAULT NULL,
  `pago_id` varchar(30) DEFAULT NULL,
  `token` varchar(8) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `regalo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id`, `pack_id`, `pago_id`, `token`, `usuario_id`, `regalo_id`) VALUES
(1, 1, '11111111', '11111111', 14, 8),
(21, 1, '11111111', '11111111', 16, 7),
(22, 2, '0AT39791WK280890K', '5ae06311', 17, 1),
(24, 2, '0HR27505KE616794Y', '9a095a17', 19, 1),
(25, 2, '09R23612E9956974Y', 'e59df631', 21, 2),
(26, 1, '1E3887532C3340723', 'f04de710', 23, 2),
(27, 1, '9G875539K1497941H', '58280b6e', 22, 1),
(28, 2, '3YR73127VJ815142A', 'b53471cb', 15, 1),
(29, 1, '3K8913402B7456208', '7451be0b', 24, 1),
(30, 2, '55344533H1204303T', 'f1a238f9', 25, 1),
(31, 1, '61K655242P372021P', 'ae815aaf', 25, 1),
(32, 2, '3DH26595RM8528805', '8b8472f7', 25, 1),
(33, 2, '9L474637MN451084F', '6251caeb', 26, 1),
(34, 3, '0TU266217N873512X', 'd5e58f14', 26, 1),
(35, 2, '0F492498J54279139', '5429d964', 26, 1),
(36, 2, '13C066074G2189947', '4e856087', 26, 1),
(37, 1, '9PG35519VY1454038', '7f08f2a2', 26, 1),
(38, 2, '3UR15112MS3082407', '6ae30070', 26, 1),
(39, 2, '1FN608994T487824W', '94f8878b', 27, 1),
(40, 2, '1E011129090399005', 'e220a9b5', 27, 1),
(41, 3, '46C53871BU713721J', '3ea86b1f', 27, 1),
(42, 2, '5T1729807U540652F', 'ea731b46', 27, 1),
(43, 2, '45P34823AF876833L', '5e46813d', 27, 1),
(44, 2, '7GG25956PJ836004J', '69822080', 27, 1),
(45, 2, '58D28872GF0665609', 'e085c9c3', 27, 1),
(46, 2, '3TG54424MJ200820P', 'fd2ab8b3', 28, 1),
(47, 3, '89Y053223M803703G', '49a7ab57', 28, 1),
(48, 3, '6EU531191J520912A', 'f6c867bc', 29, 1),
(49, 2, '07G84068K4237574V', 'f5c32333', 30, 1),
(50, 2, '7LJ12792MW659521A', 'a1c07b7f', 30, 1),
(51, 3, '20377663AS283294E', '498ec333', 30, 1),
(52, 2, '41U43434MC6387416', 'c2dab6d1', 31, 1),
(53, 2, '62J06122KJ9506157', '72aa628a', 20, 1),
(54, 3, '4MH830555G937873S', 'c82f37fd', 32, 1),
(55, 2, '51J68673MS7206948', '669fd51c', 33, 1),
(56, 3, '3YY88150H51063625', 'f579dbc3', 34, 1),
(57, 2, '3J077182UU175934R', '1e17aeac', 35, 1),
(58, 2, '2BV12483AF647683R', 'd9824c52', 36, 1),
(59, 3, '7VU28624RT418803N', 'a9b222da', 37, 1),
(60, 2, '3NJ7687510779514A', '4b276e1f', 38, 1),
(61, 3, '9YS27679SC5405253', '4d6f5351', 39, 1),
(67, 1, '', '19f2e169', 41, 1),
(68, 1, '', '72d916bc', 42, 1),
(69, 2, '2VV41345XL924454V', '62aca2ee', 43, 1),
(71, 1, '', '4690dc8d', 51, 1),
(72, 1, '', 'db1a53f0', 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `token` varchar(13) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`) VALUES
(11, ' Fran', 'Compardor', 'comprador@windup.es', '$2y$10$L6Qt0lS2tehsi9DhU2Xqg.6aDdvWZTPmWSbMQeOjjHa4hGHQXW5IK', 1, '6664cf4fc98ba', 0),
(12, ' Fran', 'Admin', 'admin@windup.es', '$2y$10$L6Qt0lS2tehsi9DhU2Xqg.6aDdvWZTPmWSbMQeOjjHa4hGHQXW5IK', 1, '6664cf4fc98ba', 1),
(13, ' Fran', 'Herrera', 'franrubio@windup.es', '$2y$10$Fpj/cToq57qKmaZ.JdCe2O4Wjkk7xJYUqDton2I41ooG4WWjVC3kq', 0, '6676ee49ceba9', 0),
(14, ' usuario2', 'usuario2', 'usuario2@windup.es', '$2y$10$rzdaHLc5AoJp7h/7KyTh0.LGY6oM0esSS9ZSzfbF0MS4psD.EoDjG', 1, '6676ee49ceba9', 0),
(15, ' usuario3', 'usuario3', 'usuario3@windup.es', '$2y$10$/Q6YgzGUUqaMeNpACxaqxeXZbcelsCh2/4IF2lcB.qh5Hw1oldnP2', 1, '6676ee49ceba9', 0),
(16, ' usuario4', 'usuario4', 'usuario4@windup.es', '$2y$10$Rr2xnChms2kr1wMYLRDgiulihwarIQYsENjROP/6BO2fGj/hFncSu', 1, '', 1),
(17, ' usuario5', 'usuario5', 'usuario5@windup.es', '$2y$10$f3leHlU/MfE8X5/U446iQeQTC4qLqmG9BhnNIQKKoFKgKYklIOIX6', 1, '', 1),
(18, ' usuario9', 'usuario9', 'usuario9@windup.es', '$2y$10$FKOwVaIblzIGGeSSNGraEuXegBrHmprSFWS.7TtfXrnvkniJE12T6', 0, '667ec6fec5031', 0),
(19, ' usuario10', 'usuario10', 'usuario10@windup.es', '$2y$10$1Zs8PTz1anulNE4yX.mN8.ZQj1wO7aUBox.Mx1S7LpEKxaIoPtfyq', 1, '', 0),
(20, ' usuario11', 'usuario11', 'usuario11@windup.es', '$2y$10$YpfLda/ZbnqyhLzLSnwD1eXqXij9WyPMDzsiKZ48I.Ihg39ra8Vk.', 1, '', 0),
(21, ' usuario12', 'usuario12', 'usuario12@windup.es', '$2y$10$Piywitko8Ybe9mPqHnmWzerM9tABubSfCZJmMy/RpmWg1m02EoEsy', 1, '', 0),
(22, ' usuario13', 'usuario13', 'usuario13@windup.es', '$2y$10$NjJ1TBgy2MTdCaxDRmiUweQpR/U32I7cq8sotRFhKBdW4l6bd2CaK', 1, '', 0),
(23, ' usuario14', 'usuario14', 'usuario14@windup.es', '$2y$10$pFefmm/6kjbRyhwCSGe/teUSXhHl0lw9vhJTNzqeFylCAXtzNZ.NS', 1, '', 0),
(24, ' usuario20', 'usuario20', 'usuario20@windup.es', '$2y$10$l1T.I2GogQyA/PiWBlDxPOD7oU/4joy56q5C8l557.khWb2GM0V2W', 1, '', 0),
(25, ' usuario15', 'usuario15', 'usuario15@windup.es', '$2y$10$BRCBm6ZfvdJgaMxH0zcag.lwJnzw2U/otK0Z0zkccD2gBMEjae94K', 1, '', 0),
(26, ' usuario22', 'usuario22', 'usuario22@windup.es', '$2y$10$oMhV6hQxnKlpkW6tOQu/2.sw7D01e54hzA3464RfVMQOrZ5Uc41w6', 1, '', 0),
(27, ' user1', 'user1', 'user1@windup.es', '$2y$10$r/w7Jbna26IWxP6.51v1BeWMXR3DqLyXVX2Qab.ZDCueruE6JKGZi', 1, '', 0),
(28, ' user2', 'user2', 'user2@windup.es', '$2y$10$P5nwTIHRKqxzbPLIRVH.Fe0.MZOgxrY/UJqfl1Tv7.QU4rDOFV43y', 1, '', 0),
(29, ' user3', 'user3', 'user3@windup.es', '$2y$10$P658fOAwfxzUhYdr.FfuyelRsP6Cx/muy59ttBWUEb3V7EEOzk5KS', 1, '', 0),
(30, ' user5', 'user5', 'user5@windup.es', '$2y$10$bsjXRnf5XwtDe5aKKdGNMe0z47NOnTs0e02NhONp3zCCnfC9UbfrC', 1, '', 0),
(31, ' user23', 'user23', 'user23@windup.es', '$2y$10$0ZCQ9iSuUkFRo7nrIj8O5.2D.Gh64BGalAaSwjwjYBLPTgXXS7zZK', 1, '', 0),
(32, ' user30', 'user30', 'user30@windup.es', '$2y$10$9Tz3jp2n0DwXf/BlFDm5MuOhaeQxLSViCva3hwSWGuvzBN.iw/4ga', 1, '', 0),
(33, ' usuario31', 'usuario31', 'usuario31@windup.es', '$2y$10$fjAQsQGKA5QWY3HwUvrMIOIHgHxMe83UAg7QIrudkbgeRjlzZtZ.O', 1, '', 0),
(34, ' usuario32', 'usuario32', 'usuario32@windup.es', '$2y$10$KpyjKpPE2FKoZF5oGX6qSuvb//qfHbhU/5E3779y/Gu5u4wu6L9uy', 1, '', 0),
(35, ' user33', 'user33', 'user33@windup.es', '$2y$10$HUeLgGdKiGFdZMJCfrjhK.XZVH4D263LLPCq7XPxE/vcnY66XbtDu', 1, '', 0),
(36, ' user34', 'user34', 'user34@windup.es', '$2y$10$LSQCURlqWKRoYSYhXm9YrOpHQRr6CL.kpWNtSEEkTlbZ0hp.6tryW', 1, '', 0),
(37, ' u001', 'u001', 'u001@windup.es', '$2y$10$JxPIbQkD7o3DOIVNZVYab.KlFzYFq3ZaflGl.kW1vo8HFU3JQ9ogi', 1, '', 0),
(38, ' u002', 'u002', 'u002@windup.es', '$2y$10$3L29M4yJEX0ic7a9gEiu/OAvVYoQV4QO.NegiItSb06gKLvI2RJ6O', 1, '', 0),
(39, ' u004', 'u004', 'u004@windup.es', '$2y$10$3UVxtx4YhihdSsCyOqKNHeZPAhqc5rHngK8R7mfJ1v8LiGSRAKa0u', 1, '', 0),
(40, ' u005', 'u005', 'u005@windup.es', '$2y$10$88Bt.xH/su7XBZHIDa.RyORqwag8rhywEqP/.AX6MeQCt20L8iNSq', 1, '', 0),
(41, ' user40', 'user40', 'user40@windup.es', '$2y$10$3xBA4O8vfIgsiYamOu38y.2mHI9fwcsgBjyvj/VytvuX2W61t7.Qy', 1, '', 0),
(42, ' usuario50', 'usuario50', 'usuario50@windup.es', '$2y$10$scwPFGRGfUhRaS/eqPwNVeyqxkh8E/jNT4m6LUFiguxirvGYZLGUS', 1, '', 0),
(43, ' usuario51', 'usuario51', 'usuario51@windup.es', '$2y$10$Lw4quGwWQYcuwgAhNoIg..iBl34ngLk1kAdxnw4jkZxxw/t4i.79y', 1, '', 0),
(45, ' Prueba correo', 'Pruebita', 'ukb41816@doolk.com', '$2y$10$uYy1Rd2zquo133n7Q5wYEehj1XWaDSxfp3UcNCCgiewNk07q3BhZK', 0, '668c1d99561b3', 0),
(46, ' Francisco', 'Rubio Herrera', 'fran1993_balerma@hotmail.com', '$2y$10$PqTTaZYDx0/yr/7zJU4L3uzeDeJZ1V0uRbTPE9QmXsHCzmhnVs7zW', 0, '668c1dfeebe15', 0),
(47, ' asdfasdf', 'asdfasdfasdf', 'gixdiva8181@atebin.com', '$2y$10$IKcXziqKi1VKM75ZPRfVOuV57362Nuu1NKjRJlglOQHkROwmlJLii', 0, '668c1ed513ff8', 0),
(48, ' asdfasdf', 'asdf asdfasdf', 'bimdlicopsi@gufum.com', '$2y$10$m5RQYHhq1mCn2yZ7.4R5Wu2kPwY6pgL.cf2XT9YhyYTmPzLVE/ZsK', 0, '668c20a64667a', 0),
(49, ' asdfasdf', 'asdf asdfasdf', 'bihottassauni-442d9@yopmail.com', '$2y$10$Cz1QUjwOVkPhrPDDVWtF6ujygvQ9cRw1rB3/GQxQNpWr85IfwVT4S', 0, '668c229a8c6bf', 0),
(50, ' nombre7', 'apellido7', 'franrubiodev@euriv.com', '$2y$10$8mYrkIHecPmmSpNTzEaU0.JS12ks5DStbV54M9Z40IAsGNUZ9apnC', 0, '668c57137c43c', 0),
(51, ' uuser001', 'uuser001', 'uuser001@windup.es', '$2y$10$EOlzBKC0Q6mmgIPYDw9YouKVnfoUQzs.1NTPeqS0AJRb/QGeAo5bm', 1, '668d53295b78b', 1),
(52, ' uuser002', 'uuser002', 'uuser002@windup.es', '$2y$10$/V7S6NUXzeFwwDhfhntopuwcvMYTZ4L8QAptFJiU0rKsA.J/8Imbe', 0, '668d541f7cf8b', 0),
(53, ' uuser004', 'uuser004', 'uuser004@windup.es', '$2y$10$S1haaruAE4K2NUBtumzdnukQ3UdYcxEY9jWLz1dO0JlDhrMF1QDHi', 0, '668d5c823fab6', 0),
(54, ' ousuario2', 'ousuario2', 'ousuario2@windup.es', '$2y$10$wdGbzWxJ885rpDlN39X.E.FAFxy4DAD/lFzu.ibCa60L.i0Jpse2O', 0, '668d5de0e8d71', 0),
(55, ' asdfasdf', 'asdfasdf', 'gixiva8181@atebin.com', '$2y$10$2KyNUKb1NkSi0.dy3YAawuAZbDHwYjvD7uOjuCwJKL6c6mQYR0DnG', 1, '', 0),
(56, ' administrador', 'administrador@1234!', 'dotapol254@bsidesmn.com', '$2y$10$J7BFad3Pxx5nYX.slOxaGuLzvjqVD5C93PaJF2Mk3Xo/Td/nBR1h.', 1, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eventos_categorias_idx` (`categoria_id`),
  ADD KEY `fk_eventos_dias1_idx` (`dia_id`),
  ADD KEY `fk_eventos_horas1_idx` (`hora_id`),
  ADD KEY `fk_eventos_ponentes1_idx` (`ponente_id`);

--
-- Indexes for table `eventos_registros`
--
ALTER TABLE `eventos_registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `registro_id` (`registro_id`);

--
-- Indexes for table `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ponentes`
--
ALTER TABLE `ponentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuario_id`),
  ADD KEY `pack_id` (`pack_id`),
  ADD KEY `regalo_id` (`regalo_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `eventos_registros`
--
ALTER TABLE `eventos_registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `horas`
--
ALTER TABLE `horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ponentes`
--
ALTER TABLE `ponentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_eventos_dias1` FOREIGN KEY (`dia_id`) REFERENCES `dias` (`id`),
  ADD CONSTRAINT `fk_eventos_horas1` FOREIGN KEY (`hora_id`) REFERENCES `horas` (`id`),
  ADD CONSTRAINT `fk_eventos_ponentes1` FOREIGN KEY (`ponente_id`) REFERENCES `ponentes` (`id`);

--
-- Constraints for table `eventos_registros`
--
ALTER TABLE `eventos_registros`
  ADD CONSTRAINT `eventos_registros_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`),
  ADD CONSTRAINT `eventos_registros_ibfk_2` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`);

--
-- Constraints for table `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`id`),
  ADD CONSTRAINT `registros_ibfk_3` FOREIGN KEY (`regalo_id`) REFERENCES `regalos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
