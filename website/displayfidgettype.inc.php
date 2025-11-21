<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu

require_once("fidgettype.php");
require_once("fidget.php");

if (!isset($_REQUEST['FidgetTypeID']) || !is_numeric($_REQUEST['FidgetTypeID'])) {
?>
    <h2>You did not select a valid FidgetTypeID to view.</h2>
    <a href="index.php?content=listfidgettypes">List Fidget Types</a>
<?php
} else {
    $FidgetTypeID = $_REQUEST['FidgetTypeID'];
    $fidgetType = FidgetType::findFidgetType($FidgetTypeID);

    if ($fidgetType) {
        echo "<h2>Fidget Type Details</h2>";
        echo "<p><b>ID:</b> {$fidgetType->FidgetTypeID}<br>";
        echo "<b>Code:</b> {$fidgetType->FidgetTypeCode}<br>";
        echo "<b>Name:</b> {$fidgetType->FidgetTypeName}<br>";
        echo "<b>Shelf #:</b> {$fidgetType->FidgetShelfNumber}</p>";

        // Get items for this type
        $fidgets = Fidget::getFidgetsByType($FidgetTypeID);

        if ($fidgets) {
?>
            <br>
            <b>Fidgets of this Type:</b><br>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Material</th>
                    <th>Color</th>
                    <th>Wholesale Price</th>
                    <th>List Price</th>
                </tr>
                <?php
                $totalValue = 0;
                foreach ($fidgets as $fidget) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fidget->FidgetID); ?></td>
                        <td><?php echo htmlspecialchars($fidget->FidgetCode); ?></td>
                        <td><?php echo htmlspecialchars($fidget->FidgetName); ?></td>
                        <td><?php echo htmlspecialchars($fidget->FidgetMaterial); ?></td>
                        <td><?php echo htmlspecialchars($fidget->FidgetColor); ?></td>
                        <td><?php echo '$' . number_format($fidget->FidgetWholesalePrice, 2); ?></td>
                        <td><?php echo '$' . number_format($fidget->FidgetListPrice, 2); ?></td>
                    </tr>
                <?php
                    $totalValue += $fidget->FidgetListPrice;
                }
                ?>
                <tr>
                    <td colspan="6" style="text-align: right;"><b>Total List Value:</b></td>
                    <td><?php echo '$' . number_format($totalValue, 2); ?></td>
                </tr>
            </table>
<?php
        } else {
            echo "<h3>There are no Fidgets for this type.</h3>\n";
        }
    } else {
        echo "<h2>Sorry, Fidget Type $FidgetTypeID not found.</h2>\n";
    }
}

include("footer.inc.php");
?>