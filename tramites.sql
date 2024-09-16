-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-09-2024 a las 18:07:12
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
-- Base de datos: `tramites`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Solicitud'),
(2, 'Presupuesto'),
(3, 'Enviado al cliente'),
(4, 'Confirmado'),
(5, 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_13_083729_ventas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('lucas13nemo@gmail.com', '$2y$12$Zb/Ie3wkFdvIsEIkYyIneecnZVBfqZ1gB7YhMOBUpWDeD9QaVl1hO', '2024-02-23 16:47:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `nombre`) VALUES
(1, 'AySA'),
(2, 'Infracciones'),
(3, 'AFIP'),
(4, 'ARBA'),
(5, 'Baja Automotor'),
(6, 'Alta Automotor'),
(7, 'Transferencia Automotor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lucas Nemo', 'lucas13nemo@gmail.com', NULL, '$2y$12$vHjhK007nknFX7CrkE39V.EbkDKQRsdfdJ9DwgLESN1zT7uYTfTou', 'HUeW6qxnmWqB6DG34XEouUUlnwjCSstOWRiK4jMxdamhTIn5qshQK60gTSme', '2024-02-23 16:34:13', '2024-02-23 16:34:13'),
(2, 'Santiago Formichelli', 'santiform@gmail.com', NULL, '$2y$12$avfLHrRKied2NEkzVDe.Ku8b.BVdaoVtd6IYMbAq1t7i2c.QIzUnG', NULL, '2024-03-21 09:57:45', '2024-03-21 09:57:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nombre_vendedor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `nombre_vendedor`) VALUES
(1, 'Maxikiosco WhatsApp'),
(2, 'Maxikiosco Facebook');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(8) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `celular` int(11) NOT NULL,
  `vendedor` int(11) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `forma_pago` varchar(255) DEFAULT NULL,
  `estado_pago` varchar(255) DEFAULT NULL,
  `tardanza` varchar(255) DEFAULT NULL,
  `dato1` varchar(255) DEFAULT NULL,
  `dato2` varchar(255) DEFAULT NULL,
  `dato3` varchar(255) DEFAULT NULL,
  `dato4` varchar(255) DEFAULT NULL,
  `dato5` varchar(255) DEFAULT NULL,
  `dato6` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `token`, `id_tramite`, `cliente`, `celular`, `vendedor`, `costo`, `precio_venta`, `forma_pago`, `estado_pago`, `tardanza`, `dato1`, `dato2`, `dato3`, `dato4`, `dato5`, `dato6`, `observaciones`, `id_estado`, `created_at`, `updated_at`) VALUES
(16, '123456', 1, 'CARLOS CARLOTA', 1538338669, NULL, 100, 670, 'Efectivo', '', '6 días', '1234', NULL, NULL, NULL, NULL, NULL, NULL, 4, '2024-03-04 01:06:35', '2024-03-22 03:43:04'),
(17, '123457', 1, 'ALBERTO FERNANDEZ', 39024353, NULL, 122500, 380000, 'Santi Banco Provincia', '', '5 días', '1234', NULL, NULL, NULL, NULL, NULL, 'Nada.', 5, '2024-03-19 08:59:17', '2024-03-21 14:32:08'),
(18, '321453', 2, 'GABRIEL FORMICHELLI', 1131462920, NULL, 1500, 14000, NULL, 'A confirmar', NULL, 'PKX869', '/storage/uploads/R8M7CSNrmgn4E4D9hltclLU7NT4yKSEAZMgHiUcK.jpg', '/storage/uploads/VRJluz2aCieYVic7zai9ELjE4WwyaVlz4gw7SUk1.jpg', 'CABA', NULL, NULL, NULL, 3, '2024-09-09 18:01:28', '2024-09-13 18:57:29'),
(19, '125346', 2, 'GABRIEL FORMICHELLI', 1131462920, NULL, 1500, 14000, 'Efectivo', 'Abonado', NULL, 'PKX869', 'https://servidor.net.ar/imgserver/uploads/image_66df178b949cd_1725896587.jpg', 'https://servidor.net.ar/imgserver/uploads/image_66df179311b50_1725896595.jpg', 'CABA', NULL, NULL, 'CABA', 4, '2024-09-09 18:43:30', '2024-09-09 20:07:22'),
(20, '756487', 2, 'SANTIAGO FORMICHELLI', 1138338669, NULL, 45000, 65000, NULL, 'A confirmar', NULL, 'PKX869', 'https://servidor.net.ar/imgserver/uploads/image_66df2bbd04477_1725901757.jpg', 'https://servidor.net.ar/imgserver/uploads/image_66df2bc43ce44_1725901764.jpg', 'Buenos Aires', NULL, NULL, 'nada', 3, '2024-09-09 20:09:31', '2024-09-09 20:10:22'),
(21, 'hyj674', 2, 'GABRIEL FORMICHELLI', 1131462920, NULL, 45000, 85000, NULL, 'Abonado', NULL, 'DFH123', 'https://servidor.net.ar/imgserver/uploads/image_66df2bbd04477_1725901757.jpg', 'https://servidor.net.ar/imgserver/uploads/image_66e45a2e5fb14_1726241326.jpg', 'CABA', NULL, NULL, NULL, 1, '2024-09-13 18:44:40', '2024-09-13 18:44:40'),
(22, '7SweIVRB', 2, 'SANTIAGO FORMICHELLI', 1164063966, NULL, 1500, 2342, 'Efectivo', 'Abonado', '6 días', 'DFH123', 'https://servidor.net.ar/imgserver/uploads/image_66df2bbd04477_1725901757.jpg', 'https://servidor.net.ar/imgserver/uploads/image_66e45a2e5fb14_1726241326.jpg', 'CABA', 'https://servidor.net.ar/imgserver/uploads/image_66df2bbd04477_1725901757.jpg', 'https://servidor.net.ar/imgserver/uploads/image_66e45a2e5fb14_1726241326.jpg', 'CABA', 4, '2024-09-13 19:20:17', '2024-09-13 20:18:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `id_tramite` (`id_tramite`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_tramite`) REFERENCES `tramites` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
