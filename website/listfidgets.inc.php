<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

<script>
// Double-click runs "View Fidget"
function listbox_dblclick() {
    $('input[name="displayfidget"]').trigger('click');
}

// Handles the 3 buttons: View, Delete, Update
function button_click(target) {
    let userConfirmed = true;

    // target: 0 = display, 1 = delete, 2 = update
    if (target === 1) {
        userConfirmed = confirm("Are you sure you want to remove this fidget?");
    }

    if (userConfirmed) {
        const $form = $('form[name="fidgets"]');

        if (target === 0) $form.attr('action', 'index.php?content=displayfidget');
        if (target === 1) $form.attr('action', 'index.php?content=removefidget');
        if (target === 2) $form.attr('action', 'index.php?content=updatefidget');

    } else {
        alert("Action canceled.");
        return false;
    }
}
</script>

<?php
require_once("fidget.php");

$fidgets = Fidget::getFidgets();

if ($fidgets) {
?>
    <h2>Select Fidget</h2>

    <form name="fidgets" method="post">
        <select name="FidgetID" size="15" style="min-width: 350px;">
            <?php
            foreach ($fidgets as $fidget) {
                $FidgetID = htmlspecialchars($fidget->FidgetID);
                $FidgetName = htmlspecialchars($fidget->FidgetName);
                $FidgetMaterial = htmlspecialchars($fidget->FidgetMaterial);
                $FidgetColor = htmlspecialchars($fidget->FidgetColor);
                $FidgetListPrice = number_format($fidget->FidgetListPrice, 2);

                $option = "$FidgetID - $FidgetName ($FidgetMaterial, $FidgetColor) - $$FidgetListPrice";
                echo "<option value=\"$FidgetID\">$option</option>\n";
            }
            ?>
        </select>

        <br><br>

        <!-- 3 BUTTONS REQUIRED BY PROFESSOR -->
        <input type="submit" name="displayfidget" value="View Fidget">
        <input type="submit" name="deletefidget" value="Delete Fidget">
        <input type="submit" name="updatefidget" value="Update Fidget">
    </form>

<?php
} else {
    echo "<h2>No fidgets found.</h2>";
}
?>

<script>
// Bind events to buttons + double-click
jQuery(document).ready(function () {

    $('select[name="FidgetID"]').on('dblclick', listbox_dblclick);

    $('input[name="displayfidget"]').on('click', function () {
        button_click(0);
    });

    $('input[name="deletefidget"]').on('click', function () {
        button_click(1);
    });

    $('input[name="updatefidget"]').on('click', function () {
        button_click(2);
    });
});

// Auto-select first row
function selectFirstFidget() {
    const $select = $('select[name="FidgetID"]');
    if ($select.length && $select[0].options.length > 0) {
        $select.prop('selectedIndex', 0);
    }
}
selectFirstFidget();
</script>
