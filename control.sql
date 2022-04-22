-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2022 a las 00:09:03
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m1_solicitudes`
--

CREATE TABLE `m1_solicitudes` (
  `id` int(11) NOT NULL,
  `0_solicitud` varchar(255) NOT NULL,
  `0_persona` varchar(255) NOT NULL,
  `0_fecha` date NOT NULL,
  `0_empresa` varchar(255) NOT NULL,
  `0_contacto` varchar(255) NOT NULL,
  `0_direccion` varchar(255) NOT NULL,
  `0_telefono` varchar(255) NOT NULL,
  `0_correo` varchar(255) NOT NULL,
  `0_area` varchar(255) NOT NULL,
  `0_movil` varchar(255) NOT NULL,
  `1_marca` varchar(255) NOT NULL,
  `1_nombre` varchar(255) NOT NULL,
  `1_modelo` varchar(255) NOT NULL,
  `1_descripcion` varchar(255) NOT NULL,
  `1_cantidad` varchar(255) NOT NULL,
  `1_partes` varchar(255) NOT NULL,
  `2_prioridad` varchar(255) NOT NULL,
  `2_motivo` varchar(255) NOT NULL,
  `2_marca` varchar(255) NOT NULL,
  `2_modelo` varchar(255) NOT NULL,
  `2_descripcion` varchar(255) NOT NULL,
  `2_falla` varchar(255) NOT NULL,
  `3_descripcion` varchar(255) NOT NULL,
  `3_cita` date NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m1_solicitudes`
--

