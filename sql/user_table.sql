DROP TABLE user_table; 

CREATE TABLE user_table(
    userid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(80) NOT NULL,
    lastname VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL,
    pass VARCHAR(80) NOT NULL,
    islibrarian BOOLEAN NOT NULL,
    fine FLOAT
);

INSERT INTO user_table (firstname, lastname, email, pass, islibrarian, fine) VALUES
 ("John", "Han", "junbeomh94@gmail.com", "password123", 1, NULL),
 ("Craig", "Goodison", "craigg@hotmail.com", "password1234", 1, NULL),
 ("Daniel", "Kim", "danielkim@my.bcit.ca", "123password", 1, NULL),
 ("Ethan", "Lee", "ethanlee@gmail.com", "ehtanlee", 0, 100.00),
 ("JiHyo", "Kim", "kimjihyo@naver.com", "jihyojjang123", 0, 3.50),
 ("Leon", "Lee", "leonlee86@gmail.com", "mynameisleon", 0, NULL),
 ("Chirag", "Fernandez", "chitychitybang@gmail.com", "radiohead123", 0, NULL),
 ("Joshua", "Lam", "jlam@gmail.com", "p1a2s3s4", 0, NULL),
 ("Wayne", "Chang", "wchangster@my.bcit.ca", "waynechang", 0, 31.30),
 ("Lucy", "Lu", "lucylu@hotmail.com", "lucyisthename", 0, NULL),
("The Time Traveler's Wife", "Audrey", "Niffenegger", 965818675, 2003),
("Water for Elephants", "Sara","Gruen", 1565125606,2006),
("Eragon", "Christopher","Paolini", 375826696,2002),
("The Host", "Stephenie", "Meyer", 316068047,2008),
("Charlotte's Web", "Rosemary", "Wells", 64410935,1952),
("The Secret Life of Bees", "Sue Monk", "Kidd", 142001740,2001),
("The Girl on the Train", "Paula", "Hawkins", 1594633665,2015),
("Looking for Alaska", "John", "Green", 142402516,1996),
("The Giving Tree", "Shel", "Silverstein", 60256656,1964),
("Little Women", "Louisa May","Alcott", 451529308,1868),
("Brave New World", "Aldous","Huxley", 60929871,1932),
("A Thousand Splendid Suns", "Khaled","Hosseini", 1594489505,2007),
("The Glass Castle", "Jeannette","Walls", 074324754,2005),
("Paper Towns", "John","Green", 014241493,2008),
("A Time to Kill", "John","Grisham", 385338600,1989),
("Into the Wild", "Jon","Krakauer", 385486804,1996);
;



