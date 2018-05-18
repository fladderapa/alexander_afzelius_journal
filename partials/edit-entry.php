<?php
// REGUIRING SESSION AND DATABASE, DIRECTS BACK TO MAIN.PHP
require_once 'session_start.php';
header('Location: /main.php');
require_once 'database.php';

//GET USERID FROM ACTIVE SESSION
$userID = $_SESSION["user"]["userID"];

// PREPARING QUESTION TO UPDATE ENTRY IN DATABASE
$statement = $db->prepare(
	"UPDATE entries 
	SET title = :title, 
	content = :content 
	WHERE entries. `entryID` = :entryId"
);
// EXECUTING THE QUESTION WITH DATA FROM EDIT-FORM
$statement->execute([
  ":title" => $_POST["edit-title"],
  ":content" => $_POST["edit-content"],
  ":entryId" => $_POST["edit-entry-id"]
]);

?>

