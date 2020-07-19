
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema php_manual_tinel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `php_manual_tinel` DEFAULT CHARACTER SET utf8mb4 ;
USE `php_manual_tinel` ;

-- -----------------------------------------------------
-- Table `php_manual_tinel`.`catagory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_manual_tinel`.`catagory` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `title_th` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `title` VARCHAR(100) NULL DEFAULT NULL,
  `slug` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `php_manual_tinel`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_manual_tinel`.`posts` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `title_th` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `slug` VARCHAR(200) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NOT NULL,
  `content` TEXT CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `content_th` TEXT CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `image` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NULL DEFAULT NULL,
  `order` INT(4) NULL DEFAULT NULL,
  `catagory_id` INT(2) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `catagory_id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) ,
  INDEX `fk_posts_catagory_idx` (`catagory_id` ASC) ,
  CONSTRAINT `fk_posts_catagory`
    FOREIGN KEY (`catagory_id`)
    REFERENCES `php_manual_tinel`.`catagory` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1001
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `php_manual_tinel`.`tbl_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_manual_tinel`.`tbl_users` (
  `user_id` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `avatar` VARCHAR(100) NOT NULL,
  `status` ENUM('0', '100', '500') NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username` (`username` ASC) ,
  UNIQUE INDEX `email` (`email` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 201
DEFAULT CHARACTER SET = utf8;

INSERT INTO `catagory` (`id`,`title_th`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(11, 'ผู้บริหาร', 'Principle', 'principle.html', '2020-07-18 04:34:24', NULL),
(12, 'ผู้ดูแลระบบ', 'Admin', 'admin.html', '2020-07-18 04:37:20', NULL),
(13, 'ครู', 'Teacher', 'teacher.html', '2020-07-18 04:37:20', NULL),
(14, 'นักเรียน', 'Student', 'student.html', '2020-07-18 04:37:20', NULL),
(15, 'ผู้ปกครอง', 'guardian', 'guardian.php', '2020-07-18 17:00:00', NULL);

INSERT INTO `tbl_users` (`user_id`,`firstname`, `lastname`, `username`, `password`, `email`, `avatar`, `status`) VALUES
(1, 'Dipendra', 'Deshar', 'admin', '430a7a9f52df222bfd4ee6a068c585aa6ef95362816553be1bc9aee3027f61a3', 'jedeshar@gmail.com', '1595156435.png', '500');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
