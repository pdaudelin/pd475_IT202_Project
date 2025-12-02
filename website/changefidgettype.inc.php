<?php
require_once("fidgettype.php");

if (isset($_SESSION['login'])) {

    $FidgetTypeID = $_POST['FidgetTypeID'];
    $answer = $_POST['answer'];

    if ($answer == "Update Fidget Type") {

        // Load existing type
        $fidgetType = FidgetType::findFidgetType($FidgetTypeID);

        if ($fidgetType != NULL) {

            // Update fields
            $fidgetType->FidgetTypeID = $_POST['FidgetTypeID'];
            $fidgetType->FidgetTypeCode = $_POST['FidgetTypeCode'];
            $fidgetType->FidgetTypeName = $_POST['FidgetTypeName'];
            $fidgetType->FidgetShelfNumber = $_POST['FidgetShelfNumber'];

            // Save changes
            $result = $fidgetType->updateFidgetType();

            if ($result) {
                echo "<h2>Fidget Type $FidgetTypeID updated</h2>\n";
            } else {
                echo "<h2>Problem updating Fidget Type $FidgetTypeID</h2>\n";
            }
        } else {
            echo "<h2>Fidget Type $FidgetTypeID not found.</h2>\n";
        }

    } else {
        // Cancel was pressed
        echo "<h2>Update cancelled for Fidget Type $FidgetTypeID.</h2>\n";
    }

} else {
    echo "<h2>Please login first.</h2>\n";
}
?>
