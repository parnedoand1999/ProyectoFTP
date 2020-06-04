-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2020 a las 00:52:46
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_fecha` date NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `correo_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_mensaje` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `cuerpo_mensje` text NOT NULL,
  `fecha` date NOT NULL,
  `correo_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `imagen` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `nombre_prod` varchar(40) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`imagen`, `descripcion`, `precio`, `nombre_prod`, `id_producto`, `categoria`) VALUES
('kh1.jpg', 'Es el primer juego de la saga, introduce a los personajes en un mundo de aventuras', 15, 'Kingdom Hearth 1', 0, 'videojuegos'),
('kh2.jpg', 'Es el segundo juego de la saga y en este se introducen nuevos personajes y nuevos mundos en los cuales Sora y sus amigos continuan con la aventura', 20, 'Kingdom Heath 2', 1, 'videojuegos'),
('kh3.jpg', 'Este es el último juego de la saga hasta la fecha de hoy en el cual sora y sus amigos deberan luchar contra el villano principal de la saga para traer de vuelta el bien ', 38, 'Kingdom Hearth 3', 2, 'videojuegos'),
('camisetaKH.jpg', 'Una camiseta con el dibujo de Sora, el personaje principal de la saga de Kingdom Hearth', 12, 'Camiseta  Sora', 3, 'ropa'),
('sudaderaKH.jpg', 'Sudadera con el dibujo de la portada del primer juego de kingdom Hearth', 18, 'Sudadera Kingdom Hearth 1', 4, 'ropa'),
('pantalonesKH.jpg', 'Pantalon con dos dibujos de Kingdom Hearth', 18, 'Pantalon Kingdom Hearth', 5, 'ropa'),
('zapatillasKH.jpg', 'Las zapatillas que lleva Sora ', 25, 'Zapatillas de Sora', 6, 'ropa'),
('funkoKH.jpg', 'Muñeco con la cabeza grande sobre Sora.', 30, 'Funko Sora', 7, 'accesorios'),
('tazaKH.jpg', 'Taza ambientada en dibujos de Sora, Donald , Goofy  y Mickey.', 24, 'Taza Kingdom Hearth', 8, 'accesorios'),
('llaveEspadaKH.jpg', 'La llave espada que usa Sora para coleccionistas', 40, 'Espada Sora', 9, 'accesorios'),
('collarKH.jpg', 'Un collar ambientado en la corona de Sora', 37, 'Collar  corona Kingdom Hearth', 10, 'accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(20) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `codigo_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `correo`, `contraseña`, `nombre`, `apellido`, `ciudad`, `codigo_postal`) VALUES
('Carlos', ' carlanga@gmail.com', 'carlanga', 'Carlos', 'Arnedo', 'Pamplona', 31180),
('Ibai', ' ibaiperez@gmail.com', 'perez', 'Ibai', 'Perez', 'Pamplona', 54872),
('javi199', ' pepe@gmail.com', 'pepe99', 'javier', 'perez', 'pamplona', 54789),
('jon', ' jonmostaza@gmail.com', 'mostaza', 'jon', 'mostaza', 'pamplona', 54780),
('martinPJ', ' martinpj@gmail.com', '12345', 'Martin', 'Pajares', 'pamplona', 3104),
('Merche', ' morozist@gmail.com', 'merche', 'Merche', 'Oroz', 'Pamplona', 25255),
('peio', ' peioarnedo@gmail.com', 'arnedo99', 'Peio', 'Arnedo', 'Pamplona', 31180);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_fecha`,`id_producto`,`correo_usuario`) USING BTREE,
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `correo_usuario` (`correo_usuario`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `correo_usuario` (`correo_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`,`correo`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `FK_PRODUCTO:_ID` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`correo_usuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`correo_usuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
