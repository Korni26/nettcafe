CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    productName VARCHAR(255), 
    productDescription VARCHAR(255), 
    price VARCHAR(11),
    imageName VARCHAR(255)
    ); 

CREATE TABLE adminuser (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    brukernavn VARCHAR(255), 
    passord VARCHAR(255)
    ); 

--  CREATE TABLE reports (
--     id INT AUTO_INCREMENT PRIMARY KEY, 
--     navn VARCHAR(255), 
--     mail VARCHAR(255),
--     content VARCHAR(255)
--     );    

    INSERT INTO adminuser (brukernavn, passord) VALUES ('brukernavn', 'passord')