SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema php_manual_tinel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `php_manual_tinel` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema php_manual_tinel
-- -----------------------------------------------------

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
  `title_th` VARCHAR(100) CHARACTER SET 'utf8mb4' NULL,
  `title` VARCHAR(100) NULL,
  `slug` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) VISIBLE)
ENGINE = InnoDB;

USE `php_manual_tinel` ;

-- -----------------------------------------------------
-- Table `php_manual_tinel`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_manual_tinel`.`posts` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) CHARACTER SET 'utf8mb4' NULL,
  `title_th` VARCHAR(100) CHARACTER SET 'utf8mb4' NULL,
  `slug` VARCHAR(200) CHARACTER SET 'utf8mb4' NOT NULL,
  `content` TEXT CHARACTER SET 'utf8mb4' NULL,
  `content_th` TEXT CHARACTER SET 'utf8mb4' NULL,
  `image` VARCHAR(255) CHARACTER SET 'utf8mb4' NULL,
  `order` INT(4) NULL,
  `catagory_id` INT(2) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`, `catagory_id`),
  INDEX `fk_posts_catagory_idx` (`catagory_id` ASC) VISIBLE,
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) VISIBLE,
  CONSTRAINT `fk_posts_catagory`
    FOREIGN KEY (`catagory_id`)
    REFERENCES `php_manual_tinel`.`catagory` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `catagory` (`id`, `title_th`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(11, 'ผู้บริหาร', 'Principle', 'principle.html', '2020-07-18 11:34:24', NULL),
(12, 'ผู้ดูแลระบบ', 'Admin', 'admin.html', '2020-07-18 11:37:20', NULL),
(13, 'ครู', 'Teacher', 'teacher.html', '2020-07-18 11:37:20', NULL),
(14, 'นักเรียน', 'Student', 'student.html', '2020-07-18 11:37:20', NULL);
(15, 'ผู้ปกครอง', 'guardian', 'guardian.html', '2020-07-18 11:37:20', NULL);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;