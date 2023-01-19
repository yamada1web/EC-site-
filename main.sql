-- localhost
drop database if exists users2;
create database users2 default character set utf8 collate utf8_general_ci;
grant all on users2.* to 'user2'@'localhost' identified by 'password';
use users2;

CREATE TABLE IF NOT EXISTS `users2` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;



-- public
drop database if exists yamadashu2_ecshop;
create database yamadashu2_ecshop default character set utf8 collate utf8_general_ci;
grant all on yamadashu2_ecshop.* to 'yamadashu2_user2'@'localhost' identified by 'password2';
use yamadashu2_ecshop;

CREATE TABLE IF NOT EXISTS `users2` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


-- corporatedb
drop database if exists yamadashu2_corporatedb;
create database yamadashu2_corporatedb default character set utf8 collate utf8_general_ci;
grant all on yamadashu2_corporatedb.* to 'yamadashu2_user2'@'localhost' identified by 'password2';
use yamadashu2_corporatedb;

 create table news(
  id int primary key auto_increment,
  title varchar(256),
  content text,
  created_at datetime,
  updated_at datetime
  );


-- orders(corporate_db)
create table orders(id int primary key auto_increment,name varchar(256),email varchar(256),postcode int,address varchar(256),tel varchar(13),total int, created_at datetime,updated_at datetime);

create table order_products(id int primary key auto_increment, order_id int, product_name varchar(64),num int,price int);



-- 会員登録用
create table users2(
  `id` int NOT NULL auto_increment,
  `name` varchar(256),
  `email`varchar(256) NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(256),
  `dm` int,
  `created_at` datetime, 
  `updated_at` datetime,
  primary key (id)
);