CREATE DATABASE classroomDB;
USE classroomDB;

DROP TABLE user_message;
DROP TABLE user;

CREATE TABLE user ( 
userId INT NOT NULL AUTO_INCREMENT, 
username VARCHAR(255), 
password VARCHAR(255), 
name NVARCHAR(255), 
email VARCHAR(255), 
phoneNumber VARCHAR(20), 
type int, 
PRIMARY KEY (userId));

CREATE TABLE user_message ( 
messageId INT NOT NULL AUTO_INCREMENT, 
fromUserId INT,
toUserId INT,
content NVARCHAR(2000),
PRIMARY KEY (messageId),
CONSTRAINT fk_from_user FOREIGN KEY (fromUserId) REFERENCES user(userId),
CONSTRAINT fk_to_user FOREIGN KEY (toUserId) REFERENCES user(userId));