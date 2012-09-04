SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `giftology` ;
CREATE SCHEMA IF NOT EXISTS `giftology` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `giftology` ;

-- -----------------------------------------------------
-- Table `giftology`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`users` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '		' ,
  `username` VARCHAR(45) NULL DEFAULT NULL ,
  `password` VARCHAR(45) NULL DEFAULT NULL ,
  `role` VARCHAR(45) NULL DEFAULT NULL ,
  `facebook_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL ,
  `last_login` DATETIME NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facebook_id` USING BTREE (`facebook_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`user_profiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`user_profiles` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`user_profiles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `first_name` VARCHAR(45) NULL DEFAULT NULL ,
  `last_name` VARCHAR(45) NULL DEFAULT NULL ,
  `email` VARCHAR(250) NULL DEFAULT NULL ,
  `mobile` VARCHAR(15) NULL DEFAULT NULL ,
  `city` VARCHAR(45) NULL DEFAULT NULL ,
  `gender` VARCHAR(45) NULL DEFAULT NULL ,
  `birthday` DATE NULL DEFAULT NULL ,
  `birthyear` VARCHAR(5) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `user_id`) ,
  INDEX `fk_user_profiles_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_user_profiles_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `giftology`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`user_addresses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`user_addresses` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`user_addresses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `address1` VARCHAR(250) NULL DEFAULT NULL ,
  `address2` VARCHAR(250) NULL DEFAULT NULL ,
  `city` VARCHAR(45) NULL DEFAULT NULL ,
  `pin_code` VARCHAR(45) NULL DEFAULT NULL ,
  `country` VARCHAR(45) NULL DEFAULT 'India' ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `user_id`) ,
  INDEX `fk_user_addresses_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_user_addresses_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `giftology`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`user_utms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`user_utms` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`user_utms` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `utm_source` VARCHAR(45) NULL DEFAULT NULL ,
  `utm_medium` VARCHAR(45) NULL DEFAULT NULL ,
  `utm_campaign` VARCHAR(45) NULL DEFAULT NULL ,
  `utm_term` VARCHAR(45) NULL DEFAULT NULL ,
  `utm_content` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `user_id`) ,
  INDEX `fk_user_utm_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_user_utm_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `giftology`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`vendors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`vendors` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`vendors` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `thumb_image` VARCHAR(150) NULL DEFAULT NULL ,
  `wide_image` VARCHAR(150) NULL DEFAULT NULL ,
  `description` BLOB NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`vendor_locations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`vendor_locations` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`vendor_locations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `address1` VARCHAR(200) NULL DEFAULT NULL ,
  `address2` VARCHAR(45) NULL DEFAULT NULL ,
  `city` VARCHAR(45) NULL DEFAULT NULL ,
  `pin_code` VARCHAR(45) NULL DEFAULT NULL ,
  `phone1` VARCHAR(45) NULL DEFAULT NULL ,
  `phone2` VARCHAR(45) NULL DEFAULT NULL ,
  `phone3` VARCHAR(45) NULL DEFAULT NULL ,
  `google_maps_link` VARCHAR(200) NULL DEFAULT NULL ,
  `vendors_id` INT UNSIGNED NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_vendor_locations_vendors1_idx` (`vendors_id` ASC) ,
  CONSTRAINT `fk_vendor_locations_vendors1`
    FOREIGN KEY (`vendors_id` )
    REFERENCES `giftology`.`vendors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`product_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`product_types` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`product_types` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`product_segments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`product_segments` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`product_segments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `min_age` INT UNSIGNED NULL DEFAULT 0 ,
  `max_age` INT UNSIGNED NULL DEFAULT 100 ,
  `city` VARCHAR(45) NULL DEFAULT NULL ,
  `gender` VARCHAR(45) NULL DEFAULT NULL ,
  `interests` VARCHAR(200) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`products` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`products` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `min_price` INT UNSIGNED NULL DEFAULT 0 ,
  `max_price` INT UNSIGNED NULL DEFAULT NULL ,
  `min_value` INT UNSIGNED NOT NULL ,
  `days_valid` INT UNSIGNED NULL DEFAULT NULL ,
  `terms` BLOB NULL DEFAULT NULL ,
  `redeem_instr` BLOB NULL DEFAULT NULL ,
  `code` VARCHAR(45) NULL DEFAULT 'Generated' COMMENT 'If code = \\\"Generated\\\" then system will generate a random/unique code.  \\n\\nElse if code = \\\"Uploaded\\\" then If it is anything else then system will use the code entered here as static code for all gift vouchers. ' ,
  `vendor_id` INT UNSIGNED NOT NULL ,
  `product_type_id` INT UNSIGNED NOT NULL ,
  `product_segment_id` INT UNSIGNED NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_vendors1_idx` (`vendor_id` ASC) ,
  INDEX `fk_products_product_types1_idx` (`product_type_id` ASC) ,
  INDEX `fk_products_product_segments1_idx` (`product_segment_id` ASC) ,
  CONSTRAINT `fk_products_vendors1`
    FOREIGN KEY (`vendor_id` )
    REFERENCES `giftology`.`vendors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_product_types1`
    FOREIGN KEY (`product_type_id` )
    REFERENCES `giftology`.`product_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_product_segments1`
    FOREIGN KEY (`product_segment_id` )
    REFERENCES `giftology`.`product_segments` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`gift_statuses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`gift_statuses` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`gift_statuses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `status` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`gifts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`gifts` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`gifts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'NOTE: GIFT is only created upon successful transaction, or for a free product no transaction.  In process and failed transactions stay only in transaction table, and do not show up in gifts table' ,
  `product_id` INT UNSIGNED NOT NULL ,
  `sender_id` INT UNSIGNED NOT NULL ,
  `receiver_id` INT UNSIGNED NULL DEFAULT NULL ,
  `receiver_fb_id` BIGINT(20) UNSIGNED NULL ,
  `code` VARCHAR(45) NOT NULL ,
  `gift_amount` INT UNSIGNED NOT NULL ,
  `gift_status_id` INT UNSIGNED NOT NULL ,
  `expiry_date` DATE NULL DEFAULT NULL COMMENT 'Needs to be calculated from created_date of this record + days_valid for the product\\n' ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `receiver_email` VARCHAR(150) NULL DEFAULT NULL ,
  `post_to_fb` TINYINT(1) NULL DEFAULT false ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_gifts_products1_idx` (`product_id` ASC) ,
  INDEX `fk_gifts_gift_statuses1_idx` (`gift_status_id` ASC) ,
  INDEX `fk_gifts_user1_idx` (`receiver_id` ASC) ,
  INDEX `fk_gifts_user2_idx` (`sender_id` ASC) ,
  INDEX `index_gift_code` (`code` ASC) ,
  CONSTRAINT `fk_gifts_products1`
    FOREIGN KEY (`product_id` )
    REFERENCES `giftology`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gifts_gift_statuses1`
    FOREIGN KEY (`gift_status_id` )
    REFERENCES `giftology`.`gift_statuses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gifts_user1`
    FOREIGN KEY (`receiver_id` )
    REFERENCES `giftology`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gifts_user2`
    FOREIGN KEY (`sender_id` )
    REFERENCES `giftology`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`transaction_statuses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`transaction_statuses` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`transaction_statuses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `status` VARCHAR(45) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`transactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`transactions` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`transactions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `sender_id` INT UNSIGNED NOT NULL COMMENT 'sender, receiver, and product are duplicated from the gifts table.  The reason for this is that if a transaction failed, or did not return from payment gateway, then a gift row will not be created for that one.  In that event this will be our only source  /* comment truncated */' ,
  `receiver_id` INT UNSIGNED NOT NULL ,
  `product_id` INT UNSIGNED NOT NULL ,
  `gift_id` INT UNSIGNED NULL ,
  `amount_paid` INT UNSIGNED NULL ,
  `transaction_status_id` INT UNSIGNED NOT NULL ,
  `pg_id` VARCHAR(50) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_transactions_transaction_statuses1_idx` (`transaction_status_id` ASC) ,
  INDEX `fk_transactions_gifts1_idx` (`gift_id` ASC) ,
  CONSTRAINT `fk_transactions_transaction_statuses1`
    FOREIGN KEY (`transaction_status_id` )
    REFERENCES `giftology`.`transaction_statuses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transactions_gifts1`
    FOREIGN KEY (`gift_id` )
    REFERENCES `giftology`.`gifts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`reminders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`reminders` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`reminders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT UNSIGNED NOT NULL ,
  `friend_fb_id` BIGINT(20) UNSIGNED NULL ,
  `friend_name` VARCHAR(45) NULL ,
  `friend_birthday` DATE NULL DEFAULT NULL ,
  `friend_birthyear` VARCHAR(5) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_reminders_users1_idx` (`user_id` ASC) ,
  INDEX `index_birthdays` (`friend_birthday` ASC) ,
  CONSTRAINT `fk_reminders_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `giftology`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `giftology`.`uploaded_product_codes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `giftology`.`uploaded_product_codes` ;

