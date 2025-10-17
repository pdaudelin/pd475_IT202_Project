<?php
require_once("fidget.php");
$fidgets = Fidget::getFidgets();

if ($fidgets) {
?>
    <h2>Select Fidget</h2>
    <form name="fidgets" action="index.php" method="post">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>Name</th>
                <th>Material</th>
                <th>Color</th>
                <th>Price</th>
            </tr>
            <?php
            foreach ($fidgets as $fidget) {
                $FidgetID = $fidget->FidgetID;
                $FidgetName = $fidget->FidgetName;
                $FidgetMaterial = $fidget->FidgetMaterial;
                $FidgetColor = $fidget->FidgetColor;
                $FidgetListPrice = number_format($fidget->FidgetListPrice, 2);

                echo "<tr>
                        <td><input type='radio' name='FidgetID' value='$FidgetID'></td>
                        <td>$FidgetID</td>
                        <td>$FidgetName</td>
                        <td>$FidgetMaterial</td>
                        <td>$FidgetColor</td>
                        <td>$$FidgetListPrice</td>
                      </tr>\n";
            }
            ?>
        </table><br>
        <input type="submit" name="content" value="updatefidget">
        <input type="submit" name="content" value="removefidget">
    </form>
<?php
} else {
    echo "<h2>No fidgets found.</h2>";
}
?>