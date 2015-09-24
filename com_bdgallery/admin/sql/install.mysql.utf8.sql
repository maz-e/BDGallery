DROP TABLE IF EXISTS `#__bdgallery`;

CREATE TABLE `#__bdgallery` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`album_name` VARCHAR(255) NOT NULL,
   `description` VARCHAR(255) NULL,
   `folderlist` VARCHAR(255) NULL,
   `imgfolder` VARCHAR(255) NULL,
   `catid`	    int(11)    NOT NULL DEFAULT '0',
	`published` tinyint(4) NOT NULL,
	`ordering` INT(11)  NOT NULL ,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
