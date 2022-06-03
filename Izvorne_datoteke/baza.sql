-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema WebDiP2021x064
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema WebDiP2021x064
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WebDiP2021x064` DEFAULT CHARACTER SET utf8 ;
USE `WebDiP2021x064` ;

-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`korisnik` (
  `korisnik_id` INT NOT NULL,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `telefon` VARCHAR(45) NOT NULL,
  `datum_rodenja` DATE NOT NULL,
  `korisnicko_ime` VARCHAR(45) NOT NULL,
  `lozinka` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`korisnik_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`tip_korisnika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`tip_korisnika` (
  `tip_id` INT NOT NULL,
  `naziv_tipa` VARCHAR(45) NOT NULL,
  `korisnik_id` INT NOT NULL,
  PRIMARY KEY (`tip_id`, `korisnik_id`),
  UNIQUE INDEX `tip_id_UNIQUE` (`tip_id` ASC) ,
  INDEX `fk_tip_korisnika_korisnik1_idx` (`korisnik_id` ASC) ,
  CONSTRAINT `fk_tip_korisnika_korisnik1`
    FOREIGN KEY (`korisnik_id`)
    REFERENCES `WebDiP2021x064`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`benzinska_postaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`benzinska_postaja` (
  `benzinska_id` INT NOT NULL,
  `naziv` VARCHAR(45) NOT NULL,
  `adresa` VARCHAR(45) NOT NULL,
  `godina_nastanka` INT NOT NULL,
  `natoceno` INT NOT NULL,
  `korisnik_id` INT NOT NULL,
  PRIMARY KEY (`benzinska_id`, `korisnik_id`),
  INDEX `fk_benzinska_postaja_korisnik1_idx` (`korisnik_id` ASC) ,
  CONSTRAINT `fk_benzinska_postaja_korisnik1`
    FOREIGN KEY (`korisnik_id`)
    REFERENCES `WebDiP2021x064`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`grad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`grad` (
  `grad_id` INT NOT NULL,
  `naziv_grada` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`grad_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`sadrzi_benzinsku`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`sadrzi_benzinsku` (
  `benzinska_id` INT NOT NULL,
  `grad_id` INT NOT NULL,
  PRIMARY KEY (`benzinska_id`, `grad_id`),
  INDEX `fk_sadrzi_benzinsku_grad1_idx` (`grad_id` ASC) ,
  CONSTRAINT `fk_sadrzi_benzinsku_benzinska_postaja1`
    FOREIGN KEY (`benzinska_id`)
    REFERENCES `WebDiP2021x064`.`benzinska_postaja` (`benzinska_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sadrzi_benzinsku_grad1`
    FOREIGN KEY (`grad_id`)
    REFERENCES `WebDiP2021x064`.`grad` (`grad_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`status_goriva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`status_goriva` (
  `status_goriva_id` INT NOT NULL,
  `ima` TINYINT NOT NULL,
  PRIMARY KEY (`status_goriva_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`gorivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`gorivo` (
  `gorivo_id` INT NOT NULL,
  `naziv_goriva` VARCHAR(45) NOT NULL,
  `cijena` DOUBLE NOT NULL,
  `kolicina` DOUBLE NOT NULL,
  `status_goriva_id` INT NOT NULL,
  `korisnik_id` INT NOT NULL,
  PRIMARY KEY (`gorivo_id`, `status_goriva_id`, `korisnik_id`),
  INDEX `fk_gorivo_status_goriva1_idx` (`status_goriva_id` ASC) ,
  INDEX `fk_gorivo_korisnik1_idx` (`korisnik_id` ASC) ,
  CONSTRAINT `fk_gorivo_status_goriva1`
    FOREIGN KEY (`status_goriva_id`)
    REFERENCES `WebDiP2021x064`.`status_goriva` (`status_goriva_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gorivo_korisnik1`
    FOREIGN KEY (`korisnik_id`)
    REFERENCES `WebDiP2021x064`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`sadrzi_gorivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`sadrzi_gorivo` (
  `benzinska_id` INT NOT NULL,
  `gorivo_id` INT NOT NULL,
  PRIMARY KEY (`benzinska_id`, `gorivo_id`),
  INDEX `fk_sadrzi_gorivo_gorivo1_idx` (`gorivo_id` ASC) ,
  CONSTRAINT `fk_sadrzi_gorivo_benzinska_postaja1`
    FOREIGN KEY (`benzinska_id`)
    REFERENCES `WebDiP2021x064`.`benzinska_postaja` (`benzinska_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sadrzi_gorivo_gorivo1`
    FOREIGN KEY (`gorivo_id`)
    REFERENCES `WebDiP2021x064`.`gorivo` (`gorivo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`status_mjesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`status_mjesta` (
  `status_mjesta_id` INT NOT NULL,
  `slobodno` TINYINT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`status_mjesta_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`mjesto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`mjesto` (
  `mjesto_id` INT NOT NULL,
  `naziv` VARCHAR(45) NOT NULL,
  `korisnik_id` INT NOT NULL,
  `benzinska_id` INT NOT NULL,
  `status_mjesta_id` INT NOT NULL,
  PRIMARY KEY (`mjesto_id`, `benzinska_id`, `status_mjesta_id`),
  INDEX `fk_mjesto_benzinska_postaja1_idx` (`benzinska_id` ASC) ,
  INDEX `fk_mjesto_status_mjesta1_idx` (`status_mjesta_id` ASC) ,
  CONSTRAINT `fk_mjesto_benzinska_postaja1`
    FOREIGN KEY (`benzinska_id`)
    REFERENCES `WebDiP2021x064`.`benzinska_postaja` (`benzinska_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mjesto_status_mjesta1`
    FOREIGN KEY (`status_mjesta_id`)
    REFERENCES `WebDiP2021x064`.`status_mjesta` (`status_mjesta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`vozilo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`vozilo` (
  `vozilo_id` INT NOT NULL,
  `marka` VARCHAR(45) NOT NULL,
  `model` VARCHAR(45) NOT NULL,
  `registracija` VARCHAR(45) NOT NULL,
  `prijedeni_km` INT NOT NULL,
  `gorivo_id` INT NOT NULL,
  PRIMARY KEY (`vozilo_id`, `gorivo_id`),
  INDEX `fk_vozilo_gorivo1_idx` (`gorivo_id` ASC) ,
  CONSTRAINT `fk_vozilo_gorivo1`
    FOREIGN KEY (`gorivo_id`)
    REFERENCES `WebDiP2021x064`.`gorivo` (`gorivo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`tocenje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`tocenje` (
  `tocenje_id` INT NOT NULL,
  `kolicina_natocenog_goriva` INT NOT NULL,
  `mjesto_id` INT NOT NULL,
  `vozilo_id` INT NOT NULL,
  `gorivo_id` INT NOT NULL,
  PRIMARY KEY (`tocenje_id`, `mjesto_id`, `vozilo_id`, `gorivo_id`),
  INDEX `fk_tocenje_mjesto1_idx` (`mjesto_id` ASC) ,
  INDEX `fk_tocenje_vozilo1_idx` (`vozilo_id` ASC) ,
  INDEX `fk_tocenje_gorivo1_idx` (`gorivo_id` ASC) ,
  UNIQUE INDEX `gorivo_gorivo_id_UNIQUE` (`gorivo_id` ASC) ,
  CONSTRAINT `fk_tocenje_mjesto1`
    FOREIGN KEY (`mjesto_id`)
    REFERENCES `WebDiP2021x064`.`mjesto` (`mjesto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tocenje_vozilo1`
    FOREIGN KEY (`vozilo_id`)
    REFERENCES `WebDiP2021x064`.`vozilo` (`vozilo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tocenje_gorivo1`
    FOREIGN KEY (`gorivo_id`)
    REFERENCES `WebDiP2021x064`.`gorivo` (`gorivo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x064`.`korisnik_vozilo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x064`.`korisnik_vozilo` (
  `korisnik_id` INT NOT NULL,
  `vozilo_id` INT NOT NULL,
  PRIMARY KEY (`korisnik_id`, `vozilo_id`),
  INDEX `fk_korisnik_vozilo_vozilo1_idx` (`vozilo_id` ASC) ,
  CONSTRAINT `fk_korisnik_vozilo_korisnik`
    FOREIGN KEY (`korisnik_id`)
    REFERENCES `WebDiP2021x064`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_korisnik_vozilo_vozilo1`
    FOREIGN KEY (`vozilo_id`)
    REFERENCES `WebDiP2021x064`.`vozilo` (`vozilo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
