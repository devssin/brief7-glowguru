CREATE DATABASE glowguru;
USE glowguru;

CREATE TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO users (username, email, password) VALUES ('nissay', 'yassin.aaynealhayate@gmail.com', '$2y$10$XX5EDjJ7PCVyaX7HIwPAJ.cFCykThrVidOCoji.NJ86uVxidLR/Ea');

CREATE TABLE category(
    id int PRIMARY KEY AUTO_INCREMENT, 
    name_cat varchar(255),
    description VARCHAR(500)
);

INSERT INTO category (name_cat, description) VALUES ('Visage', 'This is visage category');
INSERT INTO category (name_cat, description) VALUES ('Cheuveux', 'This is cheuveux category');
INSERT INTO category (name_cat, description) VALUES ('Main', 'This is mains category');

CREATE TABLE product (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    image VARCHAR(255),
    price DECIMAL,
    description VARCHAR(500),
    id_cat int,
    Foreign Key (id_cat) REFERENCES category(id) ON DELETE SET NULL
);


ALTER TABLE category ADD COLUMN image VARCHAR(255) AFTER name_cat;

