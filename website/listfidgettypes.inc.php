<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 3 pd475@njit.edu
require_once("fidgettype.php");

$fidgetTypes = FidgetType::getFidgetTypes();
?>

<form id="fidgetTypeForm" method="post">
    <label for="fidgetTypeSelect"><strong>Select a Fidget Type:</strong></label><br>
    <select name="fidgetType" id="fidgetTypeSelect" style="min-width: 200px; margin-top: 5px;">
        <?php
        if ($fidgetTypes != NULL) {
            foreach ($fidgetTypes as $fidgetType) {
                $id = htmlspecialchars($fidgetType->FidgetTypeID);
                $name = htmlspecialchars($fidgetType->FidgetTypeName);
                $code = htmlspecialchars($fidgetType->FidgetTypeCode);
                $shelf = htmlspecialchars($fidgetType->FidgetShelfNumber);
                
                echo "<option value='$id'>$code – $name (Shelf #$shelf)</option>";
            }
        } else {
            echo "<option disabled>No Fidget Types found</option>";
        }
        ?>
    </select>

    <!-- JavaScript will submit this form in Phase 5 -->
    <br><br>
    <input type="submit" value="Submit" disabled title="Submit enabled in Phase 5">
</form>
