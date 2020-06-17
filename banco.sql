CREATE TABLE `secure_login` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `username` VARCHAR(30) NOT NULL, 
  `comando` VARCHAR(50) NOT NULL, 
  `dados` LONGTEXT NOT NULL
) ENGINE = InnoDB;