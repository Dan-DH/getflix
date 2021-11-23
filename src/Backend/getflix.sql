DROP DATABASE IF EXISTS getflix;

CREATE DATABASE IF NOT EXISTS getflix;

USE getflix;

CREATE TABLE users (
	userID int(10) not null primary key auto_increment,
	email varchar(255) not null,
	login varchar(255) not null,
	acc_date datetime not null default(curtime())
);

CREATE TABLE contact (
	messageID int(10) not null primary key auto_increment,
	email varchar(255) not null,
	message varchar(255) not null,
	contact_date datetime not null default(curtime())
);

CREATE TABLE comments (
	commentID int(10) not null primary key auto_increment,
	userID int(10) not null,
	movieID int(10) not null,
	comment varchar(255) not null,
	comment_date datetime not null default(curtime())
);

CREATE TABLE movies (
	movieID int(10) not null primary key auto_increment,
	title varchar(255) not null,
	image varchar(255) not null,
	trailer varchar(255) not null,
	genre varchar(255) not null,
	rating float(2) not null,
	synopsis varchar(255) not null
);

INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ("Jurassic Park", "https://image.tmdb.org/t/p/original/5V4wkqAIjcRL1TqXiB9iNn0EPrI.jpg", "https://www.youtube.com/watch?v=QWBKEmWWL38", "Action / Adventure / Sci-Fy", 8.1, "A pragmatic paleontologist touring an almost complete theme park on an island in Central America is tasked with protecting a couple of kids after a power failure causes the park's cloned dinosaurs to run loose.");

INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ("The Matrix", "https://fanart.tv/fanart/movies/603/movieposter/the-matrix-53b1a283180a1.jpg", "https://www.youtube.com/watch?v=vKQi3bBA1y8", "Action / Sci-Fy", 8.7, "When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.");

INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ("The Lion King", "https://fanart.tv/fanart/movies/8587/movieposter/the-lion-king-524fb69e8c273.jpg", "https://www.youtube.com/watch?v=lFzVJEksoDY", "Animation / Adventure / Drama", 8.5, "Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.");

INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ("Moonrise Kingdom", "https://fanart.tv/fanart/movies/83666/movieposter/moonrise-kingdom-52fba7d1779b3.jpg", "https://www.youtube.com/watch?v=YxwuXWtusGA", "Comedy / Drama / Romance", 7.8, "A pair of young lovers flee their New England town, which causes a local search party to fan out to find them.");

INSERT INTO movies (title, image, trailer, genre, rating, synopsis) VALUES ("Arrival", "https://4.bp.blogspot.com/-1db3a4cyBh4/Whw_Ogz-hvI/AAAAAAAAAYo/EbnVoliKkwMvB5-xwVe72dQRLUrG86PNACLcBGAs/s1600/Arrival-Poster.png", "https://www.youtube.com/watch?v=tFMo3UJ4B4g", "Drama / Sci-Fy", 7.9, "A linguist works with the military to communicate with alien lifeforms after twelve mysterious spacecraft appear around the world.");

INSERT INTO users (email, login) VALUES ("daniel@getflix.com", "Dan-DH");
INSERT INTO users (email, login) VALUES ("brigita@getflix.com", "Brigita Sabutyte");
INSERT INTO users (email, login) VALUES ("shivani@getflix.com", "ShivaniKhatri");
INSERT INTO users (email, login) VALUES ("teosuperlongemailtoseewhathappens@getflix.co.uk", "Teo");

INSERT INTO comments (userID, movieID, comment) VALUES (1, 1, "Watched this so much as a kid the VHS tape broke :)");

INSERT INTO comments (userID, movieID, comment) VALUES (2, 1, "It's okay");

INSERT INTO comments (userID, movieID, comment) VALUES (3, 3, "NU;r8iJDY7E8SB-i:}G7)L@W;uY{.v@e&4&/hX7tF$t9E%Ztqk7VgUA+:H6((pTwV{HWG6KBQ#4,6M22bRR#QJfKFbL.Dwbq$/=-wi2X7X-v5z7%P39zR-G,D:/V85M!H[P%26%5$,e,L.P)_2Tt@[2e[@3qJmvyp6@qE+-27e$i+QF%XnM[etZ7VYEcPiQG*?ZzTmVg*%=rLe?kz/NiMBU_*ddY6;ACb(Li{zJ9+n3qwcCuZ#u6N.yeU:?Y7.j");

INSERT INTO comments (userID, movieID, comment) VALUES (4, 3, "The comment above mine is 255 characters long, the max allowed");

INSERT INTO comments (userID, movieID, comment) VALUES (2, 3, "Making a bunch of comments on the same movie to check the autoscroll for the popup");

INSERT INTO comments (userID, movieID, comment) VALUES (2, 3, "That's a great idea");

INSERT INTO contact (email, message) VALUES ("notindatabase@gmail.com", "I want to unsubscribe for the service");

INSERT INTO contact (email, message) VALUES ("daniel@getflix.com", "Love this, you should charge more");
