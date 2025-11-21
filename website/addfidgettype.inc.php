<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidgettype.php");
session_start();

if (isset($_SESSION['login'])) {

    // ---- Validate TypeID ----
    $FidgetTypeID = filter_input(INPUT_POST, 'FidgetTypeID', FILTER_VALIDATE_INT);

    if ($FidgetTypeID === false || $FidgetTypeID < 100 || $FidgetTypeID > 999) {
        echo "<h2>FidgetTypeID must be an integer between 100 and 999.</h2>";
        exit();
    }

    if (FidgetType::findFidgetType($FidgetTypeID)) {
        echo "<h2>A Fidget Type with ID #$FidgetTypeID already exists.</h2>";
        exit();
    }

    // ---- Validate TypeCode ----
    $FidgetTypeCode = filter_input(INPUT_POST, 'FidgetTypeCode', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetTypeCode) < 3 || strlen($FidgetTypeCode) > 10) {
        echo "<h2>TypeCode must be between 3 and 10 characters.</h2>";
        exit();
    }

    // ---- Validate TypeName ----
    $FidgetTypeName = filter_input(INPUT_POST, 'FidgetTypeName', FILTER_SANITIZE_SPECIAL_CHARS);

    if (strlen($FidgetTypeName) < 4 || strlen($FidgetTypeName) > 30) {
        echo "<h2>TypeName must be between 4 and 30 characters.</h2>";
        exit();
    }

    // ---- Validate ShelfNumber ----
    $FidgetShelfNumber = filter_input(INPUT_POST, 'FidgetShelfNumber', FILTER_VALIDATE_INT);

    if ($FidgetShelfNumber === false || $FidgetShelfNumber < 1 || $FidgetShelfNumber > 500) {
        echo "<h2>Shelf Number must be between 1 and 500.</h2>";
        exit();
    }

    // ---- Save ----
    $fidgetType = new FidgetType(
        $FidgetTypeID,
        $FidgetTypeCode,
        $FidgetTypeName,
        $FidgetShelfNumber
    );

    if ($fidgetType->saveFidgetType()) {
        echo "<h2>New Fidget Type #$FidgetTypeID successfully added!</h2>";
    } else {
        echo "<h2>There was a problem adding the Fidget Type.</h2>";
    }

} else {
    echo "<h2>Please log in first</h2>";
}
?>