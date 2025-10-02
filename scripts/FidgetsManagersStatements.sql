-- Peter Daudelin - 2025-10-02 
--IT202-005 Phase 1 Assignment: Login and Logout
-- pd475@njit.edu
CREATE TABLE FidgetsManagers (
FidgetsManagerID  INT(11)        NOT NULL   AUTO_INCREMENT,
 emailAddress        VARCHAR(255)   NOT NULL   UNIQUE,
 password            VARCHAR(64)    NOT NULL,
 pronouns            VARCHAR(60)    NOT NULL,
 firstName           VARCHAR(60)    NOT NULL,
 lastName            VARCHAR(60)    NOT NULL,
 DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (FidgetsManagerID)
);

INSERT INTO FidgetsManagers (emailAddress, password, pronouns, firstName, lastName)
VALUES ('swaylor@fidgetstore.com', SHA2('myL0ngP@ssword', 256), 'me/maw', 'Swaylor', 'Tift');

INSERT INTO FidgetsManagers (emailAddress, password, pronouns, firstName, lastName)
VALUES ('justin@fidgetstore.com', SHA2('myshrtpswd', 256), 'he/haw', 'Justin', 'Time');

INSERT INTO FidgetsManagers (emailAddress, password, pronouns, firstName, lastName)
VALUES ('barr@fidgetstore.com', SHA2('myP@ssword', 256), 'her/she', 'Barr', 'Chocolate');

SELECT * FROM FidgetsManagers;