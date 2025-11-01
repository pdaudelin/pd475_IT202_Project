<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
require_once("fidget.php");

if (!isset($_POST['FidgetID']) || !is_numeric($_POST['FidgetID'])) {
?>
    <h2>You did not select a valid FidgetID value</h2>
    <a href="index.php?content=listfidgets">List Fidgets</a>
<?php
} else {
    $FidgetID = $_POST['FidgetID'];
    $fidget = Fidget::findFidget($FidgetID);

    if ($fidget) {
?>
        <h2>Update Fidget <?php echo htmlspecialchars($fidget->FidgetID); ?></h2><br>
        <form name="fidgetForm" action="index.php" method="post">
            <table>
                <tr>
                    <td>FidgetID</td>
                    <td><?php echo htmlspecialchars($fidget->FidgetID); ?></td>
                </tr>
                <tr>
                    <td>FidgetCode</td>
                    <td><input type="text" name="FidgetCode" value="<?php echo htmlspecialchars($fidget->FidgetCode); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetName</td>
                    <td><input type="text" name="FidgetName" value="<?php echo htmlspecialchars($fidget->FidgetName); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetDescription</td>
                    <td><input type="text" name="FidgetDescription" value="<?php echo htmlspecialchars($fidget->FidgetDescription); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetMaterial</td>
                    <td><input type="text" name="FidgetMaterial" value="<?php echo htmlspecialchars($fidget->FidgetMaterial); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetColor</td>
                    <td><input type="text" name="FidgetColor" value="<?php echo htmlspecialchars($fidget->FidgetColor); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetTypeID</td>
                    <td><input type="text" name="FidgetTypeID" value="<?php echo htmlspecialchars($fidget->FidgetTypeID); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetWholesalePrice</td>
                    <td><input type="text" name="FidgetWholesalePrice" value="<?php echo htmlspecialchars($fidget->FidgetWholesalePrice); ?>"></td>
                </tr>
                <tr>
                    <td>FidgetListPrice</td>
                    <td><input type="text" name="FidgetListPrice" value="<?php echo htmlspecialchars($fidget->FidgetListPrice); ?>"></td>
                </tr>
            </table><br><br>

            <!-- Submit Buttons -->
            <input type="submit" name="update" value="Update Item">
            <input type="submit" name="cancel" value="Cancel">

            <!-- Hidden fields for routing -->
            <input type="hidden" name="FidgetID" value="<?php echo htmlspecialchars($FidgetID); ?>">
            <input type="hidden" name="content" value="changefidget">
        </form>
<?php
    } else {
?>
        <h2>Sorry, Fidget <?php echo htmlspecialchars($FidgetID); ?> not found</h2>
        <a href="index.php?content=listfidgets">List Fidgets</a>
<?php
    }
}
?>
