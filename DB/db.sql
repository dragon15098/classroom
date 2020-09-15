CREATE SCHEMA classroom;
USE classroomDB;
SET classroom;
CREATE TABLE user ( userId INT NOT NULL, Username VARCHAR(255), Password VARCHAR(255), Name NVARCHAR(255), Email VARCHAR(255), PhoneNumber VARCHAR(20), type int, PRIMARY KEY (userId));
