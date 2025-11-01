<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
?>

<form action="addfidgettype.inc.php" method="post">
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th colspan="2">Add New Fidget Type</th>
    </tr>
    <tr>
      <td><label for="FidgetTypeID">FidgetTypeID</label></td>
      <td><input type="number" name="FidgetTypeID" id="FidgetTypeID" required></td>
    </tr>
    <tr>
      <td><label for="FidgetTypeCode">FidgetTypeCode</label></td>
      <td><input type="text" name="FidgetTypeCode" id="FidgetTypeCode" required></td>
    </tr>
    <tr>
      <td><label for="FidgetTypeName">FidgetTypeName</label></td>
      <td><input type="text" name="FidgetTypeName" id="FidgetTypeName" required></td>
    </tr>
    <tr>
      <td><label for="FidgetShelfNumber">FidgetShelfNumber</label></td>
      <td><input type="number" name="FidgetShelfNumber" id="FidgetShelfNumber" required></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="Add Fidget Type">
      </td>
    </tr>
  </table>
</form>