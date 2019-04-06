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

INSERT INTO user_table (userid, firstname, lastname, email, pass, islibrarian, fine) VALUES
 (1, "John", "Han", "junbeomh94@gmail.com", "password123", 1, NULL),
 (2, "Craig", "Goodison", "craigg@hotmail.com", "password1234", 1, NULL),
 (3, "Daniel", "Kim", "danielkim@my.bcit.ca", "123password", 1, NULL),
 (4, "Ethan", "Lee", "ethanlee@gmail.com", "ehtanlee", 0, 100.00),
 (5, "JiHyo", "Kim", "kimjihyo@naver.com", "jihyojjang123", 0, 3.50),
 (6, "Leon", "Lee", "leonlee86@gmail.com", "mynameisleon", 0, NULL),
 (7, "Chirag", "Fernandez", "chitychitybang@gmail.com", "radiohead123", 0, NULL),
 (8, "Joshua", "Lam", "jlam@gmail.com", "p1a2s3s4", 0, NULL),
 (9, "Wayne", "Chang", "wchangster@my.bcit.ca", "waynechang", 0, 31.30),
 (10, "Lucy", "Lu", "lucylu@hotmail.com", "lucyisthename", 0, NULL)
;



