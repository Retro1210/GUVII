<?php

require_once '../DBaccess/config.php';
require_once("UserHandler.php");
global $database;
$action = "";
//echo "welcome to page";
//if(isset($_GET["view"]))
$action = $_GET["action"];

switch ($action) {

    case "save":
        $UserHandler = new UserHandler();
        $UserHandler->saveUserDetail();
        break;
}
?>
