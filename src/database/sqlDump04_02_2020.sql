-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema toyplanet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema toyplanet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `toyplanet` DEFAULT CHARACTER SET utf8 ;
USE `toyplanet` ;

-- -----------------------------------------------------
-- Table `toyplanet`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`account` (
  `accountID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `email` VARCHAR(300) NOT NULL,
  `passwordHash` VARCHAR(255) NOT NULL,
  `birthday` DATE NOT NULL,
  `mobile` VARCHAR(12) NOT NULL,
  `phone` VARCHAR(12) NULL DEFAULT NULL,
  PRIMARY KEY (`accountID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`Address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`Address` (
  `addressID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `land` VARCHAR(50) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `street` VARCHAR(40) NOT NULL,
  `houseNumber` INT(5) NOT NULL,
  `zip` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`addressID`),
  UNIQUE INDEX `AddressID_UNIQUE` (`addressID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`order` (
  `orderID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `orderDate` DATE NOT NULL,
  `shipDate` DATE NULL DEFAULT NULL,
  `sum` DOUBLE NOT NULL,
  PRIMARY KEY (`orderID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`accountAddressOrder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`accountAddressOrder` (
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Order_orderID` INT(11) NOT NULL,
  `Account_accountID` INT(11) NOT NULL,
  `Address_addressID` INT(11) NOT NULL,
  INDEX `fk_AccountAddresses_Account1_idx` (`Account_accountID` ASC),
  INDEX `fk_AccountAddresses_Address1_idx` (`Address_addressID` ASC),
  CONSTRAINT `fk_AccountAddresses_Account1`
    FOREIGN KEY (`Account_accountID`)
    REFERENCES `toyplanet`.`account` (`accountID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AccountAddresses_Address1`
    FOREIGN KEY (`Address_addressID`)
    REFERENCES `toyplanet`.`Address` (`addressID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AccountAddresses_Order1`
    FOREIGN KEY (`Order_orderID`)
    REFERENCES `toyplanet`.`order` (`orderID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`cat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`cat` (
  `catID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `descrip` VARCHAR(45) NOT NULL,
  `type` ENUM('boy', 'girl', 'both', 'console') NOT NULL,
  PRIMARY KEY (`catID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`prodCat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`prodCat` (
  `prodCatID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `descrip` VARCHAR(45) NOT NULL,
  `catID` INT(11) NOT NULL,
  PRIMARY KEY (`prodCatID`),
  INDEX `fk_prodCat_cat1_idx` (`catID` ASC),
  CONSTRAINT `fk_prodCat_cat1`
    FOREIGN KEY (`catID`)
    REFERENCES `toyplanet`.`cat` (`catID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`product` (
  `prodID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `descrip` VARCHAR(50) NOT NULL,
  `stdPrice` DOUBLE NOT NULL,
  `photo` VARCHAR(45) NOT NULL,
  `prodCatID` INT(11) NOT NULL,
  PRIMARY KEY (`prodID`),
  INDEX `fk_Product_ProdCat1_idx` (`prodCatID` ASC),
  CONSTRAINT `fk_Product_ProdCat1`
    FOREIGN KEY (`prodCatID`)
    REFERENCES `toyplanet`.`prodCat` (`prodCatID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`orderItem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`orderItem` (
  `itemID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `actPrice` DOUBLE NOT NULL,
  `qty` INT(11) NOT NULL,
  `orderID` INT(11) NOT NULL,
  `prodID` INT(11) NOT NULL,
  PRIMARY KEY (`itemID`),
  INDEX `fk_OrderItems_Order1_idx` (`orderID` ASC),
  INDEX `fk_OrderItems_Product1_idx` (`prodID` ASC),
  CONSTRAINT `fk_OrderItems_Order1`
    FOREIGN KEY (`orderID`)
    REFERENCES `toyplanet`.`order` (`orderID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrderItems_Product1`
    FOREIGN KEY (`prodID`)
    REFERENCES `toyplanet`.`product` (`prodID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`shoppingcart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`shoppingcart` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prodID` INT(11) NULL,
  `quantity` INT(11) NOT NULL DEFAULT 1,
  `randomNr` VARCHAR(11) NULL,
  `accountID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_warenkorb_product1_idx` (`prodID` ASC),
  INDEX `fk_shoppingcartContent_account1_idx` (`accountID` ASC),
  CONSTRAINT `fk_warenkorb_product11`
    FOREIGN KEY (`prodID`)
    REFERENCES `toyplanet`.`product` (`prodID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shoppingcartContent_account11`
    FOREIGN KEY (`accountID`)
    REFERENCES `toyplanet`.`account` (`accountID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `toyplanet`.`shoppingcart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`shoppingcart` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prodID` INT(11) NULL,
  `quantity` INT(11) NOT NULL DEFAULT 1,
  `randomNr` VARCHAR(11) NULL,
  `accountID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_warenkorb_product1_idx` (`prodID` ASC),
  INDEX `fk_shoppingcartContent_account1_idx` (`accountID` ASC),
  CONSTRAINT `fk_warenkorb_product11`
    FOREIGN KEY (`prodID`)
    REFERENCES `toyplanet`.`product` (`prodID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shoppingcartContent_account11`
    FOREIGN KEY (`accountID`)
    REFERENCES `toyplanet`.`account` (`accountID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `toyplanet`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`contact` (
  `contactID` INT(11) NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `email` VARCHAR(300) NOT NULL,
  `subject` TINYTEXT NOT NULL,
  `message` TEXT NOT NULL,
  PRIMARY KEY (`contactID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `toyplanet`.`cat`
-- -----------------------------------------------------
START TRANSACTION;
USE `toyplanet`;
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Puzzle', 'boy');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Puppen', 'girl');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Spiele', 'both');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Playstation', 'console');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Xbox', 'console');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Nintendo', 'console');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Rennauto', 'boy');
INSERT INTO `toyplanet`.`cat` (`catID`, `createdAt`, `updatedAt`, `descrip`, `type`) VALUES (DEFAULT, DEFAULT, NULL, 'Puppenhaus', 'girl');

COMMIT;


-- -----------------------------------------------------
-- Data for table `toyplanet`.`prodCat`
-- -----------------------------------------------------
START TRANSACTION;
USE `toyplanet`;
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, '3D-Puzzle', 1);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Würfel-Puzzle', 1);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Kartenspiele', 3);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Brettspiele', 3);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Lernspiele', 3);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Baby-Puppen', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `toyplanet`.`product`
-- -----------------------------------------------------
START TRANSACTION;
USE `toyplanet`;
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, '3dpuzzle1', 1, 'assets/images/Products/8.jpg', 1);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, '3dpuzzle2', 2, 'assets/images/Products/8.jpg', 1);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'würfelpuzzle3', 3, 'assets/images/Products/8.jpg', 2);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'kartenspiel1', 4, 'assets/images/Products/8.jpg', 3);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'kartenspiel2', 5, 'assets/images/Products/8.jpg', 3);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'brettspiel1', 6, 'assets/images/Products/8.jpg', 4);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'lernspiel1', 7, 'assets/images/Products/8.jpg', 5);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'puppe1', 8, 'assets/images/Products/8.jpg', 6);

COMMIT;

