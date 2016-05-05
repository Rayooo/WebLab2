Web Lab 2 Copyright Ray 2016

CREATE DATABASE WebLab2  CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE admins
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  adminName VARCHAR(30) NOT NULL ,
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
  userName VARCHAR(50) NOT NULL ,
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