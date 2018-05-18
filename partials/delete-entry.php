<?php
// REGUIRING SESSION AND DATABASE, DIRECTS BACK TO MAIN.PHP
require_once 'session_start.php';
require_once 'database.php';
header('Location: /main.php');

//GET USERID FROM ACTIVE SESSION
$userID = $_SESSION["user"]["userID"];

// PREPARING QUESTION TO DELETE ENTRY IN DATABASE
$statement = $db->prepare(
 "DELETE FROM entries 
 	WHERE 
 	entryID = :entryId"
);
// EXECUTING THE QUESTION WITH DATA FROM DELETE-FORM
$statement->execute([
	"entryId" => $_POST["entry-id"]
]);
