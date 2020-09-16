CREATE DATABASE classroomDB;
USE classroomDB;

DROP TABLE user;

CREATE TABLE user ( 
UserId INT NOT NULL AUTO_INCREMENT, 
Username VARCHAR(255), 
Password VARCHAR(255), 
Name NVARCHAR(255), 
Email VARCHAR(255), 
PhoneNumber VARCHAR(20), 
Type int, 
PRIMARY KEY (userId));