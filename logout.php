<?php
session_start();
$_SESSION["user_id"]="";
$_SESSION["user_name"]="";
session_destroy();
header('Location: ./');
?>