<?php
// CHECK IF SESSION BEEN INACTIVE FOR MORE THAN 30MINUTES, IF TRUE DESTROY SESSION 
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();     
    session_destroy();
    header('Location: index.php');  
}
$_SESSION['LAST_ACTIVITY'] = time(); 