
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- all_inventory
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `all_inventory`;

CREATE TABLE `all_inventory`
(
    `account_manager` VARCHAR(32) NOT NULL,
    `tag_number` INTEGER(16) NOT NULL,
    `date` DATE NOT NULL,
    `description` VARCHAR(64) NOT NULL,
    `building_num` INTEGER NOT NULL,
    `building_name` VARCHAR(32) NOT NULL,
    `room_num` VARCHAR(8) NOT NULL,
    `asset_key` INTEGER NOT NULL,
    `asset_description` VARCHAR(64) NOT NULL,
    `cost` INTEGER NOT NULL,
    `serial_num` VARCHAR(8) NOT NULL,
    `invoice` VARCHAR(8) NOT NULL,
    `po_num` VARCHAR(8) NOT NULL,
    `status` VARCHAR(16) NOT NULL,
    `comment` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`tag_number`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- asset_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `asset_user`;

CREATE TABLE `asset_user`
(
    `id` INTEGER NOT NULL,
    `tag_num` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- missing
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `missing`;

CREATE TABLE `missing`
(
    `tag_number` INTEGER NOT NULL,
    `description` VARCHAR(64) NOT NULL,
    `comment` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`tag_number`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- surplus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `surplus`;

CREATE TABLE `surplus`
(
    `tag_number` INTEGER NOT NULL,
    `comment` VARCHAR(64) NOT NULL,
    `surplus_by` VARCHAR(32) NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`tag_number`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- transfer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `transfer`;

CREATE TABLE `transfer`
(
    `tag_number` INTEGER NOT NULL,
    `date_transfered` DATE NOT NULL,
    `transfer_from` VARCHAR(32) NOT NULL,
    `transfer_to` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`tag_number`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- updates
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `updates`;

CREATE TABLE `updates`
(
    `Name` VARCHAR(32) NOT NULL,
    `tag_num` INTEGER NOT NULL AUTO_INCREMENT,
    `Comment` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`tag_num`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(64) NOT NULL,
    `password` VARCHAR(15) NOT NULL,
    `role` INTEGER NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
