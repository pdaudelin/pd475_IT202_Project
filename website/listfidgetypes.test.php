<?php
require_once("fidgettype.php");

$fidgetTypes = FidgetType::getFidgetTypes();

if ($fidgetTypes != NULL) {
    foreach ($fidgetTypes as $fidgetType) {
        $id = $fidgetType->FidgetTypeID;
        $info = $id . " - " . $fidgetType->FidgetTypeCode . ", " . $fidgetType->FidgetTypeName . ", Shelf #" . $fidgetType->FidgetShelfNumber;
        echo "$info<br>";
    }
} else {
    echo "<h2>No Fidget Types found in the database.</h2>";
}
?>