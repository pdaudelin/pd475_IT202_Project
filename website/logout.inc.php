<?php
// Peter Daudelin - 2025-10-02 
// IT202-005 Phase 1 Assignment: Login and Logout
// pd475@njit.edu
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
}
header("Location: index.php");
?>