<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidget.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Check if user canceled
    if (isset($_POST['cancel'])) {
        echo "<h2>Update canceled — no changes made.</h2>";
        exit;
    }

    // 2. Check if user is logged in
    if (!isset($_SESSION['login'])) {
        echo "<h2>Error: You must be logged in to update a fidget.</h2>";
        exit;
    }

    $FidgetID = $_POST['FidgetID'] ?? '';

    if ($FidgetID === '') {
        echo "<h2>No Fidget selected</h2>";
        exit;
    }

    // 3. Find the existing fidget
    $fidget = Fidget::findFidget($FidgetID);

    if (!$fidget) {
        echo "<h2>Fidget $FidgetID not found</h2>";
        exit;
    }

    // 4. Assign updated values
    $fidget->FidgetCode = $_POST['FidgetCode'] ?? $fidget->FidgetCode;
    $fidget->FidgetName = $_POST['FidgetName'] ?? $fidget->FidgetName;
    $fidget->FidgetDescription = $_POST['FidgetDescription'] ?? $fidget->FidgetDescription;
    $fidget->FidgetMaterial = $_POST['FidgetMaterial'] ?? $fidget->FidgetMaterial;
    $fidget->FidgetColor = $_POST['FidgetColor'] ?? $fidget->FidgetColor;
    $fidget->FidgetTypeID = $_POST['FidgetTypeID'] ?? $fidget->FidgetTypeID;
    $fidget->FidgetWholesalePrice = $_POST['FidgetWholesalePrice'] ?? $fidget->FidgetWholesalePrice;
    $fidget->FidgetListPrice = $_POST['FidgetListPrice'] ?? $fidget->FidgetListPrice;

    // 5. Perform update
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

