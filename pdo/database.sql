create database company;
use company;
create table people	(
	id 		int auto_increment,
	name	varchar(45) not null,
	email	varchar(45) not null,
	primary key(id)
);