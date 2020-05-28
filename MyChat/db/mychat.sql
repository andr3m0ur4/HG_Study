-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2019 às 21:06
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_pass` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_profile` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_city` mediumtext COLLATE latin1_general_ci NOT NULL,
  `user_gender` mediumtext COLLATE latin1_general_ci NOT NULL,
  `forgotten_answer` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `log_in` varchar(7) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_city`, `user_gender`, `forgotten_answer`, `log_in`) VALUES
(1, 'André', 'poseidon1', 'andremoura@net.com', 'images/andre.jpg.91', 'Guaratinguetá', 'Masculino', 'Peter Parker', 'Offline'),
(2, 'Levi', 'ackerman', 'levi@gmail.com', 'images/codingcafe1.png', 'S&atilde;o Jos&eacute; dos Campos', 'Masculino', NULL, 'Offline'),
(3, 'Maria', '123456789', 'maria@gmail.com', 'images/codingcafe1.png', 'Guaratinguet&aacute;', 'Feminino', NULL, 'Offline'),
(4, 'Eren', 'Jeager123', 'eren@net.com', 'images/eren-jaeger--73.jpg.74', 'Lorena', 'Masculino', NULL, 'Offline'),
(5, 'Armin', 'arlet123', 'armin@hotmail.com', 'images/armin-arlert--66.2.jpg.89', 'Guaratinguetá', 'Masculino', NULL, 'Offline'),
(6, 'Jean', 'kirschstein', 'jean@gmail.com', 'images/jean_kirschtein.jpg.12', 'Cachoeira Paulista', 'Masculino', 'Marco', 'Offline'),
(7, 'Sasha', 'braus1234', 'sasha@net.com', 'images/sasha.jpg.67', 'Guaratinguet&aacute;', 'Feminino', 'Conny', 'Online'),
(9, 'Ervin', 'smith123', 'ervin@hotmail.com', 'images/codingcafe2.png', 'S&atilde;o Paulo', 'Masculino', NULL, NULL),
(10, 'Conny', 'springer123', 'conny@gmail.com', 'images/codingcafe1.png', 'Guaratinguet&aacute;', 'Masculino', NULL, 'Online'),
(11, 'Annie', 'leonhart123', 'annie@net.com', 'images/annie.jpg.37', 'S&atilde;o Paulo', 'Feminino', 'Bertholdth', 'Offline'),
(12, 'Reiner', '123456789', 'reiner@net.com', 'images/codingcafe1.png', 'São José dos Campos', 'Masculino', NULL, NULL),
(13, 'Bertoldth', 'hoover123', 'bertoldth@net.com', 'images/codingcafe1.png', 'S&atilde;o Jos&eacute; dos Campos', 'Masculino', NULL, 'Offline'),
(14, 'Hange', '123456789', 'hange@gmail.com', 'images/codingcafe2.png', 'S&atilde;o Paulo', 'Feminino', NULL, NULL),
(15, 'Chrysta', 'reis1234', 'chrysta@gmail.com', 'images/codingcafe2.png', 'Guaratinguet&aacute;', 'Feminino', NULL, NULL),
(16, 'Marco', '123456789', 'marco@hotmail.com', 'images/codingcafe1.png', 'Guaratinguet&aacute;', 'Masculino', NULL, 'Offline'),
(17, 'Mikasa', 'ackerman123', 'mikasa@gmail.com', 'images/mikasa.jpg.79', 'Guaratinguetá', 'Feminino', 'Eren', 'Offline'),
(18, 'André', '123456789', 'andre@gmail.com', 'images/codingcafe2.png', 'Guaratinguetá', 'Masculino', NULL, 'Offline'),
(19, 'Ymir_ç', 'senhaé123', 'ymir@gmail.com', 'images/codingcafe2.png', 'Guaratinguetá', 'Feminino', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `receiver_username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `msg_content` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `msg_status` text COLLATE latin1_general_ci NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(1, 'Levi', 'Andre', 'Voc&ecirc; &eacute; muito forte', 'read', '2019-06-15 00:45:56'),
(2, 'Andre', 'Levi', 'Voc&eacute; &eacute; realmente forte', 'read', '2019-06-15 00:49:03'),
(3, 'Andre', 'Levi', 'nossa que legal', 'read', '2019-06-15 00:50:13'),
(4, 'Andre', 'Levi', 'Agora sim o design esta come&ccedil;ando a ficar bom', 'read', '2019-06-15 01:04:40'),
(5, 'Andre', 'Eren', 'est&aacute; melhorando', 'unread', '2019-06-15 01:10:55'),
(6, 'Andre', 'Levi', 'preciso realizar este teste', 'read', '2019-06-15 01:37:04'),
(7, 'Levi', 'Andre', 'E ai mlk', 'read', '2019-06-15 01:38:30'),
(8, 'André', 'Armin', 'Oi Armin', 'unread', '2019-06-15 02:40:41'),
(9, 'Andre', 'Sasha', 'Hello', 'unread', '2019-06-15 04:47:58'),
(10, 'Andre', 'Jean', 'Hello', 'unread', '2019-06-15 05:30:48'),
(11, 'Andre', 'Eren', 'oi', 'unread', '2019-06-15 05:40:40'),
(12, 'Andre', 'Eren', 'hey', 'unread', '2019-06-15 05:41:38'),
(13, 'Annie', 'Reiner', 'Ol&aacute;', 'unread', '2019-06-15 23:39:40'),
(14, 'Annie', 'Reiner', 'Ol&aacute;', 'unread', '2019-06-15 23:39:47'),
(15, 'Annie', 'Marco', 'Me perdoe por ser obrigada a isso', 'unread', '2019-06-15 23:40:25'),
(16, 'Annie', 'Levi', 'Eu nem tenho palavras', 'unread', '2019-06-15 23:40:49'),
(17, 'Annie', 'Eren', 'Eren, outra hora, est&aacute; bem', 'unread', '2019-06-15 23:41:20'),
(18, 'Annie', 'Armin', 'Eu subestimei vc Armin', 'unread', '2019-06-15 23:41:40'),
(19, 'Annie', 'Bertoldth', 'V&aacute; embora!', 'unread', '2019-06-15 23:42:01'),
(20, 'Annie', 'Mikasa', 'Fique longe de mim', 'unread', '2019-06-15 23:42:20'),
(21, 'Eren', 'Armin', 'Armin agora eu entendo q vc nunca foge', 'read', '2019-06-15 23:56:52'),
(22, 'Eren', 'Armin', 'isso é injusto', 'read', '2019-06-15 23:57:13'),
(23, 'Armin', 'Eren', 'Eren, eu nunca fujo...', 'unread', '2019-06-16 00:16:53'),
(24, 'Armin', 'Jean', 'Jean,vc lidera a equipe', 'unread', '2019-06-16 00:17:13'),
(25, 'Armin', 'Bertoldth', 'Quem não tem coragem de abandonar algo, nunca poderá alcançar nada', 'unread', '2019-06-16 00:18:28'),
(26, 'Armin', 'Hange', 'eu tenho um plano', 'unread', '2019-06-16 00:18:49'),
(27, 'Armin', 'Mikasa', 'proteja o Eren', 'unread', '2019-06-16 00:19:02'),
(28, 'Jean', 'Chrysta', 'Oi... eu me casaria com vc tranquilamente', 'unread', '2019-06-16 01:55:34'),
(29, 'Sasha', 'Conny', 'Oi', 'read', '2019-06-16 02:21:17'),
(30, 'Sasha', 'Conny', 'como vc está', 'read', '2019-06-16 02:21:34'),
(31, 'Conny', 'Sasha', 'e ai', 'read', '2019-06-16 02:27:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
