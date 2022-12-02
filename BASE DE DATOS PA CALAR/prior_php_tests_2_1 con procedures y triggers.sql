-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2022 a las 01:35:13
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
-- Base de datos: `prior_php_tests_2.1`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `available_Project` (IN `Description_a` TEXT, IN `Logotipos_a` VARCHAR(255), IN `ide_Team` INT, IN `Score_a` INT, IN `num_score_a` INT, IN `stars_a` INT, IN `Created_at` DATE, IN `Updated_at` DATE, OUT `Have_Project` INT)   BEGIN 
    	START TRANSACTION; 
        
        SELECT id_project INTO Have_Project FROM Team WHERE id_Team = ide_Team; 
        
        IF Have_Project <> 0 THEN ROLLBACK; 			
        
        ELSE INSERT INTO project (Description, Logotipos, id_Team, Score, num_score, stars, Created_at, Updated_at) VALUES( Description_a, Logotipos_a , ide_Team, Score_a, num_score_a, stars_a, Created_at, Updated_at); 
        COMMIT; 
        END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Comp_login` (IN `ide_user` INT, IN `firstname_OP` VARCHAR(100), IN `lastname_OP` VARCHAR(100), IN `user_email_OP` VARCHAR(100), IN `user_password_OP` VARCHAR(100), IN `ide_type_user` INT, IN `ide_admin` INT, IN `ide_group` INT, IN `ide_team` INT, IN `active_OP` TINYINT, IN `created_at_OP` TIMESTAMP, IN `updated_at_OP` TIMESTAMP, OUT `comparation` BOOLEAN)   BEGIN 
        
        START TRANSACTION; 
        
        SELECT EXISTS(SELECT user_email FROM users WHERE user_email = user_email_OP); INSERT INTO users (id_user, firtname, lastname,   		user_email, user_password, id_type_user, id_admin, id_group, id_team, active) 
        VALUES(ide_user, firstname_OP, lastname_OP, user_email_OP, user_password_OP, ide_type_user, ide_admin, ide_group, ide_team, 		active_OP, NOW(), NOW());
	            
        IF comparation = 1
            
        THEN
        
        ROLLBACK; 
        
        ELSE 
        
        COMMIT; 
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `finale_score` (IN `project_ide` INT, IN `project_num_score` INT, IN `project_score` VARCHAR(2))   BEGIN 
   	START TRANSACTION;
    UPDATE project SET num_score = project_num_score; 
    UPDATE project SET Score = project_score; IF project_score = "AU" || project_score = "DE" || project_score = "AU" ||
    project_score = "SA" || project_score = "NA" 
    
    THEN IF project_num_score <= 10 
    
    THEN COMMIT; 
    
    ELSE 
    
    ROLLBACK;
    
    END IF;
    
    ELSE ROLLBACK;
    
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
-- Estructura de tabla para la tabla `log_profiles`
--

CREATE TABLE `log_profiles` (
  `id_Log_Profiles` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `id_group` int(11) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Volcado de datos para la tabla `log_project`
--

INSERT INTO `log_project` (`id_Log_Project`, `id_project`, `Project_name`, `Project_description`, `Log_Logo`, `Log_Score`, `created_at`, `updated_at`) VALUES
(1, 6, 'Projecto Mango ', 'Hola y Adiós', '', 'no', '2022-11-27', '2022-11-27'),
(2, 4, 'Projecto Hola', 'Hola Como estas', '', 'no', '2022-11-27', '2022-11-27'),
(3, 6, 'Projecto Mango ', 'Hola y Adiós', '', 'no', '2022-11-27', '2022-11-27'),
(4, 4, 'Projecto Hola', 'Hola Como estas', 0xffd8ffe000104a46494600010100000100010000ffdb008400090607131112101310131512131611111812111812150f1616191518161615191516181f2820181a251b181523312125292b302e2f171f3338332d43282d2e2d010a0a0a0e0d0e1a10101b2d1f1e1f2d2d2d2d2d2d2d2b2f2b2d2d2d2d2d2d2d2d2d302b2d2d2d2d2d2d2d2d2d2d2d2d2d2d2b2d2d2d2d2b2d2b2d372d2d2d2d2dffc000110800e100e103012200021101031101ffc4001c0001010002030101000000000000000000000605070203040108ffc4004910000103020205080508070607000000000100020304110521061231415107132261718191a114233292b1334243526272c1d115247382b2c2e117253453a2d2164454558394b3ffc4001801010003010000000000000000000000000001020304ffc40020110101000202020301010000000000000000010211033113411232612151ffda000c03010002110311003f00de2888808888088880888808888088880888808888088880888808888088880888808888088880888808888088880888808888088b5f625a4b5588cd25260ce6c7146ed5aac4dcdd7630ef653b7648febd9d99141618c6394d48d0eaa9e2801d9aef6b09fba0e6eee52cee57709bd9b50f7f5b69e723cd8b9613a074503b9c7b0d6541f6eaaa4fa4bc9e203ba2df0baa568b64000380161e4af30b59de49e92ffdaee143da9a46f59a69ff00dab2341ca3e1537b15d08fda38d3ff00f50d59739edcd63ebb03a59c5a6a7865fbd0b1de6429f1a3c8cf53d4b2401d1bdaf69d8e6b83c7885dab5dd4f26d43773e984b4529194b4f349091c3a37b792c6cafc6b0f7599551d647f359531d891d52b33d6fbca3c756f246d645aef0de55236b9b1e274f2503c9004a7d7d392721eb5832ef161bcad814d50c91ad7c6e6bd8e00b5ed707b5c0ec208c88545dd888880888808888088880888808888088880888808888088be136ccec410fca26272cafa7c2a8dc595156099a51b60a669b48fea2ecda3b0e60d967b0cc362a4863a6a66864518b01bc9dee71de49b927792a5f93abd54b88e2cfcfd22630d25f3d5a780ea02de1ace0491c597deac169c78fb67c997a1114d62fa7d87533b524a96b9f7b737187543afc088c1b1edb2d77a65a52a2843ca631df2387e2120fade8e180f58bb90f295abede1988b4711035ff00cc147ca1a5dae13c2d7b4b5c2e0ed0a362e54b0fcb9e33d3136ca6a691b6ed2d0e1e6a930ac7696abfc354453710c91ae70ed6ed0a770d54fe358473770e01f13b2cc070fbae1b14bd1c93e0ef33d0eb494b7bd45017122df39f4f7f65c386ff000b6d69a20f696b85c119851d8951185e5a731b5a788fcd4d9329aa896e3771738262d0d6411d453bc3e291b76bbc88237381b823710bdcb51685d7fe8dc47d18e5495c49887cd8aa46d68e01e2d971b702b6eae6b3574e997736222284888880888808888088880888808888088880a5b94ec54d361956f65f9c7b045101b75e622316eb1ac4f72a9507ca0fafaec128f68755bea641f6695bacdd6ea25de4833d82618292969699bf450b1a4f1701d23de6e7bd7ad7399d771ed5c17463351cf95dd6b0c52a65c5ea2a62e75f0e1f4f2ba17318751f53233e535ddba31b2c36dfc2b745704a0a66eab228e37765afc2eedae3da5454b51fa1eb2a21a90452d5543e6a6a8b5dad74962f8dfc083b3ab3dea9a0af89fec48c776385fc124967ea996565fc5cb2383708ff00d25754eca7f9dcd8f747c1496b0e217174ad1b5c076901478ff4f37e3d989b222eb47d265b3045c5faafb948e3ba2746f066d4f469197709e03cc3da46fe8e44f75d64eb31e823daf0f3f559d33e3b07795278d636fa8cada9183932f7bf5b8ef57bad695c7e56efa7b74434f6a209a2a7c45e2686570645576d57b1eec9ad980c883b35b76d37ddb2b1ba3e72336f69b9b7f11e1f82d112d1baae6a7a3845e49656175be8e369d67bddc2c02fd0ea98b5ca354e95d019a99fcde52c644b0386d6c91f49a5bd7b477ada9a2d8c0ada4a6a96fd2c4d711c1d6b3c773811dca3312839b95eddd7cbb0e63e2b9f24353cdfa7d09fa0a8e7211b3d5545de00ec707fbca3967b5b86fa6c544458b611110111101111011110111101111011110140d21e7f486a9f7b8a3c3a28adb83e77196fdba992be5afb93b773b363b556ce4c49f083c5b4ed0d67938a988bd2b911174b99e3c5f0b86aa27c3531b658dc3a4d3e44119b48dc46616b0c63932aaa725d874a278b7534c755ed1c239761efb77adb68ab66d32bf3dd5c93d39b5552544046d718cc8cee7b722bc6348298fd20f75df92fd20bacc0c3b5ad3fba0a8f8d4ee3f3ac38cc721b422499df56389ef3e1659fc2f44713ac22d10a188ed966ce4b7d988677edb76addcd681b001d992fa9f1369ed10d0fa7c398ee6b5a495ff2b50fe948feabfcd6f50efbed54288ad26909ad278ed231dc59f03fd4299c2e734d8c50ca3d9a98e5a6973e039d88db79d616ec55fa54de8c47839c3c403f8284c6e5d4a9c21fc313a76fbfac133faa30fbb752222e675088880888808888088880888808888088883aaaa611b1ef3b1ac738f634125437251116e134cf7e4f9a49e6775ebc8f20fbbaab3bca1d5f3386620f06c452cc01e05ed2c1e642e1a2f49ccd061f16f652400f6ea375bceead876ae7d322888ba1ce22220222202222022220c3e940f54dfda0fe172d75a6cfd482397fcaaaa592fc356402fe6b63e93fc88fda37e0e5aef4de1d7a0ab1c23d6f70877e097eb513ed1bb015f578b03a9e769a9a4faf044ef7980fe2bdab95d62222022220222202222022220222202222086e59897618f841b19ea296116dbd295a7e0d2aa656d880360000ee0a4f949025a9c0a9ced7e24d9adc453b0b89eed61e2ab263d23dab4e3ed9f274e0888b66222220222202222022220c46939f54dfda37f85ca2f1b875e9ea19f5a09478b4ab1d293d08c7dbf803f9a9899b76b871691e214ce95f6afe4d26d7c2b0e3c29626fb8353f054aa2391694bb06a2bed6f3edf766900f2b2b75c8ec1111011110111101111011110111101111041e3244da418747b7d1a86aa73ff0094f323bf25544a90c01fcf6358d4d6ca1868e998efbc0c920ee70f82ae5af1c65c944445ab2111101111011110111106074a9df243ef9fe153eb37a52ee9c63ec93e27fa2c22b4e94bdb27c8a3bfbbdecff2eb2ad87aba7adfccaf96b9e45ba31e28ce18ad41f7991fe4b632e4aec822228488888088880888808888088880b8bdc0024e400249ea0b9294e5471634d86d4965f9d95a20840da5f37406af5805c7f75061b92bbc94b53567fe72beaa76ee3a81dcdb478b5de2ac578b02c30525353530fa1823613c5c0748f7bae57b56f84d473e777444521a5fa68ca40036ee7b9da91b5a35e491e72d58dbbf3233fe97b2aaf5d6fa8637da7b476b8050345a238a62003ebea4d0c4ed94d11e726b1faf29c987b3c02cd52f24785b739217d43ed9be59e4793db620792a5e49e9a4e3bed4b14cd77b0e6bbb0877c17353551c946187a50c4fa6900e8cb0cf2c6f6f58b923c962aaaaab7052d358f757e1c5c01abd5fd629af90e780f9466ce96df2062727fa5e3be9748b8432b5ed6b98439ae68735c0dc381170411b410b9ad198888a44be933bd68ea8c7c49589591d2075e77f5068f207f158e568a57a392275a6c659c2b2377becfe8b64ad5fc921fd7f1e1bb5e80f8b25bada0b932eebb31ea0888a12222202222022220222202299c734ee86924e65f29927ff00a7858ea996fc0b580ea9cc64e2162ffb47cae309c58b78fa10f86ba0ba5af7484fa7635434833868586aea378321b369da783864eec715e9772a942c6dea19554a6c4eacd472b0f65da1c2fdeb17c9457c32c75756f9e175656cee924844ac7491462ed8632d06f93758ecdfd4a67f516ea2edc6e495f11174399e7c465d48a470da1a6dda720a17933c39b535f88564a03cd34829e981cf9bb36f2b8759bedeb2acb1f3681ffba3fd4148f25b373588e2d4e764820a88c71b8d590fbc4782a727d57e3fb368a222c5b8baaaa9d92b1f1c8d0f63dae6bd845c39ae16208de085da8835d682eb524f598548e2e14feba8dc4dcba9a53b3af51c6d7eb564a5b4bdbcc62f82d40c84a6a2965fb41edd68813f7ee555385891d6b5e3be98f24feedf11116acd198b3ef34a7ed91e197e0bc8b9ccfd6738f1738f89bae0aea3ef2483f5fc78eed7a01e0c97f35b416b6e48dbebf1a771aa85bee467f35b2571e5dd7663d41111424444404444044440515a755d3cd3d2e19492185f50d924a9a86fb7153c793b5383dc7a20eef316ab5fe96547a163386d5bf2867825a37c8720c79773b15fef3b2ee27720a5c0b01a5c3e3e6e9626b3eb3bda91e78c8f39b8f6af79aa3badf15d257c5bcc230b9daed339391008e045d4f633a1d4156499a922d6faec6f32fedd7658f9ace229f8c47cab1b806102923313669a66ebb8b0ccfe75cc06d6635d604b46ebdce7b5649175cf3b58d2e79b01bff252ab15a4f2da36b77b9d7ee6ff005214768ef471ea6236c9413b1fd8d7078f3596c4ab4ccf2e390d8d1c07e6b1fc99c1e978955d6b738208452c2edcf79707ca5bd9b3ac3828e4fe62b71ff726d74445cee8117c26d99c94e62ba7d86d31226ad8411b5ad773ce1dad8ee6e830bcaafca605c7f4dd179975d57d47b456aad2be5070eacadc1c327bc10d53e69a57452c6d698dbeabda6826eebecd9bd6caa2c4a2a96f3b4f23268c9203d8e0f196eb8dfd4b4e3ed9f274ef5d752fd563cf06b8f802bb17831c975607f5d9a3bce7e575b314804445766f5f2359b7167f1c4e56fbac67e6b63281e4522feef7ca3e9eb6ae5bf1bbf53f915f2e3bdbb6742222848888808888088880b19a4981435f4f2d3540bb1e368c9cd2336b9a77381cd64d106ada2d20a8c21cda5c66ef86e1b4d8a35a5cc7b7635b50332c7f5fc6dac6e692aa3958d7c4f6c8c70bb5ec707b48ea232594a9a7648d73246b5ec70b398e687348e041c8850988f24f485c64a2967c3de6e48864f544f1746ef80202d31cf5db3cb0df4ab74806d207690179a5c4e16ed91bd80eb7c144bf93fc559f2788c137ed6979bf36125716e84632ec9d574718facc8a490f83800afe4c54f1e4a7a9d2268ca369278bb21e0333e4a431fd2b8633fac4c35fe6c4de9bb3d81ac6e6b254fc954927f8ec4ea2617f6216b68dbd86dad71e0ab347b42a8286c69a998d7ff9aebcb267b7d63ee4760c945e5ff1338bfdad7787e035f8ae458fc3a88fb723c5aa656ef6b23fa3073173db9ec5b5b05c261a3863a7a7608e28c59ad1e2493bc93724ef257b91656dbdb598c9d0a6f4cb4b1b4222632375455cc7569a959ed3cef2e3f35837bbfada916bad0f02a312c66b2417962a9f43841fa38e21996f00f39f8f149365ba83342ea2b7d663954f92f98c3e9dee829d80ee71075a43d77cb3ccaa4c3301a3a616a6a4822fb4236eb77bad73de57b8a2d6613db1b9da4a03810e6b083b5a58d23c0aeb820646d0d8dad6346c6b5a1805f6e4325d88af248adb68a6f496af59cd8c6c6e6eed3b0770f8af66298db580b623acefadb437f32a689be6733bcab48a5af8b1da455e29e9aa253f36376aeebb8e4d1dee2164561a9693f4a57c34b1f4a9a9a46cd5d27cd25bf270df6125db470bfd54cf2d44e18eeb64f27d851a4c368a170d573606978e0f7f4dff00ea7154288b91d6222202222022220222202222022220222202222022220281d23c06ae92aa5c430b689c4c1be9942e7737ce160b36485c726bc0cadbf3db757c885feb5d43ca5d103a957cf50cb9de2a881f19cb6d9c01042ef7728d86fcdaa8ddfbed67f110aea7818f167b5af1c1cd0e1e0562a7d13a079bbe8a95c789a689c7cdab49c959de388d9f946a53ec4f4edeb3335c7c8858caad34a77fb75b111c04ad03c02d83ff0005e1bff6fa3ffd587fdab9c5a2587b736d0d234f114b08fe553e5fc478a7fad592697d0b76d4c7dd777c02ea8f4be1932a58ea2a9db3561a791fe6405b9a1c269d9ec41137b22637e017adad036649e5a78a350d268d62988652346194c7da717096a5ede0d0328ee379cc75ad97a398041410360a566a30664ed73dc76b9eef9ce3c7bb72ca22cedb7b69249d0888a12222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220ffd9, 'no', '2022-11-29', '2022-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_team`
--

