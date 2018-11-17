
DROP DATABASE IF EXISTS `base_php_blog`;
CREATE DATABASE base_php_blog;
USE base_php_blog;

CREATE TABLE IF NOT EXISTS users
(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS articles
(
	id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	image VARCHAR (255) NOT NULL DEFAULT 'cat.svg',
	author VARCHAR(255) NOT NULL,
	date DATETIME NOT NULL DEFAULT NOW(),/* DATE_FORMAT(datetime, '%Y-%m-%d') */
	PRIMARY KEY (id),
	FOREIGN KEY(author) REFERENCES users(username)
)ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS comments
(
	id INT NOT NULL AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	article INT(10) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY(article) REFERENCES articles(id)
)ENGINE=InnoDB CHARACTER SET=utf8;

INSERT INTO users (username, password) VALUES('florian', 'pass');
INSERT INTO users (username, password) VALUES('damien', 'pass');
INSERT INTO users (username, password) VALUES('amine', 'pass');
INSERT INTO users (username, password) VALUES('theo', 'pass');
INSERT INTO users (username, password) VALUES('hassan', 'pass');

INSERT INTO articles (title, content, image, author) VALUES ('Un bon article', 'Contenu du bon article', 'cat.jpg', 'florian'),
															('Un article pas super', 'Contenu article', 'default.gif', 'florian'),
															('Un super article', 'Contenu du super article', 'default.gif', 'theo');

INSERT INTO comments (username, content, article) VALUES ('florian', 'Un bon article', 1),
														 ('damien', 'Tu commentes ton propre article ?', 1),
														 ('damien', 'Un article assez nul. Booo!', 2);
