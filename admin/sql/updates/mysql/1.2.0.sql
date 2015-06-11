ALTER TABLE `#__fioexport_cache` ADD `time` timestamp NOT NULL;
ALTER TABLE `#__fioexport_cache` ADD INDEX `request` (`request`);
