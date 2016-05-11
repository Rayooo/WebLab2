Web Lab 2 Copyright Ray 2016

CREATE DATABASE WebLab2  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE admins
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  adminName VARCHAR(30) NOT NULL UNIQUE,
  adminPassword VARCHAR(30) NOT NULL ,
  isUse INT NULL DEFAULT 1
);

CREATE TABLE colleges
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  collegeName VARCHAR(30) NOT NULL ,
  isUse INT NULL DEFAULT 1
);

CREATE TABLE specialities
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  specialityName VARCHAR(50) NOT NULL,
  collegeId INT NOT NULL,
  isUse INT NOT NULL DEFAULT 1,
  FOREIGN KEY (collegeId) REFERENCES colleges(id)
);

CREATE TABLE classes
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  className VARCHAR(50) NOT NULL ,
  specialityId INT NOT NULL ,
  isUse INT NOT NULL DEFAULT 1,
  FOREIGN KEY (specialityId) REFERENCES specialities(id)
);

CREATE TABLE students
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  userName VARCHAR(50) NOT NULL UNIQUE,
  userPassword VARCHAR(50) NOT NULL ,
  realName VARCHAR(50) NOT NULL ,
  cardNo VARCHAR(50) NOT NULL ,
  business VARCHAR(50),
  enterYear VARCHAR(50) NOT NULL ,
  classId INT NOT NULL ,
  mobile VARCHAR(50),
  address VARCHAR(50),
  zipcode VARCHAR(50),
  image VARCHAR(255),
  isUse INT NOT NULL DEFAULT 1,
  FOREIGN KEY (classId) REFERENCES classes(id)
);

INSERT INTO admins (adminName, adminPassword) VALUES (1,1);

INSERT INTO colleges (collegeName, isUse) VALUES ("杭州师范大学",1);
INSERT INTO colleges (collegeName, isUse) VALUES ("HZNU",1);
INSERT INTO colleges (collegeName, isUse) VALUES ("浙江大学",1);

INSERT INTO specialities (specialityName, collegeId, isUse) VALUES ("计算机",1,1);
INSERT INTO specialities (specialityName, collegeId, isUse) VALUES ("软工",1,1);
INSERT INTO specialities (specialityName, collegeId, isUse) VALUES ("计算机",2,1);

INSERT INTO classes (className, specialityId, isUse) VALUES ("计算机143",1,1);
INSERT INTO classes (className, specialityId, isUse) VALUES ("计算机144",1,1);

INSERT INTO students (userName, userPassword, realName, cardNo, business, enterYear, classId, mobile, address, zipcode, image, isUse) VALUES
("1","1","Ray","2014210834","business工作单位","2014",1,"12345678901","hangzhou","311222","http://rayooo.github.io/images/headImage.JPG",1);
INSERT INTO students (userName, userPassword, realName, cardNo, business, enterYear, classId, mobile, address, zipcode, image, isUse) VALUES
  ("1","1","hhh","2014210834","business工作单位","2014",1,"12345678901","hangzhou","311222","http://rayooo.github.io/images/headImage.JPG",1);