INSERT INTO `subscription` VALUES ('', 'netflix','16','2019-07-01','non-engagé','');

CREATE DATABASE IF NOT EXISTS `mesabos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `abonnement` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `prix` VARCHAR(3) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` DATE NOT NULL DEFAULT '0000-00-00',
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `abonnement`;

CREATE TABLE IF NOT EXISTS `abonnement` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(255) NOT NULL,
    `prix` VARCHAR(3) NOT NULL,    
    `cree_le` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `prix` VARCHAR(3) NOT NULL,    
    `cree_le` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rang` (
    `r_id` INT(11) NOT NULL AUTO_INCREMENT,
    `r_libelle` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `user` (
    `u_id` INT(11) NOT NULL AUTO_INCREMENT,
    `u_email` VARCHAR(40) NOT NULL,
    `u_prenom` VARCHAR(255) DEFAULT NULL,
    `u_nom` VARCHAR(255) DEFAULT NULL,    
    `u_date_inscription` DATETIME NOT NULL,
    `u_rang_fk` INT(11) NOT NULL,
    PRIMARY KEY (`u_id`),
    KEY (`u_rang_fk`),
    CONSTRAINT `constr_user_rang` FOREIGN KEY (`u_rang_fk`) REFERENCES `rang` (`r_id`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `abonnement` (`id`,`nom`,`prix`,`cree_le`) VALUES ('2','amazon','12', CURRENT_TIMESTAMP);
INSERT INTO `abonnement` (`id`,`nom`,`prix`,`cree_le`) VALUES ('','free','15', CURRENT_TIMESTAMP);