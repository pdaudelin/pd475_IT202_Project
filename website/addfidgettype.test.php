<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 2 pd475@njit.edu
require_once("fidgettype.php");
session_start(); // make sure session is started

//if (isset($_SESSION['login'])) {
    $FidgetTypeID = $_POST['FidgetTypeID'];

    if (trim($FidgetTypeID) == '' || !is_numeric($FidgetTypeID)) {
        echo "<h2>Sorry, you must enter a valid Fidget Type ID number</h2>\n";
    } else {
        $FidgetTypeCode = $_POST['FidgetTypeCode'];
        $FidgetTypeName = $_POST['FidgetTypeName'];
        $FidgetShelfNumber = $_POST['FidgetShelfNumber'];

        // Create a new object from your FidgetType class
        $fidgetType = new FidgetType($FidgetTypeID, $FidgetTypeCode, $FidgetTypeName, $FidgetShelfNumber);
        $result = $fidgetType->saveFidgetType();

        if ($result) {
            echo "<h2>New Category #$FidgetTypeID successfully added</h2>\n";
            echo "<h2>Category Number: $FidgetTypeID</h2>\n";
            echo "<h2>$FidgetTypeCode, $FidgetTypeName</h2>\n";
            echo "<h2>Shelf Number: $FidgetShelfNumber</h2>\n";        
        }
        else
            echo "<h2>Sorry, there was a problem adding that Fidget Type</h2>\n";
    }
//} else {
//    echo "<h2>Please log in first</h2>\n";
//}
?>