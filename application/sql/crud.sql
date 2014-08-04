CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



INSERT INTO `items` (`id`, `name`, `updated`) VALUES
(1, 'Item 1', '2014-06-04 10:47:42'),
(2, 'Item 2', '2014-06-15 21:17:00'),
(3, 'Item 3', '2014-07-01 12:32:35');
