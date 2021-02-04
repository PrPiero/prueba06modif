-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2021 a las 20:13:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `affarex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `Idboleta` int(15) NOT NULL,
  `numBoleta` int(15) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `dni` int(15) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `idlistaproforma` int(11) NOT NULL,
  `fecha1` date NOT NULL,
  `fecha2` date NOT NULL,
  `cuota1` int(20) NOT NULL,
  `cuota2` int(20) NOT NULL,
  `importeTotal` int(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boletas`
--

INSERT INTO `boletas` (`Idboleta`, `numBoleta`, `fecha`, `nombre`, `dni`, `direccion`, `idlistaproforma`, `fecha1`, `fecha2`, `cuota1`, `cuota2`, `importeTotal`, `estado`) VALUES
(1, 1, '2021-01-24', 'paul', 72761497, 'calle yungay', 1, '2021-01-24', '2021-01-31', 20, 15, 40, 'pagado'),
(2, 2, '2021-01-25', 'juan', 72761497, 'calle huascar', 2, '2021-01-24', '2021-01-25', 20, 10, 30, 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `idinforme` int(11) NOT NULL,
  `total_dia` double NOT NULL,
  `subTotal_dia` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaproformas`
--

CREATE TABLE `listaproformas` (
  `idlistaproforma` int(11) NOT NULL,
  `codigoproforma` varchar(10) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idprivilegio` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `directorio` varchar(150) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idprivilegio`, `titulo`, `directorio`, `imagen`) VALUES
(1, 'Gestionar Usuarios', '../moduloGestionSistema/getListaUsuarios.php', 'gestionusuarios.png'),
(2, 'Gestionar Lista de Productos', '../moduloGestionSistema/getGestionarListaProductos.php', 'gestlistprod.png'),
(3, 'Emitir Proforma', '../moduloVentas/', 'emitirproforma.png'),
(4, 'Emitir Boleta', '../moduloVentas/', 'emitirboleta.png'),
(5, 'Modificar Boleta', '../moduloVentas/getBoleta.php', 'modificarboleta.png'),
(6, 'Registrar Despacho', '../moduloVentas/', 'registrardespacho.png'),
(7, 'Emitir Informe', '../moduloGestionVentas/getInforme.php', 'emitirinforme.png'),
(8, 'Emitir Reporte', '../moduloGestionVentas/getReporte.php', 'emitirreporte.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `idproforma` int(11) NOT NULL,
  `codigoproforma` varchar(10) NOT NULL,
  `idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idreporte` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Cajero'),
(4, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_privilegio`
--

CREATE TABLE `rol_privilegio` (
  `id_r_p` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `idprivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_privilegio`
--

INSERT INTO `rol_privilegio` (`id_r_p`, `idrol`, `idprivilegio`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 3),
(10, 2, 6),
(11, 3, 4),
(12, 3, 5),
(13, 3, 7),
(14, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `fecha_emision_dni` date NOT NULL,
  `celular` varchar(20) NOT NULL,
  `idrol` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `email`, `contrasenia`, `nombre`, `DNI`, `fecha_emision_dni`, `celular`, `idrol`, `estado`) VALUES
(1, 'useremail@email.com', '$2y$10$U4MTyzHyT3TvWtzHq.qf5uAW.Wvu2YzRdKNyQv99mJqqeDJMv0WmC', 'username', '88888887', '2021-01-07', '998745647', 1, 'Habilitado'),
(2, 'user2@email.com', '$2y$10$N6YZMxjvsxty.3KoYEu9hOxklBw8xgT8.8tckG0s1q1q6d2gSkH3q', 'username2', '88798754', '2021-01-07', '999999999', 2, 'Habilitado'),
(3, 'user3@email.com', '$2y$10$Mv2xcehZyriWYW4CR8SxyuUf/NOPbcA1KndMs6TmfvTvoSzsctviO', 'username3', '77777777', '2021-01-13', '999874565', 3, 'Habilitado'),
(4, 'user4@email.com', '$2y$10$MrL97Qh.Y44XwXhUfaklNeFcl9tdIxcFWvqtNluTUAnaObsFmn3Nq', 'username4', '72548978', '2021-01-22', '999999988', 4, 'Habilitado'),
(7, 'muser@email.com', '$2y$10$37pSzLD37.010XWeEI8vXumrSeWZizJch..cKF6F9YO0zNO724Em6', 'musername', '44444444', '2021-01-15', '989874565', 3, 'Habilitado'),
(10, 'pusuario@email.com', '$2y$10$NE5Pocx3ExJ20H3/W6HE8u7FyPwCA60IZkXjegNzCHPt2wgP/A7DW', 'pusername1', '44444444', '2021-01-29', '789745897', 4, 'Habilitado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`Idboleta`),
  ADD KEY `idproforma` (`idlistaproforma`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`idinforme`);

--
-- Indices de la tabla `listaproformas`
--
ALTER TABLE `listaproformas`
  ADD PRIMARY KEY (`idlistaproforma`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idprivilegio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`idproforma`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idreporte`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `rol_privilegio`
--
ALTER TABLE `rol_privilegio`
  ADD PRIMARY KEY (`id_r_p`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletas`
--
ALTER TABLE `boletas`
  MODIFY `Idboleta` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `idinforme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listaproformas`
--
ALTER TABLE `listaproformas`
  MODIFY `idlistaproforma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idprivilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
  MODIFY `idproforma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idreporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol_privilegio`
--
ALTER TABLE `rol_privilegio`
  MODIFY `id_r_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
