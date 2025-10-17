<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 2 pd475@njit.edu
require_once('fidget.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $FidgetID = $_POST['FidgetID'] ?? '';
    $FidgetCode = $_POST['FidgetCode'] ?? '';
    $FidgetName = $_POST['FidgetName'] ?? '';
    $FidgetDescription = $_POST['FidgetDescription'] ?? '';
    $FidgetMaterial = $_POST['FidgetMaterial'] ?? '';
    $FidgetColor = $_POST['FidgetColor'] ?? '';
    $FidgetTypeID = $_POST['FidgetTypeID'] ?? '';
    $FidgetWholesalePrice = $_POST['FidgetWholesalePrice'] ?? 0;
    $FidgetListPrice = $_POST['FidgetListPrice'] ?? 0;

    if (trim($FidgetID) === '' || !is_numeric($FidgetID)) {
        echo "<h2>Sorry, you must enter a valid Fidget ID number</h2>\n";
    } elseif (trim($FidgetCode) === '' || trim($FidgetName) === '') {
        echo "<h2>Fidget Code and Name are required</h2>\n";
    } else {
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

        if ($result)
            echo "<h2>New Fidget #$FidgetID successfully added</h2>\n";
        else
            echo "<h2>Sorry, there was a problem adding that Fidget</h2>\n";
    }
} else {
    echo "<h2>No form data submitted.</h2>";
}
?>
