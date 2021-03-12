
DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` text NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(11,7) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `location_urls`;
CREATE TABLE IF NOT EXISTS `location_urls` (
  `location_id` int(4) NOT NULL,
  `location_url` varchar(255) NOT NULL,
  PRIMARY KEY (`location_id`,`location_url`),
  KEY `location_id` (`location_id`),
  FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`post_id`),
  FOREIGN KEY (`post_id`) REFERENCES `location` (`id`) ON DELETE CASCADE;
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `user_role` enum('user','admin') NOT NULL DEFAULT 'user',
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `inscription_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;