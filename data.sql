SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS friendship;

CREATE TABLE `friendship` (
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  PRIMARY KEY (`user_id_1`,`user_id_2`),
  KEY `friendship_ibfk_2` (`user_id_2`),
  CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user_id_1`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user_id_2`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




SET FOREIGN_KEY_CHECKS=1;

