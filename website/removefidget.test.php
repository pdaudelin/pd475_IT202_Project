<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 2 pd475@njit.edu
require_once("fidget.php");

$FidgetID = $_POST['FidgetID'];
$fidget = Fidget::findFidget($FidgetID);

if ($fidget) {
    $result = $fidget->removeFidget();

    if ($result) {
        echo "<h2>Fidget #$FidgetID removed successfully.</h2>\n";
    } else {
        echo "<h2>Sorry, there was a problem removing Fidget #$FidgetID.</h2>\n";
    }
} else {
    echo "<h2>Fidget #$FidgetID not found.</h2>\n";
}
?>
