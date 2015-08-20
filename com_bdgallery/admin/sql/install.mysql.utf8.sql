DROP TABLE IF EXISTS `#__bdgallery`;

CREATE TABLE `#__bdgallery` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`album` VARCHAR(255) NOT NULL,
   `description` VARCHAR(255) NULL,
   `totalimg` INT(11) NOT NULL DEFAULT 0,
   `folderlist` VARCHAR(255) NULL,
   `imgfolder` VARCHAR(255) NULL,
   `catid`	    int(11)    NOT NULL DEFAULT '0',
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
