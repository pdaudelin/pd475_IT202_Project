<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 2 pd475@njit.edu
require_once("fidget.php");
session_start(); // make sure session is started

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $FidgetID = $_POST['FidgetID'] ?? '';

    if ($FidgetID === '') {
        echo "<h2>No Fidget selected</h2>";
        exit;
    }

    // Find the existing fidget
    $fidget = Fidget::findFidget($FidgetID);

    if (!$fidget) {
        echo "<h2>Fidget $FidgetID not found</h2>";
        exit;
    }

    // Safely assign all POST fields, defaulting if missing
    $fidget->FidgetCode = $_POST['FidgetCode'] ?? $fidget->FidgetCode;
    $fidget->FidgetName = $_POST['FidgetName'] ?? $fidget->FidgetName;
    $fidget->FidgetDescription = $_POST['FidgetDescription'] ?? $fidget->FidgetDescription;
    $fidget->FidgetMaterial = $_POST['FidgetMaterial'] ?? $fidget->FidgetMaterial;
    $fidget->FidgetColor = $_POST['FidgetColor'] ?? $fidget->FidgetColor;
    $fidget->FidgetTypeID = $_POST['FidgetTypeID'] ?? $fidget->FidgetTypeID;
    $fidget->FidgetWholesalePrice = $_POST['FidgetWholesalePrice'] ?? $fidget->FidgetWholesalePrice;
    $fidget->FidgetListPrice = $_POST['FidgetListPrice'] ?? $fidget->FidgetListPrice;

    // Update the fidget
    $result = $fidget->updateFidget();

    if ($result) {
        echo "<h2>Fidget $FidgetID updated successfully</h2>";
    } else {
        echo "<h2>Problem updating Fidget $FidgetID</h2>";
    }

} else {
    echo "<h2>No form submitted</h2>";
}
?>

