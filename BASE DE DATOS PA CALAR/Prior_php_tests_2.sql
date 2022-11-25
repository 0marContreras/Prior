-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2022 a las 16:35:53
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Prior_php_tests_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreers`
--

CREATE TABLE `carreers` (
  `id_career` int(11) NOT NULL,
  `career` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreers`
--

INSERT INTO `carreers` (`id_career`, `career`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Information technologies', 1, '2022-10-20 01:24:19', '2022-10-20 03:22:35'),
(2, 'Business development ', 1, '2022-10-20 01:24:19', '2022-10-20 03:22:35'),
(3, 'English language', 1, '2022-10-20 01:24:19', '2022-10-20 03:22:35'),
(4, 'Industrial procesess', 1, '2022-10-20 01:24:19', '2022-10-20 03:22:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `id_career` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id_group`, `group_name`, `id_career`, `created_at`, `updated_at`) VALUES
(1, 'TIDBIS31M', 1, '2022-10-20 01:40:20', '2022-10-20 03:33:46'),
(2, 'DNBIS21M', 2, '2022-10-20 01:40:20', '2022-10-20 03:33:46'),
(3, 'LIBIS31M', 3, '2022-10-20 01:40:20', '2022-10-20 03:33:46'),
(4, 'PIMBIS31M', 4, '2022-10-20 01:40:20', '2022-10-20 03:33:46'),
(5, 'TIDBIS51M', 1, '2022-10-21 18:33:41', '2022-10-21 20:30:30'),
(6, 'DNBIS51M', 2, '2022-10-21 18:33:50', '2022-10-21 20:30:30'),
(7, 'LIBIS51M', 3, '2022-10-21 18:33:55', '2022-10-21 20:30:30'),
(8, 'PIMBIS51M', 4, '2022-10-21 18:34:00', '2022-10-21 20:30:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_project`
--

CREATE TABLE `log_project` (
  `id_Log_Project` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `Project_name` varchar(100) NOT NULL,
  `Project_description` text NOT NULL,
  `Log_Logo` blob NOT NULL,
  `Log_Score` varchar(2) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Logotipos` blob NOT NULL,
  `id_Team` int(11) NOT NULL,
  `Score` varchar(50) NOT NULL,
  `num_score` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `Created_at` date NOT NULL,
  `Updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id_project`, `project_name`, `Description`, `Logotipos`, `id_Team`, `Score`, `num_score`, `stars`, `Created_at`, `Updated_at`) VALUES
(1, 'El primero', 'DESCRIPCION', '', 6481, 'not set yet', 0, 0, '2022-11-25', '2022-11-25'),
(2, 'EL segundo ', 'Si', '', 5987, 'not set yet', 0, 0, '2022-11-25', '2022-11-25');

--
-- Disparadores `project`
--
DELIMITER $$
CREATE TRIGGER `Log_Project_G` AFTER UPDATE ON `project` FOR EACH ROW INSERT INTO log_project (id_project, Project_name, Project_description, Log_Logo, Log_Score, created_at, updated_at)
VALUES(New.id_project, new.project_name, New.Description, New.Logotipos, New.score, Now(), Now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_comment`
--

CREATE TABLE `project_comment` (
  `id_project_comment` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_projectcomment`
--

CREATE TABLE `project_projectcomment` (
  `id_project_projectcomment` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_ProjectComment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rainidea_comment`
--

CREATE TABLE `rainidea_comment` (
  `id_RComment` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rainidea_rainideacomment`
--

CREATE TABLE `rainidea_rainideacomment` (
  `id` int(11) NOT NULL,
  `id_rainidea` int(11) NOT NULL,
  `id_raincomment` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rain_ideas`
--

CREATE TABLE `rain_ideas` (
  `id_rainideas` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `title` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rain_ideas`
--

INSERT INTO `rain_ideas` (`id_rainideas`, `comment`, `title`, `id_user`, `stars`, `active`, `created_at`, `updated_at`, `description`) VALUES
(1, 'not set yet', 'Idea 2 ', 14, 0, 1, '2022-11-25 00:00:00', '2022-11-25 06:35:07', 'Idea 2 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id_Team` int(11) NOT NULL,
  `name_team` varchar(100) DEFAULT NULL,
  `description_team` varchar(255) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_Career` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `code_` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id_Team`, `name_team`, `description_team`, `id_project`, `id_Career`, `logo`, `code_`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(2, 'Team 1', 'Team 1', 0, 3, '', 8989, '2022-11-25', '2022-11-25 07:13:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types_users`
--

CREATE TABLE `types_users` (
  `id_type_user` int(11) NOT NULL,
  `type_user` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `types_users`
--

INSERT INTO `types_users` (`id_type_user`, `type_user`, `created_at`, `updated_at`) VALUES
(1, 'Student', '2022-10-20 01:21:21', '2022-10-20 03:20:26'),
(2, 'Teacher', '2022-10-20 01:21:21', '2022-10-20 03:20:26'),
(3, 'Evaluator_Teacher', '2022-10-20 01:21:21', '2022-10-20 03:20:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `name_` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`name_`, `email`, `password_`) VALUES
('Samuel', 'samuel@gmail.com', '$2y$10$D4YsTLaHDCPNVKEDhF.tEe760YvBgWBbloWQlHE.dKngwzVsh/JDS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `id_type_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `pictures` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `Username`, `user_email`, `user_password`, `id_type_user`, `id_group`, `id_team`, `active`, `created_at`, `updated_at`, `descriptions`, `pictures`) VALUES
(1, 'Juan', 'Juan@gmail.com', 'faestgwg4ga4', 1, 1, 1, 1, '2022-11-19 06:28:28', '2022-11-19 07:25:09', NULL, NULL),
(2, 'Samuel', 'sam@gmail.com', '$2y$10$Md97kPMoRFEvFXHPTF0meOn0y2X7WjyKubPkpoibtYjp6s3OIOFXC', 0, 4, 0, 1, '2022-11-20 06:00:00', '2022-11-20 01:27:39', NULL, NULL),
(5, 'Samuel', 'sam1@gmail.com', '$2y$10$Pew/m8uRR0GEw6anIxFa.eOSkro6iFAGKvmMUw4Cfi8nmv3xvuJIS', 0, 2, 0, 1, '2022-11-20 06:00:00', '2022-11-20 01:29:50', NULL, NULL),
(6, 'Almanza', 'Cisco', '$2y$10$qaun9b62kqwQQXxGwCnCDeMRFuGw.CTSmti30ftzc.4eztpqJLUb2', 2, 3, 0, 1, '2022-11-20 06:00:00', '2022-11-20 01:42:56', NULL, NULL),
(12, 'Juan Perez que le va al toluca ', 'perez@gmail.com', '$2y$10$3WwxJDRXesNKbPYS/UshtOkvJRj/C/B6O7hsgGYXtfWx0fuKKai0a', 1, 3, 0, 1, '2022-11-22 06:00:00', '2022-11-22 23:56:07', NULL, NULL),
(13, 'lolo', 'lolo@lolo.com', '$2y$10$yNnJZvXkO9wmwc5cqQuknOjETdLBsVdpSHzH5mkFQE01r/TdhKvXC', 1, 4, 0, 1, '2022-11-23 06:00:00', '2022-11-23 03:55:33', NULL, NULL),
(14, 'Fedora', 'fedora@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3, 0, 1, '2022-11-24 03:55:52', '2022-11-23 05:39:49', 'fzseffzefzs', ''),
(15, 'Dafnis', 'dafnis@gmail.com', 'f4486284eea94f15507fcfe583ff6901', 2, 1, 0, 1, '2022-11-24 13:25:49', '2022-11-23 05:52:15', '', ''),
(16, 'Almanza', 'Almanza@cisco.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2, 0, 1, '2022-11-24 06:00:00', '2022-11-24 05:03:51', 'Not set yet', 'Not set yet'),
(17, 'Ojitos ', 'ojitos@gmail.com', 'd806e99289fcd33c2bd3f70fa152592f', 1, 4, 0, 1, '2022-11-24 06:00:00', '2022-11-24 14:08:19', 'Not set yet', 'Not set yet');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreers`
--
ALTER TABLE `carreers`
  ADD PRIMARY KEY (`id_career`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indices de la tabla `log_project`
--
ALTER TABLE `log_project`
  ADD PRIMARY KEY (`id_Log_Project`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `Index_stars` (`stars`);

--
-- Indices de la tabla `project_comment`
--
ALTER TABLE `project_comment`
  ADD PRIMARY KEY (`id_project_comment`);

--
-- Indices de la tabla `project_projectcomment`
--
ALTER TABLE `project_projectcomment`
  ADD PRIMARY KEY (`id_project_projectcomment`);

--
-- Indices de la tabla `rainidea_rainideacomment`
--
ALTER TABLE `rainidea_rainideacomment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rain_ideas`
--
ALTER TABLE `rain_ideas`
  ADD PRIMARY KEY (`id_rainideas`),
  ADD KEY `Index_iduser` (`id_user`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_Team`),
  ADD KEY `Index_Group` (`id_Career`);

--
-- Indices de la tabla `types_users`
--
ALTER TABLE `types_users`
  ADD PRIMARY KEY (`id_type_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `Index_CorreoI` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreers`
--
ALTER TABLE `carreers`
  MODIFY `id_career` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `log_project`
--
ALTER TABLE `log_project`
  MODIFY `id_Log_Project` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project_comment`
--
ALTER TABLE `project_comment`
  MODIFY `id_project_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project_projectcomment`
--
ALTER TABLE `project_projectcomment`
  MODIFY `id_project_projectcomment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rainidea_rainideacomment`
--
ALTER TABLE `rainidea_rainideacomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rain_ideas`
--
ALTER TABLE `rain_ideas`
  MODIFY `id_rainideas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id_Team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `types_users`
--
ALTER TABLE `types_users`
  MODIFY `id_type_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
