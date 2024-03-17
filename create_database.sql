CREATE DATABASE my_resturant;
USE my_resturant;
CREATE TABLE `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
  );
CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(50) NOT NULL,
                         `admin` varchar(50) NOT NULL,
                         `email` varchar(50) NOT NULL,
                         `password` varchar(50) NOT NULL,
                         `discount_code` varchar(50) ,
                         `phone` varchar(50) DEFAULT NULL,
                         `address` varchar(50) DEFAULT NULL,
                         PRIMARY KEY (`id`)
) ;
CREATE TABLE `order` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` varchar(50) NOT NULL,
    `food_id` varchar(50) NOT NULL,
    `time` time DEFAULT NULL,
    `date` DATE DEFAULT NULL,
    PRIMARY KEY (`id`)
) ;
CREATE TABLE `restaurant` (
                              `id` int(11) NOT NULL AUTO_INCREMENT ,
                              `name` varchar(50) NOT NULL,
                              `break_fast_id` int(11) NOT NULL,
                              `lunch_id` int(11) NOT NULL,
                              `dinner_id` int(11) NOT NULL,
                              `open_time` TIME,
                              `close_time` TIME,
                              primary key (`id`)
) ;
 INSERT INTO `restaurant` VALUES (1,'mac',1,2,3,"10:00","22:00");
 INSERT INTO `restaurant` VALUES (2,'kfc',4,5,6,"10:00","22:00");
 INSERT INTO `restaurant` VALUES (3,'subway',7,8,9,"10:00","22:00");

 #INSERT INTO `category` VALUES (1,'break_fast');
 #INSERT INTO `category` VALUES (2,'lunch');
 #INSERT INTO `category` VALUES (3,'dinner');


 #INSERT INTO `food` VALUES (1,'egg',1,5.000,1);
 #INSERT INTO `food` VALUES (2,'bread',1,4.000,2);
 #INSERT INTO `food` VALUES (3,'tea',1,9.000,3);
 #INSERT INTO `food` VALUES (4,'rice',2,9.000,1);
 #INSERT INTO `food` VALUES (5,'chicken',2,10.000,2);
 #INSERT INTO `food` VALUES (6,'meat',2,20.000,3);
 #INSERT INTO `food` VALUES (7,'pizza',3,6.000,1);
 #INSERT INTO `food` VALUES (8,'pasta',3,11.000,2);
 #INSERT INTO `food` VALUES (9,'hamburger',3,25.000,3);