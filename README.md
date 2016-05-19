Web Lab 2 Copyright Ray 2016

这里因为限制了userName是unique,所以当注册相同用户名时,会报错

上传图片时没截取一下,可以任意上传,本来应该要求截成正方形之类的

当创建用户时,没上传图片时,查询用户时图片那栏没有显示默认头像

查询信息后,点开edit,或者时info,如果直接点击浏览器的后退按钮,会提示表单重新提交,此处会有问题

管理员可以增删改查用户的信息,管理员不支持改密码.

用户只能查所有信息,改自己的信息


这次代码写的实在是垃圾

用到了Bootstrap,Vue.js和font-awesome

Vue.js只用在了导航栏中按钮动态添加class,本来还能用在表单的自动检验上,没加....

代码注释几乎没有

封装函数没封装,scrip脚本全是写在php页面中(写的真垃圾)

幸好不用后期维护...........

没实现MVC简直是噩梦

以下是创建数据库语句

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
  ("1","1","Ray","339005111111111111","business工作单位","2014",1,"12345678901","hangzhou","311222","image/headImage.png",1);
INSERT INTO students (userName, userPassword, realName, cardNo, business, enterYear, classId, mobile, address, zipcode, image, isUse) VALUES
  ("2","2","hhh","339005222222222222","business工作单位","2014",1,"12345678901","hangzhou","311222","image/headImage.png",1);