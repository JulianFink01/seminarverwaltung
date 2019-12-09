-- MySQL Script generated by MySQL Workbench
-- Mon Dec  9 08:18:25 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema seminarverwaltung
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema seminarverwaltung
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `seminarverwaltung` DEFAULT CHARACTER SET utf8 ;
USE `seminarverwaltung` ;

-- -----------------------------------------------------
-- Table `seminarverwaltung`.`teilnehmer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `seminarverwaltung`.`teilnehmer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `vorname` VARCHAR(45) NULL,
  `nachname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `token` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminarverwaltung`.`fortbildung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `seminarverwaltung`.`fortbildung` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `status` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminarverwaltung`.`kurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `seminarverwaltung`.`kurs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datum` DATE NULL,
  `titel` VARCHAR(45) NULL,
  `maxTeilnehmer` INT NULL,
  `referent` VARCHAR(100) NULL,
  `beschreibung` TEXT NULL,
  `ort_raum` VARCHAR(50) NULL,
  `kontakt` VARCHAR(45) NULL,
  `von` TIME NULL,
  `bis` TIME NULL,
  `unterschriftsliste_zweispaltig` TINYINT NULL,
  `koordination` VARCHAR(45) NULL,
  `anmeldeschluss` DATE NULL,
  `fortbildung_id` INT NOT NULL,
  `dauer` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_kurs_fortbildung1_idx` (`fortbildung_id` ASC),
  CONSTRAINT `fk_kurs_fortbildung1`
    FOREIGN KEY (`fortbildung_id`)
    REFERENCES `seminarverwaltung`.`fortbildung` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `seminarverwaltung`.`nimmt_teil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `seminarverwaltung`.`nimmt_teil` (
  `fortbildung_id` INT NOT NULL,
  `teilnehmer_id` INT NOT NULL,
  `kurs_id` INT NOT NULL,
  PRIMARY KEY (`fortbildung_id`, `teilnehmer_id`),
  INDEX `fk_fortbildung_has_teilnehmer_teilnehmer1_idx` (`teilnehmer_id` ASC) ,
  INDEX `fk_fortbildung_has_teilnehmer_fortbildung_idx` (`fortbildung_id` ASC) ,
  INDEX `fk_fortbildung_has_teilnehmer_kurs1_idx` (`kurs_id` ASC),
  CONSTRAINT `fk_fortbildung_has_teilnehmer_fortbildung`
    FOREIGN KEY (`fortbildung_id`)
    REFERENCES `seminarverwaltung`.`fortbildung` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fortbildung_has_teilnehmer_teilnehmer1`
    FOREIGN KEY (`teilnehmer_id`)
    REFERENCES `seminarverwaltung`.`teilnehmer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fortbildung_has_teilnehmer_kurs1`
    FOREIGN KEY (`kurs_id`)
    REFERENCES `seminarverwaltung`.`kurs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;