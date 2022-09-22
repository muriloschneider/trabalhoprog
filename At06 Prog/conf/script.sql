-- Thu Sep 22 14:53:43 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ibge
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ibge
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ibge` DEFAULT CHARACTER SET utf8 ;
USE `ibge` ;

-- -----------------------------------------------------
-- Table `ibge`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ibge`.`cidade` (
  `idcidade` INT NOT NULL AUTO_INCREMENT,
  `nome_cidade` VARCHAR(250) NULL,
  `estado` VARCHAR(250) NULL,
  PRIMARY KEY (`idcidade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ibge`.`entrevistador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ibge`.`entrevistador` (
  `identrevistador` INT NOT NULL AUTO_INCREMENT,
  `nome_entrevistador` VARCHAR(250) NULL,
  `cpf` VARCHAR(250) NULL,
  `cidade` INT NOT NULL,
  PRIMARY KEY (`identrevistador`),
  CONSTRAINT `fk_entrevistador_cidade1`
    FOREIGN KEY (`cidade`)
    REFERENCES `ibge`.`cidade` (`idcidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ibge`.`cidadao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ibge`.`cidadao` (
  `idcidadao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NULL,
  `cpf` VARCHAR(250) NULL,
  `profissao` VARCHAR(250) NULL,
  `renda` VARCHAR(250) NULL,
  `raca` VARCHAR(250) NULL,
  `nascimento` DATE NULL,
  `entrevistador` INT NOT NULL,
  `cidade` INT NOT NULL,
  PRIMARY KEY (`idcidadao`),
  CONSTRAINT `fk_cidadao_entrevistador`
    FOREIGN KEY (`entrevistador`)
    REFERENCES `ibge`.`entrevistador` (`identrevistador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cidadao_cidade1`
    FOREIGN KEY (`cidade`)
    REFERENCES `ibge`.`cidade` (`idcidade`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ibge`.`contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ibge`.`contato` (
  `idcontato` INT NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `idcidadao` INT NOT NULL,
  PRIMARY KEY (`idcontato`),
  CONSTRAINT `fk_contato_cidadao1`
    FOREIGN KEY (`idcidadao`)
    REFERENCES `ibge`.`cidadao` (`idcidadao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;