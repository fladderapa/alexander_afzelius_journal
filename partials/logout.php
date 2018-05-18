<?php
//DESTROYS SESSION AND REDIRECTS TO INDEX/LOGIN PAGE
session_start();
session_destroy();
header('Location: /index.php');