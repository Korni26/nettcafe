CREATE DATABASE nettcafedb;

CREATE TABLE images (
id INT AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(255),
productDescription VARCHAR(255),
price VARCHAR(11),
`image` longblob NOT NULL,
`created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE adminuser (
id INT AUTO_INCREMENT PRIMARY KEY,
brukernavn VARCHAR(255),
passord VARCHAR(255)
);

CREATE TABLE FAQ (
id INT AUTO_INCREMENT PRIMARY KEY,
Email VARCHAR(255),
Navn VARCHAR(255),
question VARCHAR(255)
);


INSERT INTO adminuser (brukernavn, passord) VALUES ('brukernavn', 'passord');