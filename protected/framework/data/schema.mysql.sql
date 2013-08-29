SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `galych_yiiag` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `galych_yiiag` ;

-- -----------------------------------------------------
-- Table `galych_yiiag`.`FaqCategories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`FaqCategories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NULL ,
  `orderCategory` INT NOT NULL ,
  `isActive` TINYINT(1) NULL DEFAULT true ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`FaqBody`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`FaqBody` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ask` VARCHAR(250) NULL ,
  `answer` VARCHAR(500) NULL ,
  `isActive` TINYINT(1) NOT NULL DEFAULT true ,
  `faqCategory` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_FaqBody_1` (`faqCategory` ASC) ,
  CONSTRAINT `fk_FaqBody_1`
    FOREIGN KEY (`faqCategory` )
    REFERENCES `galych_yiiag`.`FaqCategories` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`Inqury`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`Inqury` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`ContactUs`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`ContactUs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `inquiryId` INT NULL ,
  `name` VARCHAR(50) NULL ,
  `email` VARCHAR(200) NULL ,
  `phone` VARCHAR(20) NULL ,
  `message` VARCHAR(500) NULL ,
  `date` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ContactUs_2` (`inquiryId` ASC) ,
  CONSTRAINT `fk_ContactUs_2`
    FOREIGN KEY (`inquiryId` )
    REFERENCES `galych_yiiag`.`Inqury` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`Servises`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`Servises` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(30) NULL ,
  `description` VARCHAR(200) NULL ,
  `text` TEXT NULL ,
  `pageUrl` VARCHAR(50) NULL ,
  `image` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`DynamicPages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`DynamicPages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `uri` VARCHAR(50) NULL ,
  `title` VARCHAR(100) NULL ,
  `quote` VARCHAR(100) NULL ,
  `image` VARCHAR(50) NULL ,
  `content` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uri_UNIQUE` (`uri` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`HomePageBanners`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`HomePageBanners` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NULL ,
  `description` VARCHAR(255) NULL ,
  `image` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`HomePageBlocks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`HomePageBlocks` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(30) NULL ,
  `description` VARCHAR(500) NULL ,
  `image` VARCHAR(30) NOT NULL ,
  `btnUrl` VARCHAR(200) NULL ,
  `btnImg` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`BannerButtons`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`BannerButtons` (
  `id` INT UNSIGNED NOT NULL ,
  `image` VARCHAR(50) NULL ,
  `bannerId` INT NULL ,
  `url` VARCHAR(200) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_BannerButtons_1` (`bannerId` ASC) ,
  CONSTRAINT `fk_BannerButtons_1`
    FOREIGN KEY (`bannerId` )
    REFERENCES `galych_yiiag`.`HomePageBanners` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `galych_yiiag`.`ContactUsPageText`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `galych_yiiag`.`ContactUsPageText` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `text` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
