<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidget.php");
session_start();

if (isset($_SESSION['login'])) {

    // ---- Validate FidgetID ----
    $FidgetID = filter_input(INPUT_POST, 'FidgetID', FILTER_VALIDATE_INT);

    if ($FidgetID === false || $FidgetID < 1 || $FidgetID > 99999) {
        echo "<h2>FidgetID must be an integer between 1 and 99999.</h2>\n";
        exit();
    }

    if (Fidget::findFidget($FidgetID)) {
        echo "<h2>Sorry, a Fidget with ID #$FidgetID already exists.</h2>\n";
        exit();
    }

    // ---- Validate FidgetCode ----
    $FidgetCode = filter_input(INPUT_POST, 'FidgetCode', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetCode) < 3 || strlen($FidgetCode) > 10) {
        echo "<h2>FidgetCode must be between 3 and 10 characters.</h2>\n";
        exit();
    }

    // ---- Validate FidgetName ----
    $FidgetName = filter_input(INPUT_POST, 'FidgetName', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetName) < 10 || strlen($FidgetName) > 100) {
        echo "<h2>FidgetName must be between 10 and 100 characters.</h2>\n";
        exit();
    }

    // ---- Validate FidgetDescription ----
    $FidgetDescription = filter_input(INPUT_POST, 'FidgetDescription', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetDescription) < 100 || strlen($FidgetDescription) > 255) {
        echo "<h2>FidgetDescription must be between 100 and 255 characters.</h2>\n";
        exit();
    }

    // ---- Validate FidgetMaterial ----
    $FidgetMaterial = filter_input(INPUT_POST, 'FidgetMaterial', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetMaterial) < 2 || strlen($FidgetMaterial) > 50) {
        echo "<h2>FidgetMaterial must be between 2 and 50 characters.</h2>\n";
        exit();
    }

    // ---- Validate FidgetColor ----
    $FidgetColor = filter_input(INPUT_POST, 'FidgetColor', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetColor) < 2 || strlen($FidgetColor) > 30) {
        echo "<h2>FidgetColor must be between 2 and 30 characters.</h2>\n";
        exit();
    }

    // ---- Validate FidgetTypeID ----
    $FidgetTypeID = filter_input(INPUT_POST, 'FidgetTypeID', FILTER_VALIDATE_INT);

    if ($FidgetTypeID === false || $FidgetTypeID < 1 || $FidgetTypeID > 999) {
        echo "<h2>FidgetTypeID must be an integer between 1 and 999.</h2>\n";
        exit();
    }

    // ---- Validate FidgetWholesalePrice ----
    $FidgetWholesalePrice = filter_input(INPUT_POST, 'FidgetWholesalePrice', FILTER_VALIDATE_FLOAT);

    if ($FidgetWholesalePrice === false || $FidgetWholesalePrice < 0.01 || $FidgetWholesalePrice > 9999.99) {
        echo "<h2>FidgetWholesalePrice must be between 0.01 and 9999.99.</h2>\n";
        exit();
    }

    // ---- Validate FidgetListPrice ----
    $FidgetListPrice = filter_input(INPUT_POST, 'FidgetListPrice', FILTER_VALIDATE_FLOAT);

    if ($FidgetListPrice === false || $FidgetListPrice < 0.01 || $FidgetListPrice > 9999.99) {
        echo "<h2>FidgetListPrice must be between 0.01 and 9999.99.</h2>\n";
        exit();
    }

    // ---- Save ----
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

    if ($fidget->saveFidget()) {
        echo "<h2>New Fidget #$FidgetID successfully added!</h2>\n";
        echo "<p><strong>Code:</strong> $FidgetCode<br>";
        echo "<strong>Name:</strong> $FidgetName<br>";
        echo "<strong>Material:</strong> $FidgetMaterial<br>";
        echo "<strong>Color:</strong> $FidgetColor<br>";
        echo "<strong>Wholesale:</strong> $$FidgetWholesalePrice<br>";
        echo "<strong>List:</strong> $$FidgetListPrice</p>";
    } else {
        echo "<h2>Sorry, there was a problem adding that Fidget.</h2>\n";
    }

} else {
    echo "<h2>Please log in first</h2>\n";
}
?>