CREATE  TABLE IF NOT EXISTS `giftology`.`uploaded_product_codes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `product_id` INT UNSIGNED NOT NULL ,
  `code` VARCHAR(45) NOT NULL ,
  `value` INT UNSIGNED NULL ,
  `available` INT UNSIGNED NULL DEFAULT 1 COMMENT '1 = Available, 0 = Used, ' ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_uploaded_product_codes_products1_idx` (`product_id` ASC) ,
  CONSTRAINT `fk_uploaded_product_codes_products1`
    FOREIGN KEY (`product_id` )
    REFERENCES `giftology`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `giftology`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `giftology`;
INSERT INTO `giftology`.`users` (`id`, `username`, `password`, `role`, `facebook_id`, `last_login`, `created`, `modified`) VALUES (1, 'giftRecipientPlaceholder', NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `giftology`.`product_types`
-- -----------------------------------------------------
START TRANSACTION;
USE `giftology`;
INSERT INTO `giftology`.`product_types` (`id`, `type`, `created`, `modified`) VALUES (1, 'DIGITAL', NULL, NULL);
INSERT INTO `giftology`.`product_types` (`id`, `type`, `created`, `modified`) VALUES (2, 'SHIPPED', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `giftology`.`product_segments`
-- -----------------------------------------------------
START TRANSACTION;
USE `giftology`;
INSERT INTO `giftology`.`product_segments` (`id`, `min_age`, `max_age`, `city`, `gender`, `interests`, `created`, `modified`) VALUES (1, 0, 99, 'all', 'all', 'all', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `giftology`.`gift_statuses`
-- -----------------------------------------------------
START TRANSACTION;
USE `giftology`;
INSERT INTO `giftology`.`gift_statuses` (`id`, `status`, `created`, `modified`) VALUES (1, 'VALID', NULL, NULL);
INSERT INTO `giftology`.`gift_statuses` (`id`, `status`, `created`, `modified`) VALUES (2, 'EXPIRED', NULL, NULL);
INSERT INTO `giftology`.`gift_statuses` (`id`, `status`, `created`, `modified`) VALUES (3, 'REDEEMED', NULL, NULL);
INSERT INTO `giftology`.`gift_statuses` (`id`, `status`, `created`, `modified`) VALUES (4, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `giftology`.`transaction_statuses`
-- -----------------------------------------------------
START TRANSACTION;
USE `giftology`;
INSERT INTO `giftology`.`transaction_statuses` (`id`, `status`, `created`, `modified`) VALUES (1, 'PROCESSING', NULL, NULL);
INSERT INTO `giftology`.`transaction_statuses` (`id`, `status`, `created`, `modified`) VALUES (2, 'SUCCESS', NULL, NULL);
INSERT INTO `giftology`.`transaction_statuses` (`id`, `status`, `created`, `modified`) VALUES (3, NULL, NULL, NULL);

COMMIT;
