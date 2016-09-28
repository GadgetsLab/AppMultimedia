-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla appmultimedia.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `format_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK__format` (`format_id`),
  KEY `FK__users` (`user_id`),
  CONSTRAINT `FK__format` FOREIGN KEY (`format_id`) REFERENCES `formats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\n Tabla donde se albergaran la informacion de los archivos\r\n*/';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla appmultimedia.formats
CREATE TABLE IF NOT EXISTS `formats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE NAME` (`name`),
  KEY `FK_type` (`type_id`),
  CONSTRAINT `FK_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\nTabla con los formatos de los archivos\r\n*/';

-- La exportación de datos fue deseleccionada.

INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (1, 'mp4', 'This is a format video', 1, '2016-09-21 09:30:34', '2016-09-21 09:30:34');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (2, 'jpg', 'This is a format compressor image', 2, '2016-09-21 09:30:37', '2016-09-21 09:30:37');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (3, 'gif', 'This is a format animate image', 2, '2016-09-21 09:30:40', '2016-09-21 09:30:40');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (4, 'png', 'This is a format image', 2, '2016-09-21 09:30:43', '2016-09-21 09:30:43');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (5, 'docx ', 'This is a format by Word\'s document', 3, '2016-09-21 09:30:46', '2016-09-21 09:30:46');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (6, 'doc', 'This is a other format by Word\'s document', 3, '2016-09-21 09:30:47', '2016-09-21 09:30:47');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (7, 'xls', 'This is a format by Excel\'s document', 3, '2016-09-21 09:30:49', '2016-09-21 09:30:49');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (8, 'pdf', 'This is a format by PDF\'s document', 3, '2016-09-21 09:30:52', '2016-09-21 09:30:52');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (9, 'txt', 'This is a format by TXT\'s document', 3, '2016-09-21 09:30:53', '2016-09-21 09:30:53');
INSERT INTO `formats` (`id`, `name`, `description`, `type_id`, `created_at`, `updated_at`) VALUES
  (10, 'xlsx', 'This is a format Excel\'s document (2007)', 3, '2016-09-21 09:30:55', '2016-09-21 09:30:55');


-- Volcando estructura para tabla appmultimedia.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NAME UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\nTabla que contiene los roles del sistema\r\n*/';

-- La exportación de datos fue deseleccionada.

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
  (1, 'administrator', 'the big boss', '2016-09-08 11:01:47', '2016-09-08 11:01:47');

-- Volcando estructura para tabla appmultimedia.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/*\r\nTipo de Archivos\r\n*/';

INSERT INTO `types` (`id`, `type`) VALUES
  (1, 'video');
INSERT INTO `types` (`id`, `type`) VALUES
  (2, 'image');
INSERT INTO `types` (`id`, `type`) VALUES
  (3, 'document');

-- Volcando estructura para tabla appmultimedia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_names` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `EMAIL UNIQUE` (`email`),
  KEY `FK_users_roles` (`rol_id`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='/* \r\nTabla que contiene todos los usuarios.\r\n */';

INSERT INTO `users` (`id`, `names`, `last_names`, `email`, `password`, `rol_id`, `created_at`, `updated_at`) VALUES
  (2, 'daniel esteban', 'carcamo orrego', 'reickchozo@gmail.com', '123456', 1, '2016-09-08 11:03:12', '2016-09-08 11:03:12');
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
