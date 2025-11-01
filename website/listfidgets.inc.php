<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidget.php");

$fidgets = Fidget::getFidgets();

if ($fidgets) {
?>
    <h2>Select Fidget</h2>
    <form name="fidgets" method="post">
        <select name="FidgetID" id="FidgetID" size="10" style="min-width: 300px;">
            <?php
            foreach ($fidgets as $fidget) {
                $FidgetID = htmlspecialchars($fidget->FidgetID);
                $FidgetName = htmlspecialchars($fidget->FidgetName);
                $FidgetMaterial = htmlspecialchars($fidget->FidgetMaterial);
                $FidgetColor = htmlspecialchars($fidget->FidgetColor);
                $FidgetListPrice = number_format($fidget->FidgetListPrice, 2);

                $optionText = "$FidgetID - $FidgetName ($FidgetMaterial, $FidgetColor) - $$FidgetListPrice";
                echo "<option value=\"$FidgetID\">$optionText</option>\n";
            }
            ?>
        </select>

        <br><br>
        <input type="submit" value="Select Fidget" disabled title="Submit enabled in Phase 5">
    </form>
<?php
} else {
    echo "<h2>No fidgets found.</h2>";
}
?>