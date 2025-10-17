-- Items Table
CREATE TABLE Fidgets (
FidgetID               INT(11)        NOT NULL,
FidgetCode             VARCHAR(10)    NOT NULL   UNIQUE,
FidgetName             VARCHAR(255)   NOT NULL,
FidgetDescription      TEXT           NOT NULL,
FidgetMaterial         VARCHAR(255)      NOT NULL,
FidgetColor             VARCHAR(255)      NOT NULL,
FidgetTypeID           INT(11)        NOT NULL,
FidgetWholesalePrice   DECIMAL(10,2)  NOT NULL,
FidgetListPrice        DECIMAL(10,2)  NOT NULL,
DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (FidgetID )
);

SELECT * from Fidgets;