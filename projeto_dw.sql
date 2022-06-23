-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jan-2021 às 13:58
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_dw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aeroportos`
--

DROP TABLE IF EXISTS `aeroportos`;
CREATE TABLE IF NOT EXISTS `aeroportos` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Sigla` varchar(3) NOT NULL,
  `Nome` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aeroportos`
--

INSERT INTO `aeroportos` (`ID`, `Sigla`, `Nome`) VALUES
(1, 'PDL', 'Ponta Delgada'),
(2, 'OPO', 'Porto'),
(3, 'LIS', 'Lisboa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviao`
--

DROP TABLE IF EXISTS `aviao`;
CREATE TABLE IF NOT EXISTS `aviao` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Lugares` varchar(45) NOT NULL,
  `Lugares_eco` int(45) NOT NULL,
  `Lugares_exec` int(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aviao`
--

INSERT INTO `aviao` (`ID`, `Nome`, `Lugares`, `Lugares_eco`, `Lugares_exec`) VALUES
(1, 'Airbus a330', '160', 30, 130),
(2, 'Airbus a331LR', '160', 30, 130),
(3, 'Airbus a320', '100', 70, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lugar`
--

DROP TABLE IF EXISTS `lugar`;
CREATE TABLE IF NOT EXISTS `lugar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Aviao_ID` int(11) NOT NULL,
  `Executiva` binary(1) NOT NULL,
  `PreçoMult` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID`,`Aviao_ID`),
  KEY `fk_Lugar_Avião1_idx` (`Aviao_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lugar`
--

INSERT INTO `lugar` (`ID`, `Aviao_ID`, `Executiva`, `PreçoMult`) VALUES
(13, 1, 0x31, '2'),
(14, 1, 0x30, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lugar_reserva`
--

DROP TABLE IF EXISTS `lugar_reserva`;
CREATE TABLE IF NOT EXISTS `lugar_reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Lugar_ID` int(11) NOT NULL,
  `Lugar_Aviao_ID` int(11) NOT NULL,
  `Reserva_ID` int(11) NOT NULL,
  `Reserva_Utilizador_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`Lugar_ID`,`Lugar_Aviao_ID`,`Reserva_ID`,`Reserva_Utilizador_ID`),
  KEY `fk_Lugar_Reserva_Lugar1_idx` (`Lugar_ID`,`Lugar_Aviao_ID`),
  KEY `fk_Lugar_Reserva_Reserva1_idx` (`Reserva_ID`,`Reserva_Utilizador_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lugar_reserva`
--

INSERT INTO `lugar_reserva` (`ID`, `Lugar_ID`, `Lugar_Aviao_ID`, `Reserva_ID`, `Reserva_Utilizador_ID`) VALUES
(6, 14, 1, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1610212419),
('m150214_044831_init_user', 1610212422);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`) VALUES
(1, 1, '2021-01-09 17:13:42', NULL, 'the one', NULL),
(2, 2, '2021-01-29 13:25:50', '2021-01-29 13:25:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Utilizador_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`Utilizador_ID`),
  KEY `fk_userid` (`Utilizador_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`ID`, `Utilizador_ID`) VALUES
(12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES
(1, 'Admin', '2021-01-09 17:13:42', NULL, 1),
(2, 'User', '2021-01-09 17:13:42', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trajeto`
--

DROP TABLE IF EXISTS `trajeto`;
CREATE TABLE IF NOT EXISTS `trajeto` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Aviao_ID` int(11) NOT NULL,
  `Tempo_Extimado` time NOT NULL,
  `PrecoTrajeto` double NOT NULL,
  `Data` datetime NOT NULL,
  `Destino_ID` int(3) NOT NULL,
  `Origem_ID` int(3) NOT NULL,
  PRIMARY KEY (`ID`,`Aviao_ID`),
  KEY `fk_Trajeto_Avião1_idx` (`Aviao_ID`),
  KEY `Destino` (`Destino_ID`),
  KEY `Origem` (`Origem_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `trajeto`
--

INSERT INTO `trajeto` (`ID`, `Aviao_ID`, `Tempo_Extimado`, `PrecoTrajeto`, `Data`, `Destino_ID`, `Origem_ID`) VALUES
(10, 1, '09:58:00', 90, '2021-01-16 12:55:00', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trajeto_reserva`
--

DROP TABLE IF EXISTS `trajeto_reserva`;
CREATE TABLE IF NOT EXISTS `trajeto_reserva` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Reserva_ID` int(11) NOT NULL,
  `Trajeto_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`Reserva_ID`,`Trajeto_ID`),
  KEY `fk_Trajeto_Reserva_Reserva1_idx` (`Reserva_ID`),
  KEY `fk_Trajeto_Reserva_Trajeto1_idx` (`Trajeto_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `trajeto_reserva`
--

INSERT INTO `trajeto_reserva` (`ID`, `Reserva_ID`, `Trajeto_ID`) VALUES
(9, 12, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `user_username` (`username`),
  KEY `user_role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(1, 1, 1, 'neo@neo.com', 'neo', '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O', 'h6oYEGDZ5ME8yxUdzTGmXaKwGuydIhJ_', '2K6vxgEmjh2IwJuLg7yBb9mZ0LDGVIfo', '::1', '2021-01-29 11:27:29', NULL, '2021-01-09 17:13:42', NULL, NULL, NULL),
(2, 2, 1, NULL, 'awd', '$2y$13$iiUo9MZWvXFlxr57vRlzX.jxkmh766mCo9meTL0RyKA.2Ix4rH6xG', 'lTHqATkZ-XIRdmijCAQQw5vUqP_Q0LVX', 'DHT8Lh8svrI9ADzzDuQ2J_oVmzyc0i6P', '::1', '2021-01-29 13:25:50', '::1', '2021-01-29 13:25:50', '2021-01-29 13:25:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_auth`
--

DROP TABLE IF EXISTS `user_auth`;
CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_auth_provider_id` (`provider_id`),
  KEY `user_auth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_token_token` (`token`),
  KEY `user_token_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Admin` int(11) NOT NULL,
  `Data de registo` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `lugar`
--
ALTER TABLE `lugar`
  ADD CONSTRAINT `fk_Lugar_Avião1` FOREIGN KEY (`Aviao_ID`) REFERENCES `aviao` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lugar_reserva`
--
ALTER TABLE `lugar_reserva`
  ADD CONSTRAINT `fk_Lugar_Reserva_Lugar1` FOREIGN KEY (`Lugar_ID`,`Lugar_Aviao_ID`) REFERENCES `lugar` (`ID`, `Aviao_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Lugar_Reserva_Reserva1` FOREIGN KEY (`Reserva_ID`,`Reserva_Utilizador_ID`) REFERENCES `reserva` (`ID`, `Utilizador_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`Utilizador_ID`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `trajeto`
--
ALTER TABLE `trajeto`
  ADD CONSTRAINT `fk_Destino` FOREIGN KEY (`Destino_ID`) REFERENCES `aeroportos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Origem` FOREIGN KEY (`Origem_ID`) REFERENCES `aeroportos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Trajeto_Avião1` FOREIGN KEY (`Aviao_ID`) REFERENCES `aviao` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `trajeto_reserva`
--
ALTER TABLE `trajeto_reserva`
  ADD CONSTRAINT `fk_Trajeto_Reserva_Reserva1` FOREIGN KEY (`Reserva_ID`) REFERENCES `reserva` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Trajeto_Reserva_Trajeto1` FOREIGN KEY (`Trajeto_ID`) REFERENCES `trajeto` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Limitadores para a tabela `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
