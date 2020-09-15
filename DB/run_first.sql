CREATE DATABASE classroomDB;
USE classroomDB;
CREATE TABLE user ( 
UserId INT NOT NULL AUTO_INCREMENT, 
Username VARCHAR(255), 
Password VARCHAR(255), 
Name NVARCHAR(255), 
Email VARCHAR(255), 
PhoneNumber VARCHAR(20), 
Type int, 
PRIMARY KEY (userId));

INSERT INTO user ( username, password, name, email, phonenumber, type) VALUES ('student', 'st', 'Student test 1', 'student@gmail.com', '123456789', 1);
