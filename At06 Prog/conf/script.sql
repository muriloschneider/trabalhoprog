    CREATE SCHEMA IF NOT EXISTS `ibge` DEFAULT CHARACTER SET utf8 ;
    USE `ibge` ;

    -- -----------------------------------------------------
    -- Table `ibge`.`cidade`
    -- -----------------------------------------------------
    CREATE TABLE IF NOT EXISTS `ibge`.`cidade` (
    `idcidade` INT NOT NULL,
    `nome_cidade` VARCHAR(250) NULL,
    `estado` VARCHAR(250) NULL,
    PRIMARY KEY (`idcidade`))
    ENGINE = InnoDB;


    -- -----------------------------------------------------
    -- Table `ibge`.`entrevistador`
    -- -----------------------------------------------------
    CREATE TABLE IF NOT EXISTS `ibge`.`entrevistador` (
    `identrevistador` INT NOT NULL,
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
    `renda` DECIMAL NULL,
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
