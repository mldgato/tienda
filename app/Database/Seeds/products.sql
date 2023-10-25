-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2023 a las 07:08:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(5) UNSIGNED NOT NULL,
  `cod` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_supplier` int(5) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `cod`, `product_name`, `brand`, `quantity`, `cost`, `price`, `image`, `id_supplier`, `state`) VALUES
(1, '7324', 'Anillos de Caramelo 40 Unidades', 'Ring Pop', 92, 90.00, 110.00, '1.jpg', 1, 1),
(2, '7672', 'Mini Chocolates Surtidos', 'Hershey´s', 12, 115.25, 159.95, '2.jpg', 7, 1),
(3, '1731', 'Azúcar Morena', 'Tulipan', 46, 13.75, 17.40, '3.jpg', 3, 1),
(4, '9637', 'Frijoles negros 993 gr', 'Ducal', 70, 9.50, 12.15, '4.jpg', 8, 1),
(5, '6136', 'Sal Yodada 908 gr', 'B&Z', 35, 1.80, 2.65, '5.jpg', 10, 1),
(6, '7414', 'Pasta Larga 200 gr', 'Ina', 61, 3.25, 4.10, '6.jpg', 9, 1),
(7, '3589', 'Sopa de Pollo con Fideos', 'Maggi', 4, 1.80, 2.80, '7.jpg', 6, 1),
(8, '9660', 'Arroz Precocido 400 gr', 'Gallo Dorado', 70, 6.75, 7.45, '8.jpg', 1, 1),
(9, '3265', 'Avena Mosh 900 gr', 'Quaker', 47, 22.30, 26.50, '9.jpg', 2, 1),
(10, '2822', 'Frijoles rojos ', 'Albaj', 69, 8.75, 10.40, '10.jpg', 9, 1),
(11, '5773', 'Arroz Precocido 400 gr', 'Molinero', 96, 6.80, 7.10, '11.jpg', 1, 1),
(12, '5213', 'Premezcla para Hot Cake', 'Gold Medal', 19, 30.25, 38.15, '12.jpg', 2, 1),
(13, '6579', 'Salsa de Tomate Ranchera', 'Naturas', 73, 2.40, 3.70, '13.jpg', 1, 1),
(14, '6874', 'Aceite Natural Blend 800 ml', 'Mazola', 89, 17.50, 21.00, '14.jpg', 3, 1),
(15, '8758', 'Harina de Maiz 2000 gr', 'Maseca', 48, 24.80, 27.35, '15.jpg', 6, 1),
(16, '4547', 'Tostada de maiz onduladas  360 gr', 'Milpa Real', 65, 14.20, 16.95, '16.jpg', 2, 1),
(17, '4974', 'Café Clásico Instantáneo 300 g', 'Nescafe', 20, 53.60, 59.95, '17.jpg', 4, 1),
(18, '2971', 'Café Instantateno 250 gr', 'Incasa', 36, 47.90, 49.00, '18.jpg', 8, 1),
(19, '6720', 'Crema Esencia Vainilla 250 ml', 'Castilla', 56, 4.05, 4.70, '19.jpg', 9, 1),
(20, '7797', 'Concentrado de Horchata de coco', 'B&B', 11, 20.70, 23.10, '20.jpg', 9, 1),
(21, '3641', 'Concentrado de Mora 678 ml', 'B&B', 85, 20.10, 23.10, '21.jpg', 9, 1),
(22, '5761', 'Syrup Caramelo ', 'Hershey´s', 77, 31.35, 38.80, '22.jpg', 7, 1),
(23, '3342', 'Pollo ahumado lb', 'Pollo Rey', 75, 24.80, 27.00, '23.jpg', 5, 1),
(24, '4686', 'Carne Horneada de Cerdo 340g', 'Spam', 59, 33.65, 37.50, '24.jpg', 4, 1),
(25, '9180', 'Jocon de Pollo 300 gr', 'Baqu', 66, 18.75, 22.10, '25.jpg', 3, 1),
(26, '2464', 'Salchicas  de Pollo Picante', 'Goya', 98, 8.95, 10.10, '26.jpg', 2, 1),
(27, '6135', 'Carne al pastor con salsa 215 gr', 'Chata', 42, 40.15, 44.00, '27.jpg', 2, 1),
(28, '4838', 'Carne de Cerdo Lite 340 gr', 'Spam', 25, 33.90, 37.50, '28.jpg', 5, 1),
(29, '4357', 'Melocotones en almibar ', 'Del Monte', 17, 22.00, 24.00, '29.jpg', 1, 1),
(30, '7100', '4 Pack Frutas Mixtas sin azúcar', 'Great Value', 4, 21.65, 22.40, '30.jpg', 8, 1),
(31, '9599', 'Rodajas de melecoton 411 gr', 'Great Value', 93, 14.00, 16.00, '31.jpg', 9, 1),
(32, '6660', 'Guindas Rojas 227 g', 'Kilio´s', 15, 22.00, 25.00, '32.jpg', 3, 1),
(33, '7741', 'Maiz dulce en grano lata', 'Calvo', 47, 7.75, 8.10, '33.jpg', 10, 1),
(34, '3007', 'Elote dorado lata ', 'La Costeña', 52, 9.00, 9.95, '34.jpg', 8, 1),
(35, '5199', 'Champiñones rebanados', 'Kilio´s', 18, 8.00, 9.00, '35.jpg', 5, 1),
(36, '7522', 'Garbanzo en lata', 'Kilio´s', 77, 13.00, 14.35, '36.jpg', 7, 1),
(37, '2935', 'Cereal Corn Flakes', 'Gran Día', 49, 18.00, 18.90, '37.jpg', 2, 1),
(38, '2330', 'Cereal dulce Honey Monster', 'Stars', 29, 30.00, 40.00, '38.jpg', 10, 1),
(39, '7044', 'Cereal Froot Loops', 'Kellogg´s', 33, 33.00, 34.75, '39.jpg', 9, 1),
(40, '7423', 'Cereal Zucaritas', 'Kellogg´s', 8, 33.00, 35.90, '40.jpg', 2, 1),
(41, '7549', 'Coco Rallado', 'Mada', 0, 15.00, 15.90, '41.jpg', 1, 1),
(42, '5770', 'Polvo para hornear', 'Sasson', 61, 9.00, 9.40, '42.jpg', 4, 1),
(43, '9218', 'Harina para panqueques', 'Nutri', 85, 27.00, 28.20, '43.jpg', 2, 1),
(44, '5835', 'Almendra Lasca', 'Sasson', 2, 11.00, 12.70, '44.jpg', 9, 1),
(45, '6257', 'Crema Chantilly 50 gr', 'De la Familia', 71, 6.00, 6.30, '45.jpg', 1, 1),
(46, '5319', 'Premezcla para Brownie', 'Gold Medal', 82, 26.00, 28.30, '46.jpg', 3, 1),
(47, '1918', 'Gaseosa de cola sin azúcar', 'Coca Cola', 6, 17.00, 18.60, '47.jpg', 9, 1),
(48, '4397', 'Gaseosas Pack', 'Coca Cola', 44, 30.00, 33.80, '48.jpg', 8, 1),
(49, '4956', 'Lata Pack de 8', 'Fanta ', 54, 26.00, 27.50, '49.jpg', 1, 1),
(50, '8268', 'Gaseosa Limoneto', 'H2O', 34, 5.00, 5.75, '50.jpg', 9, 1),
(51, '1052', 'Cerveza en botella  6 Pack', 'Monte Carlo', 15, 55.00, 59.00, '51.jpg', 10, 1),
(52, '6591', 'Cervgeza 355 ml botella  6 pack', 'Gallo ', 84, 40.00, 45.00, '52.jpg', 8, 1),
(53, '4198', '6 Pack Reserva Cerveza', 'Cabro', 73, 50.00, 52.00, '53.jpg', 2, 1),
(54, '8342', '24 Pack cerveza lata ', 'Modelo', 41, 115.20, 125.00, '54.jpg', 8, 1),
(55, '6479', 'Vino Merlot', 'Reservado', 29, 38.00, 39.95, '55.jpg', 5, 1),
(56, '1335', 'Vino Concha y Toro', 'Reservado', 57, 38.00, 39.95, '56.jpg', 1, 1),
(57, '7079', 'Vino tinto ', 'Carmenere', 0, 40.00, 42.00, '57.jpg', 10, 1),
(58, '2027', 'Vino caja Pirque', 'Clos', 98, 23.00, 24.95, '58.jpg', 3, 1),
(59, '4734', 'Vino Primium Merlot caja', 'Don Simon', 49, 22.00, 25.00, '59.jpg', 2, 1),
(60, '7054', 'Sangria Vino Tinto', 'Don Simon', 34, 18.00, 20.00, '60.jpg', 4, 1),
(61, '4708', 'Botran Uva botella', 'VIP', 9, 9.80, 10.95, '61.jpg', 9, 1),
(62, '4300', 'Botran Fresa botella', 'VIP', 90, 9.80, 10.95, '62.jpg', 6, 1),
(63, '8444', 'Sangria Red lata', 'Barefoot', 39, 15.00, 17.00, '63.jpg', 6, 1),
(64, '8731', 'Mojito lata ', 'Cubata', 25, 5.50, 6.50, '64.jpg', 8, 1),
(65, '1921', 'Pollo agridulce congelado', 'Pio Lindo', 97, 34.00, 36.90, '65.jpg', 1, 1),
(66, '3883', 'Pupusas congeladas de queso', 'Ya está', 97, 30.00, 33.30, '66.jpg', 4, 1),
(67, '5909', 'Pupusas congeladas de queso y loroco', 'Ya está', 21, 30.00, 33.30, '67.jpg', 9, 1),
(68, '1841', 'Sandwich relleno peperoni queso', 'Great Value', 51, 21.00, 25.00, '68.jpg', 9, 1),
(69, '2957', 'Piernas rostizadas de pollo', 'Pio Lindo', 61, 25.00, 29.00, '69.jpg', 5, 1),
(70, '5628', 'Burritos de Pizza', 'Ya está', 8, 7.00, 9.00, '70.jpg', 5, 1),
(71, '5934', 'Tamal de pollo congelado', 'Baqu', 51, 15.00, 16.05, '71.jpg', 4, 1),
(72, '3467', 'Lasagna de 5 quesos', 'Great Value', 81, 21.00, 23.80, '72.jpg', 2, 1),
(73, '1762', 'Tortita empanizada de pollo', 'Pollo Rey', 95, 14.00, 18.00, '73.jpg', 2, 1),
(74, '5888', 'Longaniza  primium', 'La Blanca', 12, 27.00, 31.00, '74.jpg', 2, 1),
(75, '8426', 'Vegetales congelados mixtos', 'Great Value', 40, 28.50, 30.70, '75.jpg', 4, 1),
(76, '7571', 'Maiz dulce en grano congelado', 'Great Value', 0, 11.25, 12.95, '76.jpg', 6, 1),
(77, '1315', 'Bayas congeladas mixtas', 'Great Value', 16, 100.00, 119.00, '77.jpg', 2, 1),
(78, '9160', 'Arandanos congelados ', 'Great Value', 83, 90.00, 94.90, '78.jpg', 1, 1),
(79, '4833', 'Fresas congeladas ', 'Great Value', 53, 29.00, 32.00, '79.jpg', 9, 1),
(80, '6300', 'Mezcla de frutas congeladas ', 'Vidosa', 37, 44.30, 48.50, '80.jpg', 1, 1),
(81, '7718', 'Detergente en polvo', 'Ariel', 6, 30.00, 34.50, '81.jpg', 10, 1),
(82, '1892', 'Detergente en polvo', 'Fab', 27, 55.00, 60.00, '82.jpg', 4, 1),
(83, '8614', 'Limpiador cloro en polvo', 'Ajax', 52, 19.00, 22.25, '83.jpg', 1, 1),
(84, '7138', 'Desinfectante lavanda ', 'Fabuloso', 10, 45.00, 48.00, '84.jpg', 9, 1),
(85, '6205', 'Desinfectante Citronela', 'Magia Blanca', 56, 8.70, 9.15, '85.jpg', 9, 1),
(86, '6215', 'Limpiador para baños', 'Harpic', 18, 24.00, 26.00, '86.jpg', 6, 1),
(87, '6339', 'Lavatrastes en barra menta', 'Zagaz', 8, 7.00, 7.15, '87.jpg', 7, 1),
(88, '4165', 'Lavaplatos de limón', 'Axion', 33, 19.00, 19.80, '88.jpg', 6, 1),
(89, '3886', 'Shampoo con acondicionador', 'Pantene', 86, 70.00, 73.00, '89.jpg', 8, 1),
(90, '1458', 'Shampoo hidratante', 'Loreal', 21, 40.00, 42.50, '90.jpg', 5, 1),
(91, '5693', 'Shampoo anticaspa', 'Head Shoulders', 37, 68.00, 70.00, '91.jpg', 6, 1),
(92, '7339', 'Shampoo control caida', 'Head Shoulders', 55, 55.00, 59.00, '92.jpg', 8, 1),
(93, '7926', 'Avena cereal infantil', 'Nestle', 8, 25.00, 28.00, '93.jpg', 5, 1),
(94, '2176', 'Trigo leche cereal infantil', 'Nestle', 56, 25.00, 28.15, '94.jpg', 9, 1),
(95, '7136', 'Arroz cereal infantil', 'Nestle', 29, 25.00, 28.00, '95.jpg', 8, 1),
(96, '1927', 'Galletitas de fresa ', 'Gerber', 16, 33.00, 36.00, '96.jpg', 9, 1),
(97, '1573', 'Pañales talla 1 96 Unidades', 'Pampers', 38, 200.00, 210.00, '97.jpg', 6, 1),
(98, '6641', 'Pañales talla 0 31 unidades', 'Pampers', 3, 75.00, 79.00, '98.jpg', 5, 1),
(99, '1209', 'Pañales talla 3 78 UDS', 'Pampers', 93, 250.00, 258.00, '99.jpg', 7, 1),
(100, '5788', 'Pañales talla 7 144 Uds', 'Pampers', 2, 380.00, 385.00, '100.jpg', 8, 1);

--
-- Índices para tablas volcadas
--
 
--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD UNIQUE KEY `cod` (`cod`),
  ADD KEY `products_id_supplier_foreign` (`id_supplier`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
