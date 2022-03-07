-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-03-2022 a las 18:24:19
-- Versión del servidor: 8.0.25-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecte_shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categories`
--

CREATE TABLE `Categories` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Categories`
--

INSERT INTO `Categories` (`id`, `name`) VALUES
(1, 'Audio'),
(2, 'Video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productes`
--

CREATE TABLE `Productes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `preu` decimal(10,2) NOT NULL,
  `prod_url` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Productes`
--

INSERT INTO `Productes` (`id`, `user_id`, `category_id`, `name`, `description`, `image`, `preu`, `prod_url`, `created_at`) VALUES
(3, 19, 1, 'Apexcam 4k 60FPS', '【4K 60 FPS y Estabilización (EIS)】: La camara deportiva tiene video de 4K 60fps y foto de 20MP, con sensor más rápido', 'images/K2Povt3jdHS3TdzeSOSE7vGHD5M21eRlN69DKfq6.jpg', '90.00', 'https://www.amazon.es/Apexcam-Deportiva-subacu%C3%A1tica-Impermeable-Micr%C3%B3fono/dp/B08R713M69/ref=sr_1_1_sspa?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=camera&qid=1621257876&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUE1NFJOMFRFR05VVjgmZW5jcnlwdGVkSWQ9QTA3Mzg0MjIzOVhYRFJMM1NUN0w0JmVuY3J5cHRlZEFkSWQ9QTAzMDk2NDgzVzNLOE9MTkxGSEFGJndpZGdldE5hbWU9c3BfYXRmJmFjdGlvbj1jbGlja1JlZGlyZWN0JmRvTm90TG9nQ2xpY2s9dHJ1ZQ==', '2021-05-17 13:27:33'),
(5, 19, 1, 'Micrófono USB profesional Yeti para grabación, streaming, podcasting, radiodifusión, gaming, voz en off y más, multipatrón, Plug\'n Play en PC y Mac - Negro', 'Da rienda suelta a tu creatividad: micrófono profesional Yeti USB con softwares de grabación personalizados.', 'images/TrQ3T0dTxoMXKN0mOsJelkcaxggMQcyiquWoxFtt.jpg', '139.00', 'https://amz.run/4Z1l', '2021-05-17 16:22:18'),
(6, 19, 2, 'Elgato HD60 S+, Tarjeta de captura, captura a 1080p60 HDR10, traspaso sin retardo 4K60 HDR10, latencia ultrabaja, PS5, PS4/Pro, Xbox Series X/S, Xbox One X/S, USB 3.0', 'Captura tus partidas con una calidad 1080p60 HDR10 espectacular; captura en HDR', 'images/V0Gf8t0mGitKhpDsEqnLOii23iUZ0HBKvEtnpEQ8.jpg', '250.00', 'https://amz.run/4Z3D', '2021-05-17 18:37:10'),
(8, 19, 1, 'LIFEBEE Micrófono de Condensador USB, Profesional Micrófono Grabación Patrón Polar Cardioide con soporte de micrófono Brazo de tijera para Grabar Música y Video Podcast Transmisión en Vivo Juegos', '【Conecta y reproduce】: El Micrófono de Condensador NX1 está equipado con dos líneas de datos de interfaz', 'images/jxop8CYfhhf4ZEqhS2315uXvhQDzm8H1uJQYrhCy.jpg', '60.00', 'https://amz.run/4ZQd', '2021-05-19 16:11:19'),
(9, 19, 2, 'JOYACCESS Webcam con Micrófono,Cámara Web 1080p /30pfs, Webcam USB 2.0, Vista Gran Angular de 120º para Transmisión en Streaming, Conferencias en Zoom, Youtube, Skype, Compatible con Windows, Mac', '【Cámara Web Full HD 1080p con Balance Automático de Luz】', 'images/a7F3sC5347gfhRypqwJH1Hc0G5fhJOdsIiAzKOjr.jpg', '33.00', 'https://amz.run/4ZQf', '2021-05-19 16:12:54'),
(10, 19, 2, 'Sony Alpha 6400 - Cámara evil APS-C con objetivo zoom Sony 18-135mm f/3.5-5.6 (Enfoque automático rápido 0.02s, 24.2 Megapíxeles, grabación de vídeos en 4K y pantalla inclinable para Vlogging)', 'ENFOQUE AUTOMÁTICO RÁPIDO Y PRECISO: con AF de 0.02s', 'images/9D9OqFcjW9g0OgvtrChBKS34MyL6VncThneJTa5m.jpg', '1335.00', 'https://amz.run/4ZQg', '2021-05-19 16:15:54'),
(12, 19, 2, 'RIRGI Koiteck Cámaras espía Oculta, Cámaras Espía WiFi 1080P HD, con IR Visión Nocturna Detector de Movimiento, Grabadora de Video, Camaras de Seguridad Pequeña para Interior/Exterior(Negro)', '【 Cámara Espía WiFi Remota 】 Descargue la aplicación \"HIDVCAM\" (iPhone / Android)', 'images/jdjIVEKk9TwpN5VlXDUpMohKDlFMBT7A5KZhsnzK.jpg', '37.00', 'https://amz.run/4ZQj', '2021-05-19 16:19:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`) VALUES
(19, 'Admin', 'admin@goocrux.com', '$2y$10$cHqK41Yg4l.Zma.onkYL4uWheadIVBsLkUmBiq5G8Zrj.JR5p0a.i', 'Fon6ijMMFtw3Z9SERBltKKO9IP85c1mrENrvjsKtw0FewBBAzkj5o39Le1xJ', '2021-05-13 20:19:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Productes`
--
ALTER TABLE `Productes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Categories` (`category_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Productes`
--
ALTER TABLE `Productes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Productes`
--
ALTER TABLE `Productes`
  ADD CONSTRAINT `Categories` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `Productes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
