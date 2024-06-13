CREATE SCHEMA `flcn`;

CREATE TABLE `flcn`.`appuser` (
  `id` int,
  `name` varchar(50),
  `mobile` varchar(15),
  `email` varchar(50),
  `password` varchar(255),
  `role` varchar(2),
  `sign` varchar(100),
  `status` varchar(1),
  `is_logedin` varchar(1),
  `lastlogin_time` timestamp,
  `lastlogin_from` varchar(30)
);

CREATE TABLE `flcn`.`client` (
  `id` int PRIMARY KEY,
  `name` varchar(30),
  `mobile` varchar(15),
  `email` varchar(50),
  `address` varchar(40),
  `status` int,
  `due_ammount` float,
  `gst` varchar(17),
  `job` varchar(100),
  `remarks` varchar(100),
  `created_by` varchar(10),
  `created at` timestamp
);

CREATE TABLE `flcn`.`item` (
  `id` int PRIMARY KEY,
  `name` varchar(30),
  `accessary` varchar(200),
  `complain` varchar(200),
  `make` varchar(200),
  `remarks` varchar(100),
  `status` bool,
  `created_by` varchar(10),
  `created at` timestamp
);

CREATE TABLE `flcn`.`job` (
  `id` int PRIMARY KEY,
  `clid` varchar(20),
  `status` varchar(10),
  `assigned` varchar(20)
);

CREATE TABLE `flcn`.`job_comment` (
  `id` int PRIMARY KEY,
  `jbid` varchar(20),
  `usid` varchar(10),
  `type` varchar(20),
  `message` varchar(30),
  `time` timestamp
);

CREATE TABLE `flcn`.`job_item` (
  `id` int PRIMARY KEY,
  `jobid` varchar(20),
  `item` varchar(20),
  `make` varchar(20),
  `model` varchar(30),
  `snno` varchar(30),
  `proprty` varchar(100),
  `accessary` varchar(200),
  `complain` varchar(200),
  `rest` float,
  `icharge` float,
  `remarks` varchar(100)
);

CREATE TABLE `flcn`.`secuence` (
  `id` int PRIMARY KEY,
  `type` varchar(20),
  `head` varchar(20),
  `sno` varchar(20),
  `remarks` varchar(40),
  `status` bool,
  `created at` timestamp
);

CREATE TABLE `flcn`.`appinfo` (
  `id` int,
  `name` varchar(50),
  `logo` varchar(100),
  `address` varchar(100),
  `gstno` varchar(17)
);

CREATE TABLE `flcn`.`invoice_gst_goods_main` (
  `id` int PRIMARY KEY,
  `invoice_no` varchar(30),
  `refjob` varchar(20),
  `to` varchar(20),
  `gst` varbinary,
  `inovice_date` date,
  `gross_amount` float,
  `cgst_amount` float,
  `ssgst_amount` float,
  `total_amount` float,
  `remarks` varchar(100),
  `created_at` timestamp,
  `created_by` varchar(10),
  `paid` bool
);

CREATE TABLE `flcn`.`invoice_gst_goods_history` (
  `id` int,
  `entry_id` int,
  `created at` timestamp,
  `product` varchar(255),
  `qty` float,
  `HSN` varchar(8),
  `cgst` varchar(10),
  `sgst` varchar(10),
  `gross_amount` float,
  `total_ammount` float,
  `remarks` varchar(100),
  PRIMARY KEY (`id`, `entry_id`)
);

CREATE TABLE `flcn`.`invoice_gst_srv_main` (
  `id` int PRIMARY KEY,
  `invoice_no` varchar(30),
  `refjob` varchar(20),
  `to` varchar(20),
  `gst` varbinary,
  `inovice_date` date,
  `gross_amount` float,
  `cgst_amount` float,
  `ssgst_amount` float,
  `total_amount` float,
  `remarks` varchar(100),
  `created_at` timestamp,
  `created_by` varchar(10),
  `paid` bool
);

CREATE TABLE `flcn`.`invoice_gst_srv_history` (
  `id` int,
  `entry_id` int,
  `created at` timestamp,
  `product` varchar(255),
  `qty` float,
  `HSN` varchar(8),
  `cgst` varchar(10),
  `sgst` varchar(10),
  `gross_amount` float,
  `total_ammount` float,
  `remarks` varchar(100),
  PRIMARY KEY (`id`, `entry_id`)
);

CREATE TABLE `flcn`.`invoice_kancha_main` (
  `id` int PRIMARY KEY,
  `invoice_no` varchar(30),
  `refjob` varchar(20),
  `to` varchar(20),
  `inovice_date` date,
  `gross_amount` float,
  `total_amount` float,
  `remarks` varchar(100),
  `created_at` timestamp,
  `created_by` varchar(10),
  `paid` bool
);

CREATE TABLE `flcn`.`invoice_kancha_history` (
  `id` int,
  `entry_id` int,
  `created at` timestamp,
  `product` varchar(255),
  `qty` float,
  `total_ammount` float,
  `remarks` varchar(100),
  PRIMARY KEY (`id`, `entry_id`)
);

CREATE TABLE `flcn`.`leadger_sc` (
  `id` int PRIMARY KEY,
  `clid` varchar(50),
  `date` date,
  `type` varchar(20),
  `current_amomount` float,
  `truns_ammount` float,
  `mode` varchar(10),
  `remarks` varchar(50),
  `refno` varchar(50),
  `created at` timestamp
);

ALTER TABLE `flcn`.`client` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`job` (`clid`);

ALTER TABLE `flcn`.`job` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`job_item` (`jobid`);

ALTER TABLE `flcn`.`item` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`job_item` (`item`);

ALTER TABLE `flcn`.`job_comment` ADD FOREIGN KEY (`jbid`) REFERENCES `flcn`.`job` (`id`);

ALTER TABLE `flcn`.`job_comment` ADD FOREIGN KEY (`usid`) REFERENCES `flcn`.`appuser` (`id`);

ALTER TABLE `flcn`.`job` ADD FOREIGN KEY (`assigned`) REFERENCES `flcn`.`appuser` (`id`);

ALTER TABLE `flcn`.`client` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_gst_srv_main` (`to`);

ALTER TABLE `flcn`.`invoice_gst_srv_history` ADD FOREIGN KEY (`entry_id`) REFERENCES `flcn`.`invoice_gst_srv_main` (`id`);

ALTER TABLE `flcn`.`invoice_gst_goods_main` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_gst_goods_history` (`entry_id`);

ALTER TABLE `flcn`.`job` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_gst_goods_main` (`refjob`);

ALTER TABLE `flcn`.`job` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_gst_srv_main` (`refjob`);

ALTER TABLE `flcn`.`client` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_gst_goods_main` (`to`);

ALTER TABLE `flcn`.`job` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_kancha_main` (`refjob`);

ALTER TABLE `flcn`.`invoice_kancha_main` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`invoice_kancha_history` (`entry_id`);

ALTER TABLE `flcn`.`client` ADD FOREIGN KEY (`id`) REFERENCES `flcn`.`leadger_sc` (`clid`);
