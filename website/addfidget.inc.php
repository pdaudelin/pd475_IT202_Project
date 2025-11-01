<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidget.php");
session_start();

if (isset($_SESSION['login'])) {
    // Validate and sanitize the ID
    $FidgetID = filter_input(INPUT_POST, 'FidgetTypeID', FILTER_VALIDATE_INT);

    if ($FidgetID === null || $FidgetID === false) {
        echo "<h2>Sorry, you must enter a valid Fidget Type ID number</h2>\n";
    } else if (Fidget::findFidget($FidgetID)) {
        echo "<h2>Sorry, a Fidget with ID #$FidgetID already exists.</h2>\n";
    } else {
        // Sanitize other input fields
        $FidgetCode = htmlspecialchars($_POST['FidgetCode']);
        $FidgetName = htmlspecialchars($_POST['FidgetName']);
        $FidgetDescription = htmlspecialchars($_POST['FidgetDescription']);
        $FidgetMaterial = htmlspecialchars($_POST['FidgetMaterial']);
        $FidgetColor = htmlspecialchars($_POST['FidgetColor']);
        $FidgetTypeID = htmlspecialchars($_POST['FidgetTypeID']);
        $FidgetWholesalePrice = htmlspecialchars($_POST['FidgetWholesalePrice']);
        $FidgetListPrice = htmlspecialchars($_POST['FidgetListPrice']);

        // Create new Fidget object
        $fidget = new Fidget(
            $FidgetID,
            $FidgetCode,
            $FidgetName,
            $FidgetDescription,
            $FidgetMaterial,
            $FidgetColor,
            $FidgetTypeID,
            $FidgetWholesalePrice,
            $FidgetListPrice
        );

        $result = $fidget->saveFidget();

        if ($result) {
            echo "<h2>New Fidget #$FidgetID successfully added</h2>\n";
            echo "<p><strong>Code:</strong> $FidgetCode<br>";
            echo "<strong>Name:</strong> $FidgetName<br>";
            echo "<strong>Material:</strong> $FidgetMaterial<br>";
            echo "<strong>Color:</strong> $FidgetColor<br>";
            echo "<strong>Wholesale:</strong> $$FidgetWholesalePrice<br>";
            echo "<strong>List:</strong> $$FidgetListPrice</p>";
        } else {
            echo "<h2>Sorry, there was a problem adding that Fidget</h2>\n";
        }
    }
} else {
    echo "<h2>Please log in first</h2>\n";
}
?>

