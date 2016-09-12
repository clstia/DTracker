-- CREATE USER FOR DEV
DROP USER 'user';
CREATE USER 'user' IDENTIFIED BY 'password';

-- CREATE DATABASE
DROP DATABASE IF EXISTS documentTracker;
CREATE DATABASE documentTracker;

-- GRANT ALL PRIVILEGES TO USER
GRANT ALL ON documentTracker.* TO 'user';
FLUSH PRIVILEGES;

-- USE DATABASE
USE documentTracker;

-- DOCUMENT
DROP TABLE IF EXISTS document;
CREATE TABLE document(
    documentID INT NOT NULL AUTO_INCREMENT,
    documentName VARCHAR(128) NOT NULL,
    documentDesc VARCHAR(1024) NOT NULL,
    dateAdded DATE NOT NULL,
    isStored INT NOT NULL DEFAULT 0,
    PRIMARY KEY(documentID)
);

-- DRAWER
DROP TABLE IF EXISTS drawer;
CREATE TABLE drawer(
    drawerID INT NOT NULL AUTO_INCREMENT,
    drawerName VARCHAR(128) NOT NULL,
    PRIMARY KEY(drawerID)
);

-- STORAGE
DROP TABLE IF EXISTS storage;
CREATE TABLE storage(
    drawerID INT NOT NULL,
    documentID INT NOT NULL,
    FOREIGN KEY(drawerID) REFERENCES drawer(drawerID),
    FOREIGN KEY(documentID) REFERENCES document(documentID)
);
