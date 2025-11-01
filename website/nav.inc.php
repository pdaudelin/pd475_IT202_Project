<?php
if (isset($_SESSION['login'])) {
?>
  <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
    <table width="100%" cellpadding="3">
      <?php
      echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>";
      ?>
      <tr>
        <td><!--<img src="images/home.png" alt="Home Icon" width="12" height="12">&nbsp;-->
          <a href="index.php"><strong>Home</strong></a>
        </td>
      </tr>
      <tr>
        <td><!--<img src="images/types.png" alt="Fidget Types Icon" width="12" height="12">&nbsp;-->
          <strong>Fidget Types</strong>
        </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listfidgettypes"><strong>List Fidget Types</strong></a></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newfidgettype"><strong>Add New Fidget Type</strong></a></td>
      </tr>
      <tr>
        <td> <!--<img src="images/fidgets.png" alt="Fidgets Icon" width="12" height="12">&nbsp; -->
          <strong>Fidgets</strong>
        </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listfidgets"><strong>List Fidgets</strong></a></td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newfidget"><strong>Add New Fidget</strong></a></td>
      </tr>
      <tr>
        <td><hr /></td>
      </tr>
      <tr>
        <td>
          <a href="index.php?content=logout">
            <!-- <img src="images/logout.png" alt="Logout Icon" width="12" height="12"> -->
          </a>&nbsp;<a href="index.php?content=logout"><strong>Logout</strong></a>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
          <form action="index.php" method="post">
            <label>Search for Fidget:</label><br>
            <input type="text" name="FidgetID" size="14" />
            <input type="submit" value="find" />
            <input type="hidden" name="content" value="updatefidget" />
          </form>
        </td>
      </tr>
      <tr>
        <td>
          <form action="index.php" method="post">
            <label>Search for Fidget Type:</label><br>
            <input type="text" name="FidgetTypeID" size="14" />
            <input type="submit" value="find" />
            <input type="hidden" name="content" value="displayfidgettype" />
          </form>
        </td>
      </tr>
    </table>
  </div>
<?php
}
?>
