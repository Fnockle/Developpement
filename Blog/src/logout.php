<?php
session_start();
//var_dump($_SESSION);
foreach ($_SESSION as $k => $v) unset($_SESSION[$k]);
//var_dump($_SESSION);
header('location: index.php');
//exit;
