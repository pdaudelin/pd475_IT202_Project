<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidgettype.php");
session_start();

if (isset($_SESSION['login'])) {
    // Validate and sanitize inputs
    $FidgetTypeID = filter_input(INPUT_POST, 'FidgetTypeID', FILTER_VALIDATE_INT);

    if ($FidgetTypeID === null || $FidgetTypeID === false) {
        echo "<h2>Sorry, you must enter a valid Fidget Type ID number</h2>\n";
    } else if (FidgetType::findFidgetType($FidgetTypeID)) {
        echo "<h2>Sorry, a Fidget Type with ID #$FidgetTypeID already exists.</h2>\n";
    } else {
        $FidgetTypeCode = htmlspecialchars($_POST['FidgetTypeCode']);
        $FidgetTypeName = htmlspecialchars($_POST['FidgetTypeName']);
        $FidgetShelfNumber = htmlspecialchars($_POST['FidgetShelfNumber']);

        // Create a new FidgetType object
        $fidgetType = new FidgetType($FidgetTypeID, $FidgetTypeCode, $FidgetTypeName, $FidgetShelfNumber);
        $result = $fidgetType->saveFidgetType();

        if ($result) {
            echo "<h2>New Fidget Type #$FidgetTypeID successfully added</h2>\n";
            echo "<p><strong>Code:</strong> $FidgetTypeCode<br>";
            echo "<strong>Name:</strong> $FidgetTypeName<br>";
            echo "<strong>Shelf Number:</strong> $FidgetShelfNumber</p>";
        } else {
            echo "<h2>Sorry, there was a problem adding that Fidget Type</h2>\n";
        }
    }
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>
