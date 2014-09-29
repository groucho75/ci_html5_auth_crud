CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



INSERT INTO `items` (`id`, `name`, `description`, `published`, `updated`) VALUES
(1, 'Item 1', 'My first item',  1, '2014-06-04 10:47:42'),
(2, 'Item 2', 'That is the 2nd item, amazing', 1, '2014-06-15 21:17:00'),
(3, 'Item 3', 'The 3rd item, please let me know if you like it', 0, '2014-07-01 12:32:35');
