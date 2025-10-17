<?php
error_log("\$_POST " . print_r($_POST, true));
require_once("fidgettype.php");

$FidgetTypeID = $_POST['FidgetTypeID'];

// Find the Fidget Type to delete
$fidgetType = FidgetType::findFidgetType($FidgetTypeID);

if ($fidgetType != NULL) {
    $result = $fidgetType->removeFidgetType();
    if ($result)
        echo "<h2>Fidget Type #$FidgetTypeID removed successfully.</h2>\n";
    else
        echo "<h2>Sorry, there was a problem removing Fidget Type #$FidgetTypeID.</h2>\n";
} else {
    echo "<h2>Fidget Type #$FidgetTypeID not found.</h2>\n";
}
?>