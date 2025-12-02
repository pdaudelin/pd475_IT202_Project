<?php
require_once("fidget.php");

# Validate input
if (!isset($_REQUEST['FidgetID']) || !is_numeric($_REQUEST['FidgetID'])) {
?>
    <h2>You did not select a valid FidgetID to view.</h2>
    <a href="index.php?content=listfidgets">List Fidgets</a>
<?php
} else {

    $fidgetID = $_REQUEST['FidgetID'];
    $fidget = Fidget::findFidget($fidgetID);

    if ($fidget) {
?>
        <h2>Fidget ID: <?php echo htmlspecialchars($fidget->FidgetID); ?></h2>
        <h2>Fidget Name: <?php echo htmlspecialchars($fidget->FidgetName); ?></h2>
        <h2>Material: <?php echo htmlspecialchars($fidget->FidgetMaterial); ?></h2>
        <h2>Color: <?php echo htmlspecialchars($fidget->FidgetColor); ?></h2>
        <h2>List Price: $<?php echo number_format($fidget->FidgetListPrice, 2); ?></h2>
        <br>
<?php
    } else {
        echo "<h2>Sorry, fidget not found.</h2>\n";
    }
}
?>
