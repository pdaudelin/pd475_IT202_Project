<style>
    form[name="fidgettype"] {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 10px 5px;
        align-items: left;
        max-width: 350px;
        margin: 0;
    }
    form[name="fidgettype"] label {
        text-align: left;
        padding-right: 5px;
    }
    form[name="fidgettype"] input[type="text"],
    form[name="fidgettype"] input[type="number"] {
        width: 100%;
    }
    form[name="fidgettype"] input[type="submit"] {
        grid-column: 2;
        justify-self: start;
    }
</style>

<?php
require_once("fidgettype.php");

$fidgetTypeID = $_POST['FidgetTypeID'];
$fidgetType = FidgetType::findFidgetType($fidgetTypeID);

if ($fidgetType) {
?>
    <h2>Update Fidget Type <?php echo htmlspecialchars($fidgetTypeID); ?></h2><br>

    <form name="fidgettype" action="index.php" method="post">

        <label for="FidgetTypeCode">Type Code:</label>
        <input type="text"
               name="FidgetTypeCode"
               id="FidgetTypeCode"
               value="<?php echo htmlspecialchars($fidgetType->FidgetTypeCode); ?>">

        <label for="FidgetTypeName">Type Name:</label>
        <input type="text"
               name="FidgetTypeName"
               id="FidgetTypeName"
               value="<?php echo htmlspecialchars($fidgetType->FidgetTypeName); ?>">

        <label for="FidgetShelfNumber">Shelf Number:</label>
        <input type="number"
               name="FidgetShelfNumber"
               id="FidgetShelfNumber"
               value="<?php echo htmlspecialchars($fidgetType->FidgetShelfNumber); ?>">

        <input type="submit" name="answer" value="Update Fidget Type">
        <input type="submit" name="answer" value="Cancel">

        <input type="hidden" name="FidgetTypeID" value="<?php echo htmlspecialchars($fidgetTypeID); ?>">
        <input type="hidden" name="content" value="changefidgettype">

    </form>

<?php
} else {
?>
    <h2>Sorry, fidget type <?php echo htmlspecialchars($fidgetTypeID); ?> not found</h2>
    <a href="index.php?content=listfidgettypes">List Fidget Types</a>
<?php
}
?>

<script>
    document.fidgettype.FidgetTypeCode.focus();
    document.fidgettype.FidgetTypeCode.select();
</script>
