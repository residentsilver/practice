drop database if exists book;
create database book default character set utf8 collate utf8_general_ci;
drop user if exists 'staff'@'localhost';
create user 'staff'@'localhost' identified by 'mariadb';
grant all on staff.* to 'staff'@'localhost';
use book;

create table book (
	id int auto_increment primary key, 
	name varchar(200) not null, 
    author varchar(20)  not null,
	price int not null
);