CREATE TABLE `log_team` (
  `id_log_team` int(11) NOT NULL,
  `name_team` varchar(100) NOT NULL,
  `description_team` text NOT NULL,
  `image_team` longblob NOT NULL
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
  `id_group` int(11) DEFAULT NULL,
  `Score` varchar(50) NOT NULL,
  `num_score` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `Created_at` date NOT NULL,
  `Updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id_project`, `project_name`, `Description`, `Logotipos`, `id_Team`, `id_group`, `Score`, `num_score`, `stars`, `Created_at`, `Updated_at`) VALUES
(4, 'Projecto Hola', 'Hola Como estas', 0xffd8ffe000104a46494600010100000100010000ffdb008400090607131112101310131512131611111812111812150f1616191518161615191516181f2820181a251b181523312125292b302e2f171f3338332d43282d2e2d010a0a0a0e0d0e1a10101b2d1f1e1f2d2d2d2d2d2d2d2b2f2b2d2d2d2d2d2d2d2d2d302b2d2d2d2d2d2d2d2d2d2d2d2d2d2d2b2d2d2d2d2b2d2b2d372d2d2d2d2dffc000110800e100e103012200021101031101ffc4001c0001010002030101000000000000000000000605070203040108ffc4004910000103020205080508070607000000000100020304110521061231415107132261718191a114233292b1334243526272c1d115247382b2c2e117253453a2d2164454558394b3ffc4001801010003010000000000000000000000000001020304ffc40020110101000202020301010000000000000000010211033113411232612151ffda000c03010002110311003f00de2888808888088880888808888088880888808888088880888808888088880888808888088880888808888088880888808888088b5f625a4b5588cd25260ce6c7146ed5aac4dcdd7630ef653b7648febd9d99141618c6394d48d0eaa9e2801d9aef6b09fba0e6eee52cee57709bd9b50f7f5b69e723cd8b9613a074503b9c7b0d6541f6eaaa4fa4bc9e203ba2df0baa568b64000380161e4af30b59de49e92ffdaee143da9a46f59a69ff00dab2341ca3e1537b15d08fda38d3ff00f50d59739edcd63ebb03a59c5a6a7865fbd0b1de6429f1a3c8cf53d4b2401d1bdaf69d8e6b83c7885dab5dd4f26d43773e984b4529194b4f349091c3a37b792c6cafc6b0f7599551d647f359531d891d52b33d6fbca3c756f246d645aef0de55236b9b1e274f2503c9004a7d7d392721eb5832ef161bcad814d50c91ad7c6e6bd8e00b5ed707b5c0ec208c88545dd888880888808888088880888808888088880888808888088be136ccec410fca26272cafa7c2a8dc595156099a51b60a669b48fea2ecda3b0e60d967b0cc362a4863a6a66864518b01bc9dee71de49b927792a5f93abd54b88e2cfcfd22630d25f3d5a780ea02de1ace0491c597deac169c78fb67c997a1114d62fa7d87533b524a96b9f7b737187543afc088c1b1edb2d77a65a52a2843ca631df2387e2120fade8e180f58bb90f295abede1988b4711035ff00cc147ca1a5dae13c2d7b4b5c2e0ed0a362e54b0fcb9e33d3136ca6a691b6ed2d0e1e6a930ac7696abfc354453710c91ae70ed6ed0a770d54fe358473770e01f13b2cc070fbae1b14bd1c93e0ef33d0eb494b7bd45017122df39f4f7f65c386ff000b6d69a20f696b85c119851d8951185e5a731b5a788fcd4d9329aa896e3771738262d0d6411d453bc3e291b76bbc88237381b823710bdcb51685d7fe8dc47d18e5495c49887cd8aa46d68e01e2d971b702b6eae6b3574e997736222284888880888808888088880888808888088880a5b94ec54d361956f65f9c7b045101b75e622316eb1ac4f72a9507ca0fafaec128f68755bea641f6695bacdd6ea25de4833d82618292969699bf450b1a4f1701d23de6e7bd7ad7399d771ed5c17463351cf95dd6b0c52a65c5ea2a62e75f0e1f4f2ba17318751f53233e535ddba31b2c36dfc2b745704a0a66eab228e37765afc2eedae3da5454b51fa1eb2a21a90452d5543e6a6a8b5dad74962f8dfc083b3ab3dea9a0af89fec48c776385fc124967ea996565fc5cb2383708ff00d25754eca7f9dcd8f747c1496b0e217174ad1b5c076901478ff4f37e3d989b222eb47d265b3045c5faafb948e3ba2746f066d4f469197709e03cc3da46fe8e44f75d64eb31e823daf0f3f559d33e3b07795278d636fa8cada9183932f7bf5b8ef57bad695c7e56efa7b74434f6a209a2a7c45e2686570645576d57b1eec9ad980c883b35b76d37ddb2b1ba3e72336f69b9b7f11e1f82d112d1baae6a7a3845e49656175be8e369d67bddc2c02fd0ea98b5ca354e95d019a99fcde52c644b0386d6c91f49a5bd7b477ada9a2d8c0ada4a6a96fd2c4d711c1d6b3c773811dca3312839b95eddd7cbb0e63e2b9f24353cdfa7d09fa0a8e7211b3d5545de00ec707fbca3967b5b86fa6c544458b611110111101111011110111101111011110140d21e7f486a9f7b8a3c3a28adb83e77196fdba992be5afb93b773b363b556ce4c49f083c5b4ed0d67938a988bd2b911174b99e3c5f0b86aa27c3531b658dc3a4d3e44119b48dc46616b0c63932aaa725d874a278b7534c755ed1c239761efb77adb68ab66d32bf3dd5c93d39b5552544046d718cc8cee7b722bc6348298fd20f75df92fd20bacc0c3b5ad3fba0a8f8d4ee3f3ac38cc721b422499df56389ef3e1659fc2f44713ac22d10a188ed966ce4b7d988677edb76addcd681b001d992fa9f1369ed10d0fa7c398ee6b5a495ff2b50fe948feabfcd6f50efbed54288ad26909ad278ed231dc59f03fd4299c2e734d8c50ca3d9a98e5a6973e039d88db79d616ec55fa54de8c47839c3c403f8284c6e5d4a9c21fc313a76fbfac133faa30fbb752222e675088880888808888088880888808888088883aaaa611b1ef3b1ac738f634125437251116e134cf7e4f9a49e6775ebc8f20fbbaab3bca1d5f3386620f06c452cc01e05ed2c1e642e1a2f49ccd061f16f652400f6ea375bceead876ae7d322888ba1ce22220222202222022220c3e940f54dfda0fe172d75a6cfd482397fcaaaa592fc356402fe6b63e93fc88fda37e0e5aef4de1d7a0ab1c23d6f70877e097eb513ed1bb015f578b03a9e769a9a4faf044ef7980fe2bdab95d62222022220222202222022220222202222086e59897618f841b19ea296116dbd295a7e0d2aa656d880360000ee0a4f949025a9c0a9ced7e24d9adc453b0b89eed61e2ab263d23dab4e3ed9f274e0888b66222220222202222022220c46939f54dfda37f85ca2f1b875e9ea19f5a09478b4ab1d293d08c7dbf803f9a9899b76b871691e214ce95f6afe4d26d7c2b0e3c29626fb8353f054aa2391694bb06a2bed6f3edf766900f2b2b75c8ec1111011110111101111011110111101111041e3244da418747b7d1a86aa73ff0094f323bf25544a90c01fcf6358d4d6ca1868e998efbc0c920ee70f82ae5af1c65c944445ab2111101111011110111106074a9df243ef9fe153eb37a52ee9c63ec93e27fa2c22b4e94bdb27c8a3bfbbdecff2eb2ad87aba7adfccaf96b9e45ba31e28ce18ad41f7991fe4b632e4aec822228488888088880888808888088880b8bdc0024e400249ea0b9294e5471634d86d4965f9d95a20840da5f37406af5805c7f75061b92bbc94b53567fe72beaa76ee3a81dcdb478b5de2ac578b02c30525353530fa1823613c5c0748f7bae57b56f84d473e777444521a5fa68ca40036ee7b9da91b5a35e491e72d58dbbf3233fe97b2aaf5d6fa8637da7b476b8050345a238a62003ebea4d0c4ed94d11e726b1faf29c987b3c02cd52f24785b739217d43ed9be59e4793db620792a5e49e9a4e3bed4b14cd77b0e6bbb0877c17353551c946187a50c4fa6900e8cb0cf2c6f6f58b923c962aaaaab7052d358f757e1c5c01abd5fd629af90e780f9466ce96df2062727fa5e3be9748b8432b5ed6b98439ae68735c0dc381170411b410b9ad198888a44be933bd68ea8c7c49589591d2075e77f5068f207f158e568a57a392275a6c659c2b2377becfe8b64ad5fc921fd7f1e1bb5e80f8b25bada0b932eebb31ea0888a12222202222022220222202299c734ee86924e65f29927ff00a7858ea996fc0b580ea9cc64e2162ffb47cae309c58b78fa10f86ba0ba5af7484fa7635434833868586aea378321b369da783864eec715e9772a942c6dea19554a6c4eacd472b0f65da1c2fdeb17c9457c32c75756f9e175656cee924844ac7491462ed8632d06f93758ecdfd4a67f516ea2edc6e495f11174399e7c465d48a470da1a6dda720a17933c39b535f88564a03cd34829e981cf9bb36f2b8759bedeb2acb1f3681ffba3fd4148f25b373588e2d4e764820a88c71b8d590fbc4782a727d57e3fb368a222c5b8baaaa9d92b1f1c8d0f63dae6bd845c39ae16208de085da8835d682eb524f598548e2e14feba8dc4dcba9a53b3af51c6d7eb564a5b4bdbcc62f82d40c84a6a2965fb41edd68813f7ee555385891d6b5e3be98f24feedf11116acd198b3ef34a7ed91e197e0bc8b9ccfd6738f1738f89bae0aea3ef2483f5fc78eed7a01e0c97f35b416b6e48dbebf1a771aa85bee467f35b2571e5dd7663d41111424444404444044440515a755d3cd3d2e19492185f50d924a9a86fb7153c793b5383dc7a20eef316ab5fe96547a163386d5bf2867825a37c8720c79773b15fef3b2ee27720a5c0b01a5c3e3e6e9626b3eb3bda91e78c8f39b8f6af79aa3badf15d257c5bcc230b9daed339391008e045d4f633a1d4156499a922d6faec6f32fedd7658f9ace229f8c47cab1b806102923313669a66ebb8b0ccfe75cc06d6635d604b46ebdce7b5649175cf3b58d2e79b01bff252ab15a4f2da36b77b9d7ee6ff005214768ef471ea6236c9413b1fd8d7078f3596c4ab4ccf2e390d8d1c07e6b1fc99c1e978955d6b738208452c2edcf79707ca5bd9b3ac3828e4fe62b71ff726d74445cee8117c26d99c94e62ba7d86d31226ad8411b5ad773ce1dad8ee6e830bcaafca605c7f4dd179975d57d47b456aad2be5070eacadc1c327bc10d53e69a57452c6d698dbeabda6826eebecd9bd6caa2c4a2a96f3b4f23268c9203d8e0f196eb8dfd4b4e3ed9f274ef5d752fd563cf06b8f802bb17831c975607f5d9a3bce7e575b314804445766f5f2359b7167f1c4e56fbac67e6b63281e4522feef7ca3e9eb6ae5bf1bbf53f915f2e3bdbb6742222848888808888088880b19a4981435f4f2d3540bb1e368c9cd2336b9a77381cd64d106ada2d20a8c21cda5c66ef86e1b4d8a35a5cc7b7635b50332c7f5fc6dac6e692aa3958d7c4f6c8c70bb5ec707b48ea232594a9a7648d73246b5ec70b398e687348e041c8850988f24f485c64a2967c3de6e48864f544f1746ef80202d31cf5db3cb0df4ab74806d207690179a5c4e16ed91bd80eb7c144bf93fc559f2788c137ed6979bf36125716e84632ec9d574718facc8a490f83800afe4c54f1e4a7a9d2268ca369278bb21e0333e4a431fd2b8633fac4c35fe6c4de9bb3d81ac6e6b254fc954927f8ec4ea2617f6216b68dbd86dad71e0ab347b42a8286c69a998d7ff9aebcb267b7d63ee4760c945e5ff1338bfdad7787e035f8ae458fc3a88fb723c5aa656ef6b23fa3073173db9ec5b5b05c261a3863a7a7608e28c59ad1e2493bc93724ef257b91656dbdb598c9d0a6f4cb4b1b4222632375455cc7569a959ed3cef2e3f35837bbfada916bad0f02a312c66b2417962a9f43841fa38e21996f00f39f8f149365ba83342ea2b7d663954f92f98c3e9dee829d80ee71075a43d77cb3ccaa4c3301a3a616a6a4822fb4236eb77bad73de57b8a2d6613db1b9da4a03810e6b083b5a58d23c0aeb820646d0d8dad6346c6b5a1805f6e4325d88af248adb68a6f496af59cd8c6c6e6eed3b0770f8af66298db580b623acefadb437f32a689be6733bcab48a5af8b1da455e29e9aa253f36376aeebb8e4d1dee2164561a9693f4a57c34b1f4a9a9a46cd5d27cd25bf270df6125db470bfd54cf2d44e18eeb64f27d851a4c368a170d573606978e0f7f4dff00ea7154288b91d6222202222022220222202222022220222202222022220281d23c06ae92aa5c430b689c4c1be9942e7737ce160b36485c726bc0cadbf3db757c885feb5d43ca5d103a957cf50cb9de2a881f19cb6d9c01042ef7728d86fcdaa8ddfbed67f110aea7818f167b5af1c1cd0e1e0562a7d13a079bbe8a95c789a689c7cdab49c959de388d9f946a53ec4f4edeb3335c7c8858caad34a77fb75b111c04ad03c02d83ff0005e1bff6fa3ffd587fdab9c5a2587b736d0d234f114b08fe553e5fc478a7fad592697d0b76d4c7dd777c02ea8f4be1932a58ea2a9db3561a791fe6405b9a1c269d9ec41137b22637e017adad036649e5a78a350d268d62988652346194c7da717096a5ede0d0328ee379cc75ad97a398041410360a566a30664ed73dc76b9eef9ce3c7bb72ca22cedb7b69249d0888a12222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220ffd9, 3, 1, 'not set yet', 0, 0, '2022-11-26', '2022-11-26'),
(6, 'Projecto Mango ', 'Hola y Adiós', '', 4, 3, 'not set yet', 0, 0, '2022-11-27', '2022-11-27'),
(7, 'Mangadex', 'Plataforma para manga, manwha y manhua', '', 5, 3, 'not set yet', 0, 0, '2022-11-28', '2022-11-28'),
(8, 'Gol', 'Golazoooo', '', 6, 1, 'not set yet', 0, 0, '2022-11-28', '2022-11-28'),
(9, '4ta transformación', 'Si furula \r\n', '', 7, 2, 'not set yet', 0, 0, '2022-11-28', '2022-11-28'),
(10, 'Fast Fix', 'AJFEopfapoehfninoehaeiufei e fafeas ffdsdsfdsadds ', '', 9, 1, 'not set yet', 0, 0, '2022-11-28', '2022-11-28');

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

