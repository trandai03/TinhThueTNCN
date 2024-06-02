create database thue_tncn;
use thue_tncn;
CREATE TABLE `users` (
  `id` integer PRIMARY KEY,
  `username` varchar(255),
  `password` varchar(255),
  `cccd` varchar(255),
  `birth` datetime,
  `fullname` varchar(255),
  `phone` varchar(255),
  `email` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `thue` (
  `id` integer PRIMARY KEY,
  `soNguoiPhuThuoc` integer,
  `tongThuNhap` integer,
  `user_id` integer,
  `status` varchar(255),
  `created_at` timestamp
);


ALTER TABLE `thue` ADD CONSTRAINT `fk_thue_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);


