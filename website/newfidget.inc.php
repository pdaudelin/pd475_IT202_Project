<?php
# Peter Daudelin 2025-10-30 IT202-005 Phase 3 pd475@njit.edu
?>

<form action="addfidget.inc.php" method="post">
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th colspan="2">Add New Fidget</th>
    </tr>
    <tr>
      <td><label for="FidgetID">FidgetID</label></td>
      <td><input type="number" name="FidgetID" id="FidgetID" min="1" max="99999" required></td>
    </tr>
    <tr>
      <td><label for="FidgetCode">FidgetCode</label></td>
      <td><input type="text" name="FidgetCode" id="FidgetCode" minlength="3" maxlength="10" required></td>
    </tr>
    <tr>
      <td><label for="FidgetName">FidgetName</label></td>
      <td><input type="text" name="FidgetName" id="FidgetName" minlength="10" maxlength="100" required></td>
    </tr>
    <tr>
      <td><label for="FidgetDescription">FidgetDescription</label></td>
      <td><textarea name="FidgetDescription" id="FidgetDescription" rows="3" cols="30" minlength="100" maxlength="255" required></textarea></td>
    </tr>
    <tr>
      <td><label for="FidgetMaterial">FidgetMaterial</label></td>
      <td><input type="text" name="FidgetMaterial" id="FidgetMaterial" minlength="2" maxlength="50" required></td>
    </tr>
    <tr>
      <td><label for="FidgetColor">FidgetColor</label></td>
      <td><input type="text" name="FidgetColor" id="FidgetColor" minlength="2" maxlength="30" required></td>
    </tr>
    <tr>
      <td><label for="FidgetTypeID">FidgetTypeID</label></td>
      <td><input type="number" name="FidgetTypeID" id="FidgetTypeID" min="1" max="999" required></td>
    </tr>
    <tr>
      <td><label for="FidgetWholesalePrice">FidgetWholesalePrice</label></td>
      <td><input type="number" step="0.01" min="0.01" max="9999.99" name="FidgetWholesalePrice" id="FidgetWholesalePrice" required></td>
    </tr>
    <tr>
      <td><label for="FidgetListPrice">FidgetListPrice</label></td>
      <td><input type="number" step="0.01" min="0.01" max="9999.99" name="FidgetListPrice" id="FidgetListPrice" required></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="Add Fidget">
      </td>
    </tr>
  </table>
</form>