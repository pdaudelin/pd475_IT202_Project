<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 2 pd475@njit.edu
require_once('database.php');

class FidgetType
{
    public $FidgetTypeID;
    public $FidgetTypeCode;
    public $FidgetTypeName;
    public $FidgetShelfNumber;

    // Constructor
    function __construct($FidgetTypeID, $FidgetTypeCode, $FidgetTypeName, $FidgetShelfNumber)
    {
        $this->FidgetTypeID = $FidgetTypeID;
        $this->FidgetTypeCode = $FidgetTypeCode;
        $this->FidgetTypeName = $FidgetTypeName;
        $this->FidgetShelfNumber = $FidgetShelfNumber;
    }

    // Optional: Display object info nicely
    function __toString()
    {
        return "<h2>Fidget Type ID: $this->FidgetTypeID</h2>\n" .
               "<h3>$this->FidgetTypeCode - $this->FidgetTypeName (Shelf: $this->FidgetShelfNumber)</h3>\n";
    }

    // INSERT
    function saveFidgetType()
    {
        $db = getDB();
        $query = "INSERT INTO FidgetTypes (FidgetTypeID, FidgetTypeCode, FidgetTypeName, FidgetShelfNumber)
                  VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "issi",
            $this->FidgetTypeID,
            $this->FidgetTypeCode,
            $this->FidgetTypeName,
            $this->FidgetShelfNumber
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    // SELECT ALL
    static function getFidgetTypes()
    {
        $db = getDB();
        $query = "SELECT * FROM FidgetTypes";
        $result = $db->query($query);

        if ($result && $result->num_rows > 0) {
            $fidgetTypes = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $fidgetType = new FidgetType(
                    $row['FidgetTypeID'],
                    $row['FidgetTypeCode'],
                    $row['FidgetTypeName'],
                    $row['FidgetShelfNumber']
                );
                $fidgetTypes[] = $fidgetType;
            }
            $db->close();
            return $fidgetTypes;
        } else {
            $db->close();
            return NULL;
        }
    }

    // FIND ONE
    static function findFidgetType($FidgetTypeID)
    {
        $db = getDB();
        $query = "SELECT * FROM FidgetTypes WHERE FidgetTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $FidgetTypeID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($row) {
            $fidgetType = new FidgetType(
                $row['FidgetTypeID'],
                $row['FidgetTypeCode'],
                $row['FidgetTypeName'],
                $row['FidgetShelfNumber']
            );
            $db->close();
            return $fidgetType;
        } else {
            $db->close();
            return NULL;
        }
    }

    // UPDATE
    function updateFidgetType()
    {
        $db = getDB();
        $query = "UPDATE FidgetTypes
                  SET FidgetTypeCode = ?, FidgetTypeName = ?, FidgetShelfNumber = ?
                  WHERE FidgetTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "ssii",
            $this->FidgetTypeCode,
            $this->FidgetTypeName,
            $this->FidgetShelfNumber,
            $this->FidgetTypeID
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    // DELETE
    function removeFidgetType()
    {
        $db = getDB();
        $query = "DELETE FROM FidgetTypes WHERE FidgetTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $this->FidgetTypeID);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    public static function getFidgetTypeCount() {
        $db = getDB();
        $query = "SELECT COUNT(*) AS cnt FROM FidgetTypes";
        if ($stmt = $db->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($cnt);
            $stmt->fetch();
            $stmt->close();
            return (int)$cnt;
        }
        return 0;
    }    
    
}
