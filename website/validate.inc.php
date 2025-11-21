<?php
// Peter Daudelin - 2025-10-02 
// IT202-005 Phase 1 Assignment: Login and Logout
// pd475@njit.edu

error_log("\$_POST " . print_r($_POST, true));
require_once('database.php');

$emailAddress = htmlspecialchars($_POST['emailAddress']);
$password = $_POST['password'];
if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {

    $query = "SELECT firstName, lastName, pronouns 
              FROM FidgetsManagers
              WHERE emailAddress = ? AND password = SHA2(?,256)";

    $db = getDB();
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $emailAddress, $password);
    $stmt->execute();
    $stmt->bind_result($firstName, $lastName, $pronouns);

    $fetched = $stmt->fetch();
    $name = "$firstName $lastName";

    if ($fetched && isset($name)) {
        $_SESSION['login'] = true;
        $_SESSION['emailAddress'] = $emailAddress;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['pronouns'] = $pronouns;

        header("Location: index.php");
    } else {
        echo "<h2>Sorry, login incorrect for Fidget Store Inventory Helper</h2>\n";
        echo "<a href=\"index.php\">Please try again</a>\n";
    }

} else {
    echo "<h2>Please enter a valid email address</h2>\n";
    echo "<a href=\"index.php\">Please try again</a>\n";
}
?>
