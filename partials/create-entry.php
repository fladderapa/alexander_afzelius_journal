<?php
// REGUIRING SESSION AND DATABASE, DIRECTS BACK TO MAIN.PHP
require_once 'session_start.php';
header('Location: /main.php');
require_once 'database.php';

//GET USERID FROM ACTIVE SESSION
$userID = $_SESSION["user"]["userID"];

// PREPARING QUESTION TO INSERT ENTRY IN DATABASE
$statement = $db->prepare(
 "INSERT INTO entries 
 (entryID, title, content, createdAt, userID) 
 VALUES (NULL, :title, :content, NOW(), '{$userID}')"
);
// EXECUTING THE QUESTION WITH DATA FROM CREATE-FORM
$statement->execute([
  ":title" => $_POST["title"],
  ":content" => $_POST["content"]
]);


