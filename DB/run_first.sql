CREATE DATABASE classroomDB;
USE classroomDB;

DROP TABLE user_message;
DROP TABLE submit_job;
DROP TABLE user;
DROP TABLE job;

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

CREATE TABLE job ( 
jobId INT NOT NULL AUTO_INCREMENT, 
jobName VARCHAR(255),
filePath VARCHAR(200),
PRIMARY KEY (jobId));

CREATE TABLE submit_job ( 
userJobId INT NOT NULL AUTO_INCREMENT,
userId INT,
jobId INT,
filePath VARCHAR(200),
PRIMARY KEY (userJobId),
CONSTRAINT fk_job_user_id FOREIGN KEY (jobId) REFERENCES job(jobId));