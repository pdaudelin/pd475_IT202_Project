<?php
// Peter Daudelin - 2025-10-02 
// IT202-005 Phase 1 Assignment: Login and Logout
// pd475@njit.edu
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Inventory Helper</title></head>
<body>
   <section id="container">
       <main>
           <?php
           if (isset($_REQUEST['content'])) {
               include($_REQUEST['content'] . ".inc.php");
           } else {
               include("main.inc.php");
           }
           ?>
       </main>
   </section>
</body>
</html>