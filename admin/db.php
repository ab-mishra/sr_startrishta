ALTER TABLE `sr_admin` ADD `login_name` INT NOT NULL AFTER `name` ,
ADD `contact` INT NOT NULL AFTER `login_name` 

ALTER TABLE `sr_admin` ADD `created_by` INT NOT NULL AFTER `role_id` 
