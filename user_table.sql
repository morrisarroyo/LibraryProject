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
 ("Lucy", "Lu", "lucylu@hotmail.com", "lucyisthename", 0, NULL);



