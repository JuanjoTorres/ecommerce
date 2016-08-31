-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2016 a las 18:53:02
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `code` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text,
  `price` float(10,2) NOT NULL,
  `image` varchar(60) NOT NULL DEFAULT './public/img/item_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los datos de los productos.';

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`code`, `name`, `description`, `price`, `image`) VALUES
(12, 'Leche regeneradora', 'Producto cosmetico que hidrata la piel y la rejuvenece.', 30.00, '../public/img/item_default.jpg'),
(13, 'Ampolla', 'Rejuvenece tu piel hasta unos extremos increibles. No apto para menores', 50.00, '../public/img/ampolla-reconstructora.jpg'),
(14, 'Antiarrugas', 'Quita las arrugas en un momento. Super eficaz y comprobado 100%.', 15.00, '../public/img/anti-arrugas.jpg'),
(15, 'Crema Afeitar', 'Super suave e hidratante, nunca probarás otra igual.', 17.00, '../public/img/crema-afeitar.jpg'),
(16, 'Barra Doble', 'Barra de labios y además es doble. Para definir bien el color.', 39.00, '../public/img/doble-labios.jpg'),
(17, 'Emulsionador', 'Crema especial que emulsiona los poros desinfectados.', 45.50, '../public/img/emulsion.jpg'),
(18, 'Limpiador', 'Limpia el cutis, para acabados profesionales.', 30.00, '../public/img/limpia-cutis.png'),
(19, 'Rimel', 'Rimel para definir la sombra de tus ojos. Acabado impresionante.', 9.99, '../public/img/rimel-maquillaje.png'),
(20, 'Tónico sin alcohol', 'Tónico especial para pieles acnéicas. No dejar cerca de los niños.', 32.00, '../public/img/item_default.jpg'),
(21, 'Pinta Labios', 'Pinta labios rojo carmesí. No mancha. Especial para eventos.', 5.00, '../public/img/pinta-labios.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id_order` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `id_customer` varchar(40) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los datos de los pedidos.';

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id_order`, `date`, `id_customer`, `amount`) VALUES
(3, '2016-08-31 14:27:07', 'piter', '0'),
(4, '2016-08-31 14:27:09', 'piter', '0'),
(5, '2016-08-31 14:27:31', 'marina', '0'),
(6, '2016-08-31 14:27:42', 'chema', '0'),
(7, '2016-08-31 14:27:55', 'paquita', '0'),
(8, '2016-08-31 14:28:06', 'piter', '0'),
(9, '2016-08-31 14:28:19', 'joana', '0'),
(10, '2016-08-31 14:28:38', 'chema', '0'),
(11, '2016-08-31 14:28:39', 'chema', '0'),
(12, '2016-08-31 14:28:54', 'joana', '0'),
(13, '2016-08-31 14:30:04', 'laura', '0'),
(14, '2016-08-31 14:30:14', 'adrian', '0'),
(15, '2016-08-31 14:30:22', 'baena', '0'),
(16, '2016-08-31 14:30:23', 'baena', '0'),
(17, '2016-08-31 14:30:24', 'baena', '0'),
(18, '2016-08-31 14:30:35', 'laura', '0'),
(19, '2016-08-31 14:30:49', 'adrian', '0'),
(20, '2016-08-31 14:30:50', 'adrian', '0'),
(21, '2016-08-31 14:31:03', 'piter', '0'),
(22, '2016-08-31 14:31:13', 'marina', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Almacena los datos de los usuarios.';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `password`, `first_name`, `last_name`, `email`, `permission`) VALUES
('adrian', 'a11d0f20a162cf933b1211359f86f4a8', 'Adrian', 'Suarez', 'adriansuarez@gmail.com', 1),
('baena', 'a11d0f20a162cf933b1211359f86f4a8', 'Alex', 'Baena', 'alexbaena@gmail.com', 1),
('chema', 'a11d0f20a162cf933b1211359f86f4a8', 'Chema', 'Llabres', 'chemallabres@gmail.com', 1),
('joana', 'a11d0f20a162cf933b1211359f86f4a8', 'Joana', 'Deya', 'joanadeya@gmail.com', 1),
('juanjo', 'a11d0f20a162cf933b1211359f86f4a8', 'Juanjo', 'Torres', 'juanjotorres@gmail.com', 2),
('kevin', 'a11d0f20a162cf933b1211359f86f4a8', 'Kevin', 'Palma', 'kevinpalma@gmail.com', 2),
('laura', 'a11d0f20a162cf933b1211359f86f4a8', 'Laura', 'Lara', 'lauralara@gmail.com', 1),
('marina', 'a11d0f20a162cf933b1211359f86f4a8', 'Marina', 'Torres', 'marinatorres@gmail.com', 1),
('norman', 'a11d0f20a162cf933b1211359f86f4a8', 'Norman', 'Osa', 'normanosa@gmail.com', 2),
('paquita', 'a11d0f20a162cf933b1211359f86f4a8', 'Paquita', 'Roser', 'paquitaroser@gmail.com', 1),
('piter', 'a11d0f20a162cf933b1211359f86f4a8', 'Piter', 'Petrunov', 'piterpetrunov@gmail.com', 1),
('yeray', 'a11d0f20a162cf933b1211359f86f4a8', 'Yeray', 'Bustos', 'yeraybustos@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`(20));

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
