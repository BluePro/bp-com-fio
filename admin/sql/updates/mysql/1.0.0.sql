CREATE TABLE `#__fioexport_cache` (
	`fioexport_cache_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`request` varchar(255) NOT NULL,
	`response` mediumtext NOT NULL,
	 PRIMARY KEY (`fioexport_cache_id`));
