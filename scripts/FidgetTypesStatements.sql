-- Categories Table

CREATE TABLE FidgetTypes (
FidgetTypeID       INT(11)        NOT NULL,
FidgetTypeCode     VARCHAR(255)   NOT NULL   UNIQUE,
FidgetTypeName     VARCHAR(255)   NOT NULL,
FidgetShelfNumber  INT(11)        NOT NULL,
DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY ( FidgetTypeID )
);

SELECT * from FidgetTypes;