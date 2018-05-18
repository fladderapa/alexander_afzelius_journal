<?php
// REGUIRING DATABASE
header('Location: /');
require_once 'database.php';

// ENCRYPTS PASSWORD
$hashed = password_hash('admin', PASSWORD_DEFAULT);

// PREPARING QUESTION TO INSERT USER INTO DATABASE
$statement = $db->prepare(
  "INSERT INTO users 
  (username, password)
  VALUES (:username, :password)"
);
// EXECUTES QUESTION WITH HARD-CODED VALUE
$statement->execute([
  ":username" => 'brandon',
  ":password" => $hashed
]);
