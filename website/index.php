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
   <?php include("header.inc.php"); ?>
   <?php include("nav.inc.php"); ?>

   <section id="container">
       <main>
           <?php
           if (isset($_REQUEST['content'])) {
            $content = $_REQUEST['content'];
            if (file_exists("$content.inc.php")) {
                include("$content.inc.php");
            } elseif (file_exists("$content.test.php")) {
                include("$content.test.php");
            } else {
                echo "<h2>Content file '$content' not found.</h2>";
            }
        } else {
            include("main.inc.php");
        }
           ?>
       </main>
   </section>

   <?php include("footer.inc.php"); ?>  </body>
</html>