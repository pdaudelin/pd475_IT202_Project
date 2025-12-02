<?php
# Peter Daudelin 2025-10-17 IT202-005 Phase 3 pd475@njit.edu
require_once("fidgettype.php");

$fidgetTypes = FidgetType::getFidgetTypes();
?>

<script>
// ==========================
// Double-click behavior
// ==========================
function listbox_dblclick() {
    document.fidgettypes.viewtype.click();
}

// ==========================
// Handle button clicks
// ==========================
function button_click(target) {
    let userConfirmed = true;

    // target legend:
    // 0 = view type
    // 1 = delete type
    // 2 = update type

    if (target === 1 || target === 5) {
        userConfirmed = confirm("Are you sure you want to delete?");
    }

    if (userConfirmed) {
        switch (target) {
            case 0: fidgettypes.action = "index.php?content=displayfidgettype"; break;
            case 1: fidgettypes.action = "index.php?content=removefidgettype"; break;
            case 2: fidgettypes.action = "index.php?content=updatefidgettype"; break;
        }
    } else {
        alert("Action canceled.");
    }
}

// ==========================
// Auto-select first entry
// ==========================
window.onload = function() {
    const select = document.getElementById("fidgetTypeSelect");
    if (select && select.options.length > 0) {
        select.selectedIndex = 0;
    }
};
</script>


<h2>Select Fidget Type</h2>

<form name="fidgettypes" id="fidgetTypeForm" method="post">

    <select id="fidgetTypeSelect" name="FidgetTypeID"
            size="10" style="min-width: 350px;" ondblclick="listbox_dblclick()">

        <?php
        if ($fidgetTypes != NULL) {
            foreach ($fidgetTypes as $f) {
                $id    = htmlspecialchars($f->FidgetTypeID);
                $code  = htmlspecialchars($f->FidgetTypeCode);
                $name  = htmlspecialchars($f->FidgetTypeName);
                $shelf = htmlspecialchars($f->FidgetShelfNumber);

                echo "<option value=\"$id\">$id – $code – $name (Shelf $shelf)</option>";
            }
        } else {
            echo "<option disabled>No Fidget Types found</option>";
        }
        ?>
    </select>

    <br><br>

    <!-- Three buttons for TYPES -->
    <input type="submit" name="viewtype" value="View Type"
           onclick="button_click(0)">
    <input type="submit" name="deletetype" value="Delete Type"
           onclick="button_click(1)">
    <input type="submit" name="updatetype" value="Update Type"
           onclick="button_click(2)">
</form>

