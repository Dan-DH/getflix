CREATE DATABASE IF NOT EXISTS getflix;
USE getflix;

CREATE TABLE IF NOT EXISTS users (
	userID int(10) not null primary key auto_increment,
	email varchar(255) not null,
	login varchar(255) not null,
	acc_date datetime not null
);

CREATE TABLE IF NOT EXISTS contact (
	messageID int(10) not null primary key auto_increment,
	userID int(10) not null,
	message varchar(255) not null,
	date datetime not null
);

CREATE TABLE IF NOT EXISTS comments (
	commentID int(10) not null primary key auto_increment,
	userID int(10) not null,
	movieID int(10) not null,
	comment varchar(255) not null,
	comment_date datetime not null
);

CREATE TABLE IF NOT EXISTS movies (
	movieID int(10) not null primary key auto_increment,
	title varchar(255) not null,
	trailer varchar(255) not null,
	genre varchar(255) not null,
	rating float(2) not null,
	synopsis varchar(255) not null
);
