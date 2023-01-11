CREATE DATABASE ditter_db;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON ditter_db.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE ditter_db;

CREATE TABLE if not exists Users(
	userID int NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	password varchar(20),
	PRIMARY KEY (userID)
);

CREATE TABLE if not exists Posts(
	postID int NOT NULL AUTO_INCREMENT,
	postcontent varchar(255),
	userID int,
	posttimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (postID),
	FOREIGN KEY (userID) REFERENCES Users(userID)
);
	

INSERT INTO Users (username, email, password)
VALUES ('fig', 'fakemail@email.com', 'password123');

INSERT INTO Users (username, email, password)
VALUES ('jurassicpark', 'fakemail123@email.com', 'jurassicpark123');

INSERT INTO Users (username, email, password)
VALUES ('scarface', 'scarface@email.com', 'scarface123');

INSERT INTO Users (username, email, password)
VALUES ('greenpepper', 'greenpepper@email.com', 'green123');

INSERT INTO Users (username, email, password)
VALUES ('rhythm', 'rhythm@email.com', 'rhythm123');

INSERT INTO Users (username, email, password)
VALUES ('pathsofglory', 'pathsofglory@email.com', 'password123');

INSERT INTO Users (username, email, password)
VALUES ('red', 'red@email.com', 'password123');

INSERT INTO Users (username, email, password)
VALUES ('cucumber', 'cucumber@email.com', 'cucumber1');

INSERT INTO Users (username, email, password)
VALUES ('cornbread', 'cornbread@email.com', 'cornbread1');

INSERT INTO Users (username, email, password)
VALUES ('ostrich', 'ostrich@email.com', 'ostrich123');



INSERT INTO Posts (postcontent, userID)
VALUES ("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.", 1);

INSERT INTO Posts (postcontent, userID)
VALUES ("A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring", 2);

INSERT INTO Posts (postcontent, userID)
VALUES ("One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.", 3);

INSERT INTO Posts (postcontent, userID)
VALUES ("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.", 4);

INSERT INTO Posts (postcontent, userID)
VALUES ("The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc", 5);

INSERT INTO Posts (postcontent, userID)
VALUES ("But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born", 6);

INSERT INTO Posts (postcontent, userID)
VALUES ("The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.", 7);

INSERT INTO Posts (postcontent, userID)
VALUES ("But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born", 8);

INSERT INTO Posts (postcontent, userID)
VALUES ("The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.", 9);

INSERT INTO Posts (postcontent, userID)
VALUES ("A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring", 10);

INSERT INTO Posts (postcontent, userID)
VALUES ("But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born", 3);

INSERT INTO Posts (postcontent, userID)
VALUES ("The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.", 4);

INSERT INTO Posts (postcontent, userID)
VALUES ("The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc", 7);

INSERT INTO Posts (postcontent, userID)
VALUES ("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.", 9);

INSERT INTO Posts (postcontent, userID)
VALUES ("The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc", 2);

INSERT INTO Posts (postcontent, userID)
VALUES ("A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring", 4);

INSERT INTO Posts (postcontent, userID)
VALUES ("One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.", 5);

INSERT INTO Posts (postcontent, userID)
VALUES ("The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.", 1);

INSERT INTO Posts (postcontent, userID)
VALUES ("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.", 1);

INSERT INTO Posts (postcontent, userID)
VALUES ("Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.", 3);