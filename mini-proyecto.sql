-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 15:38:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mini-proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Vestimenta', 'En esta sección encontrarás toda la vestimenta para yoga.', NULL, NULL),
(2, 'Accesorios', 'En esta sección encontrarás todos los accesorios para tus prácticas de yoga.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_05_06_114740_create_news_table', 1),
(5, '2023_05_06_114819_create_products_table', 1),
(6, '2023_05_09_142450_create_users_table', 1),
(7, '2023_05_10_170048_create_categories_table', 1),
(8, '2023_05_10_170203_add_category_id_column_to_products_table', 1),
(9, '2023_06_14_231015_create_etiquetas_table', 1),
(10, '2023_06_14_231057_create_products_has_etiquetas_table', 1),
(11, '2023_06_18_213447_create_users_has_products_table', 1),
(12, '2023_07_26_001812_create_roles_table', 1),
(13, '2023_07_26_001950_add_role_id_column_to_users_table', 1),
(14, '2023_08_07_140206_create_orders_table', 1),
(15, '2023_08_07_140210_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_date` date NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`news_id`, `title`, `subtitle`, `author`, `news_date`, `body`, `cover`, `cover_description`, `created_at`, `updated_at`) VALUES
(1, '¿Te sentís hinchado y tenés panza?', 'Practicar esta postra de yoga durante diez minutos al día desinflama el abdomen', 'sol.vallejos@hotmail.com', '2018-09-02', 'El yoga es de las actividades físicas que más se practica en la actualidad. Además de los beneficios para el cuerpo, la práctica prolongada hace bien a la mente y según los adeptos al “espíritu”. Sus seguidores más fieles alientan a convertirlo en un hábito de vida para poder disfrutar de todo su poder sanador.\n\n            Muchas de sus posturas pueden hacerse fuera del contexto de una clase de yoga, sin ir más lejos, desde la comodidad de la casa. Justamente, Viparita Karani es el nombre que se le atribuye a una de las poses de yoga más calmantes y nutritivas tanto para la mente como para el cuerpo. Entre sus beneficios se encuentran la mejora en la digestión, el aumento de la circulación de la sangre y la deshinchazón y desinflamación del cuerpo.', '20230619002222_te-sentis-hinchado-y-tenes-panza.jpg', 'practica-milenaria', '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 'Una práctica milenaria', 'La disciplina que con simples movimientos de manos podés bajar el estrés y tener más energía ', 'sol.vallejos@hotmail.com', '2020-09-02', 'Las manos pueden ser una herramienta fundamental para disminuir el estrés, aumentar la energía o ayudar a regular funciones vitales. Desde el budismo y el hinduismo, los mudras se definen tradicionalmente como gestos que se realizan con las manos y ayudan a canalizar la energía. Yamila Bellsolá, profesora de yoga y directora del Centro Ananda Yoga, señala que las manos poseen una gran cantidad de terminaciones nerviosas que se activan a partir del contacto que generan estos gestos, y ayudan a conectar a su vez con terminales nerviosas cerebrales.\n\n                La práctica de mudras tiene un origen milenario y se asocia generalmente a otras disciplinas como la meditación, la práctica de posturas de yoga o la entonación de mantras (sonidos y cantos). “En general se recomienda hacer un mudra específico mientras se está meditando. Cada uno tiene una simbología o función que, al asociarse a esta práctica, potencia sus beneficios”, explica Yamila Bellsolá, quien señala que también se puede hacer un mudra y quedarse unos minutos, al menos cinco, con los ojos cerrados, conectando y sintiendo sus efectos.', '20230619002313_una-practica-milenaria.jpg', 'practica-milenaria', '2023-08-09 16:21:54', '2023-08-09 16:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT '2023-08-09 16:21:54',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-09 16:21:54', '2023-08-09 16:25:48', '2023-08-09 16:25:48'),
(2, 1, '2023-08-09 16:21:54', '2023-08-09 16:26:48', '2023-08-09 16:26:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 8, 16800, '2023-08-09 16:25:48', '2023-08-09 16:25:48'),
(2, 2, 2, 1, 2100, '2023-08-09 16:26:48', '2023-08-09 16:26:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_yoga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `title`, `description`, `type_yoga`, `price`, `cover`, `cover_description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Colchoneta', 'Material: PVC alta densidad. Libre de látex y componentes tóxicos. No daña ni irrita la piel.\n            Antideslizante de gran adherencia a la superficie.\n            Medidas: 183,5 cm largo x 61,5 cm ancho', 'Classic Yoga', 2500, '20230619002416_colchoneta.png', 'colchoneta-yoga', '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 2, 'Almohadilla', 'Características\n               Altura: 15 cm\n               Diámetro: 40 cm\n               Materiales de la funda: Lavable\n               Incluye relleno: Sí\n               Cantidad de zafus: 1', 'Classic Yoga', 2100, '20230619002541_almohadilla.jpg', '20230619002541_almohadilla.jpg', '2023-08-09 16:21:54', '2023-08-09 16:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_has_tags`
--

CREATE TABLE `products_has_tags` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_has_tags`
--

INSERT INTO `products_has_tags` (`product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(1, 2, '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 4, '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 3, '2023-08-09 16:21:54', '2023-08-09 16:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `tag_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`tag_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo', '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 'Envío gratis', '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(3, 'Edición especial', '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(4, 'Producto Limitado', '2023-08-09 16:21:54', '2023-08-09 16:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` smallint(5) UNSIGNED NOT NULL DEFAULT 2,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'sol.vallejos@davinci.edu.ar', '$2y$10$wMyQQ2x/73SmdV8EN2EY6u2cWMiG7SaopdcT1wdGDT0r4V9QA0ml6', NULL, '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 1, 'sol.vallejos@hotmail.com', '$2y$10$4weD1lzQSDgXCRHwIZGiLehNwMD8ZnCJCbDb3NBNesYJbMkIXFN0O', NULL, '2023-08-09 16:21:54', '2023-08-09 16:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_products`
--

CREATE TABLE `users_has_products` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_has_products`
--

INSERT INTO `users_has_products` (`user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2023-08-09 16:21:54', '2023-08-09 16:21:54'),
(2, 2, '2023-08-09 16:21:54', '2023-08-09 16:21:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

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
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `products_has_tags`
--
ALTER TABLE `products_has_tags`
  ADD KEY `products_has_tags_product_id_foreign` (`product_id`),
  ADD KEY `products_has_tags_tag_id_foreign` (`tag_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users_has_products`
--
ALTER TABLE `users_has_products`
  ADD KEY `users_has_products_user_id_foreign` (`user_id`),
  ADD KEY `users_has_products_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `news_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Filtros para la tabla `products_has_tags`
--
ALTER TABLE `products_has_tags`
  ADD CONSTRAINT `products_has_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `products_has_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Filtros para la tabla `users_has_products`
--
ALTER TABLE `users_has_products`
  ADD CONSTRAINT `users_has_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `users_has_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
