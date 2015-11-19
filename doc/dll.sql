-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema attivita
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `attivita` ;

-- -----------------------------------------------------
-- Schema attivita
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `attivita` DEFAULT CHARACTER SET utf8 ;
USE `attivita` ;

-- -----------------------------------------------------
-- Table `attivita`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attivita`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `attivita`.`usuarios` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `nascimento` DATETIME NULL DEFAULT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `pontuacao` INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `email_UNIQUE` ON `attivita`.`usuarios` (`email` ASC);


-- -----------------------------------------------------
-- Table `attivita`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attivita`.`status` ;

CREATE TABLE IF NOT EXISTS `attivita`.`status` (
  `id` INT(10) UNSIGNED NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `attivita`.`tarefas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `attivita`.`tarefas` ;

CREATE TABLE IF NOT EXISTS `attivita`.`tarefas` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `criador_id` INT(10) UNSIGNED NOT NULL,
  `executor_id` INT(10) UNSIGNED NOT NULL,
  `status` INT(10) UNSIGNED NOT NULL,
  `nome` VARCHAR(200) NOT NULL,
  `importancia` INT(10) UNSIGNED NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `data_inicio` DATETIME NOT NULL,
  `data_limite` DATETIME NULL,
  `descricao` VARCHAR(2000) NOT NULL,
  `concluido` INT(1) UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `criador_tarefas_fk`
    FOREIGN KEY (`criador_id`)
    REFERENCES `attivita`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `executor_tarefas_fk`
    FOREIGN KEY (`executor_id`)
    REFERENCES `attivita`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefas_status1`
    FOREIGN KEY (`status`)
    REFERENCES `attivita`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `criador_tarefas_fk_idx` ON `attivita`.`tarefas` (`criador_id` ASC);

CREATE INDEX `executor_tarefas_fk_idx` ON `attivita`.`tarefas` (`executor_id` ASC);

CREATE INDEX `fk_tarefas_status1_idx` ON `attivita`.`tarefas` (`status` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
