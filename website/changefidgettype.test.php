<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 2 pd475@njit.edu
require_once("fidgettype.php");

$FidgetTypeID = $_POST['FidgetTypeID'];

// Find the existing FidgetType object
$fidgetType = FidgetType::findFidgetType($FidgetTypeID);

if ($fidgetType != NULL) {
    // Update its properties with new form data
    $fidgetType->FidgetTypeID = $_POST['FidgetTypeID'];
    $fidgetType->FidgetTypeCode = $_POST['FidgetTypeCode'];
    $fidgetType->FidgetTypeName = $_POST['FidgetTypeName'];
    $fidgetType->FidgetShelfNumber = $_POST['FidgetShelfNumber'];

    // Save changes to the database
    $result = $fidgetType->updateFidgetType();

    if ($result) {
        echo "<h2>Fidget Type #$FidgetTypeID updated successfully.</h2>\n";
    } else {
        echo "<h2>There was a problem updating Fidget Type #$FidgetTypeID.</h2>\n";
    }
} else {
    echo "<h2>Fidget Type #$FidgetTypeID not found.</h2>\n";
}
?>