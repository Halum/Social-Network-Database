SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS comment;

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_ibfk_1` (`post_id`),
  KEY `comment_ibfk_2` (`user_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS friend_request;

CREATE TABLE `friend_request` (
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  PRIMARY KEY (`user_id_from`,`user_id_to`),
  KEY `friendship_request_ibfk_2` (`user_id_to`),
  CONSTRAINT `friendship_request_ibfk_1` FOREIGN KEY (`user_id_from`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `friendship_request_ibfk_2` FOREIGN KEY (`user_id_to`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS friendship;

CREATE TABLE `friendship` (
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  PRIMARY KEY (`user_id_1`,`user_id_2`),
  KEY `friendship_ibfk_2` (`user_id_2`),
  CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user_id_1`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user_id_2`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS message;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `message_ibfk_1` (`user_id_from`),
  KEY `message_ibfk_2` (`user_id_to`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id_from`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_id_to`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS post;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_posted` int(11) NOT NULL,
  `user_id_got_post` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` enum('status','wallpost','image','video','comment') DEFAULT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_ibfk_1` (`user_id_posted`),
  KEY `post_ibfk_2` (`user_id_got_post`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id_posted`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id_got_post`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'no',
  `activation_key` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO user VALUES("26","Halum","Sajjad Hossain","0000-00-00","7110eda4d09e062aa5e4a390b0a572ac0d2c0220","my.lost.word@gmail.com","male","yes","19995855");
INSERT INTO user VALUES("27","A","Sajjad Hossain","0000-00-00","40bd001563085fc35165329ea1ff5c5ecbdbbeef","my.lost.word@gmail.comm","male","yes","57330310");



SET FOREIGN_KEY_CHECKS=1;

