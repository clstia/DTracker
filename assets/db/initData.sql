-- Filler data for Document Tracker
-- Use databse for Document Tracker
USE documentTracker;

-- Insert documents
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 1", "Generic Description 1", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 2", "Generic Description 2", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 3", "Generic Description 3", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 4", "Generic Description 4", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 5", "Generic Description 5", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 6", "Generic Description 6", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 7", "Generic Description 7", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 8", "Generic Description 8", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 9", "Generic Description 9", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 10", "Generic Description 10", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 11", "Generic Description 11", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 12", "Generic Description 12", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 13", "Generic Description 13", CURDATE());
INSERT INTO document (documentName, documentDesc, dateAdded)
    VALUES ("Generic Document 14", "Generic Description 14", CURDATE());

-- Insert drawers
INSERT INTO drawer (drawerName)
    VALUES ("Generic Drawer 1");
INSERT INTO drawer (drawerName)
    VALUES ("Generic Drawer 2");
INSERT INTO drawer (drawerName)
    VALUES ("Generic Drawer 3");
INSERT INTO drawer (drawerName)
    VALUES ("Generic Drawer 4");
INSERT INTO drawer (drawerName)
    VALUES ("Generic Drawer 5");

-- Store document to drawer
INSERT INTO storage (drawerID, documentID) VALUES (1, 1);
INSERT INTO storage (drawerID, documentID) VALUES (1, 2);
INSERT INTO storage (drawerID, documentID) VALUES (2, 3);
INSERT INTO storage (drawerID, documentID) VALUES (2, 4);
INSERT INTO storage (drawerID, documentID) VALUES (3, 5);
INSERT INTO storage (drawerID, documentID) VALUES (3, 6);
INSERT INTO storage (drawerID, documentID) VALUES (4, 7);
INSERT INTO storage (drawerID, documentID) VALUES (4, 8);

-- Update isStored flag
UPDATE document SET isStored = 1 WHERE documentID = 1;
UPDATE document SET isStored = 1 WHERE documentID = 2;
UPDATE document SET isStored = 1 WHERE documentID = 3;
UPDATE document SET isStored = 1 WHERE documentID = 4;
UPDATE document SET isStored = 1 WHERE documentID = 5;
UPDATE document SET isStored = 1 WHERE documentID = 6;
UPDATE document SET isStored = 1 WHERE documentID = 7;
UPDATE document SET isStored = 1 WHERE documentID = 8;