INSERT INTO `m1_solicitudes` (`id`, `0_solicitud`, `0_persona`, `0_fecha`, `0_empresa`, `0_contacto`, `0_direccion`, `0_telefono`, `0_correo`, `0_area`, `0_movil`, `1_marca`, `1_nombre`, `1_modelo`, `1_descripcion`, `1_cantidad`, `1_partes`, `2_prioridad`, `2_motivo`, `2_marca`, `2_modelo`, `2_descripcion`, `2_falla`, `3_descripcion`, `3_cita`, `id_usuario`, `nombre_usuario`) VALUES
(103, 'Personal', 'Fisica', '2022-04-04', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Mitsubichi', '1A-05CBL-1', '1A-05CBL-1', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '7', 'Adriana Hernandez'),
(104, 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Yaskawa', '1A-05CBL-1', 'aa', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '7', 'Adriana Hernandez'),
(105, 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Yaskawa', '1A-05LCBL-1', 'asd', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '7', 'Adriana Hernandez'),
(106, 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Omron', '1A-05CBL-1', 'asdsa', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '7', 'Adriana Hernandez'),
(107, 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Mitsubichi', 'nose', 'a', '1', 'qwerty', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '7', 'Adriana Hernandez'),
(108, 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Yaskawa', '1A-05CBL-', 'q', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '7', 'Adriana Hernandez'),
(109, 'Personal', 'Fisica', '2022-04-07', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', 'Linea', 'Yaskawa', '1A-05CBL-1', 'asd', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '1', 'Administración'),
(110, 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', 'Ventas', '5551012290322', 'Linea', 'Yaskawa', '1A-05CBL-1', '1A-05CBL-1', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '1', 'Administración'),
(111, 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', 'Ventas', '5551012290322', 'Linea', 'Mitsubichi', '1A-05CBL-1', 'bb', '1', 'Sin Número de partes', 'Sin información', 'Sin información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información', '0000-00-00', '1', 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m2_proveedores`
--

CREATE TABLE `m2_proveedores` (
  `id` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `c_postal` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m2_proveedores`
--

INSERT INTO `m2_proveedores` (`id`, `empresa`, `nombre`, `cargo`, `direccion`, `c_postal`, `ciudad`, `pais`, `telefono`, `correo`) VALUES
(3, 'IACSA', 'Edgar', 'Sistemas', '44 Poniente #502 esq. blvd. 5 de Mayo Col. Santa María, ', ' C.P. 72080', 'Puebla, Puebla', 'México', '(222) 2-20-54-44', 'edgar.sistemas.iacsa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m3_clientes`
--

CREATE TABLE `m3_clientes` (
  `id` int(11) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `movil` varchar(255) NOT NULL,
  `codigo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m3_clientes`
--

INSERT INTO `m3_clientes` (`id`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `area`, `movil`, `codigo`) VALUES
(3, 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Ventas', '1423280322', '220328-113550'),
(8, 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', 'Ventas', '5551012290322', '220329-101245'),
(9, 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'Compras', 'Sin Movil', '220329-140623'),
(10, 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'Ventas', 'Movil', '220330-92922');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m3_clientes_productos`
--

CREATE TABLE `m3_clientes_productos` (
  `id` int(11) NOT NULL,
  `codigo_cliente` varchar(255) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `partes` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m3_clientes_productos`
--

INSERT INTO `m3_clientes_productos` (`id`, `codigo_cliente`, `folio`, `marca`, `nombre`, `modelo`, `partes`, `descripcion`) VALUES
(20, '220328-113550', 'P-220404-155239', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M'),
(21, '220328-113550', 'P-220405-154503', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M'),
(22, '220328-113550', 'P-220405-164049', 'Linea', 'MITSUBICHI', '1A-05LCBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M'),
(23, '220328-113550', 'P-220406-134940', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M'),
(24, '220328-113550', 'P-220407-165457', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m4_almacen`
--

CREATE TABLE `m4_almacen` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `num_partes` varchar(255) NOT NULL,
  `npc` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `grupo` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `capacidad` varchar(255) NOT NULL,
  `alimentacion` varchar(255) NOT NULL,
  `precio_lista` float NOT NULL,
  `precio_iacsa` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_min` int(11) NOT NULL,
  `tiempo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m4_almacen`
--

INSERT INTO `m4_almacen` (`id`, `marca`, `num_partes`, `npc`, `descripcion`, `modelo`, `grupo`, `estatus`, `capacidad`, `alimentacion`, `precio_lista`, `precio_iacsa`, `cantidad`, `cantidad_min`, `tiempo`) VALUES
(2, 'MITSUBICHI', 'No existe', 'N/A', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', '1A-05CBL-1', 'Robots', 'Stock', 'N/A', 'N/A', 1800, 1280.64, 10, 3, '2 semanas'),
(3, 'MITSUBICHI', 'n/a', 'N/A', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', '1A-05LCBL-1', 'Robots', 'Stock', 'N/A', 'N/A', 3910, 3910, 9, 1, '1 Semana'),
(4, 'MITSUBICHI', 'No existe', 'N/A', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10M', '1A-10CBL-1', 'Robots', 'Stock', 'N/A', 'N/A', 1940, 1940, 20, 1, 'Inmediato'),
(5, 'MITSUBICHI', 'QWERTY', 'N/A', 'CABLE EXT SET LOW FLEX 10M', '1A-10CBL-N', 'Robots', 'Stock', 'N/A', 'N/A', 4400, 4400, 5, 3, '2 Dias'),
(6, 'MITSUBICHI', 'No existe', 'N/A', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 10M', '1A-10LCBL-1', 'Robots', 'Stock', 'N/A', 'N/A', 5790, 5790, 10, 2, '1 Mes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m4_almacen2`
--

CREATE TABLE `m4_almacen2` (
  `id` int(11) NOT NULL,
  `posicion` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `num_partes` varchar(255) NOT NULL,
  `no_serie` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `no_pedimiento_aduanal` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_max` int(11) NOT NULL,
  `cantidad_min` int(11) NOT NULL,
  `punto_reorden` varchar(255) NOT NULL,
  `precio_iacsa` float NOT NULL,
  `precio_lista` float NOT NULL,
  `fecha_solicitud` varchar(255) NOT NULL,
  `fecha_arribo` varchar(255) NOT NULL,
  `tiempo` varchar(255) NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m4_almacen2`
--

INSERT INTO `m4_almacen2` (`id`, `posicion`, `marca`, `modelo`, `num_partes`, `no_serie`, `descripcion`, `no_pedimiento_aduanal`, `cantidad`, `cantidad_max`, `cantidad_min`, `punto_reorden`, `precio_iacsa`, `precio_lista`, `fecha_solicitud`, `fecha_arribo`, `tiempo`, `unidad`, `proveedor`, `observaciones`, `estatus`) VALUES
(1, '1-1', 'MITSUBICHI', '1A-05CBL-1', 'NO EXISTE', '123456', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', '123456', 49, 15, 3, '5', 1280, 1800, '0000/00/00', '0000/00/00', '2 Semanas', 'Pieza', 'MITSUBICHI', 'Sin Observaciones', 'Stock'),
(2, '1-2', 'MITSUBICHI', '1A-05LCBL-1', 'NO EXISTE', '123456', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', '123456', 107, 15, 3, '5', 3910, 3910, '0000/00/00', '0000/00/00', '1 Semana', 'Pieza', 'IACSA', 'Sin Observaciones', 'Stock'),
(3, '1-3', 'MITSUBICHI', '1A-10CBL-1', 'NO EXISTE', '123456', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10 M', '123456', 119, 25, 5, '10', 1940, 1940, '0000/00/00', '0000/00/00', 'Inmediato', 'Pieza', 'IACSA', 'Sin observaciones', 'Stock'),
(4, '1-4', 'MITSUBICHI', '1A-10CBL-N', 'NO EXISTE', '123456', 'CABLE EXT SET LOW FLEX 10M', '123456', 15, 20, 2, '10', 4400, 4400, '0000/00/00', '0000/00/00', '3 Semanas', 'Pieza', 'IACSA', 'Sin Observaciones', 'Stock'),
(5, '1-5', 'MITSUBICHI', '1A-10LCBL-1', 'QWERTY', '123456', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 10M', '123456', 15045, 60, 10, '20', 5790, 5790, '0000/00/00', '0000/00/00', '1 Mes', 'Pieza', 'IACSA', 'Sin Observaciones', 'Stock'),
(9, '2-1', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 0, 1, 1, 'abc', 100, 100, 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'Stock'),
(10, 'QUE', 'QWE', 'QWE', 'QWE', 'QUE', 'QUE', 'QUE', 0, 1, 1, '1', 1, 1, 'QUE', 'QUE', 'QUE', 'QUE', 'QUE', 'QUE', 'Stock'),
(11, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0, 1, 1, '1', 1, 1, '1', '1', '1', '1', '1', '1', 'Stock'),
(12, 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 0, 1, 1, '1', 10, 10, 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'Stock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m4_almacen_entradas`
--

CREATE TABLE `m4_almacen_entradas` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `partes` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `inf` varchar(255) NOT NULL,
  `id_producto` varchar(255) NOT NULL,
  `doc1` text NOT NULL,
  `doc2` text NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m4_almacen_entradas`
--

INSERT INTO `m4_almacen_entradas` (`id`, `folio`, `marca`, `nombre`, `modelo`, `descripcion`, `cantidad`, `partes`, `estatus`, `inf`, `id_producto`, `doc1`, `doc2`, `id_user`, `name_user`) VALUES
(22, 'P-220406-134940', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 100, 'Sin Número de partes', 'ENTREGADO', '', '1', 'P-220406-134940entradacotizacionFICHA DE DEPÓSITO.pdf', 'P-220406-134940entradafacturaORDEN DE COMPRA.pdf', '7', 'Adriana Hernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m4_almacen_entradas_vs`
--

CREATE TABLE `m4_almacen_entradas_vs` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `inf` text NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `doc1` text NOT NULL,
  `doc2` text NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m4_almacen_entradas_vs`
--

INSERT INTO `m4_almacen_entradas_vs` (`id`, `folio`, `cantidad`, `inf`, `estatus`, `doc1`, `doc2`, `id_user`, `name_user`) VALUES
(8, '2220404105653', 100, '1A-10CBL-1', 'ENTREGADO', '2220404105653entradacotizaplusCOTIZACION.pdf', '2220404105653entradafacturaplusORDEN DE COMPRA.pdf', '7', 'Adriana Hernandez'),
(9, '2220404105653', 100, 'Modelo', 'ENTREGADO', '2220404105653entradacotizaplusCOTIZACION.pdf', '2220404105653entradafacturaplusORDEN DE COMPRA.pdf', '7', 'Adriana Hernandez'),
(10, '2220404110947', 15000, '1A-10LCBL-1', 'ENTREGADO', '2220404110947entradacotizaplusFICHA DE DEPÓSITO.pdf', '2220404110947entradafacturaplusORDEN DE COMPRA.pdf', '7', 'Adriana Hernandez'),
(11, '2220405113857', 1, 'abc', 'ENTREGADO', '2220405113857entradacotizaplusCOTIZACION.pdf', '2220405113857entradafacturaplusFICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(12, '2220405115118', 1, 'QWE', 'ENTREGADO', '2220405115118entradacotizaplusFICHA DE DEPÓSITO.pdf', '2220405115118entradafacturaplusCOTIZACION.pdf', '7', 'Adriana Hernandez'),
(13, '2220405155528', 1, 'a', 'ENTREGADO', '2220405155528entradacotizaplusCOTIZACION.pdf', '2220405155528entradafacturaplusCOTIZACION.pdf', '7', 'Adriana Hernandez'),
(14, '2220405164720', 300, '1A-05LCBL-1', 'ENTREGADO', '2220405164720entradacotizaplusFICHA DE DEPÓSITO.pdf', '2220405164720entradafacturaplusFICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(15, '2220405164720', 1, 'zxc', 'ENTREGADO', '2220405164720entradacotizaplusFICHA DE DEPÓSITO.pdf', '2220405164720entradafacturaplusFICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m4_almacen_mjs`
--

CREATE TABLE `m4_almacen_mjs` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `1_marca` varchar(255) NOT NULL,
  `1_nombre` varchar(255) NOT NULL,
  `1_modelo` varchar(255) NOT NULL,
  `1_partes` varchar(255) NOT NULL,
  `1_descripcion` varchar(255) NOT NULL,
  `1_cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `f` text NOT NULL,
  `ne` text NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m4_almacen_mjs`
--

INSERT INTO `m4_almacen_mjs` (`id`, `folio`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `1_marca`, `1_nombre`, `1_modelo`, `1_partes`, `1_descripcion`, `1_cantidad`, `precio`, `f`, `ne`, `lugar`, `estatus`, `id_user`, `name_user`) VALUES
(33, 'P-220404-155239', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 1800, 'P-220404-155239salida1ORDEN DE COMPRA.pdf', '', '1', 'CERRADO', '7', 'Adriana Hernandez'),
(34, 'P-220405-154503', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 1800, 'P-220405-154503salida1COTIZACION.pdf', '', '1', 'CERRADO', '7', 'Adriana Hernandez'),
(35, 'P-220405-164049', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05LCBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 3910, 'P-220405-164049salida1COTIZACION.pdf', '', '1', 'CERRADO', '7', 'Adriana Hernandez'),
(36, 'P-220406-134940', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 100, 1800, 'P-220406-134940salida1FICHA DE DEPÓSITO.pdf', '', '1', 'CERRADO', '6', 'Edgar Pérez Alvarado'),
(37, 'P-220407-165457', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 1800, 'P-220407-165457salida1FICHA DE DEPÓSITO.pdf', '', '1', 'CERRADO', '1', 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m4_almacen_salidas`
--

CREATE TABLE `m4_almacen_salidas` (
  `id` int(11) NOT NULL,
  `codigo_cliente` text NOT NULL,
  `folio` text NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` text NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `partes` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `doc1` text NOT NULL,
  `doc2` text NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m4_almacen_salidas`
--

INSERT INTO `m4_almacen_salidas` (`id`, `codigo_cliente`, `folio`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `marca`, `modelo`, `descripcion`, `cantidad`, `partes`, `precio`, `estatus`, `doc1`, `doc2`, `id_user`, `name_user`) VALUES
(3, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, 'ENTREGADO', '', '2220405111846salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(4, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, 'ENTREGADO', '', '2220405111846salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(5, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-10CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10 M', 1, 'NO EXISTE', 1940, 'ENTREGADO', '', '2220405111846salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(6, '220328-113550', '2220405113857', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'abc', 'abc', 'abc', 1, 'abc', 100, 'ENTREGADO', '2220405113857salida11COTIZACION.pdf', '', '7', 'Adriana Hernandez'),
(7, '220329-140623', '2220405115118', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, 'ENTREGADO', '', '2220405115118salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(8, '220329-140623', '2220405115118', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'QWE', 'QWE', 'QWE', 1, 'QWE', 10, 'ENTREGADO', '', '2220405115118salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(9, '220328-113550', '2220405155528', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, 'ENTREGADO', '2220405155528salida11FICHA DE DEPÓSITO.pdf', '', '7', 'Adriana Hernandez'),
(10, '220328-113550', '2220405155528', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'a', 'a', 'a', 1, 'a', 0, 'ENTREGADO', '2220405155528salida11FICHA DE DEPÓSITO.pdf', '', '7', 'Adriana Hernandez'),
(11, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, 'ENTREGADO', '', '2220405164720salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(12, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 300, 'NO EXISTE', 3910, 'ENTREGADO', '', '2220405164720salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez'),
(13, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'zxc', 'zxc', 'zxc', 1, '12', 10, 'ENTREGADO', '', '2220405164720salida22FICHA DE DEPÓSITO.pdf', '7', 'Adriana Hernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m5_cotizacion`
--

CREATE TABLE `m5_cotizacion` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `solicitud` varchar(255) NOT NULL,
  `persona` varchar(255) NOT NULL,
  `fecha_1` date NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `1_marca` varchar(255) NOT NULL,
  `1_nombre` varchar(255) NOT NULL,
  `1_modelo` varchar(255) NOT NULL,
  `1_descripcion` varchar(255) NOT NULL,
  `1_cantidad` int(11) NOT NULL,
  `1_partes` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `fecha_2` date NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `inf` varchar(255) NOT NULL,
  `entrega` varchar(255) NOT NULL,
  `validado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m5_cotizacion`
--

INSERT INTO `m5_cotizacion` (`id`, `folio`, `solicitud`, `persona`, `fecha_1`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `id_user`, `name_user`, `1_marca`, `1_nombre`, `1_modelo`, `1_descripcion`, `1_cantidad`, `1_partes`, `precio`, `fecha_2`, `estatus`, `inf`, `entrega`, `validado`) VALUES
(55, 'P-220404-155239', 'Personal', 'Fisica', '2022-04-04', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-04', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo'),
(56, 'P-220405-154503', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-05', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo'),
(57, 'P-220405-164049', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'Sin Número de partes', '3910', '2022-04-05', 'EMITIDA', 'N/A', '1 Semana', 'Modelo'),
(58, 'P-220405-175455', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-05', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo'),
(59, 'P-220406-94528', 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-10LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 10M', 1, 'qwerty', '5790', '2022-04-06', 'EMITIDA', 'N/A', '1 Mes', 'Partes'),
(60, 'P-220406-134940', 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-06', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo'),
(61, 'P-220407-165457', 'Personal', 'Fisica', '2022-04-07', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '1', 'Administración', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-07', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo'),
(62, 'P-220408-94807', 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', '1', 'Administración', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-08', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo'),
(63, 'P-220408-94953', 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', '1', 'Administración', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '2022-04-08', 'EMITIDA', 'N/A', '2 Semanas', 'Modelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m5_cotizaciones`
--

CREATE TABLE `m5_cotizaciones` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `solicitud` varchar(255) NOT NULL,
  `persona` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `inf` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `1_marca` varchar(255) NOT NULL,
  `1_nombre` varchar(255) NOT NULL,
  `1_modelo` varchar(255) NOT NULL,
  `1_descripcion` varchar(255) NOT NULL,
  `1_cantidad` int(11) NOT NULL,
  `1_partes` varchar(255) NOT NULL,
  `validado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m5_cotizaciones`
--

INSERT INTO `m5_cotizaciones` (`id`, `folio`, `solicitud`, `persona`, `fecha`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `inf`, `estatus`, `observaciones`, `id_user`, `name_user`, `1_marca`, `1_nombre`, `1_modelo`, `1_descripcion`, `1_cantidad`, `1_partes`, `validado`) VALUES
(72, 'P-220404-155239', 'Personal', 'Fisica', '2022-04-04', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '7', 'Adriana Hernandez', 'Linea', 'Mitsubichi', '1A-05CBL-1', '1A-05CBL-1', 1, 'Sin Número de partes', 'NADA'),
(73, 'P-220405-154503', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '7', 'Adriana Hernandez', 'Linea', 'Yaskawa', '1A-05CBL-1', 'aa', 1, 'Sin Número de partes', 'NADA'),
(74, 'P-220405-164049', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '7', 'Adriana Hernandez', 'Linea', 'Yaskawa', '1A-05LCBL-1', 'asd', 1, 'Sin Número de partes', 'NADA'),
(75, 'P-220405-175455', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '7', 'Adriana Hernandez', 'Linea', 'Omron', '1A-05CBL-1', 'asdsa', 1, 'Sin Número de partes', 'NADA'),
(76, 'P-220406-94528', 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '7', 'Adriana Hernandez', 'Linea', 'Mitsubichi', 'nose', 'a', 1, 'qwerty', 'NADA'),
(77, 'P-220406-134940', 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '7', 'Adriana Hernandez', 'Linea', 'Yaskawa', '1A-05CBL-1', 'q', 1, 'Sin Número de partes', 'NADA'),
(78, 'P-220407-165457', 'Personal', 'Fisica', '2022-04-07', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'N/A', '3', 'N/A', '1', 'Administración', 'Linea', 'Yaskawa', '1A-05CBL-1', 'asd', 1, 'Sin Número de partes', 'NADA'),
(79, 'P-220408-94807', 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', 'N/A', '3', 'N/A', '1', 'Administración', 'Linea', 'Yaskawa', '1A-05CBL-1', '1A-05CBL-1', 1, 'Sin Número de partes', 'NADA'),
(80, 'P-220408-94953', 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', 'N/A', '3', 'N/A', '1', 'Administración', 'Linea', 'Mitsubichi', '1A-05CBL-1', 'bb', 1, 'Sin Número de partes', 'NADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m6_compras_mjs`
--

CREATE TABLE `m6_compras_mjs` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `mjs1` text NOT NULL,
  `mjs2` text NOT NULL,
  `fecha` date NOT NULL,
  `user1` varchar(255) NOT NULL,
  `user2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m6_compras_mjs`
--

INSERT INTO `m6_compras_mjs` (`id`, `folio`, `mjs1`, `mjs2`, `fecha`, `user1`, `user2`) VALUES
(49, '2220404105653', 'Modelo - 1A-10CBL-1   Cantidad - 100\r\n\r\n\r\nModelo - Modelo Cantidad 100', '10 dias', '2022-04-04', 'Adriana Hernandez', 'Adriana Hernandez'),
(50, '2220404110947', '1A-10LCBL-1 15000', 'ok', '2022-04-04', 'Adriana Hernandez', 'Adriana Hernandez'),
(51, '2220405113857', 'abc', 'abc', '2022-04-05', 'Adriana Hernandez', 'Adriana Hernandez'),
(52, '2220405115118', 'QWE', 'QWE', '2022-04-05', 'Adriana Hernandez', 'Adriana Hernandez'),
(53, '2220405155528', 'a', 'a', '2022-04-05', 'Adriana Hernandez', 'Adriana Hernandez'),
(54, '2220405164720', '1A-05LCBL-1 cantidad 300\r\n\r\nzxc 1\r\n', '1A-05LCBL-1 cantidad 300 zxc 1', '2022-04-05', 'Adriana Hernandez', 'Adriana Hernandez'),
(55, '2220406123750', '1', '1', '2022-04-06', 'Adriana Hernandez', 'Adriana Hernandez'),
(56, '2220408143033', 'asdasd', 'asd', '2022-04-08', 'Administración', 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m6_compras_v`
--

CREATE TABLE `m6_compras_v` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num_partes` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `inf` varchar(255) NOT NULL,
  `id_producto_almacen` varchar(255) NOT NULL,
  `doc1` varchar(255) NOT NULL,
  `doc2` varchar(255) NOT NULL,
  `doc3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m6_compras_v`
--

INSERT INTO `m6_compras_v` (`id`, `folio`, `marca`, `nombre`, `modelo`, `descripcion`, `cantidad`, `num_partes`, `estatus`, `inf`, `id_producto_almacen`, `doc1`, `doc2`, `doc3`) VALUES
(21, 'P-220406-134940', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 100, 'Sin Número de partes', 'LISTO', '1A-05CBL-1', '1', 'P-220406-1349401FICHA DE DEPÓSITO.pdf', 'P-220406-1349402ORDEN DE COMPRA.pdf', 'P-220406-1349403COTIZACION.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m6_compras_vs`
--

CREATE TABLE `m6_compras_vs` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `inf` text NOT NULL,
  `doc1` varchar(255) NOT NULL,
  `doc2` varchar(255) NOT NULL,
  `doc3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m6_compras_vs`
--

INSERT INTO `m6_compras_vs` (`id`, `folio`, `cantidad`, `inf`, `doc1`, `doc2`, `doc3`) VALUES
(5, '2220404105653', '100', '1A-10CBL-1', '222040410565311-COTIZACION.pdf', '222040410565322-ORDEN DE COMPRA.pdf', '222040410565333-FICHA DE DEPÓSITO.pdf'),
(6, '2220404105653', '100', 'Modelo', '222040410565311-COTIZACION.pdf', '222040410565322-ORDEN DE COMPRA.pdf', '222040410565333-FICHA DE DEPÓSITO.pdf'),
(7, '2220404110947', '15000', '1A-10LCBL-1', '222040411094711-COTIZACION.pdf', '222040411094722-ORDEN DE COMPRA.pdf', '222040411094733-ORDEN DE COMPRA.pdf'),
(8, '2220405113857', '1', 'abc', '222040511385711-FICHA DE DEPÓSITO.pdf', '222040511385722-FICHA DE DEPÓSITO.pdf', '222040511385733-ORDEN DE COMPRA.pdf'),
(9, '2220405115118', '1', 'QWE', '222040511511811-FICHA DE DEPÓSITO.pdf', '222040511511822-FICHA DE DEPÓSITO.pdf', '222040511511833-FICHA DE DEPÓSITO.pdf'),
(10, '2220405155528', '1', 'a', '222040515552811-COTIZACION.pdf', '222040515552822-ORDEN DE COMPRA.pdf', '222040515552833-FICHA DE DEPÓSITO.pdf'),
(11, '2220405164720', '300', '1A-05LCBL-1', '222040516472011-FICHA DE DEPÓSITO.pdf', '222040516472022-ORDEN DE COMPRA.pdf', '222040516472033-COTIZACION.pdf'),
(12, '2220405164720', '1', 'zxc', '222040516472011-FICHA DE DEPÓSITO.pdf', '222040516472022-ORDEN DE COMPRA.pdf', '222040516472033-COTIZACION.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m7_ventas`
--

CREATE TABLE `m7_ventas` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `solicitud` varchar(255) NOT NULL,
  `persona` varchar(255) NOT NULL,
  `fecha_1` date NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `1_marca` varchar(255) NOT NULL,
  `1_nombre` varchar(255) NOT NULL,
  `1_modelo` varchar(255) NOT NULL,
  `1_descripcion` varchar(255) NOT NULL,
  `1_cantidad` int(11) NOT NULL,
  `1_partes` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `fecha_2` date NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `inf` varchar(255) NOT NULL,
  `entrega` varchar(255) NOT NULL,
  `validado` varchar(255) NOT NULL,
  `fecha1` date DEFAULT NULL,
  `fecha2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m7_ventas`
--

INSERT INTO `m7_ventas` (`id`, `folio`, `solicitud`, `persona`, `fecha_1`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `id_user`, `name_user`, `1_marca`, `1_nombre`, `1_modelo`, `1_descripcion`, `1_cantidad`, `1_partes`, `precio`, `fecha_2`, `estatus`, `inf`, `entrega`, `validado`, `fecha1`, `fecha2`) VALUES
(51, 'P-220404-155239', 'Personal', 'Fisica', '2022-04-04', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '0000-00-00', 'ENTREGADO', 'Cotización enviado: 2022-04-04 15:53:05', '2 Semanas', 'Modelo', '2022-04-04', '2022-04-04'),
(52, 'P-220405-154503', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '0000-00-00', 'ENTREGADO', 'Cotización enviado: 2022-04-05 15:45:50', '2 Semanas', 'Modelo', '2022-04-05', '2022-04-05'),
(53, 'P-220405-164049', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'Sin Número de partes', '3910', '0000-00-00', 'ENTREGADO', 'Cotización enviado: 2022-04-05 16:41:07', '1 Semana', 'Modelo', '2022-04-05', '2022-04-05'),
(54, 'P-220405-175455', 'Personal', 'Fisica', '2022-04-05', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '0000-00-00', 'RECHAZADA', 'Precio', '2 Semanas', 'Modelo', '2022-04-05', '0000-00-00'),
(55, 'P-220406-94528', 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-10LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 10M', 1, 'qwerty', '5790', '0000-00-00', 'RECHAZADA', 'Precio', '1 Mes', 'Partes', '2022-04-06', '0000-00-00'),
(56, 'P-220406-134940', 'Personal', 'Fisica', '2022-04-06', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '7', 'Adriana Hernandez', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 100, 'Sin Número de partes', '1800', '0000-00-00', 'ENTREGADO', 'Cotización enviado: 2022-04-06 13:50:44', '2 Semanas', 'Modelo', '2022-04-06', '2022-04-06'),
(57, 'P-220407-165457', 'Personal', 'Fisica', '2022-04-07', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', '1', 'Administración', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '0000-00-00', 'ENTREGADO', 'Cotización enviado: 2022-04-06 13:50:44', '2 Semanas', 'Modelo', '2022-04-07', '2022-04-07'),
(58, 'P-220408-94807', 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', '1', 'Administración', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '0000-00-00', 'ACEPTADA', 'Cotización enviado: 2022-04-08 09:48:26', '2 Semanas', 'Modelo', '2022-04-08', '0000-00-00'),
(59, 'P-220408-94953', 'Personal', 'Fisica', '2022-04-08', 'ACER', 'Lopez', 'México', '77774398967', 'ejemplo@gmail.com', '1', 'Administración', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'Sin Número de partes', '1800', '0000-00-00', 'RECHAZADA', 'Descripción', '2 Semanas', 'Modelo', '2022-04-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m7_ventas_productos`
--

CREATE TABLE `m7_ventas_productos` (
  `id` int(11) NOT NULL,
  `codigo_cliente` varchar(255) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `partes` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `entrega` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `inf` text NOT NULL,
  `ok` text NOT NULL,
  `almacen` varchar(255) NOT NULL,
  `fecha1` date DEFAULT NULL,
  `fecha2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m7_ventas_productos`
--

INSERT INTO `m7_ventas_productos` (`id`, `codigo_cliente`, `folio`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `marca`, `modelo`, `descripcion`, `cantidad`, `partes`, `precio`, `entrega`, `estatus`, `inf`, `ok`, `almacen`, `fecha1`, `fecha2`) VALUES
(80, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, '2 Semanas', 'ENTREGADO', 'Cotización enviado: 2022-04-05 11:19:00', '', 'SI', '2022-04-04', '2022-04-04'),
(81, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, '1 Semana', 'ENTREGADO', 'Cotización enviado: 2022-04-05 11:19:00', '', 'SI', '2022-04-04', '2022-04-04'),
(82, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-10CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10 M', 1, 'NO EXISTE', 1940, 'Inmediato', 'ENTREGADO', 'Cotización enviado: 2022-04-05 11:19:00', '', 'SI', '2022-04-04', '2022-04-04'),
(83, '220328-113550', '2220405113857', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'abc', 'abc', 'abc', 1, 'abc', 100, 'abc', 'ENTREGADO', 'Cotización enviado: 2022-04-05 11:39:45', '', 'NO', '2022-04-05', '2022-04-05'),
(84, '220329-140623', '2220405115118', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, '2 Semanas', 'ENTREGADO', 'Cotización enviado: 2022-04-05 11:51:59', '', 'SI', '2022-04-05', '2022-04-05'),
(85, '220329-140623', '2220405115118', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'QWE', 'QWE', 'QWE', 1, 'QWE', 10, 'QWE', 'ENTREGADO', 'Cotización enviado: 2022-04-05 11:51:59', '', 'NO', '2022-04-05', '2022-04-05'),
(86, '220328-113550', '2220405155528', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, '1 Semana', 'ENTREGADO', 'Cotización enviado: 2022-04-05 15:56:05', '', 'SI', '2022-04-05', '2022-04-05'),
(87, '220328-113550', '2220405155528', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'a', 'a', 'a', 1, 'a', 0, 'aaaa', 'ENTREGADO', 'Cotización enviado: 2022-04-05 15:56:05', '', 'NO', '2022-04-05', '2022-04-05'),
(88, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, '2 Semanas', 'ENTREGADO', 'Cotización enviado: 2022-04-05 16:50:17', '', 'SI', '2022-04-05', '2022-04-05'),
(89, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 300, 'NO EXISTE', 3910, '1 Semana', 'ENTREGADO', 'Cotización enviado: 2022-04-05 16:50:17', '', 'SI', '2022-04-05', '2022-04-05'),
(90, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'zxc', 'zxc', 'zxc', 1, '12', 10, '1 semana', 'ENTREGADO', 'Cotización enviado: 2022-04-05 16:50:17', '', 'NO', '2022-04-05', '2022-04-05'),
(91, '220328-113550', '2220406105714', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, '2 Semanas', 'RECHAZADA', 'Precio', '', 'SI', '2022-04-06', '0000-00-00'),
(92, '220328-113550', '2220406120952', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, '2 Semanas', 'RECHAZADA', 'Precio', '', 'SI', '2022-04-06', '0000-00-00'),
(93, '220328-113550', '2220406120952', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, '1 Semana', 'RECHAZADA', 'Precio', '', 'SI', '2022-04-06', '0000-00-00'),
(94, '220328-113550', '2220406123750', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-10LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 10M', 1, 'QWERTY', 5790, '1 Mes', 'RECHAZADA', 'Cantidad', '', 'SI', '2022-04-06', '0000-00-00'),
(95, '220328-113550', '2220406123750', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'A', 'A', 'A', 1, '', 0, '', 'RECHAZADA', 'Cantidad', '', 'NO', '2022-04-06', '0000-00-00'),
(96, '220328-113550', '2220406143426', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, '2 Semanas', 'ACEPTADA', 'Cotización enviado: 2022-04-06 14:47:11', '', 'SI', '2022-04-06', '0000-00-00'),
(97, '220328-113550', '2220406143426', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, '1 Semana', 'ACEPTADA', 'Cotización enviado: 2022-04-06 14:47:11', '', 'SI', '2022-04-06', '0000-00-00'),
(98, '220330-92922', '2220408143033', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-10CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10 M', 10, 'NO EXISTE', 1940, 'Inmediato', 'RECHAZADA', 'Tiempo de entrega', '', 'SI', '2022-04-08', '0000-00-00'),
(99, '220330-92922', '2220408143033', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'a', 'a', 'a', 1, 'a', 1, '1', 'RECHAZADA', 'Tiempo de entrega', '', 'SI', '2022-04-08', '0000-00-00'),
(100, '220329-140623', '2220408143152', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'MITSUBICHI', '1A-10CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10 M', 1, 'NO EXISTE', 1940, 'Inmediato', 'RECHAZADA', 'Tiempo de entrega', '', 'SI', '2022-04-08', '0000-00-00'),
(101, '220329-140623', '2220408143248', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'MITSUBICHI', '1A-10CBL-N', 'CABLE EXT SET LOW FLEX 10M', 10, 'NO EXISTE', 4400, '3 Semanas', 'RECHAZADA', 'Tiempo de entrega', '', 'SI', '2022-04-08', '0000-00-00'),
(102, '220329-140623', '2220408143249', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'MITSUBICHI', '1A-10CBL-N', 'CABLE EXT SET LOW FLEX 10M', 10, 'NO EXISTE', 4400, '3 Semanas', 'RECHAZADA', 'Tiempo de entrega', '', 'SI', '2022-04-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m12_facturacion`
--

CREATE TABLE `m12_facturacion` (
  `id` int(11) NOT NULL,
  `folio` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `1_marca` varchar(255) NOT NULL,
  `1_nombre` varchar(255) NOT NULL,
  `1_modelo` varchar(255) NOT NULL,
  `1_partes` varchar(255) NOT NULL,
  `1_descripcion` varchar(255) NOT NULL,
  `1_cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `oc` text NOT NULL,
  `fd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m12_facturacion`
--

INSERT INTO `m12_facturacion` (`id`, `folio`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `1_marca`, `1_nombre`, `1_modelo`, `1_partes`, `1_descripcion`, `1_cantidad`, `precio`, `estatus`, `oc`, `fd`) VALUES
(39, 'P-220404-155239', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 1800, 'LISTO', 'P-220404-1552391COTIZACION.pdf', 'P-220404-1552392COTIZACION.pdf'),
(40, 'P-220405-154503', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 1800, 'LISTO', 'P-220405-1545031FICHA DE DEPÓSITO.pdf', 'P-220405-1545032ORDEN DE COMPRA.pdf'),
(41, 'P-220405-164049', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05LCBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 3910, 'LISTO', 'P-220405-1640491ORDEN DE COMPRA.pdf', 'P-220405-1640492COTIZACION.pdf'),
(42, 'P-220406-134940', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 100, 1800, 'LISTO', 'P-220406-1349401ORDEN DE COMPRA.pdf', 'P-220406-1349402ORDEN DE COMPRA.pdf'),
(43, 'P-220407-165457', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'Linea', 'MITSUBICHI', '1A-05CBL-1', 'Sin Número de partes', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 1800, 'LISTO', 'P-220407-1654571COTIZACION.pdf', 'P-220407-1654572ORDEN DE COMPRA.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m12_facturacion_vs`
--

CREATE TABLE `m12_facturacion_vs` (
  `id` int(11) NOT NULL,
  `codigo_cliente` text NOT NULL,
  `folio` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contacto` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `partes` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `doc1` text NOT NULL,
  `doc2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `m12_facturacion_vs`
--

INSERT INTO `m12_facturacion_vs` (`id`, `codigo_cliente`, `folio`, `empresa`, `contacto`, `direccion`, `telefono`, `correo`, `marca`, `modelo`, `descripcion`, `cantidad`, `partes`, `precio`, `estatus`, `doc1`, `doc2`) VALUES
(11, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, 'LISTO', '22204051118461PLUSCOTIZACION.pdf', '22204051118462PLUSCOTIZACION.pdf'),
(12, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, 'LISTO', '22204051118461PLUSCOTIZACION.pdf', '22204051118462PLUSCOTIZACION.pdf'),
(13, '220328-113550', '2220405111846', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-10CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX 10 M', 1, 'NO EXISTE', 1940, 'LISTO', '22204051118461PLUSCOTIZACION.pdf', '22204051118462PLUSCOTIZACION.pdf'),
(14, '220328-113550', '2220405113857', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'abc', 'abc', 'abc', 1, 'abc', 100, 'LISTO', '22204051138571PLUSCOTIZACION.pdf', '22204051138572PLUSORDEN DE COMPRA.pdf'),
(17, '220329-140623', '2220405115118', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, 'LISTO', '22204051151181PLUSFICHA DE DEPÓSITO.pdf', '22204051151182PLUSORDEN DE COMPRA.pdf'),
(18, '220329-140623', '2220405115118', 'Cot SA.SV.', 'Alison', 'Pachuca', '3664411', 'ejem@gmail.com', 'QWE', 'QWE', 'QWE', 1, 'QWE', 10, 'LISTO', '22204051151181PLUSFICHA DE DEPÓSITO.pdf', '22204051151182PLUSORDEN DE COMPRA.pdf'),
(19, '220328-113550', '2220405155528', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 1, 'NO EXISTE', 3910, 'LISTO', '22204051555281PLUSFICHA DE DEPÓSITO.pdf', '22204051555282PLUSFICHA DE DEPÓSITO.pdf'),
(20, '220328-113550', '2220405155528', 'IACSA', 'Rocio', 'China Poblana', '7774398967', 'cp@gmail.com', 'a', 'a', 'a', 1, 'a', 0, 'LISTO', '22204051555281PLUSFICHA DE DEPÓSITO.pdf', '22204051555282PLUSFICHA DE DEPÓSITO.pdf'),
(21, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-05CBL-1', 'CABLE EXT SET (RV-1A/2AJ)  LOW FLEX  5M', 1, 'NO EXISTE', 1800, 'LISTO', '22204051647201PLUSCOTIZACION.pdf', '22204051647202PLUSCOTIZACION.pdf'),
(22, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'MITSUBICHI', '1A-05LCBL-1', 'CABLE EXT SET (RV-1A/2AJ)  HIGH FLEX 5M', 300, 'NO EXISTE', 3910, 'LISTO', '22204051647201PLUSCOTIZACION.pdf', '22204051647202PLUSCOTIZACION.pdf'),
(23, '220330-92922', '2220405164720', 'Example', 'Montse', 'Example Example', '78945612365', 'exameple@gmail.com', 'zxc', 'zxc', 'zxc', 1, '12', 10, 'LISTO', '22204051647201PLUSCOTIZACION.pdf', '22204051647202PLUSCOTIZACION.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo_identificacion` varchar(255) NOT NULL,
  `identificacion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `eliminar` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `m1` varchar(255) NOT NULL,
  `m2` varchar(255) NOT NULL,
  `m3` varchar(255) NOT NULL,
  `m4` varchar(255) NOT NULL,
  `m5` varchar(255) NOT NULL,
  `m6` varchar(255) NOT NULL,
  `m7` varchar(255) NOT NULL,
  `m8` varchar(255) NOT NULL,
  `m9` varchar(255) NOT NULL,
  `m10` varchar(255) NOT NULL,
  `m11` varchar(255) NOT NULL,
  `m12` varchar(255) NOT NULL,
  `datem1` date DEFAULT NULL,
  `datem2` date DEFAULT NULL,
  `datem3` date DEFAULT NULL,
  `datem4` date DEFAULT NULL,
  `datem5` date DEFAULT NULL,
  `datem6` date DEFAULT NULL,
  `datem7` date DEFAULT NULL,
  `datem8` date DEFAULT NULL,
  `datem9` date DEFAULT NULL,
  `datem10` date DEFAULT NULL,
  `datem11` date DEFAULT NULL,
  `datem12` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `tipo_identificacion`, `identificacion`, `telefono`, `correo`, `usuario`, `contraseña`, `eliminar`, `rol`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `m8`, `m9`, `m10`, `m11`, `m12`, `datem1`, `datem2`, `datem3`, `datem4`, `datem5`, `datem6`, `datem7`, `datem8`, `datem9`, `datem10`, `datem11`, `datem12`) VALUES
(1, 'Administración', 'Administración', 'Administración', '2222-20-54-44', 'coordinacion@iacsa-puebla.com.mx', 'admin', 'admin', 'No', 'Super Administrador', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Edgar Pérez Alvarado', 'CURP', 'PEAE010603HPLRDA1', '7774398967', 'ed@gmail.com', 'a', 'a', 'Si', 'Usuario', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', 'Si', 'No', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 'Adriana Hernandez', 'CURP', 'ABC0123ASFJANA50SA', '2222222222', 'adriana@gmail.com', 'b', 'b', 'Si', 'Usuario', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', 'Si', 'No', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `m1_solicitudes`
--
ALTER TABLE `m1_solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m2_proveedores`
--
ALTER TABLE `m2_proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m3_clientes`
--
ALTER TABLE `m3_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m3_clientes_productos`
--
ALTER TABLE `m3_clientes_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m4_almacen`
--
ALTER TABLE `m4_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m4_almacen2`
--
ALTER TABLE `m4_almacen2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m4_almacen_entradas`
--
ALTER TABLE `m4_almacen_entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m4_almacen_entradas_vs`
--
ALTER TABLE `m4_almacen_entradas_vs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m4_almacen_mjs`
--
ALTER TABLE `m4_almacen_mjs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m4_almacen_salidas`
--
ALTER TABLE `m4_almacen_salidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m5_cotizacion`
--
ALTER TABLE `m5_cotizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m5_cotizaciones`
--
ALTER TABLE `m5_cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m6_compras_mjs`
--
ALTER TABLE `m6_compras_mjs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m6_compras_v`
--
ALTER TABLE `m6_compras_v`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m6_compras_vs`
--
ALTER TABLE `m6_compras_vs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m7_ventas`
--
ALTER TABLE `m7_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m7_ventas_productos`
--
ALTER TABLE `m7_ventas_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m12_facturacion`
--
ALTER TABLE `m12_facturacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m12_facturacion_vs`
--
ALTER TABLE `m12_facturacion_vs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `m1_solicitudes`
--
ALTER TABLE `m1_solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `m2_proveedores`
--
ALTER TABLE `m2_proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `m3_clientes`
--
ALTER TABLE `m3_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `m3_clientes_productos`
--
ALTER TABLE `m3_clientes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `m4_almacen`
--
ALTER TABLE `m4_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `m4_almacen2`
--
ALTER TABLE `m4_almacen2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `m4_almacen_entradas`
--
ALTER TABLE `m4_almacen_entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `m4_almacen_entradas_vs`
--
ALTER TABLE `m4_almacen_entradas_vs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `m4_almacen_mjs`
--
ALTER TABLE `m4_almacen_mjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `m4_almacen_salidas`
--
ALTER TABLE `m4_almacen_salidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `m5_cotizacion`
--
ALTER TABLE `m5_cotizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `m5_cotizaciones`
--
ALTER TABLE `m5_cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `m6_compras_mjs`
--
ALTER TABLE `m6_compras_mjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `m6_compras_v`
--
ALTER TABLE `m6_compras_v`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `m6_compras_vs`
--
ALTER TABLE `m6_compras_vs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `m7_ventas`
--
ALTER TABLE `m7_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `m7_ventas_productos`
--
ALTER TABLE `m7_ventas_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `m12_facturacion`
--
ALTER TABLE `m12_facturacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `m12_facturacion_vs`
--
ALTER TABLE `m12_facturacion_vs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
