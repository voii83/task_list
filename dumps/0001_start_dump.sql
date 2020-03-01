CREATE DATABASE IF NOT EXISTS `beejee`;
USE `beejee`;

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
	(1, 'admin', 'admin@email.com', '$2y$08$F2mLZrbykKt7GhrX15zE7eTxi5FE.a/og6/Jwocyrc.odWIYjCIdO');

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `done` enum('0','1') NOT NULL DEFAULT '0',
  `redact` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `task`  
  ADD FOREIGN KEY ( `id_user` ) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;