--
-- Volcado de datos para la tabla `project_comment`
--

INSERT INTO `project_comment` (`id_project_comment`, `Comment`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Hola como andan, muy buena idea eh', 1, '2022-11-30', '2022-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_projectcomment`
--

CREATE TABLE `project_projectcomment` (
  `id_project_projectcomment` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_ProjectComment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `project_projectcomment`
--

INSERT INTO `project_projectcomment` (`id_project_projectcomment`, `id_project`, `id_ProjectComment`) VALUES
(1, 10, 2);

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
(1, 'not set yet', 'Idea 2 ', 14, 0, 1, '2022-11-25 00:00:00', '2022-11-25 06:35:07', 'Idea 2 '),
(2, 'not set yet', 'Computadora Cuantica ', 20, 0, 1, '2022-11-28 00:00:00', '2022-11-28 00:57:56', 'Si, es lo que parece\r\n'),
(3, 'not set yet', 'Idea la mera neta ', 25, 0, 1, '2022-11-29 00:00:00', '2022-11-29 18:35:48', 'Ps es una ídea');

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
(2, 'Team 1', 'Team 1', 0, 3, '', 8989, '2022-11-25', '2022-11-25 07:13:25'),
(3, 'Team 2 ', 'This is a test', 4, 3, '', 5245, '2022-11-26', '2022-11-26 23:17:28'),
(4, 'febreration', 'Pues un equipillo ahí nomás', 6, 4, '', 2662, '2022-11-27', '2022-11-27 22:43:25'),
(5, 'Esos 4', 'Esos 4 son la neta', 7, 3, '', 4191, '2022-11-28', '2022-11-28 00:24:28'),
(6, 'EL TOLUCAAAA', 'Mejor equipo ', 8, 4, '', 3965, '2022-11-28', '2022-11-28 03:21:05'),
(7, 'No team', 'No team', 0, 0, '', 0, '2022-11-27', '2022-11-27 20:27:52'),
(8, 'La cuarta', 'Si', 0, 2, '', 2408, '2022-11-28', '2022-11-28 03:59:47'),
(9, 'Equipo 543824', 'Equipo 34120874308312343', 10, 1, '', 3819, '2022-11-28', '2022-11-28 14:32:07');

--
-- Disparadores `team`
--
DELIMITER $$
CREATE TRIGGER `log_team` AFTER UPDATE ON `team` FOR EACH ROW INSERT INTO log_team(name_team, Description_team, image_team)
VALUES(old.id_team, old.name_team, old.description_team, old.logo)
$$
DELIMITER ;

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
  `pictures` blob DEFAULT NULL
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
(14, 'Fedora', 'fedora@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3, 3, 1, '2022-11-28 01:34:24', '2022-11-23 05:39:49', 'Fedora Linux is a Linux distribution developed by the Fedora Project. Fedora contains software distributed under various free and open-source licenses and aims to be on the leading edge of open-source technologies. ', ''),
(15, 'Dafnis', 'dafnis@gmail.com', 'f4486284eea94f15507fcfe583ff6901', 2, 1, 0, 1, '2022-11-24 13:25:49', '2022-11-23 05:52:15', '', ''),
(16, 'Almanza', 'Almanza@cisco.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2, 0, 1, '2022-11-24 06:00:00', '2022-11-24 05:03:51', 'Not set yet', 0x4e6f742073657420796574),
(17, 'Ojitos ', 'ojitos@gmail.com', 'd806e99289fcd33c2bd3f70fa152592f', 1, 4, 0, 1, '2022-11-24 06:00:00', '2022-11-24 14:08:19', 'Not set yet', 0x4e6f742073657420796574),
(18, 'Enero ', 'enero@gmail.com', 'e59abcbf368e95ff31f1f28dc4fa5fe2', 1, 3, 3, 1, '2022-11-27 02:05:25', '2022-11-27 02:41:20', 'Not set yet', 0x4e6f742073657420796574),
(19, 'febrero', 'febrero@gmail.com', 'ab85f491d0bc4fbdfa552f1082844234', 1, 4, 4, 1, '2022-11-27 21:43:25', '2022-11-27 22:38:51', 'Not set yet', 0x4e6f742073657420796574),
(20, 'mayo ', 'mayo@gmail.com', '8980773d4785a8bdec7235f58934d60b', 1, 2, 5, 1, '2022-11-28 01:16:31', '2022-11-28 00:08:24', 'Yo soy una mayonesa, esto lleva a la pregunta, soy un instrumento??', ''),
(21, 'Juan Perez que le va al toluca', 'toluca@gmail.com', '592d6b3eb781b805c585d4ecc99eb8f2', 1, 2, 6, 1, '2022-11-28 02:21:05', '2022-11-28 03:20:24', 'Not set yet', 0x4e6f742073657420796574),
(22, 'Javi', 'Javi@gmail.com', '38696558dc98494c08d951c052900a2a', 1, 1, 7, 1, '2022-11-28 02:29:22', '2022-11-28 03:25:39', 'Not set yet', 0x4e6f742073657420796574),
(23, 'Amlo', 'amlo@gmail.com', '3047af7fec35eaee2a7832dfa4823d7e', 1, 4, 8, 1, '2022-11-28 02:59:47', '2022-11-28 03:31:12', 'Not set yet', 0x4e6f742073657420796574),
(24, 'Raziel', 'raziel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 9, 1, '2022-11-28 13:32:07', '2022-11-28 14:31:07', 'Not set yet', 0x4e6f742073657420796574),
(25, 'Eladmin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1, 7, 1, '2022-11-29 06:00:00', '2022-11-29 18:17:05', 'Not set yet', 0x4e6f742073657420796574),
(26, 'Omar Contreras', 'o@omar.com', 'd4466cce49457cfea18222f5a7cd3573', 1, 1, 7, 1, '2022-11-29 06:00:00', '2022-11-29 19:43:04', 'Not set yet', 0x4e6f742073657420796574),
(27, 'Javier Acosta', 'Javier@Javier.com', 'ab02fceb9689114b1cd1844e456c0695', 1, 1, 7, 1, '2022-11-29 06:00:00', '2022-11-29 20:29:23', 'Not set yet', 0x4e6f742073657420796574),
(28, 'Elia Ornelas', 'elia@gmail.com', '0f0eb7f241a387cd387f5bf40fe7cca8', 2, 1, 7, 1, '2022-11-30 19:39:59', '2022-11-30 20:36:49', 'Hola Mundo', ''),
(29, 'Elia', 'elia@gmail.con', '81dc9bdb52d04dc20036dbd8313ed055', 2, 3, 7, 1, '2022-11-30 06:00:00', '2022-11-30 20:43:28', 'Not set yet', 0x4e6f742073657420796574);

--
-- Disparadores `users`
--
DELIMITER $$
CREATE TRIGGER `Log_User` AFTER UPDATE ON `users` FOR EACH ROW INSERT INTO log_profiles(id_profile, name, Description, id_group, image)
VALUES(old.id_user, old.Username, old.descriptions, old.id_group, old.pictures)
$$
DELIMITER ;

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
-- Indices de la tabla `log_profiles`
--
ALTER TABLE `log_profiles`
  ADD PRIMARY KEY (`id_Log_Profiles`);

--
-- Indices de la tabla `log_project`
--
ALTER TABLE `log_project`
  ADD PRIMARY KEY (`id_Log_Project`);

--
-- Indices de la tabla `log_team`
--
ALTER TABLE `log_team`
  ADD PRIMARY KEY (`id_log_team`);

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
-- AUTO_INCREMENT de la tabla `log_profiles`
--
ALTER TABLE `log_profiles`
  MODIFY `id_Log_Profiles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_project`
--
ALTER TABLE `log_project`
  MODIFY `id_Log_Project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `log_team`
--
ALTER TABLE `log_team`
  MODIFY `id_log_team` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `project_comment`
--
ALTER TABLE `project_comment`
  MODIFY `id_project_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project_projectcomment`
--
ALTER TABLE `project_projectcomment`
  MODIFY `id_project_projectcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rainidea_rainideacomment`
--
ALTER TABLE `rainidea_rainideacomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rain_ideas`
--
ALTER TABLE `rain_ideas`
  MODIFY `id_rainideas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id_Team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `types_users`
--
ALTER TABLE `types_users`
  MODIFY `id_type_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
