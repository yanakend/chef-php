BEGIN;

use test;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `people` (`id`, `name`, `email`) VALUES
(1, 'Garden spade', 'test1@test.com'),
(2, 'Cotton hammock', 'test2@test.com'),
(3, 'Single airbed', 'test3@test.com');

COMMIT;
