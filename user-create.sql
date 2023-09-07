drop database if exists user;
create database user default character set utf8 collate utf8_general_ci;
drop user if exists 'root'@'localhost';
create user 'root'@'localhost' identified by 'mariadb';
grant all on user.* to 'root'@'localhost';
use user;

create table user (
	id int auto_increment primary key, 
	name varchar(200) not null, 
    age int not null,
	price int not null
);