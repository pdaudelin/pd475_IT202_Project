<?php
// Peter Daudelin - 2025-10-02 
// IT202-005 Phase 1 Assignment: Login and Logout
// pd475@njit.edu
 function getDB() {
   $host = 'sql1.njit.edu';
   $port = 3306;
   $dbname = 'pd475';
   $username = 'pd475';
   $password = 'Phpvohra202!';
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   try {
       $db = new mysqli($host, $username, $password, $dbname, $port);
       error_log("You are connected to the $host database!");
       // echo "You are connected to the $host database!";
       return $db;
   } catch (mysqli_sql_exception $e) {
       error_log($e->getMessage(), 0);
       // echo $e->getMessage();
   }
 }
 // getDB();
?>