DROP TABLE user_job_file;
DROP TABLE job;
DROP TABLE user_message;
DROP TABLE users;

CREATE TABLE users ( 
userId INT NOT NULL AUTO_INCREMENT, 
username VARCHAR(255), 
password VARCHAR(255), 
name VARCHAR(255), 
email VARCHAR(255), 
phoneNumber VARCHAR(20), 
type int, 
fbId VARCHAR(255),
PRIMARY KEY (userId));

CREATE TABLE user_message ( 
messageId INT NOT NULL AUTO_INCREMENT, 
fromUserId INT,
toUserId INT,
content VARCHAR(2000),
PRIMARY KEY (messageId),
CONSTRAINT fk_from_user FOREIGN KEY (fromUserId) REFERENCES users(userId),
CONSTRAINT fk_to_user FOREIGN KEY (toUserId) REFERENCES users(userId));

CREATE TABLE job ( 
jobId INT NOT NULL AUTO_INCREMENT, 
jobName VARCHAR(255),
filePath VARCHAR(200),
PRIMARY KEY (jobId));

CREATE TABLE user_job_file ( 
userJobFileId INT NOT NULL AUTO_INCREMENT,
userId INT,
jobId INT,
filePath VARCHAR(200),
PRIMARY KEY (userJobFileId),
CONSTRAINT fk_job_user_id FOREIGN KEY (jobId) REFERENCES job(jobId),
CONSTRAINT fk_user_id FOREIGN KEY (userId) REFERENCES users(userId));