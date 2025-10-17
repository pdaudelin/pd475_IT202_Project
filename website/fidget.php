<?php
require_once('database.php');

class Fidget
{
    public $FidgetID;
    public $FidgetCode;
    public $FidgetName;
    public $FidgetDescription;
    public $FidgetMaterial;
    public $FidgetColor;
    public $FidgetTypeID;
    public $FidgetWholesalePrice;
    public $FidgetListPrice;

    // Constructor
    function __construct(
        $FidgetID,
        $FidgetCode,
        $FidgetName,
        $FidgetDescription,
        $FidgetMaterial,
        $FidgetColor,
        $FidgetTypeID,
        $FidgetWholesalePrice,
        $FidgetListPrice
    ) {
        $this->FidgetID = $FidgetID;
        $this->FidgetCode = $FidgetCode;
        $this->FidgetName = $FidgetName;
        $this->FidgetDescription = $FidgetDescription;
        $this->FidgetMaterial = $FidgetMaterial;
        $this->FidgetColor = $FidgetColor;
        $this->FidgetTypeID = $FidgetTypeID;
        $this->FidgetWholesalePrice = $FidgetWholesalePrice;
        $this->FidgetListPrice = $FidgetListPrice;
    }

    // Display
    function __toString()
    {
        return "<h2>Fidget ID: $this->FidgetID</h2>\n" .
               "<h3>$this->FidgetName ($this->FidgetCode)</h3>\n" .
               "<p>$this->FidgetDescription</p>\n" .
               "<p>Material: $this->FidgetMaterial | Color: $this->FidgetColor</p>\n" .
               "<p>Type ID: $this->FidgetTypeID | Wholesale: $$this->FidgetWholesalePrice | List: $$this->FidgetListPrice</p>\n";
    }

    // INSERT
    function saveFidget()
    {
        $db = getDB();
        $query = "INSERT INTO Fidgets 
                  (FidgetID, FidgetCode, FidgetName, FidgetDescription, FidgetMaterial, FidgetColor, FidgetTypeID, FidgetWholesalePrice, FidgetListPrice)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "isssssidd",
            $this->FidgetID,
            $this->FidgetCode,
            $this->FidgetName,
            $this->FidgetDescription,
            $this->FidgetMaterial,
            $this->FidgetColor,
            $this->FidgetTypeID,
            $this->FidgetWholesalePrice,
            $this->FidgetListPrice
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    // SELECT ALL
    static function getFidgets()
    {
        $db = getDB();
        $query = "SELECT * FROM Fidgets";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $fidgets = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $fidget = new Fidget(
                    $row['FidgetID'],
                    $row['FidgetCode'],
                    $row['FidgetName'],
                    $row['FidgetDescription'],
                    $row['FidgetMaterial'],
                    $row['FidgetColor'],
                    $row['FidgetTypeID'],
                    $row['FidgetWholesalePrice'],
                    $row['FidgetListPrice']
                );
                array_push($fidgets, $fidget);
            }
            $db->close();
            return $fidgets;
        } else {
            $db->close();
            return NULL;
        }
    }

    // FIND ONE
    static function findFidget($FidgetID)
    {
        $db = getDB();
        $query = "SELECT * FROM Fidgets WHERE FidgetID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $FidgetID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($row) {
            $fidget = new Fidget(
                $row['FidgetID'],
                $row['FidgetCode'],
                $row['FidgetName'],
                $row['FidgetDescription'],
                $row['FidgetMaterial'],
                $row['FidgetColor'],
                $row['FidgetTypeID'],
                $row['FidgetWholesalePrice'],
                $row['FidgetListPrice']
            );
            $db->close();
            return $fidget;
        } else {
            $db->close();
            return NULL;
        }
    }

    // UPDATE
    function updateFidget()
    {
        $db = getDB();
        $query = "UPDATE Fidgets
                  SET FidgetCode = ?, FidgetName = ?, FidgetDescription = ?, 
                      FidgetMaterial = ?, FidgetColor = ?, FidgetTypeID = ?, 
                      FidgetWholesalePrice = ?, FidgetListPrice = ?
                  WHERE FidgetID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "sssssiddd",
            $this->FidgetCode,
            $this->FidgetName,
            $this->FidgetDescription,
            $this->FidgetMaterial,
            $this->FidgetColor,
            $this->FidgetTypeID,
            $this->FidgetWholesalePrice,
            $this->FidgetListPrice,
            $this->FidgetID
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    // DELETE
    function removeFidget()
    {
        $db = getDB();
        $query = "DELETE FROM Fidgets WHERE FidgetID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $this->FidgetID);
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    // GET BY TYPE (like getItemsByCategory)
    static function getFidgetsByType($FidgetTypeID)
    {
        $db = getDB();
        $query = "SELECT * FROM Fidgets WHERE FidgetTypeID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $FidgetTypeID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $fidgets = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $fidget = new Fidget(
                    $row['FidgetID'],
                    $row['FidgetCode'],
                    $row['FidgetName'],
                    $row['FidgetDescription'],
                    $row['FidgetMaterial'],
                    $row['FidgetColor'],
                    $row['FidgetTypeID'],
                    $row['FidgetWholesalePrice'],
                    $row['FidgetListPrice']
                );
                array_push($fidgets, $fidget);
            }
            $db->close();
            return $fidgets;
        } else {
            $db->close();
            return NULL;
        }
    }
}
?>
