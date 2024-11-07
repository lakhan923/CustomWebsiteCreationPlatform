-- First step Create Database:
CREATE DATABASE web_dev_co;
USE web_dev_co;

--Second step Create Tables:
CREATE TABLE ContactMessages (
  MessageID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(100) NOT NULL,
  Email varchar(100) NOT NULL,
  Message text NOT NULL,
  SubmissionDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (MessageID)
);

CREATE TABLE Feedback (
  FeedbackID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(100) NOT NULL,
  Email varchar(100) NOT NULL,
  Message text NOT NULL,
  SubmissionDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (FeedbackID)
);

CREATE TABLE Appointments (
  AppointmentID int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(100) NOT NULL,
  Email varchar(100) NOT NULL,
  Phone varchar(15) DEFAULT NULL,
  PreferredDate date NOT NULL,
  PreferredTime time NOT NULL,
  Message text DEFAULT NULL,
  SubmissionDate timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (AppointmentID)
);


-- Inserting Initial Data
INSERT INTO ContactMessages (Name, Email, Message) VALUES 

-- User input through the web interface
('John Doe', 'johndoe@example.com', 'This is a test message'),
('Laiba khan', 'laaaibah@gmail.com', 'hi just checking'),
('Laiba khan', 'gr287157@gradia.fi', '	hei! i am checking if database is getting any data.'),

-- Inserting data directly via SQL
('Jane Smith', 'janesmith@example.com', 'Hello! I would like more information.'),
('Alice Johnson', 'alicej@example.com', 'Great service! Thank you.'),
('Bob Brown', 'bobb@example.com', 'Looking forward to your reply.'),
('Charlie Davis', 'charlied@example.com', 'This is a feedback message.'),
('Daisy Evans', 'daisye@example.com', 'I have a question regarding pricing.'),
('Eve Foster', 'evef@example.com', 'Thank you for the quick response!'),
('Frank Green', 'frankg@example.com', 'I would like to schedule an appointment.');



INSERT INTO Feedback (Name, Email, Message) VALUES

-- User input through the web interface
('Laiba Khan', 'laaaibah@gmail.com', 'Hei just testing'),
('Laiba Khan', 'laaaibah@gmail.com', 'hei just checking');



INSERT INTO Appointments (Name, Email, Message) VALUES

-- User input through the web interface
('Laiba Khan', 'laaaibah@gmail.com', 'I have a question regarding pricing.'),
('Laiba Khan', 'laaaibah@gmail.com', 'Thank you for the quick response!');

