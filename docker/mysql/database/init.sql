CREATE DATABASE IF NOT EXISTS `buuGym` /*!40100 COLLATE 'utf8_general_ci' */;

CREATE USER 'buuGym'@'localhost' IDENTIFIED BY '123456';
CREATE USER 'buuGym'@'%' IDENTIFIED BY '123456';

GRANT ALL ON *.* TO 'buuGym'@'localhost';
GRANT ALL ON *.* TO 'buuGym'@'%';

FLUSH PRIVILEGES;
