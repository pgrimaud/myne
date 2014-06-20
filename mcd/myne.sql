SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `myne` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `myne` ;

-- -----------------------------------------------------
-- Table `myne`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `myne`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT ,
  `id_facebook` VARCHAR(255) NULL ,
  `first_name` VARCHAR(255) NULL ,
  `last_name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `publication` TINYINT NOT NULL DEFAULT 0 COMMENT '0: let the publication be set by the review publication\n1: only the user can see his reviews\n2: only user\'s friends can see his reviews\n3: everyone can see his reviews' ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  `date` DATETIME NOT NULL ,
  PRIMARY KEY (`id_user`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `myne`.`product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `myne`.`product` (
  `id_product` INT NOT NULL AUTO_INCREMENT ,
  `ean_code` VARCHAR(255) NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_product`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `myne`.`review`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `myne`.`review` (
  `id_review` INT NOT NULL AUTO_INCREMENT ,
  `id_user` INT NOT NULL ,
  `id_product` INT NOT NULL ,
  `content` TEXT NOT NULL ,
  `rate` SMALLINT NOT NULL ,
  `publication` TINYINT NOT NULL COMMENT '1: only the user can see his reviews\n2: only user\'s friends can see his reviews\n3: everyone can see his reviews' ,
  `date` DATETIME NOT NULL ,
  PRIMARY KEY (`id_review`, `id_user`, `id_product`) ,
  INDEX `fk_review_user_idx` (`id_user` ASC) ,
  INDEX `fk_review_product1_idx` (`id_product` ASC) ,
  CONSTRAINT `fk_review_user`
    FOREIGN KEY (`id_user` )
    REFERENCES `myne`.`user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_product1`
    FOREIGN KEY (`id_product` )
    REFERENCES `myne`.`product` (`id_product` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `myne`.`comment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `myne`.`comment` (
  `id_comment` INT NOT NULL AUTO_INCREMENT ,
  `id_review` INT NOT NULL ,
  `id_user` INT NOT NULL ,
  `content` TEXT NOT NULL ,
  `status` TINYINT NOT NULL DEFAULT 1 ,
  `date` DATETIME NOT NULL ,
  PRIMARY KEY (`id_comment`, `id_review`, `id_user`) ,
  INDEX `fk_comment_review1_idx` (`id_review` ASC) ,
  INDEX `fk_comment_user1_idx` (`id_user` ASC) ,
  CONSTRAINT `fk_comment_review1`
    FOREIGN KEY (`id_review` )
    REFERENCES `myne`.`review` (`id_review` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`id_user` )
    REFERENCES `myne`.`user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `myne`.`edition`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `myne`.`edition` (
  `id_edition` INT NOT NULL AUTO_INCREMENT ,
  `id_review` INT NOT NULL ,
  `content` TEXT NOT NULL ,
  `mood` TINYINT NOT NULL COMMENT '0: neutral\n1: happy\n2: content\n3: astone\n4: fear\n5: cry\n6: angry' ,
  `date` DATETIME NOT NULL ,
  PRIMARY KEY (`id_edition`, `id_review`) ,
  INDEX `fk_edition_review1_idx` (`id_review` ASC) ,
  CONSTRAINT `fk_edition_review1`
    FOREIGN KEY (`id_review` )
    REFERENCES `myne`.`review` (`id_review` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `myne`.`user_has_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `myne`.`user_has_user` (
  `id_user` INT NOT NULL ,
  `id_facebook_friend` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id_user`) ,
  CONSTRAINT `fk_user_has_user_user1`
    FOREIGN KEY (`id_user` )
    REFERENCES `myne`.`user` (`id_user` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
