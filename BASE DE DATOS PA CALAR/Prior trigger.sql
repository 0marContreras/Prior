-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 21:59:46
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
-- Base de datos: `prior_actualizada`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `available_Project` (IN `Description_a` TEXT, IN `Logotipos_a` VARCHAR(255), IN `ide_Team` INT, IN `Score_a` INT, IN `num_score_a` INT, IN `stars_a` INT, IN `Created_at` DATE, IN `Updated_at` DATE, OUT `Have_Project` INT)   BEGIN
		START TRANSACTION;					
    	
        SELECT id_project INTO Have_Project FROM Team WHERE id_Team = ide_Team;
        

	IF Have_Project <> 0 THEN
    	
    	ROLLBACK;
	ELSE         
    
    	INSERT INTO project (Description, Logotipos, id_Team, Score, num_score, stars, Created_at, 						Updated_at)
           		VALUES( Description_a, Logotipos_a , ide_Team, Score_a, num_score_a, stars_a, Created_at, 						Updated_at);
      
    	COMMIT;
        
 	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Comp_login` (IN `ide_user` INT, IN `firstname_OP` VARCHAR(100), IN `lastname_OP` VARCHAR(100), IN `user_email_OP` VARCHAR(100), IN `user_password_OP` VARCHAR(100), IN `ide_type_user` INT, IN `ide_admin` INT, IN `ide_group` INT, IN `ide_team` INT, IN `active_OP` TINYINT, IN `created_at_OP` TIMESTAMP, IN `updated_at_OP` TIMESTAMP, OUT `comparation` BOOLEAN)   BEGIN
	START TRANSACTION;
    	SELECT EXISTS(SELECT user_email FROM users WHERE user_email = user_email_OP);
    
      	INSERT INTO users (id_user, firtname, lastname, user_email, user_password, id_type_user, id_admin, 				id_group, id_team, active)
    		VALUES(ide_user, firstname_OP, lastname_OP, user_email_OP, user_password_OP, ide_type_user, 					ide_admin, ide_group, ide_team, active_OP, NOW(), NOW());
            
      IF comparation = 1 THEN
      	ROLLBACK;
      ELSE
      	COMMIT;
   	  END IF;	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `finale_score` (IN `project_ide` INT, IN `project_num_score` INT, IN `project_score` VARCHAR(2))   BEGIN
    	START TRANSACTION;
        	
        UPDATE project SET num_score = project_num_score;
        UPDATE project SET Score = project_score;
            
            IF project_score = "AU" || project_score = "DE" || project_score = "AU" ||
            project_score = "SA" || project_score = "NA" THEN
        		IF project_num_score <= 10 THEN
                	COMMIT;
                ELSE 
                	ROLLBACK;
                END IF;
             ELSE 
             	ROLLBACK;
             END IF;   
END$$

DELIMITER ;

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
  `nameuser` varchar(55) NOT NULL,
  `gropuser` varchar(55) NOT NULL,
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
  `id_ProjectComment` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rainidea_comment`
--

CREATE TABLE `rainidea_comment` (
  `id_RComment` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `nameuser` varchar(55) NOT NULL,
  `groupuser` varchar(55) NOT NULL,
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
  `nameuser` varchar(55) NOT NULL,
  `groupuser` varchar(55) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id_Team` int(11) NOT NULL,
  `N_integra` int(11) NOT NULL,
  `id_Project` int(11) NOT NULL,
  `id_Career` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id_Team`, `N_integra`, `id_Project`, `id_Career`, `id_group`) VALUES
(1, 4, 1, 1, 1);

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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nameuser` varchar(55) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(16) NOT NULL,
  `id_type_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `Index_Group` (`id_group`,`id_Career`);

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
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_rainideas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id_Team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `types_users`
--
ALTER TABLE `types_users`
  MODIFY `id_type_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
