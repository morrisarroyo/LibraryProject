DROP TABLE book;

CREATE TABLE book (
bookid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(40) NOT NULL,
authorfirstname VARCHAR(40),
Authorlastname VARCHAR(40),
isbn INT,
year INT(4)
);

INSERT INTO book (title, authorfirstname, authorlastname, isbn, year) VALUES
("Hunger Game", "Suzanne", "Collins", 439023483, 2008),
("Twilight", "Stephenie", "Meyer", 316015849, 2005),
("The Great Gatsby", "Scott", "Fitzgerald",743273567,1925),
("The Fault in Our Stars", "John", "Green",525478817,2012),
("Angels & Demons", "Dan", "Brown",1416524797,2000),
("Pride and Prejudice", "Jane", "Austen",679783261,1813),
("The Kite Runner", "Khaled","Hosseini",1594480001,2003),
("Divergent","Veronica","Roth",62024035,2011),
("Nineteen Eighty-Four", "George", "Orwell",451524934,1945),
("Animal Farm: A Fairy Story", "George", "Orwell",452284244,1949),
("Catching Fire","Suzanne", "Collins", 439023491, 2009),
("Mockingjay", "Suzanne", "Collins", 439023513, 2010),
("The Lovely Bones", "Alice", "Sebold", 316166685, 2002),
("The Da Vinci Code", "Dan", "Brown",307277674,2003),
("Lord of the Flies", "William", "Golding", 140283331,1954),
("Gone Girl", "Gillian","Flynn", 297859382,2012)
;