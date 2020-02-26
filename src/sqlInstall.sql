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
  PRIMARY KEY (`accountID`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `toyplanet`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toyplanet`.`address` (
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
  `orderDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `shipDate` DATE NULL DEFAULT NULL,
  `sum` DOUBLE NOT NULL,
  `accountID` INT(11) NOT NULL,
  `addressID` INT(11) NOT NULL,
  PRIMARY KEY (`orderID`, `accountID`, `addressID`),
  INDEX `fk_order_account1_idx` (`accountID` ASC),
  INDEX `fk_order_Address1_idx` (`addressID` ASC),
  CONSTRAINT `fk_order_account1`
    FOREIGN KEY (`accountID`)
    REFERENCES `toyplanet`.`account` (`accountID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_Address1`
    FOREIGN KEY (`addressID`)
    REFERENCES `toyplanet`.`address` (`addressID`)
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
  `Info` TEXT(500) NOT NULL,
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
  `shoppingCartID` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prodID` INT(11) NULL,
  `quantity` INT(11) NOT NULL DEFAULT 1,
  `randomNr` VARCHAR(11) NULL,
  `accountID` INT(11) NULL,
  PRIMARY KEY (`shoppingCartID`),
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
  `shoppingCartID` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `prodID` INT(11) NULL,
  `quantity` INT(11) NOT NULL DEFAULT 1,
  `randomNr` VARCHAR(11) NULL,
  `accountID` INT(11) NULL,
  PRIMARY KEY (`shoppingCartID`),
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
-- Data for table `toyplanet`.`account`
-- -----------------------------------------------------
START TRANSACTION;
USE `toyplanet`;
INSERT INTO `toyplanet`.`account` (`accountID`, `createdAt`, `updatedAt`, `firstname`, `lastname`, `email`, `passwordHash`, `birthday`, `mobile`, `phone`) VALUES (1, DEFAULT, NULL, 'Test', 'Test', 'test@mail.com', '$2y$10$2zEUDtNcnrGgI4UzHzDtUOFu6uMtUw9IsAxwrpB1NUC1GoOSXLDzG', '0001-01-01', '01010101010', NULL);

COMMIT;


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
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Xbox one', 5);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Wie U', 6);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Baby-Puppen', 2);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'PS4', 4);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Barbie', 2);
INSERT INTO `toyplanet`.`prodCat` (`prodCatID`, `createdAt`, `updatedAt`, `descrip`, `catID`) VALUES (DEFAULT, DEFAULT, NULL, 'Lego', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `toyplanet`.`product`
-- -----------------------------------------------------
START TRANSACTION;
USE `toyplanet`;
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'The Last of Us Part II', 24, 'assets/images/Products/1.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 7);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Death Stranding', 55, 'assets/images/Products/2.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 7);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Modern Warfare', 64, 'assets/images/Products/3.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 7);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Daysgone', 15, 'assets/images/Products/4.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 4);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Iron Man', 35, 'assets/images/Products/5.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 4);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Jump Force', 42, 'assets/images/Products/6.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 4);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Tomb Raider', 48, 'assets/images/Products/7.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 7);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Concrete Genie', 33, 'assets/images/Products/8.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 7);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Nioh', 65, 'assets/images/Products/9.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,\n consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,\n quae sit beatae? Totam architecto voluptatum maxime.', 7);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'baby puppe', 87, 'assets/images/Products/10.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 6);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'baby puppe', 88, 'assets/images/Products/11.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 6);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'baby puppe', 56, 'assets/images/Products/12.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 6);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Barbie', 99, 'assets/images/Products/13.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 8);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Barbie', 83, 'assets/images/Products/14.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 8);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Barbie', 223, 'assets/images/Products/15.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 8);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'puppe', 43, 'assets/images/Products/16.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 6);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'puppe', 93, 'assets/images/Products/17.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 6);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'puppe', 113, 'assets/images/Products/18.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 6);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Lego', 234, 'assets/images/Products/19.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 9);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Lego', 236, 'assets/images/Products/20.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 9);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Lego', 11, 'assets/images/Products/21.png', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 9);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Puzzle', 44, 'assets/images/Products/22.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 1);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Puzzle', 65, 'assets/images/Products/23.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 1);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Puzzle', 77, 'assets/images/Products/24.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 1);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Mister Pups', 87, 'assets/images/Products/25.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 3);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Mau Mau', 23, 'assets/images/Products/26.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 3);
INSERT INTO `toyplanet`.`product` (`prodID`, `createdAt`, `updatedAt`, `descrip`, `stdPrice`, `photo`, `Info`, `prodCatID`) VALUES (DEFAULT, DEFAULT, NULL, 'Pahse 10', 12, 'assets/images/Products/27.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla ipsa nemo amet at atque,  consequatur velit minima, cupiditate facilis esse impedit nostrum aliquam,  quae sit beatae? Totam architecto voluptatum maxime.', 3);

COMMIT;

