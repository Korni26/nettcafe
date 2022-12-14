CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    productName VARCHAR(255), 
    productDescription VARCHAR(255), 
    price VARCHAR(11)
    ); 

CREATE TABLE adminuser (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    brukernavn VARCHAR(255), 
    passord VARCHAR(255)
    ); 