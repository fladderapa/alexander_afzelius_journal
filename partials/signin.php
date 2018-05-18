<?php
// STARTING SESSION AND CONNECTING THE DATABASE
require_once 'session_start.php';
require_once 'database.php';

// PREPARING QUESTION TO DATABASE TO GET A USER
$statement = $db->prepare(
  "SELECT * FROM users 
  WHERE username = :username"
);
// EXECUTING THE QUESTION TO DATABASE WITH USERNAME FROM LOGIN-FORM
$statement->execute([
  ":username" => $_POST["username"]
]);
// GET THE ACTUAL USER
$user = $statement->fetch();
// CHECK IF PASSWORD FROM LOGIN-FORM MATCHES WITH PASSWORD FROM DATABASE, IF TRUE START SESSION AND DIREKT TO MAIN.PHP. ELSE REDIRECT TO LOGIN-FORM
if (password_verify($_POST["password"], $user["password"])) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["user"] = $user;
    header('Location: /main.php');
} else {
    header('Location: /index.php?message=login misslyckades');
}


