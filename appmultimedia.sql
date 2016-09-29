-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2016 a las 21:40:08
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `appmultimedia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `format_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\n Tabla donde se albergaran la informacion de los archivos\r\n*/';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formats`
--

CREATE TABLE IF NOT EXISTS `formats` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\nTabla con los formatos de los archivos\r\n*/';

--
-- Volcado de datos para la tabla `formats`
--

INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'mp4', 'This is a format video', 1, '2016-09-21 14:30:34', '2016-09-21 14:30:34'),
(2, 'jpg', 'This is a format compressor image', 2, '2016-09-21 14:30:37', '2016-09-21 14:30:37'),
(3, 'gif', 'This is a format animate image', 2, '2016-09-21 14:30:40', '2016-09-21 14:30:40'),
(4, 'png', 'This is a format image', 2, '2016-09-21 14:30:43', '2016-09-21 14:30:43'),
(5, 'docx ', 'This is a format by Word''s document', 3, '2016-09-21 14:30:46', '2016-09-21 14:30:46'),
(6, 'doc', 'This is a other format by Word''s document', 3, '2016-09-21 14:30:47', '2016-09-21 14:30:47'),
(7, 'xls', 'This is a format by Excel''s document', 3, '2016-09-21 14:30:49', '2016-09-21 14:30:49'),
(8, 'pdf', 'This is a format by PDF''s document', 3, '2016-09-21 14:30:52', '2016-09-21 14:30:52'),
(9, 'txt', 'This is a format by TXT''s document', 3, '2016-09-21 14:30:53', '2016-09-21 14:30:53'),
(10, 'xlsx', 'This is a format Excel''s document (2007)', 3, '2016-09-21 14:30:55', '2016-09-21 14:30:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE IF NOT EXISTS `rols` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\nTabla que contiene los roles del sistema\r\n*/';

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'the big boss', '2016-09-08 16:01:47', '2016-09-08 16:01:47'),
(2, 'moderator', 'The lambon who wants to be admin\r\n', '2016-09-28 19:23:50', '2016-09-28 19:23:50'),
(3, 'usuario', 'The standard rate\r\n', '2016-09-28 19:23:50', '2016-09-28 19:23:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\nTipo de Archivos\r\n*/';

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'video'),
(2, 'image'),
(3, 'document');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `names` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_names` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/* \r\nTabla que contiene todos los usuarios.\r\n */';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `names`, `last_names`, `email`, `password`, `rol_id`, `created_at`, `updated_at`) VALUES
(2, 'Daniel', 'Carcamo', 'reickchozo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2016-09-08 16:03:12', '2016-09-28 19:25:48'),
(7, 'Juan', 'Duque', 'rduuke@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2016-09-29 01:52:44', '2016-09-28 19:26:16'),
(8, 'Gustavo', 'Muñoz', 'gustavo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '2016-09-28 19:25:01', '2016-09-28 19:25:01');

--
-- Índices para tablas volcadas
--

CREATE TABLE IF NOT EXISTS `shareds` (
  `id` int(11) NOT NULL,
  `of_who` int(11) NOT NULL,
  `for_who` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user` (`of_who`),
  KEY `FK_file` (`file_id`),
  CONSTRAINT `FK_file` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user` FOREIGN KEY (`of_who`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='This table has data related with the commentaries';

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`), ADD KEY `FK__format` (`format_id`), ADD KEY `FK__users` (`user_id`);

--
-- Indices de la tabla `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQUE NAME` (`name`), ADD KEY `FK_type` (`type_id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `NAME UNIQUE` (`name`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `EMAIL UNIQUE` (`email`), ADD KEY `FK_users_roles` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `formats`
--
ALTER TABLE `formats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `files`
--
ALTER TABLE `files`
ADD CONSTRAINT `FK__format` FOREIGN KEY (`format_id`) REFERENCES `formats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formats`
--
ALTER TABLE `formats`
ADD CONSTRAINT `FK_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
